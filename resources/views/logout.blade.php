
<!DOCTYPE html>
<html>
<head>
    <title>Logout Form</title>
    <style>
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    <body>
    <h1>Logout</h1>
    <form action="{{route("logout")}}" method="post">
        @csrf
        <p>Are you sure you want to log out?</p>
        <input type="submit" value="Logout">
    </form>
    </body>
    </html>
