<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Revision'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="revisions index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('model') ?></th>
            <th><?= $this->Paginator->sort('modelPrimaryKey') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($revisions as $revision): ?>
        <tr>
            <td><?= h($revision->id) ?></td>
            <td><?= h($revision->model) ?></td>
            <td><?= h($revision->modelPrimaryKey) ?></td>
            <td><?= h($revision->created) ?></td>
            <td><?= h($revision->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $revision->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $revision->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $revision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revision->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
