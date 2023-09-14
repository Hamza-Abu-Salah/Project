
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>

    <!-- Favicon -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Login To Stay Connected</p>

                        <!-- Form -->
                        <form action="/admin/login" method="post">
                            @csrf
                            <div class="form-group">
                                <input name="email" class="form-control" type="email" placeholder="Email">
                                @if(session('error'))
                                <span class="text-danger">Email or password not matched</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Password">
                            </div>
                            <div class="form-group text-center">
                                <button class=" btn-login btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="/assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="/assets/js/script.js"></script>

</body>
</html>
