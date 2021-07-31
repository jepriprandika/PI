<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceImageRequest;

use App\Models\Service;
use App\Models\Category;
use App\Models\ServiceImage;

use Str;
use Auth;
use DB;
use Session;

class ServiceController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(function($request, $next) {
            if (Auth::user()->roles->implode('name', '') != 'Admin') {
                return redirect('/');
            }
            return $next($request);
        });
        $this->data['currentAdminMenu'] = 'catalog';
        $this->data['currentAdminSubMenu'] = 'service';
        $this->data['statuses'] = Service::statuses();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['services'] = Service::orderBy('name', 'ASC')->paginate(10);

        return view('admin.services.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();

        $this->data['categories'] = $categories->toArray();
        $this->data['service'] = null;
        $this->data['serviceID'] = 0;
        $this->data['categoryIDs'] = [];

        return view('admin.services.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['user_id'] = Auth::user()->id;

        $saved = false;
        $saved = DB::transaction(function() use ($params) {
            $service = Service::create($params);
            $service->categories()->sync($params['category_ids']);

            return true;
        });

        if ($saved) {
            Session::flash('success', 'Service has been saved');
        } else {
            Session::flash('error', 'Service could not be saved');
        }

        return redirect('admin/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (empty($id)) {
            return redirect('admin/services/create');
        }

        $service = Service::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();

        $this->data['categories'] = $categories->toArray();
        $this->data['service'] = $service;
        $this->data['serviceID'] = $service->id;
        $this->data['categoryIDs'] = $service->categories->pluck('id')->toArray();

        return view('admin.services.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);

        $service = Service::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function() use ($service, $params) {
            $service->update($params);
            $service->categories()->sync($params['category_ids']);

            return true;
        });

        if ($saved) {
            Session::flash('success', 'Service has been saved');
        } else {
            Session::flash('error', 'Service could not be saved');
        }

        return redirect('admin/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service  = Service::findOrFail($id);

        if ($service->delete()) {
            Session::flash('success', 'Service has been deleted');
        }

        return redirect('admin/services');
    }

    public function images($id) 
    {
        if (empty($id)) {
            return redirect('admin/services/create');
        }

        $service = Service::findOrFail($id);

        $this->data['serviceID'] = $service->id;
        $this->data['serviceImages'] = $service->serviceImages;

        return view('admin.services.images', $this->data);

    }

    public function add_image($id)
    {
        if (empty($id)) {
            return redirect('admin/services');
        }

        $service = Service::findOrFail($id);

        $this->data['serviceID'] = $service->id;
        $this->data['service'] = $service;

        return view('admin.services.images_form', $this->data); 
    }

    public function upload_image(ServiceImageRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        
        if ($request->has('image')) {
            $image = $request->file('image'); 
            $name = $service->slug . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = '/uploads/images';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $params = [
                'service_id' => $service->id,
                'path' => $filePath,
            ];

            if (ServiceImage::create($params)) {
                Session::flash('success', 'Image has been uploaded');
            } else {
                Session::flash('error', ' Image could not be uploaded');
            }

            return redirect('admin/services/'. $id . '/images');
            
        }
    }


    public function remove_image($id)
    {
        $image = ServiceImage::findOrFail($id);

        if ($image->delete()) {
            Session::flash('success','Image has been deleted');
        }

        return redirect('admin/services/'. $image->service->id .'/images');
    }
}
