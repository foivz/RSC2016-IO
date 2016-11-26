<?php

class Participants extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $team;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $event;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('team', 'Team', 'id', ['alias' => 'Team']);
        $this->belongsTo('event', 'Event', 'id', ['alias' => 'Event']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'participants';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Participants[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Participants
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
