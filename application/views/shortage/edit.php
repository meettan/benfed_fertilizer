<div class="wraper">

    <div class="col-md-11 container form-wraper">
    
        <form method="POST" id="product" action="<?php echo site_url("shortage/editshortage") ?>">

            <div class="form-header">

                <h4>View Shortage/Damage Deatils</h4>

            </div>

            <div class="form-group row">
                <label for="receipt_no" class="col-sm-2 col-form-label">Trans Cd.:</label>

                <div class="col-sm-4">

                    <input type="text" id=trans_cd name="trans_cd" class="form-control"
                        value="<?php echo $shortageDtls->trans_cd; ?>" readonly />

                </div>
                <label for="trans_dt" class="col-sm-2 col-form-label">Trans Date:</label>

<div class="col-sm-4">

    <input type="date" id=trans_dt name="trans_dt" class="form-control"
        value="<?php echo $shortageDtls->trans_dt; ?>" required readonly/>

                </div>
                </div>
                <div class="form-group row">
                <label for="ro_no" class="col-sm-2 col-form-label">RO No.:</label>

                <div class="col-sm-4">

                    <input type="text" id=ro_no name="ro_no" class="form-control"
                        value="<?php echo $shortageDtls->ro_no; ?>" readonly />

                </div>
                <label for="ro_dt" class="col-sm-2 col-form-label">RO Date.:</label>

                <div class="col-sm-4">

                    <input type="text" id=ro_dt name="ro_dt" class="form-control"
                        value="<?php echo $shortageDtls->ro_dt; ?>" readonly />

                </div>
           </div>
           <div class="form-group row">
                <label for="Prod_id" class="col-sm-2 col-form-label">Product.:</label>

                <div class="col-sm-4">

                    <input type="text" id=Prod_id name="ro_no" class="form-control"
                        value="<?php echo $shortageDtls->prod_desc; ?>" readonly />

                </div>
             </div>

            <div class="form-group row">
                <label for="trans_flag" class="col-sm-2 col-form-label">Transaction Type:</label>
                <div class="col-sm-4">

                    <select name="trans_flag" class="form-control required" id="trans_flag" disabled>

                        <option value="S" <?php echo($shortageDtls->trans_flag=='S')?'selected':'';?>>Shortage</option>

                           <option value="D"<?php echo($shortageDtls->trans_type=='D')? 'selected' : '';?>>Damage</option>

                    </select>

                </div>

                <label for="qty" class="col-sm-2 col-form-label">Shortage/Return Qty:</label>
                <div class="col-sm-4">

                    <input type="text" id=qty name="qty" class="form-control required"
                        value="<?php echo $shortageDtls->qty; ?>" required readonly />

                </div>
            </div>
            

            
            <div class="form-group row">
                <label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
                <div class="col-sm-10">

                    <textarea readonly id=remarks name="remarks" class="form-control"><?php echo $shortageDtls->remarks; ?></textarea readonly>
                </div>
            </div>
            
           
        </form>
        
       
        <div class="form-group row">
            <div class="col-sm-10">


            </div>
            <!-- <div class="col-sm-2">
                <a href="<?php echo base_url();?>index.php/adv/add_advdetail?rcpt=<?php echo $advDtls->receipt_no; ?>"
                    class="btn btn-success">Detail Entry</a>

            </div> -->

        </div>
        

    </div>
</div>


<script>
    $(".sch_cd").select2();
</script>

<script>
    $(document).ready(function () {

        var i = 2;

        $('#bank').change(function () {

            $.get(

                    '<?php echo site_url("adv/f_get_dist_bnk_dtls");?>', {

                        bnk_id: $(this).val(),


                    }

                )
                .done(function (data) {

                    //console.log(data);
                    var parseData = JSON.parse(data);
                    var ac_no = parseData[0].ac_no;
                    var ifsc = parseData[0].ifsc;
                    $('#ac_no').val(ac_no);
                    // $('#ifsc').val(ifsc);

                });


        });

    });
</script>
<script>
    $('input:radio[name="cshbank"]').change(function () {
        console.log('hi');
        if ($(this).val() == '1') {
            $('#bank').attr('disabled', false);
            $('#bank').attr('required', 'required');
        } else if ($(this).val() == '0') {
            $('#bank').attr('disabled', true);
            $("#ac_no").val("");
            //  $("#bank").val('Select bank', 'Select bank'); 
            $("#bank")[0].selectedIndex = 0;
            $("#bank").trigger("change");
            $("#remarks").val("");

        }
    });

    $(document).ready(function () {

        var i = 0;
        $("#intro").on("change", ".comp_id", function () {

            var row = $(this).closest('tr');
            var comp_id = $(this).val();
            row.find("td:eq(1) .prod_id").html('');
            $.get('<?php echo site_url("stock/f_get_product");?>', {
                comp_id: $(this).val()
            }).done(function (data) {

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.prod_id + '">' + value
                        .prod_desc + '</option>'
                });

                row.find("td:eq(1) .prod_id").append(string);

            });

        });

    });

    $(document).ready(function () {

        $("#addrow").click(function () {

            var string = '';

            '<?php  foreach($compdtls as $key){  ?>';

            string +=
                '<option value="<?php echo $key->comp_id;?>"><?php echo $key->comp_name;?></option>';

            '<?php  }  ?>';


            var newElement1 = '<tr>' +
                '<td id= "td_cdpo" >' +
                '<select name="comp_id[]" style="width:250px" class= "form-control comp_id" required><option value="">Select</option>' +
                string +
                '</select>' +
                '</td>' +
                '<td id="td_pb_no">' +
                '<select name="prod_id[]" style="width:200px" class= "form-control prod_id" required>' +
                '</select>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="fo_no[]" class="form-control fo_no" id="" required>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="ro_no[]" class="form-control ro_no" id="" required>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="amount[]" class="form-control amount" id="" required>' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>' +
                '</td>' +
                '</tr>';

            $("#intro").append($(newElement1));
        })

        $("#intro").on("click", "#removeRow", function () {
            $(this).parents('tr').remove();
            //$('.amount_cls').change();
        });

    });
</script>

