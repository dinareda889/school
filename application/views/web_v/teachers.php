<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8"
         style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/log.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= translate_web('teachers_Page') ?> </h2>
                </div>
            </div>
        </div>
    </div>
</section>


<!--====== المعلمين ======-->

<section id="teachers-page" class="pt-60 pb-60 bck direction" data-aos="fade-down" data-aos-easing="linear"
         data-aos-duration="900">
    <div class="container c-relative">
        <?php if (isset($team) && !empty($team)) { ?>
            <div class="row">
                <?php
                foreach ($team as $row) {
                    if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                        switch ($_SESSION['site_lang']) {
                            case 'arabic':
                                $name = 'name';
                                $job_title = 'job_title';
                                break;
                            case 'english':
                                $name = 'name_en';
                                $job_title = 'job_title_en';
                                break;
                            case 'russian':
                                $name = 'name_ru';
                                $job_title = 'job_title_ru';
                                break;
                            default:
                                $name = 'name_en';
                                $job_title = 'job_title_en';
                                break;
                        }
                    }
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="singel-teachers mt-30 text-center">
                            <div class="image">
                                <a href="teachers-details.html"> <img src="<?php if (!empty($row->image) && (file_exists('uploads/team/'.$row->image))) {
                                        echo base_url() . "uploads/team/" .$row->image;
                                    } else {
                                        echo base_url() . 'uploads/defult_image.jpg';
                                    } ?>" alt="Teachers"></a>
                            </div>
                            <div class="cont">
                                <a href="teachers-details.html"><h6><?=$row->$name?></h6></a>
                                <span><?=$row->$job_title?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        <?php } ?>
        <?php if (isset($links) && (!empty($links))) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <?php echo $links; ?>
                    </nav>
                </div>
            </div>  <!-- row -->
        <?php } ?>
    </div>
</section>
    
   