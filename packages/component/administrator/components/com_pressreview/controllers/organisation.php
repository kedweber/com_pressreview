<?php

class ComPressreviewControllerOrganisation extends ComArticlesControllerArticle
{
    public function getRequest()
    {
        $this->_request->type            = 'organisation';
        $this->_request->cck_fieldset_id = 105;

        return $this->_request;
    }
}
