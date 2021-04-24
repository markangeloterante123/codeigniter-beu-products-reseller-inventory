<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beau Station Official Receipt</title>


  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/body/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/body/dist/css/adminlte.min.css">
  <script src="<?php echo base_url(); ?>assets/body/plugins/jquery/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <!-- <div class="col-12">
        <h2 class="page-header"> Beau Station
          <small class="float-right"></small>
        </h2>
      </div> -->
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-8 invoice-col">
        From
        <address>
          <strong>Beau Station</strong><br>
          Bancal Silang, Cavite<br>
          Phone: 09xx-xxx-xxxx <br>
          Email: test@gmail.com
        </address>
        <h3>RECORDS OF DATE: <?php echo $date; ?></h3>
      </div>
      <!-- /.col -->
      <input type="hidden" name="date" value="<?php echo $date; ?>">
      <div class="col-sm-4 invoice-col">
      </div>
      
    </div>
    	
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>RECEIPT NO.</th>
            <th>CUSTOMERS NAME</th>
            <th>ITEM</th>
            <th>UNIT-PRICE</th>
            <th>QTY</th>
            <th>TOTAL-PRICE</th>
            <th>NET</th>
          </tr>
          </thead>
          <tbody class="instal_data">
           
  
          
          </tbody>
        </table>
      </div>
    </div>
  
  </section>
</div>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
    	data();
    	

    	function data(){
    		var date = $('input[name="date"]').val();
           $.ajax({
              url:'<?=base_url()?>index.php/pages/print_daily_rec',
              type: 'POST',
              data:{date:date},
              dataType : "JSON",
              success: function (data) {
                var html = '';
                var sub = 0;
                var net = 0;
                  for(i=0; i<data.length; i++){
                    sub += parseFloat(data[i].selling_total);
                    net += parseFloat(data[i].net);
                      if(data[i].selling_price == 0){
                         html+=
                        '<tr>'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>Receipt No.'+data[i].cart_no+'</td>'+
                          '<td>'+data[i].cost_name+'</td>'+
                          '<td>'+data[i].item_discription+'</td>'+
                          '<td colspan="3" style="text-align:center">'+data[i].qty+' pc/set FREE FROM PROMO</td>'+
                          '<td>'+data[i].net+'</td>'+
                        '</tr>';
                      }
                      else{
                        html+=
                        '<tr>'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>Receipt No.'+data[i].cart_no+'</td>'+
                          '<td>'+data[i].cost_name+'</td>'+
                          '<td>'+data[i].item_discription+'</td>'+
                          '<td>'+data[i].selling_price+'</td>'+
                          '<td>'+data[i].qty+'</td>'+
                          '<td>'+data[i].selling_total+'</td>'+
                          '<td>'+data[i].net+'</td>'+
                        '</tr>';
                      }
                    }
                var vat = sub * 0.12;
                html += 
                  '<tr>'+
                    '<td colspan="4"></td>'+
                    '<td colspan="2">SUB-TOTAL:</td>'+
                    '<td colspan="2">'+ Number((sub).toFixed(1))+'</td>'+
                  '</tr>'+
                  '<tr>'+
                    '<td colspan="4"></td>'+
                    '<td colspan="2">PAYABLE-VAT:</td>'+
                    '<td colspan="2">'+ Number((vat).toFixed(1))+'</td>'+
                  '</tr>'+
                  '<tr>'+
                    '<td colspan="4"></td>'+
                    '<td colspan="2">TOTAL:</td>'+
                    '<td colspan="2">'+ Number((sub + vat).toFixed(1))+'</td>'+
                  '</tr>'+
                  '<tr>'+
                    '<td colspan="4"></td>'+
                    '<td colspan="2">NET:</td>'+
                    '<td colspan="2">'+ Number((net).toFixed(1))+'</td>'+
                  '</tr>';
             

                $('.instal_data').html(html);
                window.addEventListener("load", window.print());
              }

            });
          
    	}
    });
</script>