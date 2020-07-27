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

			<form method="POST" action="<?php echo site_url("fertilizer/soceityAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Stock Point/Society</h4>
				
				</div>
				
				<div class="form-group row">

					<!-- <label for="prod_Id" class="col-sm-3 col-form-label">Prod_Id:</label> -->

					<div class="col-sm-9">

						<input type="hidden" id=soc_Id name="soc_Id" class="form-control"  />

					</div>
					</div>
					<div class="form-group row">
					<label for="soc_name" class="col-sm-2 col-form-label">Name:</label>

					<div class="col-sm-9">

						<input type="text" id=soc_name name="soc_name" class="form-control" required />

					</div>
					</div>

					<!-- <div class="form-group row">
					<label for="soc_add" class="col-sm-3 col-form-label">soc_add:</label>
					<div class="col-sm-9">

						<textarea id=soc_add name="soc_add" class="form-control"  ></textarea>

					</div>
					</div> -->

                    <div class="form-group row">
					<label for="soc_add" class="col-sm-2 col-form-label">Address:</label>
					<div class="col-sm-9">

						<textarea id=soc_add name="soc_add" class="form-control"  ></textarea>

					</div>
					</div>

					<div class="form-group row">
					<label for="gstin" class="col-sm-2 col-form-label">GSTIN:</label>
					<div class="col-sm-4">

						<input type="text" id=gstin name="gstin" class="form-control"  ></textarea>

					</div>
					<label for="mfms" class="col-sm-1 col-form-label">mFMS:</label>
					<div class="col-sm-4">

						<input type="text" id=mfms name="mfms" class="form-control"  ></textarea>

					</div>
					</div>
					<!-- <div class="form-group row">

					<label for="district" class="col-sm-3 col-form-label">District:</label>
					<div class="col-sm-9">

				 <select name="district" id="district" class="form-control row">

				<option value="">Select</option>

				<?php

					foreach($dist as $dlist){

				?>

					<option value="<?php echo $dlist->district_code;?>"
					<?php echo ($dlist->district_code == $fertilizer->soceity)?'selected':'';?>
					><?php echo $dlist->district_name;?></option>

				<?php

					}

				?>     

				</select>

					</div>

				</div> -->

				<div class="form-group row">
					<label for="district" class="col-sm-2 col-form-label">District :</label>
					<div class="col-sm-9">

						<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
						<select name="district" class="form-control required" id="district">

<option value="">Select</option>

<?php

	foreach($distdtls as $dis){

?>

	<option value="<?php echo $dis->district_code;?>"><?php echo $dis->district_name;?></option>

<?php

	}

?>     

</select>

				</div>
					</div>

				
					<div class="form-group row">
					<label for="ph_no" class="col-sm-2 col-form-label">Ph No:</label>
					<div class="col-sm-9">

						<input type="text" id=ph_no name="ph_no" class="form-control"  />

					</div>
					</div>
					<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">email:</label>
					<div class="col-sm-9">

						<input type="email" id=email name="email" class="form-control"  />

					</div>

				</div>
				<!-- <div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">email:</label>
					<div class="col-sm-9">

						<input type="text" id=email name="email" class="form-control"  />

					</div>

				</div> -->

				<div class="form-group row">

				<label for="stock_point_flag" class="col-sm-2 col-form-label">Stock Point:</label>

				<div class="col-sm-9">

					<select class="form-control" id="stock_point_flag" name="stock_point_flag" required>
						
						<option value="">Select</option>
						<option value="1">Yes</option>
						<option value="2">NO</option>
						
					</select>

				</div>
				</div>
				<div class="form-group row">

				<label for="buffer_flag" class="col-sm-2 col-form-label">Buffer Flag:</label>

<div class="col-sm-5">

	<select class="form-control" id="buffer_flag" name="buffer_flag" required>
		
		<option value="">Select</option>
		<option value="1">Non - Buffer</option>
		<option value="2">Benfed Buffer</option>
		<option value="3">Iffco Buffer</option>
		
	</select>

</div>

<label for="status" class="col-sm-1 col-form-label">Status:</label>

<div class="col-sm-3">

	<select class="form-control" id="status" name="status" required>
		
		<option value="">Select</option>
		<option value="1">None</option>
		<option value="2">Own</option>
		<option value="3">Rented</option>
		
	</select>

</div>
			</div>
<!-- 
			<div class="form-group row">

<label for="buffer_flag" class="col-sm-3 col-form-label">Buffer Flag:</label>

<div class="col-sm-9">

	<select class="form-control" id="buffer_flag" name="buffer_flag" required>
		
		<option value="">Select</option>
		<option value="1">Yes</option>
		<option value="2">NO</option>
		
	</select>

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

