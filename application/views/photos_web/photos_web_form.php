
<style>
    .form-group .help-block.form-error {
        display: block !important;
        position: unset !important;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"> <?=translate('Add_a_new_photo_album')?> </h3>
                <div class="card-tools">
                    <div class="float-left">
                        <a href="<?= site_url('Photos_web_c') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-undo"></i>
                            <?=translate('Back')?></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('Photos_web_c/add_photos',array("id"=>'form_div')); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">  <?=translate('The_date')?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                </div>
                                <input type="date" name="date" id="date" class="form-control " value="<?=date('Y-m-d')?>"  >
                            </div>
                        </div>
                        <?php  if(form_error('date')){ 	echo "<span style='color:red'>".form_error('date')."</span>"; } ?>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">   <?=translate('main_image')?></label>
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
                            <label class="">  <?=translate('Album_title_in_arabic')?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                </div>
                                <input type="text" name="title" id="title" class="form-control " value="<?=set_value('title')?>" >
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
                                <input type="text" name="title_en" id="title_en" class="form-control " value="<?=set_value('title_en')?>" >
                            </div>
                        </div>
                        <?php  if(form_error('title_en')){ 	echo "<span style='color:red'>".form_error('title_en')."</span>"; } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class=""> <?=translate('Album_details_in_arabic')?></label>
                                <textarea  name="details"  class="form-control textarea"  id="details" >
                                  <?=set_value('details')?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class=""> <?=translate('Album_details_in_english')?></label>
                                <textarea  name="details_en"  class="form-control textarea"  id="details_en" >
                                  <?=set_value('details_en')?></textarea>
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