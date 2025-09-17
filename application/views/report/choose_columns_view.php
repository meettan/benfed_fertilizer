<!DOCTYPE html>
<html>
<head>
    <title>Choose Columns</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
            background: #f9f9f9;
        }
        h3, h4 {
            margin-bottom: 15px;
            color: #333;
        }
        .columns-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 280px;
            height: 320px;
            float: left;
            overflow-y: auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .columns-box h4 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 16px;
            color: #007bff;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }
        .clear { clear: both; }
        .date-box {
            margin: 15px 10px;
            padding: 10px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 580px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .date-box h4 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 16px;
            color: #28a745;
        }
        .date-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .date-row label {
            margin: 0;
            font-weight: bold;
        }
        .date-row input {
            width: 130px;
            height: 28px;
            padding: 2px 6px;
            font-size: 14px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 15px;
        }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

<h4><b>Select Columns for Dynamic Report</b></h4>

<form method="post" action="<?php echo site_url('fert/rep/generate_report'); ?>">

    <?php
    // Aliases for readability
    $purchase_fields = [
        'prod_desc'     =>'Product Name',
        'ro_no'         =>'Ro Number',
        'ro_dt'         =>'Ro Date',
        'invoice_no'    =>'Invoice number',
        'invoice_dt'    =>'Invoice Date',
        'no_of_days'    =>'Credit Period',
        'qty'           =>'Quantity',
        'rate'          =>'Purchase Rate',
        'taxable_amt'   =>'Taxable Amount',
        'cgst'          =>'CGST',
        'sgst'          =>'SGST',
        'tcs'           =>'TCS',
        'retlr_margin'  =>'Retailer Margin',
        'spl_rebt'      =>'Spacial Rebeat',
        'trad_margin'   =>'Trade Margin',
        'oth_dis'       =>'Other Disount',
        'frt_subsidy'   =>'Freight Subsidy',
        'tot_amt'       =>'Total Amount',
        'net_amt'       =>'Net Amount',
  'trn_handling_charge' =>'T & H Charge',
        'created_by'    =>'Created By',
        'created_dt'    =>'Created Date',
        'created_ip'    =>'Created IP',
        'modified_ip'   =>'Modified IP',
        'modified_by'   =>'Modified By',
        'modified_dt'   =>'Modified Date'       
    ];

    $sale_fields = [ 
        'soc_name'    =>'Society Name',
        'trans_do'    =>'Sale Invoice No',
        'trans_dt'    =>'Sale Invoice Date',
        'qty'         =>'Quantity',
        'sale_rt'     =>'Sale Rate',
        'taxable_amt' =>'Taxable Amount',
        'cgst'         =>'CGST',
        'sgst'        =>'SGST',
        'dis'         =>'Discount',
        'tot_amt'     =>'Total Amount',
        'irn'         =>'IRN',
        'ack'         =>'Acknowledge No',
        'ack_dt'      =>'Acknowledge Date',
        'total_amt'   =>'Total Amount',
        'created_by'  =>'Created By',
        'created_dt'  =>'Created Date',
        'created_ip'  =>'Created IP',
        'modified_ip' =>'Modified IP',
        'modified_by' =>'Modified By',
        'modified_dt' =>'Modified Date'     
    ];

    $company_fields = [
        'comp_id'       => 'Company ID',
        'comp_name'     => 'Company Name',
        'short_name'    => 'Short Name',
        'COMP_ADD'      => 'Address',
        'COMP_PN_NO'    => 'Phone No.',
        'COMP_EMAIL_ID' => 'Email',
        'PAN_NO'        => 'PAN NO',
        'GST_NO'        => 'GST NO',
        'CIN'           => 'CIN',
        'MFMS'          => 'MFMS'
    ];
    ?>

    <!-- Purchase Columns -->
    <div class="columns-box">
        <h4>Purchase Columns</h4>
        <?php foreach ($purchase_fields as $col => $alias): ?>
            <label>
                <input type="checkbox" name="purchase_cols[]" value="<?php echo $col; ?>">
                <?php echo $alias; ?>
            </label>
        <?php endforeach; ?>
    </div>

    <!-- Sale Columns -->
    <div class="columns-box">
        <h4>Sale Columns</h4>
        <?php foreach ($sale_fields as $col => $alias): ?>
            <label>
                <input type="checkbox" name="sale_cols[]" value="<?php echo $col; ?>">
                <?php echo $alias; ?>
            </label>
        <?php endforeach; ?>
    </div>

    <!-- Company Columns -->
    <div class="columns-box">
        <h4>Company Columns</h4>
        <?php foreach ($company_fields as $col => $alias): ?>
            <label>
                <input type="checkbox" name="company_cols[]" value="<?php echo $col; ?>">
                <?php echo $alias; ?>
            </label>
        <?php endforeach; ?>
    </div>

    <div class="clear"></div>

    <!-- Date Range Filter -->
    <div class="date-box">
        <h4>📅 Filter by RO Date</h4>
        <div class="date-row">
            <label for="from_date">From:</label>
            <input type="date" name="from_date" id="from_date" required>

            <label for="to_date">To:</label>
            <input type="date" name="to_date" id="to_date" required>
        </div>
    </div>

    <button type="submit">Generate Report</button>
</form>

</body>
</html>
