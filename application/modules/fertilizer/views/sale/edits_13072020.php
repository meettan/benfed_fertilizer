<div class="wraper">      
            
			<div class="col-md-12 container form-wraper">
	
				<form method="POST" action="<?php echo site_url("fertilizer/saleedit") ?>" onsubmit="return valid_data()">
	
					<div class="form-header">
					
						<h4>Edit Sale</h4>
					
					</div>
	<?php
                    foreach($prod_dtls as $prodd)
                    ?>
					<div class="form-group row">
	

						<div class="col-sm-4">
	
					</div>
						
						</div>
	
						<div class="form-group row">
						<label for="soc_id" class="col-sm-2 col-form-label">Society :</label>
						<div class="col-sm-4">
	
							<select name="soc_id" class="form-control required" id="soc_id" disabled>
	
	<option value="">Select</option>
	
	<?php
	
		foreach($socdtls as $soc){
	
	?>
	
		<option value="<?php echo $soc->soc_id;?>"  <?php if($prodd->soc_id==$soc->soc_id) echo "selected" ?>><?php echo $soc->soc_name;?></option>
	
	<?php
	
		}
	
	?>     
	
	</select>
						</div>
						<label for="gstin" class="col-sm-2 col-form-label">GSTIN:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:200px" id=gstin name="gstin" class="form-control" readonly />
	
						</div>
						
						</div>
	
						<div class="form-group row">
						<label for="soc_add" class="col-sm-2 col-form-label">Address:</label>
						<div class="col-sm-4">
	
					<textarea style="width:230px;height:100px"  id=soc_add name="soc_add" class="form-control" readonly /></textarea>
	
						</div>
						 <label for="cin" class="col-sm-2 col-form-label">Transaction Type:</label>
						<div class="col-sm-3">
	
						<select name="trans_type" class="form-control" disabled>
                            <option value="Credit" <?php if($prodd->trans_type=="Credit") echo "selected" ?>  >Credit</option>
                            <option value="Cash" <?php if($prodd->trans_type=="Cash") echo "selected" ?>>Cash</option>
                        </select>
	
						</div> 
                    
                        
					  </div>
                      <div class="form-group row">
                      <label for="trans_do" class="col-sm-2 col-form-label">Sale Ro:</label>
						<div class="col-sm-3">
	
		<input type="text" style="width:200px" id=trans_ro name="trans_do" class="form-control" value="<?=$prodd->trans_do?>" readonly/>
	                    </div>
                      <label for="do_dt" class="col-sm-3 col-form-label">Sale Ro Date:</label>
						<div class="col-sm-4">
	
				<input type="date" style="width:200px" id=ro_dt name="ro_dt" class="form-control"  value="<?=$prodd->do_dt?>"/>
	                    </div>
                        </div>

                         <div class="form-group row">
                      <label for="trans_do" class="col-sm-2 col-form-label">Sale Due Date:</label>
                        <div class="col-sm-3">
    
                     <input type="date" style="width:200px" name="sale_due_dt" class="form-control"  value="<?=$prodd->sale_due_dt?>"/>
                        </div>
                     
                        
                        </div>

						<div class="form-header">
					
					<h4>Ro And Product Details</h4>
				
				</div>
                <hr>

                <div class="row" style ="margin: 5px;">

                    <div class="form-group">

                        <table class= "table table-striped table-bordered table-hover">

                            <thead>

                                <th style= "text-align: center">Ro</th>
                                <th style= "text-align: center">Product</th>
                                <th style= "text-align: center">Stock Qty</th>
                                <th style= "text-align: center">Qty</th>
								<th style= "text-align: center">Sale Rate</th>
								<th style= "text-align: center">Taxable Amt</th>
								<th style= "text-align: center">CGST</th>
								<th style= "text-align: center">SGST</th>
                                <th style= "text-align: center">Dis</th>
								<th style= "text-align: center">Total Amt</th>
                         

                            </thead>

                            <tbody id= "intro">
      <?php          $sum=0;
                    foreach($prod_dtls as $prodd)
                    { ?>
                                <tr>
                                
                                    <td>    
                                    
            <select name="ro[]" id="ro" style="width:150px"class="form-control required ro" required >
                <option value="">Select Project</option>
                <?php
                    foreach($rodtls as $key1)
                    { ?>
                        <option value="<?php echo $key1->ro_no; ?>" <?php if($prodd->sale_ro==$key1->ro_no) echo "selected" ?> ><?php echo $key1->ro_no; ?></option>
                    <?php
                    } ?>
            </select> 
                                    </td>

                                    <td>    
                                      
            <select name="prod_id[]" id="prod_id" style="width:150px"class="form-control required prod_id" required >
                <option value="">Select product</option>
                <?php
                    foreach($proddtls as $key1)
                    { ?>
                        <option value="<?php echo $key1->prod_id; ?>" <?php if($prodd->prod_id==$key1->prod_id) echo "selected" ?> ><?php echo $key1->prod_desc; ?></option>
                    <?php
                    } ?>c
            </select> 
                                        
                            </td>

                                    <td>
              <input type="text" name="stock_qty[]" class="form-control required stock_qty" value="<?php echo $this->FertilizerModel->js_get_stock_qty($prodd->sale_ro)->qty;
              ?>" id="stock_qty" required > 
                                    </td>

                                    <td>
              <input type="text" name="qty[]" class="form-control required qty" value="<?=$prodd->qty?>" id="qty" required>
                                    </td>
									<td>
              <input type="text" name="sale_rt[]" class="form-control required sale_rt" value="<?=$prodd->sale_rt?>" id="sale_rt" required>
                                    </td>
									<td>
                <input type="text" name="taxable_amt[]" class="form-control required taxable_amt" value="<?=$prodd->taxable_amt?>" id="taxable_amt" required>
                                    </td>
									<td>
                  <input type="text" name="cgst[]" class="form-control required cgst" value= "<?=$prodd->cgst?>" id="cgst" required>
                                    </td>
									<td>
                  <input type="text" name="sgst[]" class="form-control required sgst" value= "<?=$prodd->sgst?>" id="sgst" required>
                                    </td>
                    <td>
                       <input type="text" name="dis[]" class="form-control dis" value="<?=$prodd->dis?>" id="dis" required>
                       </td>
									<td>
                 <input type="text" name="tot_amt[]" class="form-control tot_amt required" value="<?php echo $prodd->tot_amt;
                                        $sum +=$prodd->tot_amt; ?>" id="tot_amt" required>
                                    </td>
                                   
                                </tr>

<?php } ?>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <strong>Total:</strong>
                                    </td>
                                    <td colspan="2">
                       <input name="total" style="width:200px;" id="total" class="form-control total" placeholder="Total" value="<?=$sum?>">  
                                    </td>
                                </tr>
                            </tfoot>
                    
                        </table>

                    </div> 

                </div>

                
                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" id= "submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </form>


        </div>

    </div>

</div>



<!-- For Add row table -->
<script>

    $(document).ready(function(){

        // For add row option
        $('#addrow').click(function(){

            var newElement = '<tr>'
                                +'<td>'
                               +'<select name="ro[]" id="ro" style="width:150px"class="form-control required ro" required>'
                +'<option value="">Select Project</option>'
                +'<?php
                   foreach($rodtls as $key1)
                  { ?>'
                       +' <option value="<?php echo $key1->ro_no; ?>"><?php echo $key1->ro_no; ?></option>'
                  +'<?php
                   } ?>'
           +'</select> '
                                +'</td>'
                                +'<td>'
                                    +'<select name="prod_id[]" id="prod_id" style="width:150px"class="form-control required prod_id" required>'
                +'<option value="">Select Product</option>'
                +'<?php
                   foreach($proddtls as $key1)
                  { ?>'
                       +' <option value="<?php echo $key1->prod_id; ?>"><?php echo $key1->prod_desc; ?></option>'
                  +'<?php
                   } ?>'
           +'</select> '
                                +'</td>'
                                +'<td>'
                                    +'<input type="text" name="stock_qty[]" class="form-control required stock_qty" value= "" id="stock_qty" required>'
                                +'</td>'
                                +'<td>'
                                    +'<input type="text" name="qty[]" class="form-control required qty" value= "" id="qty" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="sale_rt[]" class="form-control required sale_rt" value= "" id="sale_rt" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="taxable_amt[]" class="form-control required taxable_amt" value= "" id="taxable_amt" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="cgst[]" class="form-control required cgst" value= "" id="cgst" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="sgst[]" class="form-control required sgst" value= "" id="sgst" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="tot_amt[]" class="form-control tot_amt required" value= "" id="tot_amt" required>'
                                +'</td>'
                                +'<td>'
                                    +'<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
                                +'</td>'
                            '</tr>';

            $("#intro").append($(newElement));

        });

        // For remove row 
        $("#intro").on("click","#removeRow", function(){
            $(this).parents('tr').remove();
            $('.total').change();
        });

        // For getting total amount after giving nt_amount
        $('#nt').on("change", function(){
            var total = $(this).val();
            $('#total').val(total);
        })


        // For getting total calculation after remove row
        $('.total').change(function(){

            var total = $('#nt').val();
            var ntAmount = $('#nt').val();
            $('.cgst_val').each(function(){

                var curr_gst_val = $(this).val();
                total = parseFloat(total)+parseFloat(parseFloat(curr_gst_val)*2);
                //console.log(total);

            })
            $('#total').val(parseFloat(total).toFixed());

            // Checking whather total to sub_amnt exeeds NT Rs or not-- 
            //var total_subAmnt = $('#sub_amnt').val();
            var total_subAmnt = 0;
            $('.sub_amnt').each(function(){

                var tot_sub_amnt = $(this).val();
                total_subAmnt = parseFloat(total_subAmnt)+parseFloat(tot_sub_amnt);
                
                if(parseFloat(ntAmount)<parseFloat(total_subAmnt))
                {
                    $('#nt').css('border-color', 'red');
                    $('#submit').prop('disabled', true);
                    return false;
                }
                else
                {
                    $('#nt').css('border-color', 'green');
                    $('#submit').prop('disabled', false);
                    return true;
                }

                
            })

        });

    })

</script>


<script>

$(document).ready(function(){

	var i = 2;

	$('#soc_id').change(function(){

		$.get( 

			'<?php echo site_url("fertilizer/f_get_soc");?>',
			{ 

				soc_id: $(this).val(),

			}

		)
		.done(function(data){

			var parseData = JSON.parse(data);
			var gstin = parseData[0].gstin;
			var soc_add= parseData[0].soc_add;
			var cin= parseData[0].cin;
			$('#gstin').val(gstin);
			$('#soc_add').val(soc_add);
			
		});

	});

});

$(document).ready(function(){

		$.get( 

			'<?php echo site_url("fertilizer/f_get_soc");?>',
			{ 

				soc_id: <?=$prodd->soc_id?>,

			}

		)
		.done(function(data){

			var parseData = JSON.parse(data);
			var gstin = parseData[0].gstin;
			var soc_add= parseData[0].soc_add;
			var cin= parseData[0].cin;
			$('#gstin').val(gstin);
			$('#soc_add').val(soc_add);
		});
	});

</script>




<script>

    $(document).ready(function()
    {
        $('#intro').on( "change", ".ro", function()
        {
         
            $.get('<?php echo site_url("fertilizer/js_get_stock_qty");?>',{ ro: $(this).val() })
                                                                            
            .done(function(data)
            {
                 //console.log(data);
                var unitData = JSON.parse(data);
                 console.log(unitData);
                $('.stock_qty').eq($('.ro').index(this)).val(unitData.qty); 
                $('.prod_id').eq($('.ro').index(this)).val(unitData.prod_id); 
                $('.gst_rt').eq($('.ro').index(this)).val(unitData.gst_rt); 
                $('.qty').eq($('.ro').index(this)).val(0);  
                $('.sale_rt').eq($('.ro').index(this)).val(0);  
                $('.taxable_amt').eq($('.ro').index(this)).val(0);
                $('.cgst').eq($('.ro').index(this)).val(0);  
                $('.sgst').eq($('.ro').index(this)).val(0);
                $('.tot_amt').eq($('.ro').index(this)).val(0);
            
            });

        });

    });


</script>
<script>

$(document).ready(function()
{
    $('#intro').on( "change", ".sale_rt", function()
    {
      
           var sum    = 0;
       var gst_rt=$('.gst_rt').eq($('.ro').index(this)).val();
       var qty = $('.qty').eq($('.ro').index(this)).val();
       var sale_rt = $('.sale_rt').eq($('.ro').index(this)).val();
       var taxable_amt= parseFloat(qty * sale_rt).toFixed('2');
       var cgst =parseFloat(taxable_amt * gst_rt/100/2).toFixed('2')
       var tot_amt = parseFloat(taxable_amt + cgst*2).toFixed('2')
     var total =0.00;
     total = parseFloat(total) + parseFloat(tot_amt); 
       
        $.get('<?php echo site_url("fertilizer/js_get_stock_qty");?>',{ ro: $(this).val() })

                                                                  
        .done(function(data)
        {
             console.log(data);
            var unitData = JSON.parse(data);
                     
            $('.taxable_amt').eq($('.ro').index(this)).val(taxable_amt);
            $('.cgst').eq($('.ro').index(this)).val(cgst);
            $('.sgst').eq($('.ro').index(this)).val(cgst);
            $('.tot_amt').eq($('.ro').index(this)).val(tot_amt);
            

             $("input[class *= 'tot_amt']").each(function(){
           sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum);

        });
       
    });
    
   
});

 $('.table tbody').on('change', '.qty', function(){

   
          
            let row          = $(this).closest('tr');
            var qty          = row.find('td:eq(3) .qty').val();
        
            
            var stock        = row.find('td:eq(2) .stock_qty').val();

         
                if (parseFloat(qty)>parseFloat(stock)  ){
              //  var zero_qty          = null;
               
                row.find('td:eq(3)  input').val("0");
             
                alert('Sale Quantity Should Not Be Greater Than Stock Quantity!');

              }
           
                      
            })

 $('.table tbody').on('change', '.dis', function(){

   
           var sum =0;
            let row   = $(this).closest('tr');
             var dis        = parseFloat(row.find('td:eq(8) .dis').val());
            var tot_amt   = row.find('td:eq(9) .tot_amt').val();
        
                           row.find('td:eq(9) .tot_amt').val(tot_amt-dis);
           
         
               $("input[class *= 'tot_amt']").each(function(){
           sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
           
                      
            })

        

</script>
