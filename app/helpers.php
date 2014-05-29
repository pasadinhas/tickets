<?php

function generate_ticket_code($arg) {
    if (is_a($arg, 'Ticket')) {
        $ticket = $arg;
    } else if (is_numeric($arg)) {
        $ticket = Ticket::where('place_id', $arg)->orderBy('created_at', 'desc')->first();
    } else {
        throw new RuntimeException('generate_ticket_code: Argument must be a Ticket or integer. "' . gettype($arg) . '" given.');
    }
    return sprintf('%02d', ((int) $ticket->code) + 1);
}