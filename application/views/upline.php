<div style="background-color:rgb(52, 62, 72); padding:5px; position:fixed; top:0px; left:0px; width:100%; z-index:100;">
	<div style="float:left; font-size:24px; color:#ffffff; margin-left:20px; margin-top:-1px;">TASK MANAGER</div>

	<?php if($user != false){ ?>
	<div style="float:right; font-size:15px; text-transform:uppercase;  cursor:pointer; padding-top:6px; padding-bottom:6px; color:#ffffff; margin-right:20px;"><b><?=$user->login?></b> <span style="cursor:pointer; font-size:12px; margin-left:10px;" onclick="document.location='<?=$base_url?>users/logout';">logout</span></div>
	<?php }else{ ?> 
		<div style="float:right; font-size:15px; text-transform:uppercase;  cursor:pointer; padding-top:3px; padding-bottom:6px; color:#ffffff; margin-right:20px;"><span style="cursor:pointer; font-size:12px; margin-left:10px; margin-right:10px;" onclick="$('#darker').fadeIn(500); $('#loginForm').fadeIn(500);">LOGIN</span> | <span style="cursor:pointer; font-size:12px; margin-left:10px;" onclick="$('#darker').fadeIn(500); $('#regaForm').fadeIn(500);">REGISTRATION</span></div>
	<?php } ?>
	<div style="clear:both;"></div>
</div>
<div style="height:40px;"></div>