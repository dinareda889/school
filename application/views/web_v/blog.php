<!-- ============================ Page Title Start================================== -->


<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8"
         style="background-image: url(<?= base_url() . 'assets_web/images/' ?>page-baner/terms.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= translate_web('Our_Blog') ?>  </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Blog Start ================================== -->
<?php if (isset($blogs) && (!empty($blogs))) { ?>
    <section class="pt-70 pb-70 bck direction" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
        <div class="container c-relative">
            <div class="row">
                <?php if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
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
                foreach ($blogs as $blog) {

                    if (isset($blog->image) && (!empty($blog->image))) {
                        $img_url = base_url() . 'uploads/news/' . $blog->image;
                    } else {
                        $img_url = base_url() . 'assets_web/images/news/img2.jpg';
                    }


                    ?>
                    <div class="col-lg-4">
                        <div class="singel-blog mt-30">
                            <div class="blog-thum">
                                <img src="<?= $img_url ?>" alt="Blog">
                            </div>
                            <div class="blog-cont">
                                <a href="<?= base_url() . 'one_blog/' . base64_encode($blog->id) ?>">
                                    <h3><?= $blog->$name ?></h3></a>
                                <ul>
                                    <li>
                                        <a><i class="fa fa-calendar"></i><?= date('y-m-d', strtotime($blog->publish_date)) ?>
                                        </a></li>
                                    <!--                                <li><a> <i class="fa fa-calendar"></i> احمد حسن</a></li>-->
                                </ul>

                                <p><?= word_limiter($blog->$description, 30, '...') ?></p>
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

        </div> <!-- container -->
    </section>
<?php } ?>
<!-- ============================ Agency List End ================================== -->
			


