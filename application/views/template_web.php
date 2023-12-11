<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    if ($this->session->has_userdata('set_lang')) {
        $set_lang = $this->session->userdata('set_lang');
    } else {
        $set_lang = 'english';
    }
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

        }elseif($set_lang == 'russian'){
            $company_name = $this->fungsi->company_data()->nameweb_ru;

        }else{
            $company_name = $this->fungsi->company_data()->nameweb;

        }
    } else {
        $company_name = 'MADA\'IN Properties';
    }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description"
          content="<?=$this->company_data->metatext?>"/>
    <meta name="author" content="Madain Properties">
    <meta name="msvalidate.01" content="D833B4C3E519991F1F6DDEB57D2EDDB6">
    <meta name="keywords"
          content="<?=$this->company_data->keywords?>">
<!--    <title>MADA'IN Properties</title>-->
    <title><?= $company_name ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="content-type" content="text/html">
    <link rel="canonical" href="<?=base_url()?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content='<?=$company_name?>'>
    <meta property="og:description" content=' Madain Properties'>
    <meta property="og:url" content="<?=base_url()?>">
    <meta property="og:site_name" content="<?=$company_name?>">
    <meta property="article:tag" content="facebook">
    <meta property="article:section" content="Advice">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$company_image?>">

    <!-- Custom CSS -->
    <?php if ($this->session->has_userdata('set_lang')) {
                            $set_lang = $this->session->userdata('set_lang');
                        } else {
                            $set_lang = 'english';
                        }

                        ?>
    <?php if($set_lang == 'english' || $set_lang == 'russian'){ ?>
        <link href="<?= base_url() . 'assets_web/css' ?>/styles.css" rel="stylesheet">

    <?php }else{ ?>
        <link href="<?= base_url() . 'assets_web/css' ?>/styles.css" rel="stylesheet">
        <link href="<?= base_url() . 'assets_web/css' ?>/style-rtl.css" rel="stylesheet">
    <?php } ?>
    <link href="<?= base_url() . 'assets_web/css' ?>/responsive.css" rel="stylesheet">
<!--    <link href="--><?//= base_url() . 'assets_web/fontawesome/css/' ?><!--all.css" rel="stylesheet">-->

    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets_web/jssocials' ?>/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets_web/jssocials' ?>/jssocials-theme-plain.css" />

    <!-- <link href="<?= base_url() . 'assets_web/css' ?>/Style-rtl.css" rel="stylesheet"> -->
</head>

<body>

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
<!--<script>
    <?php /*if($this->session->flashdata('success') || $this->session->flashdata('error')){
    $msg = $this->session->flashdata('success') ? 'success' : 'error';
    /*            print_r($this->session->flashdata());*/
        ?>
    let n = new Noty({
        theme: 'metroui'
        , text: '<?/*= $this->session->flashdata($msg) */?>'
        , layout: 'topRight'
        , type: "<?/*= $msg */?>"
        , timeout: 1500
        , killer: true
    });
    n.show();
    <?php /*} */?>
</script>-->
<style>
    .jssocials-share-link:hover, .jssocials-share-link:focus, .jssocials-share-link:active {
        border: none;
        color: #9b6505;
    }
    .jssocials-share-link {

        border-radius: unset;
        border: none;
</style>
<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>

<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header header-transparent change-logo">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                    <a class="nav-brand static-logo" href="<?=base_url()?>"><img
                                src="<?= base_url() . 'assets_web/img' ?>/logo-light.png" class="logo"
                                alt="images"/></a>
                    <a class="nav-brand fixed-logo" href="<?=base_url()?>"><img
                                src="<?= base_url() . 'assets_web/img' ?>/logo.png" class="logo" alt="images"/></a>
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper" style="transition-property: none;">
                    <ul class="nav-menu">
                        <?php if ($this->session->has_userdata('set_lang')) {
                            $set_lang = $this->session->userdata('set_lang');
                        } else {
                            $set_lang = 'english';
                        }
                        if ($set_lang == 'english') {
                            $class_en = 'active';
                            $class_ar = '';
                            $class_ru = '';
                            $lang_text=translate_web('English');
                        } elseif($set_lang == 'arabic') {
                            $class_ar = 'active';
                            $class_en = '';
                            $class_ru = '';
                            $lang_text=translate_web('Arabic');

                        }else{
                            $class_ru = 'active';
                            $class_en = '';
                            $class_ar = '';
                            $lang_text=translate_web('Russian');

                        }
                        ?>

                        <li class="<?= $this->uri->segment(1) == 'Web' || $this->uri->segment(1) == '' ? "active" : '' ?>"><a href="<?=base_url()?>"><?=translate_web('Home')?></a></li>

                        <li class="<?= $this->uri->segment(1) == 'about_us' ? "active" : '' ?>"><a href="<?=base_url()?>about_us"><?=translate_web('About')?></a></li>

                        <li class="<?= $this->uri->segment(1) == 'projects' || $this->uri->segment(1) == 'one_project' ? "active" : '' ?>"><a href="<?=base_url()?>projects"><?=translate_web('Projects')?></a></li>

                        <li class="<?= $this->uri->segment(1) == 'blogs' || $this->uri->segment(1) == 'one_blogs' ? "active" : '' ?>"><a href="<?=base_url()?>blogs"><?=translate_web('Blog')?></a></li>
                        <li class="<?= $this->uri->segment(1) == 'careers' || $this->uri->segment(1) == 'one_career' ? "active" : '' ?>"><a href="<?=base_url()?>careers"><?=translate_web('Careers')?></a></li>

                        <li class="<?= $this->uri->segment(1) == 'contact_us'  ? "active" : '' ?>"><a href="<?=base_url()?>contact_us"><?=translate_web('Contact_Us')?></a></li>

                        <li><a ><?=$lang_text?> <span class="submenu-indicator"></span></a>
                            <ul class="nav-dropdown nav-submenu">
                                <?php if($set_lang == 'english' ){ ?>
                                    <li class="<?= $class_ar ?>"><a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/arabic' ?>"><?=translate_web('Arabic')?></a></li>
                                    <li class="<?= $class_ru ?>"><a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/russian' ?>"><?=translate_web('Russian')?></a></li>
                               <?php }elseif ($set_lang == 'arabic') { ?>
                                    <li class="<?= $class_en ?>"><a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/english' ?>"><?=translate_web('English')?></a></li>
                                    <li class="<?= $class_ru ?>"><a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/russian' ?>"><?=translate_web('Russian')?></a></li>
                               <?php }else{ ?>
                                    <li class="<?= $class_en ?>"><a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/english' ?>"><?=translate_web('English')?></a></li>
                                    <li class="<?= $class_ar ?>"><a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/arabic' ?>"><?=translate_web('Arabic')?></a></li>

                                <?php } ?>

                            </ul>

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
    }
    unset($_SESSION['message']);
    ?>
    <?php $this->load->view($subview); ?>
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Footer Start ================================== -->
    <footer class="dark-footer skin-dark-footer">
        <div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <img src="<?= base_url() . 'assets_web/img' ?>/logo-light.png" class="img-footer"
                                 alt="images"/>
                            <p>
                                <?php if (isset($this->about_us) && (!empty($this->about_us))) {
                                    if (isset($set_lang) && (!empty($set_lang))) {
                                        switch ($set_lang) {
                                            case 'arabic':
                                                $about_us_short = 'about_us_short';
                                                break;
                                            case 'english':
                                                $about_us_short = 'about_us_short_en';
                                                break;
                                            case 'russian':
                                                $about_us_short = 'about_us_short_ru';
                                                break;
                                            default:
                                                $about_us_short = 'about_us_short_en';
                                                break;
                                        }
                                    }
                                }
                                ?>
                                <?= $this->about_us->$about_us_short?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h4 class="widget-title"><?=translate_web('Contact_Info')?></h4>
                            <div class="footer-add">
                                <?php

                                if (isset($set_lang) && (!empty($set_lang))) {
                                    switch ($set_lang) {
                                        case 'arabic':
                                            $address = 'address';
                                            break;
                                        case 'english':
                                            $address = 'address_en';
                                            break;
                                        case 'russian':
                                            $address = 'address_ru';
                                            break;
                                        default:
                                            $address = 'address_en';
                                            break;
                                    }
                                }

                                ?>
                                <p><i class="fa-solid fa-location-dot"></i><?=$this->company_data->$address?></p>
                                <p><a style="direction: ltr;unicode-bidi: bidi-override;"><i class="fa-solid fa-phone"></i><?=$this->company_data->telepon_code?> </a></p>
                                <p><a><i class="fa-solid fa-envelope"></i><?=$this->company_data->email?> </a></p>
                                <p><a style="direction: ltr;unicode-bidi: bidi-override;"><i class="fa-solid fa-envelope"></i><?=$this->company_data->fax_code?></a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="widget-title"><?=translate_web('Our_Pages')?></h4>
                            <ul class="footer-menu">
                                <li><i class="fa-solid fa-arrow-right"></i><a href="<?=base_url()?>careers"><?=translate_web('Careers')?></a></li>
                                <li><i class="fa-solid fa-arrow-right"></i><a href="<?=base_url()?>projects"><?=translate_web('Projects')?></a></li>
                                <li><i class="fa-solid fa-arrow-right"></i><a href="<?=base_url()?>blogs"><?=translate_web('Blog')?></a></li>
                                <li><i class="fa-solid fa-arrow-right"></i><a href="<?=base_url()?>sitemap"><?=translate_web('Sitemap')?></a></li>
                                <li><i class="fa-solid fa-arrow-right"></i><a href="<?=base_url()?>contact_us"><?=translate_web('Contact_Us')?></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="widget-title"><?=translate_web('About_us')?></h4>
                            <ul class="footer-menu">
                                <li><i class="fa-solid fa-arrow-right"></i><a href="<?=base_url()?>about_us"><?=translate_web('About_Us')?></a></li>
                                <li><i class="fa-solid fa-arrow-right"></i><a href="<?=base_url()?>about_us#team"><?=translate_web('Our_Team')?></a>
                                </li>
                                <li><i class="fa-solid fa-arrow-right"></i><a
                                            href="<?=base_url()?>about_us#about-section"><?=translate_web('Our_Mission')?></a></li>
                                <li><i class="fa-solid fa-arrow-right"></i><a
                                            href="<?=base_url()?>about_us#about-section"><?=translate_web('Our_Vision')?></a></li>
                                <li><i class="fa-solid fa-arrow-right"></i><a
                                            href="<?=base_url()?>about_us#about-section"><?=translate_web('Our_Goals')?></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-6">
                        <p class="mb-0">© 2023 MADA'IN. All Rights Reserved</p>
                    </div>

                    <div class="col-lg-6 col-md-6 text-right">
                        <ul class="footer-bottom-social">
                            <li><a  href="<?=$this->company_data->facebook?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li><a  href="<?=$this->company_data->twitter?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a  href="<?=$this->company_data->instagram?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a  href="<?=$this->company_data->youtube?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->

    <!-- float -->
    <section class="floatBtns">
        <a class="main">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                 xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512 512"
                 style="enable-background:new 0 0 512 512" xml:space="preserve">
				<g>
                    <g data-name="Layer 16">
                        <circle cx="256" cy="256" r="70.71" fill="#000000" data-original="#000000"></circle>
                        <path
                                d="M442.78 282.43a48.59 48.59 0 0 0-15.7 11.66l-73.25-24.9a98.1 98.1 0 0 1-12.25 36l73.28 24.91a48.63 48.63 0 1 0 27.92-47.64zM69.22 131.78c.75-.35 1.49-.72 2.21-1.1l97.4 79a99.34 99.34 0 0 1 24-29.48l-97.47-79.04a48.61 48.61 0 1 0-26.14 30.62zM322.23 394.23l-17.52-52.4a97.91 97.91 0 0 1-36 12.07l17.5 52.37c-1 .74-1.92 1.5-2.85 2.3a58.93 58.93 0 1 0 38.9-14.34zM337.91 201l90.67-90.67a58 58 0 1 0-26.87-26.87L311 174.09A99.57 99.57 0 0 1 337.91 201zM174.18 311.17l-99.77 100.1a53 53 0 1 0 26.91 26.83L201.1 338a99.6 99.6 0 0 1-26.92-26.83z"
                                fill="#000000" data-original="#000000"></path>
                    </g>
                </g>
			  </svg>
        </a>
        <div class="subs">
            <!-- sub -->
            <a href="<?=$this->company_data->facebook?>" target="_blank"> <i class="fa-brands fa-facebook"></i> </a>
            <!-- sub -->
            <a href="<?=$this->company_data->instagram?>" target="_blank"> <i class="fa-brands fa-instagram"></i> </a>
            <!-- sub -->
            <a href="<?=$this->company_data->twitter?>" target="_blank"> <i class="fa-brands fa-twitter"></i> </a>
            <!-- sub -->
            <a href="<?=$this->company_data->tiktok?>" target="_blank"> <i class="fa-brands fa-tiktok"></i> </a>
            <!-- sub -->
            <a href="<?=$this->company_data->youtube?>" target="_blank"> <i class="fa-brands fa-youtube"></i>
                <!-- sub -->
                <a href="<?=$this->company_data->snapchat?>" target="_blank"> <i class="fa-brands fa-snapchat"></i>
                </a>
                <!-- sub -->
                <a href="https://www.google.com/maps/place/<?=$this->company_data->$address?>" target="_blank"> <i class="fa-sharp fa-solid fa-location-dot"></i> </a>
                </span>
        </div>
    </section>

    <!-- Sign Up Modal -->
    <div class="modal fade signup" id="register" tabindex="-1" role="dialog" aria-labelledby="sign-up"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="sign-up">
                <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"></span>
                <div class="modal-body">
                    <h4 class="modal-header-title"><?=translate_web('Register_Your_Interset')?></h4>
                    <div class="login-form">
                        <?php echo form_open('register'); ?>

                        <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" name="f_name" placeholder="<?=translate_web('First_name')?>" value="<?= set_value('f_name', '') ?>">
                                            <?php if (form_error('f_name')) {
                                                echo "<span style='color:red;text-align: right;'>" . form_error('f_name') . "</span>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" name="l_name" placeholder="<?=translate_web('Last_name')?>" value="<?= set_value('l_name', '') ?>">
                                            <?php if (form_error('l_name')) {
                                                echo "<span style='color:red;text-align: right;'>" . form_error('l_name') . "</span>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="email" class="form-control" name="email" placeholder="<?=translate_web('Email')?>" value="<?= set_value('email', '') ?>">
                                            <?php if (form_error('email')) {
                                                echo "<span style='color:red;text-align: right;'>" . form_error('email') . "</span>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="number" class="form-control" name="phone" placeholder="<?=translate_web('Phone')?>" value="<?= set_value('phone', '') ?>">
                                            <?php if (form_error('phone')) {
                                                echo "<span style='color:red;text-align: right;'>" . form_error('phone') . "</span>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" name="nationality" placeholder="<?=translate_web('Nationality')?>" value="<?= set_value('nationality', '') ?>">
                                            <?php if (form_error('nationality')) {
                                                echo "<span style='color:red;text-align: right;'>" . form_error('nationality') . "</span>";
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                             <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width btn-theme-light-2 rounded" name="add" value="add">
                                        <?=translate_web('Submit')?>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-arrow-up"></i></a>

    <div class="ba-we-love-subscribers-wrap">
        <div class="ba-we-love-subscribers popup-ani">
            <header>
                <h1><?=translate_web('Contact_us')?></h1>
                <p><?=translate_web('Use_the_form_below_to_contact_us')?></p>
            </header>
          <?php echo form_open('contact_us', array('target' => "popupwindow")); ?>
                <input  type="text" name="name" placeholder="<?=translate_web('Your_name')?>" value="<?= set_value('name', '') ?>">
            <?php if (form_error('name')) {
                echo "<span style='color:red;text-align: right;'>" . form_error('name') . "</span>";
            } ?>
            <input type="email" class="form-control" name="email" placeholder="<?=translate_web('Your_email')?>" value="<?= set_value('email', '') ?>">
            <?php if (form_error('email')) {
                echo "<span style='color:red;text-align: right;'>" . form_error('email') . "</span>";
            } ?>
            <input type="number"  class="form-control" name="phone" placeholder="<?=translate_web('Your_phone')?>" value="<?= set_value('phone', '') ?>">
            <?php if (form_error('phone')) {
                echo "<span style='color:red;text-align: right;'>" . form_error('phone') . "</span>";
            } ?>
            <textarea name="message" class="form-control" placeholder=""><?= set_value('message', translate_web('Your_Message')) ?></textarea>
            <button class="btn send-button btn-theme-light" name="add" value="add" type="submit"><?=translate_web('Send_Message')?></button><input name="uri" type="hidden"
                                                                            value="barreldotim">
            </form>
        </div>
        <div class="ba-we-love-subscribers-fab">
            <div class="wrap">
                <i class="fas fa-envelope"></i>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url() . 'assets_web/js' ?>/jquery.min.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/popper.min.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/bootstrap.min.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/select2.min.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/slick.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/slider-bg.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/lightbox.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/imagesloaded.js"></script>
<script src="<?= base_url() . 'assets_web/js' ?>/custom.js"></script>

<script>
    $('#Types').select2({
        placeholder: "<?=translate_web('Type')?>",
        allowClear: true
    });
    $('#ptypes').select2({
        placeholder: "<?=translate_web('Bedrooms')?>",
        allowClear: true
    });
    $('#location').select2({
        placeholder: "<?=translate_web('AED_750K_-_AED_1M')?>",
        allowClear: true
    });
</script>

<!--<script defer src="--><?//= base_url() . 'assets_web/fontawesome/js/' ?><!--/all.js"></script>-->

<script src="<?= base_url() . 'assets_web/jssocials' ?>/jssocials.js"></script>
<script>
    var shares = (typeof window.orientation !== "undefined" ? [ "twitter", "facebook", "linkedin", "whatsapp","telegram","messenger"] : [ "twitter", "facebook", "linkedin", "whatsapp","telegram","messenger"]);
    var title_page=$(document).find("title").text();
    var jsSocials;
    $(document).ready(function() {

        jsSocials= $("#share").jsSocials({
            url: decodeURIComponent(window.location.href),
            showCount: false,
            showLabel: false,
            shareIn: "popup",
            text: title_page,
            shares: shares,
        });
    });
</script>
</body>
</html>