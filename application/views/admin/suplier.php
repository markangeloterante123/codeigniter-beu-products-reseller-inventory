  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SALES INVOICE RECORDS</h1>
          </div>      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
        <div class="card">
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DATE</th>
                    <th>SUPLIERS</th>
                    <th>ITEMS</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>P.O#</th>
                    <th>S.I#</th>
                    <th>RECEIVE BY:</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($this->load->model_users->table() as  $value) {
                        $date = $value->date;
                        $sup = $value->suplier_name;
                        $item = $value->name_of_item;
                        $price = $value->sup_base_price;
                        $qty = $value->rqty;
                        $po = $value->p_o;
                        $si = $value->sale_invoice;
                        $rec = $value->recive_by;
                    ?>
                      <tr>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $sup; ?></td>
                        <td><?php echo $item; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $po; ?></td>
                        <td><?php echo $si; ?></td>
                        <td><?php echo $rec; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
    </section>
  </div>
<script src="<?php echo base_url(); ?>assets/body/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/body/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "ordering": false,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"],   
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>







  

       

