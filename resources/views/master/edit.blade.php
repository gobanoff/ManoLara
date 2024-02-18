
<form action="{{route('master.update',$master)}}" method="post">

    Name: <input type="text" name="master_name"value = "{{$master->name}}">
    Surname: <input type="text" name="master_surname"value = "{{$master->surname}}">
    @csrf
    <button type="submit">EDIT</button>
    </form>

