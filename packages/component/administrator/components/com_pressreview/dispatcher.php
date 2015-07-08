<?php

class ComPressreviewDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'controller' => 'pressreview'
        ));

        parent::_initialize($config);
    }
}
