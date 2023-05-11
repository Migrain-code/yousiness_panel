<?php

namespace App\Imports;

use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        //İmport category
        /*if ($row[1] == null){
            return new ServiceCategory([
                'type_id'=>2,
                'name'=>$row[0]
            ]);
        }*/
        //import sub category
        /*if ($row[1] != null){

            $subCategory=new ServiceSubCategory();
            $subCategory->category_id=$row[2];
            $subCategory->name=$row[0];
            $subCategory->save();
        }*/


    }
}
