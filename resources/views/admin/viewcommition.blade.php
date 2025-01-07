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
</style>
<body>
    <b>{{session("message")}}</b>

    <a href="{{route("admin.addcom")}}">add</a>&nbsp;&nbsp;
    <a href="{{url("admin/dash")}}">Dashboard</a>
    <h1>View Commition Details</h1>
    <table>
        <th>#</th>
        <th>name</th>
        <th>amount</th>
        <th>date</th>
        <th>action</th>
        <?php $tmp=1; ?>
        @foreach ($view as $v)
            
        <tr>
            <td>{{$tmp++;}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->amount}}</td>
            <td>{{$v->created_at}}</td>
            <td>
                <a href="{{route('admin.editcom',$v->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>