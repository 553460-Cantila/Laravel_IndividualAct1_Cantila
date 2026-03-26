<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index(Request $request) //display list
    {
        $query = Candidate::query();

        if ($request ->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;

            $query -> where (function ($q) use ($searchTerm) {
                  $q->where ('first_name', 'like', '%' . $searchTerm . '%')
                    -> orWhere ('middle_name', 'like', '%' . $searchTerm . '%')
                    -> orWhere ('last_name', 'like', '%' . $searchTerm . '%')
                    -> orWhere ('gender', 'like', '%' . $searchTerm . '%')
                    -> orWhere ('address', 'like', '%' . $searchTerm . '%')
                    -> orWhere ('position', 'like', '%' . $searchTerm . '%')
                    -> orWhere ('party', 'like', '%' . $searchTerm . '%');
            });
        }
        $candidates = $query->get();
        return view('index', compact('candidates'));
    }

    public function store(Request $request) //save
    {
        Candidate::create([
            'first_name' =>$request->first_name,
            'middle_name' =>$request->middle_name,
            'last_name' =>$request->last_name,
            'gender' =>$request->gender,
            'address' =>$request->address,
            'position' =>$request->position,
            'party' =>$request->party
        ]);
        return redirect ('/candidates');
    }

    public function edit($id) //edit
    {
        $candidate = Candidate::findOrFail($id);
        return view('edit', compact('candidate'));
    }

    public function update (Request $request, $id) //update
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->update([
            'first_name' =>$request->first_name,
            'middle_name' =>$request->middle_name,
            'last_name' =>$request->last_name,
            'gender' =>$request->gender,
            'address' =>$request->address,
            'position' =>$request->position,
            'party' =>$request->party
        ]);
        return redirect ('/candidates');
    }

    public function destroy($id) //delete
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        return redirect('/candidates');
    }
}
