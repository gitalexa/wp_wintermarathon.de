<div id="teaser-infopage">
    <article>
        <h3><?php the_title() ?></h3>
        <?php
        if(!empty(get_the_content())) {
            the_content();
        }
        echo '<div class="teaser-button-container">';
        if(CFS()->get('link_name')) {




            echo '<a class="teaser-button"';
            if (CFS()->get('link_adresse') != ""){ echo ' target="_blank"';}


            echo ' href="' . (CFS()->get('link_adresse') ? : CFS()->get('link_interne_adresse')) . '">' . CFS()->get('link_name') . '</a>';

        }



        if(CFS()->get('link_name2')) {




            echo '<a class="teaser-button"';
            if (CFS()->get('link_adresse2') != ""){ echo ' target="_blank"';}


            echo ' href="' . (CFS()->get('link_adresse2') ? : CFS()->get('link_interne_adresse2')) . '">' . CFS()->get('link_name2') . '</a>';

        }

        if(CFS()->get('link_name3')) {




            echo '<a class="teaser-button"';
            if (CFS()->get('link_adresse3') != ""){ echo ' target="_blank"';}


            echo ' href="' . (CFS()->get('link_adresse3') ? : CFS()->get('link_interne_adresse3')) . '">' . CFS()->get('link_name3') . '</a>';

        }
        echo '</div>';
        ?>
    </article>
    <div class="clear"></div>
</div>