
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                <div class="float-right">
                    <a href="<?=site_url('Jobs_c/add_jobs')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>
                        <?=translate('Employment_management')?> </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"><?=translate('The_Date')?></th>
                        <th class="text-center"><?=translate('Job_title_in_Arabic')?></th>
                        <th class="text-center"><?=translate('Job_title_in_English')?></th>
                        <th class="text-center"><?=translate('Job_title_in_Russian')?></th>
                        <th class="text-center"><?=translate('Action')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>
<div class="modal fade bd-example-modal-lg" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog modal_details modal-lg" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header" style="direction: rtl!important;">

                <h4 class="modal-title"><?=translate('Details')?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal"><?=translate('Close')?>
                </button>
            </div>
        </div>
    </div>
</div>
<?php
if ($this->session->has_userdata('set_lang')) {
    $set_lang = $this->session->userdata('set_lang');
} else {
    $set_lang = 'english';
}
if($set_lang == 'english'){
    $lang = 'English.json';
}else{
    $lang = 'Arabic.json';
}
?>
<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/<?=$lang?>"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?=site_url('Jobs_c/get_ajax_jobs')?>",
                "type" : "POST",
            },
            "columnDefs" :[
                {
                    "targets":[0,-1],
                    "orderable" : false
                }
            ],
            "order" : [],
            "dom": 'Bfrtip',
        });
    } );
</script>
<script>
    function get_load_details(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>Jobs_c/get_load_details",
            data: {
                id: valu
            },
            success: function(d) {
                $('#details').html(d);
            }
        });
    }
</script>