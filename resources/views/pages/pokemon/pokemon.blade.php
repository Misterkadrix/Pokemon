@extends('template')
@section('content')
@foreach ($pokemon as $item)
    
<div class="card" style="width: 18rem;">
<img src="{{asset('images/'. $item->src)}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title">{{$item->nom}}</h5>
    <p class="card-text">{{$item->type}}</p>
    <p>{{$item->niveau}}</p>
    <a href="/pokemon/{{$item->id}}/edit" class="btn btn-danger">Edit</a>
    <form action="/pokemon/{{$item->id}}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-primary" type="submit">DELETE</button>
    </form>
    </div>
</div>
@endforeach
@endsection