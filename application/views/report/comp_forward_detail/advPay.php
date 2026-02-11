<!DOCTYPE html>
<html>
<head>
    <title>Company Forward Details</title>

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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #2f4050;
            color: #ffffff;
            padding: 10px;
            font-size: 13px;
            text-transform: uppercase;
            text-align: center;
        }

        td {
            padding: 8px;
            font-size: 14px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef5ff;
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

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 8px 20px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @media print {
            body {
                background: #fff;
            }

            .btn {
                display: none;
            }

            th {
                background: #000 !important;
                color: #fff !important;
            }
        }
    </style>

    <script>
        function printDiv() {
            var divToPrint = document.getElementById('divToPrint');
            var WindowObject = window.open('', 'Print-Window');

            WindowObject.document.open();
            WindowObject.document.write('<html><head><title>Print</title>');
            WindowObject.document.write('<style>');
            WindowObject.document.write('table{width:100%;border-collapse:collapse;font-size:12px}');
            WindowObject.document.write('th,td{border:1px solid #000;padding:6px;text-align:center}');
            WindowObject.document.write('th{background:#000;color:#fff}');
            WindowObject.document.write('</style>');
            WindowObject.document.write('</head><body onload="window.print()">');
            WindowObject.document.write(divToPrint.innerHTML);
            WindowObject.document.write('</body></html>');
            WindowObject.document.close();

            setTimeout(function() {
                WindowObject.close();
            }, 50);
        }
    </script>
</head>

<body>

<div class="wraper">
    <div class="col-lg-12 container contant-wraper">

        <div id="divToPrint">

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
            <table>
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Date</th>
                        <th>FWD No</th>
                        <th>Branch Name</th>
                        <th>Qty</th>
                        <th>RO No</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                <?php if ($tableData) { 
                    $i = 1;
                    foreach ($tableData as $row) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= date("d/m/Y", strtotime($row->trans_dt)); ?></td>
                            <td><?= $row->fwd_no; ?></td>
                            <td><?= $row->district_name; ?></td>
                            <td><?= $row->fwd_qty; ?></td>
                            <td><?= $row->ro_no; ?></td>
                            <td>
                                <?php if ($row->fwd_status == 'A') { ?>
                                    <span class="badge badge-success">Forwarded</span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">Not Forwarded</span>
                                <?php } ?>
                            </td>
                        </tr>
                <?php } 
                } else { ?>
                    <tr>
                        <td colspan="7" style="text-align:center; font-weight:bold;">
                            No Data Found
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>

        <!-- BUTTON -->
        <div style="text-align:center; margin-top:20px;">
            <button class="btn-primary btn" onclick="printDiv()">Print</button>
        </div>

    </div>
</div>

</body>
</html>
