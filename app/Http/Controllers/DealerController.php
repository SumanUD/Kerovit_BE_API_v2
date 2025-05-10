<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DealerController extends Controller
{
    /**
     * Display a listing of the dealers.
     */
// DealerController.php


public function index(Request $request)
{
    if ($request->ajax()) {
        $dealers = Dealer::select(['id', 'dealername', 'storecode', 'city', 'phone', 'contactperson']);

        return DataTables::of($dealers)
            ->addColumn('actions', function ($dealer) {
                return '<a href="' . route('dealers.edit', $dealer->id) . '" class="btn btn-warning btn-sm">Edit</a>
                        <form action="' . route('dealers.destroy', $dealer->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                        </form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    return view('admin.dealers.index');
}


    /**
     * Show the form for creating a new dealer.
     */
    public function create()
    {
        return view('admin.dealers.create');
    }

    /**
     * Store a newly created dealer in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dealername' => 'required|string|max:150',
            'address1' => 'nullable|string|max:200',
            'address2' => 'nullable|string|max:200',
            'address3' => 'nullable|string|max:200',
            'suburbs' => 'nullable|string|max:150',
            'city' => 'nullable|string|max:150',
            'state' => 'nullable|string|max:150',
            'pincode' => 'nullable|string|max:25',
            'phone' => 'nullable|string|max:100',
            'fax' => 'nullable|string|max:50',
            'contactnumber' => 'nullable|string|max:200',
            'contactperson' => 'nullable|string|max:200',
            'dealertype' => 'nullable|string|max:100',
            'google_link' => 'nullable|string|max:10000',
            '360degree' => 'nullable|string|max:10000',
            'storecode' => 'nullable|string|max:255',
        ]);

        Dealer::create($request->all());

        return redirect()->route('dealers.index')->with('success', 'Dealer created successfully.');
    }

    /**
     * Show the form for editing the specified dealer.
     */
    public function edit(Dealer $dealer)
    {
        return view('admin.dealers.edit', compact('dealer'));
    }

    /**
     * Update the specified dealer in storage.
     */
    public function update(Request $request, Dealer $dealer)
    {
        $request->validate([
            'dealername' => 'required|string|max:150',
            'address1' => 'nullable|string|max:200',
            'address2' => 'nullable|string|max:200',
            'address3' => 'nullable|string|max:200',
            'suburbs' => 'nullable|string|max:150',
            'city' => 'nullable|string|max:150',
            'state' => 'nullable|string|max:150',
            'pincode' => 'nullable|string|max:25',
            'phone' => 'nullable|string|max:100',
            'fax' => 'nullable|string|max:50',
            'contactnumber' => 'nullable|string|max:200',
            'contactperson' => 'nullable|string|max:200',
            'dealertype' => 'nullable|string|max:100',
            'google_link' => 'nullable|string|max:10000',
            '360degree' => 'nullable|string|max:10000',
            'storecode' => 'nullable|string|max:255',
        ]);

        $dealer->update($request->all());

        return redirect()->route('dealers.index')->with('success', 'Dealer updated successfully.');
    }

    /**
     * Remove the specified dealer from storage.
     */
    public function destroy(Dealer $dealer)
    {
        $dealer->delete();
        return redirect()->route('dealers.index')->with('success', 'Dealer deleted successfully.');
    }
}
