<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <!--تعديل بيانات مستخدم--> <?= translate('Update_User_Data') ?></h3>
                <div class="float-right">
                    <a href="<?= site_url('User') ?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>
                        <?= translate('Back') ?></a>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php //echo validation_errors(); ?>

                <?php echo form_open_multipart('User/edit/' . $all_users->user_id); ?>


                <input type="hidden" name="user_id" value="<?= $all_users->user_id ?>">
                <input type="hidden" name="page" value="edit"/>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?= translate('The_Name') ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="text" name="fullname" value="<?= $all_users->name ?>"
                                       class="form-control "/>
                                <?= form_error('fullname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><!--إسم المستخدم--> <?=translate('User_Name')?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="text" name="username" value="<?= $all_users->username ?>"
                                       class="form-control"/>
                                <?= form_error('username') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> <?=translate('The_Email')?><!--الإيميل--></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="text" name="email" value="<?= $all_users->email ?>" class="form-control"/>
                                <?= form_error('email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> <!--كلمة المرور--> <?=translate('The_Password')?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="password" name="password" value="<?= $this->input->post('password') ?>"
                                       class="form-control">
                                <?= form_error('password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> <?=translate('Confirm_Password')?>  <!--تأكيد كلمة المرور --></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>"
                                       class="form-control">
                                <?= form_error('passconf') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group has-danger ">
                            <label><!--الصورة--> <?=translate('The_Image')?> *</label>
                            <input type="file" name="image" class="form-control "/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <?php if ($this->uri->segment(2) == 'edit') {
                            if ($all_users->image != null) {
                                ?>
                                <div style="margin-bottom: 5px">
                                    <img src="<?= base_url('uploads/user/' . $all_users->image) ?>"
                                         style="width:30%">

                                </div>


                                <?php
                            }
                        } ?>
                    </div>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i><?=translate('Save')?></button>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->


    </div>
</section>
