<style>
    table {
        border-collapse: collapse;
    }

    table,
    td,
    th {
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
        setTimeout(function() {
            WindowObject.close();
        }, 10);

    }

    function printadvDiv() {
        var divToPrint = document.getElementById('divadvToPrint');
        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title><style type="text/css">');

        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
                                                     ' .headeraddress { font-weight: normal;}' +
                                                     ' .headertitle { font-weight: bold;font-size: 22px;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 0px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 0px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function() {
            WindowObject.close();
        }, 10);
    }
</script>

<div class="wraper">

    <div class="col-lg-12 container contant-wraper">

        <div id="divToPrint">

            <div style="text-align:center;">

                <h4>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h4>
                <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                <h3>Advance Forward Detail for Fertilizer Between:<?php echo  date("d/m/Y", strtotime($fDate)) . ' To ' . date("d/m/Y", strtotime($tDate)) ?></h3>
                <?php


    if ($tableData) {

    $totalnetamth = 0;
    $totalTdsh = 0;
    
    }
    ?>

                 <h5 style="text-align:left"><label><?php //echo $companyName; ?>:</label> &ensp;&ensp;</h5>
              <!--  <?php //echo round($total_Voucher->adv_amt, 2); ?> DR</h5>
                <h5 style="text-align:left"><label><?php foreach ($tableData as $bnk) {
                                                        echo $bnk->bnk;
                                                        break;
                                                    }; ?>:</label> &ensp;&ensp;<?php echo round($totalnetamth); ?> CR</h5>
                <h5 style="text-align:left"><label>TDS U/S 194Q:</label> &ensp;&ensp;<?php echo round($totalTdsh); ?> CR </h5> -->

            </div>
            <br>

            <table style="width: 100%;" id="example">

                <thead>

                    <tr>

                        <th>Sl No.</th>
                        <th>Date</th>
                        <th>Date Time</th>
                        <th></th>
                        <th>Branch Name.</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Ro No</th>
                        <th>Fo No</th>
                        <th>Amount</th>
                        <th>TDS</th>
                        <th>NET Amount</th>

                    </tr>

                </thead>

                <tbody>

                    <?php


                    if ($tableData) {

                        $i = 1;
                        $total = 0;
                        $totalnetamt = 0;
                        $totalTds = 0;
                        foreach ($tableData as $ptableData) {
                            // $total=($ptableData->adv_amt+$total);
                            $total += $ptableData->adv_amt;
                        ?>

                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($ptableData->trans_dt)); ?></td>
                                <td><?php if($ptableData->created_at !=NULL) echo date("Y-m-d H:i:s", strtotime($ptableData->created_at)); ?></td>
                                <td><?php echo $ptableData->fwd_receipt_no; ?></td>
                                <td><?php echo $ptableData->branch_name; ?></td>
                                <td><?php echo $ptableData->PROD_DESC; ?></td>
                                <td><?= $ptableData->qty; ?></td>
                                <td><?php echo $ptableData->ro_no; ?></td>
                                <td><?php echo $ptableData->fo_number . '-' . $ptableData->fo_name; ?></td>
                                <td><?php echo $ptableData->adv_amt; ?></td>
                                <td><?php 
                                echo round((0.001 * $ptableData->adv_amt),2);
                                $tds = round((0.001 * $ptableData->adv_amt),2);
                                    $totalTds = $totalTds + $tds; ?></td>
                                <td><?php $netamt =round(($ptableData->adv_amt - $tds),2);
                                    echo $netamt;
                                    $totalnetamt = $totalnetamt + $netamt; ?></td>
                            </tr>

                        <?php    } ?>

                        <tr>
                            <td colspan="9"><b>Total</b></td>
                            <td><b><?php echo round($total, 2); ?></b></td>
                            <td><b><?php echo $totalTds; ?></b></td>
                            <td><b><?php echo $totalnetamt; ?></b></td>
                        </tr>
                    <?php
                    } else {

                        echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";
                    }

                    ?>

                </tbody>

            </table>

           

            
            <table style="margin-top: 100px; border:none;" id="example" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody style="border:none;">
                    <tr style="border:none;">

                        <td style="border:none;">Prepared By</td>
                        <td style="border:none;">Asst Manager/Dy. Manager</td>
                        <td style="border:none;">Departmental Manager(S)</td>
                        <td style="border:none;">CA&amp;AO</td>
                        <td style="border:none;">General Manager</td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div style="text-align: center;">

            <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
            <!-- <button class="btn btn-primary" type="button" onclick="printadvDiv();">Print Advice</button> -->
          

        </div>

    </div>

</div>


<div id="divadvToPrint"   style="display:none">
        
         

            <table style="width: 100%; background-color: #D5D5D5;" id="example">

            </table>
            <table style="margin-top: 100px; border:none;font-weight:bold" id="example" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody style="border:none;">
                    <tr style="border:none;">
                    <?php    if($sig == 1){    ?>
                        <td style="border:none;"></td>
                        <td style="border:none;">Manager (Audit & Accounts)</td>
                        <td style="border:none;"></td>
                        <td style="border:none;">Chief Audit & Accounts Officer</td>
                    <?php }elseif($sig == 2){ ?> 
                        <td style="border:none;"></td>
                        <td style="border:none;">Manager (Audit & Accounts)</td>
                        <td style="border:none;"></td>
                        <td style="border:none;">General Manager(Administration)</td>   
                        <?php }elseif($sig == 3){ ?> 
                        <td style="border:none;"></td>
                        <td style="border:none;">Chief Audit & Accounts Officer</td>
                        <td style="border:none;"></td>
                        <td style="border:none;">General Manager(Administration)</td>
                        <?php }elseif($sig == 4){ ?>
                        <td style="border:none;"></td>
                        <td style="border:none;">Manager Accounts</td>
                        <td style="border:none;"></td>
                        <td style="border:none;">Deputy Manager Accounts</td>
                        <?php }elseif($sig == 5){ ?>
                        <td style="border:none;"></td>
                        <td style="border:none;">Dy. Manager (Accounts)</td>
                        <td style="border:none;"></td>
                        <td style="border:none;">Chief Audit & Accounts Officer</td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <table style="margin-top:0px; border:none;font-weight:bold" id="example" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody style="border:none;">
                    <tr style="border:none;">
                        <td style="border:none;">Encl:Cheque bearing No:</td>
                        <td style="border:none;"></td>
                        <td style="border:none;">Dated:<?=date('d/m/Y')?></td>
                        <td style="border:none;"></td>
                    </tr>
                </tbody>
            </table>

        </div>

<script type="text/javascript">
    /*$(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Cheque status for <?php echo get_district_name($this->input->post("branch_id")) ?> branch for paddy procurement between Block Societywise Paddy Procurement Between <?php echo date("d-m-Y", strtotime($this->input->post('from_date'))) . ' To ' . date("d-m-Y", strtotime($this->input->post('to_date'))); ?>.xls"
                });
            });
        });*/
</script>