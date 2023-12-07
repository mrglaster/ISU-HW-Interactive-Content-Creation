@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактировать пост</div>

                <div class="card-body">
                    <form action="{{ route('posts.update', $post) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Заголовок:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Содержание:</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required>{{ old('content', $post->content) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
