<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
   img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover; /* Optional */
}
    button{

    }
</style>
<body>
    <a href="{{ route('register') }}"><button>Register</button></a>
                    <a href="{{ route('login') }}"><button>login</button></a>
                    <img src="{{ asset('storage/mlm.webp') }}" alt="MLM Image">

</body>
</html>