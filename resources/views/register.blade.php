<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
            .body {
                background-size: cover;
                background-repeat: no-repeat;
                backdrop-filter: blur(10px);
                background-image: url(https://coolbackgrounds.io/images/unsplash/samuel-zeller-medium-b832fe04.jpg);
                height: 100%;
            }
        form {
            border: 3px solid #e5e7eb;
            background-color: #181717;
            color: #e5e7eb;
            width: 50%;
            margin: auto;
        }
        input[type=text], input[type=tel], input[type=email], input[type=password], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 2px solid #e5e7eb;
            box-sizing: border-box;
        }
        h1{
            margin-right: 30px;
            text-align: center;
            color: #e2e8f0;
            width: 10%;
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
        button:hover {
            opacity: 0.8;
        }
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }
        img.avatar {
            width: 250px;
            border-radius: 50% ;
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
        }
    </style>
</head>
<body class="body">
<div class="all-body">
<form action="{{route("register")}}" method="POST">
    @csrf
    <div class="imgcontainer">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1DDuhhHz2q4iKvHFCKeSu_ozpukl7vuPE_w&usqp=CAU" alt="Avatar" class="avatar">
    </div>
    <center>
        <h1>Register</h1>
    </center>
    <div class="container">
        <label for="name"><b>Name</b></label>
        <label>
            <input type="text" placeholder="Enter Name" name="name">
            @error("name")
            <p style="color: #f44336">{{$message}}</p>
            @enderror
        </label>
        <label for="family"><b>Family Name</b></label>
        <label>
            <input type="text" placeholder="Enter Family Name" name="family">
            @error("family")
                <p style="color: #f44336">{{$message}}</p>
            @enderror
        </label>
        <label for="number"><b>Phone Number</b></label>
        <label>
            <input type="tel" placeholder="Enter Phone Number" name="number">
            @error("number")
            <p style="color: #f44336">{{$message}}</p>
            @enderror
        </label>
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
        <label for="password_confirmation">Confirm Password</label>
        <label>
            <input type="password" placeholder="Repeat Your Password" name="password_confirmation">
            @error("password_confirmation")
            <p style="color: #f44336">{{$message}}</p>
            @enderror
        </label>
        <button type="submit">Register</button>
    </div>
</form>
</div>
</body>
</html>
