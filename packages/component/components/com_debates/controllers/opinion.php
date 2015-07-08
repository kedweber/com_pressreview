<?php

class ComDebatesControllerOpinion extends ComArticlesControllerArticle
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'model' => 'com://admin/articles.model.articles',
        ));

        parent::_initialize($config);
    }

    public function getRequest()
    {
        $this->_request->cck_fieldset_id = 2000;

        return $this->_request;
    }
}
