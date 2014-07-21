<?php


function getTemplate($file) {

	ob_start(); // start output buffer

    include $file;
    $template = ob_get_contents(); // get contents of buffer
    ob_end_clean();
    return $template;

}