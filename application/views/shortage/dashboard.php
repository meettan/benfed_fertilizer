<!-- <style>
a.dt-button{
    display: none;
}

 
</style> -->
<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Shortage/Damage Entry</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("stock/shortageAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                
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
                        <th>Trans No.</th>
                        <th>Trans Date</th>
                        <th>Company</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Ro No</th>
            			<th>Ro Date</th>
            			<th>View</th>
                        <th>Delete</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                        $i=0;
                    if($data) {
                            foreach($data as $value) {
                                // $disable_btn = $value->sale_cnt ? 'hidden' : '';
                                // $enable_btn = $value->sale_cnt ? '' : 'hidden';
                                
		    ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $value->trans_cd; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($value->trans_dt)); ?></td> -->
                                <td><?php echo $value->comp_name; ?></td>
                                <td><?php echo $value->prod_desc; ?></td>
                                <td><?php echo $value->qty; ?></td>
                                <td><?php echo $value->ro_no; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($value->ro_dt)); ?></td>
                                
			 	                <td>
                                     <a href="editshortage?trans_cd=<?php echo $value->trans_cd;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        

                                        <i class="fa fa-eye" style="color: #007bff"></i>
                                    </a>  
                                </td>
                                <!-- <td><button type="button" class="delete" id="<?php echo $value->ro_no;?>"    
                                       
                                        data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="myFunction()">

                                        <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                    </button> 


                                    
                                </td> -->
                                <td>
                                    <button type="button" name="delete_<?= $i ?>" class="delete" id="<?=$value->trans_cd;?>"    
                                       
                                       data-toggle="tooltip" data-placement="bottom" title="Delete" >

                                       <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                   </button> 
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
                        <th>Trans No.</th>
                        <th>Trans Date</th>
                        <th>Company</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Ro No</th>
            			<th>Ro Date</th>
            			<th>View</th>
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

            var ids = $(this).closest('tr').find('td:eq(2)  input').val();
            // var challan_flag = $('#challan_flag').val();

            var result = confirm("Do you really want to delete this record?");
           
            window.location = "<?php echo site_url('stock/deleteshortage?trans_cd="+id+"');?>";
           
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


<!-- <script>
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
</script> -->
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