<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">
    <!-- New Row
====================================================================== -->
    <div class="row-fluid">
        <div class="span12">
            <section id="chat">
                <?php $this -> load -> helper( 'form' ); ?><!--loads the form helper to help us create a form-->
                <legend>Edit Player Image</legend> 
                <?php echo form_open_multipart( "edit_profile/edit_player_img" ); ?><!--this is the function called to enable us insert players-->
                <div class="span12">
                    <div class="span3">
                        <img id="user-image" class="img-polaroid" style="max-width: 200px; max-height: 200px;" src="<?php echo base_url(); ?>uploads/playerlogo/<?php echo $results -> Picture ?>" alt="your image">
                        <p>
                            <input type="file" name="userfile" onchange="readURL(this);">
                        </p><input type="radio" name="image" value="user">
                    </div>
                    <div class="span3">
                        <?php if ( isset( $facebook_picture ) && $facebook_picture ): ?>
                            <img class="img-polaroid" style="max-width: 200px; max-height: 200px;" src="<?php echo $facebook_picture ?>"> 
                        <?php endif; ?> 
                        <input type="radio" name="image" value="facebook">
                    </div>
                    <div class="span3">
                        <?php if($twitter_is_link): ?>

                        <?php else: ?>
                            <!-- <div style="border:1px solid #333; padding: 30px; text-align: center;">
                                <a href="edit_profile/link_twitter">Link Twitter Account</a>
                            </div> -->
                        <?php endif; ?>
                    </div>
                </div>
                <div class="span12">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
                <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#user-image').attr('src', e.target.result);
                        }
                        
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                </script> 
                <?php echo form_close(); ?> 
                <legend>Edit Player Info</legend> 
                <?php echo form_open_multipart( "edit_profile/edit_player" ); ?>
                <!--this is the function called to enable us insert players-->
                <label for="fname">First Name:</label> 
                <input type="text" name="fname" value='<?php echo $results -> FirstName ?>'> 
                <label for="lname">Last Name:</label> 
                <input type="text" name="lname" id="lname" value='<?php echo $results -> LastName ?>'> 
                <label for="email">Email Address:</label> 
                <input type="email" name="email" id="email" value='<?php echo $results -> Email ?>' disabled="disabled"> 
                <label for="height">Height:</label> 
                <input type="number" name="height" id="height" value='<?php echo $results -> Height ?>'> 
                <label for="weight">Weight:</label> 
                <input type="number" name="weight" id="weight" value='<?php echo $results -> Weight ?>'>
                <label for="city">City:</label> 
                <input type="text" name="city" id="city" value='<?php echo $results -> City ?>'> 
                <label for="province">Province:</label> 
                <input type="text" name="province" id="province" value='<?php echo $results -> Province ?>'> 
                <label for="address">Address:</label> 
                <input type="text" name="address" id="address" value='<?php echo $results -> Address ?>'> 
                <label for="pcode">Postal Code:</label> 
                <input type="text" name="pcode" id="pcode" value='<?php echo $results -> PostalCode ?>'> 
                <label for="phone1">Phone Number:</label> 
                <input type="number" name="phone1" id="phone1" value='<?php echo $results -> ContactNumber ?>'> 
                <label for="phone2">Other Phone Number:</label> 
                <input type="number" name="phone2" id="phone2" value='<?php echo $results -> OtherNumber ?>'><br>
                <br>
                <input type="submit" value="Save" class="btn btn-primary"> 
                <a href="%3C?php%20base_url();%20?%3Epages/user_profile" class="btn btn-danger">Cancel</a> <?php echo form_close(); ?>
            </section>
        </div>
    </div>
</div>