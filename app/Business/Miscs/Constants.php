<?php

if (!defined('APP_NAME')) {
    define('APP_NAME', env('APP_NAME', 'ZEBRA PRO'));
    define('APP_DOMAIN', env('APP_DOMAIN', 'BusinessDomain'));

    //Cache names
    define('CACHE_DURATION', '300');
    define('CACHE_SETTING', 'setting');
    define('CACHE_THEME', 'theme');
    define('CACHE_BANK', 'bank');
    define('CACHE_BRANCH', 'branch2');
    define('CACHE_USER', 'user');
    define('CACHE_ROLE', 'role');
    define('CACHE_PERMISSION', 'permission');
    define('CACHE_EMPLOYEE', 'employee');

    define('CACHE_CUSTOMER', 'customer');
    define('CACHE_SECTION', 'Section');
    define('CACHE_SUPPLIER', 'supplier');
    define('CACHE_SUPPLIER_GROUPING', 'SupplierGrouping');
    define('CACHE_ACCESSORIES', 'Accessories');
    define('CACHE_PRODUCTION_TYPE', 'ProductionType');
    define('CACHE_CATEGORY', 'Category');
    define('CACHE_SIZE', 'Size');
    define('CACHE_UOM', 'uom');
    define('CACHE_SIZE_GROUPING', 'SizeGrouping');
    define('CACHE_COLOR', 'color');
    define('CACHE_COLOR_DETAIL', 'colorDetail');
    define('CACHE_ACCESSORIES_SIZE', 'accessoriesSize');
    define('CACHE_ACCESSORIES_COLOR', 'accessoriesColor');
    define('CACHE_ACCESSORIES_COLOR_DETAIL', 'accessoriesColorDetail');
    define('CACHE_COUNT', 'count');
    define('CACHE_PRICELIST', 'priceList');
    define('CACHE_SALES_LEDGER', 'sales Ledger');
    define('CACHE_DIA', 'dia');
    define('CACHE_UNIT', 'unit');
    define('CACHE_FABRIC_TYPE', 'fabricType');
    define('CACHE_FABRIC_STRUCTURE', 'fabricStructure');
    define('CACHE_YARN_TYPE', 'yarnType');
    define('CACHE_PROCESS', 'process');
    define('CACHE_PROCESS_SEQUENCE', 'processSequence');
    define('CACHE_PROCESS_SEQUENCE_DETAILS', 'processSequence');
    define('CACHE_PROCESS_GROUPING', 'processGrouping');
    define('CACHE_PROCESS_GROUPING_DETAILS', 'processGrouping');
    define('CACHE_PRODUCTION_GROUPING', 'ProductionGrouping');
    define('CACHE_PRODUCTION_GROUPING_DETAILS', 'ProductionGrouping');
    define('CACHE_GSM', 'gsm');
    define('CACHE_SUPPLIER_PAYMENT', 'supplierPayment');
    define('CACHE_PRODUCT', 'Product');
    define('CACHE_PRODUCT_DETAILS', 'Productdetail');
    define('CACHE_YARN_PURCHASE_ORDER', 'YarnPurchaseOrder');
    define('CACHE_YARN_PURCHASE_ORDER_DETAILS', 'YarnPurchaseOrderdetail');
    define('CACHE_FABRIC_PURCHASE_ORDER', 'fabricPurchaseOrder');
    define('CACHE_FABRIC_PURCHASE_ORDER_DETAILS', 'fabricPurchaseOrderDetail');
    define('CACHE_ACCESSORIES_PURCHASE_ORDER', 'AccessoriesPurchaseOrder');
    define('CACHE_ACCESSORIES_PURCHASE_ORDER_DETAILS', 'AccessoriesPurchaseOrderdetail');
    define('CACHE_ACCESSORIES_INWARD', 'AccessoriesInward');
    define('CACHE_ACCESSORIES_INWARD_DETAILS', 'AccessoriesInwarddetail');
    define('CACHE_ACCESSORIES_STOCK_ADJUSTMENT', 'AccessoriesStockAdjustment');
    define('CACHE_ACCESSORIES_STOCK_ADJUSTMENT_DETAILS', 'AccessoriesStockAdjustmentdetail');
    define('CACHE_YARN_RATE_CONFIRMATION', 'yarnRateconformation');
    define('CACHE_ACCESSORIES_RATE_CONFIRMATION', 'accessoriesRateconformation');
    define('CACHE_FABRIC_RATE_CONFIRMATION', 'fabricRateconformation');
    define('CACHE_PROCESS_RATE_CONFIRMATION', 'processRateconformation');
    define('CACHE_PRODUCTION_RATE_CONFIRMATION', 'productionRateconformation');
    define('CACHE_YARN_DC', 'yarnDc');
    define('CACHE_PRODUCTION_DC', 'productionDc');
    define('CACHE_PRODUCTION_DC_RETURN', 'productionDcReturn');
    define('CACHE_YARN_RC', 'yarnRc');
    define('CACHE_PRODUCTION_RC', 'productionRc');
    define('CACHE_FABRIC_DC', 'fabricDc');
    define('CACHE_FABRIC_RC', 'fabricRc');
    define('CACHE_PROCESS_PLAN', 'processPlan');
    define('CACHE_RC_BILL', 'rcBill');
    define('CACHE_PRODUCTION_BILL', 'productionBill');
    define('CACHE_RC_PAYMENT', 'rcPayment');
    define('CACHE_PRODUCTION_PAYMENT', 'productionPayment');
    define('CACHE_ACCESSORIES_DC', 'accessoriesDc');
    define('CACHE_ACCESSORIES_SALES_BILL', 'accessoriesSalesBill');
    define('CACHE_ACCESSORIES_SALES_PAYMENT', 'accessoriesSalesPayment');
    define('CACHE_ACCESSORIES_BILL', 'accessoriesBill');
    define('CACHE_ACCESSORIES_PAYMENT', 'accessoriesPayment');
    define('CACHE_DEBIT', 'debit');
    define('CACHE_ADAS_TYPE', 'adasType');
    define('CACHE_SALES_PRICELIST', 'priceList');

    define('CACHE_FREIGHT_MODE', 'FreightMode');
    define('CACHE_TRANSPORTER', 'Transporter');
    define('CACHE_ECOMMERCE_PROVIDER', 'EcommerceProvider');
    define('CACHE_ORDER_SHEET', 'OrderSheet');
    define('CACHE_ORDER_SHEET_DETAIL', 'OrderSheetDetail');
    define('CACHE_PACKING_SLIP', 'PackingSlip');
    define('CACHE_PACKING_SLIP_DETAIL', 'PackingSlipDetail');
    define('CACHE_INVOICE', 'Invoice');
    define('CACHE_CUSTOMER_PAYMENT', 'CustomerPayment');
    define('CACHE_STOCK_ADJUST', 'StockAdjust');
    define('CACHE_FABRIC_STOCK_ADJUSTMENT', 'FabricStockAdjustment');
    define('CACHE_LOCAL_SALES_BILL', 'LocalSalesBill');
    define('CACHE_LOCAL_SALES_ESTIMATE', 'LocalSalesEstimate');
    define('CACHE_PROFORMA_INVOICE', 'ProformaInvoice');
    define('CACHE_PROFORMA_INVOICE_DETAIL', 'ProformaInvoiceDetail');
    define('CACHE_ECOMMERCE_SALE', 'EcommerceSale');

    define('CACHE_DC', 'Dc');
    define('CACHE_DC_DETAIL', 'DcDetail');
    define('CACHE_PURCHASE', 'Purchase');
    define('CACHE_PURCHASE_DETAIL', 'PurchaseDetail');
    define('CACHE_PURCHASE_ORDER', 'PurchaseOrder');
    define('CACHE_PURCHASE_ORDER_DETAIL', 'PurchaseOrderDetail');
    define('CACHE_INVOICE_PAYMENT', 'InvoicePayment');
    define('CACHE_INVOICE_PAYMENT_DETAILS', 'InvoicePaymentDetail');
    define('CACHE_PURCHASE_PAYMENT', 'PurchasePayment');
    define('CACHE_PURCHASE_PAYMENT_DETAILS', 'PurchasePaymentDetail');
    define('CACHE_DIA_SIZE_COMBINATIONS', 'DiaSizeCombinations');
    define('CACHE_FABRIC_INVOICE', 'FabricInvoice');
    define('CACHE_MRP_CODE', 'MrpCode');
    define('CACHE_CUSTOMER_GROUPING', 'CustomerGrouping');

    //payroll
    define('CACHE_EMPLOYEE_DEPARTMENT', 'EmployeeDepartment');
    define('CACHE_DESIGNATION', 'Designation');
    define('CACHE_SALARY_STRUCTURE', 'SalaryStructure');
    define('CACHE_SALARY_COMPONENT', 'SalaryComponent');
    define('CACHE_WEEK_OFF', 'WeekOff');
    define('CACHE_HOLIDAY', 'Holiday');
    define('CACHE_EMAIL', 'email');
    define('CACHE_ATTENDANCE_ENTRY', 'AttendanceEntry');
    define('CACHE_ADVANCE', 'AdvancePayment');
    define('CACHE_BONUS', 'BonusPayment');
    define('CACHE_PERMISSION_SLIP', 'PermissionSlip');
    define('CACHE_PAYROLL', 'Payroll2');
    define('CACHE_LEAVE_TYPE', 'LeaveType');
    define('CACHE_SHIFT', 'Shift');
 
    define('RETURN_SUCCESS', 'success');
    define('RETURN_FAILURE', 'failure');
    define('RETURN_VALIDATION', 'validation');
    define('RETURN_DATA', 'data');

    define('RESULT_SUCCESS', 'success');
    define('RESULT_FAILURE', 'failure');

    define('DEFAULT_DATE_FORMAT', 'M j, Y');
    define('DEFAULT_DATE_PICKER_FORMAT', 'M d, yyyy');
    define('DEFAULT_DATETIME_FORMAT', 'F j, Y g:i a');
    define('DEFAULT_DATETIME_MOMENT_FORMAT', 'MMM D, YYYY h:mm:ss a');

    define('SAVE_SUCCESS', 'Saved Successfully');
    define('SAVE_FAILURE', 'Saved Failure');
    define('SAVE_REFUSE', 'Record cannot be saved. Because ');

    define('UPDATE_SUCCESS', 'Updated Successfully');
    define('UPDATE_FAILURE', 'Updated Failure');
    define('UPDATE_REFUSE', 'Record cannot be updated. Because ');
    define('UPDATE_NO_RECORD', 'No record found. Please refresh page and try again');

    define('DELETE_SUCCESS', 'Deleted Successfully');
    define('DELETE_FAILURE', 'Deleted Failure');
    define('DELETE_REFUSE', 'Record cannot be deleted. Because ');
    define('DELETE_NO_RECORD', 'No record found. Please refresh page and try again');

    define('SELECT_NO_RECORD', 'No record found. Please add some records');











    define('MENU_SETTING', 1);

    define('MENU_ROLE', 2);
    define('ACTION_ROLE_CREATE', 1);
    define('ACTION_ROLE_EDIT', 2);
    define('ACTION_ROLE_DELETE', 3);

    define('MENU_PERMISSION', 3);

    define('MENU_USER', 4);
    define('ACTION_USER_CREATE', 4);
    define('ACTION_USER_EDIT', 5);
    define('ACTION_USER_DELETE', 6);

    define('MENU_EMPLOYEE', 5);
    define('ACTION_EMPLOYEE_CREATE', 7);
    define('ACTION_EMPLOYEE_EDIT', 8);
    define('ACTION_EMPLOYEE_DELETE', 9);

    define('MENU_SUPPLIER', 6);
    define('ACTION_SUPPLIER_CREATE', 10);
    define('ACTION_SUPPLIER_EDIT', 11);
    define('ACTION_SUPPLIER_DELETE', 12);

    define('MENU_CUSTOMER', 7);
    define('ACTION_CUSTOMER_CREATE', 13);
    define('ACTION_CUSTOMER_EDIT', 14);
    define('ACTION_CUSTOMER_DELETE', 15);

    define('MENU_YARN_PURCHASE_ORDER', 8);
    define('ACTION_YARN_PURCHASE_ORDER_CREATE', 16);
    define('ACTION_YARN_PURCHASE_ORDER_EDIT', 17);
    define('ACTION_YARN_PURCHASE_ORDER_DELETE', 18);
    define('ACTION_YARN_PURCHASE_ORDER_PRINT', 19);

    define('MENU_FABRIC_PURCHASE_ORDER', 9);
    define('ACTION_FABRIC_PURCHASE_ORDER_CREATE', 20);
    define('ACTION_FABRIC_PURCHASE_ORDER_EDIT', 21);
    define('ACTION_FABRIC_PURCHASE_ORDER_DELETE', 22);
    define('ACTION_FABRIC_PURCHASE_ORDER_PRINT', 23);

    define('MENU_RC', 10);
    define('ACTION_RC_CREATE', 24);
    define('ACTION_RC_EDIT', 25);
    define('ACTION_RC_DELETE', 26);
    define('ACTION_RC_PRINT', 27);
    define('ACTION_RC_PROCEED_TO', 28);

    define('MENU_DC', 11);
    define('ACTION_DC_CREATE', 29);
    define('ACTION_DC_EDIT', 30);
    define('ACTION_DC_DELETE', 31);
    define('ACTION_DC_PRINT', 32);
    define('ACTION_DC_PROCEED_TO', 33);

    define('MENU_FABRIC_RC', 12);
    define('ACTION_FABRIC_RC_CREATE', 34);
    define('ACTION_FABRIC_RC_EDIT', 35);
    define('ACTION_FABRIC_RC_DELETE', 36);
    define('ACTION_FABRIC_RC_PRINT', 37);
    define('ACTION_FABRIC_RC_PROCEED_TO', 38);

    define('MENU_FABRIC_DC', 13);
    define('ACTION_FABRIC_DC_CREATE', 39);
    define('ACTION_FABRIC_DC_EDIT', 40);
    define('ACTION_FABRIC_DC_DELETE', 41);
    define('ACTION_FABRIC_DC_PRINT', 42);
    define('ACTION_FABRIC_DC_PROCEED_TO', 43);

    define('MENU_SINGLE_ENTRY', 14);

    define('MENU_COLOR', 15);
    define('ACTION_COLOR_CREATE', 44);
    define('ACTION_COLOR_EDIT', 45);
    define('ACTION_COLOR_DELETE', 46);

    define('MENU_DIA', 16);
    define('ACTION_DIA_CREATE', 47);
    define('ACTION_DIA_EDIT', 48);
    define('ACTION_DIA_DELETE', 49);

    define('MENU_COUNT', 17);
    define('ACTION_COUNT_CREATE', 50);
    define('ACTION_COUNT_EDIT', 51);
    define('ACTION_COUNT_DELETE', 52);

    define('MENU_FABRIC_TYPE', 18);
    define('ACTION_FABRIC_TYPE_CREATE', 53);
    define('ACTION_FABRIC_TYPE_EDIT', 54);
    define('ACTION_FABRIC_TYPE_DELETE', 55);

    define('MENU_YARN_TYPE', 19);
    define('ACTION_YARN_TYPE_CREATE', 56);
    define('ACTION_YARN_TYPE_EDIT', 57);
    define('ACTION_YARN_TYPE_DELETE', 58);

    define('MENU_FABRIC_STRUCTURE', 20);
    define('ACTION_FABRIC_STRUCTURE_CREATE', 59);
    define('ACTION_FABRIC_STRUCTURE_EDIT', 60);
    define('ACTION_FABRIC_STRUCTURE_DELETE', 61);


    define('MENU_GSM', 21);
    define('ACTION_GSM_CREATE', 62);
    define('ACTION_GSM_EDIT', 63);
    define('ACTION_GSM_DELETE', 64);


    define('MENU_PROCESS', 22);
    define('ACTION_PROCESS_CREATE', 65);
    define('ACTION_PROCESS_EDIT', 66);
    define('ACTION_PROCESS_DELETE', 67);

    define('MENU_PROCESS_SEQUENCE', 23);
    define('ACTION_PROCESS_SEQUENCE_CREATE', 68);
    define('ACTION_PROCESS_SEQUENCE_EDIT', 69);
    define('ACTION_PROCESS_SEQUENCE_DELETE', 70);

    define('MENU_PROCESS_GROUPING', 24);
    define('ACTION_PROCESS_GROUPING_CREATE', 71);
    define('ACTION_PROCESS_GROUPING_EDIT', 72);
    define('ACTION_PROCESS_GROUPING_DELETE', 73);

    define('MENU_RATE_CONFIRMATION', 25);

    define('MENU_YARN_RATE_CONFIRMATION', 26);
    define('ACTION_YARN_RATE_CONFIRMATION_CREATE', 74);
    define('ACTION_YARN_RATE_CONFIRMATION_EDIT', 75);
    define('ACTION_YARN_RATE_CONFIRMATION_DELETE', 76);

    define('MENU_FABRIC_RATE_CONFIRMATION', 27);
    define('ACTION_FABRIC_RATE_CONFIRMATION_CREATE', 77);
    define('ACTION_FABRIC_RATE_CONFIRMATION_EDIT', 78);
    define('ACTION_FABRIC_RATE_CONFIRMATION_DELETE', 79);

    define('MENU_PROCESS_RATE_CONFIRMATION', 28);
    define('ACTION_PROCESS_RATE_CONFIRMATION_CREATE', 80);
    define('ACTION_PROCESS_RATE_CONFIRMATION_EDIT', 81);
    define('ACTION_PROCESS_RATE_CONFIRMATION_DELETE', 82);

    define('MENU_PROFILE', 29);
    define('ACTION_PROFILE_EDIT', 83);

    define('MENU_BANK', 30);
    define('ACTION_BANK_CREATE', 84);
    define('ACTION_BANK_EDIT', 85);
    define('ACTION_BANK_DELETE', 86);

    define('MENU_BRANCH', 31);
    define('ACTION_BRANCH_CREATE', 87);
    define('ACTION_BRANCH_EDIT', 88);
    define('ACTION_BRANCH_DELETE', 89);

    define('MENU_THEME', 32);
    define('ACTION_THEME_EDIT', 90);

    define('MENU_ACCOUNT_INFO', 33);
    define('ACTION_ACCOUNT_INFO_EDIT', 91);

    define('MENU_PROCESS_TRACKING', 34);
    define('MENU_FABRIC_STOCK', 36);


    define('MENU_PROCESS_PLAN', 37);
    define('ACTION_PROCESS_PLAN_CREATE', 92);
    define('ACTION_PROCESS_PLAN_EDIT', 93);
    define('ACTION_PROCESS_PLAN_DELETE', 94);

    define('MENU_GENERAL_YARN_STOCK', 38);
    define('MENU_GENERAL_FABRIC_STOCK', 39);

    define('MENU_RC_BILL', 40);
    define('ACTION_RC_BILL_CREATE', 95);
    define('ACTION_RC_BILL_EDIT', 96);
    define('ACTION_RC_BILL_DELETE', 97);
    define('ACTION_RC_BILL_PRINT', 98);

    define('MENU_RC_PAYMENT', 41);
    define('ACTION_RC_PAYMENT_CREATE', 99);
    define('ACTION_RC_PAYMENT_EDIT', 100);
    define('ACTION_RC_PAYMENT_DELETE', 101);

    define('MENU_RC_BILL_STATEMENT', 42);
    define('MENU_SUPPLIER_LEDGER', 43);
    define('MENU_SUPPLIER_OUTSTANDING', 44);
    define('MENU_SUPPLIER_PAYMENT_REPORT', 45);

    define('MENU_SUPPLIER_GROUPING', 46);
    define('ACTION_SUPPLIER_GROUPING_CREATE', 101);
    define('ACTION_SUPPLIER_GROUPING_EDIT', 102);
    define('ACTION_SUPPLIER_GROUPING_DELETE', 103);

    define('MENU_SUPPLIER_RAISE_PAYMENT', 46);
    define('MENU_YARN_PO_REPORT', 47);

    define('MENU_COLOR_DETAIL', 48);
    define('ACTION_COLOR_DETAIL_CREATE', 104);
    define('ACTION_COLOR_DETAIL_EDIT', 105);
    define('ACTION_COLOR_DETAIL_DELETE', 106);

    define('MENU_ACCESSORIES_PURCHASE_ORDER', 49);
    define('ACTION_ACCESSORIES_PURCHASE_ORDER_CREATE', 107);
    define('ACTION_ACCESSORIES_PURCHASE_ORDER_EDIT', 108);
    define('ACTION_ACCESSORIES_PURCHASE_ORDER_DELETE', 109);
    define('ACTION_ACCESSORIES_PURCHASE_ORDER_PRINT', 110);

    define('MENU_ACCESSORIES_INWARD', 50);
    define('ACTION_ACCESSORIES_INWARD_CREATE', 111);
    define('ACTION_ACCESSORIES_INWARD_EDIT', 112);
    define('ACTION_ACCESSORIES_INWARD_DELETE', 113);
    define('ACTION_ACCESSORIES_INWARD_PRINT', 114);

    define('MENU_ACCESSORIES_ADJUSTMENT', 51);
    define('ACTION_ACCESSORIES_ADJUSTMENT_CREATE', 115);
    define('ACTION_ACCESSORIES_ADJUSTMENT_EDIT', 116);
    define('ACTION_ACCESSORIES_ADJUSTMENT_DELETE', 117);
    define('ACTION_ACCESSORIES_ADJUSTMENT_PRINT', 118);

    define('MENU_ACCESSORIES_STOCK', 52);

    define('MENU_SECTION', 53);
    define('ACTION_SECTION_CREATE', 119);
    define('ACTION_SECTION_EDIT', 120);
    define('ACTION_SECTION_DELETE', 121);

    define('MENU_PRODUCTS', 54);
    define('ACTION_PRODUCTS_CREATE', 122);
    define('ACTION_PRODUCTS_EDIT', 123);
    define('ACTION_PRODUCTS_DELETE', 124);

    define('MENU_CATEGORY', 55);
    define('ACTION_CATEGORY_CREATE', 125);
    define('ACTION_CATEGORY_EDIT', 126);
    define('ACTION_CATEGORY_DELETE', 127);

    define('MENU_PRODUCTION_TYPE', 56);
    define('ACTION_PRODUCTION_TYPE_CREATE', 128);
    define('ACTION_PRODUCTION_TYPE_EDIT', 129);
    define('ACTION_PRODUCTION_TYPE_DELETE', 130);

    define('MENU_ACCESSORIES', 57);
    define('ACTION_ACCESSORIES_CREATE', 131);
    define('ACTION_ACCESSORIES_EDIT', 132);
    define('ACTION_ACCESSORIES_DELETE', 133);

    define('MENU_SIZE', 58);
    define('ACTION_SIZE_CREATE', 134);
    define('ACTION_SIZE_EDIT', 135);
    define('ACTION_SIZE_DELETE', 136);

    define('MENU_SIZE_GROUPING', 59);
    define('ACTION_SIZE_GROUPING_CREATE', 137);
    define('ACTION_SIZE_GROUPING_EDIT', 138);
    define('ACTION_SIZE_GROUPING_DELETE', 139);

    define('MENU_PRODUCTION_RATE_CONFIRMATION', 60);
    define('ACTION_PRODUCTION_RATE_CONFIRMATION_CREATE', 140);
    define('ACTION_PRODUCTION_RATE_CONFIRMATION_EDIT', 141);
    define('ACTION_PRODUCTION_RATE_CONFIRMATION_DELETE', 142);

    define('MENU_UNIT', 61);
    define('ACTION_UNIT_CREATE', 143);
    define('ACTION_UNIT_EDIT', 144);
    define('ACTION_UNIT_DELETE', 145);

    define('MENU_POST_DATE_CHEQUE', 62);
    define('MENU_ADVANCE_PAYMENT_REPORT', 63);
    define('MENU_PROCESS_STOCK', 64);
    define('MENU_BW_YARN_STOCK', 65);
    define('MENU_AW_YARN_STOCK', 66);

    define('MENU_REPROCESS_SEQUENCE', 67);
    define('ACTION_REPROCESS_SEQUENCE_CREATE', 143);
    define('ACTION_REPROCESS_SEQUENCE_EDIT', 144);
    define('ACTION_REPROCESS_SEQUENCE_DELETE', 145);

    define('MENU_DEBIT', 68);
    define('ACTION_DEBIT_CREATE', 146);
    define('ACTION_DEBIT_EDIT', 147);
    define('ACTION_DEBIT_DELETE', 148);

    define('MENU_ACCESSORIES_RATE_CONFIRMATION', 69);
    define('ACTION_ACCESSORIES_RATE_CONFIRMATION_CREATE', 149);
    define('ACTION_ACCESSORIES_RATE_CONFIRMATION_EDIT', 150);
    define('ACTION_ACCESSORIES_RATE_CONFIRMATION_DELETE', 151);


    define('MENU_PRICELIST', 70);
    define('ACTION_PRICELIST_CREATE', 152);
    define('ACTION_PRICELIST_EDIT', 153);
    define('ACTION_PRICELIST_DELETE', 154);

    define('MENU_ACCESSORIES_BILL', 71);
    define('ACTION_ACCESSORIES_BILL_CREATE', 155);
    define('ACTION_ACCESSORIES_BILL_EDIT', 156);
    define('ACTION_ACCESSORIES_BILL_DELETE', 157);
    define('ACTION_ACCESSORIES_BILL_PRINT', 158);

    define('MENU_ACCESSORIES_PAYMENT', 72);
    define('ACTION_ACCESSORIES_PAYMENT_CREATE', 158);
    define('ACTION_ACCESSORIES_PAYMENT_EDIT', 159);
    define('ACTION_ACCESSORIES_PAYMENT_DELETE', 160);

    define('MENU_PRODUCTION_BILL', 73);
    define('ACTION_PRODUCTION_BILL_CREATE', 161);
    define('ACTION_PRODUCTION_BILL_EDIT', 162);
    define('ACTION_PRODUCTION_BILL_DELETE', 163);
    define('ACTION_PRODUCTION_BILL_PRINT', 163);

    define('MENU_PRODUCTION_PAYMENT', 74);
    define('ACTION_PRODUCTION_PAYMENT_CREATE', 164);
    define('ACTION_PRODUCTION_PAYMENT_EDIT', 165);
    define('ACTION_PRODUCTION_PAYMENT_DELETE', 166);

    define('MENU_PO_PENDING_REPORT', 75);

    define('MENU_PRODUCTION_DC', 76);
    define('ACTION_PRODUCTION_DC_CREATE', 167);
    define('ACTION_PRODUCTION_DC_EDIT', 168);
    define('ACTION_PRODUCTION_DC_DELETE', 169);
    define('ACTION_PRODUCTION_DC_PRINT', 170);

    define('MENU_PRODUCTION_RC', 77);
    define('ACTION_PRODUCTION_RC_CREATE', 171);
    define('ACTION_PRODUCTION_RC_EDIT', 172);
    define('ACTION_PRODUCTION_RC_DELETE', 173);
    define('ACTION_PRODUCTION_RC_PRINT', 174);

    define('MENU_ACCESSORIES_COLOR', 78);
    define('ACTION_ACCESSORIES_COLOR_CREATE', 175);
    define('ACTION_ACCESSORIES_COLOR_EDIT', 176);
    define('ACTION_ACCESSORIES_COLOR_DELETE', 178);

    define('MENU_ACCESSORIES_COLOR_DETAIL', 79);
    define('ACTION_ACCESSORIES_COLOR_DETAIL_CREATE', 179);
    define('ACTION_ACCESSORIES_COLOR_DETAIL_EDIT', 180);
    define('ACTION_ACCESSORIES_COLOR_DETAIL_DELETE', 181);

    define('MENU_ACCESSORIES_SIZE', 80);
    define('ACTION_ACCESSORIES_SIZE_CREATE', 182);
    define('ACTION_ACCESSORIES_SIZE_EDIT', 183);
    define('ACTION_ACCESSORIES_SIZE_DELETE', 184);

    define('MENU_PRODUCTION_GROUPING', 81);
    define('ACTION_PRODUCTION_GROUPING_CREATE', 185);
    define('ACTION_PRODUCTION_GROUPING_EDIT', 186);
    define('ACTION_PRODUCTION_GROUPING_DELETE', 187);

    define('MENU_ADAS_TYPE', 82);
    define('ACTION_ADAS_TYPE_CREATE', 188);
    define('ACTION_ADAS_TYPE_EDIT', 189);
    define('ACTION_ADAS_TYPE_DELETE', 190);

    define('MENU_PRODUCTION_DC_RETURN', 83);
    define('ACTION_PRODUCTION_DC_RETURN_CREATE', 191);
    define('ACTION_PRODUCTION_DC_RETURN_EDIT', 192);
    define('ACTION_PRODUCTION_DC_RETURN_DELETE', 193);
    define('ACTION_PRODUCTION_DC_RETURN_PRINT', 194);

    define('MENU_ACCESSORIES_DC', 84);
    define('ACTION_ACCESSORIES_DC_CREATE', 195);
    define('ACTION_ACCESSORIES_DC_EDIT', 196);
    define('ACTION_ACCESSORIES_DC_DELETE', 197);
    define('ACTION_ACCESSORIES_DC_PRINT', 198);

    define('MENU_ACCESSORIES_SALES_BILL', 85);
    define('ACTION_ACCESSORIES_SALES_BILL_CREATE', 199);
    define('ACTION_ACCESSORIES_SALES_BILL_EDIT', 200);
    define('ACTION_ACCESSORIES_SALES_BILL_DELETE', 201);
    define('ACTION_ACCESSORIES_SALES_BILL_PRINT', 201);

    // define('MENU_ACCESSORIES_SALES_PAYMENT', 86);
    // define('ACTION_ACCESSORIES_SALES_PAYMENT_CREATE', 202);
    // define('ACTION_ACCESSORIES_SALES_PAYMENT_EDIT', 203);
    // define('ACTION_ACCESSORIES_SALES_PAYMENT_DELETE', 204);

    define('MENU_SECTION_LEDGER', 87);
    define('MENU_SECTION_OUTSTANDING', 88);
    define('MENU_SUPPLIER_ADVANCE_PAYMENT_REPORT', 89);

    define('MENU_ACCESSORIES_SUPPLIER_LEDGER', 90);
    define('MENU_ACCESSORIES_SUPPLIER_OUTSTANDING', 91);
    define('MENU_ACCESSORIES_SUPPLIER_ADVANCE_PAYMENT_REPORT', 92);

    define('MENU_PRODUCTION_STOCK_REPORT', 93);
    define('MENU_FG_STOCK_REPORT', 94);

    define('MENU_PRODUCTION_PENDING_REPORT', 95);
    define('MENU_HALF_FINISHING_GOOD_REPORT', 96);
    define('MENU_PRODUCTION_FG_REPORT', 97);
    define('MENU_LOT_MASTER_REPORT', 98);
    define('MENU_GRAMMAGE_REPORT', 99);
    define('MENU_STOCK_LEDGER', 100);

    define('MENU_UOM', 101);
    define('ACTION_UOM_CREATE', 205);
    define('ACTION_UOM_EDIT', 206);
    define('ACTION_UOM_DELETE', 207);

    define('MENU_SALES_LEDGER', 102);
    define('ACTION_SALES_LEDGER_CREATE', 208);
    define('ACTION_SALES_LEDGER_EDIT', 209);
    define('ACTION_SALES_LEDGER_DELETE', 210);

    define('MENU_SALES_RATE', 103);
    define('ACTION_SALES_RATE_CREATE', 211);
    define('ACTION_SALES_RATE_EDIT', 212);
    define('ACTION_SALES_RATE_DELETE', 213);

    define('MENU_CUSTOMER_UNUSED_REPORT', 104);
    define('MENU_SUPPLIER_UNUSED_REPORT', 105);


    define('MENU_ACCESSORIES_SALES_PAYMENT', 106);
    define('ACTION_ACCESSORIES_SALES_PAYMENT_CREATE', 214);
    define('ACTION_ACCESSORIES_SALES_PAYMENT_EDIT', 215);
    define('ACTION_ACCESSORIES_SALES_PAYMENT_DELETE', 216);

    define('MENU_SUPPLIER_PAYMENT', 107);
    define('ACTION_SUPPLIER_PAYMENT_CREATE', 217);
    define('ACTION_SUPPLIER_PAYMENT_EDIT', 218);
    define('ACTION_SUPPLIER_PAYMENT_DELETE', 219);

    define('MENU_ACCESSORIES_LEDGER', 108);
    define('MENU_SALES_FORECASTING_REPORT', 109);
    define('MENU_PRODUCT_PENDING_REPORT', 110);

    define('MENU_PROCESSING_REPORT', 111);
    define('MENU_PRODUCTION_REPORT', 112);
    define('MENU_PURCHASE_ACCOUNTS_REPORT', 113);

    define('MENU_FREIGHT_MODE', 114);
    define('ACTION_FREIGHT_MODE_CREATE', 220);
    define('ACTION_FREIGHT_MODE_EDIT', 221);
    define('ACTION_FREIGHT_MODE_DELETE', 222);

    define('MENU_TRANSPORTER', 115);
    define('ACTION_TRANSPORTER_CREATE', 223);
    define('ACTION_TRANSPORTER_EDIT', 224);
    define('ACTION_TRANSPORTER_DELETE', 225);

    define('MENU_ECOMMERCE_PROVIDER', 116);
    define('ACTION_ECOMMERCE_PROVIDER_CREATE', 226);
    define('ACTION_ECOMMERCE_PROVIDER_EDIT', 227);
    define('ACTION_ECOMMERCE_PROVIDER_DELETE', 228);

    define('MENU_ORDER_SHEET', 117);
    define('ACTION_ORDER_SHEET_CREATE', 229);
    define('ACTION_ORDER_SHEET_EDIT', 230);
    define('ACTION_ORDER_SHEET_DELETE', 231);

    define('MENU_PACKING_SLIP', 118);
    define('ACTION_PACKING_SLIP_CREATE', 232);
    define('ACTION_PACKING_SLIP_EDIT', 233);
    define('ACTION_PACKING_SLIP_DELETE', 234);

    define('MENU_INVOICE', 119);
    define('ACTION_INVOICE_CREATE', 235);
    define('ACTION_INVOICE_EDIT', 236);
    define('ACTION_INVOICE_DELETE', 237);

    define('MENU_CUSTOMER_PAYMENT', 220);
    define('ACTION_CUSTOMER_PAYMENT_CREATE', 238);
    define('ACTION_CUSTOMER_PAYMENT_EDIT', 238);
    define('ACTION_CUSTOMER_PAYMENT_DELETE', 240);

    define('MENU_LOCAL_SALES_BILL', 221);
    define('ACTION_LOCAL_SALES_BILL_CREATE', 241);
    define('ACTION_LOCAL_SALES_BILL_EDIT', 242);
    define('ACTION_LOCAL_SALES_BILL_DELETE', 243);

    define('MENU_LOCAL_SALES_ESTIMATE', 222);
    define('ACTION_LOCAL_SALES_ESTIMATE_CREATE', 244);
    define('ACTION_LOCAL_SALES_ESTIMATE_EDIT', 245);
    define('ACTION_LOCAL_SALES_ESTIMATE_DELETE', 246);

    define('MENU_PROFORMA_INVOICE', 223);
    define('ACTION_PROFORMA_INVOICE_CREATE', 247);
    define('ACTION_PROFORMA_INVOICE_EDIT', 248);
    define('ACTION_PROFORMA_INVOICE_DELETE', 249);

    define('MENU_ECOMMERCE_SALE', 224);
    define('ACTION_ECOMMERCE_SALE_CREATE', 248);
    define('ACTION_ECOMMERCE_SALE_EDIT', 249);
    define('ACTION_ECOMMERCE_SALE_DELETE', 250);

    define('MENU_INVOICE_STATEMENT', 225);
    define('MENU_CUSTOMER_LEDGER', 226);
    define('MENU_CUSTOMER_OUTSTANDING', 227);
    define('MENU_LOCAL_SALES_REPORT', 228);
    define('MENU_ECOMMERCE_SALE_REPORT', 229);
    define('MENU_SALES_ACCOUNT_REPORT', 230);
    define('MENU_CUSTOMER_ADVANCE_PAYMENT', 231);

    define('MENU_DIA_SIZE_COMBINATIONS', 232);
    define('ACTION_DIA_SIZE_COMBINATIONS_CREATE', 251);
    define('ACTION_DIA_SIZE_COMBINATIONS_EDIT', 252);
    define('ACTION_DIA_SIZE_COMBINATIONS_DELETE', 253);

    define('MENU_FABRIC_INVOICE', 233);
    define('ACTION_FABRIC_INVOICE_CREATE', 254);
    define('ACTION_FABRIC_INVOICE_EDIT', 255);
    define('ACTION_FABRIC_INVOICE_DELETE', 256);

    define('MENU_ACCESSORIES_PO_PENDING_REPORT', 234);

    define('MENU_SALES_PRICE_LIST', 235);
    define('ACTION_SALES_PRICE_LIST_CREATE', 257);
    define('ACTION_SALES_PRICE_LIST_EDIT', 258);
    define('ACTION_SALES_PRICE_LIST_DELETE', 259);

    define('MENU_LYCRA_STOCK', 236);
    define('MENU_UNFOLDING_REPORT', 237);

    define('MENU_ADAS_STOCK_REPORT', 238);

    define('MENU_STOCK_ADJUST', 239);
    define('ACTION_STOCK_ADJUST_CREATE', 258);
    define('ACTION_STOCK_ADJUST_EDIT', 259);
    define('ACTION_STOCK_ADJUST_DELETE', 260);


    define('MENU_PO_TRACKING_REPORT', 240);


    define('MENU_FABRIC_STOCK_ADJUSTMENT', 241);
    define('ACTION_FABRIC_STOCK_ADJUSTMENT_CREATE', 261);
    define('ACTION_FABRIC_STOCK_ADJUSTMENT_EDIT', 262);
    define('ACTION_FABRIC_STOCK_ADJUSTMENT_DELETE', 263);

    define('MENU_STOCK_ADJUSTMENT_REPORT', 242);
    define('MENU_FABRIC_STOCK_ADJUSTMENT_REPORT', 243);

    define('ACTION_PRODUCTION_RC_PROCEED_TO', 264);

    define('MENU_STATUS_CHANGE', 244);
    define('MENU_CUTTING_RECEIVED_REPORT', 245);
    define('MENU_DYEING_FABRIC_PENDING_REPORT', 246);
    define('MENU_PRODUCTION_CONSOLIDATE_REPORT', 247);
    define('MENU_RC_BILL_LOSS_PERCENTAGE', 248);

    // define('ACTION_STATUS_CHANGE_CREATE', 265);

    define('MENU_MRP_CODE', 249);
    define('ACTION_MRP_CODE_CREATE', 264);
    define('ACTION_MRP_CODE_EDIT', 265);
    define('ACTION_MRP_CODE_DELETE', 266);

    define('MENU_CUSTOMER_GROUPING', 250);
    define('ACTION_CUSTOMER_GROUPING_CREATE', 267);
    define('ACTION_CUSTOMER_GROUPING_EDIT', 268);
    define('ACTION_CUSTOMER_GROUPING_DELETE', 269);

    define('MENU_MASTER', 251);
    define('MENU_PRODUCTION_DC_DETAIL_REPORT', 252);

    //payroll
    define('MENU_EMPLOYEE_DEPARTMENT', 253);
    define('ACTION_EMPLOYEE_DEPARTMENT_CREATE', 270);
    define('ACTION_EMPLOYEE_DEPARTMENT_EDIT', 271);
    define('ACTION_EMPLOYEE_DEPARTMENT_DELETE', 272);

    define('MENU_DESIGNATION', 254);
    define('ACTION_DESIGNATION_CREATE', 273);
    define('ACTION_DESIGNATION_EDIT', 274);
    define('ACTION_DESIGNATION_DELETE', 275);

    define('MENU_SALARY_STRUCTURE', 255);
    define('ACTION_SALARY_STRUCTURE_CREATE', 276);
    define('ACTION_SALARY_STRUCTURE_EDIT', 277);
    define('ACTION_SALARY_STRUCTURE_DELETE', 278);

    define('MENU_WEEK_OFF', 256);
    define('ACTION_WEEK_OFF_CREATE', 279);
    define('ACTION_WEEK_OFF_EDIT', 280);
    define('ACTION_WEEK_OFF_DELETE', 281);

    define('MENU_HOLIDAY', 257);
    define('ACTION_HOLIDAY_CREATE', 282);
    define('ACTION_HOLIDAY_EDIT', 283);
    define('ACTION_HOLIDAY_DELETE', 284);

    define('MENU_EMAIL', 258);
    define('ACTION_EMAIL_CREATE', 285);
    define('ACTION_EMAIL_EDIT', 286);
    define('ACTION_EMAIL_DELETE', 287);

    define('MENU_ATTENDANCE', 259);
    define('ACTION_ATTENDANCE_CREATE', 288);
    define('ACTION_ATTENDANCE_EDIT', 289);
    define('ACTION_ATTENDANCE_DELETE', 290);

    define('MENU_PERMISSION_SLIP', 260);
    define('ACTION_PERMISSION_SLIP_CREATE', 291);
    define('ACTION_PERMISSION_SLIP_EDIT', 292);
    define('ACTION_PERMISSION_SLIP_DELETE', 293);

    define('MENU_PAYROLL', 261);
    define('ACTION_PAYROLL_CREATE', 294);
    define('ACTION_PAYROLL_EDIT', 295);
    define('ACTION_PAYROLL_DELETE', 296);

    define('MENU_ADVANCE', 262);
    define('ACTION_ADVANCE_CREATE', 297);
    define('ACTION_ADVANCE_EDIT', 298);
    define('ACTION_ADVANCE_DELETE', 299);

    define('MENU_BONUS', 263);
    define('ACTION_BONUS_CREATE', 300);
    define('ACTION_BONUS_EDIT', 301);
    define('ACTION_BONUS_DELETE', 302);

    define('MENU_OVERALL_REPORT', 264);
    define('MENU_LEAVE_REPORT', 265);
    define('MENU_ATTENDANCE_REPORT', 266);
    define('MENU_EXPENSE_REPORT', 267);
    define('MENU_SALARY_REPORT', 268);
    define('MENU_ESI_PF_REPORT', 269);
    define('MENU_ATTENDANCE_CHANGE_REPORT', 270);
    define('MENU_BANK_REPORT', 271);
    define('MENU_EMAIL_REPORT', 272);
    define('MENU_ACTIVE_EMPLOYEE_REPORT',273);
    define('MENU_OVERALL_REPORT_EMP', 274);
    define('MENU_LEAVE_REPORT_EMP', 275);
    define('MENU_PAYROLL_EMP', 276);
    define('MENU_BONUS_REPORT', 277);
    define('MENU_LATE_PUNCH_REPORT', 278);
    define('MENU_TRANSACTION_REPORT', 279);
    define('MENU_TEXT_EXPORT_REPORT', 280);

    define('MENU_SHIFT', 281);
    define('ACTION_SHIFT_CREATE', 303);
    define('ACTION_SHIFT_EDIT', 304);
    define('ACTION_SHIFT_DELETE', 305);

}
