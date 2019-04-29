@extends('layouts.app')
@section('content')
    <form action="{{route('author.store')}}" method="POST">
        <input type="text" name="name">
        <input type="text" name="surname">
        <button type="submit">Enter New</button>
        @csrf
    </form>
@endsection