<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="kingsoul" />
	<title>文件管理器</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link href="/webmis/css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body style="padding: 10px;">
<div id="file_root" style="display: none;"><?php echo $file_root; ?></div>
<div id="file_action" style="display: none;"><?php echo $file_action; ?></div>
<div id="file_editor" style="display: none;"><?php echo $file_editor; ?></div>
<!-- Action -->
<div class="right_top">
	<span class="right_action">
		<div class="right_title">文件管理</div>
		<a class="action_back" href="#" onclick="backDir('<?php echo dirname($filelist['path']); ?>');return false;"><em class="UI">&nbsp;</em>返回上级</a>
		 <span>|</span>
		 <a class="action_addfolder" href="#"><em class="UI">&nbsp;</em>新建文件夹</a>
		 <span>|</span>
		 <a class="action_add" href="#"><em class="UI">&nbsp;</em>新建文件</a>
		 <span>|</span>
		 <a class="action_refresh" href="#" onclick="refreshDir('<?php echo $filelist['path']; ?>');return false;"><em class="UI">&nbsp;</em>刷新</a>
		 <span>|</span>
		 <a class="action_upload" href="#"><em class="UI">&nbsp;</em>上传</a>
		 <span>|</span>
		 <a class="action_down" href="#"><em class="UI">&nbsp;</em>下载</a>
		 <span>|</span>
		 <a class="action_del" href="#"><em class="UI">&nbsp;</em>删除</a>
	</span>
</div>
<div class="right_line">&nbsp;</div>
<!-- Action End -->
<!-- Content -->
<table class="table_list">
	<tr>
		<td colspan="7" align="left">
			当前位置：<span id="filePath"><?php echo $filelist['path']; ?></span>
		</td>
	</tr>
	<tr class="title" id="table">
		<td width="20"><a href="#" id="checkboxY">√</a><a href="#" id="checkboxN">×</a></td>
		<td>名称</td>
		<td width="120">创建时间</td>
		<td width="120">修改时间</td>
		<td width="80">大小</td>
		<td width="40">权限</td>
		<td width="120">操作</td>
	</tr>
	<tbody id="listBG">
<?php if(@$filelist['folder']){foreach($filelist['folder'] as $val){ ?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td align="left"><a href="#" class="ico_folder" onclick="openDir('<?php echo $filelist['path'].$val['name']; ?>');return false;"><em class="UI">&nbsp;</em><?php echo $val['name']; ?></a></td>
		<td><?php echo $val['ctime']; ?></td>
		<td><?php echo $val['mtime']; ?></td>
		<td><?php echo $val['size']; ?></td>
		<td><a href="#" onclick="editPerm('<?php echo $val['name']; ?>','<?php echo $val['perm']; ?>');return false;"><?php echo $val['perm']; ?></a></td>
		<td><a href="#" onclick="reName('<?php echo $val['name']; ?>');return false;">重命名</a></td>
	</tr>
<?php }} ?>
<?php if(@$filelist['files']){foreach($filelist['files'] as $val){ ?>
	<tr>
		<td><input type="checkbox" value="<?php echo $val['name'];?>" /></td>
		<td align="left"><a href="#" class="<?php echo $val['class']; ?>" class="<?php echo $val['class']; ?>" onclick="openFile('<?php echo $filelist['path'].$val['name']; ?>','<?php echo $val['ext']; ?>');return false;"><em class="UI">&nbsp;</em><?php echo $val['name']; ?></a></td>
		<td><?php echo $val['ctime']; ?></td>
		<td><?php echo $val['mtime']; ?></td>
		<td><?php echo $val['size']; ?></td>
		<td><a href="#" onclick="editPerm('<?php echo $val['name']; ?>','<?php echo $val['perm']; ?>');return false;"><?php echo $val['perm']; ?></a></td>
		<td>
			<a href="#" onclick="insertEditor('<?php echo $filelist['path'].$val['name']; ?>');return false;">插入</a>&nbsp;|&nbsp;
			<a href="#" onclick="reName('<?php echo $val['name']; ?>');return false;">重命名</a>&nbsp;|&nbsp;
			<a href="#" onclick="editFile('<?php echo $filelist['path'].$val['name']; ?>','<?php echo $val['ext']; ?>');return false;">编辑</a>
		</td>
	</tr>
<?php }} ?>
	</tbody>
</table>
<div class="page">
	文件夹：<?php echo $filelist['dirNum']; ?>&nbsp;&nbsp;
	文件：<?php echo $filelist['fileNum']; ?>&nbsp;&nbsp;
	大小：<?php echo $filelist['size']; ?>
</div>
<!-- Content End -->

<div id="base_url" style="display: none;"><?php echo base_url(); ?></div>
<script language="javascript" src="/webmis/plugin/jquery/jquery-2.0.3.min.js"></script>
<script language="javascript" src="/webmis/js/webmis.js"></script>
<script language="javascript" src="/webmis/js/admin.js"></script>
<?php if(@$js){ foreach($js as $val){ ?>
<script language="javascript" src="<?php echo base_url($val); ?>"></script>
<?php }}?>
</body>
</html>