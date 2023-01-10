<script type="text/javascript">
  var id_remove;
      function compare_detail(){
        jQuery.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo base_url(); ?>GetData/compare_validation",
            success: function(response) {
                console.log(response);
                if (response==2) {
                    openUrl("<?php echo base_url(); ?>App/compare");
                }else{
                    $("#alert_error_compare").fadeIn();
                    closeAlertBox(2);
                }
            },
            error: function(response) {
                console.log(response);
            },
            complete: function() {}
        });
    }
    function get_compare_product() {
        jQuery.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo base_url(); ?>GetData/get_compare_view",
            success: function(response) {
                console.log(response);
                $('#product_compare_1').html(response['product_1']);
                $('#product_compare_2').html(response['product_2']);
            },
            error: function(response) {
                console.log(response);
            },
            complete: function() {}
        });
    }
    function remove_confirm(id){
      id_remove = id;
      $('#modal-c-remove').modal('show');
    }
    function hide_modal(){
      $('#modal-c-remove').modal('hide');
    }
    function remove_compare() {
        // body...
        var id = id_remove;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>InsertData/update_compare_product",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response);
                hide_modal();
                get_compare_product();

                // $('#toast_1').toast('show')
                
                // $('#search_result').html(response['response']);
            },
            error: function(response) {
                console.log(response);
            },
            complete: function() {}
        });
    }
    function add_to_compare(id) {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>InsertData/insert_compare_product",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                console.log(response);
                // $('#toast_1').toast('show')
                if (response == 'full') {
                    $("#alert_error").fadeIn();
                    closeAlertBox(1);
                }
                if (response != 'full') {
                    $("#alert_success").fadeIn();
                    closeAlertBox(0);
                }
                // $('#search_result').html(response['response']);
            },
            error: function(response) {
                console.log(response);
            },
            complete: function() {}
        });
    }
</script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="<?php echo base_url(); ?>assets/v3_assets/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/v3_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/v3_assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url(); ?>assets/v3_assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url(); ?>assets/v3_assets/dist/js/pages/dashboard.js"></script> -->
</body>
</html>