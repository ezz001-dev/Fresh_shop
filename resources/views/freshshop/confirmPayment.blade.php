@extends('layout.master')
@section('content')	
	@if($message = Session::get('payment'))
		<br><br>
		<div class="card container">
			<div class="container">
				<br><br>
				<div class="alert alert-success alert-block">
	            	<button type="button" class="close" data-dismiss="alert">×</button> 
	            	<strong>{{ $message }}</strong>
	          	</div>
	          	<br><br>
			</div>
		</div>
		<br><br>
	@endif
@endsection