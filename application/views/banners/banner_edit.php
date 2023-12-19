<style>    .form-group .help-block.form-error {        display: block !important;        position: unset !important;    }     .showimgg {    color: #007bff!important;    position: absolute;    left: -22%;    bottom: 22px;    z-index: 1;}</style><section class="content">    <div class="container-fluid">        <!-- SELECT2 EXAMPLE -->        <div class="card card-primary card-outline">            <div class="card-header">                <h3 class="card-title"><?=translate('update_new_banner')?></h3>                <div class="card-tools">                    <div class="float-left">                        <a href="<?= site_url('Banners') ?>" class="btn btn-warning btn-flat">                            <i class="fa fa-undo"></i>                            <?=translate('Back')?></a>                    </div>                </div>            </div>            <!-- /.card-header -->            <div class="card-body">                <?php echo form_open_multipart('Banners/edit_banners/' . $banners->banner_id,array("id"=>'form_div')); ?>                <input type="hidden" name="banner_id" value="<?= $banners->banner_id ?>"/>                <div class="row">                    <div class="col-md-4">                        <div class="form-group">                            <label>  <?=translate('the_image')?> </label>                            <?php if(!empty($banners->image)){ ?>                                <a data-toggle="modal" data-target="#myModal-mainImage" class="" style="color: #007bff;">                                    <i class="fas fa-eye" title=" <?=translate('View')?>"></i> <?=translate('View')?> </a>                                <!-- modal view -->                                <div class="modal fade" id="myModal-mainImage" tabindex="-1"                                     role="dialog" aria-labelledby="myModalLabel">                                    <div class="modal-dialog modal-lg" role="document">                                        <div class="modal-content">                                            <div class="modal-header">                                                <h4 class="modal-title" id="myModalLabel"><?=translate('the_image')?></h4>                                                <button type="button" class="close" data-dismiss="modal"                                                        aria-label="Close"><span                                                        aria-hidden="true">&times;</span>                                                </button>                                            </div>                                            <div class="modal-body">                                                <img src="<?php if (!empty($banners->image) && (file_exists('uploads/banners/' . $banners->image))) {                                                    echo base_url() . 'uploads/banners/' .$banners->image;                                                } else {                                                    echo base_url() . 'uploads/defult_image.jpg';                                                } ?>"                                                     class=""  alt="">                                            </div>                                            <div class="modal-footer">                                                <button type="button" class="btn btn-default"                                                        data-dismiss="modal">                                                    <?=translate('close')?>                                                </button>                                            </div>                                        </div>                                    </div>                                </div>                                <!-- modal view -->                            <?php } ?>                            <div class="input-group">                                <div class="input-group-prepend">                                    <span class="input-group-text"><i class="fa fa-image"></i></span>                                </div>                                <input type="file" class="form-control" name="image" id="image"  accept="image/*"  />                            </div>                        </div>                    </div>                </div>                <div class="row">                    <div class="col-md-12">                        <div class="form-group">                            <label>  <?=translate('Details_in_arabic')?></label>                            <div class="">                                <textarea name="description" class="form-control textarea"  id="description">                                    <?=$banners->description?></textarea>                            </div>                        </div>                        <?php if (form_error('description')) {                            echo "<span style='color:red'>" . form_error('description') . "</span>";                        } ?>                    </div>                </div>                <div class="row">                    <div class="col-md-12">                        <div class="form-group">                            <label><?=translate('Details_in_english')?></label>                            <div class="">                                <textarea name="description_en" class="form-control textarea"  id="description">                                    <?=$banners->description_en?></textarea>                            </div>                        </div>                        <?php if (form_error('description_en')) {                            echo "<span style='color:red'>" . form_error('description_en') . "</span>";                        } ?>                    </div>                </div>                <div class="form-group">                    <button type="submit" class="btn btn-labeled btn-success "   name="add"                            value="add"><i class="fa fa-paper-plane"></i><?=translate('Save')?>                    </button>                </div>                <?php echo form_close(); ?>                <!-- /.row -->            </div>            <!-- /.card-body -->        </div>        <!-- /.card -->    </div></section>