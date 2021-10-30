<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VendorInfo;
use Illuminate\Http\Request;

class VendorInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendorInfos = VendorInfo::orderBy('id','desc')->get();
        return view('backend.vendor-info.index', compact('vendorInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vendor-info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'image' => 'nullable|image',
        ]);
        VendorInfo::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'image' => $request->image,
        ]);
        toastr()->success('Saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorInfo  $vendorInfo
     * @return \Illuminate\Http\Response
     */
    public function show(VendorInfo $vendorInfo)
    {
        return view('backend.vendor-info.show', compact('vendorInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VendorInfo  $vendorInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorInfo $vendorInfo)
    {
        return view('backend.vendor-info.edit', compact('vendorInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VendorInfo  $vendorInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VendorInfo $vendorInfo)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'image' => 'nullable|image',
        ]);
        $vendorInfo->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'image' => $request->image,
        ]);
        toastr()->success('Update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorInfo  $vendorInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorInfo $vendorInfo)
    {
        $vendorInfo ->delete();
        return [
            'type' => 'success',
            'message' => 'Destroy',
        ];
    }
}
