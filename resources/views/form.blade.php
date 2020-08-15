@extends('master',['title' => 'Upload your picture'])
@section('content')
    <form action="/sendForm" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" required placeholder="Title for API request">
        <input type="file" name="image" required accept="image/x-png,image/gif,image/jpeg">
        <input type="submit" name="upload" value="upload">
    </form>
    @isset($result)
        <p>{{$result}}</p>
    @endisset
    @isset($errors)
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endisset
@endsection