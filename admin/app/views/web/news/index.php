<!-- Action -->
<div class="right_top">
	<span class="right_action">
		<div class="right_title"><?php echo $title; ?></div>
		<?php echo $actionHtml; ?>
	</span>
</div>
<div class="right_line">&nbsp;</div>
<!-- Action End -->
<!-- Content -->
<table class="table_list">
	<tr class="title" id="news_table">
		<td width="20"><a href="#" id="checkboxY">√</a><a href="#" id="checkboxN">×</a></td>
		<td>ID</td>
		<td>标题</td>
		<td>所属</td>
		<td>来源</td>
		<td>作者</td>
		<td width="120">发布时间</td>
		<td>浏览</td>
		<td width="40">审核</td>
	</tr>
	<tbody id="listBG">
	<?php foreach($list as $val){?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val->id;?>" /></td>
		<td><?php echo $val->id;?></td>
		<td style="text-align: left;">
			<a href="#" onclick="newsShow(<?php echo $val->id;?>);return false;"><?php echo keyHH($val->title, @$key['title']);?></a>
			<?php echo $val->img?' <span class="c666">[ 图 ]</span>':'';?>
		</td>
		<td style="text-align: left;">
			<?php
			$arr = array_filter(explode(':', $val->class));
			foreach($arr as $val1){
				echo $class[$val1].'('.$val1.') > ';
			}
			?>
		</td>
		<td><?php echo keyHH($val->source, @$key['source']);?></td>
		<td><?php echo keyHH($val->author, @$key['author']);?></td>
		<td><?php echo keyHH($val->ctime, @$key['ctime']);?></td>
		<td><?php echo $val->click;?></td>
		<td><?php echo MY_Controller::stateName($val->state);?></td>
	</tr>
	<?php } ?>
	</tbody>
</table>
<div class="page"><div class="pagelist"><?php echo $page.'<span>'.$total.'</span>'; ?></div></div>
<!-- Content End -->