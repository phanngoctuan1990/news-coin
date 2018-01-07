<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $totalCustomer = Customer::count();
        return view('admin.customer.index', compact('totalCustomer'));
    }

    /**
     * Get list customer show datatables
     *
     * @return void
     */
    public function datatables()
    {
        return \Datatables::of(Customer::query())
                        ->editColumn('name', function ($data) {
                            return htmlentities($data->name);
                        })
                        ->editColumn('created_at', function ($data) {
                            return $data->created_at->format('d-m-Y');
                        })
                        ->make(true);
    }
}
