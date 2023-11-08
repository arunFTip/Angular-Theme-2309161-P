<?php

namespace App\Business\Miscs;

use Auth;
use Hash;
use Carbon;
use PermissionModel;
use FiscalYearModel;

class Helper
{
    public static function msgEnt($columnName)
    {
        return "Please enter " . $columnName . " here";
    }

    public static function msgSel($columnName)
    {
        return "Please select " . $columnName . " here";
    }

    public static function msgAl($columnName)
    {
        return $columnName . " already exist";
    }

    public static function msgDl($columnName)
    {
        return $columnName . ' cannot be deleted. Because it is already associated with other records.';
    }

    public static function msgEd($columnName)
    {
        return $columnName . ' cannot be edited. Because it is already associated with other records.';
    }
    public static function msgCh($columnName)
    {
        return $columnName . ' cannot be changed. Because it is Approved.';
    }
    public static function passwordEncode($password)
    {
        return Hash::make($password);
    }


    public static function getBrowser()
    {
        $user_agent =   $_SERVER['HTTP_USER_AGENT'];
        $browser = "Unknown Browser";
        $browser_array  = array('/msie/i' => 'Internet Explorer', '/firefox/i' => 'Firefox', '/safari/i' => 'Safari', '/mobile/i' => 'Handheld Browser', '/chrome/i' => 'Chrome', '/edge/i' => 'Edge', '/opera/i' =>  'Opera', '/netscape/i' => 'Netscape', '/maxthon/i' => 'Maxthon', '/konqueror/i' => 'Konqueror');
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }
        }
        return $browser;
    }

    public static function getIpAddress()
    {
        return  $_SERVER["REMOTE_ADDR"];
    }
    public static function getFiscalYear($model, $date)
    {
        $fiscalYear = FiscalYearModel::whereRaw(" Date('$date') >= Date(startYear) AND Date('$date') <= Date(endYear) ")->first();
        if (isset($fiscalYear)) {
            return $fiscalYear->fyid;
        } else {
            $unixTimestamp = strtotime($date);
            $date = Carbon::createFromTimestamp($unixTimestamp);
            return $date;
            if ($date->format('m') <= 3) {
                $fsInput['startYear'] = Carbon::parse('01-04-' . $date->addYear(-1)->format('Y'));
                $fsInput['endYear'] = Carbon::parse('31-03-' . $date->format('Y'));
            } else {
                $fsInput['startYear'] = Carbon::parse('01-04-' . $date->format('Y'));
                $fsInput['endYear'] = Carbon::parse('31-03-' . $date->addYear(1)->format('Y'));
            }
            $fiscalYear = FiscalYearModel::create($fsInput);
            return $fiscalYear->fyid;
        }
    }
    public static function setFinancialYear($date, $Model, $type)
    {
        $unixTimestamp = strtotime($date);
        $timeStamp = Carbon::createFromTimestamp($unixTimestamp);
        $from = clone ($timeStamp);
        $to = clone ($timeStamp);
        if ($timeStamp->format('m') <= 3) {
            $from = Carbon::parse('01-04-' . $from->addYear(-1)->format('Y'));
            $to = Carbon::parse('01-04-' . $to->format('Y'));
        } else {
            $from = Carbon::parse('01-04-' . $from->format('Y'));
            $to = Carbon::parse('01-04-' . $to->addYear(1)->format('Y'));
        }

        $getNo = $Model::select("*");
        if (isset($date)) {
            $getNo->whereRaw("DATE(date) BETWEEN DATE('$from') AND DATE('$to')");
        }

        if ($Model == 'InvoiceModel' || $Model == 'PurchaseModel' || $Model == 'RcBillModel') {
            $getNo->where('type', $type);
        }

        if ($Model == 'PaymentModel') {
            $getNo->where('processType', $type);
        }

        if ($Model == 'RcBillModel') {
            $getNo = $getNo->orderBy('invno', 'DESC')->first();
        } else {
            $getNo = $getNo->orderBy('no', 'DESC')->first();
        }

        if (isset($getNo)) {
            if ($Model == 'RcBillModel') {
                $no = $getNo->invno + 1;
            } else {
                $no = $getNo->no + 1;
            }
        } else {
            ($Model == 'InvoiceModel') ? $no = Auth::user()->setting->invoiceStartFrom : $no = 1;
        }

        return $no;
    }

    public static function printFormatHeight($count)
    {
        if ($count <= 19) {
            $height = 500 - (17 * $count);
        }
        if ($count > 19 && $count < 39) {
            $height = 500 - (17 * ($count - 19));
        }
        if ($count > 38) {
            $height = 500 - (17 * ($count - 38));
        }
        return $height;
    }

    public static function numberToText($number)
    {
        $no = floor($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            '0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety'
        );
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($number / 10) * 10]
                    . " " . $words[$number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
            } else {
                $str[] = null;
            }
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ?
            "." . $words[$point / 10] . " " .
            $words[$point = $point % 10] : '';

        return (isset($points) && $points != '') ? $result . "Rupees  " . $points . " Paise Only." : $result . "Rupees  " . $points . " Only.";
    }


    public static function sidebarERPMenu()
    {

        $menu = [

            [
                'name' => "Processing", "icon" => "purchase",
                'menu' => [
                    [
                        "id" => MENU_PROCESS_PLAN,
                        "name" => "Process Plan",
                        "url" => "erp.processPlan",
                        "formUrl" => "erp.createProcessPlan",
                        "icon" => "process",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_PROCESS_PLAN_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_PROCESS_PLAN_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_PROCESS_PLAN_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_DC,
                        "name" => "DC / Outward",
                        "url" => "erp.dc",
                        "formUrl" => "erp.createDc",
                        "icon" => "dc",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_DC_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_DC_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_DC_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_DC_PRINT, "name" => "Approval for Print", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_RC,
                        "name" => "RC / Inward",
                        "url" => "erp.rc",
                        "formUrl" => "erp.createRc",
                        "icon" => "stock",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_RC_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_RC_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_RC_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_RC_PRINT, "name" => "Approval for Print", "active" => 0],
                            ["id" => ACTION_RC_PROCEED_TO, "name" => "Status Change", "active" => 0],
                        ],
                    ],


                ],
            ],
            [
                'name' => "Production", "icon" => "purchase",
                'menu' => [
                    [
                        "id" => MENU_PRODUCTION_DC,
                        "name" => "DC / Outward ",
                        "url" => "erp.productionDc",
                        "formUrl" => "erp.createProductionDc",
                        "icon" => "dc",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_PRODUCTION_DC_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_PRODUCTION_DC_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_PRODUCTION_DC_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_PRODUCTION_DC_PRINT, "name" => "Approval for Print", "active" => 0],
                        ],
                    ],

                    [
                        "id" => MENU_PRODUCTION_RC,
                        "name" => "RC / Inward ",
                        "url" => "erp.productionRc",
                        "formUrl" => "erp.createProductionRc",
                        "icon" => "stock",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_PRODUCTION_RC_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_PRODUCTION_RC_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_PRODUCTION_RC_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_PRODUCTION_RC_PRINT, "name" => "Approval for Print", "active" => 0],
                            ["id" => ACTION_PRODUCTION_RC_PROCEED_TO, "name" => "Status Change", "active" => 0],

                        ],
                    ],
                    [
                        "id" => MENU_ACCESSORIES_DC,
                        "name" => "Accessories DC",
                        "url" => "erp.accessoriesSalesDc",
                        "formUrl" => "erp.createAccessoriesSalesDc",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" => [
                            ["id" => ACTION_ACCESSORIES_DC_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_DC_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_DC_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_DC_PRINT, "name" => "Approval for Print", "active" => 0],

                        ],
                    ],
                ],
            ],
            [
                'name' => "Purchase Order", "icon" => "purchase",
                'menu' => [
                    [
                        "id" => MENU_YARN_PURCHASE_ORDER,
                        "name" => "Yarn PO",
                        "url" => "erp.yarnPurchaseOrder",
                        "formUrl" => "erp.createYarnPurchaseOrder",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_YARN_PURCHASE_ORDER_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_YARN_PURCHASE_ORDER_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_YARN_PURCHASE_ORDER_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_YARN_PURCHASE_ORDER_PRINT, "name" => "Approval for Print", "active" => 0],

                        ],
                    ],
                    [
                        "id" => MENU_FABRIC_PURCHASE_ORDER,
                        "name" => "Fabric PO",
                        "url" => "erp.fabricPurchaseOrder",
                        "formUrl" => "erp.createFabricPurchaseOrder",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_FABRIC_PURCHASE_ORDER_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_FABRIC_PURCHASE_ORDER_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_FABRIC_PURCHASE_ORDER_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_FABRIC_PURCHASE_ORDER_PRINT, "name" => "Approval for Print", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ACCESSORIES_PURCHASE_ORDER,
                        "name" => "Accessories PO",
                        "url" => "erp.accessoriesPurchaseOrder",
                        "formUrl" => "erp.createAccessoriesPurchaseOrder",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ACCESSORIES_PURCHASE_ORDER_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_PURCHASE_ORDER_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_PURCHASE_ORDER_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_PURCHASE_ORDER_PRINT, "name" => "Approval for Print", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ACCESSORIES_INWARD,
                        "name" => "Acc.. RC / Inward",
                        "url" => "erp.accessoriesInward",
                        "formUrl" => "erp.createAccessoriesInward",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ACCESSORIES_INWARD_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_INWARD_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_INWARD_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_INWARD_PRINT, "name" => "Approval for Print", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ACCESSORIES_ADJUSTMENT,
                        "name" => "Acc Stock Adjustment",
                        "url" => "erp.accessoriesStockAdjustment",
                        "formUrl" => "erp.createAccessoriesStockAdjustment",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ACCESSORIES_ADJUSTMENT_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_ADJUSTMENT_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_ADJUSTMENT_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_ADJUSTMENT_PRINT, "name" => "Approval for Print", "active" => 0],
                        ],
                    ],
                ],
            ],
            [
                'name' => "Accounts", "icon" => "business",
                'menu' => [
                    [
                        "id" => MENU_RC_BILL,
                        "name" => "RC Bill",
                        "url" => "erp.rcBill",
                        "formUrl" => "erp.createRcBill",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" => [
                            ["id" => ACTION_RC_BILL_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_RC_BILL_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_RC_BILL_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_RC_BILL_PRINT, "name" => "Approval for Print", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ACCESSORIES_BILL,
                        "name" => "Accssories Bill",
                        "url" => "erp.accessoriesBill",
                        "formUrl" => "erp.createAccessoriesBill",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" => [
                            ["id" => ACTION_ACCESSORIES_BILL_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_BILL_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_BILL_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_BILL_PRINT, "name" => "Approval for Print", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_PRODUCTION_BILL,
                        "name" => "Production Bill",
                        "url" => "erp.productionBill",
                        "formUrl" => "erp.createProductionBill",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" => [
                            ["id" => ACTION_PRODUCTION_BILL_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_PRODUCTION_BILL_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_PRODUCTION_BILL_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_PRODUCTION_BILL_PRINT, "name" => "Approval for Print", "active" => 0],

                        ],
                    ],
                    [
                        "id" => MENU_DEBIT,
                        "name" => "Debit",
                        "url" => "erp.debit",
                        "formUrl" => "erp.createDebit",
                        "icon" => "payment",
                        "active" => 0,
                        "action" => [
                            ["id" => ACTION_DEBIT_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_DEBIT_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_DEBIT_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_SUPPLIER_PAYMENT,
                        "name" => "Supplier Payment",
                        "url" => "erp.supplierPayment",
                        "formUrl" => "erp.createSupplierPayment",
                        "icon" => "payment",
                        "active" => 0,
                        "action" => [
                            ["id" => ACTION_SUPPLIER_PAYMENT_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_SUPPLIER_PAYMENT_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_SUPPLIER_PAYMENT_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ACCESSORIES_SALES_BILL,
                        "name" => "Accessories Invoice",
                        "url" => "erp.accessoriesSalesBill",
                        "formUrl" => "erp.createAccessoriesSalesBill",
                        "icon" => "purchase",
                        "active" => 0,
                        "action" => [
                            ["id" => ACTION_ACCESSORIES_SALES_BILL_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_SALES_BILL_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_SALES_BILL_DELETE, "name" => "Delete", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_SALES_BILL_PRINT, "name" => "Approval for Print", "active" => 0],

                        ],
                    ],
                    [
                        "id" => MENU_ACCESSORIES_SALES_PAYMENT,
                        "name" => "Acc. Invoice Payment",
                        "url" => "erp.accessoriesSalesPayment",
                        "formUrl" => "erp.createAccessoriesSalesPayment",
                        "icon" => "payment",
                        "active" => 0,
                        "action" => [
                            ["id" => ACTION_ACCESSORIES_SALES_PAYMENT_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_SALES_PAYMENT_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ACCESSORIES_SALES_PAYMENT_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],

                ],
            ],
            [
                'name' => "Sales", "icon" => "purchase",
                'menu' => [
                    [
                        "id" => MENU_FABRIC_STOCK_ADJUSTMENT,
                        "name" => "Fabric Stock Adjustment",
                        "url" => "erp.fabricStockAdjustment",
                        "formUrl" => "erp.createFabricStockAdjustment",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_FABRIC_STOCK_ADJUSTMENT_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_FABRIC_STOCK_ADJUSTMENT_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_FABRIC_STOCK_ADJUSTMENT_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_STOCK_ADJUST,
                        "name" => "FG Stock Adjustment",
                        "url" => "erp.stockAdjust",
                        "formUrl" => "erp.createStockAdjust",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_STOCK_ADJUST_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_STOCK_ADJUST_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_STOCK_ADJUST_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ORDER_SHEET,
                        "name" => "Order Sheet",
                        "url" => "erp.orderSheet",
                        "formUrl" => "erp.createOrderSheet",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ORDER_SHEET_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ORDER_SHEET_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ORDER_SHEET_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_PACKING_SLIP,
                        "name" => "Packing Slip",
                        "url" => "erp.packingSlip",
                        "formUrl" => "erp.createPackingSlip",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_PACKING_SLIP_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_PACKING_SLIP_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_PACKING_SLIP_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_INVOICE,
                        "name" => "Invoice",
                        "url" => "erp.invoice",
                        "formUrl" => "erp.createInvoice",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_INVOICE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_INVOICE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_INVOICE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],

                    [
                        "id" => MENU_PROFORMA_INVOICE,
                        "name" => "Proforma Invoice",
                        "url" => "erp.proformaInvoice",
                        "formUrl" => "erp.createProformaInvoice",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_PROFORMA_INVOICE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_PROFORMA_INVOICE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_PROFORMA_INVOICE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_CUSTOMER_PAYMENT,
                        "name" => "Customer Payment",
                        "url" => "erp.customerPayment",
                        "formUrl" => "erp.createCustomerPayment",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_CUSTOMER_PAYMENT_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_CUSTOMER_PAYMENT_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_CUSTOMER_PAYMENT_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],

                    // [
                    //     "id" => MENU_LOCAL_SALES_BILL,
                    //     "name" => "Local Sales Bill",
                    //     "url" => "erp.localSalesBill",
                    //     "formUrl" => "erp.createLocalSalesBill",
                    //     "icon" => "employee",
                    //     "active" => 0,
                    //     "action" =>
                    //     [
                    //         ["id" => ACTION_LOCAL_SALES_BILL_CREATE, "name" => "Create", "active" => 0],
                    //         ["id" => ACTION_LOCAL_SALES_BILL_EDIT, "name" => "Edit", "active" => 0],
                    //         ["id" => ACTION_LOCAL_SALES_BILL_DELETE, "name" => "Delete", "active" => 0],
                    //     ],
                    // ],
                    [
                        "id" => MENU_LOCAL_SALES_ESTIMATE,
                        "name" => "Local Sales Estimate",
                        "url" => "erp.localSalesEstimate",
                        "formUrl" => "erp.createLocalSalesEstimate",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_LOCAL_SALES_ESTIMATE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_LOCAL_SALES_ESTIMATE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_LOCAL_SALES_ESTIMATE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ECOMMERCE_SALE,
                        "name" => "Ecommerce Sale",
                        "url" => "erp.ecommerceSale",
                        "formUrl" => "erp.createEcommerceSale",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ECOMMERCE_SALE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ECOMMERCE_SALE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ECOMMERCE_SALE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],

                    [
                        "id" => MENU_FABRIC_INVOICE,
                        "name" => "Fabric Invoice",
                        "url" => "erp.fabricInvoice",
                        "formUrl" => "erp.createfabricInvoice",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_FABRIC_INVOICE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_FABRIC_INVOICE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_FABRIC_INVOICE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],

                ],
            ],
            [
                'name' => "Status Change", "icon" => "purchase",
                'menu' => [
                    [
                        "id" => MENU_STATUS_CHANGE,
                        "name" => "Status Change",
                        "url" => "erp.statusChange",
                        "icon" => "process",
                        "active" => 0,
                        "action" => [],

                    ],



                ],
            ],
            [
                'name' => "Reports",
                "icon" => "star",
                "url" => "erp.report",
                'menu' => [
                    [
                        'id' => MENU_PROCESSING_REPORT,
                        'name' => "Processing Reports",
                        "icon" => "star",
                        "url" => "erp.report",
                        "active" => 0,
                        "action" => [],
                        'menu' => [
                            [
                                "id" => MENU_YARN_PO_REPORT,
                                "name" => "PO Plan Report",
                                "url" => "erp.poPlanReport",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_PO_PENDING_REPORT,
                                "name" => "PO Pending Report",
                                "url" => "erp.poPendingReport",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_DYEING_FABRIC_PENDING_REPORT,
                                "name" => "Process Pending Report",
                                "url" => "erp.processPendingReport",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_PROCESS_TRACKING,
                                "name" => "Process Tracking",
                                "url" => "erp.processTracking",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],

                            [
                                "id" => MENU_BW_YARN_STOCK,
                                "name" => "BW Yarn Stock",
                                "url" => "erp.bwYarnStock",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_AW_YARN_STOCK,
                                "name" => "AW Yarn Stock",
                                "url" => "erp.awYarnStock",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_FABRIC_STOCK,
                                "name" => "Fabric Stock",
                                "url" => "erp.fabricStock",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_LYCRA_STOCK,
                                "name" => "Lycra Stock",
                                "url" => "erp.lycraYarnStock",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_GENERAL_YARN_STOCK,
                                "name" => "General Yarn Stock",
                                "url" => "erp.generalYarnStock",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_PO_TRACKING_REPORT,
                                "name" => "PO Tracking Report",
                                "url" => "erp.poTrackingReport",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_FABRIC_STOCK_ADJUSTMENT_REPORT,
                                "name" => "Fabric Stock Adjustment Report",
                                "url" => "erp.fabricStockAdjustmentReport",
                                "icon" => "stock",
                                "active" => 0,
                                "action" => [],
                            ]
                        ]
                    ],
                    [
                        'id' => MENU_PRODUCTION_REPORT,
                        'name' => "Production Reports",
                        "icon" => "star",
                        "url" => "erp.report",
                        "active" => 0,
                        "action" => [],
                        'menu' => [
                            [
                                "id" => MENU_STOCK_LEDGER,
                                "name" => "Accessories Stock Ledger",
                                "url" => "erp.accessoriesLedger",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_ACCESSORIES_STOCK,
                                "name" => "Accessories Stock",
                                "url" => "erp.accessoriesStock",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_ACCESSORIES_PO_PENDING_REPORT,
                                "name" => "Accessories PO Pending Report",
                                "url" => "erp.accessoriesPOPendingReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_PRODUCTION_PENDING_REPORT,
                                "name" => "Production Pending Report",
                                "url" => "erp.productionPendingReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_PRODUCT_PENDING_REPORT,
                                "name" => "Product Pending Report",
                                "url" => "erp.productPendingReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_LOT_MASTER_REPORT,
                                "name" => "Lot Master Report",
                                "url" => "erp.lotMaster",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_GRAMMAGE_REPORT,
                                "name" => "Grammage Report",
                                "url" => "erp.grammageReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_HALF_FINISHING_GOOD_REPORT,
                                "name" => "Half Finishing Goods Stock",
                                "url" => "erp.halfFinishingStockReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_PRODUCTION_STOCK_REPORT,
                                "name" => "Production Stock",
                                "url" => "erp.productionStockReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_UNFOLDING_REPORT,
                                "name" => "Unfolding Report",
                                "url" => "erp.unfoldingReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_FG_STOCK_REPORT,
                                "name" => "Final Goods Stock",
                                "url" => "erp.finalgoodsStockReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_STOCK_ADJUSTMENT_REPORT,
                                "name" => "FG Stock Adjustment",
                                "url" => "erp.stockAdjustmentReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_ADAS_STOCK_REPORT,
                                "name" => "Adas Report",
                                "url" => "erp.adasStockReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_CUTTING_RECEIVED_REPORT,
                                "name" => "Cutting Received Report",
                                "url" => "erp.cuttingReceivedReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_PRODUCTION_CONSOLIDATE_REPORT,
                                "name" => "Production Consolidate Report",
                                "url" => "erp.productionConsolidateReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_PRODUCTION_DC_DETAIL_REPORT,
                                "name" => "Production DC Detail Report",
                                "url" => "erp.productionDcDetailReport",
                                "icon" => "summary",
                                "active" => 0,
                                "action" => [],
                            ],
                        ]
                    ],
                    [
                        'id' => MENU_PURCHASE_ACCOUNTS_REPORT,
                        'name' => "Accounts Reports - Purchase",
                        "icon" => "star",
                        "url" => "erp.report",
                        "active" => 0,
                        "action" => [],
                        'menu' => [
                            [
                                "id" => MENU_RC_BILL_STATEMENT,
                                "name" => "Rc Bill Statement",
                                "url" => "erp.rcBillStatement",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_POST_DATE_CHEQUE,
                                "name" => "Post Date Cheque Report",
                                "url" => "erp.postDateChequeReport",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_SUPPLIER_LEDGER,
                                "name" => "Supplier Ledger",
                                "url" => "erp.supplierLedger",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_SUPPLIER_UNUSED_REPORT,
                                "name" => "Supplier Advance Balance Report",
                                "url" => "erp.supplierUnusedReport",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],

                            [
                                "id" => MENU_SUPPLIER_PAYMENT_REPORT,
                                "name" => "Supplier Payment",
                                "url" => "erp.supplierPayment",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_SUPPLIER_RAISE_PAYMENT,
                                "name" => "Supplier Raise Payment",
                                "url" => "erp.supplierRaisePayment",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_SUPPLIER_OUTSTANDING,
                                "name" => "Supplier Outstanding",
                                "url" => "erp.supplierOutstanding",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],

                            [
                                "id" => MENU_ADVANCE_PAYMENT_REPORT,
                                "name" => "Advance Payment Report",
                                "url" => "erp.advancePaymentReport",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_RC_BILL_LOSS_PERCENTAGE,
                                "name" => "Rc Bill Loss Percentage",
                                "url" => "erp.rcBillLossPercentage",
                                "icon" => "business",
                                "active" => 0,
                                "action" => [],
                            ],
                        ]
                    ],
                    [
                        'id' => MENU_SALES_ACCOUNT_REPORT,
                        'name' => "Accounts Reports - Sales",
                        "icon" => "star",
                        "url" => "erp.report",
                        "active" => 0,
                        "action" => [],
                        'menu' => [
                            [
                                "id" => MENU_SALES_FORECASTING_REPORT,
                                "name" => "Sales Forecasting",
                                "url" => "erp.salesForecasting",
                                "icon" => "outstanding",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_INVOICE_STATEMENT,
                                "name" => "Invoice Statement",
                                "url" => "erp.invoiceStatement",
                                "icon" => "outstanding",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_LOCAL_SALES_REPORT,
                                "name" => "Local Sales Report",
                                "url" => "erp.localSalesReport",
                                "icon" => "outstanding",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_ECOMMERCE_SALE_REPORT,
                                "name" => "Ecommerce Sale Report",
                                "url" => "erp.ecommerceSaleReport",
                                "icon" => "outstanding",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_CUSTOMER_LEDGER,
                                "name" => "Customer Ledger",
                                "url" => "erp.customerLedger",
                                "icon" => "outstanding",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_CUSTOMER_OUTSTANDING,
                                "name" => "Customer Outstanding",
                                "url" => "erp.customerOutstanding",
                                "icon" => "outstanding",
                                "active" => 0,
                                "action" => [],
                            ],
                            [
                                "id" => MENU_CUSTOMER_ADVANCE_PAYMENT,
                                "name" => "Customer Advance Payment",
                                "url" => "erp.customerAdvancePayment",
                                "icon" => "outstanding",
                                "active" => 0,
                                "action" => [],
                            ],

                        ]
                    ],
                ],
            ],

            [
                'name' => "Master",
                "icon" => "master",
                "url" => "erp.master",
                'menu' =>
                [

                    [
                        "id" => MENU_MASTER,
                        "name" => "Master",
                        "url" => "erp.master",
                        "icon" => "report",
                        "active" => 0,
                        "action" => [],
                        'menu' => [

                            [
                                "id" => MENU_SUPPLIER,
                                "name" => "Supplier",
                                "url" => "erp.supplier",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_SUPPLIER_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_SUPPLIER_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_SUPPLIER_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_CUSTOMER,
                                "name" => "Customer",
                                "url" => "erp.customer",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_CUSTOMER_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_CUSTOMER_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_CUSTOMER_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],

                            [
                                "id" => MENU_EMPLOYEE,
                                "name" => "employee",
                                "url" => "erp.employee",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_EMPLOYEE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_EMPLOYEE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_EMPLOYEE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_ROLE,
                                "name" => "role",
                                "url" => "erp.role",
                                "icon" => "role",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_ROLE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_ROLE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_ROLE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_USER,
                                "name" => "user",
                                "url" => "erp.user",
                                "icon" => "user",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_USER_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_USER_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_USER_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_PERMISSION,
                                "name" => "permission",
                                "url" => "erp.permission",
                                "icon" => "permission",
                                "active" => 0,
                                "action" =>
                                [],
                            ],

                        ],
                    ],
                    [
                        "id" => MENU_PRODUCTS,
                        "name" => "Product",
                        "url" => "erp.master",
                        "icon" => "party",
                        "active" => 0,
                        "action" => [],
                        'menu' =>
                        [
                            [
                                "id" => MENU_PRODUCTS,
                                "name" => "Product",
                                "url" => "erp.product",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PRODUCTS_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PRODUCTS_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PRODUCTS_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_SIZE,
                                "name" => "Product Size",
                                "url" => "erp.size",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_SIZE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_SIZE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_SIZE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_SIZE_GROUPING,
                                "name" => "Product Size Grouping",
                                "url" => "erp.sizeGrouping",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_SIZE_GROUPING_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_SIZE_GROUPING_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_SIZE_GROUPING_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_DIA_SIZE_COMBINATIONS,
                                "name" => "Dia Size Combinations",
                                "url" => "erp.diaSizeCombinations",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_DIA_SIZE_COMBINATIONS_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_DIA_SIZE_COMBINATIONS_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_DIA_SIZE_COMBINATIONS_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_CATEGORY,
                                "name" => "Category",
                                "url" => "erp.category",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_CATEGORY_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_CATEGORY_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_CATEGORY_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_UOM,
                                "name" => "UOM",
                                "url" => "erp.UOM",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_UOM_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_UOM_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_UOM_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],

                        ]
                    ],
                    [
                        "id" => MENU_PROCESS,
                        "name" => "Process",
                        "url" => "erp.master",
                        "icon" => "party",
                        "active" => 0,
                        "action" => [],
                        'menu' =>
                        [
                            [
                                "id" => MENU_PROCESS,
                                "name" => "Process",
                                "url" => "erp.process",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PROCESS_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PROCESS_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PROCESS_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_PROCESS_GROUPING,
                                "name" => "Process Grouping",
                                "url" => "erp.processGrouping",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PROCESS_GROUPING_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PROCESS_GROUPING_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PROCESS_GROUPING_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_PROCESS_SEQUENCE,
                                "name" => "Process Sequence",
                                "url" => "erp.processSequence",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PROCESS_SEQUENCE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PROCESS_SEQUENCE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PROCESS_SEQUENCE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_REPROCESS_SEQUENCE,
                                "name" => "Reprocess Sequence",
                                "url" => "erp.reprocessSequence",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_REPROCESS_SEQUENCE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_REPROCESS_SEQUENCE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_REPROCESS_SEQUENCE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],

                        ]
                    ],

                    [
                        "id" => MENU_SINGLE_ENTRY,
                        "name" => "Single Entry",
                        "url" => "erp.master",
                        "icon" => "report",
                        "active" => 0,
                        "action" => [],
                        'menu' =>
                        [
                            [
                                "id" => MENU_COLOR,
                                "name" => "Color",
                                "url" => "erp.color",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_COLOR_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_COLOR_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_COLOR_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_COLOR_DETAIL,
                                "name" => "Color Detail",
                                "url" => "erp.colorDetail",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_COLOR_DETAIL_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_COLOR_DETAIL_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_COLOR_DETAIL_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_COUNT,
                                "name" => "Count",
                                "url" => "erp.count",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_COUNT_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_COUNT_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_COUNT_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_DIA,
                                "name" => "Dia",
                                "url" => "erp.dia",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_DIA_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_DIA_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_DIA_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_GSM,
                                "name" => "GSM",
                                "url" => "erp.gsm",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_GSM_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_GSM_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_GSM_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_YARN_TYPE,
                                "name" => "Yarn Type",
                                "url" => "erp.yarnType",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_YARN_TYPE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_YARN_TYPE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_YARN_TYPE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_FABRIC_TYPE,
                                "name" => "Fabric Type",
                                "url" => "erp.fabricType",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_FABRIC_TYPE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_FABRIC_TYPE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_FABRIC_TYPE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_FABRIC_STRUCTURE,
                                "name" => "Fabric Structure",
                                "url" => "erp.fabricStructure",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_FABRIC_STRUCTURE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_FABRIC_STRUCTURE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_FABRIC_STRUCTURE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_SUPPLIER_GROUPING,
                                "name" => "Supplier Grouping",
                                "url" => "erp.supplierGrouping",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_SUPPLIER_GROUPING_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_SUPPLIER_GROUPING_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_SUPPLIER_GROUPING_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_CUSTOMER_GROUPING,
                                "name" => "Customer Grouping",
                                "url" => "erp.customerGrouping",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_CUSTOMER_GROUPING_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_CUSTOMER_GROUPING_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_CUSTOMER_GROUPING_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_UNIT,
                                "name" => "Unit",
                                "url" => "erp.unit",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_UNIT_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_UNIT_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_UNIT_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_PRICELIST,
                                "name" => "Price List",
                                "url" => "erp.priceList",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PRICELIST_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PRICELIST_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PRICELIST_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            // [
                            //     "id" => MENU_SALES_PRICE_LIST,
                            //     "name" => "Sales Price List",
                            //     "url" => "erp.singleEntry.salesPriceList",
                            //     "active" => 0,
                            //     "action" =>
                            //     [
                            //         ["id" => ACTION_SALES_PRICE_LIST_CREATE, "name" => "Create", "active" => 0],
                            //         ["id" => ACTION_SALES_PRICE_LIST_EDIT, "name" => "Edit", "active" => 0],
                            //         ["id" => ACTION_SALES_PRICE_LIST_DELETE, "name" => "Delete", "active" => 0],
                            //     ],
                            // ],
                            [
                                "id" => MENU_SALES_LEDGER,
                                "name" => "Sales Ledger",
                                "url" => "erp.salesLedger",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_SALES_LEDGER_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_SALES_LEDGER_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_SALES_LEDGER_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_FREIGHT_MODE,
                                "name" => "Freight Mode",
                                "url" => "erp.freightMode",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_FREIGHT_MODE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_FREIGHT_MODE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_FREIGHT_MODE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_TRANSPORTER,
                                "name" => "Transporter",
                                "url" => "erp.transporter",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_TRANSPORTER_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_TRANSPORTER_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_TRANSPORTER_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_ECOMMERCE_PROVIDER,
                                "name" => "Ecommerce Provider",
                                "url" => "erp.ecommerceProvider",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_ECOMMERCE_PROVIDER_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_ECOMMERCE_PROVIDER_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_ECOMMERCE_PROVIDER_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_MRP_CODE,
                                "name" => "Mrp Code",
                                "url" => "erp.mrpCode",
                                "icon" => "employee",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_MRP_CODE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_MRP_CODE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_MRP_CODE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],

                        ]
                    ],
                    [
                        "id" => MENU_PRODUCTION_TYPE,
                        "name" => "Production",
                        "url" => "erp.master",
                        "icon" => "party",
                        "active" => 0,
                        "action" => [],
                        'menu' =>
                        [
                            [
                                "id" => MENU_PRODUCTION_TYPE,
                                "name" => "Production Type",
                                "url" => "erp.productionType",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PRODUCTION_TYPE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PRODUCTION_TYPE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PRODUCTION_TYPE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_PRODUCTION_GROUPING,
                                "name" => "Production Grouping",
                                "url" => "erp.productionGrouping",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PRODUCTION_GROUPING_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PRODUCTION_GROUPING_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PRODUCTION_GROUPING_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_ADAS_TYPE,
                                "name" => "Adas Type",
                                "url" => "erp.adasType",
                                "icon" => "item",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_ADAS_TYPE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_ADAS_TYPE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_ADAS_TYPE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],

                        ]
                    ],
                    [
                        "id" => MENU_ACCESSORIES,
                        "name" => "Accessories",
                        "url" => "erp.master",
                        "icon" => "party",
                        "active" => 0,
                        "action" => [],
                        'menu' =>  [
                            [
                                "id" => MENU_ACCESSORIES,
                                "name" => "Accessories",
                                "url" => "erp.accessories",
                                "icon" => "department",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_ACCESSORIES_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_ACCESSORIES_COLOR,
                                "name" => "Accessories Color",
                                "url" => "erp.accColor",
                                "icon" => "department",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_ACCESSORIES_COLOR_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_COLOR_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_COLOR_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_ACCESSORIES_COLOR_DETAIL,
                                "name" => "Accessories Color Detail",
                                "url" => "erp.accColorDetail",
                                "icon" => "department",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_ACCESSORIES_COLOR_DETAIL_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_COLOR_DETAIL_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_COLOR_DETAIL_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_ACCESSORIES_SIZE,
                                "name" => "Accessories Size",
                                "url" => "erp.accSize",
                                "icon" => "department",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_ACCESSORIES_SIZE_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_SIZE_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_SIZE_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],

                        ]
                    ],
                    [
                        "id" => MENU_RATE_CONFIRMATION,
                        "name" => "Rate Confirmation",
                        "url" => "erp.master",
                        "icon" => "item",
                        "active" => 0,
                        "action" => [],
                        'menu' =>
                        [
                            [
                                "id" => MENU_YARN_RATE_CONFIRMATION,
                                "name" => "Yarn Rate",
                                "url" => "erp.yarnRateConfirmation",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_YARN_RATE_CONFIRMATION_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_YARN_RATE_CONFIRMATION_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_YARN_RATE_CONFIRMATION_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_FABRIC_RATE_CONFIRMATION,
                                "name" => "Fabric Rate",
                                "url" => "erp.fabricRateConfirmation",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_FABRIC_RATE_CONFIRMATION_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_FABRIC_RATE_CONFIRMATION_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_FABRIC_RATE_CONFIRMATION_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_PROCESS_RATE_CONFIRMATION,
                                "name" => "Process Rate",
                                "url" => "erp.processRateConfirmation",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PROCESS_RATE_CONFIRMATION_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PROCESS_RATE_CONFIRMATION_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PROCESS_RATE_CONFIRMATION_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_PRODUCTION_RATE_CONFIRMATION,
                                "name" => "Production Rate",
                                "url" => "erp.productionRateConfirmation",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_PRODUCTION_RATE_CONFIRMATION_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_PRODUCTION_RATE_CONFIRMATION_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_PRODUCTION_RATE_CONFIRMATION_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_ACCESSORIES_RATE_CONFIRMATION,
                                "name" => "Accessories Rate",
                                "url" => "erp.accessoriesRateConfirmation",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_ACCESSORIES_RATE_CONFIRMATION_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_RATE_CONFIRMATION_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_ACCESSORIES_RATE_CONFIRMATION_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            [
                                "id" => MENU_SALES_PRICE_LIST,
                                "name" => "Sales Price List",
                                "url" => "erp.salesPricelist",
                                "icon" => "party",
                                "active" => 0,
                                "action" =>
                                [
                                    ["id" => ACTION_SALES_PRICE_LIST_CREATE, "name" => "Create", "active" => 0],
                                    ["id" => ACTION_SALES_PRICE_LIST_EDIT, "name" => "Edit", "active" => 0],
                                    ["id" => ACTION_SALES_PRICE_LIST_DELETE, "name" => "Delete", "active" => 0],
                                ],
                            ],
                            // [
                            //     "id" => MENU_SALES_RATE,
                            //     "name" => "Sales Rate",
                            //     "url" => "erp.rateConfirmation.salesRate",
                            //     "icon" => "employee",
                            //     "active" => 0,
                            //     "action" =>
                            //     [
                            //         ["id" => ACTION_SALES_RATE_CREATE, "name" => "Create", "active" => 0],
                            //         ["id" => ACTION_SALES_RATE_EDIT, "name" => "Edit", "active" => 0],
                            //         ["id" => ACTION_SALES_RATE_DELETE, "name" => "Delete", "active" => 0],
                            //     ],
                            // ],
                        ]
                    ],


                ]
            ],

            [
                // "id" => MENU_SETTING,
                // "name" => "Settings",
                // "url" => "erp.setting.profile",
                // "icon" => "report",
                // "active" => 0,
                // "action" => [],
                // 'menu' => [
                "name" => "Settings",
                "icon" => "setting",
                "url" => "erp.setting.profile",
                'menu' =>
                [
                    [
                        "id" => MENU_SETTING,
                        "name" => "Settings",
                        "url" => "erp.setting.profile",
                        "icon" => "setting",
                        "active" => 0,
                        "action" => [],
                    ],
                    [
                        "id" => MENU_PROFILE,
                        "name" => "Profile",
                        "url" => "erp.setting.profile",
                        "icon" => "party",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_PROFILE_EDIT, "name" => "Edit", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_BRANCH,
                        "name" => "Company",
                        "url" => "erp.setting.branch",
                        "icon" => "party",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_BRANCH_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_BRANCH_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_BRANCH_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_THEME,
                        "name" => "Themes",
                        "url" => "erp.setting.theme",
                        "icon" => "party",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_THEME_EDIT, "name" => "Edit", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_BANK,
                        "name" => "Bank",
                        "url" => "erp.setting.bank",
                        "icon" => "party",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_BANK_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_BANK_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_BANK_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],

                    [
                        "id" => MENU_ACCOUNT_INFO,
                        "name" => "Account Info",
                        "url" => "erp.setting.accountInfo",
                        "icon" => "party",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ACCOUNT_INFO_EDIT, "name" => "Edit", "active" => 0],
                        ],
                    ],

                ],
            ],

        ];
      
        $customMenu = ($menu);       
        
        $user = Auth::user();
        $menuPermission = PermissionModel::where('type', 1)->where('roid', $user->roid)->get();
        $actionPermission = PermissionModel::where('type', 2)->where('roid', $user->roid)->get();

        foreach ($customMenu as $key1 => $mn) {
            foreach ($mn['menu'] as $key2 => $m) {
                foreach ($menuPermission as $key3 => $men) {
                    if ($m['id'] == $men['typeId']) {
                        $customMenu[$key1]['menu'][$key2]['active'] = 1;
                        if (isset($m['menu']) && count($m['menu']) > 0) {
                            foreach ($m['menu'] as $key21 => $m1) {
                                foreach ($menuPermission as $key31 => $men1) {
                                    if ($m1['id'] == $men1['typeId']) {
                                        $customMenu[$key1]['menu'][$key2]['menu'][$key21]['active'] = 1;

                                        if (isset($m1['menu']) && count($m1['menu']) > 0) {
                                            foreach ($m1['menu'] as $key21 => $ms) {
                                                foreach ($menuPermission as $keys => $mens1) {
                                                    if ($ms['id'] == $mens1['typeId']) {
                                                        $customMenu[$key1]['menu'][$key2]['menu'][$key21]['menu'][$keys]['active'] = 1;
                                                    }
                                                }
                                                foreach ($ms['action'] as $keys2 => $as2) {
                                                    foreach ($actionPermission as $acts1) {
                                                        if ($as2['id'] == $acts1['typeId']) {
                                                            $customMenu[$key1]['menu'][$key2]['menu'][$key21]['menu'][$keys]['action'][$keys2]['active'] = 1;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                foreach ($m1['action'] as $key4 => $a1) {
                                    foreach ($actionPermission as $act1) {
                                        if ($a1['id'] == $act1['typeId']) {
                                            $customMenu[$key1]['menu'][$key2]['menu'][$key21]['action'][$key4]['active'] = 1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                foreach ($m['action'] as $key4 => $a) {
                    foreach ($actionPermission as $act) {
                        if ($a['id'] == $act['typeId']) {
                            $customMenu[$key1]['menu'][$key2]['action'][$key4]['active'] = 1;
                        }
                    }
                }
            }
        }
        $newMenu = [];
        foreach ($customMenu as $key5 => $mn2) {
            $set = 0;
            foreach ($mn2['menu'] as $key6 => $m2) {
                if ($m2['active'] == 1) {
                    $set = 1;
                    break;
                }
            }
            if ($set == 1) $newMenu[] = $mn2;
        }

        foreach ($newMenu as $key7 => $mn3) {
            foreach ($mn3['menu'] as $key8 => $m3) {
                if ($m3['active'] == 0) {
                    array_splice($newMenu[$key7]['menu'], $key8, 1);
                }
            }
        }

        foreach ($newMenu as $key12 => $mn4) {
            foreach ($mn4['menu'] as $key13 => $mn5) {
                if (isset($mn5['menu']) && count($mn5['menu']) > 0) {
                    foreach ($mn5['menu'] as $key14 => $mn6) {
                        if ($mn6['active'] == 0) {
                            array_splice($newMenu[$key12]['menu'][$key13]['menu'], $key14, 1);
                        }
                    }
                }
            }
        }

        foreach ($newMenu as $key9 => $mn4) {
            foreach ($mn4['menu'] as $key10 => $m4) {
                if (isset($m4['menu']) && count($m4['menu']) > 0) {
                    $m4['subMenu'] = [];
                    foreach ($m4['menu'] as $key11 => $sm) {
                        if ($sm['active'] == 1) {
                            $newMenu[$key9]['menu'][$key10]['subMenu'][] = $sm;
                        }
                    }
                }
            }
        }
        $data['menu'] = $menu;
        $data['customMenu'] = $newMenu;
        return $data;
    
    }
    public static function sidebarPayrollMenu()
    {
        $payrollMenu = [
            [
                'name' => "Attendance", "icon" => "daily",
                'menu' =>
                [
                    [
                        "id" => MENU_ATTENDANCE,
                        "name" => "Attendance",
                        "url" => "payroll.attendance",
                        "icon" => "daily",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ATTENDANCE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ATTENDANCE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ATTENDANCE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],

                    [
                        "id" => MENU_PERMISSION_SLIP,
                        "name" => "Permission Slip",
                        "url" => "payroll.permissionSlip",
                        "icon" => "daily",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_PERMISSION_SLIP_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_PERMISSION_SLIP_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_PERMISSION_SLIP_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ATTENDANCE_REPORT,
                        "name" => "Attendance Report",
                        "url" => "payroll.attendanceReport",
                        "icon" => "daily",
                        "active" => 0,
                        "action" =>
                        [],
                    ],

                ],
            ],
            [
                'name' => "Payroll Generation", "icon" => "payroll",
                'menu' =>
                [
                    [
                        "id" => MENU_ADVANCE,
                        "name" => "Advance Payment",
                        "url" => "payroll.advancePayment",
                        "icon" => "payment",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ADVANCE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ADVANCE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ADVANCE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_PAYROLL,
                        "name" => "Payroll",
                        "url" => "payroll.payroll",
                        "icon" => "payroll",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_PAYROLL_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_PAYROLL_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_PAYROLL_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                ],
            ],
            [
                'name' => "Bonus", "icon" => "payroll",
                'menu' =>
                [
                    [
                        "id" => MENU_BONUS,
                        "name" => "Bonus Payment",
                        "url" => "payroll.bonusPayment",
                        "icon" => "bonus",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_BONUS_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_BONUS_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_BONUS_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_BONUS_REPORT,
                        "name" => "Bonus Report",
                        "url" => "payroll.bonusReport",
                        "icon" => "daily",
                        "active" => 0,
                        "action" =>
                        [],
                    ],
                ],
            ],
            [
                'name' => "Reports", "icon" => "daily",
                'menu' =>
                [
                    [
                        "id" => MENU_EXPENSE_REPORT,
                        "name" => "Expense Report",
                        "url" => "payroll.expenseReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                    [
                        "id" => MENU_SALARY_REPORT,
                        "name" => "Labour Wages List",
                        "url" => "payroll.salaryReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                    [
                        "id" => MENU_ESI_PF_REPORT,
                        "name" => "ESI & PF Report",
                        "url" => "payroll.esiPfReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                    [
                        "id" => MENU_ATTENDANCE_CHANGE_REPORT,
                        "name" => "Attendance Change Report",
                        "url" => "payroll.attendanceChangeReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                    [
                        "id" => MENU_LATE_PUNCH_REPORT,
                        "name" => "Late Punch Report",
                        "url" => "payroll.latePunchReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                    // [
                    //     "id" => MENU_BANK_REPORT,
                    //     "name" => "Bank Report",
                    //     "url" => "payroll.bankReport",
                    //     "icon" => "reports",
                    //     "active" => 0,
                    //     "action" => [],
                    // ],
                    [
                        "id" => MENU_EMAIL_REPORT,
                        "name" => "Email Report",
                        "url" => "payroll.emailReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                    [
                        "id" => MENU_ACTIVE_EMPLOYEE_REPORT,
                        "name" => "Active Employee Report",
                        "url" => "payroll.activeEmployeeReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                    [
                        "id" => MENU_TRANSACTION_REPORT,
                        "name" => "Transaction Report",
                        "url" => "payroll.transactionReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                    [
                        "id" => MENU_TEXT_EXPORT_REPORT,
                        "name" => "Bank Report",
                        "url" => "payroll.textExportReport",
                        "icon" => "reports",
                        "active" => 0,
                        "action" => [],
                    ],
                ],
            ],

            [
                'name' => " Master", "icon" => "master",
                'menu' => [
                    [
                        "id" => MENU_EMPLOYEE,
                        "name" => "employee",
                        "url" => "payroll.employee",
                        "icon" => "party",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_EMPLOYEE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_EMPLOYEE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_EMPLOYEE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_EMPLOYEE_DEPARTMENT,
                        "name" => "Employee Department",
                        "url" => "payroll.employeeDepartment",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_EMPLOYEE_DEPARTMENT_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_EMPLOYEE_DEPARTMENT_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_EMPLOYEE_DEPARTMENT_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_DESIGNATION,
                        "name" => "Designation",
                        "url" => "payroll.designation",
                        "icon" => "designation",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_DESIGNATION_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_DESIGNATION_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_DESIGNATION_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_SHIFT,
                        "name" => "Shift",
                        "url" => "payroll.shift",
                        "icon" => "employee",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_SHIFT_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_SHIFT_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_SHIFT_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
           
                    [
                        "id" => MENU_SALARY_STRUCTURE,
                        "name" => "Salary Structure",
                        "url" => "payroll.salaryStructure",
                        "icon" => "structure",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_SALARY_STRUCTURE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_SALARY_STRUCTURE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_SALARY_STRUCTURE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_WEEK_OFF,
                        "name" => "Weekly Offs",
                        "url" => "payroll.weekOff",
                        "icon" => "weekOff",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_WEEK_OFF_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_WEEK_OFF_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_WEEK_OFF_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_HOLIDAY,
                        "name" => "Holiday",
                        "url" => "payroll.holiday",
                        "icon" => "holiday",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_HOLIDAY_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_HOLIDAY_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_HOLIDAY_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_EMAIL,
                        "name" => "Email",
                        "url" => "payroll.email",
                        "icon" => "email",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_EMAIL_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_EMAIL_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_EMAIL_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_ROLE,
                        "name" => "role",
                        "url" => "payroll.role",
                        "icon" => "role",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_ROLE_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_ROLE_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_ROLE_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
                    [
                        "id" => MENU_USER,
                        "name" => "user",
                        "url" => "payroll.user",
                        "icon" => "user",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_USER_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_USER_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_USER_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],

                    [
                        "id" => MENU_PERMISSION,
                        "name" => "permission",
                        "url" => "payroll.permission",
                        "icon" => "permission",
                        "active" => 0,
                        "action" =>
                        [],
                    ],
                    [
                        "id" => MENU_BRANCH,
                        "name" => "Company",
                        "url" => "payroll.setting.branch",
                        "icon" => "party",
                        "active" => 0,
                        "action" =>
                        [
                            ["id" => ACTION_BRANCH_CREATE, "name" => "Create", "active" => 0],
                            ["id" => ACTION_BRANCH_EDIT, "name" => "Edit", "active" => 0],
                            ["id" => ACTION_BRANCH_DELETE, "name" => "Delete", "active" => 0],
                        ],
                    ],
             

                ],
            ],

        ];
        $customMenu = ($payrollMenu);       
        
        $user = Auth::user();
        $menuPermission = PermissionModel::where('type', 1)->where('roid', $user->roid)->get();
        $actionPermission = PermissionModel::where('type', 2)->where('roid', $user->roid)->get();

        foreach ($customMenu as $key1 => $mn) {
            foreach ($mn['menu'] as $key2 => $m) {
                foreach ($menuPermission as $key3 => $men) {
                    if ($m['id'] == $men['typeId']) {
                        $customMenu[$key1]['menu'][$key2]['active'] = 1;
                        if (isset($m['menu']) && count($m['menu']) > 0) {
                            foreach ($m['menu'] as $key21 => $m1) {
                                foreach ($menuPermission as $key31 => $men1) {
                                    if ($m1['id'] == $men1['typeId']) {
                                        $customMenu[$key1]['menu'][$key2]['menu'][$key21]['active'] = 1;

                                        if (isset($m1['menu']) && count($m1['menu']) > 0) {
                                            foreach ($m1['menu'] as $key21 => $ms) {
                                                foreach ($menuPermission as $keys => $mens1) {
                                                    if ($ms['id'] == $mens1['typeId']) {
                                                        $customMenu[$key1]['menu'][$key2]['menu'][$key21]['menu'][$keys]['active'] = 1;
                                                    }
                                                }
                                                foreach ($ms['action'] as $keys2 => $as2) {
                                                    foreach ($actionPermission as $acts1) {
                                                        if ($as2['id'] == $acts1['typeId']) {
                                                            $customMenu[$key1]['menu'][$key2]['menu'][$key21]['menu'][$keys]['action'][$keys2]['active'] = 1;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                foreach ($m1['action'] as $key4 => $a1) {
                                    foreach ($actionPermission as $act1) {
                                        if ($a1['id'] == $act1['typeId']) {
                                            $customMenu[$key1]['menu'][$key2]['menu'][$key21]['action'][$key4]['active'] = 1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                foreach ($m['action'] as $key4 => $a) {
                    foreach ($actionPermission as $act) {
                        if ($a['id'] == $act['typeId']) {
                            $customMenu[$key1]['menu'][$key2]['action'][$key4]['active'] = 1;
                        }
                    }
                }
            }
        }
        $newMenu = [];
        foreach ($customMenu as $key5 => $mn2) {
            $set = 0;
            foreach ($mn2['menu'] as $key6 => $m2) {
                if ($m2['active'] == 1) {
                    $set = 1;
                    break;
                }
            }
            if ($set == 1) $newMenu[] = $mn2;
        }

        foreach ($newMenu as $key7 => $mn3) {
            foreach ($mn3['menu'] as $key8 => $m3) {
                if ($m3['active'] == 0) {
                    array_splice($newMenu[$key7]['menu'], $key8, 1);
                }
            }
        }

        foreach ($newMenu as $key12 => $mn4) {
            foreach ($mn4['menu'] as $key13 => $mn5) {
                if (isset($mn5['menu']) && count($mn5['menu']) > 0) {
                    foreach ($mn5['menu'] as $key14 => $mn6) {
                        if ($mn6['active'] == 0) {
                            array_splice($newMenu[$key12]['menu'][$key13]['menu'], $key14, 1);
                        }
                    }
                }
            }
        }

        foreach ($newMenu as $key9 => $mn4) {
            foreach ($mn4['menu'] as $key10 => $m4) {
                if (isset($m4['menu']) && count($m4['menu']) > 0) {
                    $m4['subMenu'] = [];
                    foreach ($m4['menu'] as $key11 => $sm) {
                        if ($sm['active'] == 1) {
                            $newMenu[$key9]['menu'][$key10]['subMenu'][] = $sm;
                        }
                    }
                }
            }
        }
        $data['menu'] = $payrollMenu;
        $data['customMenu'] = $newMenu;
        return $data;
    
    }    

        
}
