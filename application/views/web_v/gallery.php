<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8"
         style="background-main_image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/terms.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= translate_web('gallery') ?> </h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pt-70 pb-70 bck direction" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
    <div class="container c-relative">
        <?php if (isset($photos) && (!empty($photos))) { ?>

            <div class="row">
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
                foreach ($photos as $photo) {

                    if (isset($photo->main_image) && (!empty($photo->main_image))) {
                        $img_url = base_url() . 'uploads/web/photos/' . $photo->main_image;
                    } else {
                        $img_url = base_url() . 'assets_web/images/web/photos/img2.jpg';
                    }
                    ?>
                    <div class="col-lg-4">
                        <div class="singel-blog mt-30">
                            <div class="blog-thum">
                                <img src="<?= $img_url ?>" alt="Blog">
                            </div>
                            <div class="blog-cont">
                                <a href="<?= base_url() . 'one_photo/' . base64_encode($photo->id) ?>"><h3><?= $photo->$name ?></h3></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isset($links) && (!empty($links))) { ?>


                    <div class="col-lg-12">
                        <nav class="courses-pagination mt-50">
                            <?php echo $links; ?>

                        </nav>
                    </div>
                <?php } ?>
            </div> <!-- row -->
        <?php } ?>
    </div> <!-- container -->
</section>



