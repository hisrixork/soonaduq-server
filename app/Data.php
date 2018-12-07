<?php
/**
 * Created by PhpStorm.
 * User: sofianeakbly
 * Date: 18/07/2018
 * Time: 14:35
 */

namespace App;


use Illuminate\Support\Collection;

class Data
{

    private $data;

    public function __construct($fields = null)
    {
        $this->data = new Collection();
        foreach ($fields as $name => $field) {
            $this->data[$name] = $field;
        }
    }

    public function getData()
    {
        return json_decode($this->data->toJson());
    }
}