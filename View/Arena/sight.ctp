<?php

$this->assign('title', 'WebArena : Game'); ?>

<!--1ER ROW -->
<div class="row">

    <!--1-->
    <div class="col-md-3" >
        <div class="panel panel-default" id="gauche">
            <h3>Se déplacer</h3>
           <?php
           echo $this->Form->create('Fightermove');
           echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div'=>'form-group','class'=>'form-control','default' => 'east'));
           ?>
            <input type="submit" class="btn btn-danger" value="Go">
            <h3>Level UP</h3>
           <?php
           echo $this->Form->create('ChangeLevel');
           echo $this->Form->input('level',array('options' => array(1=>'level 1',2=>'level 2',3=>'level 3',4=>'level 4'),'div'=>'form-group','class'=>'form-control', 'default' => 'level 1'));
           ?>
            <input type="submit" class="btn btn-danger" value="Level UP">
            <h3>Infos personnages</h3>

           <?php
           echo $this->Form->end();
           ?>

            <!-- VU PERSONNAGE PAS BEAU -->
            <p> Nom :  <?php echo $Fighter['Fighter']['name']; ?> </br>
                CoordX : <?php echo $Fighter['Fighter']['coordinate_x'];  ?> </br>
                CoordY : <?php echo $Fighter['Fighter']['coordinate_y']; ?>

            </p>

        </div>

    </div>
    <div class="col-md-6" id="map">

        <table id="mob" class="table">
            <tr>
                <td> Monstre</td>
                <td> Position</td>
                <td> HP</td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>

        <table id="char" class="table">
            <tr>
         <?php foreach($Fighters as $fighter)
            { ?> <td> <?php
                echo $fighter['Fighter']['name'];?></td><td><?php
                ?>   x :<?php echo $fighter['Fighter']['coordinate_x']; ?>
                    y: <?php echo $fighter['Fighter']['coordinate_y'];?></td><td>
                    pv :<?php echo $fighter['Fighter']['current_health']; ?>
                </td><tr><?php
            } ?>
            </tr>
            <tr>
                <td> Perso2</td>
                <td> Lieu</td>
                <td> HP</td>
            </tr>
        </table>
        <table id="tools" class="table">
            <tr>Items</tr>
            <td> <?php ?> yo</td>
        </table>

        <!-- VU PERSONNAGE PAS BEAU -->
        Nom :    <?php echo $Fighter['Fighter']['name']; ?> </br>
        CoordX : <?php echo $Fighter['Fighter']['coordinate_x'];  ?> </br>
        CoordY : <?php echo $Fighter['Fighter']['coordinate_y']; ?>



    </div>

    <div class="col-md-3">
        <div class="panel panel-default" id="gauche">
        <?php echo $this->Form->create('Fighterattack');
            echo $this->Form->input('Votre ID',array('div'=>'form-group','class'=>'form-control'));
            echo $this->Form->input('EnnemiID',array('div'=>'form-group','class'=>'form-control'));
            echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div' => 'form-group','class'=>'form-control','default' => 'east'));

        ?>
            <input type="submit" class="btn btn-danger" value="Attack">
        <?php
                echo $this->Form->end(); // A REFAIRE NE FONCTIONNE PAS BIEN
        ?>
        </div>

    </div>


</div>

<div class ="row">
    <div class="col-md-3">

      <?php  var_dump($this->Session->read('Auth.User'));


      ?>
    </div>

    <div class ="col-md-6">
        <p> </p>
    </div>

    <div class ="col-md-3">
        <p>  </p>
    </div>


