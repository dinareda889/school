<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                <div class="float-right">
                    <a href="<?=site_url('Photos_web_c/add_photos')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>
                        <?=translate('Add_a_new_photo_album')?>  </a>
                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"><?=translate('The_date')?> </th>
                        <th class="text-center"><?=translate('Album_title_in_arabic')?></th>
                        <th class="text-center"><?=translate('Album_title_in_english')?></th>
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

                <h4 class="modal-title"><?=translate('details')?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal"><?=translate('close')?>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_load_details(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>Photos_web_c/get_load_details",
            data: {
                id: valu
            },
            success: function(d) {
                $('#details').html(d);
            }
        });
    }
</script>
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
    document.addEventListener('DOMContentLoaded', function () {

        $('#table1').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/<?=$lang?>"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?=site_url('Photos_web_c/get_ajax_photos')?>",
                "type": "POST",
            },
            "columnDefs": [
                {
                    "targets": [0, -1],
                    "orderable": false
                }

            ],
            "order": [],
            "dom": 'Bfrtip',
        });
    });
</script>