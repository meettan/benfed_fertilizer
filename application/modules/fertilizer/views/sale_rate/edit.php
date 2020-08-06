
    <div class="wraper">      
    	<div class="col-md-2 container">
           </div> 
		<div class="col-md-8 container form-wraper">

			<form method="POST" action="<?php echo site_url("fertilizer/editsalerate") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Edit Sale Rate </h4>
				
				</div>
				<div class="form-group row">
					
						<label for="comp_id" class="col-sm-2 col-form-label">Company :</label>
						<div class="col-sm-4">

							<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
							<select name="comp_id" class="form-control required" id="comp_id" disabled="" >

						<option value="">Select</option>

						<?php

							foreach($compdtls as $comp){

						?>

							<option value="<?php echo $comp->comp_id;?>" <?php if($comp->comp_id == $schdtls->comp_id){

								echo "selected";
							}?>><?php echo $comp->comp_name;?></option>

						<?php

							}

						?>     

						</select>

						</div>

							<label for="catg_id" class="col-sm-2 col-form-label">Category :</label>
						<div class="col-sm-4">

						 <input type="text" id=catg_id name="catg_id" class="form-control" value="<?=$schdtls->cate_desc?>" readonly/>
							<!-- <select name="catg_id" class="form-control required" id="catg_id" required>

							<option value="">Select</option>

							</select> -->

						</div>
						
					</div>

					<div class="form-group row">


						<label for="prod_id" class="col-sm-2 col-form-label">Product :</label>
						<div class="col-sm-4">

						 <input type="text" id=prod_desc name="prod_desc" class="form-control" value="<?=$schdtls->prod_desc?>" readonly/>
							<!-- <select name="prod_id" class="form-control required" id="prod_id" required>

							<option value="">Select</option>

							  

							</select> -->

						</div>
				
				   </div>
					
					<div class="form-group row">
						<label for="frm_dt" class="col-sm-2 col-form-label">From Date:</label>
						<div class="col-sm-4">

							<input type="date" id=frm_dt name="frm_dt" class="form-control"  value="<?=$schdtls->frm_dt?>" readonly />

						</div>
					<label for="to_dt" class="col-sm-2 col-form-label">To Date:</label>
					<div class="col-sm-4">


						<input type="date" id=to_dt name="to_dt" class="form-control" value="<?=$schdtls->to_dt?>" readonly  />

					</div>
					</div>




					<div class="form-group row">
					<label for="sp_mt" class="col-sm-2 col-form-label">Sale Price in MT:</label>
					<div class="col-sm-4">

						<input type="text" id="sp_mt" name="sp_mt" class="form-control" value="<?=$schdtls->sp_mt?>" readonly />

					</div>
					<label for="sp_bag" class="col-sm-2 col-form-label">Sale Price per Bag:</label>
					<div class="col-sm-4">

						<input type="text" id="sp_bag" name="sp_bag" class="form-control" value="<?=$schdtls->sp_bag?>" readonly />

					</div>
				   </div>

				   	<div class="form-group row">
					<label for="sp_govt" class="col-sm-2 col-form-label">Gov Sale rate:</label>
					<div class="col-sm-4">

						<input type="text" id="sp_govt" name="sp_govt" class="form-control" value="<?=$schdtls->sp_govt?>" readonly />

					</div>
					
				   </div>

					<div class="form-group row">
						<label for="salerate" class="col-sm-2 col-form-label">District:</label>

						<div class="col-sm-4">

						<input type="text" id="sp_govt" name="sp_govt" class="form-control" value="<?=$schdtls->district_name?>" readonly />

					</div>
					

						<!-- <div class="col-sm-10">
						<?php

							//foreach($distdtls as $dist){

						?>
						<div class="col-sm-2">
							

					<input type='checkbox' name='district[]' id="checkItem" value='<?php //echo $dist->district_code;?>' /><?php// echo $dist->dist_sort_code;?>

					</div>
					<?php

							//}

						?>  

						<div class="col-sm-2"><input type="checkbox" id="checkAll" > Check All </div> -->
						</div> 

						
					

				<!-- <div class="form-group row">

					<div class="col-sm-10">

						<input type="submit" class="btn btn-info" value="Save" />

					</div>

				</div> -->
	
			</form>

		</div>	

	</div>

	 <script>

$(document).ready(function(){

    //var i = 0;

    // $('#comp_id').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/f_get_product");?>',

            { 

                comp_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.PROD_ID + '">' + value.PROD_DESC + '</option>'

            });

            $('#prod_id').html(string);


          });



     // $('#comp_id').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/f_get_category");?>',

            { 

                comp_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.sl_no + '">' + value.cate_desc + '</option>'

            });

            $('#catg_id').html(string);


          });


    // });

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
$('#checkAll').click(function () {    
     $('input:checkbox').prop('checked', this.checked);    
 });
</script>