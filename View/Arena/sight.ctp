<?php

if (!($this->Session->read('Auth.User')))
{
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
}
else if (empty($Fighter))
{
    echo "Vous n'avez pas de perssonnage<br> Creez en un!<br>";
    echo $this->Html->link("Creation d'un personnage", array('controller' => 'Arena', 'action' => 'createchar'));
}
else {


$this->assign('title', 'WebArena : Game'); ?>

<!--1ER ROW -->
<div class="row">

    <!--1-->
    <div class="col-md-3">
        <div class="panel panel-default" id="gauche">
            <h3>Se déplacer</h3>
            <?php
            echo $this->Form->create('Fightermove');
            echo $this->Form->input('direction', array('options' => array('north' => 'north', 'east' => 'east', 'south' => 'south', 'west' => 'west'), 'div' => 'form-group', 'class' => 'form-control', 'default' => 'east'));

            ?>
            <input type="submit" class="btn btn-danger" value="Go">
            <?php
            echo $this->Form->end();
            if (!$action_possible['action_possible'])
                echo "Pas assez de points d'actions!";
            ?>

            <!--PA-->
            <h3>Points d'Actions</h3>
            <?php
            echo $action_possible['PA'];
            ?>

            <h3>Level UP</h3>
            <?php
            echo $this->Form->create('ChangeLevel');
            echo $this->Form->input('level', array('options' => array(1 => 'level 1', 2 => 'level 2', 3 => 'level 3', 4 => 'level 4'), 'div' => 'form-group', 'class' => 'form-control', 'default' => 'level 1'));
            ?>
            <input type="submit" class="btn btn-danger" value="Level UP">

            <h3>Infos personnages</h3>

            <?php
            echo $this->Form->end();
            ?>

            <!-- Info personnages -->
            <?php
            foreach ($Fighter as $Fight) {
                ?>   Nom : <?php     echo $Fight['Fighter']['name'];
                ?> </br>
                PV :    <?php echo $Fight['Fighter']['current_health']; ?> </br>
                CoordX : <?php echo $Fight['Fighter']['coordinate_x']; ?> </br>
                CoordY : <?php echo $Fight['Fighter']['coordinate_y']; ?></br>
                XP :     <?php echo $Fight['Fighter']['xp']; ?><?php } ?>
            <!-- VU PERSONNAGE PAS BEAU -->


        </div>

    </div>

    <!--C'EST LE BORDEL LA DEDANS-->
    <div class="col-md-6" id="map">

        <table id="char" class="table">
            <th> Entités</th>
            <th> CoordXY</th>
            <th> Point de vie</th>
            <tr>
                <?php
                // Fighters vide ?
                foreach ($Fighters as $fighter)
                {
                ?>
                <td> <?php
                    echo $fighter['Fighter']['name'];?></td>
                <td><?php
                    ?>   x :<?php echo $fighter['Fighter']['coordinate_x']; ?>
                    y: <?php echo $fighter['Fighter']['coordinate_y']; ?></td>
                <td>
                    pv :<?php echo $fighter['Fighter']['current_health']; ?>
                </td>
            <tr><?php
                }
                pr($action_possible);?>
            </tr>

            <!--Jvais recup les donné de tout -->
            <?php //pr($charAll); ?>
            <table id="mapmap" class="table">
                <?php

                for ($y = 15; $y > 0; $y--) {
                    echo "<tr>";
                    for ($i = 1; $i <= 15; $i++) {

                        echo "<td>";
                        echo $this->Html->image($map[$i - 1][$y - 1], array('class' => "img-responsive", 'alt' => 'uploaded image', 'height' => 15, 'width' => 15));
                        echo "</td>";


                    }
                    echo "</tr>";
                }
                ?>
            </table>


            <table id="char" class="table">
                <th>Type</th>
                <th>CoordXY</th>
                <th>Bonus</th>

                <table id="char" class="table">
                    <tr>
                        <?php foreach ($Tools as $tool)
                        {
                        ?>
                        <td> <?php
                            echo $tool['Tool']['type'];?></td>
                        <td><?php
                            ?>  x :<?php echo $tool['Tool']['coordinate_x']; ?>
                            y: <?php echo $tool['Tool']['coordinate_y']; ?></td>
                        <td>
                            Bonus :<?php echo $tool['Tool']['bonus']; ?>
                        </td>
                    <tr><?php
                        } ?>
                    </tr>

                </table>
            </table>

    </div>

    <div class="col-md-3">
        <div class="panel panel-default" id="gauche">
            <h3>Attaque</h3>
            <?php echo $this->Form->create('Fighterattack');
            echo $this->Form->input('EnnemiID', array('div' => 'form-group', 'class' => 'form-control'));
            echo $this->Form->input('direction', array('options' => array('north' => 'north', 'east' => 'east', 'south' => 'south', 'west' => 'west'), 'div' => 'form-group', 'class' => 'form-control', 'default' => 'east'));

            ?>
            <input type="submit" class="btn btn-danger" value="Attack">
            <?php
            echo $this->Form->end(); // A REFAIRE NE FONCTIONNE PAS BIEN
            //Si pas assez de PA
            if (!$action_possible['action_possible'])
                echo "Pas assez de points d'actions!";
            ?>
        </div>

    </div>


</div>

<div class="row">
    <div class="col-md-3">


    </div>

    <div class="col-md-6">
        <p> <?php  var_dump($this->Session->read('Auth.User'));
} ?>

