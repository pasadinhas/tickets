<?php

class PlaceController extends BaseController {

    public function getRequestTicketForPlace($place_id) {
        $p = Place::find($place_id);
        $t = $p->requestTicket();
        $p->save();
        return $p;
    }

    public function getPlace($place_id) {
        $p = Place::find($place_id);
        return $p;
    }

    public function getNextTicketForPlace($place_id) {
        $p = Place::find($place_id);
        $t = $p->nextTicket();
        $p->save();
        return $p;
    }

    public function getHasWaitingTickets($place_id) {
        $p = Place::find($place_id);
        return $p->hasWaitingTickets();
    }
}