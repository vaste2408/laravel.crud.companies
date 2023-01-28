<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Employee;

class DatatableDataService
{
    public static function getEmployeesData(Company $company = null)
    {
        $data = Employee::join('companies', 'companies.id', '=', 'employees.company_id');
        if ($company) {
            $data = $data->where(['companies.id' => $company->id]);
        }
        $data = $data->get(['employees.id', 'employees.name', 'employees.email', 'employees.phone', 'companies.name as company']);
        //I don't really like that markup nesting from controller, but I can't see any alternatives
        return datatables()
            ->of($data)
            ->addColumn('actions', '
            {{
                view("components.datatable.dt_buttons",
                ["routeShowName" => "employees.show", "routeEditName" => "employees.edit",
                "routeDestroyName" => "employees.destroy", "id" => $id])
            }}
            ')
            ->rawColumns(['actions'])
            ->toJson();
    }

    public static function getCompaniesData()
    {
        $data = Company::all();
        //I don't really like that markup nesting from controller, but I can't see any alternatives
        return datatables()
            ->of($data)
            ->addColumn('actions', '
            {{
                view("components.datatable.dt_buttons",
                ["routeShowName" => "companies.show", "routeEditName" => "companies.edit",
                "routeDestroyName" => "companies.destroy", "id" => $id])
            }}
            ')
            ->rawColumns(['actions'])
            ->toJson();
    }
}
