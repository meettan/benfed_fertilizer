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

        <form method="POST" action="<?php echo site_url("drcrnote/drnoteAdd_tcs") ?>" onsubmit="return valid_data()"
            id="form">

            <div class="form-header">

                <h4>Add Dr Note Tax Collection Source(TCS)</h4>

            </div>

            <div class="form-group row">

                <label for="ro_no" class="col-sm-2 col-form-label">Society:</label>
                <div class="col-sm-4">

                    <select name="soc_id" id="soc_id" class="form-control sch_cd soc_id" required>
                        <option value="">Select Society</option>
                        <?php
                            foreach($socdtls as $key1)
                            { ?>
                        <option value="<?php echo $key1->soc_id; ?>"><?php echo $key1->soc_name; ?></option>
                        <?php
                            } ?>
                    </select>

                </div>

                
            </div>
            


            <!-- <div class="form-group row">
            
                    </div> -->
            <!-- </div> -->
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

                <label for="frm_date" class="col-sm-2 col-form-label">From Date:</label>

                <div class="col-sm-4">
                    <input type="date" id="frm_date" min="" name="frm_date" value="<?php echo set_value('frm_date'); ?>"
                        class="form-control mindate" required />
                </div>

                <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>
                <div class="col-sm-4">
                    <input type="date" id="to_date" min="" name="to_date" value="<?php echo set_value('to_date'); ?>"
                        class="form-control mindate" required />
                </div>
        
            </div>


            <div class="form-group row">

                <label for="dr_amt" class="col-sm-2 col-form-label">Amount:</label>
                <div class="col-sm-4">
                <input type="text" name="tot_amt" id="tot_amt"  class="form-control amt" value="" required="">
                </div>
               
            </div>
            <div class="form-group row">

            <label for="dr_amt" class="col-sm-2 col-form-label">Remarks:</label>

            <div class="col-sm-10">
                <textarea id="remarks" name="remarks" class="form-control" required></textarea>

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
   
    $(".sch_cd").select2();
</script>
<script>
    $('.mindate').attr( 'min','<?=$date->end_yr ?>-<?php $month=$date->end_mnth+1; if($month==13){echo sprintf("%02d",1);}else{echo sprintf("%02d",$month);}?>-01');
</script>

