<div class="wraper">      

    <div class="col-md-10 container form-wraper" style="margin:0 auto;float:none">

        <form method="POST"  id="form"   action="<?php echo site_url("paddys/transactions/f_wqsc_add");?>" >

            <div class="form-header">
            
                <h4>WQSC </h4>
            
            </div>

            <div class="form-group row">

            <label for="tot_do_isseued" class="col-sm-2 col-form-label">WQSC No:</label>

                    <div class="col-sm-4">

                        <input type="text"
                                class="form-control"
                                name="wqsc_no" id="wqsc_no" value="" />
                    </div>

               <label for="wqsc_date" class="col-sm-2 col-form-label">Wqsc Date:</label>

               <div class="col-sm-4">
                     <input type="date" class="form-control" name="wqsc_date"  id="wqsc_date" 
                     value="<?php echo date("Y-m-d");?>"/>
                </div>

            </div>
              <div class="form-group row">
                <label for="block" class="col-sm-2 col-form-label">Rice Mill Wise QC no:</label>

                <div class="col-sm-4">
                      <input type="text" class="form-control" name="rice_mill_qc_no"  id="rice_mill_qc_no" value=""/>
                </div>

                <label for="mill_name" class="col-sm-2 col-form-label">Pool:</label>

                <div class="col-sm-4">

                <select type="text" class="form-control required sch_cd" name="pool" id="pool">

                    <option value="">Select Pool</option>    
                    <option value="CENTRAL" >CENTRAL</option> 
                    <option value="STATE">STATE</option> 
                    <option value="FCI">FCI</option>     

                </select>
            </div>

            </div>
            <div class="form-group row">
               
                <label for="mill_name" class="col-sm-2 col-form-label">Goodown Name:</label>

                <div class="col-sm-4">

                <input type="text" class="form-control" name="goodown_name"  id="goodown_name" value=""/>
                </div>

                <label for="dist" class="col-sm-2 col-form-label">Goodown District:</label>

                    <div class="col-sm-4">

                        <select name="goodown_dist" id="goodown_dist" class="form-control required">
                            <option value="">Select</option>
                            <?php
                                foreach($dist as $dlist){
                            ?>
                                <option value="<?php echo $dlist->district_code;?>"><?php echo $dlist->district_name;?></option>
                            <?php
                                }
                            ?>     
                        </select>
                    </div>

            </div>  

            <div class="form-group row">

            <label for="block" class="col-sm-2 col-form-label">Block:</label>

                <div class="col-sm-4">

                    <select name="block" id="block" class="form-control required">

                        <option value="">Select</option>  
                        <?php foreach($blocks as $block) { ?>  

                        <option value="<?php if(isset($block->sl_no)) { echo $block->sl_no ;}?>"><?php if(isset($block->block_name)) { echo $block->block_name ;}?></option>    

                        <?php } ?>
                    </select>

                </div>
               
                <label for="Society" class="col-sm-2 col-form-label">Society Name:</label>

                <div class="col-sm-4">

                    <select type="text" class="form-control" name="soc_name" id="soc_name">

                        <option value="">Select</option>    
                        <option value="">Select Block First</option>    

                    </select>
                </div>

            </div>  

            <div class="form-group row">

            	<label for="mill_name" class="col-sm-2 col-form-label">Mill Name:</label>

                <div class="col-sm-4">

                    <select type="text" class="form-control" name="mill_name" id="mill_name">

                        <option value="">Select</option>    
                        <option value="">Select Society First</option>    

                    </select>
                </div>

                <label for="mill_name" class="col-sm-2 col-form-label">Memo Number(Do Number):</label>

                <div class="col-sm-4">

                	 <select type="text" class="form-control" name="memo_no" id="memo_no">

                        <option value="">Select</option>    
                        <option value="">Select Society First</option>    

                    </select>
               <!--      <input type="text" class="form-control" name="memo_no"  id="memo_no" value="" required /> -->
                </div>

               
            </div> 
             <div class="form-group row">

                <label for="" class="col-sm-2 col-form-label">Memo Date</label>

                    <div class="col-sm-4">
                        <input type="hidden" name="memo_dt" id="memo_dt"/>
                        <input type="text"
                                class="form-control"
                                name="viewonly" id="memo_dts" value="" readonly />
                    </div>

                  <label for="" class="col-sm-2 col-form-label">Variety of Rice:</label> 

                    <div class="col-sm-4">

                        <input type="text"
                                class="form-control"
                                name="rice_type"
                                id="rice_type" value="" readonly />
                    </div>

                    

             </div> 

            <div class="form-group row">

            	 <label for="tot_do_isseued" class="col-sm-2 col-form-label">Gunny used for Packing CMR:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control"
                            name="no_gunny"
                            id="no_gunny"  />
                </div>

               
                <label for="tot_do_isseued" class="col-sm-2 col-form-label">Quantity:</label>

                    <div class="col-sm-2">

                        <input type="text"
                                class="form-control" required
                                name="quantity"  id="quantity"/>
                    </div>
                   
                    <label for="tot_do_isseued" class="col-sm-2 col-form-label">Rate per Quintal:</label>

                    <div class="col-sm-2">

                        <input type="text"
                                class="form-control"
                                name="rate_per_quintal"
                                id="rate_per_quintal" readonly />
                    </div>

                 

            </div>

            <div class="form-group row">


            	    <label for="tot_do_isseued" class="col-sm-2 col-form-label">Moisture Extra quantity:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control" 
                            name="moisture_extra" value="0.00"
                            id="moisture_extra"  />
                </div>
               
                  <label for="tot_do_isseued" class="col-sm-2 col-form-label">Moisture Extra Amount:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control" 
                            name="moisture_ext_amt" value="0.00"
                            id="moisture_ext_amt"  />
                </div>


                   
                      <label for="tot_do_isseued" class="col-sm-2 col-form-label">Avg Wt Empty Gunny:</label>

                    <div class="col-sm-2">

                           <input type="text"
                                class="form-control"
                                name="avg_wt_empty_gunny" id="avg_wt_empty_gunny"/>
                    </div>
               
               

             </div>

              <div class="form-group row">

              	  <label for="tot_do_isseued" class="col-sm-2 col-form-label">Gunny cut:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control"
                            name="gunny_cut"
                            id="gunny_cut" />
                  </div>

              	 <label for="tot_do_isseued" class="col-sm-2 col-form-label">Total Price:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control"
                            name="tot_price"
                            id="tot_price"  />
                </div>

              </div>
           
            <div class="form-group row">


                 <label for="dist" class="col-sm-2 col-form-label">Remarks:</label>

                <div class="col-sm-10">
                <textarea class="form-control" name="remarks"></textarea>
                
                </div>
            </div>

                

            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" id="submit" class="btn btn-info" value="Save" />

                </div>

            </div>

        </form>

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

     // start of doc ready.
   $("#soc_name").change(function(e){
   
      var soc_id = $(this).val(); // anchors do have text not values.
      console.log(soc_id);
      $.ajax({
        url: '<?php echo base_url();?>index.php/paddys/transactions/f_connected_mill_society',
        data: {'soc_id': soc_id}, // change this to send js object
        type: "post",
        dataType: 'json',
        success: function(data){
           //document.write(data); just do not use document.write
          
           $("#mill_name").find('option').remove();
           $('#mill_name').append(data.html);
          
        }
      });
   });


   });
</script>


 
 <script>

    $(document).ready(function(){

        //Do number By Society and Mill

        $('#mill_name').change(function(){

            $.post('<?php echo site_url("paddys/transactions/getdonumber"); ?>',
            
                {
                    soc_id:  $('#soc_name').val(),

                    mill_id: $(this).val()
                }

            )
            .done(function(data){

                var string = '<option value="">Select</option>';

                    $.each(JSON.parse(data), function( index, value ) {

                        string += '<option value="' + value.do_number + '">' + value.do_number + '</option>'

                    });

                    $('#memo_no').html(string);
            });

        });

        $('#do_number').change(function(){
            
            //Progressive Paddy Procurement
            $.get('<?php echo site_url("paddys/transactions/f_totisseued"); ?>',
            
                {
                    soc_id:  $('#soc_name').val(),

                    mill_id: $('#mill_name').val(),

                    do_number:$(this).val()
                }

            )
            .done(function(data){

                let temp = JSON.parse(data);

                if(temp.rice_type=="P"){
                    $('#rice_type').val("Par Bolied");
                }else{
                    $('#rice_type').val("Raw Rice");
                }
                
                $('#tot_do_isseued').val(temp.tot);
                $('#state_pool_isseued').val(temp.sp);
                $('#central_pool_isseued').val(temp.cp);
                $('#fci_isseued').val(temp.fci);
                

                if(temp.tot == '0.000'){

                    $('#submit').attr('type', 'button');

                }
                else{

                    $('#submit').attr('type', 'submit');

                }

            });

        });

        $('#memo_no').change(function(){

                //Progressive Paddy Procurement
                $.get('<?php echo site_url("paddys/transactions/total_cmr_delivery"); ?>',

                    {
                        do_number:$(this).val()

                    }

                )
                .done(function(data){


                    let temp = JSON.parse(data);
                    var dataaa =temp.trans_dt;

                    var curr_date = dataaa.split("-");
     
                    $('#memo_dts').val(curr_date[2]+"/"+curr_date[1]+"/"+curr_date[0]);
                    $('#memo_dt').val(dataaa);

                    $('#rice_type').val(temp.rice_type);
                    $('#quantity').val(temp.tot);
                    $('#rate_per_quintal').val(temp.rate);

                    $('#tot_price').val(parseFloat((temp.rate)*(temp.tot)));
                   
                });
                    
                });

        $('.delivery_type').change(function(){
            
            let total = 0;

            $("#tot_cmr_delivery").val('');
  
            $('.delivery_type').each(function(){
                
                total += +$(this).val();
                
            });

            if(total <= $('#tot_do_isseued').val()){

                $("#tot_cmr_delivery").val(total);

                $('#submit').attr('type', 'submit');

            }
            else{

                $('#submit').attr('type', 'button');

            }

        });
       
        $('#quantity').keyup(function(){

              
                });

        $('#quantity').change(function(){

                   var  quantity = parseFloat($(this).val());

                   var  rate_per_quintal = parseFloat($('#rate_per_quintal').val());

                   var  moisture_extra = parseFloat($('#moisture_ext_amt').val());
                   var  sub            = parseFloat(quantity*rate_per_quintal);
                 
                    $('#tot_price').val(sub - moisture_extra);
                   
                });

        $('#moisture_ext_amt').change(function(){

                   var  moisture_ext_amt = parseFloat($(this).val());

                   var  rate_per_quintal = parseFloat($('#rate_per_quintal').val());

                   var  quantity = parseFloat($('#quantity').val());
                   var  sub            = parseFloat(quantity*rate_per_quintal);
                    var total    =parseFloat(sub- moisture_ext_amt);
                    $('#tot_price').val(total);
                   
                });
        
         $('#moisture_extra').change(function(){

                   var  quantity = parseFloat($('#quantity').val());

                   var  rate_per_quintal = parseFloat($('#rate_per_quintal').val());

                   var  moisture_extra = parseFloat($('#moisture_extra').val());
                   var  sub            = quantity*rate_per_quintal;
                 
                    $('#tot_price').val(sub - moisture_extra);
                   
                });


    });

</script>
