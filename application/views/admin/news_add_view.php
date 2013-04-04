<div class="container-fluid">
	<div class="row">
		<div class="span12">
			<?php echo form_open('admin/news/add_news'); ?>
				<h1>Add New Post</h1>
				<input type="text" class="input-xlarge" name="news_title" placeholder="Enter a title" />
				<textarea class="ckeditor" name="news_editor"></textarea>
				<br />
				<input class="btn" type="submit" value="Submit News"/>
			</form>
		</div>
	<div>
</div>