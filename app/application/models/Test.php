<?php

class Test extends Illuminate\Database\Eloquent\Model {

    protected $table = 'test';
    protected $primaryKey = 'id';

    // protected $softDelete = false;

    protected $softDelete = false;
    public $timestamps = false;

}
