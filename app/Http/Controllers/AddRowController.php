<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Project;

class AddRowController extends Controller
{
    public function store(Request $request){
        //   dd($request->all());
        $validated = $request->validate([
            'c_name.*' => 'required|string',
            'p_name.*.*' => 'required|string',
            'type.*.*' => 'required|string',
        ]);

        foreach ($request->c_name as $index => $companyName) {
            $company = Company::create(['name' => $companyName]);
            foreach ($request->p_name[$index] as $projectIndex => $projectName) {
                Project::create([
                    'company_id' => $company->id,
                    'name' => $projectName,
                    'type' => $request->type[$index][$projectIndex]
                ]);
            }
        }
        return redirect()->back()->with('success', 'Data saved successfully!');
    }
}
