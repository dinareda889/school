<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title"><?= translate_web('Our_Blog') ?></h2>
                <span class="ipn-subtitle"><?= translate_web('Our_Latest_Blog') ?></span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Blog Start ================================== -->
<section class="gray-simple">

    <div class="container">

        <div class="row">
            <div class="col text-center">
                <div class="sec-heading center">
                    <h2><?= translate_web('Latest_Blog') ?></h2>
                    <p><?= translate_web('blog_sub_title') ?></p>
                </div>
            </div>
        </div>

        <!-- row Start -->
        <div class="row">
            <?php if (isset($blogs) && (!empty($blogs))) {
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
                foreach ($blogs as $blog) {
                    ?>
                    <!-- Single blog Grid -->
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-wrap-grid">

                            <div class="blog-thumb">
                                <?php if (isset($blog->image) && (!empty($blog->image))) {
                                    $img_url = base_url() . 'uploads/news/' . $blog->image;
                                } else {
                                    $img_url = base_url() . 'assets_web/img/p-1.jpg';
                                }
                                ?>
                                <a href="<?= base_url() . 'one_blog/' . base64_encode($blog->id) ?>"><img
                                            src="<?= $img_url ?>" class="img-fluid"
                                            alt="images"/></a>
                            </div>

                            <div class="blog-info">
                                <span class="post-date"><i class="fa-regular fa-calendar-days"></i>30 july 2023</span>
                            </div>

                            <div class="blog-body">
                                <h4 class="bl-title"><a
                                            href="<?= base_url() . 'one_blog/' . base64_encode($blog->id) ?>"><?= $blog->$name ?></a>
                                </h4>
                                <p><?= word_limiter($blog->$description, 30, '...') ?> </p>
                                <a href="<?= base_url() . 'one_blog/' . base64_encode($blog->id) ?>"
                                   class="bl-continue"><?= translate_web('Read_more') ?> <i
                                            class="fas fa-arrow-right"></i></a>
                            </div>

                        </div>
                    </div>
                <?php }
            } ?>


        </div>
        <!-- /row -->

        <!-- Pagination -->

        <?php if (isset($links) && (!empty($links))) { ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <?php echo $links; ?>

                    <!--  <ul class="pagination p-center">
                                      <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Previous">
                                              <i class=" fa-solid fa-arrow-left"></i>
                                              <span class="sr-only">Previous</span>
                                          </a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item"><a class="page-link" href="#">...</a></li>
                                      <li class="page-item"><a class="page-link" href="#">6</a></li>
                                      <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Next">
                                              <i class="fa-solid fa-arrow-right"></i>
                                              <span class="sr-only">Next</span>
                                          </a>
                                      </li>
                                  </ul>-->
                </div>
            </div>
        <?php } ?>


    </div>

</section>
<!-- ============================ Agency List End ================================== -->
			


