<?php
/**
 * setMassage
 *
 * DESCRIPTION
 *
 * Set status message
 *
 * PROPERTIES:
 *
 * &text string required
 * &status string optional (success, info, warning, danger). Default: success
 *
 * USAGE:
 *
 * [[!setMessage? &text=`TEXT` &status=`danger`]]
 *
 */
 
if (!isset($scriptProperties['text']))
return;

$text = $modx->getOption('text', $scriptProperties);
$status = $modx->getOption('status', $scriptProperties, 'success');

session_start();

$_SESSION['session_messages'][] = array('text' =>  $text, 'status' => $status);