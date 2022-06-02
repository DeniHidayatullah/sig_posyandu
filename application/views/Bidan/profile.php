<?php $this->load->view('templates/header');
// if ($this->session->userdata('username') == null) {
//     redirect('auth');
// }
?>

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
			<!-- ============================================================== -->
			<!-- Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h4 class="page-title">Form GTK</h4>
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
					<div class="col-md-12"><br>
						<div class="card">
							<form class="form-horizontal">
								<div class="card-body">
									<h2 class="text-center">Profile Bidan</h2>
									<div class="text-right">
									</div>
									<br>
									<div class="row">
										<div class="col-md-6">

											<div class="form-group row">
												<label for="fname" class="col-sm-4  control-label col-form-label">ID Bidan</label>
												<div class="col-sm-8">
													<input type="text" style="border-radius: 10px;" name="id" class="form-control" id="id" placeholder="Id Bidan" value="<?= $user['id']; ?>" readonly required>
												</div>
											</div>
											<div class="form-group row">
												<label for="fname" class="col-sm-4  control-label col-form-label">Username Bidan</label>
												<div class="col-sm-8">
													<input type="text" style="border-radius: 10px;" name="username" class="form-control" id="username" placeholder="Username Bidan" value="<?= $user['username']; ?>"  required>
												</div>
											</div>
											<div class="form-group row">
												<label for="fname" class="col-sm-4  control-label col-form-label">Nama Bidan</label>
												<div class="col-sm-8">
													<input type="text" style="border-radius: 10px;" name="nama" class="form-control" id="nama" placeholder="Nama Bidan" value="<?= $user['nama']; ?>"  required>
												</div>
											</div>
											<div class="form-group row">
												<label for="fname" class="col-sm-4  control-label col-form-label">No Tlp Bidan</label>
												<div class="col-sm-8">
													<input type="text" style="border-radius: 10px;" name="no_tlp" class="form-control" id="no_tlp" placeholder="No Tlp Bidan" value="<?= $user['no_tlp']; ?>"  required>
												</div>
											</div>
											<div class="form-group row">
												<label for="fname" class="col-sm-4  control-label col-form-label">Password</label>
												<div class="col-sm-8">
													<input type="password" style="border-radius: 10px;" name="password1" class="form-control" id="password1" placeholder="password1 Bidan" value="<?= $user['password']; ?>" readonly required>
												</div>
											</div>
										</div><br>
										<div class="col-md-6">
											<br>
											<div class="col-sm-5 text-right">
												<h5 class="">Foto GTK</h5>
											</div>
											<div class="form-group row">
												<div class="col-sm-10 text-right">
													<img width="300px;" height="400px" src="<?= base_url('assets/ktp/') . $user['foto_ktp']; ?>" alt="...">
												</div>
											</div>
										</div><br>
									</div>
									<div class="border-top">

									</div>
							</form>
						</div>
					</div>
				</div>
			</div>


			<!-- Logout Delete Confirmation-->
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus Data GTK?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">BATAL</button>
							<a id="btn-delete" class="btn btn-danger" href="#">HAPUS</a>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Mengubah Data GTK?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Ubah data jika diperlukan atau pembaruan.</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">BATAL</button>
							<a id="btn-edit" class="btn btn-warning" href="#">EDIT</a>
						</div>
					</div>
				</div>
			</div>
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


</body>

</html>
