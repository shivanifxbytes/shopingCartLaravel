<?php

namespace App\Modules\Brand\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Config;

/**
 * Brand
 *
 * @package                
 * @subpackage             Brand
 * @category               Model
 * @DateOfCreation         1 Nov 2018
 * @ShortDescription       The model is is connected to the brand table and you can perform
 *                         relevant operation with respect to this class
 */
class Brand extends Model {

	 /**
    *@ShortDescription Table for the users.
    *
    * @var String
    */
    protected $table = 'brand';

    /**
     * @DateOfCreation         1 Nov 2018
     * @ShortDescription       This function select all data from brand table
     * @return                 result array
     */
    public function selectBrand()
    {
        return DB::table('brand')->get();
    }

    /**
    * @DateOfCreation         27 Aug 2018
    * @ShortDescription       This function selects the specified data from table
    * @return                 result
    */
    public function findBrandId($brand_id)
    {
        return DB::table('brand')
        ->where('id', '=', $brand_id)->get()->toArray();
    }

 /**
    * @DateOfCreation         27 oct 2018
    * @ShortDescription       This function delete the specified row from table
    * @return                 result
    */
   public static function deleteBrand($brand_id)
   {
     return DB::table('brand')->where('id', '=', $brand_id)->delete();
   }

    /**
    * @DateOfCreation         27 oct 2018
    * @ShortDescription       This function delete the specified row from table
    * @return                 result
    */
   public function selectPostBrand($id, $brand_id)
   {
 return DB::table('brand')->select('brand_id', 'brand_name')
            ->where('brand_id', '=', $brand_id)
            ->get()->toArray();
   }
}



