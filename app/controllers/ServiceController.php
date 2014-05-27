<?php

class ServiceController extends BaseController {

    public function getOpenServices() {
        return Service::where('end_time', null)->get();
    }

    public function getOpenServicesFromEmployee($employee_id) {
        return Service::where('employee', $employee_id)
            ->where('end_time', null)
            ->get();
    }

}