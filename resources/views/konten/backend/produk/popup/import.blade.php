<script type="text/javascript">
    $(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h1>
    Import Data Produk
</h1>

<div id="pesan"></div>

<hr>

<form action="{{ route('backend_produk.do_import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="userfile">Pilih File :</label>
                <input type="file" name="userfile" id="userfile">
            </div>

            <div class="form-group">
                <label for="ref_produk_id">Jenis Produk :</label>
                <select name="ref_produk_id" id="ref_produk_id" class="form-control">
                    @foreach($ref_produk as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="ref_satuan_produk_id">Satuan Barang :</label>
                <select name="ref_satuan_produk_id" id="ref_satuan_produk_id" class="form-control">
                    @foreach($satuan_barang as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="mst_cabang_id">Cabang :</label>
                <select name="mst_cabang_id" id="mst_cabang_id" class="form-control">
                    @foreach($mst_cabang as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <button class="btn btn-success" id="import" type="submit">
                <i class="fa fa-cloud-upload"></i> import
            </button>
            <a class="btn btn-success" href="/template_import/produk.xls">
                <i class="fa fa-th-list"></i> template import
            </a>
        </div>
    </div>
</form>

<script type="text/javascript">
$('#import').click(function(){
    var mst_cabang_id = $('#mst_cabang_id').val();
    var ref_produk_id = $('#ref_produk_id').val();

    if(mst_cabang_id == '' || ref_produk_id == ''){
        swal('error', 'isian belum lengkap', 'error');
        return false;
    }

    return true;
});

@if(!File::isWritable(storage_path('logs')))
    $('#pesan').html('<div class="alert alert-danger">masalah pada permision folder <b>/storage/logs</b> </div>')
    $('#import').attr('disabled', 'disabled');
@endif
</script>
