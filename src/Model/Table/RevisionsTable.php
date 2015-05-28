<?php
namespace Revisions\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Revisions\Model\Entity\Revision;
use Cake\Database\Schema\Table as Schema;

/**
 * Revisions Model
 */
class RevisionsTable extends Table
{


    /**
     * Tell CakePHP to modify the data structure of the entity data types
     * @param  Schema $schema this table's schema
     * @return Schema the adjusted schema definition
     */
    protected function _initializeSchema(Schema $schema) {
        $schema->columnType('before_edit', 'json');
        $schema->columnType('after_edit', 'json');
        return $schema;
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('revisions');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Phinxlog', [
            'foreignKey' => 'revision_id',
            'targetForeignKey' => 'phinxlog_id',
            'joinTable' => 'revisions_phinxlog',
            'className' => 'Revisions.Phinxlog'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'uuid'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('model', 'create')
            ->notEmpty('model');
            
        $validator
            ->requirePresence('modelPrimaryKey', 'create')
            ->notEmpty('modelPrimaryKey');
            
        $validator
            ->requirePresence('before_edit', 'create')
            ->notEmpty('before_edit');
            
        $validator
            ->requirePresence('after_edit', 'create')
            ->notEmpty('after_edit');

        return $validator;
    }
}
