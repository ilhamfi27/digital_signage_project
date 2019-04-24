<!DOCTYPE html>
<html>
<head>
 
</head>

 
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                         <img src="<?php echo site_url() ?>/storage/images/icon.jpeg" width="1490px" height="150px">
                                         <hr>
                                        </div><p align="justify">
                                         <h2>
                                         <div>No. Transaksi <?php echo $billing->id_billing; ?></div>
                                          <div>Nama <?php echo $billing->name; ?></div>
                                           <div>Paket <?php echo $billing->id_package; ?></div>
                                            <div>Tanggal <?php echo $billing->date; ?></div>
                                            </h2>
                                        <hr>
                                        <h1>
                                           <div>Total pembayaran Rp.<?php echo $billing->price; ?></div>
                                         </h1>

                                         <a href="javascript:window.print()">Cetak</a>
                                       </p>
                    </div>
                    <div class="col-md-7">
                     <p align="justify"></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 125px;">
                    
                  </div>
                </div>
              

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>
