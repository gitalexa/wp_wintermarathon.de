<?php
if(!empty(get_the_content())) {
    #the_content();
    remove_filter ('the_content', 'wpautop'); // p-Tag entfernen.
    the_content();
    add_filter ('the_content', 'wpautop'); // p-Tag entfernen.
}
?>

