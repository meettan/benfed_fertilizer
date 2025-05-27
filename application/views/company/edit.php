    <div class="wraper">  
        

        <div class="col-md-5 container form-wraper">
            <form method="POST" id="form" action="<?php echo site_url("key/editcompany");?>" >

                <div class="form-header">
                    <h4>Edit Company</h4>
                </div>

                <div class="form-group row">
                    <label for="comp_id" class="col-sm-2 col-form-label">Company ID:</label>
                    <div class="col-sm-10">
                        <input type="text" name="comp_id" class="form-control required"  
                        value = "<?php echo $schdtls->comp_id; ?>" readonly
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="comp_name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="comp_name" class="form-control required"  
                            value = "<?php echo $schdtls->comp_name; ?>" 
                        />
		            </div>
	      	    </div>

                <div class="form-group row">

                    <label for="short_name" class="col-sm-2 col-form-label">Abbreivited Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="short_name" class="form-control required"  
                            value = "<?php echo $schdtls->short_name; ?>" readonly
                        />
                    </div>
                </div>
                          
                <div class="form-group row">
                    <label for="comp_add" class="col-sm-2 col-form-label">Address:</label>
                    <div class="col-sm-10">
                        <textarea name="comp_add" class="form-control required"><?php echo $schdtls->comp_add; ?></textarea >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="comp_email_id" class="col-sm-2 col-form-label">email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="comp_email_id" class="form-control required"  
                            value = "<?php echo $schdtls->comp_email_id; ?>" 
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="comp_pn_no" class="col-sm-2 col-form-label">Phone No:</label>
                    <div class="col-sm-10">
                        <input type="text" name="comp_pn_no" class="form-control required"  
                            value = "<?php echo $schdtls->comp_pn_no; ?>" 
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gst_no" class="col-sm-2 col-form-label">GSTIN NO:</label>
                    <div class="col-sm-4">
                        <input type="text" style="width:170px;" name="gst_no" class="form-control required"  
                            value = "<?php echo $schdtls->gst_no; ?>" />
                    </div>

                    <label for="cin" class="col-sm-2 col-form-label"> CIN:</label>
                    <div class="col-sm-4">
                        <input type="text" style="width:170px;" name="cin" class="form-control required"  
                            value = "<?php echo $schdtls->cin; ?>" 
                        />
                    </div>
                </div>
                  

                <div class="form-group row">
                    <label for="mfms" class="col-sm-2 col-form-label"> mFMS ID:</label>
                    <div class="col-sm-4">
                        <input type="text" style="width:170px;" name="mfms" class="form-control required"  
                            value = "<?php echo $schdtls->mfms; ?>" 
                        />
                    </div>
                    <label for="pan_no" class="col-sm-2 col-form-label">PAN:</label>
                    <div class="col-sm-4">
                        <input type="text" style="width:170px;" name="pan_no" class="form-control required"  
                            value = "<?php echo $schdtls->pan_no; ?>" />
                    </div>
                </div>
                <div class="form-group row">

                    <label for="bank_name" class="col-sm-2 col-form-label">Bank:</label>
                    <div class="col-sm-4">
                        <input type="text"  name="bank_name" class="form-control required"  
                            value = "<?php echo $schdtls->bank_name; ?>" />
                    </div>

                    <label for="bnk_branch_name" class="col-sm-2 col-form-label">Branch:</label>
                    <div class="col-sm-4">
                        <input type="text"  name="bnk_branch_name" class="form-control required"  
                            value = "<?php echo $schdtls->bnk_branch_name; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ac_no" class="col-sm-2 col-form-label">Ac. No.:</label>
                    <div class="col-sm-4">
                        <input type="text"  name="ac_no" class="form-control required"  
                            value = "<?php echo $schdtls->ac_no; ?>" />
                    </div>
                    <label for="ifsc" class="col-sm-2 col-form-label">IFSC:</label>
                    <div class="col-sm-4">
                        <input type="text"  name="ifsc" class="form-control required"  
                            value = "<?php echo $schdtls->ifsc; ?>" />
                    </div>
                </div>
                       
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-info active_flag_c" value="Save" />
                    </div>
                </div>
            </form>
        </div>

        <?php if($schdtls->comp_id == 4 OR $schdtls->comp_id == 10 OR $schdtls->comp_id == 9) { ?>
        <div class="col-md-7">
             <form method="POST" id="form" action="<?php echo site_url("key/addeditprodcat");?>" >
            <div class="form-group row">
            <input type="hidden" name="comp_id" class="form-control"  value = "<?php echo $schdtls->comp_id; ?>">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th style="text-align: center">Category</th>
                        <th style="text-align: center">Bank</th>
                        <th style="text-align: center">Branch</th>
						<th style="text-align: center">Ac. No.</th>
                        <th style="text-align: center">IFSC</th>
                        <th><button class="btn btn-success" type="button" id="addrow" style="border-left: 10px"
                                data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                        </th>
                    </thead>
                    <tbody id="intro">
                    <?php foreach($pccadtls as $pcca) { ?>    
                      <tr>
					<td >
                        <select name="" class="form-control" required>
                        <option value="">Please select category </option>
                        <?php foreach($catdtls as $cat) { ?>
                            <option value="<?=$cat->id?>" <?php if($cat->id == $pcca->cat_id) echo 'selected'; ?> ><?=$cat->type_name?> </option>
                            <?php } ?>
                        </select>
                      
                    </td>
					<td><input type="text" name="" class="form-control" value='<?=$pcca->bank_name?>' ></td>
					<td><input type="text" name="" class="form-control" value='<?=$pcca->bnk_branch_name?>' ></td>
					<td><input type="text" name="" class="form-control" value='<?=$pcca->ac_no?>'></td>
					<td><input type="text" name="" class="form-control"value='<?=$pcca->ifsc?>'></td>
                    <td><button type="button" name="delete_5" class="delete" id="<?=$pcca->id;?>,<?=$schdtls->comp_id;?>" 
						            data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                        </button>
                    </td>
				    </tr> 
                    <?php } ?> 
					<tr>
					<td >
                        <select name="cat_id[]" class="form-control" required>
                        <option value="">Please select category </option>
                        <?php foreach($catdtls as $cat) { ?>
                            <option value="<?=$cat->id?>"><?=$cat->type_name?> </option>
                            <?php } ?>
                        </select>
                      
                    </td>
					<td><input type="text" name="bank_name[]" class="form-control" value='' ></td>
					<td><input type="text" name="bnk_branch_name[]" class="form-control" value='' ></td>
					<td><input type="text" name="ac_no[]" class="form-control" value=''></td>
					<td><input type="text" name="ifsc[]" class="form-control"value=''></td>
				    </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
                    
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-info" value="Save" />
                    </div>
                </div>
                </form>
           </div>
        <?php } ?>


    </div>


    <script>

$(document).ready(function() {

<?php if($this->session->flashdata('msg')){ ?>

window.alert("<?php echo $this->session->flashdata('msg'); ?>");
<?php } ?>
});




$('.delete').click(function () {
		
		var id = $(this).attr('id');
		console.log(id);
		var result = confirm("Do you really want to delete this record?");
		if(result) {
			window.location = "<?php echo site_url('key/pccaDel?data="+id+"');?>";
		}
		
	});

        $("#addrow").click(function()
	{
		var comp = $('#comp_id').val();
        var prd = $('#prod_id').val();
				var string = '<option value="">Please select category </option>';
                <?php foreach($catdtls as $cat) { ?>
                    string += '<option value="<?=$cat->id?>"><?=$cat->type_name?></option>';
                    <?php } ?>
				var newElement1= '<tr>'
								+'<td id= "detail_receipt_no" >'
									+'<select name="cat_id[]" class="form-control" required>'
										+string
									+'</select>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="bank_name[]" class="form-control" >'
								+'</td>'
								+'<td>'
									+'<input type="text" name="bnk_branch_name[]" class="form-control" >'
								+'</td>'
								+'<td>'
									+'<input type="text" name="ac_no[]" class="form-control"  style="" >'
								+'</td>'
								+'<td>'
									+'<input type="text" name="ifsc[]" class="form-control" >'
								+'</td>'
								+'<td>'
									+'<button class="btn btn-danger removeRow" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
								+'</td>'
							+'</tr>';

				$("#intro").append($(newElement1));
			//	$('.select2').select2();
	});
    $("#intro").on("click",".removeRow", function(){
		
			$(this).parents('tr').remove();
	});

    </script>


