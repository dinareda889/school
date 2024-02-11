<!--====== PAGE BANNER PART START ======-->
<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8"
         style="background-image: url(images/page-baner/about.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>الهيكل الوظيفى</h2>

                </div>
            </div>
        </div>
    </div>
</section>


<!----------------------  style ------------------------>
<link href="<?= base_url() . 'assets_web/css/' ?>structure-style.css" rel="stylesheet">
<link href="<?= base_url() . 'assets_web/css/' ?>bootstrap-structure.css" rel="stylesheet">


<!----------------------  structure ------------------------>
<section class="pt-60 pb-60 direction bck">
    <div class="container c-relative">
        <div class="tabs-bord">
            <?php if (isset($team) && !empty($team)) { ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="tab" role="tabpanel">
                        <!-- Tab panes -->
                        <div class="tab-content tabs">
                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">

                                <!----------------------  level1 ------------------------>
                                <div class="row level1">
                                    <?php
                                    if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                                        switch ($_SESSION['site_lang']) {
                                            case 'arabic':
                                                $name = 'name';
                                                $job_title = 'job_title';
                                                break;
                                            case 'english':
                                                $name = 'name_en';
                                                $job_title = 'job_title_en';
                                                break;
                                            case 'russian':
                                                $name = 'name_ru';
                                                $job_title = 'job_title_ru';
                                                break;
                                            default:
                                                $name = 'name_en';
                                                $job_title = 'job_title_en';
                                                break;
                                        }
                                    }

                                    foreach ($team as $row) {
                                        if (!empty($row->image) && (file_exists('uploads/team/' . $row->image))) {
                                            $image = base_url() . "uploads/team/" . $row->image;
                                        } else {
                                            $image = base_url() . 'uploads/defult_image.jpg';
                                        }
                                        ?>
                                        <div class="col-md-4 col-sm-4 centered">
                                            <div class="our-team">
                                                <div class="pic"><img src="<?= $image ?>"></div>
                                                <div class="team-content">
                                                    <h3 class="title"><?= $row->$job_title ?> </h3>
                                                    <h6><?= $row->$name ?> </h6>
                                                    <?php if (isset($row->sub) && (!empty($row->sub))) { ?>
                                                        <div id="accordion<?= $row->id ?>" data-toggle="collapse">
                                                            <a class="b-scroll collapse" data-toggle="collapse"
                                                               data-parent="#accordion<?= $row->id ?>"
                                                               href="#collapseOne<?= $row->id ?>">
                                                                <span class="fa fa-angle-down"></span>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php
                                foreach ($team as $row) {
                                    if (isset($row->sub) && (!empty($row->sub))) {
                                        ?>
                                        <!----------------------  level2 ------------------------>
                                        <div id="collapseOne<?= $row->id ?>" class="panel-collapse collapse">
                                            <div class="row level2">
                                                <?php
                                                foreach ($row->sub as $sub) {
                                                    if (!empty($sub->image) && (file_exists('uploads/team/' . $sub->image))) {
                                                        $image = base_url() . "uploads/team/" . $sub->image;
                                                    } else {
                                                        $image = base_url() . 'uploads/defult_image.jpg';
                                                    }

                                                    ?>
                                                    <div class="col-md-3 col-sm-3 centered">
                                                        <div class="our-team  fadeInDown animated">
                                                            <div class="pic"><img src="<?= $image ?>"></div>
                                                            <div class="team-content">
                                                                <h3 class="title"><?= $sub->$job_title ?> </h3>
                                                                <h6><?= $sub->$name ?></h6>
                                                                <?php if (isset($sub->sub) && (!empty($sub->sub))) {
                                                                    ?>
                                                                    <div id="accordion<?= $sub->id ?>"
                                                                         data-toggle="collapse">

                                                                        <a class="b-scroll collapsed"
                                                                           data-toggle="collapse"
                                                                           data-parent="#accordion<?= $sub->id ?>"
                                                                           href="#collapseOne<?= $sub->id ?>">
                                                                            <span class="fa fa-angle-down"></span>
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <!--                            </div>-->
                                            <?php if (isset($sub->sub) && (!empty($sub->sub))) {
                                                ?>
                                                <!----------------------  level3 ------------------------>
                                                <div id="collapseOne<?= $sub->id ?>" class="panel-collapse collapse">
                                                    <div class="row level2">
                                                        <?php
                                                        foreach ($sub->sub as $sub2) {
                                                        if (!empty($sub2->image) && (file_exists('uploads/team/' . $sub2->image))) {
                                                            $image = base_url() . "uploads/team/" . $sub->image;
                                                        } else {
                                                            $image = base_url() . 'uploads/defult_image.jpg';
                                                        }

                                                        ?>
                                                        <div class="col-md-3 col-sm-3 centered">
                                                            <div class="our-team  fadeInDown animated">
                                                                <div class="pic"><img src="<?= $image ?>"></div>
                                                                <div class="team-content">
                                                                    <h3 class="title"><?= $sub2->$job_title ?> </h3>
                                                                    <h6><?= $sub2->$name ?></h6>
                                                                    <?php if (isset($sub2->sub) && (!empty($sub2->sub))) {
                                                                        ?>
                                                                        <div id="accordion<?= $sub->id ?>"
                                                                             data-toggle="collapse">

                                                                            <a class="b-scroll collapsed"
                                                                               data-toggle="collapse"
                                                                               data-parent="#accordion<?= $sub2->id ?>"
                                                                               href="#collapseOne<?= $sub2->id ?>">
                                                                                <span class="fa fa-angle-down"></span>
                                                                            </a>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--                                    </div>-->
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>


        </div>
</section>
<!--====== FOOTER PART START ======-->
