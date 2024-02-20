
@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

         <div class="card-header">MASTER CREATE</div>
         <div class="card-body">
            <form action="{{route('master.store')}}" method="post">

            <div class="form-group">

            <label>Name:</label>
             <input type="text" name="master_name"class="form-control">
             <small class="form-text text-muted" >Enter name</small>
            </div>

            <div class="form-group">

            <label>Surname:</label>
             <input type="text" name="master_surname"class="form-control">
             <small class="form-text text-muted">Enter surname</small>
            </div>



            @csrf
            <button type="submit"class="btn btn-outline-warning">ADD NEW</button>
            </form></div>


         </div>
      </div>
   </div>
</div>

@endsection

@section('title')MASTER CREATE @endsection