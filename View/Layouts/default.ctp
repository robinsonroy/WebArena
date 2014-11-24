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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


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
	<div id="container" class="backcontainer">
		<div id="header">
			<h1 id="h1top"><a id="titrecolor" href="/">Ninja Arena</a></h1>



            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        </button>
                        <a class="navbar-brand" href="#">NinjaArena</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><?php echo $this->Html->link('Vision', array('controller' => 'Arena', 'action' => 'sight')); ?><span class="sr-only">(current)</span></a></li>
                            <li><?php echo $this->Html->link('Creation de personnage', array('controller' => 'Arena','action'=>'createchar')); ?></a></li>
                            <li><?php echo $this->Html->link('Vos personnages',array('controller'=>'Arena','action'=>'character')); ?></li>
                            <li><?php echo $this->Html->link('Evenements',array('controller'=>'Arena','action'=>'diary')); ?></li>
                            <li><?php echo $this->Html->link('Choisir avatar',array('controller'=>'Arena','action'=>'chooseAvatar'));                            ?></li>



                      <?php if($this->Session->read('Auth.User')){ ?>
                          <li><?php echo $this->Html->link('Mon compte',array('controller'=>'Arena','action'=>'account')); ?></li>

                          <li><?php echo $this->Html->link('Deconnexion',array('controller'=>'Users','action'=>'logout')); ?></li>
                      <?php }else{ ?>
                            <li><?php echo $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add')); ?></li>
                            <li><?php echo $this->Html->link('Identification',array('controller'=>'Users','action'=>'login')); ?></li>
                        <?php } ?>

                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

        </div>
		</div>
		<div id="content" class="backcontent">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
            
		<div id="footer">

            <footer class="footer">
                <div class="container">
                    <p class="text-muted">
                        <?php echo $this->Html->link(
                            $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                            'http://www.cakephp.org/',
                            array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
                        );
                        echo "WebArena : SI-4 | PORTIER,SAMBRES,RAOUL,ROY <br>";
                        echo "GitHub : https://github.com/robinsonroy/WebArena";
                        ?></p>
                </div>
            </footer>


			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
</body>
</html>
