
<?php foreach($remain_list as $list){?>
	<div class="form-group row">
	<input type="checkbox" name="receipt_no[]" id="checkbox-<?=$list->receipt_no?>" value="<?=$list->receipt_no?>" class="custom" />
	<input type="hidden" value="<?=$list->pending_amt?>" id ='<?=$list->receipt_no?>'>
    <label for="checkbox-1"><?=$list->receipt_no?></label>
	<label for="" class="col-sm-2 col-form-label">Amount</label>
	<div class="col-sm-2"><?=$list->pending_amt?></div>
    </div>		
         
<?php }?>	
