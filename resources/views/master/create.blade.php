
<form action="{{route('master.store')}}" method="post">

Name: <input type="text" name="master_name">
Surname: <input type="text" name="master_surname">
@csrf
<button type="submit">ADD</button>
</form>


