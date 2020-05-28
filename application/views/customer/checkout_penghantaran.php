<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('customer/header');
?>

<div class="progress rounded-0 sticky-top" style="height: 8px; top: 68px;">
	<div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<!--== Header Hero ==-->
<section class="section-padding width mx-auto mt-64 min-vh-md-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-no-gutter">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('produk') ?>">transaksi</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= 'no pemesanan' ?></li>
					</ol>
				</nav>
                <h1 class="h2 mb-5"> 
                    <span class="font-weight-bold">Pengiriman barang</span>
                    <span class="text-muted float-right">Step 2</span> 
                </h1>
                
				<form action="" method="post">
					<div class="text-block">
						<div class="row mb-3">
                            <div class="col">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="labelPenghantaran1" name="tipePenghantaran"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label font-weight-500" for="labelPenghantaran1">Hantar</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="labelPenghantaran2" name="tipePenghantaran"
                                        class="custom-control-input">
                                    <label class="custom-control-label font-weight-500" for="labelPenghantaran2">Ambil di Toko kami</label>
                                </div>
                            </div>
						</div>
						<div class="form-group">
							<label class="input-label" for="alamatTujuanLabel">Alamat pengiriman</label>
							<textarea type="text" class="form-control" name="tujuan" id="alamatTujuanLabel" rows="3" placeholder="Alamat pengiriman" required="" value="<?= @$nama ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                <label class="form-check-label" for="defaultCheck1">
                                    Simpan alamat untuk transaksi selanjutnya.
                                </label>
                            </div>
                        </div>

						<div class="">
							<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
							<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />

							<div id='map' style='width: 100%; height: 500px;'></div>
 
							<script src="https://npmcdn.com/@turf/turf@5.1.6/turf.min.js"></script>
							<script>
								mapboxgl.accessToken = 'pk.eyJ1IjoiZmFocnVsNDIxNSIsImEiOiJja2FlOTJyYmkwaDl2MzJtYndya2hhbjUwIn0.AqbaEqFZYd4YLlVhrSJDlw';
								
								var lngLat = [112.643591, -7.951986];

								var map = new mapboxgl.Map({
									container:  'map',
									style:      'mapbox://styles/mapbox/streets-v11',
									center:     lngLat,
									zoom:       15,
								});

								var marker = new mapboxgl.Marker()
									.setLngLat(lngLat)
									.addTo(map);
							</script>
						</div>

						<div class="form-group">
							<label class="input-label" for="jarak">Jarak</label>
							<div class="row">
								<div class="col-2">
									<input type="text" id="distance" class="distance-container form-control" disabled>
									<script>
										var distanceContainer = document.getElementById('distance');
 
										// GeoJSON object to hold our measurement features
										var geojson = {
											'type': 'FeatureCollection',
											'features': []
										};
										
										// Used to draw a line between points
										var linestring = {
											'type': 'Feature',
											'geometry': {
												'type': 'LineString',
												'coordinates': []
											}
										};

										if (geojson.features.length < 1) {
											var point = {
												'type': 'Feature',
												'geometry': {
												'type': 'Point',
												'coordinates': lngLat
												},
												'properties': {
													'id': String(new Date().getTime())
												}
											};
											
											geojson.features.push(point);
										}
										
										map.on('load', function() {
											map.addSource('geojson', {
												'type': 'geojson',
												'data': geojson
											});
											
											// Add styles to the map
											map.addLayer({
												id: 'measure-points',
												type: 'circle',
												source: 'geojson',
												paint: {
													'circle-radius': 5,
													'circle-color': '#000'
												},
												filter: ['in', '$type', 'Point']
											});
											map.addLayer({
												id: 'measure-lines',
												type: 'line',
												source: 'geojson',
												layout: {
													'line-cap': 'round',
													'line-join': 'round'
												},
												paint: {
													'line-color': '#000',
													'line-width': 2.5
												},
												filter: ['in', '$type', 'LineString']
											});
											
											map.on('click', function(e) {
												var features = map.queryRenderedFeatures(e.point, {
													layers: ['measure-points']
												});
											
												// Remove the linestring from the group
												// So we can redraw it based on the points collection
												if (geojson.features.length > 1) geojson.features.pop();
												
												// Clear the Distance container to populate it with a new value
												distanceContainer.value = '';
												
												// If a feature was clicked, remove it from the map
												if (features.length) {
													var id = features[0].properties.id;
													geojson.features = geojson.features.filter(function(point) {
														return point.properties.id !== id;
													});
												} else {
													var point = {
														'type': 'Feature',
														'geometry': {
														'type': 'Point',
														'coordinates': [e.lngLat.lng, e.lngLat.lat]
														},
														'properties': {
															'id': String(new Date().getTime())
														}
													};
													
													geojson.features.push(point);
												}
												
												if (geojson.features.length > 1) {
													linestring.geometry.coordinates = geojson.features.map(function(point) {
														return point.geometry.coordinates;
													});
													
													geojson.features.push(linestring);
													
													// Populate the distanceContainer with total distance
													distanceContainer.value = parseFloat(turf.length(linestring).toLocaleString()).toFixed(1);
												}
											
												map.getSource('geojson').setData(geojson);
											});
										});
										
										map.on('mousemove', function(e) {
											var features = map.queryRenderedFeatures(e.point, {
												layers: ['measure-points']
											});
											// UI indicator for clicking/hovering a point on the map
											map.getCanvas().style.cursor = features.length ? 'pointer' : 'crosshair';
										});
									</script>
								</div>
								<div class="col-2">
									<label class="form-control text-center">KM</label>
								</div>							
							</div>
                        </div>

						<!-- Google Maps -->
						<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD60xZgkRwRkHp5Hw0BAb_cGfMid_gO_Xs&callback=initMap" async defer></script>
						<div id="show_maps" style="width:750px;height:500px"></div>
						<script type="text/javascript">
							function initMap() {
								var map = new google.maps.Map(document.getElementById('show_maps'), {
									center: {
										lat: -7.954585,
										lng: 112.644747
									},
									zoom: 15,
								});
							}
						</script> -->
						<!-- End Google Maps -->
                    </div>
                    <?php $this->load->view('customer/checkout_penghantaran_jaminan'); ?>
				</form>
				<div class="row space-1 flex-column flex-sm-row">
					<div class="col text-center text-sm-left">
                        <a class="btn btn-link text-muted" href="<?= base_url('customer/checkout') ?>"> 
                        <i class="fa-chevron-left fa mr-2"></i>Back</a>
					</div>
					<div class="col text-center text-sm-right">
                        <a class="btn btn-primary px-3" href="<?= base_url('customer/checkout_detail_pemesanan') ?>"> 
                        Next step<i class="fa-chevron-right fa ml-2"></i></a>
                    </div>
				</div>
			</div>
			<div class="col-lg-5 pl-xl-5">
				<div class="card border bg-light">
					<div class="card-header bg-black">
						<h5 class="m-0 text-white">Ringkasan pesanan</h5>
					</div>
					<div class="card-body p-4">
						<div class="pb-0">
							<table class="w-100">
								<tbody>
									<tr>
										<th class="font-weight-normal py-2">Subtotal</th>
										<td class="text-right py-2">Rp 30.000</td>
									</tr>
									<tr>
										<th class="font-weight-normal pt-2 pb-3 text-info">Biaya antar</th>
										<td class="text-right pt-2 pb-3 text-info">Rp 70.000</td>
									</tr>
								</tbody>
								<tfoot>
									<tr class="border-top">
										<th class="pt-3">Total</th>
										<td class="font-weight-bold text-right pt-3">Rp 80.000</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!--== Header Hero ==-->
<?php $this->load->view("customer/footer.php") ?>
