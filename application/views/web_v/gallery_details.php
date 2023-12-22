
    <!--====== PAGE BANNER PART START ======-->
    
   <section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8" style="background-images_name: url(<?= base_url() . 'assets_web/' ?>images/page-baner/terms.jpg)">
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
                }?>
    
     <section class="pt-70 pb-70 bck direction" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
        <div class="container c-relative">
           <div class="row justify">
              <div class="col-lg-10">
                  <div class="blog-details mt-30">
                        <div class="cont">

                          <h3><?= $photo->$name ?></h3>
                      </div> <!-- cont -->
                      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" dir="rtl">
  <ol class="carousel-indicators">
      <?php if (isset($one_photo->imgs) && (!empty($one_photo->imgs))) {
          foreach ($one_photo->imgs as $key => $img) { ?>
              <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>"
                  class="<?php
                  if ($key == 0) {
                      echo 'active';
                  } ?>"></li>
          <?php }
      } ?>
  </ol>
  <div class="carousel-inner">
      <?php if (isset($one_photo->imgs) && (!empty($one_photo->imgs))) {
          foreach ($one_photo->imgs as $key=>$img) {
              if (isset($img->images_name) && (!empty($img->images_name))) {
                  $img_url = base_url() . 'uploads/web/photos/' . $img->images_name;
              } else {
                  $img_url = base_url() . 'assets_web/img/p-1.jpg';

              }

              ?>
              <div class="carousel-item <?php
              if ($key == 0) {
                  echo 'active';
              } ?>">
                  <img class="d-block w-100" src="<?= $img_url ?>" alt="First slide">
              </div>
          <?php }
      } ?>
  <!--  <div class="carousel-item active">
      <img class="d-block w-100" src="images/web/photos/img1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/web/photos/img2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/web/photos/img3.jpg" alt="Third slide">
    </div>-->
  </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                             data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only"><?= translate_web('prev') ?></span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                             data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only"><?= translate_web('next') ?></span>
                          </a>
</div>
                     
                  </div> <!-- blog details -->
              </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    
    
