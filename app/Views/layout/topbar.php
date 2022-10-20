<nav class="navbar navbar-expand topbar d-flex justify-content-between">
   <!-- Sidebar Toggle (Topbar) -->
   <div class="col-md-6 d-flex topbar-left align-items-center">
      <div class="nav--toggle--icon">
         <img src="<?php echo base_url('assets/img/menus2.png'); ?>" class="close-icon">        
         <img src="<?php echo base_url('assets/img/menus.png'); ?>" class="open-icon">       
      </div>
      <div class="brand--logo">
         <h4 class="mb-0"><a href="Dashboard.php"><?php echo lang('PageText.brand_logo'); ?></a></h4>
      </div>
      <div class="form-group">
         <input type="hidden" class="storesess_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            ?>
         <select class="form-control" name="topbar_store_id" onchange="add_store_in_session(this.value)" id="topbar_store_id" data-placeholder="">
         <?php if(!empty($all_stores_list)) {
            foreach ($all_stores_list as $allstorekey => $allstorevalue) { ?>
               <option value = "<?php echo $allstorevalue['store_entity_id']; ?>" <?php echo (isset($view_topbar_store_id) && $view_topbar_store_id == $allstorevalue['store_entity_id'])?'selected':''; ?> ><?php echo $allstorevalue['business_name']; ?></option>
            <?php }
         } ?>
         </select>
      </div>
   </div>
   <div class="col-md-6 topbar-right">
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto justify-content-end align-items-center">
         <!-- Nav Item - Search Dropdown (Visible Only XS) -->
         <li class="help-action">
            <a href="NeedHelp.php" class="btn btn-outline-light"><?php echo lang('PageText.need_help'); ?></a>
         </li>
         <div class="topbar-divider d-none d-sm-block"></div>
         <!-- Nav Item - User Information -->
         <li class="nav-item dropdown no-arrow">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="<?php echo base_url('assets/img/square.png'); ?>" /></a>
            <div class="square-dropdown dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in show dot-dropdown" aria-labelledby="alertsDropdown">
               <ul class="list-items">
               
                  <li><a href="<?php echo base_url('store/general-settings'); ?>"><i data-feather="settings"></i><span><?php echo lang('PageText.store_settings'); ?></span></a></li>
                                        
                  <li>
                     <!-- <a href="#" data-toggle="modal" data-target="#CashInOut"><i data-feather="briefcase"></i><span><?php //echo lang('PageText.cash_inout'); ?></span></a> -->
                     <a href="#" id="cashInOutBtn"><i data-feather="briefcase"></i><span><?php echo lang('PageText.cash_inout'); ?></span></a>
                  </li>
                  <li class="text-center">
                     <a href="#" id="startShiftRegisterBtn"><i data-feather="watch"></i><span><?php echo lang('PageText.start_shift'); ?></span></a>
                  </li>
                  <li class="text-center">
                     <a href="#" id="endShiftProcessBtn"><i data-feather="watch"></i>
                        <span><?php echo lang('PageText.end_shift'); ?></span>                     
                    </a>
                  </li>
                  <li><a href="TransactionLog.php"><i data-feather="credit-card"></i><span><?php echo lang('PageText.transaction_log'); ?></span></a></li>
                  <li>
                     <a href="#" id="switchUser"><i data-feather="user"></i><span><?php echo lang('PageText.switch_user'); ?></span></a>
                  </li>
               </ul>
            </div>
         </li>
         <div class="topbar-divider d-none d-sm-block"></div>
         <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="<?php echo base_url('assets/img/bell.png'); ?>" />
               <!-- Counter - Alerts -->
               <span class="badge badge-danger badge-counter">3</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="notification-dropdown dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
               aria-labelledby="alertsDropdown">
               <div class="scroll-primary dropdown-notification">
                  <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                        <div class="icon-circle bg-primary">
                           <i class="fas fa-file-alt text-white"></i>
                        </div>
                     </div>
                     <div>
                        <div class="small">December 12, 2019</div>
                        <span class="font-weight-bold"><?php echo lang('PageText.mon_report_download'); ?></span>
                     </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                        <div class="icon-circle bg-success">
                           <i class="fas fa-donate text-white"></i>
                        </div>
                     </div>
                     <div>
                        <div class="small">December 7, 2019</div>
                        $290.29 <?php echo lang('PageText.deposited_account'); ?>
                     </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                        <div class="icon-circle bg-warning">
                           <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                     </div>
                     <div>
                        <div class="small">December 2, 2019</div>
                        <?php echo lang('PageText.spending_Alert'); ?>
                     </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                        <div class="icon-circle bg-warning">
                           <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                     </div>
                     <div>
                        <div class="small">December 2, 2019</div>
                        <?php echo lang('PageText.spending_Alert'); ?>                     </div>
                  </a>
               </div>
               <a class="dropdown-item text-center small" href="#"><?php echo lang('PageText.all_alerts'); ?></a>
            </div>
         </li>
         <!-- Nav Item - Messages -->
         <div class="topbar-divider d-none d-sm-block"></div>
         <!-- Nav Item - User Information -->
         <li class="nav-item dropdown no-arrow profile-setting">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo base_url('assets/img/User.png'); ?>" />
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
               aria-labelledby="userDropdown">
               <a class="dropdown-item" href="<?php echo site_url('update-profile') ?>">
               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               <?php echo lang('PageText.my_profile'); ?>
               </a>
               <a class="dropdown-item" href="<?php echo base_url('update-password') ?>">
               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                <?php echo lang('PageText.update_pass'); ?>
               </a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="<?php echo base_url('logout') ?>">
               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               <?php echo lang('PageText.logout'); ?>
               </a>
            </div>
         </li>
      </ul>
   </div>
</nav>

<!-- Cash In Out -->
<div class="modal fade" id="CashInOut" tabindex="-1" role="dialog" aria-labelledby="CashInOut" aria-hidden="true">
   <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
   <div class="modal-dialog modal-dialog-centered modal-large" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="mb-0"><?php echo lang('PageText.record_cash_txn'); ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body CashInOut-modal customer-modal">
            <ul class="nav justify-content-center align-items-center mb-5">
               <li class="active">
                  <a href="#CashIn" data-toggle="tab" id="cashin_tab"> <i data-feather="user" class="mr-8"></i> <?php echo lang('PageText.cash_in'); ?> </a>
               </li>
               <li>
                  <a href="#CashOut" data-toggle="tab" id="cashout_tab"><i data-feather="map-pin" class="mr-8"></i><?php echo lang('PageText.cash_out'); ?></a>
               </li>
            </ul>
            <div class="tab-content clearfix">
               <div class="tab-pane active" id="CashIn">
                  <form id="cash_in_form" name="cash_in_form" method="POST">
                     <div class="col-12">
                        <div class="cashin_validation_error">
                        </div>
                     </div>
                     <div class="row">
                        <input type="hidden" id="cashin_type" name="type" value="in">
                        <div class="col-md-6">
                           <div class="form-group mb-24">
                              <label class="mb-8"><?php echo lang('Labels.amount'); ?></label>
                              <input type="text" name="amount" id="cashin_amount" class="form-control" placeholder="<?php echo lang('Placeholders.amount'); ?>">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8"><?php echo lang('Labels.payment_type'); ?></label>
                              <div class="form-group">
                                 <select class="form-control cash-in-out-payment-methods" id="cashin_payment_methods" name="payment_method" data-placeholder="<?php echo lang('Placeholders.select'); ?>">
                                    <option value=""></option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group mb-0">
                              <label class="mb-8"><?php echo lang('Labels.reason'); ?></label>
                              <input type="text" name="reason" id="cashin_reason" class="form-control" placeholder="<?php echo lang('Placeholders.reason'); ?>">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="category-img-upload">
                          
                              <div class="category-img-upload-box text-center mb-3">
                                 <img id="cashin_reference_document" src="<?php echo base_url('assets/img/demo-upload.png'); ?>" id="add-img" alt="Img">
                              </div>
                              <label class="text-danger display-no" id="errormsg" ></label>
                              <div class="d-flex justify-content-between">
                                 <button type="button" onclick="removeReferenceImg('cashin')" class="btn btn-outline-primary btn-xs cashin_removeImgbtn">
                                    <i data-feather="trash" ></i>
                                    <?php echo lang('Buttons.remove_img'); ?>
                                 </button>
                                 <input type="hidden" name="is_img_removed" id="cashin_is_img_removed" value="0" >
                                 <div class="fileUpload btn btn-success btn-xs">
                                    <input type="file" name="cashin_inputFile" id="cashin_inputFile" onchange="readCashinUrl(this)">
                                    <label for="inputFile">
                                       <i data-feather="upload" ></i>
                                       <?php echo lang('Labels.upload_img'); ?>
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary cashin_save"><i data-feather="upload-cloud" class="mr-8 w-18"></i><?php echo lang('Buttons.save'); ?></button>
                        <a href="#" class="btn btn-outline-primary"><i data-feather="eye" class="mr-8 w-18"></i><?php echo lang('PageText.view_history'); ?></a>
                     </div>
                  </form>
               </div>
               <div class="tab-pane" id="CashOut">
                  <form id="cash_out_form" name="cash_out_form" method="POST">
                     <div class="col-12">
                        <div class="cashout_validation_error">
                        </div>
                     </div>
                     <input type="hidden" id="cashout_type" name="type" value="out">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-24">
                              <label class="mb-8"><?php echo lang('Labels.amount'); ?></label>
                              <input type="text" name="amount" id="cashout_amount" class="form-control" placeholder="<?php echo lang('Placeholders.amount'); ?>">
                           </div>
                           <div class="form-group mb-24">
                              <label class="mb-8"><?php echo lang('Labels.payment_type'); ?></label>
                              <div class="form-group">
                                 <select class="form-control cash-in-out-payment-methods" id="cashout_payment_methods" name="payment_method" data-placeholder="<?php echo lang('Placeholders.select'); ?>">
                                    <option value=""></option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group mb-0">
                              <label class="mb-8"><?php echo lang('Labels.reason'); ?></label>
                              <input type="text" name="reason" id="cashout_reason" class="form-control" placeholder="<?php echo lang('Placeholders.reason'); ?>">
                           </div>
                        </div>
                        <div class="col-md-6">
                          <div class="category-img-upload">
                              <div class="category-img-upload-box text-center mb-3">
                                 <img name="reference_document" id="cashout_reference_document" src="<?php echo base_url('assets/img/demo-upload.png'); ?>" id="add-img" alt="Img">
                              </div>
                              <label class="text-danger display-no" id="cashout_errormsg" ></label>
                              <div class="d-flex justify-content-between">
                                 <button type="button" onclick="removeReferenceImg('cashout')" class="btn btn-outline-primary btn-xs cashout_removeImgbtn">
                                   <i data-feather="trash" ></i>
                                   <?php echo lang('Buttons.remove_img'); ?>
                                 </button>
                                 <input type="hidden" name="is_img_removed" id="cashout_is_img_removed" value="0" >
                                 <div class="fileUpload btn btn-success btn-xs">
                                   <input type="file" name="cashout_inputFile" id="cashout_inputFile" onchange="readCashoutUrl(this)">
                                     <label for="inputFile">
                                       <i data-feather="upload" ></i>
                                       <?php echo lang('Labels.upload_img'); ?>
                                     </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                       <div class="text-right mt-4 pt-2">
                        <button class="btn btn-secondary cashout_save"><i data-feather="upload-cloud" class="mr-8 w-18"></i><?php echo lang('Buttons.save'); ?></button>
                        <a href="#" class="btn btn-outline-primary"><i data-feather="eye" class="mr-8 w-18"></i><?php echo lang('PageText.view_history'); ?></a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End popup -->

<!-- Shift Process -->
<div class="modal fade" id="startShiftRegister" tabindex="-1" role="dialog" aria-labelledby="startShiftRegister" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xlarge" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="mb-0"><?php echo lang('PageText.sel_register'); ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="responsive-table data-setting-table ">
              <table id="cashRegisterTable" class="table table-striped center-form-check">
                <thead>
                   <tr>
                      <th scope="col">
                         <h6 class="d-flex justify-content-between align-items-center m-0"><?php echo lang('PageText.register'); ?> </h6>
                      </th>
                      <th scope="col">
                         <h6 class="d-flex justify-content-between align-items-center m-0"><?php echo lang('PageText.status'); ?></h6>
                      </th>
                      <th scope="col">
                         <h6 class="d-flex justify-content-between align-items-center m-0"><?php echo lang('PageText.action'); ?></h6>
                      </th>                          
                   </tr>
                </thead>
                <tbody class="start-shift-table-body">
                </tbody>
              </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End popup -->

<!-- Shift Process -->
<div class="modal fade" id="StartShiftProcess" tabindex="-1" role="dialog" aria-labelledby="StartShiftProcess" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xlarge" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="mb-0 title-cash-register-name"></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="start-shift-process-form">
            <div class="modal-body end-shift-register">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group mb-8 text-left">
                              <label class="mb-8"> <?php echo lang('Labels.store'); ?></label>
                              <div class="form-control cash-register-store-name"></div>
                              <input type="hidden" name="store_id" value="">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group mb-8 text-left">
                              <label class="mb-8"><?php echo lang('Labels.register'); ?></label>
                              <div class="form-control cash-register-name"></div>
                              <input type="hidden" name="register_id" value="">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group mb-16 text-left">
                              <label class="mb-8"><?php echo lang('Labels.pos_name'); ?></label>
                              <div class="form-control cash-register-emp-name"></div>
                              <input type="hidden" name="employee_id" value="">
                           </div>
                        </div>
                         <div class="col-md-3">
                           <div class="form-group mb-16 text-left">
                              <label class="mb-8"><?php echo lang('Labels.start_time'); ?></label>
                              <div class="form-control cash-register-current-time"></div>
                           </div>
                        </div>

                     </div>
                     
                  </div>
                  <div class="col-md-12 payment-detailbox mt-16">
                     <div class="card">                          
                        <div class="count-detail">
                           <div class="row display-currency-row">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mt-5 responsive-table data-setting-table start-shift-table">
                  <table class="table table-striped center-form-check  shift-table">
                     <thead>
                        <tr>
                           <th></th>
                           <th class="text-center">
                              TOTAL AT CLOSE OF PREVIOUS SHIFT
                           </th>
                           <th class="text-center"><?php echo lang('PageText.total_current_shift'); ?></th>                         
                        </tr>
                     </thead>
                     <tbody class="cash-register-balance">
                     </tbody>
                  </table>
               </div>
               <div class="form-group ">
                  <label class="mb-8"><?php echo lang('Labels.note'); ?></label>
                  <textarea name="shift_start_note" class="form-control" maxlength="250" style="resize: none;"></textarea>
                  <p><?php echo lang('PageText.note').': '.lang('PageText.max_char_limit'); ?></p>
               </div>
               <div class="text-right mt-3">
                  <button class="btn btn-secondary btn-xs save-shift-btn"><i data-feather="upload-cloud"></i><?php echo lang('Buttons.start_shift'); ?> </button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- End popup -->

<!-- Shift Process -->
<div class="modal fade" id="endShiftProcess" tabindex="-1" role="dialog" aria-labelledby="endShiftProcess" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-large" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="mb-0 end-shift-cash-register-name"><?php echo lang('PageText.end_shift').' '.lang('PageText.register'); ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form class="end-shift-form">
            <div class="modal-body end-shift-register">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group mb-8 text-left">
                              <label class="mb-8"><?php echo lang('Labels.employee'); ?></label>
                              <div class="form-control end-shift-emp-name"></div>
                              <input type="hidden" name="shift_id">
                              <input type="hidden" name="register_id">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group mb-8 text-left">
                              <label class="mb-8"><?php echo lang('Labels.start_time'); ?></label>
                              <div class="form-control end-shift-start-time"></div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group mb-16 text-left">
                              <label class="mb-8"><?php echo lang('Labels.close_time'); ?></label>
                              <div class="form-control end-shift-close-time"></div>
                           </div>
                        </div>
                     </div>
                     <div>
                        <a href="javascript:void(0)" class="link link-secondary mr-8"> <i data-feather="eye" class="w-18 mr-8"></i><?php echo lang('PageText.view_txn_log'); ?></a>
                        <a href="javascript:void(0)" class="link link-secondary mr-8"> <i data-feather="download" class="w-18 mr-8"></i><?php echo lang('PageText.download_reconcil_report'); ?></a>
                        <a href="javascript:void(0)" class="link link-secondary mr-8"><i data-feather="printer" class="w-18 mr-8"></i><?php echo lang('PageText.print_reconcil_report'); ?></a>
                     </div>
                  </div>
                  <div class="col-md-12 payment-detailbox mt-16">
                     <div class="card">
                        <h6 class="heading-sm mb-3">
                           <?php echo lang('PageText.payment_cnt_hand'); ?>
                        </h6>
                        <div class="count-detail">
                           <div class="row end-shift-display-currency-row">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mt-5 responsive-table data-setting-table ">
                  <span class="text-danger payout-alert" style="font-weight:900;">&nbsp;</span>
                  <table class="table table-striped center-form-check  shift-table">
                     <thead class="end-shift-balance-header">
                     </thead>
                     <tbody class="end-shift-balance">
                        <tr>
                           <td>
                              <h6 class="text-right"><?php echo lang('PageText.cash'); ?></h6>
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled " placeholder="-£1985.10">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="60.00">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£2045.10">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£60.00">
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-right"><?php echo lang('PageText.card'); ?></h6>
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="00">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£2045.10">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£60.00">
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-right"><?php echo lang('PageText.bank_transfer'); ?></h6>
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£2045.10">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£60.00">
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-right"><?php echo lang('PageText.amex'); ?></h6>
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00">
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-right"><?php echo lang('PageText.paypal'); ?></h6>
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£11292.56">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="11292.56">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£2045.10">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£11292.56">
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-right"><?php echo lang('PageText.voucher'); ?></h6>
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control-xs " placeholder="0">
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00">
                           </td>
                        </tr>
                        <tr>
                           <td></td>
                           <td colspan="2">
                              <h6><?php echo lang('PageText.netpos_close_shift'); ?>
                                 <?php echo lang('PageText.overshort'); ?> :
                              </h6>
                           </td>
                           <td class="text-center">
                              <input type="text" class="form-control disabled" placeholder="£0.00" >
                           </td>
                           <td  colspan="2"></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="form-group ">
                  <label class="mb-8"><?php echo lang('Labels.note'); ?></label>
                  <textarea class="form-control" name="shift_end_note" maxlength="250" style="resize: none;"></textarea>
                  <p><?php echo lang('PageText.max_char_limit'); ?></p>
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox-shift" checked="">
                  <label class="form-check-label" for="checkbox-shift"><?php echo lang('Labels.download_report_endshift'); ?></label>
               </div>
               <div class="text-right mt-3">
                  <button class="btn btn-secondary btn-xs end-shift-save-btn"><i data-feather="upload-cloud"></i><?php echo lang('Buttons.end_shift'); ?> </button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- End popup -->
<!-- User switch-->
<div class="modal fade" id="switch-user" tabindex="-1" role="dialog" aria-labelledby="switch-user" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-small" role="document">
      <form class="switch-user-form">
         <div class="modal-content">
            <div class="modal-header">
               <h6 class="mb-0">Switch User</h6>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12 mb-16">
                     <div class="form-group">
                        <label class="mb-8 w-100">Employee Name</label>
                        <select class="form-control w-100 store-employees" name="employee_id" data-placeholder="Select">
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 mb-16">
                     <div class="form-group">
                        <label class="mb-8">Accesspin</label>
                        <input type="password" name="access_pin" class="form-control"  >
                     </div>
                  </div>
               </div>
               <div class="col-md-12 mb-16">
                  <label class="text-danger display-no switch-user-error"></label>
               </div>
               <div class="text-right mt-4 pt-2">
                  <!-- <button class="btn btn-secondary btn-xs save-btn switch-user-btn" data-toggle="modal" data-target="#CreateTickitsave"> -->
                  <button class="btn btn-secondary btn-xs save-btn switch-user-btn">
                  <i data-feather="upload-cloud"></i>Confirm
                  </button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<!-- End popup -->
<?php $this->section('page_specific_js') ?>
<script>
$("select.form-control").select2({
   minimumResultsForSearch: -1,
});
var CashInOut = function () {
   var handleCashIn = function () {
      $('#cash_in_form').validate({
         ignore: [],
         errorClass: 'text-danger',
          focusInvalid: true,
          rules: {
            amount: {
              required: true,
            },
            reason: {
              required: true,
            },
            payment_method: {
              required: true,
            },
          },
          invalidHandler: function (event, validator) {
            $($('#cash_in_form')).show();
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
          }
      });
   };
   var handleCashOut = function () {
      $('#cash_out_form').validate({
         ignore: [],
         errorClass: 'text-danger',
         focusInvalid: true,
         rules: {
            amount: {
              required: true,
            },
            reason: {
              required: true,
            },
            payment_method: {
              required: true,
            },
         },
         invalidHandler: function (event, validator) {
            $($('#cash_out_form')).show();
         },
         highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
         },
         success: function (label) {
            label.closest('.form-group').removeClass('has-error');
            label.remove();
         },
         errorPlacement: function (error, element) {
            if (element.hasClass('select2-hidden-accessible')) {
               error.insertAfter(element.next('span'));
               element.next('span').addClass('error').removeClass('valid');
            }else{
               error.insertAfter(element);
            }
         }
      });
   };
   var handleCashInOutSubmit = function () {
      $('#cash_in_form').submit(function(e){
         e.preventDefault();
         if($('#cash_in_form').valid()){
            $(".validation-error").hide();
            var FormData = $('#cash_in_form').serializeArray();
            FormData.push({name:'reference_document', value: $('#cashin_reference_document').attr('src')},{name:'CSRFToken', value:$('.txt_csrfname').val()});
            jQuery.ajax({
               type : "POST",
               dataType : "json",
               url : "<?php echo base_url('cash_in_out/add') ?>",
               data : FormData,
               success: function(response) {
                  $('.txt_csrfname').val(response.token);
                  if(response.success == 1){
                     handleModalClose();
                  }
                  if(response.validation_error == 1){
                     $(".cashin_validation_error").empty().append(response.html);
                  }
                  if(response.error == 1){
                     $("#alertDanger").show().html('').html(response.message);
                  }      
               },
               error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  alert(errorThrown);
               }
            });
         }
         });
      $('#cash_out_form').submit(function(e){
         e.preventDefault();
         if($('#cash_out_form').valid()){
            $(".validation-error").hide();
            var FormData = $('#cash_out_form').serializeArray();
            FormData.push({name:'reference_document', value: $('#cashout_reference_document').attr('src')},{name:'CSRFToken', value:$('.txt_csrfname').val()});
            jQuery.ajax({
               type : "POST",
               dataType : "json",
               url : "<?php echo base_url('cash_in_out/add') ?>",
               data : FormData,
               success: function(response) {
                  $('.txt_csrfname').val(response.token);
                  if(response.success == 1){
                     handleModalClose();
                  }
                  if(response.validation_error == 1){
                     $(".cashout_validation_error").empty().append(response.html);
                  }
                  if(response.error == 1){
                     $("#alertDanger").show().html('').html(response.message);
                  }
                      
               },
               error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  alert(errorThrown);
               }
            });
          }
      });
   };
   var handleModalClose = function () {
      $('#CashInOut').hide();
      $('#CashInOut').on('hidden.bs.modal', function () {
         $("#cash_in_form").validate().resetForm();
         $("#cash_in_form").trigger('reset');
         $("#cash_out_form").validate().resetForm();
         $("#cash_out_form").trigger('reset');
         $("#cashout_payment_methods").select2();
         $('#cashout_payment_methods').val('');
         $("#cashin_payment_methods").select2();
         $('#cashin_payment_methods').val('');
         $(".cashin_validation_error").empty();
         $(".cashout_validation_error").empty()
      });
      $('.modal-backdrop').remove();
   };
   var handleCashInOutTabClick = function () {
      $('#cashin_tab').on('click',function(){
         $("#cash_out_form").validate().resetForm();
         $("#cash_out_form").trigger('reset');
         $("#cashout_payment_methods").select2();
         $('#cash_out_form #cashout_payment_methods').val('');
         $('#cashout_reference_document').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
         $('.cashout_removeImgbtn').prop('disabled',true);
         $('.cashout_save').prop("disabled",false);
         $(".cashout_validation_error").empty()
      });
      $('#cashout_tab').on('click',function(){
         $("#cash_in_form").validate().resetForm();
         $("#cash_in_form").trigger('reset');
         $("#cashin_payment_methods").select2();
         $('#cash_in_form #cashin_payment_methods').val('');
         $('#cashin_reference_document').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
         $('.cashin_removeImgbtn').prop('disabled',true);
         $('.cashin_save').prop("disabled",false);
         $(".cashin_validation_error").empty();
      });
   };
   var handleSwitchUser = function () {
      $('#switchUser').on('click',function(){
         $.ajax({
            url: "<?php echo base_url('get-store-employees'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               if(response.employees != ''){
                  $(".store-employees").select2({
                     dropdownParent: $("#switch-user .modal-content"),
                     data: response.employees
                  });
                  $('#switch-user').modal('show');
               }
            }
         });
      });
   };
   var handleSwitchUserForm = function () {
      $('.switch-user-form').validate({
         ignore: [],
         errorClass: 'text-danger',
          focusInvalid: true,
          rules: {
            employee_id: {
              required: true,
            },
            access_pin: {
              required: true,
              maxlength:10,
              digits:true
            },
          },
          invalidHandler: function (event, validator) {
            $($('.switch-user-form')).show();
          },
          highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
          },
          success: function (label) {
            label.closest('.form-group').removeClass('has-error');
            label.remove();
          },
          errorPlacement: function (error, element) {
            if (element.hasClass('select2-hidden-accessible')) {
               error.insertAfter(element.next('span'));
               element.next('span').addClass('error').removeClass('valid');
            }else{
               error.insertAfter(element);
            }
          }
      });
   };
   var handleSwitchUserFormSubmit = function () {
      $(".switch-user-btn").click(function(e){
         e.preventDefault();
         $('.switch-user-error').html('');
         var form = $(this).closest('form');
         if (!form.valid()) {
           return;
         }
         var formData = new FormData();
         formData.append('CSRFToken', $('.txt_csrfname').val());
         form.serializeArray().forEach(function (field) {
            if (field.value.trim() != '' || field.value.trim() != null) {
               formData.append(field.name, field.value);
            }
         });
         $.ajax({
            url: "<?php echo base_url('switch-store-employees'); ?>",
            type: 'post',
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
               if(response.success == 1){
                  var current_location = $(location).attr('href').substring($(location).attr('href').lastIndexOf('/') + 1);
                  if(current_location == 'update-profile' || current_location == 'update-profile#'){
                     document.location.reload(true);
                  }
                  $('.switch-user-form .close').trigger('click');
               }
               if(response.success == 0 && response.error == 0){
                  $('.switch-user-error').show().html('').html(response.message);
               }
               if(response.validation_error == 1){
                  $.each(response.message, function (key, val){
                     if(key == 'employee_id'){
                        $('.switch-user-form [name="'+ key +'"]').after(function() {
                           return '<label class="text-danger" for="'+ key +'">' + val + '</label>';
                        });
                     }
                     if(key == 'access_pin'){
                        $('.switch-user-form [name="'+ key +'"]').after(function() {
                           return '<label class="text-danger" for="'+ key +'">' + val + '</label>';
                        });
                     }
                  });
               }
               if(response.success == 0 && response.error == 1){
                  $('.switch-user-error').show().html('').html(response.message);
               }
            }
         });
      });
   };
   var switchUserModalClose = function () {
      $(".switch-user-form .close").click(function(e){
         $('#switch-user').modal('hide');
      });
      $('#switch-user').on('hidden.bs.modal', function () {
         $('.switch-user-form').validate().resetForm();
         $('.switch-user-form').trigger("reset");
         $('.switch-user-error').html('');
      });
   };
   var handleCashRegisterOnStartShift = function () {
      $('#startShiftRegisterBtn').on('click',function(){
         handleCashRegisterListOnStartShift('');
         $('#startShiftRegister').modal('show');
      });
   };
   var handleCashRegisterListOnStartShift = function (search = '') {
      $.ajax({
         url: "<?php echo base_url('get-store-cash-registers'); ?>",
         type: 'post',
         dataType: "json",
         data:{
            search:search,
            CSRFToken:$('.txt_csrfname').val()
         },
         success: function(response) {
            $('.start-shift-table-body').html('');
            var search_val = response.search;
            var fixed_row = '<tr><td><div class="form-group form-icon-end"><input type="text" id="cashRegisterSearch" class="form-control is-valid" value="'+search_val+'" placeholder="<?php echo lang('Placeholders.search_register'); ?>" required=""><i data-feather="search"></i></div></td><td></td><td></td></tr>';
            $('.start-shift-table-body').append(fixed_row);
            feather.replace();
            for(var i = 0; i < response.cash_registers.length; i++){
               var html='';
               var name = response.cash_registers[i].cash_register_name;
               var status_class = (response.cash_registers[i].status == '1') ? 'bg-primary' : 'bg-success';
               var status = (response.cash_registers[i].status == '1') ? '<?php echo lang('PageText.in_use'); ?>' : '<?php echo lang('PageText.open'); ?>';

               var action_text = '<?php echo lang('PageText.start_shift'); ?>';
               var action = (response.cash_registers[i].status == '1') ? '-' : '<a href="#"  id="startShiftProcessBtn" class="link link-secondary d-block" data-key="'+response.cash_registers[i].id+'">'+action_text+'</a>';
               var started_by = '';
               if(response.cash_registers[i].employee_name != null && response.cash_registers[i].start_time != null){
                  started_by = '<p class="mb-0"><strong class="blue"><?php echo lang('PageText.shift_started_by'); ?></strong>'+response.cash_registers[i].employee_name+'</p><p class="mb-0"><strong class="blue"><?php echo lang('PageText.date_time'); ?>:</strong>'+response.cash_registers[i].start_time+'</p>';
               }
               html +='<tr><td><p class="mb-0">'+name+'</p>'+started_by+'</td><td><span class="badge '+status_class+'">'+status+'</span></td><td>'+action+'</td></tr>';
               $('.start-shift-table-body').append(html);
            }
         }
      });
   };
   var handleCashRegisterSearchListOnStartShift = function () {
      $("body").on('change paste','#cashRegisterSearch',function(){
         handleCashRegisterListOnStartShift($(this).val());
      });
   };
   var handleCashRegisterOnStartShiftModalClose = function () {
      $("#startShiftRegister .close").click(function(){
         $('#startShiftRegister').modal('hide');
      });
   };
   var handleStartShiftProcess = function () {
      $("body").on('click','#startShiftProcessBtn',function(){
         $.ajax({
            url: "<?php echo base_url('start-shift-processs'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               id:$(this).attr('data-key'),
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               if(response.cash_register_data.cash_register_name != null){
                  $('.start-shift-process-form [name="register_id"]').val(response.cash_register_data.id);
                  $('.cash-register-name').html('').html(response.cash_register_data.cash_register_name);
                  $('.title-cash-register-name').html('').html('<?php echo lang('PageText.start_shift').' '?>'+response.cash_register_data.cash_register_name);
               }
               if(response.cash_register_data.store_name != null){
                  $('.cash-register-store-name').html('').html(response.cash_register_data.store_name);
                  $('.start-shift-process-form [name="store_id"]').val('<?php echo session()->get('store_id') ?>');
               }
               if(response.employee.name != null){
                  $('.start-shift-process-form [name="employee_id"]').val(response.employee.id);
                  $('.cash-register-emp-name').html('').html(response.employee.name);
               }
               if(response.current_time != null){
                  $('.cash-register-current-time').html('').html(response.current_time);
               }
               $('.display-currency-row').html('');
               for(var i = 0; i < response.cash_drawer_currency_data.length; i++){
                  var currency_html = '';
                  currency_html += '<div class="col-md-2 d-flex align-center mb-2"><label class="label-left">'+response.cash_drawer_currency_data[i].display_currency+'</label><input type="text" name="" value="0" class="form-control form-control-xs int-value currency-input" data-value="'+response.cash_drawer_currency_data[i].value+'"></div>';
                  $('.display-currency-row').append(currency_html);
               }
               $('.cash-register-balance').html('');
               for(var i = 0; i < response.payment_methods.length; i++){
                  var cash_class = (response.payment_methods[i].slug == 'cash') ? "cash-currency" : "";
                  var payment_method_html = '';
                  var previous_shift_closing_balance = (response.payment_methods[i].closing_balance != null) ? response.payment_methods[i].closing_balance : 0;
                  payment_method_html += '<tr><td><h6 class="text-right">'+response.payment_methods[i].payment_method+'</h6></td><td class="text-center"><input type="text" class="form-control disabled payment-open-shift-val" placeholder="'+ previous_shift_closing_balance +'"></td><td class="text-center"><input name="payment_data['+response.payment_methods[i].payment_id+']" type="text" class="form-control-xs payment-val numeric-value '+cash_class+'" placeholder="'+ previous_shift_closing_balance +'" value="'+ previous_shift_closing_balance +'"></td></tr>';
                  $('.cash-register-balance').append(payment_method_html);
               }
               $('#StartShiftProcess').modal('show');
            }
         });
      });
   };
   var handleStartShiftProcessModalClose = function () {
      $("#StartShiftProcess .close").click(function(){
         $('#StartShiftProcess').modal('hide');
      });
      $('#StartShiftProcess').on('hidden.bs.modal', function () {
         $('.start-shift-process-form').validate().resetForm();
         $('.start-shift-process-form').trigger("reset");
      });
   };
   var handleCashBalanceCalculationOnStartShiftModalOpen = function () {
      $("body").on('click','.currency-input',function(){
         if($(this).val() == 0){
            $(this).val('');
         }
      });
      $("body").on('blur','.currency-input',function(){
         if($(this).val() == ''){
            $(this).val(0);
         }
      });
      $("body").on('click change','.payment-val',function(){
         if($(this).val() == ''){
            $(this).val($(this).attr('placeholder'));
         }
      });
      $("body").on('change paste','.currency-input',function(){
         var cash_currency = 0;
         $(".currency-input").map(function () {
            if($(this).val() != '' &&  $(this).val() > 0 ){
               if($(this).closest('.currency-div').find('.currency-input-val').length == 1){
                  $(this).closest('.currency-div').find('.currency-input-val').html('£'+$(this).val() * $(this).attr('data-value'));
               }
               cash_currency = cash_currency + parseFloat($(this).val() * $(this).attr('data-value'));
            }
         });
         $('.cash-currency').val(cash_currency);
         $('.end-cash-currency').val(cash_currency);
         $('.end-cash-currency').trigger('change');
         $('.end-shift-balance .payout').trigger('change');
      });
   };
   var handleStartShiftFormSubmit = function () {
      $(".save-shift-btn").click(function(e){
         e.preventDefault();
         var form = $(this).closest('form');
         var formData = new FormData();
         formData.append('CSRFToken', $('.txt_csrfname').val());
         form.serializeArray().forEach(function (field) {
            if (field.value.trim() != '' || field.value.trim() != null) {
               formData.append(field.name, field.value);
            }
         });
         $.ajax({
            url: "<?php echo base_url('start-shift'); ?>",
            type: 'post',
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
               if(response.success == 1){
                  $('#startShiftRegister').modal('hide');
                  $('#StartShiftProcess').modal('hide');
                  document.location.reload(true);
               }
            }
         });
      });
   };
   var handleEndShiftProcess = function () {
      $('#endShiftProcessBtn').on('click',function(){
         $.ajax({
            url: "<?php echo base_url('end-shift-processs'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               if(response.employee_shift_data.cash_register_name != null){
                  $('.end-shift-cash-register-name').html('').html('<?php echo lang('PageText.end_shift').' '?>'+response.employee_shift_data.cash_register_name);
               }
               if(response.start_time != null){
                  $('.end-shift-start-time').html('').html(response.start_time);
               }
               if(response.employee_shift_data.employee_name != null){
                  $('.end-shift-emp-name').html('').html(response.employee_shift_data.employee_name);
                   $('.end-shift-form [name="shift_id"]').val(response.employee_shift_data.latest_shift_id);
                   $('.end-shift-form [name="register_id"]').val(response.employee_shift_data.register_id);
               }
               if(response.current_time != null){
                  $('.end-shift-close-time').html('').html(response.current_time);
               }
               $('.end-shift-display-currency-row').html('');
               for(var i = 0; i < response.cash_drawer_currency_data.length; i++){
                  var currency_html = '';
                  currency_html += '<div class="col-md-4 d-flex align-center mb-2 currency-div"><label class="label-left">'+response.cash_drawer_currency_data[i].display_currency+'</label><input type="text" name="" value="0" class="form-control form-control-xs int-value currency-input" data-value="'+response.cash_drawer_currency_data[i].value+'"><label class="label-right currency-input-val">£0.00</label></div>';
                  $('.end-shift-display-currency-row').append(currency_html);
               }
               $('.end-shift-balance').html('');
               $('.end-shift-balance-header').html('');
               var difference_over_short_header_html = '';
               var display_over_sort_row = '';
               if(response.employee_shift_data.hide_short_balance_on_closing_shift == '0'){
                  difference_over_short_header_html += '<th class="text-center"><?php echo lang('PageText.difference'); ?><?php echo lang('PageText.over_short'); ?></th>';
                  display_over_sort_row = 'display-diff-col-yes';
               }else{
                  display_over_sort_row = 'display-diff-col-no';
               }
               var ends_hift_header_html = '<tr><th></th><th class="text-center"><span><?php echo lang('PageText.net_payment'); ?></span><span> <?php echo lang('PageText.collection_plus'); ?></span><span> <?php echo lang('PageText.opening_balance'); ?></span></th><th class="text-center"><?php echo lang('PageText.total_current_shift'); ?></th>'+difference_over_short_header_html+'<th class="text-center"><?php echo lang('PageText.payout_withdraw'); ?></th><th class="text-center"><?php echo lang('PageText.closing'); ?><?php echo lang('PageText.balance'); ?></th></tr>';
               $('.end-shift-balance-header').append(ends_hift_header_html);
               for(var i = 0; i < response.payment_methods.length; i++){
                     var difference_over_short_html = '';
                     difference_over_short_html += '<td class="text-center '+display_over_sort_row+'"><input name="payment_difference_balance['+response.payment_methods[i].id+']" type="text" class="form-control disabled balance-difference" placeholder="'+response.payment_methods[i].opening_verified_balance+'" value="0"></td>';
                  var payment_method_html = '';
                  var cash_class = (response.payment_methods[i].slug == 'cash') ? "end-cash-currency" : "";
                  payment_method_html += '<tr class="payment-method-rows"><td><h6 class="text-right">'+response.payment_methods[i].payment_method+'</h6></td><td class="text-center"><input type="text" class="form-control disabled net-opening-balance" placeholder="'+response.payment_methods[i].opening_verified_balance+'" value="'+response.payment_methods[i].opening_verified_balance+'"></td><td class="text-center"><input type="text" name="payment_verified_balance['+response.payment_methods[i].id+']" class="form-control-xs end-verified-balance numeric-value '+cash_class+'" placeholder="'+response.payment_methods[i].opening_verified_balance+'" value="'+response.payment_methods[i].opening_verified_balance+'"></td>'+difference_over_short_html+'<td class="text-center"><input type="text"  name="payment_payout_withdraw['+response.payment_methods[i].id+']" class="form-control-xs payout numeric-value" placeholder="0" value="'+response.payment_methods[i].payout_withdraw+'"></td><td class="text-center"><input type="text" name="payment_closing_balance['+response.payment_methods[i].id+']" class="form-control disabled closing-balance" placeholder="'+response.payment_methods[i].opening_verified_balance+'" value="'+response.payment_methods[i].opening_verified_balance+'"></td></tr>';
                  $('.end-shift-balance').append(payment_method_html);
               }
               var style_ = (response.employee_shift_data.hide_short_balance_on_closing_shift == '0') ? 'contents' : 'none';
               var other_payment_html = '<tr style="display:'+style_+';"><td style="border:0"></td><td colspan="2" style="border:0"><h6><?php echo lang('PageText.netpos_close_shift'); ?><?php echo lang('PageText.overshort'); ?> : </h6></td><td class="text-center" style="border:0"><input type="text" name="total_difference" class="form-control disabled total-balance-difference" placeholder="£0.00" value="0"></td><td  colspan="2" style="border:0"></td></tr>';
               $('.end-shift-balance').append(other_payment_html);
               $('#endShiftProcess').modal('show');
            }
         });
      });
   };
   var handleEndShiftProcessModalClose = function () {
      $("#endShiftProcess .close").click(function(){
         $('#endShiftProcess').modal('hide');
      });
      $('#endShiftProcess').on('hidden.bs.modal', function () {
         $('.end-shift-form').validate().resetForm();
         $('.end-shift-form').trigger("reset");
      });
   };
   var handleEndShiftClosingBalanceCalculation = function(){
      $("body").on('click','.payout',function(){
         if($(this).val() == 0){
            $(this).val('');
         }
      });
      $("body").on('blur','.payout',function(){
         if($(this).val() == ''){
            $(this).val(0);
         }
      });
      $("body").on('change paste','.payout',function(){
         var payout_val = $(this).val();
         if($(this).closest('.payment-method-rows').find('.end-verified-balance').length == 1){
            var end_verified_balance = $(this).closest('.payment-method-rows').find('.end-verified-balance').val();
            if(parseFloat(end_verified_balance) < parseFloat($(this).val())){
               $('.end-shift-save-btn').attr('disabled',true);
               $('.payout-alert').html('').html('<?php echo lang('Validation.payout_validation'); ?>');
            }
            if(parseFloat(end_verified_balance) > parseFloat($(this).val())){
               if($(this).closest('.payment-method-rows').find('.closing-balance').length == 1){
                  $('.end-shift-save-btn').attr('disabled',false);
                  $('.payout-alert').html('').html('&nbsp;');
                  $(this).closest('.payment-method-rows').find('.closing-balance').val(parseFloat(end_verified_balance) - parseFloat($(this).val()));
               }
            }
         }
      });

      $("body").on('change paste','.end-verified-balance',function(){
         if($(this).val() == ''){
            $(this).val($(this).attr('placeholder'));
         }
         if($(this).closest('.payment-method-rows').find('.balance-difference').length == 1){
            $(this).closest('.payment-method-rows').find('.balance-difference').val(parseFloat($(this).val()) - parseFloat($(this).closest('.payment-method-rows').find('.net-opening-balance').val()));
            // $(this).closest('.payment-method-rows').find('.closing-balance').val($(this).val());
         }
         $(this).closest('.payment-method-rows').find('.closing-balance').val($(this).val());
         var balance_difference = 0;
         $(".balance-difference").map(function () {
            balance_difference = parseFloat(balance_difference) + parseFloat($(this).val());
         });
         if($(this).closest('.payment-method-rows').find('.payout').length == 1){
            $(this).closest('.payment-method-rows').find('.payout').trigger('change');
         }
        $('.total-balance-difference').val(balance_difference);
      });
   };
   var handleEndShiftFormSubmit = function () {
      $(".end-shift-save-btn").click(function(e){
         e.preventDefault();
         var form = $(this).closest('form');
         var formData = new FormData();
         formData.append('CSRFToken', $('.txt_csrfname').val());
         form.serializeArray().forEach(function (field) {
            if (field.value.trim() != '' || field.value.trim() != null) {
               formData.append(field.name, field.value);
            }
         });
         $.ajax({
            url: "<?php echo base_url('end-shift'); ?>",
            type: 'post',
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
               if(response.success == 1){
                  $('#endShiftProcess').modal('hide');
                  $('#endShiftProcess').modal('hide');
                  document.location.reload(true);
               }
            }
         });
      });
   };
   var handleCashInOutModalShow = function () {
      $('#cashInOutBtn').on('click',function(){
         $.ajax({
            url: "<?php echo base_url('get-payment-methods'); ?>",
            type: 'post',
            dataType: "json",
            data:{
               CSRFToken:$('.txt_csrfname').val()
            },
            success: function(response) {
               $(".cash-in-out-payment-methods").select2({
                  dropdownParent: $("#CashInOut .modal-content"),
                  data: response.payment_methods
               });
               $('#CashInOut').modal('show');
            }
         });
      });
   };
   var handleCashInOutModalClose = function () {
      $("#CashInOut .close").click(function(e){
         $('#CashInOut').modal('hide');
      });
      $('#CashInOut').on('hidden.bs.modal', function () {
         $('#cash_in_form').validate().resetForm();
         $('#cash_in_form').trigger("reset");
      });
   };
   return {
      init: function () {
         handleCashIn();
         handleCashOut();
         handleCashInOutSubmit();
         handleModalClose();
         handleCashInOutTabClick();
         handleSwitchUser();
         handleSwitchUserForm();
         handleSwitchUserFormSubmit();
         switchUserModalClose();
         handleCashRegisterOnStartShift();
         handleCashRegisterSearchListOnStartShift();
         handleCashRegisterOnStartShiftModalClose();
         handleStartShiftProcess();
         handleCashBalanceCalculationOnStartShiftModalOpen();
         handleStartShiftFormSubmit();
         handleStartShiftProcessModalClose();
         handleEndShiftProcess();
         handleEndShiftProcessModalClose();
         handleEndShiftClosingBalanceCalculation();
         handleEndShiftFormSubmit();
         handleCashInOutModalShow();
         handleCashInOutModalClose();
      }
   };
}();
jQuery(document).ready(function () {
    CashInOut.init();
});
function readCashinUrl(input){
   var fileInput = document.getElementById('cashin_inputFile');
   //var filePath = fileInput.value;
   var filePath = input.value;
   var extension = filePath.substr((filePath.lastIndexOf('.') + 1)).toLowerCase();
   var file_size = fileInput.size;

   if(input.files[0].size <= 512000){ // 500 KB
      if(extension == 'png' || extension == 'jpg' || extension == 'jpeg' || extension == 'gif') {
         $('.cashin_save').prop("disabled",false);
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               $('#cashin_reference_document').attr('src', e.target.result);
               $('#errormsg').html('').hide();
               $('#cashin_is_img_removed').val('0');
            }
            reader.readAsDataURL(input.files[0]);
            $('.cashin_removeImgbtn').prop('disabled',false);
         }
      } else{
         $('#cashin_reference_document').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
         $('#errormsg').html("<?php echo lang('Validation.img_allow'); ?>").show();
         $('.cashin_save').prop("disabled",true);
         $('#cashin_is_img_removed').val('0');
         $('#cashin_inputFile').val('');
      }
   }else{
      $('#cashin_reference_document').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
      $('#errormsg').html("<?php echo lang('Validation.file_size_msg'); ?>").show();
      $('.cashin_save').prop("disabled",true);
      $('#cashin_is_img_removed').val('0');
      $('#cashin_inputFile').val('');
   }
}
function readCashoutUrl(input){
   var fileInput = document.getElementById('cashout_inputFile');
   //var filePath = fileInput.value;
   var filePath = input.value;
   var extension = filePath.substr((filePath.lastIndexOf('.') + 1)).toLowerCase();
   var file_size = fileInput.size;

   if(input.files[0].size <= 512000){ // 500 KB
      if(extension == 'png' || extension == 'jpg' || extension == 'jpeg' || extension == 'gif') {
         $('.cashout_save').prop("disabled",false);
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               $('#cashout_reference_document').attr('src', e.target.result);
               $('#cashout_errormsg').html('').hide();
               $('#cashout_is_img_removed').val('0');
            }
            reader.readAsDataURL(input.files[0]);
            $('.cashout_removeImgbtn').prop('disabled',false);
         }
      } else{
         $('#cashout_reference_document').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
         $('#cashout_errormsg').html("<?php echo lang('Validation.img_allow'); ?>");
         $('#cashout_errormsg').show();
         $('.cashout_save').prop("disabled",true);
         $('#cashout_is_img_removed').val('0');
         $('#cashout_inputFile').val('');
      }
   }else{
      $('#cashout_reference_document').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
      $('#cashout_errormsg').html("<?php echo lang('Validation.file_size_msg'); ?>").show();
      $('.cashout_save').prop("disabled",true);
      $('#cashout_is_img_removed').val('0');
      $('#cashout_inputFile').val('');
   }
}
function removeReferenceImg(cash_type) {
   if(cash_type=='cashin'){
      $('#cashin_reference_document').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
      $('#cashin_inputFile').val('');
      $('#cashin_is_img_removed').val('1');
      $('.cashin_removeImgbtn').prop('disabled',true);
   }else if(cash_type=='cashout'){
      $('#cashout_reference_document').attr('src', '<?php echo base_url(UPLOAD_IMG_PLACEHOLDER) ?>');
      $('#cashout_inputFile').val('');
      $('#cashout_is_img_removed').val('1');
      $('.cashout_removeImgbtn').prop('disabled',true);
   }
}
</script>
<?php $this->endSection() ?>