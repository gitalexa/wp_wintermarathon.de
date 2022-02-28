<div id="teaser-registration" class="teaser-registration">
    <article>
        <h2><?php the_title() ?></h2>
        <?php
        if(CFS()->get('zweitueberschrift')) {
            echo '<h4>' . CFS()->get('zweitueberschrift') . '</h4>';
        }

        if(!empty(get_the_content())) {
            the_content();
        }

        if(CFS()->get('link1_name') || CFS()->get('link2_name') || CFS()->get('link3_name')) {
            echo '<div class="teaser-button-container">';
            for($i = 1; $i <= 3; $i++) {
                if(CFS()->get('link' . $i . '_name')) {
                    echo '<a class="teaser-button" ';

                    if (CFS()->get('link' . $i . '_adresse') != ""){ echo ' target="_blank"';}


                     echo 'href="' . (CFS()->get('link' . $i . '_adresse') ? : CFS()->get('link' . $i . '_interne_adresse')) . '">' . CFS()->get('link' . $i . '_name') . '</a>';
                }
            }
            echo '</div>';
        }
        ?>
    </article>
</div>