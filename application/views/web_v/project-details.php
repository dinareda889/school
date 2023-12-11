<div class=" blog-page" xmlns="http://www.w3.org/1999/html">

    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title"><?= translate_web('Project_details') ?></h2>
                    <span class="ipn-subtitle"><?= translate_web('Our_Latest_Projects') ?></span>


                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
    <?php
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

    ?>
    <!-- ============================ Agency List Start ================================== -->
    <section class="gray-simple project-detail ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="blog-details single-post-item format-standard">
                        <div class="post-details">
                            <div class="featured_slick_gallery gray">
                                <div class="featured_slick_gallery-slide">
                                    <?php if (isset($one_project->imgs) && (!empty($one_project->imgs))) {
                                        foreach ($one_project->imgs as $img) {
                                            if (isset($img->image) && (!empty($img->image))) {
                                                $img_url = base_url() . 'uploads/project/' . $img->image;
                                            } else {
                                                $img_url = base_url() . 'assets_web/img/p-1.jpg';

                                            }

                                            ?>
                                            <div class="featured_slick_padd"><a href="<?= $img_url ?>"
                                                                                class="mfp-gallery">
                                                    <img src="<?= $img_url ?>" class="img-fluid mx-auto"
                                                         alt="images"/>
                                                </a></div>
                                        <?php }
                                    } ?>

                                </div>
                            </div>
                            <h2 class="post-title"><?= $one_project->$name ?></h2>
                            <p><?= $one_project->$description ?> </p>


                            <div class="post-bottom-meta">

                                <div class="post-share">
                                    <h4 class="pbm-title"><?= translate_web('Social_Share') ?></h4>
                                    <div id="share"></div>

                                    <!--<ul class="list">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-snapchat"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($one_project->link) && (!empty($one_project->link))) { ?>
                        <!-- Single Block Wrap -->
                        <div class="property_block_wrap style-2">

                            <div class="property_block_wrap_header">
                                <a data-bs-toggle="collapse" data-parent="#vid" data-bs-target="#clFour"
                                   aria-controls="clFour"
                                   href="javascript:void(0);" aria-expanded="true" class="collapsed">
                                    <h4 class="property_block_title"><?= translate_web('project_link_video') ?></h4></a>
                            </div>

                            <div id="clFour" class="panel-collapse collapse">
                                <div class="block-body">
                                    <div class="property_video">
                                        <div class="thumb">
                                            <div class="">
                                               <!-- <video playsinline="playsinline" autoplay="false" muted="muted"
                                                       loop="loop">
                                                    <source src="<?/*= $one_project->link */?>" type="">
                                                </video>-->

                                                <iframe width="560" height="315"
                                                        src="https://www.youtube.com/embed/<?=$one_project->link_id?>"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen></iframe>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                    <?php if (isset($one_project->location_map) && (!empty($one_project->location_map))) { ?>

                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">

                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#loca" data-bs-target="#clSix"
                               aria-controls="clSix"
                               href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4
                                        class="property_block_title"><?=translate_web('Location')?></h4></a>
                        </div>

                        <div id="clSix" class="panel-collapse collapse">
                            <div class="block-body">
                                <div class="map-container">
                                    <?=$one_project->location_map?>
                               <!--     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.346596831687!2d55.15251838499256!3d25.090126183946193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b5a8a455a81%3A0x5539088067fb331d!2sMarina%20Arcade%20Tower!5e0!3m2!1sar!2seg!4v1689198020691!5m2!1sar!2seg"
                                            width="100%" height="450px" style="border:0;" allowfullscreen=""
                                            loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                                </div>

                            </div>
                        </div>

                    </div>
                    <?php } ?>
<?php if (isset($one_project->imgs) && (!empty($one_project->imgs))) { ?>
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">

                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#clSev" data-bs-target="#clSev"
                               aria-controls="clOne"
                               href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4
                                        class="property_block_title"><?=translate_web('Gallery')?></h4></a>
                        </div>

                        <div id="clSev" class="panel-collapse collapse">
                            <div class="block-body">
                                <ul class="list-gallery-inline">
                                    <?php if (isset($one_project->imgs) && (!empty($one_project->imgs))) {
                                    foreach ($one_project->imgs as $img) {
                                    if (isset($img->image) && (!empty($img->image))) {
                                        $img_url = base_url() . 'uploads/project/' . $img->image;
                                        $img_url_thumbs = base_url() . 'uploads/project/thumbs/' . $img->image;
                                    } else {
                                        $img_url = base_url() . 'assets_web/img/p-1.jpg';
                                        $img_url_thumbs = base_url() . 'assets_web/img/p-1.jpg';
                                    }
                                    ?>
                                    <li>
                                        <a href="<?= $img_url ?>" class="mfp-gallery">
                                            <img src="<?= $img_url_thumbs ?>" class="img-fluid mx-auto"
                                                 alt="images"/></a>
                                    </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="details-sidebar">

                        <!-- Agent Detail -->
                        <div class="sides-widget">
                            <div class="sides-widget-header">
                                <div class="sides-widget-details">
                                    <h4><a href="<?=base_url()?>contact_us"><?=translate_web('Contact_Us')?></a></h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="sides-widget-body simple-form">

                                <?php echo form_open('contact/'.base64_encode($one_project->id), array('id' => "contact-form")); ?>
                                <input type="hidden" name="project_id" value="<?=$one_project->id?>">
                                <div class="form-group">
                                    <label><?=translate_web('Name')?></label>
                                    <input type="text" class="form-control" name="name" placeholder="<?=translate_web('Your_name')?>" value="<?= set_value('name', '') ?>">
                                    <?php if (form_error('name')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('name') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label><?=translate_web('Email')?></label>
                                    <input type="text" class="form-control" name="email" placeholder="<?=translate_web('Your_email')?>" value="<?= set_value('email', '') ?>">
                                    <?php if (form_error('email')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('email') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label><?=translate_web('Phone_No')?></label>
                                    <input type="text" class="form-control" name="phone" placeholder="<?=translate_web('Your_phone')?>" value="<?= set_value('phone', '') ?>">
                                    <?php if (form_error('phone')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('phone') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label><?=translate_web('Message')?></label>
                                    <textarea class="form-control" placeholder="<?=translate_web('Your_Message')?>">
                                        <?= set_value('message', '') ?></textarea>
                                </div>
                                <button class="btn send-button btn-md rounded full-width" name="add" value="add"><?=translate_web('Send_Message')?></button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- Trending Posts -->
                    <div class=" sides-widget">
                        <div class="sides-widget-header">
                            <div class="sides-widget-details">
                                <h4><a href="#"><?=translate_web('Contact_Us')?></a></h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <ul>
                            <li>
                                <div class="project-contact">
                                    <h3><?=translate_web('Address')?></h3>
                                    <h5>
                                        <?php if (isset($this->company_data->address) && (!empty($this->company_data->address))) {
                                            if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                                                switch ($_SESSION['site_lang']) {
                                                    case 'arabic':
                                                        $address = 'address';
                                                        break;
                                                    case 'english':
                                                        $address = 'address_en';
                                                        break;
                                                    case 'russian':
                                                        $address = 'address_ru';
                                                        break;
                                                    default:
                                                        $address = 'address_en';
                                                        break;
                                                }
                                            }
                                        }
                                        ?>
                                        <?=$this->company_data->$address?></h5>
                                </div>
                            </li>
                            <li>
                                <div class="project-contact">
                                    <h3><?=translate_web('Email_Address')?></h3>
                                    <h5><?=$this->company_data->email?> <br>
                                        <?=$this->company_data->fax_code?></h5>
                                </div>
                            </li>
                            <li>
                                <div class="project-contact">
                                    <h3><?=translate_web('Phone_Number')?></h3>
                                    <h5> <?=$this->company_data->telepon_code?><br> <?=$this->company_data->hp_code?></h5>
                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
            <!-- /row -->
        </div>
    </section>
    <!-- ============================ Agency List End ================================== -->
</div>
