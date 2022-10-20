<?php $this->extend('layout/main') ?>
<?php $this->section('web_page_title') ?>
<?php echo lang('PageTitles.update_password'); ?>
<?php $this->endSection() ?>

<?php $this->section('page_specific_css') ?>
<style>
.has-error{
    color:red !important;
}
</style>
<?php $this->endSection() ?>

<?php $this->section('page_content') ?>
<div class="card border-0 bread-crumb card-2 mb-32">
   <div>
      <h6><?php echo lang('PageText.update_pass'); ?></h6>
      <ol class="breadcrumb m-0">
         <li><a href="<?php echo base_url('home') ?>"><?php echo lang('PageText.home'); ?></a></li>
         <li><a href="#"><?php echo lang('PageText.settings'); ?></a></li>
         <li><a href="#"><?php echo lang('PageText.update_pass'); ?></a></li>
      </ol>
   </div>
</div>
<form class="update-password-form" method="POST" action="<?php echo base_url('update-password') ?>" id="changePasswordForm">
    <?php echo csrf_field(); ?>
      <div class="card card-2 mb-32">
            <h6 class="mb-0"><?php echo lang('PageText.update_pass'); ?></h6>
            <div class="devider-hr d-sm-block"></div>
            <?php if (isset($validation)) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors() ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if (isset($success_message)) : ?>
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if (isset($error_message)) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                        <?php echo $error_message ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                  <div class="col-md-12 mb-24">
                        <div class="form-group">
                              <label class="mb-8"><?php echo lang('Labels.old_password'); ?> <span class="text-danger" >*</span></label>
                              <input type="password" name="password" class="form-control" placeholder="<?php echo lang('Placeholders.password'); ?>">
                        </div>
                  </div>
                  <div class="col-md-6 mb-24">
                        <div class="form-group">
                              <label class="mb-8"><?php echo lang('Labels.password'); ?> <span class="text-danger" >*</span></label>
                              <input type="password" name="new_password" id="new_password" class="form-control" placeholder="<?php echo lang('Placeholders.password'); ?>">
                        </div>
                  </div>
                  <div class="col-md-6 mb-24">
                        <div class="form-group">
                              <label class="mb-8"><?php echo lang('Labels.confirm_pass'); ?> <span class="text-danger" >*</span></label>
                              <input type="password" name="confirm_password" class="form-control" placeholder="<?php echo lang('Placeholders.password'); ?>">
                        </div>
                  </div>
            </div>
      </div>
      <div class="d-flex justify-content-end mt-4 bottom-btn">
         <button type="submit" class="btn btn-secondary btn-md" id="changePasswordBtn"><?php echo lang('Buttons.save'); ?></button>
      </div>
</form>
<?php $this->endSection() ?>
<?php $this->section('vendor_specific_js') ?>
<?php $this->endSection() ?>
<?php $this->section('page_specific_js') ?>
<script>
    var ChangePassword = function () {
    var initChangePassword = function(){
        $("#changePasswordForm").validate({
            // errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
                password:{
                    required: true
                },
                new_password:{
                    required: true,
                    minlength: 6,
                },
                confirm_password:{
                    required: true,
                    equalTo:'#new_password'
                },
            },
            messages: {
                password:{
                    required:"<?php echo lang('Validation.current_pass_required'); ?>"
                },
                new_password:{
                    required: "<?php echo lang('Validation.new_pass_required'); ?>",
                    minlength:"<?php echo lang('Validation.new_pass_length'); ?>"
                },
                confirm_password: {
                    required: "<?php echo lang('Validation.confirm_pass'); ?>",
                    equalTo:"<?php echo lang('Validation.password_match'); ?>",
                }
            },
            invalidHandler: function (event, validator) {
                $($('#changePasswordForm')).show();
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
        });

        /*$("#changePasswordBtn").click(function () {
            if ($("#changePasswordForm").valid()) {
                $("#changePasswordForm").submit();
                return true;
            }
            return false;
        });*/
    }
    return {
        init: function () {
            initChangePassword();
        }
    };
}();

jQuery(document).ready(function () {
    ChangePassword.init();
});
</script>
<?php $this->endSection() ?>