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
</script>

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Company Payment Statement Between:<?php echo  date("d/m/Y", strtotime($fDate)).' To '.date("d/m/Y", strtotime($tDate)) ?></h4>
    <?php //print_r($total_Voucher);  ?>
                        <h5 style="text-align:left"><label><?php echo $companyName; ?>:</label>  &ensp;&ensp;<?php echo round($total_Voucher->taxable_amt,2); ?> DR</h5> 
                     <h5 style="text-align:left"><label><?php foreach($tableData as $bnk){ echo $bnk->bnk; break; };?>:</label> &ensp;&ensp;<?php echo round($total_Voucher->net_amt,2); ?> CR</h5>
						<h5 style="text-align:left"><label>TDS U/S 194Q:</label> &ensp;&ensp;<?php echo round($total_Voucher->tds_amt,2); ?> CR </h5>
                     <!--<h5 style="text-align:left"><label>Product:</label> <?php //echo $product->PROD_DESC; ?></h5>-->

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>
                                <th>Date</th>
                                <th>District</th>
                                <th>Purchase Invoice</th>
								<th>FO Name</th>
                                <th>Product</th>
                                <th>Purchase Ro</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Amount</th>
                                <th>TDS</th>
                                <th>NET Amount</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            

                                if($tableData){ 

                                    $i = 1;
                                  $totalRate=0;
                                  $totalAmount=0;
                                  $totalTDS=0;
                                  $totalNETAmount=0;
                                    foreach($tableData as $ptableData){
                                       // $total=($ptableData->adv_amt+$total);
                                       //$total +=$ptableData->adv_amt;
                            ?>
<!-- a.pay_dt,c.district_name,a.pur_inv_no,b.PROD_DESC,a.pur_ro,a.qty,a.rate_amt,a.taxable_amt,a.tds_amt,a.net_amt -->
                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo date("d/m/Y", strtotime($ptableData->pay_dt)); ?></td>
                                     <td><?php echo $ptableData->br_dist; ?></td>
                                     <td><?php echo $ptableData->pur_inv_no; ?></td>
                                     <td><?php echo $ptableData->fo_nm; ?></td>
									
                                     <td><?php echo $ptableData->PROD_DESC; ?></td>
                                     <!-- <td><?= $ptableData->PROD_DESC; ?></td> -->
                                     <td><?php echo $ptableData->pur_ro; ?></td>
                                     <td><?php echo $ptableData->qty; ?></td>
                                     <td><?php echo  $ptableData->rate_amt ; $totalRate+=$ptableData->rate_amt; ?></td>
                                     <td><?php echo $ptableData->taxable_amt ;$totalAmount+=$ptableData->taxable_amt; ?></td>
                                     <td><?php echo round($ptableData->tds_amt,0);$totalTDS+=round($ptableData->tds_amt,0);?></td>
                                     <!--<td><?php //echo $ptableData->net_amt;$totalNETAmount+=$ptableData->net_amt;?></td>-->
                                     <td><?php echo $ptableData->taxable_amt - round($ptableData->tds_amt,0); $totalNETAmount+=$ptableData->taxable_amt - round($ptableData->tds_amt,0);?></td>
                                </tr>
                               
 
                                <?php    } ?>

                                <tr>
                                    <td colspan="8"><b>Total</b></td>
                                    <td><b><?php //echo round($totalRate,2); ?></b></td>
                                    <td><b><?php echo $totalAmount; ?></b></td>
                                    <td><b><?php echo $totalTDS; ?></b></td>
                                    <td><b><?php echo  $totalNETAmount; ?></b></td>
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
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

                </div>

            </div>
            
        </div>
        
    <script type="text/javascript">
        /*$(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Cheque status for <?php echo get_district_name($this->input->post("branch_id")) ?> branch for paddy procurement between Block Societywise Paddy Procurement Between <?php echo date("d-m-Y", strtotime($this->input->post('from_date'))).' To '.date("d-m-Y", strtotime($this->input->post('to_date')));?>.xls"
                });
            });
        });*/
    </script>