<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">

    <!-- New Row 
    ====================================================================== -->
    <div class="row-fluid">

        <div class="span12">

            <section id="chat">
	<?php $this->load->helper('form'); ?><!--loads the form helper to help us create a form-->

    <legend>Edit Player Image</legend>
	<?php echo form_open_multipart("edit_profile/edit_player_img"); ?><!--this is the function called to enable us insert players-->
                    <!--<?php 
                        $string = 'https://fbcdn-profile';
                        $imgpath = $results -> Picture;
                        if (strpos($imgpath, $string) === false ) :
                    ?>
                    <img id="img" src="<?php echo base_url();?>uploads/playerlogo/<?= $results -> Picture ?>" alt="your image" />
                    <?php else : ?>-->
                        <img id="img" src="<?= $results -> Picture ?>" alt="your image" />
                    <!--<?php endif; ?>-->
        <p>
            <input type="file" name="userfile" size="20" onchange="readURL(this);" />
            <br/><br/>
            <input type="submit" value="Save" class="btn btn-primary" />
        </p>
   <?php echo form_close(); ?>             

    <legend>Edit Player Info</legend>
     <?php echo form_open_multipart("edit_profile/edit_player"); ?><!--this is the function called to enable us insert players-->               
                    <label for="fname">First Name: </label>
                    <input type="text" name="fname" value='<?php echo $results -> FirstName ?>' />

                    <label for="lname">Last Name: </label>
                    <input type="text" name="lname" id="lname" value='<?php echo $results -> LastName ?>' />                    

                    <label for="email">Email Address: </label>
                    <input type="email" name="email" id="email" value='<?php echo $results -> Email ?>' disabled="disabled" />                    

                    <label for="height">Height: </label>
                    <input type="number" name="height" id="height" value='<?php echo $results -> Height ?>' />

                    <label for="weight">Weight: </label>
                    <input type="number" name="weight" id="weight" value='<?php echo $results -> Weight ?>' />

                    <label for="city">City: </label>
                    <input type="text" name="city" id="city" value='<?php echo $results -> City ?>' />                    

                    <label for="province">Province: </label>
                    <input type="text" name="province" id="province" value='<?php echo $results -> Province ?>' />

                    <label for="address">Address: </label>
                    <input type="text" name="address" id="address" value='<?php echo $results -> Address ?>' />                    

                    <label for="pcode">Postal Code: </label>
                    <input type="text" name="pcode" id="pcode" value='<?php echo $results -> PostalCode ?>' />                    

                    <label for="phone1">Phone Number: </label>
                    <input type="number" name="phone1" id="phone1" value='<?php echo $results -> ContactNumber ?>' />                    

                    <label for="phone2">Other Phone Number: </label>
                    <input type="number" name="phone2" id="phone2" value='<?php echo $results -> OtherNumber ?>' />

                    <br /><br />
                    <input type="submit" value="Save" class="btn btn-primary" />
                    <a href="<?php base_url(); ?>pages/user_profile" class="btn btn-danger">Cancel</a>
                <?php echo form_close(); ?>   

            </section>         
        </div>
    </div>  
</div>
