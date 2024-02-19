
    @extends('layouts.app')
    @section('content')
    
    <div class="container">
       <div row justify-content-center>
          <div class="col-md-8">
             <div class="card">
    
             <div class="card-header">MASTER EDIT</div>
             <div class="card-body"><form action="{{route('master.update',$master)}}" method="post">

                Name: <input type="text" name="master_name"value = "{{$master->name}}">
                Surname: <input type="text" name="master_surname"value = "{{$master->surname}}">
                @csrf
                <button type="submit">EDIT</button>
                </form></div>
    
    
             </div>
          </div>
       </div>
    </div>
    
    @endsection

    @section('title')MASTER EDIT @endsection