    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("fertilizer/editproduct");?>" >

                <div class="form-header">
                
                    <h4>Edit Product</h4>
                
                </div>

                <div class="form-group row">

                    <label for="prod_id" class="col-sm-2 col-form-label">Product Id:</label>

                    <div class="col-sm-10">

                        <input type="text" name="prod_id" class="form-control required"  
                        value = "<?php echo $schdtls->prod_id; ?>" readonly
                        />
                    </div>

                </div>
                <div class="form-group row">

<label for="comp_id" class="col-sm-2 col-form-label">Company Name:</label>

<div class="col-sm-10">

    <input type="text" name="comp_id" class="form-control required"  
        value = "<?php echo $schdtls->comp_name; ?>" 
   readonly />
</div>
</div>

                <div class="form-group row">

                    <label for="Prod_type" class="col-sm-2 col-form-label">Product Type:</label>

                    <div class="col-sm-10">

                        <!-- <input type="text" name="Prod_type" class="form-control required"  
                        value = "<?php if($schdtls->prod_type==1){
                                            echo "Chemical - Fertilizer";
                                          }elseif($schdtls->prod_type==2){
                                            echo "Organic - Fertilizer";
                                          }elseif($schdtls->prod_type==3){
                                            echo "Bio- Fertilizer"; 
                                        //   }elseif($schdtls->acc_type==4){
                                        //     echo "Purchase";  
                                        //   }elseif($schdtls->acc_type==5){
                                        //     echo "Income";   
                                        //   }else{
                                        //     echo "Expense";  
                                          }
                                 ?>" readonly
                        /> -->

                        <select class="col-sm-10"
                        name="prod_type"
                        id="prod_type" style="width:300px;height:40px"
                    >
                    
                    <option value="">Select</option>
                    <option value="1" <?php echo ($schdtls->prod_type == 1)? 'selected' : '';?>>Chemical - Fertilizer</option>
                    <option value="2" <?php echo ($schdtls->prod_type == 2)? 'selected' : '';?>>Organic - Fertilizer</option>
                    <option value="3" <?php echo ($schdtls->prod_type == 3)? 'selected' : '';?>>Bio- Fertilizer</option>
                </select>  
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

<label for="gst_rt" class="col-sm-2 col-form-label">GST Rate:</label>

<div class="col-sm-10">

    <input type="text" name="gst_rt" class="form-control required"  
        value = "<?php echo $schdtls->gst_rt; ?>" 
    />
</div>

</div>
<div class="form-group row">

<label for="hsn_code" class="col-sm-2 col-form-label">HSN:</label>

<div class="col-sm-10">

    <input type="text" name="hsn_code" class="form-control required"  
        value = "<?php echo $schdtls->hsn_code; ?>" 
    />
</div>


</div>
			

<div class="form-group row">

<label for="bag" class="col-sm-2 col-form-label">Qty per bag(In KG) :</label>

<div class="col-sm-10">
<select class="col-sm-10"
                        name="bag"
                        id="bag" style="width:300px;height:40px"
                    >

<option value="">Select</option>
                    <option value="45" <?php echo ($schdtls->qty_per_bag == 45)? 'selected' : '';?>>45</option>
                    <option value="50" <?php echo ($schdtls->qty_per_bag == 50)? 'selected' : '';?>>50</option>
                    </select>  
<!-- <input type="text" name="bag" class="form-control required"  
        value = "<?php echo $schdtls->qty_per_bag; ?>" 
    /> -->

    <!-- <input type="text" style="width:50px" name="unit" class="form-control required"  
        value = "<?php  if(isset($unitdtls->unit_name)){ echo $unitdtls->unit_name ;} ?>" /> -->

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


