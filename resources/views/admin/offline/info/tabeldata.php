<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="<?php echo site_url('keluar') ?>" class="btn btn-warning btn-sm"><i class="fa fa-angle-left"></i> Kembali</a>    
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php echo linkbc('barang keluar') ?>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      <?php $this->load->view('keluar/info/periode') ?>
      
      <div class="card">
     
        <div class="card-body">
          
          <div id="loadData">
            
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modalDetailBarangKeluar" tabindex="-1" role="dialog" aria-labelledby="prosesHapus" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rincian Barang Keluar</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="loadDetailBarangKeluar"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){

    // modal
    $('#modalDetailBarangKeluar').on('show.bs.modal', function (e) {
      var target = $(e.relatedTarget);
      var data = target.data('id');

      var url = "<?php echo site_url('keluar/loadDetailBarangKeluar') ?>";
      $.get(url,{kode:data},function(data){
        $('#loadDetailBarangKeluar').html(data);
      },'html');
    })

    $('#btn_tampilkan').on('click',function(){
        var bulan = $('#bln_bulan').val();
        var tahun = $('#bln_tahun').val();
        getData(bulan,tahun);
    });

    function getData(xbulan,xtahun) {

        var url = "<?php echo site_url('keluar/loadTabelKeluar') ?>";
        $.get(url,{
          bulan:xbulan,
          tahun:xtahun
        },function(data){
            $('#loadData').html(data);
        },'html');
    }
})
</script>