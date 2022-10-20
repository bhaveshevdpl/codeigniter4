<?php $this->extend('auth/layout/main') ?>
<?php $this->section('web_page_title') ?>
<?php echo lang('PageTitles.login'); ?>
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
                                <h2 class="mt-4"><?php echo lang('PageText.welcome_back'); ?></h2>
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
                                <?php 
                                    $adminCook = '';
                                    if(get_cookie('adminAuth')){
                                        parse_str(get_cookie('adminAuth'), $adminCook);        
                                    }
                                ?>
                                <form class="login-form" method="POST" action="<?php echo base_url('login') ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-24">
                                        <label class="mb-8"><?php echo lang('Labels.email_address'); ?> <span class="text-danger" >*</span></label>
                                        <input type="text" name="email" class="form-control" placeholder="<?php echo lang('Placeholders.email_address'); ?>" value="<?php echo ($adminCook)?$adminCook['usr']:'';?>">
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group mb-24">
                                        <label class="mb-8"><?php echo lang('Labels.password'); ?> <span class="text-danger" >*</span></label>
                                        <input type="password" name="password" class="form-control" placeholder="<?php echo lang('Placeholders.password'); ?>" value="<?php echo ($adminCook)?$adminCook['hash']:'';?>" >
                                        <span class="help-text"></span>
                                    </div>
                                    <div class="form-check mb-24">
                                      <input type="checkbox" class="form-check-input"  name="rememberMe" id="rememberMe" value="1" <?php echo ($adminCook)?"checked":""?>/><label class="form-check-label" for="rememberMe"><?php echo lang('PageText.remember_me'); ?></label>
                                    </div>

                                    <div class="mt-3 text-center">
                                        <button type="submit" class="btn btn-primary"><?php echo lang('Buttons.log_in'); ?></button>
                                    </div>

                                    <div class="mt-3 text-center">
                                        <a href="<?php echo base_url('forgot-password') ?>" class="text-md"><?php echo lang('PageText.forgot_password'); ?></a>
                                    </div>
                                </form>
                            </div>

                            <div class="mt-3 text-center">
                                <p class="text-md mb-8"><?php echo lang('PageText.not_have_account'); ?> <a href="<?php echo base_url('registration'); ?>" class="text-primary"> <strong><?php echo lang('PageText.register'); ?></strong> </a> </p>
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
        $('.login-form').validate({
            // errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
                email: {
                    required: true,
                    email:true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "<?php echo lang('Validation.email_required'); ?>"
                },
                password: {
                    required: "<?php echo lang('Validation.password_required'); ?>"
                }
            },
            invalidHandler: function (event, validator) {
                $($('.login-form')).show();
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            /*errorPlacement: function (error, element) {
                var help_block = element.parent('.form-group').find('.text-danger');
                help_block.html("");
                error.appendTo(help_block);
            },*/
            /*submitHandler: function (form) {

            }*/
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