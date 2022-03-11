<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::paginate(5);
        $cities = City::all();
        return view('customer.list', compact('customers', 'cities'));
    }

    public function create()
    {
        $cities = City::all();
        return view('customer.create', compact('cities'));
    }

    public function store(Request $request)
    {

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->city_id = $request->input('city_id');
        $customer->save();
        Session::flash('success', 'Tạo mới khách hàng thành công');
        return redirect()->route('customers.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $cities = City::all();

        return view('customer.edit', compact('customer', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->city_id = $request->input('city_id');
        $customer->save();

        Session::flash('success', 'Cập nhật khách hàng thành công');

        return redirect()->route('customers.index');
    }
    public function filterByCity(Request $request){
        $idCity = $request->input('city_id');

        $cityFilter = City::findOrFail($idCity);

        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customer.list', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }
    public function destroy($id)
    {
        //
    }



    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $cities = City::all();
        return view('customers.list', compact('customers', 'cities'));
    }
}
