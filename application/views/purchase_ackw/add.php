    <div class="wraper">

    	<div class="col-md-11 container form-wraper">

    		<form method="POST" action="<?php echo site_url("stock/pur_ackwadd") ?>" onsubmit="myFunction()">

    			<div class="form-header">

    				<h4>Material Acknowledge</h4>
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
					<label for="qty" class="col-sm-1 col-form-label">Indent Qty:</label>
    				<div class="col-sm-3">
    					<input type="text" style="form-control" id=qty name="qty" class="form-control" required />
    				</div>
					<label for="qty" class="col-sm-1 col-form-label">Delivery Qty:</label>
    				<div class="col-sm-3">
    					<input type="text" style="form-control" id=del_qty name="del_qty" class="form-control" required />
    				</div>
    			</div>

    			<div class="form-group row">
				<label for="qty" class="col-sm-1 col-form-label">Delivery Dt:</label>
    				<div class="col-sm-3">
					<input type="date" style="form-control" id=del_date name="del_date" class="form-control" required />
    				</div>

					<label for="qty" class="col-sm-1 col-form-label">Remain Qty:</label>
    				<div class="col-sm-3">
    					<input type="text" style="form-control" id=rem_qty name="rem_qty" class="form-control" readonly />
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


			$('#del_qty').change(function () {
                  var qty = parseFloat($('#qty').val());
				  var del_qty = parseFloat($(this).val());

					$('#rem_qty').val(parseFloat(qty-del_qty));
           });

    	});
    </script>