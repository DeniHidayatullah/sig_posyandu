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
						<h4 class="page-title">User</h4>
						<div class="ml-auto text-right">
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
				<!-- Sales Cards  -->
				<!-- ============================================================== -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header" style="background:#2980b9; color:#fff;">List User</h5><br>
								<div class="form-gruop">

									<div class="text-right">

										<!-- <h7><strong> Posisi di sekolah </strong></h7> &nbsp;
                                        <input> &nbsp; &nbsp; &nbsp; &nbsp; -->
										<!-- Button trigger modal -->
										<!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                            Tambah Pengguna
                                        </button> -->
									</div>
								</div><br>
								<div class="table-responsive">
									<table id="zero_config" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th><b>No</b></th>
												<th><b>Nama User</b></th>
												<th><b>Foto Ktp</b></th>
												<th><b>Aksi</b></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($user as $b) : ?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $b->nama ?></td>
													<td><img src="<?= base_url('assets/ktp/' . $b->foto_ktp) ?>" width="100px" height="130px" alt=""></td>
													<td>
														<a onclick="return confirm('Apakah Anda Ingin Mengubah Aktivasi  ?');" href="<?= $b->is_active == 1 ?  base_url('Admin/is_active/'. $b->id.'/'. $b->role) : base_url('Admin/is_deactive/'. $b->id.'/'. $b->role)  ?>" class="btn <?= $b->is_active == 1 ? 'btn-info' : 'btn-warning'  ?>"><?= $b->is_active == 1 ? 'Aktif' : 'Non-Aktif' ?></a>
														<a type="button" href="<?= base_url('Admin/deleteBidan/' . $b->id);   ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data  ?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" class="mdi mdi-24px mdi-delete"></a>
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
				<!-- ============================================================== -->
				<!-- Sales chart -->
				<!-- ============================================================== -->

				<!-- ============================================================== -->
				<!-- Sales chart -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Recent comment and chats -->
				<!-- ============================================================== -->

				<!-- ============================================================== -->
				<!-- Recent comment and chats -->
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
