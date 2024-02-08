<!-- ============================ Page Title Start================================== -->
<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8"
         style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/log.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= translate_web('Our_events') ?>  </h2>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================ Page Title End ================================== -->

<!-- ============================ Blog Start ================================== -->


<section class="pt-70 pb-70 bck direction" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
    <div class="container c-relative">
        <?php if (isset($projects) && (!empty($projects))) { ?>
            <div class="row">
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


                foreach ($projects as $project) {
                    if (isset($project->image) && (!empty($project->image))) {
                        $img_url = base_url() . 'uploads/project/thumbs/' . $project->image;
                    } else {
                        $img_url = base_url() . 'assets_web/img/p-1.jpg';

                    }
                    ?>
                    <div class="col-lg-6">
                        <div class="singel-event-list mt-30">
                            <div class="event-thum">
                                <img src="<?= $img_url ?>" alt="Event">
                            </div>
                            <div class="event-cont">
                                <span><i class="fa fa-calendar"></i> <?= date('y-m-d', strtotime($project->create_at)) ?></span>
                                <a href="<?= base_url() . 'one_event/' . base64_encode($project->id) ?>">
                                    <h4><?= $project->$name ?></h4></a>
                                <p class="fnt"><?= word_limiter($project->$description, 20, '...') ?> </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <!-- row -->
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
    </div> <!-- container -->
</section>

<!-- ============================ Agency List End ================================== -->
			

