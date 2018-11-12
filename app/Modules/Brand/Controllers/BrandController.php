<?php

namespace App\Modules\Brand\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Brand\Models\Brand;
use Illuminate\Support\Facades\Validator;
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
       $this->brandObj = new Brand(); 
        if (!empty($brand_id)) {
            try {
                $brand_id = Crypt::decrypt($brand_id);
                $check= $this->brandObj->findBrandId($brand_id);
                if (is_int($brand_id) && $check > 0) {
                    $data['brand'] = $this->brandObj->findBrandId($brand_id);
                    return view("Brand::editBrand", $data);
                } else {
                    return redirect()->back()->withErrors(__('messages.Id_incorrect'));
                }
            } catch (DecryptException $e) {
                return view("admin.errors");
            }
        } else {
            return view("Brand::addBrand");
        }
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
      $rules = array(
            'brand_name'   => 'required|max:50',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $requestData = array(
                'brand_name'    => $request->input('brand_name'),
                'is_deleted'=>2,
            );
            if (empty($brand_id)) {
                $Brand = Brand::insert($requestData);
                if ($Brand) {
                    return redirect()->route('brand.index')->with('message', __('messages.Record_added'));
                } else {
                    return redirect()->back()->withInput()->withErrors(__('messages.try_again'));
                }
            } else {
                $brand_id = Crypt::decrypt($brand_id);
                if (is_int($brand_id)) {
                    $Brand = Brand::where(array('id' => $brand_id))->update($requestData);
                    return redirect()->route('brand.index')->with('message', __('messages.Record_updated'));
                } else {
                    return redirect()->back()->withInput()->withErrors(__('messages.try_again'));
                }
            }
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
        return redirect()->route('brand.index')->with('message', __('messages.Record_delete'));
    }
}
