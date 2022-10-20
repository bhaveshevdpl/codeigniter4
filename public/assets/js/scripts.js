(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict


// file upload JS
 function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap').hide();
      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();
      $('.image-title').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    removeUpload();
  }
}
function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});


// category image upload
var a = document.getElementById("add-img");
function readUrl(input){
if(input.files){
    var reader = new FileReader();
    reader.readAsDataURL(input.files[0]);
    reader.onload=(e)=>{
        a.src = e.target.result;
    }
}
}
var inputFile = document.getElementById("inputFile");
removeImg=()=>{
   a.src="assets/img/demo-upload.png"; 
   inputFile.value=""; 
}
// end


//Three layer toggle 
function togglebutton(range) {

  var val = range.value;

    if (val == 1) {

      //change color of slider background
      range.className = "rangeFalse";

      //alter text 
      $('.toggle-false-msg').attr('id', 'textActive');
      $('.toggle-neutral-msg').attr('id', '');
      $('.toggle-true-msg').attr('id', '');
        
    } else if (val == 2) {
      //change color of slider background
      range.className = "rangeNeutral";
      
      //alter text 
      $('.toggle-false-msg').attr('id', '');
      $('.toggle-neutral-msg').attr('id', 'textActive');
      $('.toggle-true-msg').attr('id', '');

    } else if (val == 3) {
      //change color of slider background
      range.className = "rangeTrue";

      //alter text 
      $('.toggle-false-msg').attr('id', '');
      $('.toggle-neutral-msg').attr('id', '');
      $('.toggle-true-msg').attr('id', 'textActive');
    }
}


/*  Pattern Lock
===========================*/

$(".pattern-lock .nav-link").click(function () {
  if ($(this).closest(".nav-item").hasClass("active")) {
    $(".nav-item").removeClass("active");
  }
  else {
    $(".nav-item").removeClass("active");
    $(this).closest(".nav-item").addClass("active");
  }
});
$("#Pattern-lock .close").click(function () {
  if ($(".pattern-lock .nav-item").hasClass("active")) {
    $(".pattern-lock .nav-item").removeClass("active");
    $(".pattern-lock .nav-item:first-child").addClass("active");
  }
});


document.addEventListener("DOMContentLoaded", function() {
    // make it as accordion for smaller screens
    if(window.innerWidth > 992) {
        document.querySelectorAll('.sidebar .nav-item').forEach(function(everyitem) {
            everyitem.addEventListener('mouseover', function(e) {
                let el_link = this.querySelector('[data-toggle]');
                if(el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }
            });
            everyitem.addEventListener('mouseleave', function(e) {
                let el_link = this.querySelector('[data-toggle]');
                if(el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }
            })
        });      }
    // end if innerWidth
});
// DOMContentLoaded  end




$(document).ready(function(){
  $(".nav--toggle--icon").click(function(){
    $(this).toggleClass("close-nav-icon");

    $("body").toggleClass("close-nav");
  });
});

function add_store_in_session(store_id) {
  var store_csrfName = $('.storesess_csrfname').attr('name');
  var store_csrfHash = $('.storesess_csrfname').val();
  
  jQuery.ajax({
    type : "post",
    dataType : "json",
    url : BASE_URL + "/store/general-settings/set_store_in_session",
    data : {'store_id':store_id,[store_csrfName]: store_csrfHash},
    success: function(response) {
      /*if(current_page == 'GeneralSettings'){
        location.reload();
      }else if(current_page == 'ProductList'){
        location.reload();
        //document.querySelector('.clear_product_search_btn').click();
      }else if(current_page == "ProductAdd" || current_page == "ProductUpdate"){
        $('#product_store_id').val(response.sess_store_id);
      }else if (current_page == 'UnlockingServiceList'){
        document.querySelector('.unlocking_search_btn').click();
      }else if(current_page == 'MiscellaneousList'){  
        document.querySelector('.miscellaneous_search_btn').click();
      }else if (current_page == 'CashRegisterList'){
        location.reload();
      }else if(current_page == 'TaxConfigurationList'){
        document.querySelector('.load_table_btn').click();
      }else if(current_page == 'DeviceList'){
        document.querySelector('.clear_device_search_btn').click();
      }*/
      location.reload();
      $('.storesess_csrfname').val(response.token);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      alert(errorThrown);
    }
  });
}