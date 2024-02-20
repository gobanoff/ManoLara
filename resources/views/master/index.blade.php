
@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

         <div class="card-header">MASTER LIST</div>
         <div class="card-body">
         <ul class="list-group">
            @foreach ($masters as $master)
         <li class="list-group-item">
            <div class="list">
            <a href="{{route('master.edit',$master)}}"> {{$master->name}} {{$master->surname}}</a>

            <div class="buttons">

            <a href="{{route('master.edit',$master)}}"class="btn btn-outline-primary"> EDIT</a>

            <form action="{{route('master.destroy',$master)}}" method="post">
         
             @csrf
             <button type="submit"class="btn btn-outline-danger">DELETE</button>
             </form>
            </div>
            </div>
         </li>
         @endforeach
            </ul>
         </div>


         </div>
      </div>
   </div>
</div>

@endsection

@section('title')MASTER INDEX @endsection
