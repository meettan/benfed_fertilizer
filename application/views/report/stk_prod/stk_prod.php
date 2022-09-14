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
                        <h4>Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="width:100%; display: inline-block;">
                        
                        <span style="float:left; text-alignment:left;"><label>District: </label> <?php echo $branch->district_name; ?></span>
                        <span style="float:right; text-alignment:left;"><label>Product: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->prod_desc;}?></span>
                    
                    </h5>
                    <h5 style="width:100%; display: inline-block;">
                    <span style="float:left; text-alignment:left;"><label>Company: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->short_name;}?></span>
                    <span style="float:right; text-alignment:right;">
                        <label>Unit: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->unit_name;}?></span>
                    
                    </h5>
                        
                    </div>
                  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>comp_name</th>

                                <th>prod_desc</th>

                                <th>unit</th>

                                <th>ro_no</th>

                                <th>opening</th>

                                <th>purchase</th>
                                <th>sale</th>
                                <th>closing</th>
                                <th>container</th>
                                <th>unit_id</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($productwise_stock)){ 
                                $i=0;
                                 foreach ($productwise_stock as $key) {  $i++?>
                            <tr>
                                <td class="report"><?php echo $i; ?></td>
                                <td class="report"><?php echo $key->comp_name; ?></td>
                                <td class="report"><?php echo $key->prod_desc; ?></td>
                                <td class="report"><?php echo $key->unit; ?></td>
                                <td class="report"><?php echo $key->ro_no; ?></td>
                                <td class="report"><?php echo $key->opening; ?></td>
                                <td class="report"><?php echo $key->purchase; ?></td>
                                <td class="report"><?php echo $key->sale; ?></td>
                                <td class="report"><?php echo $key->closing; ?></td>
                                <td class="report"><?php echo $key->container; ?></td>
                                <td class="report"><?php echo $key->unit_id; ?></td>
                                    
                            </tr>
                               <?php  }
                                }else{

                                    echo "<tr><td colspan='12' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                        <tfooter>
                            <tr>
                           <td class="report" colspan="1" style="text-align:right"><b>Total</b></td>
                               <td class="report"></td>
                               <td class="report"><b><?=$tot_op?></b></td>
                               <td class="report"><b><?=$total_pur?></b></td>
                               <td class="report"><b><?=$total_sale?></b></td>                            
                                <td class="report"><b><?=$total?></b></td>  
                           
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