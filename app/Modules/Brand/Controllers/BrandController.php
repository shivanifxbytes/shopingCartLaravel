<?php

namespace App\Modules\Brand\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\modules\Brand\models\Brand;
use Crypt;

class BrandController extends Controller
{
     /**
     * @DateOfCreation      10-Oct-2018
     * @ShortDescription    Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->brandObj = new Brand();
        //$this->userobj = new User();
    }

    /**
     * @DateOfCreation         1 Nov 2018
     * @ShortDescription       Load brand view with list of all brands
     * @return                 View
     */
    public function index()
    {
        $data['brands'] = $this->brandObj->selectBrand();
        return view("Brand::index", $data);
    }

    /**
     * @DateOfCreation         1 Nov 2018
     * @ShortDescription       Function run according to the parameter If we get ID it will return edit
     *                         view if id = null it will return addflat type view
     * @param integer $id      [user id in case of edit, null in case of add]
     * @return                 View
     */
    public function getBrand($brand_id = null)
    {
        echo "brand";
        die();
       $this->brandObj = new Brand();
        if (!empty($brand_id)) {
            try {
                $brand_id = Crypt::decrypt($brand_id);
                $check= $this->brandObj->findBrandId($brand_id);
                if (is_int($brand_id) && $check > 0) {
                    $data['user'] = $this->dashboardObj->findBrandId($brand_id);
                    return view('admin.editBrand', $data);
                } else {
                    return redirect()->back()->withErrors(__('messages.Id_incorrect'));
                }
            } catch (DecryptException $e) {
                return view("admin.errors");
            }
        } else {
            return view('admin.addBrand');
        }
    }

    /**
     * @DateOfCreation         1 Nov 2018
     * @ShortDescription       Function deteted row of flattype
     * @param integer $id      [user id in case of edit, null in case of add]
     * @return                 result
     */
    public function deleteBrand($brand_id = null)
    {
        $brand_id = Crypt::decrypt($brand_id);
        $delete  = Brand::deleteBrand($brand_id);
        return redirect('Brand::index')->with('message', __('messages.Record_delete'));
    }

     /**
     * @DateOfCreation         1 Nov 2018
     * @ShortDescription       This function handle the post request which get after submit
     *                         and function run according to the parameter if $user_id is NUll
     *                         then it will insert the value If we get ID it will update the value
     *                         according to the ID
     * @param Object  $request [Request Object]
     * @param integer $id      [user id in case of edit, null in case of add]
     * @return                 Response
     */
    public function postBrand(Request $request, $brand_id = null)
    {
echo "postBrand";
die();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
