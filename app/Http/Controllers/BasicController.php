<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class BasicController extends Controller
{
    // view record
    public function index()
    {
        $companies = Company::orderBy('id','desc')->paginate(5);
        return view('display', compact('companies'));
    }

    // get insert form
    public function create()
    {
        return view('insert');
    }


    // create new one
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'file' => 'required',
        ],[
            'name.required' => 'Required*',
            'email.required' => 'Required*',
            'address.required' => 'Required*',
            'file.required' => 'Required*'
        ]);

        $file=time().'_'.$request->file->getClientOriginalName();
        if($file){
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath =  $request->file('file')->move(public_path('uploads'), $fileName);
            $value=[
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'file' =>   $file,
            ];
        }
        
        
        Company::create($value);
        return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }
// get edit form
    public function edit(Company $company)
    {
        return view('edit',compact('company'));
    }

    // update exist data
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'file' => 'required',
        ]);
        $file=time().'_'.$request->file->getClientOriginalName();
        if($file){
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath =  $request->file('file')->move(public_path('uploads'), $fileName);
            $value=[
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'file' =>   $file,
            ];
        }
        
        $company->fill($value)->save();

        return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
    }

    // delete data
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully');
    }

    // soft delete table
    public function trash()
    {
        $companies = Company::onlyTrashed()->orderBy('id','desc')->paginate(5);
        return view('trash_list', compact('companies'));
    }
    
    // restore trashed data
    public function restore($id)
    {
        $companies = Company::withTrashed()->FindorFail($id);
        if(!empty($companies)){
            $companies->restore();
        }
        return redirect()->route('companies.index')->with('success','Company has been Restored successfully');
    }

    // delete data permanently
    public function deletePermanently($id)
    {
        $companies = Company::withTrashed()->FindorFail($id);
        if(!empty($companies)){
            $companies->forceDelete();
        }
        return redirect()->route('companies.index')->with('success','Company deleted Permanently');
    }
   
}
