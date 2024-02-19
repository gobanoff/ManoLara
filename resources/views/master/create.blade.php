



@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

         <div class="card-header">MASTER CREATE</div>
         <div class="card-body"><form action="{{route('master.store')}}" method="post">

            Name: <input type="text" name="master_name">
            Surname: <input type="text" name="master_surname">
            @csrf
            <button type="submit">ADD</button>
            </form></div>


         </div>
      </div>
   </div>
</div>

@endsection
