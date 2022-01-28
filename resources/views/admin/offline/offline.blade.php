@extends('admin.layouts')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Penjualan Offline</h1>
        </div>
        <!-- /.col-lg-12 -->

        <div class="col-md-6 text-right">

          <h1 class="page-header" id="totalheader">@currency(\Cart::session(Auth::guard('admin')->user()->id)->getTotal())</h1>

        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @include('admin.offline.formtransaksi')
              <hr>

              <div id="loadTransaksi">
                @include('admin.offline.transaksitabel')  
              </div>
              <hr>
              <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                  
                  {{-- action="{{ route('offline.proses.transaksi') }}"  --}}

                  <form id="formbayartrx" action="" method="post" autocomplete="off">
                      @csrf
                      @php
                      $iduser = Auth::guard('admin')->user()->id;
                      $total = \Cart::session($iduser)->getTotal();
                      @endphp
                      <input type="hidden" value="{{ $total }}" id="total" readonly>
                      <div class="form-group">
                          <input type="text" name="jumlahbayarview" id="jumlahbayarview" value="" class="form-control input-lg text-right" style="font-size: 23px" placeholder="Jumlah Bayar">

                          <input type="hidden" name="jumlahbayar" id="jumlahbayar">
                      </div>

                      <div class="form-group">
                          <input type="text" name="sisaview" id="sisaview" value="" class="form-control input-lg text-right" style="font-size: 23px" placeholder="Uang Kembali" readonly>

                          <input type="hidden" name="sisa" id="sisa">
                      </div>

                      <button style="display: none;" type="submit" id="simpantrx" xdisabled class="btn btn-primary btn-block">Simpan Transaksi</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

    </div>
</div>


@include('admin.offline.modalbarang')
@include('admin.offline.modalbayarkurang')

<script type="text/javascript">
  $(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function(){
        $( '#jumlahbayarview' ).mask('000.000.000', {reverse: true});
        $( '#jumlahbayarview' ).trigger('input');
    })


    $('#kodebarang').on('change',function(e){
        e.preventDefault();
        var kode = $(this).val();
        cariData(kode);
    })

    function cariData(xkode)
    {
        var url = "{{ route('offline.barang.cari') }}";
        $.get(url,{'kode':xkode},function(data){               
            var dt = data.list;
            if(data.sukses) {
                // alert(data.jenis)
                $('#kodebarang').val(dt.kode);
                $('#nama').val(dt.nama);
                $('#harga').val(dt.harga);

                $('#modalBarang').modal('hide');
                $('#jumlah').val('1');
                $('#jumlah').focus();
                var url = "{{ route('offline.jenisukuran.select') }}";
                $.get(url,{idbarang:dt.id},function(data){
                  $('#loadUkuranSelect').html(data);
                },'html')
            } else {
                bersihtransaksi();
            }
        },'json');
    }

    $('#jumlah').on('keypress',function(e){
        var keyCode = e.which;

        if(keyCode == 13) {
            e.preventDefault();
            simpantransaksi();
        }
    })

    function simpantransaksi()
    {
        var kodebarang = $('#kodebarang').val();
        var nama = $('#nama').val();
        var jumlah = $('#jumlah').val();
        var ukuran = $('#ukuran').val();
        var url = "{{ route('offline.save.temp.transaksi') }}";

        $.get(url,{
            'kodebarang':kodebarang,
            'ukuran':ukuran,
            'jumlah':jumlah,
        },function(data){
            if(data.sukses) {
                loadTransaksi()
                setTimeout(function(){
                    $('#kodebarang').val('');
                    bersihtransaksi();
                },'300')
            }
        },'json');

    }

    function bersihtransaksi()
    {
        $('#nama').val('');
        $('#harga').val('');
        $('#jumlah').val('');
    }

    function loadTransaksi()
    {
        var url = "{{ route('offline.temp.transaksi') }}";
        $.get(url,{},function(data){
            $('#loadTransaksi').html(data);
        },'html');

        var urltotal = "{{ route('offline.temp.transaksi.gettotal') }}";
        $.get(urltotal,{},function(data){
            $('#totalheader').html(data.total);
            $('#total').val(data.totalbayar);
        },'json');
    }

    $('#caribarang').on('keyup',function(){
        var url = '{{ route("offline.barang") }}';
        var keyword = $(this).val();
        // console.log(keyword);
        if(keyword) {
            $.get(url,{cari:keyword},function(data){
              $('#tampilbarang').html(data);
            },'html');
        } else {
            $('#tampilbarang').html('');
        }
    })

    $(document).on('click', 'a[data-kodebarang]', function(e) {
        var data = $(this).data();
        cariData(data.kodebarang);
        // alert(data.kodebarang);
    });

    // tabel stok barang

    $(document).on('click', 'a[data-kode]', function(e) {
        var data = $(this).data();
        $('#kodebarang').val(data.kode);
        $('#idstok').val(data.idstok);
        $('#harga').val(data.harga);

        $("#jumlah").attr("max",data.jumlahstok);
        $('#teksstok').text("Stok tersedia : " + data.jumlahstok);
        cariData(data.kode);
        $('#modalBarang').modal('hide');
    });

    //  proses uang kembali
    $('#jumlahbayarview').on('keyup',function(){
        if($(this).val() != '') {
          hitungsisa($(this));
        } else {
          $('#sisaview').val('');
        }
    })

    function hitungsisa(idproperty) {
      if($('#'.idproperty).val() != '') {
            var total = parseInt($('#total').val());
            var jumlah = $('#jumlahbayarview').val().split(".").join('');

            $('#jumlahbayar').val(jumlah);

            var jumlahbayar = parseInt(jumlah);

            if(jumlahbayar >= total) {
              var sisauang = total-jumlahbayar; 
              
              $('#sisa').val(sisauang);

              $('#sisaview').mask('000.000.000', {reverse: true});
              $('#sisaview').val(sisauang);
              $('#sisaview').trigger('input');
            }
      }
    }

     // proses save
     $('#jumlahbayarview').on('keypress',function(e){
       
       var keyCode = e.which;
       if(keyCode == 13) {
         e.preventDefault();
         if( $('#jumlahbayar').val() != '' && 
            parseInt($('#jumlahbayar').val()) >= parseInt($("#total").val())
         ) {

           $.ajax({
               url: "{{ route('offline.proses.transaksi') }}",
               type: 'post',
               dataType: 'json',
               data :  $('#formbayartrx').serialize(),
               success : function(data) {
                //  alert(data.url)
                 window.open(data.url, '_blank');
                 location.reload();
               }
           });
         } else {
           $('#modalKurangBayar').modal('show');
         }
         // ;
       }
   })
});

function enforceMinMax(el){
  if(el.value != ""){
    if(parseInt(el.value) < parseInt(el.min)){
      el.value = el.min;
    }
    if(parseInt(el.value) > parseInt(el.max)){
      el.value = el.max;
    }
  }
}
</script>

@endsection