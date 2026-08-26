<?php
/* =========================================================
   DISTRICT WISE SOCIETY LIST
   PROFESSIONAL REPORT
   ========================================================= */
?>

<style>
:root{
    --primary:#173f67;
    --primary-dark:#0f2f4d;
    --accent:#2f80ed;
    --success:#198754;
    --border:#d9e2ec;
    --muted:#64748b;
    --surface:#ffffff;
    --surface-soft:#f6f9fc;
    --text:#1e293b;
}

*{
    box-sizing:border-box;
}

body{
    margin:0;
    padding:0;
    background:linear-gradient(135deg,#eef3f8 0%,#f8fafc 100%);
    font-family:"Segoe UI",Arial,Helvetica,sans-serif;
    color:var(--text);
}

/* =========================================================
   REPORT CONTAINER
   ========================================================= */

.report-container{
    width:98%;
    max-width:1900px;
    margin:22px auto;
    background:#fff;
    border:1px solid #e2e8f0;
    border-radius:14px;
    box-shadow:0 8px 30px rgba(15,47,77,.10);
    padding:22px;
}

/* =========================================================
   REPORT HEADER
   ========================================================= */

.report-header{
    position:relative;
    text-align:center;
    padding:4px 10px 16px;
    margin-bottom:18px;
    border-bottom:3px solid var(--primary);
}

.report-header:after{
    content:"";
    display:block;
    width:90px;
    height:3px;
    background:var(--accent);
    margin:9px auto -19px;
    border-radius:4px;
}

.report-header h2{
    margin:0 0 8px;
    font-size:22px;
    line-height:1.3;
    font-weight:750;
    letter-spacing:.25px;
    color:var(--primary);
    text-transform:uppercase;
}

.report-header h4{
    margin:4px 0;
    font-size:12px;
    line-height:1.45;
    color:#526274;
    font-weight:600;
}

.report-title{
    margin-top:13px !important;
    font-size:16px !important;
    color:#162b40 !important;
    font-weight:750 !important;
    letter-spacing:.7px;
}

/* =========================================================
   TABLE WRAPPER
   ========================================================= */

.table-responsive{
    width:100%;
    overflow-x:auto;
    overflow-y:visible;
    border:1px solid var(--border);
    border-radius:10px;
}

/* =========================================================
   MAIN TABLE
   ========================================================= */

#example{
    width:100% !important;
    border-collapse:separate;
    border-spacing:0;
    font-size:12px;
}

#example thead th{
    position:sticky;
    top:0;
    z-index:2;
    background:linear-gradient(
        180deg,
        var(--primary) 0%,
        var(--primary-dark) 100%
    );
    color:#fff;
    border:0;
    border-right:1px solid rgba(255,255,255,.18);
    border-bottom:2px solid #0d2942;
    padding:10px 7px;
    text-align:center;
    vertical-align:middle;
    white-space:nowrap;
    font-weight:700;
    letter-spacing:.15px;
}

#example thead th:first-child{
    border-top-left-radius:8px;
}

#example thead th:last-child{
    border-right:0;
    border-top-right-radius:8px;
}

#example tbody td{
    border:0;
    border-right:1px solid var(--border);
    border-bottom:1px solid var(--border);
    padding:8px 7px;
    vertical-align:middle;
    background:#fff;
}

#example tbody tr:nth-child(even) td{
    background:#f8fbfe;
}

#example tbody tr:hover td{
    background:#eaf3ff;
}

#example tbody tr:last-child td{
    border-bottom:0;
}

/* =========================================================
   COLUMN WIDTHS
   ========================================================= */

#example th:nth-child(1),
#example td:nth-child(1){
    min-width:58px;
}

#example th:nth-child(4),
#example td:nth-child(4){
    min-width:180px;
}

#example th:nth-child(5),
#example td:nth-child(5){
    min-width:220px;
}

#example th:nth-child(6),
#example td:nth-child(6){
    min-width:120px;
}

#example th:nth-child(7),
#example td:nth-child(7){
    min-width:110px;
}

#example th:nth-child(11),
#example td:nth-child(11){
    min-width:180px;
}

/* =========================================================
   FOOTER
   ========================================================= */

#example tfoot th{
    background:linear-gradient(
        180deg,
        #e8eef5,
        #dbe5ee
    );
    color:#172b3d;
    border:0;
    border-top:2px solid #aebdcb;
    padding:9px 7px;
    font-weight:800;
}

/* =========================================================
   ALIGNMENT
   ========================================================= */

.text-center{
    text-align:center !important;
}

.text-left{
    text-align:left !important;
}

.text-right{
    text-align:right !important;
}

.qty{
    text-align:right !important;
    font-weight:700;
    white-space:nowrap;
    font-variant-numeric:tabular-nums;
}

/* =========================================================
   ACTION BAR
   ========================================================= */

.action-bar{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
    margin-top:18px;
    padding-top:16px;
    border-top:1px solid #e2e8f0;
}

.btn-print{
    background:linear-gradient(
        135deg,
        var(--primary),
        #245d91
    );
    color:#fff;
    border:0;
    padding:10px 20px;
    border-radius:7px;
    cursor:pointer;
    font-size:13px;
    font-weight:700;
    box-shadow:0 3px 8px rgba(23,63,103,.20);
    transition:.2s ease;
}

.btn-print:hover{
    transform:translateY(-1px);
    box-shadow:0 5px 12px rgba(23,63,103,.28);
}

/* =========================================================
   DATATABLE
   ========================================================= */

.dataTables_wrapper{
    width:100%;
}

.dt-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
    margin-bottom:12px;
}

.dt-bottom{
    margin-top:10px;
}

.dataTables_wrapper .dt-buttons{
    float:left;
    margin-bottom:12px;
}

.dataTables_wrapper .dataTables_filter{
    float:right;
    margin-bottom:12px;
}

.dataTables_wrapper .dataTables_filter label{
    color:#475569;
    font-weight:650;
}

.dataTables_wrapper .dataTables_filter input{
    width:240px;
    margin-left:7px;
    padding:8px 11px;
    border:1px solid #cbd5e1;
    border-radius:7px;
    outline:0;
    background:#fff;
    transition:.2s;
}

.dataTables_wrapper .dataTables_filter input:focus{
    border-color:var(--accent);
    box-shadow:0 0 0 3px rgba(47,128,237,.12);
}

/* =========================================================
   EXCEL BUTTON
   ========================================================= */

.dt-button{
    background:linear-gradient(
        135deg,
        #198754,
        #157347
    ) !important;

    color:#fff !important;

    border:0 !important;

    border-radius:7px !important;

    padding:9px 16px !important;

    font-size:13px !important;

    font-weight:700 !important;

    box-shadow:
        0 3px 7px rgba(25,135,84,.18) !important;

    transition:.2s !important;
}

.dt-button:hover{
    background:linear-gradient(
        135deg,
        #157347,
        #11613b
    ) !important;

    transform:translateY(-1px);
}

.dataTables_info{
    margin-top:10px;
    color:#64748b;
    font-size:12px;
}

.dataTables_scroll{
    border-radius:10px;
}

/* =========================================================
   NO DATA
   ========================================================= */

#example tbody td[colspan]{
    color:#64748b;
    background:#f8fafc !important;
    font-size:13px;
}

/* =========================================================
   MOBILE
   ========================================================= */

@media(max-width:768px){

    .report-container{
        width:100%;
        margin:0;
        padding:12px;
        border-radius:0;
    }

    .report-header h2{
        font-size:17px;
    }

    .report-header h4{
        font-size:10px;
    }

    .report-title{
        font-size:13px !important;
    }

    .dt-top{
        flex-direction:column;
        align-items:stretch;
    }

    .dataTables_wrapper .dataTables_filter{
        float:none;
        text-align:left;
        margin-bottom:10px;
    }

    .dataTables_wrapper .dataTables_filter input{
        width:calc(100% - 65px);
    }

    .dataTables_wrapper .dt-buttons{
        float:none;
    }

    .action-bar{
        flex-wrap:wrap;
    }
}

/* =========================================================
   PRINT
   ========================================================= */

@media print{

    @page{
        size:A4 landscape;
        margin:7mm;
    }

    body{
        background:#fff !important;
        margin:0;
        padding:0;
    }

    .report-container{
        width:100%;
        max-width:none;
        margin:0;
        padding:0;
        box-shadow:none;
        border:0;
    }

    .action-bar,
    .dt-buttons,
    .dataTables_filter,
    .dataTables_info,
    .dataTables_paginate,
    .dataTables_length{
        display:none !important;
    }

    .report-header{
        border-bottom:2px solid #000;
        margin-bottom:8px;
        padding-bottom:6px;
    }

    .report-header:after{
        display:none;
    }

    .report-header h2{
        color:#000 !important;
        font-size:15px;
    }

    .report-header h4{
        color:#000 !important;
        font-size:8px;
    }

    .report-title{
        font-size:11px !important;
    }

    .table-responsive{
        overflow:visible !important;
        border:0;
    }

    #example_wrapper{
        width:100% !important;
    }

    #example{
        width:100% !important;
        font-size:6.5px !important;
    }

    #example thead th{
        position:static;
        background:#e9edf1 !important;
        color:#000 !important;
        border:1px solid #000 !important;
        padding:3px !important;
    }

    #example tbody td{
        border:1px solid #000 !important;
        padding:3px !important;
    }

    #example tfoot th{
        background:#e9edf1 !important;
        color:#000 !important;
        border:1px solid #000 !important;
        padding:3px !important;
    }

    tr{
        page-break-inside:avoid;
    }

    thead{
        display:table-header-group;
    }

    tfoot{
        display:table-footer-group;
    }
}
</style>


<!-- =========================================================
     PRINT FUNCTION
     ========================================================= -->

<script>

function printDiv(){

    var divToPrint = document.getElementById('divToPrint');

    if(!divToPrint){

        alert('Report area not found.');

        return;
    }

    var WindowObject = window.open(
        '',
        'Print-Window',
        'width=1400,height=900'
    );

    if(!WindowObject){

        alert(
            'Please allow pop-ups for printing this report.'
        );

        return;
    }

    WindowObject.document.open();

    WindowObject.document.write(`

        <!DOCTYPE html>

        <html>

        <head>

            <meta charset="utf-8">

            <title>
                District Wise Society List
            </title>

            <style>

                @page{
                    size:A4 landscape;
                    margin:7mm;
                }

                *{
                    box-sizing:border-box;
                }

                body{
                    font-family:
                        "Segoe UI",
                        Arial,
                        Helvetica,
                        sans-serif;

                    margin:0;
                    padding:0;
                    color:#000;
                    background:#fff;
                }

                .report-header{
                    text-align:center;
                    border-bottom:2px solid #000;
                    padding-bottom:6px;
                    margin-bottom:8px;
                }

                .report-header:after{
                    display:none;
                }

                .report-header h2{
                    margin:0 0 4px 0;
                    font-size:15px;
                    font-weight:700;
                }

                .report-header h4{
                    margin:2px 0;
                    font-size:8px;
                    font-weight:600;
                }

                .report-title{
                    font-size:11px !important;
                    font-weight:700 !important;
                }

                table{
                    width:100%;
                    border-collapse:collapse;
                    font-size:6.5px;
                    table-layout:auto;
                }

                th{
                    background:#e9edf1 !important;
                    color:#000 !important;
                    border:1px solid #000;
                    padding:3px;
                    text-align:center;
                    vertical-align:middle;
                    font-weight:bold;
                }

                td{
                    border:1px solid #000;
                    padding:3px;
                    vertical-align:middle;
                }

                tfoot th{
                    background:#e9edf1 !important;
                    font-weight:bold;
                }

                .text-center{
                    text-align:center !important;
                }

                .text-left{
                    text-align:left !important;
                }

                .text-right{
                    text-align:right !important;
                }

                .qty{
                    text-align:right !important;
                    white-space:nowrap;
                }

                tr{
                    page-break-inside:avoid;
                }

                thead{
                    display:table-header-group;
                }

                tfoot{
                    display:table-footer-group;
                }

            </style>

        </head>

        <body>

            ${divToPrint.innerHTML}

            <script>

                window.onload = function(){

                    setTimeout(function(){

                        window.print();

                    },300);

                };

                window.onafterprint = function(){

                    window.close();

                };

            <\/script>

        </body>

        </html>

    `);

    WindowObject.document.close();
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
                <?php
                echo htmlspecialchars(
                    $_SESSION['date'] ?? ''
                );
                ?>
            </h4>

        </div>


        <!-- =================================================
             TABLE
             ================================================= -->

        <div class="table-responsive">

            <table id="example">

                <thead>

                    <tr>

                        <th>
                            Sl No.
                        </th>

                        <th>
                            CUSTOMER<br>GROUP
                        </th>

                        <th>
                            TITLE
                        </th>

                        <th>
                            CUSTOMER NAME
                        </th>

                        <th>
                            ADDRESS
                        </th>

                        <th>
                            LOCATION
                        </th>

                        <th>
                            DISTRICT
                        </th>

                        <th>
                            PIN CODE
                        </th>

                        <th>
                            BLOCK
                        </th>

                        <th>
                            PHONE
                        </th>

                        <th>
                            EMAIL
                        </th>

                        <th>
                            RETAIL<br>MFMS
                        </th>

                        <th>
                            WHOLESALE<br>MFMS
                        </th>

                        <th>
                            WHOLESALE<br>LICENCE NO.
                        </th>

                        <th>
                            WHOLESALE LICENCE<br>FROM DATE
                        </th>

                        <th>
                            WHOLESALE LICENCE<br>TO DATE
                        </th>

                        <th>
                            RETAIL<br>LICENCE NO.
                        </th>

                        <th>
                            RETAIL LICENCE<br>FROM DATE
                        </th>

                        <th>
                            RETAIL LICENCE<br>TO DATE
                        </th>

                        <th>
                            GSTIN
                        </th>

                        <th>
                            PAN
                        </th>

                        <th>
                            SALE<br>QTY
                        </th>

                        <th>
                            SALE<br>AMT
                        </th>

                    </tr>

                </thead>


                <tbody>

                <?php

                $grand_total_qty = 0;
                $grand_total_amt = 0;

                if(!empty($crdtls)){

                    $i = 1;

                    foreach($crdtls as $crd){

                        /* =================================================
                           SALE QUANTITY
                           ================================================= */

                        $sale_qty = isset($crd->sl_qty)
                            ? (float)$crd->sl_qty
                            : 0;


                        /* =================================================
                           SALE AMOUNT
                           ================================================= */

                        $sale_amt = isset($crd->tot_amt)
                            ? (float)$crd->tot_amt
                            : 0;


                        /* =================================================
                           GRAND TOTAL
                           ================================================= */

                        $grand_total_qty += $sale_qty;

                        $grand_total_amt += $sale_amt;

                ?>

                    <tr>

                        <!-- Sl No -->

                        <td class="text-center">

                            <?php
                            echo $i++;
                            ?>

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


                        <!-- Sale Quantity -->

                        <td class="qty">

                            <?php

                            echo number_format(
                                $sale_qty,
                                3
                            );

                            ?>

                        </td>


                        <!-- Sale Amount -->

                        <td class="qty">

                            <?php

                            echo number_format(
                                $sale_amt,
                                2
                            );

                            ?>

                        </td>

                    </tr>

                <?php

                    }

                }else{

                ?>

                    <tr>

                        <td
                            colspan="23"
                            class="text-center"
                            style="
                                padding:25px;
                                font-weight:700;
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

                <?php

                if(!empty($crdtls)){

                ?>

                <tfoot>

                    <tr>

                        <th
                            colspan="21"
                            style="text-align:right;"
                        >

                            GRAND TOTAL

                        </th>


                        <th class="text-right">

                            <?php

                            echo number_format(
                                $grand_total_qty,
                                3
                            );

                            ?>

                        </th>


                        <th class="text-right">

                            <?php

                            echo number_format(
                                $grand_total_amt,
                                2
                            );

                            ?>

                        </th>

                    </tr>

                </tfoot>

                <?php

                }

                ?>

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
     DATATABLE CSS
     ========================================================= -->

<link
    href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"
    rel="stylesheet"
>

<link
    href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"
    rel="stylesheet"
>


<!-- =========================================================
     DATATABLE JS
     ========================================================= -->

<script
    src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>

<script
    src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js">
</script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
</script>

<script
    src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js">
</script>


<!-- =========================================================
     DATATABLE INITIALIZATION
     ========================================================= -->

<script>

$(document).ready(function(){

    $('#example').DataTable({

        destroy:true,

        searching:true,

        ordering:true,

        paging:false,

        info:true,

        scrollX:true,

        autoWidth:false,

        dom:'<"dt-top" B f>rt<"dt-bottom" i>',

        buttons:[

            {
                extend:'excelHtml5',

                text:'⬇ Convert to Excel',

                title:
                    'THE WEST BENGAL STATE CO-OP. MARKETING FEDERATION LTD.',

                messageTop:
                    'DISTRICT WISE SOCIETY LIST | Period: <?php echo addslashes($_SESSION["date"] ?? ""); ?>',

                filename:
                    'District_Wise_Society_List',

                exportOptions:{
                    columns:':visible'
                },

                footer:true
            }

        ],

        columnDefs:[

            {
                targets:[
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

                className:'text-center'
            },

            {
                targets:[
                    21,
                    22
                ],

                className:'text-right'
            }

        ],

        language:{

            search:'🔎 Search:',

            info:'Showing _TOTAL_ records',

            infoEmpty:'No records available',

            zeroRecords:'No matching records found'

        },

        footerCallback:function(
            row,
            data,
            start,
            end,
            display
        ){

            

        }

    });

});

</script>