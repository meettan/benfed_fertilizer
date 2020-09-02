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
  <h2>Receipt - BIR Voucher</h2>
	<div class="billDateGroop">
	  <div class="crmBill">No: <strong><?php echo  $data->paid_id;?></strong></div>	
  <div class="dateTop">Date: <strong><?php echo  date("d-m-Y", strtotime( $data->paid_dt));?></strong>.</div></div>
  <br clear="all">
  <div class="tableBottomBorder">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>
		<table class="table tableCus">
  <thead>
    <tr>
      <th scope="col" class="double_1">Particulars</th>
      <th scope="col" class="double_2">Amount</th>
      </tr>
    <tr>
      <td scope="row" class="double_1Body"><strong>Account:</strong><?php echo  $data->soc_name;?></td>
      <td><?php echo  $data->amt;?></td>
      </tr>
    <tr>
      <td scope="row"><p><strong>Through: </strong><br>
      <?php echo  $data->bank_name;?></p>
        <p><strong>On Account Of: </strong><br>
         Being the payment received against invoice No <?php echo  $data->sale_invoice_no;?> <br>
</p>
        <p style="margin: 0; padding: 0;"><strong>Amount (In Word):</strong> INR <?php echo getIndianCurrency(round($data->amt));?> </p></td>
      <td style="vertical-align: bottom !important;"><strong><?php echo  $data->amt;?></strong></td>
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

  <p align="justify" ><br>
  </p>
  <div class="billDateGroop">
    <div class="dateTop">Authorised Signature</div></div>
  <br>
</div>

</body>
</html>
