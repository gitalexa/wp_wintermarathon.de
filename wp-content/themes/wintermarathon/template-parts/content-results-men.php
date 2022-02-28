<?php

global $wpdb;
$selector = get_post_meta( get_the_ID(), 'result_select', true );
if($selector) {
    $table_name = $wpdb->prefix . 'wm_results_import';

    if (DbBridge()->table_exists($table_name)) {
        $retrieve_data = DbBridge()->get_results_men($table_name, $selector);

        if(sizeof($retrieve_data) > 0):
        ?>

        <div class="result-table">
            <h3>Männer <?php the_title() ?></h3>
            <table class="preview-result">
                <tr>
                    <th><p>Pl Männer</p></th>
                    <th><p>Pl Gesamt</p></th>
                    <th><p>Pl Sonder</p></th>
                    <th><p>StNr</p></th>
                    <th><p>Team</p></th>
                    <th><p>Starter</p></th>
                    <th><p>Teamzeit</p></th>
                </tr>

                <?php

                for($i = 0; $i < sizeof($retrieve_data) && $i < 5; $i++) {
                    $starterEntry = "";
                    $starterArray = explode(',', $retrieve_data[$i]->starter);
                    $time = $retrieve_data[$i]->time_max;

                    if(strpos($time, " ")) {
                        $time = substr($time, strpos($time, " ") + 1);
                    }

                    foreach($starterArray as $starter) {
                        if(strlen($starterEntry) > 0) {
                            $starterEntry .= ", ";
                        }
                        $starterEntry .= '<a onclick="writeCertificate(' . "'";
                        $starterEntry .= trim($starter) . "','";
                        $starterEntry .= $retrieve_data[$i]->team_name . "','";
                        $starterEntry .= $time . "','";
                        $starterEntry .= $retrieve_data[$i]->position_all . "','";
                        $starterEntry .= $retrieve_data[$i]->position_men . "','Männer','";
                        $starterEntry .= date('d.m.Y',strtotime(CFS()->get('datum_des_marathons'))) . "','".$selector."')";
                        $starterEntry .= '">' . trim($starter) . "</a>";
                    }
                    ?>

                    <tr>
                        <td><p><?php echo $retrieve_data[$i]->position_men; ?></p></td>
                        <td><p><?php echo $retrieve_data[$i]->position_all; ?></p></td>
                        <td><p><?php echo $retrieve_data[$i]->position_b90 > 0 ? $retrieve_data[$i]->position_b90 . ". U90" : "";
                                echo $retrieve_data[$i]->position_o150 > 0 ? $retrieve_data[$i]->position_o150 . ". Ü150" : ""; ?></p></td>
                        <td><p><?php echo $retrieve_data[$i]->number; ?></p></td>
                        <td><p><?php echo $retrieve_data[$i]->team_name; ?></p></td>
                        <td><p><?php echo $starterEntry ?></p></td>
                        <td><p><?php echo $time; ?></p></td>
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
                            <th><p>M</p></th>
                            <th><p>G</p></th>
                            <th><p>S</p></th>
                            <th><p>StNr</p></th>
                            <th><p>Team</p></th>
                            <th><p>Starter</p></th>

                          <?php if ($selector > 2017): ?>
                              <th><p>25KM, 30KM</br> 35KM, 40KM</p></th>
<!--
                            <th><p>Zeit 25KM</p></th>
                            <th><p>Zeit 30KM</p></th>
                            <th><p>Zeit 35KM</p></th>
                            <th><p>Zeit 40KM</p></th> -->
                            <?php endif; ?>
                            <th><p>Teamzeit</p></th>
                        </tr>

                        <?php

                        foreach ($retrieve_data as $retrieved_data) {
                            $starterEntry = "";
                            $starterArray = explode(',', $retrieved_data->starter);
                            $time = $retrieved_data->time_max;

                            if(strpos($time, " ")) {
                                $time = substr($time, strpos($time, " ") + 1);
                            }

                            foreach($starterArray as $starter) {
                                if(strlen($starterEntry) > 0) {
                                    $starterEntry .= ", ";
                                }
                                $starterEntry .= '<a onclick="writeCertificate(' . "'";
                                $starterEntry .= trim($starter) . "','";
                                $starterEntry .= $retrieved_data->team_name . "','";
                                $starterEntry .= $time . "','";
                                $starterEntry .= $retrieved_data->position_all . "','";
                                $starterEntry .= $retrieved_data->position_men . "','Männer','";
                                $starterEntry .= date('d.m.Y',strtotime(CFS()->get('datum_des_marathons'))) . "','".$selector."')";
                                $starterEntry .= '">' . trim($starter) . "</a>";
                            }
                            ?>

                            <tr>
                                <td><p><?php echo $retrieved_data->position_men; ?></p></td>
                                <td><p><?php echo $retrieved_data->position_all; ?></p></td>
                                <td><p><?php echo $retrieved_data->position_b90 > 0 ? $retrieved_data->position_b90 . ". U90" : "";
                                        echo $retrieved_data->position_o150 > 0 ? $retrieved_data->position_o150 . ". Ü150" : ""; ?></p></td>
                                <td><p><?php echo $retrieved_data->number; ?></p></td>
                                <td><p><?php echo $retrieved_data->team_name; ?></p></td>
                                <td><p><?php echo $starterEntry ?></p></td>


                            <?php if ($selector > 2017): ?>
                                <td><p><?php echo $retrieved_data->time_25; ?>, <?php echo $retrieved_data->time_30; ?>, <?php echo $retrieved_data->time_35; ?>, <?php echo $retrieved_data->time_40; ?></p></td>

                                <!--
                                <td><p><?php echo $retrieved_data->time_25; ?></p></td>
                                <td><p><?php echo $retrieved_data->time_30; ?></p></td>
                                <td><p><?php echo $retrieved_data->time_35; ?></p></td>
                                <td><p><?php echo $retrieved_data->time_40; ?></p></td>

                                -->
                            <?php endif; ?>
                                <td><p><?php echo $time; ?></p></td>
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