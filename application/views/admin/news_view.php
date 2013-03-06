<script type="text/javascript" src="<?php echo base_url(); ?>script/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/myurl.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/ckeditor/config.js"></script>
<?php echo form_open('admin/news/add_news'); ?>
<h1>Add New Post</h1>
<table>
	<tr>
		<td><input type="textbox" name="news_title" placeholder="Enter a title" style="width:100%;" /></td>
	</tr>
	<tr>
		<td><textarea class="ckeditor" name="news_editor"></textarea></td>
	</tr>
	<tr>
		<td><input type="submit" value="Submit News"/></td>
	</tr>
</table>
	
</div>
<div>
	
</div>