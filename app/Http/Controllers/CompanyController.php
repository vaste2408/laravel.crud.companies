<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\DatatableDataService;
use App\Services\FileUploadService;

class CompanyController extends Controller
{
    /**
     * Companies index page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('companies.index');
    }

    /**
     * Data for datatable
     * @return \Illuminate\Http\JsonResponse
     * @throws \Yajra\DataTables\Exceptions\Exception
     */
    public function data()
    {
        return DatatableDataService::getCompaniesData();
    }

    /**
     * Data for company employees
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function employeesData(Company $company)
    {
        return DatatableDataService::getEmployeesData($company);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = FileUploadService::getFileData($request);
        Company::create($data);
        return redirect()->route('companies')->with('success', 'Company created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Company $company)
    {
        return view('companies.info', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company)
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
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies')
            ->with('success','Company deleted');
    }
}
