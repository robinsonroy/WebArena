<div class="row">
    <div class="col-md-6 col-md-offset-3 centered">

    <div class="users form">
    <?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Ajouter User'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Ajouter'));?>
</div>
        </div>
    </div>