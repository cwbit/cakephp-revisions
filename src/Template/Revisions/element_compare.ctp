<div class="revisions index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0" style="width: 100%;">
		<thead>
			<tr>
				<th>Field<br/>&nbsp;</th>
				<th>Before<br/><a href="#" onclick="event.preventDefault();restoreToBefore('<?=$revisionA->id?>');">Restore</a></th>
				<th>After<br/><a href="#" onclick="event.preventDefault();restoreToAfter('<?=$revisionA->id?>');">Restore</a></th>
				<th>Current<br/>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($revisionB->after_edit as $key => $value): ?>
			<tr>
				<td><?=$key?></td>
				<td style="background-color: <?=($revisionA->before_edit[$key]!=$value?'#AAAAFF':'');?>"><?=$revisionA->before_edit[$key]?></td>
				<td style="background-color: <?=($revisionA->after_edit[$key]!=$value?'#AAAAFF':'');?>"><?=$revisionA->after_edit[$key]?></td>
				<td><?=$value?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
    </table>
</div>