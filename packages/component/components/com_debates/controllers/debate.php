<?php

class ComDebatesControllerDebate extends ComTermsControllerTerm
{
    public function getRequest()
    {
        $this->_request->type = 'debate';

        return $this->_request;
    }
}
