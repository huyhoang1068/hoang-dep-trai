<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="unique login form,leamug login form,boostrap login form,responsive login form,free css html login form,download login form">
    <meta name="author" content="leamug">
    <title>ĐĂNG NHẬP HỆ THỐNG</title>
    <link href="css/style.css" rel="stylesheet" id="style">
    <!-- Bootstrap core Library -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <!-- Font Awesome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        /*author:starttemplate*/
        /*reference site : starttemplate.com*/
        body {
            background-image: url('<?=BASE_URL?>/template/admin/images/BG.jpg');  /*https://i.redd.it/o8dlfk93azs31.jpg*/
            background-position:center top;
            background-size:cover;
            background-repeat: no-repeat;
        }

        .container {
            padding: 110px;
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #ffffff!important;
            opacity: 1; /* Firefox */
            font-size:18px!important;
        }
        .form-login {
            background-color: rgba(99,44,23,0.5);
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 15px;
            border-color:#d2d2d2;
            border-width: 5px;
            color:white;
            box-shadow:0 1px 0 #cfcfcf;
        }
        .form-control{
            background:transparent!important;
            color:white!important;
            font-size: 18px!important;
        }
        h1{
            color:white!important;
        }
        h4 { 
            border:0 solid #fff; 
            border-bottom-width:1px;
            padding-bottom:10px;
            text-align: center;
        }

        .form-control {
            border-radius: 10px;
        }
        .text-white{
            font-family: Fantasy;
            font-size: 50px;
            text-shadow: 2px 1px 2px #ff7101;
            color: white!important;
        }
        .wrapper {
            text-align: center;
        }
        .footer p{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-5 text-center">
                <h1 class='text-white'>ADMIN</h1>

                <?php include "error.php"; ?>

                <form class="form-login" action="" method="post"></br>         
                    <h4>Dragon Ball - Figure</h4>
                    </br>
                    <input type="text" id="userName" name="username" class="form-control input-sm chat-input" placeholder="username"/>
                    </br></br>
                    <input type="password" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="password"/>
                    </br></br>
                    <div class="wrapper">
                            <span class="group-btn">
                                <input class="btn btn-danger btn-md" type="submit" value="Login" name="login"/>
                            </span>
                    </div>
                </form>
            </div>
        </div>
        </br></br></br>
        <!--footer-->
        <div class="footer text-white text-center">
            <p></a></p>
        </div>
        <!--//footer-->
    </div>   
</body>
</html>