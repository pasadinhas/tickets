<?php

class PlaceDoesNotExistException extends Exception {}

class Place extends Eloquent {

    protected $table = 'places';

    protected $fillable = array('name', 'acronym');
    protected $guarded = array('id');

    public function tickets() {
        return $this->hasMany('Ticket');
    }

    public function users() {
        return $this->hasMany('User');
    }

}