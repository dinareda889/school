
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <?php 
            if($this->fungsi->company_data()->image){
  $company_image =   base_url('uploads/main/'.$this->fungsi->company_data()->image);
}else{
   $company_image =  base_url('assets/dist/img/AdminLTELogo.png');   
}
            if($this->fungsi->company_data()->nameweb){
  $company_name =   $this->fungsi->company_data()->nameweb;
}else{
   $company_name =  'My Company ';   
}

?>
  
  <title> <?=$company_name?>| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets//plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets//plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets//dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
     <link rel="icon" type="image/png" href="<?=$company_image?>" />
     
      <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/custom.css">
</head>

 <style> .img_login {
    opacity: .8;
    /*width: 100px;*/
    max-height: 60px;
    margin: 0 auto;
  margin-top: 60px;
    display: block;
    float: none !important;
  margin-bottom: 1em;
}
     .login-page {
         background: url("<?=base_url()?>assets/image-3.jpg");
         background-size: cover;
     }
 </style>
<body class="hold-transition login-page" >
<div class="login-box">
  <img src="<?=$company_image?>" alt="" class="brand-image   elevation-3 img_login" >
  
  
    <div class="login-logo">
 
    <a href="#" style="color: white;"><b> <?=$company_name?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">تسجيل الدخول</p>

      <form action="<?=site_url('Auth/process')?>" method="post">
      
      
 
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="إسم المستخدم">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
      
          <!-- /.col -->
            <div class="col-md-4 text-center">
            <button type="submit" name="login" class="btn btn-primary btn-block mb-3 text-center" style="    margin-right: 92px;
    margin-top: 20pX;">دخول</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<!--<p class="mb-1">
        <a href="<?/*=base_url()*/?>/Email_send/new_send">نسيت كلمة المرور</a>
      </p>-->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets//plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets//dist/js/adminlte.min.js"></script>

</body>
</html>
