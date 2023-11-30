<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        .body {
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: blur(10px);
            height: 100%;
            background-image: url(https://coolbackgrounds.io/images/unsplash/samuel-zeller-medium-b832fe04.jpg);
        }

        form {
            border: 3px solid #e5e7eb;
            color: #e5e7eb;
            background-color: #181717;
            width: 50%;
            margin: auto;
        }

        input[type=email], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 2px solid #33774b;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        h1 {
            margin-left: 10px;
            text-align: center;
            color: #e2e8f0;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancel {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 250px;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }
        .all-body{
            margin-top: -30px;
        }
        span.psw {
            float: right;
            padding-top: 16px;
        }

        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancel {
                width: 100%;
            }
        }
    </style>
</head>
<body class="body">
<div class="all-body">
<form action="{{route("login")}}" method="POST">
    @csrf
    <div class="imgcontainer">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1DDuhhHz2q4iKvHFCKeSu_ozpukl7vuPE_w&usqp=CAU"
             alt="Avatar" class="avatar">
        <h1>Login</h1>
    </div>
    <div class="container">
        <label for="email"><b>Email</b></label>
        <label>
            <input type="email" placeholder="Enter Email" name="email">
            @error("email")
            <p style="color: #f44336">{{$message}}</p>
            @enderror
        </label>
        <label for="password"><b>Password</b></label>
        <label>
            <input type="password" placeholder="Enter Password" name="password">
            @error("password")
            <p style="color: #f44336">{{$message}}</p>
            @enderror
        </label>
        <button type="submit">Login</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancel">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>
</div>
</body>
</html>
