<?php

namespace OLOG\BT;

use OLOG\ActionInterface;
use OLOG\HTML;
use OLOG\Layouts\LayoutInterface;
use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\MenuItem;
use OLOG\Layouts\PageTitleInterface;
use OLOG\Layouts\PageToolbarHtmlInterface;
use OLOG\Layouts\TopActionObjInterface;

class LayoutBootstrap4 implements
	LayoutInterface
{
    static public function render($content_html_or_callable, $action_obj = null) {
?><!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="/assets/favicon.ico">

            <title>Starter Template for Bootstrap</title>

            <!-- Bootstrap core CSS -->
            <link href="/assets/bootstrap4/css/bootstrap.css" rel="stylesheet">

            <!-- Custom styles for this template -->
            <!--<link href="starter-template.css" rel="stylesheet">-->
            <style>
                body {
                    padding-top: 5rem;
                }
            </style>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <!--<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
            <script src="/assets/bootstrap4/assets/js/vendor/popper.min.js"></script>
            <script src="/assets/bootstrap4/js/bootstrap.js"></script>
        </head>

        <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <?php self::actionMenuHtml($action_obj) ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <main role="main" class="container">

            <?php
            if (is_callable($content_html_or_callable)) {
                $content_html_or_callable();
            } else {
                echo $content_html_or_callable;
            }
            ?>

        </main><!-- /.container -->


        </body>
        </html>
        <?php

    }

    static public function actionMenuHtml($action_obj){
        /*
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
         */

        if (!($action_obj instanceof MenuInterface)){
            return;
        }

        $menu_items_arr = $action_obj::menuArr();
        foreach ($menu_items_arr as $menu_item_obj) {
            assert($menu_item_obj instanceof MenuItem);

            $href = 'href="#"';
            if ($menu_item_obj->getUrl()) {
                $href = 'href="' . HTML::url($menu_item_obj->getUrl()) . '"';
            }

            $icon = '';
            if ($menu_item_obj->getIconClassesStr()) {
                $icon = '<i class="' . $menu_item_obj->getIconClassesStr() . '"></i> ';
            }

            $children_arr = $menu_item_obj->getChildrenArr();
            if (count($children_arr)) {
                ?>
                <li class="nav-item dropdown">
                    <a <?= $href ?> class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $icon . HTML::content($menu_item_obj->getText()) ?> <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <?php
                        /** @var  $child_menu_item_obj \OLOG\Layouts\MenuItem */
                        foreach ($children_arr as $child_menu_item_obj) {
                            assert($child_menu_item_obj instanceof MenuItem);

                            $children_href = '';
                            if ($child_menu_item_obj->getUrl()) {
                                $children_href = 'href="' . HTML::url($child_menu_item_obj->getUrl()) . '"';
                            }

                            $children_icon = '';
                            if ($child_menu_item_obj->getIconClassesStr()) {
                                $children_icon = '<i class="' . $child_menu_item_obj->getIconClassesStr() . '"></i> ';
                            }
                            ?>
                            <a class="dropdown-item" <?= $children_href ?>><?= $children_icon . HTML::content($child_menu_item_obj->getText()) ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link" <?= $href ?>><?= $icon . HTML::content($menu_item_obj->getText()) ?></a>
                </li>
                <?php
            }
        }

    }
}
