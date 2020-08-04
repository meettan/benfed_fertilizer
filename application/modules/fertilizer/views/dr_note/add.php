<div class="wraper">      
            <div class="col-md-2 container"></div>
			<div class="col-md-8 container form-wraper">
	
			<form method="POST" action="<?php echo site_url("drcrnote/drnoteAdd") ?>" onsubmit="return valid_data()" id="form">
	
					<div class="form-header">
					
						<h4>Add Dr Note</h4>
					
					</div>
									
                    <div class="form-group row">

                      <label for="ro_no" class="col-sm-2 col-form-label">Society:</label>
						<div class="col-sm-4">

                           <select name="soc_id" id="soc_id" class="form-control soc_id" required>
                              <option value="">Select Society</option>
                            <?php
                            foreach($socdtls as $key1)
                            { ?>
                                <option value="<?php echo $key1->soc_id; ?>"><?php echo $key1->soc_name; ?></option>
                            <?php
                            } ?>
                            </select> 
	              
	                    </div>

                       <label for="invoice_no" class="col-sm-2 col-form-label">Invoice No:</label>

                       <div class="col-sm-4">
    
                        <input type="text"  id=invoice_no name="invoice_no" class="form-control"  />
                       </div>


                    </div>


                    <div class="form-group row">

                        <label for="invoice_dt" class="col-sm-2 col-form-label">Invoice Date:</label>
                        <div class="col-sm-4">
    
                        <input type="date" id=invoice_dt name="invoice_dt" class="form-control" readonly/>
                        </div>

                        <label for="invoice_amt" class="col-sm-2 col-form-label">Invoice Amount:</label>

						<div class="col-sm-4">
	
						<input type="text" id=invoice_amt name="invoice_amt" class="form-control"  readonly/>
	                    </div>
                     
                    </div>

                    <div class="form-group row">

                        <label for="trans_dt" class="col-sm-2 col-form-label">Dr Note Date:</label>

						<div class="col-sm-4">
						<input type="date" id="trans_dt" name="trans_dt" class="form-control"  />
	                    </div>

                        <label for="dr_date" class="col-sm-2 col-form-label">Sale Due dt:</label>

                        <div class="col-sm-4">
                        <input type="date" id="sale_due_dt" name="sale_due_dt" class="form-control"  readonly/>
                        </div>


                    </div>


                    <div class="form-group row">

                        <label for="dr_amt" class="col-sm-2 col-form-label">Dr Amount:</label>

                        <div class="col-sm-4">
                        <input type="text" id="tot_amt" name="tot_amt" class="form-control"  />
                        </div>

                       

                    </div>

                       <div class="form-group row">

                        <label for="dr_amt" class="col-sm-2 col-form-label">Remarks:</label>

                        <div class="col-sm-10">
                          <textarea id="remarks" name="remarks" class="form-control"></textarea>
                       
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

    $('#invoice_no').change(function(){

        $.get(

            '<?php echo site_url("drcrnote/invoice_detail");?>',
            { 
                soc_id: $('#soc_id').val(),
                invoice_no: $(this).val(),
            }

        )
        .done(function(data){

            var datas = JSON.parse(data);
            
           if(datas == null ){
             alert("Invalid Invoice No");
             $('#invoice_no').val("");  

           }else{
                $('#invoice_dt').val(datas.do_dt);  
                $('#invoice_amt').val(datas.tot_amt);     
                $('#sale_due_dt').val(datas.sale_due_dt);   

           }
             
          
        });

    });

});

     $('#trans_dt').change(function(){

       var date1 = new Date($('#invoice_dt').val());
       var date3 = new Date($('#sale_due_dt').val());
       
       var date2   = new Date($(this).val());

       if(date2.getTime() < date1.getTime()){

          alert("Dr Note Date Must Be Grater Than Invoice Date");
              $('#trans_dt').val("");
       }else{
    

        var Difference_In_Time = date2.getTime() - date1.getTime(); 
          
        // To calculate the no. of days between two dates 
      //  var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

        var Difference = date3.getTime() - date1.getTime(); 

      //  var DiffeDAY = Difference_In_Time / (1000 * 3600 * 24); 
          
      if(Difference_In_Time > Difference){

         alert("Dr Note Can Not Be Given");
         $('#trans_dt').val("");
        $('#submit').attr('type', 'buttom');

      }else{
          $('#submit').attr('type', 'submit');

      }

    }
          
     });

      $('#tot_amt').change(function(){

       var tot_amt = parseFloat($('#invoice_amt').val());

       
       var date2   = parseFloat($(this).val());

       if(date2 > tot_amt){

          alert("Dr Note amount must be less than Invoice Amount");
              $('#tot_amt').val("");
       }
  
          
     });

    

        
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
