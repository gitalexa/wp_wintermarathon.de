<?php

global $wpdb;

$selector = get_post_meta( get_the_ID(), 'result_select', true );

if($selector) {
    $table_name = $wpdb->prefix . 'wm_results_single_import';

    if (DbBridge()->table_exists($table_name)) {
        $retrieve_data = DbBridge()->get_results_single($table_name, $selector);

        if(sizeof($retrieve_data) > 0):
        ?>

        <div class="result-table splitter-table">
            <h3>Splitter <?php the_title() ?></h3>
            <table class="preview-result">
                <tr>
                    <th><p>Starter</p></th>
                    <th><p>Team</p></th>
                    <th><p>StNr</p></th>
                    <th><p>Zeit</p></th>
                </tr>

                <?php

                for($i = 0; $i < sizeof($retrieve_data) && $i < 5; $i++) {
                    $starterEntry = "";
                    $starter = $retrieve_data[$i]->starter;

                    $starterEntry .= '<a onclick="writeCertificateSplitter(' . "'";
                    $starterEntry .= trim($starter) . "','";
                    $starterEntry .= $retrieve_data[$i]->club . "','";
                    $starterEntry .= $retrieve_data[$i]->time . "','";
                    $starterEntry .= date('d.m.Y',strtotime(CFS()->get('datum_des_marathons'))) . "','".$selector."')";
                    $starterEntry .= '">' . trim($starter) . "</a>";
                    ?>

                    <tr>
                        <td><p><?php echo $starterEntry ?></p></td>
                        <td><p><?php echo $retrieve_data[$i]->club; ?></p></td>
                        <td><p><?php echo $retrieve_data[$i]->number . "." . $retrieve_data[$i]->m_number; ?></p></td>
                        <td><p><?php echo $retrieve_data[$i]->time; ?></p></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <div class="result-button-container">
                <a class="teaser-button result-expander">ALLE ERGEBNISSE</a>
            </div>
            <div class="result-layer layer">
                <div class="layer-content">
                    <table class="full-result">
                        <tr>
                            <th><p>Starter</p></th>
                            <th><p>Team</p></th>
                            <th><p>StNr</p></th>
                            <th><p>Zeit</p></th>
                        </tr>

                        <?php

                        foreach ($retrieve_data as $retrieved_data) {
                            $starterEntry = "";
                            $starter = $retrieved_data->starter;
                            $starterEntry .= '<a onclick="writeCertificateSplitter(' . "'";
                            $starterEntry .= trim($starter) . "','";
                            $starterEntry .= $retrieved_data->club . "','";
                            $starterEntry .= $retrieved_data->time . "','";
                            $starterEntry .= date('d.m.Y',strtotime(CFS()->get('datum_des_marathons'))) . "','".$selector."','".$selector."');";
                            $starterEntry .= '">' . trim($starter) . "</a>";
                            ?>

                            <tr>
                                <td><p><?php echo $starterEntry ?></p></td>
                                <td><p><?php echo $retrieved_data->club; ?></p></td>
                                <td><p><?php echo $retrieved_data->number . "." . $retrieved_data->m_number; ?></p></td>

                                <td><p><?php echo $retrieved_data->time; ?></p></td>
                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                    <div class="layer-buttons result-button-container">
                        <div class="reducer">
                            <img alt="Minus" src="<?php echo get_stylesheet_directory_uri(); ?>/img/navi/minus.svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        endif;
    }
}
?>