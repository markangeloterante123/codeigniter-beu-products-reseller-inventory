<!--  
 <style type="text/css">
  #resel:hover{
      background:black;
      color:white;
    }
 </style> -->

 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <form class="form-inline ml-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                </div>
              </div>
            </form>  
          </div>
         

        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid ">
         <div class="row">
          <div class="col-8">
              <div class="row item_display">  
                  <!--ajax Display-->
              </div>

            </div>
            <div class="col-4">
              <div class="card">
             <div class="card-body table-responsive p-0">
                      <input type="hidden" name="dis1" value="0">
                      <table class="table table-hover text-nowrap table_body">
                       
                      </table>
                  </div>
                </div>
            </div>
        </div>
      </div>
    
         
   

      </div>
    </section>


    <script type="text/javascript">
  $(document).ready(function () {
        item_tags();
        cart_no();
             

     

        function cart_no(){
           $.ajax({
              url:'<?=base_url()?>index.php/pages/cart_no',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Cart No.');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html += 
                          ''+data[i].counter+''
                           ;
                    }
                $('.cartno').html(html);
                $("input[name='cartno']").val(html);
              }
            });
        }

         function item_tags(){
              var table = 
               '<thead>'+
                  '<tr>'+
                  '<th>ITEM TO PROCESS</th>'+
                  '<th>PRICE</th>'+
                  '<th>ACTION</th>'+
                            
                  '</tr>'+
                  '</thead>'+
                '<tbody class="list_items">'+
                '</tbody>';
              $('.table_body').html(table);
              reseller();

           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_store',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Item Display');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html += 
                           '<div  class="col-md-6">'+
                              '<div class="card card-widget widget-user">'+
                                '<div class="widget-user-header text-white" style=" height: 150px; width:100%; background: url('+'<?php echo base_url(); ?>assets/pic/'+''+data[i].profile+') center center;">'+
                                  '<img style="border:solid 1px black;height:150px; width:150px; border-radius:50%; align-item:center; justify-content:center; display:flex; " src="<?php echo base_url(); ?>assets/pic/'+data[i].profile+'">'+
                                  '<h3 style="color:black" class="widget-user-username text-right">Category: '+data[i].item_name+'</h3>'+
                                  
                                '</div>'+            
                                '<div class="card-footer">'+
                                  '<div class="row">'+
                                    '<div class="col-sm-6 border-right">'+
                                      '<div class="description-block">'+
                                        '<h5 class="description-header">'+data[i].variant+'</h5>'+
                                        '<span class="description-text">Variants</span>'+
                                      '</div>'+
                                    '</div>'+
                                    '<div class="col-sm-6 border-right">'+
                                      '<div class="description-block">'+
                                        '<span class="description-text"><a href="javascript:void(0)" data-id="'+data[i].item_id+'" data-name="'+data[i].item_name+'" class="btn btn-info viewitem"><i class="fas fa-eye"></i> View  '+data[i].item_name+'</a></span>'+
                                      '</div>'+
                                    '</div>'+
                                    
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'
                           ;
                    }
                $('.item_display').html(html);
              }
            });
        }

        function item_search(){
          var name = $("input[name='search']").val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_tag_search',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html += 
                           '<div  class="col-md-6">'+
                              '<div class="card card-widget widget-user">'+
                                '<div class="widget-user-header text-white" style=" height: 150px; width:100%; background: url('+'<?php echo base_url(); ?>assets/pic/'+''+data[i].profile+') center center;">'+
                                  '<img style="border:solid 1px black;height:150px; width:150px; border-radius:50%; align-item:center; justify-content:center; display:flex; " src="<?php echo base_url(); ?>assets/pic/'+data[i].profile+'">'+
                                  '<h3 style="color:black" class="widget-user-username text-right">'+data[i].item_name+'</h3>'+
                                  
                                '</div>'+            
                                '<div class="card-footer">'+
                                  '<div class="row">'+
                                    '<div class="col-sm-6 border-right">'+
                                      '<div class="description-block">'+
                                        '<h5 class="description-header">'+data[i].variant+'</h5>'+
                                        '<span class="description-text">Variants</span>'+
                                      '</div>'+
                                    '</div>'+
                                    '<div class="col-sm-6 border-right">'+
                                      '<div class="description-block">'+
                                        '<span class="description-text"><a href="javascript:void(0)" data-id="'+data[i].item_id+'" data-name="'+data[i].item_name+'" class="btn btn-info viewitem"><i class="fas fa-eye"></i> View  '+data[i].item_name+'</a></span>'+
                                      '</div>'+
                                    '</div>'+
                                    
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'
                           ;
                    }
                $('.item_display').html(html);
              }
            });
        }


   $('.item_display').on('click','.backtopage',function (){
    item_tags();
   });
        $('.item_display').on('click','.viewitem',function (){
          var item_id = $(this).data('id');
          var name = $(this).data('name');


          var html = 
          '<input type="hidden" name="item_ids" value="'+item_id+'">'+
          '<div class="col-12">'+
            '<div class="card">'+
              '<div class="card-header">'+
                '<h3 class="card-title"> <a href="javascript:void(0)" class="btn btn-default backtopage"><i class="fas fa-arrow-left"></i> Back</a> <a class="btn btn-info"><i class="fas fa-file"></i> '+name+'</i></h3>'+
                '<div class="card-tools">'+
                '</div>'+
              '</div>'+
              '<div class="card-body table-responsive p-0">'+
                '<table class="table table-hover text-nowrap">'+
                  '<thead>'+
                    '<tr>'+
                      '<th>#</th>'+
                      '<th>ITEM</th>'+
                      '<th>SIZE</th>'+
                      '<th>BASE-PRICE</th>'+
                      '<th>SELLING PRICE</th>'+
                      '<th>QTY</th>'+
                      '<th>ACTION</th>'+
                    '</tr>'+
                  '</thead>'+
                  '<tbody class="list_item">'+
                    
                  '</tbody>'+
                '</table>'+
              '</div>'+
            '</div>'+
          '</div>'
          ;
          $('.item_display').html(html);
          display_item();
        });

        function display_item(){
          var item_id = $("input[name='item_ids']").val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_item_display',
              type: 'POST',
              data:{item_id:item_id},
              dataType : "JSON",
              error: function() {
                      alert('Error Display Item');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html += 
                            '<tr>'+
                            '<td>'+(i+1)+'</td>'+
                            '<td>'+data[i].name_of_item+'</td>'+
                            '<td>'+data[i].size+'</td>'+
                            '<td>₱ '+data[i].base_price+'</td>'+
                            '<td>₱ '+data[i].resseller_price+'</td>'+
                            '<td>'+data[i].qty+' -pc/set</td>'+
                            '<td>'+
                            '<a href="javascript:void(0)" data-img_id="'+data[i].img_id+'" class="btn btn-info item_img" title="View Item Sample"><i class="fas fa-eye"></i></a>'+' '+
                            '<a href="javascript:void(0)" data-item_id="'+data[i].item_id+'" data-img_id="'+data[i].img_id+'" data-name="'+data[i].name_of_item+' '+data[i].size+'" data-resseller="'+data[i].resseller_price+'" data-base="'+data[i].base_price+'" class="btn btn-success addcart" ><i class="fas fa-plus"></i></a>'+
                            '</td>'+
                            '</tr>'
                           ;
                    }
                $('.list_item').html(html);
              }
            });
        }


        $('.item_display').on('click','.addcart',function (){

          var base = $(this).data('base');
          var item_id = $(this).data('item_id');
          var img_id = $(this).data('img_id');
          var name = $(this).data('name');
          var ressel = $(this).data('resseller');
          var user_id = $("input[name='user_id']").val();
          var user_name = $("input[name='full_name']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_addcart',
              type: 'POST',
              data:{item_id:item_id, img_id:img_id, base:base, name:name,ressel:ressel, user_id:user_id, user_name:user_name },
              dataType : "JSON",
              error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                   },
              success: function (data) {
                  swal("Success!", "Add Item Success", "success");
                  reseller();
              }
            });
        });

        $('.item_display').on('click','.item_img',function (){
          var img_id = $(this).data('img_id');
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
                           
                              '<img  style="border:solid 1px black; border-radius:25px; width:100%; " class="img-fluid" src="<?php echo base_url(); ?>assets/items/'+data[i].image+'" alt="Photo">'                           ;
                    }
                $('.item_image').html(html);
              }
            });
        });

        $('.table_body').on('click','.process_po',function (){
            var html = 
              '<div class="col-12">'+
                '<div class="card">'+
                  '<div class="card-header">'+
                    '<h3 class="card-title"> <a href="javascript:void(0)" class="btn btn-default backtopage"><i class="fas fa-arrow-left"></i> Back</a> <a href="#" class="btn  btn-info"> Point of Sale</a></h3>'+
                    '<div class="card-tools">'+
                    '</div>'+
                  '</div>'+
                  '<div class="card-body table-responsive p-0">'+
                    '<table class="table table-hover text-nowrap">'+
                      '<thead>'+
                        '<tr>'+
                          '<th>#</th>'+
                          '<th>ITEM</th>'+
                          '<th>PRICE</th>'+
                          '<th>QTY</th>'+
                          '<th>ACTION</th>'+
                        '</tr>'+
                      '</thead>'+
                      '<tbody class="list_item_process">'+

                      '</tbody>'+
                    '</table>'+
                  '</div>'+
                '</div>'+
              '</div>'
              ;
              $('.item_display').html(html);
              pos_process();
        });

      function pos_process(){
        side_process();
        to_Process();
      }
      
      function to_Process(){
         var id = $("input[name='user_id']").val();
        
              $.ajax({
                url:'<?=base_url()?>index.php/pages/show_order',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  var html = '';
                  var total = 0;
                  var free = 0;
                  for(i=0; i<data.length; i++){
                      if(data[i].process == 1){
                        if(data[i].g_price == '0'){
                          num = data[i].g_price * data[i].qty;
                          total += parseFloat(num);
                           html += 
                            '<tr>'+
                              '<td>'+(i+1)+'</td>'+
                              '<td>'+data[i].item_discription+'</td>'+
                              // '<td>₱'+data[i].resseller_price+'</td>'+
                              '<td><a class="btn btn-block btn-default">'+data[i].qty+' PC/SET FREE</a></td>'+
                              '<td><a class="btn btn-info"> '+data[i].qty+'<a></td>'+
                              '<td>'+
                                '<a href="javascript:void(0)" data-qty="'+data[i].qty+'" data-resel="'+data[i].resseller_price+'"data-base="'+data[i].base_price+'" data-item_id="'+data[i].item_id+'" data-id="'+data[i].id+'" data-img_id="'+data[i].img_id+'" class="btn btn-warning refreshRetail" title="Refresh Qty Order"><i class="fas fa-times"></i> Cancel</a>'+' '+
                              '</td>'+
                            '</tr>'
                            ;
                        }
                        else{
                          num = data[i].g_price * data[i].qty;
                          total += parseFloat(num);
                           html += 
                            '<tr>'+
                              '<td>'+(i+1)+'</td>'+
                              '<td>'+data[i].item_discription+'</td>'+
                              // '<td>₱'+data[i].resseller_price+'</td>'+
                              '<td><a class="btn btn-block btn-success">  ₱'+data[i].g_price * data[i].qty+'<a></td>'+
                              '<td><a class="btn btn-info"> '+data[i].qty+'</a></td>'+
                              '<td>'+
                                '<a href="javascript:void(0)" data-qty="'+data[i].qty+'" data-resel="'+data[i].resseller_price+'"data-base="'+data[i].base_price+'" data-item_id="'+data[i].item_id+'" data-id="'+data[i].id+'" data-img_id="'+data[i].img_id+'" class="btn btn-warning refreshRetail" title="Refresh Qty Order"><i class="fas fa-times"></i> Cancel</a>'+' '+
                              '</td>'+
                            '</tr>'
                            ;
                        }
                        
                      }
                      else{
                        html += 
                          '<tr>'+
                            '<td>'+(i+1)+'</td>'+
                            '<td>'+data[i].item_discription+'</td>'+
                            '<td>₱ '+data[i].resseller_price+'</td>'+
                            '<td><input type="hidden" name="type" value="Resell"><input type="text"  class="form-control" placeholder="Qty of '+data[i].item_discription+'" name="qty_buy"></td>'+
                            '<td>'+
                              '<a href="javascript:void(0)" data-resel="'+data[i].resseller_price+'" data-id_cart="'+data[i].id+'" data-base="'+data[i].base_price+'" data-item_id="'+data[i].item_id+'" data-detail="'+data[i].item_discription+'" data-id="'+data[i].process_id+'" data-name="'+data[i].process_name+'" data-img_id="'+data[i].img_id+'" class="btn btn-success resel_buy" title="Confirm-Buy"><i class="fas fa-check"></i></a>'+' '+
                              '<a class="btn btn-danger delete" href="javascript:void(0)" data-id="'+data[i].id+'" title="Delete Item"><i class="fas fa-times"></i></a>'+' '+
                              '<a href="javascript:void(0)" data-resel="'+free+'" data-id_cart="'+data[i].id+'" data-base="'+data[i].base_price+'" data-item_id="'+data[i].item_id+'" data-detail="'+data[i].item_discription+'" data-id="'+data[i].process_id+'" data-name="'+data[i].process_name+'" data-img_id="'+data[i].img_id+'" class="btn btn-default resel_buy" title="PROMO">Free</a>'+
                            '</td>'+
                          '</tr>'
                          ;
                      }
                      
                    }

                  var discount = "."+ $('input[name="dis1"]').val();
                  var dis = parseFloat(discount);
                  var vat = Number((total * 0.12).toFixed(1));;
                  var total_dis = total * dis;
                  var total_final = vat + total- total_dis;
                  var disc = Number((total_dis).toFixed(1));
                  var final_tl = Number((total_final).toFixed(1));
                  
                  $('.list_item_process').html(html);
                  $('.price_sales').html('SUB-TOTAL: ₱ '+total);
                  $('.Discount').html('DISCOUNT ' +discount+'%');
                  $('.DiscountPrice').html('DISCOUNTED PRICE: ₱ ' +disc);
                   $('.vat_dis').html('VAT 0.12%: ₱ ' +vat);
                  $('.total_dis').html('TOTAL: ₱ ' +final_tl);

                }
              }); 
      }

      function side_process(){

        var dis = $('input[name="dis1"]').val();
        var table = 
               '<thead>'+
                  '<tr>'+
                  '<th class="btn_point"></th>'+            
                  '</tr>'+
                  '</thead>'+
                  '<tbody>'+
                    '<tr><td class="price_sales">  </td></tr>'+
                    '<tr><td class="Discount"> </td></tr>'+
                    '<tr><td class="DiscountPrice"> </td></tr>'+
                    '<tr><td class="vat_dis"> </td></tr>'+
                    '<tr><td class="total_dis"></td></tr>'+
                    // '<tr><td>Discount: <input type="search" class="form-control " name="discount_prices" id="discount" value="'+dis+'"></td></tr>'+
                    '<tr><td><div class="input-group input-group-sm">'+
                    '<input type="text" class="form-control " name="discount_prices" id="discount" value="'+dis+'">'+
                    '<span class="input-group-append">'+
                    '<button type="button" class="btn btn-info btn-flat discount_btn"> % Discount</button>'+
                  '</span>'+
              '</div></td></tr>'+
                    '<tr><td>Name: <input type="text" class="form-control" name="costumer" ></td></tr>'+
                    '<tr><td><a href="javascript:void(0)" class="btn btn-success confirm_buy_res"><i class="fas fa-check"></i> Process POS Confirm</a></td></tr>'+
                  '</tbody>';
              $('.table_body').html(table);
        var btn_point =
          '<a href="javascript:void(0)" class="btn btn-info retailling">RETAIL</a> <a href="javascript:void(0)" class="btn btn-default reselling"> RE-SELL</a>';
        $('.btn_point').html(btn_point);
      }

       $('.table_body').on('click','.reselling',function (){
         var dis = $('input[name="dis1"]').val();
          var table = 
                 '<thead>'+
                    '<tr>'+
                    '<th class="btn_point"></th>'+            
                    '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                      '<tr><td class="price_sales">  </td></tr>'+
                      '<tr><td class="Discount"> </td></tr>'+
                      '<tr><td class="DiscountPrice"> </td></tr>'+
                      '<tr><td class="vat_dis"> </td></tr>'+
                      '<tr><td class="total_dis"></td></tr>'+
                      // '<tr><td>Discount: <input type="search" class="form-control " name="discount_prices" id="discount" value="'+dis+'"></td></tr>'+
                      '<tr><td><div class="input-group input-group-sm">'+
                      '<input type="text" class="form-control " name="discount_prices" id="discount" value="'+dis+'">'+
                      '<span class="input-group-append">'+
                      '<button type="button" class="btn btn-info btn-flat discount_btn"> % Discount</button>'+
                    '</span>'+
                '</div></td></tr>'+
                      '<tr><td>Name: <select  class="form-control costumer" name="costumer" ></select></td></tr>'+
                      '<tr><td><a href="javascript:void(0)" class="btn btn-success confirm_reseller"><i class="fas fa-check"></i> Process POS Confirm</a></td></tr>'+
                    '</tbody>';
                $('.table_body').html(table);
          var btn_point =
            '<a href="javascript:void(0)" class="btn btn-default retailling">RETAIL</a> <a href="javascript:void(0)" class="btn btn-info reselling"> RE-SELL</a>';
          $('.btn_point').html(btn_point);
          to_Process();

           $.ajax({
                url:'<?=base_url()?>index.php/pages/reseller_list',
                type: 'post',
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  var html = '';
                  for(i=0; i<data.length; i++){
                      html+=
                      '<option value="'+data[i].resseller_name+'">'+data[i].resseller_name+'</option>'
                      ;
                    }
                  $('.costumer').html(html);
                }
              }); 

       });

        $('.table_body').on('click','.retailling',function (){
          pos_process();
        });

       $('.table_body').on('click','.confirm_buy_res',function (){
          var dis = $('input[name="dis1"]').val();
          var user_id = $("input[name='user_id']").val();
          var name = $("input[name='costumer']").val();
          var cart = $("input[name='cartno']").val();
          
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_confirm_buy',
                type: 'post',
                data:{user_id:user_id, name:name, cart:cart, dis:dis},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Process Halted", "error");
                },
                success: function (data) {
                  swal("Success Process", "POS Process Success", "success");
                  item_tags();
                }
              }); 
        });
        $('.table_body').on('click','.confirm_reseller',function (){
          var dis = $('input[name="dis1"]').val();
          var user_id = $("input[name='user_id']").val();
          var name = $("select[name='costumer']").val();
          var cart = $("input[name='cartno']").val();
          
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_confirm_buy',
                type: 'post',
                data:{user_id:user_id, name:name, cart:cart, dis:dis},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Process Halted", "error");
                },
                success: function (data) {
                  swal("Success Process", "POS Process Success", "success");
                  item_tags();
                }
              }); 
        });

      $('.item_display').on('click','.resel_buy',function (){

          var item_id = $(this).data('item_id');
          var img_id = $(this).data('img_id');
          var name = $(this).data('name');
          var id = $(this).data('id');
          var base = $(this).data('base');
          var detail = $(this).data('detail');
          var id_cart = $(this).data('id_cart');
          var price =$(this).data('resel');
          var qty = $("input[name='qty_buy']").val();
          var date = moment();
          var dates = date.format('MMMM D, YYYY');
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_buy_retail',
                type: 'post',
                data:{dates:dates, item_id:item_id, id_cart:id_cart, img_id:img_id,  name:name, id:id, detail:detail, price:price, qty:qty, base:base},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Not Enough Stock or No field inputs", "error");
                  $('[name="qty_buy"]').val("");
                },
                success: function (data) {
                  to_Process();
                }
              }); 
        });
     
        function reseller(){
          var id = $("input[name='user_id']").val();
              $.ajax({
                url:'<?=base_url()?>index.php/pages/show_order',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  var html = '';
                  for(i=0; i<data.length; i++){  
                        html += 
                          '<tr>'+
                            '<td>'+data[i].item_discription+'</td>'+
                            '<td>₱ '+data[i].resseller_price+'</td>'+
                            '<td>'+
                              '<a class="btn btn-danger delete" href="javascript:void(0)" data-id="'+data[i].id+'" title="Delete Item"><i class="fas fa-times"></i></a>'+
                            '</td>'+
                          '</tr>'
                          ;
                          cust = '';
                    }
                  html += '<tr ><td colspan="3"><a href="javascript:void(0)" class="btn btn-success process_po"><i class="fas fa-chheck"></i> Process</a></td></tr>';
                  $('.list_items').html(html);
                  show_reseller_list();
                }
              }); 
        }

         function show_reseller_list(){
              $.ajax({
                url:'<?=base_url()?>index.php/pages/reseller_list',
                type: 'post',
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  var html = '';
                  for(i=0; i<data.length; i++){
                      html+=
                      '<option value="'+data[i].resseller_name+'">'+data[i].resseller_name+'</option>'
                      ;
                    }
                  $('.list_reseller').html(html);
              
                }
              }); 
        }
        $('.list_items').on('click','.deleteRetail',function (){
          var id = $(this).data('id');
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_delItem',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Remove Item Cart", "success");
                  item_retail();
                }
              }); 
        });
        
         $('.item_display').on('click','.delete',function (){
          var id = $(this).data('id');
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_delItem',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Remove Item ", "success");
                  reseller();
                  to_Process();
                }
              }); 
        });
        $('.table_body').on('click','.delete',function (){
          var id = $(this).data('id');
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_delItem',
                type: 'post',
                data:{id:id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Remove Item ", "success");
                  reseller();
                }
              }); 
        });

         $('.item_display').on('click','.refreshRetail',function (){
          var id = $(this).data('id');
          var item_id = $(this).data('item_id');
          var img_id = $(this).data('img_id');
          var qty = $(this).data('qty');
          var base = $(this).data('base');
          var price =$(this).data('resel');
          var date = moment();
          var dates = date.format('MMMM D, YYYY');
          // alert(base +"-"+price);
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_refreshCart',
                type: 'post',
                data:{dates:dates, base:base, price:price, id:id, item_id:item_id, qty:qty, img_id:img_id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Refresh Cart", "success");
                  to_Process();                }
              }); 
        });
        
        $('.list_items').on('click','.refreshSell',function (){
          var id = $(this).data('id');
          var item_id = $(this).data('item_id');
          var img_id = $(this).data('img_id');
          var qty = $(this).data('qty');
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_refreshCart',
                type: 'post',
                data:{id:id, item_id:item_id, qty:qty, img_id:img_id},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                },
                success: function (data) {
                  swal("Success Process", "Refresh Cart", "success");
                  item_retail();
                }
              }); 
        });

        

        $('.list_items').on('click','.retail_buy',function (){
          var item_id = $(this).data('item_id');
          var img_id = $(this).data('img_id');
          var name = $(this).data('name');
          var id = $(this).data('id');
          var base = $(this).data('base');
          var detail = $(this).data('detail');
          var id_cart = $(this).data('id_cart');
          var price = $("input[name='price_buy']").val();
          var qty = $("input[name='qty_buy_item']").val();
          var type = $("input[name='type']").val();
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_buy_retail',
                type: 'post',
                data:{item_id:item_id, id_cart:id_cart, type:type, img_id:img_id, name:name, id:id, detail:detail, price:price, qty:qty, base:base},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Not Enough Stock or No field inputs", "error");
                  $('[name="qty_buy_item"]').val("");
                },
                success: function (data) {
                  swal("Success Process", "", "success");
                  item_retail();
                }
              }); 
        });

        $('.input_cust_name').on('click','.confirm_buy',function (){
          var user_id = $("input[name='user_id']").val();
          var name = $("input[name='costumer']").val();
          var cart = $("input[name='cartno']").val();
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_confirm_buy',
                type: 'post',
                data:{user_id:user_id, name:name, cart:cart},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Process Halted", "error");
                },
                success: function (data) {
                  swal("Success Process", "Buy Process Success", "success");
                  $('#mycart').modal('hide');
                  reseller();
                  item_retail();
                }
              }); 
        });

        
        

        // $('.item_view_again').click(function(){
        //     item_tags();
        // });

        $('#search').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
              item_search();
            }
            else
            {
              item_tags();
            }
         });
        $('.table_body').on('click','.discount_btn',function (){
            var dis = $('input[name="discount_prices"]').val();
            $('input[name="dis1"]').val(dis);
            to_Process();        });

        // $('.item_display').on('keyup','#discount',function (){
        //     var dis = $('input[name="discount_prices"]').val();
        //     $('input[name="dis1"]').val(dis);
        //     to_Process();
        //  });


      setInterval(function(){
        cart_no();
      }, 2000) 
        


});
</script> 

