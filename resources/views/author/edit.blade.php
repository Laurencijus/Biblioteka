@extends('layouts.app')
@section('content')
    <form action="{{route('author.update', [$author])}}" method="POST">
        <input type="text" name="name" value="{{$author->name}}">
        <input type="text" name="surname" value="{{$author->surname}}">
        <button type="submit">Edit</button>
        @csrf
    </form>
@endsection