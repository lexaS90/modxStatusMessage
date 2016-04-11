<?php
/**
 * getMassage
 *
 * DESCRIPTION
 *
 * Get status message
 *
 * PROPERTIES:
 *
 * &tpl string required. Default: statusMsgTpl
 *
 * USAGE:
 *
 * [[!getMessage]]
 *
 * RETURN
 * 
 * string - message
 * 
 */

$tpl = $modx->getOption('tpl', $scriptProperties, 'statusMsgTpl');

session_start();

$output = '';
$msgArray = $_SESSION['session_messages'];

unset($_SESSION['session_messages']);

foreach ($msgArray as $item){
    
    $output .= $modx->getChunk($tpl,$item);
    
}

return $output;