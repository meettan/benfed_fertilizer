    <div class="wraper">      
        <div class="col-md-2 container"></div>

        <div class="col-md-8 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("fertilizer/editsalerate");?>" >

                <div class="form-header">
                
                    <h4>Edit Sale Rate</h4>
                
                </div>

                        <input type="hidden" name="prod_id" class="form-control required"  
                        value = "<?php echo $schdtls->prod_id; ?>" 
                        />
                
                    <input type="hidden" name="comp_id" class="form-control required"  
                        value = "<?php echo $schdtls->comp_id; ?>" 
                    />
                <div class="form-group row">
                

                <label for="district_name" class="col-sm-2 col-form-label">District:</label>
                
                <div class="col-sm-4">
                
                    <input type="text" name="district_name" class="form-control"  
                        value = "<?php echo $schdtls->district_name; ?>"   readonly
                    />
                </div>

                <label for="comp_name" class="col-sm-2 col-form-label">Company Name:</label>

                    <div class="col-sm-4">

                        <input type="text" name="comp_name" class="form-control required"  
                            value = "<?php echo $schdtls->comp_name; ?>"  readonly
                        />
                    </div>
                </div>

                <div class="form-group row">

                     <label for="prod_desc" class="col-sm-2 col-form-label">Category Name:</label>

                    <div class="col-sm-4">

                        <!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
                            <select name="catg_id" class="form-control required" id="catg_id" disabled>

                        <option value="">Select</option>

                        <?php

                            foreach($cat_names as $cat_name){

                        ?>

                            <option value="<?php echo $cat_name->sl_no;?>" <?php if($cat_name->sl_no == $schdtls->catg_id){echo "selected";}?>><?php echo $cat_name->cate_desc;?></option>

                        <?php

                            }

                        ?>     

                        </select>

                    </div>

                    <label for="prod_desc" class="col-sm-2 col-form-label">Product Name:</label>

                    <div class="col-sm-4">

                        <input type="text" name="prod_desc" class="form-control"  
                            value = "<?php echo $schdtls->prod_desc; ?>"  readonly
                        />
		            </div>

		</div>
                        <div class="form-group row">

                <label for="frm_dt" class="col-sm-2 col-form-label">From Date:</label>

                <div class="col-sm-4">

                    <input type="date" name="frm_dt" class="form-control"   readonly
                        value = "<?php echo $schdtls->frm_dt; ?>" 
                    />
                </div>
                <label for="to_dt" class="col-sm-2 col-form-label">To Date:</label>

                <div class="col-sm-4">

                    <input type="date" name="to_dt" class="form-control"   readonly
                        value = "<?php echo $schdtls->to_dt; ?>" 
                    />
                </div>

                </div>

                    <div class="form-group row">
                    <label for="sp_mt" class="col-sm-2 col-form-label">Sale Price in MT:</label>
                    <div class="col-sm-4">

                        <input type="text" id="sp_mt" name="sp_mt" class="form-control" value="<?php echo $schdtls->sp_mt; ?>" readonly />

                    </div>
                    <label for="sp_bag" class="col-sm-2 col-form-label">Sale Price per Bag:</label>
                    <div class="col-sm-4">

                        <input type="text" id="sp_bag" name="sp_bag" class="form-control" value="<?php echo $schdtls->sp_bag; ?>"  readonly/>

                    </div>
                   </div>

                    <div class="form-group row">
                    <label for="sp_govt" class="col-sm-2 col-form-label">Gov Sale rate:</label>
                    <div class="col-sm-4">

                        <input type="text" id="sp_govt" name="sp_govt" class="form-control" value="<?php echo $schdtls->sp_govt; ?>"  readonly/>

                    </div>
                  
                   </div>
		<!-- <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>
  -->
            </form>

        </div>

    </div>


