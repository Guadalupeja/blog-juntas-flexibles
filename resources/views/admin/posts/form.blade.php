<form method="POST" action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}">
    @csrf
    @isset($post)
        @method('PUT')
    @endisset

    <label for="title">Título:</label>
    <input type="text" name="title" value="{{ $post->title ?? '' }}" required>

    <label for="content">Contenido:</label>
    <textarea name="content" required>{{ $post->content ?? '' }}</textarea>

    <button type="submit">Guardar</button>
</form>
