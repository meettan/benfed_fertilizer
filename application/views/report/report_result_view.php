<!-- <!DOCTYPE html>
<html> -->
<!-- <head> -->
    <!-- <title>Dynamic Report Result</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables + ColReorder + FixedColumns + Buttons CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">

    <style>
        body { font-size: 13px; } /* smaller font to fit more columns */
        .container-box { margin-top: 10px; padding: 10px; }
        .report-header { text-align: center; margin-bottom: 1px; }
        .report-header h4 { margin: 2px 0; font-weight: bold; }
        .dtfc-fixed-left { background: #f8f9fa; box-shadow: 2px 0 5px -2px rgba(0,0,0,0.3); }

        table th, table td { white-space: nowrap; font-size: 12px; }

        @media print {
            body { margin: 0; }
            .no-print { display: none !important; }
            .container-box { box-shadow: none !important; border-radius: 0 !important; padding: 0 !important; }
            table { border-collapse: collapse !important; width: 100% !important; font-size: 12px !important; }
            th, td { border: 1px solid #000 !important; padding: 4px !important; }
            thead { background: #f0f0f0 !important; -webkit-print-color-adjust: exact; }
            .dataTables_scroll, .dtfc-fixed-left, .dtfc-fixed-right, .dtfc-fixed-top, .dtfc-fixed-bottom { display: none !important; }
            #reportTable { display: table !important; }
        }
    </style>
<!-- </head> -->
<body class="bg-light">

<div class="container-fluid"> <!-- Full width -->
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
            <button id="exportPdf" class="btn btn-danger">📄 Export PDF</button>
        </div>

        <!-- Report Table -->
        <?php if (!empty($results)): ?>
            <div class="table-responsive">
                <table id="reportTable" class="table table-bordered table-hover align-middle nowrap w-100">
                    <thead>
                        <tr>
                            <th class="text-center bg-secondary text-white">S.No.</th>
                            <?php foreach ($company_cols as $col): ?>
                                <th class="text-center bg-warning text-dark"><?= ucfirst(str_replace('_',' ',$col)) ?></th>
                            <?php endforeach; ?>
                            <?php foreach ($purchase_cols as $col): ?>
                                <th class="text-center bg-primary text-white"><?= ucfirst(str_replace('_',' ',$col)) ?></th>
                            <?php endforeach; ?>
                            <?php foreach ($sale_cols as $col): ?>
                                <th class="text-center bg-success text-white"><?= ucfirst(str_replace('_',' ',$col)) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn=1; foreach ($results as $row): ?>
                        <tr>
                            <td><?= $sn++; ?></td>
                            <?php foreach ($company_cols as $col): ?>
                                <td style="background-color:#fff3cd;"><?= $row[$col] ?? ''; ?></td>
                            <?php endforeach; ?>
                            <?php foreach ($purchase_cols as $col): ?>
                                <td style="background-color:#cce5ff;"><?= $row[$col] ?? ''; ?></td>
                            <?php endforeach; ?>
                            <?php foreach ($sale_cols as $col): ?>
                                <td style="background-color:#d4edda;"><?= $row[$col] ?? ''; ?></td>
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
    let companyColsCount = <?= count($company_cols) ?>;

    let table = $('#reportTable').DataTable({
        paging: false,
        searching: false,
        info: false,
        scrollX: true,
        scrollCollapse: true,
        autoWidth: false,
        // colReorder: true,
        colReorder: {
        realtime: false   // ✅ drag "ghost" column only, don’t stretch table
    },
        fixedColumns: { leftColumns: 1 + companyColsCount },
        dom: 't',
        buttons: [
            {
                extend: 'print',
                title: '',
                exportOptions: { columns: ':visible' },
                customize: function(win){
                    $(win.document.body).css('font-size','12px');
                    $(win.document.body).prepend(`
                        <div style="text-align:center; margin-bottom:20px;">
                            <h4>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h4>
                            <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                            <h4>Purchase Sale Report (From: <?= date('d-m-Y', strtotime($from_date)) ?> To: <?= date('d-m-Y', strtotime($to_date)) ?>)</h4>
                        </div>
                    `);
                    $(win.document.body).find('table').addClass('compact').css('font-size','inherit');
                }
            },
            {
                extend: 'excelHtml5',
                title: 'Purchase_Sale_Report',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'pdfHtml5',
                title: 'Purchase_Sale_Report',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: { columns: ':visible' },
                customize: function(doc) {
                    doc.defaultStyle.fontSize = 10;
                    doc.styles.tableHeader.fontSize = 10;
                    doc.content.unshift({
                        text: 'THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.\nHEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.\nPurchase Sale Report (From: <?= date('d-m-Y', strtotime($from_date)) ?> To: <?= date('d-m-Y', strtotime($to_date)) ?>)',
                        alignment: 'center',
                        margin: [0,0,0,10],
                        fontSize: 12,
                        bold: true
                    });
                }
            }
        ]
    });

    // Custom buttons
    $('#printBtn').on('click', function(){ table.button('.buttons-print').trigger(); });
    $('#exportExcel').on('click', function(){ table.button('.buttons-excel').trigger(); });
    $('#exportPdf').on('click', function(){ table.button('.buttons-pdf').trigger(); });
});
</script>

</body>
<!-- </html> -->
