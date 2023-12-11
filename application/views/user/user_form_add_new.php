<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><?= translate('Add_a_new_user') ?></h3>
                <div class="card-tools">
                    <div class="float-right">
                        <a href="<?= site_url('User') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-undo"></i>
                            <?= translate('Back') ?></a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php echo form_open_multipart('User/adduser'); ?>
                <input type="hidden" name="page" value="add"/>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?= translate('The_Name') ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="text" name="fullname" value="<?= set_value('fullname') ?>"
                                       class="form-control"
                                       name="fullname" aria-describedby="fullname-error"
                                />
                            </div>
                        </div>
                        <?php if (form_error('fullname')) {
                            echo "<span style='color:red'>" . form_error('fullname') . "</span>";
                        } ?>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label><!--إسم المستخدم--> <?=translate('User_Name')?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">  <i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="text" name="username" value="<?= set_value('username') ?>"
                                       class="form-control"
                                       aria-describedby="username-error"
                                />
                            </div>
                        </div>
                        <?php if (form_error('username')) {
                            echo "<span style='color:red'>" . form_error('username') . "</span>";
                        } ?>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label> <?=translate('The_Email')?><!--الإيميل--></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">  <i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control"
                                       aria-describedby="username-error"
                                />
                            </div>
                        </div>
                        <?php if (form_error('email')) {
                            echo "<span style='color:red'>" . form_error('email') . "</span>";
                        } ?>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> <!--كلمة المرور--> <?=translate('The_Password')?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">  <i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" value="<?= set_value('password') ?>"
                                       class="form-control"/>
                            </div>

                        </div>
                        <?php if (form_error('password')) {
                            echo "<span style='color:red'>" . form_error('password') . "</span>";
                        } ?>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label> <?=translate('Confirm_Password')?>  <!--تأكيد كلمة المرور --></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="passconf" value="<?= set_value('passconf') ?>"
                                           class="form-control"/>
                                    <span id="passconf-error" class="error invalid-feedback" style="display: inline;">
                       <?= form_error('passconf') ?>
                       </span>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>


                </div>


                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group has-danger ">
                            <label><!--الصورة--> <?=translate('The_Image')?> *</label>


                            <input type="file" name="image"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--    <div class="form-group">

                  <label>Role In System</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">  <i class="fas fa-cog"></i> </span>
                    </div>
                  <select name="level" class="form-control" id="level" onchange="get_type_div(this.value)">
                            <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>

                        </select>
                         <span id="level-error" class="error invalid-feedback" style="display: inline;">
                        <?= form_error('level') ?>
                        </span>
                  </div>
                 
              
                </div>-->
                        <input type="hidden" name="level" value="1"/>

                    </div>


                </div>


                <div class="form-group ">
                    <button type="submit" name="add" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i><?=translate('Save')?>
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


