
@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

    <div class="card-header">OUTFIT LIST

        <div class="butt-sort">
            <div class="sortbtn">
                <button type="submit"class="btn btn-outline-warning"name="type"value="type">Type</button>
                <button type="submit"class="btn btn-outline-warning"name="color"value="color">Color</button>
                <button type="submit"class="btn btn-outline-warning"name="size"value="size">Size</button>
            </div>


           <div class="radiobtn">
              <div class="form-check">
                 <input class="form-check-input"type="radio"name="sort_dir"id="sort_a"
                 value="asc"@if('desc'!== $sortDirection)checked @endif>

                 <label class="form-check-label" for="sort_a">a_z</label>
               </div>
               <div class="form-check">
                  <input class="form-check-input"type="radio"name="sort_dir"id="sort_z"
                  value="desc"@if('desc'== $sortDirection)checked @endif>

                  <label class="form-check-label" for="sort_z">z_a</label>
                </div>
            </div>

            
               <a href="{{route('outfit.index')}}"class="btn btn-outline-info">Reset</a>


         </div>

   </div>

         <div class="card-body">
            <ul class="list-group">
            @foreach ($outfits as $outfit)
            <li class="list-group-item">
               <div class="list">
            <a href="{{route('outfit.edit',[$outfit])}}"> {{$outfit->type}} {{$outfit->color}}, size:{{$outfit->size}}</a>
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