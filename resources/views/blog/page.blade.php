@extends ('layouts.app')
@section('content')

<table>
    <tr>
        <th>title</th>
        <th>Author</th>
    </tr>
    @foreach($blogPosts as $blogPost)
    <tr>
        <td>{{ $blogPost->title }}</td>
        <td>{{ $blogPost->blogHasUser->name }}</td>
    </tr>
    @endforeach
</table>

@endsection


{{ $blogPosts }}