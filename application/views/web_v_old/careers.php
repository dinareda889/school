<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title"><?= translate_web('Our_Careers') ?></h2>
                <span class="ipn-subtitle"><?= translate_web('Our_Latest_careers') ?></span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Blog Start ================================== -->
<section class="bg-light projects">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2><?= translate_web('Latest_careers') ?></h2>
                    <p><?= translate_web('careers_sub_title') ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if (isset($careers) && (!empty($careers))) {
            if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                switch ($_SESSION['site_lang']) {
                    case 'arabic':
                        $name = 'title';
                        $description = 'details';
                        break;
                    case 'english':
                        $name = 'title_en';
                        $description = 'details_en';
                        break;
                    case 'russian':
                        $name = 'title_ru';
                        $description = 'details_ru';
                        break;
                    default:
                        $name = 'title_en';
                        $description = 'details_en';
                        break;
                }
            }
            foreach ($careers as $career) {
            ?>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 ">
                <div class="classical-cats-wrap style_2 shadows">
                    <a class="classical-cats-boxs bg-white rounded-4 px-3 py-4"
                       href="<?= base_url() . 'one_career/' . base64_encode($career->id) ?>">
                        <div class="classical-cats-wrap-content">
                            <h4><?= $career->$name ?></h4>
                            <p><?= word_limiter(strip_tags($career->$description), 15, '...') ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php }
            } ?>

        </div>

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
			

