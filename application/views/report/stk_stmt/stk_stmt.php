<!-- DataTables core -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<!-- ColReorder CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<!-- ColReorder JS -->
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>

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
    .modern-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: #fff url('data:image/svg+xml;utf8,<svg fill="black" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 10px center;
    background-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 8px 40px 8px 12px;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.modern-select:hover {
    border-color: #228ed3;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
}

.modern-select:focus {
    outline: none;
    border-color: #228ed3;
    box-shadow: 0 0 0 3px rgba(34,142,211,0.2);
}

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




<div id="overlay" style="display:none;">
            <div class="spinner"></div>
        </div>

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Consolidated Stock Report Between: <?php echo date("d/m/Y", strtotime($date[0]))." - ".date("d/m/Y", strtotime($date[1]))?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>

                    </div>
                    <br>  
 <!-- Sorting Dropdown -->
 <div style="margin:10px 0;">
                <label for="sortColumn"><b>Sort by:</b></label>
                <select id="sortColumn" class="modern-select">
                    <option value="0">Sl No.</option>
                    <option value="1">Company</option>
                    <option value="2">Product</option>
                    <option value="3">Unit</option>
                    <option value="4">Opening</option>
                    <option value="5">Purchase</option>
                    <option value="6">Sale</option>
                    <option value="7">Shortage/Damage</option>
                    <option value="8">Closing</option>
                    <option value="9">Container</option>
                </select>
            </div>
                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Company</th>

                                <th>Product</th>

                                <th>Unit</th>

                                <th>Opening</th>

                                <th>Purchase during the period</th>

                                <th>Sale during the period</th>

                                <th>Shortage/Damage</th>

                                <th>Closing</th>

                                <th>Container</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php if(!empty($stock)){
                            $i=0;
                            $OpeningMTS=0.0;
                            $PurchaseMTS=0.0;
                            $SaleMTS=0.0;
                            $stgMTS=0.00;
                            $ClosingMTS=0.0;

                                $OpeningLTR=0.0;
                                $PurchaseLTR=0.0;
                                $SaleLTR=0.0;
                                $stgLTR=0.00;
                                $ClosingLTR=0.0;
                            foreach ($stock as $stock_key) {
                                $i++;

                                if($stock_key->unit_id==1){
                                    $OpeningMTS=$OpeningMTS+ $stock_key->opening;
                                    $PurchaseMTS=$PurchaseMTS+$stock_key->purchase;
                                    $SaleMTS=$SaleMTS+$stock_key->sale;
                                    $stgMTS=$stgMTS +$stock_key->shtg;
                                    $ClosingMTS= $ClosingMTS+$stock_key->closing;
                                }else if($stock_key->unit_id==3){
                                    $OpeningLTR=$OpeningLTR+ $stock_key->opening;
                                    $PurchaseLTR=$PurchaseLTR+$stock_key->purchase;
                                    $SaleLTR=$SaleLTR+$stock_key->sale;
                                    $stgLTR=$stgLTR +$stock_key->shtg;
                                    $ClosingLTR= $ClosingLTR+$stock_key->closing;
                                }
                            ?>
                            <tr class="rep">
                                <td class="report"><?php echo $i; ?></td>
                                <td class="report"><?php echo $stock_key->comp_name; ?></td>
                                <td class="report"><?php echo $stock_key->prod_desc; ?></td>
                                <td class="report"><?php echo $stock_key->unit; ?></td>
                                <td class="report"><?php echo $stock_key->opening; ?></td>
                                <td class="report"><?php echo $stock_key->purchase; ?></td>
                                <td class="report"><?php echo $stock_key->sale; ?></td>
                                <td class="report"><?php echo $stock_key->shtg; ?></td>
                                <td class="report"><?php echo $stock_key->closing - $stock_key->shtg; ?></td>
                                <td class="report"><?php echo $stock_key->container; ?></td>
                            </tr>
                            <?php 
                                }
                            } ?>
                        </tbody>

                        <tfooter>
                            <tr>
                               <td class="report" colspan="5" style="text-align:left" bgcolor="silver" ><b>Summary</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Opening</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Purchase</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Sale</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Shortage/Damage</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Closing</b></td>
                            </tr>
                            <tr>
                               <td class="report" colspan="5" style="text-align:left" bgcolor="silver"><b>Solid( MTS) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$OpeningMTS?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$PurchaseMTS?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$SaleMTS?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$stgMTS?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $ClosingMTS ?></td>
                            </tr>
                            <tr>
                            <tr>
                               <td class="report" colspan="5" style="text-align:left" bgcolor="silver"><b>Liquid( LTR ) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$OpeningLTR?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $PurchaseLTR?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $SaleLTR?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$stgLTR?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$ClosingLTR ?> </td>
                              
                                  
                                    
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
  $(document).ready(function () {
      var table = $('#example').DataTable({
          paging: false,
          searching: false,
          info: false,
          colReorder:true
      });

      $('#sortColumn').on('change', function () {
          var column = $(this).val();
          table.order([column, 'asc']).draw();
      });
  });
</script>
        

        <script>
              $('#overlay').fadeIn().delay(2500).fadeOut();             
        </script>
        