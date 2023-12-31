@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Новости</h3>
                        @forelse($news as $item)
                            <p class="card-text"><a href="{{ route('news.one', $item->id) }}"> {{ $item->title }}</a></p>
                            <div class="card-img" style="border-radius: 15px; background-image: url({{ $item->image ?? asset('storage/img/default.jpeg') }})"></div>
                        @empty
                            <p class="card-text">Нет новостей</p>
                        @endforelse
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
