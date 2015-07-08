<?php

class ComPressreviewControllerToolbarMenubar extends ComDefaultControllerToolbarMenubar
{
    public function getCommands()
    {
        $name = $this->getController()->getIdentifier()->name;

        $this->addCommand('Press Review', array(
            'href'   => JRoute::_('index.php?option=com_pressreview&view=pressreviews'),
            'active' => ($name == 'pressreview')
        ));

        $this->addCommand('Organisations', array(
            'href'   => JRoute::_('index.php?option=com_pressreview&view=organisations'),
            'active' => ($name == 'organisation')
        ));

        return parent::getCommands();
    }
}
