<div id="GroupsAdminIndex">
    <h2><?php echo __('Groups', true); ?></h2>
    <div class="btn-group">
        <?php if ($parentId > 0): ?>
            <?php echo $this->Html->link(__('Upper level', true), array('action' => 'index', $upperLevelId), array('class' => 'btn btn-default')); ?>
        <?php endif; ?>
        <?php echo $this->Html->link('新增', array('action' => 'add', $parentId), array('class' => 'btn btn-default dialogControl')); ?>
        <?php echo $this->Html->link(__('Members', true), array('controller' => 'members'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link(__('Group Permissions', true), array('controller' => 'group_permissions'), array('class' => 'btn btn-default')); ?>
    </div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="GroupsAdminIndexTable">
        <tr>
            <th><?php echo $this->Paginator->sort(__('Id', true), 'id'); ?></th>
            <th><?php echo $this->Paginator->sort(__('Name', true), 'name'); ?></th>
            <th class="actions">操作</th>
        </tr>
        <?php
        $i = 0;
        foreach ($groups as $group):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td>
                    <?php echo $group['Group']['id']; ?>
                </td>
                <td>
                    <?php echo $group['Group']['name']; ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link('編輯', array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                    <?php echo $this->Html->link('刪除', array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-default'), '確定刪除？'); ?>
                    <?php echo $this->Html->link(__('Sub group', true), array('action' => 'index', $group['Group']['id']), array('class' => 'btn btn-default')); ?>
                    <?php
                    if ($group['Group']['id'] != 1) {
                        echo $this->Html->link(__('Permission', true), array('controller' => 'group_permissions', 'action' => 'group', $group['Group']['id']), array('class' => 'btn btn-default'));
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="GroupsAdminIndexPanel"></div>
    <?php
    echo $this->Html->scriptBlock('
$(function() {
    $(\'#GroupsAdminIndexTable th a, #GroupsAdminIndex div.paging a\').click(function() {
        $(\'#GroupsAdminIndex\').parent().load(this.href);
        return false;
    });
});
');
    ?>
</div>
