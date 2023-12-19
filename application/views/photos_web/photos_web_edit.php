<style>
    .form-group .help-block.form-error {
        display: block !important;
        position: unset !important;
    }
    .maindiv {
        padding: 10px 10px;background: #eee;border-radius: 5px;
    }

    .imgview {
        width: 260px;
        height: 250px;
        border-radius: 5px;
    }
    .mar_leftt {
        margin-left: 20%;
    }
    .eye_view {
        padding: 2px 7px;
        font-size: 12px;
        line-height: 1.5;
        background-color: #009688;
        color: #fff;
        /* border-radius: 2px; */
        border-radius: 11px;
    }
    .trash_delet {
        padding: 2px 7px;
        font-size: 12px;
        line-height: 1.5;
        background-color: #ff0000;
        color: #fff;
        border-radius: 2px;
        border-radius: 11px;
    }

    .imgpopup {
        margin: 0 auto;
        display: block;
        width: auto;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><?=$title?> </h3>
                <div class="card-tools">
                    <div class="float-left">
                        <a href="<?= site_url('Photos_web_c') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-undo"></i>
                            <?=translate('Back')?></a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php echo form_open_multipart('Photos_web_c/edit_photos/' . $all_photos->id,array("id"=>'form_div')); ?>
                <input type="hidden" name="id" value="<?= $all_photos->id ?>"/>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">  <?=translate('The_date')?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                    </div>
                                    <input type="date" name="date" id="date" class="form-control " value="<?= $all_photos->date_ar ?>"  >
                                </div>
                            </div>
                            <?php  if(form_error('date')){ 	echo "<span style='color:red'>".form_error('date')."</span>"; } ?>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">  <?=translate('main_image')?></label>
                                <?php if(!empty($all_photos->main_image)){ ?>
                                    <a data-toggle="modal" data-target="#myModal-mainImage" style="color: #007bff;">

                                        <i class="fa fa-eye" title=" <?=translate('view')?>"></i><?=translate('view')?> </a>

                                    <!-- modal view -->

                                    <div class="modal fade" id="myModal-mainImage" tabindex="-1"

                                         role="dialog" aria-labelledby="myModalLabel">

                                        <div class="modal-dialog modal-lg" role="document">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal"

                                                            aria-label="Close"><span

                                                                aria-hidden="true">&times;</span>

                                                    </button>

                                                    <h4 class="modal-title" id="myModalLabel"><?=translate('the_image')?></h4>

                                                </div>

                                                <div class="modal-body">

                                                    <img src="<?php if (!empty($all_photos->main_image) && (file_exists('uploads/web/photos/' . $all_photos->main_image))) {

                                                        echo base_url() . 'uploads/web/photos/' .$all_photos->main_image;

                                                    } else {

                                                        echo base_url() . 'asisst/admin_asset/img/No-image-available.png';

                                                    } ?>"

                                                         class="" style="width: -webkit-fill-available;" alt="">

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-default"

                                                            data-dismiss="modal">

                                                        <?=translate('close')?>

                                                    </button>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                <?php } ?>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                    </div>
                                    <input type="file" class="form-control" name="main_image" id="main_image"  accept="image/*"  />
                                </div>
                            </div>
                            <?php  if(form_error('main_image')){ 	echo "<span style='color:red'>".form_error('main_image')."</span>"; } ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=""> <?=translate('Album_title_in_arabic')?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                    </div>
                                    <input type="text" name="title" id="title" class="form-control " value="<?=$all_photos->title?>" >
                                </div>
                            </div>
                            <?php  if(form_error('title')){ 	echo "<span style='color:red'>".form_error('title')."</span>"; } ?>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">  <?=translate('Album_title_in_english')?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                    </div>
                                    <input type="text" name="title_en" id="title_en" class="form-control " value="<?=$all_photos->title_en?>" >
                                </div>
                            </div>
                            <?php  if(form_error('title_en')){ 	echo "<span style='color:red'>".form_error('title_en')."</span>"; } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">  <?=translate('Album_details_in_arabic')?></label>
                                <textarea  name="details"  class="form-control textarea"  id="details" >
                                  <?=$all_photos->details?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">  <?=translate('Album_details_in_english')?></label>
                                <textarea  name="details_en"  class="form-control textarea"  id="details_en" >
                                  <?=$all_photos->details_en?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class=""><?=translate('Album_pictures')?>  </label>
                                <small class="" style="color: red;bottom:-13px;"  >(<?=translate('You_can_upload_more_than_one_image')?>)</small>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                    </div>
                                    <input type="file" class="form-control"  name="img_album[]" id="img_album[]" multiple accept=".jpeg,.jpg,.png,.gif"
                                           onchange='ValidateUpload(this);RevieImage(this);'/>
                                </div>
                            </div>

                        </div>
                    </div>
                <div class="form-group col-md-12  col-sm-12">
                    <div class="row">

                            <?php

                            if (!empty($images)) {


                                for ($i = 0; $i < count($images); $i++) {
                                    ?>

                                    <div id="img_<?=$images[$i]->images_id?>" class="card col-md-3 col-lg-3">
                                        <img id="image_view_<?=$images[$i]->images_id?>"

                                             src="<?php if (!empty($images[$i]->images_name) && (file_exists('uploads/web/photos/' . $images[$i]->images_name))) {

                                                 echo base_url() . 'uploads/web/photos/' . $images[$i]->images_name;

                                             } else {

                                                 echo base_url() . 'asisst/admin_asset/img/No-image-available.png';

                                             } ?>"

                                             class="imgview" alt=""/>
                                        <div class="maindiv">
                                            <a href="#" class="btn btn-warning btn-sm mar_leftt"  data-toggle="modal" data-target="#myModal-view-<?= $images[$i]->images_id ?>">
                                                <i class="fa fa-eye" title="<?=translate('view')?>"></i> <?=translate('view')?></a>

                                            <!-- modal view -->
                                            <a href="#" class="btn btn-danger btn-sm" onclick=" delete_image(<?= $images[$i]->images_id ?>);" >
                                                <i class="fa fa-trash " title="<?=translate('delete')?>"></i> <?=translate('delete')?> </a>

                                        </div>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view-<?= $images[$i]->images_id  ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel"><?=translate('the_image')?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?php if (!empty($images[$i]->images_name) && (file_exists('uploads/web/photos/' . $images[$i]->images_name))) {
                                                            echo base_url() . 'uploads/web/photos/' . $images[$i]->images_name;
                                                        } else {
                                                            echo base_url() . 'asisst/admin_asset/img/No-image-available.png';
                                                        } ?>" class="" style="width: -webkit-fill-available;" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                            <?=translate('close')?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                    </div>
                </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-labeled btn-success " id="btn-save"  name="<?=$page?>"
                                value="add"><i class="fa fa-paper-plane"></i><?=translate('Save')?>
                        </button>
                    </div>
                    <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<script>

    function ValidateUpload(th) {



        var myfile = (th).value;



        var extension = myfile.split('.').pop().toUpperCase();

        if (extension != "PNG" && extension != "JPG" && extension != "GIF" && extension != "JPEG") {

            (th).value = '';
            Swal.fire("<?=translate('It_must_be_an_image')?>", "", "error");

        }

    }

</script>
<script>

    function RevieImage(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();



            reader.onload = function (e) {

                $('#' + $(input).attr("data-view")).attr('src', e.target.result);

            }



            reader.readAsDataURL(input.files[0]); // convert to base64 string

        }

    }

</script>
<script>
    function delete_image(images_id)
    {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>Photos_web_c/delete_image",
            data: {
                images_id: images_id,
            },
            success: function (d) {
                Swal.fire("<?=translate('Deleted_successfully')?>", "", "success");
                // $('#img_'+images_id).modal('hide');
                document.getElementById('img_'+images_id).style.display = "none";
            }
        });
    }
</script>