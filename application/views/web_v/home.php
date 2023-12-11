<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- ============================ Hero Banner  Start================================== -->
<div class="hero-banner vedio-banner">
    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <?php if(isset($video) && !empty($video)){ ?>
            <source src="<?= base_url() . 'uploads/videos/'.$video['video_link'] ?>" type="video/mp4">

        <?php }else{ ?>
        <source src="<?= base_url() . 'assets_web/img' ?>/vedio/vedio.mp4" type="video/mp4">

        <?php } ?>
    </video>
    <div class="container">
        <!-- <div class="logo-banner-div">
            <img src="<?= base_url() . 'assets_web/img' ?>/logo.png" alt="logo-image" class="banner-img-logo">
        </div> -->
        <div class="full-search-2 eclip-search italian-search hero-search-radius shadow">
            <div class="hero-search-content">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 b-r">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <select id="Types" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <option value="1"><?=translate_web('All')?></option>
                                    <option value="2"><?=translate_web('Apartments')?></option>
                                    <option value="3"><?=translate_web('Villas')?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <select id="ptypes" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <option value="1">0.5</option>
                                    <option value="2">1</option>
                                    <option value="3">1.5</option>
                                    <option value="4">2</option>
                                    <option value="5">2.5</option>
                                    <option value="6">3</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group">
                            <div class="input-with-icon b-l">
                                <select id="location" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <option value="1">AED 750K - AED 1M</option>
                                    <option value="2">AED 1M - AED 2M</option>
                                    <option value="3">AED 2M - AED 3M</option>
                                    <option value="4">AED 3M - AED 4M</option>
                                    <option value="5">AED 4M - AED 5M</option>
                                    <option value="6">AED 5M - AED 6M</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="form-group">
                            <a href="#" class="btn search-btn" data-bs-toggle="modal" data-bs-target="#register"><?=translate_web('Search')?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->
<!-- ============================ About us Start ========================================= -->
<div class="about-us-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                    <img src="<?php if (!empty($this->company_data->about_image) && (file_exists('uploads/main/' . $this->company_data->about_image))) {
                        echo base_url() . "uploads/main/" .$this->company_data->about_image;
                    } else {
                        echo base_url() . 'uploads/defult_image.jpg';


                    } ?>" alt="About Us Image">
                    <div class="about-us-img-info  about-us-img-info-3">
                        <div class="ltn__video-img ltn__animation-pulse1">
                            <img src="<?php if (!empty($this->company_data->about_image) && (file_exists('uploads/main/' . $this->company_data->about_image))) {
                                echo base_url() . "uploads/main/" .$this->company_data->about_image;
                            } else {
                                echo base_url() . 'uploads/defult_image.jpg';
                            } ?>" alt="images">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-20">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color"><?=translate_web('About_us')?></h6>
                        <h1 class="section-title"><?=translate_web('Welcome_To_Madain_Setting_The_Benchmark_For_Tomorrows_Living')?></h1>
                        <p><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                          echo $about_us[0]->about_us_en;
                        }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                                echo $about_us[0]->about_us_ru;
                            }else{
                                echo $about_us[0]->about_us;
                            }
                        ?>
                        </p>
                    </div>
                    <ul class="about-us-list clearfix">
                        <li>
                            <i class="flaticon-home-2"></i>
                            <?=translate_web('Smart_Home_Design')?>
                        </li>
                        <li>
                            <i class="flaticon-mountain"></i>
                            <?=translate_web('Beautiful_Scene_Around')?>
                        </li>
                        <li>
                            <i class="flaticon-heart"></i>
                            <?=translate_web('Exceptional_Lifestyle')?>
                        </li>
                        <li>
                            <i class="flaticon-secure"></i>
                            <?=translate_web('Complete_24/7_Security')?>
                        </li>
                    </ul>
                    <div class="about-callout bg-overlay-theme-05  mt-30">
                        <p><?=translate_web('Discover_our_meticulously_designed_apartments_and_unlock_a_world_designed_apartments_and_unlock_a_world')?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================================== About us End =================================== -->
<!-- ============================ Projects Start ================================== -->
<section class="bg-light projects">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2><?=translate_web('Our_Projects')?></h2>
                    <p><?=translate_web('Discover_our_meticulously_designed_apartments_and_unlock_a_world_of_elegance_and_comfort_that_will_surpass_your_expectations')?>.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if(isset($projects) && !empty($projects)){
                foreach ($projects as $row){ ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="location-property-wrap">
                            <div class="location-property-thumb">
                                <a href="<?=base_url()?>one_project/<?=base64_encode($row->id)?>">
                                    <img src="<?php if (!empty($row->image) && (file_exists('uploads/project/' . $row->image))) {
                                        echo base_url() . "uploads/project/thumbs/" .$row->image;
                                    } else {
                                        echo base_url() . 'uploads/defult_image.jpg';
                                    } ?>" class="img-fluid" alt="images" /></a>
                            </div>
                            <div class="location-property-content">
                                <div class="lp-content-flex">
                                    <h4 class="lp-content-title"><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                                            echo $row->name_en;
                                        }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                                            echo $row->name_ru;
                                        }else{
                                            echo $row->name_ar;
                                        }
                                        ?></h4>
                                   <!-- <span>Project | Category</span>-->
                                </div>
                                <div class="lp-content-right">
                                    <a href="<?=base_url()?>one_project/<?=base64_encode($row->id)?>" class="lp-property-view">
                                        <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
           <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="location-property-wrap">
                    <div class="location-property-thumb">
                        <a href="project-details.html"><img src="<?/*= base_url() . 'assets_web/img' */?>/c-2.jpg" class="img-fluid" alt="images" /></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Madain Square</h4>
                            <span>Project | Category</span>
                        </div>
                        <div class="lp-content-right">
                            <a href="project-details.html" class="lp-property-view"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="location-property-wrap">
                    <div class="location-property-thumb">
                        <a href="project-details.html"><img src="<?/*= base_url() . 'assets_web/img' */?>/c-6.jpeg" class="img-fluid" alt="images" /></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Madain Tower</h4>
                            <span>Project | Category</span>
                        </div>
                        <div class="lp-content-right">
                            <a href="project-details.html" class="lp-property-view"><i class="fas fa-arrow-right"></i></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="location-property-wrap">
                    <div class="location-property-thumb">
                        <a href="project-details.html"><img src="<?/*= base_url() . 'assets_web/img' */?>/c-2.jpg" class="img-fluid" alt="images" /></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Madain Square</h4>
                            <span>Project | Category</span>
                        </div>
                        <div class="lp-content-right">
                            <a href="project-details.html" class="lp-property-view"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="location-property-wrap">
                    <div class="location-property-thumb">
                        <a href="project-details.html"><img src="<?/*= base_url() . 'assets_web/img' */?>/c-1.jpg" class="img-fluid" alt="images" /></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Madain Tower</h4>
                            <span>Project | Category</span>
                        </div>
                        <div class="lp-content-right">
                            <a href="project-details.html" class="lp-property-view"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="location-property-wrap">
                    <div class="location-property-thumb">
                        <a href="project-details.html"><img src="<?/*= base_url() . 'assets_web/img' */?>/c-3.jpg" class="img-fluid" alt="images" /></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Marina Arcade</h4>
                            <span>Project | Category</span>
                        </div>
                        <div class="lp-content-right">
                            <a href="project-details.html" class="lp-property-view"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <a href="<?=base_url()?>projects" class="btn btn-theme-light rounded"><?=translate_web('Browse_More_Projects')?></a>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Projects End ================================== -->
<!-- ============================ How To Use Start ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2><?=translate_web('How_It_Works?')?></h2>
                    <p><?=translate_web('Discover_our_meticulously_designed_apartments_and_unlock_a_world_of_elegance_and_comfort_that_will_surpass_your_expectations')?></p>
                </div>
            </div>
        </div>
        <div class="row">
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
            <div class="col-lg-4 col-md-4">
                <div class="middle-icon-features-item">
                    <div class="icon-features-wrap">
                        <div class="middle-icon-large-features-box f-light-success">
                            <i class="fa-solid fa-map-location-dot"></i></div></div>
                    <div class="middle-icon-features-content">
                        <h4><?=translate_web('Our_Mission')?></h4>
                        <p><?php
                          echo  substr_replace(strip_tags($about_us[0]->$mission), '... <br/> <a href="'.base_url().'about_us"
                            class="bl-continue">'.translate_web('Read_More').'<i
                                    class="fas fa-arrow-right"></i></a>', 250);
                            ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="middle-icon-features-item">
                    <div class="icon-features-wrap">
                        <div class="middle-icon-large-features-box f-light-success">
                            <i class="fa-solid fa-user-group"></i></div></div>
                    <div class="middle-icon-features-content">
                        <h4><?=translate_web('Our_Vision')?></h4>
                        <p><?php
                            echo  substr_replace(strip_tags($about_us[0]->$vision), '... <br/> <a href="'.base_url().'about_us"
                            class="bl-continue">'.translate_web('Read_More').'<i
                                    class="fas fa-arrow-right"></i></a>', 250);
                            ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="middle-icon-features-item remove">
                    <div class="icon-features-wrap">
                        <div class="middle-icon-large-features-box f-light-success">
                            <i class="fa-solid fa-clipboard-check"></i></div></div>
                    <div class="middle-icon-features-content">
                        <h4><?=translate_web('Our_Goals')?></h4>
                        <p><?php
                            echo  substr_replace(strip_tags($about_us[0]->$our_goals), '... <br/> <a href="'.base_url().'about_us"
                            class="bl-continue">'.translate_web('Read_More').'<i
                                    class="fas fa-arrow-right"></i></a>', 250);
                            ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ How To Use End ====================== -->
<!-- ================================= Blog Start ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2><?=translate_web('Our_Blog')?></h2>
                    <p><?=translate_web('Discover_our_meticulously_designed_apartments_and_unlock_a_world_of_elegance_and_comfort_that_will_surpass_your_expectations')?></p>
                </div>
            </div>
        </div>
  <!--      <div class="row">

            <?php /*if(isset($blogs) && !empty($blogs)){
                foreach ($blogs as $row){ */?>
                    <?php /*if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                        $name= $row->name_en;
                        $description= $row->description_en;
                    }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                        $name= $row->name_ru;
                        $description= $row->description_ru;
                    }else{
                        $name= $row->name_ar;
                        $description= $row->description_ar;
                    }
                    */?>


                    <div class="col-lg-4 col-md-6">
                        <div class="blog-wrap-grid">
                            <div class="blog-thumb">
                                <a href="blog-detail.html"><img src="<?/*= base_url() . 'assets_web/img' */?>/p-11.jpeg" class="img-fluid" alt="images" /></a>
                            </div>
                            <div class="blog-info">
                                <span class="post-date"><i class="fa-regular fa-calendar-days"></i>30 Mars 2023</span>
                            </div>
                            <div class="blog-body">
                                <h4 class="bl-title"><a href="#!">Why people choose us for own properties</a></h4>
                                <p>At Mada’in Properties PJSC, we exist to create innovative, boutique properties that surpass all expectations in detail </p>
                                <a href="blog-detail.html" class="bl-continue">Read more <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <?php
/*                }
            } */?>

          <div class="col-lg-4 col-md-6">
                <div class="blog-wrap-grid">
                    <div class="blog-thumb">
                        <a href="blog-detail.html"><img src="<?/*= base_url() . 'assets_web/img' */?>/p-8.jpeg" class="img-fluid" alt="images" /></a>
                    </div>
                    <div class="blog-info">
                        <span class="post-date"><i class="fa-regular fa-calendar-days"></i>10 August 2022</span>
                    </div>
                    <div class="blog-body">
                        <h4 class="bl-title"><a href="#!">List of benifits and impressive MADA'IN services</a></h4>
                        <p>At Mada’in Properties PJSC, we exist to create innovative, boutique properties that surpass all expectations in detail </p>
                        <a href="blog-detail.html" class="bl-continue">Read more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-wrap-grid">
                    <div class="blog-thumb">
                        <a href="blog-detail.html"><img src="<?/*= base_url() . 'assets_web/img' */?>/p-10.jpeg" class="img-fluid" alt="images" /></a>
                    </div>
                    <div class="blog-info">
                        <span class="post-date"><i class="fa-regular fa-calendar-days"></i>30 April 2023</span>
                    </div>
                    <div class="blog-body">
                        <h4 class="bl-title"><a href="#!">What people says about MADA'IN properties</a></h4>
                        <p>At Mada’in Properties PJSC, we exist to create innovative, boutique properties that surpass all expectations in detail </p>
                        <a href="blog-detail.html" class="bl-continue">Read more  <i class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="row">
            <?php if (isset($blogs) && (!empty($blogs))) {
            if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
            switch ($_SESSION['site_lang']) {
            case 'arabic':
            $product_name = 'name_ar';
            $product_description = 'description_ar';
            break;
            case 'english':
            $product_name = 'name_en';
            $product_description = 'description_en';
            break;
            case 'russian':
            $product_name = 'name_ru';
            $product_description = 'description_ru';
            break;
            default:
            $product_name = 'name_en';
            $product_description = 'description_en';
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
<!--                        <span class="post-date"><i class="fa-regular fa-calendar-days"></i>30 july 2023</span>
-->
                        <span class="post-date"><i class="fa-regular fa-calendar-days"></i><?=date('d M Y',strtotime($blog->create_at))?></span>
                    </div>

                    <div class="blog-body">
                        <h4 class="bl-title"><a
                                    href="<?= base_url() . 'one_blog/' . base64_encode($blog->id) ?>"><?= $blog->$product_name ?></a>
                        </h4>
                        <p><?= word_limiter($blog->$product_description, 30, '...') ?> </p>
                        <a href="<?= base_url() . 'one_blog/' . base64_encode($blog->id) ?>"
                           class="bl-continue"><?= translate_web('Read_more') ?> <i
                                    class="fas fa-arrow-right"></i></a>
                    </div>

                </div>
            </div>
            <?php }
            } ?>


        </div>
    </div>
</section>
<!-- =================================== Blog  End ====================================== -->
