<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Exceptions\Exception;

class DatatableDataService
{
    /**
     * Form json for employees datatable
     * @param Company|null $company
     * @return JsonResponse
     * @throws Exception
     */
    public static function getEmployeesData(Company $company = null): JsonResponse
    {
        $where = $company ? ['company_id' => $company->id] : [];
        $data = Employee::where($where)->with('company')->get();
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

    /**
     * Form json for companies datatable
     * @return JsonResponse
     * @throws Exception
     */
    public static function getCompaniesData(): JsonResponse
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
