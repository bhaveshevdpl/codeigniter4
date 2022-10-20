<?php $this->extend('layout/main') ?>
<?php $this->section('web_page_title') ?>
<?php echo "POS"; ?>
<?php $this->endSection() ?>
<?php $this->section('vendor_specific_css') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/jqueryui/1.12.1/themes/smoothness/jquery-ui.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/intl_tel_input/intlTelInput.css">
<link href="<?php echo base_url('assets/vendor/choosen/choosen-min.css'); ?>" rel="stylesheet" />
<?php $this->endSection() ?>
<?php $this->section('page_specific_css') ?>
<style>
#ui-id-1{
   height: 200px;
   overflow: auto;

}
#ui-id-1 h6{
   font-family: var(--bs-body-font-family);
}
#ui-id-1 .customer-search-option-list .email{
   margin-right:  5px !important;
}
.ui-widget.ui-widget-content.ui-autocomplete .customer-search-option-list svg {
   width: 12px;
   margin-right: 6px !important;
}
.ui-widget.ui-widget-content.ui-autocomplete .ui-menu-item .customer-search-img{
   border-radius: 50%;
   height: 40px;
   width: 40px;
}
</style>
<?php $this->endSection() ?>
<?php $this->section('pos_class') ?>
<?php echo 'overflow-hidden'; ?>
<?php $this->endSection() ?>
<?php $this->section('page_content') ?>
<input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
<div class="row">
   <!-- Area Chart -->
   <div class="col-lg-7 col-md-7 pr-16 re-open-pos-col">
      <div class="card">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="form-group">
                  <input type="text" class="form-control" id="search_ticket" placeholder="Enter Ticket ID" />
               </div>
            </div>
            <div class="col-lg-6 col-md-6">
               <div class="form-group">
                  <input type="text" class="form-control" id="search_invoice" placeholder="Enter Invoice ID" />
               </div>
            </div>
         </div>
      </div>
      <!-- tabs -->
      <div class="pos--tabs">
         <ul class="nav-pills mt-3 pt-1 nav justify-content-center align-items-center">
            <li class="active">
               <a href="#Repair" data-toggle="tab"><i data-feather="tool"></i>Repair</a>
            </li>
            <li>
               <a href="#Accessories" data-toggle="tab"> <i data-feather="box"></i> Accessories </a>
            </li>
            <li>
               <a href="#Devices" data-toggle="tab"><i data-feather="smartphone"></i>Devices</a>
            </li>
            <li>
               <a href="#Unlocking" data-toggle="tab"><i data-feather="unlock"></i>Unlocking</a>
            </li>
            <li>
               <a href="#Miscellaneous" data-toggle="tab"><i data-feather="sliders"></i>Miscellaneous</a>
            </li>
         </ul>
         <div class="card pt-16">
            <div class="tab-content clearfix">
               <div class="tab-pane active" id="Repair">
                  <!-- steps -->
                  <div>
                     <ul class="nav-step nav-tabs" id="repair_steps">
                        <li class="active" id="repair_category_li">
                           <a href="#1" data-toggle="tab" id="repair_category_link">Category</a>
                        </li>
                        <li class="" id="repair_manufecturer_li">
                           <a href="#2" data-toggle="tab" id="repair_manufecturer_link">Manufacturer</a>
                        </li>
                        <li class="" id="repair_device_li">
                           <a href="#3" data-toggle="tab" id="repair_device_link">Device</a>
                        </li>
                        <li class="" id="repair_problem_li">
                           <a href="#4" data-toggle="tab" id="repair_problem_link">Problem</a>
                        </li>
                        <li class="" id="repair_part_li">
                           <a href="#5" data-toggle="tab" id="repair_part_link">Part</a>
                        </li>
                        <li class="" id="repair_detail_li">
                           <a href="#6" data-toggle="tab" id="repair_detail_link">Detail</a>
                        </li>
                     </ul>
                     <input type="hidden" class="repair-step-category-id" value="">
                     <input type="hidden" class="repair-step-manufecturer-id" value="">
                     <input type="hidden" class="repair-step-device-id" value="">
                     <input type="hidden" class="is_from_labor_category" value="0">
                     <div class="tab-content">
                        <div class="tab-pane active" id="1">
                           <div class="pos-step">
                              <div class="devider-hr d-sm-block"></div>
                              <div class="form-group form-icon-end">
                                 <input type="text" class="form-control is-valid" placeholder="Search Product" required /> <i data-feather="search"></i>
                              </div>
                              <div class="devider-hr d-sm-block"></div>
                              <div class="box-scroll-div scroll-primary">
                                 <div class="row">
                                    <div class="col-md-4 mb-16 new-repair-category-div">
                                       <div class="add-new-card new-repair-category">
                                          <div class="plus-icon text-center">
                                             <i data-feather="plus"></i>
                                             <h6 class="heading-sm">New Category</h6>
                                          </div>
                                       </div>
                                    </div>
                                    <?php if(!empty($repair_categories)) : ?>
                                       <?php foreach($repair_categories as $repair_category) : ?>
                                          <div class="col-md-4 mb-16  has-dropbar">
                                             <div class="box-card d-flex align-items-center category-card repair_category repair-category-div" data-key="<?php echo $repair_category->id?>" data-labor="<?php echo $repair_category->labor_billable_category; ?>">
                                                <?php $repair_category_img = (isset($repair_category->picture) && $repair_category->picture != '' && file_exists(ROOTPATH . 'public/uploads/'.$repair_category->picture)) ? base_url('uploads/'.$repair_category->picture) : UPLOAD_IMG_PLACEHOLDER; ?>
                                                <figure> <img src="<?php echo $repair_category_img; ?>" style="width: 100%;" /> </figure>
                                                <h6 class="heading-sm"><?php echo $repair_category->name ?></h6>
                                             </div>
                                             <div class="dropdown no-arrow show dropdown-right">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                   <a href="#" class="link link-primary repair-category-edit" data-key="<?php echo $repair_category->id ?>"> Edit </a>
                                                   <a href="#" class="link link-secondary repair-category-disable" data-toggle="modal" data-target="#disable" data-key="<?php echo $repair_category->id ?>"> Disable</a>
                                                </div>
                                             </div>
                                          </div>
                                       <?php endforeach; ?>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <div class="devider-hr d-sm-block"></div>
                           </div>
                        </div>
                        <div class="tab-pane" id="2">
                           <div class="pos-step">
                              <div class="devider-hr d-sm-block"></div>
                              <div class="form-group form-icon-end">
                                 <input type="text" class="form-control is-valid" placeholder="Search Product" required="" />
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                 </svg>
                              </div>
                              <div class="devider-hr d-sm-block"></div>
                              <div class="box-scroll-div scroll-primary">
                                 <div class="row repair-category-manufacturer-row">
                                    <div class="col-md-2 mb-16 vertical-box-5 repair-category-add-manufacturer">
                                       <div class="add-new-card" data-toggle="modal" data-target="#add-manufacturer-modal">
                                          <div class="plus-icon text-center">
                                             <i data-feather="plus"></i>
                                             <h6 class="heading-xsm">Add Manufacturer</h6>
                                          </div>
                                       </div>
                                    </div>

                                 </div>
                              </div>
                              <div class="devider-hr d-sm-block"></div>
                           </div>
                        </div>
                        <div class="tab-pane device-tab" id="3">
                           <div class="pos-step">
                              <div class="devider-hr d-sm-block"></div>
                              <div class="form-group form-icon-end">
                                 <input type="text" class="form-control is-valid" placeholder="Search Product" required="" />
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                 </svg>
                              </div>
                              <div class="devider-hr d-sm-block"></div>
                              <div class="box-scroll-div scroll-primary">
                                 <input type="hidden" id="repair-manufecturer-id" value="">
                                 <div class="row device repair-category-device-row">
                                    <div class="col-md-2 mb-16 vertical-box-5 has-dropbar repair-category-add-device">
                                       <div class="add-new-card new-repair-device">
                                          <div class="plus-icon text-center"><i data-feather="plus"></i>
                                             <h6 class="heading-sm">Add Device</h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="devider-hr d-sm-block"></div>
                           </div>
                        </div>
                        <div class="tab-pane" id="4">
                           <div class="pos-step">
                              <div class="devider-hr d-sm-block"></div>
                              <div class="d-flex justify-content-between mb-17 pt-12">
                                 <a href="javascript:void(0)" class="btn btn-success btn-md2" id="repair_problem_back_btn"><i data-feather="chevrons-left"></i>Back
                                 </a>
                                 <a href="javascript:void(0)" class="btn btn-success btn-md2" id="repair_problem_next_btn">Next <i data-feather="chevrons-right"></i>
                                 </a>
                              </div>
                              <div class="box-scroll-div scroll-primary">
                                 <div class="row repair-problem repair-category-device-issues-row">
                                    <div class="col-md-4 mb-16 has-dropbar repair-category-add-device-issue">
                                       <div class="add-new-card new-repair-device-issue">
                                          <div class="plus-icon text-center">
                                             <i data-feather="plus"></i>
                                             <h6 class="heading-sm">Add Device Issue</h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="devider-hr d-sm-block"></div>
                           </div>
                        </div>
                        <div class="tab-pane" id="5">
                           <div class="pos-step">
                              <div class="devider-hr d-sm-block"></div>
                              <div class="d-flex justify-content-between mb-17 pt-12">
                                 <a href="javascript:void(0)" class="btn btn-success btn-md2" id="reapir_part_back"><i data-feather="chevrons-left"></i>Back
                                 </a>
                                 <a href="javascript:void(0)" class="btn btn-success btn-md2" id="reapir_part_next">
                                 Next
                                 <i data-feather="chevrons-right"></i>
                                 </a>
                              </div>
                              <div class="box-scroll-div scroll-primary">
                                 <div class="row repair-category-device-parts-row">
                                    <div class="col-md-4 mb-16 repair-category-add-device-part">
                                       <div class="add-new-card new-repair-part">
                                          <div class="plus-icon text-center" >
                                             <i data-feather="plus"></i>
                                             <h6 class="heading-sm">Add Parts</h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="devider-hr d-sm-block"></div>
                           </div>
                        </div>
                        <div class="tab-pane" id="6">
                           <div class="devider-hr d-sm-block"></div>
                           <div class="step-form scroll-primary">
                              <div class="card mb-24">
                                 <form>
                                    <div class="row">
                                       <div class="col-md-6 ">
                                          <div class="form-group  mb-24">
                                             <label class="mb-8">IMEI / Serial No </label>
                                             <div class="d-flex has-drop">
                                                <div class="select-option">
                                                   <select class="form-control" data-placeholder="Head Office">
                                                      <option>IMEI</option>
                                                      <option>Serial</option>
                                                   </select>
                                                </div>
                                                <input type="text" class="form-control" placeholder="" />
                                             </div>
                                          </div>
                                          <div class=" mb-24 repair-detail-password-pattern-div">
                                          </div>
                                          <div class="form-group  mb-24 repair-detail-warranty-div">
                                             
                                          </div>
                                          <div class="form-group  mb-24">
                                             <label class="mb-8">Task Due Date & Time</label>
                                             <input type="date" class="form-control" placeholder="Select Date" />
                                          </div>
                                          <div class="form-group mb-24">
                                             <label class="mb-8">Diagnostic Note</label>
                                             <textarea type="text" class="form-control" placeholder="Type here"></textarea>
                                          </div>
                                          <div class="form-group mb-24">
                                             <label class="mb-8">Internal Note</label>
                                             <textarea type="text" class="form-control" placeholder="Type here"></textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-6 mb-16">
                                          <div class="mb-24">
                                             <div class="form-group">
                                                <label class="mb-8">Repair Charges</label>
                                                <input type="text"  class="form-control repair-detail-repair-charges" placeholder="00.00" />
                                             </div>
                                          </div>
                                          <span class="repair-detail-device-network-span">
                                             
                                          </span>
                                          <div class="form-group mb-24">
                                             <label class="mb-8 w-100">Repair Task Type</label>
                                             <select class="form-control w-100 repair-details-task-types" data-placeholder="Select">
                                                <option value=""></option>
                                             </select>
                                          </div>
                                          <div class="form-group mb-24">
                                             <label class="mb-8">Additional Note</label>
                                             <textarea type="text" class="form-control" placeholder="Type here"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row repair-detail-additional-items">
                                       
                                    </div>
                                    <div class="row repair-detail-custom-fields">

                                    </div>
                                 </form>
                              </div>
                              <div class="card device-prerepair mt-4">
                                 <div  data-toggle="collapse" href="#device-repair-checklist" role="button" aria-expanded="false" aria-controls="device-repair-checklist" class="d-flex justify-content-between accord-head">
                                    <div class="d-flex align-items-center">
                                       <i data-feather="edit" class="mr-8 link-secondary w-18"></i>
                                       <h6 class="mb-0">Device Pre-Repair Condition Checklist</h6>
                                    </div>
                                    <i data-feather="chevron-up" class="w-18"></i>
                                 </div>
                                 <div class="collapse in accord-body" id="device-repair-checklist">
                                    <div class="card-detail-checklist">
                                       <div class="form-group form-group-textarea mb-3">
                                          <label class="mb-8">Category</label>
                                          <div class="row justify-content-between">
                                             <div class="col-md-6">
                                                <select class="form-control repair-details-repair-categories" data-placeholder="Select">
                                                   <option value=""></option>
                                                </select>
                                             </div>
                                             <div class="col-md-6 d-flex justify-content-end box-card-toggle bg-none">
                                                <div class="d-flex d-flex mb-16 align-items-center">
                                                   <div class="form-switch mr-8">
                                                      <div class="three-checkbox round">
                                                         <input type="radio" class="repair-detail-select-all-fail" name="select-all">
                                                         <input type="radio" class="repair-detail-select-all-not-checked" name="select-all" checked="checked">
                                                         <input type="radio" class="repair-detail-select-all-pass" name="select-all">
                                                         <span class="slider"></span>
                                                      </div>
                                                   </div>
                                                   <div class="switch-detail no-space">
                                                      Select All
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row repair-category-pre-post-conditions-row">
                                          <div class="col-md-6">
                                             <div class="box-card-toggle left-repair-category-pre-post-conditions">
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="box-card-toggle right-repair-category-pre-post-conditions"> 
                                             </div>
                                          </div>
                                       </div>
                                       <div class="check-btn-detail d-flex mt-3">
                                          <div class="button-detail-check button-detail-green d-flex align-items-center">
                                             <i class="mr-8"></i>
                                             <label>Pass</label>
                                          </div>
                                          <div class="button-detail-check button-detail-red d-flex align-items-center">
                                             <i class="mr-8"></i>
                                             <label>Fail</label>
                                          </div>
                                          <div class="button-detail-check button-detail-disable d-flex align-items-center">
                                             <i class="mr-8"></i>
                                             <label>Unable to test</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="Confirm-btn">
                                 <button class="btn btn-success btn-md text-center w-100">Confirm  <i data-feather="check-circle" class="w-18"></i></button>
                              </div>
                           </div>
                           <div class="devider-hr d-sm-block"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="Accessories">
                  <div class="pos-step">
                     <div class="form-group form-icon-end">
                        <input type="text" class="form-control is-valid" placeholder="Search Product Here" required="" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                           <circle cx="11" cy="11" r="8"></circle>
                           <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                     </div>
                     <div class="devider-hr d-sm-block"></div>
                     <div class="box-scroll-div scroll-primary box-scroll-tab">
                        <ul class="nav-tabs-col2 accessories-tabs" role="tablist">
                           <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#category" role="tab">By Category</a> </li>
                           <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#product" role="tab">All Products</a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-16">
                           <div class="tab-pane active" id="category" role="tabpanel">
                              <ul class="nav-step nav-tabs mb-16">
                                 <li class="active"> <a href="#by-categories" data-toggle="tab">Categories</a> </li>
                                 <li class=""><a href="#by-Accessories" data-toggle="tab">Accessories</a></li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="by-categories">
                                    <div class="row">
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Accessories</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Back Glass Covers</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Battery</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Cable</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Car Holder</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Case</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Charger</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Charging Port</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Ear Speaker</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Electronic </h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Electronic Device's</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Front Camera/Proximity Sensor</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Games Consoles</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Headphone</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Home Button</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Housing</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-3 mb-16 accessories-category">
                                          <div class="box-card align-items-center text-center d-flex justify-content-center">
                                             <h6 class="heading-sm mb-0">Hygiene</h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="by-Accessories">
                                    <div class="row">
                                       <div class="col-md-4 mb-16">
                                          <div class="add-new-card" data-toggle="modal" data-target="#inventory-item">
                                             <div class="plus-icon text-center">
                                                <i data-feather="plus"></i>
                                                <h6 class="heading-sm">Add Product</h6>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 mb-16 has-dropbar">
                                          <div class="box-card products-card">
                                             <div class="box-detail">
                                                <h6 class="heading-xsm mb-6">Acer ASPIRE 3 A315-42-R6RL LCD Screen Red Back Cover</h6>
                                                <div class="price-box heading-sm d-flex justify-content-between"> <span>£31.99</span> <span class="alert-stock">On Hand:  0</span> </div>
                                             </div>
                                          </div>
                                          <div class="dropdown no-arrow show dropdown-right">
                                             <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                             <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                                <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 mb-16 has-dropbar">
                                          <div class="box-card products-card">
                                             <div class="box-detail">
                                                <h6 class="heading-xsm mb-6">Acer ASPIRE 3 A315-42-R6RL LCD Screen Red Back Cover</h6>
                                                <div class="price-box heading-sm d-flex justify-content-between"> <span>£31.99</span> <span class="alert-stock">On Hand:  0</span> </div>
                                             </div>
                                          </div>
                                          <div class="dropdown no-arrow show dropdown-right">
                                             <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                             <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                                <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 mb-16 has-dropbar">
                                          <div class="box-card products-card">
                                             <div class="box-detail">
                                                <h6 class="heading-xsm mb-6">Acer ASPIRE 3 A315-42-R6RL LCD Screen Red Back Cover</h6>
                                                <div class="price-box heading-sm d-flex justify-content-between"> <span>£31.99</span> <span class="alert-stock">On Hand:  0</span> </div>
                                             </div>
                                          </div>
                                          <div class="dropdown no-arrow show dropdown-right">
                                             <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                             <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                                <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 mb-16 has-dropbar">
                                          <div class="box-card products-card">
                                             <div class="box-detail">
                                                <h6 class="heading-xsm mb-6">Acer ASPIRE 3 A315-42-R6RL LCD Screen Red Back Cover</h6>
                                                <div class="price-box heading-sm d-flex justify-content-between"> <span>£31.99</span> <span class="alert-stock">On Hand:  0</span> </div>
                                             </div>
                                          </div>
                                          <div class="dropdown no-arrow show dropdown-right">
                                             <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                             <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                                <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="product" role="tabpanel">
                              <div class="row">
                                 <div class="col-md-4 mb-16">
                                    <div class="add-new-card" data-toggle="modal" data-target="#inventory-item">
                                       <div class="plus-icon text-center">
                                          <i data-feather="plus"></i>
                                          <h6 class="heading-sm">Add Product</h6>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-16 has-dropbar">
                                    <div class="box-card products-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6">Chipquik SMD291/10cc No-Clean Paste Flux</h6>
                                          <div class="price-box heading-sm d-flex justify-content-between"> <span>£22.71</span> <span class="alert-stock">In Stock: 2</span> </div>
                                       </div>
                                    </div>
                                    <div class="dropdown no-arrow show dropdown-right">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                       <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                          <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                          <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-16 has-dropbar">
                                    <div class="box-card products-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6">
                                             ESR Case for iPad Pro 12.9'' 2020/2018 Navy Blue
                                          </h6>
                                          <div class="price-box heading-sm d-flex justify-content-between"> <span>£18.89</span> <span class="alert-stock">In Stock: 0</span> </div>
                                       </div>
                                    </div>
                                    <div class="dropdown no-arrow show dropdown-right">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                       <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                          <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                          <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-16 has-dropbar">
                                    <div class="box-card products-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6">
                                             iPhone 12 & 12 Pro 6.1" Wallet Case Black
                                          </h6>
                                          <div class="price-box heading-sm d-flex justify-content-between"> <span>£9.99</span> <span class="alert-stock">In Stock: 0</span> </div>
                                       </div>
                                    </div>
                                    <div class="dropdown no-arrow show dropdown-right">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                       <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                          <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                          <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-16 has-dropbar">
                                    <div class="box-card products-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6">
                                             iPhone 12 & 12 Pro 6.1" Wallet Case Blue
                                          </h6>
                                          <div class="price-box heading-sm d-flex justify-content-between"> <span>£9.99</span> <span class="alert-stock">In Stock: 0</span> </div>
                                       </div>
                                    </div>
                                    <div class="dropdown no-arrow show dropdown-right">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                       <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                          <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                          <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-16 has-dropbar">
                                    <div class="box-card products-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6">
                                             iPhone 12 & 12 Pro 6.1" Wallet Case Pink
                                          </h6>
                                          <div class="price-box heading-sm d-flex justify-content-between"> <span>£9.99</span> <span class="alert-stock">In Stock: 0</span> </div>
                                       </div>
                                    </div>
                                    <div class="dropdown no-arrow show dropdown-right">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                       <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                          <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                          <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-16 has-dropbar">
                                    <div class="box-card products-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6">
                                             7'' Glass Removal Phone Heating Platform LCD Screen Separator Plate
                                          </h6>
                                          <div class="price-box heading-sm d-flex justify-content-between"> <span>£44.99</span> <span class="alert-stock">In Stock: 0</span> </div>
                                       </div>
                                       <div class="dropdown no-arrow show dropdown-right">
                                          <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                             <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                             <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-16 has-dropbar">
                                    <div class="box-card products-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6">
                                             750W Hot Air Gun Soldering Desoldering Station
                                          </h6>
                                          <div class="price-box heading-sm d-flex justify-content-between"> <span>£57.99</span> <span class="alert-stock">In Stock: 0</span> </div>
                                       </div>
                                    </div>
                                    <div class="dropdown no-arrow show dropdown-right">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                       <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                          <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                          <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-16 has-dropbar">
                                    <div class="box-card products-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6">
                                             8 Pin Lightning Male to USB Female OTG Adapter Cable Camera for iPad Air iPhone
                                          </h6>
                                          <div class="price-box heading-sm d-flex justify-content-between"> <span>£19.99</span> <span class="alert-stock">In Stock: 0</span> </div>
                                       </div>
                                    </div>
                                    <div class="dropdown no-arrow show dropdown-right">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                       <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                          <a href="#" class="link link-primary" data-toggle="modal" data-target="#parts-order"> Edit </a>
                                          <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="devider-hr d-sm-block"></div>
                  </div>
               </div>
               <div class="tab-pane" id="Devices">
                  <div class="pos-step">
                     <div class="form-group form-icon-end">
                        <input type="text" class="form-control is-valid device-all-product-tab-product-search" placeholder="Search Device Here" required="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                           <circle cx="11" cy="11" r="8"></circle>
                           <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                     </div>
                     <div class="devider-hr d-sm-block"></div>
                     <div class="box-scroll-div scroll-primary box-scroll-tab">
                        <ul class="nav-tabs-col2 accessories-tabs" role="tablist">
                           <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#category-Devices" role="tab">By Category</a> </li>
                           <li class="nav-item"> <a class="nav-link product-device-link" data-toggle="tab" href="#productDevices" role="tab">All Products</a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-16">
                           <div class="tab-pane active" id="category-Devices" role="tabpanel">
                              <ul class="nav-step nav-tabs mb-16">
                                 <li class="active"> <a href="#Category" data-toggle="tab">Category</a> </li>
                                 <li class=""><a href="#Manufacturer" data-toggle="tab">Manufacturer</a></li>
                                 <li class=""><a href="#Device" data-toggle="tab">Device</a></li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="Category">
                                    <div class="pos-step">
                                       <div class="row">
                                          <div class="col-md-4 mb-16 ">
                                             <div class="add-new-card"  data-toggle="modal" data-target="#add-device">
                                                <div class="plus-icon text-center">
                                                   <i data-feather="plus"></i>
                                                   <h6 class="heading-sm">Add Devices</h6>
                                                </div>
                                             </div>
                                          </div>
                                          <?php if(!empty($product_categories)) : ?>
                                             <?php foreach($product_categories as $product_category) : ?>
                                                 <?php $product_category_img = (isset($product_category->picture) && $product_category->picture != '' && file_exists(ROOTPATH . 'public/uploads/'.$product_category->picture)) ? base_url('uploads/'.$product_category->picture) : UPLOAD_IMG_PLACEHOLDER; ?>
                                                 <div class="col-md-4 mb-16 has-dropbar">
                                                   <div class="box-card d-flex align-items-center category-card">
                                                      <figure> <img src="<?php echo $product_category_img; ?>" style="width: 100%"/> </figure>
                                                      <h6 class="heading-sm"><?php echo $product_category->name ?></h6>
                                                   </div>
                                                   <div class="dropdown no-arrow show dropdown-right">
                                                      <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                         <a href="#" class="link link-primary" data-toggle="modal" data-target="#edit-category"> Edit </a>
                                                         <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                                      </div>
                                                   </div>
                                                </div>
                                             <?php endforeach; ?>
                                          <?php endif; ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="Manufacturer">
                                    <div class="pos-step">
                                       <div class="row device-manufacturer-row">
                                          <div class="col-md-2 mb-16 vertical-box-5">
                                             <div class="add-new-card" data-toggle="modal" data-target="#add-manufacturer-modal">
                                                <div class="plus-icon text-center">
                                                   <i data-feather="plus"></i>
                                                   <h6 class="heading-xsm">Add Manufacturer</h6>
                                                </div>
                                             </div>
                                          </div>
                                          <?php if(!empty($manufacturers)) : ?>
                                             <?php foreach($manufacturers as $manufacturer) : ?>
                                                <?php $manufacturer_img = (isset($manufacturer->picture) && $manufacturer->picture != '' && file_exists(ROOTPATH . 'public/uploads/'.$manufacturer->picture)) ? base_url('uploads/'.$manufacturer->picture) : UPLOAD_IMG_PLACEHOLDER; ?>
                                                <div class="col-md-2 mb-16 vertical-box-5 has-dropbar">
                                                   <div class="box-card align-items-center category-card manufecturer-div">
                                                      <figure> <img src="<?php echo $manufacturer_img; ?>" /> </figure>
                                                      <h6 class="heading-xsm"><?php echo $manufacturer->name ?></h6>
                                                   </div>
                                                   <div class="dropdown no-arrow show dropdown-right">
                                                      <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                         <a href="#" class="link link-primary manufacturer-edit-1" data-key="<?php echo $manufacturer->id ?>" data-toggle="modal" data-target="#add-manufacturer-modal"> Edit </a>
                                                         <a href="#" class="link link-secondary manufacturer-disable" data-key="<?php echo $manufacturer->id ?>" data-toggle="modal" data-target="#disable"> Disable</a>
                                                      </div>
                                                   </div>
                                                </div>
                                             <?php endforeach; ?>
                                          <?php endif; ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane device-tab" id="Device">
                                    <div class="pos-step">
                                       <div class="row device pt-2">
                                          <div class="col-md-6 mb-16 has-dropbar">
                                             <div class="box-card category-card device-card">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <figure> <img src="assets/img/iphone-11-pro-max.png" /> </figure>
                                                   </div>
                                                   <div class="col-md-8">
                                                      <div>
                                                         <h6 class="heading-sm">iPhone 11 Pro Max</h6>
                                                         <p class="heading-xsm m-0">IMEI: 355149040703155</p>
                                                         <span class="alert-stock">In Stock: 0</span>
                                                         <div class="stock-pricedetail d-flex justify-content-between">
                                                            <div class="">
                                                               <label class="color mr-8 color-green"></label> <span>Green</span>
                                                            </div>
                                                            <div class="price-box-wrap"> £374.99 </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="dropdown no-arrow show dropdown-right">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                   <a href="#" class="link link-primary" data-toggle="modal" data-target="#edit-device">Edit </a>
                                                   <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable">Disable</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6 mb-16 has-dropbar">
                                             <div class="box-card category-card device-card">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <figure> <img src="assets/img/iphone-11-pro-max.png" /></figure>
                                                   </div>
                                                   <div class="col-md-8">
                                                      <div>
                                                         <h6 class="heading-sm">iPhone 11 Pro Max</h6>
                                                         <p class="heading-xsm m-0">IMEI: 355149040703155</p>
                                                         <span class="alert-stock">In Stock: 0</span>
                                                         <div class="stock-pricedetail d-flex justify-content-between">
                                                            <div class="">
                                                               <label class="color mr-8 color-green"></label> <span>Green</span>
                                                            </div>
                                                            <div class="price-box-wrap"> £374.99 </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="dropdown no-arrow show dropdown-right">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                   <a href="#" class="link link-primary" data-toggle="modal" data-target="#edit-device"> Edit </a>
                                                   <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6 mb-16 has-dropbar">
                                             <div class="box-card category-card device-card">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <figure> <img src="assets/img/iphone-11-pro-max.png" /> </figure>
                                                   </div>
                                                   <div class="col-md-8">
                                                      <div>
                                                         <h6 class="heading-sm">iPhone 11 Pro Max</h6>
                                                         <p class="heading-xsm m-0">IMEI: 355149040703155</p>
                                                         <span class="alert-stock">In Stock: 0</span>
                                                         <div class="stock-pricedetail d-flex justify-content-between">
                                                            <div class="">
                                                               <label class="color mr-8 color-green"></label> <span>Green</span>
                                                            </div>
                                                            <div class="price-box-wrap"> £374.99 </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="dropdown no-arrow show dropdown-right">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                   <a href="#" class="link link-primary" data-toggle="modal" data-target="#edit-device"> Edit </a>
                                                   <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6 mb-16 has-dropbar">
                                             <div class="box-card category-card device-card">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <figure> <img src="assets/img/iphone-11-pro-max.png" /> </figure>
                                                   </div>
                                                   <div class="col-md-8">
                                                      <div>
                                                         <h6 class="heading-sm">iPhone 11 Pro Max</h6>
                                                         <p class="heading-xsm m-0">IMEI: 355149040703155</p>
                                                         <span class="alert-stock">In Stock: 0</span>
                                                         <div class="stock-pricedetail d-flex justify-content-between">
                                                            <div class="">
                                                               <label class="color mr-8 color-green"></label> <span>Green</span>
                                                            </div>
                                                            <div class="price-box-wrap"> £374.99 </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="dropdown no-arrow show dropdown-right">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                   <a href="#" class="link link-primary" data-toggle="modal" data-target="#edit-device"> Edit </a>
                                                   <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6 mb-16 has-dropbar">
                                             <div class="box-card category-card device-card">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <figure> <img src="assets/img/iphone-11-pro-max.png" /> </figure>
                                                   </div>
                                                   <div class="col-md-8">
                                                      <div>
                                                         <h6 class="heading-sm">iPhone 11 Pro Max</h6>
                                                         <p class="heading-xsm m-0">IMEI: 355149040703155</p>
                                                         <span class="alert-stock">In Stock: 0</span>
                                                         <div class="stock-pricedetail d-flex justify-content-between">
                                                            <div class="">
                                                               <label class="color mr-8 color-green"></label> <span>Green</span>
                                                            </div>
                                                            <div class="price-box-wrap"> £374.99 </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="dropdown no-arrow show dropdown-right">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                   <a href="#" class="link link-primary" data-toggle="modal" data-target="#edit-device"> Edit </a>
                                                   <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6 mb-16 has-dropbar">
                                             <div class="box-card category-card device-card">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <figure> <img src="assets/img/iphone-11-pro-max.png" /> </figure>
                                                   </div>
                                                   <div class="col-md-8">
                                                      <div>
                                                         <h6 class="heading-sm">iPhone 11 Pro Max</h6>
                                                         <p class="heading-xsm m-0">IMEI: 355149040703155</p>
                                                         <span class="alert-stock">In Stock: 0</span>
                                                         <div class="stock-pricedetail d-flex justify-content-between">
                                                            <div class="">
                                                               <label class="color mr-8 color-green"></label> <span>Green</span>
                                                            </div>
                                                            <div class="price-box-wrap"> £374.99 </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="dropdown no-arrow show dropdown-right">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                   <a href="#" class="link link-primary" data-toggle="modal" data-target="#edit-device"> Edit </a>
                                                   <a href="#" class="link link-secondary" data-toggle="modal" data-target="#disable"> Disable</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="productDevices" role="tabpanel">
                              <div class="row device pt-2 devices-all-products-row">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="devider-hr d-sm-block"></div>
                  </div>
               </div>
               <div class="tab-pane" id="Unlocking">
                  <!-- steps -->
                  <div class="pos-step unlocking-wrap">
                     <div class="d-flex justify-content-end">
                        <a href="javascript:void(0)" class="btn btn-primary btn-md2 new-unlocking-product">Products <i data-feather="plus"></i></a>
                     </div>
                     <div class="devider-hr d-sm-block"></div>
                     <div class="box-scroll-div scroll-primary box-scroll-tab">
                        <div class="row">
                           <div class="col-md-7 mb-19">
                              <div class="form-group mb-19">
                                 <label class="mb-8 w-100">Choose Network </label>
                                 <select class="form-control form-control-md w-100 select unlock-select2" data-placeholder="Select">
                                    <option value=""></option>
                                    <?php if(!empty($unlocking_products)): ?>
                                       <?php foreach($unlocking_products as $unlocking_product): ?>
                                          <option value="<?php echo $unlocking_product->id; ?>"><?php echo $unlocking_product->name; ?></option>
                                       <?php endforeach; ?>
                                    <?php endif; ?>
                                 </select>
                              </div>
                              <div class="form-group form-group-textarea mb-19">
                                 <label class="mb-8">Additional Note</label>
                                 <textarea type="text" class="form-control form-control-md" placeholder="Type here"></textarea>
                                 <p class="note"> <span>*</span> You can enter several serial numbers (one per line) if you have several similar phones (for the same unlock solution and the same information) </p>
                              </div>
                              <div class="form-group mb-19">
                                 <label class="mb-8">Retail Price </label>
                                 <input type="text" class="form-control form-control-md unlocking-price" placeholder="" value="">
                                 <p class="note unlocking-toggle-price show-price"> Show Cost Price ? </p>
                                 <span class="unlocking-cost-price" style="display:none;"></span>
                              </div>
                              <div class="form-group form-group-textarea">
                                 <label class="mb-8">Comments</label>
                                 <textarea type="text" class="form-control form-control-md" placeholder="Type here"></textarea>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="information-detail">
                                 <div class="information-detail-inner d-flex">
                                    <div class="info-icon"> <i data-feather="truck"></i> </div>
                                    <div class="info-detail">
                                       <p class="mb-0">Delivery Time:</p>
                                       <p class="mb-0 unlocking-delivery-time"> </p>
                                    </div>
                                 </div>
                                 <div class="information-detail-inner d-flex">
                                    <div class="info-icon"> <i data-feather="file"></i> </div>
                                    <div class="info-detail">
                                       <p class="mb-0">Description:</p>
                                       <p class="mb-0 unlocking-description"> </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <button class="btn btn-secondary btn">Book Now</button>
                           </div>
                        </div>
                     </div>
                     <div class="devider-hr d-sm-block"></div>
                  </div>
               </div>
               <div class="tab-pane" id="Miscellaneous">
                  <!-- steps -->
                  <div class="pos-step">
                     <div class="form-group form-icon-end">
                        <input type="text" class="form-control is-valid miscellaneous-product-search" placeholder="Search Product Here" required="" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                           <circle cx="11" cy="11" r="8"></circle>
                           <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                     </div>
                     <div class="devider-hr d-sm-block"></div>
                     <div class="box-scroll-div scroll-primary box-scroll-tab">
                        <div class="row miscellaneous-product-div">
                           <div class="col-md-4 mb-16">
                              <div class="add-new-card new-miscellaneous-product">
                                 <div class="plus-icon text-center">
                                    <i data-feather="plus"></i>
                                    <h6 class="heading-sm">Add Casual</h6>
                                 </div>
                              </div>
                           </div>
                           <?php if(!empty($miscellaneous_products)):?>
                              <?php foreach($miscellaneous_products as $miscellaneous_product):?>
                                 <div class="col-md-4 mb-16 has-dropbar miscellaneous-product">
                                    <div class="box-card checkbox-card">
                                       <div class="box-detail">
                                          <h6 class="heading-xsm mb-6"><?php echo $miscellaneous_product->name; ?></h6>
                                          <div class="price-box heading-sm"> <?php echo $miscellaneous_product->retail_price; ?> </div>
                                       </div>
                                    </div>
                                    <div class="dropdown no-arrow show dropdown-right dropdown-right">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>
                                       <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                          <a href="#" class="link link-primary miscellaneous-product-edit" data-toggle="modal" data-target="#newMiscellaneousProduct" data-key="<?php echo $miscellaneous_product->id; ?>"> Edit </a>
                                          <a href="#" class="link link-secondary miscellaneous-product-disable" data-toggle="modal" data-target="#disable" data-key="<?php echo $miscellaneous_product->id; ?>"> Disable</a>
                                       </div>
                                    </div>
                                 </div>
                              <?php endforeach; ?>
                           <?php endif;?>
                        </div>
                     </div>
                     <div class="devider-hr d-sm-block"></div>
                  </div>
               </div>
            </div>
            <div class="pos-btn">
               <a href="#" class="btn btn-outline-primary btn-md mr-8" data-toggle="modal" data-target="#view-ticket"> <i data-feather="eye" class="mr-8" ></i>View Tickets</a>
               <a href="#" class="btn btn-outline-primary btn-md mr-8" data-toggle="modal" data-target="#invoic-history"><i data-feather="file-text" class="mr-8" ></i>View Invoice</a>
               <a href="#" class="btn btn-outline-primary btn-md mr-8 has-img" data-toggle="modal" data-target="#warranty-claim" >
                  <svg class="mr-8" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M7.54171 2.54166V3.3324C7.54171 3.33271 7.54171 3.33209 7.54171 3.3324C7.54171 3.33271 7.54171 3.33394 7.54171 3.33425V4.12499H12.4584V2.54166H7.54171ZM14.2079 2.45832C14.1858 1.53409 13.4296 0.791656 12.5 0.791656H7.50004C6.57048 0.791656 5.81433 1.53409 5.79221 2.45832H5.00004C4.32595 2.45832 3.67947 2.72611 3.20281 3.20276C2.72616 3.67942 2.45837 4.3259 2.45837 4.99999V16.6667C2.45837 17.3407 2.72616 17.9872 3.20281 18.4639C3.67947 18.9405 4.32595 19.2083 5.00004 19.2083H15C15.6741 19.2083 16.3206 18.9405 16.7973 18.4639C17.2739 17.9872 17.5417 17.3407 17.5417 16.6667V4.99999C17.5417 4.3259 17.2739 3.67941 16.7973 3.20276C16.3206 2.72611 15.6741 2.45832 15 2.45832H14.2079ZM14.2079 4.20832C14.1858 5.13256 13.4296 5.87499 12.5 5.87499H7.50004C6.57048 5.87499 5.81433 5.13256 5.79221 4.20832H5.00004C4.79008 4.20832 4.58871 4.29173 4.44025 4.4402C4.29178 4.58866 4.20837 4.79003 4.20837 4.99999V16.6667C4.20837 16.8766 4.29178 17.078 4.44025 17.2264C4.58871 17.3749 4.79008 17.4583 5.00004 17.4583H15C15.21 17.4583 15.4114 17.3749 15.5598 17.2264C15.7083 17.078 15.7917 16.8766 15.7917 16.6667V4.99999C15.7917 4.79003 15.7083 4.58866 15.5598 4.4402C15.4114 4.29173 15.21 4.20832 15 4.20832H14.2079Z" fill="black" />
                  </svg>
                  Warranty Claim
               </a>
               <a href="#" class="btn btn-outline-primary btn-md has-img"  data-toggle="modal" data-target="#more-action">
                  <svg class="mr-8" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M1.625 2.5C1.625 2.01675 2.01675 1.625 2.5 1.625H8.33333C8.81658 1.625 9.20833 2.01675 9.20833 2.5V8.33333C9.20833 8.81658 8.81658 9.20833 8.33333 9.20833H2.5C2.01675 9.20833 1.625 8.81658 1.625 8.33333V2.5ZM3.375 3.375V7.45833H7.45833V3.375H3.375ZM10.7917 2.5C10.7917 2.01675 11.1834 1.625 11.6667 1.625H17.5C17.9832 1.625 18.375 2.01675 18.375 2.5V8.33333C18.375 8.81658 17.9832 9.20833 17.5 9.20833H11.6667C11.1834 9.20833 10.7917 8.81658 10.7917 8.33333V2.5ZM12.5417 3.375V7.45833H16.625V3.375H12.5417ZM1.625 11.6667C1.625 11.1834 2.01675 10.7917 2.5 10.7917H8.33333C8.81658 10.7917 9.20833 11.1834 9.20833 11.6667V17.5C9.20833 17.9832 8.81658 18.375 8.33333 18.375H2.5C2.01675 18.375 1.625 17.9832 1.625 17.5V11.6667ZM3.375 12.5417V16.625H7.45833V12.5417H3.375ZM10.7917 11.6667C10.7917 11.1834 11.1834 10.7917 11.6667 10.7917H17.5C17.9832 10.7917 18.375 11.1834 18.375 11.6667V17.5C18.375 17.9832 17.9832 18.375 17.5 18.375H11.6667C11.1834 18.375 10.7917 17.9832 10.7917 17.5V11.6667ZM12.5417 12.5417V16.625H16.625V12.5417H12.5417Z" fill="black" />
                  </svg>
                  More Actions
               </a>
            </div>
         </div>
      </div>
   </div>
   <!-- Pie Chart -->
   <div class="col-lg-5 col-md-5 pl-16 ticket-preview-col">
      <div class="card pt-16 pb-0 overflow-hidden">
         <div class="row">
            <div class="col-lg-9 col-md-9">
               <div class="form-group form-icon-end">
                  <input type="text" class="form-control is-valid" id="search_customer" placeholder="Search Customer" required /> <i data-feather="search"></i>
               </div>
            </div>
            <div class="col-lg-3 col-md-3">
               <button class="btn btn-outline-primary btn w-100 new-customer-modal">New</button>

            </div>
         </div>
         <div class="devider-hr d-sm-block"></div>
         <div class="ticket-preview">
            <?php
               $customer = (session()->get('pos_selected_customer_id') != '') ? getCustomerById(session()->get('pos_selected_customer_id')) : '';
            ?>
            <div class="ticket-preview-topbar d-flex flex-wrap justify-content-between selected-customer">
               <div class="d-flex align-items-center">
                  <?php $display = (!empty($customer)) ? 'block' : 'none' ?>
                  <div class="preview-user pr-16">
                     <img src="<?php echo (!empty($customer)) ?  $customer['image'] : base_url(USER_PREVIEW_IMG) ?>" style="display:<?php echo $display; ?>"/>
                  </div>
                  <div>
                     <h6 style="display:<?php echo $display; ?>"><?php echo (!empty($customer)) ? $customer['name'] : '' ?></h6>
                     <div class="d-flex contact-detail">
                        <a href="#" class="pr-16 mail" style="display:<?php echo $display; ?>">
                           <i data-feather="mail"></i><span class="email">
                           <?php echo (!empty($customer)) ? $customer['email'] : '' ?></span>
                        </a> 
                        <a href="#" class="phone" style="display:<?php echo $display; ?>">
                           <i data-feather="phone-call"></i><span class="phone-number"><?php echo (!empty($customer)) ? $customer['phone'] : '' ?>
                           </span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="d-flex align-items-center">
                  <button class="link link-primary customer-edit-btn" style="display:<?php echo $display; ?>" id="customerEdit">Edit</button>
                  <a href="ViewManageCustomer.php" class="link link-primary customer-history-btn" style="display:<?php echo $display; ?>">Purchase History</a>
               </div>
            </div>
            <div class="form-group form-icon-end mt-16">
               <input type="text" class="form-control is-valid" id="search_product" placeholder="Enter Item Name, SKU" required /> <i data-feather="search"></i>
            </div>
            <div class="preview-table pt-16">
               <div class="w-100">
                  <div class="thead">
                     <ul class="d-flex">
                        <li class="heading-sm">Item Name</li>
                        <li class="heading-sm">Qty</li>
                        <li class="heading-sm">Price</li>
                        <li class="heading-sm tax">Tax</li>
                        <li class="heading-sm total">Total</li>
                        <li class="heading-sm"></li>
                     </ul>
                  </div>
                  <div class="tbody scroll-primary">
                     <ul class="table-ul">
                        <li class="table-ul-li">
                           <ul class="table-child-ul d-flex">
                              <li>
                                 <div class="cart-detail">
                                    <p class="blue mb-0">(Iphone 11) </p>
                                    <p class="mb-0">Audio Repair</p>
                                    <p class="mb-0">IMEI: 00000000000</p>
                                    <a href="javascript:void(0)" class="btn btn-outline-success btn-xs">In Progress</a>
                                    <a href="#" class="btn-black d-sm-block w-100" data-toggle="modal" data-target="#Ticket-History">
                                    View Comments
                                    </a>
                                    <div class="btns-detail">
                                       <a href="#" class="btn-black" data-toggle="modal" data-target="#pre-repair">Pre Repair</a>
                                       <a href="#" class="btn-black" data-toggle="modal" data-target="#post-repair">Post Repair</a>
                                    </div>
                                    <a data-toggle="modal" data-target="#Update-Ticket" class="btn btn-secondary btn-xs">Edit Ticket</a>
                                 </div>
                              </li>
                              <li>01</li>
                              <li>
                                 <span class="d-block">£0.00</span>
                                 <a class="link link-secondary" data-toggle="modal" data-target="#add-Discount">Disc = £0.00 </a>
                              </li>
                              <li>£0.00</li>
                              <li>£0.00</li>
                              <li><i data-feather="trash-2" class="link-danger"></i></li>
                           </ul>
                           <ul class="table-child-ul d-flex">
                              <li>
                                 <div class="cart-detail">
                                    <p class="blue mb-0">Iphone / Ipad - O2/ </p>
                                    <p class="mb-8">IMEI: 123456789123456</p>
                                    <a href="#" class="btn-black d-sm-block w-100 pb-0" data-toggle="modal" data-target="#more-info">
                                    More Info
                                    </a>
                                    <a data-toggle="modal" data-target="#edit-unlock" class="btn btn-secondary btn-xs">Edit</a>
                                 </div>
                              </li>
                              <li>01</li>
                              <li>
                                 <span class="d-block">£20.83</span>
                                 <a class="link link-secondary" data-toggle="modal" data-target="#add-Discount">Disc = £0.00 </a>
                              </li>
                              <li>£0.00</li>
                              <li>£24.99</li>
                              <li><i data-feather="trash-2" class="link-danger"></i></li>
                           </ul>
                           <ul class="table-child-ul d-flex">
                              <li>
                                 <div class="cart-detail">
                                    <p class="blue mb-0">(Acer Aspire 3 (A315-31-C514 A315-53-57WF A315-53-50Y7 A315-51-51SL)) </p>
                                    <p class="mb-0">Test - Serialised Product</p>
                                    <p class="mb-8">IMEI: 544183009039329</p>
                                    <div class="btns-detail mb-8">
                                       <a href="#" class="btn-black" data-toggle="modal" data-target="#more-info-product">More Info</a>
                                       <a href="#" class="btn-black" data-toggle="modal" data-target="#add-note-tick">Add Note</a>
                                    </div>
                                    <a href="#" class="btn-black d-sm-block w-100 blue" data-toggle="modal" data-target="#view-onhand">
                                    View on hand across all stores
                                    </a>
                                 </div>
                              </li>
                              <li>01</li>
                              <li>
                                 <span class="d-block">£0.00</span>
                                 <a class="link link-secondary" data-toggle="modal" data-target="#add-Discount">Disc = £0.00 </a>
                              </li>
                              <li>£0.00</li>
                              <li>£0.00</li>
                              <li><i data-feather="trash-2" class="link-danger"></i></li>
                           </ul>

                             <ul class="table-child-ul d-flex">
                              <li>
                                 <div class="cart-detail">
                                    <p class="blue mb-0">Xiaomi Mi Note 10 </p>
                                    <p class="mb-0">Trade in</p>
                                    <p class="mb-8">IMEI: 544183009039329</p>
                                    <div class="btns-detail mb-8">
                                       <a href="#" class="btn-black" data-toggle="modal" data-target="#more-info-trade">More Info</a>
                                       <a href="#" class="btn-black" data-toggle="modal" data-target="#add-note-tick">Add Note</a>
                                    </div>
                                  
                                 </div>
                              </li>
                              <li>01</li>
                              <li>
                                 <span class="d-block">£12500.00</span>
                                 <a class="link link-secondary" data-toggle="modal" data-target="#add-Discount">Disc = £0.00 </a>
                              </li>
                              <li>£0.00</li>
                              <li>£15000.00</li>
                              <li><i data-feather="trash-2" class="link-danger"></i></li>
                           </ul>


                             <ul class="table-child-ul d-flex">
                              <li>
                                 <div class="cart-detail">
                                    <p class="blue mb-8">Insurance claim</p>
                                  
                                    <div class="btns-detail mb-8">
                                       <a href="#" class="btn-black" data-toggle="modal" data-target="#more-info-misc">More Info</a>
                                       <a href="#" class="btn-black" data-toggle="modal" data-target="#add-note-tick">Add Note</a>
                                    </div>
                                  
                                 </div>
                              </li>
                              <li>01</li>
                              <li>
                                 <span class="d-block">£0</span>
                                 <a class="link link-secondary" data-toggle="modal" data-target="#add-Discount">Disc = £0.00 </a>
                              </li>
                              <li>£0.00</li>
                              <li>£15000.00</li>
                              <li><i data-feather="trash-2" class="link-danger"></i></li>
                           </ul>




                        </li>
                     </ul>
                  </div>
                  <div class="tfoot">
                     <ul class="d-flex align-items-center">
                        <li>
                           <h6 class="heading-sm">Sub Total</h6>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li>£0.00</li>
                        <li></li>
                     </ul>
                     <ul class="discount_div d-flex align-items-center">
                        <li>
                           <h6 class="heading-sm" >Discount</h6>
                        </li>
                        <li></li>
                        <li></li>
                        <li>
                           <a class="btn btn-outline-primary btn-xs btn-reason d-flex justify-content-center"
                              data-toggle="modal" data-target="#Add-reason">
                           <i data-feather="plus"></i>Reason</a>
                        </li>
                        <li><a class="btn btn-outline-primary btn-xs btn-total" href="#">£0.00</a></li>
                        <li class="total-per-select">
                           <select class="simple-select">
                              <option value="%">%</option>
                              <option value="£">£</option>
                           </select>
                        </li>
                     </ul>
                     <ul class="tax d-flex align-items-center">
                        <li>
                           <h6 class="heading-sm">Tax</h6>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li>£0.00</li>
                        <li></li>
                     </ul>
                     <ul class="total d-flex align-items-center">
                        <li colspan="4">
                           <h5 class="m-0">Total</h5>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li>
                           <h5 class="m-0">£0.00</h5>
                        </li>
                        <li></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="bottom-button-wrapper d-flex">
         <button class="btn btn-outline-danger btn-lg mr-16">
         <i data-feather="trash-2"></i>
         </button>
         <button class="btn btn-secondary btn-lg mr-16" data-toggle="modal" data-target="#CreateTickit">Create Ticket</button>
         <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#Createcheckout">Check Out</button>
      </div>
   </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('extra_page_content') ?>
      <!-- add Inventory -->
      <div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-labelledby="add-product" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Add Inventory</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body text-center inventory-modal">
                  <div class="inventory-box d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#inventory-item">
                     <div class="inventory-box-item-inner">
                        <i data-feather="plus"></i>
                        <h5>Inventory Item</h5>
                     </div>
                  </div>
                  <div class="or">
                     OR
                  </div>
                  <div class="inventory-box d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#special-order">
                     <div class="inventory-box-item-inner">
                        <i data-feather="plus"></i>
                        <h5>Special Order</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- add customer -->
      <div class="modal fade" id="new-customer" tabindex="-1" role="dialog" aria-labelledby="new-customer" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">New Customer</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <form class="create-customer" method="post">
                  <input type="hidden" name="id" id="posSelectedCustomer" value="<?php echo session()->get('pos_selected_customer_id'); ?>">
                  <div class="modal-body  customer-modal">
                     <ul class="nav justify-content-center align-items-center mb-5 customer-form-tab">
                        <li class="active" id="customerContactTab">
                           <a href="#customerContact" data-toggle="tab"> <i data-feather="user" class="mr-8"></i>Contact </a>
                        </li>
                        <li id="customerAddressTab"> <a href="#customerAddress" data-toggle="tab"><i data-feather="map-pin" class="mr-8"></i>Address</a> </li>
                        <li id="customerCustomFieldsTab">
                           <a href="#customerCustomField" data-toggle="tab"> <i data-feather="settings" class="mr-8"></i> Custom Fields</a>
                        </li>
                     </ul>
                     <div class="tab-content customer-form-tab-content clearfix">
                        <div class="tab-pane active" id="customerContact">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group mb-24">
                                    <label class="mb-8"><?php echo lang('Labels.first_name') ?></label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Joe D">
                                 </div>
                                 <div class="form-group mb-24">
                                    <label class="mb-8"><?php echo lang('Labels.last_name') ?></label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Allen">
                                 </div>
                                 <div class="form-group call-group mb-24">
                                    <label class="mb-8">Primary Phone </label>
                                    <input type="hidden" name="primary_phone_code" id="primary_phone_code" class="form-control" value="">
                                    <input type="tel" name="primary_phone" id="primary_phone" class="form-control" placeholder="">
                                 </div>
                                 <div class="form-group  mb-8">
                                    <label class="mb-8"><?php echo lang('Labels.email') ?></label>
                                    <input type="email" name="email" class="form-control" placeholder="JoeDAllen@dayrep.com">
                                 </div>
                                 <div class="form-check mb-24 email-check d-flex align-items-center">
                                    <input class="form-check-input form-check-input-md" name="compliance_with_gdpr" type="checkbox" value="1" id="checkbox-0">
                                    <label class="form-check-label" for="checkbox-0"> Compliance with GDPR</label>
                                 </div>
                                 <div class="d-flex">
                                    <div class="form-switch mr-16">
                                       <input class="form-check-input" name="email_notifications" type="checkbox" checked="1">
                                    </div>
                                    <div class="switch-detail switch-detail-large">
                                       <h6 class="mt-2">Notifications <span class="font-400">(Email Alert)</span></h6>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group mb-24">
                                    <label class="mb-8">Customer Group</label>
                                    <select class="form-control  w-100 select customer-groups" name="customer_group_id" data-placeholder="Select">
                                       <option value=""></option>
                                    </select>
                                 </div>
                                 <div class="form-group mb-24">
                                    <label class="mb-8">Tax Class</label>
                                    <select class="form-control  w-100 tax-configuration-select" name="tax_class" data-placeholder="Select">
                                       <option value=""></option>
                                    </select>
                                 </div>
                                 <div class="form-group call-group mb-24">
                                    <label class="mb-8">Alternate Phone</label>
                                    <input type="hidden" name="alternate_phone_code" id="alternate_phone_code" class="form-control" value="">
                                    <input type="tel" name="alternate_phone" id="alternate_phone" class="form-control" placeholder="">
                                 </div>
                                 <div class="form-group">
                                    <label class="mb-8"><?php echo lang('Labels.how_you_hear') ?></label>
                                    <select class="form-control  w-100 referral-sources" name="referral_source" data-placeholder="Select">
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="customerAddress">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group mb-24">
                                    <label class="mb-8">Street Address</label>
                                    <input type="text" name="street_address" class="form-control">
                                 </div>
                                 <div class="form-group mb-24">
                                    <label class="mb-8">Postcode</label>
                                    <input type="text" name="postcode" class="form-control">
                                 </div>
                                 <div class="form-group mb-24">
                                    <label class="mb-8">State</label>
                                    <input type="text" name="state"  class="form-control">
                                 </div>
                                 <div class="form-group mb-24">
                                    <label class="mb-8">Organization</label>
                                    <input type="text" name="organization" class="form-control">
                                 </div>
                                 <div class="form-group">
                                    <label class="mb-8">Network</label>
                                    <select class="form-control  w-100 select network-select" name="network" data-placeholder="Select">
                                       <option value="">Select Carrier</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group mb-24">
                                    <label class="mb-8">House / Apartement / Floor Number</label>
                                    <input type="text" name="address2" class="form-control">
                                 </div>
                                 <div class="form-group mb-24">
                                    <label class="mb-8"> City</label>
                                    <input type="text" name="city" class="form-control">
                                 </div>
                                 <div class="form-group mb-24">
                                    <label class="mb-8">Country</label>
                                    <select name="country" class="form-control  w-100 country-select" data-placeholder="Select">
                                       <option value="">Select Country</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label class="mb-8"><?php echo lang('Labels.contact_person') ?></label>
                                    <input type="text" name="contact_person" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="customerCustomField">
                           <div class="row mb-5">
                              <div class="col-md-6 mb-5">
                                 <div class="customer-custom-fields">
                                 </div>
                                 <a href="<?php echo base_url('customers/add-customer').'#customFieldsSection';?>" target="_blank" class="btn btn-success btn custom-field-btn">Add Custom Field</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn" id="submitCustomer"><i data-feather="upload-cloud"></i>Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- add category -->
      <div class="modal fade" id="newRepairCategory" tabindex="-1" role="dialog" aria-labelledby="newRepairCategory" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-medium" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0 repair-category-modal-title">Add Category</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <form class="create-repair-category">
                  <input type="hidden" name="id" value="">
                  <input type="hidden" name="uploaded_image" value="">
                  <div class="modal-body  add-category">
                     <div class="form-group mb-24">
                        <input type="text" name="name" class="form-control form-control-md" placeholder="Add Name">
                        <label class="text-danger create-repair-category-name-error" for="name"></label>
                     </div>
                     <div class="category-img-upload mb-5">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="alert alert-primary d-flex mb-3" role="alert">
                                 <i data-feather="info"></i>
                                 <div>
                                    <h6 class="mb-0">You can download images from</h6>
                                    <p class="mb-0">
                                       <a href="www.iconfinder.com"> www.iconfinder.com</a>
                                       Maximum Picture size (2MB)
                                    </p>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-between">
                                 <button type="button" class="btn btn-outline-primary btn-xs removeImgbtn">
                                 <i data-feather="trash-2"></i> Remove Image
                                 </button>
                                 <div class="fileUpload btn btn-success btn-xs">
                                    <input type="hidden" name="is_img_removed" id="is_img_removed" value="0" >
                                    <input type="file" name="picture" id="inputFile"  onclick="this.value = null"  accept="image/*">
                                    <label for="inputFile"><i data-feather="upload"></i>Upload Image</label>
                                 </div>
                              </div>
                           </div>
                           <!-- <label class="text-danger display-no" id="errormsg"></label> -->
                           <div class="col-md-6">
                              <div class="category-img-upload-box text-center">
                                 <img class="repair-cat-img add-img" src="assets/img/demo-upload.png" id="add-img" alt="Img">
                              </div>
                              <div class="picture-error"></div>
                           </div>
                        </div>
                     </div>
                     <div class="form-check d-flex mb-24">
                        <input class="form-check-input form-check-input-md mr-8" type="checkbox" name="labor_billable_category" value="1" id="checkbox">
                        <label class="form-check-label" for="checkbox">Mark as labor/billable hours category</label>
                     </div>
                     <div id="category_manufacturer_device_map">
                        <table class="table-addcategory responsive-table table" id="ProductCategories">
                           <thead>
                              <tr>
                                 <th scope="col">
                                    <h6 class="d-flex justify-content-between align-items-center m-0">Manufacturer</h6>
                                 </th>
                                 <th scope="col">
                                    <h6 class="d-flex justify-content-between align-items-center m-0"> Map Device Models</h6>
                                 </th>
                                 <th scope="col">
                                    <h6 class="text-center m-0">Action</h6>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
                        <table style="width: 80%;">
                           <tr>
                              <td>
                                 <label class="text-danger create-repair-category-manufacturer-error" for="name"></label>
                              </td>
                              <td>
                                 <label class="text-danger create-repair-category-device-error" for="name"></label>
                              </td>
                           </tr>
                        </table>
                        <div class="add-row mt-24 text-right">
                           <a href="javascript:void(0)" class="txt-sucess add-manufacturer-and-devices"><i data-feather="plus"></i>Add More</a>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn save-repair-category" id="submitRepairCategory"><i data-feather="upload-cloud"></i>Create</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- end popup -->
      <!-- edit category poopup -->
      <div class="modal fade" id="edit-category" tabindex="-1" role="dialog" aria-labelledby="add-category" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-medium" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Update Category Smart Phone</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  add-category">
                  <div class="form-group mb-24">
                     <input type="text" class="form-control form-control-md" placeholder="Add Name">
                  </div>
                  <div class="category-img-upload mb-5">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="alert alert-primary d-flex mb-3" role="alert">
                              <i data-feather="info"></i>
                              <div>
                                 <h6 class="mb-0">You can download images from</h6>
                                 <p class="mb-0">
                                    <a href="www.iconfinder.com"> www.iconfinder.com</a>
                                    Maximum Picture size (2MB)
                                 </p>
                              </div>
                           </div>
                           <div class="d-flex justify-content-between">
                              <button type="button" onclick="removeImg()" class="btn btn-outline-primary btn-xs">
                              <i data-feather="trash-2"></i> Remove Image
                              </button>
                              <div class="fileUpload btn btn-success btn-xs">
                                 <input type="file" id="inputFile" onchange="readUrl(this)">
                                 <label for="inputFile"><i data-feather="upload"></i>Upload Image</label>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="category-img-upload-box text-center">
                              <img src="assets/img/demo-upload.png" id="add-img" alt="Img">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-check d-flex mb-24">
                     <input class="form-check-input form-check-input-md mr-8" type="checkbox" value="" id="checkbox">
                     <label class="form-check-label" for="checkbox">Mark as labor/billable hours category</label>
                  </div>
                  <table class="table-addcategory responsive-table table">
                     <thead>
                        <tr>
                           <th scope="col">
                              <h6 class="d-flex justify-content-between align-items-center m-0">Manufacturer</h6>
                           </th>
                           <th scope="col">
                              <h6 class="d-flex justify-content-between align-items-center m-0"> Map Device Models</h6>
                           </th>
                           <th scope="col">
                              <h6 class="text-center m-0">Action</h6>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <div class="form-group">
                                 <select class="form-control" data-placeholder="Select">
                                    <option>LG</option>
                                    <option>ALBA</option>
                                    <option>Amazon</option>
                                    <option>Alcatel</option>
                                 </select>
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <select class="form-control" data-placeholder="Select" multiple>
                                    <option>Alcatel 1068</option>
                                    <option>Alcatel 1069</option>
                                    <option>Alcatel 1070</option>
                                    <option>Alcatel 1071</option>
                                    <option>Alcatel 1072</option>
                                 </select>
                              </div>
                           </td>
                           <td>
                              <div class="text-center">
                                 <a href="javascript:void(0)" class="btn btn-outline-danger btn-xs data-action-btn">
                                 <i data-feather="trash-2"></i>
                                 </a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="form-group">
                                 <select class="form-control" data-placeholder="Select">
                                    <option>Apple</option>
                                    <option>ALBA</option>
                                    <option>Amazon</option>
                                    <option>Alcatel</option>
                                 </select>
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <select class="form-control" data-placeholder="Select" multiple>
                                    <option>Alcatel 1068</option>
                                    <option>Alcatel 1069</option>
                                    <option>Alcatel 1070</option>
                                    <option>Alcatel 1071</option>
                                    <option>Alcatel 1072</option>
                                 </select>
                              </div>
                           </td>
                           <td>
                              <div class="text-center">
                                 <a href="javascript:void(0)" class="btn btn-outline-danger btn-xs data-action-btn">
                                 <i data-feather="trash-2"></i>
                                 </a>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <div class="add-row mt-24 text-right">
                     <a href="#" class="txt-sucess"><i data-feather="plus"></i>Add New </a>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end popup -->
      <!-- add manufacturer -->
      <div class="modal fade" id="add-manufacturer-modal" tabindex="-1" role="dialog" aria-labelledby="add-product" aria-hidden="false" >
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0 manufacturer-modal-title">Add Manufacturer</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <form class="create-manufacturer">
                  <input type="hidden" name="repair_device_category" value="" />
                  <input type="hidden" name="id" value="" />
                  <input type="hidden" name="store_id" value="<?php echo session()->get('parent_store_id'); ?>" />
                  <div class="modal-body text-center">
                     <div class="form-group mb-24">
                        <input type="text" name="name" class="form-control form-control-md" placeholder="Name">
                     </div>
                     <a href="<?php echo base_url('store/manufacturer'); ?>" class="btn btn-outline-primary btn" target="_blank"> <i data-feather="eye" class="mr-8 w-18"></i>View All Manufacturers </a>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn save-manufacturer" id="saveManufacturer">
                        <i data-feather="upload-cloud"></i>Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- update manufacturer -->
      <div class="modal fade" id="update-manufacturer" tabindex="-1" role="dialog" aria-labelledby="update-manufacturer" aria-hidden="false" >
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Update Acer</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body text-center">
                  <div class="form-group mb-24 text-left">
                     <label class="mb-8">Name *</label>
                     <input type="text" class="form-control" placeholder="Enter Name">
                  </div>
                  <a href="#" class="btn btn-outline-primary btn"> <i data-feather="eye" class="mr-8 w-18"></i>View All Manufacturers </a>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     <i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- add Device -->
      <div class="modal fade" id="newRepairDevice" tabindex="-1" role="dialog" aria-labelledby="add-device" aria-hidden="false" >
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0 repair-device-modal-title"></h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <form class="create-repair-device">
                  <input type="hidden" name="id" value="">
                  <input type="hidden" name="repair_device_category" value="">
                  <input type="hidden" name="repair_device_manufacturer" value="">
                  <div class="modal-body text-center">
                     <div class="form-group mb-16">
                        <select name="manufacturer_id" class="form-control repair-device-manufacturers" data-placeholder="">
                        </select>
                     </div>
                     <div class="form-group mb-24">
                        <input name="device_name" type="text" class="form-control" placeholder="Device">
                     </div>
                     <a href="#" class="btn btn-outline-primary btn"> <i data-feather="eye" class="mr-8 w-18"></i> View All Devices </a>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn save-repair-device" id="submitRepairDevice">
                        <i data-feather="upload-cloud"></i>Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Edit Device -->
      <div class="modal fade" id="edit-device" tabindex="-1" role="dialog" aria-labelledby="edit-device" aria-hidden="false" >
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Update Ipad 1 (A1219 A1337)</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body text-center">
                  <div class="form-group mb-16 text-left">
                     <label class="mb-8">Manufacturer  *</label>
                     <select class="form-control" data-placeholder="Acer">
                        <option>Asus</option>
                        <option>ALBA</option>
                        <option>Alcatel</option>
                        <option>Dell</option>
                        <option>Displex</option>
                     </select>
                  </div>
                  <div class="form-group mb-24 text-left">
                     <label class="mb-8">Device   *</label>
                     <input type="text" class="form-control" placeholder="Add Device">
                  </div>
                  <a href="#" class="btn btn-outline-primary btn"> <i data-feather="eye" class="mr-8 w-18"></i> View All Devices </a>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     <i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Disable alert -->
      <!-- <div class="modal fade" id="disable" tabindex="-1" role="dialog" aria-labelledby="disable" aria-hidden="false" >
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Alert</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body text-center">
                  <p class="text-md ">Do you want to hide this from POS ?</p>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn mr-8">
                     Click here to Proceed</button>
                     <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <!-- End popup -->
      <!-- add customer -->
      <div class="modal fade" id="newRepairDeviceIssue" tabindex="-1" role="dialog" aria-labelledby="newRepairDeviceIssue" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0 repair-device-issue-modal-title">Add Service/Laborr</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <form class="create-repair-device-issue">
                  <input type="hidden" name="repair_device_category" value="">
                  <input type="hidden" name="repair_device_manufacturer" value="">
                  <input type="hidden" name="repair_device_id" value="">
                  <input type="hidden" name="id" value="">
                  <input type="hidden" name="product_device_map_id" value="">
                  <input type="hidden" name="store_product_price_id" value="">
                  <div class="modal-body  customer-modal">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-24 device-issue-manufacturer-div">
                              <label class="mb-8">Manufacturer </label>
                              <select name="manufacturer_id" class="form-control  w-100 select repair-device-issue-manufacturers" data-placeholder="Select">
                                 <option value=""></option>
                              </select>
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Problem </label>
                              <input name="device_problem" type="text" class="form-control" placeholder="">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Tax Class </label>
                              <select name="tax_class_id" class="form-control  w-100 select repair-device-issue-tax" data-placeholder="">
                                 <option value=""></option>
                              </select>
                           </div>
                           <div class="d-flex mb-2">
                              <div class="form-switch mr-16">
                                 <input name="tax_inclusive" class="form-check-input" type="checkbox" checked="">
                              </div>
                              <div class="switch-detail switch-detail-large">
                                 <h6 class="mt-2">Tax Inclusive</h6>
                              </div>
                           </div>
                           <div class="d-flex">
                              <div class="form-switch mr-16">
                                 <input name="show_on_pos" class="form-check-input" type="checkbox" checked="">
                              </div>
                              <div class="switch-detail switch-detail-large">
                                 <h6 class="mt-2">Show on POS</h6>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-24 device-issue-device-div">
                              <label class="mb-8">Device/ Model</label>
                              <select name="device_id" class="form-control  w-100 select repair-device-issue-devices" data-placeholder="Select">
                                 <option value=""></option>
                              </select>
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Description </label>
                              <input name="description" type="text" class="form-control" placeholder="">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Sale Price  </label>
                              <input name="sale_price" type="text" class="form-control" placeholder="0.00">
                           </div>
                           <div class="form-group ">
                              <label class="mb-8">Retail Price </label>
                              <input name="retail_price" type="text" class="form-control" placeholder="0.00">
                           </div>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn save-repair-device-issue" id="submitRepairDeviceIssue"><i data-feather="upload-cloud"></i>Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- add customer -->
      <div class="modal fade" id="edit-device-issue" tabindex="-1" role="dialog" aria-labelledby="edit-device-issue" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Update Audio Repair</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  customer-modal">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-24">
                           <label class="mb-8">Manufacturer </label>
                           <select class="form-control  w-100 select" data-placeholder="Select">
                              <option>Asus</option>
                              <option>Blackberry</option>
                              <option>Alcatel</option>
                              <option>Amazon</option>
                              <option>Apple</option>
                              <option>Camera</option>
                           </select>
                        </div>
                        <div class="form-group mb-24">
                           <label class="mb-8">Problem </label>
                           <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group mb-24">
                           <label class="mb-8">Tax Class </label>
                           <select class="form-control  w-100 select" data-placeholder="">
                              <option>Select Tax Class</option>
                              <option>Vat</option>
                              <option>Vat Margin</option>
                           </select>
                        </div>
                        <div class="d-flex mb-2">
                           <div class="form-switch mr-16">
                              <input class="form-check-input" type="checkbox" checked="">
                           </div>
                           <div class="switch-detail switch-detail-large">
                              <h6 class="mt-2">Tax Inclusive</h6>
                           </div>
                        </div>
                        <div class="d-flex">
                           <div class="form-switch mr-16">
                              <input class="form-check-input" type="checkbox" checked="">
                           </div>
                           <div class="switch-detail switch-detail-large">
                              <h6 class="mt-2">Show on POS</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-24">
                           <label class="mb-8">Device/ Model</label>
                           <select class="form-control  w-100 select" data-placeholder="Select">
                              <option>Apple Apple MacBook Air 2020 A2179</option>
                              <option>Apple Apple MacBook Air</option>
                              <option>Apple Airpods Pro</option>
                              <option>Apple Apple iMac</option>
                              <option>Apple Apple MacBook</option>
                           </select>
                        </div>
                        <div class="form-group mb-24">
                           <label class="mb-8">Description </label>
                           <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group mb-24">
                           <label class="mb-8">Sale Price  </label>
                           <input type="text" class="form-control" placeholder="0.00">
                        </div>
                        <div class="form-group ">
                           <label class="mb-8">Retail Price </label>
                           <input type="text" class="form-control" placeholder="39.99">
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- parts order-->
      <div class="modal fade" id="special-order" tabindex="-1" role="dialog" aria-labelledby="special-order" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Special Order</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  customer-modal">
                  <div class="row">
                     <div class="col-md-12 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Item Name<sup>*</sup></label>
                           <input type="text" class="form-control" placeholder="Enter item name">
                        </div>
                     </div>
                     <div class="col-md-6 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Manufacturer  </label>
                           <select class="form-control  w-100 select" data-placeholder="Select">
                              <option>Blackberry</option>
                              <option>Alcatel</option>
                              <option>Amazon</option>
                              <option>Apple</option>
                              <option>Camera</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Device</label>
                           <select class="form-control  w-100 select" data-placeholder="Select">
                              <option>Blackberry Prive</option>
                              <option>Blackberry</option>
                              <option>Alcatel</option>
                              <option>Amazon</option>
                              <option>Apple</option>
                              <option>Camera</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4 mb-16">
                        <div class="form-group">
                           <label class="mb-8">Required Qty<sup>*</sup></label>
                           <input type="text" class="form-control" placeholder="0">
                        </div>
                     </div>
                     <div class="col-md-4 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Unit Cost<sup>*</sup></label>
                           <input type="text" class="form-control" placeholder="$0.00">
                        </div>
                     </div>
                     <div class="col-md-4 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Retail Price</label>
                           <input type="text" class="form-control" placeholder="$0.00">
                        </div>
                     </div>
                     <div class="col-md-12 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Supplier  <sup>*</sup></label>
                           <select class="form-control  w-100 select" data-placeholder="Select">
                              <option>Select Supplier</option>
                              <option>Tech Damage</option>
                              <option>LCD - APPLE & HUAWEI ( Qwikfone)</option>
                              <option>LCD - SAMSUNG & OTHERS ( Mike & Rohit)</option>
                              <option>PARTS , BATTERY , BACK GLASS</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Order Link </label>
                           <input type="text" class="form-control" placeholder="www...">
                        </div>
                     </div>
                     <div class="col-md-6 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Order Notes</label>
                           <input type="text" class="form-control" placeholder="www...">
                        </div>
                     </div>
                     <div class="col-md-6 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Order Date  </label>
                           <input type="date" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-6 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Received Date</label>
                           <input type="date" class="form-control" >
                        </div>
                     </div>
                     <div class="col-md-6 mb-16">
                        <div class="form-group ">
                           <label class="mb-8">Tax Class</label>
                           <select class="form-control  w-100 select" data-placeholder="Select">
                              <option>Select Tax Class</option>
                              <option>Vat</option>
                              <option>Vat Margin</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6 mb-16">
                        <div class="d-flex d-flex mt-4 pt-2">
                           <div class="form-switch mr-16">
                              <input class="form-check-input" type="checkbox" checked="">
                           </div>
                           <div class="switch-detail switch-detail-large">
                              <h6 class="mt-2">Tax inclusive</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="d-flex">
                           <div class="d-flex mr-16">
                              <div class="form-check mr-8">
                                 <input class="form-check-input" type="radio" value="" id="yes" name="order">
                                 <label class="form-check-label" for="yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="" id="no" name="order">
                                 <label class="form-check-label" for="no">No</label>
                              </div>
                           </div>
                           <label class="text-sm">Do you want to create a purchase order for this special order?</label>
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Edit parts -->
      <!-- Begin::Repair part special order-->
      <div class="modal fade" id="newRepairPartSpecialOrder" tabindex="-1" role="dialog" aria-labelledby="newRepairPartSpecialOrder" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Special Order</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <form class="repair-part-special-order-form">
                  <div class="modal-body  customer-modal">
                     <div class="row">
                        <div class="col-md-12 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Item Name<sup>*</sup></label>
                              <input type="text" name="name" class="form-control" placeholder="Enter item name">
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Manufacturer  </label>
                              <select class="form-control  w-100 select repair-part-special-order-manufacturers" name="manufacturer_id" data-placeholder="Select">
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Device</label>
                              <select class="form-control  w-100 select repair-part-special-order-devices" name="device_id" data-placeholder="Select">
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4 mb-16">
                           <div class="form-group">
                              <label class="mb-8">Required Qty<sup>*</sup></label>
                              <input type="text" name="required_quantity" class="form-control" placeholder="0">
                           </div>
                        </div>
                        <div class="col-md-4 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Unit Cost<sup>*</sup></label>
                              <input type="text" name="unit_cost" class="form-control" placeholder="$0.00">
                           </div>
                        </div>
                        <div class="col-md-4 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Retail Price</label>
                              <input type="text" name="retail_price" class="form-control" placeholder="$0.00">
                           </div>
                        </div>
                        <div class="col-md-12 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Supplier  <sup>*</sup></label>
                              <select class="form-control  w-100 select repair-part-special-order-suppliers" data-placeholder="Select">
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Order Link </label>
                              <input type="text" name="order_link" class="form-control" placeholder="www...">
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Order Notes</label>
                              <input type="text" name="order_notes" class="form-control" placeholder="www...">
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Order Date  </label>
                              <input type="date" name="order_date" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Received Date</label>
                              <input type="date" name="received_date" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group ">
                              <label class="mb-8">Tax Class</label>
                              <select name="tax_class_id" class="form-control  w-100 select received_date" data-placeholder="Select">
                                 <option>Select Tax Class</option>
                                 <option>Vat</option>
                                 <option>Vat Margin</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="d-flex d-flex mt-4 pt-2">
                              <div class="form-switch mr-16">
                                 <input class="form-check-input" name="tax_inclusive" type="checkbox" checked="">
                              </div>
                              <div class="switch-detail switch-detail-large">
                                 <h6 class="mt-2">Tax inclusive</h6>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="d-flex">
                              <div class="d-flex mr-16">
                                 <div class="form-check mr-8">
                                    <input class="form-check-input" type="radio" name="purchase_order_create" value="" id="yes" name="order">
                                    <label class="form-check-label" for="yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="purchase_order_create" value="" id="no" name="order">
                                    <label class="form-check-label" for="no">No</label>
                                 </div>
                              </div>
                              <label class="text-sm">Do you want to create a purchase order for this special order?</label>
                           </div>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud" id="submitRepairPartSpecialOrder"></i>Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- End::Repair part special order-->
      <div class="modal fade" id="parts-order" tabindex="-1" role="dialog" aria-labelledby="parts-order" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Update Blackberry Prive Battery</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  customer-modal">
                  <ul class="nav justify-content-center align-items-center mb-4">
                     <li class="active">
                        <a href="#parts-product" data-toggle="tab"> <i data-feather="shopping-bag" class="mr-8"></i>Product </a>
                     </li>
                     <li> <a href="#other-information" data-toggle="tab"><i data-feather="info" class="mr-8"></i>Other Information</a> </li>
                  </ul>
                  <div class="tab-content clearfix">
                     <div class="tab-pane active" id="parts-product">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Name <sup>*</sup></label>
                                 <input type="text" class="form-control" placeholder="" required="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Category</label>
                                 <select class="form-control  w-100 select" data-placeholder="Select">
                                    <option>Select Type</option>
                                    <option>Accessories</option>
                                    <option>Battery</option>
                                    <option>Cable</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Subcategory</label>
                                 <select class="form-control  w-100 select" data-placeholder="Select">
                                    <option>Select Type</option>
                                    <option>Accessories</option>
                                    <option>Battery</option>
                                    <option>Cable</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Condition</label>
                                 <select class="form-control  w-100 select" data-placeholder="Select">
                                    <option>Select Condition</option>
                                    <option>New</option>
                                    <option>Used</option>
                                    <option>Refurbished</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Manufacturer</label>
                                 <select class="form-control  w-100 select" data-placeholder="Select">
                                    <option>Select Manufacturer</option>
                                    <option>Acer</option>
                                    <option>ALBA</option>
                                    <option>Cable</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Device/Model</label>
                                 <select class="form-control  w-100 select" data-placeholder="Select" multiple="">
                                    <option>Select</option>
                                    <option>Select1</option>
                                    <option>Select2</option>
                                    <option>Select2</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Retail Price</label>
                                 <input type="text" class="form-control" placeholder="0.00">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Tax Class</label>
                                 <select class="form-control  w-100 select" data-placeholder="Select" multiple="">
                                    <option>Vat</option>
                                    <option>Vat Margin</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6 has-price-modal">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Cost Price</label>
                                 <label class="has-price-modal-label form-control" data-toggle="modal" data-target="#inventory-adjustment">15.30</label>
                              </div>
                           </div>
                           <div class="col-md-6 has-price-modal">
                              <div class="form-group mb-16">
                                 <label class="mb-8">On Hand</label>
                                 <label class="has-price-modal-label form-control" data-toggle="modal" data-target="#inventory-adjustment">0</label>
                              </div>
                           </div>
                           <div class="col-md-6 mb-16">
                              <div class="d-flex d-flex">
                                 <div class="form-switch mr-16">
                                    <input class="form-check-input" type="checkbox" checked="">
                                 </div>
                                 <div class="switch-detail switch-detail-large">
                                    <h6 class="mt-2">Show on POS</h6>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 mb-16">
                              <div class="d-flex d-flex">
                                 <div class="form-switch mr-16">
                                    <input class="form-check-input" type="checkbox" checked="">
                                 </div>
                                 <div class="switch-detail switch-detail-large">
                                    <h6 class="mt-2">Tax Inclusive</h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="other-information">
                        <div class="row">
                           <div class="col-md-6 mb-16">
                              <div class="form-group ">
                                 <label class="mb-8">Stock Warning</label>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-6 mb-16">
                              <div class="form-group ">
                                 <label class="mb-8">Re-Order Level</label>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-6 mb-16">
                              <div class="form-group ">
                                 <label class="mb-8">SKU Code</label>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-6 mb-16">
                              <div class="form-group ">
                                 <label class="mb-8">UPC Code</label>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-12 mb-16">
                              <div class="form-group">
                                 <label class="mb-8">Inventory Valuation Method</label>
                                 <select class="form-control  w-100 select" data-placeholder="Select" multiple="">
                                    <option>WAC (Weighted Average Cost)</option>
                                    <option>FIFO (First In First Out)</option>
                                    <option>LIFO (Last In First Out)</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 text-left info-alert">
                           <i data-feather="info" class="w-18"></i> On hand stock must be zero to change the inventory valuation method.
                        </div>
                        <div class="or text-center"> OR </div>
                        <div class="form-check mb-3">
                           <input class="form-check-input form-check-input-md" type="checkbox" value="" id="checkbox">
                           <label class="form-check-label" for="checkbox">Make this Serialized Inventory.</label>
                        </div>
                        <div class="form-group mb-16">
                           <label class="mb-8">Supplier</label>
                           <select class="form-control  w-100 select" data-placeholder="Select">
                              <option>Select Supplier</option>
                              <option>LCD - APPLE & HUAWEI ( Qwikfone)</option>
                              <option>LCD - SAMSUNG & OTHERS ( Mike & Rohit)</option>
                              <option>PARTS , BATTERY , BACK GLASS</option>
                              <option>SS Communication</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  End-->
      <!-- Inventory Adjustment -->
      <div class="modal fade" id="inventory-adjustment" tabindex="-1" role="dialog" aria-labelledby="inventory-adjustment" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Inventory Adjustment</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-16">
                           <label class="mb-8">Adjustment Type </label>
                           <select class="form-control  w-100 select" data-placeholder="Select" id="colorselector">
                              <option value="increase-quality">Increase Quantity</option>
                              <option value="decrease-quality">Decrease Quantity</option>
                              <option value="revaluation">Revaluation</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-16">
                           <label class="mb-8">Date  </label>
                           <input type="date" class="form-control" placeholder="">
                        </div>
                     </div>
                  </div>
                  <div class="card mb-16">
                     <div id="increase-quality" class="select-wrap" >
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Qty Today  </label>
                                 <input type="text" class="form-control" placeholder="0" disabled="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Adjustment (Qty) </label>
                                 <input type="text" class="form-control" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Cost Price</label>
                                 <input type="text" class="form-control" placeholder="15.30">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">New Qty on Hand</label>
                                 <input type="text" class="form-control" placeholder="0" disabled="">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <p href="#" class="blue mb-0">Value of adjustment = £ 0.00</p>
                           </div>
                        </div>
                     </div>
                     <div id="decrease-quality" class="select-wrap" style="display:none">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Qty Today  </label>
                                 <input type="text" class="form-control" placeholder="0" disabled="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Adjustment (Qty) </label>
                                 <input type="text" class="form-control" placeholder="0">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">New Qty on Hand</label>
                                 <input type="text" class="form-control" placeholder="0" disabled="">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <p href="#" class="blue mb-0">Value of adjustment = £ 0.00</p>
                           </div>
                        </div>
                     </div>
                     <div id="revaluation" class="select-wrap" style="display:none">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Qty Today  </label>
                                 <input type="text" class="form-control" placeholder="0" disabled="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group mb-16">
                                 <label class="mb-8">Average Cost Price </label>
                                 <input type="text" class="form-control" placeholder="15.30">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <p href="#" class="blue mb-0">Value of adjustment = 0</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="mb-8">Notes</label>
                     <textarea type="text" class="form-control" placeholder="Write here..."></textarea>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn"><i data-feather="eye"></i>Review Adjustment </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- add Product -->
      <div class="modal fade" id="newUnlockingProduct" tabindex="-1" role="dialog" aria-labelledby="newUnlockingProduct" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Add Product</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <form class="create-unlocking-product">
                  <div class="modal-body  customer-modal">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-24">
                              <label class="mb-8">Name <sup>*</sup></label>
                              <input type="text" name="unlocking_product_name" class="form-control" placeholder="" required="">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Retail Price</label>
                              <input type="text" name="retail_price" class="form-control" placeholder="0.00">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Api Status </label>
                              <select name="api_status" class="form-control  w-100 select" data-placeholder="Select">
                                 <option value="0">Disable</option>
                                 <option value="1">Enable</option>
                              </select>
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Manufacturer</label>
                              <select name="manufacturer_id" class="form-control  w-100 select unlocking-product-manufacturers" data-placeholder="Select Manufacturer">
                                 <option value=""></option>
                              </select>
                           </div>
                           <div class="d-flex">
                              <div class="form-switch mr-16">
                                 <input name="tax_inclusive" class="form-check-input" type="checkbox" checked="">
                              </div>
                              <div class="switch-detail switch-detail-large">
                                 <h6 class="mt-2">Tax Inclusive</h6>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-24">
                              <label class="mb-8">Delivery Time </label>
                              <input name="delivery_time" type="text" class="form-control" placeholder="">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Cost Price </label>
                              <input name="cost_price" type="text" class="form-control" placeholder="0.00">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Map Product</label>
                              <select class="form-control  w-100 select" data-placeholder="">
                                 <option>Select an Option</option>
                                 <option></option>
                              </select>
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Tax Class </label>
                              <select class="form-control  w-100 select unlocking-product-tax-configuration" data-placeholder="Select Tax Class">
                                 <option value=""></option>
                              </select>
                           </div>
                           <div class="d-flex">
                              <div class="form-switch mr-16">
                                 <input name="show_on_pos" class="form-check-input" type="checkbox" checked="">
                              </div>
                              <div class="switch-detail switch-detail-large">
                                 <h6 class="mt-2">Show on POS</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn" id="submitUnlockingProduct"><i data-feather="upload-cloud"></i>Create</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- add casual Product  -->
      <div class="modal fade" id="newMiscellaneousProduct" tabindex="-1" role="dialog" aria-labelledby="add-casual-products" aria-hidden="true">
         <form class="create-miscellaneous-product">
            <input type="hidden" name="product_id" value="">
            <input type="hidden" name="product_price_id" value="">
            <div class="modal-dialog modal-dialog-centered modal-large" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h6 class="mb-0 miscellaneous-product-title">Add Miscellaneous Product</h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                  </div>
                  <div class="modal-body  customer-modal">
                     <h6 class="blue mb-3">Item #<span class="miscellaneous-product-id"></span></h6>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-24">
                              <label class="mb-8">Name <sup>*</sup></label>
                              <input type="text" name="miscellaneous_product_name" class="form-control" placeholder="" required="">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Retail</label>
                              <input type="text" name="retail_price" class="form-control" placeholder="0.00">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Tax Class </label>
                              <select name="tax_class" class="form-control  w-100 select miscellaneous-product-tax-configuration" data-placeholder="">
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-24">
                              <label class="mb-8">Description </label>
                              <input type="text" name="description" class="form-control" placeholder="">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8">Cost Price </label>
                              <input type="text" name="cost_price" class="form-control" placeholder="0.00">
                           </div>
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="form-switch mr-16">
                           <input name="tax_inclusive" class="form-check-input" type="checkbox" >
                        </div>
                        <div class="switch-detail switch-detail-large">
                           <h6 class="mt-2">Tax Inclusive</h6>
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="form-switch mr-16">
                           <input name="show_on_pos" class="form-check-input" type="checkbox" checked="">
                        </div>
                        <div class="switch-detail switch-detail-large">
                           <h6 class="mt-2">Show on POS</h6>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn submit-miscellaneous-product" id="submitMiscellaneousProduct"><i data-feather="upload-cloud"></i>Save</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <!-- End popup -->
      <!-- add Update Miscellaneous  -->
      <div class="modal fade" id="update-miscellaneous" tabindex="-1" role="dialog" aria-labelledby="update-miscellaneous" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Add Product</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  customer-modal">
                  <h6 class="blue mb-3">Item #25188</h6>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-24">
                           <label class="mb-8">Name <sup>*</sup></label>
                           <input type="text" class="form-control" placeholder="" required="">
                        </div>
                        <div class="form-group mb-24">
                           <label class="mb-8">Retail</label>
                           <input type="text" class="form-control" placeholder="0.00">
                        </div>
                        <div class="form-group mb-24">
                           <label class="mb-8">Tax Class </label>
                           <select class="form-control  w-100 select" data-placeholder="">
                              <option>Select Tax Class</option>
                              <option>Vat</option>
                              <option>Vat Margin</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-24">
                           <label class="mb-8">Description </label>
                           <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group mb-24">
                           <label class="mb-8">Cost Price </label>
                           <input type="text" class="form-control" placeholder="0.00">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-switch mr-16">
                        <input class="form-check-input" type="checkbox" >
                     </div>
                     <div class="switch-detail switch-detail-large">
                        <h6 class="mt-2">Tax Inclusive</h6>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-switch mr-16">
                        <input class="form-check-input" type="checkbox" checked="">
                     </div>
                     <div class="switch-detail switch-detail-large">
                        <h6 class="mt-2">Show on POS</h6>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- ---------------Bottom button popup ------------------->
      <!-- Warranty Claim -->
      <div class="modal fade" id="warranty-claim" tabindex="-1" role="dialog" aria-labelledby="warranty-claim" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Check Device / Item History</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  customer-modal">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-16">
                           <label class="mb-8">Device IMEI /Serial </label>
                           <input type="text" class="form-control" placeholder="123456789">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-16">
                           <label class="mb-8">Part Serial </label>
                           <input type="text" class="form-control" placeholder="123456789">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-16">
                           <label class="mb-8">Invoice ID</label>
                           <input type="text" class="form-control" placeholder="Inv-110">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-16">
                           <label class="mb-8">Ticket ID </label>
                           <input type="text" class="form-control" placeholder="T-12">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-16">
                           <label class="mb-8">Customer Name </label>
                           <input type="text" class="form-control" placeholder="T-12">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-16">
                           <label class="mb-8">Customer Mobile </label>
                           <input type="text" class="form-control" placeholder="+44 7400 123456">
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-3">
                     <button class="btn btn-secondary btn-xs save-btn"><i data-feather="search"></i>Search</button>
                  </div>
                  <h6 class="mt-2 mb-8">Device Details</h6>
                  <div class="alert alert-primary">
                     No record available.
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Shift Process -->
      <div class="modal fade" id="more-action" tabindex="-1" role="dialog" aria-labelledby="more-action" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Action</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body action-modal">
                  <div class="row">
                     <div class="col-md-6 mb-24">
                        <div class="box-card text-center"  data-toggle="modal" data-target="#close-pause">
                           <i data-feather="pause-circle" class="d-block"></i>
                           <span>Pause</span>
                        </div>
                     </div>
                     <div class="col-md-6 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#open-pause">
                           <i data-feather="play-circle" class="d-block"></i>
                           <span>Open Pause</span>
                        </div>
                     </div>
                     <div class="col-md-6 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#view-self-checkin">
                           <i data-feather="check-circle" class="d-block"></i>
                           <span>View Self Check-In</span>
                        </div>
                     </div>
                     <div class="col-md-6 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#open-view-refund">
                           <i data-feather="eye-off" class="d-block"></i>
                           <span>View Refund</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- View Ticket Claim -->
      <div class="modal fade" id="view-ticket" tabindex="-1" role="dialog" aria-labelledby="view-ticket" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Ticket History</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body view-ticket">
                  <div class="d-flex align-items-center justify-content-between flex-wrap table-btn-layout">
                     <div class="table-action-btn d-flex justify-content-between full-col">
                        <button class="btn btn-secondary btn-md d-flex align-items-center" data-toggle="collapse" data-target="#search-ticket">Search By Filters <i data-feather="chevron-down"></i>
                        </button>
                     </div>
                     <div class="collapse search-ticket-collapse w-100" id="search-ticket">
                        <div class="card mt-24">
                           <div class="row">
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Customer</label>
                                    <input type="text" class="form-control" placeholder="Search Customer ">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Ticket Id</label>
                                    <input type="text" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Status</label>
                                    <select class="form-control" data-placeholder="Select Status">
                                       <option>In Progress</option>
                                       <option>Repaired</option>
                                       <option>Unlocked</option>
                                       <option>Repaired & Collected</option>
                                       <option>Warranty Repair</option>
                                       <option>Customer Reply</option>
                                       <option>Cancelled</option>
                                       <option>Waiting for Parts</option>
                                       <option>Not Repairable</option>
                                       <option>Not Repairable & Collected</option>
                                       <option>Awaiting Customer Device</option>
                                       <option>Quality Control In Process</option>
                                       <option>Appointment - Device with customer</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">IMEI Or Serial</label>
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Created Date</label>
                                    <input type="date" class="form-control" placeholder="Select Date">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Due Date</label>
                                    <input type="date" class="form-control" placeholder="Select Date">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="action-group">
                                 <a href="javascript:void(0)" class="btn btn-secondary btn flex-grow-1 mr-8">
                                 Search</a>
                                 <a href="javascript:void(0)" class="btn btn-primary btn flex-grow-1 mr-16">
                                 Clear
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="responsive-table data-setting-table ">
                     <table class="table table-striped center-form-check">
                        <thead>
                           <tr>
                              <th>Ticket ID</th>
                              <th>Date</th>
                              <th>Customer Name</th>
                              <th>Contact #</th>
                              <th>Devices</th>
                              <th>Product</th>
                              <th>Status</th>
                              <th>Total</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>L-540.14</td>
                              <td>16 Feb, 2022</td>
                              <td>David Hampton</td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>7860559492</p>
                              </td>
                              <td>Pixel 3a XL</td>
                              <td>Pixel 3a XL Screen Replacement</td>
                              <td><span class="badge bg-secondary">IN PROGRESS</span></td>
                              <td>£159.99</td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-540.12</td>
                              <td>16 Feb, 2022  </td>
                              <td>Gaurang evince customer   </td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td>iphone 11 pro</td>
                              <td>iphone 11 pro Audio Repair</td>
                              <td><span class="badge bg-secondary">IN PROGRESS</span></td>
                              <td>£74.99  </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-540.10</td>
                              <td>10 Feb, 2022 </td>
                              <td></td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td>Iphone 11</td>
                              <td>
                                 <p class="mb-0">Iphone - Tesco</p>
                                 <p class="mb-0"><strong class="link-success">845631564894254  </strong></p>
                              </td>
                              <td><span class="badge bg-secondary">IN PROGRESS</span></td>
                              <td>£94.99 </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-540.9</td>
                              <td>10 Feb, 2022 </td>
                              <td>Bhavesh Dhedhi   </td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td>Iphone 11</td>
                              <td>
                                 <p class="mb-0"> Iphone 11 Iphone / Ipad - Vodafone/Lebara iPhone SE 6+ 6S 6S+ 7 7+ 8 8+</p>
                                 <p class="mb-0">Audio Repair</p>
                                 <p class="mb-0">Iphone / Ipad - Vodafone/Lebara iPhone SE 6+ 6S 6S+ 7 7+ 8 8+</p>
                                 <p class="mb-0"><strong class="link-success">654256321614561</strong></p>
                                 <p class="mb-0"><strong class="link-success">34534345345</strong></p>
                                 <p class="mb-0"><strong class="link-success">654123745641846</strong></p>
                              </td>
                              <td><span class="badge bg-secondary">IN PROGRESS</span></td>
                              <td>£74.99  </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-539</td>
                              <td>17 Jan, 2022  </td>
                              <td>Gaurang evince </td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>7860559492</p>
                              </td>
                              <td>Iphone </td>
                              <td>Iphone 11 Audio Repair</td>
                              <td><span class="badge bg-secondary">IN PROGRESS</span></td>
                              <td>£74.99  </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-536</td>
                              <td>13 Jan, 2022</td>
                              <td>Bhavesh Dhedhi   </td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>7860559492</p>
                              </td>
                              <td>Iphone 11</td>
                              <td>Iphone 11 Camera Lens Glass Back Glass Replacement</td>
                              <td><span class="badge bg-secondary">IN PROGRESS</span></td>
                              <td>£199.98  </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-535  </td>
                              <td>12 Jan, 2022 </td>
                              <td></td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong></p>
                              </td>
                              <td>Iphone 11</td>
                              <td>
                                 <p class="mb-0">Mi Note 10</p>
                                 <p class="mb-0"><strong class="link-success">534534534524234  </strong></p>
                              </td>
                              <td><span class="badge bg-secondary">IN PROGRESS</span></td>
                              <td>£0.00    </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- open-pause popup-->
      <div class="modal fade" id="open-pause" tabindex="-1" role="dialog" aria-labelledby="open-pause" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Update Basket</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body">
                  <div class="responsive-table data-setting-table ">
                     <table class="table table-striped center-form-check">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Created On</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>gaurang - part waiting</td>
                              <td>12 Jan, 2022 01:53:08</td>
                              <td class="text-center">
                                 <a href="#" class="btn btn-outline-secondary btn-xs"><i data-feather="shopping-bag" class="w-18"></i></a>
                                 <a href="#" class="btn btn-outline-primary btn-xs "><i data-feather="trash" class="w-18"></i></a>
                              </td>
                           </tr>
                           <tr>
                              <td>gaurang - part waiting</td>
                              <td>12 Jan, 2022 01:53:08</td>
                              <td class="text-center">
                                 <a href="#" class="btn btn-outline-secondary btn-xs"><i data-feather="shopping-bag" class="w-18"></i></a>
                                 <a href="#" class="btn btn-outline-primary btn-xs "><i data-feather="trash" class="w-18"></i></a>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Close -pause popup-->
      <div class="modal fade" id="close-pause" tabindex="-1" role="dialog" aria-labelledby="close-pause" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Pause Order</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group mb-24">
                           <label class="mb-8">Name <sup>*</sup></label>
                           <input type="text" class="form-control" placeholder="" required="">
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     Pause</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Open view- self- checkin popup-->
      <div class="modal fade" id="view-self-checkin" tabindex="-1" role="dialog" aria-labelledby="view-self-checkin" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">WalkIn History</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body view-ticket">
                  <div class="align-items-center justify-content-between flex-wrap table-btn-layout">
                     <div class="table-action-btn d-flex justify-content-between full-col">
                        <button class="btn btn-secondary btn-md d-flex align-items-center" data-toggle="collapse" data-target="#walkin-ticket">
                        Search By Filters <i data-feather="chevron-down"></i>
                        </button>
                     </div>
                     <div class="collapse search-ticket-collapse" id="walkin-ticket">
                        <div class="card mt-24">
                           <div class="row">
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Customer Name/email</label>
                                    <input type="text" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Walkin Id</label>
                                    <input type="text" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Order Date</label>
                                    <input type="date" class="form-control" placeholder="Select Date">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="action-group">
                                 <a href="javascript:void(0)" class="btn btn-secondary btn flex-grow-1 mr-8">
                                 Search</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="responsive-table data-setting-table ">
                     <table class="table table-striped center-form-check">
                        <thead>
                           <tr>
                              <th>WalkIn #</th>
                              <th>Date</th>
                              <th>Customer Name</th>
                              <th>Manufacturer</th>
                              <th>Devices</th>
                              <th>Network</th>
                              <th>Problem</th>
                              <th>Problem Description</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- open-view-refund -->
      <div class="modal fade" id="open-view-refund" tabindex="-1" role="dialog" aria-labelledby="open-view-refund" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Refund History</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body view-ticket">
                  <div class="d-flex align-items-center justify-content-between flex-wrap table-btn-layout">
                     <div class="table-action-btn d-flex justify-content-between full-col">
                        <button class="btn btn-secondary btn-md d-flex align-items-center" data-toggle="collapse" data-target="#invoice-history-collapse">Search By Filters <i data-feather="chevron-down"></i>
                        </button>
                     </div>
                     <div class="collapse search-ticket-collapse" id="invoice-history-collapse">
                        <div class="card mt-24">
                           <div class="row">
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">CUSTOMER</label>
                                    <input type="text" class="form-control" placeholder="Search Customer ">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">TICKET ID</label>
                                    <input type="text" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">INVOICE ID</label>
                                    <input type="text" class="form-control" placeholder=" ">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">IMEI OR SERIAL</label>
                                    <input type="text" class="form-control" placeholder=" ">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Order Date</label>
                                    <input type="date" class="form-control" placeholder="Select Date">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="action-group">
                                 <a href="javascript:void(0)" class="btn btn-secondary btn flex-grow-1 mr-8">
                                 Search</a>
                                 <a href="javascript:void(0)" class="btn btn-primary btn flex-grow-1 mr-16">
                                 Clear
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="responsive-table data-setting-table ">
                     <table class="table table-striped center-form-check">
                        <thead>
                           <tr>
                              <th>Invoice ID</th>
                              <th>Date</th>
                              <th>Customer Name</th>
                              <th class="no-space">Ticket ID</th>
                              <th>Product</th>
                              <th>Status</th>
                              <th>Total</th>
                              <th class="no-space">Due</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>20615</td>
                              <td class="date">
                                 <p class="mb-0">01 May, 2021</p>
                                 <p class="mb-0">1:38 PM</p>
                              </td>
                              <td>Ismel Benhamadi</td>
                              <td class="no-space"><a href="#">N/A</a></td>
                              <td>
                                 <p class="mb-0">Screen Replacement</p>
                              </td>
                              <td><span class="badge bg-danger">REFUND</span></td>
                              <td class="no-space">-£25.00 </td>
                              <td class="no-space">£0.00</td>
                              <td>
                                 <a class="link link-primary d-block" href="">Open</a>
                                 <a class="link link-secondary d-block" href="">Print</a>
                                 <p class="mb-0 link-success">Refund Order#20388</p>
                              </td>
                           </tr>
                           <tr>
                              <td>20584</td>
                              <td class="date">
                                 <p class="mb-0">24 Apr, 2021</p>
                                 <p class="mb-0">5:58 PM</p>
                              </td>
                              <td>Vladimir Kovacevic </td>
                              <td class="no-space">N/<ABBR></ABBR></td>
                              <td>
                                 <p class="mb-0">King Kong Anti Burst Clear Case Iphone 7/8/SE 2020</p>
                                 <p class="mb-0">Eiger North Case iPhone SE (2020)/8/7 Black</p>
                              </td>
                              <td><span class="badge bg-success">PAID</span></td>
                              <td class="no-space">£5.02 </td>
                              <td class="no-space">£0.00</td>
                              <td>
                                 <a class="link link-primary d-block" href="">Open</a>
                                 <a class="link link-secondary d-block" href="">Print</a>
                                 <a class="link link-primary d-block" href="">Refund</a>
                                 <p class="mb-0 link-success">Refund Order#20578</p>
                              </td>
                           </tr>
                           <tr>
                              <td>20578</td>
                              <td class="date">
                                 <p class="mb-0">24 Apr, 2021</p>
                                 <p class="mb-0">5:58 PM</p>
                              </td>
                              <td>Vladimir Kovacevic</td>
                              <td class="no-space"><a href="#">   L-486</a></td>
                              <td>
                                 <p class="mb-0">Battery Replacement Screen Replacement</p>
                                 <p class="mb-0">Apple iPhone SE (2020) Screen Protector</p>
                                 <p class="mb-0">King Kong Anti Burst Clear Case Iphone 7/8/SE 2020</p>
                                 <p class="mb-0">Battery Replacement Screen Replacement</p>
                                 <p class="mb-0">Apple iPhone SE (2020) Screen Protector</p>
                                 <p class="mb-0">King Kong Anti Burst Clear Case Iphone 7/8/SE 2020</p>
                              </td>
                              <td><span class="badge bg-success">PAID</span></td>
                              <td class="no-space">£94.92 </td>
                              <td class="no-space">£0.00</td>
                              <td>
                                 <a class="link link-primary d-block" href="">Open</a>
                                 <a class="link link-secondary d-block" href="">Print</a>
                                 <a class="link link-primary d-block" href="">Refund</a>
                              </td>
                           </tr>
                           <tr>
                              <td>20533</td>
                              <td class="date">
                                 <p class="mb-0">23 Apr, 2021</p>
                                 <p class="mb-0">9:38 AM</p>
                              </td>
                              <td>Walkin Customer  </td>
                              <td class="no-space">N/A   </td>
                              <td>
                                 <p class="mb-0">Prodigee Screen Protector iPhone 11 Pro / X / Xs</p>
                              </td>
                              <td><span class="badge bg-danger">REFUND</span></td>
                              <td class="no-space">-£9.99   </td>
                              <td class="no-space">£0.00</td>
                              <td>
                                 <a class="link link-primary d-block" href="">Open</a>
                                 <a class="link link-secondary d-block" href="">Print</a>
                                 <p class="mb-0 link-success">Refund Order#20578</p>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- View Invoice -->
      <div class="modal fade" id="invoic-history" tabindex="-1" role="dialog" aria-labelledby="invoic-history" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Invoice History</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body view-ticket">
                  <div class="d-flex align-items-center justify-content-between flex-wrap table-btn-layout">
                     <div class="table-action-btn d-flex justify-content-between full-col">
                        <button class="btn btn-secondary btn-md d-flex align-items-center" data-toggle="collapse" data-target="#invoice-history-tab">Search By Filters <i data-feather="chevron-down"></i>
                        </button>
                     </div>
                     <div class="collapse search-ticket-collapse" id="invoice-history-tab">
                        <div class="card mt-24">
                           <div class="row">
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">CUSTOMER</label>
                                    <input type="text" class="form-control" placeholder="Search Customer ">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">TICKET ID</label>
                                    <input type="text" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">INVOICE ID</label>
                                    <input type="text" class="form-control" placeholder=" ">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">IMEI OR SERIAL</label>
                                    <input type="text" class="form-control" placeholder=" ">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">STATUS</label>
                                    <select class="form-control" data-placeholder="Select Status">
                                       <option>Paid</option>
                                       <option>UnPaid</option>
                                       <option>Partial</option>
                                       <option>Refunded</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group">
                                    <label class="mb-8">Order Date</label>
                                    <input type="date" class="form-control" placeholder="Select Date">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="action-group">
                                 <a href="javascript:void(0)" class="btn btn-secondary btn flex-grow-1 mr-8">
                                 Search</a>
                                 <a href="javascript:void(0)" class="btn btn-primary btn flex-grow-1 mr-16">
                                 Clear
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="responsive-table data-setting-table ">
                     <table class="table table-striped center-form-check">
                        <thead>
                           <tr>
                              <th>Invoice ID</th>
                              <th>Date</th>
                              <th>Customer Name</th>
                              <th>Contact #</th>
                              <th class="no-space">Ticket ID</th>
                              <th>Devices</th>
                              <th>Product</th>
                              <th>Status</th>
                              <th>Total</th>
                              <th class="no-space">Due</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>20644</td>
                              <td class="date">
                                 <p class="mb-0">14 Feb, 2022 </p>
                                 <p class="mb-0">5:52 AM</p>
                              </td>
                              <td>Bhavesh Dhedhi</td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Ph:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td class="no-space"><a href="#">  L-540.11</a></td>
                              <td>Apple MacBook Air A1304
                                 ,Iphone 11
                                 ,Test New Device
                              </td>
                              <td>
                                 <p class="mb-0">Apple MacBook Air A1304 Audio Repair</p>
                                 <p class="mb-0">Iphone 11 Cable</p>
                                 <p class="mb-0">Test New Device IC Replacement System & Memory Upgrade</p>
                                 <p class="mb-0">Marketing Material Design & Print</p>
                                 <p class="mb-0">Test Product</p>
                                 <p class="mb-0"><strong class="link-success">34534345345</strong></p>
                                 <p class="mb-0"><strong class="link-success">65745645456</strong></p>
                              </td>
                              <td><span class="badge bg-secondary">OVERPAID</span></td>
                              <td>£1954.98   </td>
                              <td class="no-space">-£50.00</td>
                              <td>
                                 <button class="link link-primary d-block">Open</button>
                                 <button class="link link-secondary d-block">Print</button>
                                 <button class="link link-primary d-block">Refund</button>
                              </td>
                           </tr>
                           <tr>
                              <td>20643</td>
                              <td class="date">
                                 <p class="mb-0">11 Feb, 2022</p>
                                 <p class="mb-0">9:30 AM</p>
                              </td>
                              <td>Walkin Customer  </td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Ph:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong></p>
                              </td>
                              <td class="no-space"><a href="#">L-540.10</a></td>
                              <td>Test New Device </td>
                              <td>
                                 <p class="mb-0">Test New Device Iphone - Tesco</p>
                                 <p class="mb-0">Test Product</p>
                                 <p class="mb-0"><strong class="link-success">845631564894254</strong></p>
                              </td>
                              <td><span class="badge bg-success">PAID</span></td>
                              <td>£94.99  </td>
                              <td class="no-space">£0.00</td>
                              <td>
                                 <button class="link link-primary d-block">Open</button>
                                 <button class="link link-secondary d-block">Print</button>
                                 <button class="link link-primary d-block">Refund</button>
                              </td>
                           </tr>
                           <tr>
                              <td>20642</td>
                              <td class="date">
                                 <p class="mb-0">11 Feb, 2022</p>
                                 <p class="mb-0">9:30 AM</p>
                              </td>
                              <td>Walkin Customer  </td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Ph:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong></p>
                              </td>
                              <td class="no-space">N/A</td>
                              <td></td>
                              <td>
                                 <p class="mb-0">Test Product</p>
                              </td>
                              <td><span class="badge bg-success">PAID</span></td>
                              <td>£0.00</td>
                              <td class="no-space">£0.00</td>
                              <td>
                                 <button class="link link-primary d-block">Open</button>
                                 <button class="link link-secondary d-block">Print</button>
                              </td>
                           </tr>
                           <tr>
                              <td>20641</td>
                              <td class="date">
                                 <p class="mb-0">10 Feb, 2022</p>
                                 <p class="mb-0">1:59 PM</p>
                              </td>
                              <td>Bhavesh Dhedhi</td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Ph:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td class="no-space"><a href="#">L-540.9</a></td>
                              <td>
                                 Iphone 11
                                 ,Iphone 4
                                 ,Test New Device
                              </td>
                              <td>
                                 <p class="mb-0">Iphone 11 £9.99 Promo Launch Event</p>
                                 <p class="mb-0">Iphone 4 Apple iphone 4 trade in</p>
                                 <p class="mb-0">Test New Device Audio Repair</p>
                                 <p class="mb-0">Cable</p>
                                 <p class="mb-0">Iphone / Ipad - Vodafone/Lebara iPhone SE 6+ 6S 6S+ 7 7+ 8 8+</p>
                                 <p class="mb-0">Test Product</p>
                                 <p class="mb-0"><strong class="link-success">34534345345</strong></p>
                                 <p class="mb-0"><strong class="link-success">642642561542361</strong></p>
                                 <p class="mb-0"><strong class="link-success">654123745641846</strong></p>
                                 <p class="mb-0"><strong class="link-success">654256321614561   </strong></p>
                              </td>
                              <td><span class="badge bg-success">PAID</span></td>
                              <td>£11292.56  </td>
                              <td class="no-space">£0.00</td>
                              <td>
                                 <button class="link link-primary d-block">Open</button>
                                 <button class="link link-secondary d-block">Print</button>
                                 <button class="link link-primary d-block">Refund</button>
                              </td>
                           </tr>
                           <tr>
                              <td>20638</td>
                              <td class="date">
                                 <p class="mb-0">02 Feb, 2022</p>
                                 <p class="mb-0">10:15 AM</p>
                              </td>
                              <td>Gaurang evince</td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Ph:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td class="no-space"><a href="#">L-540.3</a></td>
                              <td>
                                 Iphone 11
                                 ,Iphone 4
                                 ,Test New Device
                              </td>
                              <td>
                                 <p class="mb-0">Aurora Audio Repair</p>
                                 <p class="mb-0">Iphone 11 Iphone / Ipad - Vodafone/Lebara iPhone SE 6+ 6S 6S+ 7 7+ 8 8+</p>
                                 <p class="mb-0">Test New Device Test Product</p>
                                 <p class="mb-0"><strong class="link-success">34534345345</strong></p>
                                 <p class="mb-0"><strong class="link-success">34534345345123</strong></p>
                                 <p class="mb-0"><strong class="link-success">456321568412365</strong></p>
                              </td>
                              <td><span class="badge bg-primary">PARTIAL</span></td>
                              <td>£199.97  </td>
                              <td class="no-space">£178.97 </td>
                              <td>
                                 <button class="link link-primary d-block">Open</button>
                                 <button class="link link-secondary d-block">Print</button>
                                 <button class="link link-primary d-block">Refund</button>
                              </td>
                           </tr>
                           <tr>
                              <td>20637</td>
                              <td class="date">
                                 <p class="mb-0">17 Jan, 2022</p>
                                 <p class="mb-0">1:30 PM</p>
                              </td>
                              <td>Gaurang evince</td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Ph:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td class="no-space"><a href="#">L-539</a></td>
                              <td>
                                 Iphone 11
                              </td>
                              <td>
                                 <p class="mb-0">Iphone 11 Audio Repair</p>
                              </td>
                              <td><span class="badge bg-success">PAID</span></td>
                              <td>£74.99</td>
                              <td class="no-space">£0.00 </td>
                              <td>
                                 <button class="link link-primary d-block">Open</button>
                                 <button class="link link-secondary d-block">Print</button>
                                 <button class="link link-primary d-block">Refund</button>
                              </td>
                           </tr>
                           <tr>
                              <td>20636</td>
                              <td class="date">
                                 <p class="mb-0">17 Jan, 2022</p>
                                 <p class="mb-0">1:28 PM</p>
                              </td>
                              <td>Gaurang evince</td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Ph:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td class="no-space"><a href="#">L-538</a></td>
                              <td>
                                 Iphone 11 ,Sony Xperia XA2
                              </td>
                              <td>
                                 <p class="mb-0">Iphone 11 Audio Repair</p>
                                 <p class="mb-0">Sony Xperia XA2 Sony Xperia XA2 Screen Protector  </p>
                              </td>
                              <td><span class="badge bg-success">PAID</span></td>
                              <td>£84.98  </td>
                              <td class="no-space">£0.00 </td>
                              <td>
                                 <button class="link link-primary d-block">Open</button>
                                 <button class="link link-secondary d-block">Print</button>
                                 <button class="link link-primary d-block">Refund</button>
                              </td>
                           </tr>
                           <tr>
                              <td>20621</td>
                              <td class="date">
                                 <p class="mb-0">24 Dec, 2021</p>
                                 <p class="mb-0">1:44 PM</p>
                              </td>
                              <td>Gaurang evince</td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Ph:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td class="no-space"><a href="#">L-500</a></td>
                              <td>
                                 fan
                              </td>
                              <td>
                                 <p class="mb-0">fan motor problem</p>
                              </td>
                              <td><span class="badge bg-success">PAID</span></td>
                              <td>£84.98  </td>
                              <td class="no-space">£0.00 </td>
                              <td>
                                 <button class="link link-primary d-block">Open</button>
                                 <button class="link link-secondary d-block">Print</button>
                                 <button class="link link-primary d-block">Refund</button>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Pattern lock -->
      <div class="modal fade" id="Pattern-lock" tabindex="-1" role="dialog" aria-labelledby="Pattern-lock" aria-hidden="false" >
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Draw Pattern Lock</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body">
                  <div id="pattern_lock_container" style="width: 310px; height: 310px; position: relative;" class="patt-holder">
                     <ul class="patt-wrap" style="padding:20px">
                        <li class="patt-circ hovered e dir" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                        <li class="patt-circ hovered" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                        <li class="patt-circ" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                        <li class="patt-circ" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                        <li class="patt-circ" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                        <li class="patt-circ" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                        <li class="patt-circ" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                        <li class="patt-circ" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                        <li class="patt-circ" style="margin:20px; width : 50px; height : 50px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; ">
                           <div class="patt-dots"></div>
                        </li>
                     </ul>
                     <div class="patt-lines e dir" style="top: 60px; left: 60px; width: 100px; transform: rotate(0deg);"></div>
                  </div>
                  <button class="lock_save btn btn-primary" type="submit" name="">Save</button>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Edit ticket -->
      <div class="modal fade" id="Update-Ticket" tabindex="-1" role="dialog" aria-labelledby="Update-Ticket" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Update-Ticket</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  customer-modal">
                  <div class="row">
                     <div class="col-md-12 mb-24">
                        <p class="mb-1 text-md text-sm "> <label class="link link-secondary">Name:</label> Audio Repair</p>
                        <p class="mb-0 text-md text-sm "> <label class="link link-secondary">Price:</label> £74.99 </p>
                     </div>
                  </div>
                  <div class="card mb-24">
                     <div class="row">
                        <div class="col-md-6 mb-16">
                           <div class="form-group">
                              <label class="mb-8">IMEI / Serial No </label>
                              <div class="d-flex has-drop">
                                 <div class="select-option">
                                    <select class="form-control" data-placeholder="Head Office">
                                       <option>IMEI</option>
                                       <option>Serial</option>
                                    </select>
                                 </div>
                                 <input type="text" class="form-control" placeholder="34534345345" />
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group">
                              <label class="mb-8">Price</label>
                              <input type="text" class="form-control" placeholder="74.99" >
                           </div>
                        </div>
                        <div class="col-md-4 mb-16">
                           <div class="form-group">
                              <label class="mb-8 w-100">Assigned To</label>
                              <select class="form-control w-100" data-placeholder="Select">
                                 <option>Akshay</option>
                                 <option>Bhavesh</option>
                                 <option>Gaurang</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4 mb-16">
                           <div class="form-group">
                              <label class="mb-8 w-100">Network</label>
                              <select class="form-control w-100" data-placeholder="Select">
                                 <option>Vodafone</option>
                                 <option>O2</option>
                                 <option>EE</option>
                                 <option>Unlocked</option>
                                 <option>Tesco</option>
                                 <option>Cricket</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4 mb-16">
                           <div class="form-group">
                              <label class="mb-8 w-100">Repair Status</label>
                              <select class="form-control w-100" data-placeholder="Select">
                                 <option>In Progress</option>
                                 <option>Repaired</option>
                                 <option>Unlocked</option>
                                 <option>Repaired & Collected</option>
                                 <option>Warranty Repair</option>
                                 <option>Customer Reply</option>
                                 <option>Cancelled</option>
                                 <option>Waiting for Parts</option>
                                 <option>Not Repairable</option>
                                 <option>Not Repairable & Collected</option>
                                 <option>Awaiting Customer Device</option>
                                 <option>Quality Control In Process</option>
                                 <option>Appointment - Device with customer</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group form-group-textarea">
                              <label class="mb-8">Diagnostic Note</label>
                              <textarea type="text" class="form-control" ></textarea>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group form-group-textarea">
                              <label class="mb-8">Staff Comments</label>
                              <textarea type="text" class="form-control" ></textarea>
                           </div>
                        </div>
                        <div class="col-md-12 mb-16">
                           <div class="form-group form-group-textarea">
                              <label class="mb-8">Additional Items</label>
                              <div class="d-flex p-1 ">
                                 <div class="mr-16">
                                    <div class="form-check d-flex align-items-center">
                                       <input class="form-check-input form-check-input-md mr-8" type="checkbox" value="" id="add-Battery">
                                       <label class="form-check-label" for="add-Battery">Battery</label>
                                    </div>
                                 </div>
                                 <div class="mr-16">
                                    <div class="form-check d-flex align-items-center">
                                       <input class="form-check-input form-check-input-md mr-8" type="checkbox" value="" id="add-SimCard">
                                       <label class="form-check-label" for="add-SimCard">Sim Card</label>
                                    </div>
                                 </div>
                                 <div class="mr-16">
                                    <div class="form-check d-flex align-items-center">
                                       <input class="form-check-input form-check-input-md mr-8" type="checkbox" value="" id="add-MemoryCard">
                                       <label class="form-check-label" for="add-MemoryCard">Memory Card</label>
                                    </div>
                                 </div>
                                 <div class="mr-16">
                                    <div class="form-check d-flex align-items-center">
                                       <input class="form-check-input form-check-input-md mr-8" type="checkbox" value="" id="add-Charger">
                                       <label class="form-check-label" for="add-Charger">Charger</label>
                                    </div>
                                 </div>
                                 <div class="mr-16">
                                    <div class="form-check d-flex align-items-center">
                                       <input class="form-check-input form-check-input-md mr-8" type="checkbox" value="" id="add-Case">
                                       <label class="form-check-label" for="add-Case">Case</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 mb-24">
                        <p class="mb-1 text-md text-sm "> <label class="link link-secondary"> (Iphone 11) IMEI:</label> 34534345345</p>
                        <p class="mb-0 text-md text-sm "> <label class="link link-secondary">Security Code:</label> 1234</p>
                        <p class="mb-0 text-md text-sm "> <label class="link link-secondary">Pre Repair Conditions Checklist</label>
                           <i data-feather="edit" class="w-18"></i>
                        </p>
                        <p class="mb-0 text-md text-sm "> <label class="link link-secondary">Fail:</label> Face ID , Camera Lens</p>
                        <p class="mb-0 text-md text-sm "> <label class="link link-secondary">Pass: </label> Ear Speaker, Front Camera & Focus</p>
                     </div>
                  </div>
                  <div class="card ">
                     <div class="row">
                        <div class="col-md-6 mb-16">
                           <ul class="nav-tabs-col2 pattern-lock" role="tablist">
                              <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#passcode" role="tab">Passcode</a> </li>
                              <li class="nav-item"> <a class="nav-link"  data-toggle="modal" data-target="#Pattern-lock">Pattern Lock</a> </li>
                           </ul>
                           <!-- Tab panes -->
                           <div class="tab-content mt-8">
                              <div class="tab-pane active" id="passcode" role="tabpanel">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="security_code" placeholder="Enter Passcode" />
                                 </div>
                              </div>
                              <div class="tab-pane" id="lock" role="tabpanel"> Pattern Lock </div>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16"></div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group">
                              <label class="mb-8 w-100">Task Type</label>
                              <select class="form-control w-100" data-placeholder="Select">
                                 <option value="1">In-Store</option>
                                 <option value="2">On-Site</option>
                                 <option value="3">Pick Up</option>
                                 <option value="4">Drop Off</option>
                                 <option value="5">Out Of Warranty</option>
                                 <option value="6">In Warranty</option>
                                 <option value="7">Mail In</option>
                                 <option value="8">Walk In</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group">
                              <label class="mb-8">Due On</label>
                              <input type="date" class="form-control" placeholder="Select Date" />
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group">
                              <label class="mb-8 w-100">Physical Location</label>
                              <select class="form-control w-100" data-placeholder="Select">
                                 <option value="1">Select Physical Location</option>
                                 <option value="2">Bin 1</option>
                                 <option value="3">Bin 2</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 mb-16">
                           <div class="form-group">
                              <label class="mb-8">Test</label>
                              <input type="text" class="form-control" placeholder="" >
                           </div>
                        </div>
                        <div class="col-md-12 mb-16">
                           <div class="form-group form-group-textarea">
                              <label class="mb-8">Additional Note</label>
                              <textarea type="text" class="form-control" ></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Pre Repair Condition Checklist -->
      <div class="modal fade" id="pre-repair" tabindex="-1" role="dialog" aria-labelledby="pre-repair" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Pre Repair Condition Checklist</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  customer-modal">
                  <div class="d-flex d-flex mb-16 align-items-center ">
                     <div class="mr-8">
                        <div class="three-checkbox round">
                           <input type="radio" name="select-all-popup"><input type="radio" name="select-all-popup" checked="checked"><input type="radio" name="select-all-popup">
                           <span class="slider"></span>
                        </div>
                     </div>
                     <div class="switch-detail no-space">
                        Select All
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-4">
                        <div class="box-card-toggle">
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-Powerbutton">
                                    <input type="radio" name="popup-Powerbutton" checked="checked">
                                    <input type="radio" name="popup-Powerbutton" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Power Button
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-touch">
                                    <input type="radio" name="popup-touch" checked="checked">
                                    <input type="radio" name="popup-touch">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Touch Functionality
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-loud-speaker">
                                    <input type="radio" name="popup-loud-speaker" checked="checked">
                                    <input type="radio" name="popup-loud-speaker">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Loud Speaker
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-home">
                                    <input type="radio" name="popup-home" checked="checked">
                                    <input type="radio" name="popup-home">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Home Button
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-camera">
                                    <input type="radio" name="popup-camera" checked="checked">
                                    <input type="radio" name="popup-camera">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Back Camera & Focus
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-Wifi">
                                    <input type="radio" name="popup-Wifi" checked="checked">
                                    <input type="radio" name="popup-Wifi">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Wifi
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-ChargingPort">
                                    <input type="radio" name="popup-ChargingPort" checked="checked">
                                    <input type="radio" name="popup-ChargingPort">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Charging Port
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-HousingStraight">
                                    <input type="radio" name="popup-HousingStraight" checked="checked">
                                    <input type="radio" name="popup-HousingStraight">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Housing Straight
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-casing">
                                    <input type="radio" name="popup-casing" checked="checked">
                                    <input type="radio" name="popup-casing">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Back Back Glass & Casing Intact
                              </div>
                           </div>
                           <div class="d-flex d-flex  align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-telephone-book">
                                    <input type="radio" name="popup-telephone-book" checked="checked">
                                    <input type="radio" name="popup-telephone-book">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Telephone Booking
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="box-card-toggle">
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-volumn">
                                    <input type="radio" name="popup-volumn" checked="checked">
                                    <input type="radio" name="popup-volumn" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Volume Button
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-proxi">
                                    <input type="radio" name="popup-proxi" checked="checked">
                                    <input type="radio" name="popup-proxi">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Proximity Sensor
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-micro">
                                    <input type="radio" name="popup-micro" checked="checked">
                                    <input type="radio" name="popup-micro">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Microphone
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-touch-id">
                                    <input type="radio" name="popup-touch-id" checked="checked">
                                    <input type="radio" name="popup-touch-id">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Touch ID
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-screen">
                                    <input type="radio" name="popup-screen" checked="checked">
                                    <input type="radio" name="popup-screen">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Screen & Display Intact
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-bluetooth">
                                    <input type="radio" name="popup-bluetooth" checked="checked">
                                    <input type="radio" name="popup-bluetooth">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Bluetooth
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-wireless">
                                    <input type="radio" name="popup-wireless" checked="checked">
                                    <input type="radio" name="popup-wireless">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Wireless Charging
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-screw">
                                    <input type="radio" name="popup-screw" checked="checked">
                                    <input type="radio" name="popup-screw">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Screws Presents
                              </div>
                           </div>
                           <div class="d-flex d-flex align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-sim">
                                    <input type="radio" name="popup-sim" checked="checked">
                                    <input type="radio" name="popup-sim">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Sim & SD tray
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="box-card-toggle">
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-mute-switch">
                                    <input type="radio" name="popup-mute-switch" checked="checked">
                                    <input type="radio" name="popup-mute-switch" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Mute Switch
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-ear">
                                    <input type="radio" name="popup-ear" checked="checked">
                                    <input type="radio" name="popup-ear" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Ear Speaker
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round"  >
                                    <input type="radio" name="popup-apple-pay" checked="checked">
                                    <input type="radio" name="popup-apple-pay" >
                                    <input type="radio" name="popup-apple-pay" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Apple Pay
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-front-cam">
                                    <input type="radio" name="popup-front-cam" checked="checked">
                                    <input type="radio" name="popup-front-cam">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Front Camera & Focus
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-true-tone">
                                    <input type="radio" name="popup-true-tone" checked="checked">
                                    <input type="radio" name="popup-true-tone">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 True Tone (If Applicable)
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-faceid">
                                    <input type="radio" name="popup-faceid" checked="checked">
                                    <input type="radio" name="popup-faceid">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Face ID
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-headphn">
                                    <input type="radio" name="popup-headphn" checked="checked">
                                    <input type="radio" name="popup-headphn">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Head Phone Jack
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-caneralen">
                                    <input type="radio" name="popup-caneralen" checked="checked">
                                    <input type="radio" name="popup-caneralen">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Camera Lens
                              </div>
                           </div>
                           <div class="d-flex d-flex  align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-cannot">
                                    <input type="radio" name="popup-cannot" >
                                    <input type="radio" name="popup-cannot" checked="checked">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Cannot Be Tested
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="check-btn-detail d-flex mt-3">
                     <div class="button-detail-check button-detail-green d-flex align-items-center">
                        <i class="mr-8"></i>
                        <label>Pass</label>
                     </div>
                     <div class="button-detail-check button-detail-red d-flex align-items-center">
                        <i class="mr-8"></i>
                        <label>Fail</label>
                     </div>
                     <div class="button-detail-check button-detail-disable d-flex align-items-center">
                        <i class="mr-8"></i>
                        <label>Disable</label>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <a class="link link-primary text-sm  d-block" href="#">Add Device Condition</a>
                     <button class="btn btn-secondary btn-xs save-btn mt-3"><i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Pre Repair Condition Checklist -->
      <div class="modal fade" id="post-repair" tabindex="-1" role="dialog" aria-labelledby="post-repair" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Post Repair Condition Checklist</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  customer-modal">
                  <div class="d-flex d-flex mb-16 align-items-center ">
                     <div class="mr-8">
                        <div class="three-checkbox round">
                           <input type="radio" name="select-all-popup-post">
                           <input type="radio" name="select-all-popup-post" checked="checked">
                           <input type="radio" name="select-all-popup-post">
                           <span class="slider"></span>
                        </div>
                     </div>
                     <div class="switch-detail no-space">
                        Select All
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-4">
                        <div class="box-card-toggle">
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-Powerbutton">
                                    <input type="radio" name="post-Powerbutton" checked="checked">
                                    <input type="radio" name="post-Powerbutton" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Power Button
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-touch">
                                    <input type="radio" name="popup-touch" checked="checked">
                                    <input type="radio" name="popup-touch">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Touch Functionality
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-loud-speaker">
                                    <input type="radio" name="popup-loud-speaker" checked="checked">
                                    <input type="radio" name="popup-loud-speaker">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Loud Speaker
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-home">
                                    <input type="radio" name="popup-home" checked="checked">
                                    <input type="radio" name="popup-home">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Home Button
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-camera">
                                    <input type="radio" name="popup-camera" checked="checked">
                                    <input type="radio" name="popup-camera">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Back Camera & Focus
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-Wifi">
                                    <input type="radio" name="popup-Wifi" checked="checked">
                                    <input type="radio" name="popup-Wifi">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Wifi
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="popup-ChargingPort">
                                    <input type="radio" name="popup-ChargingPort" checked="checked">
                                    <input type="radio" name="popup-ChargingPort">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Charging Port
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-HousingStraight">
                                    <input type="radio" name="post-HousingStraight" checked="checked">
                                    <input type="radio" name="post-HousingStraight">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Housing Straight
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-casing">
                                    <input type="radio" name="post-casing" checked="checked">
                                    <input type="radio" name="post-casing">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Back Back Glass & Casing Intact
                              </div>
                           </div>
                           <div class="d-flex d-flex  align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-telephone-book">
                                    <input type="radio" name="post-telephone-book" checked="checked">
                                    <input type="radio" name="post-telephone-book">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Telephone Booking
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="box-card-toggle">
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-volumn">
                                    <input type="radio" name="post-volumn" checked="checked">
                                    <input type="radio" name="post-volumn" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Volume Button
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-proxi">
                                    <input type="radio" name="post-proxi" checked="checked">
                                    <input type="radio" name="post-proxi">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Proximity Sensor
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-micro">
                                    <input type="radio" name="post-micro" checked="checked">
                                    <input type="radio" name="post-micro">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Microphone
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-touch-id">
                                    <input type="radio" name="post-touch-id" checked="checked">
                                    <input type="radio" name="post-touch-id">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Touch ID
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-screen">
                                    <input type="radio" name="post-screen" checked="checked">
                                    <input type="radio" name="post-screen">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Screen & Display Intact
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-bluetooth">
                                    <input type="radio" name="post-bluetooth" checked="checked">
                                    <input type="radio" name="post-bluetooth">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Bluetooth
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-wireless">
                                    <input type="radio" name="post-wireless" checked="checked">
                                    <input type="radio" name="post-wireless">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Wireless Charging
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-screw">
                                    <input type="radio" name="post-screw" checked="checked">
                                    <input type="radio" name="post-screw">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Screws Presents
                              </div>
                           </div>
                           <div class="d-flex d-flex align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-sim">
                                    <input type="radio" name="post-sim" checked="checked">
                                    <input type="radio" name="post-sim">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Sim & SD tray
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="box-card-toggle">
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-mute-switch">
                                    <input type="radio" name="post-mute-switch" checked="checked">
                                    <input type="radio" name="post-mute-switch" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Mute Switch
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-ear">
                                    <input type="radio" name="post-ear" checked="checked">
                                    <input type="radio" name="post-ear" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Ear Speaker
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round"  >
                                    <input type="radio" name="post-apple-pay" checked="checked">
                                    <input type="radio" name="post-apple-pay" >
                                    <input type="radio" name="post-apple-pay" >
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Apple Pay
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-front-cam">
                                    <input type="radio" name="post-front-cam" checked="checked">
                                    <input type="radio" name="post-front-cam">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Front Camera & Focus
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-true-tone">
                                    <input type="radio" name="post-true-tone" checked="checked">
                                    <input type="radio" name="post-true-tone">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 True Tone (If Applicable)
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-faceid">
                                    <input type="radio" name="post-faceid" checked="checked">
                                    <input type="radio" name="post-faceid">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Face ID
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-headphn">
                                    <input type="radio" name="post-headphn" checked="checked">
                                    <input type="radio" name="post-headphn">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Head Phone Jack
                              </div>
                           </div>
                           <div class="d-flex d-flex mb-16 align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-caneralen">
                                    <input type="radio" name="post-caneralen" checked="checked">
                                    <input type="radio" name="post-caneralen">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Camera Lens
                              </div>
                           </div>
                           <div class="d-flex d-flex  align-items-center">
                              <div class="mr-8 ">
                                 <div class="three-checkbox round">
                                    <input type="radio" name="post-cannot">
                                    <input type="radio" name="post-cannot" >
                                    <input type="radio" name="post-cannot" checked="checked">
                                    <span class="slider"></span>
                                 </div>
                              </div>
                              <div class="switch-detail">
                                 Cannot Be Tested
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="check-btn-detail d-flex mt-3">
                     <div class="button-detail-check button-detail-green d-flex align-items-center">
                        <i class="mr-8"></i>
                        <label>Pass</label>
                     </div>
                     <div class="button-detail-check button-detail-red d-flex align-items-center">
                        <i class="mr-8"></i>
                        <label>Fail</label>
                     </div>
                     <div class="button-detail-check button-detail-disable d-flex align-items-center">
                        <i class="mr-8"></i>
                        <label>Disable</label>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <a class="link link-primary text-sm  d-block" href="#">Add Device Condition</a>
                     <button class="btn btn-secondary btn-xs save-btn mt-3"><i data-feather="upload-cloud"></i>Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <!-- Create Tickit popup-->
      <div class="modal fade" id="CreateTickit" tabindex="-1" role="dialog" aria-labelledby="CreateTickit" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Confirm Access Pin</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 mb-16">
                        <div class="form-group">
                           <label class="mb-8 w-100">User Name </label>
                           <select class="form-control w-100" data-placeholder="Select">
                              <option>Gaurang</option>
                              <option>Gurps</option>
                              <option>Saijad</option>
                              <option>Sunny</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12 mb-16">
                        <div class="form-group">
                           <label class="mb-8">Accesspin</label>
                           <input type="text" class="form-control" placeholder="Login Pin" >
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn" data-toggle="modal" data-target="#CreateTickitsave">
                     <i data-feather="upload-cloud"></i>Save
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Edit parts -->
      <div class="modal fade" id="newRepairPart" tabindex="-1" role="dialog" aria-labelledby="newRepairPart" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Add Product</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <form class="create-repair-part">
                  <input type="hidden" name="id" name="">
                  <input type="hidden" name="store_product_price_id" name="">
                  <input type="hidden" name="store_product_stock_id" name="">
                  <input type="hidden" name="simple_product_info_id" name="">
                  <div class="modal-body  customer-modal">
                     <ul class="nav justify-content-center align-items-center mb-4 repair-part-form-tab">
                        <li class="active" id="RepairProductTab">
                           <a href="#RepairPartProduct" data-toggle="tab"> <i data-feather="shopping-bag" class="mr-8"></i>Product </a>
                        </li>
                        <li id="RepairProductOtherInformationTab"> <a href="#RepairPartProductOtherInformation" data-toggle="tab"><i data-feather="info" class="mr-8"></i>Other Information</a> </li>
                     </ul>
                     <div class="tab-content repair-part-form-tab-content clearfix">
                        <div class="tab-pane active" id="RepairPartProduct">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">Name <sup>*</sup></label>
                                    <input type="text" name="name" class="form-control" placeholder="" required="">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">Category</label>
                                    <select name="category_id" class="form-control  w-100 select repair-part-categories" data-placeholder="Select">
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">Condition</label>
                                    <select name="product_condition_id" class="form-control  w-100 select repair-part-product-conditions" data-placeholder="Select">
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">Manufacturer</label>
                                    <select name="manufacturer_id" class="form-control  w-100 select repair-part-manufacturers" data-placeholder="Select">
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">Device/Model</label>
                                    <select name="device_id[]" class="form-control  w-100 select repair-part-devices" data-placeholder="Select" multiple="">
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">Retail Price</label>
                                    <input type="text" name="retail_price" class="form-control" placeholder="0.00">
                                 </div>
                              </div>
                              <div class="col-md-6 has-price-modal">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">Cost Price</label>
                                    <input type="text" name="unit_cost" class="form-control" placeholder="0.00">
                                 </div>
                              </div>
                              <div class="col-md-6 has-price-modal">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">On Hand</label>
                                    <input type="text" name="stock" class="form-control int-value" placeholder="0">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group mb-16">
                                    <label class="mb-8">Tax Class</label>
                                    <select name="tax_class_id" class="form-control  w-100 select repair-part-tax" data-placeholder="Select">
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6 mb-16">
                                 <div class="d-flex d-flex">
                                    <div class="form-switch mr-16">
                                       <input class="form-check-input" type="checkbox" name="show_on_pos" checked="">
                                    </div>
                                    <div class="switch-detail switch-detail-large">
                                       <h6 class="mt-2">Show on POS</h6>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 mb-16">
                                 <div class="d-flex d-flex">
                                    <div class="form-switch mr-16">
                                       <input class="form-check-input" type="checkbox" name="tax_inclusive" checked="">
                                    </div>
                                    <div class="switch-detail switch-detail-large">
                                       <h6 class="mt-2">Tax Inclusive</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="RepairPartProductOtherInformation">
                           <div class="row">
                              <div class="col-md-4 mb-16">
                                 <div class="form-group ">
                                    <label class="mb-8">Stock Warning</label>
                                    <input type="text" name="stock_warning" class="form-control int-value">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group ">
                                    <label class="mb-8">Re-Order Level</label>
                                    <input type="text" name="reorder_level" class="form-control int-value">
                                 </div>
                              </div>
                              <div class="col-md-4 mb-16">
                                 <div class="form-group ">
                                    <label class="mb-8">SKU Code</label>
                                    <input type="text" name="sku" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group mb-16">
                              <label class="mb-8">Supplier</label>
                              <select name="supplier_id" class="form-control  w-100 select repair-part-suppliers" data-placeholder="Select">
                                 <option value=""></option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary btn-xs save-btn save-repair-part" id="submitRepairPart"><i data-feather="upload-cloud"></i>Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!--  End-->
      <!-- Create Inquiry -->
      <div class="modal fade" id="Ticket-History" tabindex="-1" role="dialog" aria-labelledby="Ticket-History" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Ticket History</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <div class="modal-body customer-modal Ticket-History-body">
                  <ul class="nav justify-content-center align-items-center mb-3">
                     <li class="active">
                        <a href="#th-all" data-toggle="tab"> <i data-feather="user" class="mr-8"></i>All</a>
                     </li>
                     <li>
                        <a href="#th-private" data-toggle="tab"><i data-feather="message-square" class="mr-8"></i>Private Comments</a>
                     </li>
                     <li>
                        <a href="#th-note" data-toggle="tab"> <i data-feather="edit-3" class="mr-8"></i>Diagnostic Notes</a>
                     </li>
                     <li>
                        <a href="#th-email" data-toggle="tab"> <i data-feather="message-circle" class="mr-8"></i> Email / SMS Customer </a>
                     </li>
                     <li>
                        <a href="#th-technical" data-toggle="tab"> <i data-feather="tool" class="mr-8"></i> Technical Repair Report</a>
                     </li>
                     <li>
                        <a href="#th-system" data-toggle="tab"> <i data-feather="mail" class="mr-8"></i>System Messages</a>
                     </li>
                     <li>
                        <a href="#th-upload" data-toggle="tab"> <i data-feather="upload" class="mr-8"></i>Upload Attachments </a>
                     </li>
                  </ul>
                  <div class="tab-content clearfix">
                     <div class="tab-pane active" id="th-all">
                        <div class="card mt-2 mb-16">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">To</label>
                                    <select class="form-control  w-100 select" data-placeholder="Select">
                                       <option>Bhavesh</option>
                                       <option>Chris</option>
                                       <option>Gaurang</option>
                                       <option>Sunny</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">Via</label>
                                    <select class="form-control  w-100 select" data-placeholder="Select">
                                       <option>Comments</option>
                                       <option>Telephone Message</option>
                                       <option>email</option>
                                       <option>SMS</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">Subject</label>
                                    <input type="text" class="form-control" placeholder="Ticket# L-540.27">
                                 </div>
                              </div>
                              <div class="col-md-12 mt-8">
                                 <div class="comment--box">
                                    <figure>
                                       <img src="assets/img/user-preview.png">
                                    </figure>
                                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="text-right mt-3">
                              <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                           </div>
                        </div>
                        <div class="comments ">
                           <div class=" card mb-8">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0"><span class="link-secondary">Gaurang</span> changed <span class="link-secondary">Iphone 11 - Audio Repair</span>
                                       Cost Price from <span class="link-secondary">0.00 - 50.00</span>
                                    </p>
                                    <p class="text-xsm mb-0">04 Mar, 2022 07:05 am .</p>
                                 </div>
                              </div>
                           </div>
                           <div class=" card mb-8">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0"><span class="link-secondary">Gaurang</span> changed <span class="link-secondary">Iphone 11 - Audio Repair</span>
                                       Cost Price from <span class="link-secondary">0.00 - 50.00</span>
                                    </p>
                                    <p class="text-xsm mb-0">04 Mar, 2022 07:05 am .</p>
                                 </div>
                              </div>
                           </div>
                           <div class=" card mb-8">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0"><span class="link-secondary">Gaurang</span> changed <span class="link-secondary">Iphone 11 - Audio Repair</span>
                                       Cost Price from <span class="link-secondary">0.00 - 50.00</span>
                                    </p>
                                    <p class="text-xsm mb-0">04 Mar, 2022 07:05 am .</p>
                                 </div>
                              </div>
                           </div>
                           <div class=" card mb-8">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0"><span class="link-secondary">Gaurang</span> changed <span class="link-secondary">Iphone 11 - Audio Repair</span>
                                       Cost Price from <span class="link-secondary">0.00 - 50.00</span>
                                    </p>
                                    <p class="text-xsm mb-0">04 Mar, 2022 07:05 am .</p>
                                 </div>
                              </div>
                           </div>
                           <div class=" card mb-8">
                              <div class="d-flex justify-content-between">
                                 <div class="comment--box comment--box-wrap ">
                                    <figure>
                                       <img src="assets/img/user-preview.png">
                                    </figure>
                                    <div>
                                       <p class="mb-0">
                                          <span class="link-secondary">Repair4x</span>
                                          sent following email to <span class="link-secondary">gaurang@evincedev.com</span>
                                       </p>
                                       <p class="text-xsm mb-0">
                                          Repair4x sent an email New Repair Task [order# L-540.27] automatically to Employee Gaurang for Iphone 11 - Audio Repair
                                       </p>
                                       <p class="mb-0 "> <span class="link-success">04 Mar, 2022 07:05 am.</span></p>
                                    </div>
                                 </div>
                                 <div class="comments-status">
                                    <p class="mb-0 link-secondary"><span>Email Status</span></p>
                                    <span class="badge bg-success"> DELIVERED - NOT OPENED</span>
                                    <p class="mb-0 ">04 Mar, 2022 07:05 am</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="th-private">
                        <div class="card mt-2 mb-16">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">To</label>
                                    <select class="form-control  w-100 select" data-placeholder="Select">
                                       <option>Bhavesh</option>
                                       <option>Chris</option>
                                       <option>Gaurang</option>
                                       <option>Sunny</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">Via</label>
                                    <select class="form-control  w-100 select" data-placeholder="Select">
                                       <option>Comments</option>
                                       <option>Telephone Message</option>
                                       <option>email</option>
                                       <option>SMS</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">Subject</label>
                                    <input type="text" class="form-control" placeholder="Ticket# L-540.27">
                                 </div>
                              </div>
                              <div class="col-md-12 mt-8">
                                 <div class="comment--box">
                                    <figure>
                                       <img src="assets/img/user-preview.png">
                                    </figure>
                                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="text-right mt-3">
                              <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                           </div>
                        </div>
                        <div class="card">
                           <p class="mb-0">Sorry currently there is no history for this Ticket</p>
                        </div>
                     </div>
                     <div class="tab-pane" id="th-note">
                        <div class="card mt-2 mb-16">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">Note for</label>
                                    <select class="form-control  w-100 select" data-placeholder="Select">
                                       <option>Select Repair</option>
                                       <option>Iphone 11 Audio Repair |34534345345</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-8">
                                 <div class="comment--box">
                                    <figure>
                                       <img src="assets/img/user-preview.png">
                                    </figure>
                                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="text-right mt-3">
                              <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                           </div>
                        </div>
                        <div class="card">
                           <p class="mb-0">Sorry currently there is no history for this Ticket</p>
                        </div>
                     </div>
                     <div class="tab-pane" id="th-email">
                        <div class="card mt-2 mb-16">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">To</label>
                                    <input type="text" name="" class="form-control">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">Via</label>
                                    <select class="form-control  w-100 select" data-placeholder="Select">
                                       <option>email</option>
                                       <option>SMS</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">Canned Response</label>
                                    <select class="form-control  w-100 select" data-placeholder="Select">
                                       <option>Select Template</option>
                                       <option>Repair In Progress</option>
                                       <option>High Five - Your Handset has been repaired</option>
                                       <option>OOPS - Your Device cannot be repaired</option>
                                       <option>Pending Parts for Order - {Ticket}</option>
                                       <option>{Device} Repair Order Pending Approval</option>
                                       <option>Special Ordered Part For {Device_Name} Is in stock!</option>
                                       <option>Unlock In Progress</option>
                                       <option>Unlock Complete</option>
                                       <option>OOPS - Your Device cannot be unlocked</option>
                                       <option>Ticket Receipt #{OrderId} from {store_name}</option>
                                       <option>{recip_name}, Special part order request is created for {order_id}</option>
                                       <option>{recip_name}, Special Ordered Part For {device} Is in stock!</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-8">
                                 <div class="comment--box">
                                    <figure>
                                       <img src="assets/img/user-preview.png">
                                    </figure>
                                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="text-right mt-3">
                              <button class="btn btn-secondary btn-xs save-btn">Attach Files</button>
                           </div>
                        </div>
                        <div class=" card mb-16">
                           <div class="form-group">
                              <label class="mb-8">Email Content</label>
                              <textarea type="text" name="" class="form-control"> </textarea>
                           </div>
                        </div>
                        <div class=" card mb-8">
                           <div class="d-flex justify-content-between">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0">
                                       <span class="link-secondary">Repair4x</span>
                                       sent following email to <span class="link-secondary">gaurang@evincedev.com</span>
                                    </p>
                                    <p class="text-xsm mb-0">
                                       Repair4x sent an email New Repair Task [order# L-540.27] automatically to Employee Gaurang for Iphone 11 - Audio Repair
                                    </p>
                                    <p class="mb-0 "> <span class="link-success">04 Mar, 2022 07:05 am.</span></p>
                                 </div>
                              </div>
                              <div class="comments-status">
                                 <p class="mb-0 link-secondary"><span>Email Status</span></p>
                                 <span class="badge bg-success"> DELIVERED - NOT OPENED</span>
                                 <p class="mb-0 ">04 Mar, 2022 07:05 am</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="th-technical">
                        <div class="card mt-2 mb-16">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="mb-8">Note for</label>
                                    <select class="form-control  w-100 select" data-placeholder="Select">
                                       <option>Select Repair</option>
                                       <option>Iphone 11 Audio Repair |34534345345</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-8">
                                 <div class="comment--box">
                                    <figure>
                                       <img src="assets/img/user-preview.png">
                                    </figure>
                                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="text-right mt-3">
                              <button class="btn btn-secondary btn-xs save-btn"><i data-feather="upload-cloud"></i>Save</button>
                           </div>
                        </div>
                        <div class="card">
                           <p class="mb-0">Sorry currently there is no history for this Ticket</p>
                        </div>
                     </div>
                     <div class="tab-pane" id="th-system">
                        <div class="comments ">
                           <div class=" card mb-8">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0"><span class="link-secondary">Gaurang</span> changed <span class="link-secondary">Iphone 11 - Audio Repair</span>
                                       Cost Price from <span class="link-secondary">0.00 - 50.00</span>
                                    </p>
                                    <p class="text-xsm mb-0">04 Mar, 2022 07:05 am .</p>
                                 </div>
                              </div>
                           </div>
                           <div class=" card mb-8">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0"><span class="link-secondary">Gaurang</span> changed <span class="link-secondary">Iphone 11 - Audio Repair</span>
                                       Cost Price from <span class="link-secondary">0.00 - 50.00</span>
                                    </p>
                                    <p class="text-xsm mb-0">04 Mar, 2022 07:05 am .</p>
                                 </div>
                              </div>
                           </div>
                           <div class=" card mb-8">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0"><span class="link-secondary">Gaurang</span> changed <span class="link-secondary">Iphone 11 - Audio Repair</span>
                                       Cost Price from <span class="link-secondary">0.00 - 50.00</span>
                                    </p>
                                    <p class="text-xsm mb-0">04 Mar, 2022 07:05 am .</p>
                                 </div>
                              </div>
                           </div>
                           <div class=" card mb-8">
                              <div class="comment--box comment--box-wrap ">
                                 <figure>
                                    <img src="assets/img/user-preview.png">
                                 </figure>
                                 <div>
                                    <p class="mb-0"><span class="link-secondary">Gaurang</span> changed <span class="link-secondary">Iphone 11 - Audio Repair</span>
                                       Cost Price from <span class="link-secondary">0.00 - 50.00</span>
                                    </p>
                                    <p class="text-xsm mb-0">04 Mar, 2022 07:05 am .</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="th-upload">
                        <div class="card">
                           <div class="row justify-content-center">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="file-upload">
                                       <div class="image-upload-wrap text-center">
                                          <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                          <div class="drag-text d-flex justify-content-center align-items-center">
                                             <div class="drag-text-inner">
                                                <i data-feather="upload" class="mb-8"></i>
                                                <p class="mb-0">Drag and drop files here to upload</p>
                                                <p class="mb-0">Browse file</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="file-upload-content">
                                          <img class="file-upload-image" src="#" alt="your image" />
                                          <div class="image-title-wrap">
                                             <button type="button" onclick="removeUpload()" class="remove-image btn btn-outline-primary btn-xs">Remove</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <p class="text-center mt-3">Sorry currently there is no history for this Attachment</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- add discount -->
      <div class="modal fade" id="add-Discount" tabindex="-1" role="dialog" aria-labelledby="add-Discount" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-medium" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Discount</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body  add-Discount">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-24">
                           <label class="mb-8">Discount Type   </label>
                           <div class="d-flex align-center">
                              <div class="form-check mr-16">
                                 <input class="form-check-input" type="radio" value="2" id="rd1" name="rd-discount" checked="">
                                 <label class="form-check-label" for="rd1">£</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="3" id="rd2" name="rd-discount" >
                                 <label class="form-check-label" for="rd2">%</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-24">
                           <label class="mb-8">Name</label>
                           <input type="text" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-24">
                           <div  class="desc" id="desc-am2">
                              <label class="mb-8">Amount</label>
                              <input type="text" name="" placeholder="0" class="form-control" >
                           </div>
                           <div  class="desc" style="display: none;" id="desc-am3">
                              <label class="mb-8">Percentage </label>
                              <input type="text" name="" placeholder="0" class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group mb-24">
                           <label class="mb-8">Reason</label>
                           <textarea type="text" class="form-control"></textarea>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2 d-flex align-center">
                        <button class="btn btn-secondary btn-xs save-btn mr-8"><i data-feather="upload-cloud"></i>Save</button>
                        <button class="btn btn-secondary btn-xs save-btn"><i data-feather="trash"></i>Remove</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end popup -->
      <!-- Create Tickit Detail popup -->
      <div class="modal fade in" id="CreateTickitsave" tabindex="-1" role="dialog" aria-labelledby="CreateTickitsave" aria-hidden="true" >
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Ticket</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body action-modal">
                  <p class="link-secondary text-sm">You probably want to do one of the following</p>
                  <div class="devider-hr d-sm-block"></div>
                  <div class="row mt-1">
                     <div class="col-md-4 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#Print-Ticket-Labels">
                           <i data-feather="printer" class="d-block"></i>
                           <span>Print  Label</span>
                        </div>
                     </div>
                     <div class="col-md-4 mb-24">
                        <a href="#" class="d-block">
                           <div class="box-card text-center" >
                              <i data-feather="book" class="d-block"></i>
                              <span>Print Service Receipt</span>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#Ticket-ViewPDF">
                           <i data-feather="printer" class="d-block"></i>
                           <span>Print Thermal Receipt</span>
                        </div>
                     </div>
                     <div class="col-md-4 mb-24">
                        <a href="#" class="d-block">
                           <div class="box-card text-center" data-toggle="modal" data-toggle="modal" data-target="#View-tickit">
                              <i data-feather="eye" class="d-block"></i>
                              <span>View Ticket </span>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#EmailTicket">
                           <i data-feather="mail" class="d-block"></i>
                           <span>Email</span>
                        </div>
                     </div>
                     <div class="col-md-4 mb-24">
                        <div class="box-card text-center btn-secondary" data-dismiss="modal" aria-label="Close">
                           <i data-feather="plus-square" class="d-block"></i>
                           <span>New Sale  </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade in" id="Print-Ticket-Labels" tabindex="-1" role="dialog" aria-labelledby="Print-Ticket-Labels" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Print Ticket Labels</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body text-center">
                  <div class="form-check mb-32 d-flex">
                     <input class="form-check-input mr-8" type="checkbox" value="" id="amazon" checked="">
                     <label class="form-check-label" for="amazon">
                     <span class="link link-secondary"> Amazon Amazon Fire 7" (2015) </span>Audio Repair
                     <span class="link link-secondary">IMEI: (4545545544) </span>
                     </label>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     Print label</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade in" id="Ticket-ViewPDF" tabindex="-1" role="dialog" aria-labelledby="Ticket-ViewPDF" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">View PDF</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body text-center"></div>
            </div>
         </div>
      </div>
      <div class="modal fade in" id="EmailTicket" tabindex="-1" role="dialog" aria-labelledby="EmailTicket" aria-hidden="true" >
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Print Ticket Labels</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6 col-sm-6 mb-16">
                        <div class="form-group">
                           <label class="mb-8">To</label>
                           <input type="text" class="form-control" placeholder="bhavesh@evincedev.com">
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-6 mb-16">
                        <div class="form-group">
                           <label class="mb-8">Subject</label>
                           <input type="text" class="form-control" placeholder="Ticket Receipt #L-540.38 from Phone Surgery Reading">
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12 mb-16">
                        <div class="form-group mb-16">
                           <label class="mb-8">Notes</label>
                           <textarea class="form-control"  ></textarea>
                        </div>
                        <div class="form-check -32 d-flex">
                           <input class="form-check-input mr-8" type="checkbox" value="" id="send-copy" >
                           <label class="form-check-label" for="send-copy">
                           Send A copy to gaurang@evincedev.com
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     Send</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End -->
      <!-- Payment checkout  -->
      <div class="modal fade" id="Createcheckout" tabindex="-1" role="dialog" aria-labelledby="Createcheckout" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Confirm Access Pin</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 mb-16">
                        <div class="form-group">
                           <label class="mb-8 w-100">User Name </label>
                           <select class="form-control w-100" data-placeholder="Select">
                              <option>Gaurang</option>
                              <option>Gurps</option>
                              <option>Saijad</option>
                              <option>Sunny</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12 mb-16">
                        <div class="form-group">
                           <label class="mb-8">Accesspin</label>
                           <input type="text" class="form-control" placeholder="Login Pin" >
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn" data-toggle="modal" data-target="#Createcheckout-payment">
                     <i data-feather="upload-cloud"></i>Save
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Payment Modal -->
      <div class="modal fade" id="Createcheckout-payment" tabindex="-1" role="dialog" aria-labelledby="Createcheckout-paymentTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalLongTitle">Payment</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body payment-modal text-center scroll-primary">
                  <h5 class="mb-24">£100.00</h5>
                  <ul class="total-detail d-flex justify-content-center ">
                     <li>
                        <p class="mb-0 text-xsm ">Total Paid</p>
                        <h6 class="mb-0 txt-sucess">£80.00</h6>
                     </li>
                     <li>
                        <p class="mb-0 text-xsm ">Change Due</p>
                        <h6 class="mb-0 txt-secondary">£20.00</h6>
                     </li>
                  </ul>
                  <div class="cash-form mb-24">
                     <div class="d-flex justify-content-between">
                        <label class="text-md font-400">Cash</label>
                        <label class="text-md txt-secondary">£80.00</label>
                     </div>
                  </div>
                  <div class="modal-card">
                     <div class="row">
                        <div class="col-md-6 mb-14">
                           <label class="btn btn-secondary btn-md price-label">Full Payment</label>
                        </div>
                        <div class="col-md-3 mb-14">
                           <label class="btn btn-outline-primary btn-md price-label">£1000.00</label>
                        </div>
                        <div class="col-md-3 mb-14">
                           <label class="btn btn-outline-primary btn-md price-label">£500.00</label>
                        </div>
                        <div class="col-md-3 mb-14">
                           <label class="btn btn-outline-primary btn-md price-label">£200.00</label>
                        </div>
                        <div class="col-md-3 mb-14">
                           <label class="btn btn-outline-primary btn-md price-label">£100.00</label>
                        </div>
                        <div class="col-md-3 mb-14">
                           <label class="btn btn-outline-primary btn-md price-label">£20.00</label>
                        </div>
                        <div class="col-md-3 mb-14">
                           <label class="btn btn-outline-primary btn-md price-label">£10.00</label>
                        </div>
                     </div>
                  </div>
                  <div class="payment-card">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="payment-card-detail active-payment-detail"> <img src="assets/img/cash.png">
                              <label class="mt-8">Cash</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="payment-card-detail"> <img src="assets/img/credit.png">
                              <label class="mt-8">Credit</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="payment-card-detail"> <img src="assets/img/gift.png">
                              <label class="mt-8">Giftcard</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-btn">
                     <button class="btn btn-primary btn-lg">Pay With</button>
                     <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#Paymentsave">Check Out</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade in" id="Paymentsave" tabindex="-1" role="dialog" aria-labelledby="Paymentsave" aria-hidden="true" >
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Payment</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body action-modal">
                  <p class="link-secondary text-sm mb-0">You probably want to do one of the following </p>
                  <p><span class="link link-primary">Change Due:</span> £0.00</p>
                  <div class="devider-hr d-sm-block"></div>
                  <div class="row mt-1">
                     <div class="col-md-4 mb-24">
                        <a href="#" class="d-block">
                           <div class="box-card text-center">
                              <i data-feather="printer" class="d-block"></i>
                              <span>Print Invoice</span>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4 mb-24">
                        <a href="#" class="d-block">
                           <div class="box-card text-center" >
                              <i data-feather="book" class="d-block"></i>
                              <span>Print Service Receipt</span>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#Checkout-ViewPDF">
                           <i data-feather="printer" class="d-block"></i>
                           <span>Print Thermal Receipt</span>
                        </div>
                     </div>
                     <div class="col-md-4 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#Print-checkout-Labels">
                           <i data-feather="book" class="d-block"></i>
                           <span> Print  Label </span>
                        </div>
                     </div>
                     <div class="col-md-4 mb-24">
                        <div class="box-card text-center" data-toggle="modal" data-target="#Emailcheckout">
                           <i data-feather="mail" class="d-block"></i>
                           <span>Email Invoice</span>
                        </div>
                     </div>
                     <div class="col-md-4 mb-24">
                        <a href="#" class="d-block">
                           <div class="box-card text-center" data-toggle="modal" data-target="#view-ticket">
                              <i data-feather="eye" class="d-block"></i>
                              <span>View Ticket </span>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4 mb-24">
                        <a href="#" class="d-block">
                           <div class="box-card text-center" data-toggle="modal" data-target="#">
                              <i data-feather="eye" class="d-block"></i>
                              <span>View Invoice</span>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4 mb-24">
                        <div class="box-card text-center btn-secondary" data-dismiss="modal" aria-label="Close">
                           <i data-feather="plus-square" class="d-block"></i>
                           <span>New Sale </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade in" id="Checkout-ViewPDF" tabindex="-1" role="dialog" aria-labelledby="Checkout-ViewPDF" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">View PDF</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body text-center"></div>
            </div>
         </div>
      </div>
      <div class="modal fade in" id="Print-checkout-Labels" tabindex="-1" role="dialog" aria-labelledby="Print-checkout-Labels" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Print Ticket Labels</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body text-center">
                  <div class="form-check mb-16 d-flex">
                     <input class="form-check-input mr-8" type="checkbox" value="" id="amazon" checked="">
                     <label class="form-check-label" for="amazon">
                     <span class="link link-secondary"> Amazon Amazon Fire 7" (2015) </span>Audio Repair
                     <span class="link link-secondary">IMEI: (4545545544) </span>
                     </label>
                  </div>
                  <div class="form-check mb-16 d-flex">
                     <input class="form-check-input mr-8" type="checkbox" value="" id="amazon" checked="">
                     <label class="form-check-label" for="amazon">
                     <span class="link link-secondary"> Apple Iphone 11 </span>Audio Repair
                     <span class="link link-secondary">IMEI: (4545545544) </span>
                     </label>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     Print label</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade in" id="Emailcheckout" tabindex="-1" role="dialog" aria-labelledby="Emailcheckout" aria-hidden="true" >
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Email Invoice</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6 col-sm-6 mb-16">
                        <div class="form-group">
                           <label class="mb-8">To</label>
                           <input type="text" class="form-control" placeholder="bhavesh@evincedev.com">
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-6 mb-16">
                        <div class="form-group">
                           <label class="mb-8">Subject</label>
                           <input type="text" class="form-control" placeholder="Ticket Receipt #L-540.38 from Phone Surgery Reading">
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12 mb-16">
                        <div class="form-group mb-16">
                           <label class="mb-8">Notes</label>
                           <textarea class="form-control"  ></textarea>
                        </div>
                        <div class="form-check -32 d-flex">
                           <input class="form-check-input mr-8" type="checkbox" value="" id="send-copy" >
                           <label class="form-check-label" for="send-copy">
                           Send A copy to gaurang@evincedev.com
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     Send</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End -->
      <!-- Add reason -->
      <div class="modal fade in" id="Add-reason" tabindex="-1" role="dialog" aria-labelledby="Add-reason" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Discount Reason</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 mb-16">
                        <div class="form-group mb-16">
                           <textarea class="form-control"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- navigation -->
      <!-- View Tickit -->
      <div class="modal fade in" id="View-tickit" tabindex="-1" role="dialog" aria-labelledby="View-tickit" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered  modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Ticket History</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body">
                  <button class="btn btn-secondary btn-md d-flex align-items-center mr-16" data-bs-toggle="collapse" href="#SearchBytikit" role="button" aria-expanded="false" aria-controls="SearchBytikit">Search By Filters <i data-feather="chevron-down"></i></button>
                  <div class="collapse w-100" id="SearchBytikit">
                     <div class="card mt-24">
                        <div class="row">
                           <div class="col-md-3 mb-24">
                              <div class="form-group">
                                 <label class="mb-8">Customer</label>
                                 <input type="text" class="form-control" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-3 mb-24">
                              <div class="form-group">
                                 <label class="mb-8">Ticket ID </label>
                                 <input type="text" class="form-control" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-3 mb-24">
                              <div class="form-group">
                                 <label class="mb-8">Status </label>
                                 <select class="form-control" data-placeholder="">
                                    <option>Select</option>
                                    <option>Repaired</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3 mb-24">
                              <div class="form-group">
                                 <label class="mb-8">IMEI or Serial </label>
                                 <input type="text" class="form-control" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-3 mb-24">
                              <div class="form-group">
                                 <label class="mb-8">Created Date</label>
                                 <input type="date" class="form-control" placeholder="Select Date">
                              </div>
                           </div>
                           <div class="col-md-3 mb-24">
                              <div class="form-group">
                                 <label class="mb-8">Due Date</label>
                                 <input type="date" class="form-control" placeholder="Select Date">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="action-group">
                                    <a href="javascript:void(0)" class="btn btn-secondary btn flex-grow-1 mr-8">
                                    Search</a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn flex-grow-1 mr-16">
                                    Clear
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="responsive-table data-setting-table mt-4">
                     <table class="table table-striped center-form-check">
                        <thead>
                           <tr>
                              <th class="no-space">Ticket ID</th>
                              <th>Date</th>
                              <th>Customer Name</th>
                              <th>Contact #</th>
                              <th>Devices</th>
                              <th>Product</th>
                              <th>Status</th>
                              <th>Total</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>L-540.14</td>
                              <td>16 Feb, 2022</td>
                              <td>David Hampton</td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>7860559492</p>
                              </td>
                              <td>Pixel 3a XL</td>
                              <td>Pixel 3a XL Screen Replacement</td>
                              <td><span class="badge bg-secondary">In Progress</span></td>
                              <td>£159.99</td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-540.12</td>
                              <td>16 Feb, 2022  </td>
                              <td>Gaurang evince customer   </td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td>iphone 11 pro</td>
                              <td>iphone 11 pro Audio Repair</td>
                              <td><span class="badge bg-secondary">In Progress</span></td>
                              <td>£74.99  </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-540.10</td>
                              <td>10 Feb, 2022 </td>
                              <td></td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td>Iphone 11</td>
                              <td>
                                 <p class="mb-0">Iphone - Tesco</p>
                                 <p class="mb-0"><strong class="link-success">845631564894254  </strong></p>
                              </td>
                              <td><span class="badge bg-secondary">In Progress</span></td>
                              <td>£94.99 </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                           <tr>
                              <td>L-540.9</td>
                              <td>10 Feb, 2022 </td>
                              <td>Bhavesh Dhedhi   </td>
                              <td>
                                 <p class="mb-0"><strong class="blue">Phone:</strong></p>
                                 <p class="mb-0"><strong class="blue">Mob:</strong>+447961073110</p>
                              </td>
                              <td>Iphone 11</td>
                              <td>
                                 <p class="mb-0"> Iphone 11 Iphone / Ipad - Vodafone/Lebara iPhone SE 6+ 6S 6S+ 7 7+ 8 8+</p>
                                 <p class="mb-0">Audio Repair</p>
                                 <p class="mb-0">Iphone / Ipad - Vodafone/Lebara iPhone SE 6+ 6S 6S+ 7 7+ 8 8+</p>
                                 <p class="mb-0"><strong class="link-success">654256321614561</strong></p>
                                 <p class="mb-0"><strong class="link-success">34534345345</strong></p>
                                 <p class="mb-0"><strong class="link-success">654123745641846</strong></p>
                              </td>
                              <td><span class="badge bg-secondary">In Progress</span></td>
                              <td>£74.99  </td>
                              <td><button class="link link-primary">Open</button><button class="link link-secondary">Print</button></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     Save
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- navigation -->
      <!-- More Info-->
      <div class="modal fade" id="more-info" tabindex="-1" role="dialog" aria-labelledby="more-info" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">More Info</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body action-modal">
                  <div class="row">
                     <div class="col-md-12 ">
                        <h6 class="link link-secondary d-block">Iphone / Ipad - O2/Tesco/Giffgaff iPhone 3GS till 7+</h6>
                        <p class="mb-0"><strong class="link-primary">Manufacturer:</strong>Apple</p>
                        <p class="mb-0"><strong class="link-primary">IMEI:</strong>12345678945</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- More Info-->
      <div class="modal fade" id="more-info-product" tabindex="-1" role="dialog" aria-labelledby="more-info-product" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">More Info</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body action-modal">
                  <div class="row">
                     <div class="col-md-12 ">
                        <h6 class="link link-secondary d-block">(Acer Aspire 3 (A315-31-C514 A315-53-57WF A315-53-50Y7 A315-51-51SL))</h6>
                        <p class="mb-0">Test - Serialised Product</p>
                        <p class="mb-0"><strong class="link-primary">Category:</strong>Accessories</p>
                        <p class="mb-0"><strong class="link-primary">Manufacturer:</strong>Acer</p>
                        <p class="mb-0"><strong class="link-primary">SKU:</strong>Accessories</p>
                        <p class="mb-0"><strong class="link-primary">Physical location:</strong>Bin 1</p>
                        <p class="mb-0"><strong class="link-primary">Category:</strong>New</p>
                        <p class="mb-0"><strong class="link-primary">IMEI:</strong>544183009039329</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->

        <!-- More Info-->
      <div class="modal fade" id="more-info-trade" tabindex="-1" role="dialog" aria-labelledby="more-info-trade" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">More Info</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body action-modal">
                  <div class="row">
                     <div class="col-md-12 ">
                        <h6 class="link link-secondary d-block">Xiaomi Mi Note 10 - Trade in</h6>
                        
                        <p class="mb-0"><strong class="link-primary">Category:</strong></p>
                        <p class="mb-0"><strong class="link-primary">Manufacturer:</strong>Vodafone</p>
                        <p class="mb-0"><strong class="link-primary">SKU:</strong>SKU</p>                     
                        <p class="mb-0"><strong class="link-primary">IMEI:</strong>544183009039329</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->

           <!-- More Info-->
      <div class="modal fade" id="more-info-misc" tabindex="-1" role="dialog" aria-labelledby="more-info-misc" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">More Info</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body action-modal">
                  <div class="row">
                     <div class="col-md-12 ">
                        <h6 class="link link-secondary d-block">Insurance claim</h6>
                        
                        <p class="mb-0"><strong class="link-primary">Category:</strong></p>
                 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->




      <!-- More Info-->
      <div class="modal fade" id="edit-unlock" tabindex="-1" role="dialog" aria-labelledby="edit-unlock" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Update Unlock</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body action-modal">
                  <div class="row">
                     <div class="col-md-6 ">
                        <p class="mb-24"><strong class="link link-primary mr-8">Network:</strong>Iphone / Ipad - O2/Tesco/Giffgaff iPhone 3GS till 7+</p>
                        <div class="form-group mb-16">
                           <label class="mb-8">DeviceDevice </label>
                           <select class="form-control" data-placeholder="">
                              <option>Select Device</option>
                              <option></option>
                           </select>
                        </div>
                        <div class="form-group mb-16">
                           <label class="mb-8">IMEI</label>
                           <input type="text" class="form-control" placeholder="123456789123456">
                        </div>
                        <div class="form-check mb-24 email-check d-flex align-items-center">
                           <input class="form-check-input form-check-input-md mr-8" type="checkbox" value="" id="api-chk" >
                           <label class="form-check-label" for="api-chk"> Api</label>
                        </div>
                     </div>
                     <div class="col-md-6 ">
                        <p class="mb-8"><strong class="link link-primary mr-8">Delivery Time:</strong>3 - 7 Working Days</p>
                        <p class="mb-8"><strong class="link link-primary mr-8">Unit Retail Price:</strong>24.99</p>
                        <p class="mb-8"><strong class="link link-primary mr-8">Unit Cost Price:</strong>7.00</p>
                        <p class="mb-24"><strong class="link link-primary mr-8">Price: </strong>24.99</p>
                        <div class="form-group mb-16">
                           <label class="mb-8">Comments</label>
                           <textarea class="form-control"  ></textarea>
                        </div>
                        <p class="mb-8"><strong class="link link-primary mr-8">Description:</strong>Iphone / Ipad - O2</p>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     Add</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- Add Note-->
      <div class="modal fade" id="add-note-tick" tabindex="-1" role="dialog" aria-labelledby="add-note-tick" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Add Note</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-12 mb-16">
                        <div class="form-group">
                           <label class="mb-8"></label>
                           <textarea class="form-control"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="text-right mt-4 pt-2">
                     <button class="btn btn-secondary btn-xs save-btn">
                     <i data-feather="plus"></i>Add
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
      <!-- View Ticket Claim -->
      <!-- <div class="modal fade" id="view-onhand" tabindex="-1" role="dialog" aria-labelledby="view-onhand" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0">Test - Serialised Product - ON Hand Stock Information</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body view-ticket">
                  <div class="responsive-table data-setting-table ">
                     <table class="table table-striped  has-footer">
                        <thead>
                           <tr>
                              <th>Store</th>
                              <th>ID</th>
                              <th>Product Name  </th>
                              <th>SKU</th>
                              <th>On Hand </th>
                              <th>Stock Warning </th>
                              <th>Reorder Level </th>
                              <th>Required Quantity   </th>
                              <th>ON PO</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td> Phone Surgery Reading </td>
                              <td>60423</td>
                              <td>Test - Serialised Product</td>
                              <td>SKUTEST</td>
                              <td>10</td>
                              <td>0</td>
                              <td></td>
                              <td>0</td>
                              <td></td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <td colspan="4"><strong>Total</strong></td>
                              <td>10</td>
                              <td>--</td>
                              <td>--</td>
                              <td>0</td>
                              <td></td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <div class="modal fade" id="viewOnHandRepairPart" tabindex="-1" role="dialog" aria-labelledby="viewOnHandRepairPart" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xxlarge" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="mb-0 repair-part-onhand-stock-modal-title"></h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               </div>
               <div class="modal-body view-ticket">
                  <div class="responsive-table data-setting-table ">
                     <table class="table table-striped  has-footer">
                        <thead>
                           <tr>
                              <th>Store</th>
                              <th>ID</th>
                              <th>Product Name  </th>
                              <th>SKU</th>
                              <th>On Hand </th>
                              <th>Stock Warning </th>
                              <th>Reorder Level </th>
                              <th>Required Quantity   </th>
                              <th>ON PO</th>
                           </tr>
                        </thead>
                        <tbody class="on-hand-part-detail">

                        </tbody>
                        <tfoot>
                           <tr>
                              <td colspan="4"><strong>Total</strong></td>
                              <td class="on-hand-repair-part-total"></td>
                              <td>--</td>
                              <td>--</td>
                              <td class="on-hand-repair-part-required-qty"></td>
                              <td></td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End popup -->
<?php $this->endSection() ?>
<?php $this->section('vendor_specific_js') ?>
<script type="text/jscript" src="<?php echo base_url('assets/vendor/jqueryui/1.12.1/jquery-ui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/intl_tel_input/intlTelInput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/vendor/choosen/choosen-jquery.js'); ?>"></script>
<?php $this->endSection() ?>

<?php $this->section('page_specific_js') ?>
<script>
   var POS = function () {
      var handleCustomerAutoComplete = function () {
         // search customer
         $( "#search_customer" ).autocomplete({
            source: function( request, response ) {
               // Fetch data
               $.ajax({
                  url: "<?php echo base_url('pos/search-customers'); ?>",
                  type: 'get',
                  dataType: "json",
                  data: {
                     search: request.term
                  },
                  success: function( data ) {
                     response( data.customers );
                  }
               });
            },
            create: function () {
               $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                   return $('<li class="tt">')
                       .append('<div>')
                       .append('<img class="customer-search-img" src="' + item.img + '" />')
                       .append('<h6>'+ item.label+ '</h6>')
                       .append('<div class="customer-search-option-list"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class="email">' + item.email + '</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg><span>' + item.phone + '</span></div>')
                       .append('</div>')
                       .append('</li>')
                       .appendTo(ul);
               };
            },
            select: function (event, ui) {
               setCustomerInSession(ui.item.value);
               // Set selection
               $('#search_customer').val(ui.item.label); // display the selected text
               $('#selectuser_id').val(ui.item.value); // save selected id to input
               $(this).val('');
               return false;
            },
            focus: function(event, ui){
               $( "#search_customer" ).val( ui.item.label );
               $( "#selectuser_id" ).val( ui.item.value );
               return false;
            },
         });
      };
      var setCustomerInSession = function(customer_id){
         $.ajax({
            url: "<?php echo base_url('pos/set-pos-customer'); ?>",
            type: 'get',
            dataType: "json",
            data: {
               id: customer_id
            },
            success: function( response ) {
               if(response.success == 1){
                  $('.selected-customer h6').show().html('').html(response.customer.pos_selected_customer_name);
                  $('.selected-customer img').show().removeAttr('src').attr('src', response.customer.pos_selected_customer_image);
                  if(response.customer.pos_selected_customer_email){
                     $('.selected-customer .mail').show();
                     $('.selected-customer .email').html('').html(response.customer.pos_selected_customer_email);
                  }
                  if(response.customer.pos_selected_customer_phone){
                     $('.selected-customer .phone').show();
                     $('.selected-customer .phone-number').html('').html(response.customer.pos_selected_customer_phone);
                  }
                  $('.selected-customer .customer-history-btn').show();
                  $('.selected-customer .customer-edit-btn').show();
                  $('#posSelectedCustomer').val(response.customer.pos_selected_customer_id); 
               }
            }
         });
      };
      var handleCreateCustomer = function () {
         $('.new-customer-modal').on('click', function (e) {
            if($("#submitCustomer").hasClass("update-customer")){
               $("#submitCustomer").removeClass("update-customer").addClass("submit-customer");
            }else{
               $("#submitCustomer").addClass("submit-customer");
            }
            $.ajax({
               url: "<?php echo base_url('pos/new-customer'); ?>",
               type: 'get',
               dataType: "json",
               success: function(response) {
                  $('#new-customer').modal('show');
                  $(".customer-groups").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.customer_groups
                  });
                  $(".network-select").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.networks
                  });
                  $(".referral-sources").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.referral_sources
                  });
                  $(".country-select").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.countries
                  });
                  $(".tax-configuration-select").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.tax_configurations
                  });
                  BaseScript.handleIntlTelNumber('primary_phone_code','primary_phone');
                  BaseScript.handleIntlTelNumber('alternate_phone_code','alternate_phone');
                  if(response.custom_fields != ''){
                     for(var i = 0; i < response.custom_fields.length; i++){
                        if(response.custom_fields[i].status == '1'){
                           var is_required_label = (response.custom_fields[i].is_required == '1') ? '<sup>*<sup>': '';
                           var is_required = (response.custom_fields[i].is_required == '1') ? 'required': '';
                           var html = '';
                           html += '<div class="form-group mb-24"><label class="mb-8">'+ response.custom_fields[i].attribute_name + is_required_label + '</label><input type="hidden" name="attributes_id['+ response.custom_fields[i].id +'][attribute_id]" class="form-control" value="'+ response.custom_fields[i].id +'">';
                           if(response.custom_fields[i].attribute_type == 'dropdown'){
                              html += '<select name="attributes_id['+ response.custom_fields[i].id +'][attributes_name]" class="form-control" '+' '+ is_required +'  placeholder="'+ response.custom_fields[i].attribute_name+'">';
                              var attribute_value = new Array();
                              if(response.custom_fields[i].attribute_value != ''){
                                 attribute_value = response.custom_fields[i].attribute_value.split(',');
                                 $.each(attribute_value, function (key, val) {
                                    html += '<option value="'+ val +'">'+ val +'</option>';
                                 });
                              }
                              html += '</select></div>';
                           }else if(response.custom_fields[i].attribute_type == 'checkbox'){
                              var attribute_value = new Array();
                              if(response.custom_fields[i].attribute_value != ''){
                                 attribute_value = response.custom_fields[i].attribute_value.split(',');
                                 $.each(attribute_value, function (key, val) {
                                    html += '<br><font>'+ val + '</font><input type="checkbox" class=""'+ is_required +' '+'name="attributes_id['+ response.custom_fields[i].id + '][attributes_name]['+ val +']" value="'+ val +'"><div class="checkbox-error"></div></div>';
                                 });
                              }
                           }else{
                              var field_type = (response.custom_fields[i].attribute_type == 'calender') ? 'date' : 'text';
                              html += '<input type="'+ field_type +'" class="form-control "'+ is_required + ' ' + 'name="attributes_id['+ response.custom_fields[i].id +'][attributes_name]" value=""></div>';
                           }
                        }
                        $('.customer-custom-fields').append(html);
                     }
                  }
               }
            });
         });
      };
      var handleCustomerValidations = function(){
         $('.create-customer').validate({
            ignore : [],
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
               first_name: {
                  required: true,
                  maxlength:255,
                  minlength:2
               },
               last_name: {
                  required: true,
                  maxlength:255,
                  minlength:2
               },
               email:{
                  required: true,
                  emailcustom:true,
                  maxlength:50
               },
               primary_phone:{
                  digits:true,
                  intlTelNumber_primary_phone: true
               },
               alternate_phone:{
                  digits:true,
                  intlTelNumber_alternate_phone: true
               }
            },
            invalidHandler: function (event, validator) {
               $($('.create-customer')).show();
            },
            highlight: function (element) {
               $(element).closest('.form-group').addClass('has-error');
               if ($('.customer-form-tab-content').find(".tab-pane.active:has(div.has-error)").length == 0) {
                  if($('.customer-form-tab-content').find(".tab-pane:has(div.has-error)").length > 0) {
                        var current_active_tab_id = $("ul.customer-form-tab li.active").attr('id');
                        var current_active_tabpane_id = $("div.customer-form-tab-content div.tab-pane.active").attr('id');
                        var tabpane_id = $('.customer-form-tab-content').find(".tab-pane:has(div.has-error)").attr('id');
                        var tab_id = (tabpane_id == 'customerContact') ? 'customerContactTab':((tabpane_id == 'customerAddress') ? 'customerAddressTab':'customerCustomFieldsTab');
                     if(tab_id != current_active_tab_id){
                        //tabs
                        $('#'+tab_id).addClass('active');
                        $('#'+current_active_tab_id).removeClass('active');
                        //tab pane
                        $('#'+tabpane_id).addClass('active');
                        $('#'+current_active_tabpane_id).removeClass('active');
                     }
                  }
               }
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
      var handleSubmitCustomer = function(){
         $('#submitCustomer').click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            if (!form.valid()) {
              return;
            }
            var customer = '';
            if($(this).hasClass("submit-customer")){
               var url = '<?php echo base_url('pos/store-customer'); ?>';
            }
            if($(this).hasClass("update-customer")){
               var url = '<?php echo base_url('pos/update-customer'); ?>';
               customer = '<?php echo session()->get('pos_selected_customer_id'); ?>';
            }
            var formData = new FormData();
            formData.append('CSRFToken', $('.txt_csrfname').val());
            form.serializeArray().forEach(function (field) {
               if (field.value.trim() != '' || field.value.trim() != null) {
                  formData.append(field.name, field.value);
               }
            });
            $.ajax({
               url: url,
               type: 'post',
               dataType: "json",
               data: formData,
               processData: false,
               contentType: false,
               success: function(response){
                  if(response.validation_error == 1){
                     $.each(response.message, function (key, val){
                        $('.create-customer [name="'+ key +'"]').after(function() {
                           return '<label class="text-danger" for="'+ key +'">' + val + '</label>';
                        });
                        $('.create-customer [name="'+ key +'"]').closest('.form-group').addClass('has-error');
                        if ($('.customer-form-tab-content').find(".tab-pane.active:has(div.has-error)").length == 0) {
                           if($('.customer-form-tab-content').find(".tab-pane:has(div.has-error)").length > 0) {
                                 var current_active_tab_id = $("ul.customer-form-tab li.active").attr('id');
                                 var current_active_tabpane_id = $("div.customer-form-tab-content div.tab-pane.active").attr('id');
                                 var tabpane_id = $('.customer-form-tab-content').find(".tab-pane:has(div.has-error)").attr('id');
                                 var tab_id = (tabpane_id == 'customerContact') ? 'customerContactTab':((tabpane_id == 'customerAddress') ? 'customerAddressTab':'customerCustomFieldsTab');
                              if(tab_id != current_active_tab_id){
                                 $('#'+tab_id).addClass('active');
                                 $('#'+current_active_tab_id).removeClass('active');
                                 $('#'+tabpane_id).addClass('active');
                                 $('#'+current_active_tabpane_id).removeClass('active');
                              }
                           }
                        }
                     });
                  }
                  if(response.success == 1){
                     setCustomerInSession(response.customer);
                     $('#new-customer').modal('hide');
                     customerModalClose();
                  }
               }
            });
         });
      };
      var handleEditCustomer = function(){
         $("body").on('click','#customerEdit',function(){
            $('#new-customer').modal('show');
            if($("#submitCustomer").hasClass("submit-customer")){
               $("#submitCustomer").removeClass("submit-customer").addClass("update-customer");
            }else{
               $("#submitCustomer").addClass("update-customer");
            }
            $.ajax({
               url: "<?php echo base_url('pos/edit-customer'); ?>",
               type: 'post',
               dataType: "json",
               data:{CSRFToken:$('.txt_csrfname').val()},
               success: function(response) {
                  $(".customer-groups").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.customer_groups
                  });
                  $(".network-select").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.networks
                  });
                  $(".referral-sources").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.referral_sources
                  });
                  $(".country-select").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.countries
                  });
                  $(".tax-configuration-select").select2({
                     dropdownParent: $("#new-customer .modal-content"),
                     data: response.tax_configurations
                  });
                  if(response.edit_customer != ''){
                     $('.create-customer [name="first_name"]').val(response.edit_customer.first_name);
                     $('.create-customer [name="last_name"]').val(response.edit_customer.last_name);
                     $('.create-customer [name="email"]').val(response.edit_customer.email);
                     $('.create-customer [name="organization"]').val(response.edit_customer.organization);
                     $('.create-customer [name="contact_person"]').val(response.edit_customer.contact_person);
                     $('.create-customer [name="primary_phone"]').val(response.edit_customer.primary_phone);
                     $('.create-customer [name="alternate_phone"]').val(response.edit_customer.alternate_phone);
                     if(response.edit_customer.compliance_with_gdpr == 1){
                        $('.create-customer [name="compliance_with_gdpr"]').prop('checked',true);
                     }
                     $('.create-customer [name="email_notifications"]').prop('checked',(response.edit_customer.email_notifications == 1) ? true : false);
                     if(response.edit_customer.network_id != ''){
                        $(".network-select").val(response.edit_customer.network_id).trigger('change');
                     }
                     if(response.edit_customer.referral_source_id != ''){
                        $(".referral-sources").val(response.edit_customer.referral_source_id).trigger('change');
                     }
                     if(response.edit_customer.tax_class_id != ''){
                        $(".tax-configuration-select").val(response.edit_customer.tax_class_id).trigger('change');
                     }
                     if(response.edit_customer.customer_group_id != ''){
                        $(".customer-groups").val(response.edit_customer.customer_group_id).trigger('change');
                     }
                     BaseScript.handleIntlTelNumber('primary_phone_code','primary_phone',(response.primary_phone_code != '') ? response.primary_phone_code : '');
                     BaseScript.handleIntlTelNumber('alternate_phone_code','alternate_phone',(response.alternate_phone_code != '') ? response.alternate_phone_code : '');
                  }
                  if(response.customer_address != ''){
                     if(response.customer_address.country_id != ''){
                        $(".country-select").val(response.customer_address.country_id).trigger('change');
                     }
                     if(response.customer_address.address1 != ''){
                        $('.create-customer [name="street_address"]').val(response.customer_address.address1);
                     }
                     if(response.customer_address.address2 != ''){
                        $('.create-customer [name="address2"]').val(response.customer_address.address2);
                     }
                     if(response.customer_address.city != ''){
                        $('.create-customer [name="city"]').val(response.customer_address.city);
                     }
                     if(response.customer_address.state != ''){
                        $('.create-customer [name="state"]').val(response.customer_address.state);
                     }
                     if(response.customer_address.postcode != ''){
                        $('.create-customer [name="postcode"]').val(response.customer_address.postcode);
                     }
                  }
                  if(response.custom_fields != ''){
                     for(var i = 0; i < response.custom_fields.length; i++){
                        if(response.custom_fields[i].status == '1'){
                           var is_required_label = (response.custom_fields[i].is_required == '1') ? '<sup>*<sup>': '';
                           var is_required = (response.custom_fields[i].is_required == '1') ? 'required': '';
                           var html = '';
                           html += '<div class="form-group mb-24"><label class="mb-8">'+ response.custom_fields[i].attribute_name + is_required_label + '</label><input type="hidden" name="attributes_id['+ response.custom_fields[i].id +'][attribute_id]" class="form-control" value="'+ response.custom_fields[i].id +'">';
                           if(response.custom_fields[i].attribute_type == 'dropdown'){
                              html += '<select name="attributes_id['+ response.custom_fields[i].id +'][attributes_name]" class="form-control" '+' '+ is_required +'  placeholder="'+ response.custom_fields[i].attribute_name+'">';
                              var attribute_value = new Array();
                              if(response.custom_fields[i].attribute_value != ''){
                                 attribute_value = response.custom_fields[i].attribute_value.split(',');
                                 $.each(attribute_value, function (key, val) {
                                    var selected = (response.edit_customer_custom_fields[response.custom_fields[i].id] != '' && val == response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name) ? 'selected' : '';
                                    html += '<option value="'+ val +'" '+ selected +'>'+ val +'</option>';
                                 });
                              }
                              html += '</select></div>';
                           }else if(response.custom_fields[i].attribute_type == 'checkbox'){
                              var attribute_value = new Array();
                              if(response.custom_fields[i].attribute_value != ''){
                                 attribute_value = response.custom_fields[i].attribute_value.split(',');
                                 // console.log(response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name);
                                 var result = [];
                                 for(var j in response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name){
                                    result.push([j, response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name [j]]);
                                 }
                                 $.each(attribute_value, function (key, val) {
                                    /*var checked = (response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name != '' && attribute_value.includes(response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name) ) ? 'checked' : '';*/
                                    // var checked = (response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name != '' && response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name == val ) ? 'checked' : '';
                                    var checked = (response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name != '' && BaseScript.inArray(response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name,attribute_value) ) ? 'checked' : '';
                                    html += '<br><font>'+ val + '</font><input type="checkbox" class=""'+ is_required +' '+'name="attributes_id['+ response.custom_fields[i].id + '][attributes_name]['+ val +']" value="'+ val +'" '+ checked +'><div class="checkbox-error"></div></div>';
                                 });
                              }
                           }else{
                              var field_type = (response.custom_fields[i].attribute_type == 'calender') ? 'date' : 'text';
                              var customer_edit_val = (response.edit_customer_custom_fields[response.custom_fields[i].id] != '' && response.custom_fields[i].id == response.edit_customer_custom_fields[response.custom_fields[i].id].attribute_id) ? response.edit_customer_custom_fields[response.custom_fields[i].id].attributes_name : '' ;
                              html += '<input type="'+ field_type +'" class="form-control "'+ is_required + ' ' + 'name="attributes_id['+ response.custom_fields[i].id +'][attributes_name]" value="'+customer_edit_val+'"></div>';
                           }
                        }
                        $('.customer-custom-fields').append(html);
                     }
                  }
               }
            });
         });
      };
      var customerModalClose = function () {
         $("#new-customer .close").click(function(e){
            $('#new-customer').modal('hide');
         });
         $('#new-customer').on('hidden.bs.modal', function () {
            $('.create-customer').validate().resetForm();
            $('.create-customer').trigger("reset");
            $('.customer-custom-fields').html('');
         });
      };
      var handleManufacturerValidations = function(){
         $('.create-manufacturer').validate({
            ignore : [],
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
               name: {
                  required: true,
                  maxlength:255,
                  minlength:2
               }
            },
            invalidHandler: function (event, validator) {
               $($('.create-manufacturer')).show();
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
      var handleAddManufecturer = function(){
         $(".save-manufacturer").click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            if (!form.valid()) {
              return;
            }
            if($(this).hasClass("save-manufacturer")){
               var url = '<?php echo base_url('pos/add-manufacturer'); ?>';
            }
            if($(this).hasClass("update-manufacturer")){
               var url = '<?php echo base_url('pos/update-manufacturer'); ?>';
            }
            var formData = new FormData();
            formData.append('CSRFToken', $('.txt_csrfname').val());
            formData.append('parent_store_id', '<?php echo session()->get('parent_store_id') ?>');
            form.serializeArray().forEach(function (field) {
               if (field.value.trim() != '' || field.value.trim() != null) {
                  formData.append(field.name, field.value);
               }
            });
            $.ajax({
               url: url,
               type: 'post',
               dataType: "json",
               data: formData,
               processData: false,
               contentType: false,
               success: function( response ){
                  if(response.create == 1){
                     if(response.success == 1){
                        var manufecturer_name = $('.create-manufacturer [name="name"]').val();
                        var manufecturer_img = '<?php echo UPLOAD_IMG_PLACEHOLDER ?>';
                        $('#add-manufacturer-modal .close').trigger('click');
                        manufacturerModalClose();
                        var html = '';
                        var key = response.id;
                        html += '<div class="col-md-2 mb-16 vertical-box-5 has-dropbar"><div class="box-card align-items-center category-card reapir_manufecturer manufecturer-div"><figure> <img src="'+manufecturer_img+'" /> </figure><h6 class="heading-xsm">'+manufecturer_name+'</h6></div><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary manufacturer-edit" data-key="'+response.id+'" data-toggle="modal" data-target="#add-manufacturer-modal"> Edit </a><a href="#" class="link link-secondary manufacturer-disable" data-key="'+response.id+'" data-toggle="modal" data-target="#disable"> Disable</a></div></div></div>';
                        // $('.repair-manufacturer-row').append(html);
                        $('.repair-category-add-manufacturer').after(html);
                        /*var html_1 = '';
                        html_1 += '<div class="col-md-2 mb-16 vertical-box-5 has-dropbar"><div class="box-card align-items-center category-card manufecturer-div"><figure> <img src="'+manufecturer_img+'" /> </figure><h6 class="heading-xsm">'+manufecturer_name+'</h6></div><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary" data-key="'+response.id+'" data-toggle="modal" data-target="#add-manufacturer-modal"> Edit </a><a href="#" class="link link-secondary" data-key="'+response.id+'" data-toggle="modal" data-target="#disable"> Disable</a></div></div></div>';
                        $('.device-manufacturer-row').append(html_1);*/
                     }
                  }
                  if(response.update == 1){
                     if(response.success == 1){
                        $(".manufacturer-edit").map(function () {
                           if($(this).data('key') == formData.get('id')){
                              console.log($(this).parent().parent().prev('.manufecturer-div'));
                              $(this).parent().parent().prev('.manufecturer-div').find('h6').html('').html(formData.get('name'));
                           }
                        });
                        $('#add-manufacturer-modal .close').trigger('click');
                        manufacturerModalClose();
                     }
                  }
               }
            });
         });
      };
      var handleEditManufacturer = function(){
         $("body").on('click','.manufacturer-edit',function(){
            if($("#saveManufacturer").hasClass("save-manufacturer")){
               $("#saveManufacturer").removeClass("save-manufacturer").addClass("update-manufacturer");
            }else{
               $("#saveManufacturer").addClass("update-manufacturer");
            }
            var id = $(this).attr('data-key');
            $.ajax({
               url: "<?php echo base_url('pos/edit-manufacturer'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:id,
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  if(response.manufacturer != ''){
                     $('.manufacturer-modal-title').html('').html('Update ' + response.manufacturer.name);
                     $('.create-manufacturer [name="id"]').val(response.manufacturer.id);
                     $('.create-manufacturer [name="name"]').val(response.manufacturer.name);
                  }
               }
            });
         });
      };
      var handleDisableManufacturer = function(){
         $("body").on('click','.manufacturer-disable',function(){
            var btn = $(this);
            bootbox.confirm({
               message: "<?php echo lang('PageText.disable_msg') ?>",
               buttons: {
                  confirm: {
                     label: "<?php echo lang('Buttons.ok') ?>",
                  },
                  cancel: {
                     label: "<?php echo lang('Buttons.cancel') ?>",
                  }
               },
               callback: function (deleteConfirm) {
                  if (deleteConfirm) {
                     var id = btn.attr('data-key');
                     console.log(id);
                     $.ajax({
                        url: "<?php echo base_url('pos/disable-manufacturer'); ?>",
                        type: 'post',
                        dataType: "json",
                        data:{id:id,CSRFToken:$('.txt_csrfname').val()},
                        success: function(response) {
                           if(response.success == 1){
                              $(".manufacturer-disable").map(function () {
                                 if($(this).data('key') == id){
                                    $(this).parent().parent().parent().remove();
                                 }
                              });
                           }
                        }
                     });
                  }
               }
            });
         });
      };
      var manufacturerModalClose = function () {
         $('#add-manufacturer-modal').on('hidden.bs.modal', function () {
            $('.create-manufacturer').validate().resetForm();
            $('.create-manufacturer').trigger("reset");
         });
      };
      var handleRepairSteps = function(){
         $('body').on('click', '.repair_category', function() {
            if($('.repair-step-category-id').val() != '' || $('.repair-step-category-id').val() != undefined){
               if($('.repair-step-category-id').val() !=  $(this).attr('data-key')){
                  $('.repair-step-category-id').val($(this).attr('data-key'));
                  $('.repair-step-manufecturer-id').val('');
                  $('.repair-step-device-id').val('');
               }
            }else{
               $('.repair-step-category-id').val($(this).attr('data-key'));
            }
            if($(this).attr('data-labor') == 1){
               $('.is_from_labor_category').val(1);
               $('.repair-category-device-issues-row .repair-category-add-device-issue').nextAll().remove();
               $.ajax({
                  url: "<?php echo base_url('pos/get-repair-product-list-for-labor-category'); ?>",
                  type: 'post',
                  dataType: "json",
                  data:{
                     id:$(this).attr('data-key'),
                     parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                     store_id:'<?php echo session()->get('store_id') ?>',
                     CSRFToken:$('.txt_csrfname').val()
                  },
                  success: function(response) {
                     console.log(response);
                     var html = '';
                     if(response.repair_products != '' || response.repair_products != null){
                        for(var i = 0; i < response.repair_products.length; i++){
                           html += '<div class="col-md-4 mb-16 has-dropbar"><label for="problem_checkbox_'+response.repair_products[i].id+'" class="d-block label-chk"><div class="box-card d-flex checkbox-card repair-device-issue-div"><div class="checkbox"><div class="form-check"><input class="form-check-input is-valid form-check-input-md form-check-input-problem" type="checkbox" value="" id="problem_checkbox_'+response.repair_products[i].id+'" data-key="'+response.repair_products[i].id+'"/></div></div><div class="box-detail"><h6 class="heading-xsm mb-6">'+response.repair_products[i].name+'</h6><p class="m-0">Repair time : '+response.repair_products[i].average_job_time+'</p><div class="price-box heading-sm"> '+response.repair_products[i].retail_price+' </div></div></div></label><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary repair-device-edit-issue" data-toggle="modal" data-target="#newRepairDeviceIssue" data-key="'+response.repair_products[i].id+'"> Edit </a><a href="#" class="link link-secondary repair-device-disable-issue" data-toggle="modal" data-target="#disable" data-key="'+response.repair_products[i].id+'"> Disable</a></div></div></div>';
                        }
                     }
                     $('.repair-category-device-issues-row .repair-category-add-device-issue').after(html);
                  }
               });
               // $('#repair_manufecturer_link').prop('disabled', true);
               // $('#repair_device_link').prop('disabled', true);
               openRepairStep(4);
               return;
            }else{
               $('.is_from_labor_category').val(0);
               // $('#repair_manufecturer_link').prop('disabled', false);
               // $('#repair_device_link').prop('disabled', false);
            }
            $('.create-manufacturer [name="repair_device_category"]').val($(this).attr('data-key'));
            $.ajax({
               url: "<?php echo base_url('pos/get-manufacturer-list'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:$(this).attr('data-key'),
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  console.log(response.manufacturers);
                  var html = '';
                  if(response.manufacturers != '' || response.manufacturers != null){
                     for(var i = 0; i < response.manufacturers.length; i++){
                        var img_path = '<?php echo base_url("uploads") ?>';
                        html += '<div class="col-md-2 mb-16 vertical-box-5 has-dropbar"><div class="box-card align-items-center category-card reapir_manufecturer manufecturer-div" data-key="'+response.manufacturers[i].id+'"><figure> <img src="'+img_path+'/'+response.manufacturers[i].picture+'" /> </figure><h6 class="heading-xsm">'+response.manufacturers[i].name+'</h6></div><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary manufacturer-edit" data-key="'+response.manufacturers[i].id+'" data-toggle="modal" data-target="#add-manufacturer-modal"> Edit </a><a href="#" class="link link-secondary manufacturer-disable" data-key="'+response.manufacturers[i].id+'" data-toggle="modal" data-target="#disable"> Disable</a></div></div></div>';
                     }
                  }
                  $('.repair-category-manufacturer-row .repair-category-add-manufacturer').nextAll().remove();
                  $('.repair-category-manufacturer-row .repair-category-add-manufacturer').after(html);
               }
            });
            openRepairStep(2);
         });
         $('body').on('click', '.reapir_manufecturer', function() {
            $('.repair-step-manufecturer-id').val($(this).attr('data-key'));
            $.ajax({
               url: "<?php echo base_url('pos/get-device-list'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:$(this).attr('data-key'),
                  category_id:$('.repair-step-category-id').val(),
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  console.log(response.devices);
                  /*var html = '<div class="col-md-2 mb-16 vertical-box-5 has-dropbar"><div class="add-new-card new-repair-device"><div class="plus-icon text-center"><i data-feather="plus"></i><h6 class="heading-sm">Add Device</h6></div></div></div>';*/
                  var html = '';
                  if(response.devices != '' || response.devices != null){
                     for(var i = 0; i < response.devices.length; i++){
                        var img_path = '<?php echo base_url("uploads") ?>';
                        html += '<div class="col-md-2 mb-16 vertical-box-5 has-dropbar"><div class="box-card align-items-center category-card reapir_device repair-device-div" data-key="'+response.devices[i].id+'"><figure> <img src="'+img_path+'/'+response.devices[i].picture+'" /> </figure><h6 class="heading-xsm">'+response.devices[i].device_name+'</h6></div><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i></a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary repair-device-edit" data-toggle="modal" data-target="#newRepairDevice" data-key="'+response.devices[i].id+'"> Edit </a><a href="#" class="link link-secondary repair-device-disable" data-toggle="modal" data-target="#disable" data-key="'+response.devices[i].id+'"> Disable</a></div></div></div>';
                     }
                  }
                  $('.repair-category-device-row .repair-category-add-device').nextAll().remove();
                  $('.repair-category-device-row .repair-category-add-device').after(html);
               }
            });
            console.log("Step 3");
            openRepairStep(3);
         });

         $('body').on('click', '.reapir_device', function() {
            $('.repair-step-device-id').val($(this).attr('data-key'));
            $.ajax({
               url: "<?php echo base_url('pos/get-repair-product-list'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:$(this).attr('data-key'),
                  category_id:$('.repair-step-category-id').val(),
                  manufacturer_id:$('.repair-step-manufecturer-id').val(),
                  parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                  store_id:'<?php echo session()->get('store_id') ?>',
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  var html = '';
                  if(response.repair_products != '' || response.repair_products != null){
                     for(var i = 0; i < response.repair_products.length; i++){
                        html += '<div class="col-md-4 mb-16 has-dropbar"><label for="problem_checkbox_'+response.repair_products[i].id+'" class="d-block label-chk"><div class="box-card d-flex checkbox-card repair-device-issue-div"><div class="checkbox"><div class="form-check"><input class="form-check-input is-valid form-check-input-md form-check-input-problem" type="checkbox" value="" id="problem_checkbox_'+response.repair_products[i].id+'" data-key="'+response.repair_products[i].id+'"/></div></div><div class="box-detail"><h6 class="heading-xsm mb-6">'+response.repair_products[i].name+'</h6><p class="m-0">Repair time : '+response.repair_products[i].average_job_time+'</p><div class="price-box heading-sm"> '+response.repair_products[i].retail_price+' </div></div></div></label><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary repair-device-edit-issue" data-toggle="modal" data-target="#newRepairDeviceIssue" data-key="'+response.repair_products[i].id+'"> Edit </a><a href="#" class="link link-secondary repair-device-disable-issue" data-toggle="modal" data-target="#disable" data-key="'+response.repair_products[i].id+'"> Disable</a></div></div></div>';
                     }
                  }
                  $('.repair-category-device-issues-row .repair-category-add-device-issue').nextAll().remove();
                  $('.repair-category-device-issues-row .repair-category-add-device-issue').after(html);
               }
            });
            openRepairStep(4);
         });
      };
      var handleUnlockingOptionChange = function(){
         $('body').on('change', '.unlock-select2', function() {
            $.ajax({
               url: "<?php echo base_url('pos/get-unlocking-info'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:$(this).val(),
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  console.log(response);
                  $('.unlocking-delivery-time').html('').html(response.unlocking_info.delivery_time);
                  $('.unlocking-description').html('').html(response.unlocking_info.description);
                  $('.unlocking-price').val('').val(response.unlocking_info.retail_price);
                  $('.unlocking-cost-price').html('').html(response.unlocking_info.unit_cost);
               }
            });
         });
      };
      var handleMiscellaneousProductValidations = function(){
         $('.create-miscellaneous-product').validate({
            ignore : [],
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
               miscellaneous_product_name: {
                  required: true,
                  maxlength:255,
                  minlength:2
               }
            },
            invalidHandler: function (event, validator) {
               $($('.create-miscellaneous-product')).show();
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
      var handleCreateMiscellaneousProduct = function(){
         $('body').on('click', '.new-miscellaneous-product' ,function (e) {
            if($("#submitMiscellaneousProduct").hasClass("update-miscellaneous-product")){
               $("#submitMiscellaneousProduct").removeClass("update-miscellaneous-product").addClass("submit-miscellaneous-product");
            }else{
               $("#submitMiscellaneousProduct").addClass("submit-miscellaneous-product");
            }
            $.ajax({
               url: "<?php echo base_url('pos/new-miscellaneous-product'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  $(".miscellaneous-product-tax-configuration").select2({
                     dropdownParent: $("#newMiscellaneousProduct .modal-content"),
                     data: response.tax_configurations
                  });
                  $('#newMiscellaneousProduct').modal('show');
               }
            });
         });
      };
      var handleSubmitMiscellaneousProduct = function(){
         $('#submitMiscellaneousProduct').click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            if (!form.valid()) {
              return;
            }
            if($(this).hasClass("submit-miscellaneous-product")){
               var url = '<?php echo base_url('pos/store-miscellaneous-product'); ?>';
            }
            if($(this).hasClass("update-miscellaneous-product")){
               var url = '<?php echo base_url('pos/update-miscellaneous-product'); ?>';
            }
            var formData = new FormData();
            formData.append('CSRFToken', $('.txt_csrfname').val());
            formData.append('parent_store_id', '<?php echo session()->get('parent_store_id') ?>');
            formData.append('store_id', '<?php echo session()->get('store_id') ?>');
            form.serializeArray().forEach(function (field) {
               if (field.value.trim() != '' || field.value.trim() != null) {
                  formData.append(field.name, field.value);
               }
            });
            $.ajax({
               url: url,
               type: 'post',
               dataType: "json",
               data: formData,
               processData: false,
               contentType: false,
               success: function(response){
                  if(response.validation_error == 1){
                     $.each(response.message, function (key, val){
                        $('.create-miscellaneous-product [name="'+ key +'"]').after(function() {
                           return '<label class="text-danger" for="'+ key +'">' + val + '</label>';
                        });
                        $('.create-miscellaneous-product [name="'+ key +'"]').closest('.form-group').addClass('has-error');
                     });
                  }
                  if(response.success == 1){
                     $("#Miscellaneous").load(location.href+" #Miscellaneous>*","");
                     $('#newMiscellaneousProduct .close').trigger('click');
                     miscellaneousProductModalClose();
                  }
               }
            });
         });
      };
      var miscellaneousProductModalClose = function () {
         $("#newMiscellaneousProduct .close").click(function(e){
            $('#newMiscellaneousProduct').modal('hide');
         });
         $('#newMiscellaneousProduct').on('hidden.bs.modal', function () {
            $('.create-miscellaneous-product').validate().resetForm();
            $('.create-miscellaneous-product').trigger("reset");
         });
      };
      var handleMiscellaneousProductSearch = function () {
         $("body").on("keyup",".miscellaneous-product-search",function() {
            var value = $(this).val().toLowerCase();
            $(".miscellaneous-product-div > .miscellaneous-product").filter(function(){
               $(this).toggle($(this).find('.heading-xsm').text().toLowerCase().indexOf(value) > -1)
            });
         });
      };
      var handleUnlockingPriceToggle = function () {
         $("body").on("click",".unlocking-toggle-price",function() {
            if($(this).hasClass('show-price') && $(".unlock-select2").val() != '')
            {
               $(this).addClass('hide-price').removeClass('show-price');
               $(this).html('').html('Hide Price');
               $('.unlocking-cost-price').show();
            }else{
               $(this).addClass('show-price').removeClass('hide-price');
               $(this).html('').html('Show Cost Price ?');
               $('.unlocking-cost-price').hide();
            }            
         });
      };
      var handleDisableMiscellaneousProduct = function(){
         $("body").on('click','.miscellaneous-product-disable',function(){
            var btn = $(this);
            bootbox.confirm({
               message: "<?php echo lang('PageText.disable_msg') ?>",
               buttons: {
                  confirm: {
                     label: "<?php echo lang('Buttons.ok') ?>",
                  },
                  cancel: {
                     label: "<?php echo lang('Buttons.cancel') ?>",
                  }
               },
               callback: function (deleteConfirm) {
                  if (deleteConfirm) {
                     var id = btn.attr('data-key');
                     console.log(id);
                     $.ajax({
                        url: "<?php echo base_url('pos/disable-miscellaneous-product'); ?>",
                        type: 'post',
                        dataType: "json",
                        data:{id:id,CSRFToken:$('.txt_csrfname').val()},
                        success: function(response) {
                           if(response.success == 1){
                              $(".miscellaneous-product-disable").map(function () {
                                 if($(this).data('key') == id){
                                    console.log("success");
                                    $(this).parent().parent().parent().remove();
                                 }
                              });
                           }
                        }
                     });
                  }
               }
            });
         });
      };
      var handleEditMiscellaneousProduct = function(){
         $("body").on('click','.miscellaneous-product-edit',function(){
            if($("#submitMiscellaneousProduct").hasClass("submit-miscellaneous-product")){
               $("#submitMiscellaneousProduct").removeClass("submit-miscellaneous-product").addClass("update-miscellaneous-product");
            }else{
               $("#submitMiscellaneousProduct").addClass("update-miscellaneous-product");
            }
            var id = $(this).attr('data-key');
            $.ajax({
               url: "<?php echo base_url('pos/edit-miscellaneous-product'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:id,
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  console.log(response);
                  $(".miscellaneous-product-tax-configuration").select2({
                     dropdownParent: $("#newMiscellaneousProduct .modal-content"),
                     data: response.tax_configurations
                  });
                  if(response.miscellaneous_product != '' && response.miscellaneous_product != null){
                     if(response.miscellaneous_product.tax_class_id != ''){
                        $(".miscellaneous-product-tax-configuration").val(response.miscellaneous_product.tax_class_id).trigger('change');
                     }
                     $('.create-miscellaneous-product [name="show_on_pos"]').prop('checked',(response.miscellaneous_product.show_on_pos == 1) ? true : false);
                     $('.create-miscellaneous-product [name="tax_inclusive"]').prop('checked',(response.miscellaneous_product.tax_inclusive == 1) ? true : false);
                     $('.create-miscellaneous-product [name="miscellaneous_product_name"]').val(response.miscellaneous_product.name);
                     $('.create-miscellaneous-product [name="description"]').val(response.miscellaneous_product.description);
                     $('.create-miscellaneous-product [name="retail_price"]').val(response.miscellaneous_product.retail_price);
                     $('.create-miscellaneous-product [name="cost_price"]').val(response.miscellaneous_product.unit_cost);
                     $('.create-miscellaneous-product .miscellaneous-product-id').html('').html(response.miscellaneous_product.product_id);
                     $('.create-miscellaneous-product .miscellaneous-product-title').html('').html('Update Product');
                     $('.create-miscellaneous-product [name="product_id"]').val(response.miscellaneous_product.product_id);
                     $('.create-miscellaneous-product [name="product_price_id"]').val(response.miscellaneous_product.product_price_id);
                  }
               }
            });
         });
      };
      var handleCreateUnlockingProduct = function(){
         $('body').on('click', '.new-unlocking-product' ,function (e) {
            $.ajax({
               url: "<?php echo base_url('pos/new-unlocking-product'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  $(".unlocking-product-tax-configuration").select2({
                     dropdownParent: $("#newUnlockingProduct .modal-content"),
                     data: response.tax_configurations
                  });
                  $(".unlocking-product-manufacturers").select2({
                     allowClear: true,
                     dropdownParent: $("#newUnlockingProduct .modal-content"),
                     data: response.manufacturers
                  });
                  $('#newUnlockingProduct').modal('show');
               }
            });
         });
      };
      var handleUnlockingProductValidations = function(){
         $('.create-unlocking-product').validate({
            ignore : [],
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
               unlocking_product_name: {
                  required: true,
                  maxlength:255,
                  minlength:2
               }
            },
            invalidHandler: function (event, validator) {
               $($('.create-unlocking-product')).show();
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
      var handleSubmitUnlockingProduct = function(){
         $('#submitUnlockingProduct').click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            if (!form.valid()) {
              return;
            }
            var formData = new FormData();
            formData.append('CSRFToken', $('.txt_csrfname').val());
            formData.append('parent_store_id', '<?php echo session()->get('parent_store_id') ?>');
            formData.append('store_id', '<?php echo session()->get('store_id') ?>');
            form.serializeArray().forEach(function (field) {
               if (field.value.trim() != '' || field.value.trim() != null) {
                  formData.append(field.name, field.value);
               }
            });
            $.ajax({
               url: '<?php echo base_url('pos/store-unlocking-product'); ?>',
               type: 'post',
               dataType: "json",
               data: formData,
               processData: false,
               contentType: false,
               success: function(response){
                  if(response.validation_error == 1){
                     $.each(response.message, function (key, val){
                        $('.create-unlocking-product [name="'+ key +'"]').after(function() {
                           return '<label class="text-danger" for="'+ key +'">' + val + '</label>';
                        });
                        $('.create-unlocking-product [name="'+ key +'"]').closest('.form-group').addClass('has-error');
                     });
                  }
                  if(response.success == 1){
                     $('#newUnlockingProduct .close').trigger('click');
                     unlockingProductModalClose();
                     if(response.show_on_pos == 'on'){
                        var newOption = new Option(response.name, response.id, true, true);
                         $('.unlock-select2').append(newOption).trigger('change');
                     }
                  }
               }
            });
         });
      };
      var unlockingProductModalClose = function () {
         $("#newUnlockingProduct .close").click(function(e){
            $('#newUnlockingProduct').modal('hide');
         });
         $('#newUnlockingProduct').on('hidden.bs.modal', function () {
            $('.create-unlocking-product').validate().resetForm();
            $('.create-unlocking-product').trigger("reset");
         });
      };
      var handleCreateRepairDevice = function(){
         $('body').on('click', '.new-repair-device' ,function (e) {
            if($("#submitRepairDevice").hasClass("update-repair-device")){
               $("#submitRepairDevice").removeClass("update-repair-device").addClass("save-repair-device");
            }
            $.ajax({
               url: "<?php echo base_url('pos/new-repair-device'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  $(".repair-device-manufacturers").select2({
                     dropdownParent: $("#newRepairDevice .modal-content"),
                     data: response.manufacturers
                  });
                  if($('.repair-step-manufecturer-id').val() != ''){
                     $(".repair-device-manufacturers").val($('.repair-step-manufecturer-id').val()).trigger('change');
                  }
                  $('.create-repair-device [name="repair_device_category"]').val($('.repair-step-category-id').val());
                  $('.create-repair-device [name="repair_device_manufacturer"]').val($('.repair-step-manufecturer-id').val());
                  $('.repair-device-modal-title').html('').html('Add Device');
                  $('#newRepairDevice').modal('show');
               }
            });
         });
      };
      var handleRepairDeviceValidations = function(){
         $('.create-repair-device').validate({
            ignore : [],
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
               device_name: {
                  required: true,
                  maxlength:255,
                  minlength:2
               },
               manufacturer_id: {
                  required: true
               }
            },
            invalidHandler: function (event, validator) {
               $($('.create-repair-device')).show();
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
      var handleAddRepairDevice = function(){
         $("#submitRepairDevice").click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            if (!form.valid()) {
              return;
            }

            if($(this).hasClass("save-repair-device")){
               var url = '<?php echo base_url('pos/add-repair-device'); ?>';
            }
            if($(this).hasClass("update-repair-device")){
               var url = '<?php echo base_url('pos/update-repair-device'); ?>';
            }
            var formData = new FormData();
            formData.append('CSRFToken', $('.txt_csrfname').val());
            formData.append('parent_store_id', '<?php echo session()->get('parent_store_id') ?>');
            form.serializeArray().forEach(function (field) {
               if (field.value.trim() != '' || field.value.trim() != null) {
                  formData.append(field.name, field.value);
               }
            });
            $.ajax({
               url: url,
               type: 'post',
               dataType: "json",
               data: formData,
               processData: false,
               contentType: false,
               success: function( response ){
                  $('#newRepairDevice .close').trigger('click');
                  if(response.create == 1){
                     if(response.success == 1){
                        if(response.manufacturer_id == $('.create-repair-device [name="repair_device_manufacturer"]').val()){
                           var device_name = $('.create-repair-device [name="device_name"]').val();
                           var device_img = '<?php echo UPLOAD_IMG_PLACEHOLDER ?>';
                           var html = '';
                           html +='<div class="col-md-2 mb-16 vertical-box-5 has-dropbar"><div class="box-card align-items-center category-card reapir_device repair-device-div"><figure> <img src="'+device_img+'" /> </figure><h6 class="heading-xsm">'+device_name+'</h6></div><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary repair-device-edit" data-toggle="modal" data-target="#newRepairDevice" data-key="'+response.id+'"> Edit </a><a href="#" class="link link-secondary repair-device-disable" data-toggle="modal" data-target="#disable" data-key="'+response.id+'"> Disable</a></div></div></div>';
                           $('.repair-category-add-device').after(html);
                        }
                     }
                  }
                  if(response.update == 1){
                     if(response.success == 1){
                        if(response.manufacturer_id == $('.create-repair-device [name="repair_device_manufacturer"]').val()){
                           $(".repair-device-edit").map(function () {
                              if($(this).data('key') == formData.get('id')){
                                 $(this).parent().parent().prev('.repair-device-div').find('h6').html('').html(formData.get('device_name'));
                              }
                           });
                        }else{
                           $(".repair-device-edit").map(function () {
                              if($(this).data('key') == formData.get('id')){
                                 $(this).parent().parent().parent().remove();
                              }
                           });
                        }
                     }
                  }
               }
            });
         });
      };
      var repairDeviceModalClose = function () {
         $("#newRepairDevice .close").click(function(e){
            $('#newRepairDevice').modal('hide');
         });
         $('#newRepairDevice').on('hidden.bs.modal', function () {
            $('.create-repair-device').validate().resetForm();
            $('.create-repair-device').trigger("reset");
         });
      };
      var handleEditRepairDevice = function(){
         $("body").on('click','.repair-device-edit',function(){
            if($("#submitRepairDevice").hasClass("save-repair-device")){
               $("#submitRepairDevice").removeClass("save-repair-device").addClass("update-repair-device");
            }else{
               $("#submitRepairDevice").addClass("update-repair-device");
            }
            var id = $(this).attr('data-key');
            $.ajax({
               url: "<?php echo base_url('pos/edit-repair-device'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:id,
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  if(response.reapir_device != ''){
                     $(".repair-device-manufacturers").select2({
                        dropdownParent: $("#newRepairDevice .modal-content"),
                        data: response.manufacturers
                     });
                     $(".repair-device-manufacturers").val(response.reapir_device.manufacturer_id).trigger('change');

                     $('.create-repair-device [name="repair_device_category"]').val($('.repair-step-category-id').val());

                     $('.create-repair-device [name="repair_device_manufacturer"]').val($('.repair-step-manufecturer-id').val());
                     $('.create-repair-device [name="id"]').val(id);

                     $('.repair-device-modal-title').html('').html('Update ' + response.reapir_device.device_name);
                     $('.create-repair-device [name="device_name"]').val(response.reapir_device.device_name);
                  }
               }
            });
         });
      };
      var handleDisableRepairDevice = function(){
         $("body").on('click','.repair-device-disable',function(){
            var btn = $(this);
            bootbox.confirm({
               message: "<?php echo lang('PageText.disable_msg') ?>",
               buttons: {
                  confirm: {
                     label: "<?php echo lang('Buttons.ok') ?>",
                  },
                  cancel: {
                     label: "<?php echo lang('Buttons.cancel') ?>",
                  }
               },
               callback: function (deleteConfirm) {
                  if (deleteConfirm) {
                     var id = btn.attr('data-key');
                     console.log(id);
                     $.ajax({
                        url: "<?php echo base_url('pos/disable-repair-device'); ?>",
                        type: 'post',
                        dataType: "json",
                        data:{id:id,CSRFToken:$('.txt_csrfname').val()},
                        success: function(response) {
                           if(response.success == 1){
                              $(".repair-device-disable").map(function () {
                                 if($(this).data('key') == id){
                                    console.log("success");
                                    $(this).parent().parent().parent().remove();
                                 }
                              });
                           }
                        }
                     });
                  }
               }
            });
         });
      };
      var handleDisableRepairDeviceIssue = function(){
         $("body").on('click','.repair-device-disable-issue',function(){
            var btn = $(this);
            bootbox.confirm({
               message: "<?php echo lang('PageText.disable_msg') ?>",
               buttons: {
                  confirm: {
                     label: "<?php echo lang('Buttons.ok') ?>",
                  },
                  cancel: {
                     label: "<?php echo lang('Buttons.cancel') ?>",
                  }
               },
               callback: function (deleteConfirm) {
                  if (deleteConfirm) {
                     var id = btn.attr('data-key');
                     console.log(id);
                     $.ajax({
                        url: "<?php echo base_url('pos/disable-repair-device-issue'); ?>",
                        type: 'post',
                        dataType: "json",
                        data:{
                           id:id,
                           CSRFToken:$('.txt_csrfname').val()
                        },
                        success: function(response) {
                           if(response.success == 1){
                              $(".repair-device-disable-issue").map(function () {
                                 if($(this).data('key') == id){
                                    $(this).parent().parent().parent().remove();
                                 }
                              });
                           }
                        }
                     });
                  }
               }
            });
         });
      };
      var handleCreateRepairDeviceIssue = function(){
         $('body').on('click', '.new-repair-device-issue' ,function (e) {
            if($("#submitRepairDeviceIssue").hasClass("update-repair-device-issue")){
               $("#submitRepairDeviceIssue").removeClass("update-repair-device-issue").addClass("save-repair-device-issue");
            }
            if($('.is_from_labor_category').val() == 1){
               $('.device-issue-manufacturer-div').hide();
               $('.device-issue-device-div').hide();
            }else{
               $('.device-issue-manufacturer-div').show();
               $('.device-issue-device-div').show();
            }
            $.ajax({
               url: "<?php echo base_url('pos/new-repair-device-issue'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  $(".repair-device-issue-manufacturers").select2({
                     dropdownParent: $("#newRepairDeviceIssue .modal-content"),
                     data: response.manufacturers
                  });
                  $(".repair-device-issue-tax").select2({
                     dropdownParent: $("#newRepairDeviceIssue .modal-content"),
                     data: response.tax_configurations
                  });
                  if($('.repair-step-manufecturer-id').val() != ''){
                     $(".repair-device-issue-manufacturers").val($('.repair-step-manufecturer-id').val()).trigger('change');
                     handleRepairDeviceIssueDevicesByDevice($('.repair-step-manufecturer-id').val(), $('.repair-step-device-id').val());
                  }
                  $('.create-repair-device-issue [name="repair_device_category"]').val($('.repair-step-category-id').val());
                  $('.create-repair-device-issue [name="repair_device_manufacturer"]').val($('.repair-step-manufecturer-id').val());
                  $('.create-repair-device-issue [name="repair_device_id"]').val($('.repair-step-device-id').val());
                  $('.repair-device-issue-modal-title').html('').html('Add Service/Labor');
                  $('#newRepairDeviceIssue').modal('show');
               }
            });
         });
      };
      var repairDeviceIssueModalClose = function () {
         $("#newRepairDeviceIssue .close").click(function(e){
            $('#newRepairDeviceIssue').modal('hide');
         });
         $('#newRepairDeviceIssue').on('hidden.bs.modal', function () {
            $('.create-repair-device-issue').validate().resetForm();
            $('.create-repair-device-issue').trigger("reset");
         });
      };
      var handleRepairDeviceIssueDevicesOnManufecturerChange = function () {
         $('body').on('change', '.repair-device-issue-manufacturers', function() {
            $.ajax({
               url: "<?php echo base_url('pos/get-manufacturer-devices'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:$(this).val(),
                  parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  console.log(response);
                  $('.repair-device-issue-devices').empty().trigger("change");
                  $(".repair-device-issue-devices").select2({
                     dropdownParent: $("#newRepairDeviceIssue .modal-content"),
                     data: response.devices
                  });
               }
            });
         });
      };
      var handleRepairDeviceIssueDevicesByDevice = function (manufacturer_id,device_id) {
         $.ajax({
            url: "<?php echo base_url('pos/get-manufacturer-devices'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               id:manufacturer_id,
               parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               $('.repair-device-issue-devices').empty().trigger("change");
               $(".repair-device-issue-devices").select2({
                  dropdownParent: $("#newRepairDeviceIssue .modal-content"),
                  data: response.devices
               });
               $(".repair-device-issue-devices").val(device_id).trigger('change');
            }
         });
      };
      var handleRepairDeviceIssueValidations = function(){
         $('.create-repair-device-issue').validate({
            ignore : [],
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
               device_problem: {
                  required: true,
                  maxlength:255,
                  minlength:2
               },
               /*manufacturer_id: {
                  required: true
               },
               device_id: {
                  required: true
               }*/
            },
            invalidHandler: function (event, validator) {
               $($('.create-repair-device-issue')).show();
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
      var handleAddRepairDeviceIssue = function(){
         $("#submitRepairDeviceIssue").click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            if (!form.valid()) {
              return;
            }
            if($(this).hasClass("save-repair-device-issue")){
               var url = '<?php echo base_url('pos/add-repair-device-issue'); ?>';
            }
            if($(this).hasClass("update-repair-device-issue")){
               var url = '<?php echo base_url('pos/update-repair-device-issue'); ?>';
            }
            var formData = new FormData();
            formData.append('CSRFToken', $('.txt_csrfname').val());
            formData.append('parent_store_id', '<?php echo session()->get('parent_store_id') ?>');
            formData.append('store_id', '<?php echo session()->get('parent_store_id') ?>');
            form.serializeArray().forEach(function (field) {
               if (field.value.trim() != '' || field.value.trim() != null) {
                  formData.append(field.name, field.value);
               }
            });
            $.ajax({
               url: url,
               type: 'post',
               dataType: "json",
               data: formData,
               processData: false,
               contentType: false,
               success: function( response ){
                  $('#newRepairDeviceIssue .close').trigger('click');
                  if(response.create == 1){
                     if(response.success == 1){
                        if(($('.repair-step-device-id').val() == $('.create-repair-device-issue [name="device_id"]').val()) && response.show_on_pos == '1'){
                           var html = '<div class="col-md-4 mb-16 has-dropbar"><label for="problem_checkbox_'+response.id+'" class="d-block label-chk"><div class="box-card d-flex checkbox-card repair-device-issue-div"><div class="checkbox"><div class="form-check"><input class="form-check-input is-valid form-check-input-md form-check-input-problem" type="checkbox" value="" id="problem_checkbox_'+response.id+'" data-key="'+response.repair_products[i].id+'" /></div></div><div class="box-detail"><h6 class="heading-xsm mb-6">'+$('.create-repair-device-issue [name="device_problem"]').val()+'</h6><p class="m-0">Repair time : </p><div class="price-box heading-sm"> '+$('.create-repair-device-issue [name="retail_price"]').val()+' </div></div></div></label><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary repair-device-edit-issue" data-toggle="modal" data-target="#newRepairDeviceIssue" data-key="'+response.id+'"> Edit </a><a href="#" class="link link-secondary repair-device-disable-issue" data-toggle="modal" data-target="#disable" data-key="'+response.id+'"> Disable</a></div></div></div>';
                           $('.repair-category-add-device-issue').after(html);
                        }
                     }
                  }
                  if(response.update == 1){
                     if(response.success == 1){
                        if(($('.repair-step-device-id').val() == $('.create-repair-device-issue [name="device_id"]').val()) && response.show_on_pos == '1'){
                           $(".repair-device-edit-issue").map(function () {
                              if($(this).data('key') == formData.get('id')){
                                 $(this).parent().parent().prev('.repair-device-issue-div').find('h6').html('').html(formData.get('device_problem'));
                              }
                           });
                        }else{
                           $(".repair-device-edit-issue").map(function () {
                              if($(this).data('key') == formData.get('id')){
                                 $(this).parent().parent().parent().remove();
                              }
                           });
                        }
                     }
                  }
               }
            });
         });
      };
      var handleEditRepairDeviceIssue = function(){
         $("body").on('click','.repair-device-edit-issue',function(){
            if($("#submitRepairDeviceIssue").hasClass("save-repair-device-issue")){
               $("#submitRepairDeviceIssue").removeClass("save-repair-device-issue").addClass("update-repair-device-issue");
            }else{
               $("#submitRepairDeviceIssue").addClass("update-repair-device-issue");
            }
            var id = $(this).attr('data-key');
            $.ajax({
               url: "<?php echo base_url('pos/edit-repair-device-issue'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:id,
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  $(".repair-device-issue-manufacturers").select2({
                     dropdownParent: $("#newRepairDeviceIssue .modal-content"),
                     data: response.manufacturers
                  });
                  if(response.repair_device_issue.manufacturer_id != '' && response.repair_device_issue.device_id != ''){
                     $(".repair-device-issue-manufacturers").val(response.repair_device_issue.manufacturer_id).trigger('change.select2');
                     handleRepairDeviceIssueDevicesByDevice(response.repair_device_issue.manufacturer_id,response.repair_device_issue.device_id);
                  }
                  $(".repair-device-issue-tax").select2({
                     dropdownParent: $("#newRepairDeviceIssue .modal-content"),
                     data: response.tax_configurations
                  });

                  if(response.repair_device_issue != ''){
                     $('.create-repair-device-issue [name="id"]').val(response.repair_device_issue.id);
                     $('.create-repair-device-issue [name="product_device_map_id"]').val(response.repair_device_issue.product_device_map_id);
                     $('.create-repair-device-issue [name="store_product_price_id"]').val(response.repair_device_issue.store_product_price_id);
                     $('.create-repair-device-issue [name="device_problem"]').val(response.repair_device_issue.name);
                     $('.create-repair-device-issue [name="description"]').val(response.repair_device_issue.description);
                     $('.create-repair-device-issue [name="retail_price"]').val(response.repair_device_issue.retail_price);
                     $('.create-repair-device-issue [name="sale_price"]').val(response.repair_device_issue.promotional_price);

                     if(response.repair_device_issue.tax_class_id != ''){
                        $(".repair-device-issue-tax").val(response.repair_device_issue.tax_class_id).trigger('change');
                     }
                     $('.create-repair-device-issue [name="show_on_pos"]').prop('checked',(response.repair_device_issue.show_on_pos == 1) ? true : false);
                     $('.create-repair-device-issue [name="tax_inclusive"]').prop('checked',(response.repair_device_issue.tax_inclusive == 1) ? true : false);

                     $('.repair-device-issue-modal-title').html('').html('Update ' + response.repair_device_issue.name);
                  }

                  $('.create-repair-device-issue [name="repair_device_category"]').val($('.repair-step-category-id').val());
                  $('.create-repair-device-issue [name="repair_device_manufacturer"]').val($('.repair-step-manufecturer-id').val());
                  $('.create-repair-device-issue [name="repair_device_id"]').val($('.repair-step-device-id').val());
               }
            });
         });
      };
      var handleCreateRepairPart = function(){
         $('body').on('click', '.new-repair-part' ,function (e) {
            if($("#submitRepairPart").hasClass("update-repair-part")){
               $("#submitRepairPart").removeClass("update-repair-part").addClass("save-repair-part");
            }
            $.ajax({
               url: "<?php echo base_url('pos/new-repair-part'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                  store_id:'<?php echo session()->get('store_id') ?>',
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  $(".repair-part-manufacturers").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.manufacturers
                  });
                  if($('.repair-step-manufecturer-id').val() != ''){
                     $(".repair-part-manufacturers").val($('.repair-step-manufecturer-id').val()).trigger('change');
                  }
                  $(".repair-part-tax").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.tax_configurations
                  });

                  $(".repair-part-product-conditions").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.product_conditions
                  });

                  $(".repair-part-categories").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.product_categories
                  });

                  $(".repair-part-suppliers").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.suppliers
                  });
                  $('#newRepairPart').modal('show');
               }
            });
         });
      };
      var repairPartModalClose = function () {
         $("#newRepairPart .close").click(function(e){
            $('#newRepairPart').modal('hide');
         });
         $('#newRepairPart').on('hidden.bs.modal', function () {
            $('.create-repair-part').validate().resetForm();
            $('.create-repair-part').trigger("reset");
         });
      };
      var handleRepairPartDevicesOnManufecturerChange = function () {
         $('body').on('change', '.repair-part-manufacturers', function() {
            $.ajax({
               url: "<?php echo base_url('pos/get-manufacturer-devices'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:$(this).val(),
                  parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  console.log(response);
                  $('.repair-part-devices').empty().trigger("change");
                  $(".repair-part-devices").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.devices
                  });
               }
            });
         });
      };
      var handleRepairPartDevicesOnManufecturerChangeDeviceSelect = function (manufecture,devices) {
         $.ajax({
            url: "<?php echo base_url('pos/get-manufacturer-devices'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               id:manufecture,
               parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               $('.repair-part-devices').empty().trigger("change");
               $(".repair-part-devices").select2({
                  dropdownParent: $("#newRepairPart .modal-content"),
                  data: response.devices
               });
               $('.repair-part-devices').select2().val(devices).trigger('change');
            }
         });
      };
      var handleRepairPartValidations = function(){
         $('.create-repair-part').validate({
            ignore : [],
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
               name: {
                  required: true,
                  maxlength:255,
                  minlength:2
               },
               /*manufacturer_id: {
                  required: true
               },
               device_id: {
                  required: true
               },
               stock:{
                  number:true
               },
               stock_warning:{
                  number:true
               }*/
            },
            invalidHandler: function (event, validator) {
               $($('.create-repair-part')).show();
            },
            highlight: function (element) {
               $(element).closest('.form-group').addClass('has-error');
               if ($('.repair-part-form-tab-content').find(".tab-pane.active:has(div.has-error)").length == 0) {
                  if($('.repair-part-form-tab-content').find(".tab-pane:has(div.has-error)").length > 0) {
                        var current_active_tab_id = $("ul.repair-part-form-tab li.active").attr('id');
                        var current_active_tabpane_id = $("div.repair-part-form-tab-content div.tab-pane.active").attr('id');
                        var tabpane_id = $('.repair-part-form-tab-content').find(".tab-pane:has(div.has-error)").attr('id');
                        var tab_id = (tabpane_id == 'RepairPartProduct') ? 'RepairProductTab':'RepairProductOtherInformationTab';
                     if(tab_id != current_active_tab_id){
                        //tabs
                        $('#'+tab_id).addClass('active');
                        $('#'+current_active_tab_id).removeClass('active');
                        //tab pane
                        $('#'+tabpane_id).addClass('active');
                        $('#'+current_active_tabpane_id).removeClass('active');
                     }
                  }
               }
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
      var handleAddRepairPart = function(){
         $("#submitRepairPart").click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            if (!form.valid()) {
              return;
            }
            if($(this).hasClass("save-repair-part")){
               var url = '<?php echo base_url('pos/add-repair-part'); ?>';
            }
            if($(this).hasClass("update-repair-part")){
               var url = '<?php echo base_url('pos/update-repair-part'); ?>';
            }
            var formData = new FormData();
            formData.append('CSRFToken', $('.txt_csrfname').val());
            formData.append('parent_store_id', '<?php echo session()->get('parent_store_id') ?>');
            formData.append('store_id', '<?php echo session()->get('parent_store_id') ?>');
            form.serializeArray().forEach(function (field) {
               if (field.value.trim() != '' || field.value.trim() != null) {
                  formData.append(field.name, field.value);
               }
            });
            $.ajax({
               url: url,
               type: 'post',
               dataType: "json",
               data: formData,
               processData: false,
               contentType: false,
               success: function( response ){
                  $('#newRepairPart .close').trigger('click');
                  if(response.create == 1){
                     if(response.success == 1){
                        if(($('.repair-step-manufecturer-id').val() == $('.create-repair-part [name="manufacturer_id"]').val()) && response.show_on_pos == '1'){
                           var stock_info = (($('.create-repair-part [name="stock"]').val() != '' || $('.create-repair-part [name="stock"]').val() != undefined || $('.create-repair-part [name="stock"]').val() != null) && $('.create-repair-part [name="stock"]').val() > 0) ? '<span class="alert-green">In Stock</span>' : '<span class="alert-red">Out of Stock</span>';
                           var html = '<div class="col-md-4 mb-16 has-dropbar"><label for="repair_part_checkbox_'+response.id+'" class="d-block label-chk"><div class="box-card d-flex checkbox-card repair-part-div"><div class="checkbox"><div class="form-check"><input class="form-check-input is-valid form-check-input-md" type="checkbox" value="" id="repair_part_checkbox_'+response.id+'" /></div></div><div class="box-detail"><h6 class="heading-xsm mb-6">'+$('.create-repair-part [name="name"]').val()+'</h6><p class="m-0">Physical Location: 0</p><p class="m-0 repair-part-across-all-store" data-product="'+response.id+'" data-store="'+<?php echo session()->get('parent_store_id') ?>+'" data-toggle="modal" data-target="#viewOnHandRepairPart">View on hand across all stores</p><div class="price-box heading-sm d-flex justify-content-between"> <span class="part-price">'+$('.create-repair-part [name="retail_price"]').val()+'</span> '+stock_info+' </div></div></div></label><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary new-repair-part-special-order" data-key="'+response.id+'"> Special Order</a><a href="#" class="link link-secondary repair-part-edit" data-toggle="modal" data-target="#newRepairPart" data-key="'+response.id+'"> Edit</a></div></div></div>';

                           $('.repair-category-add-device-part').after(html);
                        }
                     }
                  }
                  if(response.update == 1){
                     if(response.success == 1){
                        if(($('.repair-step-manufecturer-id').val() == $('.create-repair-part [name="manufacturer_id"]').val()) && response.show_on_pos == '1'){
                           var stock_info = (($('.create-repair-part [name="stock"]').val() != '' || $('.create-repair-part [name="stock"]').val() != undefined || $('.create-repair-part [name="stock"]').val() != null) && $('.create-repair-part [name="stock"]').val() > 0) ? '<span class="alert-green">In Stock</span>' : '<span class="alert-red">Out of Stock</span>';
                           $(".repair-part-edit").map(function () {
                              if($(this).data('key') == formData.get('id')){
                                 console.log($(this).parent().parent().parent().next('.repair-part-div'))
                                 $(this).parent().parent().parent().find('h6').html('').html(formData.get('name'));
                                 $(this).parent().parent().parent().find('.price-box').html('').html(formData.get('retail_price')+stock_info);
                              }
                           });
                        }else{
                           $(".repair-part-edit").map(function () {
                              if($(this).data('key') == formData.get('id')){
                                 $(this).parent().parent().parent().remove();
                              }
                           });
                        }
                     }
                  }
               }
            });
         });
      };
      var handleEditRepairPart = function(){
         $("body").on('click','.repair-part-edit',function(){
            if($("#submitRepairPart").hasClass("save-repair-part")){
               $("#submitRepairPart").removeClass("save-repair-part").addClass("update-repair-part");
            }else{
               $("#submitRepairPart").addClass("update-repair-part");
            }
            var id = $(this).attr('data-key');
            $.ajax({
               url: "<?php echo base_url('pos/edit-repair-part'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:id,
                  parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                  store_id:'<?php echo session()->get('store_id') ?>',
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  console.log(response.repair_devices);
                  $(".repair-part-manufacturers").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.manufacturers
                  });
                  $(".repair-part-tax").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.tax_configurations
                  });

                  $(".repair-part-product-conditions").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.product_conditions
                  });

                  $(".repair-part-categories").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.product_categories
                  });

                  $(".repair-part-suppliers").select2({
                     dropdownParent: $("#newRepairPart .modal-content"),
                     data: response.suppliers
                  });

                  if(response.repair_part != '' || response.repair_part != null){
                     $('.create-repair-part [name="id"]').val(response.repair_part.product_id);
                     $('.create-repair-part [name="store_product_price_id"]').val(response.repair_part.store_product_price_id);
                     $('.create-repair-part [name="store_product_stock_id"]').val(response.repair_part.store_product_stock_id);
                     $('.create-repair-part [name="simple_product_info_id"]').val(response.repair_part.simple_product_info_id);
                     $('.create-repair-part [name="name"]').val(response.repair_part.name);
                     $('.create-repair-part [name="retail_price"]').val(response.repair_part.retail_price);
                     $('.create-repair-part [name="unit_cost"]').val(response.repair_part.unit_cost);
                     $('.create-repair-part [name="stock"]').val(response.repair_part.stock);
                     $('.create-repair-part [name="stock_warning"]').val(response.repair_part.stock_warning);
                     $('.create-repair-part [name="reorder_level"]').val(response.repair_part.reorder_level);
                     $('.create-repair-part [name="sku"]').val(response.repair_part.sku);
                     $('.create-repair-part [name="show_on_pos"]').prop('checked',(response.repair_part.show_on_pos == 1) ? true : false);
                     $('.create-repair-part [name="tax_inclusive"]').prop('checked',(response.repair_part.tax_inclusive == 1) ? true : false);
                     if(response.repair_part.manufacturer_id != '' || response.repair_part.manufacturer_id != null){
                        $(".repair-part-manufacturers").val(response.repair_part.manufacturer_id).trigger('change.select2');
                     }
                     if(response.repair_part.product_condition_id != '' || response.repair_part.product_condition_id != null){
                        $(".repair-part-product-conditions").val(response.repair_part.product_condition_id).trigger('change');
                     }
                     if(response.repair_part.tax_class_id != '' || response.repair_part.tax_class_id != null){
                        $(".repair-part-tax").val(response.repair_part.tax_class_id).trigger('change');
                     }
                     if(response.repair_part.category_id != '' || response.repair_part.category_id != null){
                        $(".repair-part-categories").val(response.repair_part.category_id).trigger('change');
                     }
                     if(response.repair_part.supplier_id != '' || response.repair_part.supplier_id != null){
                        $(".repair-part-suppliers").val(response.repair_part.supplier_id).trigger('change');
                     }
                     if(response.repair_part.device_ids != '' || response.repair_part.device_ids != null){
                        handleRepairPartDevicesOnManufecturerChangeDeviceSelect(response.repair_part.manufacturer_id,response.repair_part.device_ids);
                     }
                  }
                  
                  $('#newRepairPart').modal('show');
               }
            });
         });
      };
      var handleViewRepairPartOnHandAccrossAllStore = function(){
         $('body').on('click', '.repair-part-across-all-store', function() {
            $('.repair-part-onhand-stock-modal-title').html('').html($(this).parent().find('h6').html() + ' - ON Hand Stock Information');
            $.ajax({
               url: "<?php echo base_url('pos/view-hand-on-repair-part-across-store'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  parent_store_id:$(this).attr('data-store'),
                  product_id:$(this).attr('data-product'),
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  if(response.store_wise_part_stock != '' || response.store_wise_part_stock != null){
                     var html = '';
                     var total_on_hand = 0;
                     var total_required_qty = 0;
                     for(var i = 0; i < response.store_wise_part_stock.length; i++){
                        if(response.store_wise_part_stock[i].stock > 0){
                           total_on_hand = total_on_hand + parseInt(response.store_wise_part_stock[i].stock);
                        }
                        if(response.store_wise_part_stock[i].required_quantity > 0){
                           total_required_qty = total_required_qty + parseInt(response.store_wise_part_stock[i].required_quantity);
                        }
                        var required_qty = (response.store_wise_part_stock[i].required_quantity > 0) ? response.store_wise_part_stock[i].required_quantity : 0;
                        var sku = (response.store_wise_part_stock[i].sku != '') ? response.store_wise_part_stock[i].sku : "-" ;
                        html += '<tr><td>'+response.store_wise_part_stock[i].store_name+'</td><td>'+response.store_wise_part_stock[i].product_id+'</td><td>'+response.store_wise_part_stock[i].name+'</td><td>'+sku+'</td><td>'+response.store_wise_part_stock[i].stock+'</td><td>'+response.store_wise_part_stock[i].stock_warning+'</td><td>'+response.store_wise_part_stock[i].reorder_level+'</td><td>'+required_qty+'</td><td></td></tr>'
                     }
                     $('.on-hand-part-detail').html('').html(html);
                     $('.on-hand-repair-part-total').html('').html(total_on_hand);
                     $('.on-hand-repair-part-required-qty').html('').html(total_required_qty);
                  }
               }
            });
         });
      };
      var handleDisableRepairCategory = function(){
         $("body").on('click','.repair-category-disable',function(){
            var btn = $(this);
            bootbox.confirm({
               message: "<?php echo lang('PageText.disable_msg') ?>",
               buttons: {
                  confirm: {
                     label: "<?php echo lang('Buttons.ok') ?>",
                  },
                  cancel: {
                     label: "<?php echo lang('Buttons.cancel') ?>",
                  }
               },
               callback: function (deleteConfirm) {
                  if (deleteConfirm) {
                     var id = btn.attr('data-key');
                     console.log(id);
                     $.ajax({
                        url: "<?php echo base_url('pos/disable-repair-category'); ?>",
                        type: 'post',
                        dataType: "json",
                        data:{id:id,CSRFToken:$('.txt_csrfname').val()},
                        success: function(response) {
                           if(response.success == 1){
                              $(".repair-category-disable").map(function () {
                                 if($(this).data('key') == id){
                                    console.log("success");
                                    $(this).parent().parent().parent().remove();
                                 }
                              });
                           }
                        }
                     });
                  }
               }
            });
         });
      };
      
      var repairCategoryModalClose = function () {
         $("#newRepairCategory .close").click(function(e){
            $('#newRepairCategory').modal('hide');
         });
         $('#newRepairCategory').on('hidden.bs.modal', function () {
            removeImg();
            $('.remove-manufacturer-device-row').each(function(i, obj) {
               $(this).closest('tr').remove();
            });
            $('.create-repair-category #is_img_removed').val('0');
            $('.create-repair-category').validate().resetForm();
            $('.create-repair-category').trigger("reset");
         });
      };
      var handleShowHideRepairCategoryManufacturerDeviceTable = function (){
         $('body').on('change', '.create-repair-category [name="labor_billable_category"]' ,function (e) {
            if($('.create-repair-category [name="labor_billable_category"]').is(":checked")){
               $('#category_manufacturer_device_map').hide();
            }else{
               $('#category_manufacturer_device_map').show();
            }
         });
      };
      var handleRepairCategoryAddMoreRow = function (parent_store_id){
         $.ajax({
            url: "<?php echo base_url('pos/get-repair-category-manufacturers'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               store_id:'<?php echo session()->get('parent_store_id') ?>',
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               $('.create-repair-category [name="labor_billable_category"]').removeAttr('checked');
               $('.create-repair-category [name="labor_billable_category"]').prop('checked', false);
               var count = $('#ProductCategories tbody tr').length;
               count++;
               var html = '';
               html += '<tr class="detail_row">';
               html += '<td><select name="related_device_details['+count+'][manufacturer]" data-related_devices="'+count+'"  class="form-control repair-manufacturer-select manufacturer_id manufacturer_id'+count+'" ><option></option>';
               for(var i = 0; i < response.manufacturers.length; i++){
                  html += '<option value="'+response.manufacturers[i].id+'">'+response.manufacturers[i].name+'</option>';
               }
               html += '</select></td>';
               html += '<td><select name="related_device_details['+count+'][related_device_names][]" data-placeholder="Select Related Devices" multiple class="form-control related_devices related_devices'+count+'"></select></td>';
               html += '<td><div class="text-center"><a href="javascript:void(0)" class="btn btn-outline-danger btn-xs data-action-btn m-0 remove-manufacturer-device-row"><i data-feather="trash"></i></a></div></td></tr>';
               $('#ProductCategories tbody').append(html);
               feather.replace();
               $(".manufacturer_id").chosen();
               $(".related_devices").chosen();
            }
         }); 
      };
      var handleRepairCategoryAddMoreRowWithoutAJAX = function(){
         $('body').on('click', '.add-manufacturer-and-devices' ,function (e) {
            $('.create-repair-category [name="labor_billable_category"]').removeAttr('checked');
            $('.create-repair-category [name="labor_billable_category"]').prop('checked', false);
            var count = $('#ProductCategories tbody tr').length;
            count++;
            var html = '';
            html += '<tr class="detail_row">';
            
            html += '<td><select name="related_device_details['+count+'][related_device_names][]" data-placeholder="Select Related Devices" multiple class="form-control related_devices related_devices'+count+'"></select></td>';
            html += '<td><div class="text-center"><a href="javascript:void(0)" class="btn btn-outline-danger btn-xs data-action-btn m-0 remove-manufacturer-device-row"><i data-feather="trash"></i></a></div></td></tr>';
            $('#ProductCategories tbody').append(html);
            feather.replace();
            $(".manufacturer_id").chosen();
            $(".related_devices").chosen();
         });
      };
      var handleRepairCategoryManufacturerChange = function(){
         $('body').on('change', '.repair-manufacturer-select' ,function (e) {
            var related_devices = $(this).data('related_devices');
            var manufacturer_id = $(this).val();
            $('select.related_devices'+related_devices).empty();
            $.ajax({
               url:"<?php echo base_url('store/ajax-get-related-devices'); ?>",
               method:"POST",
               dataType: "json",
               data:{
                  manufacturer_id:manufacturer_id,
                  CSRFToken:$('.txt_csrfname').val()
               },
               success:function(data)
               {
                  var html = '';
                  $.each( data, function( key, value ) {
                      html += '<option value="'+value.id+'">'+value.device_name+'</option>'; 
                  });
                  $('select.related_devices'+related_devices).attr("multiple","true");
                  $('select.related_devices'+related_devices).append(html);
                  $('select.related_devices'+related_devices).trigger("chosen:updated");
               }
            });
         });
      };
      var handleRepairCategoryRemoveManufacturerDeviceRow = function(){
         $('body').on('click', '.remove-manufacturer-device-row' ,function (e) {
            $(this).closest('tr').remove();
         });
      };
      var handleRepairCategoryValidations = function(){
         $('.create-repair-category').validate({
            errorClass: 'text-danger',
            focusInvalid: true,
            rules: {
               name: {
                  required: true,
                  maxlength:100,
                  minlength:2
               },
               picture:{
                  extension: 'jpeg|jpg|png',
                  filesize:2000000
               }
            },
            messages: {
               picture:{
                   filesize:"file size must be less than 2MB.",
               }
            },
            invalidHandler: function (event, validator) {
               $($('.create-repair-category')).show();
            },
            highlight: function (element) {
               $(element).closest('.form-group').addClass('has-error');
            },
            success: function (label) {
               $(".manufacturer_id").prop("disabled", false).trigger("chosen:updated");
               label.closest('.form-group').removeClass('has-error');
               label.remove();
            },
            errorPlacement: function (error, element) {
               if( element.attr("name") == "picture"){
                  error.appendTo('.picture-error');
               }else{
                  error.insertAfter(element);
               }
            },
         });
      };
      var handleAddRepairCategory = function(){
         $("#submitRepairCategory").click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            if (!form.valid()) {
              return;
            }
            if($(this).hasClass("save-repair-category")){
               var url = '<?php echo base_url('pos/add-repair-category'); ?>';
            }
            if($(this).hasClass("update-repair-category")){
               var url = '<?php echo base_url('pos/update-repair-category'); ?>';
            }
            var formData = new FormData();
            formData.append('CSRFToken', $('.txt_csrfname').val());
            formData.append('parent_store_id', '<?php echo session()->get('parent_store_id') ?>');
            formData.append('store_id', '<?php echo session()->get('parent_store_id') ?>');
            formData.append('picture', $('input[name=picture]')[0].files[0]); 
            form.serializeArray().forEach(function (field) {
               if (field.value.trim() != '' || field.value.trim() != null) {
                  formData.append(field.name, field.value);
               }
            });
            $.ajax({
               url: url,
               type: 'post',
               enctype: 'multipart/form-data',
               dataType: "json",
               data: formData,
               processData: false,
               contentType: false,
               success: function( response ){
                  if(response.validation_error == 1){
                     $.each(response.message, function (key, val){
                        if(key == 'name'){
                           $('.create-repair-category-name-error').html('').html(val);
                           $('.create-repair-category-name-error').show();
                        }

                        if(key == 'related_device_details.*.manufacturer'){
                           $('.create-repair-category-manufacturer-error').html('').html(val);
                           $('.create-repair-category-manufacturer-error').show();
                        }

                        if(key == 'related_device_details.*.related_device_names'){
                           $('.create-repair-category-device-error').html('').html(val);
                           $('.create-repair-category-device-error').show();
                        }
                     });
                  }
                  if(response.create == 1){
                     if(response.success == 1){
                        var img = (response.image != '') ? '<?php echo base_url('uploads/') ?>'+'/'+response.image : '<?php echo UPLOAD_IMG_PLACEHOLDER ?>';
                        var html = '';
                        html += '<div class="col-md-4 mb-16 has-dropbar"><div class="box-card d-flex align-items-center category-card repair_category repair-category-div" data-key="'+response.id+'" data-labor="'+response.labor_billable_category+'"><figure> <img src="'+img+'" style="width: 100%;" /> </figure><h6 class="heading-sm">'+$('.create-repair-category [name="name"]').val()+'</h6></div><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary repair-category-edit" data-key="'+response.id+'"> Edit </a><a href="#" class="link link-secondary repair-category-disable" data-toggle="modal" data-target="#disable" data-key="'+response.id+'"> Disable</a>';
                        $('.new-repair-category-div').after(html);
                        $('#newRepairCategory .close').trigger('click');
                     }
                  }
                  if(response.update == 1){
                     if(response.success == 1){
                        $(".repair-category-edit").map(function () {
                           if($(this).data('key') == formData.get('id')){
                              console.log($(this).parent().parent().prev('.repair_category.repair-category-div'));
                              $(this).parent().parent().prev('.repair_category.repair-category-div').find('h6').html('').html(formData.get('name'));
                              if(response.image != ''){
                                 $(this).parent().parent().prev('.repair_category.repair-category-div').find('img').attr('src','<?php echo base_url('uploads/') ?>'+'/'+response.image);
                              }
                              if(response.image == ''){
                                 $(this).parent().parent().prev('.repair_category.repair-category-div').find('img').attr('src','<?php echo UPLOAD_IMG_PLACEHOLDER ?>')
                              }
                           }
                        });
                        $('#newRepairCategory .close').trigger('click');
                     }
                  }
               }
            });
         });
      };
      var handleEditRepairCategory = function(){
         $("body").on('click','.repair-category-edit',function(){
            if($("#submitRepairCategory").hasClass("save-repair-category")){
               $("#submitRepairCategory").removeClass("save-repair-category").addClass("update-repair-category");
            }else{
               $("#submitRepairCategory").addClass("update-repair-category");
            }
            var id = $(this).attr('data-key');
            $.ajax({
               url: "<?php echo base_url('pos/edit-repair-category'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:id,
                  parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                  store_id:'<?php echo session()->get('store_id') ?>',
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  if(response.category != '' || response.category != null){
                     $('.create-repair-category [name="id"]').val(response.category.id);
                     $('.create-repair-category [name="name"]').val(response.category.name);
                     $('.create-repair-category [name="labor_billable_category"]').prop('checked',(response.category.labor_billable_category == 1) ? true : false);
                     if (response.category.labor_billable_category == 1) {
                        $('#category_manufacturer_device_map').hide();
                     }else{
                        $('#category_manufacturer_device_map').show();
                     }
                     
                     if(response.category.picture != '' && response.category.picture != null){
                        var img = '<?php echo base_url('uploads/') ?>'+'/'+response.category.picture;
                        $('.repair-cat-img').attr("src",img);
                        $('.create-repair-category [name="uploaded_image"]').val(response.category.picture);
                     }
                     $('.repair-category-modal-title').html('').html('Update Category ' + response.category.name);
                  }
                  $('#ProductCategories tbody').html('');
                  if(response.results_devices != '' || response.results_devices != null){
                     var count = 1;
                     html = '';
                     for(var i = 0; i < response.results_devices.length; i++){
                        html += '<tr>';
                        html += '<td>';
                        html += '<select name="related_device_details['+count+'][manufacturer]" data-related_devices="'+count+'" class="manufacturer_id manufacturer_id'+count+'style="width:300px" ><option></option>';
                        for(var j = 0; j < response.manufacturers.length; j++){
                           var manufacturer_select = (response.manufacturers[j].id == response.results_devices[i].manufacturer_id) ? 'selected' : '';
                           html += ' <option value="'+response.manufacturers[j].id+'" '+manufacturer_select+'>'+response.manufacturers[j].name+'</option>';
                        }
                        html += '</select>';
                        html += '</td>';
                        html += '<td>';
                        html += '<select required multiple name="related_device_details['+count+'][related_device_names][]" data-related_devices="'+count+'" class="related_devices related_devices'+count+'" style="width:300px" ><option></option>';
                        for(var k = 0; k < response.results_devices[i].all_devices.length; k++){
                           var selected_device_ids = response.results_devices[i].selected_device_id.split(',');
                           var device_select = ($.inArray(response.results_devices[i].all_devices[k].device_id, selected_device_ids) != -1) ? 'selected' : '';
                           html += '<option value="'+response.results_devices[i].all_devices[k].device_id+'" '+device_select+'>'+response.results_devices[i].all_devices[k].device_name+'</option>';
                        }
                        html += '</select>';
                        html += '</td>';
                        html += '<td>';
                        html += '<div class="text-center"><a href="javascript:void(0)" class="btn btn-outline-danger btn-xs data-action-btn m-0 remove-manufacturer-device-row"><i data-feather="trash"></i></a></div>';
                        html += '</td>';
                        html += '</tr>';
                        count++;
                     }
                     $('#ProductCategories tbody').append(html);
                     feather.replace();
                     $(".manufacturer_id").chosen();
                     $(".related_devices").chosen();
                  }
                  $('#newRepairCategory').modal('show');
               }
            });
         });
      };
      var handleRepairCategoryImageDisplay = function () {
         $(".create-repair-category #inputFile").change(function() {
            if ($(this).val()) {
               $('.create-repair-category .removeImgbtn').prop('disabled',false);
               $('.create-repair-category .add-img').removeAttr('src');
               $('.create-repair-category .add-img').attr('src', URL.createObjectURL(event.target.files[0]));
               $('.create-repair-category .create-repair-category #is_img_removed').val('0');
            }
         });
      };
      var handleRepairCategoryImageRemove = function () {
         if($('.create-repair-category .add-img').hasClass('btndisable')){
            $('.create-repair-category .removeImgbtn').prop('disabled',true);
         }
         $(".create-repair-category .removeImgbtn").click(function() {
            $('.create-repair-category .removeImgbtn').prop('disabled',true);
            $('.create-repair-category .add-img').removeAttr('src');
            $('.create-repair-category .add-img').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
            $('.create-repair-category #inputFile').val('');
            $('.create-repair-category #is_img_removed').val('1');
         });
      };
      var handleCreateRepairPartSpecialOrder = function(){
         $('body').on('click', '.new-repair-part-special-order' ,function (e) {
            $.ajax({
               url: "<?php echo base_url('pos/create-special-order-for-repair-part'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:$(this).attr('data-key'),
                  parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                  store_id:'<?php echo session()->get('store_id') ?>',
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  $(".repair-part-special-order-manufacturers").select2({
                     dropdownParent: $("#newRepairPartSpecialOrder .modal-content"),
                     data: response.manufacturers
                  });
                  $(".repair-part-special-order-tax").select2({
                     dropdownParent: $("#newRepairPartSpecialOrder .modal-content"),
                     data: response.tax_configurations
                  });
                  $(".repair-part-special-order-suppliers").select2({
                     dropdownParent: $("#newRepairPartSpecialOrder .modal-content"),
                     data: response.suppliers
                  });
                  if(response.repair_part.manufacturer_id != ''){
                     $(".repair-part-special-order-manufacturers").val(response.repair_part.manufacturer_id).trigger('change');
                     handleRepairDevicePartDevicesByDevice(response.repair_part.manufacturer_id, $('.repair-step-device-id').val());
                  }
                  if(response.repair_part.supplier_id != ''){
                     $(".repair-part-special-order-suppliers").val(response.repair_part.supplier_id).trigger('change');
                  }
                  if(response.repair_part.tax_class_id != ''){
                     $(".repair-part-special-order-tax").val(response.repair_part.tax_class_id).trigger('change');
                  }
                  $('.repair-part-special-order-tax [name="tax_inclusive"]').prop('checked',(response.repair_part.tax_inclusive == 1) ? true : false);
                  $('.repair-part-special-order-form [name="name"]').val(response.repair_part.name);
                  $('.repair-part-special-order-form [name="unit_cost"]').val(response.repair_part.unit_cost);
                  $('.repair-part-special-order-form [name="retail_price"]').val(response.repair_part.retail_price);
                  $('#newRepairPartSpecialOrder').modal('show');
               }
            });
         });
      };
      var handleRepairDevicePartDevicesByDevice = function (manufacturer_id,device_id) {
         $.ajax({
            url: "<?php echo base_url('pos/get-manufacturer-devices'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               id:manufacturer_id,
               parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               $('.repair-part-special-order-devices').empty().trigger("change");
               $(".repair-part-special-order-devices").select2({
                  dropdownParent: $("#newRepairPartSpecialOrder .modal-content"),
                  data: response.devices
               });
               $(".repair-part-special-order-devices").val(device_id).trigger('change');
            }
         });
      };
      var handlePrePostConditionsOnRepairCategoryChange = function(){
         $('body').on('change', '.repair-details-repair-categories' ,function (e) {
            $.ajax({
               url: "<?php echo base_url('pos/get-repair-category-pre-post-conditions'); ?>",
               type: 'post',
               dataType: "json",
               data:{
                  id:$(this).val(),
                  parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                  store_id:'<?php echo session()->get('store_id') ?>',
                  CSRFToken:$('.txt_csrfname').val()
               },
               success: function(response) {
                  $(".repair-detail-select-all-not-checked").prop('checked', true);
                  $(".repair-detail-select-all-fail").prop('checked', false);
                  $(".repair-detail-select-all-pass").prop('checked', false);
                  if(response.repair_category_pre_post_conditions != null || response.repair_category_pre_post_conditions != ''){
                     if(response.repair_category_pre_post_conditions.length > 0){
                        var total_conditions = response.repair_category_pre_post_conditions.length;
                        var left_side_conditions_html = '';
                        var right_side_conditions_html = '';
                        for(var i = 0; i < response.repair_category_pre_post_conditions.length; i++){
                           if(i % 2 == 0){
                              left_side_conditions_html += '<div class="d-flex d-flex mb-16 align-items-center">';
                                 left_side_conditions_html += '<div class="mr-8 ">'
                                    left_side_conditions_html += '<div class="three-checkbox round">';
                                       left_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-fail" name="'+response.repair_category_pre_post_conditions[i]+'">';
                                       left_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-not-checked" name="'+response.repair_category_pre_post_conditions[i]+'" checked="checked">';
                                       left_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-pass" name="'+response.repair_category_pre_post_conditions[i]+'">';
                                       left_side_conditions_html += '<span class="slider"></span>';
                                    left_side_conditions_html += '</div>';
                                 left_side_conditions_html += '</div>';
                                 left_side_conditions_html += '<div class="switch-detail">';
                                    left_side_conditions_html += response.repair_category_pre_post_conditions[i];
                                 left_side_conditions_html += '</div>';
                              left_side_conditions_html += '</div>';
                           }else{
                              right_side_conditions_html += '<div class="d-flex d-flex mb-16 align-items-center">';
                                 right_side_conditions_html += '<div class="mr-8 ">'
                                    right_side_conditions_html += '<div class="three-checkbox round">';
                                       right_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-fail" name="'+response.repair_category_pre_post_conditions[i]+'">';
                                       right_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-not-checked" name="'+response.repair_category_pre_post_conditions[i]+'" checked="checked">';
                                       right_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-pass" name="'+response.repair_category_pre_post_conditions[i]+'">';
                                       right_side_conditions_html += '<span class="slider"></span>';
                                    right_side_conditions_html += '</div>';
                                 right_side_conditions_html += '</div>';
                                 right_side_conditions_html += '<div class="switch-detail">';
                                    right_side_conditions_html += response.repair_category_pre_post_conditions[i];
                                 right_side_conditions_html += '</div>';
                              right_side_conditions_html += '</div>';
                           }
                        }
                     }
                     $('.left-repair-category-pre-post-conditions').html('').html(left_side_conditions_html);
                     $('.right-repair-category-pre-post-conditions').html('').html(right_side_conditions_html);
                  }
               }
            });
         });
      };
      var handleRepairProblemNextBtn = function(){
         $('body').on('click', '#repair_problem_next_btn', function() {
            var countSelectedProblem = $('.form-check-input-problem').filter(':checked').length;
            var checked_problems = $('.form-check-input-problem').filter(':checked').map(function() {
               return $(this).attr('data-key');
            }).get();
            if(countSelectedProblem > 0) {
               if($('.is_from_labor_category').val() == 1){
                  if($('.repair-step-category-id').val() != '' || $('.repair-step-category-id').val() != undefined){
                     handleRepairDetailsSection('<?php echo session()->get('parent_store_id') ?>','<?php echo session()->get('store_id') ?>',$('.repair-step-category-id').val());
                     openRepairStep(6);
                  }
                  return;
               }
               else{
                  $.ajax({
                     url: "<?php echo base_url('pos/get-repair-part-list'); ?>",
                     type: 'post',
                     dataType: "json",
                     data:{
                        parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                        store_id:'<?php echo session()->get('store_id') ?>',
                        manufacturer_id:$('.repair-step-manufecturer-id').val(),
                        device_id: $('.repair-step-device-id').val(),
                        device_problems:checked_problems.join(","),
                        CSRFToken:$('.txt_csrfname').val()
                     },
                     success: function(response) {
                        var html = '';
                        if(response.bundle_products != '' && response.bundle_products != null){
                           var bundle_products = response.bundle_products.split(',');
                        }
                        if(response.repair_parts != '' && response.repair_parts != null){
                           for(var i = 0; i < response.repair_parts.length; i++){
                              var stock_info = (response.repair_parts[i].stock > 0) ? '<span class="alert-green">In Stock</span>' : '<span class="alert-red">Out of Stock</span>';
                              var checked = ($.inArray(response.repair_parts[i].id, bundle_products) != -1) ? 'checked' : '';
                              html += '<div class="col-md-4 mb-16 has-dropbar"><label for="repair_part_checkbox_'+response.repair_parts[i].id+'" class="d-block label-chk"><div class="box-card d-flex checkbox-card repair-part-div"><div class="checkbox"><div class="form-check"><input class="form-check-input is-valid form-check-input-md" type="checkbox" value="" id="repair_part_checkbox_'+response.repair_parts[i].id+'" '+checked+'/></div></div><div class="box-detail"><h6 class="heading-xsm mb-6">'+response.repair_parts[i].name+'</h6><p class="m-0">Physical Location: 0</p><p class="m-0 repair-part-across-all-store" data-product="'+response.repair_parts[i].id+'" data-store="'+<?php echo session()->get('parent_store_id') ?>+'" data-toggle="modal" data-target="#viewOnHandRepairPart">View on hand across all stores</p><div class="price-box heading-sm d-flex justify-content-between"> <span class="part-price">'+response.repair_parts[i].retail_price+'</span> '+stock_info+' </div></div></div></label><div class="dropdown no-arrow show dropdown-right"><a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"><a href="#" class="link link-primary new-repair-part-special-order"  data-key="'+response.repair_parts[i].id+'"> Special Order</a><a href="#" class="link link-secondary repair-part-edit" data-toggle="modal" data-target="#newRepairPart" data-key="'+response.repair_parts[i].id+'"> Edit</a></div></div></div>';
                           }
                        }
                        $('.repair-category-device-parts-row .repair-category-add-device-part').nextAll().remove();
                        $('.repair-category-device-parts-row .repair-category-add-device-part').after(html);
                     }
                  });
                  openRepairStep(5);
               }
            } else {
               alert('Please select device problem.');
            }
         });
      };
      var handleRepairPartNextBtn = function(){
         $('body').on('click', '#reapir_part_next', function() {
            if($('.repair-step-category-id').val() != '' || $('.repair-step-category-id').val() != undefined){
               handleRepairDetailsSection('<?php echo session()->get('parent_store_id') ?>','<?php echo session()->get('store_id') ?>',$('.repair-step-category-id').val());
               openRepairStep(6);
            }
         });
      };
      var handleRepairDetailsSection = function(parent_store_id,store_id,category_id){
         var checked_device_problems = $('.form-check-input-problem').filter(':checked').map(function() {
               return $(this).attr('data-key');
            }).get();
         $.ajax({
            url: "<?php echo base_url('pos/get-repair-detail-list'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               parent_store_id:parent_store_id,
               store_id:store_id,
               category_id:category_id,
               device_problems:checked_device_problems.join(","),
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               if(response.repair_charges != '' && response.repair_charges != null){
                  $('.repair-detail-repair-charges').val('').val(response.repair_charges);
               }
               $('.repair-detail-warranty-div').html('');
               $('.repair-detail-password-pattern-div').html('');
               $('.repair-detail-device-network-span').html('');
               $('.repair-detail-additional-items').html('');
               $('.repair-detail-custom-fields').html('');
               var custom_field_html = '';
               if(response.repair_category_custom_fields != '' && response.repair_category_custom_fields != null){
                  for(var i = 0; i < response.repair_category_custom_fields.length; i++){
                     var is_required_element = (response.repair_category_custom_fields[i].is_required == 1) ? 'required' : '';
                     var required_element_sign = (response.repair_category_custom_fields[i].is_required == 1) ? '<span class="text-danger">*</span>' : '';
                     if(response.repair_category_custom_fields[i].type == "default" && response.repair_category_custom_fields[i].status == 0){
                        if(response.repair_category_custom_fields[i].slug == "device_network"){
                           var device_network_html = '<div class="form-group mb-24"><label class="mb-8 w-100">Device Network'+required_element_sign+'</label><select class="form-control w-100 repair-details-device-networks '+is_required_element+'" data-placeholder="Select"><option value=""></option></select></div>';

                           $('.repair-detail-device-network-span').html(device_network_html);
                           if(response.networks != null || response.networks != ''){
                              $(".repair-details-device-networks").select2({
                                 data: response.networks
                              });
                           }
                        }
                        if(response.repair_category_custom_fields[i].slug == "warranty_applicable"){
                           var warranty_applicable_html = '<label class="mb-8" style="display: block;">Warranty Applicable'+required_element_sign+'</label><input name="warranty" id="repair_detail_warranty_period" value="" type="text" class="form-control mr-8" style="width:20%;display:inline-block;"><select name="warranty_type" id="repair_detail_warranty_type" class="form-control" style="width: 75% !important;display: inline-block;-webkit-appearance: listbox !important">';
                           if(response.default_warranty_periods != '' && response.default_warranty_periods != null){
                              for(var k = 0; k < response.default_warranty_periods.length; k++){
                                 warranty_applicable_html += '<option value="'+k+'">'+response.default_warranty_periods[k]+'</option>';
                              }
                           }else{
                              warranty_applicable_html += '<option value=""></option>';
                           }

                           warranty_applicable_html += '</select>';
                           $('.repair-detail-warranty-div').html(warranty_applicable_html);
                           $('body #repair_detail_warranty_period').attr('readonly',true);
                        }
                        if(response.repair_category_custom_fields[i].slug == 'additional_items'){
                           if(response.repair_additional_items != null && response.repair_additional_items != ''){
                              var additional_item_html = '';
                              additional_item_html += '<div class="col-md-12 mb-16">';
                                 additional_item_html += '<div class="form-group form-group-textarea">';
                                    additional_item_html += '<label class="mb-8">Additional Items'+required_element_sign+'</label>';
                                    additional_item_html += '<div class="row  p-1 repair-category-additional-items">';
                                       for(var j = 0; j < response.repair_additional_items.length; j++){
                                          additional_item_html += '<div class="col-md-3"><div class="form-check d-flex align-items-center"><input class="form-check-input form-check-input-md mr-8" type="checkbox" value="" id="'+response.repair_additional_items[j]+'"><label class="form-check-label" for="'+response.repair_additional_items[j]+'">'+response.repair_additional_items[j]+'</label></div></div>';
                                       }
                                    additional_item_html += '</div>';
                                 additional_item_html += '</div>';
                              additional_item_html += '</div>';
                              $('.repair-detail-additional-items').html(additional_item_html);
                           }
                        }
                        if(response.repair_category_custom_fields[i].slug == 'password_pattern'){
                           var password_pattern_html = '';
                           password_pattern_html += '<ul class="nav-tabs-col2 pattern-lock" role="tablist">';
                              password_pattern_html += '<li class="nav-item active">';
                                 password_pattern_html += '<a class="nav-link" data-toggle="tab" href="#passcode" role="tab">Passcode</a>';
                              password_pattern_html += '</li>';
                              password_pattern_html += '<li class="nav-item">';
                                 password_pattern_html += '<a class="nav-link"  data-toggle="modal" data-target="#Pattern-lock">Pattern Lock</a>';
                              password_pattern_html += '</li>';
                              password_pattern_html += '</ul>';
                              password_pattern_html += '<div class="tab-content mt-8">';
                                 password_pattern_html += '<div class="tab-pane active" id="passcode" role="tabpanel">';
                                    password_pattern_html += '<div class="form-group">';
                                       password_pattern_html += '<input type="text" class="form-control '+is_required_element+'" id="security_code" placeholder="Enter Passcode" />';
                                    password_pattern_html += '</div>';
                                 password_pattern_html += '</div>';
                                 password_pattern_html += '<div class="tab-pane" id="lock" role="tabpanel"> Pattern Lock </div>';
                              password_pattern_html += '</div>';
                              $('.repair-detail-password-pattern-div').html(password_pattern_html);
                        }
                     }
                     if(response.repair_category_custom_fields[i].type == "custom" && response.repair_category_custom_fields[i].status == 0){
                        custom_field_html += '<div class="col-md-6 mb-16">';
                        custom_field_html += '<div class="form-group mb-24">';
                        if(response.repair_category_custom_fields[i].attribute_type == "text"){
                           custom_field_html += '<label class="mb-8">'+response.repair_category_custom_fields[i].attribute_name+required_element_sign+'</label>';
                           custom_field_html += '<input name="repair_custom_fields['+response.repair_category_custom_fields[i].attribute_name+']" type="text" class="form-control" placeholder="" value="">';
                        }

                        if(response.repair_category_custom_fields[i].attribute_type == "dropdown"){
                           var options = response.repair_category_custom_fields[i].attribute_value.split(',');
                           custom_field_html += '<label class="mb-8">'+response.repair_category_custom_fields[i].attribute_name+required_element_sign+'</label>';
                           custom_field_html += '<select class="form-control  w-100 select" name="repair_custom_fields['+response.repair_category_custom_fields[i].attribute_name+']" data-placeholder="Select">';
                           $.each(options, function (key, val) {
                              custom_field_html += '<option value="'+ val +'">'+ val +'</option>';
                           });
                           custom_field_html += '</select>';
                        }

                        if(response.repair_category_custom_fields[i].attribute_type == "checkbox"){
                           custom_field_html += '<label class="mb-8">'+response.repair_category_custom_fields[i].attribute_name+required_element_sign+'</label>';
                           var options = response.repair_category_custom_fields[i].attribute_value.split(',');
                           custom_field_html += '<div class="row  p-1">';
                           $.each(options, function (key, val) {
                              custom_field_html += '<div class="col-md-6">';
                              custom_field_html += '<div class="form-check d-flex align-items-center">';
                              custom_field_html += '<input type="checkbox" class="form-check-input form-check-input-md mr-8" name="repair_custom_fields['+response.repair_category_custom_fields[i].attribute_name+']" value="0" id="'+val+'">';
                              custom_field_html += '<label class="form-check-label" for="'+val+'">'+val+'</label>';
                              custom_field_html += '</div>';
                              custom_field_html += '</div>';
                           });
                           custom_field_html += '</div>';
                        }
                        if(response.repair_category_custom_fields[i].attribute_type == "calender"){
                           custom_field_html += '<label class="mb-8">'+response.repair_category_custom_fields[i].attribute_name+required_element_sign+'</label>';
                           custom_field_html += '<input name="repair_custom_fields['+response.repair_category_custom_fields[i].attribute_name+']" type="text" class="form-control" placeholder="" value="">';
                        }
                        custom_field_html += '</div></div>';
                     }
                  }
                  $('.repair-detail-custom-fields').html(custom_field_html);
               }
               if(response.repair_categories != null || response.repair_categories != ''){
                  $(".repair-details-repair-categories").select2({
                     data: response.repair_categories
                  });
                  $(".repair-details-repair-categories").val($('.repair-step-category-id').val()).trigger('change');
                  var additional_item_html = '';
                  if(response.repair_category_pre_post_conditions != null || response.repair_category_pre_post_conditions != ''){
                     if(response.repair_category_pre_post_conditions.length > 0){
                        var total_conditions = response.repair_category_pre_post_conditions.length;
                        var left_side_conditions_html = '';
                        var right_side_conditions_html = '';
                        for(var i = 0; i < response.repair_category_pre_post_conditions.length; i++){
                           if(i % 2 == 0){
                              left_side_conditions_html += '<div class="d-flex d-flex mb-16 align-items-center">';
                                 left_side_conditions_html += '<div class="mr-8 ">'
                                    left_side_conditions_html += '<div class="three-checkbox round">';
                                       left_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-fail" name="'+response.repair_category_pre_post_conditions[i]+'">';
                                       left_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-not-checked" name="'+response.repair_category_pre_post_conditions[i]+'" checked="checked">';
                                       left_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-pass" name="'+response.repair_category_pre_post_conditions[i]+'">';
                                       left_side_conditions_html += '<span class="slider"></span>';
                                    left_side_conditions_html += '</div>';
                                 left_side_conditions_html += '</div>';
                                 left_side_conditions_html += '<div class="switch-detail">';
                                    left_side_conditions_html += response.repair_category_pre_post_conditions[i];
                                 left_side_conditions_html += '</div>';
                              left_side_conditions_html += '</div>';
                           }else{
                              right_side_conditions_html += '<div class="d-flex d-flex mb-16 align-items-center">';
                                 right_side_conditions_html += '<div class="mr-8 ">'
                                    right_side_conditions_html += '<div class="three-checkbox round">';
                                       right_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-fail" name="'+response.repair_category_pre_post_conditions[i]+'">';
                                       right_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-not-checked" name="'+response.repair_category_pre_post_conditions[i]+'" checked="checked">';
                                       right_side_conditions_html += '<input type="radio" class="repair-detail-device-condition-pass" name="'+response.repair_category_pre_post_conditions[i]+'">';
                                       right_side_conditions_html += '<span class="slider"></span>';
                                    right_side_conditions_html += '</div>';
                                 right_side_conditions_html += '</div>';
                                 right_side_conditions_html += '<div class="switch-detail">';
                                    right_side_conditions_html += response.repair_category_pre_post_conditions[i];
                                 right_side_conditions_html += '</div>';
                              right_side_conditions_html += '</div>';
                           }
                        }
                     }
                     $('.left-repair-category-pre-post-conditions').html('').html(left_side_conditions_html);
                     $('.right-repair-category-pre-post-conditions').html('').html(right_side_conditions_html);
                  }
               }
               if(response.task_types != null || response.task_types != ''){
                  $('.repair-details-task-types').empty().trigger("change");
                  $(".repair-details-task-types").select2({
                     data: response.task_types
                  });
               }
               $(".repair-detail-select-all-not-checked").prop('checked', true);
               $(".repair-detail-select-all-fail").prop('checked', false);
               $(".repair-detail-select-all-pass").prop('checked', false);
            }
         });
      };
      var handleRepairDevicePrePostConditionCheckUncheck = function(){
         //check uncheck on select all click.
         $(".repair-detail-select-all-fail").change(function(e){
            if(this.checked == true) {
               $('body .repair-detail-device-condition-fail').each(function(i, obj) {
                  $(this).prop('checked', true);
               });
            }
         });
         $(".repair-detail-select-all-pass").change(function(e){
            if(this.checked == true) {
               $('body .repair-detail-device-condition-pass').each(function(i, obj) {
                  $(this).prop('checked', true);
               });
            }
         });
         $(".repair-detail-select-all-not-checked").change(function(e){
            if(this.checked == true) {
               $('body .repair-detail-device-condition-not-checked').each(function(i, obj) {
                  $(this).prop('checked', true);
               });
            }
         });

         $('body').on('change', '.repair-detail-device-condition-not-checked', function() {
            if(this.checked == true) {
                  $(".repair-detail-select-all-not-checked").prop('checked', true);
                  $(".repair-detail-select-all-fail").prop('checked', false);
                  $(".repair-detail-select-all-pass").prop('checked', false);
            }
         });
         $('body').on('change', '.repair-detail-device-condition-fail', function() {
            if(this.checked == true) {
               var total = $('body .repair-detail-device-condition-fail').length;
               var checked = $('body .repair-detail-device-condition-fail').filter(':checked').length;
               if(checked == total){
                  $(".repair-detail-select-all-fail").prop('checked', true);
                  $(".repair-detail-select-all-not-checked").prop('checked', false);
                  $(".repair-detail-select-all-pass").prop('checked', false);
               }else{
                  $(".repair-detail-select-all-not-checked").prop('checked', true);
                  $(".repair-detail-select-all-pass").prop('checked', false);
                  $(".repair-detail-select-all-fail").prop('checked', false);
               }
            }
         });

         $('body').on('change', '.repair-detail-device-condition-pass', function() {
            if(this.checked == true) {
               var total = $('body .repair-detail-device-condition-pass').length;
               var checked = $('body .repair-detail-device-condition-pass').filter(':checked').length;
               if(checked == total){
                  $(".repair-detail-select-all-pass").prop('checked', true);
                  $(".repair-detail-select-all-fail").prop('checked', false);
                  $(".repair-detail-select-all-not-checked").prop('checked', false);
               }else{
                  $(".repair-detail-select-all-not-checked").prop('checked', true);
                  $(".repair-detail-select-all-pass").prop('checked', false);
                  $(".repair-detail-select-all-fail").prop('checked', false);
               }
            }
         });
      };
      var openRepairStep = function(step){
         $('body #repair_steps a[href="#' + step + '"]').trigger('click');
         console.log("Step =>" + step);
      };
      var handleRepairTabs = function(){
         $('#repair_steps').on('click', 'a', function() {
            if($('.is_from_labor_category').val() == 1 && this.id == 'repair_problem_link'){
               $('#repair_category_li').addClass('prev-active');
               $('#repair_problem_li').addClass('prev-active');
               $('#repair_manufecturer_li').removeClass('prev-active');
               $('#repair_device_li').removeClass('prev-active');
            }
            if($('.is_from_labor_category').val() == 1 && this.id == 'repair_detail_link'){
               $('#repair_category_li').addClass('prev-active');
               $('#repair_problem_li').addClass('prev-active');
               $('#repair_manufecturer_li').removeClass('prev-active');
               $('#repair_device_li').removeClass('prev-active');
               $('#repair_part_li').removeClass('prev-active');
            }
         });

         $('body').on('click', '#repair_category_link', function(){
            $(this).parent('li').nextAll().removeClass("prev-active");
         });

         $('body').on('click', '#repair_manufecturer_link', function(){
            if($('.is_from_labor_category').val() == 1 || ($('.repair-step-category-id').val() == '' || $('.repair-step-category-id').val() == undefined)){
               return false;
            }
            $(this).parent('li').prevAll().addClass("prev-active");
            $(this).parent('li').nextAll().removeClass("prev-active");
         });

         $('body').on('click', '#repair_device_link', function(){
            if( $('.is_from_labor_category').val() == 1 || ($('.repair-step-category-id').val() == '' || $('.repair-step-category-id').val() == undefined) || ($('.repair-step-manufecturer-id').val() == '' || $('.repair-step-manufecturer-id').val() == undefined)){
               return false;
            }
            $(this).parent('li').prevAll().addClass("prev-active");
            $(this).parent('li').nextAll().removeClass("prev-active");
         });

         $('body').on('click', '#repair_problem_link', function(){
            if($('.is_from_labor_category').val() == 1 && ( $('.repair-step-category-id').val() == '' || $('.repair-step-category-id').val() == undefined) ){
               return false;
            }
            if( $('.is_from_labor_category').val() == 0 && (($('.repair-step-category-id').val() == '' || $('.repair-step-category-id').val() == undefined) || ($('.repair-step-manufecturer-id').val() == '' || $('.repair-step-manufecturer-id').val() == undefined)  || ($('.repair-step-device-id').val() == '' || $('.repair-step-device-id').val() == undefined)) ){
               return false;
            }
            if($('.is_from_labor_category').val() == 0){
               $(this).parent('li').prevAll().addClass("prev-active");
            }
            $(this).parent('li').nextAll().removeClass("prev-active");
         });

         $('body').on('click', '#repair_part_link', function(){
            if($('.is_from_labor_category').val() == 1){
               return false;
            }
            if( (($('.repair-step-category-id').val() == '' || $('.repair-step-category-id').val() == undefined) || ($('.repair-step-manufecturer-id').val() == '' || $('.repair-step-manufecturer-id').val() == undefined) || ($('.repair-step-device-id').val() == '' || $('.repair-step-device-id').val() == undefined)) || ($('body .form-check-input-problem').filter(':checked').length <= 0) ){
               return false;
            }
            $(this).parent('li').prevAll().addClass("prev-active");
            $(this).parent('li').nextAll().removeClass("prev-active");
         });

         $('body').on('click', '#repair_detail_link', function(){
            if($('.is_from_labor_category').val() == 1){
               if($('body .form-check-input-problem').filter(':checked').length <= 0){
                  return false;   
               }
            }
            if($('.is_from_labor_category').val() == 0){
               if($('body .form-check-input-problem').filter(':checked').length <= 0){
                  return false;   
               }
               if( ($('.repair-step-category-id').val() == '' || $('.repair-step-category-id').val() == undefined) || ($('.repair-step-manufecturer-id').val() == '' || $('.repair-step-manufecturer-id').val() == undefined) || ($('.repair-step-device-id').val() == '' || $('.repair-step-device-id').val() == undefined) ){
                  return false;
               }
            }
            if($('.is_from_labor_category').val() == 0){
               $(this).parent('li').prevAll().addClass("prev-active");
            }
         });
      };
      var handleWarrantyPeriodDropdown = function(){
         var warranty_type = $("body #repair_detail_warranty_type").val();
         $('body').on('change', '#repair_detail_warranty_type', function() {
            var warranty_type_onchange = $("body #repair_detail_warranty_type").val();
            if(warranty_type_onchange=="0" || warranty_type_onchange=="4"){
               $('body #repair_detail_warranty_period').attr('readonly',true);
            } else {
               $('body #repair_detail_warranty_period').attr('readonly',false);
            }
         });
      };
      var handlePOSDeviceTabAllProductsTabClick = function(){
         $('body').on('click', '.product-device-link', function(e) {
            e.preventDefault();
            $.ajax({
                  url: "<?php echo base_url('pos/get-device-all-product-list'); ?>",
                  type: 'post',
                  dataType: "json",
                  data:{
                     parent_store_id:'<?php echo session()->get('parent_store_id') ?>',
                     store_id:'<?php echo session()->get('store_id') ?>',
                     CSRFToken:$('.txt_csrfname').val()
                  },
                  success: function(response) {
                     var html = '';
                     if(response.device_products != '' && response.device_products != null){
                        for(var i = 0; i < response.device_products.length; i++){
                           let color_name = (response.device_products[i].color_name != null) ? response.device_products[i].color_name : '';
                           let color = (color_name != '') ? color_name.toLowerCase() : '';
                           let imei = (response.device_products[i].serial_imei_input_val != null) ? response.device_products[i].serial_imei_input_val+':'+response.device_products[i].serial_or_imei : '';
                           let image = (response.device_products[i].picture != null) ? '<?php echo base_url('uploads/') ?>'+'/'+response.device_products[i].picture : '<?php echo UPLOAD_IMG_PLACEHOLDER ?>';
                           html += '<div class="col-md-6 mb-16 has-dropbar device-tab-all-product">';
                              html += '<div class="box-card category-card device-card">';
                                 html += '<div class="row">';
                                    html += '<div class="col-md-4">';
                                       html += '<figure> <img src="'+image+'" style="max-width:100%;"> </figure>';
                                    html += '</div>';
                                    html += '<div class="col-md-8">';
                                       html += '<div>';
                                          html += '<h6 class="heading-sm">'+response.device_products[i].name+'</h6>';
                                          html += '<p class="heading-xsm m-0">'+imei+'</p>';
                                          html += '<span class="alert-stock">In Stock: 0</span>';
                                          html += '<div class="stock-pricedetail d-flex justify-content-between">';
                                             html += '<div class="">';
                                                html += '<label class="color mr-8" style="background:'+color+';"></label> <span>'+color_name+'</span>';
                                             html += '</div>';
                                             html += '<div class="price-box-wrap"> £'+response.device_products[i].device_price+' </div>';
                                          html += '</div>';
                                       html += '</div>';
                                    html += '</div>';
                                 html += '</div>';
                              html += '</div>';
                              html += '<div class="dropdown no-arrow show dropdown-right">';
                                 html += '<a class="dropdown-toggle" href="#" data-toggle="dropdown"> <i class="fas fa-ellipsis-v fa-sm fa-fw"></i> </a>';
                                 html += '<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">';
                                    html += '<a href="#" class="link link-primary device-tab-product-edit" data-toggle="modal" data-target="#edit-device" data-key="'+response.device_products[i].product_id+'">Edit </a>';
                                    html += '<a href="#" class="link link-secondary device-tab-product-disable" data-toggle="modal" data-target="#disable" data-key="'+response.device_products[i].product_id+'">Disable</a>';
                                 html += '</div>';
                              html += '</div>';
                           html += '</div>';
                        }
                     }
                     $('.devices-all-products-row').html('').html(html);
                  }
               });
         });
      };
      var handleDeviceTabAllProductDisable = function(){
         $("body").on('click','.device-tab-product-disable',function(){
            var btn = $(this);
            bootbox.confirm({
               message: "<?php echo lang('PageText.disable_msg') ?>",
               buttons: {
                  confirm: {
                     label: "<?php echo lang('Buttons.ok') ?>",
                  },
                  cancel: {
                     label: "<?php echo lang('Buttons.cancel') ?>",
                  }
               },
               callback: function (deleteConfirm) {
                  if (deleteConfirm) {
                     var id = btn.attr('data-key');
                     $.ajax({
                        url: "<?php echo base_url('pos/disable-device-all-product-tab'); ?>",
                        type: 'post',
                        dataType: "json",
                        data:{
                           id:id,
                           CSRFToken:$('.txt_csrfname').val()
                        },
                        success: function(response) {
                           if(response.success == 1){
                              $(".device-tab-product-disable").map(function () {
                                 if($(this).data('key') == id){
                                    $(this).parent().parent().parent().remove();
                                 }
                              });
                           }
                        }
                     });
                  }
               }
            });
         });
      };
      var handleDeviceTabAllTabProductSearch = function () {
         $("body").on("keyup",".device-all-product-tab-product-search",function() {
            var value = $(this).val().toLowerCase();
            $(".devices-all-products-row > .device-tab-all-product").filter(function(){
               $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1);
            });
         });
      };
      return {
         init: function () {
            handleCustomerAutoComplete();
            handleCreateCustomer();
            handleCustomerValidations();
            handleSubmitCustomer();
            handleEditCustomer();
            customerModalClose();
            handleManufacturerValidations();
            handleAddManufecturer();
            handleEditManufacturer();
            manufacturerModalClose();
            handleDisableManufacturer();
            handleRepairSteps();
            handleUnlockingOptionChange();
            handleMiscellaneousProductValidations();
            handleCreateMiscellaneousProduct();
            handleSubmitMiscellaneousProduct();
            miscellaneousProductModalClose();
            handleMiscellaneousProductSearch();
            handleUnlockingPriceToggle();
            handleDisableMiscellaneousProduct();
            handleEditMiscellaneousProduct();
            handleCreateUnlockingProduct();
            handleUnlockingProductValidations();
            handleSubmitUnlockingProduct();
            unlockingProductModalClose();
            handleCreateRepairDevice();
            handleRepairDeviceValidations();
            handleAddRepairDevice();
            repairDeviceModalClose();
            handleEditRepairDevice();
            handleDisableRepairDevice();
            handleDisableRepairDeviceIssue();
            handleCreateRepairDeviceIssue();
            repairDeviceIssueModalClose();
            handleRepairDeviceIssueDevicesOnManufecturerChange();
            handleRepairDeviceIssueValidations();
            handleRepairDeviceIssueValidations();
            handleAddRepairDeviceIssue();
            handleEditRepairDeviceIssue();
            handleCreateRepairPart();
            repairPartModalClose();
            handleRepairPartDevicesOnManufecturerChange();
            handleRepairPartValidations();
            handleAddRepairPart();
            handleEditRepairPart();
            handleViewRepairPartOnHandAccrossAllStore();
            handleDisableRepairCategory();
            handleCreateRepairCategory();
            repairCategoryModalClose();
            handleShowHideRepairCategoryManufacturerDeviceTable();
            handleRepairCategoryAddMoreRowWithoutAJAX();
            handleRepairCategoryManufacturerChange();
            handleRepairCategoryRemoveManufacturerDeviceRow();
            handleRepairCategoryValidations();
            handleAddRepairCategory();
            handleEditRepairCategory();
            handleRepairCategoryImageDisplay();
            handleRepairCategoryImageRemove();
            handleCreateRepairPartSpecialOrder();
            handleRepairProblemNextBtn();
            handleRepairPartNextBtn();
            handlePrePostConditionsOnRepairCategoryChange();
            handleRepairDevicePrePostConditionCheckUncheck();
            handleRepairTabs();
            handleWarrantyPeriodDropdown();
            handlePOSDeviceTabAllProductsTabClick();
            handleDeviceTabAllProductDisable();
            handleDeviceTabAllTabProductSearch();
         }
      };
   }();
   jQuery(document).ready(function () {
      POS.init();
   });
</script>
<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function() {
   // make it as accordion for smaller screens
   if(window.innerWidth > 992) {
   document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem) {
   everyitem.addEventListener('mouseover', function(e) {
   let el_link = this.querySelector('a[data-bs-toggle]');
   if(el_link != null) {
   let nextEl = el_link.nextElementSibling;
   el_link.classList.add('show');
   nextEl.classList.add('show');
   }
   });
   everyitem.addEventListener('mouseleave', function(e) {
   let el_link = this.querySelector('a[data-bs-toggle]');
   if(el_link != null) {
   let nextEl = el_link.nextElementSibling;
   el_link.classList.remove('show');
   nextEl.classList.remove('show');
   }
   })
   });
   }
   // end if innerWidth
   });
   // DOMContentLoaded  end
</script>
<!-- HTML files Include script -->
<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function() {
   let e = document.getElementsByTagName("include");
   for (var t = 0; t < e.length; t++) {
   let a = e[t];
   n(e[t].attributes.src.value, function(e) {
   a.insertAdjacentHTML("afterend", e), a.remove()
   })
   }
   function n(e, t) {
   fetch(e).then(e => e.text()).then(e => t(e))
   }
   });
   $( function() {
   // search product
   $( "#search_product" ).autocomplete({
   source: function( request, response ) {
   // Fetch data
   $.ajax({
   url: "get_products.php",
   type: 'post',
   dataType: "json",
   data: {
   search: request.term
   },
   success: function( data ) {
   response( data );
   }
   });
   },
   select: function (event, ui) {
   // Set selection
   $('#search_product').val(ui.item.label); // display the selected text
   $('#selectuser_id').val(ui.item.value); // save selected id to input
   return false;
   },
   create: function () {
      $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
          return $('<li class="">')
              .append('<div>')
              .append('<img class="" src="' + item.img + '" />')                 
              .append(item.label)                
              .append("<div class='link-primary'>Eiger</div>")               
              .append("<div class='sku link-primary'><b>SKU : </b><span>123456789</span><b>Stock :</b><span>Out Of Stock</span></div>")               
              .append("<div class='price'><span >£123</span></div>")               
              .append('</div>')
              .append('</li>')
              .appendTo(ul);
      };
   },
   focus: function(event, ui){
   $( "#search_product" ).val( ui.item.label );
   $( "#selectuser_id" ).val( ui.item.value );
   return false;
   },
   });
   // search Ticket
   $( "#search_ticket" ).autocomplete({
   source: function( request, response ) {
   // Fetch data
   $.ajax({
   url: "get_tickets.php",
   type: 'post',
   dataType: "json",
   data: {
   search: request.term
   },
   success: function( data ) {
   response( data );
   }
   });
   },
   select: function (event, ui) {
   // Set selection
   $('#search_ticket').val(ui.item.label); // display the selected text
   $('#selectuser_id').val(ui.item.value); // save selected id to input
   return false;
   },
   focus: function(event, ui){
   $( "#search_ticket" ).val( ui.item.label );
   $( "#selectuser_id" ).val( ui.item.value );
   return false;
   },
   });
   // search invoice
   $( "#search_invoice" ).autocomplete({
   source: function( request, response ) {
   // Fetch data
   $.ajax({
   url: "get_invoices.php",
   type: 'post',
   dataType: "json",
   data: {
   search: request.term
   },
   success: function( data ) {
   response( data );
   }
   });
   },
   select: function (event, ui) {
   // Set selection
   $('#search_invoice').val(ui.item.label); // display the selected text
   $('#selectuser_id').val(ui.item.value); // save selected id to input
   return false;
   },
   focus: function(event, ui){
   $( "#search_invoice" ).val( ui.item.label );
   $( "#selectuser_id" ).val( ui.item.value );
   return false;
   },
   });
   });
</script>
<!-- Added by bhavesh for pattern lock-->
<script type="text/javascript">
   var e = document.getElementById('pattern_lock_container')
   var lock = new PatternLock(e, {
   onPattern: function() {
   this.success();
   },
   });
   // Get the pattern lock
   $("body").on("click", ".lock_save", function(e){
   $("#security_code").val(lock.getPattern());
   $("#security_code").attr("readonly","true");
   //$('#Pattern-lock').modal('toggle');
   });
   //$('#Pattern-lock').on('shown.bs.modal', function (e) {
   //$("#security_code").val("");
   //$("#security_code").attr("readonly","true");
   //console.log($(this).attr("class"));
   //});
   // Set the Pattern lock value
   /*lock = new PatternLock('#pattern_lock_container',{enableSetPattern : true});
   lock.setPattern('');*/
   
   // hide scroll on html
   document.querySelector("html").style.overflow = "hidden";
   $(document).ready(function() {
   $("input[name$='rd-discount']").click(function() {
   var test = $(this).val();
   $("div.desc").hide();
   $("#desc-am" + test).show();
   });
   });
   // Page Loader
   $(window).on('load',function(){
   setTimeout(function(){ // allowing 3 secs to fade out loader
   $('.page-loader').fadeOut('slow');
   },2000);
   });
</script>
<?php $this->endSection() ?>

