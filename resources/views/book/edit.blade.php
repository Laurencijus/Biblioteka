@extends('layouts.app')
@section('content')
    <form action="{{route('book.update',[$book])}}" method="POST">
    <input type="text" name="title" value="{{$book->title}}">
    <input type="text" name="publisher" value="{{$book->publisher}}">
    <textarea name="critic">{{$book->critic}}</textarea>
    <select name="author_id">
        @foreach ($collection as $item)
            <option @if($book->author_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name }} {{$item->surname}}</option>
        @endforeach
    </select>
    @csrf
    <button type="submit">Enter</button>
@endsection