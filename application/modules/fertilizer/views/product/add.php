
<div class="wraper">      
		
	<div class="col-md-6 container form-wraper">

		<form method="POST" action="<?php echo site_url("key/productAdd") ?>" >

			<div class="form-header">
			
				<h4>Add Product</h4>
			
			</div>

			<div class="form-group row">
				<label for="comp_id" class="col-sm-3 col-form-label">Company :</label>
				<div class="col-sm-9">

					<select name="comp_id" class="form-control required" id="comp_id">

						<option value="">Select Company</option>

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

					<select class="form-control required" id="prod_type" name="prod_type"  required>
						
						<option value="">Select Product Type</option>

						<option value="1">Chemical-Fertilizer</option>
						
						<option value="2">Organic-Fertilizer</option>

						<option value="3">Bio-Fertilizer</option>
					
					</select>
				</div>
			</div>

			
			<div class="form-group row">
				
				<label for="prod_desc" class="col-sm-3 col-form-label">Name:</label>

				<div class="col-sm-9">

					<input type="text" id=prod_desc name="prod_desc" class="form-control" required />

				</div>

			</div>

			<div class="form-group row">

				<label for="gst_rt" class="col-sm-3 col-form-label">GST Rate:</label>
				
				<div class="col-sm-9">

					<input type="text" id=gst_rt name="gst_rt" class="form-control" required />

				</div>

			</div>

			<div class="form-group row">

				<label for="hsn_code" class="col-sm-3 col-form-label">HSN:</label>

				<div class="col-sm-9">

					<input type="text" id=hsn_code name="hsn_code" class="form-control" required />

				</div>

			</div>

			<div class="form-group row">
				<label for="bag" class="col-sm-3 col-form-label">Qty per bag(In Kg) :</label>

				<div class="col-sm-9">

					<input type="text" id=bag name="bag" class="form-control" required />
				 
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