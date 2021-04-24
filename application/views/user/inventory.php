  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>INVENTORY</h1>
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
                <a href="<?php echo base_url();?>pages/printInventory" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print Inventory</a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="search" name="search" id="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ITEM</th>
                      <th>SIZE</th>
                      <th>BASE UNIT-PRICE</th>
                      <th>SELLING PRICE</th>
                      <th>STOCK</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody class="item_inventory">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      

      </div>
    </section>
  </div>


  



  <div class="modal fade" id="add_item">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title addTitle"></h4>
            </div>
              <input type="hidden" name="item_add_id">
            <div class="modal-body addbody">
              
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="javascript:void(0)" class="btn btn-success additem"><i class="fas fa-plus"></i> Add Stock</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="edit_option">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title addTitle"></h4>
            </div>
              <input type="hidden" name="item_id_edit">
            <div class="modal-body ">
              
              <a href="javascript:void(0)" class="btn btn-block btn-info " id="edit_picture"><i class="fas fa-image"></i> UPDATE ITEM IMAGES</a>
              <a href="javascript:void(0)" style="color:white" class="btn btn-block btn-warning " id="edit_item_information"><i class="fas fa-edit"></i> EDIT ITEM INFORMATIONS</a>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="item_information">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
             <div class="modal-headers">
              <h3 class="modal-title list_names"></h3>

              <input type="hidden" name="item_id_edit_2">
            </div>
            <div class="modal-body item_setup">
            
            </div>
            <div class="modal-footer justify-content-between button_action">

            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="item_information2">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
             <div class="modal-headers">
              <h3 class="modal-title list_names"></h3>

              <input type="hidden" name="item_id_edit_3">
            </div>
            <div class="modal-body">
              <ul class="products-list product-list-in-card pl-2 pr-2" id="item_img_update">
              
              </ul>

            </div>
            <form action="<?php echo base_url(); ?>pages/new_item_images" method="post" enctype="multipart/form-data" id="upload_form">
              <div style="padding-left: 20px;" class="form-group">
                <input type="hidden" name="item_id_edit_update">
                    <div class="btn btn-default">
                      <input  type="file" id="files" name="files[]" multiple>
                    </div>
                    <input type="submit" class="btn btn-info" value="submit">
                </div> 
              </form> 
            <div class="modal-footer justify-content-between button_action">

            </div>
            
          </div>
        </div>
      </div>

<script type="text/javascript">
  $(document).ready(function () {

    item_display();
    function item_display(){
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_item_inventory',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Cart No.');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                    if(data[i].qty == 0){
                        html +=
                        '<tr>'+
                          '<td>'+data[i].name_of_item+'</td>'+
                          '<td>'+data[i].size+'</td>'+
                          '<td>₱ '+data[i].base_price+'</td>'+
                          '<td>₱ '+data[i].resseller_price+'</td>'+
                          '<td><a class="btn btn-danger">'+data[i].qty+' pc/set</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)" data-head="'+data[i].item_id+'" title="Add-Stock" class="btn btn-success additem" data-id="'+data[i].img_id+'" data-info="'+data[i].name_of_item+' '+data[i].size+'" data-qty="'+data[i].qty+'" data-color="'+data[i].color+'"><i class="fas fa-plus"></i></a> '+
                            '<a href="javascript:void(0)"  title="View Item" class="btn btn-info view_item" data-id="'+data[i].img_id+'"><i class="fas fa-eye"></i></a> '+
                            '<a href="javascript:void(0)"  title="Removed Item" class="btn btn-danger delete_item" data-item="'+data[i].item_id+'" data-variant="'+data[i].variant+'" data-id="'+data[i].img_id+'"><i class="fas fa-times"></i></a> '+
                          '</td>'+
                        '</tr>';
                      }
                    else if(data[i].qty <= 5){
                        html +=
                        '<tr>'+
                          '<td>'+data[i].name_of_item+'</td>'+
                          '<td>'+data[i].size+'</td>'+
                          '<td>₱ '+data[i].base_price+'</td>'+
                          '<td>₱ '+data[i].resseller_price+'</td>'+
                          '<td><a class="btn btn-danger">'+data[i].qty+' pc/set</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)" data-head="'+data[i].item_id+'" title="Add-Stock" class="btn btn-success additem" data-id="'+data[i].img_id+'" data-info="'+data[i].name_of_item+' '+data[i].size+'" data-qty="'+data[i].qty+'" data-color="'+data[i].color+'"><i class="fas fa-plus"></i></a> '+
                            '<a href="javascript:void(0)"  title="View Item" class="btn btn-info view_item" data-id="'+data[i].img_id+'"><i class="fas fa-eye"></i></a> '+
                          '</td>'+
                        '</tr>';
                      }
                      else if(data[i].qty <= 15){
                          html +=
                        '<tr>'+
                          '<td>'+data[i].name_of_item+'</td>'+
                          '<td>'+data[i].size+'</td>'+
                          '<td>₱ '+data[i].base_price+'</td>'+
                          '<td>₱ '+data[i].resseller_price+'</td>'+
                          '<td><a class="btn btn-warning">'+data[i].qty+' pc/set</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)" data-head="'+data[i].item_id+'" title="Add-Stock" class="btn btn-success additem" data-id="'+data[i].img_id+'" data-info="'+data[i].name_of_item+' '+data[i].size+'" data-qty="'+data[i].qty+'" data-color="'+data[i].color+'"><i class="fas fa-plus"></i></a> '+
                            '<a href="javascript:void(0)"  title="View Item" class="btn btn-info view_item" data-id="'+data[i].img_id+'"><i class="fas fa-eye"></i></a> '+
                          '</td>'+
                        '</tr>';
                      }
                      else{
                        html +=
                        '<tr>'+
                          '<td>'+data[i].name_of_item+'</td>'+
                          '<td>'+data[i].size+'</td>'+
                          '<td>₱ '+data[i].base_price+'</td>'+
                          '<td>₱ '+data[i].resseller_price+'</td>'+
                          '<td><a class="btn btn-info">'+data[i].qty+' pc/set</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)" data-head="'+data[i].item_id+'" title="Add-Stock" class="btn btn-success additem" data-id="'+data[i].img_id+'" data-info="'+data[i].name_of_item+' '+data[i].size+'" data-qty="'+data[i].qty+'" data-color="'+data[i].color+'"><i class="fas fa-plus"></i></a> '+
                            '<a href="javascript:void(0)"  title="View Item" class="btn btn-info view_item" data-id="'+data[i].img_id+'"><i class="fas fa-eye"></i></a> '+
                          '</td>'+
                        '</tr>';
                      }
                    }
                $('.item_inventory').html(html);
              }
            });
        }
        function item_display_search(){
           var name = $("input[name='search']").val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_item_search',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              error: function() {
                      alert('Error Cart No.');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                    if(data[i].qty == 0){
                        html +=
                        '<tr>'+
                          '<td>'+data[i].name_of_item+'</td>'+
                          '<td>'+data[i].size+'</td>'+
                          '<td>₱ '+data[i].base_price+'</td>'+
                          '<td>₱ '+data[i].resseller_price+'</td>'+
                          '<td><a class="btn btn-danger">'+data[i].qty+' pc/set</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)" data-head="'+data[i].item_id+'" title="Add-Stock" class="btn btn-success additem" data-id="'+data[i].img_id+'" data-info="'+data[i].name_of_item+' '+data[i].size+'" data-qty="'+data[i].qty+'" data-color="'+data[i].color+'"><i class="fas fa-plus"></i></a> '+
                            '<a href="javascript:void(0)"  title="View Item" class="btn btn-info view_item" data-id="'+data[i].img_id+'"><i class="fas fa-eye"></i></a> '+
                            '<a href="javascript:void(0)"  title="Removed Item" class="btn btn-danger delete_item" data-item="'+data[i].item_id+'" data-variant="'+data[i].variant+'" data-id="'+data[i].img_id+'"><i class="fas fa-times"></i></a> '+
                          '</td>'+
                        '</tr>';
                      }
                    else if(data[i].qty <= 5){
                        html +=
                        '<tr>'+
                          '<td>'+data[i].name_of_item+'</td>'+
                          '<td>'+data[i].size+'</td>'+
                          '<td>₱ '+data[i].base_price+'</td>'+
                          '<td>₱ '+data[i].resseller_price+'</td>'+
                          '<td><a class="btn btn-danger">'+data[i].qty+' pc/set</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)" data-head="'+data[i].item_id+'" title="Add-Stock" class="btn btn-success additem" data-id="'+data[i].img_id+'" data-info="'+data[i].name_of_item+' '+data[i].size+'" data-qty="'+data[i].qty+'" data-color="'+data[i].color+'"><i class="fas fa-plus"></i></a> '+
                            '<a href="javascript:void(0)"  title="View Item" class="btn btn-info view_item" data-id="'+data[i].img_id+'"><i class="fas fa-eye"></i></a> '+
                          '</td>'+
                        '</tr>';
                      }
                      else if(data[i].qty <= 15){
                          html +=
                        '<tr>'+
                          '<td>'+data[i].name_of_item+'</td>'+
                          '<td>'+data[i].size+'</td>'+
                          '<td>₱ '+data[i].base_price+'</td>'+
                          '<td>₱ '+data[i].resseller_price+'</td>'+
                          '<td><a class="btn btn-warning">'+data[i].qty+' pc/set</a></td>'+
                          '<td>'+
                          '<a href="javascript:void(0)" data-head="'+data[i].item_id+'" title="Add-Stock" class="btn btn-success additem" data-id="'+data[i].img_id+'" data-info="'+data[i].name_of_item+' '+data[i].size+'" data-qty="'+data[i].qty+'" data-color="'+data[i].color+'"><i class="fas fa-plus"></i></a> '+
                            '<a href="javascript:void(0)"  title="View Item" class="btn btn-info view_item" data-id="'+data[i].img_id+'"><i class="fas fa-eye"></i></a> '+
                          '</td>'+
                        '</tr>';
                      }
                      else{
                        html +=
                        '<tr>'+
                          '<td>'+data[i].name_of_item+'</td>'+
                          '<td>'+data[i].size+'</td>'+
                          '<td>₱ '+data[i].base_price+'</td>'+
                          '<td>₱ '+data[i].resseller_price+'</td>'+
                          '<td><a class="btn btn-info">'+data[i].qty+' pc/set</a></td>'+
                          '<td>'+
                            '<a href="javascript:void(0)" data-head="'+data[i].item_id+'" title="Add-Stock" class="btn btn-success additem" data-id="'+data[i].img_id+'" data-info="'+data[i].name_of_item+' '+data[i].size+'" data-qty="'+data[i].qty+'" data-color="'+data[i].color+'"><i class="fas fa-plus"></i></a> '+
                            '<a href="javascript:void(0)"  title="View Item" class="btn btn-info view_item" data-id="'+data[i].img_id+'"><i class="fas fa-eye"></i></a> '+
                          '</td>'+
                        '</tr>';
                      }
                    }
                $('.item_inventory').html(html);
              }
            });
        }
        $('.item_inventory').on('click','.edit_item',function (){
          var id = $(this).data('id');
          $("input[name='item_id_edit']").val(id);
          $("input[name='item_id_edit_update']").val(id);
           $('#edit_option').modal('show');
        });
        
        $('.button_action').on('click','.process_back',function (){
          $('#edit_option').modal('show');
          $('#item_information').modal('hide');
          $('#item_information2').modal('hide');
        });
        
         $('#edit_picture').click(function(){
          var id = $("input[name='item_id_edit']").val();
          $("input[name='item_id_edit_3']").val(id);
          $('#edit_option').modal('hide');
          $('#item_information2').modal('show');

           $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_edit_img',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) { 
                  var html = '';
                   var button = 
                  '<a href="javascript:void(0)" class="btn btn-outline-light process_back"><i class="fas fa-arrow-left"></i> Back</a>';

                  for(i=0; i<data.length; i++){
                      html +=
                        '<li class="item">'+
                          '<div style="margin-left:20px;" class="product-img">'+
                            '<img src="<?php echo base_url(); ?>assets/items/'+data[i].image+'" alt="Product Image" style="height:150px; width:150px;">'+
                          '</div>'+
                          '<div class="product-info">'+
                            '<a href="javascript:void(0)" class="product-title">Item Picture '+(i+1)+'</a> '+
                            '<a href="javascript:void(0)"data-id="'+data[i].id+'" class="product-title btn btn-danger delete_img"><i class="fas fa-times"></i> Delete</a>'+
                          '</div>'+
                        '</li>'
                        ;   
                    }
                $('#item_img_update').html(html);
                $('.button_action').html(button);
                }
              }); 
        });
         $('#item_img_update').on('click','.delete_img',function (){
          var id = $(this).data('id');
          $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_delete_img',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Delete Item", "success");
                  $('#edit_option').modal('show');
                  $('#item_information2').modal('hide');
                }
              }); 
        });
        $('#edit_item_information').click(function(){
          var id = $("input[name='item_id_edit']").val();
          $("input[name='item_id_edit_2']").val(id);
          $('#edit_option').modal('hide');
          $('#item_information').modal('show');

           $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_edit_item',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  var html = '';
                  var button = 
                  '<a href="javascript:void(0)" class="btn btn-outline-light process_back"><i class="fas fa-arrow-left"></i> Back</a>'+
                  '<a href="javascript:void(0)" class="btn btn-success confirm_process"><i class="fas fa-arrow-right"></i> Confirm</a>'
                  ;
                  for(i=0; i<data.length; i++){
                      html +=
                        '<label>Base Price</label>'+
                        '<input type="text" name="base_edit_price" class="form-control" value="'+data[i].base_price+'">'+
                        '<label>Reseller Price</label>'+
                        '<input type="text" name="resel_edit_price" class="form-control" value="'+data[i].resseller_price+'">'+
                        '<label>Item Stock</label>'+
                        '<input type="text" name="edit_stock" class="form-control" value="'+data[i].qty+'">'
                        ;   
                    }

                $('.item_setup').html(html);
                $('.button_action').html(button);
                }
              }); 
        });
        $('.button_action').on('click','.confirm_process',function (){
          var id = $("input[name='item_id_edit_2']").val();
          var base = $("input[name='base_edit_price']").val();
          var res = $("input[name='resel_edit_price']").val();
          var qty = $("input[name='edit_stock']").val();
          $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_item_update',
                type: 'post',
                data:{id:id, base:base, res:res, qty:qty},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process!", "Item Update Success", "success");
                  $('#edit_option').modal('show');
                  $('#item_information').modal('hide');
                  item_display();
                }
              }); 
        });

     
         $('.item_inventory').on('click','.delete_item',function (){
          var id = $(this).data('id');
          var variant = $(this).data('variant');
          var item = $(this).data('item');
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_delete_item',
                type: 'post',
                data:{id:id, variant:variant, item:item},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Delete Item", "success");
                  item_display();
                }
              }); 
        });
         $('.item_inventory').on('click','.additem',function (){
          var id = $(this).data('id');
          var qty = $(this).data('qty');
          var info = $(this).data('info');
          var color = $(this).data('color');
          var head = $(this).data('head');
          $('#add_item').modal('show');
          var infor =
            
            '<label>RECEIVE QTY:</label>'+
            '<input type="hidden" class="form-control" name="stock" value="'+qty+'">'+
            '<input type="hidden" class="form-control" name="head" value="'+head+'">'+
            '<input type="text" class="form-control" name="qty_add" placeholder="PCS/SET" required>'+
            '<label>UNIT-PRICE:</label>'+
            '<input type="text" class="form-control" name="price" >'+
            '<label>SUPLIERS</label>'+
            '<input type="search" class="form-control" id="searchadd" name="searchadd" required>'+
            '<div class="product-info list_suppliers_add">'+
              
            '</div>'+
            '<input type="hidden" class="form-control" name="suplier_id_add">'+
            '<label>SALES INVOICE:</label>'+
            '<input type="text" class="form-control" name="sales_invoice" required>'+
            '<label>DATE RECEIVE:</label>'+
            '<input type="date" class="form-control" name="date">'
              ;
          $('.addTitle').html(info);
          $("input[name='item_add_id']").val(id);
          $('.addbody').html(infor);
        });

        function search_supplier_add(){
          var name = $("input[name='searchadd']").val();
          $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_search_sp_ad',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              error: function() {
                      alert('Erro Display Reseller');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                      html +=
                        '<a href="javascript:void(0)" data-suplier="'+data[i].suplier_id+'" data-name="'+data[i].suplier_name+'" class="add_search_name" >'+data[i].suplier_name+'</a> <hr>'
                      ;    
                    }
                $('.list_suppliers_add').html(html);
              }
          });
        }

        $('.item_inventory').on('click','.view_item',function (){
          var img_id = $(this).data('id');
          $('#item_image').modal('show');
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_img_view',
              type: 'POST',
              data:{img_id:img_id},
              dataType : "JSON",
              error: function() {
                      alert('Error image Item');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html += 
                           '<div class="col-sm-6">'+
                              '<img style="border:solid 1px black; border-radius:30px;" class="img-fluid" src="<?php echo base_url(); ?>assets/items/'+data[i].image+'" alt="Photo">'+
                            '</div>'
                           ;
                    }
                $('.item_image').html(html);
              }
            });
        });


        $('.addbody').on('click','.add_search_name',function (){
          var name = $(this).data('name');
          var suplier = $(this).data('suplier');
          $("input[name='suplier_id_add']").val(suplier);
          $("input[name='searchadd']").val(name);
          $('.list_suppliers_add').html('');
        });

        $('.additem').click(function(){
           var price = $("input[name='price']").val();
            var item_id = $("input[name='head']").val();
            var img_id = $("input[name='item_add_id']").val();
            var stock = $("input[name='stock']").val();
            var qty = $("input[name='qty_add']").val();
            var search = $("input[name='searchadd']").val();
            var si = $("input[name='sales_invoice']").val();
            var date = $("input[name='date']").val();
            var name = $("input[name='full_name']").val();
            var sup_id = $("input[name='suplier_id_add']").val();
            
              $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_add_stock',
                type: 'POST',
                data:{item_id:item_id, stock:stock, sup_id:sup_id, qty:qty, price:price, search:search, si:si, img_id:img_id, date:date, name:name},
                dataType : "JSON",
                error: function() {
                        swal("Failed Process!", "Process Termenated", "error");
                     },
                success: function (data) {
                    swal("Success Process!", "Add Stock Success", "success");
                    $('#add_item').modal('hide');
                    item_display();
                }
            });


        });

         $('#search').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
              item_display_search();           
            }
            else
            {
              item_display();
              $("input[name='suplier_id_add']").val('NONE');
            }
         });
         $('.addbody').on('keyup','#searchadd',function (){
            var search = $(this).val();
            if(search != '')
            {
              search_supplier_add();     
            }
            else
            {
              $('.list_suppliers_add').html('none');
            }
         });

  });
</script>