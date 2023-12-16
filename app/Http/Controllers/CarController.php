<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use DB;

class CarController extends Controller
{
    //names from html blade file
    private $columns = ['title', 'description', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        //return dd($cars[0]->published);
        return view("cars", compact("cars"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /////////////////////////////////////////////////////////////////////
        // if(isset($request)){
        //     return dd($request);
        //     // $cars = new Car();
        //     // $cars->title = $request->title;
        //     // $cars->description = $request->description;
        //     // if(isset($request->published)){
        //     //     $cars->published = 1;
        //     // }else{
        //     //     $cars->published = 0;
        //     // }
        //     // $cars->save();
        //     // return "Data added successfully";
        // }else{
        //     return "No Request Found";
        // }
        /////////////////////////////////////////////////////////////////////
        // manual method
        // $cars = new Car();
        // $cars->title = $request->title;
        // $cars->description = $request->description;
        // if(isset($request->published)){
        //     $cars->published = 1;
        // }else{
        //     $cars->published = 0;
        // }
        // $cars->save();
        // return "Data added successfully";
        /////////////////////////////////////////////////////////////////////
        // $data = $request->only($this->columns);
        // $data['published'] = isset($request->published);
        // //dd ($request->published);
        // Car::create($data);
        // return redirect('cars');
        /////////////////////////////////////////////////////////////////////
        $data = $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
        ]);
        $data['published'] = isset($request->published);
        Car::create($data);
        return redirect('cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('showCar', compact("car"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $sql = "SELECT `title`, `description`, `published` FROM `cars` WHERE `id` = $id";
        // $car = DB::select($sql);
        $car = Car::findOrFail($id);
        return view('updateCar', compact("car"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($request->published);
        Car::where('id', $id)->update($data);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();    // softdelete
        return redirect('cars');
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();
        return view("trashed", compact("cars"));
    }

    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete(); 
        return redirect('cars');
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore(); 
        return redirect('cars');
    }
}
