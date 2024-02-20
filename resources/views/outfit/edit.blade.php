
    @extends('layouts.app')
    @section('content')
    
    <div class="container">
       <div row justify-content-center>
          <div class="col-md-8">
             <div class="card">
    
       <div class="card-header">OUTFIT EDIT</div>
       <div class="card-body"><form action="{{route('outfit.update',$outfit)}}" method="post">



         <div class="form-group">

            <label> Type :</label>
        <input type="text"class="form-control" name="outfit_type"value="{{$outfit->type}}">
        <small class="form-text text-muted" >Enter type</small>
      </div>


        <div class="form-group">

         <label> Color :</label>
         <input type="text"class="form-control" name="outfit_color"value="{{$outfit->color}}">
        <small class="form-text text-muted" >Enter color</small>
      </div>

        <div class="form-group">

         <label> Size :</label>
         <input type="text"class="form-control" name="outfit_size"value="{{$outfit->size}}">
        <small class="form-text text-muted" >Enter size</small>

      </div>


        <div class="form-group">
         <label> About :</label>
         <textarea name ="outfit_about"class="form-control">{{$outfit->about}}</textarea>
        <small class="form-text text-muted" >Enter text</small>
      </div>


      <div class="form-group">

       <select name ="master_id"class="form-control">
    @foreach ($masters as $master)
    <option value="{{$master->id}}"@if($outfit->master_id == $master->id)selected @endif>{{$master->name}} {{$master->surname}}</option>
    @endforeach
       </select>
       <small class="form-text text-muted" >select master</small>
      </div>


        @csrf
        <button type="submit"class="btn btn-outline-warning">ADD</button>
        </form>
    </div>
    
    
             </div>
          </div>
       </div>
    </div>
    
    @endsection


 @section('title') OUTFIT EDIT @endsection