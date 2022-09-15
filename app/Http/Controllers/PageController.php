<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Exception;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the characters.
     *
     * @return Response
     */
    public function index ()
    {
        $pages = Page::all();
        foreach($pages as $page) {
            if($page->parent != null) {
                $page->parent = $page->getParentTitle($page->parent);
            }
        }
        return view('page.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new character.
     *
     * @return Response
     */
    public function create ()
    {
        $pages = Page::all();
        return view('page.create', ['pages' => $pages]);
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
            'title'         => 'required',
            'content'       => 'required',
        ]);

        try {
            Page::create([
                'title'         => $request['title'],
                'content'       => $request['content'],
                'parent'        => $request['parent']
            ]);

            
            return redirect()->route('page.index')
                ->with('success', 'Page created successfully');
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new character.
     *
     * @return Response
     */
    public function edit (Page $page)
    {
        $pages = Page::all();
        return view('page.edit', ['page' => $page, 'pages' => $pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
        ]);

        try {
            $page->update($request->all());

            
            return redirect()->route('page.index')
                ->with('success', 'Page updated successfully');
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $pageTitle = $page->title;
        try {
            $page->delete();
            return redirect()->route('page.index')
                ->with('success', 'Page ' . $pageTitle . ' deleted successfully');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
