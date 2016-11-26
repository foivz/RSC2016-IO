<?php

class Answer extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=false)
     */
    public $answer;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $question;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('question', 'Question', 'id', ['alias' => 'Question']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'answer';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Answer[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Answer
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
