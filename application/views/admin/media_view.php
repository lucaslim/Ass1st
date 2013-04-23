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
    <div class="row-fluid" style="margin:40px 0 50px 0;">

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


        <div class="span8" style="font-weight:bold;">
            <div class="row-fluid">
                <div class="span6">
                    <div class="row-fluid">
                        <div class="span4 text-right">
                            Title:&nbsp;&nbsp; 
                        </div>
                        <div class="span8">
                            <input class="input-full" type="text" name="imageTitle" maxlength="25" value="<?php echo $item -> Title; ?>" />
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4 text-right">
                            Main URL:&nbsp;&nbsp;
                        </div>
                        <div class="span8">
                            <input class="input-full" type="url" name="imageUrlMain" width="50px" maxlength="50" required="required" placeholder="http://www.example.ca" value="<?php echo $item -> Urlmain; ?>" />
                        </div>
                    </div>
                </div>
                <div class="span2 text-right">
                    Description: 
                </div>
                <div class="span4">
                    <textarea class="input-full" name="imageDescription" maxlength="145" required="required" placeholder="Description" style="height:60px;" ><?php echo $item -> Description; ?></textarea>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2 text-right">
                    2nd Link Title:
                </div>
                <div class="span4">
                    <input class="input-full" type="text" name="imageLink2Title" maxlength="15" required="required" placeholder="http://www.example.ca" value="<?php echo $item -> link2title; ?>" />
                </div>
                <div class="span2 text-right">
                    URL:
                </div>
                <div class="span4">
                    <input class="input-full" type="url" name="imageLink2Url" width="50px" maxlength="50" required="required" placeholder="http://www.example.ca" value="<?php echo $item -> Link2; ?>" />
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2 text-right">
                    3rd Link Title:
                </div>
                <div class="span4">
                    <input class="input-full" type="text" name="imageLink3Title" maxlength="15" required="required" placeholder="http://www.example.ca" value="<?php echo $item -> Link3title; ?>" />
                </div>
                <div class="span2 text-right">
                    URL:
                </div>
                <div class="span4">
                    <input class="input-full" type="url" name="imageLink3Url" width="50px" maxlength="50" required="required"  placeholder="http://www.example.ca" value="<?php echo $item -> Link3; ?>" />
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2 text-right">
                    4th Link Title: 
                </div>
                <div class="span4">
                    <input class="input-full" type="text" name="imageLink4Title" maxlength="15" required="required" placeholder="http://www.example.ca" value="<?php echo $item -> Link4title; ?>" />
                </div>
                <div class="span2 text-right">
                    URL:
                </div>
                <div class="span4"> 
                    <input class="input-full" type="url" name="imageLink4Url" width="50px" maxlength="50" required="required" placeholder="http://www.example.ca" value="<?php echo $item -> Link4; ?>" />
                </div>
            </div>
            <div class="row-fluid" style="margin-top:10px;">
                <div class="span12 text-right">
                    <input class="btn btn-info" type="submit" value="Update" />
                </div>
            </div>
        </div> 
    </div>
    <hr style="border-color: navy !important;">
    <?php endforeach ?>
</div>
</form>
</div>
