<?php
App::uses('AppModel', 'Model');
/**
 * Journal Model
 *
 * @property Usage $Usage
 */
class Journal extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'usage_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'balance' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usage' => array(
			'className' => 'Usage',
			'foreignKey' => 'usage_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /*
     * $this(JournalModel)のレコードを日付が新しい順に並べ、その最初のレコードのbalanceカラムのデータを返す
     */
    /*
    public function getLastBalance(){
        $lastCreated = $this->find('first', array(
            'order' => array('date' => 'desc')
        ));
        return $lastCreated['Journal']['balance'];
    }
    */
    public function update($data){
        $date = $data['Journal']['date'];
        $requestDate = $date['year'] . '-' . $date['month'] . '-' .$date['day']
            . ' ' . $date['hour'] . ':' . $date['min'];
        // find the date of current journal
        $currentJournal = $this->find('first', array(
            'conditions' => array('Journal.id = ' => $data['Journal']['id'])
        ));
        $dateToUpdate = $currentJournal['Journal']['date'];
        if(strtotime($currentJournal['Journal']['date']) > strtotime($requestDate) ){
            $dateToUpdate = $requestDate;
        }
        // save only the record
        $result = $this->save($data);
        if($result == false){
            return false;
        }
        // update all of related record
        $result = $this->updateNewBalance($dateToUpdate);
        return $result;
    }
    public function getPreviousBalance($date){
        $dateString = $date['year'] . '-' . $date['month'] . '-' .$date['day']
            . ' ' . $date['hour'] . ':' . $date['min'];
        $previous = $this->find('first', array(
            'conditions' => array('date < ' => $dateString),
            'order' => array('date' => 'desc')
        ));
        if(count($previous) == 0){
            return 0;
        }
        //$this->log('getPreviousBalance:' . $previous['Journal'], 'debug');
        return $previous['Journal']['balance'];
    }
    public function updateNewBalance($date, $id = null){
        // find all of Journals which is newer than $date
        $newJournals = $this->find('all', array(
            'conditions' => array('date >= ' => $date),
            'order' => array('date' => 'asc')
        ));
        // if there's no record, return false
        if(count($newJournals) == 0){
            $this->log('not need to update:', 'debug');
            return false;
        }
        // update the balance
        for($i = 1; $i < count($newJournals); $i++){
            $journal = $newJournals[$i]['Journal'];
            $balance = $newJournals[$i-1]['Journal']['balance'] + $journal['deposit'] - $journal['payment'];
            $newJournals[$i]['Journal']['balance'] = $balance;
        }
        // return the result
        return $this->saveAll($newJournals);
    }
}
