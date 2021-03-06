<?php
/**
 * Created by PhpStorm.
 * User: ajith
 * Date: 5/1/17
 * Time: 8:32 PM
 */
namespace models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class Match_Update extends Eloquent
{

    public $timestamps = false;
    protected $table = 'matchupdate';
    protected $fillable = [

    ];

    public function __construct()
    {
        $this->tableObject = $this->getConnectionResolver()->connection()->table($this->table);
    }

    public function getCurrentMatch($date)
    {
        return $this->tableObject
            ->where('active','yes')->get();
    }

    public function matchStartTime($matchNo)
    {
        $result =  $this->tableObject
            ->where('matchno',$matchNo)->get();
        return json_decode(json_encode($result[0]),TRUE);
    }

    public function disableMatch($matchNo)
    {
        $data['active'] = 'no';
        return $this->tableObject
            ->where('matchno',$matchNo)->update($data);
    }
}