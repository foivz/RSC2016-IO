<?php

class Event extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $moderator;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=false)
     */
    public $location;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $date;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $rules;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'EventPrize', 'event', ['alias' => 'EventPrize']);
        $this->hasMany('id', 'EventQuestion', 'event', ['alias' => 'EventQuestion']);
        $this->hasMany('id', 'Participants', 'event', ['alias' => 'Participants']);
        $this->belongsTo('moderator', 'User', 'id', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'event';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Event[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Event
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
