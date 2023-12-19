<?php
/*
echo'<pre>';
print_r($all_details);*/
if (isset($all_details) && $all_details != null) { ?>
    <div class="row">
        <div class="col-9 col-sm-9">
            <table class="table table-borderless">
                <tbody>
                <tr>
                    <td class="sidetd" style=""><b>الاسم  : </b></td>
                    <td><?=$all_details->name?></td>
                </tr>
                <tr>
                    <td class="sidetd" style=""><b>اللينك  : </b></td>
                    <td><a href="<?=$all_details->link?>" target="_blank" title="انقر للذهاب الي اللينك" class="btn btn-info btn-xs"><i class="fas fa-link"></i></a>
                        </td>
                </tr>
                <tr>
                    <td class="sidetd" style=""><b>الوصف  : </b></td>
                    <td><?=$all_details->description?></td>
                   
                </tr>
                

                </tbody>
            </table>
        </div>
        <div class="col-3 col-sm-3">

            <img id="main_image"

                 src="<?php if (!empty($all_details->image) && (file_exists('uploads/client/' . $all_details->image))) {

                     echo base_url() . 'uploads/client/' . $all_details->image;

                 } else {

                     echo base_url() . 'uploads/defult_image.jpg';

                 } ?>"

                 height="150px" width="150px" alt=""/>
        </div>
    </div>
   
    <?php
} ?>