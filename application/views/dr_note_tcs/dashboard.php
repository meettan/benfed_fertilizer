<div class="wraper">

    <div class="row">

        <div class="col-lg-9 col-sm-12">

            <h1><strong>Debit Note Tax Collection Source(TCS)</strong>
                <h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">

        <h3>
            <small><a href="<?php echo site_url("drcrnote/drnoteAdd_tcs");?>" class="btn btn-primary"
                    style="width: 100px;">Add</a></small>
            <span class="confirm-div" style="float:right; color:green;"></span>
            <!-- <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div> -->
        </h3>


        <div class="form-group row">
            <form method="POST" action="">

                <div class="col-sm-3">
                    <input type="date" style="width:300px" id="from_date" name="from_date" class="form-control"
                        value="<?php echo date('Y-m-d') ?>">
                </div>

                <div class="col-sm-3">
                    <input type="date" style="width:250px" id="to_date" name="to_date" class="form-control"
                        value="<?php echo date('Y-m-d') ?>">
                </div>

                <div class="col-sm-3">
                    <input type="submit" id="submit" class="filt" value="Filter">
                </div>

            </form>
        </div>

        <table class="table table-bordered table-hover" id="example">

            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Receipt No</th>
                    <th>Society Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>View</th>
                    <th>Print</th>
                    <!-- <th>Delete</th> -->
                </tr>

            </thead>

            <tbody>

                <?php
                        $i=0;
                        if($dr_notes) {
                                foreach($dr_notes as $dr) {
		            ?>

                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $dr->recpt_no;?></td>
                    <td><?php echo $dr->soc_name;?></td>
                    <td><?php echo date("d/m/Y",strtotime($dr->trans_dt)); ?></td>
                    <td><?php echo $dr->tot_amt; ?></td>
                    <td>
                        <button type="button" name="Edit<?= $i ?>" class="Edit_" id="Edit" data-toggle="tooltip"
                            data-placement="bottom" title="Edit_" >
                            <a href="drnotetcs_edit?id=<?=$dr->id;?>" data-toggle="tooltip"
                                data-placement="bottom" id="edit_<?= $i ?>">
                                <i class="fa fa-eye fa-2x" style="color: #007bff"></i>
                            </a>
                    </td>
                    <td>
                              <a href="drnotetcs_recipt?id=<?=$dr->id;?>" title="Print">
                              <i class="fa fa-print fa-2x" style="color:green;"></i>  
                              <!-- <span class="mdi mdi-printer"></span> -->
                              </a>
                            </td>
                     <!--<td>
                        <button type="button" class="delete" id="<?=$dr->trans_dt;?>&trans_no=<?=$dr->id;?>&recpt_no=<?=$dr->recpt_no?>"
                            data-toggle="tooltip" data-placement="bottom" title="Delete"  >
                            <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                        </button> 
                    </td>-->
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
                    <th>Receipt No</th>
                    <th>Society Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>View</th>
                    <th>Print</th>
                    <!-- <th>Delete</th> -->
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('.delete').click(function () {

            var id = $(this).attr('id');
            // window.alert("<?php echo $this->session->flashdata('msg'); ?>");
            var result = confirm("Do you really want to delete this record?");

            //if (result) {
                window.location = "<?php //echo site_url('drcrnote/deletedr_notetcs?trans_dt=" + id +"');?>";

          //  }

        });

    });
</script>

<script>
    $(document).ready(function () {

            <?php if ($this->session->flashdata('msg')){ ?>
                window.alert("<?php echo $this->session->flashdata('msg'); ?>");
                <?php } ?>
            });

       
</script>


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