<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Models\Admin\Barangay;
use App\Services\EventService;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Shared\Event\EventRequest;
use App\Http\Requests\Shared\Event\EventUpdateRequest;

class EventController extends Controller
{
    private $result;

    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(Event::with('barangay')->latest()->where('barangay_id', auth()->user()->barangay_id)->get())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {
                    $route_edit = route('brgy_admin.event.edit', $row);
                    $btn = "<div class='btn-group'>
                    <a href='$route_edit' class='btn btn-outline-navy-blue btn-sm')'><i class='fas fa-edit'></i></a>";

                    // if($row->is_approved == 0)
                    // {
                    //     $btn .= "
                    //     <a href='javascript:void(0)' class='text-decoration-none btn btn-sm btn-outline-navy-blue'
                    //     onclick='crud_activate_deactivate($row->id, `brgy_admin.event.update` , `approve`, `.event_dt`, `Approve this Health Program`)'>Approve</a>";

                    //     $btn .= "
                    //     <a href='javascript:void(0)' class='text-decoration-none btn btn-sm btn-outline-navy-blue'
                    //     onclick='crud_activate_deactivate($row->id, `brgy_admin.event.update` , `cancel`, `.event_dt`, `Cancel this Health Program`)'>Cancel</a>"; 
     
                    // }
                    // else if($row->is_approved == 1)
                    // {
                    //     $btn .= "
                    //     <a href='javascript:void(0)' class='text-decoration-none btn btn-sm btn-outline-navy-blue'
                    //     onclick='crud_activate_deactivate($row->id, `brgy_admin.event.update` , `cancel`, `.event_dt`, `Cancel this Health Program`)'>Cancel</a>"; 
                    // }
                    // else
                    // {
                    //     $btn .= "
                    //     <a href='javascript:void(0)' class='text-decoration-none btn btn-sm btn-outline-navy-blue'
                    //     onclick='crud_activate_deactivate($row->id, `brgy_admin.event.update` , `approve`, `.event_dt`, `Approve this Health Program`)'>Approve</a>";
    
                    // }
                    
                    $btn .= " <a href='javascript:void(0)' class='text-decoration-none btn  btn-sm btn-outline-navy-blue' 
                    onclick='c_destroy($row->id,`brgy_admin.event.destroy`,`.event_dt`)'><i class='fas fa-trash'></i></a> </div>"; // crud destroy param [row or model ID, route name, datatableID]
                    return $btn;
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('user.event.index');
    }

    public function store(EventRequest $request)
    {
        if($this->validateMoreRequest($request))
        {
           $event = Event::create($request->validated() + ['barangay_id' => auth()->user()->barangay_id]);

           $this->log_activity($event, 'event', 'Event', $event->name );

            return $this->res(['message' => 'Health Program Added Successfully']);
        }

        return $this->error($this->result, 422);

    }

    
    public function show(Event $event)
    {
        $event->load('barangay','attendees');

        return view('user.event.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('user.event.edit', compact('event'));
    }


    public function update(EventUpdateRequest $request, Event $event)
    {
        if($request->option)
        {
            // Approve || Cancel Event
            return $request->option == 'approve' ? $event->update(['is_approved' => 1]) 
            : $event->update(['is_approved' => 2]);
        }
        else
        {
            if($this->validateMoreRequest($request, 'update')) 
            {
                $event->update($request->validated());

                $this->log_activity($event, 'updated', 'Event', $event->name );

                return back()->with('message', 'Health Program Updated Successfully');
                //return redirect(route('city_admin.event.index'))->with('message', 'Health Program Updated Successfully');
            } 

            return back()->with('error', $this->result);
          
        }
    }

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

    public function destroy(Event $event)
    {
        $this->log_activity($event, 'deleted', 'Event', $event->name );

        $event->delete();

        return $this->res(['message' => 'Health Program Deleted Successfully']);
    }


}
