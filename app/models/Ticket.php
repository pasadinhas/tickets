<?php

class TicketDoesNotExistException extends Exception {}

class Ticket extends Eloquent {

    protected $table = 'tickets';

    protected $fillable = array('code', 'place_id');
    protected $guarded = array('id');

    public function place() {
        return $this->belongsTo('Place');
    }

    public function service() {
        return $this->hasOne('Service');
    }

}