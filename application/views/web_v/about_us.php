<!--====== PAGE BANNER PART START ======-->
<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8" style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/about.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= translate_web('About_Us') ?> </h2>

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
                    <h5><?=translate_web('About_Us')?></h5>
                    <h2><?=translate_web('About_Us_title')?> </h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                            echo $about_us[0]->about_us_en;
                        }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                            echo $about_us[0]->about_us_ru;
                        }else{
                            echo $about_us[0]->about_us;
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
        <?php if (isset($about_us) && (!empty($about_us))) {
            if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                switch ($_SESSION['site_lang']) {
                    case 'arabic':
                        $mission = 'our_mission';
                        $vision = 'our_vision';
                        $our_goals = 'our_goals';
                        break;
                    case 'english':
                        $mission = 'our_mission_en';
                        $vision = 'our_vision_en';
                        $our_goals = 'our_goals_en';
                        break;
                    case 'russian':
                        $mission = 'our_mission_ru';
                        $vision = 'our_vision_ru';
                        $our_goals = 'our_goals_ru';
                        break;
                    default:
                        $mission = 'our_mission_en';
                        $vision = 'our_vision_en';
                        $our_goals = 'our_goals_en';
                        break;
                }
            }
        }
        ?>
        <div class="about-items mt-60"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <img src="<?= base_url() . 'assets_web/' ?>images/vision.png" class="mb-20">
                        <h4><?=translate_web('Our_vision')?></h4>
                        <p class="text-align"><?=$about_us[0]->$vision?></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <img src="<?= base_url() . 'assets_web/' ?>images/goal.png" class="mb-20">
                        <h4><?=translate_web('Our_Mission')?></h4>
                        <p class="text-align"><?=$about_us[0]->$mission?></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <img src="<?= base_url() . 'assets_web/' ?>images/target.png" class="mb-20">
                        <h4><?=translate_web('Our_target')?></h4>
                        <p class="text-align"><?=$about_us[0]->$our_goals?></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
</section>
    