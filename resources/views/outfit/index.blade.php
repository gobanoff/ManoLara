
@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
      <div class="col-md-8">
         <div class="card">

    <div class="card-header">O U T F I T - l i s t

        <form action="{{route('outfit.index')}}" method="get">
<fieldset>
   <legend>sort</legend>
        <div class="butt-sort">
            <div class="sortbtn">
                <button type="submit"class="btn btn-outline-warning"name="sort"value="type">Type</button>
                <button type="submit"class="btn btn-outline-warning"name="sort"value="color">Color</button>
                <button type="submit"class="btn btn-outline-warning"name="sort"value="size">Size</button>
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
      </fieldset>
         </form>

         <form action="{{route('outfit.index')}}" method="get">
            <fieldset>
               <legend>filter by</legend>
                    <div class="butt-filter">
                        
                     <div class="form-group">

                        <select name ="master_id"class="form-control">
                           <option value="0"disabled selected>Select Master</option>
                     @foreach ($masters as $master)
                     <option value="{{$master->id}}" @if ($master_id == $master->id) selected @endif>
                        {{$master->name}} {{$master->surname}}</option>
                     @endforeach
                        </select>
                        
                      </div>
                       
                        <button type="submit"class="btn btn-outline-info"name="filter"value="master">Master</button>
                          
            
                     </div>
                  </fieldset>
                     </form>


                     <form action="{{route('outfit.index')}}" method="get">
                        <fieldset>
                           <legend>search</legend>
                                
                                    
                                 <div class="form-group">
            
                                    <input class="form-control"type="text"name="s"id="s">
                                    <button type="submit"class="btn btn-outline-info"name="search"value="all">Search</button>
                                  </div>
                                   
                                      
                        
                                 
                              </fieldset>
                                 </form>












   </div>

         <div class="card-body"> 
            <div class="pg">  {{$outfits->links()}} </div>
            
            <ul class="list-group">
            @foreach ($outfits as $outfit)
            <li class="list-group-item">
               <div class="list">
            <span> type: <b> {{$outfit->type}} </b> color: <b> {{$outfit->color}} </b> size: <b>{{$outfit->size}} </b></span>
            <p> {{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}</p>
            <div class="buttons">
               <a href="{{route('outfit.show',$outfit)}}"class="btn btn-outline-warning">SHOW</a>
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
   <div class="pg">  {{$outfits->links()}} </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('title')OUTFIT INDEX @endsection