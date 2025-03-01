<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Majors Model
 *
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\HasMany $Students
 *
 * @method \App\Model\Entity\Major newEmptyEntity()
 * @method \App\Model\Entity\Major newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Major> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Major get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Major findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Major patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Major> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Major|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Major saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Major>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Major>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Major>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Major> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Major>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Major>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Major>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Major> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MajorsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('majors');
        $this->setDisplayField('name_major');
        $this->setPrimaryKey('id');

        $this->hasMany('Students', [
            'foreignKey' => 'major_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name_major')
            ->maxLength('name_major', 30)
            ->requirePresence('name_major', 'create')
            ->notEmptyString('name_major');

        return $validator;
    }
}
