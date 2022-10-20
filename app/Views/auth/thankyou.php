<?php $this->extend('auth/layout/main') ?>
<?php $this->section('web_page_title') ?>
<?php echo (session()->get('verifyerr') || session()->get('activate_email')) ? lang('PageText.verify_email') : lang('PageTitles.reset_password'); ?>
<?php $this->endSection() ?>
<?php $this->section('page_content') ?>
<div class="row g-0">  
    <div class="col-sm-12"> 
        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
            <div class="w-100">
                <div class="row justify-content-center login-sign-up">
                    <div class="col-md-6" style="max-width: 420px;">
                        <div>
                            <div class="text-center">
                                <div class="logo-wrap ">
                                    <h4 class="mb-0"><a href="<?php echo base_url() ?>"><?php echo lang('PageText.brand_logo'); ?></a></h4>
                                </div>
                                <?php if(!session()->get('verifyerr')) : ?>
                                <h2 class="mt-4"><?php echo lang('PageText.thankyou'); ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="p-2 mt-4">
                                <?php if (isset($_SESSION['success_message'])) : ?>
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                            <?php echo $_SESSION['success_message'];
                                                unset($_SESSION['success_message']);
                                             ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if (session()->get('activate_email')) : ?>
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                            <?php echo session()->get('activate_email');
                                            session()->remove('activate_email'); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if (session()->get('verifyerr')) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                            <?php echo session()->get('verifyerr');
                                            session()->remove('verifyerr'); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div><?php echo lang('PageText.return_to'); ?> <a href="<?php echo base_url(); ?>" style="color:#0060a9" ><?php echo lang('PageText.home'); ?></a></div>
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