<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor'] = array(
        'class'    => 'Checklogin',
        'function' => 'check',
        'filename' => 'Checklogin.php',
        'filepath' => 'hooks',
        'params'   => array()
);

// $hook['pre_controller'][] = array(
//         'class'    => 'Checklogin',
//         'function' => 'check2',
//         'filename' => 'Checklogin.php',
//         'filepath' => 'hooks',
//         'params'   => array()
// );
