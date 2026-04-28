<?php

namespace App\Http\Controllers\Admin;

use App\Models\EA_Application_model;
use App\Models\ESA_Application_model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditorController extends Controller
{
    public function index()
    {
        $applications = DB::table('tnelb_application_tbl')
            ->select('*')
            ->get();

        return view('admin.dashboards.auditor', compact('applications'));
    }

    public function view(Request $request)
    {
        $formId = $request->query('form_id');

        // Assistant Secretary view: applications forwarded by Supervisor (processed_by='S') with status 'F'.
        $new_applications = DB::table('tnelb_application_tbl as ta')
            ->where('ta.appl_type', 'N')
            ->where('ta.form_id', $formId)
            ->whereIn('ta.status', ['F'])
            ->where('ta.processed_by', 'S')
            ->select('ta.*')
            ->orderByDesc('ta.id')
            ->get();

        $renewal_applications = DB::table('tnelb_application_tbl as ta')
            ->where('ta.appl_type', 'R')
            ->where('ta.form_id', $formId)
            ->whereIn('ta.status', ['F'])
            ->where('ta.processed_by', 'S')
            ->select('ta.*')
            ->orderByDesc('ta.id')
            ->get();

        return view('admin.auditor.view', compact('new_applications', 'renewal_applications'));
    }
    public function view_completed(Request $request)
    {

        $formId = $request->query('form_id');

        $workflows = DB::table('tnelb_application_tbl as ta')
            ->whereIn('ta.processed_by', ['AS', 'SE', 'PR'])
            ->where('ta.form_id', $formId)
            ->where(function ($query) {
                $query->where('ta.status', 'A')
                    ->orWhere('ta.status', 'F');
            })
            ->select('ta.*')
            ->orderByDesc('ta.id')
            ->get();

        return view('admin.supervisor.completed', compact('workflows'));
    }

    public function view_forma_pending($type)
    {
        // Assistant Secretary should see Form A contractor applications that have been
        // forwarded by Supervisor (processed_by='S', status F/RF).
        $workflows_ea = DB::table('tnelb_ea_applications')
            ->where('form_name', 'A')
            ->whereIn('application_status', ['F', 'RF'])
            ->where('processed_by', 'S')
            ->orderBy('dt_submit', 'DESC')
            ->get();

        return view('admin.auditor.view_forma', compact('workflows_ea'));
    }



    public function view_forma_completed()
    {
        $userRole = Auth::user()->roles_id;

        $workflows = EA_Application_model::whereIn('application_status', ['F', 'A', 'RE', 'SPRE'])
            ->whereIn('processed_by', ['AS', 'SE', 'PR', 'SPRE'])
            ->orderby('updated_at', 'DESC')
            ->select('*')
            ->get();

        $applicationIds = $workflows->pluck('application_id');

        $licenses = DB::table('tnelb_license')
            ->whereIn('application_id', $applicationIds)
            ->select('application_id', 'license_number')
            ->get()
            ->keyBy('application_id');

        $renewalLicenses = DB::table('tnelb_renewal_license')
            ->whereIn('application_id', $applicationIds)
            ->select('application_id', 'license_number')
            ->get()
            ->keyBy('application_id');


        return view('admin.auditor.completed_forma', compact(
            'workflows',
            'licenses',
            'renewalLicenses'
        ));
    }

    public function view_rejected(Request $request)
    {

        $page_title = 'Rejected';
        $formId = $request->query('form_id');

        $workflows = DB::table('tnelb_application_tbl as ta')
            ->where('ta.form_id', $formId)
            ->where('ta.status', 'RJ')
            ->select('ta.*')
            ->get();

        return view('admin.supervisor.rejected', compact('workflows', 'page_title'));
    }
}
