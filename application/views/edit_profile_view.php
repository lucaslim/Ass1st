<div id="content">
	<?php $this->load->helper('form'); ?><!--loads the form helper to help us create a form-->
	<?php echo form_open("edit_profile/edit_player"); ?><!--this is the function called to enable us insert players-->
    	
        <div style="padding: 15px;">
            <h1 class="text-center">Edit Profile</h1>
            <p>
                <label for="fname">First Name: </label>
                <input type="text" name="fname" value='<?php echo $results -> FirstName ?>' />
        	</p>
            
            <p>
                <label for="lname">Last Name: </label>
                <input type="text" name="lname" id="lname" value='<?php echo $results -> LastName ?>' />
        	</p>
            
            <p>
                <label for="email">Email Address: </label>
                <input type="email" name="email" id="email" value='<?php echo $results -> Email ?>' />
        	</p>
            
            <p>
                <label for="height">Height: </label>
                <input type="number" name="height" id="height" value='<?php echo $results -> Height ?>' />
        	</p>
            
            <p>
                <label for="weight">Weight: </label>
                <input type="number" name="weight" id="weight" value='<?php echo $results -> Weight ?>' />
        	</p>
            
            <!--need to insert a date textbox-->
            
            <p>
            	<label for="city">City: </label>
                <input type="text" name="city" id="city" value='<?php echo $results -> City ?>' />
            </p>
            
            <p>
            	<label for="province">Province: </label>
                <input type="text" name="province" id="province" value='<?php echo $results -> Province ?>' />
            </p>
            
            <p>
            	<label for="address">Address: </label>
                <input type="text" name="address" id="address" value='<?php echo $results -> Address ?>' />
            </p>
            
            <p>
            	<label for="pcode">Postal Code: </label>
                <input type="text" name="pcode" id="pcode" value='<?php echo $results -> PostalCode ?>' />
            </p>
            
            <p>
            	<label for="phone1">Phone Number: </label>
                <input type="number" name="phone1" id="phone1" value='<?php echo $results -> ContactNumber ?>' />
            </p>
            
            <p>
            	<label for="phone2">Other Phone Number: </label>
                <input type="number" name="phone2" id="phone2" value='<?php echo $results -> OtherNumber ?>' />
            </p>
            
            <!--add a picture upload-->
            <input type="submit" value="Save" />
        </div>

    <?php echo form_close(); ?>
</div>