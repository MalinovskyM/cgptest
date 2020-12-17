<?php


namespace App\Repositories;


class CompanyRepository extends BaseRepository
{
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function rule($rule = null)
    {
        if ($rule == null) {
            $this->rule = [
                "name"  => "required",
                "email" => "email:rfc,dns"
                ];
        }else{
            $this->rule = $rule;
        }
    }

    public function checkAndCreate($data)
    {
        $company = $this->create($data);

        return $company;
    }

    public function checkAndUpdate($id, $data)
    {
        $company = $this->update($id,$data);

        return $company;
    }

    public function checkAndDestroy($id)
    {
        $company = $this->destroy($id);

        return $company;
    }
}
