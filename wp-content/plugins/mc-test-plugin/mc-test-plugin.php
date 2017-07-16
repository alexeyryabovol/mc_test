<?php
/* 
 * Plugin Name: Matematica Company Test Plugin
 * Author: Alexey Ryabovol
 * Description: Matematica Company Test Plugin
 */
include_once 'model/settings.php';
include_once 'model/form.php';

$mc = new MC_Settings();
$mc->init_plugin();
