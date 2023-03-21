@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $article->title }}</h1>
                <p class="text-muted">{{ $article->created_at->format('d M Y') }}</p>
                <div class="art-body">
                    <img src="/th.png" alt="{{ $article->title }}" class="img-fluid">
                    <p>{{ $article->content }}</p>
                </div>
                <div class="likes-and-views">
                    <button>views: {{ $views }}</button>
                    <button>likes: {{ $likes }}</button>
                    @foreach ($tags as $tag)
                        <div class="tag">
                            {{ $tag->tag_name }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <h2>Comments</h2>
                @foreach ($comments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                        <h3>{{ $comment->subject }}</h3>
                        <p class="card-text">{{ $comment->body }}</p>
                        <p class="card-subtitle text-muted">Commented on {{ $comment->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                @endforeach

                    <form method="POST" action="{{ route('comments.store', ['article_id' => $article->id]) }}">
                        @csrf
                        <h3>Add new comment</h3>
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="form-group">
                        <label for="content">Title</label>
                        <br />
                            <input type="text" class="form-control" id="subject" name="subject" required />
                            <br />
                            <label for="body">Comment</label>
                            <br />
                            <textarea class="form-control" id="content" name="body" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
