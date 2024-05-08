<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/apps.css">
</head>

<body>
	
	<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title>Test Print</title><style type="text/css">');

//	  	WindowObject.document.writeln('');
        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
'body{font-family:Arial, Tahoma, Verdana;font-size: 14px;color: #6f7479;}' +
'.wrapper{box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); max-width: 1100px; width: 100%; margin: 0 auto; font-family:Arial, Tahoma, Verdana;}' +
'.billPrintWrapper{padding: 15px; color: #000;}' +
'.billPrintWrapper p {margin: 0; padding: 0;}' +
'.normal {color: #000; font-family:Arial, Tahoma, Verdana; font-size: 15px; margin:0; padding:0; line-height: 29px;}' +
'.td_normal{color: #000; font-family:Arial, Tahoma, Verdana; font-size: 15px; padding:5px 3px;}' +
'.txt_center{text-align: center}' +
'.txt_left{text-align: left}' +
'.txt_right{text-align: right}' +
'.font_big{font-size: 16px;}' +
'.divLeft{float: left; padding-bottom: 6px;}' +
'.divRight{float: right; padding-bottom: 6px;}' +
'.width_half{width: 50%; padding: 5px 3px;}' +
'.td_pading_top{padding-top: 15px;}' +
'.table_body_cus tr td:first-child{border-left: #ccc solid 1px;}'+ 
'.table_body_cus tr td{border-bottom: #ccc solid 1px; border-right: #ccc solid 1px;}' +
'.sl_td{width: 5%; padding: 5px 3px; font-size: 14px;}' +
'.particu_td{width:25%; padding: 3px; font-size: 14px;}' +
'.general_td{width:8.5%; padding: 3px; font-size: 14px; text-align: right;}' +
'.inv_td{width:10%; padding: 3px; font-size: 14px; text-align: right;}' +
'.bg_color_td{background: #D9D9D9;}' +
'.table_head_cus tr td{background: #D9D9D9;}' +
        '} </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>
	
	<div class="wrapper">
	<div id="divToPrint">
	<div class="billPrintWrapper">

		
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
	<tr>
      <td align="left" valign="top"><p class="normal txt_center font_big"><strong>THE WEST BENGAL STATE CO OPERATIVE MARKETING FEDERATION LIMITED</strong></p>
        <p class="normal txt_center">3RD, 1582, SOUTHEND CONCLAVE,RAJDANGA MAIN ROAD, GITANJALI STADIUM, Kolkata, West Bengal, 700107</p></td>
    </tr>
    <tr>
      <td align="left" valign="top"><p class="normal txt_center font_big"><strong>GSTR-3B</strong></p>
        <p class="normal txt_center">1-May-23 to 31-May-23</p></td>
    </tr>
    <tr>
      <td align="left" valign="top">
		<div class="divLeft"><strong>GSTIN/UIN:</strong>19AABAT0010H2ZY</div>
		 <div class="divRight"><strong>1-May-23 to 31-May-23</strong></div>
	</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <thead class="table_head_cus">
			  <tr>
            <td align="left" valign="top" class="width_half"><p class="normal txt_left"><strong>Total Vouchers</strong></p></td>
            <td align="left" valign="top" class="width_half"><p class="normal txt_right"><strong>Voucher Count</strong></p></td>
          </tr>
		  </thead>
        <tbody class="table_body_cus">
          
          <tr>
            <td align="left" valign="top" class="td_normal">Included in Return</td>
            <td align="left" valign="top" class="td_normal txt_right">0</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="td_normal">Included in HSN/SAC Summary</td>
            <td align="left" valign="top" class="td_normal txt_right">0</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="td_normal">Incomplete Information in HSN/SAC Summary (Corrections needed)</td>
            <td align="left" valign="top" class="td_normal txt_right">0</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="td_normal">Not relevant in this Return</td>
            <td align="left" valign="top" class="td_normal txt_right">0</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="td_normal">Uncertain Transactions (Corrections needed)</td>
            <td align="left" valign="top" class="td_normal txt_right">0</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top" class="td_pading_top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <thead>
		  <tr>
            <td class="sl_td bg_color_td"><strong>Table No.</strong></td>
            <td class="particu_td bg_color_td"><strong>Particulars</strong></td>
            <td class="general_td bg_color_td"><strong>Taxable Amount</strong></td>
            <td class="general_td bg_color_td"><strong>Integrated Tax<br>
              Amount</strong></td>
            <td class="general_td bg_color_td"><strong>Central Tax<br>
              Amount</strong></td>
            <td class="general_td bg_color_td"><strong>State Tax Amount</strong></td>
            <td class="general_td bg_color_td"><strong>Cess Amount</strong></td>
            <td class="general_td bg_color_td"><strong>Tax Amount</strong></td>
            </tr>
		  </thead>
        <tbody class="table_body_cus">
          <tr>
            <td align="left" valign="top" class="sl_td"><strong>3.1</strong></td>
            <td align="left" valign="top" class="particu_td"><strong>Outward supplies and inward supplies liable to reverse charge</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">&nbsp;</td>
            <td align="left" valign="top" class="particu_td">Taxable Sales</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">&nbsp;</td>
            <td align="left" valign="top" class="particu_td">Reverse charge supplies</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">2</td>
            <td align="left" valign="top" class="particu_td">B2C(Large) Invoices - 5A, 5B</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">3</td>
            <td align="left" valign="top" class="particu_td">B2C(Small) Invoices - 7</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="sl_td"><strong>3.2</strong></td>
            <td align="left" valign="top" class="particu_td"><strong>Of the supplies shown in 3.1 (a) above, details of inter-state supplies made to unregistered persons, composition taxable persons and UIN holders</strong></td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">&nbsp;</td>
            <td align="left" valign="top" class="particu_td">Credit/Debit Notes(Unregistered) - 9B</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">&nbsp;</td>
            <td align="left" valign="top" class="particu_td">Exports Invoices - 6A</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="sl_td"><strong>4</strong></td>
            <td align="left" valign="top" class="particu_td"><strong>Eligible ITC</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            <td align="left" valign="top" class="general_td"><strong>0.00</strong></td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">8</td>
            <td align="left" valign="top" class="particu_td">Adjustment of Advances - 11B(1), 11B(2)</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
          </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">9</td>
            <td align="left" valign="top" class="particu_td">Nil Rated Invoices - 8A, 8B, 8C, 8D</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
          </tr>
			
			<tr>
			  <td align="left" valign="top" class="sl_td"><strong>5</strong></td>
			  <td align="left" valign="top" class="particu_td"><strong>Value of exempt, nil rated and non-GST inward supplies</strong></td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">From a supplier under composition scheme, exempt and nil rated supply</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">Non GST supply</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			
			<tr>
			  <td align="left" valign="top" class="sl_td"><strong>5.1</strong></td>
			  <td align="left" valign="top" class="particu_td"><strong>Interest and Late fee Payable</strong></td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">Interest</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			
			<tr>
            <td align="left" valign="top" class="sl_td">&nbsp;</td>
            <td align="left" valign="top" class="particu_td">Late Fees</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            </tr>
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td"><strong><u>Reverse Charge Liability and Input Credit to be booked</u></strong></td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">URD Purchases</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">0.00</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">Reverse Charge Inward Supplies</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">0.00</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">Import of Service</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">0.00</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">Input Credit to be Booked</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td"><strong><u>Advance Payments</u></strong></td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">Amount Unadjusted Against Purchases</td>
			  <td align="left" valign="top" class="general_td">0.00</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
			<tr>
			  <td align="left" valign="top" class="sl_td">&nbsp;</td>
			  <td align="left" valign="top" class="particu_td">Purchase Against Advance from Previous Periods</td>
			  <td align="left" valign="top" class="general_td">0.00</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  <td align="left" valign="top" class="general_td">&nbsp;</td>
			  </tr>
        </tbody>
      
<!--
		  <tfoot>
		  <tr>
		    <td align="left" valign="top" class="sl_td bg_color_td">&nbsp;</td>
		    <td align="left" valign="top" class="particu_td bg_color_td"><strong>Total</strong></td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    </tr>
		  </tfoot>
-->
		  
		  </table></td>
    </tr>
  </tbody>
</table>

	
	
		
		
	</div>
	</div>
		<div class="print_sec">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>

                </div>
	
		</div>
</body>
</html>