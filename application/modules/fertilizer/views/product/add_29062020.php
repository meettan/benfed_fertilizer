<!-- <script type="text/javascript">
	function valid_data(){
		var x = document.getElementById('sch_type').value;
		if(x.trim()==""){
			alert("Please Supply A Valid Schedule Type");
			return false;
		}else{
			return true;
		}
	}

</script> -->

    <div class="wraper">      
            
		<div class="col-md-6 container form-wraper">

			<form method="POST" action="<?php echo site_url("Fertilizer/productAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Product</h4>
				
				</div>
				<div class="form-group row">
					<label for="comp_id" class="col-sm-3 col-form-label">Company :</label>
					<div class="col-sm-9">

						<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
						<select name="comp_id" class="form-control required" id="comp_id">

<option value="">Select</option>

<?php

	foreach($compdtls as $comp){

?>

	<option value="<?php echo $comp->comp_id;?>"><?php echo $comp->comp_name;?></option>

<?php

	}

?>     

</select>


					</div>
					</div>




				<div class="form-group row">

				<label for="Prod_type" class="col-sm-3 col-form-label">Type:</label>

				<div class="col-sm-9">

					<select class="form-control" id="prod_type" name="prod_type" required>
						
						<option value="">Select</option>
						<option value="1">Organic - Fertilizer</option>
						<option value="2">Bio- Fertilizer</option>
						<option value="3">Others</option>
						<!-- <option value="4">Sale</option>
						<option value="5">Income</option>
						<option value="6">Expense</option> -->
					
					</select>

				</div>

			</div>

				<div class="form-group row">

					<!-- <label for="prod_Id" class="col-sm-3 col-form-label">Prod_Id:</label> -->

					<div class="col-sm-9">

						<input type="hidden" id=prod_Id name="prod_Id" class="form-control"  />

					</div>
					</div>
					
					<div class="form-group row">
					<label for="prod_desc" class="col-sm-3 col-form-label">Name:</label>

					<div class="col-sm-9">

						<input type="text" id=prod_desc name="prod_desc" class="form-control" required />

					</div>
					</div>

					<div class="form-group row">
					<label for="gst_rt" class="col-sm-3 col-form-label">GST RT:</label>
					<div class="col-sm-9">

						<input type="text" id=gst_rt name="gst_rt" class="form-control"  />

					</div>
					</div>

					<div class="form-group row">
					<label for="hsn_code" class="col-sm-3 col-form-label">HSN:</label>
					<div class="col-sm-9">

						<input type="text" id=hsn_code name="hsn_code" class="form-control"  />

					</div>
				   </div>

				<div class="form-group row">
					<label for="comp_id" class="col-sm-3 col-form-label">Unit :</label>
					<div class="col-sm-9">

						<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
						<select name="unit" class="form-control required" id="unit">

<option value="">Select</option>

<?php

	foreach($unitdtls as $unt){

?>

	<option value="<?php echo $unt->id;?>"><?php echo $unt->unit_name;?></option>

<?php

	}

?>     

</select>


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

