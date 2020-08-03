<div class="wraper">      
            
			<div class="col-md-10 container form-wraper">
	
				<form method="POST" action="<?php echo site_url("socpay/society_payAdd") ?>" onsubmit="return valid_data()" id="form">
	
					<div class="form-header">
					
						<h4>Society and Payble Details</h4>
					
					</div>

                    <div class="form-group row">
						<label for="soc_id" class="col-sm-2 col-form-label">Society :</label>
						<div class="col-sm-3">
	
							<select name="soc_id" style="width:180px" class="form-control required" id="soc_id" required>
	
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
                        <label for="paid_dt" class="col-sm-2 col-form-label">Paid Date:</label>
						<div class="col-sm-4">
	
						<input type="date" style="width:200px" id="paid_dt" name="paid_dt" class="form-control"/>
	                    </div>
                        <!-- </div> -->
                      </div>
                      <div class="form-group row">
                      <label for="trans_do" class="col-sm-2 col-form-label">Sale Invoice No:</label>
						<div class="col-sm-3">
	                <select name="trans_do" style="width:180px" class="form-control required" id="trans_do">
                    <option value="">Select</option>
                    <?php
                       foreach($ro_dtls as $ro){
                            ?>
                <option value="<?php echo $ro->trans_do;?>"><?php echo $ro->trans_do;?></option>
                <?php    }    ?>     
                </select>
	                    </div>
                      <label for="do_dt" class="col-sm-2 col-form-label">Sale Invoice Date:</label>
						<div class="col-sm-2">
	
						<input type="date" style="width:200px" id="do_dt" name="do_dt" class="form-control"/>
	                    </div>
                        </div>

                        <!-- <div class="form-group row">
                        <label for="comp_id" class="col-sm-2 col-form-label">Company :</label>
                        <div class="col-sm-3">
                    <input type="hidden" id=comp_id name="comp_id"  />
                     <input type="text" style="width:180px" id=company name="company" class="form-control" readonly />
                          
                        </div>
                        <label for="prod_id" class="col-sm-2 col-form-label">Product:</label>
                        <div class="col-sm-3">
    
                        <input type="text" style="width:200px" id=prod_id name="prod_id" class="form-control"  />
    
                        </div>
                        
                        </div> -->

                        <div class="form-group row">
                      <label for="sale_ro" class="col-sm-2 col-form-label">RO No:</label>
						<div class="col-sm-3">
	
						<!-- <input type="text" style="width:180px" id="sale_ro" name="sale_ro" class="form-control"  /> -->
                        <select name="sale_ro" class="form-control required" id="sale_ro"style="width:180px" required>

							<option value="">Select</option>

							<!-- <?php

								foreach($proddtls as $prod){

							?>

								<option value="<?php echo $prod->prod_id;?>"><?php echo $prod->prod_desc;?></option>

							<?php

								}

							?>      -->

							</select>
	                    </div>
                      <!-- <label for="invoice_dt" class="col-sm-2 col-form-label">RO Date:</label>
						<div class="col-sm-2">
	
						<input type="date" style="width:200px" id=invoice_dt name="invoice_dt" class="form-control"  />
	                    </div> -->
                        <label for="tot_recvble_amt" class="col-sm-2 col-form-label">Total Amount:</label>
						<div class="col-sm-3">
	                    <input type="hidden"  id="tot_amt" name="tot_amt"  />
						<input type="text" style="width:200px" id="tot_recvble_amt" name="tot_recvble_amt" class="form-control" readonly />
	                    </div>
                        </div>
                        <div class="form-group row">
                      <!-- <label for="tot_recvble_amt" class="col-sm-2 col-form-label">Total Receivable Amount:</label>
						<div class="col-sm-3">
	                    <input type="hidden"  id="tot_amt" name="tot_amt"  />
						<input type="text" style="width:180px" id="tot_recvble_amt" name="tot_recvble_amt" class="form-control" readonly />
	                    </div> -->
                        <label for="tot_dr_amt" class="col-sm-2 col-form-label">Total Dr Note Amount:</label>
						<div class="col-sm-3">
                        <input type="text" style="width:180px" id="tot_dr_amt" name="tot_dr_amt" class="form-control"  readonly />
                        </div>
                         <label for="adv_amt" class="col-sm-2 col-form-label">Advance Amount:</label>
						<div class="col-sm-3">
                        <input type="text" style="width:200px" id="adv_amt" name="adv_amt" class="form-control" readonly  />
                        </div>
                        </div>
                        <div class="form-group row">
                       
                        <label for="net_amt" class="col-sm-2 col-form-label">Net Amount:</label>
						<div class="col-sm-3">
                        <input type="text" style="width:180px" id="net_amt" name="net_amt" class="form-control" readonly />
                        </div>
                        </div>
                        <div class="form-group row">
                        
                        </div>

						<div class="form-header">
					
					<h4>Pay Type and Paid Details</h4>
				
				</div>
                <hr>

                <div class="row" style ="margin: 5px;">

                    <div class="form-group">

                        <table class= "table table-striped table-bordered table-hover">

                            <thead>
                                <th style= "text-align: center;width:100px">Pay Type</th>
                                
								<th style= "text-align: center;width:100px">Amount</th>
                                <th>
                                    <button class="btn btn-success" type="button" id="addrow" style= "border-left: 10px" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i class="fa fa-plus" aria-hidden="true"></i></button></th>
                                </th>

                            </thead>

                            <tbody id= "intro">
                                <tr>
                                
                                    <td>    
                                       
                 <select name="pay_type[]" id="pay_type" style="width:230px"class="form-control required pay_type" required>
                <option value="">Select Pay Type</option>
               
                      
						<option value="1">Cash</option>
						<option value="2">Advance</option>
						<option value="3">Cheque</option>
                        <option value="4">Draft</option>
                        <option value="5">Pay Order</option>
                   
            </select> 
                                    </td>

									<td>
                                      <input type="text" name="paid_amt[]" style="width:130px;" class="form-control paid_amt" value= "" id="paid_amt" required>
                                    </td>
                                   
                                </tr>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="1">
                                        Total:
                                    </td>
                                    <td colspan="2">
                                        <input name="total" style="width:150px;" id="total" class="form-control total" placeholder="Total">  
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

<script>

    $(document).ready(function(){

        // For add row option
        $('#addrow').click(function(){

            var newElement = '<tr>'
                                +'<td>'
                               +'<select name="pay_type[]" id="pay_type" style="width:230px"class="form-control required soc_id" required>'
                +'<option value="">Select Pay Type</option>'
                +'<option value="1">Cash</option>'
						+'<option value="2">Advance</option>'
						+'<option value="3">Cheque</option>'
                       + '<option value="4">Draft</option>'
                      +  '<option value="5">Pay Order</option>'
                                +'</td>'
                               
                              
								+'<td>'
                                    +'<input type="text" name="paid_amt[]" style="width:130px;" class="form-control paid_amt" value= "" id="paid_amt" required>'
                                +'</td>'
                                +'<td>'
                                    +'<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
                                +'</td>'
                            '</tr>';

            $("#intro").append($(newElement));

        });

        $("#intro").on("click","#removeRow", function(){
            $(this).parents('tr').remove();
            var sum =0;        
         
               $("input[class *= 'br_amt']").each(function(){
           sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
        });

        $('#nt').on("change", function(){
            var total = $(this).val();
            $('#total').val(total);
        })


        $('.total').change(function(){

            var total = $('#nt').val();
            var ntAmount = $('#nt').val();
            $('.cgst_val').each(function(){

                var curr_gst_val = $(this).val();
                total = parseFloat(total)+parseFloat(parseFloat(curr_gst_val)*2);
               

            })
            $('#total').val(parseFloat(total).toFixed());

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

  

     $('#do_no').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/do_detail");?>',
            { 

                do_no: $(this).val(),
               
            }

        )
        .done(function(data){

            var datas = JSON.parse(data);
            
           
            $('#ro_dt').val(datas.do_dt);
            $('#invoice_no').val(datas.invoice_no);
            $('#invoice_dt').val(datas.invoice_dt);
            $('#company').val(datas.COMP_NAME);
            $('#comp_id').val(datas.comp_id);
            $('#gst_no').val(datas.GST_NO);
            $('#tot_amt').val(datas.tot_cr_amt);
            $('#tot_amts').val(datas.tot_cr_amt);
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
 $('.table tbody').on('change', '.soc_amt', function(){
   
           var sum =0;
            let row   = $(this).closest('tr');
                    
            $("input[class *= 'soc_amt']").each(function(){
            sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
                      
            })

        
   $('#form').submit(function(event){

          
                 var tot_cr_amt = parseFloat($('#tot_amt').val());


                 var sum =0;
            let row   = $(this).closest('tr');
                    
            $("input[class *= 'soc_amt']").each(function(){
            sum += parseFloat($(this).val());
                      
            });


                 var total      = parseFloat($('#total').val());

                    if(tot_cr_amt < sum) {

                         alert("Total Debit Exceed Limit");
                                      
                         event.preventDefault();
                    }
                     else 
                        {
                    //  alert("Transaction Date Can Not Be Less Than order Date");

                       $('#submit').attr('type', 'submit');
                      }
        });
</script>


<script>

$(document).ready(function(){

	var i = 2;

	$('#trans_do').change(function(){

		$.get( 

			'<?php echo site_url("socpay/f_get_ro_dt");?>',
			{ 

				trans_do: $(this).val(),
				//dist_cd: $(this).val(),
				// dist_cd : $('#dist_cd').val()
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			
			var do_dt = parseData[0].do_dt;
            // var sale_ro = parseData[0].sale_ro;
			$('#do_dt').val(do_dt);
            // $('#sale_ro').val(sale_ro);
            
			
		});
        

	});

});
</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#trans_do').change(function(){

        $.get( 

            '<?php echo site_url("socpay/f_get_ro_dt");?>',

            { 

                trans_do: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.sale_ro + '">' + value.sale_ro + '</option>'

            });

            $('#sale_ro').html(string);


          });


    });

});
</script>