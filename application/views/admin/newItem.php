 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div  class="col-sm-6">
            <h1 >Add New Items</h1>
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

      <div class="container-fluid">
        <div class="row item_display">  
            <!--ajax Display-->
        </div>
        </div>
      </div>
    </section>


    <script type="text/javascript">
  $(document).ready(function () {
        item_tags();

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
                                  '<h3 style="color:black" class="widget-user-username text-right">'+data[i].item_name+':'+data[i].item_brand+'</h3>'+
                                  
                                '</div>'+            
                                '<div class="card-footer">'+
                                  '<div class="row">'+
                                    '<div class="col-sm-4 border-right">'+
                                      '<div class="description-block">'+
                                        '<h5 class="description-header">'+data[i].variant+'</h5>'+
                                        '<span class="description-text">Variants</span>'+
                                      '</div>'+
                                    '</div>'+
                                    '<div class="col-sm-4 border-right">'+
                                      '<div class="description-block">'+
                                        '<span class="description-text"><a href="javascript:void(0)" data-id="'+data[i].item_id+'" data-name="'+data[i].item_name+' Category" data-qty="'+data[i].variant+'" class="btn btn-info addNew"><i class="fas fa-plus"></i> Add</a></span>'+
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
                                    '<div class="col-sm-4 border-right">'+
                                      '<div class="description-block">'+
                                        '<h5 class="description-header">'+data[i].variant+'</h5>'+
                                        '<span class="description-text">Variants</span>'+
                                      '</div>'+
                                    '</div>'+
                                    '<div class="col-sm-4 border-right">'+
                                      '<div class="description-block">'+
                                        '<span class="description-text "><a href="javascript:void(0)" data-id="'+data[i].item_id+'" data-qty="'+data[i].variant+'" data-name="'+data[i].item_name+' Category" class="btn btn-info addNew"><i class="fas fa-plus"></i> Add</a></span>'+
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

        $('.item_display').on('click','.addNew',function (){
          var item_id = $(this).data('id');
          var name = $(this).data('name');
          var qty = $(this).data('qty');

          $('[name="item_qty"]').val(qty);
          $('.title_add').html(name);
          $('[name="item_id"]').val(item_id);
          $('#new_items').modal('show');
        });
        
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

        

});
</script> 

