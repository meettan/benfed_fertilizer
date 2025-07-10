<style>
        #overlay {
            background: rgba(100, 100, 100, 0.2);
            color: #ffff;
            position: fixed;
            height: 100%;
            width: 100%;
            z-index: 5000;
            top: 0;
            left: 0;
            float: left;
            text-align: center;
            padding-top: 25%;
            opacity: .80;
        }
    
    
    
        .spinner {
            margin: 0 auto;
            height: 64px;
            width: 64px;
            animation: rotate 0.8s infinite linear;
            border: 5px solid #228ed3;
            border-right-color: transparent;
            border-radius: 50%;
        }
    
        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
    
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <div class="wraper">
    <div class="col-md-2 container"></div>
    <div class="col-md-8 container form-wraper">

        <form method="POST" action="<?php echo site_url("stock/shortageAdd") ?>" onsubmit="return valid_data()"
            id="form">

            <div class="form-header">

                <h4>Shortage/Damage Entry</h4>

            </div>

            <div class="form-group row">

            
<label for="comp_id" class="col-sm-2 col-form-label">Company<span style="color: red;">*</span>:
</label>


                <div class="col-sm-4">

                    <select name="comp_id" id="comp_id" class="form-control comp_id" required>
                        <option value="">Select Company</option>
                        <?php
                                foreach($compdtls as $row)
                            { ?>
                        <option value="<?php echo $row->comp_id; ?>"><?php echo $row->comp_name; ?></option>
                        <?php
                            } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">

                
                <label for="ro_no" class="col-sm-2 col-form-label">RO No:<span style="color: red;">*</span></label>

                <div class="col-sm-4">

                    <select name="ro_no" id="ro_no" class="form-control sch_cd ro_no" required>
                        <option value="">Select Ro</option>
                      
                    </select>
                </div>

                <label for="ro_dt" class="col-sm-2 col-form-label">RO Date:<span style="color: red;">*</span></label>

            <div class="col-sm-4">
            <input type="date" id="ro_dt" min="" name="ro_dt" value="" class="form-control mindate" readonly />
            </div>
            </div>


            <div>
                <?php

							foreach($mntend as $prod);{

							?>
                <input type="hidden" name="mnthenddt" style="width:80px" class="form-control required mnthenddt"
                    value="<?php echo $prod->mnthdt; ?>" id="mnthenddt" readonly>
                <?php

							}

							?>
            </div>
            <div class="form-group row">
            <label for="prod_desc" class="col-sm-2 col-form-label">Product:<span style="color: red;">*</span></label>
               
               <div class="col-sm-4">
               <input type="text" name="prod_desc" id="prod_desc" style="width:150px;" class="form-control prod_desc" value="" readonly >
               <input type="hidden" name="prod_id" id="prod_id" style="width:150px;" class="form-control prod_id" value="" readonly >
                   </div> 

                   <label for="unit" class="col-sm-2 col-form-label">Unit:<span style="color: red;">*</span></label>
               
               <div class="col-sm-3">
               <input type="text" name="unit" id="unit" style="width:150px;" class="form-control unit" value="" readonly >
                   </div>
            
            </div>
            <div class="form-group row">
  
            <label for="qty" class="col-sm-2 col-form-label">Qty:<span style="color: red;">*</span></label>
               
               <div class="col-sm-3">
               <input type="decimal" name="qty" id="qty" style="width:150px;" class="form-control qty" value="" >
                   </div> 
                   <label for="rate" class="col-sm-1 col-form-label">Rate:<span style="color: red;">*</span></label>
               
               <div class="col-sm-2">
               <input type="decimal" name="rate" id="rate" style="width:120px;" class="form-control rate" value="" readonly>
                   </div> 
                   
                   <label for="trnas_type" class="col-sm-1 col-form-label">Trans Type:<span style="color: red;">*</span></label>
               
               <div class="col-sm-2">
               <select name="trnas_type" id="trnas_type" style="width:200px" class="form-control trnas_type"
                        required>
                        <option value="S">Shortage</option>
                        <option value="D">Damage</option>
                        
                    </select>
                   </div> 
            </div>


            <div class="form-group row">

                <label for="remarks" class="col-sm-2 col-form-label">Remarks:<span style="color: red;">*</span></label>

                <div class="col-sm-10">
                    <textarea id="remarks" name="remarks" class="form-control" required></textarea>

                </div>
            </div>
            <div class="form-group row">

                <label for="txt_amt" class="col-sm-2 col-form-label">Taxable Amount</label>
               
                <div class="col-sm-3">
                <input type="decimal" name="txt_amt" id="txt_amt" style="width:100px;" class="form-control txt_amt" value="" readonly>
                    </div>        
                   <label for="cgst" class="col-sm-1 col-form-label">CGST:</label>
                   <div class="col-sm-2">
                   <input type="decimal" name="cgst" id="cgst" style="width:90px;" class="form-control cgst" value="" readonly >
                       
                    </div>
                    <label for="sgst" class="col-sm-1 col-form-label">SGST:</label>
                   <div class="col-sm-2">
                   <input type="decimal" name="sgst" id="sgst" style="width:90px;" class="form-control sgst" value="" readonly >
                       
                    </div>

            </div>

            

            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" id="submit" class="btn btn-info active_flag_c" value="Save" />

                </div>

            </div>

        </form>


    </div>

</div>
<div id="overlay" style="display:none;">
        <div class="spinner"></div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var i = 0;
        $('#comp_id').change(function () {
            $('#overlay').fadeIn().delay(3000).fadeOut();
            $.get(

                '<?php echo site_url("stock/f_get_pur_ro");?>',

                {

                   
                    comp_id: $('#comp_id').val()

                }

            ).done(function (data) {

                var string = '<option value="">Select Invoice</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.ro_no + '">' + value
                        .ro_no + '</option>'

                });

                $('#ro_no').html(string);


            });


        });
        $('#year').change(function () {
            $('#overlay').fadeIn().delay(3000).fadeOut();
            $.get(

                '<?php echo site_url("drcrnote/f_get_sale_refinv");?>',

                {

                    soc_id: $('#soc_id').val(),
                    comp_id: $('#comp_id').val(),
                    year: $(this).val(),

                }

            ).done(function (data) {

                var string = '<option value="">Select Invoice</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.trans_do + '">' + value
                        .trans_do + '</option>'

                });

                $('#ref_invoice_no').html(string);


            });


        });

    });
</script>


<script>
    $(document).ready(function () {

        var i = 0;

        $('#inv_no').change(function () {
            $('#overlay').fadeIn().delay(1000).fadeOut();

            $.get(

                '<?php echo site_url("drcrnote/f_get_sale_invro");?>',

                {

                    soc_id: $('#soc_id').val(),
                    inv_no: $(this).val()

                }

            ).done(function (data) {

                var string1 = '<option value="">Select Ro</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string1 += '<option value="' + value.sale_ro + '">' + value
                        .sale_ro + '</option>'

                });

                $('#ro_no').html(string1);
            });


        });

    });
</script>
<script>
     $(document).ready(function () {
       
        $('#ro_no').change(function ()
            //Getting purchase details for supplying RO
            {
                
                $.get('<?php echo site_url("stock/js_get_pur_qty");?>', {
                    ro_no: $(this).val()
                    })

                    .done(function (data) {

                        var unitData = JSON.parse(data);
                        var ro_dt = unitData.ro_dt;
                         $('#ro_dt').val(ro_dt);
                         $('.prod_desc').eq($('.ro_no').index(this)).val(unitData.prod_desc);
                         $('.prod_id').eq($('.ro_no').index(this)).val(unitData.prod_id);
                        $('.unit').eq($('.ro_no').index(this)).val(unitData.unit_name);
                        $('.rate').eq($('.ro_no').index(this)).val(unitData.rate);
                        $('.qty').eq($('.ro_no').index(this)).val(unitData.qty);
                        $('.txt_amt').eq($('.ro').index(this)).val(unitData.base_price);
                        $('.cgst').eq($('.ro').index(this)).val(unitData.cgst);
                        $('.sgst').eq($('.ro').index(this)).val(unitData.sgst);
                        // $('.tot_amt').eq($('.ro').index(this)).val(0);


                    });

            });
        });


</script>

<script>
    $('.table tbody').on('keyup', '.amt', function () {

        var sum = 0;
        // let row = $(this).closest('tr');

        $("input[class *= 'amt']").each(function () {
            sum += parseFloat($(this).val());

        });
        $("#total").val(sum).toFixed(2);

    })

    $('.table tbody').on('change', '.cat_id', function () {
        var selval = $(this).val();
        var c = 0;
        $('.cat_id').each(function () {
            var select_val = $(this).val();
            if (selval == select_val) {
                c = c + 1;
            }
        });
        var tstval = $(this).find('option:selected').text(); //$('#cat_id option:selected').text();
        if (c > 1) {
            $("#submit").prop('disabled', true);
            alert(tstval + " Already selected");
        } else {
            $("#submit").prop('disabled', false);
        }


    })



    $(document).ready(function () {
        $('#addrow').click(function () {
            $('.cat_id').each(function () {
                var select_val = $(this).val();
                // if(select_val==){
                //     alert)();
                // }
            });
            //alert(arr);
            $.get(

                '<?php echo site_url("drcrnote/f_get_cr_category");?>',

                

            ).done(function (data) {

                var string = '<option value="">Select Type</option>';
                //console.log(data);
                $.each(JSON.parse(data), function (index, value) {
                    var totalval =

                        string += '<option value="' + value.cat_id + '">' + value
                        .cat_id +
                        '</option>'

                });
                // For add row option
                // $('#addrow').click(function(){

                var newElement = '<tr>' +
                    '<td><select class="form-control cat_id"name="cat_id[]" id="cat_id" style="width:350px"   required><option value="">Select</option><?php foreach($catdtls  as $catg){?><option value="<?php echo $catg->sl_no;?>"><?php echo $catg->cat_desc;?></option> <?php }?></select></td>' +
                    ' <option value=" ' + string + '</option>' +
                    '</select> ' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="tot_amt[]" style="width:130px;" class="form-control amt" value= "" id="paid_amt" required>' +
                    '</td>' +
                    '<td>' +
                    '<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>' +
                    '</td>'
                '</tr>';

                $("#intro").append($(newElement));

            });
        });
        

        $('.total').change(function () {

            var total = $('#nt').val();
            var ntAmount = $('#nt').val();
            $('.cgst_val').each(function () {

                var curr_gst_val = $(this).val();
                total = parseFloat(total) + parseFloat(parseFloat(curr_gst_val) * 2);


            })
            $('#total').val(parseFloat(total).toFixed());

            var total_subAmnt = 0;
            $('.sub_amnt').each(function () {

                var tot_sub_amnt = $(this).val();
                total_subAmnt = parseFloat(total_subAmnt) + parseFloat(tot_sub_amnt);

                if (parseFloat(ntAmount) < parseFloat(total_subAmnt)) {
                    $('#nt').css('border-color', 'red');
                    $('#submit').prop('disabled', true);
                    return false;
                } else {
                    $('#nt').css('border-color', 'green');
                    $('#submit').prop('disabled', false);
                    return true;
                }


            })

        });

    })
</script>
<!-- <script>
    $("#intro").on("click", "#removeRow", function () {
        var total = 0.00;
        $(this).parent().parent().remove();
        $('.amt').each(function () {
            total += parseFloat($(this).val()) ? parseFloat($(this).val()) : 0.00;
        })
        $("#total").val(total.toFixed(2));
    });

    $("#intro").on("change", ".amt", function () {
        var total = 0;
        $('.amt').each(function () {
            total += parseFloat($(this).val()) ? parseFloat($(this).val()) : 0.00;
        })
        $("#total").html(total.toFixed(2));



        if ($(this).val() <= 0) {
            alert('Amount should not be less than or equal to Zero !');
            $("#submit").prop('disabled', true);
            return false;
        } else {
            $("#submit").prop('disabled', false);
        }
    });


</script> -->

<script>
    $('.mindate').attr( 'min','<?=$date->end_yr ?>-<?php $month=$date->end_mnth+1; if($month==13){echo sprintf("%02d",1);}else{echo sprintf("%02d",$month);}?>-01');
</script>


   