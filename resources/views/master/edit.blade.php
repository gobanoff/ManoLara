
    @extends('layouts.app')
    @section('content')
    
    <div class="container">
       <div row justify-content-center>
          <div class="col-md-8">
             <div class="card">
    
             <div class="card-header">MASTER EDIT</div>
             <div class="card-body"><form action="{{route('master.update',$master)}}" method="post">

                  <div class="form-group">
                   <label>Name:</label>

                   <input type="text"class="form-control" name="master_name"value = "{{$master->name}}">
                   <small class="form-text text-muted" >Enter name</small>
                  </div>

                 <div class="form-group">
                  <label>Surname:</label>
                  <input type="text"class="form-control" name="master_surname"value = "{{$master->surname}}">
                  <small class="form-text text-muted" >Enter surname</small>
                 </div>

                @csrf
                <button type="submit"class="btn btn-outline-warning">EDIT</button>
                </form></div>
    
    
             </div>
          </div>
       </div>
    </div>
    
    @endsection

    @section('title')MASTER EDIT @endsection