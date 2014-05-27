<?php

class TicketController extends BaseController {

    public function getTickets($place_id) {
        return Place::find($place_id)->tickets;
    }

    public function getNewTicket($place_id) {
        $t = new Ticket();
        $t->place_id = $place_id;
        $t->code = Ticket::getNextCode($place_id);
        $t->save();
        return $t;
    }

}