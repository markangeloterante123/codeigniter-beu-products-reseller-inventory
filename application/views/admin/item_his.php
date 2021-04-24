  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/body/plugins/daterangepicker/daterangepicker.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php
              if($data){
                $data = $data;
                $field = 'img_id';
                $table = 'tbl_item';
                foreach ($this->load->model_users->data($data, $field, $table) as  $value) {
                  $name = $value->name_of_item;

            ?>
            <h1><i class="fas fa-folder-open"></i> <b style="color:blue;"><?php echo $name; ?></b> Sales Records</h1>
            <?php }} ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <input type="hidden" name="img_id" value="<?php echo $data; ?>">
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
                              
              <div class="card-header">
               <!--  <a href="<?php echo base_url();?>pages/printInventory" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print Records</a> -->
               <h3 class="card-title title_daily"></h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" >
                    <button type="button" class="btn btn-block btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> VIEW BY DATE
                      <i class="fas fa-caret-down"></i>
                    </button>
                    <input type="hidden" class="form-control" name="starting">
                    <input type="hidden" class="form-control" name="ending">
                    <input type="hidden" class="form-control" name="dateFull">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>RECEIPT NO.</th>
                      <th>CUSTOMERS NAME</th>
                      <th>SOLD QTY</th>
                      <th>UNIT PRICE</th>
                      <th>TOTAL PRICE</th>
                      <th>NET</th>
                      <th>DATE</th>
                      <th>REMARKS</th>
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

<script src="<?php echo base_url(); ?>assets/body/plugins/daterangepicker/daterangepicker.js"></script>
<script>
  $(function () {
       
       $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('input[name="dateFull"]').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
       
        $('input[name="starting"]').val(start.format('YYYY-MM-DD'));
        $('input[name="ending"]').val(end.format('YYYY-MM-DD'));
        var fulldate = $('input[name="dateFull"]').val();
        var start = $('input[name="starting"]').val();
        var end = $('input[name="ending"]').val();
        var img_id = $("input[name='img_id']").val();
        $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_item_hisDate',
              type: 'POST',
              data:{img_id:img_id, start:start, end:end},
              dataType : "JSON",
              success: function (data) {
                var html = '';
                var total = 0;
                var net = 0;
                  for(i=0; i<data.length; i++){
                    total += parseFloat(data[i].selling_total);
                    net += parseFloat(data[i].net);                    
                    if(data[i].net <= 0){
                      html +=
                      '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td> Receipt No: '+data[i].cart_no+'</td>'+
                        '<td>'+data[i].cost_name+'</td>'+
                        '<td>'+data[i].qty+'</td>'+
                        '<td><i class="fas fa-minus"></i></td>'+
                        '<td><i class="fas fa-minus"></i></td>'+
                        '<td><i class="fas fa-minus"></i></td>'+
                        '<td>'+data[i].date+'</td>'+
                        '<td><a class="btn btn-block btn-info"> FREE</a></td>'+
                      '</tr>';
                    }
                    else{
                       html +=
                      '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td> Receipt No: '+data[i].cart_no+'</td>'+
                        '<td>'+data[i].cost_name+'</td>'+
                        '<td>'+data[i].qty+'</td>'+
                        '<td>₱ '+data[i].selling_price+'</td>'+
                        '<td>₱ '+data[i].selling_total+'</td>'+
                        '<td>₱ '+data[i].net+'</td>'+
                        '<td>'+data[i].date+'</td>'+
                        '<td><i class="fas fa-check"></i></td>'+
                      '</tr>';
                    }     
                  }
                var vat = total * 0.12;
                html +=
                '<tr>'+
                  '<td colspan="6"></td>'+
                  '<td>SUB-TOTAL:</td>'+
                  '<td colspan="2">₱ '+Number((total).toFixed(1))+'</td>'+
                '</tr>'+
                '<tr>'+ 
                  '<td colspan="6"></td>'+
                  '<td>PAYABLE-VAT: 0.12%</td>'+
                  '<td colspan="2">₱ '+Number((vat).toFixed(1))+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td colspan="6"></td>'+
                  '<td>TOTAL:</td>'+
                  '<td colspan="2">₱ '+Number((total + (total * 0.12)).toFixed(1))+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td colspan="6"></td>'+
                  '<td>TOTAL-NET:</td>'+
                  '<td colspan="2">₱ '+Number((net).toFixed(1))+'</td>'+
                '</tr>';
                $('.title_daily').html(fulldate);
                if(data.length == '0'){
                  html = 
                  '<tr><td colspan="9" style="text-align:center;">AT THE MOMENT NO DATA AVAILABLE...</td></tr>';
                }
                $('.item_inventory').html(html);
              }
            });

      }
    )
  });
</script>


<script type="text/javascript">
  $(document).ready(function () {
    item_his();

    function item_his(){
           var img_id = $("input[name='img_id']").val();
           var date = moment();
           var start = date.format('YYYY-MM-DD');
           var end = date.format('YYYY-MM-DD');
           
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_item_hisDate',
              type: 'POST',
              data:{img_id:img_id, start:start, end:end},
              dataType : "JSON",
              success: function (data) {
                var html = '';
                var total = 0;
                var net = 0;
                var name = '';
                  for(i=0; i<data.length; i++){
                    total += parseFloat(data[i].selling_total);
                    net += parseFloat(data[i].net);
                    name = data[i].item_discription;
                    if(data[i].net <= 0){
                      html +=
                      '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td> Receipt No: '+data[i].cart_no+'</td>'+
                        '<td>'+data[i].cost_name+'</td>'+
                        '<td>'+data[i].qty+'</td>'+
                        '<td><i class="fas fa-minus"></i></td>'+
                        '<td><i class="fas fa-minus"></i></td>'+
                        '<td><i class="fas fa-minus"></i></td>'+
                        '<td>'+data[i].date+'</td>'+
                        '<td><a class="btn btn-block btn-info"> FREE</a></td>'+
                      '</tr>';
                    }
                    else{
                       html +=
                      '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td> Receipt No: '+data[i].cart_no+'</td>'+
                        '<td>'+data[i].cost_name+'</td>'+
                        '<td>'+data[i].qty+'</td>'+
                        '<td>₱ '+data[i].selling_price+'</td>'+
                        '<td>₱ '+data[i].selling_total+'</td>'+
                        '<td>₱ '+data[i].net+'</td>'+
                        '<td>'+data[i].date+'</td>'+
                        '<td><i class="fas fa-check"></i></td>'+
                      '</tr>';
                    }
                     
                    }

                var vat = total * 0.12;
                html +=
                '<tr>'+
                  '<td colspan="6"></td>'+
                  '<td>SUB-TOTAL:</td>'+
                  '<td colspan="2">₱ '+Number((total).toFixed(1))+'</td>'+
                '</tr>'+
                '<tr>'+ 
                  '<td colspan="6"></td>'+
                  '<td>PAYABLE-VAT: 0.12%</td>'+
                  '<td colspan="2">₱ '+Number((vat).toFixed(1))+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td colspan="6"></td>'+
                  '<td>TOTAL:</td>'+
                  '<td colspan="2">₱ '+Number((total + (total * 0.12)).toFixed(1))+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td colspan="6"></td>'+
                  '<td>TOTAL-NET:</td>'+
                  '<td colspan="2">₱ '+Number((net).toFixed(1))+'</td>'+
                '</tr>';
                if(data.length == '0'){
                  html = 
                  '<tr><td colspan="9" style="text-align:center;">NO DATA AVAILABLE FROM '+date.format('MMMM D, YYYY')+'</td></tr>';
                }
                $('.item_inventory').html(html);
                $('.title_daily').html(date.format('MMMM D, YYYY'));
              }
            });
        }

   });
</script>