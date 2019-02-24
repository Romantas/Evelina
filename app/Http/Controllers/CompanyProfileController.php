<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('profile.company')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'income' => ['required', 'string', 'max:255'],
            'workers_count' => ['required', 'string', 'max:255'],
            'ceo' => ['required', 'string', 'max:255'],
            'logo' => ['image', 'max:1999'],
        ]);

        if($request->hasFile('logo')){
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('logo')->getClientOriginalExtension();
            $fileToSave = $filename.'_'.time().'.'.$ext;

            $path = $request->file('logo')->storeAs('public/company', $fileToSave);

        } else {
            $fileToSave = 'company.jpg';
        }

        Company::find($id)->update([
            'name' => $request->name,
            'area'   => $request->area,
            'address'    => $request->address,
            'income' => $request->income,
            'workers_count' => $request->workers_count,
            'ceo' => $request->ceo,
            'logo' => $fileToSave,
        ]);
        return redirect()->route('company');
    }
}
