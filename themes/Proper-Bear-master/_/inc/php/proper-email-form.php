<?php
/*
 Displays a simple contact form
 */

function proper_email_form() { 

	// Process mail if we are returning to the page after submitting the form
	proper_deliver_mail();

	?>

	<form action="<?php esc_url( $_SERVER['REQUEST_URI'] ) ?>" method="post">

		<div class="sender-name">		
			<label for="sender-name">Your Name</label> 	 	
			<input 
				type="text" 
				name="sender-name" 
				pattern="[a-zA-Z0-9 ]+" 
				value="<?php isset( $_POST["sender-name"] ) ? esc_attr( $_POST["sender-name"] ) : '' ?>" 
			/>
		</div>

		<div class="sender-email">
			<label for="sender-email">Your Email</label>
			<input 
				type="email" 
				name="sender-email" 
				value="<?php echo ( isset( $_POST["sender-email"] ) ? esc_attr( $_POST["sender-email"] ) : '' ) ?>" 
			/>
		</div>

		<div class="email-recipient">
			<label for="email-recipient">Who would you like to send your email to?</label>
			<select
				type="select" 
				name="email-recipient" 
				value="<?php echo ( isset( $_POST["email-recipient"] ) ? esc_attr( $_POST["email-recipient"] ) : '' ) ?>" 
			>
				<option value="ben@properdesign.rs">Ben Proper</option>
			</select>
		</div>

		<div class="email-message">
			<label for="email-message">Your Message</label>
			<textarea 
				name="email-message">
				<?php echo ( isset( $_POST["email-message"] ) ? esc_attr( $_POST["email-message"] ) : '' ) ?>
			</textarea>
		</div>

		<input type="submit" name="email-submitted" value="Send"/>

	</form>
<?php }