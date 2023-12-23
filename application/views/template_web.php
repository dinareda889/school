<!doctype html>
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
        $company_image = base_url('assets_web/images/logo.png');
    }
    switch ($_SESSION['site_lang']) {
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
    if ($this->fungsi->company_data()->nameweb) {

        if ($set_lang == 'english') {
            $company_name = $this->fungsi->company_data()->nameweb_en;

        } elseif ($set_lang == 'russian') {
            $company_name = $this->fungsi->company_data()->nameweb_ru;

        } else {
            $company_name = $this->fungsi->company_data()->nameweb;

        }
    } else {
        $company_name = 'المدرسة';
    }
    ?>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="<?= $this->company_data->metatext ?>">
    <meta name="keywords" content="<?= $this->company_data->keywords ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title><?= $company_name ?></title>
    <!--====== Favicon Icon ======-->


    <link rel="shortcut icon" href="<?= base_url() . 'assets_web/images/' ?>favicon.ico" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Almarai|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>slick.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>animate.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>nice-select.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>jquery.nice-number.min.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>default.css">
    <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>responsive.css">
    <link href="<?= base_url() . 'assets_web/css/' ?>aos.css" rel="stylesheet">

    <?php if (($set_lang == 'english') || ($set_lang == 'russian')) { ?>
        <!--------------- english style -------->
        <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>styleen.css">
    <?php } else { ?>
        <link rel="stylesheet" href="<?= base_url() . 'assets_web/css/' ?>style.css">
    <?php } ?>

</head>

<body>
<div class="preloader" style="background-image: url(<?= base_url() . 'assets_web/images/' ?>newsletter-bg-1.jpg)">
    <div class="loader rubix-cube">
        <div class="layer layer-1"></div>
        <div class="layer layer-2"></div>
        <div class="layer layer-3 color-1"></div>
        <div class="layer layer-4"></div>
        <div class="layer layer-5"></div>
        <div class="layer layer-6"></div>
        <div class="layer layer-7"></div>
        <div class="layer layer-8"></div>
    </div>
</div>

<!--====== HEADER PART START ======-->
<header id="header-part">
    <div class="header-top direction">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="header-contact text-lg-right text-center">
                        <ul>
                            <li><i class="fa fa-phone text-white" aria-hidden="true"></i>
                                <span><?= $this->company_data->telepon_code ?></span></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="header-contact text-lg-right text-center">
                        <ul>

                            <li><i class="fa fa-envelope text-white" aria-hidden="true"></i>
                                <span><?= $this->company_data->email ?></span></li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <div class="header-contact text-lg-right text-center">
                        <ul>

                            <li><i class="fa fa-map-marker text-white" aria-hidden="true"></i>
                                <span><?= $this->company_data->$address ?></span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="navigation navigation-2 direction back-head"
         style="background-image: url(<?= base_url() . 'assets_web/images/' ?>header_background.png)">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12 col-md-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <img src="<?= $company_image ?>" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>


                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mr-auto">

                                <li class="nav-item ">
                                    <a class="<?= $this->uri->segment(1) == 'Web' || $this->uri->segment(1) == '' ? "active" : '' ?>"
                                       href="<?= base_url() ?>"><?= translate_web('Home') ?></a></li>

                                <li class="nav-item ">
                                    <a class="<?= $this->uri->segment(1) == 'about_us' ? "active" : '' ?>"
                                       href="<?= base_url() ?>about_us"><?= translate_web('About') ?></a></li>

                                <li class="nav-item ">
                                    <a class="<?= $this->uri->segment(1) == 'teachers' ? "active" : '' ?>"
                                       href="<?= base_url() ?>teachers"><?= translate_web('teachers') ?></a></li>
                                <!--                                <li class="nav-item"><a href="teachers.html"><?= translate_web('teachers') ?></a></li>-->
                                <li class="nav-item">
                                    <a class="<?= $this->uri->segment(1) == 'photos' ? "active" : '' ?>"
                                       href="<?= base_url() ?>photos"><?= translate_web('photos') ?></a></li>

                                <li class="nav-item">
                                    <a href="<?= base_url() ?>videos"><?= translate_web('videos') ?></a></li>

                                <li class="nav-item ">
                                    <a class="<?= $this->uri->segment(1) == 'events' || $this->uri->segment(1) == 'one_event' ? "active" : '' ?>"
                                       href="<?= base_url() ?>events"><?= translate_web('events') ?></a></li>

                                <li class="nav-item ">
                                    <a class="<?= $this->uri->segment(1) == 'blogs' || $this->uri->segment(1) == 'one_blogs' ? "active" : '' ?>"
                                       href="<?= base_url() ?>blogs"><?= translate_web('Blog') ?></a></li>

                                <li class="nav-item ">
                                    <a class="<?= $this->uri->segment(1) == 'contact_us' ? "active" : '' ?>"
                                       href="<?= base_url() ?>contact_us"><?= translate_web('Contact_Us') ?></a>
                                </li>

                                <li class="nav-item">
                                    <?php if ($set_lang == 'english') { ?>
                                        <a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/arabic' ?>">
                                            <img src="<?= base_url() . 'assets_web/' ?>images/united-arab-emirates.png"
                                                 class="lang">
                                            <?= translate_web('Arabic') ?></a>
                                    <?php } elseif ($set_lang == 'arabic') { ?>
                                        <a href="<?php echo base_url() . 'LanguageSwitcher/switchLang/english' ?>">
                                            <img src="<?= base_url() . 'assets_web/' ?>images/united-states.png"
                                                 class="lang">
                                            <?= translate_web('English') ?></a>
                                    <?php } ?>

                                    <!--                                    <a href="indexen.html"><img src="-->
                                    <? //= base_url() . 'assets_web/' ?><!--images/united-states.png" class="lang"> EN </a>-->
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>

</header>

<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
}
unset($_SESSION['message']);
?>
<?php $this->load->view($subview); ?>

<!--====== FOOTER PART START ======-->
<footer id="footer-part" class="bg_cover direction"
        style="background-image: url(<?= base_url() . 'assets_web/images/' ?>baner/footer.jpg)">
    <div class="footer-top pt-20 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg col-md-6 mt-40">

                    <?php if ($this->fungsi->company_about() && (!empty($this->fungsi->company_about()))) {
                        $about = $this->fungsi->company_about();
                        if ($set_lang == 'english') {
                            $about_us_short = $about->about_us_short_en;

                        } elseif ($set_lang == 'russian') {
                            $about_us_short = $about->about_us_short_en;

                        } else {
                            $about_us_short = $about->about_us_short;

                        }
                    } else {
                        $about_us_short = 'المدرسة';
                    }
                    ?>
                    <div class="footer-about">
                        <div class="logo">
                            <a href="<?= base_url() ?>"><img src="<?= $company_image ?>"
                                                      alt="Logo"></a>
                        </div>
                        <p><?= $about_us_short ?></p>
<?php if (isset($this->company_data) && (!empty($this->company_data))) { ?>
                        <ul class="mt-20">
                            <li><a href="<?=$this->company_data->facebook?>"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="<?=$this->company_data->twitter?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?=$this->company_data->youtube?>"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="<?=$this->company_data->google_plus?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?=$this->company_data->snapchat?>"><i class="fa fa-snapchat"></i></a></li>
                        </ul>
                        <?php } ?>
                    </div> <!-- footer about -->
                </div>
                <div class="col-lg col-md-6 col-sm-6 mt-40">
                    <div class="footer-link">
                        <div class="footer-title pb-25">
                            <h6><?= translate_web('main_list') ?></h6>
                        </div>
                        <ul>
                            <li><a href="<?= base_url() ?>about_us"><i
                                            class="fa fa-angle-left"></i><?= translate_web('About') ?></a></li>
                            <li><a href="<?= base_url() ?>teachers"><i
                                            class="fa fa-angle-left"></i><?= translate_web('teachers') ?> </a></li>
                            <li><a href="<?= base_url() ?>photos"><i
                                            class="fa fa-angle-left"></i><?= translate_web('photos') ?> </a></li>
                            <li><a href="<?= base_url() ?>videos"><i
                                            class="fa fa-angle-left"></i><?= translate_web('videos') ?> </a></li>
                            <li><a href="<?= base_url() ?>blogs"><i
                                            class="fa fa-angle-left"></i><?= translate_web('Blog') ?></a></li>
                            <li><a href="<?= base_url() ?>events"><i
                                            class="fa fa-angle-left"></i><?= translate_web('events') ?></a></li>
                            <li><a href="<?= base_url() ?>contact_us"><i
                                            class="fa fa-angle-left"></i><?= translate_web('Contact_Us') ?></a></li>
                        </ul>


                    </div>
                </div>

                <div class="col-lg col-md-6 mt-40">
                    <div class="footer-address">
                        <div class="footer-title pb-25">
                            <h6><?= translate_web('Contact_Us') ?></h6>
                        </div> <?php if (isset($this->company_data->address) && (!empty($this->company_data->address))) {
                            if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                                switch ($_SESSION['site_lang']) {
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
                        }
                        ?>

                        <ul>
                            <?php if (!empty($this->company_data->$address)) { ?>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?= $this->company_data->$address ?> </p>
                                    </div>
                                </li>
                            <?php } ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont">
                                    <p>
                                        <a href="tel:<?= $this->company_data->telepon_code ?>"><?= $this->company_data->telepon_code ?></a>
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="cont">
                                    <p>
                                        <a href="tel:<?= $this->company_data->email ?>"><?= $this->company_data->email ?></a>
                                    </p>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg col-md-6 col-sm-6 mt-40">
                    <div class="footer-link support">
                        <div class="footer-title pb-25">
                            <h6><?= translate_web('location_map') ?></h6>
                        </div>
                        <div class="mapouter">
                            <?=$this->company_data->google_map?>
<!--                            <iframe width="100%" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=%D8%A7%D9%84%D8%A7%D9%85%D8%A7%D8%B1%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9%20%D8%A7%D9%84%D9%85%D8%AA%D8%AD%D8%AF%D8%A9%20%D8%A7%D9%84%D8%B4%D8%A7%D8%B1%D9%82%D8%A9&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>-->
                        </div>
                    </div>
                </div>
                <!--                <div class="col-lg-3 col-md-6 col-sm-6 mt-40">
                                    <div class="footer-link support">
                                        <div class="footer-title pb-25">
                                            <h6>اشترك معنا</h6>
                                        </div>
                                        <p class="mb-20 text-white">اشترك معنا للحصول على احدث الأخبار</p>
                                        <div class="footer-subscribe">
                                            <form action="#" method="post">
                                                <input type="email" placeholder="اكتب البريد الالكترونى" required>
                                                <button type="submit"><i class="fa fa-envelope"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                -->            </div>
        </div>
    </div>

    <div class="footer-copyright pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright text-center">
                        <p class="text-align:center">©2023 جميع الحقوق محفوظة للمدرسة تصميم </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<!--====== BACK TO TP PART START ======-->

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<!--====== jquery js ======-->
<script src="<?= base_url() . 'assets_web/js/' ?>vendor/modernizr-3.6.0.min.js"></script>
<script src="<?= base_url() . 'assets_web/js/' ?>vendor/jquery-1.12.4.min.js"></script>
<!--====== Bootstrap js ======-->
<script src="<?= base_url() . 'assets_web/js/' ?>bootstrap.min.js"></script>
<!--====== Slick js ======-->
<script src="<?= base_url() . 'assets_web/js/' ?>slick.min.js"></script>
<!--====== Magnific Popup js ======-->
<script src="<?= base_url() . 'assets_web/js/' ?>jquery.magnific-popup.min.js"></script>
<!--====== Counter Up js ======-->
<script src="<?= base_url() . 'assets_web/js/' ?>waypoints.min.js"></script>
<script src="<?= base_url() . 'assets_web/js/' ?>jquery.counterup.min.js"></script>
<!--====== Nice Select js ======-->
<script src="<?= base_url() . 'assets_web/js/' ?>jquery.nice-select.min.js"></script>
<!--====== Count Down js ======-->
<script src="<?= base_url() . 'assets_web/js/' ?>jquery.countdown.min.js"></script>
<!--====== Main js ======-->
<script src="<?= base_url() . 'assets_web/js/' ?>main.js"></script>
<script src="<?= base_url() . 'assets_web/js/' ?>aos.js"></script>
<script>
    AOS.init();
</script>
<!--<script src="assets/js/main.js"></script>-->
<!-- share social -->
<script>
    function fbShare(title, descr, winWidth, winHeight) {
        var url = window.location.href;
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }

    function twitterShare(winWidth, winHeight) {
        var url = window.location.href;

        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open('https://twitter.com/share?url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }

    function linkedinShare(winWidth, winHeight) {
        var url = window.location.href;

        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open(' https://www.linkedin.com/shareArticle?url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }


    function instagramShare(winWidth, winHeight) {
        var url = window.location.href;
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open(' https://www.instagram.com/shareArticle?url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }

    function whatsappShare(winWidth, winHeight) {
        var url = window.location.href;
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);

        window.open('https://wa.me/?text=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }


</script>
</body>

</html>
