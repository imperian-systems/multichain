<?php

$finfo = new finfo(FILEINFO_MIME_TYPE);
header('Content-type: '.$finfo->buffer($item['largedata']));

print $item['largedata'];
?>
