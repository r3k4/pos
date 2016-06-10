<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h1>
    Import Data Produk
</h1>


 <div id="pesan"></div>

    <hr>

{!! Form::open(['route' => 'backend_produk.do_import', 'files' => true ]) !!}
<div class="row">
    <div class="col-md-6">
        

        <div class="form-group">
            {!! Form::label('userfile', 'Pilih File : ') !!}
            {!! Form::file('userfile') !!}
        </div>

        <div class="form-group">
            {!! Form::label('ref_produk_id', 'Jenis Produk : ') !!}
            {!! Form::select('ref_produk_id', 
                             $ref_produk, 
                             '', 
                             ['id'  => 'ref_produk_id', 
                              'class' => 'form-control'
                              ]
                        ) !!}
        </div>

    
    </div>

    <div class="col-md-6 ">

            <div class="form-group">
                {!! Form::label('ref_satuan_produk_id', 'Satuan Barang : ') !!}
                {!! Form::select('ref_satuan_produk_id', 
                                 $satuan_barang, 
                                 '', 
                                 ['id'  => 'ref_satuan_produk_id', 
                                  'class' => 'form-control'
                                  ]
                            ) !!}
            </div>       
            
            <div class="form-group">
                {!! Form::label('mst_cabang_id', 'Cabang : ') !!}
                {!! Form::select('mst_cabang_id', 
                                 $mst_cabang, 
                                 '', 
                                 ['id'  => 'mst_cabang_id', 
                                  'class' => 'form-control'
                                  ]
                            ) !!}
            </div>


    </div>

    <div class="col-md-12">
        <button class='btn btn-success' id='import' type='submit'> <i class='fa fa-cloud-upload'></i> import</button>
        <a class='btn btn-success' href="/template_import/produk.xls"> <i class='fa fa-th-list'></i> template import</a>        
    </div>
             
</div>    
{!! Form::close() !!}












<script type="text/javascript">
$('#import').click(function(){

    mst_cabang_id = $('#mst_cabang_id').val();
    ref_produk_id = $('#ref_produk_id').val();
    // ref_satuan_produk_id = $('#ref_satuan_produk_id').val();

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

