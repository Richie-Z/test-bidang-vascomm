<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin");
    }
    public function getCustomers()
    {
        $costumer = Customer::select(["id", "name", "username", "image", "is_approved"]);
        return DataTables::of($costumer)->make();
    }

    public function approve($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $customer->is_approved = 1;
        $customer->save();

        DB::table("history_approvals")->insert([
            "admin_id" => auth("admin")->user()->id,
            "customer_id" => $customerId,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route("admin");
    }
    public function revoke($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $customer->is_approved = 0;
        $customer->save();

        DB::table("history_approvals")->insert([
            "admin_id" => auth("admin")->user()->id,
            "customer_id" => $customerId,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route("admin");
    }
    public function detailCustomer($id)
    {
        return view("detail", ["customer" => Customer::findOrFail($id)]);
    }
}
