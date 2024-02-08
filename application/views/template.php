<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    if ($this->fungsi->company_data()->image) {
        $company_image = base_url('uploads/main/' . $this->fungsi->company_data()->image);
    } else {
        $company_image = base_url('assets/dist/img/AdminLTELogo.png');
    }
    if ($this->fungsi->company_data()->nameweb) {
        if ($this->session->has_userdata('set_lang')) {
            $set_lang = $this->session->userdata('set_lang');
        } else {
            $set_lang = 'english';
        }
        if($set_lang == 'english'){
            $company_name = $this->fungsi->company_data()->nameweb_en;

        }else{
            $company_name = $this->fungsi->company_data()->nameweb;

        }
    } else {
        $company_name = 'My Company ';
    }
    /*$company_image = base_url('assets/dist/img/AdminLTELogo.png');*/
    ?>
    <title><?= $company_name ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$company_image?>">
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">-->

<!--    <link rel="stylesheet" href="--><?//= base_url() ?><!--assets/dist/css/dataTables.bootstrap4.min-ar.css">-->



    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min-ar.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>

        .russian{
            display: none;
        }
    </style>
    <!--    <link rel="icon" type="image/png" sizes="16x16" href="-->
    <? //=base_url()?><!--/assets/login/img/favicon.png">-->
    <!-- Bootstrap 4 RTL -->
    <!-- Custom style for RTL -->
    <?php
    if ($set_lang == 'english') {
        ?>
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/dataTables.bootstrap4.min-en.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/custom-en.css">
        <link href="<?= base_url() ?>assets/plugins/form-validator/theme-defaulten.css" rel="stylesheet">


    <?php } else { ?>
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/dataTables.bootstrap4.min-ar.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/custom-ar.css">
        <link href="<?= base_url() ?>assets/plugins/form-validator/theme-defaultar.css" rel="stylesheet">


        <style>
            .bootstrap-select.bs-container .dropdown-menu {
                z-index: 1060;
                left: auto !important;
            }

        </style>
    <?php } ?>
<!--    <link rel="stylesheet" href="--><?//= base_url() . 'assets/' ?><!--sweet_alert1/sweetalert.css">-->
    <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>sweet_alert2/sweetalert2.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>sweet_alert2/sweetalert2.min.css">

</head>
<body class="hold-transition sidebar-mini text-sm layout-fixed <?= $this->uri->segment(1) == 'Sale' ? 'sidebar-collapse' : null ?>">
<!-- Site wrapper -->
<div class="wrapper">
    <nav id="main" class="main-header navbar navbar-expand navbar-white navbar-light navbar-infos text-sm"
         style="margin-left: auto;">
        <ul class="navbar-nav">
            <?php if ($this->session->has_userdata('set_lang')) {
                $set_lang = $this->session->userdata('set_lang');
            } else {
                $set_lang = 'english';
            }
            if ($set_lang == 'english') {
                $class_en = 'active';
                $class_ar = '';
                $lang_text='english';
                $lang_img=base_url().'assets/dist/img/translate/icons8-usa-21.png';
            } else {
                $class_ar = 'active';
                $class_en = '';
                $lang_text='العربية';
                $lang_img=base_url().'assets/dist/img/translate/icons8-united-arab-emirates-21 (1).png';

            } ?>

            <li class="nav-item">
                <a class="nav-link" id="link_test" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars blue-clr"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <ul class="navbar-nav  ">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <!--<i class="fas fa-language lang-dir"></i>-->
                        <img src="<?=$lang_img?>">
                        <?=$lang_text?>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/arabic' ?>"
                           class="dropdown-item <?= $class_ar ?>">
                            <!--<i class="fas fa-globe mr-2"></i>-->
                            <img src="<?=base_url().'assets/dist/img/translate/icons8-united-arab-emirates-21 (1).png'?>">
                            العربية
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/english' ?>"
                           class="dropdown-item <?= $class_en ?>">
                            <!--  <i class="fas fa-globe mr-2"></i>-->
                            <img src="<?=base_url().'assets/dist/img/translate/icons8-usa-21.png'?>">
                            English
                        </a>
                    </div>
                </li>
                <?php
                $user_data = $this->fungsi->user_login();
                if ($user_data->image != null) {
                    $user_image = base_url('uploads/user/' . $user_data->image);
                } else {
                    $user_image = base_url('assets/login/img/favv.png');
                } ?>
                <li class="nav-item dropdown user user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                        <span class="hidden-xs"><?= $user_data->name; ?></span>
                        <img src="<?= $user_image ?>"
                             class="user-image img-circle elevation-2 blue-clr" alt=" User Image">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="<?= $user_image?>" class="img-circle elevation-2"
                                 alt="User Image">
                            <p>
                                <?= ucfirst($user_data->name); ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!-- <div class="pull-left">
                               <a href="#" class="btn btn-default btn-flat">Profile</a>
                             </div>-->
                            <div class="pull-right">
                                <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat"
                                   style="background: #007bff; color: white;"><?=translate('Logout')?></a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url() ?>Dashboard" class="brand-link  text-sm">
            <img src="<?= $company_image?>"
                 alt=""
                 class="brand-image img-circle elevation-3"
                 style="opacity: 1; float: right;">
            <span class="brand-text font-weight-light"><?= $company_name ?>
                <?php
                /*     if(isset($this->fungsi->company_data()->fax) and $this->fungsi->company_data()->fax != null){
                         echo $this->fungsi->company_data()->fax;
                     }
                     echo $this->fungsi->company_data()->image
             */
                ?>
      </span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <!-- Sidebar Menu -->
            <?php
            if ($_SESSION['level'] == 1) {
                $this->load->view('sides/super');
                ?>
            <?php } elseif ($_SESSION['level'] == 2) {
                 $this->load->view('sides/super');
            } else {
            }
            ?>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <div class="content-wrapper" style="margin-left: auto;">
        <!-- Content Header (Page header) -->
        <!-- .noti -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css"
              integrity="sha256-p+PhKJEDqN9f5n04H+wNtGonV2pTXGmB4Zr7PZ3lJ/w=" crossorigin="anonymous"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.js"
                integrity="sha256-xzc5zu2WQtJgvCwRGTXiHny3T+KQZa6tQF24RVDRlL0=" crossorigin="anonymous"></script>
        <style>
            .btn-space {
                margin: 5px;
            }
            .table-bordered.dataTable th, table.table-bordered.dataTable td {
                border-left-width: 1px;
            }
        </style>
        <span id="message">

</span>
        <script>
            <?php if($this->session->flashdata('success') || $this->session->flashdata('error')){
            $msg = $this->session->flashdata('success') ? 'success' : 'error';
            /*            print_r($this->session->flashdata());*/
            ?>
            let n = new Noty({
                theme: 'metroui'
                , text: '<?= $this->session->flashdata($msg) ?>'
                , layout: 'topRight'
                , type: "<?= $msg ?>"
                , timeout: 1500
                , killer: true
            });
            n.show();
            <?php } ?>
        </script>
        <!-- /.noti -->
        <?php
        /*
        if($user_data->level == 1){
            echo 'Admin you';
        }*/
        ?>
        <!-- Main content -->
        <?php echo $contents ?>
        <!-- /.content -->


        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer d-print-none" style="margin-left: auto;">
        <div class="float-right d-none d-sm-block">
        </div>
      <!--  <strong> &copy; <?/*= date('Y'); */?>جميع الحقوق محفوظة تم التطوير بواسطة
            <a target="_blank" href="#"> المهندسة دينا رضا </a>.</strong>-->
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<!--<script src="--><? //= base_url() ?><!--assets/plugins/ckeditor/build/ckeditor.js"></script>-->
<!--<script src="--><? //= base_url() ?><!--assets/plugins/ckeditor-full/ckeditor5/build/ckeditor5-dll.js"></script>-->
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote();
    });
</script>

<script src="<?= base_url() ?>assets/plugins/form-validator/jquery.form-validator.js"></script>

<script src="<?= base_url() . 'assets/' ?>sweet_alert1/sweetalert.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table1_').DataTable({"dom": 'Bfrtip', destroy: true});
        $('.example').DataTable({"dom": 'Bfrtip',"buttons": ['pageLength'], destroy: true});
    });
</script>
<script src="<?= base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<script  src="<?= base_url() . 'assets/' ?>sweet_alert2/sweetalert2.js"></script>
<script  src="<?= base_url() . 'assets/' ?>sweet_alert2/sweetalert2.all.js"></script>
<script  src="<?= base_url() . 'assets/' ?>sweet_alert2/sweetalert2.all.min.js"></script>
<!--<script src="--><? //= base_url() ?><!--assets/dist/js/pages/dashboard2.js"></script>-->

<script>
    /* $(document).ready(function() {
         $('.checkbox_toggle').bootstrapToggle({
             on: 'نشط',
             off: 'غير نشط'
         });
     } );*/
</script>



<script>
    $(document).ready(function () {
        $('#link_test').trigger('click');
    });
</script>

<script>
    function update_seen(elem) {
        console.log($(elem).data('id'));
        console.log(elem.dataset.id);
        $.ajax({
            url: '<?php echo site_url('Dashboard/update_seen');?>',
            type: "POST",
            data: {id: elem.dataset.id},
            cache: false,
            beforeSend: function () {
                Swal.fire({
                    showConfirmButton: false,
                    imageUrl: 'https://media.tenor.com/C7KormPGIwQAAAAi/epic-loading.gif',
                    imageWidth: 200,
                    imageHeight: 200,
                    target: '#ConvertModalInfo',
                    imageAlt: '<?=translate('loading')?>',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            },
            success: function (data) {
                Swal.close();
                location.href = elem.dataset.relate_link;
            }
        });
    }
</script>
<script src='<?= base_url() ?>assets/plugins/intense/intense.js'></script>
<script>
    window.onload = function() {
        var elements = document.querySelectorAll( '.intense' );
        Intense( elements );
    }
</script>

<!--<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>-->
<!--<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/super-build/ckeditor.js"></script>-->
<!--<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/decoupled-document/ckeditor.js"></script>-->
<!--<script src="https://cdn.ckeditor.com/4.20.0/full-all/ckeditor.js"></script>-->
</body>
</html>
