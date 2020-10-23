@extends('layout.master')

@section('content')

<div class="container">
	<a href="{{url('pdf/cetakPdf')}}" class="btn btn-outline-info">Convert to Pdf</a>
	<button class="btn btn-outline-primary" id="api">Test Api</button>
	<br>
	<br>

	<table class="table table-striped table-dark">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">First</th>
	      <th scope="col">Last</th>
	      <th scope="col">Handle</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th scope="row">1</th>
	      <td>Mark</td>
	      <td>Otto</td>
	      <td>@mdo</td>
	    </tr>
	    <tr>
	      <th scope="row">2</th>
	      <td>Jacob</td>
	      <td>Thornton</td>
	      <td>@fat</td>
	    </tr>
	    <tr>
	      <th scope="row">3</th>
	      <td>Larry</td>
	      <td>the Bird</td>
	      <td>@twitter</td>
	    </tr>
	  </tbody>
	</table>


</div>

<script>
	
	$(document).ready(function(){
		$('#api').on('click',function(){
			$.ajax({
				url:'https://sumedangkab.go.id/index.php/berita/apisumedangkab',
				crossDomain: true,
   				dataType: 'json',
				success:function(data){
					console.log(data);
				},
			});
		});
	});

</script>



@endsection