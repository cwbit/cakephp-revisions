<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $revision->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $revision->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Revisions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="revisions form large-10 medium-9 columns">
    <?= $this->Form->create($revision) ?>
    <fieldset>
        <legend><?= __('Edit Revision') ?></legend>
        <?php
            echo $this->Form->input('model');
            echo $this->Form->input('modelPrimaryKey');
            echo $this->Form->input('before_edit');
            echo $this->Form->input('after_edit');
            echo $this->Form->input('phinxlog._ids', ['options' => $phinxlog]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
