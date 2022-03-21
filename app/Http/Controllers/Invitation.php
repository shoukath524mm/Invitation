<?php

namespace App\Http\Controllers;

use App\Models\Invitation as Model;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Invitation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Model::latest()->paginate(5);
    
        return view('invitations.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        $users = User::all();
        return view('invitations.create',compact('events','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'send_at' => 'nullable',
            'accepted_at' => 'nullable',
            'reject_at' => 'nullable',
        ]);

        Model::create($request->all());
     
        return redirect()->route('invitations.index')
                        ->with('success','Invitation created successfully.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Model $invitation)
    {
        
        
        return view('invitations.show',compact('invitation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $invitation)
    {
        return view('invitations.edit',compact('invitation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $invitation)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'send_at' => 'nullable',
            'accepted_at' => 'nullable',
            'reject_at' => 'nullable',
        ]);
    
        $invitation->update($request->all());
    
        return redirect()->route('invitations.index')
                        ->with('success','Invitation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $invitation)
    {
        $invitation->delete();
    
        return redirect()->route('invitations.index')
                        ->with('success','invitation deleted successfully');
    }


    public function accept(Model $invitation)
    {
        $invitation->is_accepted = 1;
        $invitation->accepted_at = Carbon::now();
        $invitation->save();
    }

    public function reject(Model $invitation)
    {
        $invitation->is_rejected = 1;
        $invitation->is_rejected = Carbon::now();
        $invitation->save();
    }
}
