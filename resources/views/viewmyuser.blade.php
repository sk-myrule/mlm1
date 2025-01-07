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
    table{
        border:2px solid darkcyan;
        width: 100%;
        background-color: rgb(235, 244, 248);
    }

    th{
        font-size: 130%;
        background-color: rgb(186, 220, 241);
    }

    td{
        text-align: center;
    }
    .contenot{
        /* height: 40px; */
        display: flex;
        gap:20px;

    }
    .myclass{
        background-color: rgb(186, 220, 241);
        border:2px solid darkcyan;
        height: 200px;
        width: 30%;
        margin-left: 10%;
        font-size: 18px;
        font-weight: 2px solid black;
        /* text-align: center; */
    }

</style>
<body>
    <b>{{session("message")}}</b>

    <a href="{{url("/dashboard")}}">Dashboard</a>
    <h1>View Commition Details</h1>
    {{-- <table>
        <th>#</th>
        <th>name</th>
        <th>email</th>
        <th>position</th>
        <th>amount</th>
        <th>date</th>
        <?php// $tmp=1; ?>
        @foreach ($user as $v)
        SELECT `id`, `name`, `email`, `sponcer_id`, `position`, `user_role`, `commition`, `entry_fee`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at` FROM `users` WHERE 1
        <tr> --}}
            
            {{-- <td>{{$tmp++;}}</td>
            <td>{{$v->amount}}</td>
            <td>{{$v->date}}</td> --}}
           
        {{-- </tr>
        @endforeach
    </table> --}}
    <div class="contenot">
        @foreach ($user as $v)
    <div class="myclass">
        name :   {{$v->name}} 
        <br>
        Emil :   {{$v->email}}
        <br>
        Position :   {{$v->position}} 
        <br>
        Commition :   {{$v->commition}}
        <br>
        Entry fees :   {{$v->entry_fee}} 
        <br>
        Date :   {{$v->created_at}}
        <br>
        Total user :   {{$user->total_user}}
    </div>
@endforeach

    {{-- <div class="myclass">
        name : 
        <br>
        Emil :
        <br>
        Position : 
        <br>
        Commition :
        <br>
        Entry fees : 
        <br>
        Date :
    </div> --}}
</div>
</body>
</html>