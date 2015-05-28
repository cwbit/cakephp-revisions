<?

namespace Revisions\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;

class RevisionsBehavior extends Behavior{
	
	
	/**
	 * Use config to specify the Models you want to watch, and the fields you want to monitor
	 * @var array
	 */
	public $_config = [
		'watch' => [ .. ],	# (whitelist) only watch these fields
		'ignore' => [ .. ], # (blacklist) modifications to these fields will be ignored
	];

	/**
	 * Save the before and after state of the modified entity to the Revisions table.
	 * 
	 * @todo  clones the object because patchEntity modified entity itself (bug?)
	 * @param  Event  $event  [description]
	 * @param  Entity $entity [description]
	 * @return void
	 */
	public function afterSave( Event $event, Entity $entity){
		
		# rebuild the original entity
		$before = $this->_table->patchEntity($before = clone $entity, $before->extractOriginal($this->_table->schema()->columns()));

		# load the Revisions Model
		$this->Revisions = TableRegistry::get('Revisions.Revisions');

		# build the Revision record
		$r = $this->Revisions->newEntity([
			'model' => $this->_table->table(),
			'modelPrimaryKey' => $entity->get($this->_table->primaryKey()),
			'before_edit' => json_encode($before),
			'after_edit' => json_encode($entity),
			]);

		# and save it
		$this->Revisions->save($r);

	}	


}