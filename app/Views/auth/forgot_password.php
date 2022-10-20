<?php $this->extend('auth/layout/main') ?>
<?php $this->section('web_page_title') ?>
<?php echo lang('PageTitles.forgot_password'); ?>
<?php $this->endSection() ?>
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
                    <div class="col-md-6" style="max-width: 420px;">
                        <div>
                            <div class="text-center">
                                <div class="logo-wrap ">
                                    <h4 class="mb-0"><a href="<?php echo base_url(); ?>"><?php echo lang('PageText.brand_logo'); ?></a></h4>
                                </div>
                                <h2 class="mt-4"><?php echo lang('PageTitles.forgot_password'); ?>?</h2>
                                <p class="text-md"><?php echo lang('PageText.dont_worry'); ?></p>
                                
                            </div>

                            <div class="p-2 mt-4">
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
                                <form class="forgot-form" method="POST" action="<?php echo base_url('forgot-password') ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-24">
                                        <label class="mb-8"><?php echo lang('Placeholders.forgot_email'); ?></label>
                                        <input type="email" name="email" class="form-control" placeholder="<?php echo lang('Placeholders.email_address'); ?>" >
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <button type="submit" class="btn btn-primary"><?php echo lang('Buttons.send'); ?></button>
                                    </div>
                                </form>
                            </div>

                            <div class="mt-3 text-center">
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
var Login = function () {
    var handleLogin = function () {
        $('.forgot-form').validate({
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
                email: {
                    required: true,
                },
            },
            invalidHandler: function (event, validator) {
                $($('.forgot-form')).show();
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
        });
    };
    return {
        init: function () {
            handleLogin();
        }
    };
}();
jQuery(document).ready(function () {
    Login.init();
});
</script>
<?php $this->endSection() ?>