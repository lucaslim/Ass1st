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
<div id="content">
	<?php $this->load->helper('form'); ?><!--loads the form helper to help us create a form-->
	<?php echo form_open_multipart("edit_profile/edit_player"); ?><!--this is the function called to enable us insert players-->
    	
        <div style="padding: 15px;">
            <h1 class="text-center">Edit Profile</h1>

            <img id="blah" src="<?php echo base_url();?>/uploads/playerlogo/<?= $results -> Picture ?>" alt="your image" />

            <br /><br />

            <input type="file" name="userfile" size="20" onchange="readURL(this);" />


            <div class="span11">
                <p>
                    <div class="span3">
                        <label for="fname">First Name: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="fname" value='<?php echo $results -> FirstName ?>' required="required" />
                	</div>
                </p>
                
                <p>
                    <div class="span3">
                        <label for="lname">Last Name: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="lname" id="lname" value='<?php echo $results -> LastName ?>' required="required" />
                	</div>
                </p>

                <p>
                    <div class="span3">
                        <label for="email">Email Address: </label>
                    </div>
                    <div class="span6">
                        <input type="email" name="email" id="email" value='<?php echo $results -> Email ?>' required="required" />
                    </div>
            	</p>
                
                <p>
                    <div class="span3">
                        <label for="height">Height: </label>
                    </div>
                    <div class="span6">
                        <input type="number" name="height" id="height" value='<?php echo $results -> Height ?>' required="required" />
                    </div>
            	</p>
                
                <p>
                    <div class="span3">
                        <label for="weight">Weight: </label>
                    </div>
                    <div class="span6">
                        <input type="number" name="weight" id="weight" value='<?php echo $results -> Weight ?>' required="required" />
                    </div>
            	</p>
                
                <p>
                    <div class="span3">
                	   <label for="city">City: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="city" id="city" value='<?php echo $results -> City ?>' required="required" />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                	   <label for="province">Province: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="province" id="province" value='<?php echo $results -> Province ?>' required="required" />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                    	<label for="address">Address: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="address" id="address" value='<?php echo $results -> Address ?>' required="required" />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                	   <label for="pcode">Postal Code: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="pcode" id="pcode" value='<?php echo $results -> PostalCode ?>' required="required" />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                	   <label for="phone1">Phone Number: </label>
                    </div>
                    <div class="span6">
                        <input type="number" name="phone1" id="phone1" value='<?php echo $results -> ContactNumber ?>' required="required" />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                	   <label for="phone2">Other Phone Number: </label>
                    </div>
                    <div class="span6">
                        <input type="number" name="phone2" id="phone2" value='<?php echo $results -> OtherNumber ?>' required="required" />
                    </div>
                </p>
                
                <!--add a picture upload-->
                <div class="span12" style="text-align:center;">
                    <input type="submit" value="Save" />
                </div>
            </div>
        </div>

    <?php echo form_close(); ?>
</div>