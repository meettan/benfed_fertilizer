<div class="wraper">      
            
	<div class="col-md-6 container form-wraper">

		<form method="POST" id="product" action="<?php echo site_url("api/get_api_cancel") ?>" >

			<div class="form-header">
			
				<h4>View IRN</h4>
			
			</div>
			<div class="form-group row">
                <label for="comp_name" class="col-sm-2 col-form-label">Company.:</label>

                <div class="col-sm-10">

                    <input type="text" id=comp_name name="comp_name" class="form-control"   
                        value="<?php echo $irnDtls->comp_name; ?>" readonly />

                </div>

            </div>
			<div class="form-group row">
                <label for="prod_desc" class="col-sm-2 col-form-label">Product.:</label>

                <div class="col-sm-10">

                    <input type="text" id=prod_desc name="prod_desc" class="form-control"   
                        value="<?php echo $irnDtls->prod_desc; ?>" readonly />

                </div>

            </div>
			<div class="form-group row">
                <label for="qty" class="col-sm-2 col-form-label">Qty.:</label>

                <div class="col-sm-4">

                    <input type="text" id=qty name="qty" class="form-control"   
                        value="<?php echo $irnDtls->qty; ?>" readonly />

                </div>
				
				<label for="sale_rt" class="col-sm-2 col-form-label">Sale Rate.:</label>

                <div class="col-sm-4">

                    <input type="text" id=sale_rt name="sale_rt" class="form-control"   
                        value="<?php echo $irnDtls->sale_rt; ?>" readonly />

                </div>

            </div>
			<div class="form-group row">
                <label for="tot_amt" class="col-sm-2 col-form-label">Total Amt:</label>

                <div class="col-sm-4">

                    <input type="text" id=tot_amt name="tot_amt" class="form-control"   
                        value="<?php echo $irnDtls->round_tot_amt; ?>" readonly />

                </div>

				<label for="ack_dt" class="col-sm-2 col-form-label">Ack Date:</label>

                  <div class="col-sm-4">
	              <input type="text" id=ack_dt name="ack_dt" class="form-control" 
		           value="<?php echo $irnDtls->ack_dt; ?>" readonly />

             </div>

				</div>

            <div class="form-group row">
                <label for="ack" class="col-sm-2 col-form-label">Ack No.:</label>

                <div class="col-sm-10">

                    <input type="text" id=ack name="ack" class="form-control"   
                        value="<?php echo $irnDtls->ack; ?>" readonly />

                </div>

            </div>

           	<div class="form-group row">
				<label for="irn" class="col-sm-2 col-form-label">IRN No.:</label>
				<div class="col-sm-10">

				<input type="text" id=irn name="irn" class="form-control irn" 
				value="<?php echo $irnDtls->irn; ?>" readonly/>
										
									
				</div>
			</div>
           
			<div class="form-group row">
				<label for="CnlRsn" class="col-sm-2 col-form-label">Cancel Reason:</label>
				<div class="col-sm-4">

                    <select name="CnlRsn" class="form-control required" id="CnlRsn">

                        <option value="1"<?php echo($irnDtls->irn_cnl_reason=='1')?'selected':'';?>>Duplicate</option>
                        <option value="2"<?php echo($irnDtls->irn_cnl_reason=='2')? 'selected' : '';?>>Data entry mistake</option>
						<option value="3"<?php echo($irnDtls->irn_cnl_reason=='3')? 'selected' : '';?>>Order Cancelled</option>
						<option value="4"<?php echo($irnDtls->irn_cnl_reason=='4')? 'selected' : '';?>>Others</option>
                    </select>

				</div>
				<label for="brn" class="col-sm-2 col-form-label">District.:</label>
				<div class="col-sm-4">

				<input type="text" id=brn name="brn" class="form-control brn" 
				value="<?php echo $irnDtls->district_name; ?>" readonly/>
										
									
				</div>
			</div>
			<div class="form-group row">
				<label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
				<div class="col-sm-10">

                    <textarea id=remarks name="remarks" class="form-control"><?php echo $irnDtls->irn_cnl_rem; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
           
           <div>

				<div class="col-sm-10">

					<input type="submit" id="submit" class="btn btn-info cancel" value="Cancel"  />

				</div>

			</div>

		</form>

	</div>	

</div>

<script>

    $(document).ready( function (){

        $('.cancel').click(function () {

			var x = confirm("Do you really want to delete this record?");
			if (x)
			return true;
			else
			return false;
            
            // var id = $(this).attr('id');
            // // window.alert("<?php echo $this->session->flashdata('msg'); ?>");
            // var result = confirm("Do you really want to delete this record?");
           
            // if(result) {

            // window.location = "<?php echo site_url('api/get_api_cancel');?>";

            // }else{
			// 	redirect('irncan');
			// }
            
        });

    });

	// function check() {
	//     var x = confirm("Are you sure you want to delete?");
	//     if (x)
	// 	return true;
	//     else
	// 	return false;
	// }
	// function _edit(pronote_no, memo_no){
	//   // pronote_no = encodeURIComponent(pronote_no);
	//   // memo_no = encodeURIComponent(memo_no);
	//   console.log(pronote_no);
	//   console.log(memo_no);
	//  // location.href = "<?= base_url(); ?>index.php/dc/dc_entry/" + pronote_no + "/" + memo_no;
	// }

</script>


