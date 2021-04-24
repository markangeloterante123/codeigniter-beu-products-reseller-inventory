<!--  
 <style type="text/css">
  #resel:hover{
      background:black;
      color:white;
    }
 </style> -->


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0)" class="item_cart"><h1><i class="fas fa-shopping-cart "></i> Installment Cart</h1></a></li>
            </ol>
             
          </div>

        </div>
      </div>
    </section>

    <section class="content">

      <div class="container-fluid ">
        <div class="row item_display">  
            <!--ajax Display-->
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
                $('.cartnoInstal').html(html);
                $("input[name='cartnoInstal']").val(html);
              }
            });
        }

         function item_tags(){
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
                           '<div class="col-md-4">'+
                              '<div class="card card-widget widget-user">'+
                                '<div class="widget-user-header text-white" style=" height: 150px; width:100%; background: url('+'<?php echo base_url(); ?>assets/pic/'+''+data[i].profile+') center center;">'+
                                  '<img style="border:solid 1px black;height:150px; width:150px; border-radius:50%; align-item:center; justify-content:center; display:flex; " src="<?php echo base_url(); ?>assets/pic/'+data[i].profile+'">'+
                                  '<h3 style="color:black" class="widget-user-username text-right">'+data[i].item_name+' Brand: '+data[i].item_brand+'</h3>'+
                                  
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
                                        '<span class="description-text"><a href="javascript:void(0)" data-id="'+data[i].item_id+'" data-name="'+data[i].item_name+' ['+data[i].item_brand+']" class="btn btn-info viewitem"><i class="fas ion-eye"></i> View</a></span>'+
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
              error: function() {
                      alert('Error Item Search Display');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html += 
                           '<div class="col-md-4">'+
                              '<div class="card card-widget widget-user">'+
                                '<div class="widget-user-header text-white" style=" height: 150px; width:100%; background: url('+'<?php echo base_url(); ?>assets/pic/'+''+data[i].profile+') center center;">'+
                                  '<img style="border:solid 1px black;height:150px; width:150px; border-radius:50%; align-item:center; justify-content:center; display:flex; " src="<?php echo base_url(); ?>assets/pic/'+data[i].profile+'">'+
                                  '<h3 style="color:black" class="widget-user-username text-right">'+data[i].item_name+' Brand: '+data[i].item_brand+'</h3>'+
                                  
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
                                        '<span class="description-text"><a href="javascript:void(0)" data-id="'+data[i].item_id+'" data-name="'+data[i].item_name+' ['+data[i].item_brand+']" class="btn btn-info viewitem"><i class="fas ion-eye"></i> View</a></span>'+
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

        $('.item_display').on('click','.viewitem',function (){
          var item_id = $(this).data('id');
          var name = $(this).data('name');

          var html = 
          '<input type="hidden" name="item_ids" value="'+item_id+'">'+
          '<div class="col-12">'+
            '<div class="card">'+
              '<div class="card-header">'+
                '<h3 class="card-title">Available and Stock for:'+name+'</h3>'+
                '<div class="card-tools">'+
                '</div>'+
              '</div>'+
              '<div class="card-body table-responsive p-0">'+
                '<table class="table table-hover text-nowrap">'+
                  '<thead>'+
                    '<tr>'+
                      '<th>No.</th>'+
                      '<th>Item</th>'+
                      '<th>Brand</th>'+
                      '<th>Size</th>'+
                      '<th>Color</th>'+
                      '<th>Based Price</th>'+
                      '<th>Resseller Price</th>'+
                      '<th>Qty</th>'+
                      '<th>Action</th>'+
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
                            '<td>'+data[i].item_name+'</td>'+
                            '<td>'+data[i].item_brand+'</td>'+
                            '<td>'+data[i].size+'</td>'+
                            '<td style="background:'+data[i].color+'"></td>'+
                            '<td>₱ '+data[i].base_price+'</td>'+
                            '<td>₱ '+data[i].resseller_price+'</td>'+
                            '<td>'+data[i].qty+' -pc/set</td>'+
                            '<td>'+
                            '<a href="javascript:void(0)" data-img_id="'+data[i].img_id+'" class="btn btn-info item_img" title="View Item Sample"><i class="fas ion-eye"></i></a>'+' '+
                            '<a href="javascript:void(0)" data-item_id="'+data[i].item_id+'" data-img_id="'+data[i].img_id+'" data-name="'+data[i].item_name+' '+data[i].item_brand+' '+data[i].size+' Base Price: '+data[i].base_price+'" data-color="'+data[i].color+'" data-resseller="'+data[i].resseller_price+'" data-base="'+data[i].base_price+'" class="btn btn-success addcart" title="Add-Cart"><i class="fas fa-shopping-cart"></i></a>'+
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
          var color = $(this).data('color');
          var ressel = $(this).data('resseller');
          var user_id = $("input[name='user_id']").val();
          var user_name = $("input[name='full_name']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_addcart',
              type: 'POST',
              data:{item_id:item_id, img_id:img_id, base:base, name:name, color:color, ressel:ressel, user_id:user_id, user_name:user_name },
              dataType : "JSON",
              error: function() {
                  swal("Error Process!", "Item Process Halt", "error");
                   },
              success: function (data) {
                  swal("Add Cart Item Success!", "Click ok to proceed", "success");
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
                           '<div class="col-sm-6">'+
                              '<img style="border:solid 1px black; border-radius:30px;" class="img-fluid" src="<?php echo base_url(); ?>assets/items/'+data[i].image+'" alt="Photo">'+
                            '</div>'
                           ;
                    }
                $('.item_image').html(html);
              }
            });
        });

        $('.item_cart').click(function(){
            $('#mycartinstal').modal('show');
            var id = $("input[name='user_id']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/show_order_start',
              type: 'POST',
              data:{id:id},
              dataType : "JSON",
              error: function() {
                      alert('Error image Item');
                   },
              success: function (data) {
               
                  for(i=0; i<data.length; i++){
                      if(data[0].process == '1'){
                        if(data[0].type == 'Retail'){
                            item_retail();
                        }
                        else{
                            reseller();
                        }
                      }
                      else{
                        item_retail();
                      }
                    }
              }
            });
              
        });

        $('.typeofsales').on('click','.reseller',function (){
            reseller();
        });
        $('.typeofsales').on('click','.retail',function (){
            item_retail();
        });

        function item_retail(){
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
                  var ressel = '<a style="width: 25%;" id="resel" href="javascript:void(0)" class="btn btn-success reseller"><h2><i class="fas ion-social-dropbox"></i> Re-Seller</h2></a>';
                  var cust ='<input type="text" style="width: 25%;" class="form-control" name="cust_name" id="cust_name" placeholder="Costumer Names!">'+
                    '<a href="javascript:void(0)" class="btn btn-success confirm_instal"><i class="fas ion-bag"></i> Confirm</a>';
                  for(i=0; i<data.length; i++){
                      if(data[i].process == 1){
                          html += 
                            '<tr>'+
                              '<td>'+data[i].item_discription+' pesos </td>'+
                              '<td style="background:'+data[i].color+'"></td>'+
                              '<td>₱'+data[i].resseller_price+'</td>'+
                              '<td><a class="btn btn-info"><i class="fas ion-android-playstore"></i> Retail</a></td>'+
                              '<td><a class="btn btn-success"> <i class="fas ion-android-checkbox"></i> ₱'+data[i].g_price * data[i].qty+' ['+data[i].g_price+'] <a></td>'+
                              '<td><a class="btn btn-warning" title="Installment"> <i class="fas ion-bag"></i> '+data[i].down+'<a>'+' '+
                               '<a class="btn btn-danger" title="Balance"> <i class="fas ion-bag"></i> -'+data[i].bal +'<a>'+
                              '</td>'+
                              '<td><a class="btn btn-info"> <i class="fas ion-android-checkbox"></i> '+data[i].qty+'<a></td>'+
                              '<td>'+
                                '<a href="javascript:void(0)" data-qty="'+data[i].qty+'" data-item_id="'+data[i].item_id+'" data-id="'+data[i].id+'" data-img_id="'+data[i].img_id+'" class="btn btn-warning refreshSell" title="Refresh Order"><i class="fas ion-android-refresh"></i></a>'+' '+
                              '</td>'+
                            '</tr>'
                            ;
                            ressel ='';
                      }
                      else{
                          html += 
                            '<tr>'+
                              '<td>'+data[i].item_discription+' pesos </td>'+
                              '<td style="background:'+data[i].color+'"></td>'+
                              '<td>₱'+data[i].resseller_price+'</td>'+
                              '<td><a class="btn btn-info"><i class="fas ion-android-playstore"></i> Retail</a></td>'+
                              '<td><input type="hidden" name="type" value="Retail"><input type="text"  class="form-control" placeholder="price" name="price_buy"></td>'+
                              '<td><input type="text"  class="form-control" placeholder="Down" name="downpayment"></td>'+
                              '<td><input type="text"  class="form-control" placeholder="qty" name="qty_buy_item"></td>'+
                              '<td>'+
                                '<a href="javascript:void(0)" data-id_cart="'+data[i].id+'" data-base="'+data[i].base_price+'" data-item_id="'+data[i].item_id+'" data-detail="'+data[i].item_discription+'" data-id="'+data[i].process_id+'" data-name="'+data[i].process_name+'" data-img_id="'+data[i].img_id+'" class="btn btn-success retail_instal" title="Confirm-Buy"><i class="fas ion-android-playstore"></i></a>'+' '+
                                '<a class="btn btn-danger deleteRetail" href="javascript:void(0)" data-id="'+data[i].id+'" title="Delete-Item"><i class="fas ion-ios-trash"></i></a>'+
                              '</td>'+
                            '</tr>'
                            ;
                            cust = '';
                      }
                    }
                  $('.list_instal').html(html);
                  $('.typeofsales').html(ressel);
                  $('.input_cust_names').html(cust);
                }
              }); 
        }
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
                  var ressel = '<a style="width: 25%;" href="javascript:void(0)" class="btn btn-info retail"><h2><i class="fas ion-android-playstore"></i> Retail</h2></a>';
                  var cust ='<select name="costumer" class="custom-select list_reseller" style="width:25%;"></select>'+
                    '<a href="javascript:void(0)" class="btn btn-success confirm_buy_res"><i class="fas ion-bag"></i> Confirm</a>';
                  for(i=0; i<data.length; i++){
                      if(data[i].process == 1){
                           html += 
                            '<tr>'+
                              '<td>'+data[i].item_discription+' pesos </td>'+
                              '<td style="background:'+data[i].color+'"></td>'+
                              '<td>₱'+data[i].resseller_price+'</td>'+
                              '<td><a class="btn btn-success"><i class="fas ion-social-dropbox"></i> Re-Selling</a></td>'+
                              '<td><a class="btn btn-success"> <i class="fas ion-android-checkbox"></i> ₱'+data[i].g_price * data[i].qty+' ['+data[i].g_price+'] <a></td>'+
                              '<td><a class="btn btn-warning" title="Installment"> <i class="fas ion-bag"></i> '+data[i].down+'<a>'+' '+
                               '<a class="btn btn-danger" title="Balance"> <i class="fas ion-bag"></i> -'+data[i].bal +'<a>'+
                              '</td>'+
                              '<td><a class="btn btn-info"> <i class="fas ion-bag"></i> '+data[i].qty+'<a></td>'+
                              '<td>'+
                                '<a href="javascript:void(0)" data-qty="'+data[i].qty+'" data-item_id="'+data[i].item_id+'" data-id="'+data[i].id+'" data-img_id="'+data[i].img_id+'" class="btn btn-warning refreshRetail" title="Refresh Qty Order"><i class="fas ion-android-refresh"></i></a>'+' '+
                              '</td>'+
                            '</tr>'
                            ;
                            ressel ='';
                      }
                      else{
                        html += 
                          '<tr>'+
                            '<td>'+data[i].item_discription+' pesos </td>'+
                            '<td style="background:'+data[i].color+'"></td>'+
                            '<td>₱ '+data[i].resseller_price+'</td>'+
                            '<td><a class="btn btn-success"><i class="fas ion-social-dropbox"></i> Re-Selling</a></td>'+
                            '<td>₱ '+data[i].resseller_price+'</td>'+
                            '<td><input type="text"  class="form-control" placeholder="Down" name="downpayment"></td>'+
                            '<td><input type="hidden" name="type" value="Resell"><input type="text"  class="form-control" placeholder="Qty" name="qty_buy"></td>'+
                            '<td>'+
                              '<a href="javascript:void(0)" data-resel="'+data[i].resseller_price+'" data-id_cart="'+data[i].id+'" data-base="'+data[i].base_price+'" data-item_id="'+data[i].item_id+'" data-detail="'+data[i].item_discription+'" data-id="'+data[i].process_id+'" data-name="'+data[i].process_name+'" data-img_id="'+data[i].img_id+'" class="btn btn-success resel_instal" title="Confirm-Buy"><i class="fas ion-android-playstore"></i></a>'+' '+
                              '<a class="btn btn-danger delete" href="javascript:void(0)" data-id="'+data[i].id+'" title="Delete Item"><i class="fas ion-ios-trash"></i></a>'+
                            '</td>'+
                          '</tr>'
                          ;
                          cust = '';
                      }
                      
                    }
                  $('.list_instal').html(html);
                  $('.typeofsales').html(ressel);
                  $('.input_cust_names').html(cust);
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
        $('.list_instal').on('click','.deleteRetail',function (){
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
        $('.list_instal').on('click','.delete',function (){
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
                  reseller();
                }
              }); 
        });

         $('.list_instal').on('click','.refreshRetail',function (){
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
                  reseller();
                }
              }); 
        });
        
        $('.list_instal').on('click','.refreshSell',function (){
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

        $('.list_instal').on('click','.resel_instal',function (){
          var item_id = $(this).data('item_id');
          var img_id = $(this).data('img_id');
          var name = $(this).data('name');
          var id = $(this).data('id');
          var base = $(this).data('base');
          var detail = $(this).data('detail');
          var id_cart = $(this).data('id_cart');
          var price =$(this).data('resel');
          var qty = $("input[name='qty_buy']").val();
          var down = $("input[name='downpayment']").val();
          var type = $("input[name='type']").val();
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_instal_retail',
                type: 'post',
                data:{item_id:item_id, id_cart:id_cart, img_id:img_id, type:type, name:name, id:id, detail:detail, price:price, qty:qty, base:base, down:down},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Not Enough Stock or No field inputs", "error");
                  $('[name="qty_buy"]').val("");
                },
                success: function (data) {
                  swal("Success Process", "", "success");
                  reseller();
                }
              }); 
        });

        $('.list_instal').on('click','.retail_instal',function (){
          var item_id = $(this).data('item_id');
          var img_id = $(this).data('img_id');
          var name = $(this).data('name');
          var id = $(this).data('id');
          var base = $(this).data('base');
          var detail = $(this).data('detail');
          var id_cart = $(this).data('id_cart');
          var price = $("input[name='price_buy']").val();
          var down = $("input[name='downpayment']").val();
          var qty = $("input[name='qty_buy_item']").val();
          var type = $("input[name='type']").val();
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_instal_retail',
                type: 'post',
                data:{item_id:item_id, id_cart:id_cart, type:type, img_id:img_id, name:name, id:id, detail:detail, price:price, qty:qty, base:base, down:down},
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

        $('.input_cust_names').on('click','.confirm_instal',function (){
          var user_id = $("input[name='user_id']").val();
          var name = $("input[id='cust_name']").val();
          var cart = $("input[name='cartnoInstal']").val();
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
                  $('#mycartinstal').modal('hide');
                  reseller();
                  item_retail();
                }
              }); 
        });

        
         $('.input_cust_names').on('click','.confirm_buy_res',function (){
          var user_id = $("input[name='user_id']").val();
          var name = $("select[name='costumer']").val();
          var cart = $("input[name='cartnoInstal']").val();
            $.ajax({
                url:'<?=base_url()?>index.php/pages/ajax_confirm_instal',
                type: 'post',
                data:{user_id:user_id, name:name, cart:cart},
                dataType : "JSON",
                error: function() {
                  swal("Error Process!", "Process Halted", "error");
                },
                success: function (data) {
                  swal("Success Process", "Buy Process Success", "success");
                  $('#mycartinstal').modal('hide');
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

      setInterval(function(){
        cart_no();
      }, 2000) 
        


});
</script> 

