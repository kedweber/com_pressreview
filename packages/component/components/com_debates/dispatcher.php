<?php

class ComDebatesDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'controller' => 'debate'
        ));

        parent::_initialize($config);
    }
}
