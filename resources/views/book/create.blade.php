@extends('layouts.app')
@section('content')
    <form action="{{route('book.store')}}" method="POST">
    <input type="text" name="title">
    <input type="text" name="publisher">
    <textarea name="critic"></textarea>
    <select name="author_id">
        @foreach ($collection as $item)
            <option value="{{$item->id}}">{{$item->name }} {{$item->surname}}</option>
        @endforeach
    </select>
    @csrf
    <button type="submit">Enter</button>
@endsection