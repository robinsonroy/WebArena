<?php

pr($id); 

echo $this->Form->create('Image', array('type' => 'file'));
echo $this->Form->input('avatar_image',array('type'=>'file', 'name' => 'avatar'));
echo $this->Form->end('Submit');


//image dsplay
if(isset($imageName))
{
    echo $this->Html-> image(WWW_ROOT.'img\\upload\\'.$imageName, array('alt' => 'uploaded image'));
    echo WWW_ROOT.'img\\upload\\'.$imageName;
}
?>



