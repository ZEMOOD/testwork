<div style="clear:both;"></div>
<div style="height:20px; width:100%; border-top:dashed 1px #88ABC1;"></div>
<div style="padding:20px; padding-top:0px; padding-left:25px; padding-bottom:30px; width:calc(100% - 40px); float:left;">
	<div class="iopen" onclick="if($('#tasksList').is(':visible')){ $('#tasksList').fadeOut(500); $(this).removeClass('iopen'); $(this).addClass('iclose'); }else{ $('#tasksList').fadeIn(500); $(this).addClass('iopen'); $(this).removeClass('iclose'); }" style="font-size:24px; text-transform:uppercase; color:#1a1a1a;  text-align:left; cursor:pointer; position:relative;">
			<div onclick="event.stopPropagation();  if($('#TaskFiltersSort').is(':hidden')){ $('#TaskFiltersSort').slideDown(500); }else{ $('#TaskFiltersSort').slideUp(500); }" style="position:absolute; right:5px; top:-5px; width: 20px;    height: 20px;    margin-top: 0px;    background-position: center;    background-repeat: no-repeat;    background-size: contain; cursor:pointer;    background-image: url('<?=$base_url?>img/svg/settings.svg');
}"></div>
			<div style="float:left;">
				<div class="iopencloseArrow" style=" width:15px;  height:15px;  margin-right:10px;  margin-top:8px; "></div>
			</div>
			<div style="float:left;">
				<div>TASKS</div>
				<div style="height:3px; background-color:#88ABC1; width:40px; margin-left:0px;"></div>
			</div>
			<div style="clear:both;"></div>
		</div>


	
	<div id="TaskFiltersSort" style="display:block; margin-bottom:-20px;">
	<div style="height:20px; width:100%; margin-top:20px; border-top:solid 1px #dddddd;"></div>
		<div style="padding-bottom:20px; float:right;">
			<div style="font-size:10px; margin-top:5px; ">
				<div style="float:left; font-weight:bold;  color:#777777; padding:3px; padding-left:15px; padding-right:15px; ">FILTER USERS :</div>

					<div  onclick="set_filter('<?=$base_url?>', 0); $(this).parent().find('.sortItem.active').removeClass('active'); $(this).addClass('active');" class="sortItem <?php if($filter == "0"){ ?> active <?php } ?>">
						ALL
					</div>

					<div  onclick="set_filter('<?=$base_url?>', 1); $(this).parent().find('.sortItem.active').removeClass('active'); $(this).addClass('active');" class="sortItem <?php if($filter == "1"){ ?> active <?php } ?>">
						ONLY MY
					</div>

					<div style="clear:both;"></div>
			</div>
			
		</div>
		<div style="padding-bottom:20px; float:left;">
			<div style="float:left; font-weight:bold;  color:#777777; padding:3px; padding-left:15px; padding-right:15px; ">SORT BY :</div>
			<div class="sortItem <?php if($sort_by == "1"){ ?> active <?php } ?>" onclick="set_sort('<?=$base_url?>', 1); $(this).parent().find('.sortItem.active').removeClass('active'); $(this).addClass('active');">
						USER NAME
					</div>
					<div onclick="set_sort('<?=$base_url?>', 2); $(this).parent().find('.sortItem.active').removeClass('active'); $(this).addClass('active');"  class="sortItem <?php if($sort_by == "2"){ ?> active <?php } ?>">
						USER EMAIL
					</div>
					<div onclick="set_sort('<?=$base_url?>', 3); $(this).parent().find('.sortItem.active').removeClass('active'); $(this).addClass('active');" class="sortItem <?php if($sort_by == "3"){ ?> active <?php } ?>">
						TASK STATUS
					</div>
					<div onclick="set_sort('<?=$base_url?>', 0); $(this).parent().find('.sortItem.active').removeClass('active'); $(this).addClass('active');" class="sortItem <?php if($sort_by == "0"){ ?> active <?php } ?>">
						ADD DATE
					</div>
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
		<div style="height:20px; width:100%; border-top:solid 1px #dddddd;"></div>
	</div>

	<div onclick="$(this).css('display', 'none'); $(this).next().fadeIn(500);" style="text-align:right;     font-weight: bold;       color: #1A8FC4;    cursor: pointer;    margin-top: 18px;  padding-bottom:5px; padding-right:5px;  white-space: nowrap; margin-right:15px; margin-bottom:-45px;">
	+ ADD TASK 
	</div>



<div style="display:none;  border:solid 1px #cccccc; background-color:#eeeeee; padding:10px; float:right; cursor:pointer; width:calc(33% - 42px); margin-right:40px; margin-top:20px; position:relative;">

	<form id="ADDtaskForm" method="POST" action="<?=$base_url?>main/add_task/" enctype="multipart/form-data">
		<div style="font-size:14px; font-weight:bold;">ADD TASK</div>

		<div style="text-align:right;">
			
			<div style="background-color:#88ABC1; display:inline-block; padding:5px; padding-left:15px; padding-right:15px; color:#ffffff; font-size:14px; text-align:center; cursor:pointer; margin-top:10px;" onclick="$('#task_image').click(); " > + ADD PICTURE</div>
			
			<input name="task_image" id="task_image" onchange="$(this).prev().html($(this).val().split('\\')[$(this).val().split('\\').length -1]);" type="file" style="display:none;">
		</div>
		
		<div style="font-size:12px; margin-top:-10px;">Task</div>
		<div>
			<textarea name="text" style="padding:5px; font-size:14px; border:solid 1px #cccccc; width:100%; height:50px;"></textarea>
		</div>

		
		
		<div onclick="add_task('<?=$base_url?>', 'ADDtaskForm'); $(this).parent().parent().fadeOut(500); $(this).parent().parent().prev().fadeIn(500);" style="background-color:#88ABC1; display:inline-block; padding:7px; padding-left:15px; padding-right:15px; color:#ffffff; font-size:16px; text-align:center; cursor:pointer; margin-top:10px;">ADD TASK</div>
		<div onclick="show_task_preview('<?=$base_url?>', 'ADDtaskForm');" style="background-color:#aaaaaa; display:inline-block; padding:7px; padding-left:15px; padding-right:15px; color:#ffffff; font-size:16px; text-align:center; cursor:pointer; margin-top:10px; margin-left:10px;">PREVIEW</div>
		<div onclick="$(this).parent().parent().fadeOut(500); $(this).parent().parent().prev().fadeIn(500);" style="background-color:#aaaaaa; display:inline-block; padding:7px; padding-left:15px; padding-right:15px; color:#ffffff; font-size:16px; text-align:center; cursor:pointer; margin-top:10px; margin-left:10px;">CENCEL</div>
	</form>	
	<div style="display:none; border-top:dashed 2px #cccccc;" id="taskPreview">

	</div>
</div>
<div style="clear:both;"></div>

	<div id="tasksList" style="display:block;">

		<div style="text-align:center; padding:50px;">
			<img src="<?=$base_url?>img/loading.gif" />
		</div>

		
	</div>

	

	<div style="clear:both;"></div>

	
	
</div>
<div>