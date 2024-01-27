
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <!-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> -->
    <!-- Default to the left -->

</footer>
</div>
<!-- ./wrapper -->
 <!-- REQUIRED SCRIPTS -->
<script src="<?php echo base_url(); ?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Custom js-->
<script src="<?php echo base_url() ?>public/assets/js/custom.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>public/admin/dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url() ?>public/admin/plugins/summernote/summernote-bs4.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> //confrm alert


<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
    $(function () {
        // Summernote
        $('.textarea').summernote({
            height: '400px'
        })
    })
    $(document).ready(function () {
       // alert("footer");
    })


</script>




</body>
</html>