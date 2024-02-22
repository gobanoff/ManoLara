@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

    <div class="card-header">{{$outfit->type}}</div>

         <div class="card-body"> 
           
            
           
           
         
               <div class="list">
            <span>  color: <b> {{$outfit->color}} </b> size: <b>{{$outfit->size}} </b></span>
            <p> {{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}</p>
            
             </div>
           
      
        </div>
     
   
         </div>
      </div>
   </div>
</div>

@endsection

@section('title')OUTFIT SHOW @endsection