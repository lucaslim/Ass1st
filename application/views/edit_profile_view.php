<div id="content">
	<?php $this->load->helper('form'); ?><!--loads the form helper to help us create a form-->
	<?php echo form_open("edit_profile/edit_player"); ?><!--this is the function called to enable us insert players-->
    	
        <div style="padding: 15px;">
            <h1 class="text-center">Edit Profile</h1>
            <div class="span11">
                <p>
                    <div class="span3">
                        <label for="fname">First Name: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="fname" value='<?php echo $results -> FirstName ?>' />
                	</div>
                </p>
                
                <p>
                    <div class="span3">
                        <label for="lname">Last Name: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="lname" id="lname" value='<?php echo $results -> LastName ?>' />
                	</div>
                </p>

                <p>
                    <div class="span3">
                        <label for="email">Email Address: </label>
                    </div>
                    <div class="span6">
                        <input type="email" name="email" id="email" value='<?php echo $results -> Email ?>' />
                    </div>
            	</p>
                
                <p>
                    <div class="span3">
                        <label for="height">Height: </label>
                    </div>
                    <div class="span6">
                        <input type="number" name="height" id="height" value='<?php echo $results -> Height ?>' />
                    </div>
            	</p>
                
                <p>
                    <div class="span3">
                        <label for="weight">Weight: </label>
                    </div>
                    <div class="span6">
                        <input type="number" name="weight" id="weight" value='<?php echo $results -> Weight ?>' />
                    </div>
            	</p>
                
                <p>
                    <div class="span3">
                	   <label for="city">City: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="city" id="city" value='<?php echo $results -> City ?>' />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                	   <label for="province">Province: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="province" id="province" value='<?php echo $results -> Province ?>' />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                    	<label for="address">Address: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="address" id="address" value='<?php echo $results -> Address ?>' />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                	   <label for="pcode">Postal Code: </label>
                    </div>
                    <div class="span6">
                        <input type="text" name="pcode" id="pcode" value='<?php echo $results -> PostalCode ?>' />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                	   <label for="phone1">Phone Number: </label>
                    </div>
                    <div class="span6">
                        <input type="number" name="phone1" id="phone1" value='<?php echo $results -> ContactNumber ?>' />
                    </div>
                </p>
                
                <p>
                    <div class="span3">
                	   <label for="phone2">Other Phone Number: </label>
                    </div>
                    <div class="span6">
                        <input type="number" name="phone2" id="phone2" value='<?php echo $results -> OtherNumber ?>' />
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