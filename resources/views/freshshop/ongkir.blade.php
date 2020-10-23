@extends('layout.master')
@section('content')

<br>
<br>
<div class="container">
	<div class="card">
		<form class="form-horizontal" id="ongkir" method="POST">
			@csrf
            <div class="form-group">
              <label class="control-label col-sm-3">Kota Asal:</label>
              <div class="col-sm-9">
                <select class="form-control" id="kota_asal" name="kota_asal" required="">
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Kota Tujuan</label>
              <div class="col-sm-9">          
                <select class="form-control" id="kota_tujuan" name="kota_tujuan" required="">
                  <option></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Kurir</label>
              <div class="col-sm-9">          
                <select class="form-control" id="kurir" name="kurir" required="">
                  <option value="jne">JNE</option>
                  <option value="tiki">TIKI</option>
                  <option value="pos">POS INDONESIA</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Berat (Kg)</label>
              <div class="col-sm-9">          
                <input type="text" class="form-control" id="berat" name="berat" required="">
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-3 col-sm-8">
                <button type="submit" class="btn btn-default">Cek</button>
              </div>
            </div>
          </form>
	</div>
</div>
<br>
<br>



<script>
	$(document).ready(function(){
		  $('#kota_asal').select2({
		     placeholder: 'Pilih kota/kabupaten asal',
		     language: "id",
		  });

		  $('#kota_tujuan').select2({
		     placeholder: 'Pilih kota/kabupaten tujuan',
		     language: "id"
		  });

		    $.ajax({
		      type: "GET",
		      dataType: "html",
		      url: "/kota_asal",
		      success: function(msg){
		      $("select#kota_asal").html(msg);                                                     
		      }
		    });    
		 
		 $.ajax({
		      type: "GET",
		      dataType: "html",
		      url: "kota_tujuan",
		      success: function(msg){
		      $("select#kota_tujuan").html(msg);                                                     
		      }
		   });


		 // Cek Ongkir
		 $("#ongkir").submit(function(e) {
	      e.preventDefault();
	      $.ajax({
	          url: '/cek_ongkir',
	          type: 'post',
	          data: $( this ).serialize(),
	          success: function(data) {
	            console.log(data);
	            document.getElementById("response_ongkir").innerHTML = data;
	          }
	      });
	  });


	});

</script>
@endsection