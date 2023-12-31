@extends('layouts.app')

@section('title', 'Создать новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Форма добавления новости</h5>
                        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="newsTitle">Заголовок:</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{ old('title') }}">
                                @if($errors->has('title'))
                                    <div class="alert alert-danger mt-1" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif

                                <label for="createText">Текст:</label>
                                <textarea name="text" id="newsText" class="form-control">{ !! old('text') !! }</textarea>
                                <script>
                                    CKEDITOR.replace('createText', options);
                                </script>
                            @if($errors->has('text'))
                                    <div class="alert alert-danger mt-1" role="alert">
                                        @foreach($errors->get('text') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif

                                <label for="newsCategory">Категория:</label>
                                <select name="category_id" id="newsCategory"  class="form-control">
                                    @foreach($categories as $item)
                                        <option
                                            @if ($item['id'] == old('category')) selected @endif
                                            value="{{ $item['id'] }}">{{ $item['title'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <div class="alert alert-danger mt-1" role="alert">
                                        @foreach($errors->get('category_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif

                                <div class="form-check">
                                    @if($errors->has('isPrivate'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            @foreach($errors->get('isPrivate') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                    <input class="form-check-input" type="checkbox" @if (old('isPrivate')) checked @endif name="isPrivate" value="1">
                                    <label for="newsPrivate">Приватная</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                                @if($errors->has('image'))
                                    <div class="alert alert-danger mt-1" role="alert">
                                        @foreach($errors->get('image') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="Добавить новость">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
