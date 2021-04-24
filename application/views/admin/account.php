  <?php
  $id = $this->session->all_userdata();
  if(isset($id['admin_session'])){
?>
 <?php  
    $data = $id['admin_session'];
    $field="id";
    $table="tbl_account";
    foreach ($this->load->model_users->data($data,$field,$table) as  $values) {
         $id= $values->id;
      ?>
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
  <?php } ?>

<?php } ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Account Managemnet</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                      <a data-toggle="modal" data-target="#add_account" class="btn btn-info"><i class="fas fa-plus"></i> Add New Users</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>User FullName</th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="list_employee">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <div class="modal fade" id="add_account">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title addTitle"></h4>
            </div>
              <input type="hidden" name="item_add_id">
            <div class="modal-body addbody">
              
              <label>FULL NAME:</label>
              <input type="text" class="form-comtrol" name="fullname">
              <label>USERNAME:</label>
              <input type="text" class="form-comtrol" name="username">              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="javascript:void(0)" class="btn btn-success update_acc"><i class="fas fa-user-plus"></i> Add User</a>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="change_user">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title addTitle"></h4>
            </div>
              <input type="hidden" name="item_add_id">
            <div class="modal-body addbody">
              <input type="hidden" name="user_change">
              <label>USERNAME:</label>
              <input type="text" class="form-comtrol" name="userChange">
              <label>PASSWORD:</label>
              <input type="text" class="form-comtrol" name="passChange">              
            </div>
            <div class="modal-footer justify-content-between">
              <a href="javascript:void(0)" class="btn btn-block btn-success change_user"><i class="fas fa-edit"></i> UPDATE</a>
            </div>
          </div>
        </div>
      </div>
   

<script type="text/javascript">
  $(document).ready(function () {
    account();
    function account(){
       $.ajax({
          url:'<?=base_url()?>index.php/pages/ajax_account',
          type: 'POST',
          dataType : "JSON",
          error: function() {
              alert('Error Account');
          },
          success: function (data) {
            var html='';
            var name = $('input[name="user_id"]').val();
              for (i=0;i<data.length;i++) {
                  if(data[i].id == name){
                    html += 
                        '<tr>'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+data[i].full_name+'</td>'+
                          '<td>'+data[i].username+'</tds>'+
                          '<td><a class="btn btn-block btn-default" data-toggle="modal" data-target="#change_user"><i class="fas fa-edit"></i> Edit Account Information</a></td>'+
                          '<td>'+
                          '</td>'+
                        '<tr>';
                        $('input[name="userChange"]').val(data[i].username);
                        $('input[name="user_change"]').val(data[i].id);
                  }
                  else{
                    if(data[i].status == '1'){
                      html += 
                        '<tr>'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+data[i].full_name+'</td>'+
                          '<td>'+data[i].username+'</td>'+
                          '<td><a class="btn btn-block btn-info">Active Account</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)"  data-ids="'+data[i].id+'" title="Halt Account" class="btn btn-warning halt_users"><i class="fas fa-times"></i></a> '+
                            '<a href="javascript:void(0)"  data-ids="'+data[i].id+'" data-user="'+data[i].username+'" data-pass="'+data[i].username+'" title="REFRESH PASSWORD INTO USERNAME" class="btn btn-default change_pass"><i class="fas fa-edit"></i> PASSWORD</a>'+
                          '</td>'+
                        '<tr>';
                    }
                    else{
                      html += 
                        '<tr>'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+data[i].full_name+'</td>'+
                          '<td>'+data[i].username+'</td>'+
                          '<td><a style="color:white;" class="btn btn-block btn-warning"><i class="fas fa-times"></i> Not Active</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)" data-ids="'+data[i].id+'" title="Allow User" class="btn btn-success allow_users"><i class="fas fa-check"></i></a> '+
                            '<a href="javascript:void(0)" data-ids="'+data[i].id+'" title="Delete User" class="btn btn-danger delete_user"><i class="fas fa-trash"></i></a>'+
                          '</td>'+
                        '<tr>';
                    }
                  }
                  
               }
               $('.list_employee').html(html);
           }
      });
    }

    $('.list_employee').on('click','.halt_users',function (){ 
      var id = $(this).data('ids');
      var data = '0';
       $.ajax({
          url:'<?=base_url()?>index.php/pages/ajax_halt',
          type: 'POST',
          data:{id:id, data:data},
          dataType : "JSON",
          success: function (data) {
            account();
           }
      });
    });
    $('.list_employee').on('click','.allow_users',function (){ 
      var id = $(this).data('ids');
      var data = '1';
       $.ajax({
          url:'<?=base_url()?>index.php/pages/ajax_halt',
          type: 'POST',
          data:{id:id, data:data},
          dataType : "JSON",
          success: function (data) {
            account();
           }
      });
    });
    $('.list_employee').on('click','.delete_user',function (){ 
      var id = $(this).data('ids');
      var data = 'del';
       $.ajax({
          url:'<?=base_url()?>index.php/pages/ajax_halt',
          type: 'POST',
          data:{id:id, data:data},
          dataType : "JSON",
          success: function (data) {
            account();
           }
      });
    });

    $('.list_employee').on('click','.change_pass',function (){ 
      var user = $(this).data('user');
      var pass = $(this).data('pass');
      var id = $(this).data('ids');      
      $.ajax({
          url:'<?=base_url()?>index.php/pages/update_account',
          type: 'POST',
          data:{user:user, pass:pass, id:id},
          dataType : "JSON",
          success: function (data) {
            account();
            swal("Success!", "New Password is the Account username", "success");
           }
      });
    });
    $('.add_account').click(function (){ 
      var name = $('input[name="fullname"]').val();
      var user = $('input[name="username"]').val();
      $.ajax({
          url:'<?=base_url()?>index.php/pages/add_account',
          type: 'POST',
          data:{name:name, user:user},
          dataType : "JSON",
          success: function (data) {
            account();
            $('input[name="fullname"]').val('');
            $('input[name="username"]').val('');
            $('#add_account').modal('hide');
           }
      });
    });
    
    $('.change_user').click(function (){ 
      var user = $('input[name="userChange"]').val();
      var pass = $('input[name="passChange"]').val();
      var id = $('input[name="user_change"]').val();      
      $.ajax({
          url:'<?=base_url()?>index.php/pages/update_account',
          type: 'POST',
          data:{user:user, pass:pass, id:id},
          dataType : "JSON",
          success: function (data) {
            account();
            $('input[name="userChange"]').val('');
            $('input[name="passChange"]').val('');
            $('#change_user').modal('hide');
            swal("Success!", "Update Username/Password", "success");
           }
      });
    });


});
</script>