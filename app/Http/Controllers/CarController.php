<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;
use DB;
use File;

class CarController extends Controller
{
    use Common;
    //names from html blade file
    private $columns = ['title', 'description', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        $categories = Category::get();
        //return dd($cars[0]->published);
        //return view("cars", compact("cars", "categories"))->share('categories', 'category');
        return view("cars", compact("cars", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('addCar', compact("categories"));
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
        $messages=$this->messages();
        $data = $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ], $messages);
        //use method from traits called uploadFile
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['published'] = isset($request->published);
        $data['image'] = $fileName;
        //$data['category_id'] = $request->category_id;
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
        $categories = Category::get();
        return view('updateCar', compact("car","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data = $request->only($this->columns);
        // $data['published'] = isset($request->published);
        // Car::where('id', $id)->update($data);
        // return redirect('cars');

        $messages=$this->messages();
        $data = $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ], $messages);
        // return dd($request);
        // +request: Symfony\Component\HttpFoundation\InputBag {#38 ▼
        //     #parameters: array:5 [▼
        //       "_token" => "phZDcfOPGKLvzlHuyW49b5L7UqWG0SffEvKHreAu"
        //       "_method" => "put"
        //       "title" => "try title"
        //       "description" => "try des"
        //       "oldImage" => "1703023405.jpg"
        //     ]
        //   }

        // return dd($data);
        // array:2 [▼ // app\Http\Controllers\CarController.php:126
        // "title" => "try title"
        // "description" => "try des"
        // ]

        if($request->hasFile('image')){
            //use method from traits called uploadFile
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image'] = $fileName;
            //remove old image from server
            unlink("assets/images/".$request->oldImageName);
            //get old image name from database
            //$oldImageName = DB::select("SELECT `image` FROM `cars` WHERE `id` = $id");
        }
        $data['published'] = isset($request->published);
        //$data['category_id'] = $request->category;
        //return dd($data);
        Car::where('id', $id)->update($data);

        //delete old image from local server.. doesn't work
        if(isset($request->image)){
            //image path on local server
            //dd($oldImageName[0]->image);
            //$image_path = asset('assets/images/' . $oldImageName[0]->image);
            //delete image
            // if(File::exists($image_path)) {
            //     File::delete($image_path);
            // }
        }
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
        
    public function messages()
    {
        return [
            'title.required'=>'العنوان مطلوب',
            'title.string'=>'Should be string',
            'description.required'=>'Should be text',
            'image.required'=>'Please be sure to select an image',
            'image.mimes'=>'Incorrect image type',
            'image.max'=>'Max file size exeeced',
            'category_id.exists'=>'Choose category whithin our given categories',
        ];
    }

    public function test()
    {
        return view('test');
    }
}
