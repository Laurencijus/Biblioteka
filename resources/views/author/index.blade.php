@extends('layouts.app')
@section('content')

@foreach ($collection as $item)
<form action="{{route('author.destroy',[$item])}}" method="POST">
{{$item->id}} {{$item->name}} {{$item->surname}}
<a href="{{route('author.edit',[$item])}}">Edit</a>
@csrf
<button type="submit">Delete</button>
</form>
@endforeach

@endsection