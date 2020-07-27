<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Cr Note Entry</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("fertilizer/crnoteAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>
            </h3>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                    	<th>Sl No.</th>
                        <th>Company</th>
                        <th>Do No</th>
            			<!-- <th>Prod Id</th> -->
                        <th>Do_dt</th>
                        <th>Invoice NO</th>
                        <th>Amout</th>
                        <!-- <th>Invoice FLAG</th> -->
            			
                        <th>Delete</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php
                        $i=0;
                    if($credit_notes) {
                            foreach($credit_notes as $credit) {
		    ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $credit->COMP_NAME; ?></td>
                                <td><?php echo $credit->do_no; ?></td>
                                <td><?php echo date("d/m/Y",strtotime($credit->do_dt)); ?></td>
				                <td><?php echo $credit->invoice_no; ?></td>
                                <td><?php echo $credit->tot_amt; ?></td>
                               
			 	                <td><a href="crnote_edit?trans_do=<?=$credit->comp_id;?>/<?=$credit->do_no;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                               
                               <button type="button" class="delete" id="<?=$credit->comp_id;?>/<?=$credit->do_no;?>"    
                                       
                                        data-toggle="tooltip" data-placement="bottom" title="Delete">

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
                        <th>Company</th>
                        <th>Do No</th>
            			<!-- <th>Prod Id</th> -->
                        <th>Do_dt</th>
                        <th>Invoice NO</th>
                        <th>Amout</th>
                        <!-- <th>Invoice FLAG</th> -->
            		
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
            // window.alert("<?php echo $this->session->flashdata('msg'); ?>");
            var result = confirm("Do you really want to delete this record?");
           
            if(result) {

                window.location = "<?php echo site_url('fertilizer/deletecr_note?trans_do="+id+"');?>";

            }
            
        });

    });

</script>

<!-- <script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    });

    <?php } ?>
</script> -->


