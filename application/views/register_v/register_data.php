
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th><?=translate('The_Date_of_Message')?></th>
                        <th> <?=translate('First_name')?></th>
                        <th> <?=translate('Last_name')?></th>
                        <th><?=translate('The_Phone_Number')?></th>
                        <th><?=translate('The_Email_Address')?></th>
                        <th><?=translate('The_Nationality')?></th>
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
                "url": "<?=site_url('Register/get_ajax')?>",
                "type" : "POST",
            },
            "columnDefs" :[
                {
                    "targets":[2,3],
                    "className" : 'text-left'
                },
                {
                    "targets":[3,-1],
                    "className" : 'text-left',
                },
                {
                    "targets":[0,1,5,-1],
                    "orderable" : false,
                },
            ],
            "dom": 'Bfrtip',
            "order" : []
        });
    } );
</script>
