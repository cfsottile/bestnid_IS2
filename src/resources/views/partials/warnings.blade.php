@if(Session::has('warning') )
	<div class="alert alert-warning" role="warning">
		<span class="glyphicon glyphicon-minus-sign"></span>
		Encuentro tu <strong> falta de permisos </strong> preocupante. <br><br>
		<span>{{Session::get('warning')}}</span>
	</div>
@endif
