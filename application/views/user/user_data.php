
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?=translate('Application_management_users')?></h3>
                <div class="float-right">
                    <a href="<?=site_url('User/adduser')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>
                        <?=translate('Add_new_user')?></a>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php //print_r($all_users->result())
                ?>

                <table id="table1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:20px">#</th>
                        <th ><?=translate('user_name')?> </th>
                        <th><?=translate('the_name')?></th>
 <th style="width: 200px;"><?=translate('Action')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    foreach ($all_users->result() as $key => $value){

                        if($value->image){
                            $image =   base_url('uploads/user/'.$value->image);
                        }else{
                            $image =  base_url('uploads/user/defaultuser.png');
                        }

                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td>
                                <div class="user-block">

                                    <img class="img-circle img-bordered-sm" src="<?=$image?>" alt="Product Image" class="img-size-50">
                                    <span class="username">
                          <a href="#"><?=$value->username?></a>

                        </span>

                                </div>
                            </td>
                            <td><?=$value->name?></td>

                            <!--     <td><span style="font-size: 15px;" class="badge badge-success">
<?=$value->level==1 ? 'Admin' :'Employee' ?></span></td>
-->
                            <td class="text-center" width="160px">
                                <form action="<?=site_url('User/del/'.$value->user_id)?>" method="post">
                                    <a href="<?=site_url('User/edit/'.$value->user_id)?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil-alt"></i> <?=translate('update')?> </a>


                                    <input type="hidden" name="user_id" value="<?=$value->user_id?>" >
                                    <button onclick="return confirm('Are You Sure To Delete ?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> <?=translate('delete')?> </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }

                    ?>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    </div>
</section>


<script>
    $(document).ready(function () {
        $('#table1').DataTable({

            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json"
            },
            "dom": 'Bfrtip',


        });
    });


</script>