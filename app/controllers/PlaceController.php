<?php

class PlaceController extends BaseController {

    public function index() {
        return Place::all();
    }

    public function show($id) {
        return Place::find($id);
    }

}