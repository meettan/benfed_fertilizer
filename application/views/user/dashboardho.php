    <div class="wraper">      
        <div class="row"> 
            <div class="col-lg-9 col-sm-12">
                <h1><strong>User List</strong></h1>
            </div>
        </div>
        <div class="col-lg-12 container contant-wraper">    
        <h5 style="text-align:left">

               
<!-- <center> -->
    
<input type="radio" id="status" name="user_status" class="status" checked  value="A"> <label for="html">Active</label>  &nbsp; &nbsp; &nbsp;
<input type="radio" id="status" name="user_status" class="status" value="U"><label for="approve">Pending</label> &nbsp; &nbsp; &nbsp; 
<input type="radio" id="status" name="user_status" class="status" value="D"> <label for="html">Inactive</label> 
<!-- </center> -->

</small>

<span class="confirm-div" style="float:right; color:green;"></span>

</h5>
<h5 style="text-align:right">
<span>Branch :</span>
<select name="" id="branch">
    <option value="0">ALL</option>
    <?php foreach ($branch as $key) {  ?>
    <option value="<?php echo $key->id ?>"><?php echo $key->branch_name; ?></option>
    <?php } ?>
</select></h5>




            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                    
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>User Id</th>
                        <th>Option</th>

                    </tr>

                </thead>

                <tbody id='user_list'> 

                    <?php 
                    
                    if($user_dtls) {

                        $i = 0;
                        
                            foreach($user_dtls as $u_dtls) {

                    ?>

                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $u_dtls->user_name; ?></td>
								
                                <td><?php if($u_dtls->user_type == 'A'){
                                            echo '<span class="badge badge-success">Admin</span>';
                                          }
                                          elseif ($u_dtls->user_type == 'M') {
                                            echo '<span class="badge badge-warning">Manager</span>';
                                          }elseif ($u_dtls->user_type == 'D') {
                                            echo '<span class="badge badge-warning">Accountant</span>';
                                          }elseif ($u_dtls->user_type == 'U') {
                                            echo '<span class="badge badge-dark">General User</span>';
                                          }
                                            ?>
                                </td>
                                <td><?php echo $u_dtls->user_id; ?></td>
                                <td>
                                    <a href="admins/user_edit_admin?user_id=<?php echo $u_dtls->user_id; ?>" 
                                        data-toggle="tooltip"
                                        data-placement="bottom" 
                                        title="Edit">
                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                            
                            }

                        }

                        else {

                            echo "<tr><td colspan='6' style='text-align: center;'>No data Found</td></tr>";

                        }
                    ?>
                
                </tbody>

                <tfoot>

                    <tr>
                    
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>User Id</th>
                        <th>Option</th>

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

                window.location = "<?php echo site_url('admin/user/delete?user_id="+id+"');?>";

            }
            
        });

    });

</script>

<script>
   
    $(document).ready(function() {

    $('.confirm-div').hide();

    <?php if($this->session->flashdata('msg')){ ?>

    $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
	
	<?php } ?>

    });
	
	$(document).ready( function (){

        $('input[type=radio][name=user_status]').on('change', function() {

            var branch=$("#branch").val();
   
   
        var ststus= $(this).val();

  getData(ststus,branch);

			
			
		  
		});

    });
	
$('#branch').change(function(){
    var branch=$(this).val();
   
    if ($('.status').is(":checked")) {
        var ststus= ($('.status').val());
    
  }

  getData(ststus,branch);
})

function getData(ststus,branch){
    $.ajax({
				type: "GET",
				url: "<?php echo site_url('admins/get_userlist'); ?>",
				data: {
					user_status: ststus, branch:branch,
				},
				success: function(result) {
				   
					  var string = '';
					  var sl_no = 1;
					  var  utype = '';
					$.each(JSON.parse(result), function( index, value ) {
						
						if(value.user_type == 'A'){
                          utype = '<span class="badge badge-success">Admin</span>';
					    }else if (value.user_type == 'M') {
                            utype = '<span class="badge badge-warning">Manager</span>';
                        }else if (value.user_type == 'U') {
                             utype = '<span class="badge badge-dark">General User</span>';
                            }

						string += '<tr><td>'+ sl_no++ +'</td><td>' + value.user_name + '</td><td>' + utype + '</td><td>' + value.branch_name + '</td><td><a href="admins/user_edit_admin?user_id=' + value.user_id + '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit fa-2x" style="color: #007bff"></i></a></td></tr>'
                     
					});
					$('#user_list').html();
					$('#user_list').html(string);
					
				}
            });
}
    
</script>
