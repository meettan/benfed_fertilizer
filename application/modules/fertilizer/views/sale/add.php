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
	
							<select name="soc_id" style="width:350px" class="form-control required" id="soc_id" required>
	
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
	
						    <textarea style="width:350px;height:70px"  id=soc_add name="soc_add" class="form-control" readonly ></textarea>
	
						</div>

						<label for="cin" class="col-sm-2 col-form-label">Invoice Type:</label>
						    <div class="col-sm-3">
	
                                <select name="trans_type" id="trans_type" class="form-control required" required>
                                    <option value="">Select</option>
                                    <option value="Credit">Credit</option>
                                    <option value="Cash">Cash</option>
                                </select>
            
						    </div> 
					</div>

                    <div class="form-group row">
                        <label for="do_dt" class="col-sm-2 col-form-label">Invoice Date:</label>
						<div class="col-sm-4">
	
						    <input type="date" style="width:350px" id=ro_dt name="ro_dt" class="form-control"  required/>
	                    </div>
                     

                        <label for="comp_id" class="col-sm-2 col-form-label">Company:</label>
                        <div class="col-sm-3">

                    	    <select name="comp_id" class="form-control required" id="comp_id" required>

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
                            <label for="sale_due_dt"  class="col-sm-2 col-form-label">Invoice Due Date:</label>
                            <div class="col-sm-4">
    
                                <input type="date" style="width:350px" name="sale_due_dt" id="sale_due_dt" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group row">
                      <label for="gst_rt"  class="col-sm-2 col-form-label">Advance:</label>
                      <div class="col-sm-4">
                        <span id="advance" style="width:350px;color: #0d7d8ef5;font-weight: bold;font-size:20px;"></span>
                     <!--  <input type="text" name="advance"   class="form-control advance" value=""  readonly> -->
                      </div>
                      <label for="unit"  class="col-sm-2 col-form-label">Unit:</label>
                      <div class="col-sm-3">
                      <input type="text" name="units" class="form-control unit" value="" id="units" readonly="">
                      <input type="hidden" name="unit" class="form-control units" value="" id="unit">
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
                                <th style= "text-align: center">Rate Catg</th>
                                <th style= "text-align: center">Govt.Rate</th>
                                <th style= "text-align: center">Stock Qty</th>
                                <th style= "text-align: center">Qty</th>
								<th style= "text-align: center">Sale Rate</th>
								<th style= "text-align: center">Taxable Amt</th>
                         
								<th style= "text-align: center">Net Amt</th>
                                <th>
                                    <button class="btn btn-success" type="button" id="addrow" style= "border-left: 10px" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i class="fa fa-plus" aria-hidden="true"></i></button></th>
                                </th>

                            </thead>

                            <tbody id= "intro">
                                <tr>
                                
                                    <td>    
                                       
                 <select name="ro[]" id="ro" style="width:100px"class="form-control required ro" required>
                <option value="">Select RO</option>
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
                                        <input type="text" name="prod_desc[]" style="width:110px" class="form-control required prod_desc" value= "" id="prod_desc" readonly> 
                       
                                        
                                    </td>

                                    <td>
                                         <input type="hidden" name="stock_point[]" class="form-control prod_id" value= "" id="stock_point">  
                                     <input type="text" name="stock_name[]" class="form-control stock_name" value= "" id="stock_name" readonly>     
                                    
                                    </td>
                                       <td>

                                    <select name="sale_category[]" id="sale_category" style="width:110px"class="form-control sale_category" required>
                                         <option value="">Select</option>
              
                                         </select> 
                                    
                                    </td>
                                      <td>
                                         <select name="gov_sale_rt[]" id="gov_sale_rt" style="width:55px" class="form-control gov_sale_rt" required>
             
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
                                  
                                    <!--<td>
                                    <input type="text" name="dis[]" class="form-control dis required" value= "0" id="dis" required>
                                    </td>--->
									<td>
                          <input type="text" name="tot_amt[]"  class="form-control tot_amt" value="0" id="tot_amt" required>
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
                                        <!--<div class="col-md-2">Discount:<span id="tot_dis"></span></div>-->
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
                               +'<select name="ro[]" id="ro" style="width:100px"class="form-control required ro" required>'
                
                
                       +' <option value=" '+ string +'</option>'
                 
           +'</select> '
                                +'</td>'
                                +'<td> <input type="hidden" name="prod_id[]" class="form-control prod_id" value= "" id="prod_id"><input type="text" name="prod_desc[]" style="width:110px" class="form-control required prod_desc" value= "" id="prod_desc" readonly> </td>'
                                +'<td><input type="hidden" name="stock_point[]" class="form-control prod_id" value= "" id="stock_point"><input type="text" name="stock_name[]" class="form-control stock_name" value= "" id="stock_name" readonly>'             
                                +'<td><select name="sale_category[]" id="sale_category" style="width:110px"class="form-control sale_category" required><option value="">Select</option></select>  </td><td><select name="gov_sale_rt[]" id="gov_sale_rt" style="width:55px" class="form-control gov_sale_rt" required><option value="N">No</option><option value="Y">Yes</option></select>  </td>'+'<td>'
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
                                /*+'<td>'
                                    +'<input type="text" name="dis[]" class="form-control dis" value= "0" id="dis" required>'
                                +'</td>'*/
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


          var tottaxable  = 0;
          var cgst        = 0;
          var qty         = 0;
          var rate        = 0;
          var gst_rt      = 0;


               $('#intro tr').each(function() {


                 var qty = $(this).find('td:eq(6) .qty').val();
                 var rate = $(this).find('td:eq(7) .sale_rt').val();
                 var gst_rt = $(this).find('td:eq(8) .gst_rt').val();
                 
             
                 tottaxable += parseFloat(qty*rate);

                 cgst += parseFloat((qty*rate) * gst_rt/100/2);
                   
            });
             
            $("#tot_taxable_amt").html("");
            $("#tot_taxable_amt").html(tottaxable);
            $("#tot_cgst").html("");    
            $("#tot_cgst").html(cgst.toFixed('2')); 
            $("#tot_sgst").html(cgst.toFixed('2')); 
            $("#tot_payble_amt").html((tottaxable + cgst*2).toFixed('2'));    


            //$('.total').change();
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

        $.get( 

            '<?php echo site_url("trade/f_get_adv");?>',
            { 

                soc_id: $(this).val(),
                
            }

        )
        .done(function(data){

            //console.log(data);
            var parseData = JSON.parse(data);
            
            var advance_balance = parseData.advance_balance;
          
            $('#advance').html(advance_balance);
            
        });

	});

});

</script>




<script>

    $(document).ready(function()
    {
        $('#intro').on( "change", ".ro", function()                     //Getting Product name and stock quantity on supplying RO
        {
                $('.stock_qty').eq($('.ro').index(this)).val("0"); 
                $('.prod_id').eq($('.ro').index(this)).val(""); 
                $('.prod_desc').eq($('.ro').index(this)).val(""); 
                $('.gst_rt').eq($('.ro').index(this)).val(""); 
                $('.unit').eq($('.ro').index(this)).val('');
                $('.units').eq($('.ro').index(this)).val('');
             
                $('.qty').eq($('.ro').index(this)).val(0);  
                $('.gov_sale_rt option:first').prop('selected', 'selected');
                $('.taxable_amt').eq($('.ro').index(this)).val(0);
                $('.cgst').eq($('.ro').index(this)).val(0);  
                $('.sgst').eq($('.ro').index(this)).val(0);
                
                $('.tot_amt').eq($('.ro').index(this)).val(0);
            $.get('<?php echo site_url("trade/js_get_stock_qty");?>',{ ro: $(this).val() })
                                                                            
            .done(function(data)
            {
                
                var unitData = JSON.parse(data);
                
                $('.stock_qty').eq($('.ro').index(this)).val(unitData.stkqty); 
                $('.prod_id').eq($('.ro').index(this)).val(unitData.prod_id); 
                $('.prod_desc').eq($('.ro').index(this)).val(unitData.prod_desc); 
                $('.gst_rt').eq($('.ro').index(this)).val(unitData.gst_rt); 
                $('.unit').eq($('.ro').index(this)).val('MT');
                $('.units').eq($('.ro').index(this)).val('MT');
             
                $('.qty').eq($('.ro').index(this)).val(0);  

                $('.taxable_amt').eq($('.ro').index(this)).val(0);
                $('.cgst').eq($('.ro').index(this)).val(0);  
                $('.sgst').eq($('.ro').index(this)).val(0);
                
                $('.tot_amt').eq($('.ro').index(this)).val(0);
                
            
            });

        });

         $('#intro').on( "change", ".ro", function()
        {

              $('.stock_point').eq($('.ro').index(this)).val(""); 
              $('.stock_name').eq($('.ro').index(this)).val(""); 
           
            $.get('<?php echo site_url("trade/js_get_stock_point");?>',{ ro: $(this).val() })
                                                                            
            
            .done(function(data){

                   var unitData = JSON.parse(data);

                $('.stock_point').eq($('.ro').index(this)).val(unitData.soc_id); 
                $('.stock_name').eq($('.ro').index(this)).val(unitData.soc_name); 

          });

        });

///Getting the sale category with district,company,supplied ro date and product
         $('#intro').on( "change", ".ro", function()
        {
           var string = '<option value="">Select</option>';

              //  $('.sale_rt').eq($('.ro').index(this)).val("0"); 
              $('.sale_category').eq($('.ro').index(this)).html(string); 
            $.get('<?php echo site_url("trade/get_sale_rate");?>',{ ro: $(this).val(),comp_id:$("#comp_id").val() })
                                                                            
            
            .done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.catg_id + '">' + value.cate_desc + '</option>'

            });

             $('.sale_category').eq($('.ro').index(this)).html(string); 

          });

        });

    });


      ///       get Sale rate In MT
    $('#intro').on( "change", ".sale_category", function(){   

        var row = $(this).closest('tr');

          $('.gov_sale_rt option:first').prop('selected', 'selected');
          $('.qty').eq($('.ro').index(this)).val(0);
          $('.sale_rt').eq($('.ro').index(this)).val(0);  
          $('.taxable_amt').eq($('.ro').index(this)).val(0);
          $('.tot_amt').eq($('.ro').index(this)).val(0);
        var ro =  $(this).closest('tr').find('td:eq(0) .ro').val();
                    $(this).closest('tr').find('td:eq(6) .qty').val("0");
       
        $.get('<?php echo site_url("trade/get_salerate");?>',{ ro: ro,comp_id:$("#comp_id").val(),sale_category: $(this).val() })

                                                                  
        .done(function(data)
        {
         
            var unitData = JSON.parse(data);
           
           row.find('td:eq(7) .sale_rt').val(unitData.sp_mt);
                      
        });
         
       
     });

       ///       get Gov rate In MT
    $('#intro').on( "change", ".gov_sale_rt", function(){


          $('.qty').eq($('.ro').index(this)).val(0);
          $('.sale_rt').eq($('.ro').index(this)).val(0);  
          $('.taxable_amt').eq($('.ro').index(this)).val(0);
          $('.tot_amt').eq($('.ro').index(this)).val(0);   

        var row = $(this).closest('tr');

        var ro =  $(this).closest('tr').find('td:eq(0) .ro').val();
        var sale_category =  $(this).closest('tr').find('td:eq(3) .sale_category').val();
                    $(this).closest('tr').find('td:eq(6) .qty').val("0");
       
        $.get('<?php echo site_url("trade/get_govsalert");?>',{ ro: ro,comp_id:$("#comp_id").val(),sale_category:sale_category,gov_sale_rt: $(this).val() })

                                                                  
        .done(function(data)
        {
         
            var unitData = JSON.parse(data);
           
           row.find('td:eq(7) .sale_rt').val(unitData.rate);
                      
        });
         
       
     });

</script>

<script>

$(document).ready(function()
{
    $('#intro').on( "change", ".qty", function()
    {
       
           var sum         = 0;
           var tot_amt     = 0;
           var taxable_amt = 0;
           var cgst        = 0;

       var gst_rt=$('.gst_rt').eq($('.ro').index(this)).val();

       var qty = parseFloat($('.qty').eq($('.ro').index(this)).val());
       var sale_rt = $('.sale_rt').eq($('.ro').index(this)).val();
      var stkqty = parseFloat($('.stock_qty').eq($('.ro').index(this)).val());
    //   alert(stkqty);
    //    if (sale_rt==0){
    //     alert('Sale rate Can not be zero');
    //     var txtBox=document.getElementById("sale_rt" );
    //     txtBox.focus();
    // return false;
    //    }

       if (qty > stkqty){
        alert('Quantity cannot be greater than stock quantity');
        $('.qty').eq($('.ro').index(this)).val("0");
        //txtBox.focus();
    return false;
       }
       var taxable_amt= parseFloat(qty * sale_rt).toFixed('2');
       var cgst = parseFloat(taxable_amt * gst_rt/100/2).toFixed('2');

       var tot_amt = parseFloat(taxable_amt + (cgst*2)).toFixed('2');

       $('.taxable_amt').eq($('.ro').index(this)).val(taxable_amt);
       $('.cgst').eq($('.ro').index(this)).val(cgst);
       $('.sgst').eq($('.ro').index(this)).val(cgst);

        $('.tot_amt').eq($('.ro').index(this)).val(parseFloat(taxable_amt) + parseFloat(cgst*2));
    
   
});

 $('#intro').on('change', '.qty', function(){

         
          var tottaxable  = 0;
          var cgst        = 0;
          var qty         = 0;
          var rate        = 0;
          var gst_rt      = 0;


               $('#intro tr').each(function() {


                 var qty = $(this).find('td:eq(6) .qty').val();
                 var rate = $(this).find('td:eq(7) .sale_rt').val();
                 var gst_rt = $(this).find('td:eq(8) .gst_rt').val();
                 
             
                 tottaxable += parseFloat(qty*rate);

                 cgst += parseFloat((qty*rate) * gst_rt/100/2);
                   
            });
             
            $("#tot_taxable_amt").html("");
            $("#tot_taxable_amt").html(tottaxable);
            $("#tot_cgst").html("");    
            $("#tot_cgst").html(cgst.toFixed('2')); 
            $("#tot_sgst").html(cgst.toFixed('2')); 
            $("#tot_payble_amt").html((tottaxable + cgst*2).toFixed('2'));    

    
        })

  

  

 
           
                      
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