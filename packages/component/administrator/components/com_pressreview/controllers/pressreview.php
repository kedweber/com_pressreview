<?php

class ComPressreviewControllerPressreview extends ComArticlesControllerArticle
{
    public function getRequest()
    {
        $this->_request->type            = 'pressreview';
        $this->_request->cck_fieldset_id = 102;

        return $this->_request;
    }
}
