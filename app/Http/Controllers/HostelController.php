<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
use App\Mail\NewItemAdded;
use Illuminate\Support\Facades\Mail;


class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hostels = Hostel::all();
       
      
        return view('hostels.index',[
            "hostels" => $hostels
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hostels.create', [ "hostel" => new Hostel ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|min:4',
            'location' => 'required|string|max:50|min:4',
            'total_rooms' => 'required|integer',
            'warden_name' => 'required|string|max:50|min:4',
            'contact_number' => 'required|string|max:50|min:8',


        ]);
        $hostel = Hostel::create($data);    
        
        Mail::to('recipient@example.com')->send(new NewItemAdded($hostel, 'hostel'));
        

        return redirect()->route('hostels.index')->with('alertMessage',"Hostel {$data['name']} added successfully")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hostel $hostel)
    {
        //$hostel = Hostel::findOrFail($id);
        
        return view('hostels.show', ['hostel' => $hostel]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hostel $hostel)
    {
        return view('hostels.edit', ['hostel' => $hostel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hostel $hostel)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|min:4',
            'location' => 'required|string|max:50|min:4',
            'total_rooms' => 'required|integer',
            'warden_name' => 'required|string|max:50|min:4',
            'contact_number' => 'required|string|max:50|min:8',


        ]);

        $hostel->update($data);
        return redirect()->route('hostels.index')->with('alertMessage',"Hostel {$hostel->name} updated successfully")->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hostel $hostel)
    {
        $hostel->delete();
        return redirect()->route('hostels.index')->with('alertMessage',"Hostel {$hostel->name} deleted successfully")->with('type', 'success');
    }
}
