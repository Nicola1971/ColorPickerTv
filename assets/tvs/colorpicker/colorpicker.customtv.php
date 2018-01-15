<?php
/*
 ColorPickerTV — custom TV for Evolution CMS
 Version 15.01.18 by Nicola Lambathakis, http://www.tattoocms.it
*/

if (IN_MANAGER_MODE != 'true') {
 die('<h1>Error:</h1><p>Please use the MODx content manager instead of accessing this file directly.</p>');
}
// get global language
global $modx,$_lang;
$id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
$value = empty($row['value']) ? $row['default_text'] : $row['value'];
$rid = $row['id'];
$site_name = $modx->config['site_name'];
$manager_theme = $modx->config['manager_theme'];

$output .="<link rel=\"stylesheet\" href=\"media/style/common/spectrum/spectrum.css\" />
         <link rel=\"stylesheet\" type=\"text/css\" href=\"media/style/$manager_theme/css/color.switcher.css\" />
<script src=\"media/script/spectrum/spectrum.evo.min.js\" type=\"text/javascript\"></script>
"; 

$output .="
<style>
.displaycolor$rid {margin-left:1rem}
</style>
<input type=\"text\" id=\"tv$rid\" name=\"tv$rid\" value=\"{$value}\" onchange=\"documentDirty=true;\"/>
<span class=\"displaycolor$rid\"> {$value}</span>";  
$output .="
<script>
jQuery(document).ready(function($) {
$(\"#tv$rid\").spectrum({
 cancelText: \"CANCEL\",
 chooseText: \"CHOOSE\",
 preferredFormat: \"hex3\",
 showPalette: true,
 showInitial: true,
 showInput: true,
 showSelectionPalette: true, // true by default
 allowEmpty: true,
 palette: [
 [\"#000\",\"#333\",\"#444\",\"#666\",\"#999\",\"#ccc\",\"#DFDFDF\", \"#eee\",\"#f3f3f3\", \"#FAFAFA\", \"#fff\"],
 [\"#f00\",\"#f90\",\"#ff0\",\"#0f0\",\"#0ff\",\"#00f\",\"#90f\",\"#f0f\",\"#8E44AD\",\"#34495E\",\"#499bea\"],
 [\"#c00\",\"#e69138\",\"#f1c232\",\"#6aa84f\",\"#45818e\",\"#3d85c6\",\"#674ea7\",\"#a64d79\",\"#741B47\",\"#134F5C\",\"#16A085\"]
    ]
});
$(\"#tv$rid\").on('change', function () {
    var v = $(this).val();
    $(\".displaycolor$rid\").html(v);
});
});
</script>
"; 

echo $output;
?>
