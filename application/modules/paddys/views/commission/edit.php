<div class="wraper">      

    <div class="col-md-12 container form-wraper" style="margin-left: 0px;">

        <form method="POST" 
            id="form"
            action="<?php echo site_url("payment/commission/edit");?>" >

            <div class="form-header">
            
                <h4>Commission Edit</h4>
            
            </div>

            <input type="hidden" name="trans_cd" value="<?php echo $this->input->get('trans_cd'); ?>">

             <div class="form-group row">

                <label for="block" class="col-sm-2 col-form-label">Block:</label>

                <div class="col-sm-4">

                    <select name="block" id="block" class="form-control" required>

                        <option value="">Select</option>    
                        <?php

                            foreach($blocks as $block){

                        ?>
                        <option value="<?php echo $block->blockcode;?>"   <?php if($block->blockcode==$bill_dtl->block_id) {echo "selected"; }?>><?php echo $block->block_name;?></option>    
                         <?php

                            }

                        ?>     

                    </select>

                </div>

                <label for="dist" class="col-sm-2 col-form-label">Payment Date:</label>

                 <div class="col-sm-4">

                    <input type="date"
                            class="form-control" required
                            name="trans_dt"
                            id="trans_dt"
                            value="<?php echo date('Y-m-d');?>" />

                </div>

                
   
            </div>
           
            <div class="form-group row">

                <label for="soc_name" class="col-sm-2 col-form-label">Society Name:</label>

                <div class="col-sm-4">

                    <select type="text"
                        class="form-control sch_cd" required
                        name="soc_name"
                        id="soc_name">

                        <option value="">Select</option>    

                        <option value="">Select Block First</option>    

                    </select>    

                </div>
              <label for="soc_name" class="col-sm-2 col-form-label">Rice Mill:</label>
              
               <div class="col-sm-4">
                 <select type="text" class="form-control" name="mill_id" id="mill_id" required>    
                            <option value="">Select</option>    
                        </select>    

                    </div>

               

            </div>
            <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Agreement No.:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="aggrement_no"
                            id="aggrement_no" readonly
                            value="<?=$bill_dtl->aggrement_no?>"
                            />

                </div>

              

                <label for="pool_type" class="col-sm-2 col-form-label">Work Order:</label>

                <div class="col-sm-4">

                       <input type="text"
                              class="form-control" required
                              name="work_order_no"
                              id="work_order_no"
                              value="<?=$bill_dtl->work_order_no?>"
                              /> 

                </div>

            </div>

            <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Soc Bill No.:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="soc_bill_no"
                            id="soc_bill_no"
                            value="<?=$bill_dtl->soc_bill_no?>"
                        />

                </div>

                <label for="pool_type" class="col-sm-2 col-form-label">Soc Bill Date:</label>

                <div class="col-sm-4">

                       <input type="date"
                              class="form-control" required
                              name="soc_bill_date"
                              id="soc_bill_date" value="<?php echo date('Y-m-d');?>"
                              value="<?=$bill_dtl->soc_bill_date?>"
                        /> 

                </div>

            </div>

            <div class="form-group row">

            
                <label for="pool_type" class="col-sm-2 col-form-label">Pool Type:</label>

                <div class="col-sm-4">

                    <select class="form-control" required
                            name="pool_type" id="pool_type">

                        <option value="">Select</option>

                        <option value="S" <?php if($bill_dtl->pool_type=="S"){
                            echo "selected";
                        }?> >State Pool</option>

                        <option value="C" <?php if($bill_dtl->pool_type=="C"){
                            echo "selected";
                        }?> >Central Pool</option>

                    </select>    

                </div>
                 <label for="pool_type" class="col-sm-2 col-form-label">Rice Type:</label>

                <div class="col-sm-4">

                    <select class="form-control" required
                            name="rice_type" id="rice_type">

                        <option value="">Select</option>

                        <option value="P" <?php if($bill_dtl->rice_type=="P"){
                            echo "selected";
                        }?>>Boiled Rice</option>

                        <option value="R" <?php if($bill_dtl->rice_type=="R"){
                            echo "selected";
                        }?>>Raw Rice</option>

                    </select>    

                </div>

            </div>

             <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Rate:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" 
                            name="rate" readonly
                            id="rate" 
                            value="<?=$bill_dtl->rate?>"
                            />

                </div>

                <label for="totPaddy" class="col-sm-2 col-form-label">Total Paddy:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="qty"
                            id="qty"
                            value="<?=$bill_dtl->qty?>"
                        />

                </div>
            </div>

                 <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Amount Claimed:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="amount_claimed"
                            id="amount_claimed" 
                            value="<?=$bill_dtl->amount_claimed?>"
                            />

                </div>

                 <label for="totPaddy" class="col-sm-2 col-form-label">Amount :</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="tot_amt" 
                            id="tot_amt" 
                            value="<?=$bill_dtl->tot_amt?>"
                            />

                </div>

            </div>

             <!-- <div class="form-group row">

                  <label for="totPaddy" class="col-sm-2 col-form-label">CGST:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" 
                            name="cgst_amt"
                            id="cgst_amt" />

                </div>

                  <label for="totPaddy" class="col-sm-2 col-form-label">SGST:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" 
                            name="sgst_amt"
                            id="sgst_amt" />

                </div>

            </div> -->

                <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">TDS Amount:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="tds_amt"
                            id="tds_amt"
                            value="<?=$bill_dtl->tds_amt?>"
                             />

                </div>

                   <label for="totPaddy" class="col-sm-2 col-form-label">Paid Amount:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="paid_amt"
                            id="paid_amt"
                            value="<?=$bill_dtl->paid_amt?>"
                             />
                </div>

            </div>

            <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Payment Mode:</label>

                <div class="col-sm-4">

                     <select class="form-control" required
                            name="pay_mode" id="pay_mode">

                        <option value="">Select</option>
                        <option value="CHEQUE" <?php if($bill_dtl->pay_mode=="CHEQUE"){
                            echo "selected";
                        }?>>Cheque</option>
                        <option value="RTGS" <?php if($bill_dtl->pay_mode=="RTGS"){
                            echo "selected";
                        }?>>RTGS</option>
                        <option value="NEFT" <?php if($bill_dtl->pay_mode=="NEFT"){
                            echo "selected";
                        }?>>NEFT</option>

                    </select>  

                </div>

                 <label for="totPaddy" class="col-sm-2 col-form-label">Reference No:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="ref_no"
                            id="ref_no"
                            value="<?=$bill_dtl->ref_no?>"
                             />
                </div>

            </div>

            <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Remarks:</label>

                <div class="col-sm-10">

                    <textarea name="remarks" id="remarks" 
                   
                    class="form-control"> <?=$bill_dtl->remarks?></textarea>
                    
                </div>

            </div>
 
            <div class="form-group row">

                <div class="col-sm-5">

                    <input type="submit" class="btn btn-info" value="Save" />

                </div>

            </div>

        </form>

    </div>

</div>

<script>

    $(document).ready(function(){

        var global_block = '<?php echo $bill_dtl->block_id;?>';

            global_soc  = '<?php echo $bill_dtl->soc_id;?>';

            function socGroup(block) { 

                //For Block wise Society
                $.get( 

                    '<?php echo site_url("paddy/societies");?>',

                    { 

                        block: block

                    }

                    ).done(function(data){

                    var string = '<option value="">Select</option>',
                        selected = '';

                    $.each(JSON.parse(data), function( index, value ) {

                        if(value.sl_no == '<?php echo $bill_dtl->soc_id; ?>'){
                            
                            selected = 'selected';

                        }else{

                            selected = '';

                        }

                        string += '<option value="' + value.sl_no + '"'+ selected +'>' + value.soc_name + '</option>'

                    });

                    $('#soc_name').html(string);

                });

            }

            function millGroup(soc) { 

                //For Block wise Society
                $.get( 

                    '<?php echo site_url("payment/connected_mill");?>',

                    { 

                        soc_name: soc

                    }

                    ).done(function(data){

                    var string = '<option value="">Select</option>',
                        selected = '';

                    $.each(JSON.parse(data), function( index, value ) {

                        if(value.mill_id == '<?php echo $bill_dtl->mill_id; ?>'){
                            
                            selected = 'selected';

                        }else{

                            selected = '';

                        }

                        string += '<option value="' + value.mill_id + '"'+ selected +'>' + value.mill_name + '</option>'

                    });

                    $('#mill_id').html(string);

                });

            }


        socGroup('<?php echo $bill_dtl->block_id;?>');
        millGroup('<?php echo $bill_dtl->soc_id;?>');

        $('#block').change(function(){
            
            socGroup($(this).val());

        });

        $('#soc_name').change(function(){
            
            millGroup($(this).val());

        });

    });

</script>

<script>

    $('#mill_id').change(function(){

            $.get( 

                '<?php echo site_url("payment/get_aggrementno");?>',

                { 

                    mill_id : $(this).val(),
                    soc_id: $('#soc_name').val()

                }

            ).done(function(data){

                let values = JSON.parse(data);

                $('#aggrement_no').val(values.reg_no);

            });

    });

    $('#rice_type').change(function(){

            $.get( 

                '<?php echo site_url("payment/commision_rate");?>',

                { 

                    rice_type : $(this).val(),
            
                }

            ).done(function(data){

                let values = JSON.parse(data);

                 $('#rate').val("");
                $('#rate').val(values.rate);

            });

    });

     $('#qty').change(function(){

              var amount = 0;
              var tds = 0;
             var qty = $(this).val();
             var rate = parseFloat($('#rate').val());

             amount = parseFloat(qty*rate);
       
             tds =  parseFloat(((qty*rate)*5)/100).toFixed();

              $('#tds_amt').val(tds);

              $('#amount_claimed').val(amount.toFixed(2));

               var round_amount= Math.round(amount);

              $('#tot_amt').val(round_amount);

              $('#paid_amt').val(round_amount-tds);

          
          })

</script>