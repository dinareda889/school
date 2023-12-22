<!--====== SLIDER ======-->
<section id="slider-part" class="slider-active">
    <div class="single-slider bg_cover pt-150"
         style="background-image: url(<?= base_url() . 'assets_web/images/' ?>baner/img1.jpg)" data-overlay="4">
        <div class="container">
            <div class="row direction justify">
                <div class="col-xl-6 col-lg-6">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">مدرستنا دليلك للنجاح</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">نسعى لتدريس مناهج متميزة على ايدى معلمين متميزين
                            فى كافة المواد العلمية</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-slider bg_cover pt-150"
         style="background-image: url(<?= base_url() . 'assets_web/images/' ?>baner/img2.jpg)" data-overlay="4">
        <div class="container">
            <div class="row direction justify">
                <div class="col-xl-6 col-lg-6">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">مدرستنا تجعلك من الاوائل</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">نسعى لتدريس مناهج متميزة على ايدى معلمين متميزين
                            فى كافة المواد العلمية</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-slider bg_cover pt-150"
         style="background-image: url(<?= base_url() . 'assets_web/images/' ?>baner/img3.jpg)" data-overlay="4">
        <div class="container">
            <div class="row direction justify">
                <div class="col-xl-6 col-lg-6">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">مدرستنا دليلك للنجاح</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">نسعى لتدريس مناهج متميزة على ايدى معلمين متميزين
                            فى كافة المواد العلمية</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!--====== مميزات المدرسة ======-->
<section class="video-feature bg_cover pt-60 pb-110 direction"
         style="background-image: url(<?= base_url() . 'assets_web/images/' ?>features.jpg)" data-aos="fade-down"
         data-aos-easing="linear" data-aos-duration="900">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-last order-lg-first">
                <div class="text-center pt-50">
                    <a class="Video-popup" href="https://www.youtube.com/watch?v=KcUfkrprw4k"><i
                                class="fa fa-play video-i"></i></a>
                </div> <!-- row -->
            </div>
            <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                <div class="feature pt-50">
                    <div class="feature-title">
                        <h3>مميزات المدرسة</h3>
                    </div>
                    <ul>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="<?= base_url() . 'assets_web/images/' ?>all-icon/f-1.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>اختبارات دورية</h4>
                                    <p>تمتاز المدرسة بعمل اختبارات بصفة دورية للطلبة لمعرفة مستواهم والعمل على زيادة
                                        تفوقهم </p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="<?= base_url() . 'assets_web/images/' ?>all-icon/f-3.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>متابعة مستمرة</h4>
                                    <p>تمتاز المدرسة بمتابعتها باستمار للطلبة وارسال التقارير لأولياء الأمور</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">

                                    <img src="<?= base_url() . 'assets_web/images/' ?>all-icon/f-2.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>معلمين متميزين</h4>
                                    <p>تضم المدرسة مجموعة متميزة من المعلمين فى مختلف التخصصات والمراحل التعليمية</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                    </ul>
                </div> <!-- feature -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="feature-bg"></div>
</section>


<!--====== نبذة عنا ======-->
<section class="about-area pt-60 pb-60 direction aboutt">
    <div class="container c-relative">
        <div class="row">
            <div class="col-lg-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
                <div class="about-content mt-40">
                    <div class="section-title pt-45">
                        <h5><?= translate_web('About_us') ?></h5>
                        <h2><?= translate_web('About_us_title') ?> </h2>
                    </div>
                    <p><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                            echo $about_us[0]->about_us_short_en;
                        } elseif ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')) {
                            echo $about_us[0]->about_us_short_ru;
                        } else {
                            echo $about_us[0]->about_us_short;
                        }
                        ?> </p>
                    <a href="<?= base_url() ?>about_us" class="main-btn"><?= translate_web('load_more') ?></a>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
                <div class="about-image mt-50">
                    <div class="single-image image-1">
                        <img src="<?= base_url() . 'assets_web/images/' ?>about/about-1.png" alt="">
                    </div>
                    <div class="single-image image-2">
                        <img src="<?= base_url() . 'assets_web/images/' ?>about/about-21.jpg" alt="">
                    </div>
                    <div class="single-image image-3">
                        <img src="<?= base_url() . 'assets_web/images/' ?>about/about-3.jpg" alt="">
                    </div>
                    <div class="single-image image-4">
                        <img src="<?= base_url() . 'assets_web/images/' ?>about/about-4.jpg" alt="">
                    </div>

                    <div class="about-icon icon-1">
                        <img src="<?= base_url() . 'assets_web/images/' ?>about/icon-1.png" alt="">
                    </div>
                    <div class="about-icon icon-2">
                        <img src="<?= base_url() . 'assets_web/images/' ?>about/icon-2.png" alt="">
                    </div>
                    <div class="about-icon icon-3">
                        <img src="<?= base_url() . 'assets_web/images/' ?>about/icon-3.png" alt="">
                    </div>
                    <div class="about-icon icon-4">
                        <img src="<?= base_url() . 'assets_web/images/' ?>about/icon-4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($this->fungsi->company_stats() && (!empty($this->fungsi->company_stats()))) {
    $company_stats = $this->fungsi->company_stats(); ?>
    <!--====== الاحصائيات ======-->
    <div class="bg_cover pt-110 pb-110 direction" data-overlay="8"
         style="background-image: url(<?= base_url() . 'assets_web/images/' ?>baner/img3.jpg)" data-aos="fade-up"
         data-aos-easing="linear" data-aos-duration="900">
        <div class="container">

            <div class="row">
                <?php foreach ($company_stats as $company_stat) {
                    if ($set_lang == 'english') {
                        $title = $company_stat->title_en;

                    }  else {
                        $title = $company_stat->title;

                    }
                    ?>
                    <div class="col-lg col-sm-6">
                        <div class="singel-counter text-center mt-40">
                            <span><span class="counter"><?=$company_stat->number?></span> </span>
                            <p><?=$title?></p>
                        </div> <!-- singel counter -->
                    </div>
                <?php } ?>

            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    <?php
}
?>

<!--====== المواد العلمية ======-->
<!--<section   class="subject pt-60 pb-60"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title pb-45">
                     <h2>المواد العلمية</h2>
                     <span class="line"></span>
                </div>  
            </div>
        </div> 
        
          <div class="category-slied" dir="rtl">
                 <div class="singel-course">
                    <div class="thum">
                        <div class="image img-study" style="background-image: url(<?= base_url() . 'assets_web/images/' ?>subject/img1.jpg)" alt="img">
                         </div>
                     </div>
                    <div class="cont">
                          <div class="row">
                              <div class=" mb-2 col-md-12">
                                   <a href="subject-details.html"><h4>اسم المادة العلمية</h4></a>
                            </div> 
                             <div class=" mb-2 col-md-12">
                                  <span class="spanclr"><i class="fa fa-graduation-cap mll-5"></i>   المرحلة التعليمية :- </span> <span class="spanclr1"> الصف الاول الابتدائى</span> 
                             </div>
                             
                        <div class=" mb-2 col-md-6">
                                 <span class="spanclr"><i class="fa fa-book mll-5"></i> عدد الوحدات :- </span><span class="spanclr1">3</span> 
                             </div>
                            
                        <div class=" mb-2 col-md-6">
                                <span class="spanclr"><i class="fa fa-file mll-5"></i> عدد الدروس :- </span><span class="spanclr1">9</span> 
                             </div>
                              </div>
                     </div>
                </div>  
            
                  <div class="singel-course">
                    <div class="thum">
                        <div class="image img-study" style="background-image: url(<?= base_url() . 'assets_web/images/' ?>subject/img2.jpg)" alt="img">
                           
                        </div>
                     </div>
                    <div class="cont">
                          <div class="row">
                               <div class=" mb-2 col-md-12">
                                   <a href="subject-details.html"><h4>اسم المادة العلمية</h4></a>
                            </div> 
                             <div class=" mb-2 col-md-12">
                                  <span class="spanclr"><i class="fa fa-graduation-cap mll-5"></i>   المرحلة التعليمية :- </span> <span class="spanclr1"> الصف الاول الابتدائى</span> 
                             </div>
                             
                        <div class=" mb-2 col-md-6">
                                 <span class="spanclr"><i class="fa fa-book mll-5"></i> عدد الوحدات :- </span><span class="spanclr1">3</span> 
                             </div>
                            
                        <div class=" mb-2 col-md-6">
                                <span class="spanclr"><i class="fa fa-file mll-5"></i> عدد الدروس :- </span><span class="spanclr1">9</span> 
                             </div>
                              </div>
                     </div>
                </div> 
                  
                  <div class="singel-course">
                    <div class="thum">
                        <div class="image img-study" style="background-image: url(<?= base_url() . 'assets_web/images/' ?>subject/img3.jpg)" alt="img">
                           
                        </div>
                     </div>
                    <div class="cont">
                          <div class="row">
                               <div class=" mb-2 col-md-12">
                                   <a href="subject-details.html"><h4>اسم المادة العلمية</h4></a>
                            </div> 
                             <div class=" mb-2 col-md-12">
                                  <span class="spanclr"><i class="fa fa-graduation-cap mll-5"></i>   المرحلة التعليمية :- </span> <span class="spanclr1"> الصف الاول الابتدائى</span> 
                             </div>
                             
                        <div class=" mb-2 col-md-6">
                                 <span class="spanclr"><i class="fa fa-book mll-5"></i> عدد الوحدات :- </span><span class="spanclr1">3</span> 
                             </div>
                            
                        <div class=" mb-2 col-md-6">
                                <span class="spanclr"><i class="fa fa-file mll-5"></i> عدد الدروس :- </span><span class="spanclr1">9</span> 
                             </div>
                              </div>
                     </div>
                </div> 
                  
                  <div class="singel-course">
                    <div class="thum">
                        <div class="image img-study" style="background-image: url(<?= base_url() . 'assets_web/images/' ?>subject/img4.jpg)" alt="img">
                           
                        </div>
                     </div>
                    <div class="cont">
                          <div class="row">
                               <div class=" mb-2 col-md-12">
                                   <a href="subject-details.html"><h4>اسم المادة العلمية</h4></a>
                            </div> 
                             <div class=" mb-2 col-md-12">
                                  <span class="spanclr"><i class="fa fa-graduation-cap mll-5"></i>   المرحلة التعليمية :- </span> <span class="spanclr1"> الصف الاول الابتدائى</span> 
                             </div>
                             
                        <div class=" mb-2 col-md-6">
                                 <span class="spanclr"><i class="fa fa-book mll-5"></i> عدد الوحدات :- </span><span class="spanclr1">3</span> 
                             </div>
                            
                        <div class=" mb-2 col-md-6">
                                <span class="spanclr"><i class="fa fa-file mll-5"></i> عدد الدروس :- </span><span class="spanclr1">9</span> 
                             </div>
                              </div>
                     </div>
                </div> 
                  
                    </div>  
                 
     </div>  
</section>-->

<?php if (isset($projects) && !empty($projects)) {
    ?>
    <!--====== الأيفنتات ======-->
    <section class="pt-70 pb-70 bck direction" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
        <div class="container c-relative">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title pb-45">
                        <h2><?= translate_web('Our_events') ?> </h2>
                        <span class="line"></span>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <?php
                foreach ($projects as $row) { ?>
                    <div class="col-lg-6">
                        <div class="singel-event-list mt-30">
                            <div class="event-thum">
                                <img src="<?php if (!empty($row->image) && (file_exists('uploads/project/' . $row->image))) {
                                    echo base_url() . "uploads/project/thumbs/" . $row->image;
                                } else {
                                    echo base_url() . 'uploads/defult_image.jpg';
                                } ?>" alt="Event">
                            </div>
                            <div class="event-cont">
                                <span><i class="fa fa-calendar"></i> 6-11-2023</span>
                                <a href="<?= base_url() ?>one_event/<?= base64_encode($row->id) ?>">
                                    <h4><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                                            echo $row->name_en;
                                        } elseif ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')) {
                                            echo $row->name_ru;
                                        } else {
                                            echo $row->name_ar;
                                        }
                                        ?></h4></a>
                                <span><i class="fa fa-clock-o"></i> <?= $row->from_time ?> - <?= $row->to_time ?></span>
                                <span><i class="fa fa-map-marker"></i> <?= $row->location ?></span>
                                <p class="fnt"><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                                        echo word_limiter(strip_tags($row->description_en), 30, '...');
                                    } elseif ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')) {
//                                        echo $row->description_ru;
                                        echo word_limiter(strip_tags($row->description_ru), 30, '...');

                                    } else {
//                                        echo $row->description_ar;
                                        echo word_limiter(strip_tags($row->description_ar), 30, '...');

                                    }
                                    ?> </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-lg-12 text-center mt-60">
                    <a href="<?= base_url() ?>events" class="main-btn"><?= translate_web('load_more') ?></a>
                </div>
            </div> <!-- row -->

        </div> <!-- container -->
    </section>
    <?php
}
?>

<?php if (isset($blogs) && (!empty($blogs))) { ?>

    <!--====== اخر الاخبار ======-->
    <section id="news-part" class="pt-90 pb-90 direction" data-aos="fade-down" data-aos-easing="linear"
             data-aos-duration="900">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-50">
                        <h5><?= translate_web('Our_Blog') ?></h5>
                        <h2><?= translate_web('Our_Blog_title') ?></h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <?php
                if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                    switch ($_SESSION['site_lang']) {
                        case 'arabic':
                            $product_name = 'name_ar';
                            $product_description = 'description_ar';
                            break;
                        case 'english':
                            $product_name = 'name_en';
                            $product_description = 'description_en';
                            break;
                        case 'russian':
                            $product_name = 'name_ru';
                            $product_description = 'description_ru';
                            break;
                        default:
                            $product_name = 'name_en';
                            $product_description = 'description_en';
                            break;
                    }
                }
                foreach ($blogs as $blog) {
                    if (isset($blog->image) && (!empty($blog->image))) {
                        $img_url = base_url() . 'uploads/news/' . $blog->image;
                    } else {
                        $img_url = base_url() . 'assets_web/images/news/img2.jpg';
                    }

                    ?>

                    <div class="col-lg-6">
                        <div class="singel-news mt-30">
                            <div class="news-thum pb-25">
                                <img src="<?= $img_url ?>" alt="News">
                            </div>
                            <div class="news-cont">
                                <ul>
                                    <li>
                                        <a><i class="fa fa-calendar"></i><?= date('y-m-d', strtotime($blog->publish_date)) ?>
                                        </a></li>
                                    <!--                                <li><a> <i class="fa fa-calendar"></i> احمد حسن</a></li>-->
                                </ul>
                                <a href="<?= base_url() . 'one_blog/' . base64_encode($blog->id) ?>">
                                    <h3><?= $blog->$name ?></h3></a>
                                <p><?= word_limiter(strip_tags($blog->$description), 60, '...') ?></p>
                            </div>
                        </div> <!-- singel news -->
                    </div>
                <?php } ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
<?php } ?>

<!--====== شركاؤنا ======-->
<div class="patnar-logo pt-60 pb-60" style="background-image: url(<?= base_url() . 'assets_web/images/' ?>bg-7.png)"
     data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title pb-45">
                    <h2>شركاؤنا </h2>
                    <span class="line"></span>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row patnar-slied">
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="<?= base_url() . 'assets_web/images/' ?>patnar-logo/p-1.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="<?= base_url() . 'assets_web/images/' ?>patnar-logo/p-2.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="<?= base_url() . 'assets_web/images/' ?>patnar-logo/p-3.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="<?= base_url() . 'assets_web/images/' ?>patnar-logo/p-4.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="<?= base_url() . 'assets_web/images/' ?>patnar-logo/p-2.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="<?= base_url() . 'assets_web/images/' ?>patnar-logo/p-3.png" alt="Logo">
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div> 
   