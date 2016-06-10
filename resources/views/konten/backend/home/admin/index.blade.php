@extends('layouts.backend')

@section('konten')
  
 

<div class="col-md-12" >

 
    <h1>
        <i class="fa fa-home"></i> Dashboard
    </h1>
    <hr>

    <div class="row">
        <div class="col-md-12">  
          @include($base_view.'admin.info')

        </div>  
        <div class="col-md-12">
            <hr> 
        </div>          
    </div> 

  
</div>


 
@endsection
