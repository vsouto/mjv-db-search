<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompaniesController extends Controller
{
    //

    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'job_title' => 'required|max:255',
            'city' => 'required|max:255',
            'industry' => 'required|max:255',
            'linkedin' => 'required|url'


        ]);

        Company::Create([
            'title' => $request->title,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'job_title' => $request->job_title,
            'city' => $request->city,
            'industry' => $request->industry,
            'linkedin' => $request->linkedin,
            'hardbounce' => $request->hardbounce ?: 0,
            'email' => $request->email,
        ]);

        return redirect()->action('HomeController@index')->with('status', 'Cadastro realizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = Company::find($id);
        if(!$user)
        {
            abort('404');
        }

        if($user->delete())
        {
            \Session::flash('flash_message', "Dados excluídos com sucesso!");
        }

        return redirect()->action('HomeController@index')->with('status', 'Cadastro removido com sucesso!');;
    }
}
