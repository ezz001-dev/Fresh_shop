@extends('layout.masterAdmin')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col -md-6">
			<input type="text" class="form-control" name="Search" placeholder="Search">
		</div>
	</div>
	<br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
	    <th scope="col">Addres</th>
      <th scope="col">City</th>
      <th scope="col">Provinci</th>      
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1;?>
    @foreach($data as $row)
    <tr>
      <th scope="row">{{$no++}}</th>
      <td>{{$row->username}}</td>
      <td>{{$row->addres}}</td>
      <td>{{$row->city}}</td>
      <td>{{$row->provinci}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->phone}}</td>
      <td>
        @if(Auth::user()->id != $row->id)
      	<a href="#" class="btn btn-danger btn-small">Banned</a>
        @else
        <!-- <a href="#" class="btn btn-info small" data-toggle="modal" data-target="#editAdmin{{$row->id}}">Edit</a> -->
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>




@foreach($data as $row)
<div class="modal fade" id="editAdmin{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Edit Profile</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-editAdmin" action="{{url('/admin/edit')}}" method="POST">
          @csrf
          <input type="text" name="id" value="{{$row->id}}">
          <div class="form-group">
            <label for="images">
              <img src="{{url('freshshop/images/products/adi.png')}}" style="height: 50px; width: 50px;" class="rounded-circle"> 
            </label>
            <input type="file" name="images" id="images" class="file form-control">
          </div>
          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="username" id="name" class="form-control" value="{{$row->username}}">
          </div>
          <div class="form-group">
            <label for="phone"> Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{$row->phone}}">
          </div>

          <div class="form-group">
            <label for="gender"> Gender </label>
            <select class="custom-select" name="gender" id="city">
              <option disabled="" selected> Select Gender </option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>

          <div class="form-group">
            <label for="profesi"> Profesi </label>
            <select class="custom-select" name="profesi" id="profesi">
              <option disabled="" selected> Select Profesi </option>
              <option value="petani">Petani</option>
              <option value="pedagang">Pedagang</option>
            </select>
          </div>
          <div class="form-group">
            <label for="addres">Addres</label>
            <input type="text" name="addres" id="addres" class="form-control" value="{{$row->addres}}">
          </div>
          <div class="form-group">
            <label for="city"> City </label>
            <select class="custom-select" name="city" id="city">
              <option disabled="" selected> Choose Your City </option>
              <option value="garut">Garut</option>
              <option value="jakarta">Jakarta</option>
              <option value="bandung">Bandung</option>
            </select>
          </div>
          <div class="form-group">
            <label for="city"> Provinci </label>
            <select class="custom-select" name="provinci" id="city">
              <option selected disabled="">Choose Your Provinci</option>
              <option value="jawa barat">Jawa Barat</option>
              <option value="jawa timur">Jawa Timur</option>
              <option value="jawa tengah">Jawa Tengah</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button onclick="document.getElementById('form-editAdmin').submit();" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
@endforeach


@endsection