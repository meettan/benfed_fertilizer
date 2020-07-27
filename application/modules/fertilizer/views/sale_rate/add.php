
    <div class="wraper">      
            
		<div class="col-md-6 container form-wraper">

			<form method="POST" action="<?php echo site_url("fertilizer/salerateAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Sale Rate</h4>
				
				</div>
				<div class="form-group row">
					<label for="district" class="col-sm-3 col-form-label">District :</label>
					<div class="col-sm-9">

						<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
						<select name="district" class="form-control required" id="district" required>

<option value="">Select</option>

<?php

	foreach($distdtls as $dist){

?>

	<option value="<?php echo $dist->district_code;?>"><?php echo $dist->district_name;?></option>

<?php

	}

?>     

</select>

					</div>
					</div>

				<div class="form-group row">
					<label for="comp_id" class="col-sm-3 col-form-label">Company :</label>
					<div class="col-sm-9">

						<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
						<select name="comp_id" class="form-control required" id="comp_id" required>

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
					<label for="prod_id" class="col-sm-3 col-form-label">Product :</label>
					<div class="col-sm-9">

						<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
						<select name="prod_id" class="form-control required" id="prod_id" required>

<option value="">Select</option>

<?php

	foreach($proddtls as $prod){

?>

	<option value="<?php echo $prod->prod_id;?>"><?php echo $prod->prod_desc;?></option>

<?php

	}

?>     

</select>

					</div>
					</div>
					<div class="form-group row">
					<label for="frm_dt" class="col-sm-3 col-form-label">From Date:</label>
					<div class="col-sm-9">

						<input type="date" id=frm_dt name="frm_dt" class="form-control"  required />

					</div>
					</div>
					<div class="form-group row">
					<label for="to_dt" class="col-sm-3 col-form-label">To Date:</label>
					<div class="col-sm-9">


						<input type="date" id=to_dt name="to_dt" class="form-control" onchange="DateCheck();" required />

					</div>
					</div>

					<div class="form-group row">
					<label for="salerate" class="col-sm-3 col-form-label">Sale Rate:</label>
					<div class="col-sm-9">

						<input type="text" id=rate name="rate" class="form-control" required />

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

$(document).ready(function(){

    var i = 0;

    $('#comp_id').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/f_get_product");?>',

            { 

                comp_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.prod_id + '">' + value.prod_desc + '</option>'

            });

            $('#prod_id').html(string);


          });


    });

});
</script> 
<script>
function DateCheck()
{
  var StartDate= document.getElementById('frm_dt').value;
  var EndDate= document.getElementById('to_dt').value;
  var eDate = new Date(EndDate);
  var sDate = new Date(StartDate);
  if(StartDate!= '' && StartDate!= '' && sDate> eDate)
    {
		
    alert("Please ensure that the To Date is greater than or equal to the From Date.");
	
    $("#to_dt").val('');
	// document.getElementById('to_dt').value
    }
}

</script>