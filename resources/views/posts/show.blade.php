<h1>Post: {{ $post->title }}</h1>
<p>{{ $post->body }}</p>

@if($comments = $post->comments)
    <ul>
        @foreach($comments as $comment)
            <li><b>{{ $comment->created_at->diffForHumans() }}:</b> {{ $comment->body }} </li>
        @endforeach
    </ul>
@endif


<h3>Add comment</h3>
@if($flash = session('message'))
    <p style="color: green">{{ $flash }}</p>
@endif
<form action="/posts/ {{ $post->id }}/comments" method="post">
    {{ csrf_field() }}
    <label for="body">Comment</label>
    <input type="text" name="body" id="body">
    <input type="submit" value="Comment">
</form>
@if(count($errors))
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif