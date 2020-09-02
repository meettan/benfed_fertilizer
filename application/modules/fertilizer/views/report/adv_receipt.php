<script>

  function printDiv(divName) {
        var divToPrint = document.getElementById(divName);
        var stylesheet = '<?=base_url();?>assets/css/bootstrap.min.css';
        var popupWin = window.open('', '', 'width=1240,height=800');
        popupWin.document.open();
        console.log(stylesheet);
        popupWin.document.write('<html><body onload="window.print()">'+
            '<link rel="stylesheet" href="' + stylesheet + '">'+ divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
    </script>
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

	<div class="billDateGroop">
	  <div class="crmBill">No: <strong><?php echo  $data->receipt_no;?></strong></div>	
  <div class="dateTop">Date: <strong><?php echo  date("d-m-Y", strtotime($data->trans_dt));?></strong>.</div></div>
	<br clear="all">
  
  <h2>The West Bengal State Co-operative Marketing Federation Ltd.</h2>
                        <h4>Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4>
 
  <p>&nbsp;</p>
  <h2><u>Receipt - BAN Voucher </u></h2>
  <div class="tableBottomBorder">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>
		<table class="table tableCus">
  <thead>
    <tr>
      <th scope="col" class="equal_1">Reward With Thanks From:</th>
      
      <th scope="col" class="equal_2"><?php echo  $data->soc_name;?></th>
      </tr>
    <tr>
    
							
      <td scope="row"><strong>The Sum Of :</strong></td>
      <td><?php echo getIndianCurrency(round($data->adv_amt));?></td>
        <!-- Cheque/DD - 3-Aug-2020 1,02,5000</td> -->
        <!-- <td rowspan="3" style="width: 67%;padding: 4px;" ><?php echo getIndianCurrency(round($net_amt-$tot_dis));?></td> -->
      </tr>
    <tr>
      <td scope="row"><strong>By:</strong></td>
      <td style="vertical-align: bottom !important;"><strong><?php echo  $data->adv_amt;?></strong></td>
      </tr>
    <tr>
      <td scope="row">Remarks: </td>
      <td style="vertical-align: bottom !important;"><strong><?php echo  $data->remarks;?></strong></td>
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
	  <div class="crmBill"><strong><?php echo  $data->adv_amt;?></strong></div>	
  <div class="dateTop">Date: <strong>.........</strong>.</div></div>
	<br clear="all">
	Subjet to Realisation
  <br>
</div>

</body>
</html>
