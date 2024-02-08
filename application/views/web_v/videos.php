
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8" style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/log.jpg)">
        <div class="container">
            <div class="row direction">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?= translate_web('video') ?></h2>
                     </div>   
                </div>
            </div> 
        </div>  
    </section>
    
     
    <!--====== المعلمين ======-->
    
     <section class="video-feature bck pt-60 pb-60 direction"   data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
        <div class="container c-relative">
            <div class="row align-items-center">
                <?php if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                    switch ($_SESSION['site_lang']) {
                        case 'arabic':
                            $name = 'title';
                            break;
                        case 'english':
                            $name = 'title_en';
                            break;

                        default:
                            $name = 'title_en';
                            break;
                    }
                }
                foreach ($videos as $video) {

                if (isset($video->image) && (!empty($video->image))) {
                    $img_url = base_url() . 'uploads/video/' . $video->image;
                } else {
                    $img_url = base_url() . 'assets_web/images/news/img1.jpg';
                }
                ?>
                <div class="col-lg-4 mb-20">
                    <div class="video-box">
                    <div class="bck-video text-center " style="background-image: url(<?=$img_url?>)">
                        <a class="Video-popup" href="https://www.youtube.com/watch?v=<?=$video->video_link?>"><i class="fa fa-play video-i1"></i></a>
                    </div> <!-- row -->
                    <div class="text-center">
                   <a href="javascript:void(0) " class="video-name"><?=$video->$name?></a>
                    </div>
                </div>
               </div>
                <?php  } ?>

                <?php if (isset($links) && (!empty($links))) { ?>


                    <div class="col-lg-12">
                        <nav class="courses-pagination mt-50">
                            <?php echo $links; ?>

                        </nav>
                    </div>
                <?php } ?>            </div> <!-- row -->
        </div> <!-- container -->
     </section>
    
    
    
   