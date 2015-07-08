<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<div class="row-fluid">
    <form action="" method="get" class="-koowa-grid" data-toolbar=".toolbar-list">
        <div class="btn-toolbar" id="filter-bar">
            <div class="filter-search btn-group pull-left">
                <input type="text" value="<?= $state->search; ?>" placeholder="Search" id="filter_search" name="search" style="margin-bottom: 0;">
            </div>
            <div class="btn-group pull-left hidden-phone">
                <button title="" class="btn hasTooltip" type="submit" data-original-title="Search"><i class="icon-search"></i></button>
                <button onclick="document.id('filter_search').value='';this.form.submit();" title="" class="btn hasTooltip" type="button" data-original-title="Clear"><i class="icon-remove"></i></button>
            </div>

<!--            --><?//= @helper('com://admin/makundi.template.helper.listbox.categories', array(
//                'identifier' => 'com://admin/makundi.model.categories',
//                'prompt' => '- ' . JText::_('Filter by category') . ' -',
//                'check_access' => true,
//                'name' => 'category_id',
//                'attribs' => array(
//                    'id' => 'category_id',
//                    'onchange' => 'this.form.submit();',
//                    'style' => 'margin-left: 5px; font-size: 13px;'
//                ),
//            )); ?>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center;" width="1">
                    <?= @helper('grid.checkall')?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'title', 'title' => @text('TITLE'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'topic', 'title' => @text('TOPIC'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'enabled', 'title' => @text('PUBLISHED'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'featured', 'title' => @text('FEATURED'))); ?>
                </th>
                <? if($debates->isTranslatable()) : ?>
                    <th>
                        <?= @text('Translations') ?>
                    </th>
                <? endif; ?>
                <th>
                    <?= @text('Owner'); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'created_on', 'title' => @text('Date'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'ordering', 'title' => @text('ORDER'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'id', 'title' => @text('ID'))); ?>
                </th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="10">
                    <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <? foreach ($debates as $debate) : ?>
                <tr>
                    <td style="text-align: center;">
                        <?= @helper('grid.checkbox', array('row' => $debate))?>
                    </td>
                    <td>
                        <a href="<?= @route('view=debate&id='.$debate->id); ?>">
                            <?= @escape($debate->title); ?>
                        </a>
                    </td>
                    <td>
                        <?= $debate->topic->title ? $debate->topic->title : @text('UNCATEGORIZED'); ?>
                    </td>
                    <td>
                        <?= @helper('grid.enable', array('row' => $debate)); ?>
                    </td>
                    <td>
                        <?= @helper('grid.enable', array('row' => $debate, 'field' => 'featured')); ?>
                    </td>
                    <? if($debate->isTranslatable()) : ?>
                        <td>
                            <?= @helper('com://admin/translations.template.helper.language.translations', array(
                                'row' => $debate->id,
                                'table' => $debate->getTable()->getName()
                            )); ?>
                        </td>
                    <? endif; ?>
                    <td>
                        <?= $debate->created_by_name; ?>
                    </td>
                    <td>
                        <?= @helper('date.humanize', array('date' => $debate->created_on)) ?>
                    </td>
                    <td>
                        <?= @helper('grid.order', array('row' => $debate, 'total' => $total)); ?>
                    </td>
                    <td>
                        <?= $debate->id; ?>
                    </td>
                </tr>
            <? endforeach; ?>

            <? if (!count($debates)) : ?>
                <tr>
                    <td colspan="9" align="center" style="text-align: center;">
                        <?= @text('ARTICLES_NO_ITEMS') ?>
                    </td>
                </tr>
            <? endif; ?>
            </tbody>
        </table>
    </form>
</div>
