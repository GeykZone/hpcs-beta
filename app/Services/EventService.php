<?php 

namespace App\Services;

use App\Models\Admin\Event;

class EventService {
    
    public function validateMoreRequest($request, $opt = "store")
    {
        if($opt == "store")
        {
            // check if the event already exist
            // check time start, time end, event name , event location
            $event = Event::where('barangay_id', $request->barangay_id)
            ->orWhere('location', $request->location)
            ->first();

            if($event) {

                if($event->date_time_start === formatDate($request->date_time_start, "dateTimeWithSeconds") && $event->date_time_end === formatDate($request->date_time_end, "dateTimeWithSeconds")) {

                    $this->result = 'The added Event has a similar schedule & location in the selected Barangay, Please choose another schedule';

                    return false;
                   // return back()->with('error', 'The added Event has a similar schedule & location in the selected Barangay, Please choose another schedule');
                }
            }
        }
    
        // check if the added time start is less than the time end 
        if($request->date_time_start >= $request->date_time_end) {
            
            $this->result =  'Invalid Schedule: Time Start must not be greather than or equal to Time End. Please choose another schedule';

            return false;
            //return back()->with('error', 'Invalid Schedule: Time Start must not be greather than or equal to Time End. Please choose another schedule');
        } 

        if($request->date_time_end <= $request->date_time_start) {

            $this->result =  'Invalid Schedule: Time End must not be less than or equal to Time Start. Please choose another schedule';

            return false;
           // return back()->with('error', 'Invalid Schedule: Time End must not be less than or equal to Time Start. Please choose another schedule');
        }

        return true;
    }
}