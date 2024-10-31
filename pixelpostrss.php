<?php
/*
Plugin Name: PixelPost RSS
Plugin URI: http://www.digitaladventures.fr/photos/pixelpostrss-pour-wordpress/
Description: Allows you to integrate a PixelPost photos rss feed into your site. Inspired from FlickrRSS plugin
Version: 0.50
License: GPL
Author: bitonio
Author URI: http://www.digitaladventures.fr
*/

function get_pixelpostRSS() {

	// the function can accept up to seven parameters, otherwise it uses option panel defaults 	
  	for($i = 0 ; $i < func_num_args(); $i++) {
    	$args[] = func_get_arg($i);
    	}

	if (!function_exists('MagpieRSS')) { // Check if another plugin is using RSS, may not work
		include_once (ABSPATH . WPINC . '/rss.php');
		error_reporting(E_ERROR);
	}

	$rss = @fetch_rss(get_option('pixelpostRSS_feedurl'));
	if ($rss) {
    	$imgurl = "";
    	# specifies number of pictures
		$items = array_slice($rss->items, 0, get_option('pixelpostRSS_display_numitems'));
	    if(is_array($items))
	    {
	    echo "<div id=\"pixelpostrss\">";
    	foreach ( $items as $item )
    	{
       	 	if(preg_match('<img src="([^"]*)">', $item['description'], $imgUrlMatches))
       		{
            	$imgurl = $imgUrlMatches[1];
            	$imgurl = str_replace("/images/", "/thumbnails/thumb_", $imgurl);
            	print "<a href=\"".$item["link"]."\" title=\"".$item["title"]."\">";
            	print "<img src=\"$imgurl\" title=\"".$item["title"]."\" />";
            	print "</a>\n";
          	 }
         }
         echo "</div>";
         }
	} // end if RSS

} # end get_pixelpostRSS() function

function widget_pixelpostRSS_init() {

	if (!function_exists('register_sidebar_widget')) return;

	function widget_pixelpostRSS($args) {
		extract($args);
		$options = get_option('widget_pixelpostRSS');
		$title = $options['title'];
		echo $before_widget . $before_title . $title . $after_title;
		get_pixelpostRSS();
		echo $after_widget;
		return;
	}

	function widget_pixelpostRSS_control() {
		$options = get_option('widget_pixelpostRSS');

		if ( $_POST['pixelpostRSS-submit'] ) {
			$options['title'] = strip_tags(stripslashes($_POST['pixelpostRSS-title']));
			update_option('widget_pixelpostRSS', $options);
		}

		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		
		echo '<p style="text-align:right;"><label for="pixelpostRSS-title">Title: <input style="width: 180px;" id="gsearch-title" name="pixelpostRSS-title" type="text" value="'.$title.'" /></label></p>';
		echo '<input type="hidden" id="pixelpostRSS-submit" name="pixelpostRSS-submit" value="1" />';
	}		

	register_sidebar_widget('pixelpostRSS', 'widget_pixelpostRSS');
	register_widget_control('pixelpostRSS', 'widget_pixelpostRSS_control', 300, 100);
}

function pixelpostRSS_subpanel() {
     if (isset($_POST['save_pixelpostRSS_settings'])) {
       $option_feedurl = $_POST['pixelpost_feedurl'];
       $option_display_numitems = $_POST['display_numitems'];
       update_option('pixelpostRSS_feedurl', $option_feedurl);
       update_option('pixelpostRSS_display_numitems', $option_display_numitems);
       ?> <div class="updated"><p>pixelpostRSS settings saved</p></div> <?php
     }

	?>

	<div class="wrap">
		<h2>pixelpostRSS Settings</h2>
		
		<form method="post">
		<table class="form-table">
		 <tr valign="top">
		  <th scope="row">PixelPost RSS url</th>
	      <td><input name="pixelpost_feedurl" type="text" id="pixelpost_feedurl" value="<?php echo get_option('pixelpostRSS_feedurl'); ?>" size="45" /></td>
         </tr>
         <tr valign="top">
          <th scope="row">Display</th>
          <td>
		 	Display  
        	<select name="display_numitems" id="display_numitems">
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '1') { echo 'selected'; } ?> value="1">1</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '2') { echo 'selected'; } ?> value="2">2</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '3') { echo 'selected'; } ?> value="3">3</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '4') { echo 'selected'; } ?> value="4">4</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '5') { echo 'selected'; } ?> value="5">5</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '6') { echo 'selected'; } ?> value="6">6</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '7') { echo 'selected'; } ?> value="7">7</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '8') { echo 'selected'; } ?> value="8">8</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '9') { echo 'selected'; } ?> value="9">9</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '10') { echo 'selected'; } ?> value="10">10</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '11') { echo 'selected'; } ?> value="11">11</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '12') { echo 'selected'; } ?> value="12">12</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '13') { echo 'selected'; } ?> value="13">13</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '14') { echo 'selected'; } ?> value="14">14</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '15') { echo 'selected'; } ?> value="15">15</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '16') { echo 'selected'; } ?> value="16">16</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '17') { echo 'selected'; } ?> value="17">17</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '18') { echo 'selected'; } ?> value="18">18</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '19') { echo 'selected'; } ?> value="19">19</option>
		      <option <?php if(get_option('pixelpostRSS_display_numitems') == '20') { echo 'selected'; } ?> value="20">20</option>
		      </select>
            images</p>
           </td> 
         </tr>
         </table>      

        <div class="submit">
           <input type="submit" name="save_pixelpostRSS_settings" value="<?php _e('Save Settings', 'save_pixelpostRSS_settings') ?>" />
        </div>
        </form>
    </div>

<?php } // end pixelpostRSS_subpanel()

function pixelpostRSS_admin_menu() {
   if (function_exists('add_options_page')) {
        add_options_page('pixelpostRSS Settings', 'pixelpostRSS', 8, basename(__FILE__), 'pixelpostRSS_subpanel');
        }
}

add_action('admin_menu', 'pixelpostRSS_admin_menu'); 
add_action('plugins_loaded', 'widget_pixelpostRSS_init');
?>
