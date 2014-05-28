<?php

class ServiceController extends BaseController {

    public function getIndex() {
        return Service::all();
    }

    public function getService($service_id) {
        return Service::find($service_id);
    }

    public function getOpenServices() {
        return Service::where('end_time', null)->get();
    }

    public function getServicesForEmployee($employee_id) {
        return Service::where('employee', $employee_id)
            ->get();
    }

    public function getFinishService($service_id) {
        $service = Service::find($service_id);
        $service->finish();
        $service->save();
        return $service;
    }

}