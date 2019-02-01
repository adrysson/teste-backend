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

        $students = $this->Students;

        $this->set([
            'students' => $students,
            '_serialize' => ['students']
        ]);
    }

}
