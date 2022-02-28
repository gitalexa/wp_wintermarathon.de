<?php
//clr_bg_headerdate, clr_bg_homeheadline, clr_bg_footer, clr_bg_regteaser, clr_bg_news, clr_bg_course
//clr_font_headlines, clr_font_text, clr_font_links

function hexToRgba($hexcolor, $alpha) {
    $hexcolor = str_replace("#", "", $hexcolor);
    $split = str_split($hexcolor, 2);
    $retVal = "rgba(";
    foreach($split as $hex) {
        $retVal .= hexdec($hex) . ", ";
    }
    $retVal .= $alpha . ")";
    return $retVal;
}

echo "<style>";


if($value = get_option( 'cpa_settings_options' )['clr_bg_headerdate']) {
    echo '.green_background {background-color: ' . $value . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_bg_homeheadline']) {
    echo '#content-head .box {background-color: ' . hexToRgba($value, 0.7) . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_bg_footer']) {
    echo 'footer {background-color: ' . $value . ';} .layer {background-color: ' . hexToRgba($value, 0.85) . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_bg_regteaser']) {
    echo '.teaser-registration {background-color: ' . hexToRgba($value, 0.15) . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_bg_news']) {
    echo '#article-carousel-container {background-color: ' . hexToRgba($value, 0.15) . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_bg_course']) {
    echo '#course {background-color: ' . hexToRgba($value, 0.08) . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_font_headlines']) {
    echo 'h2, h3, h4 {color: ' . $value . ';} .teaser-button {border-color: ' . $value . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_font_text']) {
    echo 'p, .teaser-button {color: ' . $value . ';} .teaser-button {border-color: ' . $value . ';} .copyright-line {background-color: ' . hexToRgba($value, 0.7) . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_font_links']) {
    echo 'a {color: ' . $value . ';}';
}

if($value = get_option( 'cpa_settings_options' )['clr_font_footer']) {
    echo 'footer h5, p.dark {color: ' . $value . ';}';
}

echo "</style>";