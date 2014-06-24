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
        if (Input::has('place', 'code')) {
            return Ticket::create(array(
                'place_id' => Input::get('place'),
                'code' => Input::get('code')
            ));
        }
    }

}