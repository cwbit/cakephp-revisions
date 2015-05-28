<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Revision'), ['action' => 'edit', $revision->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Revision'), ['action' => 'delete', $revision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revision->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Revisions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Revision'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="revisions view large-10 medium-9 columns">
    <h2><?= h($revision->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= h($revision->id) ?></p>
            <h6 class="subheader"><?= __('Model') ?></h6>
            <p><?= h($revision->model) ?></p>
            <h6 class="subheader"><?= __('ModelPrimaryKey') ?></h6>
            <p><?= h($revision->modelPrimaryKey) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($revision->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($revision->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Before Edit') ?></h6>
            <?= $this->Text->autoParagraph(h($revision->before_edit)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('After Edit') ?></h6>
            <?= $this->Text->autoParagraph(h($revision->after_edit)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Phinxlog') ?></h4>
    <?php if (!empty($revision->phinxlog)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Version') ?></th>
            <th><?= __('Start Time') ?></th>
            <th><?= __('End Time') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($revision->phinxlog as $phinxlog): ?>
        <tr>
            <td><?= h($phinxlog->version) ?></td>
            <td><?= h($phinxlog->start_time) ?></td>
            <td><?= h($phinxlog->end_time) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Phinxlog', 'action' => 'view', $phinxlog->]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Phinxlog', 'action' => 'edit', $phinxlog->]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phinxlog', 'action' => 'delete', $phinxlog->], ['confirm' => __('Are you sure you want to delete # {0}?', $phinxlog->)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
