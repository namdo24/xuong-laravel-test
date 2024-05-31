<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Brand::query()->latest('id')->paginate(5);
    
        return view(self::PATH_VIEW. __FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    const PATH_VIEW='brands.';
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        if($request->has('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $path='uploads/brand/';
            $file->move($path,$filename);
        }
        $data=[
            'name'=>$request->name,
            'image'=>$path.$filename
        ];
        Brand::query()->create($data);
        return redirect()->route('brands.index')->with('msg','Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view(self::PATH_VIEW.__FUNCTION__,compact('brand'));
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view(self::PATH_VIEW.__FUNCTION__,compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if($request->has('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $path='uploads/brand/';
            $file->move($path,$filename);
            if(File::exists($brand->image)){
                File::delete($brand->image);
            }
        }
        $data=[
            'name'=>$request->name,
            'image'=>$path.$filename
        ];
        $brand->update($data);
        return back()->with('msg','Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if(File::exists($brand->image)){
            File::delete($brand->image);
        }
        $brand->delete();
        return back()->with('msg','Thao tác thành công');
    }
}
