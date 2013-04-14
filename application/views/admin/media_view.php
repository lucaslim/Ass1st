<div class="container">
	<div class="span12">
		<h1>Media View Code Here</h1>
	</div>
	
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#displayImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

<?php $this->load->helper('form'); ?>
 <!-- <?php echo $error;?> -->

<?php echo form_open_multipart('admin/media/do_upload');?>

<img id="displayImage" src="<?php echo base_url();?>/uploads/blank_avatar.png" alt="your image" />

<br /><br />

<input type="file" name="userfile" size="20" onchange="readURL(this);" /> <br />
Image Title: <input type="text" name="imageTitle" /> <br />
Image Description: <textarea name="imageDescription" ></textarea> <br />
Image Main URL: <input type="text" name="imageUrlMain" width="50px" /> <br />
Image Link 2 Title: <input type="text" name="imageLink2Title" /> 
Image Link 2 URL: <input type="text" name="imageLink2Url" width="50px" /><br />
Image Link 3 Title: <input type="text" name="imageLink3Title" /> 
Image Link 3 URL: <input type="text" name="imageLink3Url" width="50px" /><br />
Image Link 4 Title: <input type="text" name="imageLink4Title" />
Image Link 4 URL: <input type="text" name="imageLink4Url" width="50px" /> <br />

<br /><br />

<input type="submit" value="upload" />

</form>
</div>
