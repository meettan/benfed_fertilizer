    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("fertilizer/editsalerate");?>" >

                <div class="form-header">
                
                    <h4>Edit Sale Rate</h4>
                
                </div>

                <div class="form-group row">

                    <!-- <label for="prod_id" class="col-sm-2 col-form-label">Product Id:</label> -->

                    <div class="col-sm-10">

                        <input type="hidden" name="prod_id" class="form-control required"  
                        value = "<?php echo $schdtls->prod_id; ?>" readonly
                        />
                    </div>

                </div>

                <div class="form-group row">
                

                <label for="district_name" class="col-sm-2 col-form-label">District:</label>
                
                <div class="col-sm-10">
                
                    <input type="text" name="district_name" class="form-control required"  
                        value = "<?php echo $schdtls->district_name; ?>" 
                    />
                </div>
                </div>
                <div class="form-group row">


<label for="comp_name" class="col-sm-2 col-form-label">Company Name:</label>

<div class="col-sm-10">

    <input type="text" name="comp_name" class="form-control required"  
        value = "<?php echo $schdtls->comp_name; ?>" 
    />
</div>
</div>
<div class="form-group row">


<!-- <label for="comp_id" class="col-sm-2 col-form-label">Company Name:</label> -->

<div class="col-sm-10">

    <input type="hidden" name="comp_id" class="form-control required"  
        value = "<?php echo $schdtls->comp_id; ?>" 
    />
</div>
</div>
                

                <div class="form-group row">

                    <label for="prod_desc" class="col-sm-2 col-form-label">Product Name:</label>

                    <div class="col-sm-10">

                        <input type="text" name="prod_desc" class="form-control required"  
                            value = "<?php echo $schdtls->prod_desc; ?>" 
                        />
		            </div>

		</div>
        <div class="form-group row">

<label for="frm_dt" class="col-sm-2 col-form-label">From Date:</label>

<div class="col-sm-10">

    <input type="date" name="frm_dt" class="form-control required"  
        value = "<?php echo $schdtls->frm_dt; ?>" 
    />
</div>

</div>
<div class="form-group row">

<label for="to_dt" class="col-sm-2 col-form-label">To Date:</label>

<div class="col-sm-10">

    <input type="date" name="to_dt" class="form-control required"  
        value = "<?php echo $schdtls->to_dt; ?>" 
    />
</div>


</div>
<div class="form-group row">

<label for="rate" class="col-sm-2 col-form-label">Sale Rate:</label>

<div class="col-sm-10">

    <input type="text" name="rate" class="form-control required"  
        value = "<?php echo $schdtls->rate; ?>" 
    />
</div>


</div>	


		<div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>
 
            </form>

        </div>

    </div>


