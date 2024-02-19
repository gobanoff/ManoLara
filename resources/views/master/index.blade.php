








@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

         <div class="card-header">MASTER INDEX</div>
         <div class="card-body">@foreach ($masters as $master)
            <a href="{{route('master.edit',$master)}}"> {{$master->name}} {{$master->surname}}</a>
            <form action="{{route('master.destroy',$master)}}" method="post">
         
             
             @csrf
             <button type="submit">DELETE</button>
             </form>
            
            <br>
         
         
         
         @endforeach
         </div>


         </div>
      </div>
   </div>
</div>

@endsection
