<?php $this->load->view('templates/auth_header'); ?>

<body>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div id="loginform">
                <div class="text-center p-t-20 p-b-20">
                    <h4 class="text-center p-t-20 p-b-20" style="color:#fff;">SIG - POSYANDU</h4>
                    <span class="db"><img src="<?= base_url() ?>assets/images/logo-kemenkes.png" alt="logo" width="215px" height="125px" /></span>
                    <span class="db"><img src="<?= base_url() ?>assets/images/logo-posyandu.png" alt="logo" width="125px" height="125px" /></span>
                </div>
                <!-- Form -->
                <form class="form-horizontal m-t-20" class="user" method="post" action="<?= base_url('Auth/registration'); ?>" enctype="multipart/form-data">
                    <div class="row p-b-30">
                        <div class="col-12">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" id="nama" name="nama" placeholder="Masukan Nama Anda..." value="<?= set_value('nama'); ?>">
                            </div>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Masukan Email..." value="<?= set_value('email'); ?>">
                            </div>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                             <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                                </div>
                                <textarea class="form-control form-control" id="alamat" name="alamat">
                        
                                </textarea>
                            </div>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg" id="password1" name="password1" placeholder="Masukan Password..." value="<?= set_value('password1'); ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg" id="password2" name="password2" placeholder="Ulangi Password..." value="<?= set_value('password2'); ?>">
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i style="margin-right: 4px;" class="ti-user"></i> Upload KTP</span>
                                </div>
                                <input type="file" class="form-control form-control-lg" id="foto_ktp" name="foto_ktp">
                            </div>
                            <?= form_error('foto_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span id="basic-addon1"><button class="btn btn-primary" type="button" onclick="getLocation()">Cek Lokasi</button></i></span>
                                </div>
                                <input class="form-control " placeholder="Longitude.." type="text" name="longitude" id="longitude" readonly>
                                <input class="form-control " placeholder="Latitude" type="text" name="latitude" id="latitude" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div id="mapcanvas"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group text-center">
                                <div class="p-t-20">
                                    <button style="width: 170px;" class="btn btn-success text-center" type="submit">Register</button>
                                    <a href="<?= base_url('Auth') ?>" style="width: 170px;" class="btn btn-info text-center" type="submit">Sudah Punya akun?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        
                        <form class="col-12" action="index.html">
                           
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script>
        var view = document.getElementById("tampilkan");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
            }
        }

        function showPosition(position) {
            lat = position.coords.latitude;
            lon = position.coords.longitude;
            $('#longitude').val(position.coords.longitude)
            $('#latitude').val(position.coords.latitude)
            latlon = new google.maps.LatLng(lat, lon)
            mapcanvas = document.getElementById('mapcanvas')
            mapcanvas.style.height = '200px';
            mapcanvas.style.width = '200px';

            var myOptions = {
                center: latlon,
                zoom: 17,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
            var marker = new google.maps.Marker({
                position: latlon,
                map: map,
                title: "You are here!"
            });
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
                    break;
                case error.POSITION_UNAVAILABLE:
                    view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
                    break;
                case error.TIMEOUT:
                    view.innerHTML = "Requestnya timeout bro"
                    break;
                case error.UNKNOWN_ERROR:
                    view.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
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