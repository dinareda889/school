<style>    .direct-chat-img {        border-radius: 50%;        float: right;        height: 45px;        width: 52px;    }</style><section class="content">    <div class="container-fluid">        <div class="card">            <div class="card-header">                <h3 class="card-title"><?=$title?></h3>                <div class="float-right">                    <a href="<?=site_url('Project/add')?>" class="btn btn-primary btn-flat">                        <i class="fa fa-user-plus"></i>                        <?=translate('add_project')?>  </a>                </div>            </div>            <!-- /.card-header -->            <div class="card-body">                <?php //print_r($all_users->result())                ?>                <table id="table1" class="table table-bordered table-striped">                    <thead>                    <tr>                        <th >#</th>                        <th ><?=translate('image')?> </th>                        <th ><?=translate('name') . translate('arabic')?> </th>                        <th ><?=translate('name') . translate('english')?> </th>                        <th ><?=translate('link') ?> </th>                        <th ><?=translate('action')?></th>                    </tr>                    </thead>                    <tbody>                    </tbody>                </table>            </div>            <!-- /.card-body -->        </div>        <!-- /.card -->    </div></section><div class="modal fade bd-example-modal-lg" id="modal_details">    <div class="modal-dialog modal_details modal-lg">        <div class="modal-content">            <div class="modal-header" style="direction: rtl!important;">                <h4 class="modal-title"><?=translate('details')?></h4>                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                    <span aria-hidden="true">&times;</span>                </button>            </div>            <div class="modal-body"  id="details">            </div>            <div class="modal-footer ">                <button type="button" class="btn btn-danger" data-dismiss="modal"><?=translate('Close')?></button>            </div>        </div>        <!-- /.modal-content -->    </div>    <!-- /.modal-dialog --></div><?phpif ($this->session->has_userdata('set_lang')) {    $set_lang = $this->session->userdata('set_lang');} else {    $set_lang = 'english';}if($set_lang == 'english'){    $lang = 'English.json';}else{    $lang = 'Arabic.json';}?><script>    var dataTable ;    $(document).ready(function() {        dataTable= $('#table1').DataTable({            "language": {                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/<?=$lang?>"            },            "processing": true,            "serverSide": true,            "ajax": {                "url": "<?=site_url('Project/get_ajax')?>",                "type" : "POST",            },            "columnDefs" :[                {                    "targets":[0,1,-1],                    "orderable" : false                }            ],            "order" : [],            "dom": 'Bfrtip',            "buttons": [            ],        });        //dataTable.ajax.reload();  //just reload table    } );</script><script>    function get_load_details(valu) {        $.ajax({            type: 'post',            url: "<?php echo base_url();?>Project/get_load_details",            data: {                id: valu            },            success: function(d) {                $('#details').html(d);            }        });    }</script>