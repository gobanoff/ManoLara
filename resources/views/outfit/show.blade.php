@extends('layouts.app')
@section('content')

<div class="container">
   <div row justify-content-center>
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{$outfit->type}}</div>

                    <div class="card-body"> 
         
                      <div class="list1">
                         <div class="show">  Color : <b class="show2"> {{$outfit->color}} </b></div>
                         <div class="list3"style="background:{{$outfit->color}} ;"></div>
                         <div class="show">  Size : <b class="show1">{{$outfit->size}} </b></div>
                         <div class="show"> {{$outfit->type}} Master : <b class="show1">{{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}</b></div>
                      </div>

                      <div class="list2">
                        {{$outfit->about}}
                      </div>
                      <a href="{{route('outfit.edit',$outfit)}}"class="btn btn-outline-primary"> EDIT</a>





                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('title')OUTFIT SHOW @endsection