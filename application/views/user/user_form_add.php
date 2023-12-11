
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add User</h3>
                <div class="float-right">
                    <a href="<?=site_url('User') ?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>
                        Back</a>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!--
              <form id="quickForm"  novalidate="novalidate" action="" method="post" >
              -->
 <?php echo form_open_multipart('User/add');  ?>
<input type="hidden" name="page" value="add"/>

            <div class="row">
                <div class="col-md-4">
       
             <div class="form-group">
                  <label> Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                    </div>
                    <input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control"
                   name="fullname" aria-describedby="fullname-error"
                     />
                  
                        <span id="fullname-error" class="error invalid-feedback" style="display: inline;">
                      <?=form_error('fullname')?></span>
                      
                      
                      </div>
                  </div>
                  <!-- /.input group -->
               
                </div>
                
                    <div class="col-md-4">
     
             <div class="form-group">
                  <label> UserName</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                    </div>
                    <input type="text"  name="username" value="<?=set_value('username')?>" class="form-control"
                    aria-describedby="username-error"
                     />
                   
                           <span id="username-error" class="error invalid-feedback" style="display: inline;">
                      <?=form_error('username')?></span>  
                  </div>
                  <!-- /.input group -->
                </div>
               
              </div>
              </div>
            
             
              
              <div class="row">
            
                     <div class="col-md-4">
                <div class="form-group">
             <div class="form-group">
                  <label> Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                   <input type="password" name="password" value="<?=set_value('password')?>"  class="form-control"/>
                   <span id="password-error" class="error invalid-feedback" style="display: inline;">
                  <?=form_error('password')?></span>
                  </div>
                  <!-- /.input group -->
                </div>
                </div>
              </div>
            
                    <div class="col-md-4">
                <div class="form-group">
             <div class="form-group">
                  <label> Password Confirmation</label>
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
                 <div class="col-md-4">
                       <div class="form-group">

                  <label>Role In System</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">  <i class="fas fa-cog"></i> </span>
                    </div>
                  <select name="level" class="form-control" id="level" >
                            <option value="1" <?=set_value('level') == 1 ? "selected" : null ?>>Admin</option>

                        </select>
                         <span id="level-error" class="error invalid-feedback" style="display: inline;">
                        <?=form_error('level')?>
                        </span>
                  </div>
                  <!-- /.input group -->
              
                </div>
                 
        
            </div>
            




            
         <div class="col-md-4" >  
    
    <div class="form-group has-danger  ">
                            <label >Image*</label>
          

                            <input type="file" name="image"
                                   class="form-control " >
                        </div>                
</div>       
            
            
            </div>
            
            
                <div class="row">
                <div class="col-md-4 offset-md-4">
                    <?php //echo validation_errors(); ?>

 
                
                
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i>Save</button>
                    <button type="reset" class="btn  btn-flat">Reset</button>
                    </div>
                
            </div>
            </div>
       <?php echo form_close(); ?>
        </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    </div>
</section>

<style>

</style>

<script>
$('#level').on('change', function() {
  //  alert( this.value ); // or $(this).val()
  if(this.value == 1 ) {
    $('#brokers').hide("slow");
    $('#agents').hide("slow");
  } else if(this.value == 2 ){
    $('#brokers').hide();
    $('#agents').show("slow");
  }else if(this.value == 3){
   $('#brokers').show("slow");
   $('#agents').hide(); 
  }
});


</script>
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
         name: {
        required: true,
        name: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      fullname: {
        required: true
      },
      username:{
        required: true 
      },
      passconf:{
         required: true  
      },
        level:{
         required: true  
      },
      
    },
    messages: {
        name: {
        required: "Please enter a name address",
        email: "Please enter a vaild name address"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required:   <?=form_error('password')?>,
        minlength: "Your password must be at least 5 characters long"
      },
         fullname: {
        required: <?=form_error('fullname')?>
       // minlength: "Your password must be at least 5 characters long"
      },
         username: {
        required: <?=form_error('username')?>
       // minlength: "Your password must be at least 5 characters long"
      },
      
          passconf: {
        required: <?=form_error('passconf')?>
       // minlength: "Your password must be at least 5 characters long"
      },
      
            level: {
        required: <?=form_error('level')?>
       // minlength: "Your password must be at least 5 characters long"
      },

    
    },
    
    
    
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
