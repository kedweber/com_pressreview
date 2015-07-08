<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
    <input type="hidden" name="type" value="organisation" />
    <input type="hidden" name="cck_fieldset_id" value="<?= $state->cck_fieldset_id; ?>" />

    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <legend><?= @text('CONTENT'); ?></legend>
                <div class="form-inline form-inline-header row-fluid">
                    <div class="span7">
                        <input type="text" name="title" class="input-block-level input-large-text" value="<?= $organisation->title; ?>" placeholder="<?= @text('UNTITLED_ORGANISATION'); ?>" required>
                    </div>

                    <div class="span5">
                        <div class="row-fluid">
                            <div class="span2">
                                <div class="control-label" style="vertical-align: sub;"><label><?= @text('SLUG_LABEL'); ?></label></div>
                            </div>
                            <div class="span9">
                                <input type="text" class="input-block-level" name="slug" value="<?= $organisation->slug; ?>" placeholder="<?= @text('SLUG_PLACEHOLDER'); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <br />

                <div class="control-group">
                    <label class="control-label"><?= @text('SUBTITLE'); ?></label>
                    <div class="controls">
                        <input class="span12" type="text" name="subtitle" value="<?= @escape($organisation->subtitle); ?>" placeholder="<?= @text('SUBTITLE'); ?>" />
                    </div>
                </div>

                <hr />

                <?= @service('com://admin/cck.controller.element')->cck_fieldset_id($state->cck_fieldset_id)->row($organisation->id)->table('articles_articles')->getView()->assign('row', $organisation)->layout('list')->display(); ?>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset>
                <legend><?= @text('DETAILS'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('START_PUBLISHING'); ?></label>
                    <div class="controls">
                        <?= @helper('behavior.calendar', array('date' => $organisation->publish_up === '0000-00-00' ? date('Y-m-d') : $organisation->publish_up, 'name' => 'publish_up', 'format'  => '%Y-%m-%d')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('END_PUBLISHING'); ?></label>
                    <div class="controls">
                        <?= @helper('behavior.calendar', array('date' => $organisation->publish_down, 'name' => 'publish_down', 'format'  => '%Y-%m-%d')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('PUBLISHED'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $organisation->enabled)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Translated'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'translated', 'selected' => $organisation->translated)); ?>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('META'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('DESCRIPTION'); ?></label>
                    <div class="controls">
                        <textarea name="meta_description"><?= $organisation->meta_description; ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('KEYWORDS'); ?></label>
                    <div class="controls">
                        <textarea name="meta_keywords"><?= $organisation->meta_keywords; ?></textarea>
                    </div>
                </div>
            </fieldset>

            <!--            <fieldset>-->
            <!--                <legend>--><?//= @text('RELATIONS'); ?><!--</legend>-->
            <!--                <div class="control-group">-->
            <!--                    <label class="control-label">--><?//= @text('CATEGORY'); ?><!--</label>-->
            <!---->
            <!--                    <div class="controls">-->
            <!--                        --><?//= @helper('com://admin/makundi.template.helper.listbox.categories', array(
            //                            'value' => 'id',
            //                            'deselect' => true,
            //                            'check_access' => true,
            //                            'name' => 'category',
            //                            'attribs' => array('id' => 'parent_id'),
            //                            'selected' => $organisation->category->id,
            //                            'filter' => array('type' => 'category')
            //                        )); ?>
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="control-group">-->
            <!--                    <label class="control-label">--><?//= @text('TAGS'); ?><!--</label>-->
            <!--                    <div class="controls">-->
            <!--                        --><?//= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
            //                            'identifier' => 'com://admin/terms.model.tags',
            //                            'name' => 'tags[]',
            //                            'deselect' => false,
            //                            'selected' => $organisation->tags ? $organisation->tags->getColumn('id') : array(),
            //                            'attribs' => array('multiple' => true, 'size' => 10, 'data-placeholder' => @text('Select tags&hellip;')),
            //                            'type' => 'tag',
            //                            'relation' => 'ancestors'
            //                        )); ?>
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </fieldset>-->
        </div>
    </div>
</form>
