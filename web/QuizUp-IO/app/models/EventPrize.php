<?php

class EventPrize extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $event;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $prize;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('event', 'Event', 'id', ['alias' => 'Event']);
        $this->belongsTo('prize', 'Prize', 'id', ['alias' => 'Prize']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'event_prize';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return EventPrize[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return EventPrize
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
