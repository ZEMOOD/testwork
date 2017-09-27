<div class="taskItem"  style="border:solid 1px #cccccc; display:inline-block;  vertical-align:text-top; cursor:pointer; <?php if(!isset($preview)){ ?> width:calc(33% - 20px); <?php }else{ ?> width:100%; <?php } ?> margin-right:20px; margin-top:20px; position:relative; overflow:hidden; ">

<?php if($task->tstatus == 0){ ?>
<div onclick="change_task_status('<?=$base_url?>', <?=$task->id?>, 1);" style="position:absolute; right:6px; top:5px; width: 12px;    height: 12px;    margin-top: 0px;    background-position: center;    background-repeat: no-repeat;    background-size: contain;    background-image: url('<?=$base_url?>img/svg/check.svg');"></div>
<?php }else if($task->tstatus == 1){ ?>
<div onclick="change_task_status('<?=$base_url?>', <?=$task->id?>, 0);" style="position:absolute; right:6px; top:5px; width: 12px;    height: 12px;    margin-top: 0px;    background-position: center;    background-repeat: no-repeat;    background-size: contain;    background-image: url('<?=$base_url?>img/svg/uncheck.svg');"></div>
<?php } ?>

<div onclick="$('#task_image<?=$task->id?>').click(); " style="position:absolute; right:5px; top:5px; width: 15px;    height: 15px;    margin-top: 20px;    background-position: center;    background-repeat: no-repeat;    background-size: contain;    background-image: url('<?=$base_url?>img/svg/settings.svg');"></div>

	<form id="TchForm<?=$task->id?>" method="POST" action="<?=$base_url?>main/change_task_pic/" enctype="multipart/form-data">
		<input type="hidden" name="tid" value="<?=$task->id?>" />		
		<input name="task_image" id="task_image<?=$task->id?>" onchange="ch_task_pic('<?=$base_url?>', '<?=$task->id?>');" type="file" style="display:none;">
	</form>		


<div onclick="delete_task('<?=$base_url?>', <?=$task->id?>);" style="position:absolute; right:6px; top:47px; width: 15px;    height: 15px;    margin-top: 0px;    background-position: center;    background-repeat: no-repeat;    background-size: contain;    background-image: url('<?=$base_url?>img/svg/del.svg');"></div>

		<div style="padding:10px;">
			<?php if($task->img == '-1'){ ?>
				<div style='padding:5px; margin-bottom:10px; display:inline-block; padding-left:20px; padding-right:20px; color:#ffffff; background-color:#ff5050;'>Ошибка. Недопустимый формат картинки.</div>
			<?php }else if($task->img == '-2'){_ ?>
				<div style='padding:5px; margin-bottom:10px; display:inline-block; padding-left:20px; padding-right:20px; color:#ffffff; background-color:#ff5050;'>Ошибка. Неудалось загрузить картинку.</div>
			<?php } ?>
			<div id="Timg<?=$task->id?>" style="height:240px; width:calc(100% + 20px); margin:-10px; background-image:url('<?=$task->img?>'); background-position:center; background-repeat:no-repeat; background-size:cover;     margin-top: -24px; margin-bottom:10px;">
			</div>
		
			<div style="font-size:12px; color:#777777; margin-bottom:3px; margin-top:3px;">
				<script>
					$(document).ready(function(){
						$('#DATEBEGINDC<?=$task->id?>').datepicker({dateFormat: 'dd.mm.yy'});
					});
				</script>
				<div  style="float:left; width:14px; margin-top:0px; height:14px; margin-right:5px; background-image:url('<?=$base_url?>img/svg/calendar.svg'); background-position:center; background-size:contain; background-repeat:no-repeat;"></div>
				<div  style="float:left; margin-top:-1px;"><input onchange="change_task_date('<?=$base_url?>', <?=$task->id?>, $(this).val(), 0);" id="DATEBEGINDC<?=$task->id?>" type="text"  style="padding:0px; font-size:12px; border:none; background-color:inherit; width:70px; color:#777777; margin-top:2px;" value="<?=date('d.m.Y ', strtotime($task->atDate))?>"></div>

				
				<div style="clear:both;"></div>		
			</div>
				
			<div style="margin-top:5px; margin-bottom:5px; font-size:14px; font-weight:bold;"><?=$task->login?></div>

			<div style="font-size:13px; margin-top:3px; color:#777777;" contenteditable="true" onchange="change_task_text('<?=$base_url?>', <?=$task->id?>, $(this).text());"><?=$task->text?>.</div>
			
		</div>
	
	
</div>






