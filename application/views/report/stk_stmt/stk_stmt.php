<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

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
    tr:hover {
        background-color: #f5f5f5;
    }

    /* Hide DataTables buttons only in print */
    @media print {
        .dt-buttons,
        .print-btn,
        .pdf-btn {
            display: none !important;
            visibility: hidden !important;
        }
    }

    /* DataTables sorting icons: bigger and colorful */
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after {
        font-family: "FontAwesome";
        font-size: 16px; /* icon size */
        color: #ff5722;  /* default orange color */
        opacity: 1;
        margin-left: 5px;
    }
    table.dataTable thead .sorting_asc:after {
        color: #4caf50; /* green ascending */
    }
    table.dataTable thead .sorting_desc:after {
        color: #f44336; /* red descending */
    }
    table.dataTable thead th {
        cursor: pointer;
    }
</style>

<div class="wraper">
    <div class="col-lg-12 container contant-wraper">
        <div id="divToPrint">

            <div style="text-align:center;">
                <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                <h4>Ledger Name: <?=$accdetail->ac_name?></h4>
                <h4>Ledger Code: <?=$accdetail->benfed_ac_code?></h4>
                <h4>Account Detail: <?php echo $_SESSION['date']; ?></h4>
                <h5 style="text-align:left"><label>District: </label>
                    <?php echo $this->session->userdata['loggedin']['branch_name']; ?></h5>
            </div>
            <br>

            <table id="example" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th rowspan='2' style="width:90px !important">Date</th>
                        <th rowspan='2'>Particulars</th>
                        <th rowspan='2'>Voucher Type</th>
                        <th rowspan='2'>Narration</th>
                        <th rowspan='2'>Voucher No</th>
                        <th rowspan='2'>Ref. No.</th>
                        <th rowspan='2'>Invoice No.</th>
                        <th colspan='2'>Transaction</th>
                    </tr>
                    <tr>
                        <th>Debit</th>
                        <th>Credit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($accdetail){
                        $tot_debit = 0.00;
                        $tot_cre =0.00;
                        $ope_bal = 0.00;
                        if($opebalcal){
                            $opdr =$opebalcal->dr_amt;
                            $opcr =$opebalcal->cr_amt;
                            if($opebalcal->type == 1 ){
                               $ope_bal = $ope_bal+$opcr-$opdr;
                            } else if($opebalcal->type == 2 ){
                               $ope_bal = $ope_bal+$opdr-$opcr;
                            } else if( $opebalcal->type ==3|| $opebalcal->type == 4){
                                $ope_bal=0.00;
                            }
                        } ?>
                        <tr>
                            <td></td>
                            <td>Opening Balance</td>
                            <td></td><td></td><td></td><td></td><td></td>
                            <td><?php if($opebalcal){ if($opebalcal->trans_flag=='DR'){ echo abs($ope_bal); } }?></td>
                            <td><?php if($opebalcal){ if($opebalcal->trans_flag=='CR'){ echo abs($ope_bal); } }?></td>
                        </tr>

                        <?php foreach($trail_balnce as $tb){ ?>
                        <tr class="rep">
                            <td><?php echo date('d-m-Y',strtotime($tb->voucher_date)); ?></td>
                            <td><?php echo $tb->ac_name; ?></td>
                            <td><?php if($tb->voucher_mode == 'C'){echo 'Cash'; } 
                                elseif($tb->voucher_mode == 'J'){ echo 'Journal'; }
                                elseif($tb->voucher_mode == 'B'){ echo 'Bank'; }
                            ?></td>
                            <td style="width:30%;word-wrap: break-word"><?php echo $tb->remarks; ?></td>
                            <td><a href="javascript:void(0)" onclick="voucherdtls('<?php echo $tb->voucher_id; ?>')"><?php echo $tb->voucher_id; ?></a></td>
                            <td><?php if(!empty($tb->trans_no)){echo $tb->trans_no;} ?></td>
                            <td><?php foreach($inv_detail as $inv) {
                                if(!empty($tb->trans_no)){
                                    if($tb->trans_no == $inv->ro_no){ echo $inv->invoice_no; }
                                }
                            } ?></td>
                            <td align="right" style="width:90px !important"><?php echo number_format( $tb->dr_amt,2, '.', ''); $tot_debit +=$tb->dr_amt; ?></td>
                            <td align="right"><?php echo  number_format($tb->cr_amt,2, '.', ''); $tot_cre +=$tb->cr_amt;?></td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <th>Total</th>
                            <th colspan="6"></th>
                            <th align="right"><?=$tot_debit?></th>
                            <th align="right"><?=$tot_cre?></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

        <div style="text-align: center; margin-top:15px;">
            <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
            <button class="btn btn-danger pdf-btn" type="button" onclick="savePDF();">Save as PDF</button>
        </div>
    </div>
</div>

<!-- DataTables & Buttons -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<!-- jsPDF + jsPDF-AutoTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.27/jspdf.plugin.autotable.min.js"></script>

<script>
    // Initialize DataTable
    $('#example').dataTable({
        destroy: true,
        searching: false,
        ordering: true, // Enable sorting to see icons
        paging: false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Accounts Details',
                text: 'Export to excel'
            }
        ]
    });

    // Print function
    function printDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title>Account Details</title><style>');
        WindowObject.document.writeln(
            'table { border-collapse: collapse; }'+
            'table, td, th { border: 1px solid #dddddd; padding: 6px; font-size: 14px; }'+
            'th { text-align: center; }'+
            '.dt-buttons, .print-btn, .pdf-btn { display: none !important; visibility: hidden !important; }'+
            'body { padding:0; margin:0; }'
        );
        WindowObject.document.writeln('</style></head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
    }

    // PDF generation using jsPDF + AutoTable
    function savePDF() {
        const { jsPDF } = window.jspdf;
        var doc = new jsPDF('l', 'pt', 'a4'); // landscape
        doc.setFontSize(10);
        
        // Header
        doc.text("THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.", 40, 40);
        doc.text("HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.", 40, 55);
        doc.text("Ledger Name: <?=$accdetail->ac_name?>", 40, 70);
        doc.text("Ledger Code: <?=$accdetail->benfed_ac_code?>", 40, 85);
        doc.text("Account Detail: <?php echo $_SESSION['date']; ?>", 40, 100);
        doc.text("District: <?php echo $this->session->userdata['loggedin']['branch_name']; ?>", 40, 115);

        doc.autoTable({
            html: '#example',
            startY: 130,
            theme: 'grid',
            styles: { fontSize: 8, overflow: 'linebreak' },
            headStyles: { fillColor: [52, 73, 94], textColor: 255 },
            footStyles: { fillColor: [52, 73, 94], textColor: 255 },
            margin: { left: 20, right: 20 },
            columnStyles: {
                0: { cellWidth: 60 },   // Date
                1: { cellWidth: 120 },  // Particulars
                2: { cellWidth: 60 },   // Voucher Type
                3: { cellWidth: 180 },  // Narration
                4: { cellWidth: 60 },   // Voucher No
                5: { cellWidth: 60 },   // Ref No
                6: { cellWidth: 60 },   // Invoice No
                7: { cellWidth: 'auto', halign: 'right', fontSize: 7 },  // Debit
                8: { cellWidth: 'auto', halign: 'right', fontSize: 7 }   // Credit
            },
            didDrawPage: function (data) {
                var pageCount = doc.getNumberOfPages();
                doc.setFontSize(8);
                doc.text('Page ' + pageCount, data.settings.margin.left, doc.internal.pageSize.height - 10);
            }
        });

        doc.save('Account_Details.pdf');
    }

    // Voucher details popup
    function voucherdtls(vid){
        window.open("<?php echo site_url('report/voucher_dtls?voucher_id=');?>"+vid, '_blank');
    }
</script>
