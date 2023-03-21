<!-- articles.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-md-8">
                <h1>{{ $article->title }}</h1>
                <p class="text-muted">{{ $article->created_at->format('d M Y') }}</p>
                <div class="art-body">
                    <img src="/th.png" alt="{{ $article->title }}" class="img-fluid">
                    <p>{{ $article->content }}</p>
                </div>
                <div class="likes-and-views">
                    <button>views: x</button>
                    <button>likes: x</button>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read more</a>
                    @foreach ($article->tags as $tag)
                        <div class="tag">
                            {{ $tag->tag_name }}
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
