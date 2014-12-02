<?php
$this->assign('title', 'Votre personnage');
if (!($this->Session->read('Auth.User'))) {
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 centered">
            <?php
            echo "Veuillez vous connecter <br>";
            echo $this->Html->link('Connection', array('controller' => 'Users', 'action' => 'login'));
            ?>
        </div>
    </div>
<?php
} else if (empty($fighter)) {
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
} else if ($fighter[0]['Fighter']['current_health'] == 0) {
    //Si le fighter n'as plus de vie
    echo "Votre personnage est mort!<br>";
    echo $this->Html->link("Creation d'un personnage", array('controller' => 'Arena', 'action' => 'createchar'));
} else {
?>
<!--1ER ROW -->
<div class="row">
    <!--Choix Avatar-->
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Choix de l'Avatar</h3>
            </div>
            
            <div class="panel-body">
                
            <?php
                echo $this->Form->create('avatar', array('type' => 'file'));
                echo $this->Form->input('image_avatar', array('type' => 'file', 'name' => 'avatar',array(
                    'label' => false,
                )));?>
                <div class="form-group">
                    <button type="submit" class="btn btn-default centeredIMG">Submit</button>
                </div>
                <?php echo $this->Form->end(); ?>
       
                <?php
                if (isset($imageName)) {
                    echo $this->Html->image('uploads/' . $imageName, array(
                        'class' => "img-responsive img-circle centeredIMG",
                        'alt' => 'uploaded image',
                        'id' => 'avatar',
                    ));
                }
                ?>
            </div>
        </div>
   </div>
   <div class="col-md-4">
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informations du perssonage</h3>
                </div>
                <div class="panel-body">
            <ul>
                <?php  foreach ($fighter as $raws) {
                    ?>
                    <li>Id du perssonage : <?php echo $raws['Fighter']['id']; ?>
                    <li>Nom du personage: <?php echo $raws['Fighter']['name']; ?></li>
                    <li>Coordonnée X: <?php echo $raws['Fighter']['coordinate_x']; ?></li>
                    <li>Coordonnée Y: <?php echo $raws['Fighter']['coordinate_y']; ?></li>
                    <li>Niveau: <?php echo $raws['Fighter']['level']; ?></li>
                    <li>Expérience: <?php echo $raws['Fighter']['xp']; ?></li>
                    <li>Compétence Vue: <?php echo $raws['Fighter']['skill_sight']; ?> </li>
                    <li>Compétence Force: <?php echo $raws['Fighter']['skill_strength']; ?></li>
                    <li>Points de vie: <?php echo $raws['Fighter']['skill_health']; ?></li>
                    <li>Vie actuelle: <?php echo $raws['Fighter']['current_health']; ?></li>
                <?php } ?> </ul>
            </div>
        </div>
    </div>

        <!--Changer de niveau-->
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-title">Augmenter son niveau</h3>
            </div>
            <div class="panel-body">
            <?php
            if ($choix_level != 0) {
                echo $this->Form->create('ChangeLevel');
                echo $this->Form->input('skill', array('options' => array(1 => 'Force', 2 => 'Vue', 3 => 'Santé'), 'div' => 'form-group', 'class' => 'form-control'));
                ?>
                <input type="submit" class="btn btn-danger" value="Level UP">
                <?php
                echo $this->Form->end();
            } else echo "Pas assez d'expérience pour changer de niveau";
            ?>

            </div>
        </div>
    </div>

</div>
    <?php
    }
    ?>
