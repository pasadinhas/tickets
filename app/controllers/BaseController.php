<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    public function debug($arg1 = null) {
        $ticket = Ticket::where('place_id', $arg1)
            ->has('service', false)
            ->orderBy('created_at', 'asc')
            ->first();
        $service = new Service();
        $service->ticket_id = $ticket->id;
        // FIXME: employee id
        $service->employee = 'ist1yyyyy';
        $service->save();
        return Ticket::where('id', $ticket->id)
            ->with('service')
            ->get();
    }

}
