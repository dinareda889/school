<!--====== PAGE BANNER PART START ======-->
<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8" style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/about.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= $title?> </h2>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-60 pb-80 direction aboutt">
    <div class="container c-relative">
        <div class="row align-items">
            <div class="col-lg-6" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
                <div class="section-title mt-50">
                    <h5><?=$title?></h5>
                    <h2><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                            echo $manger_word->word_title_en;
                        }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                            echo $manger_word->word_title_en;
                        }else{
                            echo $manger_word->word_title_ar;
                        }
                        ?></h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                            echo $manger_word->word_en;
                        }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                            echo $manger_word->word_ru;
                        }else{
                            echo $manger_word->word_ar;
                        }
                        ?></p>
                </div>
            </div> <!-- about cont -->
            <div class="col-lg-5 offset-lg-1" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
                <div class="mt-50">
                    <img class="ab-sm" src="<?= base_url() . 'assets_web/' ?>images/about/about-21.jpg" alt="">
                    <img src="<?= base_url() . 'assets_web/' ?>images/features.jpg" class="ml-60 radius" alt="About">
                    <img class="tp-about-circle " src="<?= base_url() . 'assets_web/' ?>images/about/about-1.png" alt="About">
                </div>  <!-- about imag -->
            </div>
        </div> <!-- row -->

    </div> <!-- container -->
</section>
    