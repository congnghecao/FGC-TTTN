<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="ThemeAdmin/css/main.css">
    <link rel="stylesheet" type="text/css" href="ThemeAdmin/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login || Quản lý nhân sự</title>
</head>
<body>
@yield('login')
<!-- Essential javascripts for application to work-->
<script src="ThemeAdmin/js/jquery-3.2.1.min.js"></script>
<script src="ThemeAdmin/js/popper.min.js"></script>
<script src="ThemeAdmin/js/bootstrap.min.js"></script>
<script src="ThemeAdmin/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="ThemeAdmin/js/plugins/pace.min.js"></script>
<script type="text/javascript">
    // login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>