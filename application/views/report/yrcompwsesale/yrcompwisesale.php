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
</script>




    

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Year Wise Company Wise Sale Report from <?php  if(isset($frmyrnm->fin_yr)) echo $frmyrnm->fin_yr;?> To <?php  if(isset($toyrnm->fin_yr)) echo  $toyrnm->fin_yr;?></h4>
                        <!-- <h4>Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5> -->

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Year</th>

                                <th>IFFCO Solid Qty</th>
                                <th>IFFCO Liquid Qty</th>
                                <th>IFFCO Value</th>

                                <th>KHRIBO Solid Qty</th>
                                <th>KHRIBO Liquid Qty</th>
                                <th>KHRIBO Value</th>

                                <th>IPL Solid Qty</th>
                                <th>IPL Liquid Qty</th>
                                <th>IPL Value</th>

                                <th>JCF Solid Qty</th>
                                <th>JCF Liquid Qty</th>
                                <th>JCF Value</th>

                                <th>MOSAIC Solid Qty</th>
                                <th>MOSAIC Liquid Qty</th>
                                <th>MOSAIC Value</th>

                                <th>KHAITAN Solid Qty</th>
                                <th>KHAITAN Liquid Qty</th>
                                <th>KHAITAN Value</th>

                                <th>CIL Solid Qty</th>
                                <th>CIL Liquid Qty</th>
                                <th>CIL Value</th>

                                <th>CCFL Solid Qty</th>
                                <th>CCFL Liquid Qty</th>
                                <th>CCFL Value</th>

                                <th>HURL Solid Qty</th>
                                <th>HURL Liquid Qty</th>
                                <th>HURL Value</th>

                                <th>KFL Solid Qty</th>
                                <th>KFL Liquid Qty</th>
                                <th>KFL Value</th>

                                <th>MFCL Solid Qty</th>
                                <th>MFCL Liquid Qty</th>
                                <th>MFCL Value</th>

                                <th>NFL Solid Qty</th>
                                <th>NFL Liquid Qty</th>
                                <th>NFL Value</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($sale){ 

                                    $i = 1;
                                    // $total = 0.00;
                                    // $total_sale = 0.00;
                                    // $total_pur =0.00;
                                    // $tot_op =0.00;
                                    // $val =0;

                                        foreach($sale as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <td class="report"><?php echo $prodtls->fin_yr; ?>
                                     <td class="report"><?php echo $prodtls->IFFCO_QTY; ?>
                                     <td class="report"><?php echo $prodtls->IFFCO_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->IFFCO_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->KRIBCO_QTY; ?>
                                     <td class="report"><?php echo $prodtls->KRIBCO_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->KRIBCO_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->IPL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->IPL_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->IPL_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->JCF_QTY; ?>
                                     <td class="report"><?php echo $prodtls->JCF_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->JCF_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->MIPL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->MIPL_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->MIPL_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->KCFL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->KCFL_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->KCFL_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->CIL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->CIL_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->CIL_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->CCFL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->CCFL_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->CCFL_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->HURL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->HURL_LQQTY; ?> 
                                     <td class="report"><?php echo $prodtls->HURL_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->KFL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->KFL_LQQTY; ?>
                                     <td class="report"><?php echo $prodtls->KFL_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->MFCL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->MFCL_LQQTY; ?> 
                                     <td class="report"><?php echo $prodtls->MFCL_VALUE; ?>
                                     <td class="report"><?php echo $prodtls->NFL_QTY; ?>
                                     <td class="report"><?php echo $prodtls->NFL_LQQTY; ?> 
                                     <td class="report"><?php echo $prodtls->NFL_VALUE; ?>
                                </tr>
 
                                <?php  
                                                        
                                    }
                                ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                        <tfooter>
                            <tr>
                               <!-- <td class="report" colspan="3" style="text-align:right">Total</td> 
                               <td class="report"></td>
                               <td class="report"><?=$tot_op?></td>
                               <td class="report"><?=$total_pur?></td>
                               <td class="report"><?=$total_sale?></td> -->
                               <!-- <td class="report"></td>  -->
                               
                                <!-- <td class="report"><?=$total?></td>   -->
 
                            </tr>
                        </tfooter>
                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

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
   searching: false,ordering: false,paging: false,

    dom: 'Bfrtip',
    buttons: [
    {
    extend: 'excelHtml5',
    title: ' Stock Statement',
    text: 'Export to excel'

   }
]
   });
</script>