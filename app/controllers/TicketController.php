<?php

class TicketController extends BaseController {

    public function getTickets($place_id) {
        return Place::find($place_id)->tickets;
    }

    public function getTicketsForPlace($place_id) {
        return Ticket::where('place_id', $place_id)->get();
    }

    public function getTicketsWaitingForPlace($place_id) {
        return Ticket::where('place_id', $place_id)
            ->has('service', false)
            ->get();
    }

    public function getNextTicketForPlace($place_id) {
        $ticket = Ticket::where('place_id', $place_id)
            ->has('service', false)
            ->orderBy('created_at', 'asc')
            ->first();
        $service = new Service();
        $service->ticket_id = $ticket->id;
        // FIXME: employee id
        $service->employee = 'ist1yyyyy';
        $service->save();
        return $ticket->with('service');
    }

    public function getNewTicket($place_id) {
        $t = new Ticket();
        $t->place_id = $place_id;
        $t->code = Ticket::getNextCode($place_id);
        $t->save();
        return $t;
    }

}