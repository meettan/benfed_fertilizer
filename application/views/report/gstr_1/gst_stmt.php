<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px;

    font-size: 14px;
}

th {

    text-align: center;

}

tr:hover {background-color: #f5f5f5;}

</style>

<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>	<div class="wrapper">
<div class="col-lg-12 container contant-wraper">
	<!-- <div class="billPrintWrapper"> -->
  <div id="divToPrint">
	<!-- <table width="100%" border="0" cellpadding="0" cellspacing="0"> -->
  <tbody>
	  <tr>
      <td align="left" valign="top"><p class="normal txt_center font_big"><strong>THE WEST BENGAL STATE CO OPERATIVE MARKETING FEDERATION LIMITED</strong></p>
        <p class="normal txt_center">3RD, 1582, SOUTHEND CONCLAVE,RAJDANGA MAIN ROAD, GITANJALI STADIUM, Kolkata, West Bengal, 700107</p></td>
    </tr>
	  
    <tr>
      <td align="left" valign="top"><p class="normal txt_center font_big"><strong>GSTR-1</strong></p>
        <p class="normal txt_center"><?php echo $_SESSION['date']; ?></p></td>   
      
    </tr>
    <tr>
      <td align="left" valign="top">
		<div class="divLeft"><strong>GSTIN/UIN:</strong>19AABAT0010H2ZY</div>
		 <div class="divRight"><strong><?php echo $_SESSION['date']; ?></strong></div>
    
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
            <td class="sl_td bg_color_td"><strong>Sl No.</strong></td>
            <td class="particu_td bg_color_td"><strong>Particulars</strong></td>
            <td class="general_td bg_color_td"><strong>Voucher<br>
              Count</strong></td>
            <td class="general_td bg_color_td"><strong>Taxable Amount</strong></td>
            <td class="general_td bg_color_td"><strong>Integrated Tax<br>
              Amount</strong></td>
            <td class="general_td bg_color_td"><strong>Central Tax<br>
              Amount</strong></td>
            <td class="general_td bg_color_td"><strong>State Tax Amount</strong></td>
            <td class="general_td bg_color_td"><strong>Cess Amount</strong></td>
            <td class="general_td bg_color_td"><strong>Tax Amount</strong></td>
            <td class="inv_td bg_color_td"><strong>Invoice Amount</strong></td>
          </tr>
		  </thead>
        <tbody class="table_body_cus">
        <?php
         $i                = 1;
        foreach($tot_tax as $tottx)
        {
         ?>
          <tr>
            <td align="left" valign="top" class="sl_td"><?php echo $i++; ?></td>
            <td align="left" valign="top" class="particu_td">B2B Invoices - 4A, 4B, 4C, 6B, 6C</td>
            <td align="left" valign="top" class="general_td"><?php echo $tottx->no_of_b2b; ?></td>
            <td align="left" valign="top" class="general_td"><?php echo $tottx->taxable_amt; ?></td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td"><?php echo $tottx->cgst; ?></td>
            <td align="left" valign="top" class="general_td"><?php echo $tottx->sgst; ?></td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td"><?php echo ($tottx->cgst + $tottx->sgst) ; ?></td>
            <td align="left" valign="top" class="inv_td"><span class="general_td"><?php echo ($tottx->taxable_amt +$tottx->cgst + $tottx->sgst) ; ?></span></td>
          </tr>
          <?php  
               }
            ?>
            <?php
        foreach($b2b as $bb)
        {
         ?>
          <tr>
            <td align="left" valign="top" class="sl_td">&nbsp;</td>
            <td align="left" valign="top" class="particu_td">Taxable Sales</td>
            <td align="left" valign="top" class="general_td"><?php echo $bb->no_of_b2b; ?></td>
            <td align="left" valign="top" class="general_td"><?php echo $bb->taxable_amt; ?></td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td"><?php echo $bb->cgst; ?></td>
            <td align="left" valign="top" class="general_td"><?php echo $bb->sgst; ?></td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td"><?php echo ($bb->cgst + $bb->sgst) ; ?></td>
            <td align="left" valign="top" class="inv_td"><span class="general_td"><?php echo ($bb->taxable_amt +$bb->cgst + $bb->sgst) ; ?></span></td>
          </tr>
          <?php  
               }
            ?>
          <tr> 
            <td align="left" valign="top" class="sl_td">&nbsp;</td>
            <td align="left" valign="top" class="particu_td">Reverse charge supplies</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="inv_td">0.00</td>
            </tr>
            <?php
        foreach($b2c as $bc)
        {
         ?>
          <tr>
            <td align="left" valign="top" class="sl_td">2</td>
            <td align="left" valign="top" class="particu_td">B2C(Large) Invoices - 5A, 5B</td>
            <td align="left" valign="top" class="general_td">#</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="inv_td">0.00</td>

            </tr>
            <?php  
               }
            ?>
          <tr>
             
            <td align="left" valign="top" class="sl_td"><?php echo $i++; ?></td>
            <td align="left" valign="top" class="particu_td">B2C(Small) Invoices - 5A, 5B</td>
            <td align="left" valign="top" class="general_td"><?php echo $bc->no_of_b2b; ?></td>
            <td align="left" valign="top" class="general_td"><?php echo $bc->taxable_amt; ?></td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td"><?php echo $bc->cgst; ?></td>
            <td align="left" valign="top" class="general_td"><?php echo $bc->sgst; ?></td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td"><?php echo ($bc->cgst + $bc->sgst) ; ?></td>
            <td align="left" valign="top" class="inv_td"><span class="general_td"><?php echo ($bc->taxable_amt +$bc->cgst + $bc->sgst) ; ?></span></td>

            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">4</td>
            <td align="left" valign="top" class="particu_td">Credit/Debit Notes(Registered) - 9B</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="inv_td">0.00</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">5</td>
            <td align="left" valign="top" class="particu_td">Credit/Debit Notes(Unregistered) - 9B</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="inv_td">0.00</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">6</td>
            <td align="left" valign="top" class="particu_td">Exports Invoices - 6A</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="inv_td">0.00</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">7</td>
            <td align="left" valign="top" class="particu_td">Tax Liability(Advances received) - 11A(1), 11A(2)</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="inv_td">0.00</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">8</td>
            <td align="left" valign="top" class="particu_td">Adjustment of Advances - 11B(1), 11B(2)</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="inv_td">0.00</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="sl_td">9</td>
            <td align="left" valign="top" class="particu_td">Nil Rated Invoices - 8A, 8B, 8C, 8D</td>
            <td align="left" valign="top" class="general_td">&nbsp;</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="general_td">0.00</td>
            <td align="left" valign="top" class="inv_td">0.00</td>
            </tr>
        </tbody>
      
		  <tfoot>
		  <tr>
		    <td align="left" valign="top" class="sl_td bg_color_td">&nbsp;</td>
		    <td align="left" valign="top" class="particu_td bg_color_td"><strong>Total</strong></td>
		    <td align="left" valign="top" class="general_td bg_color_td">#</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="general_td bg_color_td">0.00</td>
		    <td align="left" valign="top" class="inv_td bg_color_td"><span class="general_td bg_color_td">0.00</span></td>
		    </tr>
		  </tfoot>
		  
		  </table></td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody class="table_body_cus">
        </tbody>
        <tfoot>
          <tr>
            <td class="particu_td">HSN/SAC Summary - 12</td>
          </tr>
          <tr>
            <td class="particu_td">Document Summary - 13</td>
          </tr>
        </tfoot>
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
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script>
   $('#example').dataTable({
    destroy: true,
   searching: false,ordering: false,paging: false,

    dom: 'Bfrtip',
    buttons: [
    {
    extend: 'excelHtml5',
    title: 'BENFEDgstr_1 REPORT',
    text: 'Export to excel'

   }
]
   });
</script>