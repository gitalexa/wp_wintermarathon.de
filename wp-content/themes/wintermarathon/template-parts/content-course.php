<div id="course">
    <a id="course-static" target="_blank" href="<?php echo CFS()->get('google_maps_adresse'); ?>">
        <img src="<?php echo CFS()->get('picture'); ?>" alt="Strecke">
    </a>
    <div class="course_p">
        <h3><?php the_title(); ?></h3>
        <?php
        if(!empty(get_the_content())) {
            the_content();
        } ?>
    </div>
</div>