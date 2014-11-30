<?php

if(!($this->Session->read('Auth.User')))
{
    //Si l'utilisateur n'est pas enregistré
    echo "Veuillez vous connecter <br>";
    echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));
    
            ?> <div class="row">
            <div class="col-md-6 col-md-offset-3 centered">
            <?php
            echo "Veuillez vous connecter <br>";
            echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));
            ?>
            </div>
            </div> 
<?php
}
else if(empty($Fighter))
{
    echo "Vous n'avez pas de perssonnage<br> Creez en un !<br>";
    echo  $this->Html->link("Creation d'un personnage",array('controller'=>'Arena','action'=>'createchar'));
}
else {


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
           <?php
           echo $this->Form->end();
           if(!$action_possible['action_possible'])
                    echo "Pas assez de points d'actions!";
           ?>

            <!--PA-->
            <h3>Points d'Actions</h3>
            <?php
            echo $action_possible['PA'];
            ?>
        </div>
            <div>
            <!-- Info personnages -->
<?php

        ?>   Nom : <?php     echo $Fighter[0]['Fighter']['name'];
    ?> </br>
            PV :    <?php echo $Fighter[0]['Fighter']['current_health'];?> </br>
            CoordX : <?php echo $Fighter[0]['Fighter']['coordinate_x'];?> </br>
            CoordY : <?php echo $Fighter[0]['Fighter']['coordinate_y'];?></br>
            XP :     <?php echo $Fighter[0]['Fighter']['xp']; ?>
            <!-- VU PERSONNAGE PAS BEAU -->


        </div>

    </div>

    <!--C'EST LE BORDEL LA DEDANS-->
    <div class="col-md-6"    id="map">

        <table id="char" class="table">
            <th> Entités</th>
            <th> CoordXY</th>
            <th> Point de vie</th>
            <tr>
         <?php
         // Fighters vide ?
         foreach($persVisibles as $fighter)
            {
             if ($fighter['coordinate_x'] < $Fighter[0]['Fighter']['coordinate_x'] + $Fighter[0]['Fighter']['skill_sight'] + 1 
                            && $fighter['coordinate_x'] > $Fighter[0]['Fighter']['coordinate_x'] - $Fighter[0]['Fighter']['skill_sight'] - 1 
                            && $fighter['coordinate_y'] < $Fighter[0]['Fighter']['coordinate_y'] + $Fighter[0]['Fighter']['skill_sight'] + 1 
                            && $fighter['coordinate_y'] > $Fighter[0]['Fighter']['coordinate_y'] - $Fighter[0]['Fighter']['skill_sight'] - 1
                    )
             {
                ?> <td> <?php
                   echo $fighter['name'];?></td><td><?php
                   ?>   x :<?php echo $fighter['coordinate_x']; ?>
                       y: <?php echo $fighter['coordinate_y'];?></td><td>
                       pv :<?php echo $fighter['current_health']; ?>
                   </td><tr>
            <?php
            }
            }
            ?>
            </tr>

            <!--Jvais recup les donné de tout -->
        <?php  //pr($charAll); ?>
            <table id="mapmap" class="table">
            <?php
            
            for($y=15;$y>0;$y--)
            {
                echo "<tr>";
                for ($i=1;$i<=15;$i++)
                {
                    
                    echo "<td>";
                    echo $this->Html->image($map[$i-1][$y-1], array('class' => "img-responsive", 'alt' => 'uploaded image', 'height' => 15,'width' =>15));
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
                <?php foreach($Tools as $tool)
                { ?> <td> <?php
                    echo $tool['Tool']['type'];?></td><td><?php
                    ?>  x :<?php echo $tool['Tool']['coordinate_x']; ?>
                            y: <?php echo $tool['Tool']['coordinate_y'];?></td><td>
                            Bonus :<?php echo $tool['Tool']['bonus']; ?>
                        </td><tr><?php
                } ?>
                    </tr>

                </table>
            </table>

    </div>

    <div class="col-md-3">
        <div class="panel panel-default" id="gauche">
            <h3>Attaque</h3>
        <?php echo $this->Form->create('Fighterattack');
            echo $this->Form->input('EnnemiID',array('div'=>'form-group','class'=>'form-control'));
            echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div' => 'form-group','class'=>'form-control','default' => 'east'));

        ?>
            <input type="submit" class="btn btn-danger" value="Attack">
        <?php
                echo $this->Form->end(); // A REFAIRE NE FONCTIONNE PAS BIEN
                //Si pas assez de PA
                if(!$action_possible['action_possible'])
                    echo "Pas assez de points d'actions!";
        ?>
        </div>

    </div>


</div>

<div class ="row">
    <div class="col-md-3">


    </div>

    <div class ="col-md-6">
        <p> <?php  var_dump($this->Session->read('Auth.User'));
        }

        ?> </p></div></div>
    </div>
    <div class ="col-md-6">
        <p> </p>
    </div>

    <div class ="col-md-3">
        <p>  </p>
    </div>


