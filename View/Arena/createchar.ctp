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
            <h1>Creation d'un personnage</h1>
            <?php

            echo $this->Form->create('Createchar');
            echo $this->Form->input('create_name');

            echo $this->Form->end('Create'); ?>
        </div>
    </div>
<?php } ?>