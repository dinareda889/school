<?php
/*
echo'<pre>';
print_r($all_details);*/
if (isset($all_details) && $all_details != null) { ?>
    <div class="row">
        <div class="col-9 col-sm-9">
            <table class="table table-borderless">
                <tbody>
                <tr style="/*text-align: center;*/">
                    <td class="sidetd" style=""><b>النص  : </b></td>
                    <td><?=$all_details->description?></td>

                   
                </tr>
                

                </tbody>
            </table>
        </div>
        <div class="col-3 col-sm-3">

            <img id="main_image"

                 src="<?php if (!empty($all_details->image) && (file_exists('uploads/banners/' . $all_details->image))) {

                     echo base_url() . 'uploads/banners/' . $all_details->image;

                 } else {

                     echo base_url() . 'uploads/defult_image.jpg';

                 } ?>"

                 height="150px" width="150px" alt=""/>
        </div>
    </div>
   
    <?php
} ?>