<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;

class SkillController extends Controller
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
     * Display a listing of the skills.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skill.index', ['skills' => $skills]);
    }

    /**
     * Show the form for creating a new skill.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill.create');
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
            'skill' => 'required',
            'years' => 'required|numeric'
        ]);

        try {
            Skill::create([
                'skill' => $request['skill'],
                'years' => $request['years']
            ]);

            return redirect()->route('skill.index')
                ->with('message', 'Skill created succesfully');
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skill.edit', ['skill' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'skill' => 'required',
            'years' => 'required|numeric'
        ]);

        try {
            $skill->update($request->all());

            return redirect()->route('skill.index')
                ->with('message', 'Skill updated succesfully');
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skillName = $skill->skill;

        try {
            $skill->delete();
            return redirect()->route('skill.index')
                ->with('message', 'Skill ' . $skillName . ' deleted succesfully');
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }

    public static function getSkills() {
        $skills = Skill::all();

        $skillList = [];

        foreach($skills as $skill) {
            $skillItem = ['skill' => $skill->skill, 'experience' => $skill->years];

            array_push($skillList, $skillItem);
        }

        return $skillList;
    }
}
