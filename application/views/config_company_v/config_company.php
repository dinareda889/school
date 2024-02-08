
<div class="card card-outline card-info">
    <div class="card-header">
        <?php
        // Session
        if($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        // Error
        echo validation_errors('<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><div class="alert alert-success">','</div></div>');
        ?>

        <?php echo form_open_multipart(base_url('Config_company')) ?>
        <div class="row">
            <input type="hidden" name="id_config"  value="<?php echo $site->id_config ?>">


<!--                <div class="form-group">
                    <label>عن التطبيق بالعربي</label>
                    <textarea name="summary_company" class="form-control textarea" placeholder="عن التطبيق بالعربي" id="isi"><?php /*echo $site->summary_company */?></textarea>
                </div>
                <div class="form-group">
                    <label>عن التطبيق بالانجليزي</label>
                    <textarea name="summary_company_en" class="form-control textarea" placeholder="عن التطبيق بالانجليزي" id="isi"><?php /*echo $site->summary_company_en */?></textarea>
                </div>
                <div class="form-group">
                    <label>عن التطبيق بالعربي (نبذة)</label>
                    <textarea name="summary_company_short" class="form-control textarea" placeholder="عن التطبيق بالعربي" id="isi"><?php /*echo $site->summary_company_short */?></textarea>
                </div>
                <div class="form-group">
                    <label>عن التطبيق بالانجليزي (نبذة)</label>
                    <textarea name="summary_company_short_en" class="form-control textarea" placeholder="عن التطبيق بالانجليزي " id="isi"><?php /*echo $site->summary_company_short_en */?></textarea>
                </div>-->
                <div class="col-md-6">
                <div class="form-group">
                    <label><!--العنوان بالعربي--><?=translate('Address_in_Arabic')?></label>
                     <input type="text" name="address" placeholder="<?=translate('Address_in_Arabic')?>" value="<?php echo $site->address ?>"  class="form-control">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label><!--العنوان بالانجليزي--><?=translate('Address_in_English')?></label>
                     <input type="text" name="address_en" placeholder="<?=translate('Address_in_English')?>" value="<?php echo $site->address_en ?>"  class="form-control">
                </div>
                </div>
                <div class="col-md-6">
                    <!-- <div class="form-group">
                    <label><?/*=translate('Address_in_Russian')*/?></label>
                     <input type="text" name="address_ru" placeholder="<?/*=translate('Address_in_Russian')*/?>" value="<?php /*echo $site->address_ru */?>"  class="form-control">
                </div>-->
                </div>
            <div class="col-md-6">

            </div>


            <div class="col-md-6">
                <h3><?=translate('The_Main_Data')?>:</h3><hr>
                <div class="form-group">
                    <label><?=translate('Company_name_in_Arabic')?><!--  إسم الشركة بالعربي--></label>
                    <input type="text" name="nameweb" placeholder="<?=translate('Company_name_in_Arabic')?>" value="<?php echo $site->nameweb ?>" required class="form-control">
                </div>
                <div class="form-group">
                    <label><?=translate('Company_name_in_English')?>  <!--إسم الشركة بالانجليزي--></label>
                    <input type="text" name="nameweb_en" placeholder="<?=translate('Company_name_in_English')?>" value="<?php echo $site->nameweb_en ?>" required class="form-control">
                </div>
                <!--<div class="form-group">
                    <label><?/*=translate('Company_name_in_Russian')*/?> </label>
                    <input type="text" name="nameweb_ru" placeholder="<?/*=translate('Company_name_in_Russian')*/?>" value="<?php /*echo $site->nameweb_ru */?>" required class="form-control">
                </div>-->
                <!--<div class="form-group">
                    <label>  كلمة مختصره بالعربي</label>
                    <input type="text" name="short_text" placeholder="كلمة مختصره بالعربي" value="<?php /*echo $site->short_text */?>" required class="form-control">
                </div>
                <div class="form-group">
                    <label>  كلمة مختصره بالانجليزي</label>
                    <input type="text" name="short_text_en" placeholder="كلمة مختصره بالانجليزي" value="<?php /*echo $site->short_text_en */?>" required class="form-control">
                </div>-->

                <div class="form-group">
                    <label><?=translate('Application_name')?> - <?=translate('abbreviation_name')?></label>
                    <input type="text" name="abbreviation_name" placeholder="<?=translate('Application_name')?> - <?=translate('abbreviation_name')?>" value="<?php echo $site->abbreviation_name ?>" required class="form-control">
                </div>

                <div class="form-group">
                    <label><?=translate('slogan')?> </label>
                    <input type="text" name="slogan" placeholder="Slogan" value="<?php echo $site->slogan ?>" class="form-control">
                </div>




                <div class="form-group">
                    <label><?=translate('Website_Link')?><!--لينك الموقع الإلكتروني--></label>
                    <input type="url" name="website" placeholder="<?=translate('Website_Link')?>" value="<?php echo $site->website ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label><?=translate('The_official_email')?><!--الإيميل الرسمي--> </label>
                    <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $site->email ?>" class="form-control" required>
                </div>

<style>

.nopos {
    position: absolute;
    left: 16px;
    background: #007bff;
    color: #fff;
    padding: 9px;
    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
    margin-top: -39px;
}

</style>

                <div class="form-group">
                    <label><?=translate('Mobile_number')?><!--رقم الجوال--></label>
                    <input type="text" name="telepon" placeholder="971-000000" value="<?php echo $site->telepon ?>" class="form-control">
                <label class="nopos">971+</label>
                </div>

               <div class="form-group">
                    <label><?=translate('fax')?></label>
                    <input type="text" name="fax" placeholder="971-000000" value="<?php echo $site->fax ?>" class="form-control">
                   <label class="nopos">971+</label>
                </div>

                <div class="form-group">
                    <label><?=translate('Another_mobile_number')?><!--رقم جوال أخر--></label>
                    <input type="text" name="hp" placeholder="971-000000" value="<?php echo $site->hp ?>" class="form-control">
               <label class="nopos">971+</label>
                </div>

                <h3><?=translate('Social_media_data')?><!--بيانات السوشيال ميديا--></h3><hr>

                <div class="form-group">
                    <label><?=translate('facebook')?> <i class="fa fa-facebook"></i></label>
                    <input type="url" name="facebook" placeholder="http://facebook.com/facebook" value="<?php echo $site->facebook ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label><?=translate('Twitter')?> <i class="fa fa-twitter"></i></label>
                    <input type="url" name="twitter" placeholder="http://twitter.com/twitter" value="<?php echo $site->twitter ?>" class="form-control">
                </div>

                <!--<div class="form-group">
                    <label>Instagram <i class="fa fa-instagram"></i></label>
                    <input type="url" name="instagram" placeholder="http://instagram.com/instagram" value="<?php echo $site->instagram ?>" class="form-control">
                </div>-->
                <div class="form-group">
                    <label><?=translate('Youtube')?> <i class="fa fa-youtube"></i></label>
                    <input type="url" name="youtube" placeholder="https://www.youtube.com" value="<?php echo $site->youtube ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label><?=translate('Snapchat')?> <i class="fa fa-snapchat"></i></label>
                    <input type="url" name="snapchat" placeholder="https://www.snapchat.com" value="<?php echo $site->snapchat ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label><?=translate('Tiktok')?> <i class="fa fa-tiktok"></i></label>
                    <input type="url" name="tiktok" placeholder="https://www.tiktok.com" value="<?php echo $site->tiktok ?>" class="form-control">
                </div>

            </div>

            <div class="col-md-6">
                <h3>Modul SEO (Search Engine Optimization)</h3><hr>
                <div class="form-group">
                    <label>Keywords (Keyword search for Google, Bing, etc)</label>
                    <textarea name="keywords" rows="3" class="form-control" placeholder="keywords"><?php echo $site->keywords ?></textarea>
                </div>

                <div class="form-group">
                    <label>Metatext</label>
                    <textarea name="metatext" rows="5" class="form-control" placeholder="Code metatext"><?php echo $site->metatext ?></textarea>
                </div>

                <h3><?=translate('Google_Map')?><!--Google Map--></h3><hr>
                <div class="form-group">
                    <label>Google Map</label>
                    <textarea name="google_map" rows="5" class="form-control" placeholder="Google Map"><?php echo $site->google_map ?></textarea>
                </div>

                <div class="form-group">
                    <label><?=translate('application_image') ?> - <?=translate('Logo')?><!--صورة التطبيق--> </label>
                    <div class="input-group"> <div class="custom-file">
                            <input type="file" name="image" accept="image/*" class="form-control " /></div></div>
                </div>
                <?php if($site->image != null) {?>
                    <div class="form-group">
                        <label>image</label>
                        <div class="input-group"> <div class="custom-file">


                                <div style="margin-bottom:20px">
                                    <img src="<?=base_url('uploads/main/'.$site->image)?>"
                                         style="width:100px">

                                </div>



                            </div></div>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label><?=translate('The_main_Video_Link')?></label>
                    <a href="#modal_details" data-toggle="modal" title="<?=translate('The_Video_Link')?>">
                        <i class="fa fa-eye"></i><?=translate('View_The_Link')?></a>
                    <input type="text" name="video" value="https://www.youtube.com/watch?v=<?= $site->video ?>"  class="form-control"/>

                </div>
                <!--<div class="form-group">
                    <label><?/*=translate('About_Company_image')*/?> </label>
                    <?php /*if(!empty($site->about_image)){ */?>
                        <a data-toggle="modal" data-target="#myModal-view" style="color: #007bff;">
                            <i class="fa fa-eye" title=" <?/*=translate('view')*/?>"></i><?/*=translate('view')*/?></a>
                        <div class="modal fade" id="myModal-view" tabindex="-1"
                             role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="modal-title" id="myModalLabel"><?/*=translate('the_image')*/?></h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img  src="<?php /*if (!empty($site->about_image) && (file_exists('uploads/main/' . $site->about_image))) {

                                            echo base_url() . 'uploads/main/' .$site->about_image;

                                        } else {

                                            echo base_url() . 'uploads/defult_image.jpg';

                                        } */?>" title="" height="100%" width="100%"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">
                                            <?/*=translate('close')*/?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php /*} */?>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="about_image" accept="image/*"  class="form-control " />
                        </div>
                    </div>
                </div>-->
                <div class="form-group">
                    <label><?=translate('Study_Fees')?></label>
                    <?php if(!empty($site->company_pdf)){ ?>
                        <a data-toggle="modal" data-target="#myModal-file" style="color: #007bff;">
                            <i class="fa fa-eye" title=" <?=translate('view')?>"></i><?=translate('view')?> </a>
                        <div class="modal fade" id="myModal-file" tabindex="-1"
                             role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="modal-title" id="myModalLabel"><?=translate('The File')?></h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe  src="<?php if (!empty($site->company_pdf) && (file_exists('uploads/main/files/' . $site->company_pdf))) {

                                            echo base_url() . 'uploads/main/files/' .$site->company_pdf;

                                        } else {

                                            echo base_url() . 'uploads/defult_image.jpg';

                                        } ?>" title="" height="500px" width="100%"></iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">
                                            <?=translate('close')?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    <div class="input-group"> <div class="custom-file">
                            <input type="file" name="company_pdf" accept="application/pdf" class="form-control " /></div>
                    </div>
                </div>
                <div class="form-group">
                    <label><?=translate('Registration_link')?></label>
                    <?php if(isset($site->registration_link) && !empty($site->registration_link) ){ ?>
                    <a target="_blank" title="<?=translate('Registration_link')?>" href="<?=$site->registration_link?>" >
                        <i class="fa fa-eye"></i><?=translate('view')?></a>
                    <?php } ?>
                    <input type="text" name="registration_link" value="<?= $site->registration_link ?>"  class="form-control"/>

                </div>
                <div class="form-group map">
                    <style type="text/css" media="screen">
                        iframe {
                            width: 100%;
                            max-height: 200px;
                        }
                    </style>
                    <?php echo $site->google_map ?>

                    <hr>






                    <div class="form-group btn-group">
                        <input type="submit" name="submit" value="<?=translate('Save_Data')?>" class="btn btn-success btn-sm">

                    </div>
                </div>
            </div>


        </div>
        </form>

    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog modal_details modal-lg" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header" style="direction: rtl!important;">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><?=translate('The_Video_Link')?></h4>

            </div>

            <div class="modal-body">
                <div id="details">
                    <div class="row">
                        <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/<?=$site->video?>">
                        </iframe>
                    </div>

                </div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal"><?=translate('Close')?>
                </button>
            </div>
        </div>
    </div>
</div>
