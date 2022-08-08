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
                        <h4 class="page-title">Data Balita</h4>
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
                                <form action="<?php echo base_url('User/proses'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="dari">Dari</label>
                                        <select name="dari" class="form-control" id="dari">
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($kecamatan as $c) : ?>
                                            <option value="<?= $c['nama_kecamatan'] ?>"><?= $c['nama_kecamatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ke">Ke</label>
                                        <select name="ke" class="form-control" id="ke">
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($kecamatan as $c) : ?>
                                            <option value="<?= $c['nama_kecamatan'] ?>"><?= $c['nama_kecamatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Container fluid  -->

            <!-- footer -->
            <footer class="footer text-center" style="margin-top: 30px;">
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
    <script src="<?= base_url() ?>assets/dist/js/pages/chart/chart-page-init.js"></script>
    <!-- <script>
    function runTest() {
        const input_a = document.getElementById("dari");
        const input_b = document.getElementById("ke");
        console.log(input_a.value);
        console.log(input_b.value);

        const g = new Graph();

        <?php foreach ($jarak as $key => $d) { ?>
        g.addedge(<?= $d['kec_awal']?>, <?= $d['kec_tujuan']?>, <?= $d['jarak']?>);
        g.addedge(<?= $d['kec_awal']?>, <?= $d['kec_tujuan']?>, <?= $d['jarak']?>);

        <?php } ?>

        list(distances, prev) = g.paths_from(input_a.value);

        path = g.paths_to(prev, input_b.value);

        //print_r($path);
        result.value = path;
        // return path;

    }

    class Edge {
        constructor(start, end, weight) {
            this.start = start;
            this.end = end;
            this.weight = weight;
        }
    }

    class Graph {
        constructor() {
            let nodes = [];
        }

        addedge(start, end, weight = 0) {
            if (!(this.nodes[start])) {
                this.nodes[start] = [];
            }
            array_push(this.nodes[start], new Edge(start, end, weight));
        }

        removenode(index) {
            array_splice(this.nodes, index, 1);
        }

        paths_from(from) {
            let dist = [];
            dist[from] = 0;
            let visited = [];
            let previous = [];
            let queue = [];
            let Q = new PriorityQueue("compareWeights");
            Q.add(array(dist[from], from));

            let nodes = this.nodes;

            while (Q.size() > 0) {
                list(distance, u) = Q.remove();

                if (isset(visited[u])) {
                    continue;
                }
                visited[u] = True;

                if (!this.nodes[u]) {
                    alert("Peringatan: 'u' tidak ditemukan dalam list node\n");
                    break;
                }

                while (edge = this.nodes[u]) {

                    let alt = dist[u] + edge.weight;
                    let end = edge.end;
                    if (!this.dist[end] || alt < this.dist[end]) {
                        previous[end] = u;
                        dist[end] = alt;
                        Q.add(array(dist[end], end));
                    }
                }
            }
            return array(dist, previous);
        }

        paths_to(node_dsts, tonode) {

            let current = $tonode;
            let path = array();

            if (this.node_dsts[current]) {
                array_push(path, tonode);
            }
            while (this.node_dsts[current]) {
                nextnode = node_dsts[current];

                array_push(path, nextnode);

                current = nextnode;
            }
            return array_reverse(path);
        }

        getpath(from, to) {
            list(distances, prev) = this.paths_from(from);
            return this.paths_to(prev, to);
        }

    }

    function compareWeights(a, b) {
        return a.data[0] - b.data[0];

    }

    class PriorityList {
        constructor(data) {
            this.next = null;
            this.data = data;
        }
    }

    class PriorityQueue {

        constructor(comparator) {
            this.size = 0;
            this.liststart = null;
            this.listend = null;
            this.comparator = comparator;
        }

        add(x) {
            this.size = this.size + 1;

            if (this.liststart == null) {
                this.liststart = new PriorityList(x);
            } else {
                let node = this.liststart;
                let comparator = this.comparator;
                let newnode = new PriorityList(x);
                let lastnode = null;
                let added = false;
                while (node) {
                    if (comparator(newnode, node) < 0) {

                        newnode.next = node;
                        if (lastnode == null) {
                            this.liststart = newnode;
                        } else {
                            lastnode.next = newnode;
                        }
                        added = true;
                        break;
                    }
                    let lastnode = node;
                    let node = node.next;
                }
                if (!added) {
                    lastnode.next = newnode;
                }
            }

        }

        debug() {
            let node = this.liststart;
            let i = 0;
            if (!node) {
                alert("<< Tidak ada nodes >>\n");
                return;
            }
            while (node) {
                alert("[i]=" + node.data[1] + " (" + node.data[0] + ")\n");
                let node = node.next;
                i++;
            }
        }

        size() {
            return this.size;
        }

        peak() {
            return this.liststart.data;
        }

        remove() {
            let x = $this.peak();
            this.size = this.size - 1;
            this.liststart = this.liststart.next;

            return x;
        }
    }
    </script> -->
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