<?php
/**
* @package   yoo_peak
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">
<div class="<?php echo $this['config']->get('$vertical_nav_classes'); ?>">
    <?php if ($this['widgets']->count('sidebar-main + sidebar-menu + sidebar-logo')) : ?>
    <div class="tm-sidebar uk-visible-large">

        <?php if ($this['widgets']->count('sidebar-logo')) : ?>
        <a class="tm-sidebar-logo" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('sidebar-logo'); ?></a>
        <?php endif; ?>

        <?php if ($this['widgets']->count('sidebar-menu')) : ?>
        <nav class="tm-sidebar-nav">
            <?php echo $this['widgets']->render('sidebar-menu'); ?>
        </nav>
        <?php endif; ?>

        <?php echo $this['widgets']->render('sidebar-main'); ?>

        <i class="tm-toggle-icon"></i>

    </div>
    <?php endif; ?>

    <div class="tm-page">

        <div class="uk-container uk-container-center">

            <?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
            <div class="tm-toolbar uk-clearfix uk-hidden-small">

                <?php if ($this['widgets']->count('toolbar-l')) : ?>
                <div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
                <?php endif; ?>

                <?php if ($this['widgets']->count('toolbar-r')) : ?>
                <div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
                <?php endif; ?>

            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('logo + search + headerbar')) : ?>
            <div class="tm-block <?php echo $this['config']->get('block.headerbar.block_divider'); ?>">
                <div class="tm-headerbar uk-clearfix uk-visible-large">

                    <?php if ($this['widgets']->count('logo')) : ?>
                    <a class="tm-logo" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
                    <?php endif; ?>

                    <?php if ($this['widgets']->count('search')) : ?>
                    <div class="tm-search uk-float-right">
                        <?php echo $this['widgets']->render('search'); ?>
                    </div>
                    <?php endif; ?>

                    <?php echo $this['widgets']->render('headerbar'); ?>

                </div>

                <?php if ($this['widgets']->count('offcanvas')) : ?>
                <a href="#offcanvas" class="uk-navbar-toggle uk-navbar-flip uk-hidden-large" data-uk-offcanvas></a>
                <?php endif; ?>

                <?php if ($this['widgets']->count('logo-small')) : ?>
                <a class="tm-logo-small uk-hidden-large" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a>
                <?php endif; ?>

            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('menu')) : ?>
            <nav class="tm-block tm-navbar uk-navbar">
                <?php echo $this['widgets']->render('menu'); ?>
            </nav>
            <?php endif; ?>

            <?php if ($this['widgets']->count('top-a')) : ?>
            <div class="tm-block <?php echo $this['config']->get('block.top-a.block_divider'); ?>">
                <section class="<?php echo $grid_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></section>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('top-b')) : ?>
            <div class="tm-block <?php echo $this['config']->get('block.top-b.block_divider'); ?>">
                <section class="<?php echo $grid_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></section>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('top-c')) : ?>
            <div class="tm-block <?php echo $this['config']->get('block.top-c.block_divider'); ?>">
                <section class="<?php echo $grid_classes['top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?></section>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
            <div class="tm-block <?php echo $this['config']->get('block.main.block_divider'); ?>">
                <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

                    <?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
                    <div class="<?php echo $columns['main']['class'] ?>">

                        <?php if ($this['widgets']->count('main-top')) : ?>
                        <section class="<?php echo $grid_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
                        <?php endif; ?>

                        <?php if ($this['config']->get('system_output', true)) : ?>
                        <main class="tm-content">

                            <?php if ($this['widgets']->count('breadcrumbs')) : ?>
                            <?php echo $this['widgets']->render('breadcrumbs'); ?>
                            <?php endif; ?>

                            <?php echo $this['template']->render('content'); ?>

                        </main>
                        <?php endif; ?>

                        <?php if ($this['widgets']->count('main-bottom')) : ?>
                        <div class="tm-block <?php echo $this['config']->get('block.main-bottom.block_divider'); ?>">
                            <section class="<?php echo $grid_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
                        </div>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>

                    <?php foreach($columns as $name => &$column) : ?>
                    <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
                    <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
                    <?php endif ?>
                    <?php endforeach ?>

                </div>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('bottom-a')) : ?>
            <div class="tm-block <?php echo $this['config']->get('block.bottom-a.block_divider'); ?>">
                <section class="<?php echo $grid_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></section>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('bottom-b')) : ?>
            <div class="tm-block <?php echo $this['config']->get('block.bottom-b.block_divider'); ?>">
                <section class="<?php echo $grid_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?></section>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
            <div class="tm-block <?php echo $this['config']->get('block.footer.block_divider'); ?>">
                <footer class="tm-footer">

                    <?php
                        echo $this['widgets']->render('footer');
                        $this->output('warp_branding');
                        echo $this['widgets']->render('debug');
                    ?>

                    <?php if ($this['config']->get('totop_scroller', true)) : ?>
                    <a class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
                    <?php endif; ?>

                </footer>
            </div>
            <?php endif; ?>

            <?php echo $this->render('footer'); ?>

            <?php if ($this['widgets']->count('offcanvas')) : ?>
            <div id="offcanvas" class="uk-offcanvas">
                <div class="uk-offcanvas-bar uk-offcanvas-bar-flip"><?php echo $this['widgets']->render('offcanvas'); ?></div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>