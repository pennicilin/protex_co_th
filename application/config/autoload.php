<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Twiggy - Twig template engine implementation for CodeIgniter
 * 
 * @author 		Edmundas Kondrašovas <as@edmundask.lt>
 * @license		http://www.opensource.org/licenses/MIT
 */

$autoload['libraries'] = array('twiggy','database', 'datamapper', 'curl');
$autoload['config'] = array('twiggy');
$autoload['helper'] = array('url', 'template', 'html', 'text', 'ajax');
$autoload['models'] = array();