<?php

class ServiceDoesNotExistException extends Exception {}

class Service extends Eloquent {

    protected $table = 'services';

    protected $fillable = array('employee', 'ticket_id');
    protected $guarded = array('id');

    public function ticket() {
        return $this->belongsTo('Ticket');
    }

    public function getDates() {
        return array('created_at', 'updated_at', 'deleted_at', 'finished_at');
    }

    public function finish() {
        $this->finished_at = time();
    }

}