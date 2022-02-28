<div id="partner-carousel-container">
    <h3><?php the_title(); ?></h3>
    <div id="partner-carousel">
        <?php
remove_filter ('the_content', 'wpautop'); // p-Tag entfernen.
strip_tags(the_content());
#the_content();
add_filter ('the_content', 'wpautop'); // p-Tag hinzufügen.
?>
    </div>
</div>