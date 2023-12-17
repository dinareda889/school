<style>    .form-group .help-block.form-error {        display: block !important;        position: unset !important;    }</style><section class="content">    <div class="container-fluid">        <!-- SELECT2 EXAMPLE -->        <div class="card card-primary card-outline">            <div class="card-header">                <h3 class="card-title"><?=translate('Update_the_working_group')?> </h3>                <div class="card-tools">                    <div class="float-left">                        <a href="<?= site_url('Team') ?>" class="btn btn-warning btn-flat">                            <i class="fa fa-undo"></i>                            <?=translate('Back')?></a>                    </div>                </div>            </div>            <!-- /.card-header -->            <div class="card-body">                <?php echo form_open_multipart('Team/edit_team/' . $team->id,array("id"=>'form_div')); ?>                <input type="hidden" name="id" value="<?= $team->id ?>"/>                <div class="row">                    <div class="col arabic">                        <div class="form-group">                            <label>  <?=translate('The_Name_in_Arabic')?></label>                            <div class="input-group">                                <div class="input-group-prepend">                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>                                </div>                                <input type="text" class="form-control" name="name" id="name"  value="<?=$team->name?>"  />                            </div>                        </div>                        <?php if (form_error('name')) {                            echo "<span style='color:red'>" . form_error('name') . "</span>";                        } ?>                    </div>                    <div class="col english">                        <div class="form-group">                            <label> <?=translate('The_Name_in_English')?></label>                            <div class="input-group">                                <div class="input-group-prepend">                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>                                </div>                                <input type="text" class="form-control" name="name_en" id="name_en"  value="<?=$team->name_en?>"  />                            </div>                        </div>                        <?php if (form_error('name_en')) {                            echo "<span style='color:red'>" . form_error('name_en') . "</span>";                        } ?>                    </div>                    <div class="col russian">                        <div class="form-group">                            <label> <?=translate('The_Name_in_Russian')?></label>                            <div class="input-group">                                <div class="input-group-prepend">                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>                                </div>                                <input type="text" class="form-control" name="name_ru" id="name_ru"  value="<?=$team->name_ru?>"  />                            </div>                        </div>                        <?php if (form_error('name_ru')) {                            echo "<span style='color:red'>" . form_error('name_ru') . "</span>";                        } ?>                    </div>                </div>                <div class="row">                    <div class="col arabic">                        <div class="form-group">                            <label><?=translate('Job_title_in_Arabic')?></label>                            <div class="input-group">                                <div class="input-group-prepend">                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>                                </div>                                <input type="text" class="form-control" name="job_title" id="job_title"  value="<?=$team->job_title?>"  />                            </div>                        </div>                        <?php if (form_error('job_title')) {                            echo "<span style='color:red'>" . form_error('job_title') . "</span>";                        } ?>                    </div>                    <div class="col english">                        <div class="form-group">                            <label><?=translate('Job_title_in_English')?></label>                            <div class="input-group">                                <div class="input-group-prepend">                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>                                </div>                                <input type="text" class="form-control" name="job_title_en" id="job_title_en"  value="<?=$team->job_title_en?>"  />                            </div>                        </div>                        <?php if (form_error('job_title_en')) {                            echo "<span style='color:red'>" . form_error('job_title_en') . "</span>";                        } ?>                    </div>                    <div class="col russian">                        <div class="form-group">                            <label><?=translate('Job_title_in_Russian')?></label>                            <div class="input-group">                                <div class="input-group-prepend">                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>                                </div>                                <input type="text" class="form-control" name="job_title_ru" id="job_title_ru"  value="<?=$team->job_title_ru?>"  />                            </div>                        </div>                        <?php if (form_error('job_title_ru')) {                            echo "<span style='color:red'>" . form_error('job_title_ru') . "</span>";                        } ?>                    </div>                </div>                <div class="row">                    <div class="col-md-6">                        <div class="form-group">                            <label>  <?=translate('Profile_image')?> </label>                            <?php if(!empty($team->image)){ ?>                                <a data-toggle="modal" data-target="#myModal-mainImage" style="color: #007bff;">                                    <i class="fa fa-eye" title=" <?=translate('view')?>"></i><?=translate('view')?> </a>                                <!-- modal view -->                                <div class="modal fade" id="myModal-mainImage" tabindex="-1"                                     role="dialog" aria-labelledby="myModalLabel">                                    <div class="modal-dialog modal-lg" role="document">                                        <div class="modal-content">                                            <div class="modal-header">                                                <button type="button" class="close" data-dismiss="modal"                                                        aria-label="Close"><span                                                        aria-hidden="true">&times;</span>                                                </button>                                                <h4 class="modal-title" id="myModalLabel"><?=translate('The_image')?></h4>                                            </div>                                            <div class="modal-body">                                                <img src="<?php if (!empty($team->image) && (file_exists('uploads/team/' . $team->image))) {                                                    echo base_url() . 'uploads/team/' .$team->image;                                                } else {                                                    echo base_url() . 'uploads/defult_image.jpg';                                                } ?>"                                                     class="" style="width: -webkit-fill-available;" alt="">                                            </div>                                            <div class="modal-footer">                                                <button type="button" class="btn btn-default"                                                        data-dismiss="modal">                                                    <?=translate('Close')?>                                                </button>                                            </div>                                        </div>                                    </div>                                </div>                                <!-- modal view -->                            <?php } ?>                            <div class="input-group">                                <div class="input-group-prepend">                                    <span class="input-group-text"><i class="fa fa-image"></i></span>                                </div>                                <input type="file" class="form-control" name="image" id="image"  accept="image/*"  />                            </div>                        </div>                        <?php if (form_error('image')) {                            echo "<span style='color:red'>" . form_error('image') . "</span>";                        } ?>                    </div>              </div>                <div class="form-group">                    <button type="submit" class="btn btn-labeled btn-success "   name="add"                            value="add"><i class="fa fa-paper-plane"></i><?=translate('Save')?>                    </button>                </div>                <?php echo form_close(); ?>                <!-- /.row -->            </div>            <!-- /.card-body -->        </div>        <!-- /.card -->    </div></section>