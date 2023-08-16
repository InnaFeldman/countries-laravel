<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('dashboard', ['countries' => $countries]);
    }


    public function create(CountryRequest $request )
    {
        Country::create($request->all());

        return redirect()->route('dashboard')
            ->with('success','Country has been created successfully.');
    }


    public function update(CountryRequest $request, int $id)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());

        return view('edit', ['country' => $country]);
    }

    public function delete(int $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('dashboard')
            ->with('success','Country has been deleted successfully');
    }

    public function showOne(int $id){
        $country = Country::findOrFail($id);

        return view('edit', ['country' => $country]);
    }
}
