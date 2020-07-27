<div class="wraper">      

    <div class="row">
    
        <form role="form" name="payment_form" method="POST" id="form" action="<?php echo site_url("Disaster/paymentEntry");?>" onsubmit="return validate()" >
        
            <div class="col-md-6 container form-wraper" style="margin-left: 0px;" > 

                <div class="form-header">
                
                    <h4>Bill Collection</h4>
                
                </div>
                
                <div class="form-group row">

                    <label for="dist_cd" class="col-sm-2 col-form-label">District:<font color="red">*</font></label>

                    <div class="col-sm-4">

                        <select type="text" name="dist_cd" class="form-control required" id="dist_cd" >
                            <option value= "0">Select District</option>
                            <?php
                                foreach($dist_data as $key)
                                { 
                                ?>
                                    <option value="<?php echo ($key->district_code); ?>"><?php echo ($key->district_name); ?></option>
                            <?php
                                }
                                ?>

                        </select>
                        <span id= "alert1" ><font color="red">*Please Select District First</font></span>

                    </div>
                    

                    <label for="order_no" class="col-sm-2 col-form-label">Order No:<font color="red">*</font></label>

                    <div class="col-sm-4">

                        <select type="text" name="order_no" class="form-control required" id="order_no" >
                            <option value= "0">Select WO</option>
                            
                        </select>
                        <span id= "alert2" ><font color="red">*Please Select Order No</font></span>

                    </div>
            
                </div>

                <div class="form-group row">

                     <label for="sdo_memo" class="col-sm-2 col-form-label">Memo No:<font color="red">*</font></label>

                    <div class="col-sm-4">

                        <select type="text" name="sdo_memo" class="form-control required" id="sdo_memo" >
                            <option value= "0">Select Memo No</option>
                            
                        </select>
                        <span id= "alert3" ><font color="red">*Please Select Memo No</font></span>

                    </div>
                
                    <label for="bill_no" class="col-sm-2 col-form-label">Bill No:<font color="red">*</font></label>

                    <div class="col-sm-4">

                        <select type="text" name="bill_no" class="form-control required" id="bill_no" >
                            <option value= "0">Select Bill No</option>
                            
                        </select>
                        <span id= "alert4" ><font color="red">*Please Select Bill No</font></span>

                    </div>
                    
                </div>

                <div class="form-group row">

                    <label for="challan_no" class="col-sm-2 col-form-label">Challan No:</label> 
                    <div class="col-sm-4">
                    
                        <textarea name="challan_no" id="challan_no" class="form-control required" ></textarea>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="cnf_qty" class="col-sm-2 col-form-label">Confirmed Qty(Qnt):</label>
                
                    <div class="col-sm-4"> 
                        <input type="text" name="cnf_qty" class="form-control required" id="cnf_qty" >                             
                    </div>

                    <label for="rate" class="col-sm-2 col-form-label">Rate (Per Qnt):</label>
                
                    <div class="col-sm-4"> 
                        <input type="text" name="rate" class="form-control required" id="rate" >                             
                    </div>

                </div>


                <!-- <div class="form-group row">

                    <label for="cnf_dt" class="col-sm-2 col-form-label">Confirmation Date:<font color="red">*</font></label>
                
                    <div class="col-sm-4"> 
                        <input type="date" name="cnf_dt" class="form-control required" id="cnf_dt" required>                             
                    </div>

                    <label for="cnf_memo" class="col-sm-2 col-form-label">Confirmation Memo:<font color="red">*</font></label>
                
                    <div class="col-sm-4"> 
                        <input type="text" name="cnf_memo" class="form-control required" id="cnf_memo" required>                             
                    </div>

                </div> -->

                <div class="form-group row">

                    <label for="part" class="col-sm-2 col-form-label">Bill Partition:<font color="red">*</font></label>
                    
                    <div class="col-sm-4"> 
                        
                        <select type="text" name="part" class="form-control required" id="part" required>
                            <option value= "0">Select Partition</option>
                            <option value= "A">A</option>
                            <option value= "B">B</option>
                            <option value= "B">C</option>
                            <option value= "B">D</option>
                        </select>
                        <span id= "alert5" ><font color="red">*Please Select Memo No</font></span>

                    </div> 
                
                    <label for="tot_amount" class="col-sm-2 col-form-label">Received Amount(Rs):<font color="red">*</font></label>
                
                    <div class="col-sm-4"> 
                        <input type="text" name="tot_amount" class="form-control required" id="tot_amount" required>                             
                    </div>         

                </div>


                <div class="form-header">
                
                    <h4>Payment Details</h4>
                
                </div>
                
                <div class="form-group row">

                    <label for="trans_dt" class="col-sm-2 col-form-label">Date:<font color="red">*</font></label>
                
                    <div class="col-sm-4"> 
                        <input type="date" name="trans_dt" value= "<?php echo date('Y-m-d'); ?>" class="form-control required" id="trans_dt" required>                             
                    </div>  
                    
                    <label for="bank" class="col-sm-2 col-form-label">Bank Name:<font color="red">*</font></label>
                
                    <div class="col-sm-4"> 
                        <input type="text" name="bank" class="form-control required" id="bank" required>                             
                    </div>  

                </div>

                <div class="form-group row">

                    <label for="mode" class="col-sm-2 col-form-label">Payment Mode:<font color="red">*</font></label>
                
                    <div class="col-sm-4"> 
                        
                        <select type="text" name="mode" class="form-control required" id="mode" required>
                            <option value= "0">Select Mode</option>
                            <option value= "Cheque">Cheque</option>
                            <option value= "NEFT/RTGS">NEFT/RTGS</option>
                        </select>
                        <span id= "alert6" ><font color="red">*Please Select Mode</font></span>
                        
                    </div>  
                    
                    <label for="ref_no" class="col-sm-2 col-form-label">Ref No:<font color="red">*</font></label>
                
                    <div class="col-sm-4"> 
                        <input type="text" name="ref_no" class="form-control required" id="ref_no" required>                             
                    </div>  

                </div>

                <div class="form-group row">

                    <label for="payment_dt" class="col-sm-2 col-form-label">Payment Date:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <input type="date" name= "payment_dt" id= "payment_dt" class="form-control required" value= "<?php echo date('Y-m-d'); ?>" required >

                    </div>

                </div>

                <div class="form-group row">

                    <label for="Remarks" class="col-sm-2 col-form-label">Remarks:</label>
                    <div class="col-sm-10">
                        <textarea name="remarks" id="remarks" class="form-control required" cols="30" rows="2"></textarea>
                    </div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Proceed" />

                    </div>

                </div>

            </div>

            <div class="col-md-5 container form-wraper" style="margin-left: 10px; width: 48%;" > 

                <div class="form-header">
                
                    <h4>Confirmation Details</h4>
                
                </div>

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Memo No</th>
                            <th>Confirmed Qty(Qnt)</th>
                        </tr>
                    </thead>

                    <tbody id= "confirmation" >
                    
                    </tbody>
                    
                    <tfoot id= "tot_cnf">
                    
                    </tfoot>

                </table>

            
                <div class="form-header">
                
                    <h4>Collection Details</h4>
                
                </div>

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Payment Mode</th>
                            <th>Bill/Part</th>
                            <th>Amount (Rs)</th>
                        </tr>
                    </thead>

                    <tbody id= "payment" >
                    
                    </tbody>
                    
                    <tfoot id= "tot_rs">
                    
                    </tfoot>

                </table>

            </div>

        </form>
    
    </div>

</div>


<!-- To Check empty Field  -->

<script>

    var dist_cd    =   document.forms["payment_form"]["dist_cd"];
    $("#alert1").hide();
    var order_no    =   document.forms["payment_form"]["order_no"];
    $("#alert2").hide();
    var sdo_memo    =   document.forms["payment_form"]["sdo_memo"];
    $("#alert3").hide();
    var bill_no    =   document.forms["payment_form"]["bill_no"];
    $("#alert4").hide();
    var part        =   document.forms["payment_form"]["part"];
    $("#alert5").hide();
    var mode        =   document.forms["payment_form"]["mode"];
    $("#alert6").hide();
    
    

    function validate()
    {
        //console.log(dist_cd.value);
        //return false;

        if(dist_cd.value == "0")
        {
            dist_cd.style.border = "1px solid red";
            //total.focus();
            $("#alert1").show();

            return false;
        }
        else if(order_no.value == "0")
        {
            order_no.style.border = "1px solid red";            
            $("#alert2").show();            
            return false;
        }
        else if(sdo_memo.value == "0")
        {
            sdo_memo.style.border = "1px solid red";            
            $("#alert3").show();            
            return false;
        }
        else if(bill_no.value == "0")
        {
            bill_no.style.border = "1px solid red";            
            $("#alert4").show();            
            return false;
        }
        else if(part.value == "0")
        {
            bill_no.style.border = "1px solid red";            
            $("#alert5").show();            
            return false;
        }
        else if(mode.value == "0")
        {
            bill_no.style.border = "1px solid red";            
            $("#alert6").show();            
            return false;
        }
        else
        {
            return true;
        }

    }

</script>


<!--  To get order_no / sdo_memo / bill_no   -->

<script>

    $(document).ready(function(){

        // to get order_no as per selected dist_cd --> 

        $('#dist_cd').change(function(){

            $.get( 
                '<?php echo site_url("Disaster/js_get_orderNo_perDist");?>',
                { 
                    dist_cd: $(this).val()
                }
            )
            .done(function(data){

                var string = '<option value="0">Select WO</option>';

                $.each(JSON.parse(data), function( index, value ) {
                    
                    var order_dt = value.order_dt; 
                    var parts = order_dt.split('-');
                    var myOrder_dt = parts[2] + '-' + parts[1] + '-' + parts[0]; // to change date formate

                    string += '<option value="' + value.order_no + '">' + value.order_no + ' DT '+ myOrder_dt +'</option>'
                    
                });
                
                var newElement = '<select class="form-control" name="order_no" id="order_no"> '+ string +' </select>'; 

                $("#order_no").html(newElement);
            });

        });


        // To select sdo_memo as per selected order_no  --> 

        $('#order_no').change(function(){

            $.get( 
                '<?php echo site_url("Disaster/js_get_sdoMemo_perOrder");?>',
                { 
                    order_no: $(this).val(),
                    dist_cd: $('#dist_cd').val()

                }
            )
            .done(function(data){

                var string = '<option value="0">Select Memo No</option>';

                $.each(JSON.parse(data), function( index, value ) {
                    
                    string += '<option value="'+value.sdo_memo+'">'+value.sdo_memo+'</option>'
                    
                });
                
                var newElement = '<select class="form-control" name="order_no" id="order_no"> '+string+' </select>'; 

                $("#sdo_memo").html(newElement);
            });

        });


        // To get bill_no as per selected sdo_memo --> 

        $('#sdo_memo').change(function(){

            $.get( 
                '<?php echo site_url("Disaster/js_get_billNo_perMemo");?>',
                { 
                    sdo_memo: $(this).val(),
                    dist_cd: $('#dist_cd').val(),
                    order_no: $('#order_no').val()

                }

            )
            .done(function(data){

                var string = '<option value="0">Select Bill No</option>';
                //console.log(data);

                $.each(JSON.parse(data), function( index, value ) {
                    
                    string += '<option value="' + value.bill_no + '">' + value.bill_no + '</option>'
                    
                });
                
                var newElement = '<select class="form-control" name="order_no" id="order_no"> '+ string +' </select>'; 

                $("#bill_no").html(newElement);
            });

        }); 


        // To get "challan_no" in comma separated format as per selected bill_no --> 

        $('#bill_no').change(function(){

            $.get( 
                '<?php echo site_url("Disaster/js_get_challanNo_perBill");?>',
                { 
                    
                    dist_cd: $('#dist_cd').val(),
                    order_no: $('#order_no').val(),
                    sdo_memo: $('#sdo_memo').val(),
                    bill_no: $(this).val()

                }
            )
            .done(function(data){
                //console.log(data);

                $.each(JSON.parse(data), function( index, value ) {

                    //console.log(value.challan_no);
                    $("#challan_no").val(value.challan_no);

                });    
                
            });

        }); 

        // To get Confirmed Qty as per selected bill_no 
        $('#bill_no').change(function(){

            $.get( 
                '<?php echo site_url("Disaster/js_get_cnfQty_Rate"); ?>',
                { 

                    dist_cd: $('#dist_cd').val(),
                    order_no: $('#order_no').val(),
                    sdo_memo: $('#sdo_memo').val(),
                    bill_no: $(this).val()
                    
                }
            )
            .done(function(data){
                //console.log(data);

                $.each(JSON.parse(data), function( index, value ) {
                    
                    //console.log(value.cnf_qty);
                    //console.log(value.rate);

                    $('#cnf_qty').val(value.cnf_qty);                    
                    $('#rate').val(value.rate);

                });

            });

        });

        
    });

</script>


<!-- To get previous confirmation details for the same bill no.  -->
<script>

    $(document).ready(function(){

        $('#bill_no').change(function(){
            
                var    bill_no = $(this).val();
                var    dist_cd = $('#dist_cd').val();
                var    order_no= $('#order_no').val();
                var    sdo_memo= $('#sdo_memo').val();

            $.get( '<?php echo site_url("Disaster/js_get_previous_cnfDtls"); ?>',
                { 
                    bill_no: $(this).val(),
                    dist_cd : $('#dist_cd').val(),
                    order_no: $('#order_no').val(),
                    sdo_memo: $('#sdo_memo').val()
                }
            )
            .done(function(data) {

                //console.log(data);
                var cnfDtls = JSON.parse(data);
                //console.log(cnfDtls);

                var tot_cnfQty = 0;

                for(var key in cnfDtls) 
                {
                    var value = cnfDtls[key];

                    var dummy = value.cnf_qty * 1;
                    tot_cnfQty = tot_cnfQty + dummy;

                    var date = value.cnf_dt.split('-');
                    //console.log(tot_cnfQty.toFixed(6));
                    var body_eliment = ' <tr>'+'<td>'+date[2]+'-'+date[1]+'-'+date[0]+'</td>'+'<td>'+value.cnf_memo+'</td>'+'<td>'+value.cnf_qty+'</td>'+'</tr>';
                    
                    $("#confirmation").append($(body_eliment));

                }

                //console.log(tot_cnfQty);
                var footer_element = '<tr><td colspan="2"><strong>TOTAL</strong></td><td colspan="2"><strong>'+tot_cnfQty.toFixed(6)+'</strong></td></tr>'
                $("#tot_cnf").append($(footer_element));

            });

        });

    });

</script>


<!-- To get previous payment details for the same bill no.  -->
<script>

    $(document).ready(function(){

        $('#bill_no').change(function(){
            
            var    bill_no = $(this).val();
            var    dist_cd = $('#dist_cd').val();
            var    order_no= $('#order_no').val();
            var    sdo_memo= $('#sdo_memo').val();

            console.log(bill_no);
            console.log(dist_cd);
            console.log(order_no);
            console.log(sdo_memo);

            $.get( '<?php echo site_url("Disaster/js_get_previous_paymentDtls"); ?>',
                { 
                    bill_no: $(this).val(),
                    dist_cd : $('#dist_cd').val(),
                    order_no: $('#order_no').val(),
                    sdo_memo: $('#sdo_memo').val()
                }
            )
            .done(function(data) {

                console.log(data);
                var cnfDtls = JSON.parse(data);
                //console.log(cnfDtls);

                var tot_cnfQty = 0;

                for(var key in cnfDtls) 
                {
                    var value = cnfDtls[key];

                    var dummy = value.amount * 1;
                    tot_cnfQty = tot_cnfQty + dummy;

                    var date = value.payment_dt.split('-');
                    //console.log(tot_cnfQty.toFixed(6));
                    var body_eliment = ' <tr>'+'<td>'+date[2]+'-'+date[1]+'-'+date[0]+'</td>'+'<td>'+value.trans_mode+'</td>'+'<td>'+bill_no+' / '+value.part+'</td>'+'<td>'+value.amount+'</td>'+'</tr>';
                    
                    $("#payment").append($(body_eliment));

                }

                //console.log(tot_cnfQty);
                var footer_element = '<tr><td colspan="3"><strong>TOTAL</strong></td><td colspan="2"><strong>'+tot_cnfQty.toFixed(2)+'</strong></td></tr>'
                $("#tot_rs").append($(footer_element));

            });

        });

    });

</script>

