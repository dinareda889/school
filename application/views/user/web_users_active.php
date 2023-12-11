
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-success">قائمة مستخدمي التطبيق النشطين</h3>
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
                "url": "<?=site_url('User/get_ajax_yes')?>",
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


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Sms</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group" style="display: ;">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> رقم الجوال</label>
                        <input type="text"  class="form-control" id="phone" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> الرسالة</label>
                        <textarea class="form-control" id="message2"></textarea>
                    </div>

                    <button type="button" data-dismiss="modal" onclick="send_sms()"class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span>ارسال </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> اغلاق</button>

            </div>
        </div>
    </div>
</div>
</div>

<script>
    function get_phone(valu)
    {
        $('#phone').val(valu);

    }
</script>

<script>

    function send_sms()
    {
        var phone= $('#phone').val();
        var message=$('#message2').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>User/send_sms",
            data: {phone: phone, message: message},
            success: function (d) {

                alert("تم ارسال الرساله ");
            }

        });
    }

</script>

