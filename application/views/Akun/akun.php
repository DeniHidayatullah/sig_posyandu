<?php $this->load->view('templates/header'); ?>

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
        <?php
        $this->load->view('templates/navbar');
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Form Akun</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-header" style="background:#2980b9; color:#fff;">Akun Pengguna</h5><br>
                                <div class="form-gruop">

                                    <div class="text-right">

                                        <!-- <h7><strong> Posisi di sekolah </strong></h7> &nbsp;
                                        <input> &nbsp; &nbsp; &nbsp; &nbsp; -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                            Tambah Pengguna
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Akun</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <?php $yahoo = md5(uniqid(rand(), true)) ?>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('Akun/tambahAkun'); ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-4  control-label col-form-label">Nama GTK</label>
                                                                <div class="col-sm-8">
                                                                    <input type="hidden" style="border-radius: 10px;" name="id_login" class="form-control" id="id_login" value="<?php echo $yahoo  ?>" placeholder="Nama Ekskul" required>
                                                                    <select required class="custom-select" id="id_gtk" name="id_gtk">
                                                                        <?php
                                                                        $query = $this->db->query("SELECT tb_gtk.id_gtk, tb_gtk.nama_gtk FROM `tb_gtk` WHERE tb_gtk.id_gtk NOT IN (SELECT users.id_gtk FROM users)")->result();
                                                                        foreach ($query as $gtk_select) : ?>
                                                                            <option value="<?= $gtk_select->id_gtk ?>"><?= $gtk_select->nama_gtk ?></option>
                                                                        <?php
                                                                            $id_gtk = $gtk_select->id_gtk;
                                                                        endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-4  control-label col-form-label">Username</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" style="border-radius: 10px;" name="username" class="form-control" id="username" placeholder="Nama Penanggung Jawab" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-4  control-label col-form-label">Password</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" style="border-radius: 10px;" name="password" class="form-control" id="password" placeholder="Nama Penanggung Jawab" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-4  control-label col-form-label">Nomor WA</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" style="border-radius: 10px;" name="no_wa" class="form-control" id="no_wa" placeholder="08xxxxxxxxxx" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-4  control-label col-form-label">Jabatan</label>
                                                                <div class="col-sm-8">
                                                                    <select required class="custom-select" id="jabatan" name="jabatan">
                                                                        <?php
                                                                        foreach ($jabatan as $jabatan_select) : ?>
                                                                            <option if value="<?= $jabatan_select->id_jabatan ?>"><?= $jabatan_select->jabatan ?></option>
                                                                        <?php
                                                                            $jabatan = $jabatan_select->id_jabatan;
                                                                        endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>No</b></th>
                                                <th><b>Nama Gtk</b></th>
                                                <th><b>Username</b></th>
                                                <th><b>Password</b></th>
                                                <th><b>Jabatan</b></th>
                                                <th><b>Aksi</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($akun as $g) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $g->nama_gtk ?></td>
                                                    <td><?= $g->username ?></td>
                                                    <td><?= $g->password ?></td>
                                                    <td><?= $g->jabatan ?></td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#modal-edit<?= $g->id_login; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" class="mdi mdi-24px mdi-account-edit"></a>
                                                        <a type="button" href="<?= base_url('Akun/hapusAkun/' . $g->id_login);   ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data  ?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" class="mdi mdi-24px mdi-delete"></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                    <?php $no=0; foreach($akun as $row): $no++; ?>
                    <div class="row">
                    <div id="modal-edit<?=$row->id_login;?>" class="modal fade">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">   </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            
                                <div class="modal-body">
                                    <form action="<?php echo base_url('Akun/editAkun/'.$row->id_login); ?>" method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Username</label>
                                            <div class="col-sm-8">
                                            <input type="hidden" style="border-radius: 10px;" name="id_komentar" class="form-control" id="id_login" value="<?php echo $row->id_login; ?>" placeholder="Nama Penanggung Jawab" required>
                                                <input type="text" style="border-radius: 10px;" name="username" class="form-control" id="username" value="<?php echo $row->username;  ?>" placeholder="Nama Penanggung Jawab" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="text" style="border-radius: 10px;" name="password" class="form-control" id="password" value="<?php echo $row->password  ?>" placeholder="Nama Penanggung Jawab" required>
                                                <input type="hidden" style="border-radius: 10px;" name="jabatan" class="form-control" id="jabatan" value="<?php echo $row->jabatan  ?>" placeholder="Nama Penanggung Jawab" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Nomor WA</label>
                                            <div class="col-sm-8">
                                                <input type="text" style="border-radius: 10px;" name="no_wa" class="form-control" id="no_wa" value="<?php echo $row->no_wa  ?>" placeholder="Nama Penanggung Jawab" required>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php endforeach; ?>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                COPYRIGHT © BIKEA TECHNOCRAFT 2019
            </footer>
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
     <script src="<?= base_url() ?>vendor/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>vendor/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url() ?>vendor/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>vendor/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>vendor/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>vendor/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="<?= base_url() ?>vendor/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?= base_url() ?>vendor/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?= base_url() ?>vendor/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>


</body>

</html>