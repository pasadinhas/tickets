<?php

class Service extends Eloquent {

    protected $table = 'services';

    protected $fillable = array('employee', 'ticket_id');
    protected $guarded = array('id');

    public function ticket() {
        return $this->belongsTo('Ticket');
    }

    public function begin() {
        $this->start_time = now();
    }

    public function end() {
        $this->end_time = now();
    }

}