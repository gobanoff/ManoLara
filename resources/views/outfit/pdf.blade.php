<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$outfit->color}}{{$outfit->type}}</title>


 <style>

    .list2 {
        color: rgb(214, 181, 13);
        font-size: 22px;
        padding-top: 20px;
        font-style: italic;
    }
    .list3 {
        border: 1px solid black;
       
        margin-top: 5px;
        width: 25px;
        height: 25px;
     }
    .show1 {
    text-transform: capitalize;
    font-size: 18px;
    font-weight: 700;
    font-style: italic;
    color: rgb(226, 43, 43);
    }
</style>
</head>
<body>
    <h1>{{$outfit->type}}</h1>
    <div class="card-body"> 
         
        <div class="list1">

           <div class="show">  Color : <b class="show2"> {{$outfit->color}} </b> 
           <div class="list3"style="background:{{$outfit->color}} ;"></div></div>
         
           <div class="show">  Size : <b class="show1">{{$outfit->size}} </b></div>
           <div class="show"> {{$outfit->type}} Master : 
           <b class="show1">{{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}</b></div>

        </div>

        <div class="list2">{{$outfit->about}}</div>
       




     </div>  





</body>
</html>