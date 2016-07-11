<?php

namespace OLOG\BT;

use OLOG\BT;

class LayoutBootstrap
{
    
static public function render($content_html, $action_obj = null) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <?php
    $breadcrumbs_arr = [];
    $h1_str = '';
    
    if ($action_obj){
        if ($action_obj instanceof InterfaceBreadcrumbs){
            $breadcrumbs_arr = $action_obj->currentBreadcrumbsArr();
        }

        if ($action_obj instanceof InterfacePageTitle){
            $h1_str = $action_obj->currentPageTitle();
        }
    }
    
    if (!empty($breadcrumbs_arr)){
        echo BT::breadcrumbs($breadcrumbs_arr);
    }

    ?>
    <div class="page-header">
        <h1><?= $h1_str ?></h1>
    </div>
    <?= $content_html ?>
</div>
</body>
</html>
<?php
}
}
