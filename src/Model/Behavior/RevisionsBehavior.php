<?

namespace Revisions\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Behavior;

class RevisionsBehavior extends Behavior{
	
	public $_config = [
		'Model' => [
			# fields
		],
	];

	public function afterSave( Event $event, Entity $entity)
	{

		debug($entity);

	}	

}