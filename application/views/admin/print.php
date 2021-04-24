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
      </div>
      <!-- /.col -->
      <input type="hidden" name="pos_no" value="<?php echo $pos; ?>">
      <div class="col-sm-4 invoice-col">
        Customer Name:  
        <address>
		<?php 
            if($pos){
              $data = $pos;
              $field = 'cart_no';
              $table = 'tbl_history_sales';
              foreach ($this->load->model_users->dataDistinct2($data,$field,$table) as $value) {
                $name = $value->cost_name;
				$date = $value->date;                
          ?>
          <strong><?php echo $name; ?></strong><br>
          POS #<?php echo $pos; ?><br>
          Date: <?php echo $date; ?><br>
          <?php }} ?>
        </address>
      </div>
      <!-- /.col -->
          <!-- /.col -->
    </div>
    	
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>ITEM</th>
            <th>UNIT-PRICE</th>
            <th>QTY</th>
            <th>TOTAL PRICE</th>
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
    		var cart = $('input[name="pos_no"]').val();
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
                          '</tr>'
                           ;
                      } 
                    }
                  dis2 = '.'+dis;
                  dis3 = parseFloat(dis2);
                  num2 = total * dis3;
                  rev = revenue - num2;
                  var vat = Number((total * 0.12).toFixed(1));
                  var total2 = total + vat;
                  num4 = Number((rev).toFixed(1));
                  num5 = Number((num2).toFixed(1));
                  html +=
                    '<tr>'+
                      '<td colspan="3"></td>'+
                      '<td>SUB-TOTAL: </td>'+
                      '<td>₱ '+total+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="3"></td>'+
                      '<td>VAT 0.12% : </td>'+
                      '<td>₱ '+vat+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="3"></td>'+
                      '<td>DISCOUNT: </td>'+
                      '<td>₱ '+num5+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="3"></td>'+
                      '<td>TOTAL: </td>'+
                      '<td>₱ '+total2+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="3"></td>'+
                      '<td>PROCESS BY: '+name+'</td>';
                    '</tr>'+

                $('.instal_data').html(html);
                window.addEventListener("load", window.print());
              }

            });
          
    	}
    });
</script>