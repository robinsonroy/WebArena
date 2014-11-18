<?php $this->assign('title', 'WebArena : Game'); ?>


<div class="row">

    <div class="col-md-3">
       <div class="panel panel-default">
           <?php
           echo $this->Form->create('Fightermove');
           echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div'=>'form-group','class'=>'form-control','default' => 'east'));
           ?>
           <input type="submit" class="btn btn-danger" value="Go">
           <?php
           echo $this->Form->end();
            ?>
       </div>

    </div>
    <div class="col-md-6">
        <div class="panel panel-default">

     <?php pr($raw);?>

        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
        <?php echo $this->Form->create('Fighterattack');
            echo $this->Form->input('Votre ID',array('div'=>'form-group','class'=>'form-control'));
            echo $this->Form->input('direction',array('options' => array('north'=>'north','east'=>'east','south'=>'south','west'=>'west'),'div' => 'form-group','class'=>'form-control','default' => 'east'));
            echo $this->Form->input('Ennemi ID',array('div'=>'form-group','class'=>'form-control'));
        ?>
        <input type="submit" class="btn btn-danger" value="Go">
        <?php
                echo $this->Form->end(); // A REFAIRE NE FONCTIONNE PAS
        ?>
        </div>

    </div>


</div>
<?php

//FORM CHANGELEVEL
echo $this->Form->create('ChangeLevel');
echo $this->Form->input('level',array('options' => array(1=>'level 1',2=>'level 2',3=>'level 3',4=>'level 4'), 'default' => 'level 1'));
echo $this->Form->end('Change level');
?>