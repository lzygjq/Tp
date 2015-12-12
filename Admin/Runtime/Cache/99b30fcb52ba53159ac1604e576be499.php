<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>


<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="__URL__" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>用户名：</label>
				<input type="text" name="account" value=""/>
			</li>
		</ul>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="__URL__/add" target="dialog" mask="true"><span>抓取</span></a></li>
			<li><a class="delete" href="__URL__/foreverdelete/id/{sid_user}/navTabId/__MODULE__" target="ajaxTodo" title="你确定要删除吗？" warn="请选择用户"><span>删除</span></a></li>
			<li><a class="edit" href="__URL__/edit/id/{sid_user}" target="dialog" mask="true" warn="请选择用户"><span>编辑</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="__URL__/password/id/{sid_user}" target="dialog" mask="true" warn="请选择用户"><span>修改密码</span></a></li>
		</ul>
	</div>

	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
			<th width="60">编号</th>
			<th width="100" orderField="account" <?php if($_REQUEST["_order"] == 'account'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>发件人</th>
			<th orderField="nickname" <?php if($_REQUEST["_order"] == 'nickname'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>主题</th>
			<th orderField="email" <?php if($_REQUEST["_order"] == 'email'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>时间</th>
			<th width="100" orderField="create_time" <?php if($_REQUEST["_order"] == 'create_time'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>大小</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>">
				<td><?php echo ($vo['id']); ?></td>
				<td><?php echo ($vo['account']); ?></td>
				<td><?php echo ($vo['title']); ?></td>
				<td><?php echo ($vo['datetime']); ?></td>
				<td><?php echo ($vo['size']); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

	<div class="panelBar">
		<div class="pages">
			<span>共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>

</div>