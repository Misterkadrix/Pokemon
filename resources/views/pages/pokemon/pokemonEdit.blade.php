@extends('template')
@section('content')

<form action="/pokemon/{{$pokemon->id}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
<input type="text" value="{{$pokemon->nom}}" name="nom" placeholder="nom">
        <input type="text" value="{{$pokemon->type}}" name="type" placeholder="type">
        <input type="integer" value="{{$pokemon->niveau}}" name="niveau" placeholder="niveau">
        <input type="file" name="src">
        <button type="submit">Update</button>
    </form>
@endsection