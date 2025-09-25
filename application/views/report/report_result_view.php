<?php
// === SORT $results BY PRODUCT NAME (optional) ===
if (!empty($results)) {
    usort($results, function($a, $b) {
        $prodA = $a['purchase_prod_desc'] ?? $a['prod_desc'] ?? '';
        $prodB = $b['purchase_prod_desc'] ?? $b['prod_desc'] ?? '';
        return strcasecmp($prodA, $prodB);
    });
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Report Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">

    <style>
        body { font-size: 13px; }
        .container-box { margin-top: 10px; padding: 10px; }
        .report-header { text-align: center; margin-bottom: 1px; }
        .report-header h4 { margin: 2px 0; font-weight: bold; }
        table th, table td { white-space: nowrap; font-size: 12px; }
        .DTCR_clonedTable { table-layout: fixed !important; width: auto !important; }
        .DTCR_clonedTable th, .DTCR_clonedTable td {
            max-width: 180px !important;
            min-width: 80px !important;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .purchase-row { background-color: #cce5ff; }
        .sale-row { background-color: #d4edda; }
        .company-row { background-color: #fff3cd; }
        @media print {
            body { margin: 0; }
            .no-print { display: none !important; }
            .container-box { box-shadow: none !important; border-radius: 0 !important; padding: 0 !important; }
            table { border-collapse: collapse !important; width: 100% !important; font-size: 12px !important; }
            th, td { border: 1px solid #000 !important; padding: 4px !important; }
            thead { background: #f0f0f0 !important; -webkit-print-color-adjust: exact; }
            #reportTable, #reportTableT { display: table !important; }
        }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="container-box">

        <!-- Header -->
        <div class="report-header">
            <h4>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h4>
            <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
            <h4>
                Purchase Sale Report
                <?php if (!empty($from_date) && !empty($to_date)): ?>
                    (From: <?= date('d-m-Y', strtotime($from_date)) ?> To: <?= date('d-m-Y', strtotime($to_date)) ?>)
                <?php endif; ?>
            </h4>
        </div>

        <!-- Toolbar -->
        <div class="d-flex justify-content-end mb-3 no-print">
            <button id="printBtn" class="btn btn-primary me-2">🖨️ Print</button>
            <button id="exportExcel" class="btn btn-success me-2">📊 Export Excel</button>
            <button id="exportPdf" class="btn btn-danger me-2">📄 Export PDF</button>
            <button id="toggleView" class="btn btn-dark">🔄 Switch to Transposed</button>
        </div>

        <?php
        // Column aliases
        $company_aliases = [
            'comp_name'     => 'Company Name',
            'short_name'    => 'Short Name',
            'COMP_ADD'      => 'Address',
            'COMP_PN_NO'    => 'Phone No.',
            'COMP_EMAIL_ID' => 'Email',
            'PAN_NO'        => 'PAN NO',
            'GST_NO'        => 'GST NO',
            'CIN'           => 'CIN',
            'MFMS'          => 'MFMS'
        ];
        $purchase_aliases = [
            'district_name' =>'Branch',
            'prod_desc'     =>'Product Name',
            'unit_name'     =>'Unit',
            'ro_no'         =>'Ro Number',
            'ro_dt'         =>'Ro Date',
            'invoice_no'    =>'Invoice number',
            'invoice_dt'    =>'Invoice Date',
            'no_of_days'    =>'Credit Period',
            'qty'           =>'Quantity',
            'rate'          =>'Purchase Rate',
            'base_price'    =>'Taxable Amount',
            'cgst'          =>'CGST',
            'sgst'          =>'SGST',
            'tcs'           =>'TCS',
            'retlr_margin'  =>'Retailer Margin',
            'spl_rebt'      =>'Spacial Rebeat',
            'trad_margin'   =>'Trade Margin',
            'oth_dis'       =>'Other Discount',
            'frt_subsidy'   =>'Freight Subsidy',
            'tot_amt'       =>'Total Amount',
            'net_amt'       =>'Net Amount',
            'trn_handling_charge' =>'T & H Charge',
            'created_by'    =>'Created By',
            'created_dt'    =>'Created Date',
            'created_ip'    =>'Created IP',
            'modified_ip'   =>'Modified IP',
            'modified_by'   =>'Modified By',
            'modified_dt'   =>'Modified Date'
        ];
        $sale_aliases = [
            'soc_name'    =>'Society Name',
            'trans_do'    =>'Sale Invoice No',
            'do_dt'       =>'Sale Invoice Date',
            'qty'         =>'Sale Qty',
            'sale_rt'     =>'Sale Rate',
            'taxable_amt' =>'Taxable Amount',
            'cgst'        =>'Sale CGST',
            'sgst'        =>'Sale SGST',
            'dis'         =>'Discount',
            'tot_amt'     =>'Total Amount',
            'irn'         =>'IRN',
            'ack'         =>'Acknowledge No',
            'ack_dt'      =>'Acknowledge Date',
            'total_amt'   =>'Total Amount',
            'created_by'  =>'Created By',
            'created_dt'  =>'Created Date',
            'created_ip'  =>'Created IP',
            'modified_ip' =>'Modified IP',
            'modified_by' =>'Modified By',
            'modified_dt' =>'Modified Date'
        ];
        ?>

        <!-- Normal Table -->
        <?php if (!empty($results)): ?>
        <div class="table-responsive" id="normalView">
            <table id="reportTable" class="table table-bordered table-hover align-middle nowrap w-100">
                <thead>
                    <tr>
                        <th class="text-center bg-secondary text-white">S.No.</th>
                        <?php foreach ($company_cols as $col): ?>
                            <th class="text-center bg-warning text-dark"><?= $company_aliases[$col] ?? ucfirst(str_replace('_',' ',$col)) ?></th>
                        <?php endforeach; ?>
                        <?php foreach ($purchase_cols as $col): ?>
                            <th class="text-center bg-primary text-white"><?= $purchase_aliases[$col] ?? ucfirst(str_replace('_',' ',$col)) ?></th>
                        <?php endforeach; ?>
                        <?php foreach ($sale_cols as $col): ?>
                            <th class="text-center bg-success text-white"><?= $sale_aliases[$col] ?? ucfirst(str_replace('_',' ',$col)) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $sn=1; foreach ($results as $row): ?>
                    <tr>
                        <td><?= $sn++; ?></td>
                        <?php foreach ($company_cols as $col): ?>
                            <td class="company-row"><?= $row["company_$col"] ?? ''; ?></td>
                        <?php endforeach; ?>
                        <?php foreach ($purchase_cols as $col): ?>
                            <td class="purchase-row"><?= $row["purchase_$col"] ?? ''; ?></td>
                        <?php endforeach; ?>
                        <?php foreach ($sale_cols as $col): ?>
                            <td class="sale-row"><?= $row["sale_$col"] ?? ''; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Transposed Table -->
        <div class="table-responsive" id="transposedView" style="display:none;">
            <table id="reportTableT" class="table table-bordered table-hover align-middle nowrap w-100">
                <thead>
                    <tr>
                        <th class="bg-secondary text-white">Field</th>
                        <?php
                        $productList = [];
                        foreach ($results as $row) {
                            $prodName = $row['purchase_prod_desc'] ?? $row['prod_desc'] ?? '';
                            $companyName = $row['company_comp_name'] ?? $row['company_short_name'] ?? 'Unknown Company';

                            if (empty($prodName)) {
                                $uniqueKey = $companyName;
                                $columnLabel = $companyName;
                            } else {
                                if (!empty($row['sale_trans_do'])) {
                                    $uniqueKey = $companyName . ' - ' . $prodName . ' - ' . $row['sale_trans_do'];
                                    $columnLabel = $prodName . ' - ' . $row['sale_trans_do'];
                                } elseif (!empty($row['purchase_ro_no'])) {
                                    $uniqueKey = $companyName . ' - ' . $prodName . ' - ' . $row['purchase_ro_no'];
                                    $columnLabel = $prodName . ' - ' . $row['purchase_ro_no'];
                                } else {
                                    $uniqueKey = $companyName . ' - ' . $prodName;
                                    $columnLabel = $prodName;
                                }
                            }

                            $productList[$uniqueKey] = $columnLabel;
                        }
                        foreach ($productList as $uniqueKey => $columnLabel): ?>
                            <th class="bg-info text-dark"><?= $columnLabel ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $transposed = [];
                    foreach ($results as $row) {
                        $prodName = $row['purchase_prod_desc'] ?? $row['prod_desc'] ?? '';
                        $companyName = $row['company_comp_name'] ?? $row['company_short_name'] ?? 'Unknown Company';

                        if (empty($prodName)) {
                            $uniqueKey = $companyName;
                        } else {
                            if (!empty($row['sale_trans_do'])) {
                                $uniqueKey = $companyName . ' - ' . $prodName . ' - ' . $row['sale_trans_do'];
                            } elseif (!empty($row['purchase_ro_no'])) {
                                $uniqueKey = $companyName . ' - ' . $prodName . ' - ' . $row['purchase_ro_no'];
                            } else {
                                $uniqueKey = $companyName . ' - ' . $prodName;
                            }
                        }

                        // company fields
                        foreach ($company_cols as $col) {
                            $label = $company_aliases[$col] ?? ucfirst(str_replace('_',' ',$col));
                            $transposed[$label][$uniqueKey] = $row["company_$col"] ?? '';
                        }

                        // purchase fields
                        foreach ($purchase_cols as $col) {
                            $label = $purchase_aliases[$col] ?? ucfirst(str_replace('_',' ',$col));
                            $transposed[$label][$uniqueKey] = $row["purchase_$col"] ?? '';
                        }

                        // sale fields
                        foreach ($sale_cols as $col) {
                            $label = $sale_aliases[$col] ?? ucfirst(str_replace('_',' ',$col));
                            $transposed[$label][$uniqueKey] = $row["sale_$col"] ?? '';
                        }
                    }

                    foreach ($transposed as $field => $cols):
                        $rowClass = in_array($field, array_map(fn($c) => $purchase_aliases[$c] ?? '', $purchase_cols)) ? 'purchase-row' :
                                    (in_array($field, array_map(fn($c) => $sale_aliases[$c] ?? '', $sale_cols)) ? 'sale-row' : 'company-row');
                    ?>
                    <tr class="<?= $rowClass ?>">
                        <td class="fw-bold"><?= $field ?></td>
                        <?php foreach ($productList as $uniqueKey => $columnLabel): ?>
                            <td><?= $cols[$uniqueKey] ?? '' ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>
            <div class="alert alert-warning">⚠️ No Data Found.</div>
        <?php endif; ?>

    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
$(document).ready(function(){

    function recalcSNo(table) {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }

    let companyColsCount = <?= count($company_cols) ?>;

    let table = $('#reportTable').DataTable({
        paging: false,
        searching: false,
        info: false,
        scrollX: true,
        scrollCollapse: true,
        autoWidth: false,
        colReorder: { realtime: false },
        fixedColumns: { leftColumns: 1 + companyColsCount },
        deferRender: true,
        columnDefs: [{ orderable: false, targets: 0 }, { width: "120px", targets: "_all" }],
        dom: 'tB',
        buttons: [
            { extend: 'print', title: 'Purchase Sale Report', exportOptions: { columns: ':visible' } },
            { extend: 'excelHtml5', title: 'Purchase_Sale_Report', exportOptions: { columns: ':visible' } },
            { extend: 'pdfHtml5', title: 'Purchase_Sale_Report', orientation: 'landscape', pageSize: 'A3', exportOptions: { columns: ':visible' } }
        ]
    });
    table.on('order.dt search.dt column-reorder.dt', function () { recalcSNo(table); }).draw();

    let tableT = $('#reportTableT').DataTable({
        paging: false,
        searching: false,
        info: false,
        scrollX: true,
        autoWidth: false,
        dom: 'tB',
        buttons: [
            { extend: 'print', title: 'Transposed Report', exportOptions: { columns: ':visible' } },
            { extend: 'excelHtml5', title: 'Purchase_Sale_Report_Transposed', exportOptions: { columns: ':visible' } },
            { extend: 'pdfHtml5', title: 'Purchase_Sale_Report_Transposed', orientation: 'landscape', pageSize: 'A3', exportOptions: { columns: ':visible' } }
        ]
    });

    let isTransposed = false;
    $('#toggleView').on('click', function(){
        if (!isTransposed) {
            $('#normalView').hide();
            $('#transposedView').show();
            $(this).text("🔄 Switch to Normal");
            isTransposed = true;
        } else {
            $('#transposedView').hide();
            $('#normalView').show();
            $(this).text("🔄 Switch to Transposed");
            isTransposed = false;
        }
    });

    $('#printBtn').click(function(){
        if(isTransposed) tableT.button('.buttons-print').trigger();
        else table.button('.buttons-print').trigger();
    });
    $('#exportExcel').click(function(){
        if(isTransposed) tableT.button('.buttons-excel').trigger();
        else table.button('.buttons-excel').trigger();
    });
    $('#exportPdf').click(function(){
        if(isTransposed) tableT.button('.buttons-pdf').trigger();
        else table.button('.buttons-pdf').trigger();
    });

});
</script>

</body>
</html>
