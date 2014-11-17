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

$cakeDescription = __d('cake_dev', 'WebArena videogames');
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
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
        echo $this->Html->css('cake.generic');


    echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
<<<<<<< HEAD
            <?php echo $this->Html->link('Vision', array('controller' => 'Arena', 'action' => 'sight'));
                  echo " ";
                  echo $this->Html->link('Creation de personnage', array('controller' => 'Arena','action'=>'createchar'));
                  echo " ";
                  echo $this->Html->link('Vos personnages',array('controller'=>'Arena','action'=>'character'));
                  echo " ";
                  echo $this->Html->link('Evenements',array('controller'=>'Arena','action'=>'diary'));
                  echo " ";
                  echo $this->Html->link('Login',array('controller'=>'Arena','action'=>'login'));
                  echo " ";
                  echo $this->Html->link('Choisir avatar',array('controller'=>'Arena','action'=>'chooseAvatar'));
                  echo " ";
                  echo $this->Html->link('Accueil', "/");



            ?>
        </div>
=======
                        <?php echo $this->Html->link('Vision', array('controller' => 'Arenas', 'action' => 'sight')); ?>
		</div>
>>>>>>> 49dd7511f370a3a4a6ab76333334c4dd0c1b34d0
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
            
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
                   echo "WebArena : SI-4 | PORTIER,SAMBRES,RAOUL,ROY <br>";
                   echo "GitHub : https://github.com/robinsonroy/WebArena";
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
