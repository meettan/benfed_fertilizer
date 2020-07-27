
    <div class="wraper">      

	<div class="col-md-6 container form-wraper">

		
		<form method="POST" action="<?php echo site_url("finance/accountAdd");?> "onsubmit="return valid_data()" >

			<div class="form-header">
                
				<h4>Add Account Head</h4>
			
			</div>

			<div class="form-group row">

				<label for="acc_type" class="col-sm-3 col-form-label">Account Type:</label>

				<div class="col-sm-9">

					<select class="form-control" id="acc_type" name="acc_type" required>

						<option value="">Select</option>
						<option value="1">Liability</option>
						<option value="2">Assets</option>
						<option value="3">Purchase</option>
						<option value="4">Sale</option>
						<option value="5">Income</option>
						<option value="6">Expense</option>
					
					</select>

				</div>

			</div>

			<div class="form-group row">

				<label for="schedule_cd" class="col-sm-3 col-form-label">Schedule:</label>

				<div class="col-sm-9">

					<select class="form-control" id="sch_cd" name="schedule_cd" required>
						
						<option value='0'>Select Schedule</option>

						<?php
							foreach($row as $value){
								echo "<option value=".$value->schedule_code.">".$value->schedule_type."</option>"; 
							}	
						?>
					</select>

				</div>

			</div>

			<div class="form-group row">

				<label for="subschedule_cd" class="col-sm-3 col-form-label">Subschedule:</label>

				<div class="col-sm-9">

					<select class="form-control" id="subsch_cd" name="subschedule_cd" required >
						
						<option value='0'>Select Subschedule</option>

						<?php
							foreach($row1 as $value){
								echo "<option value=".$value->subschedule_code.">".$value->subschedule_type."</option>"; 
							}	
						?>
					</select>

				</div>

			</div>

			<div class="form-group row">

				<label for="ac_type" class="col-sm-3 col-form-label">A/c Head Name:</label>

				<div class="col-sm-9">

					<input type="text" class="form-control" id="ac_name" name="ac_name" required/>

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

	<script>
	function valid_data(){
		var x = document.getElementById('sch_cd').value;
		
	        if(x.trim()=='0'){
			alert("Please Supply A Valid Schedule");
		        return false;
		}

		var y = document.getElementById('ac_type').value;
		
		if(y.trim()==''){
			alert('Please Supply Name of A/c Head');
			return false;
		}
		
		var z = document.getElementById('ac_flg').value;

                if(z.trim()=='0'){
                        alert('Please Supply A/c Flag');
                        return false;
                }else{
                        return true;
		}       
	}
</script>

<script>

	$("#sch_cd").select2({

		placeholder: "Select Schedule",
		allowClear: true

	});

	$('#acc_type').change(function(){

		$.post('<?php echo site_url("finance/schedule");?>',{ acc_type: $(this).val()}).done(function(data){

					var string = '<option value="">Select</option>';

					$.each(JSON.parse(data), function( index, value ) {

						string += '<option value="' + value.schedule_code + '">' + value.schedule_type + '</option>'

					});

					$('#sch_cd').html(string);
		});
	});

	$( "#subsch_cd" ).select2({

		placeholder: "Select Subschedule",
		allowClear: true

	});

	$('#sch_cd').change(function(){

		$.post('<?php echo site_url("finance/subschedule");?>',{sch_cd: $(this).val()}).done(function(data){

					var string = '<option value="">Select</option>';

					$.each(JSON.parse(data), function( index, value ) {

						string += '<option value="' + value.subschedule_code + '">' + value.subschedule_type + '</option>'

					});

					$('#subsch_cd').html(string);
		});
	});

</script>
