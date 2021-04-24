

<?php
  $id = $this->session->all_userdata();
  if(isset($id['user_session'])){
?>
 <?php  
    $data = $id['user_session'];
    $field="id";
    $table="tbl_account";
    foreach ($this->load->model_users->data($data,$field,$table) as  $values) {
         $name = $values->full_name;
         $id= $values->id;
         $user = $values->username;
      ?>
        <input type="hidden" name="full_name" value="<?php echo $name; ?>">
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        <input type="hidden" name="user_name" value="<?php echo $user; ?>">
  <?php } ?>

<?php } ?>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="<?php echo base_url(); ?>assets/body/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">Beau Station</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>pages/user/store" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                POS
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>pages/user/history" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                HISTORY
              </p>
            </a>
          </li>
          </li>
          
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>pages/user/inventory" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                INVENTORY
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link update_acc">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>ACCOUNT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>pages/logout" class="nav-link">
                  <i class="fas fa-times nav-icon"></i>
                  <p>SIGN-OUT</p>
                </a>
              </li>
          
        </ul>
      </nav>
    </div>
  </aside>

     <div class="modal fade" id="new_tag">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="<?php echo base_url(); ?>pages/addTags" method="post" enctype="multipart/form-data" id="upload_form">
            <div class="modal-header">
              <h4 class="modal-title">ADD ITEM TAG</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="">
                <div class="form-group">
                  <label>ITEM NAME</label>
                  <input type="textbox" class="form-control" name="name" required>
                </div>

                <div class="form-group">
                  <label>ITEM BRAND</label>
                  <input type="textbox" class="form-control" name="brand" required>
                </div>  
                
                <div class="form-group">
               <!--  <label>Category</label>
                <select name="category" class="form-control">
                  <?php 
                    $data="0";
                    $field="status";
                    $table="tbl_category";
                    foreach ($this->load->model_users->data($data,$field,$table) as  $values) {
                      $categ = $values->category;
                  ?>
                    <option value="<?php echo $categ; ?>"><?php echo $categ ?></option>
                  <?php } ?>
                </select> -->
                 </div>  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">IMAGE</label>
                    <input  type="file" id="image_file" class="form-control" name="image_file"/>
                  </div>  

              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="submit" class="btn btn-primary" value="Save Tags">
            </div>
            </form>
          </div>
        </div>
      </div>

        <div class="modal fade" id="new_items">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="<?php echo base_url(); ?>pages/stock" method="post" enctype="multipart/form-data" id="upload_form">
            <input type="hidden" name="item_id">
            <input type="hidden" name="item_qty">
            <div class="modal-header">
              
              <h4 class="modal-title title_add"> Add New Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body addstock">
              <div class="form-group">
                  <label>ITEM NAME</label>
                  <input type="text" class="form-control" name="name_item"  required>
              </div>
              <!-- <div class="form-group">
                  <label>Item Color Picker:</label>
                  <input type="color" style="height: 35px; width: 25%;" class="form-control"  name="color" value="red" required>
              </div> -->
              <div class="form-group">
                  <label>SIZE:</label>
                  <input type="text" class="form-control" name="size" required>
              </div>
              <div class="form-group">
                  <label>BASE UNIT-PRICE:</label>
                  <input type="text" class="form-control" name="base"  required>
              </div>
              <div class="form-group">
                  <label>SELLING PRICE:</label>
                  <input type="text"  class="form-control" name="seller" required>
              </div>
              <div class="form-group">
                  <label>ITEM QTY:</label>
                  <input type="text"  class="form-control" name="qty" required>
              </div>
               <label>IMAGES:</label>
              <div class="form-group">
                    <div class="btn btn-default">
                      <input type="file" id="files" name="files[]" multiple>
                    </div>
                </div>  

            </div>
            <div class="modal-footer justify-content-between">
              <input type="submit" class="btn btn-success" value="Add New Itemss">
            </div>
            </form>
          </div>
        </div>
      </div>

        <div class="modal fade" id="item_image">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
              <div  class="row mb-3 item_image">
                  <!--ajax here-->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="mycart">
       <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1><i class="fas fa-shopping-cart "></i> Store Cart (<a class="cartno"></a>)</h1>
              <input type="hidden" class="cartno" name="cartno">
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <div class="typeofsales">
              
            </div>
            <div class="modal-body ">
              <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>Item</th>
                          <th>Reseller-Price</th>
                          <th>Sales Type</th>
                          <th>Given Price</th>
                          <th>Qty</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="list_items">
                      <!--ajax here-->    
                      </tbody>
                    </table>
                </div>
              </div>
              <div class="modal-footer input_cust_name">
                
              </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="mycartinstal">
       <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1><i class="fas fa-shopping-cart "></i> Installment Cart (<a class="cartnoInstal"></a>)</h1>
              <input type="hidden" class="cartnoInstal" name="cartnoInstal">
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <div class="typeofsales">
              
            </div>
            <div class="modal-body ">
             <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>Item</th>
                          <th>Reseller-Price</th>
                          <th>Sales Type</th>
                          <th>Given Price</th>
                          <th>DownPayment</th>
                          <th>Qty</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="list_instal">
                      <!--ajax here-->    
                      </tbody>
                    </table>
                  </div>
              </div>
              <div class="modal-footer input_cust_names">
                
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

    $('.update_acc').click(function (){ 
      var username = $('input[name="user_name"]').val();
      var id = $('input[name="user_id"]').val();
      $('input[name="userChange"]').val(username);
      $('input[name="user_change"]').val(id);
      $('#change_user').modal('show');
     });

    $('.change_user').click(function (){ 
      var user = $('input[name="userChange"]').val();
      var pass = $('input[name="passChange"]').val();
      var id = $('input[name="user_change"]').val();     
      $('#change_user').modal('hide');
      $.ajax({
          url:'<?=base_url()?>index.php/pages/update_account',
          type: 'POST',
          data:{user:user, pass:pass, id:id},
          dataType : "JSON",
          success: function (data) {
            $('input[name="userChange"]').val('');
            $('input[name="passChange"]').val('');
            $('#change_user').modal('hide');
            swal("Success!", "Update Username/Password", "success");
           }
      });
    });
 
  });
</script>