

    <div class="wraper">      

    	<div class="col-md-3"></div>
            
		<div class="col-md-6 container form-wraper">

			<form method="POST" action="<?php echo site_url("fertilizer/unitAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Unit</h4>
				
				</div>
			
				<div class="form-group row">

					<div class="col-sm-9">

						<input type="hidden" id=id name="id" class="form-control"  />

					</div>
					</div>
					<div class="form-group row">
					<label for="unit_name" class="col-sm-3 col-form-label">Name:</label>

					<div class="col-sm-9">

						<input type="text" id=unit_name name="unit_name" class="form-control" required />

					</div>
					</div>
					<!-- <div class="form-group row">
					<label for="comp_add" class="col-sm-3 col-form-label">Address:</label>

					<div class="col-sm-9">

						<textarea  id=comp_add name="comp_add" class="form-control"></textarea>

					</div>
					</div>
					<div class="form-group row">
					<label for="comp_email_id" class="col-sm-3 col-form-label">email:</label>
					<div class="col-sm-9">

						<input type="text" id=comp_email_id name="comp_email_id" class="form-control"  />

					</div>

				</div>
				<div class="form-group row">
					<label for="comp_pn_no" class="col-sm-3 col-form-label">Phone No:</label>
					<div class="col-sm-9">

						<input type="text" id=comp_pn_no name="comp_pn_no" class="form-control"  />

					</div>

				</div>
					<div class="form-group row">
					<label for="gst_no" class="col-sm-3 col-form-label">GSTIN:</label>
					<div class="col-sm-9">

						<input type="text" id=gst_no name="gst_no" class="form-control"  />

					</div>
					</div>
				
					<div class="form-group row">
					<label for="pan_no" class="col-sm-3 col-form-label">PAN No:</label>
					<div class="col-sm-9">

						<input type="text" id=pan_no name="pan_no" class="form-control"  />

					</div>

				</div> -->
				
				<div class="form-group row">

					<div class="col-sm-10">

						<input type="submit" class="btn btn-info" value="Save" />

					</div>

				</div>
	
			</form>

		</div>	

	</div>

