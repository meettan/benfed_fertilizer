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
                        <h4>Debit Note Statement Between:<?php echo  date("d/m/Y", strtotime($fDate)).' To '.date("d/m/Y", strtotime($tDate)) ?></h4>
                        <h5 style="text-align:left"><label><?php echo $distname->district_name; ?></label>  &ensp;&ensp;</h5> 
                  


                    </div>
                    <br>  
                    <button id="btnExport" class="btn btn-primary" onclick="exportReportToExcel(this)">EXPORT EXCEL</button><br><br>

                    <table style="width: 100%;  background-color: #D5D5D5;"" id="example">

                        <thead>

                            <tr>
                            
                                <th>Society Name.</th>
                                <th>Company</th>
                                <th>RO</th>
                                <th>Invoice No.</th>
                                <th>Amount</th>
                                
                               
                            
                            </tr>

                        </thead>

                        <tbody>

                            <?php
                        
                            $i = 0;
                                if($tableData){ 

                                    $totsum          = 0.00;
                                    foreach($tableData as $ptableDatasidt){
                                       
                            ?>
                                <tr>
                                    
                                     <td><?php echo $ptableDatasidt->soc_name; ?></td>
                                     <td><?php echo $ptableDatasidt->COMP_NAME ; ?></td>
                                     <td><?php echo $ptableDatasidt->ro ; ?></td>
                                     <td><?php echo $ptableDatasidt->invoice_no ; ?></td>
                                     <td><?php echo $ptableDatasidt->tot_amt ;
                                     $totsum += $ptableDatasidt->tot_amt;?>
                                    </td>
                                     
                                    
                                </tr>
                               
 
                                <?php    }    
                                
                                
                                ?>

                                <tr>
                                    <td colspan="4"><b>Total</b></td>
                                    
                                    <!-- <td><b></b></td> -->
                                    <td><b><?php echo $totsum; ?></b></td>
                                    <!-- <td><b><?php //echo $totdue; ?></b></td> -->
                                    
                                </tr>
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table><br>
              
                    <br>

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
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<script>
            function exportReportToExcel() {
  let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
  TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
    name: `drnotebr.xlsx`, // fileName you could use any name
    sheet: {
      name: 'Trial Balance' // sheetName
    }
  });
}
        </script>