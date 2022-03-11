<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::all();
        return view('city.list',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.create');
    }

    public function store(Request $request)
    {
        $city = new City();
        $city->name = $request->input('name');
        $city->save();
        Session::flash('success', 'Thêm mới tỉnh thành thành công');
        return redirect()->route('cities.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('city.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $city->name = $request->input('name');
        $city->save();
        Session::flash('success', 'Cập nhật tỉnh thành thành công');
        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->customers()->delete();
        $city->delete();
        Session::flash('success', 'Xóa tỉnh thành thành công');
        return redirect()->route('cities.index');
    }
}
