<div class="row">
  <div class="col-12">
    <div class="card ">
     
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
              <label>Bulan</label>
              <select name="bulan" id="bln_bulan" class="form-control form-control-sm">
                  <option value="">--Bulan--</option>
                  <?php foreach(databulan() as $key => $val) { ?>
                  <option 
                  value="<?php echo $key ?>"
                  <?php echo ($key == date('m') ? 'selected' : '') ?>
                  >
                      <?php echo $val ?>
                  </option>
                  <?php } ?>
              </select>
          </div>
          <div class="col-md-4">
              <label>Tahun</label>
              <select name="tahun" id="bln_tahun" class="form-control form-control-sm">
                  <option value="">--Tahun--</option>
                  <?php for($i = date('Y'); $i >= 2020; $i--) { ?>
                  <option 
                  value="<?php echo $i ?>"
                  <?php echo ($i == date('Y') ? 'selected' : '') ?>
                  ><?php echo $i ?></option>
                  <?php } ?>
              </select>
          </div>     
        </div>
      </div>
      <div class="card-footer text-muted">
        <button id="btn_tampilkan" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Tampilkan</button>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

</div>