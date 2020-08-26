<?php
/* By taking advantage of hooks, filters, and the Custom Loop API, you can make Thesis
 * do ANYTHING you want. For more information, please see the following articles from
 * the Thesis User’s Guide or visit the members-only Thesis Support Forums:
 *
 * Hooks: http://diythemes.com/thesis/rtfm/customizing-with-hooks/
 * Filters: http://diythemes.com/thesis/rtfm/customizing-with-filters/
 * Custom Loop API: http://diythemes.com/thesis/rtfm/custom-loop-api/

---:[ place your custom code below this line ]:---*/



remove_action('thesis_hook_before_header', 'thesis_nav_menu');
add_action('thesis_hook_after_header', 'thesis_nav_menu');


remove_action('thesis_hook_footer', 'thesis_attribution');
function my_custom_footer() {
?>
<a href="http://jaso.org">Japan-America Society of Oregon</a> | 221 NW Second Avenue, Suite 202 | Portland, Oregon 97209
Phone: 503.552.8811 Fax: 503.552.8815<br />
© 2012 Japan-America Society of Oregon  Website Design by <a href="http://simplyfinedesign.com" target="_blank">SimplyFine Design</a>
<?php
}
add_action('thesis_hook_footer', 'my_custom_footer');

function no_page_headline() {
if (is_page())
return false;
else
return true;
}
add_filter('thesis_show_headline_area', 'no_page_headline');




/* Custom 404 Hooks */
    function custom_thesis_404_title() {
    ?>
    So Sorry!
    <?
    }
    remove_action('thesis_hook_404_title', 'thesis_404_title');
    add_action('thesis_hook_404_title', 'custom_thesis_404_title');
    function custom_thesis_404_content() {
    ?>
<p>There's nothing here. Please click your back button, or select a page from the navigation bar.</p>
    <?
    }
    remove_action('thesis_hook_404_content', 'thesis_404_content');
    add_action('thesis_hook_404_content', 'custom_thesis_404_content');
