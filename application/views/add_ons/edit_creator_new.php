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
      <h1>
        EDIT CREATOR
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Edit Creator</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('add_ons_new/update_creator',['class' => 'form-horizontal']) ?>
          <input type="hidden" name="id_creator" value="<?= $creator->id_creator ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="<?= $creator->name ?>">
                <?= form_error('name')?>
              </div>
            </div>

              <div class="form-group">
              <label class="col-sm-2 control-label">Image</label>
              <div class="col-sm-10">
                <input type="file" name="image">
                <?= form_error('image')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Place Of Birth</label>
              <div class="col-sm-10">
                <input type="text" name="place_of_birth" class="form-control" id="place_of_birth" value="<?= $creator->place_of_birth?>">
              <?= form_error('place_of_birth')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Date Of Birth</label>
              <div class="col-sm-10">
                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="<?= $creator->date_of_birth?>">
              <?= form_error('date_of_birth')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Gender</label>
              <div class="col-sm-10">
                <select name ="gender" class="form-control" id="gender">
                  <option value="Male" <?php echo $creator->gender == "Male" ? 'selected' : '' ?>>Male</option>
                  <option value="Female" <?php echo $creator->gender == "Female" ? 'selected' : '' ?>>Female</option>
                </select>
              <?= form_error('gender')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Religion</label>
              <div class="col-sm-10">
                <select name ="religion" class="form-control" id="religion">
                  <option value="Islam" <?php echo $creator->religion == "Islam" ? 'selected' : '' ?>>Islam</option>
                  <option value="Christianity" <?php echo $creator->religion == "Christianity" ? 'selected' : '' ?>>Christianity</option>
                  <option value="Buddhism" <?php echo $creator->religion == "Buddhism" ? 'selected' : '' ?>>Buddhism</option>
                  <option value="Confucianism" <?php echo $creator->religion == "Confucianism" ? 'selected' : '' ?>>Confucianism</option>
                  <option value="Hinduism" <?php echo $creator->religion == "Hinduism" ? 'selected' : '' ?>>Hinduism</option>
                </select>
              <?= form_error('religion')?>
              </div>
           </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Citizenship</label>
              <div class="col-sm-10">
                <input type="text" name="citizenship" class="form-control" id="citizenship" value="<?=$creator->citizenship?>">
              <?= form_error('citizenship')?>
              </div>
           </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Blood Gruop</label>
              <div class="col-sm-10">
                <select name ="blood_group" class="form-control" id="blood_group">
                  <option value="A" <?php echo $creator->blood_group == "A" ? 'selected' : '' ?>>A</option>
                  <option value="B" <?php echo $creator->blood_group == "B" ? 'selected' : '' ?>>B</option>
                  <option value="AB" <?php echo $creator->blood_group == "AB" ? 'selected' : '' ?>>AB</option>
                  <option value="O" <?php echo $creator->blood_group == "O" ? 'selected' : '' ?>>O</option>
                </select>
              <?= form_error('blood_group')?>
              </div>
           </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="address" rows="3" name="address"><?= $creator->address ?></textarea>
                <?= form_error('address')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Phone Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $creator->phone_number ?>">
                <?= form_error('phone_number')?>
              </div>
           </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= $creator->email?>">
                <?= form_error('email')?>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
          <?= form_close() ?>
         </div>
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
<!-- ./wrapper -->

    <?= $page_resource['admin_scripts'] ?>
</body>
</html>
