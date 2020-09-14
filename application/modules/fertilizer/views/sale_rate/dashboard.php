<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Sale Rate List</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("fertilizer/salerateAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>
            </h3>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                        <th>Sl.No.</th>

                        <th>From Date</th>

                        <th>To Date</th>

                        <th>Company</th>

                        <th>Category</th>

                        <th>Product</th>

            			<th>Edit</th>
                       
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                        $i=0;
                        if($ratedtls) {
                                foreach($ratedtls as $value) {
		            ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>
                              
				                <td style="display:none;"><?php echo $value->bulk_id; ?></td>
                                 
                                <td><?php echo $value->frm_dt; ?></td>

                                <td><?php echo $value->to_dt; ?></td>

                                <td><?php echo $value->comp_name; ?></td>

                                <td><?php echo $value->cate_desc; ?></td>

                                <td><?php echo $value->prod_desc; ?></td>

			 	                <td><a href="key/editsoceity?soc_id=<?php //echo $value->soc_id;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
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
                    
                        <th>Sl.No.</th>

                        <th>From Date</th>

                        <th>To Date</th>

                        <th>Company</th>

                        <th>Category</th>

                        <th>Product</th>

                        <th>Edit</th>
                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    });

    <?php } ?>
</script>