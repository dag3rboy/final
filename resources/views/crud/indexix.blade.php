<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container">
    <h4>add user</h4>

    @if(Session::get('success'))
        <div class="alert alert-success" style="color:green">
        {{ Session::get('success')}}
        </div>
    @endif
    @if(Session::get('fail'))
        <div class="alert alert-success" style="color:green">
        {{ Session::get('fail')}}
        </div>
    @endif
    <form action="add" method="post">
        @csrf
        <div>
        <input type="text" name="name" value="{{ old('name') }}"><br>
        <span style="color:red">@error('name'){{ $message }} @enderror</span></div>
        <div>
            <div>
            <input type="email" name="email" value="{{ old('email') }}"><br>
        <span style="color:red">@error('email'){{ $message }} @enderror</span></div>
        <div>
        <button type="submit">Submit Data</button>
    </form>
</div>
</body>
</html>