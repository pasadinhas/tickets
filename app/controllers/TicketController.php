<?php

class TicketController extends BaseController {

    public function index() {
        // filter place and waiting. w/wo Service
        if (Input::has('place')) {
            return Place::find(Input::get('place'))->tickets;
        }
        return Ticket::all();
    }

    public function show($id) {
        // w/wo Service
        return Ticket::find($id);
    }

    public function store() {
        // produces new ticket
        // FIXME: ticket code is hardcoded!
        if (Input::has('place')) {
            return Ticket::create(array(
                'place_id' => Input::get('place'),
                'code' => '26'
            ));
        }
    }

    public function getTicketsWaitingForPlace($place_id) {
        return Ticket::where('place_id', $place_id)
            ->has('service', false)
            ->get();
    }

    public function getNextTicketForPlace($place_id) {
        return Ticket::where('place_id', $place_id)
            ->has('service', false)
            ->orderBy('created_at', 'asc')
            ->first();
    }

    public function getNewTicketForPlace($place_id) {
        $t = new Ticket();
        $t->place_id = $place_id;
        $t->code = generate_ticket_code($place_id);
        $t->save();
        return $t;
    }

}