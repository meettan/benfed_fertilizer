<!-- <style>
a.dt-button{
    display: none;
}

 
</style> -->
<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Material Acknowledge</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("stock/pur_ackwadd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <!-- <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div> -->
            </h3>

            <div class="form-group row">
              <form method="POST" action="" >

                        <div class="col-sm-3">
	                    <input type="date" style="width:300px" id=from_date name="from_date" class="form-control" value="<?php echo  date('Y-m-d'); ?>" />
                        </div>

                        <div class="col-sm-3">
                        <input type="date" style="width:250px" id=to_date name="to_date" class="form-control" value="<?php echo  date('Y-m-d'); ?>"  />
	                    </div>

                        <div class="col-sm-3">
                        <input type="submit" id= "submit" class="filt" value="Filter" />
                        </div>

               
            </form>
            </div>

            <table class="table table-bordered table-hover"id="example">

                <thead>

                    <tr>
                    	<th>Sl No.</th>
                        <th> Date</th>
                        <th> Memo No</th>
                        <th>Company</th>
                        <th>Product</th>
                        <th>Qty</th>
            			<th>No fo Days</th>
                        <th>Delete</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                        $i=0;
                    if($data) {
                            foreach($data as $value) {
                             
                                $start_ts = strtotime($value->trans_dt);
                                $end_ts = strtotime(date('Y-m-d'));
                                $diff = $end_ts - $start_ts;
                                $interval = round($diff / 86400); 
                                $color="";
                              if( $interval > $value->no_of_days) {
                                $color ='red';
                               }else{
                                $color ='green';
                               }
                                
		    ?>

                            <tr style="color:<?=$color?>">   
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $value->trans_dt; ?></td>
                                <td><?php echo $value->memo_no; ?></td>
                                <td><?php echo $value->COMP_NAME; ?></td>
                                <td><?php echo $value->PROD_DESC; ?></td>
                                <td><?php echo $value->qty; ?></td>
                                <td><?php echo $value->no_of_days; ?></td>
                                <td>
                                    <!-- <button type="button" name="delete_<?= $i ?>" class="delete" id="<?=$value->ro_no;?>"    
                                       
                                       data-toggle="tooltip" data-placement="bottom" title="Delete" <?= $disable_btn; ?> onclick="myFunction()">

                                       <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                   </button>  -->
                               </td>

                            </tr>

                    <?php
                            
                            }

                        }

                        else {

                            echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";

                        }
                    ?>
                
                </tbody>

                <tfoot>

                    <tr>
                    	<th>Sl No.</th>
                        <th> Date</th>
                        <th> Memo No</th>
                        <th>Company</th>
                        <th>Product</th>
                        <th>Qty</th>
            			<th>No fo Days</th>
                        <th>Delete</th>
                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {
            
            var id = $(this).attr('id');

            var ids = $(this).closest('tr').find('td:eq(6)  input').val();
            var challan_flag = $('#challan_flag').val();

           if( challan_flag== "N" ){  
       
        //  alert("You Can Not Delete");
        //    } else{
            var result = confirm("Do you really want to delete this record?");
           
            if(result) {

                window.location = "<?php echo site_url('stock/deletero?ro_no="+id+"');?>";

            }
        }
            
        });

    });

</script>

<script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    });

    <?php } ?>
</script>


<script>
function myFunction() {
	var challan_flag = $('#challan_flag').val();
	//  alert(salerate);
	if(challan_flag=='Y'){
		alert('Some Sale Transaction has Occured ! Delete Not Possible!');
		// $('#submit').attr('type', 'buttom');
		event.preventDefault();
	}else{
	// $('#submit').attr('type', 'submit');
	}
}
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