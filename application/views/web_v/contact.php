<style>
    iframe {
        width: 100%;
        height: 200px;
    }
</style>
<!-- ============================ Page Title Start================================== -->
<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8"
         style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/contact.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= translate_web('Contact_us') ?></h2>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================ Page Title End ================================== -->
<!-- ============================ Contact info Start ================================== -->
<section id="contact-page" class="pt-60 pb-60 bck">
    <div class="container c-relative">
        <div class="row direction">
            <div class="col-lg-7" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
                <div class="contact-from ">
                    <div class="section-title">
                        <h5><?= translate_web('Contact_us') ?></h5>
                        <h2><?= translate_web('Please_contact_us_any_time') ?></h2>
                    </div>
                    <div class="main-form pt-45">
                        <?php echo form_open('contact_us', array('id' => "contact-form")); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="singel-form form-group">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="<?= translate_web('Your_name') ?>"
                                           value="<?= set_value('name', '') ?>">
                                    <?php if (form_error('name')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('name') . "</span>";
                                    } ?>                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="singel-form form-group">
                                    <input type="email" class="form-control" name="email"
                                           placeholder="<?= translate_web('Your_email') ?>"
                                           value="<?= set_value('email', '') ?>">
                                    <?php if (form_error('email')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('email') . "</span>";
                                    } ?>                                    </div>
                            </div>

                            <div class="col-md-12">
                                <div class="singel-form form-group">
                                    <input type="number" class="form-control" name="phone"
                                           placeholder="<?= translate_web('Your_phone') ?>"
                                           value="<?= set_value('phone', '') ?>">
                                    <?php if (form_error('phone')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('phone') . "</span>";
                                    } ?>                                    </div>
                            </div>

                            <div class="col-md-12">
                                <div class="singel-form form-group">
                                    <textarea name="message" class="form-control" placeholder="<?= translate_web('Your_Message') ?>"><?= set_value('message', '') ?></textarea>
                                    <?php if (form_error('message')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('message') . "</span>";
                                    } ?>
                                </div>
                            </div>
                            <p class="form-message"></p>
                            <div class="col-md-12">
                                <div class="singel-form">
                                    <button type="submit" name="add" value="add" class="main-btn"><?=translate_web('Send_Message')?></button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
                <div class="contact-address ">
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
                    <ul>
                        <li>
                            <div class="singel-address">
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="cont">
                                    <p><?=$this->company_data->$address?> </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="singel-address">
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont">
                                    <p><a href="tel:<?=$this->company_data->telepon_code?>"><?=$this->company_data->telepon_code?></a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="singel-address">
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="cont">
                                    <p><a href="tel:<?=$this->company_data->email?>"><?=$this->company_data->email?></a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="map mt-30" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
                    <div class="mapouter">
                        <?=$this->company_data->google_map?>
                        <!--<iframe width="100%" height="200" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=%D8%A7%D9%84%D8%A7%D9%85%D8%A7%D8%B1%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9%20%D8%A7%D9%84%D9%85%D8%AA%D8%AD%D8%AF%D8%A9%20%D8%A7%D9%84%D8%B4%D8%A7%D8%B1%D9%82%D8%A9&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Contact info End ================================== -->

