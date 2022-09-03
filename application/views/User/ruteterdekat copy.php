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


.leaflet-div-icon {
    background: transparent;
    border: none;
}

.leaflet-marker-icon .number {
    position: relative;
    top: -38px;
    right: -10px;
    font-size: 14px;
    width: 25px;
    text-align: center;
    color: white;
}

.icon2 {
    position: relative;
    right: -10px;
    font-size: 14px;
    width: 25px;
    text-align: center;
    color: white;
}

.icon {
    position: relative;
    right: -10px;
    font-size: 14px;
    width: 25px;
    text-align: center;
    color: white;
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

    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">

        <!-- Topbar header - style you can find in pages.scss -->
        <?php $this->load->view('templates/navbar'); ?>
        <!-- End Topbar header -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Rute Terdeket Menuju Posyandu</h4>
                        <div class="ml-auto text-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="map" style="width: 100%; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Container fluid  -->

            <!-- footer -->
            <footer class="footer text-center" style="margin-top: 10px;">
                COPYRIGHT © 2022
            </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
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
    <script src="https://unpkg.com/leaflet-extra-markers@1.2.1/dist/js/leaflet.extra-markers.js"></script>
    <script>
    var map = L.map('map').setView([-8.0120475, 113.8296833], 13);
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

    L.NumberedDivIcon = L.Icon.extend({
        options: {
            // EDIT THIS TO POINT TO THE FILE AT http://www.charliecroom.com/marker_hole.png (or your own marker)
            iconUrl: '<?= base_url('icon/map.svg'); ?>',
            number: '',
            shadowUrl: null,
            iconSize: new L.Point(45, 40),
            iconAnchor: new L.Point(13, 41),
            popupAnchor: new L.Point(0, -33),
            /*
            iconAnchor: (Point)
            popupAnchor: (Point)
            */
            className: 'leaflet-div-icon'
        },

        createIcon: function() {
            var div = document.createElement('div');
            var img = this._createImg(this.options['iconUrl']);
            var numdiv = document.createElement('div');
            numdiv.setAttribute("class", "number");
            numdiv.innerHTML = this.options['number'] || '';
            div.appendChild(img);
            div.appendChild(numdiv);
            this._setIconStyles(div, 'icon');
            return div;
        },

        //you could change this to add a shadow like in the normal marker if you really wanted
        createShadow: function() {
            return null;
        }
    });


    // <?php foreach ($ruteterdekat as $key => $value) { ?>
    // L.marker([<?= $value->latitude; ?>, <?= $value->longitude; ?>], {
    //         icon: new L.NumberedDivIcon({
    //             number: '<?= $value->nama_simpul; ?>'
    //         })
    //     })
    //     .bindPopup(
    //         "<h5><b>Nama Titik : <?= $value->nama_simpul; ?>"
    //     )
    //     .addTo(map);

    // <?php } ?>//kalau dikasi titik jalur

    // <?php foreach ($rute as $key => $valuee) { ?>
    // var routeControl = L.Routing.control({
    //     waypoints: [
    //         L.latLng(<?= $valuee->latawal; ?>, <?= $valuee->longawal; ?>),
    //         L.latLng(<?= $valuee->lattujuan; ?>, <?= $valuee->longtujuan; ?>)
    //     ],
    //     routeWhileDragging: false,
    // }).addTo(map);

    // var latlngs2 = [
    //     L.latLng(<?= $valuee->latawal; ?>, <?= $valuee->longawal; ?>),
    //     L.latLng(<?= $valuee->lattujuan; ?>, <?= $valuee->longtujuan; ?>)
    // ];

    // var polyline2 = L.polyline(latlngs2, {
    //     color: 'blue'
    // }).bindPopup('<b>Jalur</b>').addTo(map);// kalau djiktra asli
    // <?php } ?>

    var routeControl = L.Routing.control({
        createMarker: function() {
            return null;
        },
        waypoints: [
            L.latLng(<?= $titikuser->latitude; ?>, <?= $titikuser->longitude; ?>),
            L.latLng(<?= $titikposyandu->latitude; ?>, <?= $titikposyandu->longitude; ?>)
        ],
        lineOptions: {
            styles: [{
                    color: 'black',
                    opacity: 0.75,
                    weight: 9
                },
                {
                    color: 'white',
                    opacity: 0.8,
                    weight: 6
                },
                {
                    color: '#00a174',
                    opacity: 1,
                    weight: 4
                }
            ]
        }
    }).addTo(map);
    routeControl.hide();


    var icon1 = L.icon({
        iconUrl: '<?= base_url('icon/icon-marker.png'); ?>',

        shadowUrl: null,
        iconSize: new L.Point(45, 40),
        iconAnchor: new L.Point(13, 41),
        popupAnchor: new L.Point(0, -33),
        className: 'icon'
    });

    L.marker([<?= $titikuser->latitude; ?>, <?= $titikuser->longitude; ?>], {
            icon: icon1
        })
        .bindPopup(
            "<h5><b>Lokasi : Lokasi Anda"
        )
        .addTo(map);

    var icon2 = L.icon({
        iconUrl: '<?= base_url('icon/posyandu.png'); ?>',

        shadowUrl: null,
        iconSize: new L.Point(70, 70),
        iconAnchor: new L.Point(13, 41),
        popupAnchor: new L.Point(0, -33),
        className: 'icon2'
    });

    L.marker([<?= $titikposyandu->latitude; ?>, <?= $titikposyandu->longitude; ?>], {
            icon: icon2
        })
        .bindPopup(
            "<h5><b>Lokasi : <?= $titikposyandu->nama_posyandu; ?>"
        )
        .addTo(map);
    </script>

    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script>

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