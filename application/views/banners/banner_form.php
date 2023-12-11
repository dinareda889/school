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
                <h3 class="card-title"> إضافة بانر </h3>
                <div class="card-tools">
                    <div class="float-left">
                        <a href="<?= site_url('Banners') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-undo"></i>
                            رجوع</a>
                    </div>
                </div>
            </div>

            <?php /*echo validation_errors('<div class="alert alert-danger" role="alert"><ul><li>','</li></ul></div>');*/ ?>
            <!-- /.card-header -->
            <div class="card-body">
                <?php echo form_open_multipart('Banners/add_banners',array("id"=>'form_div')); ?>
                <input type="hidden" name="banner_id" value="<?= $banners->banner_id ?>"/>
                <div class="row">


                    <div class="col-md-4">
                        <div class="form-group">
                            <label>  الصورة </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-image"></i></span>
                                </div>
                                <input type="file" class="form-control" name="image" id="image"  accept="image/*"  />

                            </div>
                        </div>
                        <?php if (form_error('image')) {
                            echo "<span style='color:red'>" . form_error('image') . "</span>";
                        } ?>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>  الوصف بالعربي</label>
                            <div class="">

                                <textarea name="description" class="form-control textarea"  id="description">
                                    </textarea>
                            </div>
                        </div>
                        <?php if (form_error('description')) {
                            echo "<span style='color:red'>" . form_error('description') . "</span>";
                        } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> الوصف بالانجليزي</label>
                            <div class="">

                                <textarea name="description_en" class="form-control textarea"  id="description">
                                    </textarea>
                            </div>
                        </div>
                        <?php if (form_error('description_en')) {
                            echo "<span style='color:red'>" . form_error('description_en') . "</span>";
                        } ?>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-labeled btn-success " id="btn-save"  name="add"
                            value="add"><i class="fa fa-paper-plane"></i>حفظ
                    </button>
                </div>
                <?php echo form_close(); ?>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>
