<!-- ============================ Page Title Start================================== -->

<section id="page-banner" class="pt-120 pb-120 bg_cover" data-overlay="8"
         style="background-image: url(<?= base_url() . 'assets_web/' ?>images/page-baner/terms.jpg)">
    <div class="container">
        <div class="row direction">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2><?= translate_web('Our_Blog') ?> </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<pre>
<!--    --><?php //print_r($one_blog) ?>
   <!-- <?php /*print_r($_POST) */ ?>
    --><?php /*print_r($_SESSION) */ ?>
</pre>
<?php
if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
    switch ($_SESSION['site_lang']) {
        case 'arabic':
            $name = 'name_ar';
            $description = 'description_ar';
            break;
        case 'english':
            $name = 'name_en';
            $description = 'description_en';
            break;
        case 'russian':
            $name = 'name_ru';
            $description = 'description_ru';
            break;
        default:
            $name = 'name_en';
            $description = 'description_en';
            break;
    }

}
$comments_count = 0;
if (isset($one_blog->comments) && (!empty($one_blog->comments))) {
    $comments_count = count($one_blog->comments);
}
?>
<!-- ============================ Agency List Start ================================== -->

<section class="pt-70 pb-70 bck direction" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
    <div class="container c-relative">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details mt-30">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" dir="rtl">
                        <ol class="carousel-indicators">
                            <?php if (isset($one_blog->imgs) && (!empty($one_blog->imgs))) {
                                foreach ($one_blog->imgs as $key => $img) { ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>"
                                        class="<?php
                                        if ($key == 0) {
                                            echo 'active';
                                        } ?>"></li>
                                <?php }
                            } ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php if (isset($one_blog->imgs) && (!empty($one_blog->imgs))) {
                                foreach ($one_blog->imgs as $key=> $img) {
                                    if (isset($img->image) && (!empty($img->image))) {
                                        $img_url = base_url() . 'uploads/news/' . $img->image;
                                    } else {
                                        $img_url = base_url() . 'assets_web/img/p-1.jpg';

                                    }

                                    ?>
                                    <div class="carousel-item <?php
                                    if ($key == 0) {
                                        echo 'active';
                                    } ?>">
                                        <img class="d-block w-100" src="<?= $img_url ?>" alt="First slide">
                                    </div>
                                <?php }
                            } ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"><?= translate_web('prev') ?></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"><?= translate_web('next') ?></span>
                        </a>
                    </div>
                    <div class="cont">
                        <h3><?= $one_blog->$name ?></h3>
                        <ul>
                            <li>
                                <a><i class="fa fa-calendar"></i> <?= date('y-m-d', strtotime($one_blog->publish_date)) ?>
                                </a></li>
                        </ul>
                        <p><?= $one_blog->$description ?></p>
                        <ul class="share">
                            <li class="title">مشاركة الخبر :</li>
                            <li><a href="javascript:fbShare(520,360)"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="javascript:twitterShare(520,360)"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="javascript:instagramShare(520,360)"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li><a href="javascript:linkedinShare(520,360)"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <div class="blog-comment pt-45">
                            <div class="title pb-15">
                                <h3>(<?= $comments_count ?>) <?= translate_web('Comment') ?></h3>
                            </div>  <!-- title -->
                            <ul>
                                <li>
                                    <?php if (isset($one_blog->comments) && (!empty($one_blog->comments))) {
                                        foreach ($one_blog->comments as $comment) {
                                            ?>

                                            <div class="comment">
                                                <div class="comment-author">
                                                    <!--                                            <div class="author-thum">-->
                                                    <!--                                                <img src="images/review/r-2.jpg" alt="Reviews">-->
                                                    <!--                                            </div>-->
                                                    <div class="comment-name">
                                                        <h6><?= $comment->name ?></h6>
                                                        <span><?= $comment->creat_at ?></span>
                                                    </div>
                                                </div>
                                                <div class="comment-description pt-20">
                                                    <p><?= $comment->comment ?></p>
                                                </div>
                                                <!--                                        <div class="comment-replay">-->
                                                <!--                                            <a href="#">الرد</a>-->
                                                <!--                                        </div>-->
                                            </div>


                                        <?php }
                                    } ?>
                                </li>
                            </ul>
                            <div class="title pt-45 pb-25">
                                <h3><?= translate_web('Post_Comment') ?></h3>
                            </div> <!-- title -->
                            <?php
                            if (validation_errors()) {
                                ?>
                                <div class="alert alert-danger">
                                    <ol>
                                        <?php echo validation_errors('<li>', '</li>'); ?>
                                    </ol>
                                </div>
                                <?php
                            }

                            ?>

                            <div class="comment-form">
                                <?php echo form_open(base_url() . 'Web/send_comment') ?>
                                <input type="hidden" name="data[blog_id]" value="<?= $one_blog->id ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-singel">
                                            <input type="text" name="data[name]"
                                                   placeholder="<?= translate_web('Your_Name') ?>">
                                        </div> <!-- form singel -->
                                        <?php if (form_error('user_name_comment')) {
                                            echo "<span style='color:red'>" . form_error('user_name_comment') . "</span>";
                                        } ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-singel">
                                            <input type="email" name="data[email]"
                                                   placeholder="<?= translate_web('Your_Email') ?>">
                                        </div> <!-- form singel -->
                                        <?php if (form_error('user_email_comment')) {
                                            echo "<span style='color:red'>" . form_error('user_email_comment') . "</span>";
                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-singel">
                                            <textarea name="data[comment]"
                                                      placeholder="<?= translate_web('Type_your_comments') ?>"></textarea>
                                        </div> <!-- form singel -->
                                        <?php if (form_error('user_comment')) {
                                            echo "<span style='color:red'>" . form_error('user_comment') . "</span>";
                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-singel">
                                            <button class="main-btn"><?= translate_web('Send_Now') ?></button>
                                        </div> <!-- form singel -->
                                    </div>
                                </div> <!-- row -->
                                <?= form_close() ?>
                            </div>  <!-- comment-form -->
                        </div> <!-- blog comment -->
                    </div> <!-- cont -->
                </div> <!-- blog details -->
            </div>

            <div class="col-lg-4">
                <div class="saidbar">
                    <div class="row">
                        <!--<div class="col-lg-12 col-md-6">
                            <div class="saidbar-search mt-30">
                                <form action="#">
                                    <input type="text" placeholder="ابحث هنا">
                                    <button type="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>

                        </div>-->
                        <!-- categories -->
                        <?php if (isset($blogs) && (!empty($blogs))) { ?>
                            <div class="col-lg-12 col-md-6">
                                <div class="saidbar-post mt-30">
                                    <h4><?= translate_web('Trending_Posts') ?></h4>
                                    <ul>
                                        <?php
                                        if (isset($_SESSION['site_lang']) && (!empty($_SESSION['site_lang']))) {
                                            switch ($_SESSION['site_lang']) {
                                                case 'arabic':
                                                    $name = 'name_ar';
                                                    $description = 'description_ar';
                                                    break;
                                                case 'english':
                                                    $name = 'name_en';
                                                    $description = 'description_en';
                                                    break;
                                                case 'russian':
                                                    $name = 'name_ru';
                                                    $description = 'description_ru';
                                                    break;
                                                default:
                                                    $name = 'name_en';
                                                    $description = 'description_en';
                                                    break;
                                            }
                                        }
                                        foreach ($blogs as $blog) {
                                            if (isset($blog->image) && (!empty($blog->image))) {
                                                $img_url = base_url() . 'uploads/news/' . $blog->image;
                                            } else {
                                                $img_url = base_url() . 'assets_web/img/p-1.jpg';
                                            }
                                            ?>
                                            <li>
                                                <a href="<?= base_url() . 'one_blog/' . base64_encode($blog->id) ?>">
                                                    <div class="singel-post">
                                                        <div class="thum">
                                                            <img src="<?= $img_url ?>" alt="Blog">
                                                        </div>
                                                        <div class="cont">
                                                            <h6><?= $blog->$name ?></h6>
                                                            <span><?=date('y-m-d',strtotime($blog->publish_date))?></span>
                                                        </div>
                                                    </div> <!-- singel post -->
                                                </a>
                                            </li>
                                            <?php
                                        } ?>
                                    </ul>
                                </div> <!-- saidbar post -->
                            </div>
                            <?php
                        } ?>
                    </div> <!-- row -->
                </div> <!-- saidbar -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


<!-- ============================ Agency List End ================================== -->

