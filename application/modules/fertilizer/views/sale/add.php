<div class="wraper">      
            
			<div class="col-md-12 container form-wraper">
	
				<form method="POST" action="<?php echo site_url("trade/saleAdd") ?>" onsubmit="return valid_data()">
	
					<div class="form-header">
					
						<h4>Add Sale</h4>
					
					</div>
	
					<div class="form-group row">
					
						<div class="col-sm-4">
	
							<input type="hidden" id=prod_Id name="prod_Id" class="form-control"  />
	
						</div>
						
						</div>
	
						<div class="form-group row">
						<label for="soc_id" class="col-sm-2 col-form-label">Society :</label>
						<div class="col-sm-4">
	
							<select name="soc_id" style="width:350px" class="form-control required" id="soc_id">
	
	<option value="">Select</option>
	
	<?php
	
		foreach($socdtls as $soc){
	
	?>
	
		<option value="<?php echo $soc->soc_id;?>"><?php echo $soc->soc_name;?></option>
	
	<?php
	
		}
	
	?>     
	
	</select>
						</div>
						<label for="gstin" class="col-sm-2 col-form-label">GSTIN:</label>
						<div class="col-sm-3">
	
						<input type="text"  id=gstin name="gstin" class="form-control" readonly />
	
						</div>
						
						</div>
	
						<div class="form-group row">
						<label for="soc_add" class="col-sm-2 col-form-label">Address:</label>
						<div class="col-sm-4">
	
						<textarea style="width:350px;height:70px"  id=soc_add name="soc_add" class="form-control" readonly /></textarea>
	
						</div>
						 <label for="cin" class="col-sm-2 col-form-label">Transaction Type:</label>
						<div class="col-sm-3">
	
						<select name="trans_type" id="trans_type" class="form-control" required>
                             <option value="">Select</option>
                            <option value="Credit">Credit</option>
                            <option value="Cash">Cash</option>
                        </select>
	
						</div> 
                      
                        
					  </div>
                      <div class="form-group row">
                      <label for="trans_do" class="col-sm-2 col-form-label">Sale Ro:</label>
						<div class="col-sm-4">
	
						<input type="text" style="width:350px" id=trans_ro name="trans_do" class="form-control" readonly />
	                    </div>
                     

                        <label for="comp_id" class="col-sm-2 col-form-label">Company:</label>
                    <div class="col-sm-3">

                    	<select name="comp_id" class="form-control required" id="comp_id">

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
                      <label for="sale_due_dt"  class="col-sm-2 col-form-label">Sale Due Date:</label>
                        <div class="col-sm-4">
    
                        <input type="date" style="width:350px" name="sale_due_dt" id="sale_due_dt" class="form-control"  />
                        </div>
                        <label for="do_dt" class="col-sm-2 col-form-label">Sale Ro Date:</label>
						<div class="col-sm-3">
	
						<input type="date"  id=ro_dt name="ro_dt" class="form-control"  />
	                    </div>
                        
                        </div>
                        <div class="form-group row">
                      <label for="gst_rt"  class="col-sm-2 col-form-label">GST Rate:</label>
                      <div class="col-sm-4">
                     <!--  <input type="text" name="gst_rt"style="width:350px"  class="form-control required gst_rt" value="" id="gst_rt" readonly> -->
                      </div>
                      <label for="unit"  class="col-sm-2 col-form-label">Unit:</label>
                      <div class="col-sm-3">
                      <input type="text" name="unit" class="form-control required unit" value="" id="unit" readonly>
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
                           
                                <th style= "text-align: center">Stock Point</th>
                                <th style= "text-align: center">Gov Sale Rate</th>
                               
                                <th style= "text-align: center">Stock Qty</th>
                                <th style= "text-align: center">Qty</th>
								<th style= "text-align: center">Sale Rate</th>
								<th style= "text-align: center">Taxable Amt</th>
                         
								<!-- <th style= "text-align: center">CGST</th>

								<th style= "text-align: center">SGST</th> -->
                                <th style= "text-align: center">Discount</th>
								<th style= "text-align: center">Total Amt</th>
                                <th>
                                    <button class="btn btn-success" type="button" id="addrow" style= "border-left: 10px" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i class="fa fa-plus" aria-hidden="true"></i></button></th>
                                </th>

                            </thead>

                            <tbody id= "intro">
                                <tr>
                                
                                    <td>    
                                       
                 <select name="ro[]" id="ro" style="width:150px"class="form-control required ro" required>
                <option value="">Select Project</option>
                <!-- <?php
                    foreach($rodtls as $key1)
                    { ?>
                        <option value="<?php echo $key1->ro_no; ?>"><?php echo $key1->ro_no; ?></option>
                    <?php
                    } ?> -->
            </select> 
                                    </td>

                                    <td>    
                                        <input type="hidden" name="prod_id[]" class="form-control prod_id" value= "" id="prod_id">  
                                        <input type="text" name="prod_desc[]" style="width:150px" class="form-control required prod_desc" value= "" id="prod_desc" readonly> 
                       
                                        
                                    </td>
        
                                      <td>

                                         <select name="stock_point[]" id="stock_point" style="width:150px"class="form-control stock_point" required>
                <option value="">Select</option>
              
            </select> 
                                    
                                    </td>
                                      <td>
                                         <select name="gov_sale_rt[]" id="gov_sale_rt" style="width:70px" class="form-control gov_sale_rt" required>
             
                                          <option value="N">No</option>
                                          <option value="Y">Yes</option>
                                        </select> 
                                        
                                    </td>

                                    <td>
                                        <input type="text" name="stock_qty[]" class="form-control required stock_qty" value= "0" id="stock_qty" readonly> 
                                    </td>

                                    <td>
                                        <input type="text" name="qty[]" class="form-control qty" value= "0" id="qty" required>
                                    </td>
									<td>
                                        <input type="text" name="sale_rt[]"  class="form-control required sale_rt" value= "0" id="sale_rt"  readonly>
                                    </td>
									<td>
                                    <input type="hidden" name="gst_rt[]"  class="form-control gst_rt" value="" id="gst_rt" >
                                        <input type="text" name="taxable_amt[]"  class="form-control taxable_amt" value="" id="taxable_amt" readonly>
                                    </td>
                               
									
                                        <input type="hidden" name="cgst[]" class="form-control cgst" value= "0" id="cgst" readonly>
                                  
									
                                        <input type="hidden" name="sgst[]" class="form-control sgst" value= "0" id="sgst" readonly>
                                  
                                    <td>
                                    <input type="text" name="dis[]" class="form-control dis required" value= "0" id="dis" required>
                                    </td>
									<td>
                          <input type="text" name="tot_amt[]" style="width:100px" class="form-control tot_amt" value="0" id="tot_amt" required>
                                    </td>
                                    <td>
                                       <button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>
                                    </td>
                                </tr>

                            </tbody>

                            <tfoot>
                                <tr>
                                     <td colspan="2" style="text-align:right">
                                        <strong >Total:</strong>
                                    </td> 
                                    <td colspan="9">
                                        <div class="col-md-3">Taxable Amt:<span id="tot_taxable_amt"></span></div>
                                        <div class="col-md-2">CGST:<span id="tot_cgst"></span></div>
                                        <div class="col-md-2">SGST:<span id="tot_sgst"></span></div>
                                        <div class="col-md-2">Discount:<span id="tot_dis"></span></div>
                                        <div class="col-md-3">Net Payable:<span id="tot_payble_amt"></span></div>
                                   
                                        <input type="hidden" name="total" style="width:200px;" id="total" class="form-control total" placeholder="Total">  
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
            $.get( 

'<?php echo site_url("trade/f_get_sale_ro");?>',

{ 

comp_id: $('#comp_id').val()
// dist_cd : $('#dist_cd').val()

}

).done(function(data){

var string = '<option value="">Select</option>';
//console.log(data);
$.each(JSON.parse(data), function( index, value ) {

    string += '<option value="' + value.ro_no + '">' + value.ro_no + '</option>'

});
            var newElement = '<tr>'
                                +'<td>'
                               +'<select name="ro[]" id="ro" style="width:150px"class="form-control required ro" required>'
                
                
                       +' <option value=" '+ string +'</option>'
                 
           +'</select> '
                                +'</td>'
                                +'<td> <input type="hidden" name="prod_id[]" class="form-control prod_id" value= "" id="prod_id"><input type="text" name="prod_desc[]" style="width:150px" class="form-control required prod_desc" value= "" id="prod_desc" readonly> </td>'              
                                +'<td><select name="stock_point[]" id="ro" style="width:150px"class="form-control stock_point" required><option value="">Select</option></select>  </td><td><select name="gov_sale_rt[]" id="gov_sale_rt" style="width:70px" class="form-control gov_sale_rt" required><option value="N">No</option><option value="Y">Yes</option></select>  </td>'+'<td>'
                                    +'<input type="text" name="stock_qty[]" class="form-control required stock_qty" value= "0" id="stock_qty" readonly>'
                                +'</td>'
                                +'<td>'
                                    +'<input type="text" name="qty[]" class="form-control qty" value= "0" id="qty" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="sale_rt[]" class="form-control required sale_rt" value= "0" id="sale_rt" required readonly>'
                                +'</td>'
								+'<td>'
                                    +'<input type="hidden" name="gst_rt[]"  class="form-control gst_rt" value="" id="gst_rt" ><input type="text" name="taxable_amt[]" class="form-control required taxable_amt" value= "" id="taxable_amt" readonly>'
                                +'</td>'
                              
								+'<input type="hidden" name="cgst[]" class="form-control required cgst" value= "0" id="cgst" readonly>'
                                +'<input type="hidden" name="sgst[]" class="form-control required sgst" value= "0" id="sgst" readonly>'
                                +'<td>'
                                    +'<input type="text" name="dis[]" class="form-control dis" value= "0" id="dis" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="tot_amt[]" class="form-control tot_amt" value= "0" id="tot_amt" required>'
                                +'</td>'
                                +'<td>'
                                    +'<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
                                +'</td>'
                            '</tr>';

            $("#intro").append($(newElement));

        });
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

			'<?php echo site_url("trade/f_get_soc");?>',
			{ 

				soc_id: $(this).val(),
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			
			var gstin = parseData[0].gstin;
			var soc_add= parseData[0].soc_add;
			var cin= parseData[0].cin;
			$('#gstin').val(gstin);
			$('#soc_add').val(soc_add);
			
		});

	});

});

</script>




<script>

    $(document).ready(function()
    {
        $('#intro').on( "change", ".ro", function()
        {
            //console.log($(this).val());
            $.get('<?php echo site_url("trade/js_get_stock_qty");?>',{ ro: $(this).val() })
                                                                            
            .done(function(data)
            {
                //  console.log(data);
                var unitData = JSON.parse(data);
            
            //     var string = '<option value="">Select</option>';
            //     $.each(JSON.parse(unitData), function( index, value ) {
            //     string += '<option value="' + value.prod_id + '">' + value.prod_desc + '</option>'

            // });
            //     $('#prod_id').val(string);
                
                $('.stock_qty').eq($('.ro').index(this)).val(unitData.stkqty); 
                $('.prod_id').eq($('.ro').index(this)).val(unitData.prod_id); 
                $('.prod_desc').eq($('.ro').index(this)).val(unitData.prod_desc); 
                $('.gst_rt').eq($('.ro').index(this)).val(unitData.gst_rt); 
                $('.unit').eq($('.ro').index(this)).val('MT');
                $('.sale_rt').eq($('.ro').index(this)).val(unitData.govt_sale_rt);
                $('.qty').eq($('.ro').index(this)).val(0);  
                // $('.sale_rt').eq($('.ro').index(this)).val(0);  
                $('.taxable_amt').eq($('.ro').index(this)).val(0);
                $('.cgst').eq($('.ro').index(this)).val(0);  
                $('.sgst').eq($('.ro').index(this)).val(0);
                
                $('.tot_amt').eq($('.ro').index(this)).val(0);
                
            
            });

        });

         $('#intro').on( "change", ".ro", function()
        {
            //console.log($(this).val());
            $.get('<?php echo site_url("trade/js_get_stock_point");?>',{ ro: $(this).val() })
                                                                            
            
            .done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.soc_id + '">' + value.soc_name + '</option>'

            });

             $('.stock_point').eq($('.ro').index(this)).html(string); 

            //$('#stock_point').html(string);


          });

        });

    });

</script>
<script>

$(document).ready(function()
{
    $('#intro').on( "change", ".qty", function()
    {
       
           var sum    = 0;
       var gst_rt=$('.gst_rt').eq($('.ro').index(this)).val();
       var qty = $('.qty').eq($('.ro').index(this)).val();
       var sale_rt = $('.sale_rt').eq($('.ro').index(this)).val();
      var stkqty = $('.stock_qty').eq($('.ro').index(this)).val();
    //   alert(stkqty);
       if (sale_rt==0){
        alert('Sale rate Can not be zero');
        var txtBox=document.getElementById("sale_rt" );
        txtBox.focus();
    return false;
       }

       if (qty>stkqty){
        alert('Quantity Can not Greater Than Stock Quantity ');
        var txtBox=document.getElementById("qty" );
        txtBox.focus();
    return false;
       }
       var taxable_amt= parseFloat(qty * sale_rt).toFixed('2');
       var cgst =parseFloat(taxable_amt * gst_rt/100/2).toFixed('2')
       var tot_amt = parseFloat(taxable_amt + cgst*2).toFixed('2')
       var total =0.00;
     total = parseFloat(total) + parseFloat(tot_amt); 
       
       
    //    total += parseFloat(tot_amt); 
        $.get('<?php echo site_url("trade/js_get_stock_qty");?>',{ ro: $(this).val() })

                                                                  
        .done(function(data)
        {
         
            var unitData = JSON.parse(data);
           
            
            $('.taxable_amt').eq($('.ro').index(this)).val(taxable_amt);
            $('.cgst').eq($('.ro').index(this)).val(cgst);
            $('.sgst').eq($('.ro').index(this)).val(cgst);
            $('.tot_amt').eq($('.ro').index(this)).val(tot_amt);
            
           
      $("input[class *= 'tot_amt']").each(function(){
           sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum.toFixed());
        });

         
       
    });

     
    
   
});

 $('#intro').on('change', '.qty', function(){

         
          var tottaxable  = 0;
          var cgst        = 0;
          var sgst        = 0;
          var tot_discnt  = 0;
          var gross       = 0;
 
          //  $("input[class *= 'Net_Price']").each(function(){
            let row          = $(this).closest('tr');


               $('#intro tr').each(function() {

                 var qty = $(this).find('td:eq(5) .qty').val();
                 var rate = $(this).find('td:eq(6) .sale_rt').val();
               //  var gst_rt = $(this).find('td:eq(6) .gst_rt').val();

                //var cgst =parseFloat((qty*rate) * gst_rt/100/2).toFixed('2');
                 tottaxable += parseFloat(qty*rate);
                   
            });
             
           // $("#tot_taxable_amt").html("0");
            $("#tot_taxable_amt").html(tottaxable);      

            $("input[class *= 'tot_amt']").each(function(){
              gross += +parseFloat($(this).val()); 
            
            });
             
            $("#tot_payble_amt").html("0");
            $("#tot_payble_amt").html(gross);


            $("input[class *= 'dis']").each(function(){
              tot_discnt += parseFloat($(this).val()); 
            
            });
             
            $("#tot_dis").val("0");
            $("#tot_dis").val(tot_discnt.toFixed('2'));
                
        })


 $('.table tbody').on('change', '.dis', function(){

       var sum    = 0;
       var gst_rt=$('.gst_rt').eq($('.ro').index(this)).val();
       var qty = $('.qty').eq($('.ro').index(this)).val();
       var sale_rt = $('.sale_rt').eq($('.ro').index(this)).val();
       var taxable_amt= parseFloat(qty * sale_rt).toFixed('2');
       var cgst =parseFloat(taxable_amt * gst_rt/100/2).toFixed('2')
       var tot_amt = parseFloat(taxable_amt + cgst*2).toFixed('2')
       var total =0.00;
       total = parseFloat(total) + parseFloat(tot_amt); 
           
           
         
          $("input[class *= 'tot_amt']").each(function(){
           sum += parseFloat($(this).val());
                      
            });
            let row   = $(this).closest('tr');
             var dis        = parseFloat(row.find('td:eq(8) .dis').val());
            var tot_amt   = row.find('td:eq(9) .tot_amt').val();
        
                           row.find('td:eq(9) .tot_amt').val(total-dis);
            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
           
                      
            })

        

</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#comp_id').change(function(){

        $.get( 

            '<?php echo site_url("trade/f_get_sale_ro");?>',

            { 

                comp_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.ro_no + '">' + value.ro_no + '</option>'

            });

            $('#ro').html(string);


          });


    });

});
</script>
<!-- </script> -->

<script>
$(document).ready(function(){
$("#ro_dt").change(function(){

var ro_dt = $('#ro_dt').val();



var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
(month<10 ? '0' : '') + month + '-' +
(day<10 ? '0' : '') + day;

// console.log(trans_dt,output);

if(new Date(output) < new Date(ro_dt))
{
alert("Sale RO Date Can Not Be Greater Than Current Date");
$('#submit').attr('type', 'buttom');
return false;
}else{
   $('#submit').attr('type', 'submit');
}
})
});
</script>
<script>
$(document).ready(function(){
$("#sale_due_dt").change(function(){

var ro_dt = $('#sale_due_dt').val();



var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
(month<10 ? '0' : '') + month + '-' +
(day<10 ? '0' : '') + day;

// console.log(trans_dt,output);

if(new Date(output) >new Date(ro_dt))
{
alert("Sale Due Date Can Not Be Less Than Current Date");
$('#submit').attr('type', 'buttom');
return false;
}else{
   $('#submit').attr('type', 'submit');
}
})
});
</script>