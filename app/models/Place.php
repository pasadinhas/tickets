<?php

class Place extends Eloquent {

    protected $table = 'places';

    protected $fillable = array('name', 'acronym');
    protected $guarded = array('id');

    public function tickets() {
        return $this->hasMany('Ticket');
    }

    public function currentTicket() {
        return $this->counter;
    }

    public function requestTicket() {
        $this->tickets++;
        return $this->tickets;
    }

    public function hasWaitingTickets() {
        return $this->counter < $this->tickets;
    }

    public function nextTicket() {
        if ($this->hasWaitingTickets()) {
            $this->counter++;
            return $this->counter;
        }
        return false;
    }
}