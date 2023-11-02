<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Upload file for reconcile</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("fertilizer/Upload_csv/upload_reconcile");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>

            </h3>
            <table id="example" class="table table-striped table-bordered table tableCustom">
                            <thead>
                                <tr>
                                   <th>Invoice Date</th>
                                    <th>District</th>
                                    <th>Society</th>
                                    <th>Ro No</th>
									<th>Invoice No.</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i = 0;
                            foreach($dmd_data as $dt){ ?>

                                <tr>
                                    <td><?=date('d/m/Y',strtotime($dt->inv_dt)) ?></td>
                                    <td><?= $dt->dist ?></td>
                                    <td><?= $dt->soc ?></td>
                                    <td><?= $dt->ro_no ?></td>
                                    <td><?= $dt->inv_no ?></td>
                                    <td><?= $dt->prod ?></td>
                                    <td><?= $dt->qty ?></td>
                                    <td><?= $dt->amt ?></td>
                                   
                                </tr>
                            <?php $i++; } ?>

                            </tbody>
                        </table>
            
        </div>

    </div>
    
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "pagingType": "full_numbers"
            });
        });
    </script>


<script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>

    window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    <?php } ?>
});

    


</script> 


