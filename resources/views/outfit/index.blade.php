
@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

         <div class="card-header">OUTFIT LIST</div>

         <div class="card-body">
            <ul class="list-group">
            @foreach ($outfits as $outfit)
            <li class="list-group-item">
               <div class="list">
            <a href="{{route('outfit.edit',[$outfit])}}"> {{$outfit->type}} {{$outfit->color}}</a>
            <p> {{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}</p>
            <div class="buttons">
            <a href="{{route('outfit.edit',$outfit)}}"class="btn btn-outline-primary"> EDIT</a>
            <form action="{{route('outfit.destroy',[$outfit])}}" method="post">
             @csrf
             <button type="submit"class="btn btn-outline-danger">DELETE</button>
             </form>
            </div>
             </div>
            </li>
         @endforeach</div>
      </ul>

         </div>
      </div>
   </div>
</div>

@endsection

@section('title')OUTFIT INDEX @endsection