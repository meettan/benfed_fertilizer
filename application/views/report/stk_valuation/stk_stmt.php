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


<style>
    #overlay {
        background: rgba(100, 100, 100, 0.2);
        color: #ffff;
        position: fixed;
        height: 100%;
        width: 100%;
        z-index: 5000;
        top: 0;
        left: 0;
        float: left;
        text-align: center;
        padding-top: 25%;
        opacity: .80;
    }



    .spinner {
        margin: 0 auto;
        height: 64px;
        width: 64px;
        animation: rotate 0.8s infinite linear;
        border: 5px solid #228ed3;
        border-right-color: transparent;
        border-radius: 50%;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
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



<div id="overlay" style="display:none;">
            <div class="spinner"></div>
        </div>

    

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Stock valuation Report Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php if(!empty($branch->district_name)){echo $branch->district_name;}else{echo"All Branch";} ?></h5>

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Company</th>

                                <th>Product</th>

                                <th>Unit</th>

                                <!-- <th>Opening</th> -->

                                <!-- <th>Purchase during the period</th> -->

                                <!-- <th>Sale during the period</th> -->
                               
                                <th>Closing</th>
                                <th>Rate</th>
                                <th>Amount</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 

                                    $i = 1;
                                    $OpeningMTS=0.0;
                                    $PurchaseMTS=0.0;
                                    $SaleMTS=0.0;
                                    $ClosingMTS=0.0;
        
                                        $OpeningLTR=0.0;
                                        $PurchaseLTR=0.0;
                                        $SaleLTR=0.0;
                                        $ClosingLTR=0.0;  $tot_amt_solid = 0.00;$tot_amt_liquid = 0.00;

                                        foreach($product as $prodtls){

                                            if($prodtls->unit_id==1){
                                                $OpeningMTS=$OpeningMTS+ $prodtls->opening;
                                                $PurchaseMTS=$PurchaseMTS+$prodtls->purchase;
                                                $SaleMTS=$SaleMTS+$prodtls->sale;
                                                $ClosingMTS= $ClosingMTS+$prodtls->closing;
                                                $tot_amt_solid += round($prodtls->closing*$prodtls->hsn_code);
                                            }else if($prodtls->unit_id==3){
                                                $OpeningLTR=$OpeningLTR+ $prodtls->opening;
                                                $PurchaseLTR=$PurchaseLTR+$prodtls->purchase;
                                                $SaleLTR=$SaleLTR+$prodtls->sale;
                                                $ClosingLTR= $ClosingLTR+$prodtls->closing;
                                                $tot_amt_liquid += round($prodtls->closing*$prodtls->hsn_code);
                                            }
                            ?>

                                <tr class="rep">
                                    
                                <?php
if($prodtls->closing - $prodtls->shtg > 0){
?>
    <td class="report"><?php echo $i++; ?></td>
    <td class="report"><?php echo $prodtls->comp_name; ?></td>
    <td class="report"><?php echo $prodtls->prod_desc; ?></td>
    <td class="report"><?php echo $prodtls->unit; ?></td>

    <td class="report closing" id="closing">
        <?php echo $prodtls->closing - $prodtls->shtg; ?>
    </td>
    <td class="report closing" id="closing">
        <?php echo $prodtls->hsn_code; ?>
    </td>
    <td class="report closing" id="closing">
        <?php echo round($prodtls->closing * $prodtls->hsn_code); ?>
    </td>
<?php
}
?>

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
                            <!-- <tr style="font-weight: bold;">
                               <td colspan="3"></td>
                               <td></td>
                               <td></td>
                               <td>Total</td>
                               <td></td>
                            </tr> -->
                            <tr>
                               <td class="report" colspan="4" style="text-align:left" bgcolor="silver" ><b>Summary</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Closing</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Total amount</b></td>
                            </tr>
                            <tr>
                               <td class="report" colspan="4" style="text-align:left" bgcolor="silver"><b>Solid( MTS) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $ClosingMTS ?></td>
                               <td><?=$tot_amt_solid?></td>
                            </tr>
                            <tr>
                            <tr>
                               <td class="report" colspan="4" style="text-align:left" bgcolor="silver"><b>Liquid( LTR ) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$ClosingLTR ?> </td>
                               <td><?=$tot_amt_liquid?></td>
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
              $('#overlay').fadeIn().delay(2500).fadeOut();

            //   var ready = false;
            //     $(document).ready(function () {
            //         ready = true;
            //     });
            //     if(ready){
            //         $('#overlay').fadeOut();
            //     }else{
            //         $('#overlay').fadeIn();
            //     }
              
        </script>
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