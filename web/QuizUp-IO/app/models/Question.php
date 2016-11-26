<?php

class Question extends \Phalcon\Mvc\Model
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
     * @Column(type="string", nullable=false)
     */
    public $text;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=false)
     */
    public $time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $category;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $type;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Answer', 'question', ['alias' => 'Answer']);
        $this->hasMany('id', 'EventQuestion', 'question', ['alias' => 'EventQuestion']);
        $this->belongsTo('category', 'Category', 'id', ['alias' => 'Category']);
        $this->belongsTo('type', 'QuestionType', 'id', ['alias' => 'QuestionType']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'question';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Question[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Question
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
