
<div class="wraper">      

    <div class="col-md-7 container form-wraper">
    
        <form role="form" name="payment_form" method="POST" id="form" action="<?php echo site_url("Disaster/vendorPayment_entry");?>" onsubmit="return validate()" >
        
            
            <div class="form-header">
            
                <h4>Vendor Payment</h4>
            
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
                
                <label for="bill_no" class="col-sm-2 col-form-label">Bill No:</label>
                
                <div class="col-sm-4"> 
                    <select type="text" name="bill_no" class="form-control required" id="bill_no" >
                        <option value= "0">Select Bill</option>
                    </select>
                </div>
                <span id= "alert3" ><font color="red">*Please Select Bill First</font></span>

                <label for="qty" class="col-sm-2 col-form-label">Quantity (Qnt):</label>
            
                <div class="col-sm-4"> 
                    <input type="text" name="qty" class="form-control required" id="qty" readonly>                             
                </div>

            </div>

            <div class="form-group row">

                <label for="rate" class="col-sm-2 col-form-label">Rate (Per Qnt):</label>
            
                <div class="col-sm-4"> 
                    <input type="text" name="rate" class="form-control required" id="rate" >                             
                </div>
                <span id= "alert4" ><font color="red">*Please Select Rate First</font></span>                

                <label for="price" class="col-sm-2 col-form-label">Price (Rs):</label>
            
                <div class="col-sm-4"> 
                    <input type="text" name="price" class="form-control required" id="price" >                             
                </div>

            </div>

            <div class="form-group row">

                <label for="cgst" class="col-sm-2 col-form-label">CGST (Rs):</label>
            
                <div class="col-sm-4"> 
                    <input type="text" name="cgst" value= "00.00" class="form-control required" id="cgst" >                             
                </div>
                <span id= "alert5" ><font color="red">*Please Select CGST First</font></span>                

                <label for="sgst" class="col-sm-2 col-form-label">SGST (Rs):</label>
            
                <div class="col-sm-4"> 
                    <input type="text" name="sgst" value= "00.00" class="form-control required" id="sgst" >                             
                </div>
                <span id= "alert6" ><font color="red">*Please Select SGST First</font></span>                

            </div>

            <div class="form-group row">

                <label for="commission" class="col-sm-2 col-form-label">Commission (Rs.):</label>
            
                <div class="col-sm-4"> 
                    <input type="text" name="commission" value= "00.00" class="form-control required" id="commission" >                             
                </div>
                
                <label for="amount" class="col-sm-2 col-form-label">Total (Rs):</label>
            
                <div class="col-sm-4"> 
                    <input type="text" name="amount" value= "00.00" class="form-control required" id="amount" >                             
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
                    <span id= "alert7" ><font color="red">*Please Select Mode</font></span>
                    
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

                <label for="vendor" class="col-sm-2 col-form-label">Paying To:<font color="red">*</font></label>
                <div class="col-sm-4">

                    <input type="text" name= "vendor" id= "vendor" class="form-control required" required >

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

    
        </form>
    
    </div>

</div>


<!-- To Check empty Field  -->
<script>

    var dist_cd    =   document.forms["payment_form"]["dist_cd"];
    $("#alert1").hide();
    var order_no    =   document.forms["payment_form"]["order_no"];
    $("#alert2").hide();
    var bill_no    =   document.forms["payment_form"]["bill_no"];
    $("#alert3").hide();
    var rate        =   document.forms["payment_form"]["rate"];
    $("#alert4").hide();
    var cgst        =   document.forms["payment_form"]["cgst"];
    $("#alert5").hide();
    var sgst        =   document.forms["payment_form"]["sgst"];
    $("#alert6").hide();
    var mode        =   document.forms["payment_form"]["mode"];
    $("#alert7").hide();
    

    function validate()
    {
        console.log(cgst.value);
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
        else if(bill_no.value == "0")
        {
            bill_no.style.border = "1px solid red";            
            $("#alert3").show();            
            return false;
        }
        else if(rate.value == '')
        {
            rate.style.border = "1px solid red";            
            $("#alert4").show();            
            return false;
        }
        else if(cgst.value == '')
        {
            cgst.style.border = "1px solid red";            
            $("#alert5").show();            
            return false;
        }
        else if(sgst.value == '')
        {
            sgst.style.border = "1px solid red";            
            $("#alert6").show();            
            return false;
        }
        else if(mode.value == "0")
        {
            mode.style.border = "1px solid red";            
            $("#alert7").show();            
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


        // To get bill_no as per selected sdo_memo --> 

        $('#order_no').change(function(){

            $.get( 
                '<?php echo site_url("Disaster/js_get_billNo_for_vendorPay");?>',
                { 
                    dist_cd: $('#dist_cd').val(),
                    order_no: $(this).val()

                }

            )
            .done(function(data){

                var string = '<option value="0">Select Bill No</option>';
                //console.log(data);

                $.each(JSON.parse(data), function( index, value ) {
                    
                    var del_dt = value.del_dt; 
                    var parts = del_dt.split('-');
                    var myDel_dt = parts[2] + '-' + parts[1] + '-' + parts[0];

                    string += '<option value="'+ value.bill_no + '">'+ value.bill_no+' DT '+myDel_dt+'</option>'
                    
                });
                
                var newElement = '<select class="form-control" name="order_no" id="order_no"> '+ string +' </select>'; 

                $("#bill_no").html(newElement);
            });

        }); 


        // To get Qty as per selected bill_no 
        $('#bill_no').change(function(){

            $.get( 
                '<?php echo site_url("Disaster/js_get_Qty_for_vendorPay"); ?>',
                { 

                    dist_cd: $('#dist_cd').val(),
                    order_no: $('#order_no').val(),
                    bill_no: $(this).val()
                    
                }
            )
            .done(function(data){
                //console.log(data);

                $.each(JSON.parse(data), function( index, value ) {
                    
                    
                    $('#qty').val(value.tot_qty);                    
                    //$('#rate').val(value.rate);

                });

            });

        });

        
    });

</script>


<!-- To get Price after giving the rate amount  -->
<script>

    $(document).ready(function()
    {

        $('#rate').change(function()
        {

            var rate = $(this).val();
            var qty = $('#qty').val();

            var price = parseFloat(rate) * parseFloat(qty);
            //console.log(price.toFixed(2));
            $('#price').val(price.toFixed(2));

        });
    });

</script>
