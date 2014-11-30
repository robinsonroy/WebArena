<?php
$this->assign('title', 'Ecran mort');
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">
        <h1> Vous etes mort! <h1>
        <h3> <?php echo $message; ?> </h3>
        <?php echo $this->Html->link("Creation d'un personnage", array('controller' => 'Arena', 'action' => 'createchar')); ?>
    </div>
</div>