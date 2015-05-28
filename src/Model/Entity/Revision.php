<?php
namespace Revisions\Model\Entity;

use Cake\ORM\Entity;

/**
 * Revision Entity.
 */
class Revision extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'model' => true,
        'modelPrimaryKey' => true,
        'before_edit' => true,
        'after_edit' => true,
        'phinxlog' => true,
    ];
}
