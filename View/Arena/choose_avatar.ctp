<?php

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

    $this->assign('title', 'Choix avatar');


    echo $this->Form->create('avatar', array('type' => 'file'));
    echo $this->Form->input('avatar_image', array('type' => 'file', 'name' => 'avatar'));
//echo $this->Form->end('Submit');
//echo $this->Form->create('Fighterchoice');
    echo $this->Form->input('fighter_choice', array('options' => $fighterList));
    echo $this->Form->end('Choose');

//image dsplay
    if (isset($imageName)) {
        echo $this->Html->image('uploads/' . $imageName, array('alt' => 'uploaded image'));

    }
}
?>



