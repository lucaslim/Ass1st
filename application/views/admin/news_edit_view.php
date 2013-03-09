<script type="text/javascript" src="<?php echo base_url(); ?>script/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/myurl.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>script/ckeditor/config.js"></script>
<script type="text/javascript">
	$('#table').hide();

	$.ajax({
		type : 'post',
		url : $.myURL('index') + '/admin/news/get_post/<?php echo $Id; ?>',
		dataType : "json",
		success : function(data) {
			$('#news_title').val(data.Title);
			CKEDITOR.instances['news_editor'].setData(data.Content);
			
			$('#table').show();
		}
	});
</script>
<?php echo form_open('admin/news/update_news'); ?>
<h1>Edit Post</h1>
<table id="table">
	<tr>
		<td>
		<input type="textbox" id="news_title" name="news_title" placeholder="Enter a title"  style="width:100%;" />
		</td>
	</tr>
	<tr>
		<td><textarea class="ckeditor" name="news_editor"></textarea></td>
	</tr>
	<tr>
		<td>
		<input type="submit" value="Update News" />&nbsp;
		<input type="hidden" id="news_id" name="news_id" value='<?php echo $Id; ?>' />
		</td>
	</tr>
</table>

</div>
<div>

</div>