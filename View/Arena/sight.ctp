<!DOCTYPE html>

<?php
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
} else if (empty($Fighter)) {
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
} else {
    $this->assign('title', 'WebArena : Game'); ?>
    <!--1ER ROW -->
    <div class="row">
        <!--1-->
        <div class="col-md-3">
            <div class="panel panel-default gauche" >
                <h3>Se déplacer</h3>
                <?php
                echo $this->Form->create('Fightermove');
                echo $this->Form->input('direction', array('options' => array('north' => 'north', 'east' => 'east', 'south' => 'south', 'west' => 'west'), 'div' => 'form-group', 'class' => 'form-control', 'default' => 'east'));
                ?>
                <input type="submit" class="btn btn-danger" value="Go">
                <?php
                echo $this->Form->end();
                ?>
                <!--PA-->
                <h3>Points d'Actions</h3>
                <?php
                // ICI LA MODIF DES PA.
                echo $action_possible['PA'];
                ?>
            </div>
            <div class="bs-callout bs-callout-info">
                <!-- Info personnages -->
                <p>Nom : <?php echo $Fighter[0]['Fighter']['name']; ?> </p>
                <p>PV : <?php echo $Fighter[0]['Fighter']['current_health']; ?> </p>
                <p>CoordX : <?php echo $Fighter[0]['Fighter']['coordinate_x']; ?> </p>
                <p>CoordY : <?php echo $Fighter[0]['Fighter']['coordinate_y']; ?></p>
                <p>XP : <?php echo $Fighter[0]['Fighter']['xp']; ?></p>
                <!-- VU PERSONNAGE PAS BEAU -->
            </div>
        </div>
        <!--C'EST LE BORDEL LA DEDANS-->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="char" class="table">
                        <tr>
                            <th> Entités</th>
                        <th> CoordXY</th>
                        <th> Point de vie</th>
                        </tr>
                        
                            <?php
                            // Fighters vide ?
                            foreach ($persVisibles as $fighter)
                            {
                            if ($fighter['coordinate_x'] < $Fighter[0]['Fighter']['coordinate_x'] + $Fighter[0]['Fighter']['skill_sight'] + 1
                            && $fighter['coordinate_x'] > $Fighter[0]['Fighter']['coordinate_x'] - $Fighter[0]['Fighter']['skill_sight'] - 1
                            && $fighter['coordinate_y'] < $Fighter[0]['Fighter']['coordinate_y'] + $Fighter[0]['Fighter']['skill_sight'] + 1
                            && $fighter['coordinate_y'] > $Fighter[0]['Fighter']['coordinate_y'] - $Fighter[0]['Fighter']['skill_sight'] - 1
                            )
                            {
                            ?>
                            <tr> 
                                <td> <?php echo $fighter['name']; ?> </td>
                                <td> <?php?> x : <?php echo $fighter['coordinate_x']; ?> 
                                    y: <?php echo $fighter['coordinate_y']; ?></td>
                                <td> pv :<?php echo $fighter['current_health']; ?> </td>
                            </tr>
                            <?php
                            }
                            }
                            ?>
                        
                    </table>
                        <!--Jvais recup les donné de tout -->
                        <?php //pr($charAll); ?>
                        <table id="mapmap" class="table">
                            <?php
                            for ($y = 10; $y > 0; $y--) {
                                echo "<tr>";
                                for ($i = 1; $i <= 15; $i++) {
                                    echo "<td>";
                                    echo $this->Html->image($map[$i - 1][$y - 1], array('class' => "img-responsive", 'alt' => 'uploaded image', 'height' => 15, 'width' => 20));
                                    echo "</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default gauche">
                <h3>Attaque</h3>
                <?php echo $this->Form->create('Fighterattack');
                echo $this->Form->input('direction', array('options' => array('north' => 'north', 'east' => 'east', 'south' => 'south', 'west' => 'west'), 'div' => 'form-group', 'class' => 'form-control', 'default' => 'east'));
                ?>
                <input type="submit" class="btn btn-danger" value="Attack">
                <?php
                echo $this->Form->end(); // A REFAIRE NE FONCTIONNE PAS BIEN
                ?>
            </div>
            <div class="panel panel-default gauche" >
                <h3>Message</h3>
                <?php
                foreach ($message as $line) {
                    if (isset($line)){
                ?>
                <div class="alert alert-danger" role="alert"><?php echo $line; ?></div>
                  <?php  }
                } ?>
            </div>
        </div>
    </div>
<?php
} ?>