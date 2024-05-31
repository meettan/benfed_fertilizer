    <div class="wraper">

    	<div class="col-md-11 container form-wraper">

    		<form method="POST" action="<?php echo site_url("stock/pur_ackwedit") ?>" onsubmit="myFunction()">

    			<div class="form-header">

    				<h4>Edit Material Acknowledge</h4>
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
	<select name="comp_id" class="form-control required" id="comp_id" disabled>
		<option value="">Select Company</option>
		<?php
		foreach($compdtls as $comp){

	?>
<option value="<?php echo $comp->comp_id;?>" 
	<?php if($comp->comp_id == $mempDtls->comp_id) {echo "Selected";}?>>
	<?php echo $comp->comp_name;  ?></option>
    <?php
}
?>
    </select>
 </div>
    				<label for="memo_no" class="col-sm-1 col-form-label">Memo No:</label>
    				<div class="col-sm-3">
					<input type="text" id=memo_no name="memo_no" class="form-control"
                        value="<?php echo $mempDtls->memo_no; ?>" readonly />
    				</div>
    				
    			</div>
    			<div class="form-group row">
    				<label for="prod_id" class="col-sm-1 col-form-label">Product:</label>
    				<div class="col-sm-3">
    					
					<select name="comp_id" class="form-control required" id="comp_id" disabled>
		<option value="">Select Product</option>
		<?php
		foreach($proddtls as $prod){

	?>
<option value="<?php echo $prod->prod_id;?>"
	<?php if($prod->prod_id == $mempDtls->prod_id) {echo "Selected";}?>>
	<?php echo $prod->prod_desc;?></option>
    <?php
}
?>
    </select>
    				</div>
					<label for="qty" class="col-sm-1 col-form-label">Indent Qty:</label>
    				<div class="col-sm-3">
					<input type="text" id=qty name="qty" class="form-control"
                        value="<?php echo $mempDtls->qty; ?>" readonly />
    				</div>
					<label for="qty" class="col-sm-1 col-form-label">Delivery Qty:</label>
    				<div class="col-sm-3"><input type="text" id=del_qty name="del_qty" class="form-control"
                        value="<?php echo $mempDtls->del_qty; ?>" readonly />
						<!-- <input type="text" style="form-control" id=del_qty name="del_qty" class="form-control" required /> -->
    				</div>
    			</div>

    			<div class="form-group row">
				<label for="qty" class="col-sm-1 col-form-label">Delivery Dt:</label>
    				<!-- <div class="col-sm-3"> -->
					<div class="col-sm-3">

<input type="date" id=trans_dt name="del_dt" class="form-control"
	value="<?php echo $mempDtls->del_dt; ?>" required readonly/>

</div>
    				<!-- </div> -->

					<label for="qty" class="col-sm-1 col-form-label">Remain Qty:</label>
    				<div class="col-sm-3">
					<input type="text" id=rem_qty name="rem_qty" class="form-control"
                        value="<?php echo $mempDtls->del_qty -  $mempDtls->qty; ?>" readonly />
    				</div>
    			</div>

    			<div class="form-group row">
    				<!-- <div class="col-sm-10">
    					<input type="submit" id="submit" class="btn btn-info active_flag_c" value="Save" />
    				</div> -->
					<div class="col-sm-2">
                <a href="<?php echo base_url();?>index.php/stock/purackdtladd?memo_no=<?php echo $mempDtls->memo_no; ?>&prod_id=<?php echo $mempDtls->prod_id;?> "
                    class="btn btn-success">Detail Entry</a>

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