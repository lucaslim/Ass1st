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

<div id="content-begin" class="container-fluid">
    <?php foreach($query as $item):?>
    <div class="row-fluid">

        <div class="span4">
            <img id="displayImage" src="<?php echo base_url();?>/uploads/<?php echo $item -> Image; ?>" alt="your image" />

            <br /><br />
            <input type="file" name="userfile" size="20" onchange="readURL(this);" /> <br />
        </div> 
<style>
.input-full{
    width: 100%;
}
.input-med{
    width:50%;
}
</style>

        <div class="span8">
            Image Title: <input class="input-med" type="text" name="imageTitle" maxlength="25" /><br />
            Image Description: <textarea class="input-med" name="imageDescription" maxlength="145" required="required" placeholder="http://www.example.ca" ></textarea><br />
            Image Main URL: <input class="input-med" type="url" name="imageUrlMain" width="50px" maxlength="50" required="required" placeholder="http://www.example.ca" /> <br />
            Image Link 2 Title: <input class="input-full" type="text" name="imageLink2Title" maxlength="15" required="required" placeholder="http://www.example.ca" /> 
            Image Link 2 URL: <input class="input-full" type="url" name="imageLink2Url" width="50px" maxlength="50" required="required" placeholder="http://www.example.ca" /><br />
            Image Link 3 Title: <input type="text" name="imageLink3Title" maxlength="15" required="required" placeholder="http://www.example.ca" /> 
            Image Link 3 URL: <input type="url" name="imageLink3Url" width="50px" maxlength="50" required="required"  placeholder="http://www.example.ca" /><br />
            Image Link 4 Title: <input type="text" name="imageLink4Title" maxlength="15" required="required" placeholder="http://www.example.ca" />
            Image Link 4 URL: <input type="url" name="imageLink4Url" width="50px" maxlength="50" required="required" placeholder="http://www.example.ca" /> <br />

            <input type="submit" value="update" />
        </div>
    </div>
    <?php endforeach ?>
</div>
</form>
</div>
