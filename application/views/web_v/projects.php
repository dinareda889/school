<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title"><?= translate_web('Our_project') ?></h2>
                <span class="ipn-subtitle"><?= translate_web('Our_Latest_project') ?></span>

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
                    <h2><?= translate_web('Latest_project') ?></h2>
                    <p><?= translate_web('project_sub_title') ?></p>

                </div>
            </div>
        </div>
        <div class="row">
            <?php if (isset($projects) && (!empty($projects))) {
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
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="location-property-wrap">
                    <div class="location-property-thumb">
                        <?php if (isset($project->image) && (!empty($project->image))) {
                            $img_url = base_url() . 'uploads/project/thumbs/' . $project->image;
                        } else {
                            $img_url = base_url() . 'assets_web/img/p-1.jpg';

                        }
                        ?>
                        <a href="<?= base_url() . 'one_project/' . base64_encode($project->id) ?>"><img src="<?= $img_url ?>" class="img-fluid"  alt="images"/></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title"><?= $project->$name ?></h4>
                            <span><?= word_limiter($project->$description, 20, '...') ?></span>
                        </div>
                        <div class="lp-content-right">
                            <a href="<?= base_url() . 'one_project/' . base64_encode($project->id) ?>" class="lp-property-view">
                                <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            } ?>
        
        </div>

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
			

