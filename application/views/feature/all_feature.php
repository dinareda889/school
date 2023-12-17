<div class="content-wrapper" style="min-height: 921px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() . 'Dash' ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">كل الخصائص </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?= $title ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">

                            <div class="col-sm-12">
                                <table id="all_data" class="display example " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">الاسم بالعربية</th>
                                            <th class="text-center">الاسم بالانجليزية</th>
                                            
                                            <th class="text-center">التحكم </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($all_feature) && $all_feature != null) {
                                            $x = 0;
                                            foreach ($all_feature as $record) { ?>

                                        <tr>
                                            <td><?php echo ($x + 1); ?></td>
                                            <td><?php echo $record->title_ar; ?> </td>
                                            <td><?php echo $record->title_en; ?></td>
                                           
                                            
                                            <td>
                                                <a class="btn btn-info btn-sm mr-3 mb-3" href="#" onclick='swal({
                                                            title: "هل انت متأكد من التعديل ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-warning",
                                                            confirmButtonText: "تعديل",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: false
                                                            },
                                                            function(){

                                                            window.location="<?php echo base_url(); ?>feature/Feature_c/update/<?php echo base64_encode($record->id); ?>";
                                                            });'>
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a class="btn btn-danger btn-sm mr-3 mb-3" href="#" onclick='swal({
                                                            title: "تنبيه",
                                                            text: "هل انت متأكد ن الحذف",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-danger",
                                                            confirmButtonText: "حذف",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: false
                                                            },
                                                            function(){
                                                            swal("تم الحذف!", "", "success");
                                                            window.location="<?php echo base_url(); ?>feature/Feature_c/delete/<?php echo base64_encode($record->id); ?>";
                                                            });'>
                                                    <i class="fa fa-trash"> </i>
                                                </a>
                                            </td>


                                        </tr>
                                        <?php $x++;
                                            }
                                        } else {
                                            echo "لا يوجد بنرات ";
                                        } ?>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div>