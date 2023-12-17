<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() . 'Dash' ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">اضافة الخصائص</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $title ?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    //echo '<pre>' ;print_r($one_data);
                    if ((isset($one_data)) && (!empty($one_data))) {

                        echo form_open_multipart(base_url() . 'feature/Feature_c/update/' . base64_encode($one_data->id), array('id' => 'myform'));
                        $title_ar = $one_data->title_ar;
                        $title_en = $one_data->title_en;
                        $description_en = $one_data->description_en;
                        $description_ar = $one_data->description_ar;
                        $icon = $one_data->icon;
                    } else {
                        echo form_open_multipart(base_url() . 'feature/Feature_c/');
                        $title_ar = set_value('title_ar');
                        $title_en = set_value('title_en');
                        $description_en = set_value('description_en');
                        $description_ar = set_value('description_ar');
                        $icon = set_value('icon');
                    }

                    ?>
                    <style>


                        #view_type_sorting {
                            font-family: "FontAwesome";
                            font-size: 25px;
                        }

                        #view_type_sorting::before {
                            vertical-align: middle;
                        }
                    </style>
                    <div class="box-body">
                        <div class="box-body">


                            <div class="form-group col-md-3 col-sm-6 ">
                                <label for="banners_ar"> الاسم بالعربية </label>
                                <input type="text" name="title_ar" id="title_ar" value="<?= $title_ar ?>"
                                       class="form-control " required>
                            </div>
                            <div class="form-group col-md-3 col-sm-6 ">
                                <label for="banners_en"> الاسم بالانجليزية </label>
                                <input type="text" name="title_en" id="title_en" value="<?= $title_en ?>"
                                       class="form-control " required>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 ">
                                <label> ايقونة </label>
                                <select style=" height: 50px; text-align-last: center;font-weight: 600;margin-right: 0;vertical-align: text-bottom;"
                                        id="view_type_sorting" aria-haspopup="true" aria-expanded="false"
                                        class="form-control " required name="icon">

                                    <option value="fa-align-left">&#xf036;<i class="fa  fa-align-left"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-align-right">&#xf038;
                                        <i class="fa  fa-align-right" aria-hidden="true"></i></option>
                                    <option value="fa-amazon">&#xf270;
                                        <i class="fa  fa-amazon" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-ambulance">&#xf0f9;
                                        <i class="fa  fa-ambulance" aria-hidden="true"></i></option>
                                    <option value="fa-anchor">&#xf13d;
                                        <i class="fa  fa-anchor" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-android">&#xf17b;
                                        <i class="fa  fa-android" aria-hidden="true"></i></option>
                                    <option value="fa-angellist">&#xf209; <i class="fa  fa-angellist"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-angle-double-down">&#xf103; <i
                                                class="fa  fa-angle-double-down"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-angle-double-left">&#xf100; <i
                                                class="fa  fa-angle-double-left"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-angle-double-right">&#xf101; <i
                                                class="fa  fa-angle-double-right"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-angle-double-up">&#xf102; <i class="fa  fa-angle-double-up"
                                                                                   aria-hidden="true"></i></option>

                                    <option value="fa-angle-left">&#xf104; <i class="fa  fa-angle-left"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-angle-right">&#xf105; <i class="fa  fa-angle-right"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-angle-up">&#xf106; <i class="fa  fa-angle-up"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-apple">&#xf179; <i class="fa  fa-apple"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-archive">&#xf187; <i class="fa  fa-archive"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-area-chart">&#xf1fe; <i class="fa  fa-area-chart"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-arrow-circle-down">&#xf0ab; <i
                                                class="fa  fa-arrow-circle-down"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-arrow-circle-left">&#xf0a8; <i
                                                class="fa  fa-arrow-circle-left"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-arrow-circle-o-down">&#xf01a; <i
                                                class="fa  fa-arrow-circle-o-down" aria-hidden="true"></i></option>
                                    <option value="fa-arrow-circle-o-left">&#xf190; <i
                                                class="fa  fa-arrow-circle-o-left" aria-hidden="true"></i></option>
                                    <option value="fa-arrow-circle-o-right">&#xf18e; <i
                                                class="fa  fa-arrow-circle-o-right" aria-hidden="true"></i></option>
                                    <option value="fa-arrow-circle-o-up">&#xf01b; <i
                                                class="fa  fa-arrow-circle-o-up"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-arrow-circle-right">&#xf0a9; <i
                                                class="fa  fa-arrow-circle-right"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-arrow-circle-up">&#xf0aa; <i class="fa  fa-arrow-circle-up"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-arrow-down">&#xf063; <i class="fa  fa-arrow-down"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-arrow-left">&#xf060; <i class="fa  fa-arrow-left"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-arrow-right">&#xf061; <i class="fa  fa-arrow-right"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-arrow-up">&#xf062; <i class="fa  fa-arrow-up"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-arrows">&#xf047; <i class="fa  fa-arrows"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-arrows-alt">&#xf0b2; <i class="fa  fa-arrows-alt"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-arrows-h">&#xf07e; <i class="fa  fa-arrows-h"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-arrows-v">&#xf07d; <i class="fa  fa-arrows-v"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-asterisk">&#xf069; <i class="fa  fa-asterisk"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-at">&#xf1fa; <i class="fa  fa-at" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-automobile">&#xf1b9; <i class="fa  fa-automobile"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-backward">&#xf04a; <i class="fa  fa-backward"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-balance-scale">&#xf24e; <i class="fa  fa-balance-scale"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-ban">&#xf05e; <i class="fa  fa-ban" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-bank">&#xf19c; <i class="fa  fa-bank" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-bar-chart">&#xf080; <i class="fa  fa-bar-chart"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-bar-chart-o">&#xf080; <i class="fa  fa-bar-chart-o"
                                                                               aria-hidden="true"></i></option>

                                    <option value="fa-battery-full">&#xf240; <i class="fa  fa-battery-full"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-beer">&#xf0fc; <i class="fa  fa-beer" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-behance">&#xf1b4; <i class="fa  fa-behance"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-behance-square">&#xf1b5; <i class="fa  fa-behance-square"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-bell">&#xf0f3; <i class="fa  fa-bell" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-bell-o">&#xf0a2; <i class="fa  fa-bell-o"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-bell-slash">&#xf1f6; <i class="fa  fa-bell-slash"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-bell-slash-o">&#xf1f7; <i class="fa  fa-bell-slash-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-bicycle">&#xf206; <i class="fa  fa-bicycle"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-binoculars">&#xf1e5; <i class="fa  fa-binoculars"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-birthday-cake">&#xf1fd; <i class="fa  fa-birthday-cake"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-bitbucket">&#xf171; <i class="fa  fa-bitbucket"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-bitbucket-square">&#xf172; <i class="fa  fa-bitbucket-square"
                                                                                    aria-hidden="true"></i></option>
                                    <option value="fa-bitcoin">&#xf15a; <i class="fa  fa-bitcoin"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-black-tie">&#xf27e; <i class="fa  fa-black-tie"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-bold">&#xf032; <i class="fa  fa-bold" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-bolt">&#xf0e7; <i class="fa  fa-bolt" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-bomb">&#xf1e2; <i class="fa  fa-bomb" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-book">&#xf02d; <i class="fa  fa-book" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-bookmark">&#xf02e; <i class="fa  fa-bookmark"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-bookmark-o">&#xf097; <i class="fa  fa-bookmark-o"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-briefcase">&#xf0b1; <i class="fa  fa-briefcase"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-btc">&#xf15a; <i class="fa  fa-btc" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-bug">&#xf188; <i class="fa  fa-bug" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-building">&#xf1ad; <i class="fa  fa-building"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-building-o">&#xf0f7; <i class="fa  fa-building-o"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-bullhorn">&#xf0a1; <i class="fa  fa-bullhorn"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-bullseye">&#xf140; <i class="fa  fa-bullseye"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-bus">&#xf207; <i class="fa  fa-bus" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cab">&#xf1ba; <i class="fa  fa-cab" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-calendar">&#xf073; <i class="fa  fa-calendar"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-camera">&#xf030; <i class="fa  fa-camera"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-car">&#xf1b9; <i class="fa  fa-car" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-caret-up">&#xf0d8; <i class="fa  fa-caret-up"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-cart-plus">&#xf217; <i class="fa  fa-cart-plus"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-cc">&#xf20a; <i class="fa  fa-cc" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cc-amex">&#xf1f3; <i class="fa  fa-cc-amex"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-cc-jcb">&#xf24b; <i class="fa  fa-cc-jcb"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cc-paypal">&#xf1f4; <i class="fa  fa-cc-paypal"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-cc-stripe">&#xf1f5; <i class="fa  fa-cc-stripe"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-cc-visa">&#xf1f0; <i class="fa  fa-cc-visa"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-chain">&#xf0c1; <i class="fa  fa-chain"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-check">&#xf00c; <i class="fa  fa-check"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-chevron-left">&#xf053; <i class="fa  fa-chevron-left"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-chevron-right">&#xf054; <i class="fa  fa-chevron-right"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-chevron-up">&#xf077; <i class="fa  fa-chevron-up"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-child">&#xf1ae; <i class="fa  fa-child"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-chrome">&#xf268; <i class="fa  fa-chrome"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-circle">&#xf111; <i class="fa  fa-circle"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-circle-o">&#xf10c; <i class="fa  fa-circle-o"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-circle-o-notch">&#xf1ce; <i class="fa  fa-circle-o-notch"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-circle-thin">&#xf1db; <i class="fa  fa-circle-thin"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-clipboard">&#xf0ea; <i class="fa  fa-clipboard"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-clock-o">&#xf017; <i class="fa  fa-clock-o"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-clone">&#xf24d; <i class="fa  fa-clone"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-close">&#xf00d; <i class="fa  fa-close"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cloud">&#xf0c2; <i class="fa  fa-cloud"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cloud-download">&#xf0ed; <i class="fa  fa-cloud-download"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-cloud-upload">&#xf0ee; <i class="fa  fa-cloud-upload"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-cny">&#xf157; <i class="fa  fa-cny" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-code">&#xf121; <i class="fa  fa-code" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-code-fork">&#xf126; <i class="fa  fa-code-fork"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-codepen">&#xf1cb; <i class="fa  fa-codepen"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-coffee">&#xf0f4; <i class="fa  fa-coffee"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cog">&#xf013; <i class="fa  fa-cog" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cogs">&#xf085; <i class="fa  fa-cogs" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-columns">&#xf0db; <i class="fa  fa-columns"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-comment">&#xf075; <i class="fa  fa-comment"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-comment-o">&#xf0e5; <i class="fa  fa-comment-o"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-commenting">&#xf27a; <i class="fa  fa-commenting"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-commenting-o">&#xf27b; <i class="fa  fa-commenting-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-comments">&#xf086; <i class="fa  fa-comments"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-comments-o">&#xf0e6; <i class="fa  fa-comments-o"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-compass">&#xf14e; <i class="fa  fa-compass"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-compress">&#xf066; <i class="fa  fa-compress"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-connectdevelop">&#xf20e; <i class="fa  fa-connectdevelop"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-contao">&#xf26d; <i class="fa  fa-contao"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-copy">&#xf0c5; <i class="fa  fa-copy" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-copyright">&#xf1f9; <i class="fa  fa-copyright"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-creative-commons">&#xf25e; <i class="fa  fa-creative-commons"
                                                                                    aria-hidden="true"></i></option>
                                    <option value="fa-credit-card">&#xf09d; <i class="fa  fa-credit-card"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-crop">&#xf125; <i class="fa  fa-crop" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-crosshairs">&#xf05b; <i class="fa  fa-crosshairs"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-css3">&#xf13c; <i class="fa  fa-css3" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cube">&#xf1b2; <i class="fa  fa-cube" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cubes">&#xf1b3; <i class="fa  fa-cubes"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cut">&#xf0c4; <i class="fa  fa-cut" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-cutlery">&#xf0f5; <i class="fa  fa-cutlery"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-dashboard">&#xf0e4; <i class="fa  fa-dashboard"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-dashcube">&#xf210; <i class="fa  fa-dashcube"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-database">&#xf1c0; <i class="fa  fa-database"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-dedent">&#xf03b; <i class="fa  fa-dedent"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-delicious">&#xf1a5; <i class="fa  fa-delicious"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-desktop">&#xf108; <i class="fa  fa-desktop"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-deviantart">&#xf1bd; <i class="fa  fa-deviantart"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-diamond">&#xf219; <i class="fa  fa-diamond"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-digg">&#xf1a6; <i class="fa  fa-digg" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-dollar">&#xf155; <i class="fa  fa-dollar"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-download">&#xf019; <i class="fa  fa-download"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-dribbble">&#xf17d; <i class="fa  fa-dribbble"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-dropbox">&#xf16b; <i class="fa  fa-dropbox"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-drupal">&#xf1a9; <i class="fa  fa-drupal"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-edit">&#xf044; <i class="fa  fa-edit" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-eject">&#xf052; <i class="fa  fa-eject"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-ellipsis-h">&#xf141; <i class="fa  fa-ellipsis-h"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-ellipsis-v">&#xf142; <i class="fa  fa-ellipsis-v"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-empire">&#xf1d1; <i class="fa  fa-empire"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-envelope">&#xf0e0; <i class="fa  fa-envelope"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-envelope-o">&#xf003; <i class="fa  fa-envelope-o"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-eur">&#xf153; <i class="fa  fa-eur" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-euro">&#xf153; <i class="fa  fa-euro" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-exchange">&#xf0ec; <i class="fa  fa-exchange"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-exclamation">&#xf12a; <i class="fa  fa-exclamation"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-exclamation-circle">&#xf06a; <i
                                                class="fa  fa-exclamation-circle"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-exclamation-triangle">&#xf071; <i
                                                class="fa  fa-exclamation-triangle" aria-hidden="true"></i></option>
                                    <option value="fa-expand">&#xf065; <i class="fa  fa-expand"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-expeditedssl">&#xf23e; <i class="fa  fa-expeditedssl"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-external-link">&#xf08e; <i class="fa  fa-external-link"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-external-link-square">&#xf14c; <i
                                                class="fa  fa-external-link-square" aria-hidden="true"></i></option>
                                    <option value="fa-eye">&#xf06e; <i class="fa  fa-eye" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-eye-slash">&#xf070; <i class="fa  fa-eye-slash"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-eyedropper">&#xf1fb; <i class="fa  fa-eyedropper"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-facebook">&#xf09a; <i class="fa  fa-facebook"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-facebook-f">&#xf09a; <i class="fa  fa-facebook-f"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-facebook-official">&#xf230; <i
                                                class="fa  fa-facebook-official"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-facebook-square">&#xf082; <i class="fa  fa-facebook-square"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-fast-backward">&#xf049; <i class="fa  fa-fast-backward"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-fast-forward">&#xf050; <i class="fa  fa-fast-forward"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-fax">&#xf1ac; <i class="fa  fa-fax" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-feed">&#xf09e; <i class="fa  fa-feed" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-female">&#xf182; <i class="fa  fa-female"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-fighter-jet">&#xf0fb; <i class="fa  fa-fighter-jet"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-file">&#xf15b; <i class="fa  fa-file" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-file-archive-o">&#xf1c6; <i class="fa  fa-file-archive-o"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-file-audio-o">&#xf1c7; <i class="fa  fa-file-audio-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-file-code-o">&#xf1c9; <i class="fa  fa-file-code-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-file-excel-o">&#xf1c3; <i class="fa  fa-file-excel-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-file-image-o">&#xf1c5; <i class="fa  fa-file-image-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-file-movie-o">&#xf1c8; <i class="fa  fa-file-movie-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-file-o">&#xf016; <i class="fa  fa-file-o"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-file-pdf-o">&#xf1c1; <i class="fa  fa-file-pdf-o"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-file-photo-o">&#xf1c5; <i class="fa  fa-file-photo-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-file-picture-o">&#xf1c5; <i class="fa  fa-file-picture-o"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-file-powerpoint-o">&#xf1c4; <i
                                                class="fa  fa-file-powerpoint-o"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-file-sound-o">&#xf1c7; <i class="fa  fa-file-sound-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-file-text">&#xf15c; <i class="fa  fa-file-text"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-file-text-o">&#xf0f6; <i class="fa  fa-file-text-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-file-video-o">&#xf1c8; <i class="fa  fa-file-video-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-file-word-o">&#xf1c2; <i class="fa  fa-file-word-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-file-zip-o">&#xf1c6; <i class="fa  fa-file-zip-o"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-files-o">&#xf0c5; <i class="fa  fa-files-o"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-film">&#xf008; <i class="fa  fa-film" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-filter">&#xf0b0; <i class="fa  fa-filter"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-fire">&#xf06d; <i class="fa  fa-fire" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-fire-extinguisher">&#xf134; <i
                                                class="fa  fa-fire-extinguisher"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-firefox">&#xf269; <i class="fa  fa-firefox"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-flag">&#xf024; <i class="fa  fa-flag" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-flag-checkered">&#xf11e; <i class="fa  fa-flag-checkered"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-flag-o">&#xf11d; <i class="fa  fa-flag-o"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-flash">&#xf0e7; <i class="fa  fa-flash"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-flask">&#xf0c3; <i class="fa  fa-flask"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-flickr">&#xf16e; <i class="fa  fa-flickr"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-floppy-o">&#xf0c7; <i class="fa  fa-floppy-o"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-folder">&#xf07b; <i class="fa  fa-folder"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-folder-o">&#xf114; <i class="fa  fa-folder-o"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-folder-open">&#xf07c; <i class="fa  fa-folder-open"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-folder-open-o">&#xf115; <i class="fa  fa-folder-open-o"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-font">&#xf031; <i class="fa  fa-font" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-fonticons">&#xf280; <i class="fa  fa-fonticons"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-forumbee">&#xf211; <i class="fa  fa-forumbee"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-forward">&#xf04e; <i class="fa  fa-forward"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-foursquare">&#xf180; <i class="fa  fa-foursquare"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-frown-o">&#xf119; <i class="fa  fa-frown-o"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-futbol-o">&#xf1e3; <i class="fa  fa-futbol-o"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-gamepad">&#xf11b; <i class="fa  fa-gamepad"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-gavel">&#xf0e3; <i class="fa  fa-gavel"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-gbp">&#xf154; <i class="fa  fa-gbp" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-ge">&#xf1d1; <i class="fa  fa-ge" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-gear">&#xf013; <i class="fa  fa-gear" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-gears">&#xf085; <i class="fa  fa-gears"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-genderless">&#xf22d; <i class="fa  fa-genderless"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-get-pocket">&#xf265; <i class="fa  fa-get-pocket"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-gg">&#xf260; <i class="fa  fa-gg" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-gg-circle">&#xf261; <i class="fa  fa-gg-circle"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-gift">&#xf06b; <i class="fa  fa-gift" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-git">&#xf1d3; <i class="fa  fa-git" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-git-square">&#xf1d2; <i class="fa  fa-git-square"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-github">&#xf09b; <i class="fa  fa-github"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-github-alt">&#xf113; <i class="fa  fa-github-alt"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-github-square">&#xf092; <i class="fa  fa-github-square"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-gittip">&#xf184; <i class="fa  fa-gittip"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-glass">&#xf000; <i class="fa  fa-glass"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-globe">&#xf0ac; <i class="fa  fa-globe"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-google">&#xf1a0; <i class="fa  fa-google"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-google-plus">&#xf0d5; <i class="fa  fa-google-plus"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-google-plus-square">&#xf0d4; <i
                                                class="fa  fa-google-plus-square"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-google-wallet">&#xf1ee; <i class="fa  fa-google-wallet"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-graduation-cap">&#xf19d; <i class="fa  fa-graduation-cap"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-gratipay">&#xf184; <i class="fa  fa-gratipay"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-users">&#xf0c0; <i class="fa  fa-users" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-user">&#xf007; <i class="fa  fa-user" aria-hidden="true"></i>
                                    </option>

                                    <option value="fa-h-square">&#xf0fd; <i class="fa  fa-h-square"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-hacker-news">&#xf1d4; <i class="fa  fa-hacker-news"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hand-grab-o">&#xf255; <i class="fa  fa-hand-grab-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hand-lizard-o">&#xf258; <i class="fa  fa-hand-lizard-o"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-hand-o-down">&#xf0a7; <i class="fa  fa-hand-o-down"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hand-o-left">&#xf0a5; <i class="fa  fa-hand-o-left"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hand-o-right">&#xf0a4; <i class="fa  fa-hand-o-right"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-hand-o-up">&#xf0a6; <i class="fa  fa-hand-o-up"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-hand-paper-o">&#xf256; <i class="fa  fa-hand-paper-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-hand-peace-o">&#xf25b; <i class="fa  fa-hand-peace-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-hand-pointer-o">&#xf25a; <i class="fa  fa-hand-pointer-o"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-hand-rock-o">&#xf255; <i class="fa  fa-hand-rock-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hand-scissors-o">&#xf257; <i class="fa  fa-hand-scissors-o"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-hand-spock-o">&#xf259; <i class="fa  fa-hand-spock-o"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-hand-stop-o">&#xf256; <i class="fa  fa-hand-stop-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hdd-o">&#xf0a0; <i class="fa  fa-hdd-o"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-header">&#xf1dc; <i class="fa  fa-header"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-headphones">&#xf025; <i class="fa  fa-headphones"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-phone">&#xf095; <i class="fa  fa-phone"
                                                                         aria-hidden="true"></i></option>
                                    <option value="fa-heart">&#xf004; <i class="fa  fa-heart"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-heart-o">&#xf08a; <i class="fa  fa-heart-o"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-heartbeat">&#xf21e; <i class="fa  fa-heartbeat"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-history">&#xf1da; <i class="fa  fa-history"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-home">&#xf015; <i class="fa  fa-home" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-hospital-o">&#xf0f8; <i class="fa  fa-hospital-o"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-hotel">&#xf236; <i class="fa  fa-hotel"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-hourglass">&#xf254; <i class="fa  fa-hourglass"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-hourglass-1">&#xf251; <i class="fa  fa-hourglass-1"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hourglass-2">&#xf252; <i class="fa  fa-hourglass-2"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hourglass-3">&#xf253; <i class="fa  fa-hourglass-3"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hourglass-end">&#xf253; <i class="fa  fa-hourglass-end"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-hourglass-half">&#xf252; <i class="fa  fa-hourglass-half"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-hourglass-o">&#xf250; <i class="fa  fa-hourglass-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-hourglass-start">&#xf251; <i class="fa  fa-hourglass-start"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-houzz">&#xf27c; <i class="fa  fa-houzz"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-html5">&#xf13b; <i class="fa  fa-html5"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-i-cursor">&#xf246; <i class="fa  fa-i-cursor"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-ils">&#xf20b; <i class="fa  fa-ils" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-image">&#xf03e; <i class="fa  fa-image"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-inbox">&#xf01c; <i class="fa  fa-inbox"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-indent">&#xf03c; <i class="fa  fa-indent"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-industry">&#xf275; <i class="fa  fa-industry"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-info">&#xf129; <i class="fa  fa-info" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-info-circle">&#xf05a; <i class="fa  fa-info-circle"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-inr">&#xf156; <i class="fa  fa-inr" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-instagram">&#xf16d; <i class="fa  fa-instagram"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-institution">&#xf19c; <i class="fa  fa-institution"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-internet-explorer">&#xf26b; <i
                                                class="fa  fa-internet-explorer"
                                                aria-hidden="true"></i></option>
                                    <option value="fa-intersex">&#xf224; <i class="fa  fa-intersex"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-ioxhost">&#xf208; <i class="fa  fa-ioxhost"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-italic">&#xf033; <i class="fa  fa-italic"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-joomla">&#xf1aa; <i class="fa  fa-joomla"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-jpy">&#xf157; <i class="fa  fa-jpy" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-jsfiddle">&#xf1cc; <i class="fa  fa-jsfiddle"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-key">&#xf084; <i class="fa  fa-key" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-keyboard-o">&#xf11c; <i class="fa  fa-keyboard-o"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-krw">&#xf159; <i class="fa  fa-krw" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-language">&#xf1ab; <i class="fa  fa-language"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-laptop">&#xf109; <i class="fa  fa-laptop"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-lastfm">&#xf202; <i class="fa  fa-lastfm"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-lastfm-square">&#xf203; <i class="fa  fa-lastfm-square"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-leaf">&#xf06c; <i class="fa  fa-leaf" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-leanpub">&#xf212; <i class="fa  fa-leanpub"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-legal">&#xf0e3; <i class="fa  fa-legal"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-lemon-o">&#xf094; <i class="fa  fa-lemon-o"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-level-down">&#xf149; <i class="fa  fa-level-down"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-level-up">&#xf148; <i class="fa  fa-level-up"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-life-bouy">&#xf1cd; <i class="fa  fa-life-bouy"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-life-buoy">&#xf1cd; <i class="fa  fa-life-buoy"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-life-ring">&#xf1cd; <i class="fa  fa-life-ring"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-life-saver">&#xf1cd; <i class="fa  fa-life-saver"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-lightbulb-o">&#xf0eb; <i class="fa  fa-lightbulb-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-line-chart">&#xf201; <i class="fa  fa-line-chart"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-link">&#xf0c1; <i class="fa  fa-link" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-linkedin">&#xf0e1; <i class="fa  fa-linkedin"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-linkedin-square">&#xf08c; <i class="fa  fa-linkedin-square"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-linux">&#xf17c; <i class="fa  fa-linux"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-list">&#xf03a; <i class="fa  fa-list" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-list-alt">&#xf022; <i class="fa  fa-list-alt"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-list-ol">&#xf0cb; <i class="fa  fa-list-ol"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-list-ul">&#xf0ca; <i class="fa  fa-list-ul"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-location-arrow">&#xf124; <i class="fa  fa-location-arrow"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-lock">&#xf023; <i class="fa  fa-lock" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-long-arrow-down">&#xf175; <i class="fa  fa-long-arrow-down"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-long-arrow-left">&#xf177; <i class="fa  fa-long-arrow-left"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-long-arrow-right">&#xf178; <i class="fa  fa-long-arrow-right"
                                                                                    aria-hidden="true"></i></option>
                                    <option value="fa-long-arrow-up">&#xf176; <i class="fa  fa-long-arrow-up"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-magic">&#xf0d0; <i class="fa  fa-magic"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-magnet">&#xf076; <i class="fa  fa-magnet"
                                                                          aria-hidden="true"></i>
                                    </option>

                                    <option value="fa-mars-stroke-v">&#xf22a; <i class="fa  fa-mars-stroke-v"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-maxcdn">&#xf136; <i class="fa  fa-maxcdn"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-meanpath">&#xf20c; <i class="fa  fa-meanpath"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-medium">&#xf23a; <i class="fa  fa-medium"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-medkit">&#xf0fa; <i class="fa  fa-medkit"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-meh-o">&#xf11a; <i class="fa  fa-meh-o"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-mercury">&#xf223; <i class="fa  fa-mercury"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-microphone">&#xf130; <i class="fa  fa-microphone"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-mobile">&#xf10b; <i class="fa  fa-mobile"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-motorcycle">&#xf21c; <i class="fa  fa-motorcycle"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-mouse-pointer">&#xf245; <i class="fa  fa-mouse-pointer"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-music">&#xf001; <i class="fa  fa-music"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-navicon">&#xf0c9; <i class="fa  fa-navicon"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-neuter">&#xf22c; <i class="fa  fa-neuter"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-newspaper-o">&#xf1ea; <i class="fa  fa-newspaper-o"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-opencart">&#xf23d; <i class="fa  fa-opencart"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-openid">&#xf19b; <i class="fa  fa-openid"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-opera">&#xf26a; <i class="fa  fa-opera"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-outdent">&#xf03b; <i class="fa  fa-outdent"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-pagelines">&#xf18c; <i class="fa  fa-pagelines"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-paper-plane-o">&#xf1d9; <i class="fa  fa-paper-plane-o"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-paperclip">&#xf0c6; <i class="fa  fa-paperclip"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-paragraph">&#xf1dd; <i class="fa  fa-paragraph"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-paste">&#xf0ea; <i class="fa  fa-paste"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-pause">&#xf04c; <i class="fa  fa-pause"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-paw">&#xf1b0; <i class="fa  fa-paw" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-paypal">&#xf1ed; <i class="fa  fa-paypal"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-pencil">&#xf040; <i class="fa  fa-pencil"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-pencil-square-o">&#xf044; <i class="fa  fa-pencil-square-o"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-phone">&#xf095; <i class="fa  fa-phone"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-photo">&#xf03e; <i class="fa  fa-photo"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-picture-o">&#xf03e; <i class="fa  fa-picture-o"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-pie-chart">&#xf200; <i class="fa  fa-pie-chart"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-pied-piper">&#xf1a7; <i class="fa  fa-pied-piper"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-pied-piper-alt">&#xf1a8; <i class="fa  fa-pied-piper-alt"
                                                                                  aria-hidden="true"></i></option>
                                    <option value="fa-pinterest">&#xf0d2; <i class="fa  fa-pinterest"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-pinterest-p">&#xf231; <i class="fa  fa-pinterest-p"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-pinterest-square">&#xf0d3; <i class="fa  fa-pinterest-square"
                                                                                    aria-hidden="true"></i></option>
                                    <option value="fa-plane">&#xf072; <i class="fa  fa-plane"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-play">&#xf04b; <i class="fa  fa-play" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-play-circle">&#xf144; <i class="fa  fa-play-circle"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-play-circle-o">&#xf01d; <i class="fa  fa-play-circle-o"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-plug">&#xf1e6; <i class="fa  fa-plug" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-plus">&#xf067; <i class="fa  fa-plus" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-plus-circle">&#xf055; <i class="fa  fa-plus-circle"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-plus-square">&#xf0fe; <i class="fa  fa-plus-square"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-plus-square-o">&#xf196; <i class="fa  fa-plus-square-o"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-power-off">&#xf011; <i class="fa  fa-power-off"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-print">&#xf02f; <i class="fa  fa-print"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-puzzle-piece">&#xf12e; <i class="fa  fa-puzzle-piece"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-qq">&#xf1d6; <i class="fa  fa-qq" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-qrcode">&#xf029; <i class="fa  fa-qrcode"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-question">&#xf128; <i class="fa  fa-question"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-question-circle">&#xf059; <i class="fa  fa-question-circle"
                                                                                   aria-hidden="true"></i></option>
                                    <option value="fa-quote-left">&#xf10d; <i class="fa  fa-quote-left"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-quote-right">&#xf10e; <i class="fa  fa-quote-right"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-ra">&#xf1d0; <i class="fa  fa-ra" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-random">&#xf074; <i class="fa  fa-random"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-rebel">&#xf1d0; <i class="fa  fa-rebel"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-recycle">&#xf1b8; <i class="fa  fa-recycle"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-reddit">&#xf1a1; <i class="fa  fa-reddit"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-reddit-square">&#xf1a2; <i class="fa  fa-reddit-square"
                                                                                 aria-hidden="true"></i></option>
                                    <option value="fa-refresh">&#xf021; <i class="fa  fa-refresh"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-registered">&#xf25d; <i class="fa  fa-registered"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-remove">&#xf00d; <i class="fa  fa-remove"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-renren">&#xf18b; <i class="fa  fa-renren"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-reorder">&#xf0c9; <i class="fa  fa-reorder"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-repeat">&#xf01e; <i class="fa  fa-repeat"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-reply">&#xf112; <i class="fa  fa-reply"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-reply-all">&#xf122; <i class="fa  fa-reply-all"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-retweet">&#xf079; <i class="fa  fa-retweet"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-rmb">&#xf157; <i class="fa  fa-rmb" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-road">&#xf018; <i class="fa  fa-road" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-rocket">&#xf135; <i class="fa  fa-rocket"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-rotate-left">&#xf0e2; <i class="fa  fa-rotate-left"
                                                                               aria-hidden="true"></i></option>
                                    <option value="fa-rotate-right">&#xf01e; <i class="fa  fa-rotate-right"
                                                                                aria-hidden="true"></i></option>
                                    <option value="fa-rouble">&#xf158; <i class="fa  fa-rouble"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-rss">&#xf09e; <i class="fa  fa-rss" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-rss-square">&#xf143; <i class="fa  fa-rss-square"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-rub">&#xf158; <i class="fa  fa-rub" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-ruble">&#xf158; <i class="fa  fa-ruble"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-rupee">&#xf156; <i class="fa  fa-rupee"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-safari">&#xf267; <i class="fa  fa-safari"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-sliders">&#xf1de; <i class="fa  fa-sliders"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-slideshare">&#xf1e7; <i class="fa  fa-slideshare"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-smile-o">&#xf118; <i class="fa  fa-smile-o"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-sort-asc">&#xf0de; <i class="fa  fa-sort-asc"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-sort-desc">&#xf0dd; <i class="fa  fa-sort-desc"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-sort-down">&#xf0dd; <i class="fa  fa-sort-down"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-spinner">&#xf110; <i class="fa  fa-spinner"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-spoon">&#xf1b1; <i class="fa  fa-spoon"
                                                                         aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-spotify">&#xf1bc; <i class="fa  fa-spotify"
                                                                           aria-hidden="true"></i></option>
                                    <option value="fa-square">&#xf0c8; <i class="fa  fa-square"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-square-o">&#xf096; <i class="fa  fa-square-o"
                                                                            aria-hidden="true"></i></option>
                                    <option value="fa-star">&#xf005; <i class="fa  fa-star" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-star-half">&#xf089; <i class="fa  fa-star-half"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-stop">&#xf04d; <i class="fa  fa-stop" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-subscript">&#xf12c; <i class="fa  fa-subscript"
                                                                             aria-hidden="true"></i></option>
                                    <option value="fa-tablet">&#xf10a; <i class="fa  fa-tablet"
                                                                          aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-tachometer">&#xf0e4; <i class="fa  fa-tachometer"
                                                                              aria-hidden="true"></i></option>
                                    <option value="fa-tag">&#xf02b; <i class="fa  fa-tag" aria-hidden="true"></i>
                                    </option>
                                    <option value="fa-tags">&#xf02c; <i class="fa  fa-tags" aria-hidden="true"></i>
                                    </option>
                                </select>
                            </div>
                            <!-- <div class="form-group col-md-3 col-sm-6 ">
                                <label for="banners_en">   الايقونة </label>
                                <input type="text" name="icon" id="icon" value="<?= $icon ?>"
                                    class="form-control " required>
                            </div>-->
                            <div class="form-group col-md-6 col-sm-6 ">
                                <label for="description_ar">الوصف بالعربية</label>
                                <textarea class="form-control " name="description_ar"
                                          id="description_ar"><?= $description_ar ?></textarea>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 ">
                                <label for="description_en">الوصف بالانجليزية</label>
                                <textarea class="form-control " name="description_en"
                                          id="description_en"><?= $description_en ?></textarea>
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="hidden" name="save" value="save"/>
                            <button type="submit" class="btn btn-labeled btn-success" id="myBtn">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
                        <?php echo form_close(); ?>
                    </div><!-- /.box -->

                </div>
            </div><!-- /.row -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    <?php if (!empty($icon)){ ?>
    $('#view_type_sorting').val('<?=$icon?>');
    <?php   } ?>
</script>
<script>
    function ValidateUpload(th) {

        var myfile = (th).value;

        var extension = myfile.split('.').pop().toUpperCase();
        if (extension != "PNG" && extension != "JPG" && extension != "GIF" && extension != "JPEG") {
            (th).value = '';
            swal("يجب ان تكون صورة", "", "error");
        }
    }
</script>

<script>
    function RevieImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + $(input).attr("data-view")).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>