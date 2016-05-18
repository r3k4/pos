<nav class="nav-sidebar">
    <ul class="nav">
    
        <li @if(isset($backend_home)) class="active" @endif>
        	<a href="{!! route('backend_home_index') !!}">
        		<i class='fa fa-home'></i> Home
        	</a>
        </li>


 
    </ul>
</nav>