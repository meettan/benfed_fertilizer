<style>
/* =========================================================
   PROFESSIONAL REPORT DESIGN
   ========================================================= */

body {
    background: #f4f6f9;
    font-family: Arial, Helvetica, sans-serif;
    color: #333;
}

.report-container {
    width: 98%;
    margin: 20px auto;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    padding: 20px;
}

/* Header */
.report-header {
    text-align: center;
    border-bottom: 2px solid #1f4e78;
    padding-bottom: 15px;
    margin-bottom: 15px;
}

.report-header h2 {
    margin: 0 0 8px 0;
    font-size: 22px;
    font-weight: 700;
    color: #1f4e78;
    text-transform: uppercase;
}

.report-header h4 {
    margin: 4px 0;
    font-size: 13px;
    color: #555;
    font-weight: 600;
}

.report-title {
    margin-top: 12px !important;
    font-size: 17px !important;
    color: #222 !important;
    font-weight: 700 !important;
}

/* Table wrapper */
.table-responsive {
    width: 100%;
    overflow-x: auto;
}

/* Main table */
#example {
    width: 100% !important;
    border-collapse: collapse;
    font-size: 12px;
}

#example thead th {
    background: #1f4e78;
    color: #fff;
    border: 1px solid #d5dce3;
    padding: 8px 6px;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    font-weight: 600;
}

#example tbody td {
    border: 1px solid #dfe3e8;
    padding: 7px 6px;
    vertical-align: middle;
    background: #fff;
}

#example tbody tr:nth-child(even) td {
    background: #f8fafc;
}

#example tbody tr:hover td {
    background: #eaf3fb;
}

/* Footer */
#example tfoot th {
    background: #e9eef3;
    color: #222;
    border: 1px solid #999;
    padding: 8px 6px;
    font-weight: bold;
}

/* Alignment */
.text-center {
    text-align: center !important;
}

.text-left {
    text-align: left !important;
}

.text-right {
    text-align: right !important;
}

.qty {
    text-align: right !important;
    font-weight: 600;
}

/* =========================================================
   ACTION BUTTONS
   ========================================================= */

.action-bar {
    text-align: center;
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid #ddd;
}

.btn-print {
    background: #1f4e78;
    color: #fff;
    border: none;
    padding: 9px 22px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    margin-right: 8px;
}

.btn-print:hover {
    background: #163a5a;
}

/* Excel Button */
.dt-buttons {
    margin-bottom: 12px;
}

.dt-button {
    background: #198754 !important;
    color: #fff !important;
    border: none !important;
    border-radius: 5px !important;
    padding: 9px 18px !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    cursor: pointer;
}

.dt-button:hover {
    background: #146c43 !important;
}

/* Search */
.dataTables_filter {
    margin-bottom: 10px;
}

.dataTables_filter input {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 7px 10px;
    margin-left: 5px;
}

/* =========================================================
   PRINT STYLE
   ========================================================= */

@media print {

    @page {
        size: A4 landscape;
        margin: 8mm;
    }

    body {
        background: #fff !important;
        margin: 0;
        padding: 0;
    }

    .report-container {
        width: 100%;
        margin: 0;
        padding: 0;
        box-shadow: none;
        border: none;
    }

    .action-bar,
    .dt-buttons,
    .dataTables_filter,
    .dataTables_info,
    .dataTables_paginate {
        display: none !important;
    }

    .report-header {
        border-bottom: 2px solid #000;
        margin-bottom: 10px;
        padding-bottom: 7px;
    }

    .report-header h2 {
        color: #000 !important;
        font-size: 16px;
    }

    .report-header h4 {
        color: #000 !important;
        font-size: 9px;
    }

    .report-title {
        font-size: 13px !important;
    }

    #example {
        width: 100% !important;
        font-size: 7px !important;
    }

    #example thead th {
        background: #eee !important;
        color: #000 !important;
        border: 1px solid #000 !important;
        padding: 3px !important;
    }

    #example tbody td {
        border: 1px solid #000 !important;
        padding: 3px !important;
    }

    #example tfoot th {
        background: #eee !important;
        color: #000 !important;
        border: 1px solid #000 !important;
        padding: 3px !important;
    }

    tr {
        page-break-inside: avoid;
    }

    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }
}
</style>


<script>
/* =========================================================
   PRINT FUNCTION
   ========================================================= */

function printDiv() {

    var divToPrint = document.getElementById('divToPrint');

    var WindowObject = window.open(
        '',
        'Print-Window',
        'width=1200,height=800'
    );

    WindowObject.document.open();

    WindowObject.document.write(`
        <!DOCTYPE html>

        <html>

        <head>

            <meta charset="utf-8">

            <title>District Wise Society List</title>

            <style>

                @page {
                    size: A4 landscape;
                    margin: 8mm;
                }

                body {
                    font-family: Arial, Helvetica, sans-serif;
                    margin: 0;
                    padding: 0;
                    color: #000;
                }

                .report-header {
                    text-align: center;
                    border-bottom: 2px solid #000;
                    padding-bottom: 7px;
                    margin-bottom: 10px;
                }

                .report-header h2 {
                    margin: 0 0 5px 0;
                    font-size: 16px;
                }

                .report-header h4 {
                    margin: 3px 0;
                    font-size: 9px;
                }

                .report-title {
                    font-size: 13px !important;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 7px;
                }

                th {
                    background: #eeeeee !important;
                    color: #000 !important;
                    border: 1px solid #000;
                    padding: 3px;
                    text-align: center;
                    vertical-align: middle;
                }

                td {
                    border: 1px solid #000;
                    padding: 3px;
                    vertical-align: middle;
                }

                tfoot th {
                    background: #eeeeee !important;
                    font-weight: bold;
                }

                .text-center {
                    text-align: center;
                }

                .text-left {
                    text-align: left;
                }

                .text-right {
                    text-align: right;
                }

                tr {
                    page-break-inside: avoid;
                }

                thead {
                    display: table-header-group;
                }

                tfoot {
                    display: table-footer-group;
                }

            </style>

        </head>

        <body onload="window.print();">

            ${divToPrint.innerHTML}

        </body>

        </html>
    `);

    WindowObject.document.close();

    setTimeout(function () {
        WindowObject.close();
    }, 1000);
}
</script>


<!-- =========================================================
     REPORT CONTAINER
     ========================================================= -->

<div class="report-container">

    <div id="divToPrint">


        <!-- =================================================
             REPORT HEADER
             ================================================= -->

        <div class="report-header">

            <h2>
                THE WEST BENGAL STATE CO-OP. MARKETING FEDERATION LTD.
            </h2>

            <h4>
                HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR,
                1582 RAJDANGA MAIN ROAD, KOLKATA - 700107
            </h4>

            <h4 class="report-title">
                DISTRICT WISE SOCIETY LIST
            </h4>

            <h4>
                Period:
                <?php echo htmlspecialchars($_SESSION['date'] ?? ''); ?>
            </h4>

        </div>


        <!-- =================================================
             TABLE
             ================================================= -->

        <div class="table-responsive">

            <table id="example">

                <thead>

                    <tr>

                        <th>Sl No.</th>

                        <th>CUSTOMER<br>GROUP</th>

                        <th>TITLE</th>

                        <th>CUSTOMER NAME</th>

                        <th>ADDRESS</th>

                        <th>LOCATION</th>

                        <th>DISTRICT</th>

                        <th>PIN CODE</th>

                        <th>BLOCK</th>

                        <th>PHONE</th>

                        <th>EMAIL</th>

                        <th>RETAIL<br>MFMS</th>

                        <th>WHOLESALE<br>MFMS</th>

                        <th>WHOLESALE<br>LICENCE NO.</th>

                        <th>WHOLESALE LICENCE<br>FROM DATE</th>

                        <th>WHOLESALE LICENCE<br>TO DATE</th>

                        <th>RETAIL<br>LICENCE NO.</th>

                        <th>RETAIL LICENCE<br>FROM DATE</th>

                        <th>RETAIL LICENCE<br>TO DATE</th>

                        <th>GSTIN</th>

                        <th>PAN</th>

                        <th>SALE<br>QTY</th>

                    </tr>

                </thead>


                <tbody>

                <?php

                if (!empty($crdtls)) {

                    $i = 1;

                    $grand_total = 0;

                    foreach ($crdtls as $crd) {

                        $sale_qty = isset($crd->sl_qty)
                            ? (float)$crd->sl_qty
                            : 0;

                        $grand_total += $sale_qty;

                ?>

                    <tr>

                        <!-- Sl No -->
                        <td class="text-center">
                            <?php echo $i++; ?>
                        </td>

                        <!-- Customer Group -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->CUSTOMER_GROUP ?? ''
                            );
                            ?>
                        </td>

                        <!-- Title -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->TITLE ?? ''
                            );
                            ?>
                        </td>

                        <!-- Customer Name -->
                        <td class="text-left">
                            <?php
                            echo htmlspecialchars(
                                $crd->CUSTOMER_NAME ?? ''
                            );
                            ?>
                        </td>

                        <!-- Address -->
                        <td class="text-left">
                            <?php
                            echo htmlspecialchars(
                                $crd->ADDRESS ?? ''
                            );
                            ?>
                        </td>

                        <!-- Location -->
                        <td class="text-left">
                            <?php
                            echo htmlspecialchars(
                                $crd->LOCATION ?? ''
                            );
                            ?>
                        </td>

                        <!-- District -->
                        <td class="text-left">
                            <?php
                            echo htmlspecialchars(
                                $crd->DISTRICT ?? ''
                            );
                            ?>
                        </td>

                        <!-- PIN -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->PIN_CODE ?? ''
                            );
                            ?>
                        </td>

                        <!-- Block -->
                        <td class="text-left">
                            <?php
                            echo htmlspecialchars(
                                $crd->BLOCK ?? ''
                            );
                            ?>
                        </td>

                        <!-- Phone -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->ph_no ?? ''
                            );
                            ?>
                        </td>

                        <!-- Email -->
                        <td class="text-left">
                            <?php
                            echo htmlspecialchars(
                                $crd->email ?? ''
                            );
                            ?>
                        </td>

                        <!-- Retail MFMS -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->retailmfms ?? ''
                            );
                            ?>
                        </td>

                        <!-- Wholesale MFMS -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->whole_sale_mfms ?? ''
                            );
                            ?>
                        </td>

                        <!-- Wholesale Licence No -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->Whole_sale_licen_no ?? ''
                            );
                            ?>
                        </td>

                        <!-- Wholesale Licence From -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->Whole_sale_licen_frm_dt ?? ''
                            );
                            ?>
                        </td>

                        <!-- Wholesale Licence To -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->Whole_sale_licen_to_dt ?? ''
                            );
                            ?>
                        </td>

                        <!-- Retail Licence No -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->retail_license_no ?? ''
                            );
                            ?>
                        </td>

                        <!-- Retail Licence From -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->retail_license_from_dt ?? ''
                            );
                            ?>
                        </td>

                        <!-- Retail Licence To -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->reatil_license_to_dt ?? ''
                            );
                            ?>
                        </td>

                        <!-- GSTIN -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->gstin ?? ''
                            );
                            ?>
                        </td>

                        <!-- PAN -->
                        <td class="text-center">
                            <?php
                            echo htmlspecialchars(
                                $crd->pan ?? ''
                            );
                            ?>
                        </td>

                        <!-- Sale Qty -->
                        <td class="qty">
                            <?php
                            echo number_format(
                                $sale_qty,
                                3
                            );
                            ?>
                        </td>

                    </tr>

                <?php

                    }

                } else {

                ?>

                    <tr>

                        <td
                            colspan="22"
                            class="text-center"
                            style="
                                padding:20px;
                                font-weight:bold;
                            "
                        >
                            No Data Found
                        </td>

                    </tr>

                <?php

                }

                ?>

                </tbody>


                <!-- =================================================
                     GRAND TOTAL
                     ================================================= -->

                <?php if (!empty($crdtls)) { ?>

                <tfoot>

                    <tr>

                        <th
                            colspan="21"
                            style="text-align:right;"
                        >
                            GRAND TOTAL
                        </th>

                        <th
                            class="text-right"
                        >
                            <?php
                            echo number_format(
                                $grand_total,
                                3
                            );
                            ?>
                        </th>

                    </tr>

                </tfoot>

                <?php } ?>

            </table>

        </div>

    </div>


    <!-- =================================================
         ACTION BAR
         ================================================= -->

    <div class="action-bar">

        <button
            type="button"
            class="btn-print"
            onclick="printDiv();"
        >
            🖨 Print Report
        </button>

    </div>

</div>


<!-- =========================================================
     DATATABLE LIBRARIES
     ========================================================= -->

<link
    href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"
    rel="stylesheet"
/>

<link
    href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"
    rel="stylesheet"
/>


<script
    src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>

<script
    src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js">
</script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
</script>

<script
    src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js">
</script>


<!-- =========================================================
     DATATABLE INITIALIZATION
     ========================================================= -->

<script>

$(document).ready(function () {

    $('#example').DataTable({

        destroy: true,

        searching: true,

        ordering: true,

        paging: false,

        info: true,

        scrollX: true,

        autoWidth: false,

        dom: 'Bfrtip',

        buttons: [

            {
                extend: 'excelHtml5',

                text: '⬇ Convert to Excel',

                title: 'THE WEST BENGAL STATE CO-OP. MARKETING FEDERATION LTD.',

                messageTop:
                    'DISTRICT WISE SOCIETY LIST | Period: <?php echo addslashes($_SESSION["date"] ?? ""); ?>',

                filename:
                    'District_Wise_Society_List',

                exportOptions: {

                    columns: ':visible'

                },

                footer: true

            }

        ],

        columnDefs: [

            {
                targets: [
                    0,
                    1,
                    2,
                    7,
                    9,
                    11,
                    12,
                    13,
                    14,
                    15,
                    16,
                    17,
                    18,
                    19,
                    20
                ],

                className: 'text-center'
            },

            {
                targets: [21],

                className: 'text-right'
            }

        ]

    });

});

</script>