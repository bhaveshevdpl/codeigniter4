<?php 
    //$uri = new \CodeIgniter\HTTP\URI('http://repair4xdev.com/stock/repairs-list');
    $uri = current_url(true);
    /*$pos_access = checkRolePermission('pos_access'); 
    $ticket_access = checkRolePermission('ticket_access'); 
    $invoices_access = checkRolePermission('invoices_access');
    $customers_access = checkRolePermission('customers_access');
    $customer_group_access = checkRolePermission('customer_group_access');
    $inventory_access = checkRolePermission('inventory_access');
    $transfer_inventory_access = checkRolePermission('transfer_inventory_access');
    $stock_count_access = checkRolePermission('stock_count_access');
    $purchase_orders_access = checkRolePermission('purchase_orders_access');
    $good_received_notes_access = checkRolePermission('good_received_notes_access');
    $rma_access = checkRolePermission('rma_access');
    $lead_access = checkRolePermission('lead_access');
    $supplier_access = checkRolePermission('supplier_access');
    $settings_store_manage_stores_access = checkRolePermission('settings_store_manage_stores_access');
    $manage_employee_access = checkRolePermission('manage_employee_access');
    $employees_employee_commissions_access = checkRolePermission('employees_employee_commissions_access');
    $settings_employees_manage_roles_access = checkRolePermission('settings_employees_manage_roles_access');
    $settings_module_configurations_how_did_you_hear_about_us_access = checkRolePermission('settings_module_configurations_how_did_you_hear_about_us_access');
    $module_configurations_manage_manufacturer_access = checkRolePermission('module_configurations_manage_manufacturer_access');
    $module_configurations_manage_devices_access = checkRolePermission('module_configurations_manage_devices_access');
    $module_configurations_manage_repair_categories_access = checkRolePermission('module_configurations_manage_repair_categories_access');
    $module_configurations_manage_product_categories_access = checkRolePermission('module_configurations_manage_product_categories_access');
    $module_configurations_manage_network_access = checkRolePermission('module_configurations_manage_network_access');
    $module_configurations_manage_device_colors_access = checkRolePermission('module_configurations_manage_device_colors_access');
    $module_configurations_manage_task_types_access = checkRolePermission('module_configurations_manage_task_types_access');
    $module_configurations_manage_product_conditions_access = checkRolePermission('module_configurations_manage_product_conditions_access');
    $module_configurations_manage_device_memory_size_access = checkRolePermission('module_configurations_manage_device_memory_size_access');
    $settings_order_status_ticket_status_access = checkRolePermission('settings_order_status_ticket_status_access');
    $settings_order_status_purchase_order_status_access = checkRolePermission('settings_order_status_purchase_order_status_access');
    $settings_order_status_stock_transfer_status_access = checkRolePermission('settings_order_status_stock_transfer_status_access');
    $settings_order_status_lead_status_access = checkRolePermission('settings_order_status_lead_status_access');
    $settings_settings_tax_configuration_access = checkRolePermission('settings_settings_tax_configuration_access');
    $cash_bases_reports_access = checkRolePermission('cash_bases_reports_access');
    $settings_store_general_settings = checkRolePermission('settings_store_general_settings');
    $settings_store_franchise_fee_setup = checkRolePermission('settings_store_franchise_fee_setup');
    $settings_module_configurations_gdpr = checkRolePermission('settings_module_configurations_gdpr');
    $settings_module_configurations_pos = checkRolePermission('settings_module_configurations_pos');
    $settings_module_configurations_invoices = checkRolePermission('settings_module_configurations_invoices');
    $settings_module_configurations_tickets = checkRolePermission('settings_module_configurations_tickets');
    $settings_module_configurations_leads = checkRolePermission('settings_module_configurations_leads');
    $settings_module_configurations_stock = checkRolePermission('settings_module_configurations_stock');
    $settings_module_configurations_stock_count = checkRolePermission('settings_module_configurations_stock_count');
    $settings_module_configurations_repairs = checkRolePermission('settings_module_configurations_repairs');
    $settings_module_configurations_unlocking = checkRolePermission('settings_module_configurations_unlocking');
    $settings_module_configurations_purchase_order = checkRolePermission('settings_module_configurations_purchase_order');
    $settings_module_configurations_rma = checkRolePermission('settings_module_configurations_rma');
    $settings_module_configurations_receipt = checkRolePermission('settings_module_configurations_receipt');
    $settings_module_configurations_label_size = checkRolePermission('settings_module_configurations_label_size');
    $settings_module_configurations_template_editor = checkRolePermission('settings_module_configurations_template_editor');
    $settings_cash_register = checkRolePermission('settings_cash_register');
    $settings_employees_manage_roles_permission = checkRolePermission('settings_employees_manage_roles_permission');
    $settings_employees_manage_security_checks = checkRolePermission('settings_employees_manage_security_checks');
    $module_configurations_manage_repair_categories_pre_post_device_condition = checkRolePermission('module_configurations_manage_repair_categories_pre_post_device_condition');
    $module_configurations_manage_repair_categories_additional_items = checkRolePermission('module_configurations_manage_repair_categories_additional_items');*/
    $pos_access = true;
    $invoices_access  = true;
    $ticket_access   = true;
    $lead_access    = true;
    $purchase_orders_access    = true;
    $good_received_notes_access    = true;
    $rma_access    = true;
    $customers_access    = true;
    $customer_group_access     = true;
    $inventory_access      = true;
    $transfer_inventory_access     = true;
    $stock_count_access      = true;
    $settings_store_general_settings      = true;
    $settings_store_manage_stores_access      = true;
    $settings_store_franchise_fee_setup       = true;
    $manage_employee_access       = true;
    $employees_employee_commissions_access       = true;
    $settings_employees_manage_roles_access      = true;
    $settings_employees_manage_roles_permission      = true;
    $settings_employees_manage_security_checks       = true;
    $settings_module_configurations_gdpr      = true;
    $settings_module_configurations_pos       = true;
    $settings_module_configurations_invoices       = true;
    $settings_module_configurations_tickets       = true;
    $settings_module_configurations_stock        = true;
    $settings_module_configurations_stock_count        = true;
    $settings_module_configurations_repairs        = true;
    $settings_module_configurations_unlocking        = true;
    $settings_module_configurations_purchase_order        = true;
    $settings_module_configurations_rma        = true;
    $settings_module_configurations_receipt         = true;
    $settings_module_configurations_template_editor         = true;
    $settings_module_configurations_label_size         = true;
    $settings_module_configurations_how_did_you_hear_about_us_access         = true;
    $module_configurations_manage_repair_categories_pre_post_device_condition         = true;
    $module_configurations_manage_repair_categories_additional_items         = true;
    $module_configurations_manage_devices_access         = true;
    $module_configurations_manage_manufacturer_access          = true;
    $module_configurations_manage_repair_categories_access          = true;
    $module_configurations_manage_product_categories_access          = true;
    $module_configurations_manage_repair_categories_additional_items         = true;
    $module_configurations_manage_repair_categories_additional_items         = true;
    $supplier_access = true;
    $module_configurations_manage_repair_categories_additional_items         = true;

?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <?php if($pos_access){ ?>
        <li class="nav-item <?php echo ($uri->getSegment(1)=='home') ? 'active':''; ?>">
            <a class="nav-link" href="<?php echo base_url('home'); ?>">
                <div class="nav-icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 26.0003V20.0003C19 19.7351 18.8946 19.4807 18.7071 19.2932C18.5196 19.1056 18.2652 19.0003 18 19.0003H14C13.7348 19.0003 13.4804 19.1056 13.2929 19.2932C13.1054 19.4807 13 19.7351 13 20.0003V26.0003C13 26.2655 12.8946 26.5198 12.7071 26.7074C12.5196 26.8949 12.2652 27.0003 12 27.0003H6C5.73478 27.0003 5.48043 26.8949 5.29289 26.7074C5.10536 26.5198 5 26.2655 5 26.0003V14.4378C5.00224 14.2994 5.03215 14.1628 5.08796 14.0362C5.14378 13.9095 5.22437 13.7953 5.325 13.7003L15.325 4.61277C15.5093 4.44412 15.7501 4.35059 16 4.35059C16.2499 4.35059 16.4907 4.44412 16.675 4.61277L26.675 13.7003C26.7756 13.7953 26.8562 13.9095 26.912 14.0362C26.9679 14.1628 26.9978 14.2994 27 14.4378V26.0003C27 26.2655 26.8946 26.5198 26.7071 26.7074C26.5196 26.8949 26.2652 27.0003 26 27.0003H20C19.7348 27.0003 19.4804 26.8949 19.2929 26.7074C19.1054 26.5198 19 26.2655 19 26.0003Z"stroke="#A6A6A6"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="heading-sm"><?php echo lang('PageText.pos'); ?></span>
            </a>
        </li>
    <?php } ?>
    <?php if($invoices_access || $ticket_access || $lead_access){ ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#RepairsNavigation" aria-expanded="true" aria-controls="RepairsNavigation">
                <div class="nav-icon">
                    <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.6221 32.8994C26.5716 33.9249 26.1286 34.8918 25.3849 35.5997C24.6412 36.3077 23.6537 36.7025 22.627 36.7025C21.6002 36.7025 20.6127 36.3077 19.869 35.5997C19.1253 34.8918 18.6823 33.9249 18.6318 32.8994L18.6318 13.1004C18.6823 12.0748 19.1253 11.108 19.869 10.4C20.6127 9.69208 21.6002 9.29723 22.627 9.29723C23.6537 9.29723 24.6412 9.69208 25.3849 10.4C26.1286 11.108 26.5716 12.0748 26.6221 13.1004L26.6221 32.8994Z"stroke="#A6A6A6"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                        <path d="M12.7275 26.995C11.7019 26.9445 10.7351 26.5015 10.0271 25.7578C9.31916 25.0141 8.92431 24.0267 8.92431 22.9999C8.92431 21.9731 9.31916 20.9856 10.0271 20.2419C10.7351 19.4982 11.7019 19.0553 12.7275 19.0047H32.5264C33.552 19.0553 34.5188 19.4982 35.2268 20.2419C35.9347 20.9856 36.3296 21.9731 36.3296 22.9999C36.3296 24.0267 35.9347 25.0141 35.2268 25.7578C34.5188 26.5015 33.552 26.9445 32.5264 26.995H12.7275Z"stroke="#A6A6A6"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                        <path opacity="0.5"d="M22.9805 22.6464C22.7852 22.4511 22.4687 22.4511 22.2734 22.6464C22.0781 22.8416 22.0781 23.1582 22.2734 23.3535C22.4687 23.5487 22.7852 23.5487 22.9805 23.3535C23.1758 23.1582 23.1758 22.8416 22.9805 22.6464Z"stroke="white"stroke-opacity="0.65"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                        <path d="M23.6876 21.9391C23.1018 21.3533 22.1521 21.3533 21.5663 21.9391C20.9805 22.5249 20.9805 23.4746 21.5663 24.0604C22.1521 24.6462 23.1018 24.6462 23.6876 24.0604C24.2734 23.4746 24.2734 22.5249 23.6876 21.9391Z"fill="#A6A6A6"/>
                    </svg>
                </div>
                <span class="heading-sm"><?php echo lang('PageText.repairs'); ?></span>
            </a>
            <div  id="RepairsNavigation" class="collapse sub-navigation scroll-primary" data-parent="#accordionSidebar">
                <div class="navigation-box bg-white py-2 collapse-inner rounded">
                    <div class="accordion accordion-flush" id="RepairsSubNavigation">
                        <?php if($invoices_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button" href="ManageInvoices.php"><i data-feather="file-text"></i> <?php echo lang('PageText.manage_invoices'); ?></a>
                                </h2>
                            </div>
                        <?php } ?>
                        <?php if($ticket_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button" href="ManageTickets.php"><i data-feather="bookmark"></i> <?php echo lang('PageText.manage_tickets'); ?></a>
                                </h2>
                            </div>
                        <?php } ?>
                        <?php if($lead_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button" href="<?php echo base_url('repairs/leads-list'); ?>"><i data-feather="headphones"></i> <?php echo lang('PageText.manage_leads'); ?></a>
                                </h2>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </li>
    <?php } ?>
    <?php if($purchase_orders_access || $good_received_notes_access){ ?>
        <li class="nav-item <?php echo ($uri->getSegment(1)=='purchaseorder') ? 'active':''; ?> ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#PurchaseorderNav" aria-expanded="true" aria-controls="PurchaseorderNav">
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#A6A6A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                </div>
                <span class="heading-sm"><?php echo lang('PageText.purchase_order'); ?></span>
            </a>
            <div  id="PurchaseorderNav" class="collapse sub-navigation scroll-primary" data-parent="#accordionSidebar">
                <div class="navigation-box bg-white py-2 collapse-inner rounded">
                    <div class="accordion accordion-flush" id="RepairsSubNavigation">
                        <?php if($purchase_orders_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button" href="<?php echo base_url('purchaseorder/purchase-order'); ?>"><i data-feather="shopping-bag"></i> <?php echo lang('PageText.purchase_order'); ?></a>
                                </h2>
                            </div>
                        <?php } ?>
                        <?php if($good_received_notes_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button" href="<?php echo base_url('purchaseorder/grn'); ?>"><i data-feather="edit-2"></i><?php echo lang('PageText.grn'); ?></a>
                                </h2>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </li>
    <?php } ?>
    <?php if($rma_access){ ?>
        <li class="nav-item">
            <a class="nav-link" href="ManageRMA.php"> 
                <div class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#A6A6A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-command"><path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path></svg>
                </div>
                <span class="heading-sm"><?php echo lang('PageText.rma'); ?></span>
                
            </a>
        </li>
    <?php } ?>
    <?php if($customers_access || $customer_group_access){ ?>
        <li class="nav-item <?php echo ($uri->getSegment(1)=='customers') ? 'active':''; ?> ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#CustomersNavigation" aria-expanded="true" aria-controls="CustomersNavigation">
                <div class="nav-icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.2" d="M16 22.5C18.7614 22.5 21 20.2614 21 17.5C21 14.7386 18.7614 12.5 16 12.5C13.2386 12.5 11 14.7386 11 17.5C11 20.2614 13.2386 22.5 16 22.5Z" fill="#A6A6A6" />
                        <path opacity="0.2" d="M7.5 14.5C9.70914 14.5 11.5 12.7091 11.5 10.5C11.5 8.29086 9.70914 6.5 7.5 6.5C5.29086 6.5 3.5 8.29086 3.5 10.5C3.5 12.7091 5.29086 14.5 7.5 14.5Z" fill="#A6A6A6" />
                        <path opacity="0.2" d="M24.5 14.5C26.7091 14.5 28.5 12.7091 28.5 10.5C28.5 8.29086 26.7091 6.5 24.5 6.5C22.2909 6.5 20.5 8.29086 20.5 10.5C20.5 12.7091 22.2909 14.5 24.5 14.5Z" fill="#A6A6A6" />
                        <path d="M16 22.5C18.7614 22.5 21 20.2614 21 17.5C21 14.7386 18.7614 12.5 16 12.5C13.2386 12.5 11 14.7386 11 17.5C11 20.2614 13.2386 22.5 16 22.5Z"stroke="#A6A6A6"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                        <path d="M24.5 14.5C25.6647 14.4981 26.8137 14.7683 27.8554 15.2892C28.8972 15.81 29.8028 16.5671 30.5 17.5" stroke="#A6A6A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.5 17.5C2.19725 16.5671 3.10285 15.81 4.14457 15.2892C5.1863 14.7683 6.33532 14.4981 7.5 14.5" stroke="#A6A6A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8.80078 26.9997C9.45931 25.6511 10.4834 24.5145 11.7563 23.7195C13.0293 22.9245 14.5 22.5029 16.0008 22.5029C17.5016 22.5029 18.9723 22.9245 20.2452 23.7195C21.5182 24.5145 22.5423 25.6511 23.2008 26.9997"stroke="#A6A6A6"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                        <path d="M7.50015 14.5C6.74096 14.5008 5.99722 14.2855 5.35584 13.8792C4.71446 13.473 4.20193 12.8927 3.87814 12.206C3.55434 11.5193 3.43266 10.7546 3.5273 10.0014C3.62194 9.24809 3.929 8.5373 4.4126 7.95206C4.89619 7.36681 5.53636 6.93127 6.25829 6.69634C6.98022 6.4614 7.75411 6.43677 8.48952 6.62532C9.22493 6.81388 9.8915 7.20782 10.4113 7.76113C10.9312 8.31444 11.2828 9.00427 11.4252 9.75"stroke="#A6A6A6"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                        <path d="M20.5742 9.75C20.7166 9.00427 21.0682 8.31444 21.588 7.76113C22.1079 7.20782 22.7744 6.81388 23.5099 6.62532C24.2453 6.43677 25.0191 6.4614 25.7411 6.69634C26.463 6.93127 27.1032 7.36681 27.5868 7.95206C28.0704 8.5373 28.3774 9.24809 28.4721 10.0014C28.5667 10.7546 28.445 11.5193 28.1212 12.206C27.7974 12.8927 27.2849 13.473 26.6435 13.8792C26.0022 14.2855 25.2584 14.5008 24.4992 14.5"stroke="#A6A6A6"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="heading-sm"><?php echo lang('PageText.customers'); ?></span>
            </a>
            <div  id="CustomersNavigation" class="collapse sub-navigation scroll-primary" data-parent="#accordionSidebar">
                <div class="navigation-box bg-white py-2 collapse-inner rounded">
                    <div class="accordion accordion-flush" id="CustomersSubNavigation">
                        <?php if($customers_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button"  href="<?php echo base_url('customers/customers-manage') ?>"><i data-feather="user"></i> <?php echo lang('PageText.manage_customer'); ?></a>
                                </h2>
                            </div>
                        <?php } ?>
                        <?php if($customer_group_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button"  href="<?php echo base_url('customers/customers-group'); ?>"><i data-feather="users"></i> <?php echo lang('PageText.manage_customer_grp'); ?></a>
                                </h2>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </li>
    <?php } ?>
    <?php if($inventory_access || $transfer_inventory_access || $stock_count_access){ ?>
        <li class="nav-item <?php echo ($uri->getSegment(1)=='stock') ? 'active':''; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#InventoryNavigation" aria-expanded="true" aria-controls="InventoryNavigation">
                <div class="nav-icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.5 26H3.5" stroke="#A6A6A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.5 26V11H19.5" stroke="#A6A6A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M26.5 5H19.5V26H26.5V5Z" stroke="#A6A6A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5.5 26V17H12.5" stroke="#A6A6A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="heading-sm"><?php echo lang('PageText.stock'); ?></span>
            </a>
            <div  id="InventoryNavigation" class="collapse sub-navigation scroll-primary" data-parent="#accordionSidebar">
                <div class="navigation-box bg-white py-2 collapse-inner rounded">
                    <div class="accordion accordion-flush" id="InventorySubNavigation">
                        <?php if($inventory_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="ManageInventoryHeadingnine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ManageInventory-collapsenine" aria-expanded="false" aria-controls="ManageInventory-collapsenine"><i data-feather="truck"></i> <?php echo lang('Buttons.manage_stock'); ?></button>
                                </h2>
                                <div id="ManageInventory-collapsenine" class="accordion-collapse collapse" aria-labelledby="ManageInventoryHeadingnine" data-bs-parent="#InventorySubNavigation">
                                    <ul class="accordion-body">
                                        <li><a href="<?php echo base_url('stock/products-list'); ?>"><?php echo lang('PageText.products'); ?></a></li>
                                        <li><a href="<?php echo base_url('stock/devices-list'); ?>"><?php echo lang('PageText.devices'); ?></a></li>
                                        <li><a href="<?php echo base_url('stock/miscellaneous-list'); ?>"><?php echo lang('PageText.miscellaneous'); ?></a></li>
                                        <li><a href="MI_SpecialOrderedItems.php"><?php echo lang('PageText.special_ordered'); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="ManageService-headingten">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ManageService-collapseten" aria-expanded="false" aria-controls="ManageService-collapseten"><i data-feather="settings"></i> <?php echo lang('Buttons.manage_service'); ?></button>
                                </h2>
                                <div id="ManageService-collapseten" class="accordion-collapse collapse" aria-labelledby="ManageService-headingten" data-bs-parent="#InventorySubNavigation">
                                    <ul class="accordion-body">
                                        <li><a href="<?php echo base_url('stock/repairs-list') ?>"><?php echo lang('PageText.repairs'); ?></a></li>
                                        <li><a href="<?php echo base_url('stock/unlocking-service-list'); ?>"><?php echo lang('PageText.unlocking'); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($transfer_inventory_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button" href="<?php echo base_url('stock/stock-transfer') ?>"><i data-feather="settings"></i> <?php echo lang('PageText.stock_transfer'); ?></a>
                                </h2>
                            </div>
                        <?php } ?>
                        <?php if($stock_count_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button" href="<?php echo base_url('stock/stock-count'); ?>"><i data-feather="sliders"></i> <?php echo lang('PageText.stock_count'); ?></a>
                                </h2>
                            </div>
                         <?php } ?>
                         <?php if($inventory_access){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header not-child">
                                <a class="accordion-button" href="<?php echo base_url('reports/low-stock-report'); ?>"><i data-feather="sliders"></i> <?php echo lang('PageText.low_stock_report'); ?></a>
                                </h2>
                            </div>
                         <?php } ?>
                    </div>
                </div>
            </div>
        </li>
    <?php } ?>
    
    <li class="nav-item  <?php echo ($uri->getSegment(1)=='store') ? 'active':''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#StoreNavigation" aria-expanded="true" aria-controls="StoreNavigation">
            <div class="nav-icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 22C19.3137 22 22 19.3137 22 16C22 12.6863 19.3137 10 16 10C12.6863 10 10 12.6863 10 16C10 19.3137 12.6863 22 16 22Z"stroke="#A6A6A6"stroke-opacity="0.65"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                        <path d="M24.6747 10.0873C24.9756 10.5181 25.2391 10.974 25.4622 11.4498L28.6997 13.2498C29.1039 15.0604 29.1082 16.9374 28.7122 18.7498L25.4622 20.5498C25.2391 21.0256 24.9756 21.4815 24.6747 21.9123L24.7372 25.6248C23.3651 26.8751 21.7412 27.8171 19.9747 28.3873L16.7872 26.4748C16.2629 26.5123 15.7365 26.5123 15.2122 26.4748L12.0372 28.3748C10.2651 27.8149 8.6358 26.8766 7.26219 25.6248L7.32469 21.9248C7.02628 21.488 6.76295 21.0282 6.53719 20.5498L3.29969 18.7498C2.90176 16.9385 2.8975 15.0629 3.28719 13.2498L6.53719 11.4498C6.76029 10.974 7.02375 10.5181 7.32469 10.0873L7.26219 6.3748C8.63425 5.12451 10.2582 4.18256 12.0247 3.6123L15.2122 5.5248C15.7365 5.4873 16.2629 5.4873 16.7872 5.5248L19.9622 3.6248C21.7343 4.18467 23.3636 5.123 24.7372 6.3748L24.6747 10.0873Z"stroke="#A6A6A6"stroke-opacity="0.65"stroke-width="2"stroke-linecap="round"stroke-linejoin="round"/>
                </svg>
            </div>
            <span class="heading-sm"> <?php echo lang('PageText.store'); ?> <br/> <?php echo lang('PageText.settings'); ?> </span>
        </a>
        <!-- category Sidebar -->
        <div  id="StoreNavigation" class="collapse sub-navigation scroll-primary" data-parent="#accordionSidebar">
            <div class="navigation-box bg-white py-2 collapse-inner rounded">

                <div class="accordion accordion-flush" id="StoreSubNavigation">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="YourProfileHeadingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#YourProfile-collapseOne" aria-expanded="false" aria-controls="YourProfile-collapseOne"><i data-feather="user"></i> <?php echo lang('Buttons.your_profile'); ?></button>
                        </h2>
                        <div id="YourProfile-collapseOne" class="accordion-collapse collapse" aria-labelledby="YourProfileHeadingOne" data-bs-parent="#StoreSubNavigation">
                            <ul class="accordion-body">
                                <li><a href="<?php echo site_url('update-profile') ?>"><?php echo lang('PageText.update_profile'); ?></a></li>
                                <li><a href="<?php echo base_url('update-password') ?>"><?php echo lang('PageText.update_pass'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php if($settings_store_general_settings || $settings_store_manage_stores_access || $settings_store_franchise_fee_setup){ ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"><i data-feather="shopping-bag"></i> <?php echo lang('Buttons.store_settings'); ?></button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#StoreSubNavigation">
                                <ul class="accordion-body">
                                    <?php if($settings_store_general_settings){ ?><li><a href="<?php echo base_url('store/general-settings'); ?>"><?php echo lang('PageText.general_settings'); ?></a></li><?php } ?>
                                    <?php if($settings_store_manage_stores_access){ ?><li><a href="<?php echo base_url('store/manage-stores'); ?>"><?php echo lang('PageText.manage_stores'); ?></a></li><?php } ?>
                                    <?php /* ?><li><a href="<?php echo base_url('store/store-types'); ?>"><?php echo lang('PageText.store_types'); ?></a></li><?php */ ?>
                                    <?php if($settings_store_franchise_fee_setup){ ?><li class="accordion-header has-child" id="frances">
                                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FranchiseFeeSetup" aria-expanded="false" aria-controls="FranchiseFeeSetup"><?php echo lang('PageText.multi_store_setup'); ?> <i data-feather="chevron-up" class="mr-0"></i> </a></li>
                                    <div id="FranchiseFeeSetup" class="accordion-collapse collapse" aria-labelledby="frances" data-bs-parent="#flush-collapseTwo">
                                        <ul class="accordion-body-subchild">
                                            <li><a href="FranchiseFeeSetup.php"><?php echo lang('PageText.franchise_fee_setup'); ?></a></li>
                                        </ul>
                                    </div><?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($manage_employee_access || $employees_employee_commissions_access || $settings_employees_manage_roles_access || $settings_employees_manage_roles_permission || $settings_employees_manage_security_checks){ ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"><i data-feather="users"></i> <?php echo lang('Buttons.employees'); ?></button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#StoreSubNavigation">
                                <ul class="accordion-body">
                                    <?php if($manage_employee_access){ ?><li><a href="<?php echo base_url('store/manage-employee'); ?>"><?php echo lang('PageText.manage_employees'); ?></a></li><?php } ?>
                                    <?php if($employees_employee_commissions_access){ ?><li><a href="<?php echo base_url('store/employee-commission'); ?>"><?php echo lang('PageText.emp_commission'); ?></a></li><?php } ?>
                                    <?php if($settings_employees_manage_roles_access){ ?><li><a href="<?php echo base_url('store/roles'); ?>"><?php echo lang('PageText.manage_roles'); ?></a></li><?php } ?>
                                    <?php if($settings_employees_manage_roles_permission){ ?><li><a href="<?php echo base_url('store/roles/role-permissions'); ?>"><?php echo lang('PageText.manage_role_permission'); ?></a></li><?php } ?>
                                    <?php if($settings_employees_manage_security_checks){ ?><li><a href="<?php echo base_url('store/roles/security-checks'); ?>"><?php echo lang('PageText.manage_security_checks'); ?></a></li><?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($settings_module_configurations_gdpr || $settings_module_configurations_pos || $settings_module_configurations_invoices || $settings_module_configurations_tickets || $settings_module_configurations_stock || $settings_module_configurations_stock_count || $settings_module_configurations_repairs || $settings_module_configurations_unlocking || $settings_module_configurations_purchase_order || $settings_module_configurations_rma || $settings_module_configurations_receipt || $settings_module_configurations_label_size || $settings_module_configurations_template_editor || $settings_module_configurations_how_did_you_hear_about_us_access || $module_configurations_manage_repair_categories_pre_post_device_condition || $module_configurations_manage_repair_categories_additional_items || $module_configurations_manage_manufacturer_access || $module_configurations_manage_devices_access || $module_configurations_manage_repair_categories_access  ){ ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour"><i data-feather="layers"></i> <?php echo lang('Buttons.module_config'); ?></button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#StoreSubNavigation">
                                <ul class="accordion-body">
                                    <?php if($settings_module_configurations_gdpr){ ?><li><a href="<?php echo base_url('store/config/gdpr'); ?>"><?php echo lang('PageText.gdpr'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_pos){ ?><li><a href="<?php echo base_url('store/config/point_of_sale'); ?>"><?php echo lang('PageText.point_ofsale'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_invoices){ ?><li><a href="<?php echo base_url('store/config/invoices'); ?>"><?php echo lang('PageText.invoices'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_tickets){ ?><li><a href="<?php echo base_url('store/config/tickets'); ?>"><?php echo lang('PageText.tickets'); ?></a></li><?php } ?>
                                    <!-- <li><a href="<?php //echo base_url('store/config/special_order'); ?>"><?php //echo lang('PageText.special_order'); ?></a></li> -->
                                    <?php if($settings_module_configurations_stock){ ?><li><a href="<?php echo base_url('store/config/stock'); ?>"><?php echo lang('PageText.stock'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_stock_count){ ?><li><a href="<?php echo base_url('store/config/stock_count'); ?>"><?php echo lang('PageText.stock_count'); ?></a></li><?php } ?>
                                    <!-- <li><a href="TradeIn.php">Trade In</a></li> -->
                                    <?php if($settings_module_configurations_repairs){ ?><li><a href="<?php echo base_url('store/config/repairs'); ?>"><?php echo lang('PageText.repairs'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_unlocking){ ?><li><a href="<?php echo base_url('store/config/unlocking'); ?>"><?php echo lang('PageText.unlocking'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_purchase_order){ ?><li><a href="<?php echo base_url('store/config/purchase_order'); ?>"><?php echo lang('PageText.purchase_order'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_rma){ ?><li><a href="<?php echo base_url('store/config/rma'); ?>"><?php echo lang('PageText.rma'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_receipt){ ?><li><a href="<?php echo base_url('store/config/receipt'); ?>"><?php echo lang('PageText.receipt'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_label_size){ ?><li><a href="<?php echo base_url('store/config/label_size'); ?>"><?php echo lang('PageText.label_size'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_template_editor){ ?><li><a href="<?php echo base_url('store/template-editor'); ?>"><?php echo lang('PageText.template_editor'); ?></a></li><?php } ?>
                                    <?php if($settings_module_configurations_how_did_you_hear_about_us_access){ ?><li><a href="<?php echo base_url('store/referral-source'); ?>"><?php echo lang('PageText.how_you_find'); ?></a></li><?php } ?>
                                    <?php if($module_configurations_manage_repair_categories_pre_post_device_condition){ ?><li><a href="<?php echo base_url('store/device-condition') ?>"><?php echo lang('PageText.device_condition'); ?></a></li><?php } ?>
                                    <?php if($module_configurations_manage_repair_categories_additional_items){ ?><li><a href="<?php echo base_url('store/additional-item') ?>"><?php echo lang('PageText.manage_add_items'); ?></a></li><?php } ?>
                                    <?php if($module_configurations_manage_manufacturer_access){ ?><li><a href="<?php echo base_url('store/manufacturer'); ?>"><?php echo lang('PageText.manufacturer'); ?></a></li><?php } ?>
                                    <?php if($module_configurations_manage_devices_access){ ?><li><a href="<?php echo base_url('store/devices') ?>"><?php echo lang('PageText.devices'); ?></a></li><?php } ?>
                                    <?php if($module_configurations_manage_repair_categories_access){ ?><li><a href="<?php echo base_url('store/manage-repair-category'); ?>"><?php echo lang('PageText.manage_repair_category'); ?></a></li><?php } ?>
                                    <?php if($module_configurations_manage_product_categories_access){ ?><li><a href="<?php echo base_url('store/manage-product-category'); ?>"><?php echo lang('PageText.manage_product_category'); ?></a></li><?php } ?>
                                    
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="accordion-item d-none">
                        <h2 class="accordion-header" id="flush-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive"><i data-feather="credit-card"></i> <?php echo lang('Buttons.module_expense'); ?></button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#StoreSubNavigation">
                            <ul class="accordion-body">
                                <li><a href="ManageExpense.php"><?php echo lang('PageText.manage_codes'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <?php if($supplier_access){ ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header not-child">
                            <a class="accordion-button" href="<?php echo base_url('store/suppliers'); ?>"><i data-feather="sliders"></i> <?php echo lang('PageText.manage_suppliers'); ?></a>
                            </h2>
                        </div>
                    <?php } ?>
                </div>
                    <?php /*
                    <div class="accordion-item">
                        <h2 class="accordion-header not-child">
                        <a class="accordion-button" href="Billing.php"><i data-feather="book"></i> <?php echo lang('PageText.billing'); ?></a>
                        </h2>
                    </div>
                    </div> */
					?>
            </div>
        </div>
    </li>
</ul>