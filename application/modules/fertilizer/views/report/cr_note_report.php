<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bill Print</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	
<link rel="stylesheet" type="text/css" href="css/apps.css">
<link rel="stylesheet" type="text/css" href="css/res.css">
	
	
</head>

<body>
<div class="wrapper_fixed">
<h2>The West Bengal State Co-operative Marketing Federation Ltd.</h2>
<h4>Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4>
  <h2>Credit Note</h2>
	<div class="billDateGroop">						                                <div class="dateTop">Date: <strong><?php echo  date("d-m-Y", strtotime($data->trans_dt));?></strong>.</div></div>
  <br clear="all">
  <p>No:<?php echo  $data->recpt_no;?></p>
  <p>Ref:  <?php echo  $data->invoice_no;?></p>


  <p><?php echo  $data->soc_name;?><br>
    GST Number: <?php echo  $data->gstin;?><br>
  State Name: West Bengal, Code 19<br>
  Place Of Suply: 
  West Bengal</p>
	
	<div class="tableBottomBorder">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>
		<table class="table tableCus">
  <thead>
    <tr>
      <th scope="col" class="double_1"><?php echo  $data->remarks;?></th>
      <th scope="col" class="double_2"><?php echo  $data->tot_amt;?></th>
      </tr>
    <tr>
      <td scope="row" class="double_1Body">&nbsp;</td>
      <td><?php echo  $data->tot_amt;?></td>
      </tr>
    <tr>
      <td scope="row"><strong>Amount (In Word):</strong> INR <?php echo getIndianCurrency(round($data->tot_amt));?></td>
      <td><strong><?php echo  $data->tot_amt;?></strong></td>
      </tr>
  </thead>
  <tbody>

    
  </tbody>
</table>
		</td>
    </tr>
  </tbody>
</table>
		
		
	</div>

  <p align="justify" >Company's pan: <strong>ANNKJKL1257</strong><br>
  </p>
  <h4>For The West Bengal State Co-operative Marketing Federation Ltd.</h4>
  <h3 >&nbsp;</h3>
  <div class="billDateGroop">
   					                                <div class="dateTop">Authorised Signature</div></div>
  <br clear="all">
  <br>
  Prepared By: <br>
</div>

</body>
</html>
