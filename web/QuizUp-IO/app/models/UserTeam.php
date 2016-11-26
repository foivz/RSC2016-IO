<?php

class UserTeam extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $user;

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
     * @Column(type="integer", length=1, nullable=false)
     */
    public $is_leader;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user', 'User', 'id', ['alias' => 'User']);
        $this->belongsTo('team', 'Team', 'id', ['alias' => 'Team']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user_team';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserTeam[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserTeam
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
