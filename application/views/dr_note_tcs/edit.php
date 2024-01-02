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
    </style>
    <script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');
        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title><style type="text/css">');


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
    <div class="wraper">
    <div class="col-md-2 container"></div>
    <div class="col-md-8 container form-wraper" id="divToPrint">

        <form method="POST" action="<?php //echo site_url("drcrnote/drnoteAdd_tcs") ?>" onsubmit="return valid_data()"
            id="form">

            <div class="form-header">

                <h4>Add Dr Note Tax Collection Source(TCS)</h4>

            </div>

            <div class="form-group row">

                <label for="ro_no" class="col-sm-2 col-form-label">Society:</label>
                <div class="col-sm-4">

                    <select name="soc_id" id="soc_id" class="form-control sch_cd soc_id" disabled>
                        <option value="">Select Society</option>
                        <?php
                            foreach($socdtls as $key1)
                            { ?>
                        <option value="<?php echo $key1->soc_id; ?>" <?php if($key1->soc_id == $tcs->soc_id) echo 'selected'; ?>><?php echo $key1->soc_name; ?></option>
                        <?php
                            } ?>
                    </select>

                </div>

            </div>
            <div>
            </div>
            <div class="form-group row">

                <label for="frm_date" class="col-sm-2 col-form-label">From Date:</label>

                <div class="col-sm-4">
                    <input type="date" id="frm_date" min="" name="frm_date" value="<?=$tcs->frm_date?>"
                        class="form-control mindate" readonly />
                </div>

                <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>
                <div class="col-sm-4">
                    <input type="date" id="to_date" min="" name="to_date" value="<?=$tcs->to_date?>"
                        class="form-control mindate" readonly />
                </div>
        
            </div>


            <div class="form-group row">

                <label for="dr_amt" class="col-sm-2 col-form-label">Amount:</label>
                <div class="col-sm-4">
                <input type="text" name="tot_amt" id="tot_amt"  class="form-control amt" value="<?=$tcs->tot_amt?>" readonly>
                </div>
               
            </div>
            <div class="form-group row">

            <label for="dr_amt" class="col-sm-2 col-form-label">Remarks:</label>

            <div class="col-sm-10">
                <textarea id="remarks" name="remarks" class="form-control" readonly ><?=$tcs->remarks?></textarea>

            </div>
            </div>
        </form>
    </div>
       
    <div class="form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
        </div>
    </div>

</div>
<div id="overlay" style="display:none;">
        <div class="spinner"></div>
    </div>
</div>


<script>
   
    $(".sch_cd").select2();
</script>
<script>
    $('.mindate').attr( 'min','<?=$date->end_yr ?>-<?php $month=$date->end_mnth+1; if($month==13){echo sprintf("%02d",1);}else{echo sprintf("%02d",$month);}?>-01');
</script>

