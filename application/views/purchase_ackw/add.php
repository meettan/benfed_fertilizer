    <div class="wraper">

    	<div class="col-md-11 container form-wraper">

    		<form method="POST" action="<?php echo site_url("stock/pur_ackwadd") ?>" onsubmit="myFunction()">

    			<div class="form-header">

    				<h4>Purchase Acknowledge</h4>
    			</div>

    			<div class="form-group row">

    				<!-- <label for="prod_Id" class="col-sm-3 col-form-label">Prod_Id:</label> -->
    				<div class="col-sm-4">
    					<input type="hidden" id=prod_Id name="prod_Id" class="form-control" />
    				</div>

    			</div>
    			<div class="form-group row">
    				<label for="comp_id" class="col-sm-1 col-form-label">Company:</label>
    				<div class="col-sm-3">
    					<select name="comp_id" class="form-control required" id="comp_id" required>

    						<option value="">Select</option>
    						<?php	foreach($compdtls as $comp){ ?>
    						<option value="<?php echo $comp->comp_id;?>">
    							<?php echo $comp->comp_name;?>
    						</option>

    						<?php  }   ?>
    					</select>
    				</div>
    				<label for="memo_no" class="col-sm-1 col-form-label">Memo No:</label>
    				<div class="col-sm-3">

    					<input type="text"  id=memo_no name="memo_no" class="form-control"  />

    				</div>
    				
    			</div>
    			<div class="form-group row">
    				<label for="prod_id" class="col-sm-1 col-form-label">Product:</label>
    				<div class="col-sm-3">
    					
    					<select name="prod_id" class="form-control sch_cd required" id="prod_id" required>
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
					<label for="qty" class="col-sm-1 col-form-label">Qty:</label>
    				<div class="col-sm-3">
    					<input type="text" style="width:200px" id=qty name="qty" class="form-control" required />
    				</div>
    			</div>

    			<div class="form-group row">
				<label for="qty" class="col-sm-1 col-form-label">No of Days:</label>
    				<div class="col-sm-3">
					<select name="no_of_days" class="form-control required" id="no_of_days" required>
						<option value="">Select</option>
						<option value="30">30 Days</option>
						<option value="60">60 Days</option>
						<option value="90">90 Days</option>
					</select>
    				</div>
    			</div>

    			<div class="form-group row">
    				<div class="col-sm-10">
    					<input type="submit" id="submit" class="btn btn-info active_flag_c" value="Save" />
    				</div>

    			</div>

    		</form>

    	</div>

    </div>

    <script>
    	$(".sch_cd").select2(); // Code For Select Write Option

    	$(document).ready(function () {

    		var i = 0;

    		$('#comp_id').change(function () {

    			$.get(

    				'<?php echo site_url("stock/f_get_product");?>',

    				{

    					comp_id: $(this).val()

    				}

    			).done(function (data) {

    				var string = '<option value="">Select</option>';

    				$.each(JSON.parse(data), function (index, value) {

    					string += '<option value="' + value.prod_id + '">' + value
    						.prod_desc + '</option>'

    				});

    				$('#prod_id').html(string);


    			});


    		});

    	});
    </script>