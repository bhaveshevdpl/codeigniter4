<?php $this->extend('layout/main') ?>
<?php $this->section('web_page_title') ?>
<?php echo lang('PageTitles.update_profile'); ?>
<?php $this->endSection() ?>
<?php $this->section('vendor_specific_css') ?>
    <!-- Embed the intl-tel-input plugin -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/intl_tel_input/intlTelInput.css">
<?php $this->endSection() ?>
<?php $this->section('page_specific_css') ?>
<style>
/*.has-error{
    color:red !important;
}*/
</style>
<?php $this->endSection() ?>

<?php $this->section('page_content') ?>
<div class="card border-0 bread-crumb card-2 mb-32">
  <div>
    <h6><?php echo lang('PageTitles.update_profile'); ?></h6>
    <ol class="breadcrumb m-0">
      <li><a href="index.php"><?php echo lang('PageText.home'); ?></a></li>
      <li><a href="#"><?php echo lang('PageText.settings'); ?></a></li>
      <li><a href="#"><?php echo lang('PageText.basic').' '.lang('PageText.settings'); ?></a></li>
    </ol>
  </div>
</div>
<form class="update-profile-form" method="POST" action="<?php echo base_url('update-profile') ?>" id="updateProfileForm" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>

  <div class="card card-2 mb-32">
    <h6 class="mb-0"><?php echo lang('Labels.basic_info'); ?></h6>
    <div class="devider-hr d-sm-block"></div>
    <?php if (isset($validation)) : ?>
      <div class="col-12">
        <div class="alert alert-danger" role="alert">
        <?php 
          echo $validation->listErrors(); ?>
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
    <?php if(session()->getFlashdata('errors')){ ?>
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
            <?php print_r(session()->getFlashdata('errors')); ?>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-12 mb-24">
           <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $employee_details['id'] ?>">
              <label class="mb-8"><?php echo lang('Labels.full_name'); ?> <span class="text-danger" >*</span></label>
              <input type="text" class="form-control" name="name" maxlength="20" placeholder="<?php echo lang('Labels.full_name'); ?>" value="<?php echo (isset($employee_details['name']) && old('name') === null) ? $employee_details['name']:old('name') ?>" >
           </div>
        </div>
        <div class="col-md-12 mb-24">
           <div class="form-group">
              <label class="mb-8"><?php echo lang('Labels.email'); ?> <span class="text-danger" >*</span></label>
              <input type="text" class="form-control" name="email" maxlength="255" placeholder="<?php echo lang('Labels.email'); ?>" value="<?php echo (isset($employee_details['email']) && old('email') === null) ? $employee_details['email']:old('email') ?>" >
           </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-24">
                <label class="mb-8"><?php echo lang('Labels.phone_number'); ?> <span class="text-danger" >*</span></label>
                <input type="text" class="form-control" name="phone_number" placeholder="<?php echo lang('Placeholders.phone_number'); ?>" value="<?php echo (isset($employee_details['phone_number']) && old('phone_number') === null) ? $employee_details['phone_number']:old('phone_number') ?>">
            </div>
        </div>
        <?php /*
        <div class="col-md-12">
           <div class="category-img-upload mb-5">
              <div class="row">
                 <div class="col-md-4">
                    <div class="category-img-upload-box text-center mb-24">
                      <?php 
                      $emp_img = '';
                      $img_exists = '';
                          $img_exists = (file_exists(ROOTPATH . 'public/uploads/'.$employee_details['image']) && $employee_details['image']!='') ? base_url('uploads/'.$\['image']) : ''; 
                          $emp_img = ($img_exists) ? $img_exists : UPLOAD_IMG_PLACEHOLDER ; 
                        ?>
                        <img src="<?php echo $emp_img; ?>" id="image_preview" class='image_preview' alt="<?php echo lang('PageText.image'); ?>">
                    </div>
                    <div class="d-flex justify-content-between">
                       <button type="button" id="removeimgbtn" onclick="removeProfileImg()" <?php echo (!$img_exists) ? 'disabled' : '' ; ?> class="btn btn-outline-primary btn-xs">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> <?php echo lang('Buttons.remove_img'); ?>
                       </button>
                       <input type="hidden" name="is_img_removed" id="is_img_removed" value="0" >
                       <div class="fileUpload btn btn-success btn-xs">
                          <input type="file" id="profile_image" name="Image" accept="image/*" onchange="readURL_updateprofile(this)">
                          <label for="profile_image"><i data-feather="upload"></i><?php echo lang('Labels.upload_img'); ?></label>
                          <input type="hidden" name="uploaded_image" id="uploaded_image" value="<?php echo isset($employee_details['image'])?$employee_details['image']:''; ?>" />
                       </div>
                    </div>
                    <label class="text-danger display-no" id="errormsg" ></label>
                 </div>
            
              </div>
           </div>
        </div> <?php */ ?>
    </div>
  </div>
  <div class="d-flex justify-content-end mt-4 bottom-btn">
     <button type="submit" class="btn btn-secondary btn-md"><?php echo lang('Buttons.save'); ?></button>
  </div>
</form>
<?php $this->endSection() ?>
<?php $this->section('vendor_specific_js') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/intl_tel_input/intlTelInput.min.js"></script>
<?php $this->endSection() ?>
<?php $this->section('page_specific_js') ?>
<script type="text/javascript">
  var UpdateProfile = function () {
    var initUpdateProfile = function(){
        $("#updateProfileForm").validate({
            // errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
                name:{
                    required: true,
                    minlength:2,
                    maxlength:255,
                },
                email:{
                    required: true,
                    email:true,
                    maxlength:255,
                },                
                phone_number:{
                    required: true,
                    digits: true,/*
                    intlTelNumber:true,*/
                }
            },
            messages: {
                email: {
                    required: "<?php echo lang('Validation.email_required'); ?>"
                }
            },
            invalidHandler: function (event, validator) {
                $($('#updateProfileForm')).show();
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function (error, element) {
              if(element.attr('id') == "phone_number") {
                error.insertAfter('.phn_err'); 
              } else if(element.attr('id') == "mobile_number") {
                error.insertAfter('.mobile_err'); 
              } else {
                error.insertAfter(element);
              }
          },
        });
    }
   /* var handle_intl_plugin = function () {
      var country_iso = '';//<?php //echo json_encode($all_iso); ?>; //all active countries
      var default_iso = '';//<?php //echo json_encode($default_iso); ?>; //default country
      default_iso = (default_iso)?default_iso:'';
      //phone :: start
      var onedit_phoneiso = '<?php //echo isset($onedit_phoneiso)?$onedit_phoneiso:''; ?>';
      var initial_preferred_phoneiso = (onedit_phoneiso)?onedit_phoneiso:default_iso;
      // Initialize the intl-tel-input plugin
      const phoneInputField = document.querySelector("#phone_number");
      const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: initial_preferred_phoneiso,
        preferredCountries: [initial_preferred_phoneiso],
        onlyCountries: country_iso,
        separateDialCode:true,
        autoPlaceholder:"polite",
        formatOnDisplay:false,
        utilsScript: '<?php //echo base_url(); ?>/assets/vendor/intl_tel_input/utils.js',
        //"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });
      $(document).on('input','#phone_number',function(){
          event.preventDefault();
          var phoneNumber = phoneInput.getNumber();
          if (phoneInput.isValidNumber()) {
              var countryData = phoneInput.getSelectedCountryData();
              var countryCode = countryData.dialCode;
              $('#phone_code').val(countryCode);
              phoneNumber = phoneNumber.replace('+'+countryCode,'');
              $('#phone_number').val(phoneNumber);
          }
      });
      $(document).on('focusout','#phone_number',function(){
          event.preventDefault();
          var phoneNumber = phoneInput.getNumber();
          if (phoneInput.isValidNumber()) {
              var countryData = phoneInput.getSelectedCountryData();
              var countryCode = countryData.dialCode;
              $('#phone_code').val(countryCode);
              phoneNumber = phoneNumber.replace('+'+countryCode,'');
              $('#phone_number').val(phoneNumber);
          }
      });
      phoneInputField.addEventListener("close:countrydropdown",function() {
          var phoneNumber = phoneInput.getNumber();
          if (phoneInput.isValidNumber()) {
              var countryData = phoneInput.getSelectedCountryData();
              var countryCode = countryData.dialCode;
              $('#phone_code').val(countryCode);
              phoneNumber = phoneNumber.replace('+'+countryCode,'');
              $('#phone_number').val(phoneNumber);
          }
      });
      //phone :: end
      //mobile :: start
      var onedit_mobileiso = '<?php //echo isset($onedit_mobileiso)?$onedit_mobileiso:''; ?>';//saved in session
      var initial_preferred_mobileiso = (onedit_mobileiso)?onedit_mobileiso:default_iso;
      // Initialize the intl-tel-input plugin
      const mobileInputField = document.querySelector("#mobile_number");
      const mobileInput = window.intlTelInput(mobileInputField, {
        initialCountry: initial_preferred_mobileiso,
        preferredCountries: [initial_preferred_mobileiso],
        onlyCountries: country_iso,
        separateDialCode:true,
        autoPlaceholder:"polite",
        formatOnDisplay:false,
        utilsScript: '<?php //echo base_url(); ?>/assets/vendor/intl_tel_input/utils.js',
        //"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });
      $(document).on('input','#mobile_number',function(){
          event.preventDefault();
          var mobileNumber = mobileInput.getNumber();
          if (mobileInput.isValidNumber()) {
              var mobilecountryData = mobileInput.getSelectedCountryData();
              var mobilecountryCode = mobilecountryData.dialCode;
              $('#mobile_code').val(mobilecountryCode);
              mobileNumber = mobileNumber.replace('+'+mobilecountryCode,'');
              $('#mobile_number').val(mobileNumber);
          }
      });
      $(document).on('focusout','#mobile_number',function(){
          event.preventDefault();
          var mobileNumber = mobileInput.getNumber();
          if (mobileInput.isValidNumber()) {
              var mobilecountryData = mobileInput.getSelectedCountryData();
              var mobilecountryCode = mobilecountryData.dialCode;
              $('#mobile_code').val(mobilecountryCode);
              mobileNumber = mobileNumber.replace('+'+mobilecountryCode,'');
              $('#mobile_number').val(mobileNumber);
          }
      });
      mobileInputField.addEventListener("close:countrydropdown",function() {
          var mobileNumber = mobileInput.getNumber();
          if (mobileInput.isValidNumber()) {
              var mobilecountryData = mobileInput.getSelectedCountryData();
              var mobilecountryCode = mobilecountryData.dialCode;
              $('#mobile_code').val(mobilecountryCode);
              mobileNumber = mobileNumber.replace('+'+mobilecountryCode,'');
              $('#mobile_number').val(mobileNumber);
          }
      });
      //mobile :: end

      // create a custom phone number rule called 'intlTelNumber'
      jQuery.validator.addMethod("intlTelNumber", function(value, element) {
        const inputNo = (element.id == 'phone_number')?phoneInput:((element.id == 'mobile_number')?mobileInput:0);
        return this.optional(element) || inputNo.isValidNumber();
      }, "<?php //echo lang('Validation.enter_valid_phone') ?>");
    }*/
    return {
        init: function () {
            initUpdateProfile();
           // handle_intl_plugin();
        }
    };
  }();

  jQuery(document).ready(function () {
      UpdateProfile.init();
  });
  function readURL_updateprofile(input) {
    var fileInput = document.getElementById('profile_image');
    var filePath = fileInput.value;
    var extension = filePath.substr((filePath.lastIndexOf('.') + 1)).toLowerCase();
    var file_size = fileInput.size;

    if(input.files[0].size <= 512000){ // 500 KB
        if(extension == 'png' || extension == 'jpg' || extension == 'jpeg' || extension == 'gif') {
            $(':input[type="submit"]').prop("disabled",false);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.image_preview').attr('src', e.target.result);
                    $('#errormsg').html('').hide();
                    $('#is_img_removed').val('0');
                    $('#removeimgbtn').attr('disabled', false);
                }
                reader.readAsDataURL(input.files[0]);
            }
        } else{
            $('.image_preview').attr('src', '<?php echo UPLOAD_IMG_PLACEHOLDER ?>');
            $('#errormsg').html("<?php echo lang('Validation.img_allow'); ?>").show();
            $(':input[type="submit"]').prop("disabled",true);
            $('#removeimgbtn').attr('disabled', true);
            $('#is_img_removed').val('0');
            $('#profile_image').val('');
        }
    }else{
        $('.image_preview').attr('src', '<?php echo UPLOAD_IMG_PLACEHOLDER ?>');
        $('#errormsg').html("<?php echo lang('Validation.file_size_msg'); ?>").show();
        $(':input[type="submit"]').prop("disabled",true);
        $('#removeimgbtn').attr('disabled', true);
        $('#is_img_removed').val('0');
        $('#profile_image').val('');
    }
  }
  function removeProfileImg() {
    $('.image_preview').attr('src', '<?php echo UPLOAD_IMG_PLACEHOLDER ?>');
    $('#profile_image').val('');
    $('#is_img_removed').val('1');
    $('#removeimgbtn').attr('disabled', true);
  }
  function add_country_name(id,value){
    var element = $('#'+id).find('option:selected'); 
    var myTag = element.attr("data-country-name"); 
    $('#country_name').val(myTag);
  }
</script>
<?php $this->endSection() ?>