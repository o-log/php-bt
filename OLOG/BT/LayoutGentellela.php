<?php

namespace OLOG\BT;

use OLOG\BT;use OLOG\ConfWrapper;use OLOG\Sanitize;

class LayoutGentellela
{
    const LAYOUT_CODE_GENTELLELA = 'LAYOUT_CODE_GENTELLELA';
    
static public function render($content_html, $action_obj = null){
$breadcrumbs_arr = [];
$h1_str = '';
    $menu_arr = [];

if ($action_obj){
    if ($action_obj instanceof InterfaceBreadcrumbs){
        $breadcrumbs_arr = $action_obj->currentBreadcrumbsArr();
    }

    if ($action_obj instanceof InterfacePageTitle){
        $h1_str = $action_obj->currentPageTitle();
    }

    /*
    if ($action_obj instanceof InterfaceMenu){
        $menu_arr = $action_obj->currentMenuArr();
    }
    */



    $menu_classes_arr = ConfWrapper::value('php-bt.menu_classes_arr', []); // TODO: key name to constant
    if ($menu_classes_arr){
        foreach ($menu_classes_arr as $menu_class){
            if (in_array(InterfaceMenu::class, class_implements($menu_class))){
                $menu_arr = array_merge($menu_arr, $menu_class::menuArr());
            }
        }
    }
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!--<link href="/bower_components/gentelella/production/css/custom.css" rel="stylesheet">-->
    <?php GentellelaCustomCssTemplate::render(); ?>

    <!--<link href="/bower_components/gentelella/production/fonts/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet">

    <!--<link href="/bower_components/gentelella/production/css/animate.min.css" rel="stylesheet">-->

    <!-- Custom styling plus plugins -->
    <!--<link href="/bower_components/gentelella/production/css/icheck/flat/green.css" rel="stylesheet">-->
    <!-- editor -->
    <!--<link href="/bower_components/gentelella/production/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">-->
    <!--<link href="/bower_components/gentelella/production/css/editor/index.css" rel="stylesheet">-->
    <!-- select2 -->
    <!--<link href="/bower_components/gentelella/production/css/select/select2.min.css" rel="stylesheet">-->
    <!-- switchery -->
    <!--<link rel="/bower_components/gentelella/production/stylesheet" href="css/switchery/switchery.min.ss" />-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
    <!-- oLog: later <script src="../assets/js/ie8-responsive-file-warning.js"></script>-->
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>APPLICATION</span></a>
                </div>
                <div class="clearfix"></div>


                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="/bower_components/gentelella/production/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <!--
                            <li><a href="/"><i class="fa fa-home"></i> Главная</a>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Студенты <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#">Список</a>
                                    </li>
                                    <li><a href="#">Поиск</a>
                                    </li>
                                    <li><a href="#">Без регистрации</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Группы <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#">Список</a>
                                    </li>
                                </ul>
                            </li>
                            -->
                            <?php

                            /** @var $menu_item_obj MenuItem */
                            foreach ($menu_arr as $menu_item_obj) {
                                $children_arr = $menu_item_obj->getChildrenArr();

                                $chevron = '';
                                if (count($children_arr)) {
                                    $chevron = ' <span class="fa fa-chevron-down"></span>';
                                }

                                echo '<li>';

                                if ($menu_item_obj->getUrl()) {
                                    echo '<a href="' . Sanitize::sanitizeUrl($menu_item_obj->getUrl()) . '">';
                                } else {
                                    echo '<a>';
                                }

                                echo '<i class="fa fa-home"></i> ' . Sanitize::sanitizeTagContent($menu_item_obj->getText()) . $chevron . '</a>';
                                if (count($children_arr)) {
                                    echo '<ul class="nav child_menu" style="display: none">';
                                    /** @var  $child_menu_item_obj MenuItem */
                                    foreach ($children_arr as $child_menu_item_obj) {

                                        echo '<li><a href="' . Sanitize::sanitizeUrl($child_menu_item_obj->getUrl()) . '">' . Sanitize::sanitizeTagContent($child_menu_item_obj->getText()) . '</a></li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="/bower_components/gentelella/production/images/img.jpg" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="/bower_components/gentelella/production/images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <?php
            if (!empty($breadcrumbs_arr)){
                echo BT::breadcrumbs($breadcrumbs_arr);
            }
            ?>
            <div class="page-title">
                <div class="title_left">
                    <h3><?= $h1_str ?></h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <!--
                        <div class="x_title">
                            <h2>Form Design <small>different form elements</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        -->
                        <div class="x_content">
                            <?= $content_html ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                <span class="fa fa-github"></span> <a target="_blank" href="https://github.com/o-log">o-log</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<!-- full-height page -->
<!--<script src="/bower_components/gentelella/production/js/custom.js"></script>-->
<script>
    function countChecked(){"check_all"==check_state&&$(".bulk_action input[name='table_records']").iCheck("check"),"uncheck_all"==check_state&&$(".bulk_action input[name='table_records']").iCheck("uncheck");var t=$(".bulk_action input[name='table_records']:checked").length;t>0?($(".column-title").hide(),$(".bulk-actions").show(),$(".action-cnt").html(t+" Records Selected")):($(".column-title").show(),$(".bulk-actions").hide())}var URL=window.location,$BODY=$("body"),$MENU_TOGGLE=$("#menu_toggle"),$SIDEBAR_MENU=$("#sidebar-menu"),$SIDEBAR_FOOTER=$(".sidebar-footer"),$LEFT_COL=$(".left_col"),$RIGHT_COL=$(".right_col"),$NAV_MENU=$(".nav_menu"),$FOOTER=$("footer");if($(function(){var t=function(){$RIGHT_COL.css("min-height",$(window).height());var t=$BODY.height(),e=$LEFT_COL.eq(1).height()+$SIDEBAR_FOOTER.height(),n=e>t?e:t;n-=$NAV_MENU.height()+$FOOTER.height(),$RIGHT_COL.css("min-height",n)};$SIDEBAR_MENU.find("a").on("click",function(e){var n=$(this).parent();n.is(".active")?(n.removeClass("active"),$("ul:first",n).slideUp(function(){t()})):(n.parent().is(".child_menu")||($SIDEBAR_MENU.find("li").removeClass("active"),$SIDEBAR_MENU.find("li ul").slideUp()),n.addClass("active"),$("ul:first",n).slideDown(function(){t()}))}),$MENU_TOGGLE.on("click",function(){$BODY.hasClass("nav-md")?($BODY.removeClass("nav-md").addClass("nav-sm"),$LEFT_COL.removeClass("scroll-view").removeAttr("style"),$SIDEBAR_MENU.find("li").hasClass("active")&&$SIDEBAR_MENU.find("li.active").addClass("active-sm").removeClass("active")):($BODY.removeClass("nav-sm").addClass("nav-md"),$SIDEBAR_MENU.find("li").hasClass("active-sm")&&$SIDEBAR_MENU.find("li.active-sm").addClass("active").removeClass("active-sm")),t()}),$SIDEBAR_MENU.find('a[href="'+URL+'"]').parent("li").addClass("current-page"),$SIDEBAR_MENU.find("a").filter(function(){return this.href==URL}).parent("li").addClass("current-page").parents("ul").slideDown(function(){t()}).parent().addClass("active"),$(window).smartresize(function(){t()})}),$(function(){$(".collapse-link").on("click",function(){var t=$(this).closest(".x_panel"),e=$(this).find("i"),n=t.find(".x_content");t.attr("style")?n.slideToggle(200,function(){t.removeAttr("style")}):(n.slideToggle(200),t.css("height","auto")),e.toggleClass("fa-chevron-up fa-chevron-down")}),$(".close-link").click(function(){var t=$(this).closest(".x_panel");t.remove()})}),$(function(){$('[data-toggle="tooltip"]').tooltip()}),$(".progress .progress-bar")[0]&&$(".progress .progress-bar").progressbar(),$(".js-switch")[0]){var elems=Array.prototype.slice.call(document.querySelectorAll(".js-switch"));elems.forEach(function(t){new Switchery(t,{color:"#26B99A"})})}$("input.flat")[0]&&$(document).ready(function(){$("input.flat").iCheck({checkboxClass:"icheckbox_flat-green",radioClass:"iradio_flat-green"})});var __slice=[].slice;!function(t,e){var n;return n=function(){function e(e,n){var i,s,a,r=this;this.options=t.extend({},this.defaults,n),this.$el=e,a=this.defaults;for(i in a)s=a[i],null!==this.$el.data(i)&&(this.options[i]=this.$el.data(i));this.createStars(),this.syncRating(),this.$el.on("mouseover.starrr","span",function(t){return r.syncRating(r.$el.find("span").index(t.currentTarget)+1)}),this.$el.on("mouseout.starrr",function(){return r.syncRating()}),this.$el.on("click.starrr","span",function(t){return r.setRating(r.$el.find("span").index(t.currentTarget)+1)}),this.$el.on("starrr:change",this.options.change)}return e.prototype.defaults={rating:void 0,numStars:5,change:function(t,e){}},e.prototype.createStars=function(){var t,e,n;for(n=[],t=1,e=this.options.numStars;e>=1?e>=t:t>=e;e>=1?t++:t--)n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));return n},e.prototype.setRating=function(t){return this.options.rating===t&&(t=void 0),this.options.rating=t,this.syncRating(),this.$el.trigger("starrr:change",t)},e.prototype.syncRating=function(t){var e,n,i,s;if(t||(t=this.options.rating),t)for(e=n=0,s=t-1;s>=0?s>=n:n>=s;e=s>=0?++n:--n)this.$el.find("span").eq(e).removeClass("glyphicon-star-empty").addClass("glyphicon-star");if(t&&5>t)for(e=i=t;4>=t?4>=i:i>=4;e=4>=t?++i:--i)this.$el.find("span").eq(e).removeClass("glyphicon-star").addClass("glyphicon-star-empty");return t?void 0:this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")},e}(),t.fn.extend({starrr:function(){var e,i;return i=arguments[0],e=2<=arguments.length?__slice.call(arguments,1):[],this.each(function(){var s;return s=t(this).data("star-rating"),s||t(this).data("star-rating",s=new n(t(this),i)),"string"==typeof i?s[i].apply(s,e):void 0})}})}(window.jQuery,window),$(function(){return $(".starrr").starrr()}),$(document).ready(function(){$("#stars").on("starrr:change",function(t,e){$("#count").html(e)}),$("#stars-existing").on("starrr:change",function(t,e){$("#count-existing").html(e)})}),$("table input").on("ifChecked",function(){check_state="",$(this).parent().parent().parent().addClass("selected"),countChecked()}),$("table input").on("ifUnchecked",function(){check_state="",$(this).parent().parent().parent().removeClass("selected"),countChecked()});var check_state="";$(".bulk_action input").on("ifChecked",function(){check_state="",$(this).parent().parent().parent().addClass("selected"),countChecked()}),$(".bulk_action input").on("ifUnchecked",function(){check_state="",$(this).parent().parent().parent().removeClass("selected"),countChecked()}),$(".bulk_action input#check-all").on("ifChecked",function(){check_state="check_all",countChecked()}),$(".bulk_action input#check-all").on("ifUnchecked",function(){check_state="uncheck_all",countChecked()}),$(function(){$(".expand").on("click",function(){$(this).next().slideToggle(200),$expand=$(this).find(">:first-child"),"+"==$expand.text()?$expand.text("-"):$expand.text("+")})}),"undefined"!=typeof NProgress&&($(document).ready(function(){NProgress.start()}),$(window).load(function(){NProgress.done()})),function(t,e){var n=function(t,e,n){var i;return function(){function s(){n||t.apply(a,r),i=null}var a=this,r=arguments;i?clearTimeout(i):n&&t.apply(a,r),i=setTimeout(s,e||100)}};jQuery.fn[e]=function(t){return t?this.bind("resize",n(t)):this.trigger(e)}}(jQuery,"smartresize");
</script>


</body>

</html>
<?php
}
}