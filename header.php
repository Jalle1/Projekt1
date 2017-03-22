<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title><?php wp_title(); ?></title>
    <?php theme_scripts() ?>
    <?php wp_head(); ?>
</head>
<body>

<div id="wrap">

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-sm-6 text-left">
                    <a href="<?php bloginfo("url"); ?>" class="logo">
                        <?php if (get_field('logo', 'options')) { ?>
                            <style>
                                header .logo {
                                    background-image: url('<?php the_field ('logo' , 'options'); ?>');
                                    background-position: center center;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    display: block;
                                    line-height: 70px;
                                    height: 50px;
                                    width: 120px;
                                }
                            </style>
                        <?php } ?>
                    </a>
                    </div>
                     <div class="col-xs-4 text-right visible-xs">
                    <div class="mobile-menu-wrap">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
                

                <div class="col-sm-6 hidden-xs">
                    <ul class="menu">
                        <?php wp_nav_menu(array('menu' => 'Huvudmeny')); ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-search">
        <form id="searchform" class="searchform">
            <div>
                <?php get_search_form(); ?>
            </div>
        </form>
    </div>

    <nav id="nav">
        <div class="container">
            <div class="row">
                <div class="col-xs-8">
                    <ul class="breadcrumbs">
                        <?php breadcrumbs(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>