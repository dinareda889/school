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
                    <td class="sidetd" style=""><b><?= translate('The_Date') ?> : </b></td>
                    <td><?= $all_details->date_ar ?></td>
                </tr>
                <tr class="arabic">
                    <td class="sidetd" style=""><b><?= translate('Job_title_in_Arabic') ?> : </b></td>
                    <td><?= $all_details->title ?></td>

                </tr>
                <tr class="english">
                    <td class="sidetd" style=""><b><?= translate('Job_title_in_English') ?> : </b></td>
                    <td><?= $all_details->title_en ?></td>

                </tr>
                <tr class="russian">
                    <td class="sidetd" style=""><b><?= translate('Job_title_in_Russian') ?> : </b></td>
                    <td><?= $all_details->title_ru ?></td>

                </tr>
                <tr class="arabic">
                    <td class="sidetd" style=""><b> <?= translate('Job_Details_in_Arabic') ?> : </b></td>
                    <td><?= $all_details->details ?></td>
                </tr>
                <tr class="english">
                    <td class="sidetd" style=""><b><?= translate('Job_Details_in_English') ?> : </b></td>
                    <td><?= $all_details->details_en ?></td>
                </tr>
                <tr class="russian">
                    <td class="sidetd" style=""><b><?= translate('Job_Details_in_Russian') ?> : </b></td>
                    <td><?= $all_details->details_ru ?></td>
                </tr>
                <tr class="arabic">
                    <td class="sidetd" style=""><b> <?= translate('Job_responsibilities_in_Arabic') ?> : </b></td>
                    <td><?= $all_details->responsibilities ?></td>
                </tr>
                <tr class="english">
                    <td class="sidetd" style=""><b><?= translate('Job_responsibilities_in_English') ?> : </b></td>
                    <td><?= $all_details->responsibilities_en ?></td>
                </tr>
                <tr class="russian">
                    <td class="sidetd" style=""><b><?= translate('Job_responsibilities_in_Russian') ?> : </b></td>
                    <td><?= $all_details->responsibilities_ru ?></td>
                </tr>
                <tr class="arabic">
                    <td class="sidetd" style=""><b> <?= translate('Job_Education_and_Experience_in_Arabic') ?> : </b>
                    </td>
                    <td><?= $all_details->education_experience ?></td>
                </tr>
                <tr class="english">
                    <td class="sidetd" style=""><b><?= translate('Job_Education_and_Experience_in_English') ?> : </b>
                    </td>
                    <td><?= $all_details->education_experience_en ?></td>
                </tr>
                <tr class="russian">
                    <td class="sidetd" style=""><b><?= translate('Job_Education_and_Experience_in_Russian') ?> : </b>
                    </td>
                    <td><?= $all_details->education_experience_ru ?></td>
                </tr>
                <tr class="arabic">
                    <td class="sidetd" style=""><b> <?= translate('Job_Skills_in_Arabic') ?> : </b>
                    </td>
                    <td><?= $all_details->skills ?></td>
                </tr>
                <tr class="english">
                    <td class="sidetd" style=""><b><?= translate('Job_Skills_in_English') ?> : </b>
                    </td>
                    <td><?= $all_details->skills_en ?></td>
                </tr>
                <tr class="russian">
                    <td class="sidetd" style=""><b><?= translate('Job_Skills_in_Russian') ?> : </b>
                    </td>
                    <td><?= $all_details->skills_ru ?></td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
    <?php
} ?>