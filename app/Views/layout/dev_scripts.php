<script>
    var BaseScript = function () {
        var handleSmallScripts = function () {
            feather.replace();

        };
        var handleAdditionaljQueryRules = function () {
            $.validator.addMethod('filesize', function (value, element, param) {
                return this.optional(element) || (element.files[0].size <= param);
            });

            $.validator.addMethod("emailcustom",function(value,element){
              return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
            },"Please enter valid email address");
        };
        var handleNumericValueOnly = function () {
             $("body").on('keypress keydown change paste','.numeric-value',function(event){
                if ( (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 190) || ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) ) {
                    if (event.keyCode === 46 && this.value.split('.').length === 2) {
                        event.preventDefault();
                    }
                }
                else {
                    if (event.keyCode < 48 || event.keyCode > 57 ) {
                        event.preventDefault();
                    }   
                }
            });
        };
        var handleOnlyIntNumber = function () {
             $("body").on('keypress keydown change paste','.int-value',function(event){
                if ( (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 190) || ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) ) {
                    if (event.keyCode === 46 && this.value.split('.').length === 1) {
                        event.preventDefault();
                    }
                }
                else {
                    if (event.keyCode < 48 || event.keyCode > 57 ) {
                        event.preventDefault();
                    }   
                }
            });
        };
        return {
            init: function () {
                handleSmallScripts();
                handleAdditionaljQueryRules();
                handleNumericValueOnly();
                handleOnlyIntNumber();
            },
            handleIntlTelNumber: function(phone_code_field,phone_number_field,selected_phone_iso = ''){
                $.ajax({
                    url: "<?php echo base_url('get-country-codes'); ?>",
                    type: 'get',
                    dataType: "json",
                    success: function( response ) {
                        var country_iso = (response.all_country_iso != '') ? response.all_country_iso : '';
                        var default_iso = (response.default_iso != '') ? response.default_iso.iso : '';
                        var initial_preferred_phoneiso = (selected_phone_iso != '') ? selected_phone_iso : default_iso;
                        const phoneInputField = document.querySelector('#'+phone_number_field);
                        const phoneInput = window.intlTelInput(phoneInputField, {
                            initialCountry: initial_preferred_phoneiso,
                            preferredCountries: [initial_preferred_phoneiso],
                            onlyCountries: country_iso,
                            separateDialCode:true,
                            autoPlaceholder:"polite",
                            formatOnDisplay:false,
                            utilsScript: '<?php echo base_url(); ?>/assets/vendor/intl_tel_input/utils.js',
                        });
                        $('.iti').css("display","block");
                        $(document).on('input','#'+phone_number_field,function(){
                            event.preventDefault();
                            var phoneNumber = phoneInput.getNumber();
                            if (phoneInput.isValidNumber()) {
                                var countryData = phoneInput.getSelectedCountryData();
                                var countryCode = countryData.dialCode;
                                $('#'+phone_code_field).val(countryCode);
                                phoneNumber = phoneNumber.replace('+'+countryCode,'');
                                $('#'+phone_number_field).val(phoneNumber);
                            }
                        });
                        $(document).on('focusout','#'+phone_number_field,function(){
                            event.preventDefault();
                            var phoneNumber = phoneInput.getNumber();
                            if (phoneInput.isValidNumber()) {
                                var countryData = phoneInput.getSelectedCountryData();
                                var countryCode = countryData.dialCode;
                                $('#'+phone_code_field).val(countryCode);
                                phoneNumber = phoneNumber.replace('+'+countryCode,'');
                                $('#'+phone_number_field).val(phoneNumber);
                            }
                        });
                        phoneInputField.addEventListener("close:countrydropdown",function() {
                            var phoneNumber = phoneInput.getNumber();
                            if (phoneInput.isValidNumber()) {
                                var countryData = phoneInput.getSelectedCountryData();
                                var countryCode = countryData.dialCode;
                                $('#'+phone_code_field).val(countryCode);
                                phoneNumber = phoneNumber.replace('+'+countryCode,'');
                                $('#'+phone_number_field).val(phoneNumber);
                            }
                        });
                        jQuery.validator.addMethod("intlTelNumber_"+phone_number_field, function(value, element) {
                            const inputNo = (element.id == phone_number_field) ?phoneInput : 0;
                            return this.optional(element) || inputNo.isValidNumber();
                        }, "Please enter valid phone number");
                    }
                });
            },
            inArray: function(key, array) {
                var found = 0;
                for(var i=0, len=array.length;i<len;i++){
                    if(array[i] == key){
                        return i;
                    }
                    found++;
                }
                return -1;
            }
        };
    }();
    jQuery(document).ready(function () {
        BaseScript.init();
        if(typeof $.fn.dataTable != 'undefined'){
            $.extend(true, $.fn.dataTable.defaults, {
                "language": {
                    "processing": '<div id="ajax-loader" class="ajax-loader"><div class="ajax-loader-inner"><img id="ajax-loader-img" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>" /></div></div>',
                },
            });
        }
    });
</script>