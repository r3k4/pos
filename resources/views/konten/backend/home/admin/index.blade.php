@extends('layouts.backend')

@section('konten')
 
 
           
 

<div class="col-md-12" >
<component is="@{{ currentView }}"></component>
 
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


    <div class="row">
        <div class="col-md-8">
          @include($base_view.'admin.form_transaksi')
        </div>            
    </div>


        


</div>


 
@endsection
