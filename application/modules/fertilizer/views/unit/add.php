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

			<form method="POST" action="<?php echo site_url("fertilizer/unitAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Unit</h4>
				
				</div>
				<!-- <div class="form-group row">

				<label for="Prod_type" class="col-sm-3 col-form-label">Prod_type:</label>

				<div class="col-sm-9">

					<select class="form-control" id="prod_type" name="prod_type" required>
						
						<option value="">Select</option>
						<option value="1">Organic - Fertilizer</option>
						<option value="2">Bio- Fertilizer</option>
						<option value="3">Others</option>
						<option value="4">Sale</option>
						<option value="5">Income</option>
						<option value="6">Expense</option>
					
					</select>

				</div>

			</div>  -->

				<div class="form-group row">

					<!-- <label for="comp_Id" class="col-sm-3 col-form-label">comp_Id:</label> -->

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

