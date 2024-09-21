
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Login </title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />

</head>
<body>

<div class="mainClass">
    <div class="wrapper">
        <div class="title">
            Login Form
        </div>
        <form action="{{url('login')}}" method="post">
            {{csrf_field()}}
            <div class="field">
                <input type="text" name="email" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="pass-link">
                    <router-link to="/admin/forget">Forgot password?</router-link>
                </div>
            </div>
            <button type="submit"  class="btn btn-success">Login</button>
            <div class="signup-link">
                Not a member? <router-link to="/admin/register">Signup now</router-link>
            </div>
        </form>
    </div>
</div>
</body>
</html>
