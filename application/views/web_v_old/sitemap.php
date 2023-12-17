<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title"><?=translate_web('Our_Sitemap')?></h2>
                <span class="ipn-subtitle"><?=translate_web('See_Our_Sitemap')?> </span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Blog Start ================================== -->
<section class="Sitemap-section">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10 text-center">
            <div class="sec-heading center">
                <h2><?=translate_web('our_Sitemap')?></h2>
                <p><?=translate_web('A_sitemap_is_a_file_where_you_provide_information_about_the_pages_videos_and_other_files_on_your_site_and_the_relationships_between_them')?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="sitemap-all">
            <nav class="sitemap">
                <ul class="first">
                    <li><a href="<?=base_url()?>"><?=translate_web('Home')?></a>
                        <ul class="second">
                            <li><a href="<?=base_url()?>about_us" target="_blank"><?=translate_web('About')?></a>
                                <ul class="third">
                                    <li><a href="<?=base_url()?>about_us#team"><?=translate_web('Our_Team')?></a></li>
                                    <li><a href="<?=base_url()?>about_us#about-section"><?=translate_web('Mission')?></a></li>
                                    <li><a href="<?=base_url()?>about_us#about-section"><?=translate_web('Vision')?></a></li>
                                    <li><a href="<?=base_url()?>about_us#about-section"><?=translate_web('Goals')?></a></li>
                                </ul>
                            </li>
                            <li><a href="<?=base_url()?>projects" target="_blank"><?=translate_web('Projects')?></a>
                                <ul class="third">
                                    <?php if(isset($projects) && !empty($projects)){
                                        foreach ($projects as $row){ ?>
                                            <li>
                                                <a href="<?=base_url()?>one_project/<?=base64_encode($row->id)?>">
                                                    <?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                                                        echo $row->name_en;
                                                    }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                                                        echo $row->name_ru;
                                                    }else{
                                                        echo $row->name_ar;
                                                    }
                                                    ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }  ?>
                                   <!-- <li><a href="project-details.html">Madain Square</a></li>
                                    <li><a href="project-details.html">Madain Tower</a></li>-->
                                </ul>
                            </li>
                            <li><a href="<?=base_url()?>blogs"><?=translate_web('Blog')?></a>
                                <ul class="third">
                                    <?php if(isset($blogs) && !empty($blogs)){
                                        foreach ($blogs as $row){ ?>
                                            <li>
                                                <a href="<?=base_url()?>one_blog/<?=base64_encode($row->id)?>" target="_blank">
                                                    <?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                                                        echo $row->name_en;
                                                    }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                                                        echo $row->name_ru;
                                                    }else{
                                                        echo $row->name_ar;
                                                    }
                                                    ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }  ?>
                                    <!-- <li><a href="project-details.html">Madain Square</a></li>
                                     <li><a href="project-details.html">Madain Tower</a></li>-->
                                </ul>
                            </li>
                            <li><a href="<?=base_url()?>Careers"><?=translate_web('Careers')?></a>
                                <ul class="third">
                                    <?php if(isset($jobs) && !empty($jobs)){
                                        foreach ($jobs as $row){ ?>
                                            <li>
                                                <a href="<?=base_url()?>one_career/<?=base64_encode($row->id)?>" target="_blank">
                                                    <?php if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {
                                                        echo $row->title_en;
                                                    }elseif($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'russian')){
                                                        echo $row->title_ru;
                                                    }else{
                                                        echo $row->title;
                                                    }
                                                    ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }  ?>
                                    <!-- <li><a href="project-details.html">Madain Square</a></li>
                                     <li><a href="project-details.html">Madain Tower</a></li>-->
                                </ul>
                            </li>
                            <li><a href="<?=base_url()?>contact_us"><?=translate_web('Contact')?></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- ============================ Agency List End ================================== -->

