<!DOCTYPE html>
<html>
<head>
  <?= $page_resource['meta'] ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?= $page_resource['admin_header'] ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?= $page_resource['admin_sidebar'] ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">View Payment</p>
          </center>
        </div>
        
         </div>
          
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="col-xs-3">
                                            </i><img src="../storage/images/icon.jpeg" width="200px">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <!-- <div class="huge">13</div>
                                            <div>Support Tickets!</div> -->
                                        </div>
                                         <div><hr width="800px"></div>
                                         <?php if ($billing): ?>
                                         	<div>No. Transaksi <?php echo $billing->id_billing; ?></div>
                                          <div>Nama <?php echo $billing->name; ?></div>
                                           <div>Paket <?php echo $billing->id_package; ?></div>
                                            <div>Tanggal <?php echo $billing->date; ?></div>
                                          <div><hr width="800px"></div>
                                           <div>Total pembayaran Rp.<?php echo $billing->price; ?></div>
                                         <?php endif ?>
                                         
                                           <div><hr width="800px"></div>
                    </div>
                    <div class="col-md-7">
                     <p align="justify"></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 125px;">
                    <div class="col-md-8 col-md-offset-4"> 
                    	<?php if ($billing): ?>
                    		<a href="<?= site_url('payment_verif_new/cetak/'.$this->session->userdata('id')) ?>"><button class="btn btn-primary">Cetak</button></a>
                    		<?php else : ?>
                    			<a class="btn btn-primary btn-disabled">Cetak</a>
                    	<?php endif ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                          <?php $status = isset($billing->status) ? $billing->status : null ?>
                          <?php if ($status == 2): ?>
                              <h2>Belum Dibayar</h2>
                              <a class="btn btn-sm btn-primary mb-3" href="<?php echo site_url('payment_verif_new/createVerif') ?>">Bayar</a>
                            <?php else : ?>
                              <div class="huge"><h2><?php echo $billing ? date_diff(date_create(date('Y-m-d')),date_create($billing->duration_last))->days : '0'?></h2></div>
                            <div><h4>Days</h4></div>
                          <?php endif ?>
                        </div>
                        <div><hr width="800px"></div>
                        <div><hr width="800px"></div>
                        	Jika ingin menambahkan masa aktif, silahkan klik "Update" di bawah ini. Apabila ingin unistall add-ons tertentu, silahkan klik "Unistall".
                    </div>
                    <div class="col-md-7">
                     <p align="justify"></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 90px;">
                    <div class="col-md-8 col-md-offset-4"> 
                      <a href='<?= $billing? site_url('billing_new/update/'. $billing->id_billing) : site_url('billing_new/create') ?>'><button class="btn btn-primary"><?php echo $billing ? 'Update' : 'Beli' ?></button></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                      <button class="btn btn-success">Unistall</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="cleanslate w24tz-current-time w24tz-middle" style="display: inline-block !important; visibility: hidden !important; min-width:300px !important; min-height:145px !important;"><p><a href="//24timezones.com/world_directory/time_in_bandung.php" style="text-decoration: none" class="clock24" id="tz24-1556794185-c1437-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMSIsInNob3dzZWNvbmRzIjoiMCIsImNvbnRhaW5lcl9pZCI6ImNsb2NrX2Jsb2NrX2NiNWNjYWNiNDllOTc4OCIsInR5cGUiOiJkYiIsImxhbmciOiJlbiJ9" title="World Time :: Bandung" target="_blank" rel="nofollow">Time in Bandung</a></p><div id="clock_block_cb5ccacb49e9788"></div></div>
            <script type="text/javascript" src="//w.24timezones.com/l.js" async></script>

            <!-- weather widget start --><a target="_blank" href="https://www.booked.net/weather/bandung-9580"><img src="https://w.bookcdn.com/weather/picture/1_9580_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=11903"  alt="booked.net"/></a><!-- weather widget end -->
         
          </div>  
        </div>

        <!-- /.box-body -->
      	
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
        <!-- /.box-body -->
      </div>

      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?= $page_resource['admin_footer'] ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<?= $page_resource['admin_scripts'] ?>
</body>
</html>
