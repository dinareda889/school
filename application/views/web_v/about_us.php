
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title"><?=translate_web('About_Us')?></h2>
                <span class="ipn-subtitle"><?=translate_web('Who_we_are_&_our_mission')?></span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Our Story Start ================================== -->
<section class="about-page">

    <div class="container">
        <!-- row Start -->
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-20">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color"><?=translate_web('About_Us')?></h6>
                        <h1 class="section-title"><?=translate_web('Welcome_To_Madain_Setting_The_Benchmark_For_Tomorrows_Living')?></h1>
                        <p><?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                                echo $about_us[0]->about_us_en;
                            }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                                echo $about_us[0]->about_us_ru;
                            }else{
                                echo $about_us[0]->about_us;
                            }
                            ?> </p>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="box-wrap explore-content">
                            <div class="box-card">
                                <div class="box-icon">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <div class="box-detail">
                                    <h5><?=translate_web('Leadership_Team')?></h5>
                                    <p><?=translate_web('Meet_our_flagbearers_who_guide_the_vision_of_MADA_IN_Properties')?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="box-wrap explore-content">
                            <div class="box-card">
                                <div class="box-icon">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <div class="box-detail">
                                    <h5><?=translate_web('Support_Alltime')?></h5>
                                    <p>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="box-wrap last explore-content">
                            <div class="box-card">
                                <div class="box-icon">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <div class="box-detail">
                                    <h5><?=translate_web('Philanthrophy')?></h5>
                                    <p><?=translate_web('Gain_an_insight_into_the_noble_initiatives_that_are_close_to_our_hearts')?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Our Story End ================================== -->

<!-- ================= Our Team================= -->
<section class="gray-bg" id="team">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h2><?=translate_web('Meet_Our_Team')?></h2>
                    <p><?=translate_web('Professional_&_Dedicated_Team')?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="team-slide item-slide">

                    <!-- Single Teamm -->
                    <?php if(isset($team) && !empty($team)){
                        foreach ($team as $row){
                            if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                                switch ($_SESSION['site_lang']) {
                                    case 'arabic':
                                        $name = 'name';
                                        $job_title = 'job_title';
                                        break;
                                    case 'english':
                                        $name = 'name_en';
                                        $job_title = 'job_title_en';
                                        break;
                                    case 'russian':
                                        $name = 'name_ru';
                                        $job_title = 'job_title_ru';
                                        break;
                                    default:
                                        $name = 'name_en';
                                        $job_title = 'job_title_en';
                                        break;
                                }
                            }


                            ?>
                            <div class="single-team">
                                <div class="team-grid">

                                    <div class="teamgrid-user">
                                        <img src="<?php if (!empty($row->image) && (file_exists('uploads/team/'.$row->image))) {
                                            echo base_url() . "uploads/team/" .$row->image;
                                        } else {
                                            echo base_url() . 'uploads/defult_image.jpg';
                                        } ?>" alt="images" class="img-fluid" />
                                    </div>

                                    <div class="teamgrid-content">
                                        <h4><?=$row->$name?></h4>
                                        <span><?=$row->$job_title?></span>
                                    </div>

                                </div>
                            </div>
                        <?php }
                    }?>

                    <!-- Single Teamm -->

                </div>

            </div>
        </div>

    </div>
</section>
<!-- =============================== Our Team ================================== -->

<!-- ================= Our Mission ================= -->
<section id="about-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h2><?=translate_web('Our_Mission_&_Beliefs')?></h2>
                    <p><?=translate_web('Professional_&_Dedicated_Team')?></p>
                </div>
            </div>
        </div>

        <div class="row align-items-center">

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

            <div class="col-lg-6 col-md-12">

                <div class="icon-mi-left">
                    <div class="icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
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


                    <div class="icon-mi-left-content">
                        <h4><?=translate_web('Madain_Properties_Mission')?></h4>
                        <p><?=$about_us[0]->$mission?>
                        </p>
                    </div>
                </div>

                <div class="icon-mi-left">
                    <div class="icon">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                    <div class="icon-mi-left-content">
                        <h4><?=translate_web('Madain_Properties_Vision')?></h4>
                        <p><?=$about_us[0]->$vision?></p>
                    </div>
                </div>

                <div class="icon-mi-left">
                    <div class="icon">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                    </div>
                    <div class="icon-mi-left-content">
                        <h4><?=translate_web('Madain_Properties_Goals')?></h4>
                        <p><?=$about_us[0]->$our_goals?></p>
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>
<!-- ================= Our Mission ================= -->
		