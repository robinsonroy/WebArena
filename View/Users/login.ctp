
<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">

<div class="users form">
    <?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('login User'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Identification'));?>


   <h2>Mot de passe perdu ?</h2>
    <?php echo $this->Html->link('Mot de passe recover',array('controller'=>'users','action'=>'recover')); ?>


</div>
        </div>
    </div>