  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="title_process"> </h1>
            <h1 class="btn_button_setup"> </h1>
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
                <h3 class="card-title"><a href="javascript:"></h3>

                <div class="card-tools search_input">
                  
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h1 class="addpo"> </h1>
                <div class="row list_of_installment">
                   
                </div>
                <table class="table table-hover text-nowrap">
                  <thead class="table_head">
                    
                  </thead>
                  <tbody class="list_of_order">
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      

      </div>
    </section>
  </div>


      <div class="modal fade" id="add_po">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Purchase Order</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="suplier_id_order" class="form-control">
              <label>Supliers</label>
              <div class="input-group input-group-sm">
                  <select  name="supplier_id" class="form-control supplier">
               
                  </select>
              </div>
              <label>Item</label>
              <div class="input-group input-group-sm">
                  <select style="width: 65%;" name="item_id_po" class="form-control item_supliers">
               
                  </select>
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat view_product"><i class="fas fa-search"></i> Item</button>
                  </span>
              </div>
              <label>Qty Order</label>
              <input type="text" name="qty_po" class="form-control">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary savepo_order">Save Orders</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="reseller_add_po">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Reseller Pending Order</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="suplier_id_order" class="form-control">
              <label>Reseller Name</label>
              <div class="input-group input-group-sm">
                  <select  name="mysupplier_id" class="form-control">
                      <?php
                        foreach ($this->load->model_users->res_add_order() as $value) {
                          $res = $value->resseller_name;    
                      ?>
                        <option value="<?php echo $res; ?>"><?php echo $res; ?></option>
                      <?php } ?>
                  </select>
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat view_order_po"><i class="fas fa-search"></i> View Order</button>
                  </span>
              </div>
              <label>Item</label>
              <div class="input-group input-group-sm">
                  <input type="search" name="search_item_or" id="search_item_or" class="form-control" placeholder="search item...">
              </div>
              <table class="table table-hover text-nowrap">
                <tbody class="display_item_search">
                  
                </tbody>
              </table>
              <label>Item Orders</label>
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Item Name</th>
                    <th>Qty Order</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="display_item">
                  
                </tbody>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary save_reseller_order">Save Orders</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="deliver_rec">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Item Process</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <select name="type" class="form-control">
                  <option style="background: green:color:white;" value="2">Item Delivery Done</option>
                  <option style="background: orange:color:white;" value="3">Item Cancel Order</option>
              </select>
              <label>Note</label>
              <textarea name="note" class="form-control">
                
              </textarea>
              <label>Date Delivery/Cancel Process</label>
              <input type="date" class="form-control" name="date">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success process_save">Save Process</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="process_po">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Process Purchase Order</h4>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url(); ?>pages/print_po" method="post">
            <div class="modal-body">
               <div class="input-group input-group-sm">
                <input type="hidden" name="po_counter" >
                  <select style="width: 65%;" name="item_id_process" class="form-control item_supliers_po">
               
                  </select>
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat process_po_sup"><i class="fas fa-search"></i> Process</button>
                  </span>
              </div>
              <table class="table table-striped projects">
                <thead>
                  <th>Item</th>
                  <th>Size</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Date-Order</th>
                </thead>
                <tbody class="item_po_res">
                  
                </tbody>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="submit" class="btn btn-primary " target="_blank" value="Save & Print">
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="add_item_po">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Recieve PO & Add Stock item</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <div class="modal-body">
              <input type="hidden" class="suplier_id" name="suplier_id">
              <input type="hidden" name="item_po_id">
              <label>Name of Item</label>
              <h5 class="form-control title_name"></h5>
              <label>Item to Process</label>
              <div class="input-group input-group-sm">
                <select class="form-control img_idss" name="img_idss">
                    
                </select>
              </div> 
              <label>Sales Invoice</label>
              <input type="text" name="si_no" class="form-control">
              <label>Qty Recieve</label>
              <input type="text" name="qty_receive" class="form-control">
              <label>Date Recieve</label>
              <input type="date" name="date_rec" class="form-control">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary rec_po">Recieve P.O</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="records_reason">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <div class="modal-body display_information">
            </div>
          </div>
        </div>
      </div>

  <script type="text/javascript">
  $(document).ready(function () {
    default_btn();
    display_pending_po();
      function display_pending_po(){
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_po_pending',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Display Item');
                   },
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                            html += 
                            '<tr>'+
                              '<td>'+data[i].suplier_name+'</td>'+
                              '<td>'+data[i].po_no+'</td>'+
                              '<td>'+data[i].item+'</td>'+
                              '<td>'+data[i].brand+' '+data[i].color+' '+data[i].size+'</td>'+
                              '<td>'+data[i].date_order+'</td>'+
                              '<td>'+data[i].qty_order+'</td>'+
                              '<td><a href="#" style="color:white;" class="btn btn-warning">Pending!</a></td>'+
                              '<td>'+data[i].qty_recieve+' pc/set</td>'+
                              '<td><a href="javascript:void(0)"data-supl="'+data[i].suplier_id+'" data-qty="'+data[i].qty+'" data-id="'+data[i].ids+'" data-name="'+data[i].item+' '+data[i].brand+' '+data[i].color+' '+data[i].size+'" class="btn btn-info process_rec_po" title="Recieve PO"><i class="fas ion-plus"></i></a></td>'+
                            '</tr>'
                            ;
                          }
                    $('.list_of_order').html(html);
                  }
            });
      }
      function display_pending_po_search(){
         var name = $("input[name='search1']").val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_po_orderSearch',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              error: function() {
                      alert('Error Display PO');
                   },
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                            if(data[i].status == '0'){
                               html += 
                                '<tr>'+
                                  '<td>'+data[i].suplier_name+'</td>'+
                                  '<td>'+data[i].po_no+'</td>'+
                                  '<td>'+data[i].item+'</td>'+
                                  '<td>'+data[i].brand+' '+data[i].color+' '+data[i].size+'</td>'+
                                  '<td>'+data[i].date_order+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="#" style="color:white;" class="btn btn-warning">Pending!</a></td>'+
                                  '<td>'+data[i].qty_recieve+' pc/set</td>'+
                                  '<td><a href="javascript:void(0)" data-supl="'+data[i].suplier_id+'" data-qty="'+data[i].qty+'" data-id="'+data[i].ids+'" data-name="'+data[i].item+' '+data[i].brand+' '+data[i].color+' '+data[i].size+'" data-img_id="'+data[i].img_id+'" class="btn btn-info process_rec_po" title="Recieve PO"><i class="fas ion-plus"></i></a></td>'+
                                '</tr>'
                                ;
                            }        
                          }
                    $('.list_of_order').html(html);
                  }
            });
      }
       $('.list_of_order').on('click','.process_rec_po',function (){
          var id = $(this).data('id');
          var name = $(this).data('name');
          var suplier_id = $(this).data('supl');
          $('.suplier_id').val(suplier_id);
          $('input[name="item_po_id"]').val(id);
          $('#add_item_po').modal('show');
          $('.title_name').html(name);
          $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_item_id',
              type: 'POST',
              dataType : "JSON",
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                        html +=
                          '<option value="'+data[i].img_id+'">'+data[i].name_of_item+' Size:'+data[i].size+'</option>';
                        }
                    $('.img_idss').html(html);
                  }
            });
       });

         $('.rec_po').click(function(){
          var idpo = $("input[name='item_po_id']").val();
          var img_id = $("select[name='img_idss']").val();
          var qty = $("input[name='qty_receive']").val();
          var supl = $("input[name='suplier_id']").val();
          var si_no =$("input[name='si_no']").val();
          var date =$("input[name='date_rec']").val();
          
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_recieve_item',
              type: 'POST',
              data:{idpo:idpo, img_id:img_id, qty:qty, supl:supl, si_no:si_no, date:date},
              dataType : "JSON",
              error: function() {
                     swal("Error!", "Recive Process Halted", "error");
                   },
              success: function (data) {
                  swal("Success!", "Recive Process", "success");
                  display_pending_po();
                  $('#add_item_po').modal('hide');
                  }
            });
            // alert(qty +' '+ idpo +' '+img_id);
       });
       



      function default_btn() {
        display_pending_po();
        $('.list_of_installment').html('');
        var table_head = 
                    '<tr>'+                      
                      '<th>Suplier Name</th>'+
                      '<th>P.O#</th>'+
                      '<th>Item Order</th>'+
                      '<th>Discription</th>'+
                      '<th>Date Order</th>'+
                      '<th>Qty</th>'+
                      '<th>Status</th>'+
                      '<th>Qty Reciev</th>'+
                      '<th>Action</th>'+
                    '</tr>';
        var addpo = 
          '<a style="margin-left: 20px;" href="javascript:void(0)" class="btn btn-info addpo"><i class="fas ion-plus"></i> Add New P.O</a>'+
          '<a style="margin-left: 20px;" href="javascript:void(0)" class="btn btn-success viewpo"><i class="fas fas ion-android-list"></i> Process my P.O</a> ' 
          ;
        var search_input = 
          '<div class="input-group input-group-sm" style="width: 150px;">'+
            '<input type="search" name="search1" id="search1"class="form-control float-right" placeholder="Search here">'+
              '<div class="input-group-append">'+
               '<button type="submit" class="btn btn-default">'+
                  '<i class="fas fa-search"></i>'+
                '</button>'+
              '</div>'+
            '</div>';
           
        $('.search_input').html(search_input);
         $('.addpo').html(addpo);
         var btn_button = 
          '<a href="javascript:void(0)" class="btn btn-info my_order"> <i class="nav-icon fas fa-clock"></i> My Pending Orders</a> <a href="javascript:void(0)" class="btn btn-default my_reseller"> <i class="nav-icon fas fa-clock"></i> Resellers Orders</a> <a href="javascript:void(0)" class="btn btn-default my_history"> <i class="nav-icon fas fa-clock"></i> History</a>';
        $('.btn_button_setup').html(btn_button);
        $('.table_head').html(table_head);
      }

      $('.btn_button_setup').on('click','.my_reseller',function (){
        $('.list_of_installment').html('');
          var table_head = 
                    '<tr>'+     
                      '<th>#</th>'+                 
                      '<th>Reseller Name</th>'+
                      '<th>Item</th>'+
                      '<th>Date</th>'+
                      '<th>Qty </th>'+
                      '<th>Status</th>'+
                      '<th>Action</th>'+
                    '</tr>';
          var addpo = 
          '<a style="margin-left: 20px;" data-toggle="modal"  data-target="#reseller_add_po" class="btn btn-success"><i class="fas ion-plus"></i> Add Resellers Pending Order</a>';

         var btn_button = 
          '<a href="javascript:void(0)" class="btn btn-default my_order"> <i class="nav-icon fas fa-clock"></i> My Pending Orders</a> <a href="javascript:void(0)" class="btn btn-info my_reseller"> <i class="nav-icon fas fa-clock"></i> Resellers Orders</a> <a href="javascript:void(0)" class="btn btn-default my_history"> <i class="nav-icon fas fa-clock"></i> History</a>';
          var search_input = 
          '<div class="input-group input-group-sm" style="width: 150px;">'+
            '<input type="search" name="search2" id="search2" class="form-control float-right" placeholder="Search here2">'+
              '<div class="input-group-append">'+
               '<button type="submit" class="btn btn-default">'+
                  '<i class="fas fa-search"></i>'+
                '</button>'+
              '</div>'+
            '</div>';
           
        $('.search_input').html(search_input);
        $('.btn_button_setup').html(btn_button);
        $('.table_head').html(table_head);
        $('.addpo').html(addpo);
        reseller_order_view();
      });
      $('.btn_button_setup').on('click','.my_history',function (){
        $('.table_head').html('');
        $('.list_of_order').html('');
        var addpo = 
          '<a style="margin-left: 20px;" class="btn btn-success myOrderHis">My Order History</a> <a class="btn btn-default myResOrder">My Resellers Order History</a>';
        $('.addpo').html(addpo);
        var search_input = 
          '<div class="input-group input-group-sm" style="width: 150px;">'+
            '<input type="search" name="search3" id="search3" class="form-control float-right" placeholder="Search here3">'+
              '<div class="input-group-append">'+
               '<button type="submit" class="btn btn-default">'+
                  '<i class="fas fa-search"></i>'+
                '</button>'+
              '</div>'+
            '</div>';  
        $('.search_input').html(search_input);
         var btn_button = 
          '<a href="javascript:void(0)" class="btn btn-default my_order"> <i class="nav-icon fas fa-clock"></i> My Pending Orders</a> <a href="javascript:void(0)" class="btn btn-default my_reseller"> <i class="nav-icon fas fa-clock"></i> Resellers Orders</a> <a href="javascript:void(0)" class="btn btn-info my_history"> <i class="nav-icon fas fa-clock"></i> History</a>';
        $('.btn_button_setup').html(btn_button);
        history_order();
      });
      
       $('.addpo').on('click','.myOrderHis',function (){
         var search_input = 
          '<div class="input-group input-group-sm" style="width: 150px;">'+
            '<input type="search" name="search3" id="search3" class="form-control float-right" placeholder="Search here3">'+
              '<div class="input-group-append">'+
               '<button type="submit" class="btn btn-default">'+
                  '<i class="fas fa-search"></i>'+
                '</button>'+
              '</div>'+
            '</div>';  
        $('.search_input').html(search_input);
        $('.table_head').html('');
        $('.list_of_order').html('');
        var addpo = 
          '<a style="margin-left: 20px;" class="btn btn-success myOrderHis">My Order History</a> <a class="btn btn-default myResOrder">My Resellers Order History</a>';
        $('.addpo').html(addpo);
        history_order();
      });
       
        $('.addpo').on('click','.myResOrder',function (){
        $('.search_input').html('');
        $('.table_head').html('');
        $('.list_of_order').html('');
        var addpo = 
          '<a style="margin-left: 20px;" class="btn btn-default myOrderHis">My Order History</a> <a class="btn btn-success myResOrder">My Resellers Order History</a>';
        $('.addpo').html(addpo);
        res_history_order();
      });
       $('.btn_button_setup').on('click','.my_order',function (){
        default_btn();
      });

       $('.addpo').on('click','.addpo',function (){
        $('#add_po').modal('show'); 
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_suplier_list_po',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Display Item');
                   },
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                            html += 
                            '<option href="javascript:void(0)" class="form-control suplier_op" value="'+data[i].suplier_id+'">'+data[i].suplier_name+'</option>';
                          }
                    $('.supplier').html(html);
                  }
            });
      });

      $('.view_product').click(function(){
           var id = $("select[name='supplier_id']").val();
           $("input[name='suplier_id_order']").val(id);
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_list',
              type: 'POST',
              data:{id:id},
              dataType : "JSON",
              error: function() {
                      alert('Error Display Item');
                   },
              success: function (data) {

                    var html = '';
                    for(i=0; i<data.length; i++){
                            html += 
                            '<option value="'+data[i].id+'">'+data[i].item+' Brand['+data[i].brand+'] size['+data[i].size+'] ₱'+data[i].price+'</option>';
                          }
                    $('.item_supliers').html(html);
                  }
            });
      });

      $('.view_product').click(function(){
           var id = $("select[name='supplier_id']").val();
           $("input[name='suplier_id_order']").val(id);
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_list',
              type: 'POST',
              data:{id:id},
              dataType : "JSON",
              error: function() {
                      alert('Error Display Item');
                   },
              success: function (data) {

                    var html = '';
                    for(i=0; i<data.length; i++){
                            html += 
                            '<option value="'+data[i].id+'">'+data[i].item+' Brand['+data[i].brand+'] size['+data[i].size+'] ₱'+data[i].price+'</option>';
                          }
                    $('.item_supliers').html(html);
                  }
            });
      });

      $('.savepo_order').click(function(){
           var sup_id = $("input[name='suplier_id_order']").val();
           var item_id = $("select[name='item_id_po']").val();
           var qty = $("input[name='qty_po']").val();
    
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_add_po',
              type: 'POST',
              data:{sup_id:sup_id, item_id:item_id, qty:qty},
              dataType : "JSON",
              error: function() {
                      swal("Error Process", "No Qty Field Up", "error");
                   },
              success: function (data) {
                  swal("Success Process", "Next Process go to Process my P.O", "success");
                  $("input[name='suplier_id_order']").val('');
                  $("select[name='item_id_po']").val('');
                  $("input[name='qty_po']").val('');
                  $('#add_po').modal('hide'); 
                }
            });
      });
      $('.addpo').on('click','.viewpo',function (){
      //$('.viewpo').click(function(){
          $('#process_po').modal('show'); 
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_suplier_pro',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      swal("Error Process", "No Qty Field Up", "error");
                   },
              success: function (data) {
                var html = '';
                   for(i=0; i<data.length; i++){
                      html += '<option value="'+data[i].suplier_id+'">'+data[i].suplier_name+'</option>';
                     }
                  $(".item_supliers_po").html(html);         
                }
            });
      });
        $('.process_po_sup').click(function(){   

           var id = $("select[name='item_id_process']").val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_po_process1',
              type: 'POST',
              data:{id:id},
              dataType : "JSON",
              error: function() {
                      swal("Error Process", "No Qty Field Up", "error");
                   },
              success: function (data) {
                  var html = '';
                   for(i=0; i<data.length; i++){
                      html += '<tr>'+
                            '<td>'+data[i].item+'</td>'+
                            '<td>'+data[i].size+'</td>'+
                            '<td>'+data[i].qty_order+'</td>'+
                            '<td>'+data[i].base_price+'</td>'+
                            '<td>'+data[i].date_order+'</td>'+
                           '</tr>' 
                      ;
                  }
                  $(".item_po_res").html(html);         
                }
            });
         });
      po_no();
      function po_no(){
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_get_po',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      swal("Error Process", "", "error");
                   },
              success: function (data) {
                   var html = '';
                    for(i=0; i<data.length; i++){
                            html += ''+data[i].po_counter+'';
                          }
                     $("input[name='po_counter']").val(html);
                  }
            });
      }

       $('.search_input').on('keyup','#search1',function (){
        var search = $("input[id='search1']").val();
            if(search != '')
            {
              display_pending_po_search();
            }
            else
            {
              display_pending_po();
            }
      }); 
       $('.search_input').on('keyup','#search2',function (){
        var search = $("input[id='search2']").val();
            if(search != '')
            {
              resellerSearch_order_view();
            }
            else
            {
              reseller_order_view();
            }
      }); 
       $('.search_input').on('keyup','#search3',function (){
        var search = $("input[id='search3']").val();
            if(search != '')
            {
              historySearch_order();
            }
            else
            {
              history_order();
            }
      }); 
       $('.search_input').on('keyup','#search4',function (){
        var search = $("input[id='search4']").val();
            if(search != '')
            {

              ser_his_search();
            }
            else
            {

              res_his();
            }
      }); 

       function itemn_search_addreq(){
          var name = $('input[name="search_item_or"]').val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_search_order',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              error: function() {
                      alert('Error Display Item');
                   },
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                            html += 
                              '<tr>'+
                                '<td>'+data[i].name_of_item+'</td>'+
                                '<td>'+data[i].qty+'</td>'+
                                '<td><a href="javascript:void(0)" data-item="'+data[i].name_of_item+'" class="btn btn-info add_order"><i class="fas fa-plus"></i> Add</a></td>'+
                              '<tr>'
                            ;
                          }
                    $('.display_item_search').html(html);
                  }
            });
      }
      $('.display_item_search').on('click','.add_order',function (){
        var item = $(this).data('item');
        var name = $('select[name="mysupplier_id"]').val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_res_orderPending',
              type: 'POST',
              data:{item:item, name:name},
              dataType : "JSON",
              success: function (data) {
                  $('.display_item_search').html('');
                  $('.search_item_or').html('');
                  item_res_order();
                }
            });
      });
      
      $('.display_item').on('click','.refresh_order',function (){
          var id = $(this).data('id');
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_qty_refresh',
              type: 'POST',
              data:{id:id},
              dataType : "JSON",
              success: function (data) {
                  item_res_order();
                }
            });
      });
      $('.display_item').on('click','.delete_order_po',function (){
          var item = $(this).data('item');
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_deleteRes',
              type: 'POST',
              data:{item:item},
              dataType : "JSON",
              success: function (data) {
                  item_res_order();
                }
            });
      });
      $('.display_item').on('click','.add_order_confirm',function (){
          var id = $(this).data('id');
          var qty = $('input[name="qty_order"]').val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_qty_res',
              type: 'POST',
              data:{id:id, qty:qty},
              dataType : "JSON",
              error: function() {
                      swal("Error Process!", "Required Qty Input", "error");
                   },
              success: function (data) {
                  item_res_order();
                }
            });
      });
      
       $('.process_save').click(function(){
            var type = $('select[name="type"]').val();
            var note = $('textarea[name="note"]').val();
            var date = $('input[name="date"]').val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/process_checked_order',
              type: 'POST',
              data:{type:type, note:note, date:date},
              dataType : "JSON",
              success: function (data) {
                  swal("Success Process", "Process Success", "success");
                  reseller_order_view();
                  $('#deliver_rec').modal('hide');
                }
            });
      });
      $('.save_reseller_order').click(function(){
            var name = $('select[name="mysupplier_id"]').val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/save_order_res',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              success: function (data) {
                  swal("Success Process", "Save Orders", "success");
                  $('#reseller_add_po').modal('hide');
                  reseller_order_view();
                }
            });
      });
       $('.view_order_po').click(function(){   
          item_res_order();
      });
      function item_res_order(){
          var name = $('select[name="mysupplier_id"]').val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_item_orderDisplay',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                            if(data[i].qty_order == '0'){
                                html += 
                                  '<tr>'+
                                    '<td>'+data[i].item_order+'</td>'+
                                    '<td><input style="width:100%;" type="text" name="qty_order" name="item_order_qty" placeholder="Enter Qty"</td>'+
                                    '<td><a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-success add_order_confirm" title="add qty"><i class="fas fa-plus"></i></a> <a href="javascript:void(0)" data-item="'+data[i].id+'" class="btn btn-danger delete_order_po"><i class="fas fa-trash"></i> </a></td>'+
                                  '<tr>'
                                ;
                            }else{
                               html += 
                                  '<tr>'+
                                    '<td>'+data[i].item_order+'</td>'+
                                    '<td>'+data[i].qty_order+'</td>'+
                                    '<td><a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-warning refresh_order">Refresh</a></td>'+
                                  '<tr>'
                                ;
                            }
                          }
                    $('.display_item').html(html);
                  }
            });
      }

      $('.list_of_order').on('click','.delever_success',function (){
          $('#deliver_rec').modal('show');
      });
       $('.list_of_order').on('click','.checked_chk',function (){
          var id = $(this).data('id');
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_check_res',
              type: 'POST',
              data:{id:id},
              dataType : "JSON",
              success: function (data) {
                    reseller_order_view();
                  }
            });
       
      });

        $('.list_of_order').on('click','.cancel_chk',function (){
          var id = $(this).data('id');
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_cancel_res',
              type: 'POST',
              data:{id:id},
              dataType : "JSON",
              success: function (data) {
                    reseller_order_view();
                  }
            });
       
      });
      function reseller_order_view(){
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_res_order_view',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Display Item');
                   },
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                            if(data[i].chk =='0'){
                               html += 
                                '<tr>'+
                                  '<td><a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-default checked_chk"><i class="fas fa-square text-white"></i></a></td>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="#" style="color:white;" class="btn btn-warning">Pending!</a></td>'+
                                '</tr>'
                                ;
                            }
                            else{
                              html += 
                                '<tr>'+
                                  '<td><a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-success cancel_chk"><i class="fas fa-check"></i></a></td>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="#" style="color:white;" class="btn btn-warning">Pending!</a></td>'+
                                  '<td><a href="javascript:void(0)" class="btn btn-success delever_success"> Process Reseller Order</a> </td>'+
                                '</tr>'
                                ;
                            }
                           
                      }
                    $('.list_of_order').html(html);
                  }
            });
      }
      function resellerSearch_order_view(){
        var name = $("input[name='search2']").val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_res_orderSearch_view',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                        if(data[i].status == '0'){
                          if(data[i].chk =='0'){
                               html += 
                                '<tr>'+
                                  '<td><a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-default checked_chk"><i class="fas fa-square text-white"></i></a></td>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="#" style="color:white;" class="btn btn-warning">Pending!</a></td>'+
                                '</tr>'
                                ;
                            }
                            else{
                              html += 
                                '<tr>'+
                                  '<td><a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-success cancel_chk"><i class="fas fa-check"></i></a></td>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="#" style="color:white;" class="btn btn-warning">Pending!</a></td>'+
                                  '<td><a href="javascript:void(0)" class="btn btn-success delever_success"> Process Reseller Order</a> </td>'+
                                '</tr>'
                                ;
                            }
                        }       
                      }
                    $('.list_of_order').html(html);
                  }
            });
      }


        $('.list_of_installment').on('click','.view_my_history',function (){
          $('.list_of_installment').html('');
           var search_input = 
          '<div class="input-group input-group-sm" style="width: 150px;">'+
            '<input type="search" name="search3" id="search3" class="form-control float-right" placeholder="Search here3">'+
              '<div class="input-group-append">'+
               '<button type="submit" class="btn btn-default">'+
                  '<i class="fas fa-search"></i>'+
                '</button>'+
              '</div>'+
            '</div>';  
        $('.search_input').html(search_input);
          var po = $(this).data('po');
          var table_head = 
                    '<tr>'+                      
                      '<th>Suplier Name</th>'+
                      '<th>P.O#</th>'+
                      '<th>S.I#</th>'+
                      '<th>Item</th>'+
                      '<th>Qty Recieve</th>'+
                      '<th>Date Order</th>'+
                      '<th>Date Recieve</th>'+
                    '</tr>';
        $('.table_head').html(table_head);
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_history_order',
              type: 'POST',
              data:{po:po},
              dataType : "JSON",
              success: function (data) {
                     var html = '';
                    for(i=0; i<data.length; i++){
                           html +=
                           '<tr>'+
                              '<td>'+data[i].suplier_name+'</td>'+
                              '<td>'+data[i].po_no+'</td>'+
                              '<td>'+data[i].si_no+'</td>'+
                              '<td>'+data[i].item+'</td>'+
                              '<td>'+data[i].qty_recieve+'</td>'+
                              '<td>'+data[i].date_order+'</td>'+
                              '<td>'+data[i].date_recieve+'</td>'+
                             
                           '</tr>';
                      }
                    $('.list_of_order').html(html);
                  }
            });
       
      });
      function history_order(){
        $.ajax({
              url:'<?=base_url()?>index.php/pages/history_order_all',
              type: 'POST',
              dataType : "JSON",
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                          html +=
                          '<div class="col-12 col-sm-6 col-md-3">'+
                            '<div class="info-box mb-3">'+
                              '<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file text-success"></i></span>'+
                              '<div class="info-box-content">'+
                                '<span class="info-box-text"><a href="javascript:void(0)" class="view_my_history" data-po="'+data[i].po_no+'">'+data[i].po_no+'</a></span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'     
                          ;
                      }
                    $('.list_of_installment').html(html);
                  }
            });
      }
      function historySearch_order(){
        var name = $('input[name="search3"]').val();
        $.ajax({
              url:'<?=base_url()?>index.php/pages/history_Searchorder_all',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                          html +=
                            '<div class="col-12 col-sm-6 col-md-3">'+
                              '<div class="info-box mb-3">'+
                                '<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file text-success"></i></span>'+
                                '<div class="info-box-content">'+
                                  '<span class="info-box-text"><a href="javascript:void(0)" class="view_my_history" data-po="'+data[i].po_no+'">'+data[i].po_no+'</a></span>'+
                                '</div>'+
                              '</div>'+
                            '</div>'     
                            ;               
                      }
                    $('.list_of_installment').html(html);
                  }
            });
      }
      
      $('.list_of_order').on('click','.records_reason',function (){
          var remarks = $(this).data('remarks');
          $('#records_reason').modal('show');
          var html =
            '<h3>'+remarks+'</h3>';
          $('.display_information').html(html);

      });
      $('.list_of_installment').on('click','.view_res_history',function (){
          var search_input = 
          '<div class="input-group input-group-sm" style="width: 150px;">'+
            '<input type="search" name="search4" id="search4" class="form-control float-right" placeholder="Search here4">'+
              '<div class="input-group-append">'+
               '<button type="submit" class="btn btn-default">'+
                  '<i class="fas fa-search"></i>'+
                '</button>'+
              '</div>'+
              '<input type="hidden" name="name_of_res"'+
            '</div>';  
        $('.search_input').html(search_input);
          $('.list_of_installment').html('');
          var po = $(this).data('po');
          $('input[name="name_of_res"]').val(po);
          var table_head = 
                    '<tr>'+                   
                      '<th>Reseller Name</th>'+
                      '<th>Item</th>'+
                      '<th>Date Ordered</th>'+
                      '<th>Date Delivered</th>'+
                      '<th>Qty </th>'+
                      '<th>Status</th>'+
                    '</tr>';
          $('.table_head').html(table_head);
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_reshistory_order',
              type: 'POST',
              data:{po:po},
              dataType : "JSON",
              success: function (data) {
                     var html = '';
                    for(i=0; i<data.length; i++){
                          if(data[i].status == '2'){
                            html += 
                               '<tr>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].date_deliver+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="javascript:void(0)" data-remarks="'+data[i].remarks+'" class="btn btn-success records_reason"> Delivered</a></td>'+                
                               '</tr>';
                          }
                          else if(data[i].status == '3'){
                              html += 
                               '<tr>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].date_deliver+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="javascript:void(0)" data-remarks="'+data[i].remarks+'" class="btn btn-danger records_reason"> Cancel Order</a></td>'+                
                               '</tr>';
                          }                    
                      }
                    $('.list_of_order').html(html);
                  }
            });
      });
      function res_his(){
        var po = $('input[name="name_of_res"]').val();
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_reshistory_order',
              type: 'POST',
              data:{po:po},
              dataType : "JSON",
              success: function (data) {
                     var html = '';
                    for(i=0; i<data.length; i++){
                          if(data[i].status == '2'){
                            html += 
                               '<tr>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].date_deliver+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="javascript:void(0)" data-remarks="'+data[i].remarks+'" class="btn btn-success records_reason"> Delivered</a></td>'+                
                               '</tr>';
                          }
                          else if(data[i].status == '3'){
                              html += 
                               '<tr>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].date_deliver+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="javascript:void(0)" data-remarks="'+data[i].remarks+'" class="btn btn-danger records_reason"> Cancel Order</a></td>'+                
                               '</tr>';
                          }                    
                      }
                    $('.list_of_order').html(html);
                  }
            });
      }
      function ser_his_search(){
        var po = $('input[name="name_of_res"]').val();
        var name = $('input[name="search4"]').val();
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_SearchHistory_order',
              type: 'POST',
              data:{po:po, name:name},
              dataType : "JSON",
              success: function (data) {
                     var html = '';
                    for(i=0; i<data.length; i++){
                          if(data[i].status == '2'){
                            html += 
                               '<tr>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].date_deliver+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="javascript:void(0)" data-remarks="'+data[i].remarks+'" class="btn btn-success records_reason"> Delivered</a></td>'+                
                               '</tr>';
                          }
                          else if(data[i].status == '3'){
                              html += 
                               '<tr>'+
                                  '<td>'+data[i].resseller_name+'</td>'+
                                  '<td>'+data[i].item_order+'</td>'+
                                  '<td>'+data[i].date+'</td>'+
                                  '<td>'+data[i].date_deliver+'</td>'+
                                  '<td>'+data[i].qty_order+'</td>'+
                                  '<td><a href="javascript:void(0)" data-remarks="'+data[i].remarks+'" class="btn btn-danger records_reason"> Cancel Order</a></td>'+                
                               '</tr>';
                          }                    
                      }
                    $('.list_of_order').html(html);
                  }
            });
      }

      function res_history_order(){
        $.ajax({
              url:'<?=base_url()?>index.php/pages/history_ResOrder_all',
              type: 'POST',
              dataType : "JSON",
              success: function (data) {
                    var html = '';
                    for(i=0; i<data.length; i++){
                          html +=
                          '<div class="col-12 col-sm-6 col-md-3">'+
                            '<div class="info-box mb-3">'+
                              '<span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>'+
                              '<div class="info-box-content">'+
                                '<span class="info-box-text"><a href="javascript:void(0)" class="view_res_history" data-po="'+data[i].resseller_name+'">'+data[i].resseller_name+'</a></span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'     
                          ;
                      }
                    $('.list_of_installment').html(html);
                  }
            });
      }

       $('#search_item_or').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
             itemn_search_addreq();
            }
            else
            {
              $('.display_item_search').html('');
            }
         });

      setInterval(function(){
        po_no();
      }, 2000) 

  });
</script>