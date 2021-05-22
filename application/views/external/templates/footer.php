<!-- Footer -->
<footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; iJEES - Interactive Joint Education Employability System 2021</span>
                    </div>
                </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>/assets/js/sb-admin-2.min.js"></script>
    
    <?php 
        if (isset($include_js)) {
            echo '<script src="' . base_url() . 'assets/js/additional/' . $include_js . '.js"></script>';
        } 
    ?>

</body>

</html>
