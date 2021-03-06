<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklists = Checklist::where("user_id", Auth::user()->id)->get();
        //dd($checklists);

        return view('checklist.index', ['checklists' => $checklists]);
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checklist = new Checklist;

        return view('checklist.create', ['checklist' => $checklist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required|string|max:255',

        ]);

        $checklist = new Checklist($request->all());
        $checklist->checked = isset($request->all()["checked"]);
        $checklist->user_id = auth()->id();
        $checklist->save();

        return redirect()->route('checklist.index')->with('success', 'Checklist created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checklist = Checklist::findOrFail($id);

        return view('checklist.show', ['checklist' => $checklist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checklist = Checklist::findOrFail($id);

        return view('checklist.edit', ['checklist' => $checklist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'title' => 'required|string|max:255',

        ]);

        $checklist = Checklist::findOrFail($id);
        $checklist->fill($request->all());
        $checklist->checked = $request->has('checked') ? 1 : 0;
        $checklist->save();

        return redirect()->route('checklist.index')->with('success', 'Checklist updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $item)
    {
        return ['success' => $item->delete()];
    }


    public function markChecked(Checklist $item)
    {
        $item->checked = true;

        return ['success' => $item->save()];
    }
}
