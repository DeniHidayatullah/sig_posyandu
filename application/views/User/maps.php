<?php $this->load->view('templates/header');
// if ($this->session->userdata('username') == null) {
//     redirect('auth');
// }
?>
<style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
        top: 10px;

        height: 575px;
        width: 1200px;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #ffff;
        padding: 5px;
        border: 1px solid #9999;
        text-align: center;
        font-family: 'Roboto', 'sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }

    #floating-panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        width: 350px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
    }

    /* #latlng {} */
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php $this->load->view('templates/navbar'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- <div class="row">
                    <button type="button" style="margin-top: 30px;" class="btn btn-primary" onclick="getLocation()">Get Lokasi</button>
                </div> -->
            <div id="map"></div>
            <br>

            <!-- <footer class="footer text-center" style="margin-top: 30px;">
                COPYRIGHT © BIKEA TECHNOCRAFT 2021
            </footer> -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url() ?>assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/pages/chart/chart-page-init.js"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?&key=AIzaSyAFTimIhQoFCg8bF7PAMgDWi38QqqvaCx8&callback=initAutocomplete" async defer></script>

    <script>
        let lati;
        let long;

        function tampil_data() {
            $.ajax({
                url: "<?php echo base_url() ?>Transaksi/getDataBarang",
                method: 'GET',
                dataType: 'JSON',
                success: function(result) {
                    lati = val(result.latitude);
                    long = val(result.longtitude);
                }
            })
        }

        function initAutocomplete() {
            var mapCanvas = document.getElementById('map');
            var center = new google.maps.LatLng(-8.346906, 113.472440);
            var mapOptions = {
                zoom: 14,
                center: center
            };
            map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
                position: center,
                map: map,
                title: "Rumah Anda!"
            });

            // Membuat Kotak pencarian terhubung dengan tampilan map
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);


            var markers = [];
            // Mengaktifkan detail pada suatu tempat ketika pengguna
            // memilih salah satu dari daftar prediksi tempat 
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // menghilangkan marker tempat sebelumnya
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // Untuk setiap tempat, dapatkan icon, nama dan tempat.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };



                    // Membuat Marker untuk setiap tempat
                    markers.push(new google.maps.Marker({

                        map: map,
                        icon: icon,
                        title: place.name,
                        position: map,
                        drag: true

                    }));
                    var lat = place.geometry.location.lat();
                    var lng = place.geometry.location.lng();

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                        document.getElementById("latlong").value = lat + ',' + lng;
                        //document.getElementById('lng').value=lng; 
                    } else {
                        bounds.extend(place.geometry.location);

                    }
                });
                map.fitBounds(bounds);
            });
            google.maps.event.addListener(marker, 'drag', function() {
                // ketika marker di drag, otomatis nilai latitude dan longitude
                //menyesuaikan dengan posisi marker 
                updateMarkerPosition(marker.getPosition());
            });
        }
    </script>

    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function() {

            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>

</body>

</html>