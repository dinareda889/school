<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="ipt-title"><?=translate_web('Contact_us')?></h2>
                <span class="ipn-subtitle"><?=translate_web('Please_contact_us_any_time')?></span>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->
<!-- ============================ Contact info Start ================================== -->
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="contact-box box-wrap">
                    <div class="address-icon box-icon">
                        <img src="<?= base_url() . 'assets_web/img' ?>/icon/address.png" alt="Icon Image">
                    </div>
                    <h3 class="section-title"><?=translate_web('Email_Address')?></h3>
                    <p><?=$this->company_data->email?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="contact-box box-wrap">
                    <div class="address-icon box-icon">
                        <img src="<?= base_url() . 'assets_web/img' ?>/icon/phone.png" alt="Icon Image">
                    </div>
                    <h3 class="section-title"><?=translate_web('Phone_Number')?></h3>
                    <p style="direction: ltr;unicode-bidi: bidi-override;"><?=$this->company_data->telepon_code?> <br> <?=$this->company_data->hp_code?> </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="contact-box box-wrap">
                    <div class="address-icon box-icon">
                        <img src="<?= base_url() . 'assets_web/img' ?>/icon/map.png" alt="Icon Image">
                    </div>
                    <h3 class="section-title"><?=translate_web('Office_Address')?></h3>
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
                    <p><?=$this->company_data->$address?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Contact info End ================================== -->
<!-- CONTACT MESSAGE AREA START -->
<div class="contact-form">
    <!-- GOOGLE MAP AREA START -->
    <div class="google-map mb-120">
        <?=$this->company_data->google_map?>
<!--        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.346596831687!2d55.15251838499256!3d25.090126183946193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b5a8a455a81%3A0x5539088067fb331d!2sMarina%20Arcade%20Tower!5e0!3m2!1sar!2seg!4v1689198020691!5m2!1sar!2seg" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
-->

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form-box" >
                    <h4 class="title-2"><?=translate_web('Get_A_Quote')?></h4>
                    <?php echo form_open('contact_us', array('id' => "contact-form")); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-item">
                                    <input type="text" class="form-control" name="name" placeholder="<?=translate_web('Your_name')?>" value="<?= set_value('name', '') ?>">
                                    <?php if (form_error('name')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('name') . "</span>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item">
                                    <input type="email" class="form-control" name="email" placeholder="<?=translate_web('Your_email')?>" value="<?= set_value('email', '') ?>">
                                    <?php if (form_error('email')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('email') . "</span>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item">
                                    <input type="number"  class="form-control" name="phone" placeholder="<?=translate_web('Your_phone')?>" value="<?= set_value('phone', '') ?>">
                                    <?php if (form_error('phone')) {
                                        echo "<span style='color:red;text-align: right;'>" . form_error('phone') . "</span>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item ">
                                    <textarea name="message" class="form-control" placeholder="<?=translate_web('Your_Message')?>">
                                        <?= set_value('message', '') ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item">
                                    <button type="submit" name="add" value="add" class="btn send-button btn-theme-light rounded"><?=translate_web('Send_Message')?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
