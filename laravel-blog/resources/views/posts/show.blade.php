<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-subtitle mb-2 text-muted"><a href="{{ route('posts.show', $post) }}">{{ $post->title}}</a></div>

                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('user.show', $post->user) }}">{{ $post->user->id === auth()->id() ? 'Вы' : $post->user->name }}{{$post->isPublished() ? ' ' : ' ⏰ '.$post->published_at }}</a></h5>
                    <pre class="card-text">{!! $post->content !!}</pre>
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
                    <hr>
                    <h4>Комментарии</h4>

                    @forelse($post->comments()->where('moderated', true)->where('approved', true)->paginate(15) as $comment)
                        <div class="card mb-4 @if($comment->user_id === auth()->id()) bg-success text-white @endif">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->user->id === auth()->id() ? 'Вы' : $comment->user->name }}</h5>
                                <pre class="card-text">{{ $comment->comment_text }}</pre>
                            </div>
                        </div>
                    @empty
                        <p>Нет одобренных комментариев.</p>
                    @endforelse
                    {{ $post->comments()->where('moderated', true)->where('approved', true)->paginate(15)->links('pagination::bootstrap-4') }}
                    @auth
                        <form action="{{ route('comments.store', $post) }}" method="post" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <label for="content">Добавить комментарий:</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" onclick="alert('Комментарий был отправлен на проверку.  Он будет опубликован после модерации');" class="btn btn-primary">Отправить</button>
                        </form>
                    @else
                        <p>Чтобы добавить комментарий, <a href="{{ route('login') }}">войдите в систему</a>.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
