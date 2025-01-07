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
        margin-left: 10%;
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
        font-size:2px bold;
      
    }
    a{
        text-decoration: none;
        color:black;
    }
    @media (max-width: 768px) {
    h1 {
        font-size: 20px; /* Adjust font size for mobile */
    }
}
</style>

<body>
    <center><h1>Hello Admin How are Your</h1></center>
    <br><br>
    <div class="container">
   <div class="contner">
    <a href="{{route('admin.viewcom')}}">   Package Information Details </a>
    </div>
    <div class="contner">
        <a href="{{route('admin.adduser')}}">  Add New Users </a>
    </div>
    <div class="contner">
        <a href="{{url('admin/viewcom')}}"> View Commition  </a>
    </div>
</div>
<br>
<div class="container">
    <div class="contner">
        <a href="{{url('admin/view_leftandright')}}">View users my</a>
    </div>
    <div class="contner">
        Add n Amount
    </div>
    <div class="contner">
        <a href="{{route('admin.logout')}}"> Logout </a>
    </div>
</div>
</body>
</html>