<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Содержание</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="schedule_post" name="schedule_post">
                <label class="form-check-label" for="schedule_post">Опубликовать в определённое время</label>
            </div>

            <div id="schedule_options" style="display: none;">
                <label for="published_at">Дата и время публикации:</label>
                <input type="datetime-local" id="published_at" name="published_at">
        </div>
            <button type="submit" class="btn btn-primary">Создать пост</button>
        </form>
    </div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scheduleCheckbox = document.getElementById('schedule_post');
        const scheduleOptions = document.getElementById('schedule_options');
        const publishedAtInput = document.getElementById('published_at');

        scheduleCheckbox.addEventListener('change', function () {
            scheduleOptions.style.display = scheduleCheckbox.checked ? 'block' : 'none';
        });
    });
</script>