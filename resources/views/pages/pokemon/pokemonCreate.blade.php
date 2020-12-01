@extends('template')
@section('content')
    <form action="/pokemon" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="type" placeholder="type">
        <input type="integer" name="niveau" placeholder="niveau">
        <input type="file" name="src">
        <button type="submit">Create</button>
    </form>
@endsection