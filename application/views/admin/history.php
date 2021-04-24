  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/body/plugins/daterangepicker/daterangepicker.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          
          
        </div>

      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card-header">
            <h3 class="card-title title">
            </h3>
            <div class="card-tools">
              <input class="form-control form-control-navbar" name="search" id="search" type="search" placeholder="Search..." aria-label="Search">
            </div>
            <input type="hidden" name="cart_no_ref">
        </div>
        <div class="row list_of_installment">
          
        </div>
      </div>
    </section>
  </div>



      <div class="modal fade" id="view_instal_payment">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h3 class="modal-title list_name"></h3>

              <input type="hidden" name="item_id">
            </div>
            <div class="modal-body">
              <h4 class="item_discriptions_name"></h4>
              <h6 class="selling_price"></h6>
              <h6 class="down"></h6>
              <h6 class="bal"></h6>
              <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Remaining Balance</th>
                      <th>Payment</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody class="balance_records">
                    
                  </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <div class="modal fade" id="paying_bal">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
             <div class="modal-headers">
              <h3 class="modal-title list_names"></h3>

              <input type="hidden" name="item_ids">
            </div>
            <div class="modal-body">
              <h4 class="item_discriptions_names"></h4>
              <h6 class="selling_prices"></h6>
              <h6 class="downs"></h6>
              <h6 class="bals"></h6>
              <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Remaining Balance</th>
                      <th>Payment</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody class="balance_records">
                    
                  </tbody>
                  <tbody> 
                    <tr>
                      <td colspan="2"><input type="text" class="form-control" name="payment_bayad" placeholder="Payment"></td>
                      <td><a href="javascript:void(0)" class="btn btn-success payment_confirm"><i class="fas ion-cash"></i> Confirm</a></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-calendar-alt"></i> DAILY REPORTS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form target="_blank" action="<?php echo base_url(); ?>pages/print_daily" method="post">
              <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="daily_date" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="submit" class="btn btn-default" value="PRINT REPORTS"> 
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <div class="modal fade" id="modal-graph">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-chart-pie"></i> GRAPH</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label>Date Range :</label>

                  <div class="input-group">
                    <button type="button" class="btn btn-block btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Date Range Picker
                      <i class="fas fa-caret-down"></i>
                    </button>
                  </div>
                    <label>Date Range:</label>
                    <input type="text" class="form-control date-range" disabled>
                    <input type="hidden" class="form-control" name="starting">
                    <input type="hidden" class="form-control" name="ending">
                    <label>Graph Type:</label>
                    <select class="form-control" name="type_graph">
                      <option value="0">Select</option>
                      <option value="1">Weely Graph</option>
                      <option value="2">Monthly Graph</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" name="start">
              <input type="hidden" name="end">
              <a href="javascript:void(0)" class="btn btn-default graph_save"><i class="fas fa-save"></i> SAVE GRAPH</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<script src="<?php echo base_url(); ?>assets/body/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/daterangepicker/daterangepicker.js"></script>



<script>
  $(function () {
       $('#reservationdate').datetimepicker({
          format: 'YYYY-MM-DD'
        });

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
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('.date-range').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('input[name="starting"]').val(start.format('MMM D'));
        $('input[name="ending"]').val(end.format('MMM D, YYYY'));
        $('input[name="start"]').val(start.format('YYYY-MM-DD'));
        $('input[name="end"]').val(end.format('YYYY-MM-DD'));
      }
    )
  });
</script>

  <script type="text/javascript">
    $(document).ready(function () {
      title1();
      sales_history();
        function sales_history(){
          $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_history_all',
              type: 'POST',
              dataType : "JSON",
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html +=
                          '<div class="col-12 col-sm-6 col-md-3">'+
                            '<div class="info-box mb-3">'+
                              '<span class="info-box-icon bg-warning elevation-1"> <a href="javascript:void(0)" data-cart="'+data[i].cart_no+'" class="view_history_file"><i class="fas fa-folder-open text-success"></i></a></span>'+
                              '<div class="info-box-content">'+
                                '<span class="info-box-text"> Receipt No:'+data[i].cart_no+'</span>'+
                                '<span class="info-box-number"><a href="javascript:void(0)" data-cart="'+data[i].cart_no+'" class="view_history_file">'+data[i].cost_name+'</a></span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'     
                      ;
                    }
                $('.list_of_installment').html(html);
              }
            });
        }
        function sales_history_search(){
          var name = $('input[name="search"]').val();
          $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_history_allsearch',
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
                                '<span class="info-box-text"> POS#:'+data[i].cart_no+'</span>'+
                                '<span class="info-box-number"><a href="javascript:void(0)" data-cart="'+data[i].cart_no+'" class="view_history_file">'+data[i].cost_name+'</a></span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'     
                      ;
                    }
                $('.list_of_installment').html(html);
              }
            });
        }
       $('.list_of_installment').on('click','.view_history_file',function (){
          list_table1();
          var cart = $(this).data('cart');
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
                      '<td>₱ '+total2+'</td>'+
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
         function title1(){
          var html = 
            '<a href="javascript:void(0)" class="btn btn-info history_back"> <i class="fas fa-clock"></i> HISTORY RECORDS</a> '+
            '<a data-toggle="modal" data-target="#modal-sm" class="btn btn-default"><i class="fas fa-print"></i> DAILY REPORTS</a> '+
            '<a data-toggle="modal" data-target="#modal-graph" class="btn btn-default"><i class="fas fa-chart-pie"></i> GRAPH</a>';
          $('.title').html(html);       
        }
         function title2(){
          var html = 
            '<a href="javascript:void(0)" class="btn btn-default history_back">Sales History Records</a> '+
            '<a href="javascript:void(0)" class="btn btn-info list_records">Installment Records </a>';
          $('.title').html(html);       
        }
         $('.title').on('click','.history_back',function (){
            sales_history();
            title1();
        });
         $('.title').on('click','.list_records',function (){
             title2();
            history_name();
        });
       $('.view_button').on('click','.list_of_instal',function (){
            list_table();
            history();
        });
       $('.view_button').on('click','.list_closed',function (){
            var table='';
            button();
            $('.list_of_installment').html(table); 
        });
        $('.list_of_installment').on('click','.view_records',function (){
            var id = $(this).data('id');
            var sel = $(this).data('sel');
            var dis = $(this).data('dis');
            var name = $(this).data('name');
            var down = $(this).data('down');
            var bal = $(this).data('bal');

            $("input[name='item_id']").val(id);
            $('.list_name').html(name); 
            $('.item_discriptions_name').html(dis); 
            $('.selling_price').html('Total Selling Price: ₱'+sel);
            $('.down').html('DownPayment: ₱'+down); 
            $('.bal').html('Item Balance: ₱'+bal); 
            $('#view_instal_payment').modal('show');

            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_balance_history',
              data:{id:id},
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Item Display');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html +=
                            '<tr>'+ 
                            '<td>'+data[i].balance+'</td>'+
                            '<td>'+data[i].payment+'</td>'+
                            '<td>'+data[i].date+'</td>'+
                            '</tr>'
                           ;
                    }
                $('.balance_records').html(html);
              }
            });
        });
        $('.list_of_installment').on('click','.paymentmode',function (){
            var id = $(this).data('id');
            var sel = $(this).data('sel');
            var dis = $(this).data('dis');
            var name = $(this).data('name');
            var down = $(this).data('down');
            var bal = $(this).data('bal');

            $("input[name='item_ids']").val(id);
            $('.list_names').html(name); 
            $('.item_discriptions_names').html(dis); 
            $('.selling_prices').html('Total Selling Price: ₱'+sel);
            $('.downs').html('DownPayment: ₱'+down); 
            $('.bals').html('Item Balance: ₱'+bal); 
            $('#paying_bal').modal('show');
            diplay_payment();
        });


        function diplay_payment(){
              var id = $("input[name='item_ids']").val();
              $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_balance_history',
              data:{id:id},
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Item Display');
                   },
              success: function (data) {
                var html = '';
                  for(i=0; i<data.length; i++){
                          html +=
                            '<tr>'+ 
                            '<td>₱ '+data[i].balance+'</td>'+
                            '<td>₱ '+data[i].payment+'</td>'+
                            '<td>'+data[i].date+'</td>'+
                            '</tr>'
                           ;
                           if(data[i].balance == '0'){
                              $('#paying_bal').modal('hide');
                           }
                    }
                $('.balance_records').html(html);
                history();
              }
            });
        }
        $('.payment_confirm').click(function(){
            var id = $("input[name='item_ids']").val();
            var payment = $("input[name='payment_bayad']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/payment_mode',
              data:{id:id, payment:payment},
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Errors');
                   },
              success: function (data) {
                diplay_payment();
                history();
                $("input[name='payment_bayad']").val('');
              }
            });
        });

       function list_table(){
          var table = 
                '<table id="example2" class="table table-bordered table-striped">'+
                  '<thead>'+
                    '<tr>'+
                      '<th>Cart No.</th>'+
                      '<th>Costumer Name</th>'+
                      '<th>Item</th>'+
                      '<th>Qty</th>'+
                      '<th>Sale</th>'+
                      '<th>Balance</th>'+
                      '<th>Date</th>'+
                    '</tr>'+
                  '</thead>'+
                  '<tbody class="instal_data">'+ 
                  '</tbody>'+
                '</table>';
          $('.list_of_installment').html(table);
       }
       function list_table1(){
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
          $('.list_of_installment').html(table);
       }

       function history_name(){
           $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_history_file',
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
                                '<span class="info-box-text">'+data[i].cost_name+'</span>'+
                                '<span class="info-box-number"><a href="javascript:void(0)" data-name="'+data[i].cost_name+'" class="reseller_bal">Installment Records</a></span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'     
                      ;
                    }
                $('.list_of_installment').html(html);
              }
            });
        }

      $('.list_of_installment').on('click','.reseller_bal',function (){
            list_table();
            var name = $(this).data("name");
            $('input[name="cart_no_ref"]').val(name);
            history();
         });

      function history(){
        var name = $('input[name="cart_no_ref"]').val();
         $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_reseler_balhistory',
              type: 'POST',
              data:{name:name},
              dataType : "JSON",
              success: function (data) {
                var html = '';
                var revenue = 0;
                var fname ='';
                  for(i=0; i<data.length; i++){
                      var num = parseFloat(data[i].balance);
                      revenue += num;
                      fname = data[i].full_name;
                          html += 
                          '<tr>'+
                            '<td>'+data[i].cart_no+'</td>'+
                            '<td>'+data[i].cost_name+'</td>'+
                            '<td>'+data[i].item_discription+' <a class="btn btn-info" title="Selling Price">₱ '+data[i].selling_price+'</a></td>'+
                            '<td>'+data[i].qty+'</td>'+
                            '<td>₱'+data[i].selling_total+'</td>'+
                            '<td><a class="btn btn-danger">₱ '+data[i].balance+'</a></td>'+
                            '<td>'+data[i].date+'</td>'+
                            '<td>'+
                              '<a href="javascript:void(0)" data-bal="'+data[i].balance+'" data-down="'+data[i].down+'" data-sel="'+data[i].selling_total+'" data-dis="'+data[i].item_discription+'" data-name="'+data[i].cost_name+'" data-id="'+data[i].id+'" class="btn btn-info view_records" title="View Payment History"><i class="fas ion-ios-clock-outline"></i></a> '+
                              '<a href="javascript:void(0)" data-bal="'+data[i].balance+'" data-down="'+data[i].down+'" data-sel="'+data[i].selling_total+'" data-dis="'+data[i].item_discription+'" data-name="'+data[i].cost_name+'" data-id="'+data[i].id+'" class="btn btn-success paymentmode" title="Payment Input"><i class="fas ion-cash"></i></a>'+
                            '</td>'+
                          '</tr>'
                           ;
                    }
                html+='<tr><td style="background:red; color:white; text-align:center" colspan="5">Nothing to be Follow...</td><td style="background:red; color:white;" colspan="3">Total Balance ₱'+revenue+'</td></tr>';
                $('.instal_data').html(html);
              }
            });
      }

      $('#search').keyup(function(){
        var search = $("input[id='search']").val();
            if(search != '')
            {
             sales_history_search();
            }
            else
            {
             sales_history();
            }
      }); 

       $('.graph_save').click(function(){
            var start = $("input[name='start']").val();
            var end = $("input[name='end']").val();
            var name = $("input[name='starting']").val() +'-, '+ $("input[name='ending']").val();
            var type = $('select[name="type_graph"]').val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_graph_save',
              type: 'POST',
              data:{start:start, end:end, name:name, type:type},
              dataType : "JSON",
              error: function() {
                      swal("Fail!", "Incomplete Input Fields", "warning");
                   },
              success: function (data) {
                swal("Success!", "Graph Sales Saved", "success");
                $('#modal-graph').modal('hide');
              }
            });
      });

    });
</script> 

<script>
  $(function () {
    $("#example1").DataTable({
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>