
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/iCheck/flat/blue.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="//code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    body{
      /*background-image: url(<?php //echo base_url();?>assets/img/bg.jpg);*/
      background-repeat: no-repeat;
      background-position: center center;
      background-size: 50cm;
    }
    .jumbotron {
        padding: 5px;
        background: rgba(204, 204, 204, 0.7);
        
    }
  </style>
</head>
<body class="hold-transition">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="#"><span class="jumbotron text-red"><b>Admin</b></span></a> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login untuk masuk ke admin</p>

    <form action="" method="post" id="login_user">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" value="" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" value="" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <div class="col-xs-6">
            <a href="#">Lupa Password</a>
          </div>
          <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
          </div>
          <br>
          <br>
          <br>
          <div class="col-xs-12" id="info_login"></div>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/admin/iCheck/icheck.min.js"></script>
<script>

$("#login_user").on("submit",function(){
    $.ajax({
      url : '<?php echo base_url()?>/login/log_in',
      type : 'post',
      data : $(this).serialize(),
      beforeSend:function(){
        $("#info_login").fadeOut().html('<div class="alert alert-success alert-dismissible"><b>Loading...</div>').fadeIn();
      },
      success:function(e){
        if(e=='0'){
          $("#info_login").fadeOut().html('<div class="alert alert-danger alert-dismissible"><b>Perhatian!!!</b> email atau Password salah.</div>').fadeIn();
          
        }
        else if(e=='2')
        {
          $("#info_login").fadeOut().html('<div class="alert alert-warning alert-dismissible"><b>Warning!!!</b> Acount non active</div>').fadeIn();
          
        }
        else if(e=='1')
        {
          $("#info_login").fadeOut().html('<div class="alert alert-success alert-dismissible"><b>Berhasil!!!</b> Mohon tunggu...</div>').fadeIn();
          window.location.replace("<?php echo base_url()?>admin");
            
        }
      }
    })
  
    return false; 
  });
</script>
</body>
</html>
