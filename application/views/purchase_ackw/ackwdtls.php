        <div class="row">
            <div class="col-lg-12">
                <h3><strong>Material  Acknowledge</strong></h3>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">    
            <table class="table table-bordered table-hover" id="">
                <thead>
                    <tr>
                    	<th>Sl No.</th>
                        <th> Date</th>
                        <th> Memo No</th>
                        <th>Company</th>
                        <th>Product</th>
                        <th>Qty</th>
            			<th>No fo Days</th>
                       
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
                                <td><?php echo date('d/m/Y',strtotime($value->trans_dt)); ?><?=$interval?></td>
                                <td><?php echo $value->memo_no; ?></td>
                                <td><?php echo $value->COMP_NAME; ?></td>
                                <td><?php echo $value->PROD_DESC; ?></td>
                                <td><?php echo $value->qty; ?></td>
                                <td><?php echo $value->no_of_days; ?></td>
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
                    </tr>
                </tfoot>
            </table>
        </div>
                    </div>
