<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$bundle = yiister\gentelella\assets\Asset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>

<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <h2><?= Yii::$app->user->identity->username ?> is online</h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>&nbsp;</h3>
                        <br/>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Home", "url" => "/", "icon" => "home"],
                                    [
                                        'label' => "Configs", "url" => ["#"], "icon" => "files-o",
                                        'items' => [
                                            [
                                                'label' => Yii::t('menu', 'Config'),
                                                'url' => '/config',
                                                'icon' => 'bolt',
                                                'active' => in_array(Yii::$app->controller->id,['config']),
                                            ],
                                            [
                                                'label' => Yii::t('menu', 'Version'),
                                                'url' => '/version',
                                                'icon' =>   'bar-chart',
                                                'active' => in_array(Yii::$app->controller->id,['version']),
                                            ],
                                        ],
                                    ],
                                    [
                                        'label' => Yii::t('menu', 'System'), 'url' => '#', 'icon' => 'cogs',
                                        'items' => [
                                            ['label' => Yii::t('menu', 'Manage users'), 'url' => ['/user/admin/index'],],
                                            ['label' => Yii::t('menu', 'Manage assignment'), 'url' => ['/admin/assignment'],],
                                            ['label' => Yii::t('menu', 'Manage role'), 'url' => ['/admin/role'],],
                                            //['label' => Yii::t('menu', 'Manage permission'), 'url' => ['/admin/permission'],],
                                            ['label' => Yii::t('menu', 'Manage Route'), 'url' => ['/admin/route'],],
                                            //['label' => Yii::t('menu', 'Manage Rule'), 'url' => ['/admin/rule'],],
                                        ],
                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

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
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="http://placehold.it/128x128" alt=""><?= Yii::$app->user->identity->username ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a>
                                </li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
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
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Developer by <a href="http://thinhnguyen.cf" rel="nofollow" target="_blank">Hữu Thịnh</a><br />
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a><br />
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
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>

