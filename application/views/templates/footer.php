<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>/assets/js/sb-admin-2.min.js"></script>

    <!-- <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script> -->
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
    
    <?php 
        if (isset($include_js)) {
            echo '<script src="' . base_url() . 'assets/js/additional/' . $include_js . '.js"></script>';
        } 
        if (isset($include_js2)) {
            echo $include_js2;
        } 
        if (isset($include_js3)) {
            echo $include_js3;
        } 
    ?>

</body>
</html>
