<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'NinjaArena');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>

    <!-- Latest compiled and minified CSS -->
    <?php echo $this->Html->css('bootstrap.min.css') ?>

    <!-- Optional theme -->
    <?php echo $this->Html->css('bootstrap-theme.min.css') ?>


    <?php
    echo $this->Html->css('webarena');

    echo $this->Html->meta('icon');
    //  echo $this->Html->css('cake.generic');


    echo $this->fetch('meta');
    echo $this->fetch('css');
    //   echo $this->Html->script('bootstrap.min');
    //		echo $this->fetch('script');

    ?>
</head>
<body>

<!-- Wrap all page content here -->
<div id="wrap">
    <h1 id="h1top"><a id="titrecolor" href="/">Ninja Arena</a></h1>
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Acceuil</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><?php echo $this->Html->link('Vision', array('controller' => 'Arena', 'action' => 'sight')); ?></li>
                <li><?php echo $this->Html->link('Creation de personnage', array('controller' => 'Arena', 'action' => 'createchar')); ?></a></li>
                <li><?php echo $this->Html->link('Vos personnages', array('controller' => 'Arena', 'action' => 'character')); ?></li>
                <li><?php echo $this->Html->link('Evenements', array('controller' => 'Arena', 'action' => 'diary')); ?></li>
                <li><?php echo $this->Html->link('Choisir avatar', array('controller' => 'Arena', 'action' => 'chooseAvatar')); ?></li>
                <li><?php echo $this->Html->link('Chat', array('controller' => 'Arena', 'action' => 'chat')); ?></li>



                <?php if ($this->Session->read('Auth.User')) { ?>
                    <li><?php echo $this->Html->link('Mon compte', array('controller' => 'Arena', 'action' => 'account')); ?></li>
                    <li><?php echo $this->Html->link('Deconnexion', array('controller' => 'Users', 'action' => 'logout')); ?></li>
                <?php } else { ?>
                    <li><?php echo $this->Html->link('Inscription', array('controller' => 'Users', 'action' => 'add')); ?></li>
                    <li><?php echo $this->Html->link('Identification', array('controller' => 'Users', 'action' => 'login')); ?></li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- ICI LE form pour se connecter -->
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

    <!-- Begin page content -->
    <div id="content" class="backcontent">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
</div><!-- Wrap Div end -->

<div id="footer">
        <p>WebArena : SI4-08-CF | PORTIER, SAMBRES, RAUBER, ROY </p>
        <p>
            <a href="https://github.com/robinsonroy/WebArena">Repo GitHub |</a>
            <a href="http://c6244f3fcd.url-de-test.ws/Arena/character">Site en ligne</a>
        </p>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php echo $this->Html->script('bootstrap.min');?>
</body>
</html>
