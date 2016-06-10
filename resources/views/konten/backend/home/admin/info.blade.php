<div class="col-md-4">
  <div class="info-box bg-aqua">
    <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Jumlah Produk</span>
      <span class="info-box-number">{!! $jml_produk !!}</span>

      <div class="progress">
        <div class="progress-bar" style="width: 100%"></div>
      </div>
          <span class="progress-description">
            semua produk/item 
          </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->   
  
</div>    

<div class="col-md-4">
  <div class="info-box bg-red">
    <span class="info-box-icon"><i class="fa fa-shopping-bag"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Produk Kosong</span>
      <span class="info-box-number">{!! $jml_produk_stok_kosong !!}</span>

      <div class="progress">
        <div class="progress-bar" style="width: 100%"></div>
      </div>
          <span class="progress-description">
           produk yg tidak ada stok
          </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->   
</div>


<div class="col-md-4">
  <div class="info-box bg-olive">
    <span class="info-box-icon"><i class="fa fa-money"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">pengeluaran</span>
      <span class="info-box-number">  {!! fungsi()->rupiah($jml_pengeluaran_hr_ini) !!}  </span>

      <div class="progress">
        <div class="progress-bar" style="width: 100%"></div>
      </div>
          <span class="progress-description">
            jml pengeluaran hari ini
          </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->   
</div>

<div class="col-md-4">
  <div class="info-box bg-purple">
    <span class="info-box-icon"><i class="fa fa-exchange"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Transaksi</span>
      <span class="info-box-number">  {!! $jml_transaksi_today !!}  </span>

      <div class="progress">
        <div class="progress-bar" style="width: 100%"></div>
      </div>
          <span class="progress-description">
            jml transaksi hari ini
          </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->                
</div>


<div class="col-md-4">
  <div class="info-box bg-light-blue">
    <span class="info-box-icon"><i class="fa fa-th"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Jumlah Stok</span>
      <span class="info-box-number">  {!! $jml_all_stok_produk !!}  </span>

      <div class="progress">
        <div class="progress-bar" style="width: 100%"></div>
      </div>
          <span class="progress-description">
            jml semua stok produk
          </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->               
</div>



<div class="col-md-4">
  <div class="info-box bg-yellow">
    <span class="info-box-icon"><i class="fa fa-th-list"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Item Terjual</span>
      <span class="info-box-number">  {!! $jml_item_terjual_today !!}  </span>

      <div class="progress">
        <div class="progress-bar" style="width: 100%"></div>
      </div>
          <span class="progress-description">
            Item yg terjual hr ini
          </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->               
</div>
