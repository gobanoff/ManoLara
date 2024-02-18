

@foreach ($outfits as $outfit)
   <a href="{{route('outfit.edit',[$outfit])}}"> {{$outfit->type}} {{$outfit->color}}</a>
{{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}
   
   <form action="{{route('outfit.destroy',[$outfit])}}" method="post">

    
    @csrf
    <button type="submit">DELETE</button>
    </form>
   
   <br>



@endforeach




