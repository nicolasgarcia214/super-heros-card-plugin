<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://nicolasgarcia214.site
 * @since      1.0.0
 *
 * @package    Superhero_Card
 * @subpackage Superhero_Card/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1 class="shq__admin-heading"><?php echo esc_html( get_admin_page_title() ); ?></h1>

<form method="post" action="options.php">
  <?php
  settings_fields( 'shccustomsetting' );
  do_settings_sections( 'shccustomsetting' );
  ?>
  <div>
    <label for="superhero">Enter the hero's name</label>
    <input type="text" name="hero" value="<?php echo get_option( 'hero')?>"id="superhero" placeholder="Batman, Superman, etc.">
  </div>
  <button type="submit" class="shc__btn">Create Shortcode</button>
</form>

<div>
    <p>
        Here you can see all the available superheros
        <a href="https://superheroapi.com/ids.html" target="_blank">https://superheroapi.com/ids.html</a>
    </p>
</div>

<?php
if (get_option('hero') != false){
  echo "<div id='shortcode-container'>
  <span>Shortcode: [shctestshorcode22]</span>
</div>";
echo do_shortcode('[shctestshorcode22]'); 
}
?>




