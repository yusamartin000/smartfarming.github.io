  <!DOCTYPE html>
  <html>
  <head>
  	<?php 
		$sumber = "https://api.thingspeak.com/channels/1563912/feeds.json?results=2";
		$get_json = file_get_contents($sumber);
		$get_data = json_decode($get_json, true);
		
		// var_dump($get_data);
			foreach ($get_data['feeds'] as $value) {
			$suhu_ruangan = (float) $value['field1'];
			$kelembaban_ruangan = (int) $value['field2'];
			$kelembaban_tanah = (int) $value['field3'];
			$intensitas_cahaya = (int) $value['field4']; $x = $intensitas_cahaya / 5056 * 100; $persen_cahaya = (int) $x;
			$ketinggian_air = (float) $value['field5']; $y = $ketinggian_air / 22 * 100; $persen_air = (int) $y;
			}
 	?>
 	<!-- My css -->
 	<style type="text/css">
 		body {
 			padding: 20px;
 		}
 		.card {
 			padding: 30px;
 		}
 		img {
 			width: 50%;
 			margin: auto;
 		}
 		.judul {
 			text-align: center;
 		}
 		.col-sm {
 			border: 1px solid #000;
 			margin: 10px;
 			border-radius: 10px;
 		}
 		.col-sm h1 {
 			font-weight: bold;
 		}
 		.small-icon {
 			width: 40px;
 		}
		.progress-bar-vertical {
		  width: 20px;
		  min-height: 100px;
		  margin-right: 20px;
		  float: left;
		  display: -webkit-box;  /* OLD - iOS 6-, Safari 3.1-6, BB7 */
		  display: -ms-flexbox;  /* TWEENER - IE 10 */
		  display: -webkit-flex; /* NEW - Safari 6.1+. iOS 7.1+, BB10 */
		  display: flex;         /* NEW, Spec - Firefox, Chrome, Opera */
		  align-items: flex-end;
		  -webkit-align-items: flex-end; /* Safari 7.0+ */
		}

		.progress-bar-vertical .progress-bar {
		  width: 100%;
		  height: 0;
		  -webkit-transition: height 0.6s ease;
		  -o-transition: height 0.6s ease;
		  transition: height 0.6s ease;
		}
 	</style>
  	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  	<title>smartfarming</title>
  </head>
  <body class="bg-light">
  	<div class="card bg-light">
  		<img src="plant.png">
	  	<h1 class="judul" style="font-size: 4em; font-weight: bold;">SISTEM MONITORING SMARTFARMING</h1>
	  	<h2 class="judul">POLITEKNIK MASAMY INTERNASIONAL</h2>
	  	<h2 class="judul">BANYUWANGI</h2>
	  	<h2 class="judul">2022</h2>
	  	<br>
	  	<div class="row">
	  		<div class="col-sm">
	  			<h5><img src="suhu-ruangan.png" class="small-icon"> Suhu Ruangan</h5>
				<h1><?=  $suhu_ruangan;?> C</h1>
	  		</div>
	  		<div class="col-sm">
	  			<h5><img src="kelembaban-ruangan.png" class="small-icon"> Kelembaban Ruangan</h5>
				<h1><?=  $kelembaban_ruangan;?> %</h1>
	  		</div>
	  		<div class="col-sm">
	  			<h5><img src="ketinggian-air.png" class="small-icon"> ketinggian air</h5>
				<h1><?=  $ketinggian_air;?> cm</h1>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col-sm">
	  			<h5><img src="intensitas-cahaya.png" class="small-icon"> Intensitas Cahaya</h5>
				<h1><?=  $intensitas_cahaya;?> LUX</h1>
	  		</div>
	  		<div class="col-sm">
	  			<h5><img src="kelembaban-tanah.png" class="small-icon"> Kelembaban Tanah</h5>
				<h1><?=  $kelembaban_tanah;?> %</h1>
	  		</div>

	  	</div>
  	</div>
  	<br>
  	<div class="card">
  		<h1 class="judul">Monitoring Suhu dan Kelembaban Ruangan</h1><br>
  		<div class="row">
  			<div class="col">
  				<iframe width="100%" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1563912/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Grafik+Suhu+Ruangan&type=line&xaxis=Waktu&yaxis=Celcius"></iframe>
  			</div>
  			<div class="col">
  				<iframe width="100%" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1563912/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Grafik+Kelembaban+Ruangan&type=line&xaxis=Waktu&yaxis=Percentace"></iframe>
  			</div>
  		</div>	
  		<div class="row">
  			<div class="col">
  				<h5>Suhu Ruangan</h5>
				<h1><?=  $suhu_ruangan;?> C</h1>
  			</div>
  			<div class="col">
  				<h5>Kelembaban Ruangan</h5>
				<h1><?=  $kelembaban_ruangan;?> %</h1>
  			</div>	
  		</div>	
  	</div>
  	<br>
  	<div class="card">
  		<div class="row">
  			<div class="col">
  				<iframe width="100%" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1563912/charts/3?bgcolor=%23ffffff&color=%2305f531&dynamic=true&results=60&title=Grafik+Kelembaban+Tanah&type=line&xaxis=Waktu&yaxis=Percentace"></iframe>
  			</div>
  			<div class="col">
  				<div class="progress progress-bar-vertical" style="height: 100%; width: 100px;">
				  <div class="progress-bar" role="progressbar" aria-valuenow="<?=  $kelembaban_tanah;?>" aria-valuemin="0" aria-valuemax="100" style="height: <?=  $kelembaban_tanah;?>%; background-color: #05f531;">
				    <span class="sr-only" style="font-weight: bold;"><?=  $kelembaban_tanah;?>%</span>
				  </div>
				</div>
				<h5>Kelembaban Tanah</h5>
				<h1><?=  $kelembaban_tanah;?> %</h1>
				<h5>Pompa Penyiraman Otomatis</h5>
				<?php if ($kelembaban_tanah < 50 ) { ?>
					<input type="radio"checked>
				    <label>Nyala</label> <br>
					<input type="radio">
				    <label>Mati</label>
				<?php } else { ?>
					<input type="radio">
				    <label>Nyala</label> <br>
					<input type="radio"checked>
				    <label>Mati</label>
				<?php } ?>
  			</div>
  		</div>
  	</div>
  	<br>
  	<div class="card">
  		<div class="row">
  			<div class="col">
  				<iframe width="100%" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1563912/charts/4?bgcolor=%23ffffff&color=%23faee02&dynamic=true&results=60&title=Grafik+Intensitas+Cahaya&type=line&xaxis=Waktu&yaxis=LUX"></iframe>
  			</div>
  			<div class="col">
  				<div class="progress progress-bar-vertical" style="height: 100%; width: 100px;">
				  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $persen_cahaya;?>" aria-valuemin="0" aria-valuemax="100" style="height: <?= $persen_cahaya;?>%; background-color: #faee02;">
				    <span class="sr-only" style="font-weight: bold;"><?= $persen_cahaya;?>%</span>
				  </div>
				</div>
				<h5>Intensitas Cahaya</h5>
				<h1><?=  $intensitas_cahaya;?> LUX</h1>
				<h5>Penggunaan lampu</h5>
				<?php if ($persen_cahaya < 2528 ) { ?>
					<p style="color: red">Dibutuhkan cahaya tambahan dari lampu agar tanaman tetap memiliki suplai cahaya yang optimal!</p>
				<?php } else { ?>
					<p style="color: green">Cahaya didalam greenhouse dalam intensitas yang optimal untuk tanaman</p>
				<?php } ?>
  			</div>
  		</div>
  	</div>
  	<br>
  	<div class="card">
  		<div class="row">
  			<div class="col">
  				<iframe width="100%" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1563912/charts/5?bgcolor=%23ffffff&color=%230286fa&dynamic=true&results=60&title=Grafik+ketinggian+Air&type=line&xaxis=Waktu&yaxis=LUX"></iframe>
  			</div>
  			<div class="col">
  				<div class="progress progress-bar-vertical" style="height: 100%; width: 100px;">
				  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $persen_air;?>" aria-valuemin="0" aria-valuemax="100" style="height: <?= $persen_air;?>%; background-color: #0286fa;">
				    <span class="sr-only" style="font-weight: bold;"><?= $persen_air;?>%</span>
				  </div>
				</div>
				<h5>Ketinggian Air</h5>
				<h1><?=  $ketinggian_air;?> cm</h1>
				<h5>Pompa Pengisian Toren</h5>
				<?php if ($ketinggian_air < 22 ) { ?>
					<input type="radio"checked>
				    <label>Nyala</label> <br>
					<input type="radio">
				    <label>Mati</label>
				<?php } else { ?>
					<input type="radio">
				    <label>Nyala</label> <br>
					<input type="radio"checked>
				    <label>Mati</label>
				<?php } ?>
  			</div>
  		</div>
  	</div>
  	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
  </html>