@extends('layout.masterAdmin')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<input type="text" class="form-control" name="Search" placeholder="Search">
		</div>
	</div>
  <br>
  <h3>Order Product</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"> No</th>
      <th scope="col"> User_Name</th>
	    <th scope="col"> Product_Name</th>      
      <th scope="col"> Quantity</th>
      <th scope="col"> Price </th>
      <th scope="col"> Total_Price</th>
      <th scope="col"> Status </th>
      <th scope="col"> Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
    <tr>
      <th scope="row">1</th>
      <td>Adi</td>
      <td>Brokoli</td>
      <td>12</td>
      <td>Rp 5000</td>
      <td>Rp 60.000</td>
      <td><a href="#" class="badge badge-info">Onprocess</td>
      <td>
      	<a href="#" class="btn btn-danger small">Delete</a> 
      	<a href="#" class="btn btn-info small">Edit</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection