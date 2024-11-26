<style>
    #map { height: 400px; }
</style>
<div id="map"></div>
<script>
    var lokasi = "{{ $absensi->location_in }}";
    var lok = lokasi.split(",");
    var latitude = lok[0];
    var longitude = lok[1];
    var map = L.map('map').setView([latitude, longitude], 17);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var marker = L.marker([latitude, longitude]).addTo(map);
    //nanti ganti L.circle([latitude, longitude] ke titik koordinat yang diinginkan
    var circle = L.circle([-6.2849024, 106.7679744], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 20
    }).addTo(map);
    var popup = L.popup()
    .setLatLng([latitude, longitude])
    .setContent("{{ $absensi->nama_lengkap }}")
    .openOn(map);
</script>