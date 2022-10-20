<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery/jquery.easing.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery-validation/additional-methods.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootbox/bootbox.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/feather-icons/feather.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
<?php $this->renderSection('vendor_specific_js'); ?>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
<?php echo $this->include('layout/dev_scripts'); ?>
<?php $this->renderSection('page_specific_js'); ?>
<script type="text/javascript">
	var BASE_URL = '<?php echo base_url() ?>';
	var current_page = '<?php echo (isset($current_page))?$current_page:"" ?>';
</script>