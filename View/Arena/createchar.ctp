<?php

$this->assign('title', 'Création de personnage');

if (!($this->Session->read('Auth.User'))) {
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 centered">
            <?php
            echo "Veuillez vous connecter <br>";
            echo $this->Html->link('Inscription', array('controller' => 'Users', 'action' => 'add'));
            ?>
        </div>
    </div>
<?php
} else {
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 centered">

            <div class="col-sm-offset-2 col-sm-10">
                <h2 id="titre_page"><?php echo __('Nouveau personnage'); ?></h2>
            </div>
            <?php echo $this->Form->create('Createchar', array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                <?php echo $this->Form->input('create_name', array(
                    'label' => false,
                    'div' => array('class' => 'col-sm-10'),
                    'class' => 'form-control',
                    'placeholder' => 'Entrer le nom du personnage'
                )); 
                echo $this->Form->end();
                ?>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Créer</button>
                </div>
            </div>

        </div>
    </div>
<?php } ?>


