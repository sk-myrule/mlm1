<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    h1{
        background-color: rgb(186, 220, 241);
        border:2px solid darkcyan;
    
    }
    .container{
        display: flex;
        gap:30px;
        margin-left: 1%;
    }
   .contner{
        background-color: rgb(186, 220, 241);
        height: 200px;
        width: 25%;
        display: flex;
        text-align: center;
        align-items: center;
        border:2px solid darkcyan;
        justify-content: center;
      
    }
    a{
        text-decoration: none;
        color:black;
    }
</style>

<body>
    <center><h1>Hello User How are Your</h1></center>
    <br><br>
    <div class="container">
   <div class="contner">
    <a href="{{route('user.commition')}}">  Commition details </a>
    </div>
    <div class="contner">
        <a href="{{route('user.viewadduser')}}">  Add New Users </a>
    </div>
    <div class="contner">
        <a href="{{route('user.myusers')}}">  My Users </a>
    </div>
    <div class="contner">
        <a href="{{route('user.logout')}}"> Logout </a>
    </div>
</div>
<br>

</body>
</html>