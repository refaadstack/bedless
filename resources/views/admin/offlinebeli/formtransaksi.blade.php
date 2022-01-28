<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" id="kodebarang" name="kodebarang" class="form-control form-control-sm" value="" placeholder="Kode Barang" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>&nbsp;</label>
                  <br>
                  <a class="btn btn-primary btn-sm btn-lg btn-block" title="Cari Barang" data-toggle="modal" data-target="#modalBarang" style="color: white"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control form-control-sm" value="" placeholder="Nama"  readonly/>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-2">
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="text" id="harga" name="harga" class="form-control form-control-sm" value="" placeholder="Harga Beli"/>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="text" id="hargajual" name="hargajual" class="form-control form-control-sm" value="" placeholder="Harga Jual"/>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Ukuran</label>
            <div id="loadUkuranSelect">Pilih dahulu barang !</div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control form-control-sm" value="" min="1" onkeyup="enforceMinMax(this)" />
            <span id="teksstok" class="text-danger" style="font-size: 12px"></span>
        </div>
    </div>
     
</div>