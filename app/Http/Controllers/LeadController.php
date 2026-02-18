<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Leads;

class LeadController extends BaseController
{
    public function index()
    {
        $leads = Leads::all();
        
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }      
    
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:leads,email',
            'user_phone' => 'required|string|max:20|unique:leads,phone',
            'product_interest' => 'required|string|max:255',
        ]);

        Leads::create([
            'name' => $validatedData['user_name'],
            'email' => $validatedData['user_email'],
            'phone' => $validatedData['user_phone'],
            'product_interest' => $validatedData['product_interest'],
        ]);

        return redirect()->route('leads.index')->with('success', 'Lead created successfully!');
    }

    public function delete($id)
    {
        $lead = Leads::findOrFail($id);
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully!');
    }
}
