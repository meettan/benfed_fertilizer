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
.form-wraper {
    margin-bottom: 20px !important;
}

</style>


    
    <div class="wraper">      

        <div class="col-md-12 container form-wraper">
    
                 <form method="POST" id="form" action="<?php echo site_url("fert/rep/saledelivery_reg");?>" >
                <div class="form-header">
                
                    <h4>Sale Date Range</h4>
                
                </div>

                <div class="form-group row">

                    <label for="from_dt" class="col-sm-2 col-form-label">From Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="from_date"
                               class="form-control required"
                               value="<?php echo $this->session->userdata['loggedin']['fin_start']; ?>" max="<?php echo $this->session->userdata['loggedin']['fin_start']; ?>"/>  

                    </div>

                </div>

                <div class="form-group row">

                    <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="to_date"
                               class="form-control required"
                               value="<?php echo $this->session->userdata['loggedin']['END_DATE']; ?>" max="<?php echo $this->session->userdata['loggedin']['fin_end']; ?>"
                        />  

                    </div>

                </div>  

                <div class="form-group row">
                <label for="branch" class="col-sm-2 col-form-label">Society:</label>
                <div class="col-sm-6">

                    <select name="soc_id" class="form-control sch_cd required" id="soc_id" required>

                        <option value="">Select Society</option>

                        <?php

                            foreach($societyDtls as $soc){

                                
                        ?>

                        <option value="<?php echo $soc->soc_id;?>"><?php echo $soc->soc_name;?></option>

                        <?php

                            }

                        ?>     

                    </select>

                </div>

            </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />

                    </div>

                </div>

            </form>    

        </div>

    <!-- </div> -->
    
    <!-- <div class="wraper">  -->
    <?php if(isset($_POST["submit"])){ ?>
<div class="col-lg-12 container contant-wraper">
    
    <div id="divToPrint">

        <div style="text-a  lign:center;">

            <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
            <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
            <h4>Delivery Register Between: <?php echo $_SESSION['date']; ?></h4>
            <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
            
             <h4 style="text-align:left"><label>Society: </label> <?php 
                  if($sales){ foreach($sales as $sal);
                   echo $sal->soc_name;} ?></h4> 

        </div>
        <br>  

        <table style="width: 100%;" id="example">

            <thead>

                <tr>
                
                    <th>Sl No.</th>

                    <!-- <th>Company</th> -->
                    <th>Sale Date</th>

                    <th>Product</th>

                    <th>Unit</th>

                    <th>RO</th>

                   <th>RO Date</th>

                    <th>Qty</th>

                    <th>Cash Memo</th>

                    <th>MR No</th>

                    <th>MR Date</th>

                    <th>Received Amount</th>


                    <!-- <th>CGST</th>

                    <th>SGST</th> -->

                   <!--  <th>Discount</th> -->

                    <!-- <th>Total amt</th> -->

                </tr>

            </thead>

            <tbody>

                <?php
                $tot_amt = 0.00;
                // $cgst    = 0.00;
                // $sgst    = 0.00;
                // $disc    = 0.00;
                // $total   = 0.00;
                    if($sales){ 

                        $i = 1;
                        
                       

                        $val =0;

                            foreach($sales as $sal){
                ?>

                    <tr class="rep">
                        <td class="report"><?php echo $i++; ?></td>
                        <td class="report"><?php echo  date("d/m/Y",strtotime($sal->do_dt)); ?></td>
                        <td class="report"><?php echo $sal->prod_desc; ?></td>
                        <td class="report"><?php
                                      
                                      if($sal->unit==1 ||$sal->unit==2 ||$sal->unit==4 || $sal->unit==6){
                                        echo "MTS" ;  
                                      }elseif($sal->unit==3||$sal->unit==5){
                                        echo "LTR" ;
                                      }
                                     
                                    
                                        ?>
                                     </td>
                        <!-- <td class="report"><?php echo $sal->trans_do; ?></td> -->
                        <td class="report"><?php echo $sal->sale_ro; ?></td>
                        <td class="report"><?php echo date("d/m/Y",strtotime($sal->ro_dt)); ?></td>
                        <td class="report">
                            <?php 
                             
                             if($sal->unit==1){

                                echo $sal->qty; 
                               }elseif($sal->unit==2){
                                   echo ($sal->qty)/1000; 
                               }elseif($sal->unit==4){
                                   echo ($sal->qty)/10;
                               }elseif($sal->unit==6){
                                   echo ($sal->qty)/1000000;
                               }elseif($sal->unit==3){
                                   echo $sal->qty;
                               }elseif($sal->unit==5){
                                   echo ($sal->qty)*($sal->qty_per_bag)/1000;   
                               }
                            // echo $sal->qty;
                             ?>
                             </td>
                        <td class="report"><?php echo $sal->trans_do; ?></td>
                        <td class="report"><?php echo $sal->paid_id; ?></td>
                        <td class="report"><?php echo date("d/m/Y",strtotime($sal->paid_dt)); ?></td>
                        <td class="report"><?php echo $sal->paid_amt; 
                         $tot_amt += $sal->paid_amt;?></td>
                        <!-- <td class="report"><?php echo $sal->taxable_amt;
                                                      $taxable_amt += $sal->taxable_amt;
                         ?></td> -->
                        <!-- <td class="report"><?php echo $sal->cgst;
                                                      $cgst += $sal->cgst;

                         ?></td> -->
                        <!-- <td class="report"><?php echo $sal->sgst;
                                                      $sgst += $sal->sgst;

                         ?></td> -->
                       <!--  <td class="report"><?php //echo $sal->dis; 
                                                     // $disc += $sal->dis;

                        ?></td> -->
                        <!-- <td class="report"><?php echo $sal->tot_amt;
                                                      $total += $sal->tot_amt;

                         ?></td> -->
                       
                    </tr>

                    <?php  
                                            
                        }
                  
                           }
                    else{

                        echo "<tr><td colspan='15' style='text-align:center;'>No Data Found</td></tr>";

                    }   

                ?>

            </tbody>
            <tfooter>
                <tr>
                   <td class="report" colspan="9" style="text-align:Left"><b>Total</b></td>
                   <td class="report"><b><?=$tot_amt?></b></td>
                   <!-- <td class="report"><?=$cgst?></td>
                   <td class="report"><?=$sgst?></td> 
                   
                    <td class="report"><?=$total?></td>   -->

                </tr>
            </tfooter>

        </table>

    </div>   
    
    <div style="text-align: center;">

        <button class="btn btn-primary"  type="button" onclick="printDiv();">Print</button>
       <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

    </div>

</div>
<?php } ?>
</div>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script> -->
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script> -->

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script>
$('#example').dataTable({
destroy: true,
searching: false,ordering: false,paging: false,

dom: 'Bfrtip',
buttons: [
{
extend: 'excelHtml5',
title: 'BENFED All SALE PURCHASE REPORT',
text: 'Export to excel'
//Columns to export
// exportOptions: {
//    columns: [0, 1, 2, 3]
// }
}
]
});
</script>
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