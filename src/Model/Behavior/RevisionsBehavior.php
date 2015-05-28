<?

namespace Revisions\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Behavior;

class RevisionsBehavior extends Behavior{
	
	// private $_before = null;

	public $_config = [
		'Model' => [
			# fields
		],
	];

	// public function beforeSave(Event $event, Entity $entity){
	// 	$this->_before = $entity->jsonSerialize();
	// }

	public function afterSave( Event $event, Entity $entity){
		$before = $this->_table->patchEntity($entity, $entity->extractOriginal($entity->_accessible));

		debug($before);
		debug($entity);
	}	

}