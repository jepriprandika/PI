<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Category;


class ServiceController extends Controller
{

   public function __construct()
    {
        parent::__construct();

        $this->data['categories'] = Category::parentCategories()
                                    ->orderBy('name','asc')
                                    ->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::active();

        if ($categorySlug = $request->query('category')) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            $services = $services->whereHas('categories', function ($query) use ($category){
                            $query->where('categories.id', $category->id);
            });
        }

        $this->data['services'] = $services->paginate(9);
        return $this->load_theme('services.index', $this->data);
    }

    /**
     * Display a listing of the resource.
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = Service::active()->where('slug', $slug)->first();

        if (!$service) {
            return redirect('services');
        }

        $this->data['service'] = $service;

        return $this->load_theme('services.show', $this->data);
    }

  
}
