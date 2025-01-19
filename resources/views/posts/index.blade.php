<h1>Post</h1>
<a href="/home">Profile</a>
@foreach($posts as $post)
    <div>{{ $post->title }}</div>
    <div>{{ $post->description }}</div>
    <div>{{ $post->category->name }}</div>

    @foreach($post->comments as $comment)
        <div>{{ $comment->comment }} - {{ $comment->user->name }}</div>
        @can('update', $comment)
            <form method="POST" action="{{ route('comments.update', $comment) }}">
                @csrf
                @method('PUT')
                <textarea name="comment">{{ $comment->comment }}</textarea>
                <button type="submit">Update</button>
            </form>
        @endcan

        @can('delete', $comment)
            <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endcan
    @endforeach
@endforeach
