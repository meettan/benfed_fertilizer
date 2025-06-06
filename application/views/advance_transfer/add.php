<?php
// print_r($this->session->userdata('loggedin'));
$fyarra=$this->session->userdata('loggedin')['fin_yr']; 
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

	<div class="col-md-6 container form-wraper">

		<form method="POST" id="adv_transfer" action="<?php echo site_url("fertilizer/advance/advtransAdd") ?>">

			<div class="form-header">

				<h4>Add Advance Transfer</h4>

			</div>

			<div class="form-group row">
				<label for="society" class="col-sm-2 col-form-label">Society:</label>
				<div class="col-sm-10">

					<select name="society" class="form-control sch_cd required" id="society" required>

						<option value="">Select Society</option>

						<?php

                            foreach($societyDtls as $soc){

                        ?>

						<option value="<?php echo $soc->soc_id;?>"><?php echo $soc->soc_name;?></option>

						<?php
                            }
                        ?>
					</select>
				</div>

			</div>
			<div class="form-group row">
                <label for="receipt_no" class="col-sm-2 col-form-label">Advance No:</label>
                <div class="col-sm-4">
                    <select name="receipt_no"  class="form-control sch_cd required" id="receipt_no">
                        <option value="">Select</option>
                    </select>
                </div>
				<label for="ava_amt" class="col-sm-2 col-form-label">Balance Amount:</label>
                <div class="col-sm-4">
					<input type="text" value="" name="ava_amt"  id="ava_amt" class="form-control" readonly>
                </div>
            </div>
			<div class="form-group row">
				<label for="trans_type" class="col-sm-2 col-form-label">Transaction Type:</label>
				<div class="col-sm-4">
					<select name="trans_type" class="form-control required" id="trans_type" required>
						<option value="T">Transfer</option>
					</select>
				</div>

				<label for="adv_amt" class="col-sm-2 col-form-label">Amount:</label>
				<div class="col-sm-4">
					<input type="text" id=adv_amt name="adv_amt" class="form-control required" required />
				</div>
			</div>
			<div class="form-group row">
				<label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>
				<div class="col-sm-4">
				<input type="date" id=trans_dt name="trans_dt" class="form-control" min="<?=$thisyear?>-04-01" max="<?php $d=$thisyear+1;echo $d;?>-03-31" value="<?=date("Y-m-d") ?>" readonly required />
				</div>
			</div>
			

			<div class="col-sm-10">
				<input type="submit" id="submit" class="btn btn-info active_flag_c" value="Save" />
			</div>

	</div>

	</form>

</div>

</div>

<script>
	$(".sch_cd").select2();
</script>
<script>
	$(document).ready(function () {

		var i = 2;

		$('#bank_id').change(function () {

			$.get('<?php echo site_url("adv/f_get_dist_bnk_dtls");?>', {bnk_id: $(this).val(),})
				.done(function (data) {
					var parseData = JSON.parse(data);
					var ac_no = parseData[0].ac_no;
					var ifsc = parseData[0].ifsc;
					$('#ac_no').val(ac_no);
					$('#ifsc').val(ifsc);

				});


		});

	});
</script>
<script>
	$(".acno").hide();
	$('#ifsc').attr('disabled', true);
	$('#ac_no').attr('disabled', true);
	$('input:radio[name="cshbank"]').change(function () {
		if ($(this).val() == '1') {
			$('#referenceNo').attr('disabled', false);
			$('#referenceNo').attr('required', 'required');

			$('#bank_id').attr('disabled', false);
			$('#bank_id').attr('required', 'required');
			$('#ifsc').attr('required', 'required');
			$('#ac_no').attr('required', 'required');
			$('#ifsc').attr('disabled', false);
			$('#ac_no').attr('disabled', false);
			$(".acno").show();
		} else if ($(this).val() == '0') {

			$('#referenceNo').attr('disabled', true);
			$('#bank_id').attr('disabled', true);
			$('#ifsc').attr('disabled', true);
			$('#ac_no').attr('disabled', true);
			$(".acno").hide();
		}
	});

	$('.mindate').attr( 'min','<?=$date->end_yr ?>-<?php $month=$date->end_mnth+1; if($month==13){echo sprintf("%02d",1);}else{echo sprintf("%02d",$month);}?>-01');
</script>
<script>
    $(document).ready(function () {
        var i = 0;
        $('#society').change(function () {
            $('#overlay').fadeIn().delay(2000).fadeOut();
            $.get(
                '<?php echo site_url("fertilizer/advance/f_get_advance_no");?>',
                {
                    soc_id: $(this).val()
                }

            ).done(function (data) {

                var string = '<option value="">Select</option>';
                $.each(JSON.parse(data), function (index, value) {
                    string += '<option value="' + value.receipt_no + '">' + value
                        .receipt_no + '</option>'
                });
                $('#receipt_no').html(string);
            });
        });

		$('#receipt_no').change(function () {
			$.get(
				'<?php echo site_url("fertilizer/advance/f_get_advamt_dr_dtls");?>',
				{
					soc_id: $('#society').val() ,receipt_no:$(this).val()
				}
			).done(function (data) {
				var parseData = JSON.parse(data);
				var adv_amt = parseData[0].adv_amt;
				
				$('#ava_amt').val(adv_amt);
				if(adv_amt > 0){
					$('#submit').attr('type','submit');
				}else{
					alert('Amount is less Than Zero.Transfer is not possible');
					$('#submit').attr('type','button');
				}
			});

		});

		$('#adv_transfer').submit(function () {

			var ava_amt = $('#ava_amt').val();
			var trs_amt = $('#adv_amt').val();
			
			if(parseFloat(trs_amt) > parseFloat(ava_amt))
			{
				alert('Transfer amount Can not be grater than Balance Amount');
				event.preventDefault()
			}else{

			}
			

		});
    });
</script>

