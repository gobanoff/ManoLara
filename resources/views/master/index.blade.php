

@foreach ($masters as $master)
   <a href="{{route('master.edit',$master)}}"> {{$master->name}} {{$master->surname}}</a>
   <form action="{{route('master.destroy',$master)}}" method="post">

    
    @csrf
    <button type="submit">DELETE</button>
    </form>
   
   <br>



@endforeach


