<div class="row">
    <div class="col-md-3">
        <?php echo $this->Form->create('Message');?>
        <form role="form">
            <div class="form-group">
                <?php echo $this->Form->input('fighterName', $options = array(
                        'class' => 'form-control',
                        'placeholder' => 'Enter fighter',
                        'label' => array('text' => 'Nom du Fighter :')
                    )
                ); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Message.message', $options = array(
                    'class' => 'form-control',
                    'row' => '3',
                    'type' => 'textarea',
                    'label' => array(
                        'text' => 'Message :'
                )
                )); ?>
            </div>
            <?php echo $this->Form->end('Envoyer',$otions = array(
                'class' => 'btn',
                'class' => 'btn-default',
                'type' => 'submit')
            );?>
        </form>
    </div>
</div>