<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/style.css">
</head>
<body>
    <div class="container">
          <div class="col-md-4 mx-auto center">
            <p>Welcome to Our Apps, Sign Up for Free</p>
                <h1 class='h1'>User LogIn</h1> <br>
                <form method='POST' action='User/login'>
                <table class='table table-condensed table-hover'>
                    <tbody>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td> <input type="text" name='email' class='form-control'> </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td> <input type="text" name='password' class='form-control'> </td>
                        </tr>
                    </tbody>
                </table>
                <button class='btn btn-default'><i class='glyphicon glyphicon-log-in'></i> LogIn</button> or 
                <button class='btn btn-default'><i class='glyphicon glyphicon-pencil'></i> Register</button>
                </form>
          </div>
    </div>
</body>
</html>