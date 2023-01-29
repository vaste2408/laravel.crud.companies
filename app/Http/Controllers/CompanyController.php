<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\DatatableDataService;
use App\Services\FileUploadService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Exceptions\Exception;

class CompanyController extends Controller
{
    /**
     * Companies index page
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('companies.index');
    }

    /**
     * Data for datatable
     * @return JsonResponse
     * @throws Exception
     */
    public function data(): JsonResponse
    {
        return DatatableDataService::getCompaniesData();
    }

    /**
     * Data for company employees
     * @param Company $company
     * @return JsonResponse
     * @throws Exception
     */
    public function employeesData(Company $company): JsonResponse
    {
        return DatatableDataService::getEmployeesData($company);
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCompanyRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['logo'] = FileUploadService::getFileData($request);
        Company::create($data);
        return redirect()->route('companies')->with('success', 'Company created');
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     */
    public function show(Company $company): View|Factory|Application
    {
        return view('companies.info', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     */
    public function edit(Company $company): View|Factory|Application
    {
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $data = $request->validated();
        $data['logo'] = FileUploadService::getFileData($request);
        if (empty($data['logo'])) {
            $data['logo'] = $request->old_logo;
        }
        $company->update($data);
        return redirect()->route('companies')->with('success', 'Company updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();
        return redirect()->route('companies')
            ->with('success','Company deleted');
    }
}
