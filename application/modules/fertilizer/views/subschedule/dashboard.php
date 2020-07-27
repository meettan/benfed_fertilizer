<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Sub Schedule Master</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("finance/subscheduleAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
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
                        <th>Schedule Code</th>
                        <th>Subschedule Code</th>
                        <th>Subschedule Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                    $i=0;
                    if($data) {
                            foreach($data as $value) {
		    ?>

                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $value->schedule_code; ?></td>
                                <td><?php echo $value->subschedule_code; ?></td>
			             	    <td><?php echo $value->subschedule_type; ?></td>
                                <td><a href="editsubSchedule/edit?subschedule_code=<?php echo $value->subschedule_code;?>" 
                                            data-toggle="tooltip" data-placement="bottom" title="Edit">

                                            <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                                </td>
                                <td><button type="button" class="delete" id="<?php echo $value->subschedule_code;?>"    
                                       
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
                      <th>Schedule Code</th>
                      <th>Subschedule Code</th>
                      <th>Subschedule Name</th>
                      <th>Edit</th>
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

            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('finance/finance/deleteSubSch?subSchCd="+id+"');?>";

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


