<section class="content">

    <div class="container-fluid">

        <?php
        if ($_SESSION['level'] == 1) {

            $display = '';
        } elseif ($_SESSION['level'] == 2) {
            $display = 'none';
        }

        ?>
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3" style="display:<?= $display ?>;">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-user "></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?=translate('The_Users')?></span>
                        <a href="<?= site_url('User') ?>"><span class="info-box-number">
                  <?= $this->fungsi->count_users(); ?>
                </span></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>


            <div class="col-12 col-sm-6 col-md-3" style="display:<?= $display ?>;">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                    <i class="fas fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?=translate('The_New_Messages')?></span>
                        <a href="<?= site_url('Msg/msgs') ?>">
                        <span class="info-box-number">
                        <?=$this->fungsi->count_new_msg('reading');?></span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


            <!-- /.col -->
        </div>



    </div>
</section>


<!------------------------------------------------------------------------------------------------------------------------>
