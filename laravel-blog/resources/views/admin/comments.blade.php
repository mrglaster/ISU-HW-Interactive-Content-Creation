@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Администраторская панель - Модерация комментариев') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Комментарии для модерации</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Заголовок поста</th>
                                <th>Текст комментария</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->created_at }}</td>
                                    <td><a href="{{ route('posts.show', $comment->post) }}">{{ $comment->post->title }}</a></td>
                                    <pre><td>{{ $comment->comment_text }}</td></pre>
                                    <td>
                                        @if ($comment->approved)
                                            <span class="badge badge-success">Одобрен</span>
                                        @else
                                        <form action="{{ route('admin.approveComment', $comment) }}" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="btn btn-success btn-sm">Одобрить</button>
                                        </form>
                                        <form action="{{ route('admin.rejectComment', $comment) }}" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="btn btn-danger btn-sm">Отклонить</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Нет комментариев для модерации.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
