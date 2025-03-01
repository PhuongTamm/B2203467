<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Major $major
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Major'), ['action' => 'edit', $major->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Major'), ['action' => 'delete', $major->id], ['confirm' => __('Are you sure you want to delete # {0}?', $major->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Majors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Major'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="majors view content">
            <h3><?= h($major->name_major) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name Major') ?></th>
                    <td><?= h($major->name_major) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($major->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Students') ?></h4>
                <?php if (!empty($major->students)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Fullname') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Birthday') ?></th>
                            <th><?= __('Reg Date') ?></th>
                            <th><?= __('Major Id') ?></th>
                            <th><?= __('Password') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($major->students as $student) : ?>
                        <tr>
                            <td><?= h($student->id) ?></td>
                            <td><?= h($student->fullname) ?></td>
                            <td><?= h($student->email) ?></td>
                            <td><?= h($student->Birthday) ?></td>
                            <td><?= h($student->reg_date) ?></td>
                            <td><?= h($student->major_id) ?></td>
                            <td><?= h($student->password) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $student->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $student->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Students', 'action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>