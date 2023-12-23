<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-compact flex-column nav-flats" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
            <a href="<?= site_url('Dashboard') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == '' ? "active" : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    <?= translate('The_Main_Page') ?>
                </p>
            </a>
        </li>


        <!--<li class="nav-item has-treeview  <? /*=$this->uri->segment(1) == 'Banners'  ?
            "menu-open " : '' */ ?> ">
            <a href="#" class="nav-link <? /*=$this->uri->segment(1) == 'Banners'  ?
            "active " : '' */ ?> ">
                <i class="nav-icon fas fa-list-ol text-maroon"></i>

                <p>إدارة Banners <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-warning right "></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<? /*=site_url('Banners')*/ ?>"
                       class="nav-link <? /*=$this->uri->segment(1) == 'Banners' && $this->uri->segment(2) == '' ?  "active" : '' */ ?> ">
                        <i class="fas fa-exclamation-circle nav-icon  text-maroon"></i>
                        <p>Banners</p>
                    </a>
                </li>

            </ul>
        </li>-->
        <li class="nav-item has-treeview  <?= $this->uri->segment(1) == 'User' ?
            "menu-open " : '' ?> ">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'User' ?
                "active " : '' ?> ">

                <i class="nav-icon fas fa-users text-warning"></i>
                <p> <?= translate('The_Users') ?> <i class="fas fa-angle-left right "></i>
                    <span class="badge badge-warning right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('User') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'User' && $this->uri->segment(2) == '' ? "active" : '' ?> ">
                        <i class="fas fa-users nav-icon text-info  "></i>
                        <p>
                            <?= translate('Application_Users') ?> <span
                                    class="badge badge-warning right"><?= $this->fungsi->count_users(); ?></span>
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview  <?= $this->uri->segment(1) == 'Config_company' ?
            "menu-open " : '' ?> ">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'Config_company' ?
                "active " : '' ?> ">

                <i class="nav-icon fas fa-cogs text-warning"></i>
                <p> <?= translate('Settings') ?> <i class="fas fa-angle-left right "></i>
                    <span class="badge badge-warning right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('Config_company') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'Config_company' && $this->uri->segment(2) == '' ? "active" : '' ?> ">
                        <i class="fas fa-cogs nav-icon text-info  "></i>
                        <p class="text-success_">
                            <?= translate('Company_Main_Data') ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('About_us_c') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'About_us_c' && $this->uri->segment(2) == '' ? "active" : '' ?> ">
                        <i class="fas fa-cogs nav-icon text-info  "></i>
                        <p class="text-success_">
                            <?= translate('About_Us') ?>
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview  <?= $this->uri->segment(1) == 'Translations' ?
            "menu-open " : '' ?> ">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'Translations' ?
                "active " : '' ?> ">

                <i class="nav-icon fas fa-cogs text-warning"></i>
                <p> <?= translate('Translations') ?> <i class="fas fa-angle-left right "></i>
                    <span class="badge badge-warning right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('Translations/arabic_dashboard') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'Translations' && $this->uri->segment(2) == 'arabic_dashboard' ? "active" : '' ?> ">
                        <i class="fas fa-cogs nav-icon text-info  "></i>
                        <p class="text-success_">
                            <?= translate('Translations_arabic_dashboard') ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('Translations/english_dashboard') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'Translations' && $this->uri->segment(2) == 'english_dashboard' ? "active" : '' ?> ">
                        <i class="fas fa-cogs nav-icon text-info  "></i>
                        <p class="text-success_">
                            <?= translate('Translations_english_dashboard') ?>
                        </p>
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a href="<?/*= site_url('Translations/russian_dashboard') */?>"
                       class="nav-link  <?/*= $this->uri->segment(1) == 'Translations' && $this->uri->segment(2) == 'russian_dashboard' ? "active" : '' */?> ">
                        <i class="fas fa-cogs nav-icon text-info  "></i>
                        <p class="text-success_">
                            <?/*= translate('Translations_russian_dashboard') */?>
                        </p>
                    </a>
                </li>-->

                <li class="nav-item">
                    <a href="<?= site_url('Translations/arabic_web') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'Translations' && $this->uri->segment(2) == 'arabic_web' ? "active" : '' ?> ">
                        <i class="fas fa-cogs nav-icon text-info  "></i>
                        <p class="text-success_">
                            <?= translate('Translations_arabic_web') ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('Translations/english_web') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'Translations' && $this->uri->segment(2) == 'english_web' ? "active" : '' ?> ">
                        <i class="fas fa-cogs nav-icon text-info  "></i>
                        <p class="text-success_">
                            <?= translate('Translations_english_web') ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('Translations/russian_web') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'Translations' && $this->uri->segment(2) == 'russian_web' ? "active" : '' ?> ">
                        <i class="fas fa-cogs nav-icon text-info  "></i>
                        <p class="text-success_">
                            <?= translate('Translations_russian_web') ?>
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('Banners') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'Banners' ? "active" : '' ?> ">
                <i class="nav-icon fas fa-image text-maroon"></i>
                <p><?= translate('Banners') ?></p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('Photos_web_c') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'Photos_web_c' ? "active" : '' ?> ">
                <i class="nav-icon fas fa-images text-maroon"></i>
                <p><?= translate('Photo_album') ?></p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('Video_c') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'Video_c' ? "active" : '' ?> ">
                <i class="nav-icon fas fa-video text-maroon"></i>
                <p><?= translate('Video_album') ?></p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('Jobs_c') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'Jobs_c' ? "active" : '' ?> ">
                <i class="nav-icon fas fa-list-ol text-maroon"></i>
                <p><?= translate('Employment_Management') ?></p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=site_url('Client')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Client' ?  "active" : ''?> ">
                <i class="nav-icon fas fa-users text-success"></i>
                <p><?=translate('Our Partners')?></p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('Team') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'Team' ? "active" : '' ?> ">
                <i class="nav-icon fas fa-users text-success"></i>
                <p><?= translate('Our_Team') ?> </p>
            </a>
        </li>


        <li class="nav-item">
            <a href="<?= site_url('News') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'News' ? "active" : '' ?> ">
                <i class="nav-icon fas fa-list-ol text-success"></i>
                <p><?= translate('News') ?> </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('Project') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'Project' ? "active" : '' ?> ">
                <i class="nav-icon fas fa-list-ol text-success"></i>
                <p><?= translate('Events') ?> </p>
            </a>
        </li>

        <!--  <li class="nav-item">
            <a href="<? /*=site_url('Services')*/ ?>"
               class="nav-link <? /*=$this->uri->segment(1) == 'Services' ?  "active" : '' */ ?> ">
                <i class="nav-icon fas fa-list-ol text-maroon"></i>
                <p>الخدمات</p>
            </a>
        </li>-->
        <!-- <li class="nav-item">
            <a href="<? /*=site_url('Company_stats_c')*/ ?>"
               class="nav-link <? /*=$this->uri->segment(1) == 'Company_stats_c' ?  "active" : '' */ ?> ">
                <i class="nav-icon fas fa-list-ol text-maroon"></i>
                <p> احصائيات الشركة
                </p>
            </a>
        </li>-->
        <!-- <li class="nav-item has-treeview  <? /*=($this->uri->segment(1) == 'jobs' || $this->uri->segment(1) == 'jobs_tasnif'|| $this->uri->segment(1) == 'Products'|| $this->uri->segment(1) == 'Job_sub_c')  ?
            "menu-open " : '' */ ?> ">
            <a href="#" class="nav-link <? /*=($this->uri->segment(1) == 'jobs' || $this->uri->segment(1) == 'jobs_tasnif' || $this->uri->segment(1) == 'Products'|| $this->uri->segment(1) == 'Job_sub_c')  ?
            "active " : '' */ ?> ">
                <i class="nav-icon fas fa-list-ol text-maroon"></i>

                <p>إدارة الأعمال <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-warning right "></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<? /*=site_url('jobs_tasnif')*/ ?>"
                       class="nav-link <? /*=$this->uri->segment(1) == 'jobs_tasnif' && $this->uri->segment(2) == '' ?  "active" : '' */ ?> ">
                        <i class="fas fa-exclamation-circle nav-icon  text-maroon"></i>
                        <p>تصنيف الأعمال</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<? /*=site_url('Job_sub_c')*/ ?>"
                       class="nav-link <? /*=$this->uri->segment(1) == 'Job_sub_c' && $this->uri->segment(2) == '' ?  "active" : '' */ ?> ">
                        <i class="fas fa-exclamation-circle nav-icon  text-maroon"></i>
                        <p>الاعمال</p>
                    </a>
                </li>

            </ul>
        </li>-->
        <!--  <li class="nav-item has-treeview  <? /*=($this->uri->segment(1) == 'Product_sub_c' || $this->uri->segment(1) == 'Products_tasnif'|| $this->uri->segment(1) == 'Products')  ?
            "menu-open " : '' */ ?> ">
            <a href="#" class="nav-link <? /*=($this->uri->segment(1) == 'Product_sub_c' || $this->uri->segment(1) == 'Products_tasnif' || $this->uri->segment(1) == 'Products')  ?
            "active " : '' */ ?> ">
                <i class="nav-icon fas fa-list-ol text-maroon"></i>

                <p>إدارة المنتجات <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-warning right "></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<? /*=site_url('Products_tasnif')*/ ?>"
                       class="nav-link <? /*=$this->uri->segment(1) == 'Products_tasnif' && $this->uri->segment(2) == '' ?  "active" : '' */ ?> ">
                        <i class="fas fa-exclamation-circle nav-icon  text-maroon"></i>
                        <p>تصنيف المنتجات</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<? /*=site_url('Product_sub_c')*/ ?>"
                       class="nav-link <? /*=$this->uri->segment(1) == 'Product_sub_c' && $this->uri->segment(2) == '' ?  "active" : '' */ ?> ">
                        <i class="fas fa-exclamation-circle nav-icon  text-maroon"></i>
                        <p>المنتجات</p>
                    </a>
                </li>

            </ul>
        </li>
   -->
        <li class="nav-item has-treeview  <?= $this->uri->segment(1) == 'Msg' ?
            "menu-open " : '' ?> ">
            <a href="#"
               class="nav-link <?= ($this->uri->segment(1) == 'Msg' || $this->uri->segment(2) == 'msgs_read' || $this->uri->segment(2) == 'msgs') ?
                   "active " : '' ?> ">

                <i class="nav-icon fas fa-envelope text-warning"></i>
                <p> <?= translate('Messages_and_Complaints') ?> <i class="fas fa-angle-left right "></i>
                    <span class="badge badge-warning right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('Msg/msgs') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'Msg' && $this->uri->segment(2) == 'msgs' ? "active" : '' ?> ">
                        <i class="far fa-envelope  nav-icon  text-warning"></i>
                        <p><?= translate('Unread_Messages') ?></p>  <span
                                class="badge badge-warning right"><?php /*$this->fungsi->count_new_msg('reading');*/ ?></span>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('Msg/msgs_read') ?>"
                       class="nav-link  <?= $this->uri->segment(1) == 'Msg' && $this->uri->segment(2) == 'msgs_read' ? "active" : '' ?> ">
                        <i class="far fa-envelope  nav-icon  text-warning"></i>
                        <p><?= translate('Read_Messages') ?></p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('Register') ?>"
               class="nav-link <?= $this->uri->segment(1) == 'Register' ? "active" : '' ?> ">
                <i class="nav-icon fas fa-envelope text-success"></i>
                <p><?= translate('Register_Messages') ?> </p>
            </a>
        </li>

    </ul>
</nav>