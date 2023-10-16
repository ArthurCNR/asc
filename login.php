<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Entrar - MyCar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" type="image/png" href="favicon.png" />

    <script src="js/modernizr.js"></script>
    <script src="js/jquery.js"></script>

</head>
<body>
<div id="login-form-wrap">
    <h2>Login</h2>
    <form
    id="login-form"
    role="form"
    method="post"
    action="php/logon.php"
    >
        <p>
            <input type="text" id="username" name="username" placeholder="admin" required><i class="validation"><span></span><span></span></i>
        </p>
        <p>
            <input type="password" id="password" name="password" placeholder="admin123" required><i class="validation"><span></span><span></span></i>
        </p>
        <p>
            <input type="submit" id="login" value="Entrar">
        </p>
        <div class="login-form-response" id="lfResponse"></div>
    </form>
</div>

<!-- Javascript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/loader.js"></script>
<script src="js/parallax.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>
</html>