
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">تعديل بيانات مستخدم للتطبيق</h3>
                <div class="float-right">
                    <a href="<?=site_url('User') ?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>
                        Back</a>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <?php //echo validation_errors(); ?>

         <?php echo form_open_multipart('User/edituserApp/'.$all_users->user_id);  ?>


<input type="hidden" name="user_id" value="<?=$all_users->user_id?>">
<input type="hidden" name="page" value="edit"/>
              
                            <div class="form-group">
                                <label >إسم المستخدم </label>
                                <input type="text" name="username" value="<?= $all_users->user_name ?>"  class="form-control"/>
                                <?=form_error('username')?>
                            </div>
                              <div class="form-group">
                                <label >الإيميل*</label>
                                <input type="text" name="email" value="<?= $all_users->user_email ?>"  class="form-control"/>
                                <?=form_error('email')?>
                            </div>
                             <div class="form-group">
                                <label >الجوال*</label>
                                <input type="text" name="phone" value="<?= $all_users->user_phone ?>"  class="form-control"/>
                                <?=form_error('phone')?>
                            </div>
                            <div class="form-group">
                                <label >كلمة المرور</label>
                                <input type="password" name="password" value="<?=$this->input->post('password') ?>"  class="form-control">
                              <?=form_error('password')?>
                            </div>
                            <div class="form-group">
                                <label>تأكيد كلمة المرور</label>
                                <input type="password" name="passconf" value="<?=$this->input->post('passconf') ?>" class="form-control" >
                                <?=form_error('passconf')?>
                            </div>


   <div class="form-group has-danger mb-0">
                            <label >الصورة </label>
                     <?php if($this->uri->segment(2) == 'edit'){
                                if($all_users->image != null) {
                                ?>
                                    <div style="margin-bottom: 5px">
                                        <img src="<?=base_url('uploads/user/'.$all_users->image)?>"
                                             style="width:30px">

                                    </div>


                            <?php
                                }
                                } ?>

                            <input type="file" name="image"
                                   class="form-control " />
                        </div>  
            

                            <div class="form-group">
  <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i>حفظ</button>
             
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
