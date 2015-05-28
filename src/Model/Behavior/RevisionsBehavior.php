<?

namespace Revisions\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;

class RevisionsBehavior extends Behavior{
	
	// private $_before = null;

	public $_config = [
		'Model' => [
			# fields
		],
	];

	public function afterSave( Event $event, Entity $entity){
		# rebuild the original entity
		$before = $this->_table->newEntity($entity->extractOriginal($this->_table->schema()->columns()));

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