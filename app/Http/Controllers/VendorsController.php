<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
class VendorsController extends Controller
{
     /**
        * Display a listing of the resource.
        *
        * @return Response
        */
    public function index()
    {
        $pagination = NULL;
          $data = [
            'pageTitle' => 'এসো বই পড়ি | Vendor List',
            'vendors' => Vendor::latest()->paginate(5)
            
        ];

        return view('vendors.index',$data);
    }

     /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
        public function create()
        {
            return view('vendors.create');
        }

         /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
    public function store(Request $request)
    {
        $formRequest = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            
        ]);

        Vendor::create($formRequest);
       
        return redirect()->route('vendors.index');
    }

    
    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function edit($id)
    {
        $data = [
            'pageTitle' => 'Edit Vendor',
            'vendor' => Vendor::findOrFail($id)
        ];

        return view('vendors.edit', $data);
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function update(Request $request, $id)
    {
        $formRequest = $request->only([
            'name', 
            'email',
            'mobile',
            'address'        ]);

        Vendor::where('id', $id)->update($formRequest);

        return redirect()->route('vendors.index')->with(['message' => 'Vendors updated successfully!']);
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function destroy($id)
    {
        Vendor::where('id', $id)->delete();

        return redirect()->route('vendors.index')->with(['message' => 'Vendors deleted successfully!']);
    }


}
