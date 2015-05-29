<br/>
<div id="RevisionsIndexCompareDataListDiv" class="revisions index large-10 medium-9 columns">
	<br/>
	<div>
		<a href="#" onclick="event.preventDefault();
				hideElement('RevisionsIndexCompareDataListDiv');
				showElement('RevisionsIndexCompareDataTableDiv');">Show as Table</a>
	</div>
    <table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>Created</th>
				<th>Modified</th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
    <?php foreach ($revisions as $revision): ?>
		<?php
			if(empty($firstId)){
				$firstId = $revision->id;
			}
		?>
			<tr>
				<td><?= h($revision->created) ?></td>
				<td><?= h($revision->modified) ?></td>
				<td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $revision->id]) ?>
					<a href="#" onclick="event.preventDefault();
							compareRevisions('<?=$revision->id?>', '<?=$firstId?>');">Compare</a>
				</td>
			</tr>

    <?php endforeach; ?>
		</tbody>
    </table>
</div><br/>
<div id="RevisionsIndexCompareDataTableDiv" style="display: none;" class="revisions index large-10 medium-9 columns">
	<div>
		<a href="#" onclick="event.preventDefault();
				showElement('RevisionsIndexCompareDataListDiv');
				hideElement('RevisionsIndexCompareDataTableDiv');">Show as List</a>
	</div>
    <table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<?php foreach($revisions[0]["before_edit"] as $key => $value): ?>
				<th><?=$key?></th>
				<?php endforeach; ?>
				<th class="actions"></th>
			</tr>
		</thead>
		<tbody>
    <?php foreach ($revisions as $revision): ?>
			<tr>
				<?php foreach($revision["before_edit"] as $value): ?>
				<td><?=$value;?></td>
				<?php endforeach; ?>
				<td><a href="#" onclick="event.preventDefault();restoreToBefore('<?=$revision["id"]?>');">Restore</a></td>
			</tr>
    <?php endforeach; ?>
		</tbody>
    </table>
</div>
