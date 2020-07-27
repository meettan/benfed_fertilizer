    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("finance/editsubSchedule");?>" >

                <div class="form-header">
                
                    <h4>Edit Subschedule</h4>
                
                </div>

                <div class="form-group row">

                    <label for="subschcd" class="col-sm-2 col-form-label">Subschedule Code.:</label>

                        <div class="col-sm-10">

                            <input type="text" name="subschedule_code" class="form-control required"  
                            value = "<?php echo $schdtls->subschedule_code; ?>" readonly
                            />
                        </div>

		        </div>

                <div class="form-group row">

                    <label for="acctype" class="col-sm-2 col-form-label">Account Type:</label>

                        <div class="col-sm-10">

                            <input type="text" name="acc_type" class="form-control required"  
                                value = "<?php if($schdtls->acc_type==1){
                                            echo "Liability";
                                          }elseif($schdtls->acc_type==2){
                                            echo "Asset";  
                                          }elseif($schdtls->acc_type==3){
                                            echo "Sale";
                                          }elseif($schdtls->acc_type==4){
                                            echo "Purchase";  
                                          }elseif($schdtls->acc_type==5){
                                            echo "Income";   
                                          }else{
                                            echo "Expense";  
                                          } ?>" readonly
                            />
                        </div>

		        </div>

                <div class="form-group row">

                    <label for="schcd" class="col-sm-2 col-form-label">Schedule Name.:</label>

                        <div class="col-sm-10">

                            <input type="text" name="schedule_type" class="form-control required"  
                            value = "<?php echo $schdtls->schedule_type; ?>" readonly
                            />
                        </div>

		        </div>

                <div class="form-group row">

                    <label for="sch_name" class="col-sm-2 col-form-label">Subschedule Name:</label>

                    <div class="col-sm-10">
                        <input type="text" name="subschedule_type" class="form-control required" 
                            value = "<?php echo $schdtls->subschedule_type; ?>" 
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


