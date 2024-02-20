
    @extends('layouts.app')
    @section('content')
    
    <div class="container">
       <div row justify-content-center>
          <div class="col-md-8">
             <div class="card">
    
         <div class="card-header">OUTFIT CREATE</div>
         <div class="card-body"><form action="{{route('outfit.store')}}" method="post">
            <div class="form-group">

            <label> Type :</label>
            <input type="text" name="outfit_type"class="form-control">
            <small class="form-text text-muted" >Enter type</small>
         </div>
         <div class="form-group">

            <label> Color :</label>
             <input type="text" name="outfit_color"class="form-control">
            <small class="form-text text-muted" >Enter color</small>
         </div>
         <div class="form-group">

            <label> Size :</label>
             <input type="text" name="outfit_size"class="form-control">
             <small class="form-text text-muted" >Enter size</small>

         </div>
         <div class="form-group">
            <label> About :</label>
             <textarea name ="outfit_about"class="form-control"></textarea>
            <small class="form-text text-muted" >Enter text</small>
         </div>

         <div class="form-group">

           <select name ="master_id"class="form-control">
        @foreach ($masters as $master)
        <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
        @endforeach
           </select>
           <small class="form-text text-muted" >select master</small>
         </div>

            @csrf
            
            <button type="submit"class="btn btn-outline-warning">ADD</button>
         
            </form></div>
    
    
             </div>
          </div>
       </div>
    </div>
   
    @endsection


    @section('title')OUTFIT CREATE @endsection