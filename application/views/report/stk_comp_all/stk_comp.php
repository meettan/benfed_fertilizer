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
                        <h4>Monthly Summary Report Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
                        <h5 style="text-align:left"><label>Company: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->comp_name;}?></h5>

                    </div>
                  

                    <table style="width: 100%;" id="example">

                        <thead>
                        <tr>
                                <th></th>
                                <th></th>
                                <th colspan =4><b>Solid(MTS)</b></th>
                                <th colspan =5><b>Liquid(LTR)</b></th>
                            </tr>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Product</th>

                                <th>Opening</th>

                                <th>Purchase </th>

                                <th>Sale</th>

                                <th>Closing</th>

                                <th>Opening</th>

                                <th>Purchase</th>
                                    
                               <th>Sale</th>

                                <th>Closing</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $total_sale = 0.00;
                                    $total_pur =0.00;
                                    $lqdtotal_pur= 0.00;
                                    $lqdtotal_sale=0.00;
                                    $tot_op =0.00;
                                    $lqdtot_op = 0.00;
                                    $sldcls_baln = 0.00;
                                    $lqdcls_baln  =0.00;
                                    $lqdtotal  = 0.00;
                                    $sldtotal =0.00;
                                    $sldtotal_pur=0.00;
                                    $sldtotal_sale=0.00;
                                    $ldqpurqty =0.00;
                                    $val =0;

                                        foreach($product as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                
                                     <td class="report"><?php echo $prodtls->prod_desc; ?></td>


                                   <?php  if($prodtls->unit == 'MTS'){ ?>
                                     <td class="report"><?php echo $prodtls->opening; ?></td>
                                     <td class="report"><?php echo $prodtls->purchase; ?></td>
                                     <td class="report"><?php echo $prodtls->sale; ?></td>
                                     <td class="report"><?php echo $prodtls->closing; ?></td>
                                   <?php }else{ ?>
                                        <td class="report"></td>
                                     <td class="report"></td>
                                     <td class="report"></td>
                                     <td class="report"></td>
                                     <?php }


                                     if($prodtls->unit == 'LTR'){ ?>
                                        <td class="report"><?php echo $prodtls->opening; ?></td>
                                     <td class="report"><?php echo $prodtls->purchase; ?></td>
                                     <td class="report"><?php echo $prodtls->sale; ?></td>
                                     <td class="report"><?php echo $prodtls->closing; ?></td>
                                    <?php }else{ ?>
                                        <td class="report"></td>
                                     <td class="report"></td>
                                     <td class="report"></td>
                                     <td class="report"></td>
                                   <?php } ?>


                                    
                                    
                                    
                          
                                </tr>
 
                                <?php }} ?>


                        </tbody>
                        <tfooter>
                            <tr>
                               <!-- <td class="report" colspan="1" style="text-align:right">Total</td> 
                               <td class="report"></td>
                               <td class="report"><b><?=$tot_op?></td>
                               <td class="report"><b><?=$total_pur?></b></td>
                               <td class="report"><b><?=$total_sale?></b></td>
                               <td class="report"><b><?=$sldtotal?></b></td>
                               <td class="report"><b><?=$lqdtot_op?></b></td>
                               <td class="report"><b><?=$lqdtotal_pur?></b></td>
                               <td class="report"><b><?=$lqdtotal_sale?></b></td>
                               <td class="report"><b><?=$lqdtotal?></b></td> -->
                              
 
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
    title: 'Monthly Stock',
    text: 'Export to excel'

   }
]
   });
</script>