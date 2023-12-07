@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    <h4>Посты пользователя</h4>
                    @forelse($posts as $post)
                    @if($post->isPublished() || auth()->user()->id === $post->user->id)
                        <div class="card mb-4">
                            <div class="card-body">
                            <h2 class="card-subtitle mb-2 text-muted"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}{{$post->isPublished() ? ' ' : ' ⏰ '.$post->published_at }}</a></h2>
                                <pre class="card-text">{{ $post->content }}</pre>
                                @auth
                                    @if($post->user->id === auth()->id())
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Редактировать</a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот пост?')">Удалить</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endif
                    @empty
                        <p>Пользователь не создал постов.</p>
                    @endforelse

                    <hr>

                    <h4>Комментарии пользователя</h4>
                    @forelse($comments as $comment)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('posts.show', $comment->post) }}">{{ $comment->post->title}}</a></h5>
                                <pre class="card-text">{{ $comment->comment_text}}</pre>
                            </div>
                        </div>
                    @empty
                        <p>Пользователь не оставил комментариев.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
