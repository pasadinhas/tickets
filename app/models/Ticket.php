<?php

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

    public static function getNextCode($place_id) {
        $ticket = Ticket::where('place_id', $place_id)->orderBy('created_at', 'desc')->first();
        if ($ticket == null) {
            return '000';
        } else {
            return sprintf('%03d', ((int) $ticket->code) + 1);
        }
    }

}