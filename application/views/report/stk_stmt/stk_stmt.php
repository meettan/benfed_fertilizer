<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Stock Report</title>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.dataTables.min.css">

<style>
table { border-collapse: collapse; width: 100%; }
table, td, th { border: 1px solid #dddddd; padding: 6px; font-size: 14px; }
th { text-align: center; cursor: move; } /* cursor indicates draggable column */
tr:hover { background-color: #f5f5f5; }

#overlay {
    background: rgba(100, 100, 100, 0.2);
    color: #fff;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 5000;
    top: 0;
    left: 0;
    text-align: center;
    padding-top: 25%;
    opacity: 0.8;
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
@keyframes rotate { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

/* Modern dropdown styling */
.modern-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: #fff url('data:image/svg+xml;utf8,<svg fill="black" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 12px center;
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
.modern-select:hover { border-color: #228ed3; box-shadow: 0 3px 6px rgba(0,0,0,0.1); }
.modern-select:focus { outline: none; border-color: #228ed3; box-shadow: 0 0 0 3px rgba(34,142,211,0.2); }
/* Drag handle icon */
.drag-handle {
    cursor: move;
    margin-right: 5px;
    color: #888;
    font-weight: bold;
}
th:hover .drag-handle { color: #228ed3; }

/* Animated hint for first column */
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-3px); }
}
.drag-hint { display: inline-block; animation: bounce 1s ease-in-out 3; }
/* Info box for guidance */
.info-box {
    background: #eef6fb;
    border-left: 4px solid #228ed3;
    padding: 8px 12px;
    margin-bottom: 10px;
    font-size: 14px;
}
</style>
</head>
<body>

<div id="overlay" style="display:none;"><div class="spinner"></div></div>

<div class="wraper"> 
    <div class="col-lg-12 container contant-wraper">
        <div id="divToPrint">
            <!-- Info box for new users -->
            <div class="info-box no-print">
                <b>Tip:</b> Click column headers to sort rows. Drag to reorder columns.
            </div>
            <div style="text-align:center;">
                <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                <h4>Consolidated Stock Report Between: 
                    <?php echo date("d/m/Y", strtotime($date[0])) . " - " . date("d/m/Y", strtotime($date[1])) ?>
                </h4>
                <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
            </div>
            <br>

            <!-- Dropdown to sort rows -->
            <div class="no-print" style="margin:10px 0;">
                <label for="sortColumn" style="font-weight:600; margin-right:8px;">Sort rows by:</label>
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

            <table id="example">
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
                        $OpeningMTS=0.0; $PurchaseMTS=0.0; $SaleMTS=0.0; $stgMTS=0.0; $ClosingMTS=0.0;
                        $OpeningLTR=0.0; $PurchaseLTR=0.0; $SaleLTR=0.0; $stgLTR=0.0; $ClosingLTR=0.0;

                        foreach ($stock as $stock_key) {
                            $i++;
                            if($stock_key->unit_id==1){
                                $OpeningMTS += $stock_key->opening; $PurchaseMTS += $stock_key->purchase; 
                                $SaleMTS += $stock_key->sale; $stgMTS += $stock_key->shtg; 
                                $ClosingMTS += $stock_key->closing;
                            } else if($stock_key->unit_id==3){
                                $OpeningLTR += $stock_key->opening; $PurchaseLTR += $stock_key->purchase; 
                                $SaleLTR += $stock_key->sale; $stgLTR += $stock_key->shtg; 
                                $ClosingLTR += $stock_key->closing;
                            }
                    ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$stock_key->comp_name?></td>
                        <td><?=$stock_key->prod_desc?></td>
                        <td><?=$stock_key->unit?></td>
                        <td><?=$stock_key->opening?></td>
                        <td><?=$stock_key->purchase?></td>
                        <td><?=$stock_key->sale?></td>
                        <td><?=$stock_key->shtg?></td>
                        <td><?=$stock_key->closing - $stock_key->shtg?></td>
                        <td><?=$stock_key->container?></td>
                    </tr>
                    <?php }} ?>
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

        <div style="text-align:center; margin-top:15px;">
            <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
        </div>
    </div>
</div>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>

<script>
function printDiv() {
    var divToPrint = document.getElementById('divToPrint');
    var WindowObject = window.open('', 'Print-Window');
    WindowObject.document.open();
    WindowObject.document.writeln('<!DOCTYPE html><html><head><meta charset="UTF-8"><title></title><style>@media print { table {border-collapse: collapse; font-size:12px;} th,td {border:1px solid black; padding:6px;} }</style></head><body onload="window.print()">');
    WindowObject.document.writeln(divToPrint.innerHTML);
    WindowObject.document.writeln('</body></html>');
    WindowObject.document.close();
    setTimeout(function(){ WindowObject.close(); }, 10);
}

$(document).ready(function() {
    var table = $('#example').DataTable({
        paging: false,
        searching: false,
        info: false,
        colReorder: {
            realtime: true
        },
        stateSave: true // ✅ remembers column positions after reload
    });
// Add tooltip to every column header
$('#example thead th').attr('title', 'Move by drag / Sort by click');
    // Sort rows via dropdown
    $('#sortColumn').on('change', function() {
        var col = $(this).val();
        table.order([col, 'asc']).draw();
    });

    $('#overlay').fadeIn().delay(2500).fadeOut();
});
</script>

</body>
</html>
