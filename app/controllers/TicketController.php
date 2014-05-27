<?php

class TicketController extends BaseController {

    public function getTickets($place_id) {
        return Place::find($place_id)->tickets;
    }

    public function getTicketsForPlace($place_id) {
        return Ticket::where('place_id', $place_id)->get();
    }

    public function getNextTicketForPlace($place_id) {
        $place = Place::find($place_id);
        if (!$place) throw new PlaceDoesNotExistException($place_id);
        $ticket = new Ticket();
        $ticket->place_id = $place_id;
        $ticket->code = Ticket::getNextCode($place->tickets->last());
        $ticket->save();
        return $ticket;
    }

    public function getNewTicket($place_id) {
        $t = new Ticket();
        $t->place_id = $place_id;
        $t->code = Ticket::getNextCode($place_id);
        $t->save();
        return $t;
    }

}