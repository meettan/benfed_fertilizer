<div class="wraper">      

    <div class="col-md-12 container form-wraper" style="margin-left: 0px;">

        <form method="POST" id="form"
            action="<?php echo site_url("payment/commission/add");?>" >

            <div class="form-header">

                <h4>Commission Entry</h4>
            
            </div>

            <div class="form-group row">

                

                <label for="block" class="col-sm-2 col-form-label">Block:</label>

                <div class="col-sm-4">

                    <select name="block" id="block" class="form-control" required>

                        <option value="">Select</option>    
                        <?php

                            foreach($blocks as $block){

                        ?>
                        <option value="<?php echo $block->blockcode;?>"><?php echo $block->block_name;?></option>    
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
                            />

                </div>

              
             <label for="pool_type" class="col-sm-2 col-form-label">Received Paddy:</label>

                <div class="col-sm-4">

                       <input type="text"
                              class="form-control" readonly
                              name = "tot_rceived"
                              id = "tot_rceived" /> 

                </div>
               

            </div>

            <div class="form-group row">

            	 <label for="pool_type" class="col-sm-2 col-form-label">Work Order:</label>

                <div class="col-sm-4">

                       <input type="text"
                              class="form-control" required
                              name="work_order_no"
                              id="work_order_no"
                              /> 

                </div>

                 <label for="totPaddy" class="col-sm-2 col-form-label">Soc Bill No.:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="soc_bill_no"
                            id="soc_bill_no"
                        />

                </div>

                

            </div>

            <div class="form-group row">
            	<label for="pool_type" class="col-sm-2 col-form-label">Soc Bill Date:</label>

                <div class="col-sm-4">

                       <input type="date"
                              class="form-control" required
                              name="soc_bill_date"
                              id="soc_bill_date" value="<?php echo date('Y-m-d');?>"
                        /> 

                </div>
            
                <label for="pool_type" class="col-sm-2 col-form-label">Pool Type:</label>

                <div class="col-sm-4">

                    <select class="form-control" required
                            name="pool_type" id="pool_type">

                        <option value="">Select</option>

                        <option value="S">State Pool</option>

                        <option value="C">Central Pool</option>

                    </select>    

                </div>
                
            </div>

             <div class="form-group row">

             	 <label for="pool_type" class="col-sm-2 col-form-label">Rice Type:</label>

                <div class="col-sm-4">

                    <select class="form-control" required
                            name="rice_type" id="rice_type">

                        <option value="">Select</option>

                        <option value="P">Boiled Rice</option>

                        <option value="R">Raw Rice</option>

                    </select>    

                </div>


                 <label for="totPaddy" class="col-sm-2 col-form-label">Rate:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" 
                            name="rate" readonly
                            id="rate" />

                </div>
                </div>

                <div class="form-group row">

            	 <label for="totPaddy" class="col-sm-2 col-form-label">Billed Paddy:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required  name="qty" id="qty"/>
                </div>

                <label for="totPaddy" class="col-sm-2 col-form-label">Commission Paid:</label>

                <div class="col-sm-4">

                    <input type="text" readonly
                            class="form-control" required  name="commn_paid" id="commn_paid"/>
                </div>

            	</div>

                 <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Amount Claimed:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="amount_claimed"
                            id="amount_claimed" />

                </div>

                 <label for="totPaddy" class="col-sm-2 col-form-label">Amount :</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="tot_amt" 
                            id="tot_amt" />

                </div>

            </div>

                <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">TDS Amount:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="tds_amt"
                            id="tds_amt" />

                </div>

                   <label for="totPaddy" class="col-sm-2 col-form-label">Paid Amount:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="paid_amt"
                            id="paid_amt" />

                </div>

            </div>

            <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Payment Mode:</label>

                <div class="col-sm-4">

                     <select class="form-control" required
                            name="pay_mode" id="pay_mode">

                        <option value="">Select</option>

                        <option value="CHEQUE">Cheque</option>
                        <option value="RTGS">RTGS</option>
                        <option value="NEFT">NEFT</option>

                    </select>  

                  

                </div>

                 <label for="totPaddy" class="col-sm-2 col-form-label">Reference No:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="ref_no"
                            id="ref_no" />

                </div>

            </div>

            <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Remarks:</label>

                <div class="col-sm-10">

                    <textarea name="remarks" id="remarks" class="form-control"></textarea>
                    
                </div>

            </div>


            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" class="btn btn-info" value="Save" />

                </div>

            </div>

        </form>

    </div>

    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Supporting Documents</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="doc-view">
           
          </div>
        </div>
      </div>
    </div>
</div>

<script>

    $(document).ready(function(){

        var i = 0;

        $('#block').change(function(){

            $.get( 

                '<?php echo site_url("paddy/societies");?>',

                { 

                    block: $(this).val()

                }

            ).done(function(data){

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.sl_no + '">' + value.soc_name + '</option>'

                });

                $('#soc_name').html(string);

            });

        });

    });

  $("#soc_name").change(function(e){
    
      var soc_id = $(this).val(); // anchors do have text not values.
      console.log(soc_id);
      $.ajax({
        url: '<?php echo base_url();?>index.php/paddys/transactions/f_connected_mill_society',
        data: {'soc_id': soc_id}, // change this to send js object
        type: "post",
        dataType: 'json',
        success: function(data){
           
           $("#mill_id").find('option').remove();
           $('#mill_id').append(data.html);
          
        }
      });
  });

    $('#mill_id').change(function(){

            $.get( 

                '<?php echo site_url("payment/get_aggrementno");?>',

                { 

                    mill_id : $(this).val(),
                    soc_id: $('#soc_name').val()

                }

            ).done(function(data){

                let value = JSON.parse(data);
                var  values = value.reg_no;
                var  alues = value.paddy_qty;
                var  lues = value.qty;
                $('#aggrement_no').val(values.reg_no);
 				$('#tot_rceived').val(alues.paddy_qty);
 				$('#commn_paid').val(lues.qty);
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

    $(document).ready(function(){

        function sumValuesOf(className){

            var sum = 0.00;

            $('.'+className+'').each(function(){

                sum += +$(this).val();

            });

            return sum;
        }

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

          $('#qty').keyup(function(){

          	  var total = parseFloat($('#tot_rceived').val());

              var amount = parseFloat($('#commn_paid').val());

              var remain_qty = (total-amount);


          
              var qty = $(this).val();
                   
               if(qty > remain_qty){

                 alert("Can Not Greater Than "+remain_qty+" paddy");

                 $('#qty').val("");
                 $('#amount_claimed').val("");
				 $('#tot_amt').val("");
				 $('#tds_amt').val("");
				 $('#paid_amt').val("");

                 $('#submit').attr('type', 'button');

               }
          
          })

        //Commission Details
        $('#intro1').on('change', '.particulars', function(){

            let indexNo = $('.particulars').index(this);

            $.get('<?php echo site_url("paddy/billMasterDetails"); ?>',{

                riceType: $('#rice_type').val(),
                sl_no: $(this).val()

            }).done(function(data){

                let values = JSON.parse(data);
                let action = values.action;
                
                $('.rate_per_qtls:eq('+indexNo+')').val(values.val);

                if(action == 'P'){

                    $('.amounts:eq('+indexNo+')').val(parseFloat(values.val) * parseFloat($('#totPaddy').val()));

                }else if(action == 'C'){

                    $('.amounts:eq('+indexNo+')').val(parseFloat(values.val) * parseFloat($('#totCmr').val()));

                }

            });

        });
        
    });
$("#trans_dt").change(function(){

          var trans_dt = $('#trans_dt').val();


         
 var d = new Date();

 var month = d.getMonth()+1;
 var day = d.getDate();

 var output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

    console.log(trans_dt,output);

          if(new Date(output) < new Date(trans_dt))
          {
          alert("Transaction  Date Can Not Be Greater Than Current Date");
          $('#submit').attr('type', 'buttom');
          return false;
          }else{
             $('#submit').attr('type', 'submit');
          }
})
    $("#trans_dt").change(function(){

        var trans_dt = $('#trans_dt').val();
        $('.cheque_date').val(trans_dt);
      })

 $('#form').submit(function(event){
           
                var trans_dt = $('#trans_dt').val();
         
var d = new Date();

 var month = d.getMonth()+1;
 var day = d.getDate();

 var output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

                    if(new Date(output) < new Date(trans_dt)){

                      alert("Transaction  Date Can Not Be Greater Than Current Date");
                      event.preventDefault();
                    }
                     else 
                        {
                    //  alert("Transaction Date Can Not Be Less Than order Date");

                       $('#submit').attr('type', 'submit');
                       
                      }
            });
   

</script>