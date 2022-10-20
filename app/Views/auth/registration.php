<?php $this->extend('auth/layout/main') ?>
<?php $this->section('web_page_title') ?>
<?php echo lang('PageTitles.registration'); ?>
<?php $this->endSection(); ?>
<?php $this->section('page_specific_css') ?>
<style>
.has-error{
    color:red !important;
}
</style>
<?php $this->endSection() ?>
<?php $this->section('page_content') ?>
<div class="row g-0"> 
    <div class="col-lg-4">
        <div class="authentication-bg">
            <div class="bg-overlay"></div>
        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
            <div class="w-100">
                <div class="row justify-content-center login-sign-up">
                    <div class="col-md-9">
                        <div>
                            <div class="text-center">
                                <div class="logo-wrap ">
                                    <h4 class="mb-0"><a href="<?php echo base_url(); ?>"><?php echo lang('PageText.brand_logo'); ?></a></h4>
                                </div>
                                <h2 class="mt-4"><?php echo lang('PageText.get_started_freetrial'); ?></h2>
                                <p class="text-md"><?php echo lang('PageText.signin_continue'); ?></p>
                            </div>
                            <div class="p-2 mt-4">
                                <?php if (isset($validation)) : ?>
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $validation->listErrors() ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form class="register-form" method="POST" action="<?php echo base_url('registration') ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-24">
                                                <label class="mb-8"><?php echo lang('Labels.full_name'); ?> <span class="text-danger" >*</span></label>
                                                <input type="text" class="form-control" name="full_name" placeholder="<?php echo lang('Placeholders.full_name'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-24">
                                                <label class="mb-8"><?php echo lang('Labels.email'); ?> <span class="text-danger" >*</span></label>
                                                <input type="text" class="form-control" name="email" placeholder="<?php echo lang('Placeholders.email_address'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-24">
                                                <label class="mb-8"><?php echo lang('Labels.phone_number'); ?> <span class="text-danger" >*</span></label>
                                                <input type="text" class="form-control" name="phone_number" placeholder="<?php echo lang('Placeholders.phone_number'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-24">
                                                <label class="mb-8"><?php echo lang('Labels.password'); ?> <span class="text-danger" >*</span></label>
                                                <input type="password" name="password" class="form-control required" placeholder="<?php echo lang('Labels.password'); ?>" id="password">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-24">
                                                <label class="mb-8"><?php echo lang('Labels.confirm_pass'); ?> <span class="text-danger" >*</span></label>
                                                <input type="password" name="confirm_password" class="form-control required" placeholder="<?php echo lang('Labels.confirm_pass'); ?>">
                                                <span class="help-text"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3 text-center">
                                        <button type="submit" class="btn btn-primary"><?php echo lang('Buttons.signme_to'); ?></button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="mt-3 text-center">
                                <p class="text-md mb-8"><?php echo lang('PageText.already_acc'); ?> <a href="<?php echo base_url(); ?>" class="text-primary"> <strong><?php echo lang('Buttons.log_in'); ?></strong> </a> </p>
                                <p class="text-md mb-0"><?php echo lang('PageText.copyright'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<?php $this->endSection() ?>
<?php $this->section('page_specific_js') ?>
<script>
var Register = function () {
    var handleRegister = function () {
        $('.register-form').validate({
            // errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
                full_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email:true
                },
                phone_number: {
                    required: true,
                    digits:true,
                },
                password: {
                    required: true,
                    minlength:6
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password",
                    minlength:6
                }                
            },
            messages: {
                password: {
                    required: "Password is required."
                },
                confirm_password: {
                    required: "Confirm Password is required.",
                    equalTo: "Password and Confirm password should be same."
                }
            },
            invalidHandler: function (event, validator) {
                $($('.register-form')).show();
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
        });
    };
    return {
        init: function () {
            handleRegister();
        }
    };
}();
jQuery(document).ready(function () {
    Register.init();
});
</script>
<?php $this->endSection() ?>