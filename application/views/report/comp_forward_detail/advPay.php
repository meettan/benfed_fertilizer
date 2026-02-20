<!DOCTYPE html>
<html>
<head>
    <title>Company Forward Details</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- JSZip (REQUIRED for Excel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

    <style>
        body {
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            background: #f4f6f9;
        }

        .contant-wraper {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h3, h4, h5 {
            margin: 4px 0;
            font-weight: 600;
        }

        table.dataTable thead th {
            background: #2f4050;
            color: #ffffff;
            text-align: center;
        }

        table.dataTable tbody td {
            text-align: center;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .dt-buttons {
            margin-bottom: 10px;
        }

        @media print {
            .dt-buttons,
            .dataTables_filter,
            .dataTables_length,
            .dataTables_paginate {
                display: none;
            }
        }
    </style>

    <script>
        $(document).ready(function () {
            $('#reportTable').DataTable({
                pageLength: 25,
                order: [[7, 'asc']], // Sort by FWD Date
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: 'Export to Excel',
                        title: 'Company_Forward_Details'
                    }
                ],
                columnDefs: [
                    { orderable: false, targets: [0] } // Sl No not sortable
                ]
            });
        });

        function printDiv() {
            window.print();
        }
    </script>
</head>

<body>

<div class="wraper">
<div class="col-lg-12 container contant-wraper">

<!-- HEADER -->
<div style="text-align:center; margin-bottom:15px;">
    <h4>THE WEST BENGAL STATE CO-OP. MARKETING FEDERATION LTD.</h4>
    <h5>Head Office: Southend Conclave, 3rd Floor, Rajdanga Main Road, Kolkata – 700107</h5>
    <hr style="width:60%; margin:10px auto;">
    <h3>
        Company Forward Details<br>
        <small>
            (<?= date("d/m/Y", strtotime($fDate)); ?> to <?= date("d/m/Y", strtotime($tDate)); ?>)
        </small>
    </h3>
</div>

<!-- TABLE -->
<table id="reportTable" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Branch</th>
            <th>Company</th>
            <th>Product</th>
            <th>RO No</th>
            <th>RO Date</th>
            <th>FWD No</th>
            <th>FWD Date</th>
            <th>Qty</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($tableData)) {
        $i = 1;
        foreach ($tableData as $row) { ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $row->district_name; ?></td>
            <td><?= $row->companies; ?></td>
            <td><?= $row->products; ?></td>
            <td><?= $row->ro_no; ?></td>
            <td><?= date("d/m/Y", strtotime($row->ro_dt)); ?></td>
            <td><?= $row->fwd_no; ?></td>
            <td><?= date("d/m/Y", strtotime($row->trans_dt)); ?></td>
            <td><?= $row->fwd_qty; ?></td>
            <td>
                <?= ($row->fwd_status == 'A')
                    ? '<span class="badge badge-success">Forwarded</span>'
                    : '<span class="badge badge-danger">Not Forwarded</span>'; ?>
            </td>
        </tr>
    <?php } } ?>
    </tbody>
</table>

<!-- BUTTON -->
<div style="text-align:center; margin-top:20px;">
    <button class="btn btn-primary" onclick="printDiv()">Print</button>
</div>

</div>
</div>

</body>
</html>
