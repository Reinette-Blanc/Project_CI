<!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
    <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>

    <script src="<?=base_url('assets/')?>vendor/selectbox/jquery.selectboxes.js"></script>

    <script type="text/javascript">
	$(document).ready(function(){
		$('#province_id').change(function(){
            var province_id = $('#province_id').val();
            $("#amphur_id").removeOption(/./);
            $("#amphur_id").ajaxAddOption("<?=base_url('Amphur/getJson')?>", {"province_id" : province_id},false,
            function(){
                $("#amphur_id").selectOptions("0");
            }
            );
        });
    });
</script>