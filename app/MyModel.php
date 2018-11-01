<?php

namespace App;
use Illuminate\Support\Facades\DB;

class MyModel 
{
    public static function select($table_name = '', $select_array = [], $where_array = [])
    {
        $result = DB::table($table_name)->select($select_array)->where($where_array)->get();
        return $result;
    }
    public static function insert($table_name = '',$insert_array = [])
    {
    	 DB::table($table_name)->insert($insert_array);
    }
    public static function update($table_name = '',$update_array = [], $where_array = [])
    {
    	     DB::table($table_name)->where($where_array)->update($update_array);
    }
}
