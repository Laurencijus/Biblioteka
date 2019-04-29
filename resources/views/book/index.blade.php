@extends('layouts.app')
@section('content')

    <form action="{{route('book.filter')}}" method="POST">
    <select name="author_id">
        @foreach ($authors as $item)
            <option value="{{$item->id}}" @if($author_default == $item->id) selected @endif>{{$item->name }} {{$item->surname}}</option>
        @endforeach
    </select>
    <input type="hidden" name="by" value="author">
    @csrf
    <button type="submit">Filter</button>
    </form> 

    <form action="{{route('book.filter')}}" method="POST">
        <select name="publisher">
            @foreach ($publishers as $item)
                <option value="{{$item}}" @if($pub_default == $item) selected @endif>{{$item}}</option>
            @endforeach
        </select>
        <input type="hidden" name="by" value="publisher">
        @csrf
        <button type="submit">Filter</button>
        </form>

    @foreach ($collection as $item)
    <form action="{{route('book.destroy',[$item])}}" method="POST">
    {{$item->title}} {{$item->publisher}} {{$item->bookAuthor->surname}} 
    <a href="{{route('book.edit', [$item])}}">[EDIT]</a>
    @csrf
    <button type="submit">Delete</button>
    </form>  
    @endforeach
@endsection