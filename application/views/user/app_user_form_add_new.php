 
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">إضافة مستخدم للتطبيق</h3>
            <div class="card-tools"> 
                <div class="float-right">
                    <a href="<?=site_url('User') ?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>
                        رجوع</a>
                </div>
            </div>
          </div>
          <!-- /.card-header -->
                      <?php         
   if($this->session->flashdata('response')){
 ?>
   <div class="alert alert-danger"> 
     <?php  echo $this->session->flashdata('response'); 
     unset($_SESSION['response']);

     ?></div>
<?php    
} 
?>

          <div class="card-body">

          <?php echo form_open_multipart('User/adduserApp');  ?>
       <input type="hidden" name="page" value="add"/>


              
                                                            
            <div class="row">
               <!--     <div class="col-md-4">
                <div class="form-group">
                  <label> Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                    </div>
                      <input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control"
                   name="fullname" aria-describedby="fullname-error"
                     />
                  </div>
                </div>
     <?php  if(form_error('fullname')){ 	echo "<span style='color:red'>".form_error('fullname')."</span>"; } ?>
                 </div>
-->
                 <div class="col-md-4" >
                <div class="form-group">
                  <label>إسم المستخدم </label>  
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">  <i class="fas fa-user-alt"></i></span>
                    </div>
                  <input type="text"  name="username" value="<?=set_value('username')?>" class="form-control"
                    aria-describedby="username-error"
                     />
                  </div>
                </div>
        <?php  if(form_error('username')){ echo "<span style='color:red'>".form_error('username')."</span>";} ?>
              </div> 
              
               <div class="col-md-4" >
                <div class="form-group">
                  <label>الإيميل</label>  
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">  <i class="fas fa-user-alt"></i></span>
                    </div>
                  <input type="text"  name="email" value="<?=set_value('email')?>" class="form-control"
                    aria-describedby="username-error"
                     />
                  </div>
                </div>
        <?php  if(form_error('email')){ echo "<span style='color:red'>".form_error('email')."</span>";} ?>
              </div> 
  
         </div>
         
         <div class="row">  
                    <div class="col-md-4" >
                <div class="form-group">
                  <label>الجوال</label>  
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">  <i class="fas fa-user-alt"></i></span>
                    </div>
                  <input type="text"  name="user_phone" value="<?=set_value('user_phone')?>" class="form-control"
                    aria-describedby="username-error"
                     />
                  </div>
                </div>
        <?php  if(form_error('user_phone')){ echo "<span style='color:red'>".form_error('user_phone')."</span>";} ?>
              </div> 
            
       <div class="col-md-4" >
                <div class="form-group">
                  <label>كلمة المرور</label>  
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">  <i class="fas fa-key"></i></span>
                    </div>
                  <input type="password" name="password" value="<?=set_value('password')?>"  class="form-control"/>
                  </div>
                
                </div>
       <?php  if(form_error('password')){ echo "<span style='color:red'>".form_error('password')."</span>";} ?>
              </div> 
          <div class="col-md-4">
                <div class="form-group">
             <div class="form-group">
                  <label> تأكيد كلمة المرور</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                  <input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control" />
                  <span id="passconf-error" class="error invalid-feedback" style="display: inline;">
                       <?=form_error('passconf')?>
                       </span>
                  </div>
                  <!-- /.input group -->
                </div>
                </div>
              </div>


              
              </div>



               <div class="row">
 



                     <div class="col-md-4" >  
    
    <div class="form-group has-danger  ">
                            <label >صورة *</label>
          

                            <input type="file" name="image"
                                   class="form-control " >
                        </div>                
</div> 
            
     
            
            
            </div>

 

        <div class="form-group ">
  <button type="submit" name="add"   class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i>حفظ</button>
      
                            </div>
                        <?php echo form_close(); ?>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>


