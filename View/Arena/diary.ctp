<?php
$this->assign('title', 'Journal d\'events');
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">
        <?php
        if($this->Session->read('Auth.User'))
        {
            $this->assign('title', 'Journal d\'events');?>

            <div class='table-responsive'>
                <table class="table">
                    <caption>Evenements des 24h dernières heures</caption>
                    <thead>
                    <tr>
                        <th>Action</th>
                        <th>Date</th>
                        <th>Position en x</th>
                        <th>Position en y</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($raw as $events){
                        foreach($events as $event){
                            ?><tr><?php
                            foreach($event as $element){ ?>
                                <td><?php echo $element;?></td>
                            <?php } ?>
                            </tr>
                        <?php }
                    }?>
                    </tbody>
                </table>
            </div>
        <?php }
        else {
            echo "Veuillez vous connecter <br>";
            echo  $this->Html->link('Inscription',array('controller'=>'Users','action'=>'add'));
        }
        ?>
    </div>
</div>