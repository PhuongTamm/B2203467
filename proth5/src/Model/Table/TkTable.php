<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tk Model
 *
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\BelongsTo $Students
 *
 * @method \App\Model\Entity\Tk newEmptyEntity()
 * @method \App\Model\Entity\Tk newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tk> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tk get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tk findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tk patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tk> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tk|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tk saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tk>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tk> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tk>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tk>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tk> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TkTable extends Table
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

        $this->setTable('tk');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER',
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
            ->notEmptyString('id');

        $validator
            ->integer('student_id')
            ->notEmptyString('student_id');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 100)
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name');

        $validator
            ->decimal('cumulative_score')
            ->allowEmptyString('cumulative_score');

        $validator
            ->notEmptyString('courses_taken');

        $validator
            ->decimal('courses_counted')
            ->allowEmptyString('courses_counted');

        $validator
            ->decimal('total_credits')
            ->allowEmptyString('total_credits');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['student_id'], 'Students'), ['errorField' => 'student_id']);

        return $rules;
    }
}
