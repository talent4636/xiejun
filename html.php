<?php

$str = addcslashes("<>& *;");
echo $str;
$table = get_html_translation_table(HTML_ENTITIES);
$rev_trans = array_flip($table);
echo strtr($str,$rev_trans);

?>