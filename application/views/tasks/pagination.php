<div style="margin-top:40px; color:#aaaaaa;">
		<div style="float:left; margin-top:4px; margin-right:10px;">PAGES:</div> 
		<?php for ($i = 0; $i<($countPages); $i++){ ?>
			<div onclick="show_tasks('<?=$base_url?>', <?=($i*3)?>);" style="float:left; margin-right:5px; padding:4px; padding-left:7px; padding-right:7px; font-size:14px; <?php if($i == ($curPage/3)){  ?> background-color:#1A8FC4; color:#ffffff; <?php  }else{ ?>background-color:#eeeeee; cursor:pointer; <?php } ?> ">
				<?=($i+1)?>
			</div>
		<?php } ?>
		<div style="clear:both;"></div>
	</div>