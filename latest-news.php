<?php

/*
Plugin Name: Latest News
Plugin URI: http://plugins.couponcondo.com/latest-news-plugin
Description: Displays the latest news updates on your website.
Version: 1.0.1
Author: Coupon Condo
Author URI: http://www.couponcondo.com
*/

/*  Copyright 2011 Coupon Condo - E-Mail: support@couponcondo.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Hook for adding admin menus
add_action('admin_menu', 'latest_latest_news_add_pages');

// action function for above hook
function latest_latest_news_add_pages() {
    add_options_page('News', 'News', 'administrator', 'news', 'latest_news_options_page');
}

// latest_news_options_page() displays the page content for the Test Options submenu
function latest_news_options_page() {

    // variables for the field and option names 
    $opt_name = 'mt_latest_news_header';
	$opt_name_2 = 'mt_latest_news_color';
    $opt_name_3 = 'mt_latest_news_topic';
	$opt_name_4 = 'mt_latest_news_number';
    $opt_name_6 = 'mt_latest_news_plugin_support';
    $opt_name_7 = 'mt_latest_news_description';
    $opt_name_8 = 'mt_latest_news_dateyes';
    $hidden_field_name = 'mt_quotes_submit_hidden';
    $data_field_name = 'mt_latest_news_header';
	$data_field_name_2 = 'mt_latest_news_color';
    $data_field_name_3 = 'mt_latest_news_topic';
	$data_field_name_4 = 'mt_latest_news_number';
    $data_field_name_6 = 'mt_latest_news_plugin_support';
    $data_field_name_7 = 'mt_latest_news_description';
    $data_field_name_8 = 'mt_latest_news_dateyes';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
	$opt_val_2 = get_option( $opt_name_2 );
    $opt_val_3 = get_option( $opt_name_3 );
	$opt_val_4 = get_option( $opt_name_4 );
    $opt_val_6 = get_option($opt_name_6);
    $opt_val_7 = get_option($opt_name_7);
    $opt_val_8 = get_option($opt_name_8);

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];
		$opt_val_2 = $_POST[ $data_field_name_2 ];
        $opt_val_3 = $_POST[ $data_field_name_3 ];
		$opt_val_4 = $_POST[ $data_field_name_4 ];
        $opt_val_6 = $_POST[$data_field_name_6];
        $opt_val_7 = $_POST[$data_field_name_7];
        $opt_val_8 = $_POST[$data_field_name_8];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );
		update_option( $opt_name_2, $opt_val_2 );
        update_option( $opt_name_3, $opt_val_3 );
		update_option( $opt_name_4, $opt_val_4 );
        update_option( $opt_name_6, $opt_val_6 );
        update_option( $opt_name_7, $opt_val_7 );  
        update_option( $opt_name_8, $opt_val_8 );  

        // Put an options updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Options saved.', 'mt_trans_domain' ); ?></strong></p></div>
<?php

    }

    // Now display the options editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Latest News Plugin Options', 'mt_trans_domain' ) . "</h2>";

echo "<strong>Enter [news] into your posts or pages to insert news!</strong>";

$blog_url_feedback=get_bloginfo('url');

    // options form
    
    $change4 = get_option("mt_latest_news_plugin_support");

if ($change4=="Yes" || $change4=="") {
$change4="checked";
$change41="";
} else {
$change4="";
$change41="checked";
}

    $change5 = get_option("mt_latest_news_description");

if ($change5=="Yes") {
$change5="checked";
$change51="";
} else {
$change5="";
$change51="checked";
}

    $change6 = get_option("mt_latest_news_dateyes");

if ($change6=="Yes") {
$change6="checked";
$change61="";
} else {
$change6="";
$change61="checked";
}
    ?>
	
<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Title of Widget (Shown above News)", 'mt_trans_domain' ); ?> 
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="50">
</p><hr />

<p><?php _e("Category of News to show:", 'mt_trans_domain' ); ?> 
<select name="<?php echo $data_field_name_3; ?>">
<option value="topstories">Top News</option>
<option value="world">World</option>
<option value="europe">Europe</option>
<option value="china">China</option>
<option value="india">India</option>
<option value="asia">Asia</option>
<option value="oceania">Oceania</option>
<option value="africa">Africa</option>
<option value="us">United States</option>
<option value="britain">Britain</option>
<option value="business">Business</option>
<option value="tech">Technology</option>
<option value="politics">Politics</option>
<option value="health">Health</option>
<option value="sports">Sports</option>
<option value="entertainment">Entertainment</option>
<option value="oddlyenough">Odd News</option>
</select>
</p><hr />

<p><?php _e("Number of News to show", 'mt_trans_domain' ); ?> 
<input type="text" name="<?php echo $data_field_name_4; ?>" value="<?php echo $opt_val_4; ?>" size="3">
</p><hr />

<p><?php _e("Show brief description of each News item?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_7; ?>" value="Yes" <?php echo $change5; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_7; ?>" value="No" <?php echo $change51; ?> >No
</p><hr />

<p><?php _e("Show Date of News publishing?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_8; ?>" value="Yes" <?php echo $change6; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_8; ?>" value="No" <?php echo $change61; ?> >No
</p><hr />

<p><?php _e("Font Color (In Hex):", 'mt_trans_domain' ); ?> 
#<input size="7" name="<?php echo $data_field_name_2; ?>" value="<?php echo $opt_val_2; ?>">
(For help, go to <a href="http://html-color-codes.com/">HTML Color Codes</a>).
</p><hr />

<p><?php _e("Support the Plugin with a Link?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_6; ?>" value="Yes" <?php echo $change4; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_6; ?>" value="No" <?php echo $change41; ?> >No
</p><hr />

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Update Options', 'mt_trans_domain' ) ?>" />
</p><hr />

</form>
<?php
}

function show_news($args) {

extract($args);

  $latest_news_header = get_option("mt_latest_news_header"); 
  $plugin_support2 = get_option("mt_latest_news_plugin_support");
  $latest_news_type = get_option("mt_latest_news_topic");
  $latest_news_number = get_option("mt_latest_news_number");
  $newscolor = get_option("mt_latest_news_color");
  $dateyes = get_option("mt_latest_news_dateyes");


if ($latest_news_header=="") {
$latest_news_header="Latest News";
}

if ($latest_news_number=="") {
$latest_news_number=5;
}

if ($latest_news_type=="") {
$latest_news_type="topstories";
}

$i=1;

echo $before_widget.$before_title.$latest_news_header.$after_title; 

$doc = new DOMDocument();

echo "<ul>";

$doc->load('http://rss.news.yahoo.com/rss/'.$latest_news_type);

foreach ($doc->getElementsByTagName('item') as $node) {
$t_news = $node->getElementsByTagName('title')->item(0);
$t_newslink = $node->getElementsByTagName('link')->item(0);
$t_description = $node->getElementsByTagName('description')->item(0);
$news = $t_news->nodeValue;
$newslink = $t_newslink->nodeValue;
$description = str_replace('AP - ', '', strip_tags($t_description->nodeValue));
$t_date = $node->getElementsByTagName('pubDate')->item(0);
$date = $t_date->nodeValue;

if ($dateyes=="No" || $dateyes=="") {
$date="";
} else {
$date="<br />".$date;
}

$news = str_replace("(AP)", "(Source: AP)", $news);
$news = str_replace("(Reuters)", "(Source: Reuters)", $news);

if (get_option("mt_latest_news_description")=="Yes") {
echo "<li style='color:#".$newscolor."'><a href='".$newslink."' rel='nofollow'>".$news."</a>".$date."<br />".$description."</li>";
} else {
echo "<li style='color:#".$newscolor."'><a href='".$newslink."' rel='nofollow'>".$news."</a>".$date."</li>";
}

if($i++ >= $latest_news_number) break;

}

echo "</ul>";

if ($plugin_support2=="Yes" || $plugin_support2=="") {
echo "<p style='color: #".$newscolor."; font-size:x-small'>News Plugin made by <a href='http://www.ares-p2p-download.com'>Ares Free Download</a>.</p>";
}

echo $after_widget;

}

function init_latest_news_widget() {
register_sidebar_widget("Latest News", "show_news");
}

add_action("plugins_loaded", "init_latest_news_widget");
add_shortcode('news', 'show_news');

?>