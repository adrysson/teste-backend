<?php
namespace App\Controller\V1\Statistics;

use App\Controller\AppController;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 *
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{

    public function keep_studying()
    {
        $students = $this->Students->Answers->find('all', ['contain' => 'Students'])->count();

        $students_studying = $this->Students->Answers->find('all', [
            'contain' => 'Students',
            'conditions' => ['alternative_id' => 37],
        ])->count();

        $national = round($students_studying/$students*100, 4);

        $query = $this->Students->find('all');
        $regionals = $query
            ->select([
                'description' => 'regional',
                'average' => $query->func()->count('*')
            ])
            ->group(['regional'])
            ->formatResults(function (\Cake\Collection\CollectionInterface $results) {
                // iterando o resultado e calculando as médias por estado
                return $results->map(function ($row) {
                     $regional_studying = $this->Students->find('all', [
                            'conditions' => ['regional' => $row['description']],
                        ])
                        ->matching('Answers', function ($q) {
                            return $q->where(['Answers.alternative_id ' => 37]);
                        })->count();

                    $row['average'] = round($regional_studying/$row['average'] * 100, 4);

                    return $row;
                });
            });
        $this->set([
            'regionals' => $regionals,
            'national' => $national,
            '_serialize' => ['regionals', 'national'],
        ]);
    }

}
