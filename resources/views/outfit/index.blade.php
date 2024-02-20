
@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

         <div class="card-header">OUTFIT LIST</div>
         <div class="card-body">@foreach ($outfits as $outfit)
            <a href="{{route('outfit.edit',[$outfit])}}"> {{$outfit->type}} {{$outfit->color}}</a>
         {{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}
            
            <form action="{{route('outfit.destroy',[$outfit])}}" method="post">
         
             
             @csrf
             <button type="submit">DELETE</button>
             </form>
            
            <br>
         
         @endforeach</div>


         </div>
      </div>
   </div>
</div>

@endsection

@section('title')OUTFIT INDEX @endsection