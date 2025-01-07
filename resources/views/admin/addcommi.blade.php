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
        text-align: center;
    }
    form{
        height: 200px;
        width: 30%;
        background-color: rgb(186, 220, 241);
        border:2px solid darkcyan;
        margin-top: 10%;
    }
    label{
        font-size: 15px;
    }
    input{
        height: 25px;
        width: 240px;
    }
    button{
        height: 30px;
        background-color:darkcyan;
        color:white;
    }
    b{
        color:darkcyan;
    }
</style>
<body>
    <center>
    <h1>Add Commition</h1>
    <form action="{{route("admin.submitaddcom")}}" method="post">
        @csrf
        <b>{{session("message")}}</b>
        <br>
        <div class="myinput">
            <label for="">Name</label><br>
            <input type="text" name="name" value="{{old("name")}}">
            <div class="errec">@error('name'){{$message}}@enderror</div>
        </div>
        <div class="myinput">
            <label for="">Amount</label><br>
            <input type="text" name="amount" value="{{old("amount")}}">
            <div class="errec">@error('amount')({{$message}})@enderror</div>
        </div>
        <br>
      <button type='submit'>Submit</button>
      <a href="{{route('admin.viewcom')}}">Back</a>
    </form>
    
</center>
</body>
</html>