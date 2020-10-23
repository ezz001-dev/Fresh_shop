<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiRajaOngkir extends Controller
{

	public function index(){
		// Url
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost?",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ab95097dfda8162569d6d80a9eb1cb20"
		  ),
		));

		$response = curl_exec($curl);
		$err 	  = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  dd( "cURL Error #:" . $err);
		} else {
			// json_decode ( string $json [, bool $assoc = FALSE [, int $depth = 512 [, int $options = 0 ]]] ) 
		dd($response);
		  $result = json_decode ( $response , true );
		  $txt = '';
		  foreach ($result as $key ) {
		  	foreach ($key['results'] as $row ) {
		  		 $txt .= $row["province"];
		  	}
		  }

		  echo $txt;
		}
	
	}

	public function ongkir(){
		return view('freshshop.ongkir');
	}

	public function kota_asal(){
		  $curl = curl_init(); 
		  curl_setopt_array($curl, array(
		    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		      "key: ab95097dfda8162569d6d80a9eb1cb20"
		    ),
		  ));

		  
		  $response = curl_exec($curl);
		  $err = curl_error($curl);
		  curl_close($curl);
		  $data = json_decode($response, true);
		  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
		      echo "<option></option>";
		      echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
		  }
	}


	public function kota_tujuan(){
		$curl = curl_init(); 
		  curl_setopt_array($curl, array(
		    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		      "key: ab95097dfda8162569d6d80a9eb1cb20"
		    ),
		  ));
		  $response = curl_exec($curl);
		  $err = curl_error($curl);
		  curl_close($curl);
		  $data = json_decode($response, true);
		  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
		      echo "<option></option>";
		      echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
		  }	
	}


	public function cek_ongkir(Request $request){

		   $kota_asal   = $request->kota_asal;
		   $kota_tujuan = $request->kota_tujuan;
		   $kurir		= $request->kurir;
		   $berat 		= $request->berat*1000;


		   $curl = curl_init();
		   curl_setopt_array($curl, array(
		   CURLOPT_URL 			  => "http://api.rajaongkir.com/starter/cost",
		   CURLOPT_RETURNTRANSFER => true,
		   CURLOPT_ENCODING 	  => "",
		   CURLOPT_MAXREDIRS 	  => 10,
		   CURLOPT_TIMEOUT 		  => 30,
		   CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
		   CURLOPT_CUSTOMREQUEST  => "POST",
		   CURLOPT_POSTFIELDS 	  => "origin=".$kota_asal."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir."",
		   CURLOPT_HTTPHEADER 	  => array(
		     "content-type: application/x-www-form-urlencoded",
		     "key: ab95097dfda8162569d6d80a9eb1cb20",
		   ),
		 ));


		 $response = curl_exec($curl);
		 $err = curl_error($curl);
		 curl_close($curl);
		 $txt = '';
		 $data= json_decode($response, true);
		 foreach ($data as $key) {
		 	foreach ($key["results"] as $row) {
		 		
		 	}
		 }

		  	dd($row);

	}

    
}
