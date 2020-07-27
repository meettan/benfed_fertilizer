<div class="wraper">      

  <div class="col-md-10 container form-wraper" style="margin:0 auto;float:none">

        <form method="POST" 
            id="form"
            action="<?php //echo site_url("paddy/delivery/edit");?>" >

            <div class="form-header">
            
                <h4>CMR Delivery Edit</h4>
            
            </div>

            <input type="hidden"
                    name="trans_no"
                    value="<?php echo $wqsc_dtls->id;?>"/>

                    <div class="form-group row">

            <label for="tot_do_isseued" class="col-sm-2 col-form-label">WQSC No:</label>

                    <div class="col-sm-4">

                        <input type="text"
                               class="form-control"
                               name="wqsc_no" id="wqsc_no" value="<?php echo $wqsc_dtls->wqsc_no;?>" />
                    </div>

               <label for="wqsc_date" class="col-sm-2 col-form-label">Wqsc Date:</label>

               <div class="col-sm-4">
                     <input type="date" class="form-control" name="wqsc_date"  id="wqsc_date" 
                     value="<?php echo $wqsc_dtls->wqsc_date;?>"/>
                </div>

            </div>
              <div class="form-group row">
                <label for="block" class="col-sm-2 col-form-label">Rice Mill Wise QC no:</label>

                <div class="col-sm-4">
                      <input type="text" class="form-control" name="rice_mill_qc_no"  id="rice_mill_qc_no" value="<?php echo $wqsc_dtls->rice_mill_qc_no;?>"/>
                </div>

                <label for="mill_name" class="col-sm-2 col-form-label">Pool:</label>

                <div class="col-sm-4">

                <select type="text" class="form-control required sch_cd" name="pool" id="pool">

                    <option value="">Select Pool</option>    
                    <option value="CENTRAL"   <?php   if($wqsc_dtls->pool == "CENTRAL") echo "selected"; ?>>CENTRAL</option> 
                    <option value="STATE" <?php   if($wqsc_dtls->pool == "STATE") echo "selected"; ?>>STATE</option> 
                    <option value="FCI" <?php   if($wqsc_dtls->pool == "FCI") echo "selected"; ?>>FCI</option>     

                </select>
            </div>

            </div>
            <div class="form-group row">
               
                <label for="mill_name" class="col-sm-2 col-form-label">Goodown Name:</label>

                <div class="col-sm-4">

                <input type="text" class="form-control" 
                name="goodown_name"  id="goodown_name" value="<?php echo $wqsc_dtls->goodown_name;?>"/>
                </div>

                <label for="dist" class="col-sm-2 col-form-label">Goodown District:</label>

                    <div class="col-sm-4">

                        <select name="goodown_dist" id="goodown_dist" class="form-control required">
                            <option value="">Select</option>
                            <?php
                                foreach($dist as $dlist){
                            ?>
                                <option value="<?php echo $dlist->district_code;?>" 
                           <?php   if($dlist->district_code  == $wqsc_dtls->branch_id) echo "selected"; ?>      
                                    ><?php echo $dlist->district_name;?></option>
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

                        <option value="<?php if(isset($block->sl_no)) { echo $block->sl_no ;}?>" 
                                   <?php   if($block->sl_no  == $wqsc_dtls->block) echo "selected"; ?>

                            ><?php if(isset($block->block_name)) { echo $block->block_name ;}?></option>    

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

                 <label for="tot_do_isseued" class="col-sm-2 col-form-label">No of Gunny:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control"
                            name="no_gunny" value="<?php echo $wqsc_dtls->no_gunny;?>"
                            id="no_gunny"/>
                </div>

               
                <label for="tot_do_isseued" class="col-sm-2 col-form-label">Quantity:</label>

                    <div class="col-sm-2">

                        <input type="text"
                                class="form-control" required
                                name="quantity"  id="quantity" value="<?php echo $wqsc_dtls->quantity;?>"/>
                    </div>
                   
                    <label for="tot_do_isseued" class="col-sm-2 col-form-label">Rate per Quintal:</label>

                    <div class="col-sm-2">

                        <input type="text"
                                class="form-control"
                                name="rate_per_quintal" value="<?php //echo $wqsc_dtls->rate_per_quintal;?>"
                                id="rate_per_quintal" readonly />
                    </div>

                 

            </div>

            <div class="form-group row">


                    <label for="tot_do_isseued" class="col-sm-2 col-form-label">Moisture Extra quantity:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control" 
                            name="moisture_extra" value="0.00" value="<?php echo $wqsc_dtls->moisture_extra;?>"
                            id="moisture_extra"  />
                </div>
               
                  <label for="tot_do_isseued" class="col-sm-2 col-form-label">Moisture Extra Amount:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control" 
                            name="moisture_ext_amt" value="0.00" value="<?php echo $wqsc_dtls->moisture_ext_amt;?>"
                            id="moisture_ext_amt"  />
                </div>


                   
                      <label for="tot_do_isseued" class="col-sm-2 col-form-label">Avg Wt Empty Gunny:</label>

                    <div class="col-sm-2">

                           <input type="text"
                                class="form-control" value="<?php echo $wqsc_dtls->avg_wt_empty_gunny;?>"
                                name="avg_wt_empty_gunny" id="avg_wt_empty_gunny"/>
                    </div>
               
               

             </div>

              <div class="form-group row">

                  <label for="tot_do_isseued" class="col-sm-2 col-form-label">Gunny cut:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control" value="<?php echo $wqsc_dtls->gunny_cut;?>"
                            name="gunny_cut"
                            id="gunny_cut" />
                  </div>

                 <label for="tot_do_isseued" class="col-sm-2 col-form-label">Total Price:</label>

                <div class="col-sm-2">

                    <input type="text"
                            class="form-control"
                            name="tot_price" value="<?php echo $wqsc_dtls->tot_price;?>"
                            id="tot_price"  />
                </div>

              </div>
           
            <div class="form-group row">


                 <label for="dist" class="col-sm-2 col-form-label">Remarks:</label>

                <div class="col-sm-10">
                <textarea class="form-control" name="remarks" ><?php echo $wqsc_dtls->remarks;?></textarea>
                
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

    $("#form").validate();

    $( ".sch_cd" ).select2();

</script>

<script>

    $(document).ready(function(){

        var global_dist = '<?php echo $wqsc_dtls->branch_id ?>',
            global_block= '<?php echo $wqsc_dtls->block ?>';

        

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

                        if(value.sl_no == '<?php echo $wqsc_dtls->soc_name ?>'){
                            
                            selected = 'selected';

                        }else{

                            selected = '';

                        }

                        string += '<option value="' + value.sl_no + '"'+ selected +'>' + value.soc_name + '</option>'

                    });

                    $('#soc_name').html(string);

                });

            }

            function millGroup(soc_id) {

                    //For District wise Mill
                    $.post( 

                        '<?php echo site_url("paddys/transactions/f_soc_mills");?>',

                        { 

                            soc_id: <?php echo $wqsc_dtls->soc_name ?>

                        }

                        ).done(function(data){

                        var string = '<option value="">Select</option>',
                            selected = '';

                        $.each(JSON.parse(data), function( index, value ) {

                            if(value.sl_no == '<?php echo $wqsc_dtls->mill_id ?>'){
                                
                                selected = 'selected';

                            }else{

                                selected = '';

                            }

                            string += '<option value="' + value.sl_no + '"'+ selected +'>' + value.mill_name + '</option>'

                        });

                        $('#mill_name').html(string);

                    });

                }

             //   $('#mill_name').change(function(){\

        function doGroup(soc_id,mill_id) {

            $.post('<?php echo site_url("paddys/transactions/getdonumber"); ?>',
            
                {
                    soc_id:  <?php echo $wqsc_dtls->soc_name ?>,

                    mill_id: <?php echo $wqsc_dtls->mill_id ?>
                }

            )
            .done(function(data){

                var string = '<option value="">Select</option>';

                    $.each(JSON.parse(data), function( index, value ) {


                         if(value.do_number == '<?php echo $wqsc_dtls->memo_no ?>'){
                                
                                selected = 'selected';

                            }else{

                                selected = '';

                            }


                        string += '<option value="' + value.do_number + '"'+ selected +'>' + value.do_number + '</option>'

                    });

                    $('#memo_no').html(string);
            });

        };

         function dodatetype(soc_id,mill_id,do_number) {
       
            
            //Progressive Paddy Procurement
            $.get('<?php echo site_url("paddys/transactions/total_cmr_delivery"); ?>',
            
                {
                    soc_id:  '<?php echo $wqsc_dtls->soc_name ?>',

                    mill_id: '<?php echo $wqsc_dtls->mill_id ?>',

                    do_number: '<?php echo $wqsc_dtls->memo_no ?>'
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

        };

        socGroup( '<?php echo $wqsc_dtls->block ?>');

        millGroup('<?php echo $wqsc_dtls->soc_name ?>');

        doGroup('<?php echo $wqsc_dtls->soc_name ?>','<?php echo $wqsc_dtls->mill_id ?>');

        dodatetype('<?php echo $wqsc_dtls->soc_name ?>','<?php echo $wqsc_dtls->mill_id ?>','<?php echo $wqsc_dtls->memo_no ?>');

        $('#dist').change(function(){

            millGroup($(this).val());

            socGroup('');

        });

        $('#block').change(function(){
            
            socGroup($(this).val());

        });


         $('#mill_name').change(function(){
            
            doGroup($('#soc_name').val(),$(this).val());

        });

          $('#do_number').change(function(){

             dodatetype($('#soc_name').val(),$('#mill_name').val(),$(this).val());

          })

    });
</script>