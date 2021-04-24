<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beau Station Official Receipt</title>


  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/body/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/body/dist/css/adminlte.min.css">
  <script src="<?php echo base_url(); ?>assets/body/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/body/plugins/daterangepicker/daterangepicker.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
   
   
    <div class="row">
      <div class="col-12 table-responsive">
        
        <table class="table table-striped">
          <thead>
          <tr>
            <th>ITEM</th>
            <th>SIZE</th>
            <th>STOCK</th>
            <th>SELLING PRICE</th>
          </thead>
          <tbody>   
            <?php 
                  foreach ($this->load->model_users->item_inventory() as  $value) {
                    $item =$value->name_of_item;
                    $size=$value->size;
                    $qty=$value->qty;
                    $price=$value->resseller_price;

            ?>
             <tr>
            <td><?php echo $item; ?></td>
            <td><?php echo $size; ?></td>
            <td><?php echo $qty; ?></td>
            <td>₱ <?php echo $price; ?></td>
            </tr>
          <?php } ?>
          
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
  
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>

