<div class="container-fluid">
	<div class="row">
		<div class="span12">
			<div id="edit-form">
				<?php echo form_open('admin/news/update_news'); ?>
					<h1>Edit Post</h1>
					<input type="text" class="input-xlarge" id="news_title" name="news_title" placeholder="Enter a title" />
					<textarea class="ckeditor" name="news_editor"></textarea>
					<br />
					<input class="btn" type="submit" value="Update News" />
					<input type="hidden" id="news_id" name="news_id" value='<?php echo $Id; ?>' />
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#edit-form').hide();

	$.ajax({
		type : 'post',
		url : $.myURL('index') + '/admin/news/get_post/<?php echo $Id; ?>',
		dataType : "json",
		success : function(data) {
			$('#news_title').val(data.Title);
			CKEDITOR.instances['news_editor'].setData(data.Content);
			
			$('#edit-form').show();
		}
	});
</script>