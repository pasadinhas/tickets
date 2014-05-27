<?php

class Service extends Eloquent {

    protected $table = 'services';

    protected $fillable = array('ticket', 'employee', 'place_id', 'start_time', 'end_time');
    protected $guarded = array('id');

    public function begin() {
        $this->start_time = now();
    }

    public function end() {
        $this->end_time = now();
    }

}