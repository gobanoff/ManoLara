





    @extends('layouts.app')
    @section('content')
    
    <div class="container">
       <div row justify-content-center>
          <div class="col-md-8">
             <div class="card">
    
         <div class="card-header">OUTFIT CREATE</div>
         <div class="card-body"><form action="{{route('outfit.store')}}" method="post">

            Type: <input type="text" name="outfit_type">
            Color: <input type="text" name="outfit_color">
            Size: <input type="text" name="outfit_size">
            About: <textarea name ="outfit_about"></textarea>
           <select name ="master_id">
        @foreach ($masters as $master)
        <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
        @endforeach
           </select>
        
            @csrf
            <button type="submit">ADD</button>
            </form></div>
    
    
             </div>
          </div>
       </div>
    </div>
   
    @endsection