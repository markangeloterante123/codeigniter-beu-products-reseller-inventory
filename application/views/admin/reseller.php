  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>RESELLERS RECORD</h1>
          </div>      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="javascript:void(0)" class="btn btn-defualt add_suplier"><i class="fas fa-plus"></i> Add Reseller</a> <a class="button_set"></a> <a class="button_home"></a> <a class="button_back"></a></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0 ">
          <div class="row list_reseller">
            <!--ajax-->
          </div>
          <table class="table table-striped projects">
              <thead class="head_title">
                  
              </thead>
              <tbody class="list_suplier">
                  
              </tbody>
          </table>
        </div>
      </div>

    </section>
  </div>


  <div class="modal fade" id="new_suplier">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title title_add"> Add New Suplier</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label>Reseller Name:</label>
                  <input type="text" class="form-control" name="resellername" placeholder="Reseller Name:" required>
              </div>
              <div class="form-group">
                  <label>Location:</label>
                  <input type="text" class="form-control" name="location" placeholder="Location:" required>
              </div>
              <div class="form-group">
                  <label>Contact No.</label>
                  <input type="text"  class="form-control" name="contact" placeholder="Contact" required>
              </div> 
            </div>
            <div class="modal-footer justify-content-between">
              <a href="javascript:void(0)" class="btn btn-success addreseller" >Add Reseller</a>
            </div>
         
          </div>
        </div>
      </div>



      <div class="modal fade" id="seller_cart">
       <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="reseller_carts"></h1>
              <input type="hidden" class="reseller_cart" name="reseller_cart">
              
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
                          <th>Cart No.</th>
                          <th>Item</th>
                          <th>Paid</th>
                          <th>Balance</th>
                          <th>Qty</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody class="reseller_items">
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


  <script type="text/javascript">
  $(document).ready(function () {
     display_item();
     button();
     function button(){
          var button =
          '<a class="btn btn-info reseller_list"><i class="fas fa-cogs"></i> Reseller</a>';
          var head = 
                    '<tr>'+
                      '<th style="width: 20%">Reseller Name:</th>'+
                      '<th style="width: 30%">item</th>'+
                      '<th class="text-center">Total</th>'+
                      '<th style="width: 30%">Balance</th>'+
                      '<th style="width: 10%" class="text-center">Date</th>'+
                      '<th style="width: 15%" class="text-center">Cart No.</th>'+
                  '</tr>'
                ;
          // $('.head_title').html(head);
           $('.button_set').html(button);
           display_item();
           $('.button_home').html('');

        }

    $('.add_suplier').click(function(){
      $('#new_suplier').modal('show');        
    });

    $('.addreseller').click(function(){
      var name = $("input[name='resellername']").val(); 
      var loc = $("input[name='location']").val(); 
      var con = $("input[name='contact']").val(); 
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_add_res',
              type: 'POST',
              data:{name:name, loc:loc, con:con},
              dataType : "JSON",
              error: function() {
                      alert('Error Display Item');
                   },
              success: function (data) {
                  swal("Success!", "Add Reseller", "success");
                  display_item();
                  $('#new_suplier').modal('hide');
                  $("input[name='resellername']").val(''); 
                  $("input[name='location']").val(''); 
                  $("input[name='contact']").val('');               
              }
            });
    });
    $('.button_set').on('click','.reseller_list',function (){
       table();
       data();
        var button =
          '<a class="btn btn-defualt reseller_list"><i class="fas fa-cogs"></i> Reseller</a> <a class="btn btn-info cancel_button"><i class="fas fa-arrow-left"></i> BACK</a>'
          ;
           $('.button_set').html(button);
           $('.list_suplier').html('');
           $('.head_title').html('');
           $('.button_back').html('');
       $('.button_home').html('');
    });

    $('.button_set').on('click','.cancel_button',function (){
      button();
      $('.list_reseller').html('');
    });
    $('.list_reseller').on('click','.view_selling',function (){
      var name = $(this).data('name');
      $('.reseller_carts').html(name);
      $('#seller_cart').modal('show');
      $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_res_item',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              error: function() {
                      alert('Error Display Reseller Cart');
                   },
              success: function (data) {
                var html = '';
                var bal = 0;
                  for(i=0; i<data.length; i++){
                      html += 
                      '<tr>'+
                        '<td>'+data[i].cart_no+'</td>'+
                        '<td>'+data[i].item_discription+'</td>'+
                        '<td>₱ '+data[i].down+'</td>'+
                        '<td>₱ '+data[i].balance+'</td>'+
                        '<td>'+data[i].qty+'</td>'+
                        '<td>'+data[i].date+'</td>'+
                      '</tr>'
                      ;    
                    }
                $('.reseller_items').html(html);
              }
        });  
    });
    function table(){
        var table=
        '<table class="table table-striped projects">'+
              '<thead>'+
                  '<tr>'+
                      '<th>NAME:</th>'+
                      '<th>CONTACT #</th>'+
                      '<th style:width:30%;>ADDRESS</th>'+
                      '<th style="width:8%;" >ACTION</th>'+
                      '<th style="width:20%;"><input  class="form-control form-control-navbar" name="search" id="search" type="search" placeholder="Search Reseller" aria-label="Search"></th>'+
                  '</tr>'+
              '</thead>'+
              '<tbody class="resseler_information">'+                 
              '</tbody>'+
          '</table>';
        $('.list_reseller').html(table);
    }
    function data(){
      $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_res_list',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Erro Display Reseller');
                   },
              success: function (data) {
                var html = '';
                var bal = 0;
                  for(i=0; i<data.length; i++){
                      if(data[i].status == 0){
                         html += 
                        '<tr>'+
                          '<td>'+data[i].resseller_name+'</td>'+
                          '<td>'+data[i].cp_no+'</td>'+
                          '<td>'+data[i].location+'</td>'+
                          '<td colspan="2">'+
                            '<a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-success allowed_to"><i class="fas fa-check"></i> Allow</a> '+
                            '<a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-danger delete_to"><i class="fas fa-trash"></i> Remove</a> '+
                          '</td>'+
                        '</tr>'
                        ;  
                      }
                      else{
                         html += 
                        '<tr>'+
                          '<td>'+data[i].resseller_name+'</td>'+
                          '<td>'+data[i].cp_no+'</td>'+
                          '<td>'+data[i].location+'</td>'+
                          '<td colspan="2">'+
                            '<a href="javascript:void(0)" data-id="'+data[i].id+'" style="color:white;" class="btn btn-warning disallowe_to"><i class="fas fa-times"></i> Disallow</a>'+
                          '</td>'+
                        '</tr>'
                        ;  
                      }
                       
                    }
                $('.resseler_information').html(html);
              }
        });
    }

     $('.list_reseller').on('click','.allowed_to',function (){
          var id = $(this).data('id');
          $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_resller_al',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Reseller Allowed to Transact", "success");     
                }
              }); 
          data();  
        });
     $('.list_reseller').on('click','.disallowe_to',function (){
          var id = $(this).data('id');     
          $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_resller_di',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Reseller Disallow to Transact", "success");  
                }
              }); 
          data();  
        });
      $('.list_reseller').on('click','.delete_to',function (){
          var id = $(this).data('id');     
          $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_resller_del',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Reseller Delete Information", "success");  
                }
              }); 
          data();  
        });

    function data_search(){
      var name = $("input[name='search']").val();
      $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_search_resell',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              error: function() {
                      alert('Erro Display Reseller');
                   },
              success: function (data) {
                var html = '';
                var bal = 0;
                  for(i=0; i<data.length; i++){
                      if(data[i].status == 0){
                         html += 
                        '<tr>'+
                          '<td>'+data[i].resseller_name+'</td>'+
                          '<td>'+data[i].cp_no+'</td>'+
                          '<td>'+data[i].location+'</td>'+
                          '<td colspan="2">'+
                            '<a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-success allowed_to"><i class="fas fa-check"></i> Allow</a> '+
                            '<a href="javascript:void(0)" data-id="'+data[i].id+'" class="btn btn-danger delete_to"><i class="fas fa-trash"></i> Remove</a> '+
                          '</td>'+
                        '</tr>'
                        ;  
                      }
                      else{
                         html += 
                        '<tr>'+
                          '<td>'+data[i].resseller_name+'</td>'+
                          '<td>'+data[i].cp_no+'</td>'+
                          '<td>'+data[i].location+'</td>'+
                          '<td colspan="2">'+
                            '<a href="javascript:void(0)" data-id="'+data[i].id+'" style="color:white;" class="btn btn-warning disallowe_to"><i class="fas fa-times"></i> Disallow</a>'+
                          '</td>'+
                        '</tr>'
                        ;  
                      }                       
                    }
                $('.resseler_information').html(html);
              }
        });
    }


    // $('.list_suplier').on('click','.delete',function (){
    //     var id = $(this).data('id');
    //     $.ajax({
    //           url:'<?=base_url()?>index.php/pages/ajax_delresel',
    //           type: 'POST',
    //           data:{id:id},
    //           dataType : "JSON",
    //           error: function() {
    //                   alert('Error Display Item');
    //                },
    //           success: function (data) {
    //               swal("Success!", "Remove Reseller", "success");
    //               display_item();              
    //           }
    //         });    
    // });

   
    function display_item(){
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_res_list',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Erro Display Reseller');
                   },
              success: function (data) {
                var html = '';
                var bal = 0;
                  for(i=0; i<data.length; i++){
                            html +=
                            '<div class="col-sm-4">'+
                              '<div class="position-relative" style="min-height: 180px;">'+
                              '<img style="margin-left:5px; background:none; margin-bottom:5px;height: 70%; width: 70%;" src="<?php echo base_url(); ?>assets/unnamed.png" alt="Photo 3" class="img-fluid">'+
                              '</div>'+
                              '<label class="btn btn-success" style="margin-left:5px; font-size:22px;">'+data[i].resseller_name+'<a style="border:solid 1px black;" data-res="'+data[i].resseller_name+'" href="javascript:void(0)" class="btn btn-info view_history_resel"> <i class="fas fa-eye"></i> View</a></label>'+
                            '</div>';
                    }
                $('.list_reseller').html(html);
              }
            });
        }

    $('.list_reseller').on('click','.view_history_resel',function (){
        var res = $(this).data('res');
        $('.button_back').html('');
        $('.button_set').html('');
        var home =
        '<a class="btn btn-defualt reseller_list"><i class="fas fa-cogs"></i> Reseller</a> <a class="btn btn-info home_back"><i class="fas fa-arrow-left"></i> Home</a>'
          ;
        $('.button_home').html(home);
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_res_cart',
              type: 'POST',
              data:{res:res},
              dataType : "JSON",
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html +=
                          '<div class="col-12 col-sm-6 col-md-3">'+
                            '<div class="info-box mb-3">'+
                              '<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file text-success"></i></span>'+
                              '<div class="info-box-content">'+
                                '<span class="info-box-text">Receipt No:'+data[i].cart_no+'</span>'+
                                '<span class="info-box-number"><a href="javascript:void(0)" data-cart="'+data[i].cart_no+'" data-res="'+data[i].cost_name+'" class="view_history_file">'+data[i].cost_name+'</a></span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'     
                      ;
                    }
                if(data.length == 0){
                  swal("No records!", "to display.", "warning");
                }    
                $('.list_reseller').html(html);            
              }
            });    
    });
    $('.button_back').on('click','.view_history_resel',function (){
        var res = $(this).data('res');
        $('.button_set').html('');
        $('.button_home').html('');
        var home =
          '<a class="btn btn-defualt reseller_list"><i class="fas fa-cogs"></i> Reseller</a> <a class="btn btn-info home_back"><i class="fas fa-arrow-left"></i> Home</a>';
        $('.button_back').html(home);
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_res_cart',
              type: 'POST',
              data:{res:res},
              dataType : "JSON",
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html +=
                          '<div class="col-12 col-sm-6 col-md-3">'+
                            '<div class="info-box mb-3">'+
                              '<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file text-success"></i></span>'+
                              '<div class="info-box-content">'+
                                '<span class="info-box-text"> Receipt No:'+data[i].cart_no+'</span>'+
                                '<span class="info-box-number"><a href="javascript:void(0)" data-cart="'+data[i].cart_no+'" data-res="'+data[i].cost_name+'" class="view_history_file"> '+data[i].cost_name+'</a></span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'     
                      ;
                    }
                if(data.length == 0){
                  swal("No records!", "to display.", "warning");
                }  
                $('.list_reseller').html(html);        
              }
            });    
    });

    $('.button_home').on('click','.home_back',function (){
        $('.button_home').html('');
        $('.button_back').html('');
         var button =
          '<a class="btn btn-info reseller_list"><i class="fas fa-cogs"></i> Reseller</a>'
          ;
           $('.button_set').html(button);
        display_item();
    });
     $('.button_back').on('click','.home_back',function (){
        $('.button_home').html('');
        $('.button_back').html('');
         var button =
          '<a class="btn btn-info reseller_list"><i class="fas fa-cogs"></i> Reseller</a>'
          ;
           $('.button_set').html(button);
        display_item();
    });


    function list_table(){
          var table = 
                '<table id="example2" class="table table-bordered table-striped">'+
                  '<thead>'+
                    '<tr>'+
                      '<th>#</th>'+
                      '<th>ITEM</th>'+
                      '<th>UNIT-PRICE</th>'+
                      '<th>QTY</th>'+
                      '<th>TOTAL</th>'+
                      '<th>NET</th>'+
                    '</tr>'+
                  '</thead>'+
                  '<tbody class="instal_data">'+ 
                  '</tbody>'+
                '</table>';
          $('.list_reseller').html(table);
       }

     $('.list_reseller').on('click','.view_history_file',function (){
        var cart = $(this).data('cart');
        var res = $(this).data('res');
        $('.button_set').html('');
        $('.button_home').html('');
        var home =
          '<a class="btn btn-defualt reseller_list"><i class="fas fa-cogs"></i> Reseller</a> <a class="btn btn-defualt home_back"><i class="fas fa-arrow-left"></i> Home</a> <a href="javascript:void(0)" data-res="'+res+'" class="btn btn-info view_history_resel"><i class="fas fa-arrow-left"></i> Back to '+res+' Records</a>';
        $('.button_back').html(home);
        list_table();
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_history_sales',
              type: 'POST',
              data:{cart:cart},
              dataType : "JSON",
              error: function() {
                      alert('Error Item Display');
                   },
              success: function (data) {
                var html = '';
                var revenue = 0;
                var name = '';
                var dis = '';
                var num = 0;
                var total = 0;
                var cust = '';
                var pos = '';
                  for(i=0; i<data.length; i++){
                      var num = parseFloat(data[i].net);
                      revenue += num;
                      name = data[i].full_name;
                      dis = data[i].discount;
                      num = data[i].selling_price * data[i].qty;
                      total += parseFloat(num);
                      pos = data[i].cart_no;
                      cust = data[i].cost_name;
                      if(data[i].selling_price == '0'){
                         html += 
                          '<tr>'+
                            '<td>'+(i+1)+'</td>'+
                            '<td>'+data[i].item_discription+'</td>'+
                            '<td></td>'+
                            '<td>'+data[i].qty+'</td>'+
                            '<td></td>'+
                            '<td>REMARKS: FREE</td>'+
                          '</tr>'
                           ;
                      } 
                      else{
                         html += 
                          '<tr>'+
                            '<td>'+(i+1)+'</td>'+
                            '<td>'+data[i].item_discription+'</td>'+
                            '<td>₱ '+data[i].selling_price+'</td>'+
                            '<td>'+data[i].qty+'</td>'+
                            '<td>₱ '+data[i].qty * data[i].selling_price+'</td>'+
                            '<td>₱ '+data[i].net+'</td>'+
                          '</tr>'
                           ;
                      } 
                    }
                  dis2 = '.'+dis;
                  dis3 = parseFloat(dis2);
                  num2 = total * dis3;
                  rev = revenue - num2;
                  var vat = Number((total * 0.12).toFixed(1));;
                  var total2 = total + vat;
                  num4 = Number((rev).toFixed(1));
                  num5 = Number((num2).toFixed(1));
                  html +=
                    '<tr>'+
                      '<td colspan="4"></td>'+
                      '<td>SUB-TOTAL: </td>'+
                      '<td>₱ '+total+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="4"></td>'+
                      '<td>VAT 0.12% : </td>'+
                      '<td>₱ '+vat+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="4"></td>'+
                      '<td>DISCOUNT: </td>'+
                      '<td>₱ '+num5+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="4"></td>'+
                      '<td>TOTAL: </td>'+
                      '<td>₱ '+Number((total2).toFixed(1))+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="4"></td>'+
                      '<td>NET: </td>'+
                      '<td>₱ '+num4+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="4"></td>'+
                      '<td>DATE  '+data[0].date+'</td>'+
                      '<td>NAME: '+cust+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="4"></td>'+
                      '<td><a href="<?php echo base_url(); ?>pages/printRec/print/'+data[0].cart_no+'" class="btn btn-block btn-default" target="_blank"><i class="fas fa-print"></i> Print: POS#:'+data[0].cart_no+'</a> </td>'+
                      '<td>PROCESS BY: '+name+'</td>';
                    '</tr>';
                $('.instal_data').html(html);
              }
            });
    });



     $('.list_reseller').on('keyup','#search',function (){
        var search = $("input[id='search']").val();
            if(search != '')
            {
              data_search();
            }
            else
            {
              data();
            }
      }); 
  });
</script>