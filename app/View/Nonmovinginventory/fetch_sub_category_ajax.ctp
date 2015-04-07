
      <?php
	  if(!empty($sub_categories_ARR))
	  {
		  ?>
 <span id="sub_category_ajax">     
<div class="form-group">
    <label class="col-md-2 control-label">Sub Category: <span class="required">
    * </span>
    </label>
    <div class="col-md-10">
        <select class="table-group-action-input form-control input-medium"  id="sub_categories_id"  name="sub_category_id" >
            <option   value="">---Select Subcategory---</option>
            <?php
            foreach($sub_categories_ARR as $value)
			{
				$sub_categories=$value['sub_categorie']['sub_categories'];
				$sub_categories_id=$value['sub_categorie']['id'];
				?>
                <option   value="<?php echo $sub_categories_id; ?>" >&nbsp;&nbsp;&nbsp;<?php echo $sub_categories ; ?></option>
                <?php
				
			}
            ?>
        </select>
    </div>
</div></span>
<?php
	  }
?>