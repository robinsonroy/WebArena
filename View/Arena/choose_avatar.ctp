<?php


if (!($this->Session->read('Auth.User'))) {
    $this->assign('title', 'Connectez vous!');?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 centered">
            <?php
            echo "Veuillez vous connecter <br>";
            echo $this->Html->link('Inscription', array('controller' => 'Users', 'action' => 'add'));
            ?>
        </div>
    </div>
<?php
} else if (empty($Fighter))
{
    $this->assign('title', 'Choix avatar');
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 centered">
            <?php
            echo "Vous n'avez pas de perssonnage<br>";
            echo $this->Html->link("Creation d'un personnage", array('controller' => 'Arena', 'action' => 'createchar'));
            ?>
        </div>
    </div>
<?php
}else {
    $this->assign('title', 'Choix avatar'); ?>
    <div class="col-md-6 col-md-offset-3 centered">
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <?php echo $this->Form->create('avatar', array('type' => 'file'));
            echo $this->Form->input('avatar_image', array('type' => 'file', array(
                'label' => false
            )
            )); ?>
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <?php
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
    </div>




