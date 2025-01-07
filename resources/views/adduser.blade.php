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
        height: 300px;
        width: 30%;
        background-color: rgb(186, 220, 241);
        border:2px solid darkcyan;
        margin-top: 10%;
    }
    label{
        font-size: 15px;
    }
    select,input{
        height: 25px;
        width: 60%;
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
    <a href="{{url("/dashboard")}}">Dashboard</a>

    <center>
    <h1>Add User</h1>

        <form action="{{route('user.adduser')}}" method="post">

        @csrf
        <b>{{session("message")}}</b>
        <br>
        <div class="myinput">
            <label for="">Name</label><br>
            {{auth()->user()->user_role === "A"}}
            <input type="hidden" name="id" value="{{auth()->user()->id}}">
            <input type="text" name="name" >
            <div class="errec">@error('name'){{$message}}@enderror</div>
        </div>
        <div class="myinput">
            <label for="">Email</label><br>
            <input type="text" name="email">
            <div class="errec">@error('amount')({{$message}})@enderror</div>
        </div>
        <div class="myinput">
            <label for="">package</label><br>
            <select name="package" id="" required>
                @foreach ($amount as $am)
                    <option value="{{$am->amount}}">{{$am->amount}}</option>
                @endforeach
            </select>
        </div>
        <div class="myinput">
            <label for="">Position</label><br>
            <select name="position" id="" required>
                @php
                $leftShown = false;  // To track if 'left' option has been shown
                $rightShown = false; // To track if 'right' option has been shown
            @endphp
            
            @foreach ($left as $lt)
                @if (!$leftShown && $lt->position !== 'left')
                    <option value="left">left</option>
                    @php $leftShown = true; @endphp  <!-- Set the flag to true once 'left' is shown -->
                @endif
            
                @if (!$rightShown && $lt->position !== 'right')
                    <option value="right">right</option>
                    @php $rightShown = true; @endphp <!-- Set the flag to true once 'right' is shown -->
                @endif
                @if ($leftShown && $rightShown)
                @break; <!-- Break the loop once both 'left' and 'right' have been shown -->
            @endif
            @endforeach
            
            
            </select>
            <div class="errec">@error('amount')({{$message}})@enderror</div>
        </div>
        <div class="myinput">
            <label for="">password</label><br>
            <input type="text" name="password">
            <div class="errec">@error('amount')({{$message}})@enderror</div>
        </div>
        <br>
      <button type='submit'>Submit</button>
    </form>
    
</center>
</body>
</html>