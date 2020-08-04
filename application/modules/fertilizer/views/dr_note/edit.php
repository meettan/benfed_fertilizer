<div class="wraper">      
            <div class="col-md-2 container"></div>
			<div class="col-md-8 container form-wraper">
	
				<form method="POST" action="<?php echo site_url("drcrnote/drnote_edit") ?>" id="form" >
	
					<div class="form-header">
					
						<h4>Edit Dr Note</h4>
					
					</div>
	
					
						<?php

    foreach($cr_detals as $cr_de);
    
       
    
    ?>
                <div class="form-group row">

                      <label for="ro_no" class="col-sm-2 col-form-label">Society:</label>
                        <div class="col-sm-4">

                           <select name="soc_id" id="soc_id" class="form-control soc_id" disabled>
                              <option value="">Select Society</option>
                            <?php
                            foreach($socdtls as $key1)
                            { ?>
                                <option value="<?php echo $key1->soc_id; ?>" <?php if($key1->soc_id == $cr_de->soc_id) {echo "selected";}?>><?php echo $key1->soc_name; ?></option>
                            <?php
                            } ?>
                            </select> 
                  
                        </div>

                       <label for="invoice_no" class="col-sm-2 col-form-label">Invoice No:</label>

                       <div class="col-sm-4">
    
                        <input type="text"  id=invoice_no name="invoice_no" class="form-control"  readonly
                        value="<?=$cr_de->invoice_no?>" />
                       </div>


                    </div>

                        <div class="form-group row">

                        <label for="invoice_dt" class="col-sm-2 col-form-label">Invoice Date:</label>
                        <div class="col-sm-4">
    
                        <input type="date" id=invoice_dt name="invoice_dt" class="form-control" value="<?=$cr_de->invoice_dt?>" readonly/>
                        </div>

                        <label for="invoice_amt" class="col-sm-2 col-form-label">Invoice Amount:</label>

                        <div class="col-sm-4">
    
                     <input type="text" id=invoice_amt name="invoice_amt" class="form-control" value=""  readonly/>
                        </div>
                     
                    </div>


                       <div class="form-group row">

                        <label for="trans_dt" class="col-sm-2 col-form-label">Dr Note Date:</label>

                        <div class="col-sm-4">
                        <input type="date" id="trans_dt" name="trans_dt" class="form-control" value="<?=$cr_de->trans_dt?>" readonly />
                        </div>

                        <label for="dr_date" class="col-sm-2 col-form-label">Sale Due dt:</label>

                        <div class="col-sm-4">
                        <input type="date" id="sale_due_dt" name="sale_due_dt" class="form-control"  readonly/>
                        </div>


                    </div>


                    <div class="form-group row">

                        <label for="dr_amt" class="col-sm-2 col-form-label">Dr Amount:</label>

                        <div class="col-sm-4">
                        <input type="text" id="tot_amt" name="tot_amt" value="<?=$cr_de->tot_amt?>" class="form-control" required />
                        </div>

                       

                    </div>

                       <div class="form-group row">

                        <label for="dr_amt" class="col-sm-2 col-form-label">Remarks:</label>

                        <div class="col-sm-10">
                          <textarea id="remarks" name="remarks" class="form-control"><?=$cr_de->remarks?></textarea>
                       
                        </div>

                       

                    </div>
            
               

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" id= "submit" class="btn btn-info" value="Save" />

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- For Add row table -->
<script>

    
// $('#invoice_no').change(function(){

$(document).ready(function() {

        $.get(

            '<?php echo site_url("drcrnote/invoice_detail");?>',
            { 
                soc_id: '<?php echo $cr_de->soc_id ;?>',
                invoice_no: '<?=$cr_de->invoice_no?>',
            }

        )
        .done(function(data){

            var datas = JSON.parse(data);
            
           if(datas == null ){
             alert("Invalid Invoice No");
             $('#invoice_no').val("");  

           }else{
              //  $('#invoice_dt').val(datas.do_dt);  
                $('#invoice_amt').val(datas.tot_amt);     
                $('#sale_due_dt').val(datas.sale_due_dt);   

           }
             
          
        });

    });
     
   $('#tot_amt').change(function(){

       var tot_amt = parseFloat($('#invoice_amt').val());

       
       var date2   = parseFloat($(this).val());

       if(date2 > tot_amt){

          alert("Dr Note amount must be less than Invoice Amount");
              $('#tot_amt').val("");
       }
  
          
     });
   

</script>


