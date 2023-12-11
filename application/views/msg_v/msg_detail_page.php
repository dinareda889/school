<?php  

if(isset( $all_details[0]->msg_content ) and  $all_details[0]->msg_content!=null){
 echo $all_details[0]->msg_content;   
}else{ ?>
    <div class="alert alert-danger">
  <strong></strong><?=translate('No_Details')?>
</div>
<?php }


?>