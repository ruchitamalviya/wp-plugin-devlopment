
<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.expresstechsoftwares.com/
 * @since      1.0.0
 *
 * @package    Pmpro_Better_Membership_Receipts
 * @subpackage Pmpro_Better_Membership_Receipts/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
 <?php 
     $receipt_logo = sanitize_text_field( trim( get_option("upload_receipt_logo",true)));  
     $receipt_title = sanitize_text_field( trim( get_option("receipt_title",true)));
     $receipt_content = sanitize_textarea_field( trim( get_option("receipt_content",true)));
     
    
    ?>
   
        <div class="child_container">
            <h2 class="heading">Pmpro Better Membership Receipts</h2>
            <form method="post" action="<?php echo get_site_url() . '/wp-admin/admin-post.php'; ?>" id="register">
                <input type="hidden" name="action" value="ets_save_receipt_settings">
                <?php wp_nonce_field( 'save_receipt_main_setting', 'ets_save_receipt_main_setting' ); ?>
                <label for="upload-receipt-logo">Logo</label><br>
                <input type="button" value="Upload Logo" id="upload-receipt-logo">
                <input type="hidden" id="upload_receipt_logo" name="upload_receipt_logo" value="<?php if(isset($receipt_logo) && $receipt_logo ) echo $receipt_logo; ?>" /><br><br>
                <div id="#logo_receipt_preview" class="upload-receipt-preview">
                    <img src="<?php echo  $receipt_logo?>" width="100px" height="100px">
                </div><br><br>
                <label for="receipt_title">Title</label><br>
                <input type="text" id="receipt_title" name="receipt_title" value="<?php if(isset($receipt_title) && $receipt_title ) echo $receipt_title; ?>"><br><br>
                <label for="receipt_footer">Footer</label><br>
                <?php 
                $footer_content= sanitize_text_field( trim( get_option("receipt_footer",true)));
                 wp_editor("$footer_content",  "receipt_footer"); ?>
                <label for="receipt_content">Content</label><br>
                <textarea id="receipt_content" name="receipt_content" rows="4" cols="35"><?php if(isset($receipt_content) && $receipt_content ) echo $receipt_content; ?></textarea><br><br>
                <input type="submit" name="save_btn" id="save_btn" value="Save">  

            </form>
        </div>
   