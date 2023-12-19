<?php
/*
echo'<pre>';
print_r($all_details);*/

if (isset($all_details) && $all_details != null) { ?>
    <div class="row">
    <div class="col-9 col-sm-9">
        <table class="table table-borderless">
            <tbody>
            <tr >
                <td class="sidetd" style=""><b><?=translate('The_date')?> : </b></td>
                <td><?=$all_details->date_ar?></td>
            </tr>
            <tr >
                <td class="sidetd" style=""><b><?=translate('Album_title_in_arabic')?> : </b></td>
                <td><?=$all_details->title?></td>

            </tr>
            <tr >
                <td class="sidetd" style=""><b><?=translate('Album_title_in_english')?> : </b></td>
                <td><?=$all_details->title_en?></td>

            </tr>
            <tr >
                <td class="sidetd" style=""><b><?=translate('Album_details_in_arabic')?> : </b></td>
                <td ><?=$all_details->details?></td>
            </tr>
            <tr >
                <td class="sidetd" style=""><b><?=translate('Album_details_in_english')?> : </b></td>
                <td ><?=$all_details->details_en?></td>
            </tr>

            <tr >
                <td class="sidetd" style=""><b> <?=translate('Album_pictures')?> : </b></td>
                <td >
                    <div class="form-group col-md-12  col-sm-12">
                    <div  class="row">
                        <?php

                        if (!empty($images)) {


                            for ($i = 0; $i < count($images); $i++) {
                                ?>

                                <div id="img_<?=$images[$i]->images_id?>" class="col-2 col-sm-2" style="flex: 33.33%;padding: 5px; margin-left: 70px;" >
                                    <img id="image_view_<?=$images[$i]->images_id?>"

                                         src="<?php if (!empty($images[$i]->images_name) && (file_exists('uploads/web/photos/' . $images[$i]->images_name))) {

                                             echo base_url() . 'uploads/web/photos/' . $images[$i]->images_name;

                                         } else {

                                             echo base_url() . 'asisst/admin_asset/img/No-image-available.png';

                                         } ?>"

                                         height="100px" width="150px" alt=""/>


                                </div>
                                <?php
                            }
                        }else{
                            echo '<div class="danger">لا يوجد صور </div>';
                        }
                        ?>

                    </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>


    </div>
    <div class="col-3 col-sm-3">

        <img id="main_image"

             src="<?php if (!empty($all_details->main_image) && (file_exists('uploads/web/photos/' . $all_details->main_image))) {

                 echo base_url() . 'uploads/web/photos/' . $all_details->main_image;

             } else {

                 echo base_url() . 'asisst/admin_asset/img/No-image-available.png';

             } ?>"

             height="150px" width="200px" alt=""/>
    </div>
    </div>
    <?php
} ?>