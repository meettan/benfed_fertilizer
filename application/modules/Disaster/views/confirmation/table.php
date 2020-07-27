<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src= "https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src= "https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>
<link rel = "stylesheet" href= "https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


<div class="wraper">      
        
    <div class="row">
        
        <div class="col-lg-9 col-sm-12">

            <h1><strong>Delivery List</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">    

        <h3>

           <!-- <small><a href="<?php //echo site_url("Disaster/addAgentDelivery");?>" class="btn btn-primary" style="width: 100px;">Approve</a></small> --> 
            <span class="confirm-div" style="float:right; color:green;"></span>

        </h3> 

        <table class="table table-striped table-bordered table-hover" id="dataTables-example" >

            <thead>

                <tr>
                
                    <th>Delivery Date</th>
                    <th>District</th>
                    <th>Agent</th>
                    <th>Order No</th>
                    <th>Memo No</th>
                    <th>Allocated(M.T)</th>
                    <th>Delivered(M.T)</th>
                    <th>Option</th>
                    
                </tr>

            </thead>

            <tbody>

                <?php 
                    foreach($data as $key)
                    { ?>

                        <tr>
                        
                            <td><?php echo date("d-m-Y", strtotime($key->del_dt)); ?></td>
                            <td><?php echo $key->district_name; ?></td>
                            <td><?php echo $key->agent; ?></td>
                            <td><?php echo $key->order_no.' DT '.date("d-m-Y", strtotime($key->order_dt)) ; ?></td>
                            <td><?php echo $key->sdo_memo; ?></td>
                            <td><?php echo $key->allot_qty; ?></td>
                            <td><?php echo $key->qty; ?></td>
                            <td><a href="<?php echo site_url('Disaster/approveDelivery/'.$key->sl_no.'/'.$key->dist_cd.' '); ?>" class="btn btn-primary" style="width: 100px;">Approve</a></td>

                        </tr>

                <?php
                    } ?>
               
            </tbody>

            <tfoot>

                

            </tfoot>
        

        </table>

    </div>

</div>

<!-- DataTables JavaScript -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable();
    });
</script>