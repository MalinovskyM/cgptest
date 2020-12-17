<?php


namespace App\Repositories;


use App\Helper\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseRepository
{
    protected $model;
    protected $rule;

    public function all()
    {
        return $this->model::all();
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function validate(Request $data, $exceptions = null)
    {
        if ($exceptions == null) {
            $input = $data->all();
        } else {
            $input = $data->only($exceptions);
        }
        $validator = Validator::make($input,$this->rule);
        if( $validator->fails() ) {
            return $validator->errors();
        }

        return $input;
    }
}
