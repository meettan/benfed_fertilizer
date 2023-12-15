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
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title><style type="text/css">');
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
  function printadvDiv() {
        var divToPrint = document.getElementById('divadvToPrint');
        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title><style type="text/css">');

        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
                                                      ' .headeraddress { font-weight: normal;}' +
                                                     ' .headertitle { font-weight: bold;font-size: 22px;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 0px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 0px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function() {
            WindowObject.close();
        }, 10);
    }
</script>

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Company Product Type Sale Statement of Fertilizer Between:<?php echo  date("d/m/Y", strtotime($fDate)).' To '.date("d/m/Y", strtotime($tDate)) ?></h4>
    
                        <h5 style="text-align:left"><label><?php echo $companyName; ?>:</label>  &ensp;&ensp;</h5> 
                   
					
                  

                    </div>
                    <br> 
                    <h4 style="text-align:left; margin-top: 30px;">Product Typewise Summary </h4>
                    <table style="width: 100%;  background-color: #D5D5D5;"" id="example">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Product Type</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>CGST</th>
                                <th>SGST</th>
                                <th>NET Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($sumrydtls){ 
                                    $i = 1;
                                  $totalRate=0;
                                    $tot_taxable=0;
                                    $tot_cgst = 0;
                                    $tot_sgst = 0;
                                    $tot_amt = 0;
                                    foreach($sumrydtls as $sumr){
                            ?>

                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo $sumr->type_name; ?></td>
                                     <td><?php echo $sumr->qty; ?></td>
                                     <td><?php echo $sumr->taxable_amt; $tot_taxable +=$sumr->taxable_amt; ?></td>
                                     <td><?php echo $sumr->cgst; $tot_cgst +=$sumr->cgst; ?></td>
                                     <td><?php echo $sumr->sgst; $tot_sgst +=$sumr->sgst; ?></td>
                                     <td><?php echo $sumr->tot_amt; $tot_amt +=$sumr->tot_amt;  ?></td>
                                     </td>
                                </tr>
                               
                                <?php    } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><b><?php echo $tot_taxable; ?></b></td>
                                    <td><b><?php echo $tot_cgst; ?></b></td>
                                    <td><b><?php echo  $tot_sgst; ?></b></td>
                                    <td><b><?php echo  $tot_amt; ?></b></td>
                                </tr>
                                <?php 
                                       }
                                else{
                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";
                                }   
                            ?>
                        </tbody>
                    </table>

					<table style="margin-top: 100px; border:none;" id="example" width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody style="border:none;">
					<tr style="border:none;">
					 
					  <td style="border:none;">Prepared By</td>
					 
					  						<td style="border:none;">Asst Manager/Dy. Manager</td>
					  <td style="border:none;">Departmental Manager(S)</td>
					  <td style="border:none;">CA&amp;AO</td>
					  <td style="border:none;">General Manager</td>
					  					</tr>
				</tbody>
						
						</table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                 
                

                </div>

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
        searching: false,
        ordering: false,
        paging: false,

        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: ' Company-Payment-Statement',
            text: 'Export to excel'

        }]
    });
</script>