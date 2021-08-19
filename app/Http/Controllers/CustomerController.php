<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Order;
use DB;

class CustomerController extends Controller
{
    public function index(Request $request) {
        $sort_search = null;
        $customers = Customer::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $user_ids = User::where('user_type', 'customer')
                ->where(function($user) use ($sort_search) {
                    $user->where('name', 'like', '%'.$sort_search.'%')
                        ->orWhere('email', 'like', '%'.$sort_search.'%');
                })
                ->pluck('id')
                ->toArray();

            $customers = $customers->where(function($customer) use ($user_ids) {
                $customer->whereIn('user_id', $user_ids);
            });
        }
        $customers = $customers->paginate(15);
        return view('backend.customer.customers.index', compact('customers', 'sort_search'));
    }

    
    public function create() {
        //
    }

    
    public function store(Request $request) {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|unique:users|email',
            'phone'         => 'required|unique:users',
        ]);
        
        $response['status'] = 'Error';
        
        $user = User::create($request->all());
        
        $customer = new Customer;
        
        $customer->user_id = $user->id;
        $customer->save();
        
        if (isset($user->id)) {
            $html = '';
            $html .= '<option value="">
                        '. translate("Walk In Customer") .'
                    </option>';
            foreach(Customer::all() as $key => $customer){
                if ($customer->user) {
                    $html .= '<option value="'.$customer->user->id.'" data-contact="'.$customer->user->email.'">
                                '.$customer->user->name.'
                            </option>';
                }
            }
            
            $response['status'] = 'Success';
            $response['html'] = $html;
        }
        
        echo json_encode($response);
    }

    
    public function show($id) {
        //
    }

    
    public function edit($id) {
        $customer_id = decrypt($id);
        $user_info = Customer::select('customers.id as customer_id','users.*')
            ->leftJoin('users','users.id','customers.user_id')
            ->where('customers.id','=',$customer_id)
            ->first();
        dd($user_info);
    }

    
    public function update(Request $request, $id) {
        //
    }

    
    public function destroy($id) {
        Order::where('user_id', Customer::findOrFail($id)->user->id)->delete();
        User::destroy(Customer::findOrFail($id)->user->id);
        if(Customer::destroy($id)){
            flash(translate('Customer has been deleted successfully'))->success();
            return redirect()->route('customers.index');
        }

        flash(translate('Something went wrong'))->error();
        return back();
    }
    
    public function bulk_customer_delete(Request $request) {
        if($request->id) {
            foreach ($request->id as $customer_id) {
                $this->destroy($customer_id);
            }
        }
        
        return 1;
    }

    public function login($id) {
        $customer = Customer::findOrFail(decrypt($id));

        $user  = $customer->user;

        auth()->login($user, true);

        return redirect()->route('dashboard');
    }

    public function ban($id) {
        $customer = Customer::findOrFail($id);

        if($customer->user->banned == 1) {
            $customer->user->banned = 0;
            flash(translate('Customer UnBanned Successfully'))->success();
        } else {
            $customer->user->banned = 1;
            flash(translate('Customer Banned Successfully'))->success();
        }

        $customer->user->save();

        return back();
    }
}
