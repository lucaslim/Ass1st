<html>
<head>
<title>Upload Form</title>
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
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>
<body>
<?php $this->load->helper('form'); ?>
<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>


<img id="blah" src="<?php echo site_url();?>uploads/blank_avatar.png" alt="your image" />

<br /><br />

<input type="file" name="userfile" size="20" onchange="readURL(this);" />




<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>