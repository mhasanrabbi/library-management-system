<?php

namespace App\Http\Controllers;

use App\Models\BookRack;
use Illuminate\Http\Request;

class RackController extends Controller
{
    public function showRack()
    {
        $bookRacks = BookRack::orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('racks.index', compact('bookRacks'));
    }

    public function addRack()
    {
        return view('racks.add-rack');
    }

    public function saveRack(Request $request)
    {
        $validated = $request->validate([
            'rack_name' => 'required|max:255',
            'max_capacity' => 'required|max:3',
        ], [
            'rack_name.required' => 'Rack Name is Mandatory!',
            'max_capacity.required' => 'Rack Capacity is Mandatory!',
        ]);

        $validated['available_status'] = 1;
        $validated['created_at'] = date('Y-m-d h-i-s');
        $validated['updated_at'] = date('Y-m-d h-i-s');

        BookRack::create($validated);
        return redirect('rack');
    }

    public function editRack($id)
    {
        $rackTable = BookRack::where('id', $id)->first();
        return view('racks.edit-rack', compact('rackTable'));
    }

    public function updateRack(Request $request)
    {
        $validated = $request->validate([
            'rack_name' => 'required|max:255',
            'max_capacity' => 'required|max:2',
        ], [
            'rack_name.required' => 'Rack Name is Mandatory!',
            'max_capacity.required' => 'Rack Capacity is Mandatory!',
        ]);
        BookRack::where('id', $request->id)->update($validated);
        return redirect('rack');
    }

    public function deleteRack(Request $request)
    {
        BookRack::where('id', $request->id)->delete();
        return redirect('rack');
    }

    public function searchRack(Request $request)
    {
        $bookRacks = BookRack::where('rack_name', $request->rack_name)->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('racks.index', compact('bookRacks'));
    }
}