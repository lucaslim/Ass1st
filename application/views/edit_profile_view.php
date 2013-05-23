<!-- Main Content
====================================================================== -->
<div id="contentBegin" class="container-fluid">
    <!-- New Row
====================================================================== -->
    <div class="row-fluid">
        <div class="span12">
            <section id="chat">
                <?php $this -> load -> helper( 'form' ); ?><!--loads the form helper to help us create a form-->
                <legend style="text-align:center">Edit Player Image</legend> 
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
                <legend style="text-align:center">Edit Player Info</legend> 
                <?php echo form_open_multipart( "edit_profile/edit_player", array( 'id' => 'edit_profile_form' ) ); ?>
                <!--this is the function called to enable us edit player profile-->
                <label style="margin-left: 2.5%" class="span3" for="plyerid">Player ID:</label>
                <input type="text" style="width:25px;" value="<?php echo $results -> Id ?>" disabled="disabled" /><hr />
                <label class="span3" for="fname">First Name:</label> 
                <input type="text" name="fname" value='<?php echo $results -> FirstName ?>' /><hr />
                <label class="span3" for="lname">Last Name:</label> 
                <input type="text" name="lname" id="lname" value='<?php echo $results -> LastName ?>' /><hr />
                <label class="span3" for="email">Email Address:</label> 
                <input type="email" name="email" id="email" value='<?php echo $results -> Email ?>' disabled="disabled" /><hr />
                <label class="span3" for="height">Height:</label> 
                <input type="text" name="height" id="height" value='<?php echo $results -> Height ?>' placeholder="400 for 4feet 0inches" /><hr /> 
                <label class="span3" for="weight">Weight:</label> 
                <input type="number" name="weight" id="weight" value='<?php echo $results -> Weight ?>' /><hr />
                <label class="span3" for="city">City:</label> 
                <input type="text" name="city" id="city" value='<?php echo $results -> City ?>' /><hr />
                <label class="span3" for="province">Province:</label> 
                <!-- <input type="text" name="province" id="province" value='<?php echo $results -> Province ?>' /> --> 
                <select name="province" id="province" value='<?php echo $results -> Province ?>'>
                  <option value="Alberta">Alberta</option>
                  <option value="British Columbia">British Columbia</option>
                  <option value="Nova Scotia">Nova Scotia</option>
                  <option value="Québec">Québec</option>
                  <option value="Ontario">Ontario</option>
                  <option value="Manitoba">Manitoba</option>
                  <option value="Saskatchewan">Saskatchewan</option>
                  <option value="Québec">Québec</option>
                  <option value="New Brunswick">New Brunswick</option>
                  <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                </select><hr />
                <label class="span3" for="address">Address:</label> 
                <input type="text" name="address" id="address" value='<?php echo $results -> Address ?>' /><hr />
                <label class="span3" for="pcode">Postal Code:</label> 
                <input type="text" name="pcode" id="pcode" value='<?php echo $results -> PostalCode ?>' /><hr />
                <label class="span3" for="phone1">Phone Number:</label> 
                <input type="text" name="phone1" id="phone1" value='<?php echo $results -> ContactNumber ?>' placeholder="4166665555" /><hr /> 
                <label class="span3" for="phone2">Other Phone Number:</label> 
                <input type="text" name="phone2" id="phone2" value='<?php echo $results -> OtherNumber ?>' placeholder="4166665555" /><hr />
                <input type="submit" value="Save" class="btn btn-primary"> 
                <a href="#confirm" class="btn btn-danger" data-toggle="modal">Cancel</a>
                

                <div id="confirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Confirm Cancel</h3>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to cancel?</p>
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Return</button>
                    <a href="<?php echo base_url(); ?>pages/user_profile" class="btn btn-danger">I'm Sure</a>
                  </div>

                   <?php echo form_close(); ?>
                </div>
            </section>
        </div>
    </div>
</div>