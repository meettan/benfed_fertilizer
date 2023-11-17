<div class="wraper">      
        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <h1><strong>Cumulative advance Forward</strong></h1>
            </div>
        </div>
        <div class="col-lg-12 container contant-wraper">    
            <h3>
		        <small><a href="<?php echo site_url("adv/fwd_remain_amt");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
              
            </h3>
            <div class="form-group row">
            <!-- <form method="POST" action="<?=base_url()?>index.php/adv/advancefwd" >
                        <div class="col-sm-3">
	                    <input type="date" style="width:300px" id=from_date name="from_date" class="form-control" value='<?=$frmdt?>' />
                        </div>
                        <div class="col-sm-3">
                        <input type="date" style="width:250px" id=to_date name="to_date" class="form-control"  value='<?=$todt?>'/>
	                    </div>
                        <div class="col-sm-3">
                        <input type="submit" id= "submit" class="filt" value="Filter" />
                        </div>
            </form> -->
            </div>
            <table class="table table-bordered table-hover" id="example">

                <thead>
                    <tr>
                        <th>Sl.No.</th>
                        <th>Date</th>
                        <th>Advance No</th>
                        <th>Cumulative Adv No</th>
                        <th>Forward Adv No</th>
                        <th>Bulk Transaction id</th>
                        <th>Amount</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                        $i=0;
                        if($list) {
                                foreach($list as $value) {     ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($value->trans_dt)); ?></td>
                                <td><?php echo $value->adv_receipt_no; ?></td>
                                <td><?php echo $value->cuml_adv_no; ?></td>
                                <td><?php $sql = "select fwd_receipt_no from tdf_adv_fwd where detail_receipt_no ='$value->cuml_adv_no' ";
                                             $result = $this->db->query($sql)->row();
                                            // echo $this->db->last_query();
                                 if(!empty($result)) echo $result->fwd_receipt_no;  ?></td>
                                <td><?php echo $value->bulk_trans_id; ?></td>
                                <th><?php echo $value->tot_amt; ?></th>
                               
			 	                <td><a href="f_pending_amt_view?fwd_no=<?php echo base64_encode($value->bulk_trans_id);?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="View">
                                        <i class="fa fa-eye fa-2x" style="color: #007bff"></i>
                                    </a>
                                 <?php if($value->status == 'N') { ?>
                                    <button type="button" class="delete" id="<?php echo $value->cuml_adv_no;?>"  data-toggle="tooltip" data-placement="bottom" title="Delete">
                                        <i class="fa fa-trash-o fa-2x" style=""></i>
                                    </button> 
                                  <?php } ?>
                                </td>
                            </tr>

                    <?php
                            }  }
                        else {
                            echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";
                        }
                    ?>
                
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl.No.</th>
                        <th>Date</th>
                        <th>Advance No</th>
                        <th>Cumulative Adv No</th>
                        <th>Forward Adv No</th>
                        <th>Bulk Transaction id</th>
                        <th>Amount</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

<script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    <?php } ?>

    });
</script>

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {
            var id = $(this).attr('id');
            console.log(id);
            var result = confirm("Do you really want to delete this record?");
            if(result) {
                window.location = "<?php echo site_url('adv/pending_amt_Del?data="+id+"');?>";
            }
            
        });

    });
</script>

<script>
var clicked = false;
$(".filtd").on("click", function() {
    var frmdt = $('#from_date').val();
    var todt = $('#to_date').val();
    $(this).closest("form").attr("action", "advancefwd");   
    
     var base_url = '<?=base_url()?>';
    if(frmdt=='' && todt==''){
        alert('raj'); 
        $(this).closest("form").attr("action",base_url+"/index.php/trade/sale"); 
        $(this).closest("form").attr("action", "advance"); 
    }
  
  
});



</script>
