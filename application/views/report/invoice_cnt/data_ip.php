<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px;

    font-size: 14px;
}

th {

    text-align: center;

}

tr:hover {background-color: #f5f5f5;}

</style>


    
    <div class="wraper">      

        <div class="col-md-6 container form-wraper">
    
                 <form method="POST" id="form" action="<?php echo site_url("fertilizer/report/invoice_cnt");?>" >

                <div class="form-header">
                
                    <h4>Document Issue Report</h4>

                </div>

                
                <div class="form-group row">

                    <label for="product" class="col-sm-2 col-form-label">From Date:</label>
                    <?php $fyear=$this->session->userdata['loggedin']['fin_yr']; $year=explode('-',$fyear) ?>
                    <div class="col-sm-10">

                       <input type="date"  value="<?=date('Y-m-d')?>" name ="fr_date" class="form-control" required min='<?=$year[0]?>-04-01' max="<?= $year[0]+1?>-03-31"/>

                    </div>

                </div> 

                <div class="form-group row">

                    <label for="product" class="col-sm-2 col-form-label">To Date:</label>

                    <div class="col-sm-10">

                       <input type="date"  value="<?=date('Y-m-d')?>" name ="to_date" class="form-control" required min='<?=$year[0]?>-04-01' max="<?= $year[0]+1?>-03-31"/>

                    </div>

                </div>
                <!-- <div class="form-group row">

                    <label for="product" class="col-sm-2 col-form-label">Business Type:</label>

                    <div class="col-sm-10">

                      <select name="bt" class="form-control">
                             <option value="1">B2B</option>
                             <option value="2">B2C</option>
                      </select>
                    </div>

                </div> -->


                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Submit" />

                    </div>

                </div>

            </form>    

        </div>

    </div>       
  
<script>

    $(document).ready(function(){

        $('#company').change(function(){

            $.get(

                '<?php echo site_url("fert/rep/popProd");?>',

                {
                    company : $(this).val()
                }
            ).done(function(data){

                var string = '<option value="">Select Product</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.PROD_ID + '">' + value.PROD_DESC + '</option>'
                });

                $('#product').html(string);
            });
        });        
    });
</script>  