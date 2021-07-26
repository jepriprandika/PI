<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Cart::getContent();
        $this-> data['items'] = $items;

        return $this->load_theme('carts.index', $this->data);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->except('_token');

        $service = Service::findOrFail($params['service_id']);
        $slug = $service->slug;

        if ($service->configurable()) {
            $service = Service::from('services as p')
                            ->whereRaw("p.parent_id = :parent_service_id
                                ", [
                                    'parent_service_id' => $service->id,
                                ])->firstOrFail();
        }

        $item = [
            'id' => md5($service->id),
            'name' => $service->name,
            'price' => $service->price,
            'quantity' => $params['qty'],
            'associatedModel' => $service,
        ];

        \Cart::add($item);

        \Session::flash('success', 'service '. $item['name'] .' has been added to cart');
        return redirect('/service/'. $slug);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $params = $request->except('_token');

        if ($items = $params['items']) {
            foreach($items as $cartID => $item) {
                \Cart::update($cartID, [
                    'quantity'=>[
                        'relative' => false,
                        'value' => $item['quantity'],
                    ],
                ]);
            }

            \Session::flash('success', 'The cart has been updated');
            return redirect('carts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);

        return redirect('carts');
    }
}
