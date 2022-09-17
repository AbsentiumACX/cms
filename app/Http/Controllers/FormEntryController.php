<?php

namespace App\Http\Controllers;

use App\Models\FormEntry;
use Exception;
use Illuminate\Http\Request;

class FormEntryController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = FormEntry::all();
        return view('form-entry.index', ['entries' => $entries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            FormEntry::create($request->all());

            return json_encode(['message' => '200']);
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormEntry  $formEntry
     * @return \Illuminate\Http\Response
     */
    public function show(FormEntry $formEntry)
    {
        return view('form-entry.view', ['entry' => $formEntry]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormEntry  $formEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormEntry $formEntry)
    {
        try {
            $formEntry->delete();
            return redirect()->route('form-entry.index')
                ->with('message', 'Entry deleted succesfully');
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }
}
