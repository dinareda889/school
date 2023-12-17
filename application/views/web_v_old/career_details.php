<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title"><?=translate_web('Our_Career_details')?></h2>
                <span class="ipn-subtitle"><?=translate_web('See_Our_Details')?></span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->
<?php
if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
    switch ($_SESSION['site_lang']) {
        case 'arabic':
            $name = 'title';
            $description = 'details';
            $education_experience = 'education_experience';
            $responsibilities = 'responsibilities';
            $skills = 'skills';
            break;
        case 'english':
            $name = 'title_en';
            $description = 'details_en';
            $education_experience = 'education_experience_en';
            $responsibilities = 'responsibilities_en';
            $skills = 'skills_en';

            break;
        case 'russian':
            $name = 'title_ru';
            $description = 'details_ru';
            $education_experience = 'education_experience_ru';
            $responsibilities = 'responsibilities_ru';
            $skills = 'skills_ru';

            break;
        default:
            $name = 'title_en';
            $description = 'details_en';
            $education_experience = 'education_experience_en';
            $responsibilities = 'responsibilities_en';
            $responsibilities = 'responsibilities_en';
            $skills = 'skills_en';

            break;
    }
}

?>
<!-- ============================ Agency List Start ================================== -->
<section class="gray-simple project-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                <div class="blog-details single-post-item format-standard">
                    <div class="post-details">
                        <h2 class="post-title"><?= $one_career->$name ?></h2>
                        <p><?= $one_career->$description ?></p>
                        <div class="ul-respon">
                            <h4 class="pbm-title"><?=translate_web('Responsibilties')?>:</h4>
                            <p><?= $one_career->$responsibilities ?></p>
                        </div>
                        <div class="ul-respon">
                            <h4 class="pbm-title"><?=translate_web('Education_&_Experience')?>:</h4>
                            <p><?= $one_career->$education_experience ?></p>
                        </div>
                        <div class="ul-respon">
                            <h4 class="pbm-title"><?=translate_web('Skills')?>:</h4>
                            <p><?= $one_career->$skills ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single blog Grid -->
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <div class="details-sidebar">
                    <!-- Agent Detail -->
                    <div class="sides-widget">
                        <?php echo form_open_multipart(base_url() . 'Web/apply_job') ?>
                        <input type="hidden" name="data[career_id]" value="<?= $one_career->id ?>">

                        <div class="sides-widget-header">
                            <div class="sides-widget-details">
                                <h4><a href="#"><?=translate_web('Apply_Now')?></a></h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="sides-widget-body simple-form">
                            <?php
                            if (validation_errors()){
                                ?>
                                <div class="alert alert-danger">
                                    <ol>
                                        <?php echo validation_errors('<li>', '</li>'); ?>
                                    </ol>
                                </div>
                                <?php
                            }

                            ?>
                            <div class="form-group">
                                <label><?=translate_web('Name')?> <i class="req">*</i></label>
                                <input type="text" name="data[name]" class="form-control" placeholder="<?=translate_web('Your_Name')?>">
                            </div>
                            <div class="form-group">
                                <label><?=translate_web('Email_ID')?> <i class="req">*</i></label>
                                <input type="email" name="data[email]" class="form-control" placeholder="<?=translate_web('Your_Email')?>">
                            </div>
                            <div class="form-group">
                                <label><?=translate_web('file_cv')?> <i class="req">*</i></label>
                                <input type="file" name="file_cv" class="form-control" placeholder="<?=translate_web('file_cv')?>">
                            </div>
                            <!--<div class="upload-files-container">
                                <div class="drag-file-area">
                                    <span class="material-icons-outlined upload-icon"> <i
                                                class="fa-solid fa-arrow-up-from-bracket"></i> </span>
                                    <label class="label"> <span class="browse-files">
													 <input type="file" name="file_cv" class="default-file-input"/>
													 <span class="browse-files-text"> <?/*=translate_web('browse_file')*/?></span>
													</span> </label>
                                </div>-->
                               <!-- <span class="cannot-upload-message">
												 <span class="material-icons-outlined"><?/*=translate_web('error')*/?></span> <?/*=translate_web('select_file')*/?> <span
                                            class="material-icons-outlined cancel-alert-button"><?/*=translate_web('cancel')*/?></span> </span>
                                <div class="file-block">
                                    <div class="file-info"><span class="material-icons-outlined file-icon"></span> <span
                                                class="file-name"> </span> | <span class="file-size">  </span></div>
                                    <span class="material-icons remove-file-icon"><?/*=translate_web('delete')*/?></span>
                                    <div class="progress-bar"></div>
                                </div>
                                <button type="button" class="upload-button"> <?/*=translate_web('Upload')*/?></button>-->
<!--                            </div>-->
                            <button type="submit" class="btn send-button btn-md rounded full-width"><?=translate_web('Apply_Now')?></button>
                        </div>
                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
</section>
<!-- ============================ Agency List End ================================== -->

