<?php $fyarra=$this->session->userdata('loggedin')['fin_yr']; 
$fy=explode('-',$fyarra);
$thisyear=$fy[0];

?>
<style>
	.radio-label {
		display: inline-block;
		vertical-align: top;
		margin-right: 3%;
	}

	.radio-input {
		display: inline-block;
		vertical-align: top;
	}
</style>
<div class="wraper">

	<div class="col-md-12 container form-wraper">
		

			<div class="form-header">
				<h4>Advance Forward</h4>
			</div>
			<?php foreach($pending_amt_list as $lists) ?>
			<div class="form-group row">
                <label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>
				<div class="col-sm-2">
					<input type="date" id='trans_dt' name="trans_dt" value='<?=date("Y-m-d")?>'
					class="form-control" readonly />
				</div>
				<label for="society" class="col-sm-1 col-form-label">Society:</label>
				<div class="col-sm-3">
				<select name="society" class="form-control sch_cd required" id="society" disabled>
					<option value="">Select Society</option>
					<?php  foreach($societyDtls as $soc){   ?>
					<option value="<?php echo $soc->soc_id;?>"  <?php if($lists->soc_id == $soc->soc_id) { echo 'selected';}?>><?php echo $soc->soc_name;?></option>
					<?php
						}
					 ?>
					</select>
				</div>
			</div>
			<?php foreach($pending_amt_list as $list){?>
			<div class="form-group row">
			
			<label for="checkbox-1"><?=$list->adv_receipt_no?></label>
			<label for="" class="col-sm-2 col-form-label">Amount</label>
			<div class="col-sm-2"><?=$list->amt?></div>
			</div>		
				
		<?php }?>
			

            <div class="form-header">
                <h4>Advance Details</h4>
            </div>

            <div class="form-group row">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th style="text-align: center;width:200px">Conpany name</th>
                        <th style="text-align: center">FO</th>
                        <th style="text-align: center">Product name</th>
						<th style="text-align: center">Qty</th>
                        <th style="text-align: center">Rate</th>
                        <th style="text-align: center">Amount</th>
                        </th>
                    </thead>

                <tbody >
				<?php foreach($pending_amt_list as $lists) ?>
				        <tr>
						<td >
						<select name="comp_id" class="form-control required" id="comp_id" disabled>
					<option value="">Company Name</option>
					<?php  foreach($compdtls as $com){   ?>
					<option value="<?php echo $com->comp_id;?>" <?php if($lists->comp_id ==$com->comp_id ) echo 'selected';?> ><?php echo $com->comp_name;?></option>
					<?php
						}
					 ?>
					</select>
						</td>
						<td>
						<select name="fo_no" class="form-control" id="fo_no" disabled>
							<option value="">Select Fo Name</option>
							<?php  foreach($folist as $fo){   ?>
							<option value="<?php echo $fo->fi_id;?>"  <?php if($lists->fo_id ==$fo->fi_id ) echo 'selected';?>><?php echo $fo->fo_name;?></option>
							<?php
								}
							?>
					    </select>
						</td>
						<td>
							<select name="prod_id" class="form-control select2" id="prod_id" disabled>
					        </select>
						</td>
						<td>
						<input type="text" name="qty" class="form-control qty" id="qty" value="<?php echo $lists->qty ; ?>" readonly>
						</td>
						<td>
						<input type="text" name="rate" class="form-control rate" id="rate" value="<?php echo $lists->rate ; ?>" readonly>
						</td>
						<td>
						<input type="text" name="amount" class="form-control amount" id="amount" value="<?php echo $lists->tot_amt ; ?>" readonly>
					    </td>
						</tr>
						<?php ?>
                    </tbody>

                    <tfoot>
                        
                    </tfoot>

                </table>

            </div>
		<br>
		<div class="form-group row">
		<?php if($lists->status == 'N') { ?>
            <div class="col-sm-10">
			     <form method="POST" id="product" action="<?php echo site_url("adv/pending_amt_fwd") ?>">
				 <input type="hidden" name="soc_id" value="<?=$lists->soc_id?>">
				 <input type="hidden" name="comp_id" value="<?=$lists->comp_id?>">
				 <input type="hidden" name="prod_id" value="<?=$lists->prod_id?>">
				 <input type="hidden" name="fo_no" value="<?=$lists->fo_id?>">
				 <input type="hidden" name="amount" value="<?=$lists->tot_amt?>">
				 <input type="hidden" name="qty" value="<?=$lists->qty?>">
				 <input type="hidden" name="rate" value="<?php echo $lists->rate  ?>">
				 <input type="hidden" name="cumulative_fwd_no" value="<?=$lists->cuml_adv_no?>">
				<input type="submit" id="submit" class="btn btn-success" value="Forward" />
				</form>
			</div>
	     <?php } ?>		
		</div>   
	</div>
    
</div>
<script>
	$(".sch_cd").select2();
</script>
<script>
$(document).ready(function () {

    var i = 0;
    $("#society").change(function () {
       
		$("#intro").html('');
		$('#tot_qty').html(parseFloat('0'));
		$('#tot_amt').html(parseFloat('0'));
		
        var soc_id = $(this).val();
        $.get('<?php echo site_url("adv/f_get_society_remin_amt");?>', {
            soc_id: $(this).val()
        }).done(function (data) {
           
            $("#remain_amt_detail").html(data);
		
        });

    });
	

});

$(document).ready(function () {
	//$("#comp_id").change(function () {
		//$("#prod_id").html('');
		var selected = '';
		var comp_id = '<?=$lists->comp_id?>';
		var prod_id = '<?=$lists->prod_id?>';
		$.get('<?php echo site_url("stock/f_get_product");?>', {
			comp_id: comp_id
		}).done(function (data) {
			var string = '<option value="">Select</option>';
			$.each(JSON.parse(data), function (index, value) {
				  if(value.prod_id == prod_id){
					var selected ='selected';
				  }else{
					selected = '';
				  }
				string += '<option value="' + value.prod_id + '" '+selected+'>' + value
					.prod_desc + '</option>'
			});
			$("#prod_id").append(string);
			
		});

	//});

});

$(document).ready(function(){
	
	

	// Start code to Remove Bill row  
	$("#intro").on("click",".removeRow", function(){
			var tot = 0.00;
			var tot_qty = 0.00;
			$(this).parents('tr').remove();
			$('.amount').each(function(){
				tot += parseFloat($(this).val())?parseFloat($(this).val()):0.00;
			});
			$('#tot_amt').html(parseFloat(tot));
			$('.qty').each(function(){
				tot_qty += parseFloat($(this).val())?parseFloat($(this).val()):0.00;
			});
			$('#tot_qty').html(parseFloat(tot_qty));


			var row = $(this).closest('tr');
			var thidetail_receipt_no=row.find("td:eq(0) .detail_receipt_no").val();
			var r=1;
			
			
			$('.detail_receipt_no').each(function(){
				console.log($(this).val());
				var tvalue=$(this).val();
				if(thidetail_receipt_no == tvalue){
					r++;
				}
			});
			

			if(r > 1 ){
			
				$('#submit').removeAttr("disabled");
				$('#addrow').show();
			}else {
				
			}
	});

	//let allCheckBox = document.querySelectorAll('.custom')
    var tot_amt = 0;
//   allCheckBox.forEach((checkbox) => { 
//   checkbox.addEventListener('change', (event) => {
//     if (event.target.checked) {
// 		var id = $(this).val();
//         tot_amt += $('#'+id).val()
//               }
//             })
//         })
// 		$('#amount').val(tot_amt);





});

$("#rate").change(function () {
	var total = parseFloat($('#amount').val());
	var rate = $(this).val() ? $(this).val() : 0
	var qty = $('#qty').val(total/rate) ;



})

$(document).ajaxComplete(function(){

    var total = parseFloat($('#amount').val());
	$('input[type=checkbox]').on('change', function() {
		
		if ($(this).is(':checked')) {
			var hasil = parseFloat($(this).attr("id"));
			total = parseFloat(total)+ parseFloat(hasil);
			$('#amount').val(total);
		}else{
			var hasil = parseFloat($(this).attr("id"));
			total = parseFloat(total) - parseFloat(hasil);
			if(total > 0){
				$('#amount').val(total.toFixed(2));
			}else{
				$('#amount').val(parseFloat('0'));
			}
			
		}
     
    });

})


</script>


