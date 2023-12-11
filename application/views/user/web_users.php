<!--
<style>.dt-buttons {
        float: left !important;
    }
    div.dataTables_wrapper div.dataTables_length label {
        font-weight: normal;
        text-align: left;
        white-space: nowrap;
        float: right;
    }div.dataTables_wrapper div.dataTables_filter label {
         font-weight: normal;
         white-space: nowrap;
         float: left;
     }.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
          border-top-left-radius: 0;
          border-bottom-left-radius: 0;
          margin-left: 5px;
      }

    div.dataTables_wrapper div.dataTables_info {
        padding-top: 0.85em;
        white-space: nowrap;
        float: right;
    }
</style>

-->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-danger">قائمة مستخدمي التطبيق الغير نشطين</h3>
                <div class="float-right">
                    <a href="<?=site_url('User/adduserApp')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>
                        إنشاء مستخدم للتطبيق</a>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php //print_r($all_users->result())
                ?>

                <table id="table1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>

                        <th>إسم المستخدم </th>
                        <th>الجوال</th>
                        <th>الإيميل</th>
                        <!--<th>Price</th>
                        <th>Area</th>
                      <th>Active</th>-->
                        <th>المدينة - الحي </th>
                        <th>الإجراء</th>
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


<script>
    $(document).ready(function() {
        $('#table1').DataTable({ "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?=site_url('User/get_ajax_not')?>",
                "type" : "POST",
            },
            "columnDefs" :[
                {
                    "targets":[2,3],
                    "className" : 'text-left'

                },
                {
                    "targets":[3,-1],
                    "className" : 'text-left'

                },
                {
                    "targets":[0,3,-1],
                    "orderable" : false

                }
            ],
            "order" : [],
            "dom": 'Bfrtip',
            "buttons": [
                { "extend": 'excel', "text": ' شيت اكسيل' },
                { "extend": 'copy', "text": 'نسخ' }
            ],
        });
    } );

</script>