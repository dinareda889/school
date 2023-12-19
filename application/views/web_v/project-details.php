<style>
    iframe {
        width: 100%;
        height: 300px;
    }
</style>
<!-- ============================ Page Title Start================================== -->

<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8"
         style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/log.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= translate_web('Project_details') ?>  </h2>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================ Page Title End ================================== -->
<?php
if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
    switch ($_SESSION['site_lang']) {
        case 'arabic':
            $name = 'name_ar';
            $description = 'description_ar';
            break;
        case 'english':
            $name = 'name_en';
            $description = 'description_en';
            break;
        case 'russian':
            $name = 'name_ru';
            $description = 'description_ru';
            break;
        default:
            $name = 'name_en';
            $description = 'description_en';
            break;
    }
}

?>
<!-- ============================ Agency List Start ================================== -->

<section class="pt-60 pb-60 bck direction" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
    <div class="container c-relative">
        <div class="events-area">
            <div class="row">
                <div class="col-lg-8">
                    <div class="events-left">
                        <h3><?= $one_project->$name ?></h3>
                        <span><i class="fa fa-calendar"></i><?= date('y-m-d', strtotime($one_project->create_at)) ?> </span>
                        <!--                            <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>-->
                        <!--                            <span><i class="fa fa-map-marker"></i> المكان</span>-->
                        <?php
                        if (isset($one_project->image) && (!empty($one_project->image))) {
                            $img_url = base_url() . 'uploads/project/thumbs/' . $one_project->image;
                        } else {
                            $img_url = base_url() . 'assets_web/img/p-1.jpg';

                        }
                        ?>
                        <img src="<?= $img_url ?>" alt="Event">
                        <p><?= $one_project->$description ?></p>
                    </div> <!-- events left -->
                </div>
                <div class="col-lg-4">
                    <div class="events-right">
                        <?php /* ?>
                        <div class="events-coundwon bg_cover" data-overlay="8"
                             style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/about.jpg)">
                            <div data-countdown="2024/02/12"></div>

                        </div>

                        <?php */ ?>
                        <!-- events coundwon -->
                        <div class="events-address mt-30">
                            <ul>
                                <!-- <li>
                                     <div class="singel-address">
                                         <div class="icon">
                                             <i class="fa fa-clock-o"></i>
                                         </div>
                                         <div class="cont">
                                             <h6>وقت البداية</h6>
                                             <span>12:00 Am</span>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="singel-address">
                                         <div class="icon">
                                             <i class="fa fa-bell-slash"></i>
                                         </div>
                                         <div class="cont">
                                             <h6>وقت الأنتهاء</h6>
                                             <span>05:00 Am</span>
                                         </div>
                                     </div>
                                 </li>-->
                                <?php if (isset($one_project->location_map) && (!empty($one_project->location_map))) { ?>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-map"></i>
                                            </div>
                                            <div class="cont">
                                                <h6><?= translate_web('Location') ?></h6>
                                                <span>مكان الايفنت</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php if (isset($one_project->location_map) && (!empty($one_project->location_map))) { ?>

                                <div class="mt-25 h-100 w-100">
                                    <?= $one_project->location_map ?>
                                </div> <!-- Map -->
                            <?php } ?>

                        </div> <!-- events address -->
                    </div> <!-- events right -->
                </div>
            </div> <!-- row -->
        </div> <!-- events-area -->
    </div> <!-- container -->
</section>

<!-- ============================ Agency List End ================================== -->

