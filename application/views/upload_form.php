<html>
<head>
<title>Upload Form</title>
<script type="text/javascript">

     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

  <input type='file' onchange="readURL(this);" name="userfile" size="20" />
    <img id="blah" src="<?php echo base_url(); ?>uploads/thumbs_preview-icon.jpg" alt="your image" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>