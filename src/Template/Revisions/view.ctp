<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Revision'), ['action' => 'edit', $revision->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Revision'), ['action' => 'delete', $revision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revision->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Revisions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Revision'), ['action' => 'add']) ?> </li>
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
            <?= pj($revision->before_edit); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('After Edit') ?></h6>
            <?= pj($revision->after_edit); ?>
        </div>
    </div>
</div>