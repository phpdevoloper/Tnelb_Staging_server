@include('admin.include.top')
@include('admin.include.header')
@include('admin.include.navbar')
<style>
    .president-dashboard-card {
        border: 1px solid #a7a7a7 !important;
    }

    .president-dashboard-card .card-header {
        border-bottom: 1px solid #a7a7a7 !important;
    }

    .bg-custom-card {
        background-color: rgb(239 241 243) !important;
    }
</style>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
             <!--  BEGIN BREADCRUMBS  -->
             <div class="secondary-nav">
                <div class="breadcrumbs-container" data-page-heading="Analytics">
                    <header class="header navbar navbar-expand-sm">
                        <a href="#" class="btn-toggle sidebarCollapse" data-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </a>
                        <div class="d-flex breadcrumb-content">
                            <div class="page-header d-flex flex-column">
                                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span class="mx-1">/</span>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Completed Applications
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </header>
                </div>
            </div>
            <!--  END BREADCRUMBS  -->
            <div class="row dashboard" style="margin-top: 10px;">
                @if(!empty($competencyCards))
                    <div class="col-xl-4 col-lg-12 mb-4">
                        <div class="card h-100 shadow-none rounded-3 overflow-hidden president-dashboard-card">
                            <div class="card-header d-flex justify-content-between align-items-center border-0 border-bottom bg-info">
                                <h5 class="mb-0 text-white">Competency Certificates</h5>
                            </div>
                            <div class="card-body" style="padding: 7px 10px;">
                                @foreach(collect($competencyCards) as $summary)
                                    @php
                                        $badgeClass = $formColors[$summary['color_code'] ?? ''] ?? 'bg-secondary';
                                    @endphp
                                    <div class="d-flex align-items-center px-3 py-2 mb-1 rounded-3 bg-custom-card">
                                        @php
                                            // For contractor Form A cards, clicking "NEW/RENEWAL" should filter
                                            // contractor list by appl_type (N/R) based on staff role.
                                            $isFormAContractor = str_contains(mb_strtolower($summary['licence_name'] ?? ''), 'contractor')
                                                && strtoupper($summary['form_name'] ?? '') === 'FORM A';

                                            $roleName = $staff->name ?? '';
                                            $newHref = route('admin.view_applications', ['form_id' => $summary['id'], 'form_type' => 'N']);
                                            $renewHref = route('admin.view_applications', ['form_id' => $summary['id'], 'form_type' => 'R']);
                                            $rawCode = strtoupper((string) ($summary['form_name'] ?? ''));
                                            $compactCode = preg_replace('/[^A-Z0-9]/', '', $rawCode);
                                            $formCode = $compactCode !== '' ? substr($compactCode, -1) : '?';
                                        @endphp
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <div class="rounded-3 d-flex align-items-center justify-content-center {{ $badgeClass }}" style="width: 44px; height: 44px;">
                                                        <span class="fw-bold text-white">{{ $formCode }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="fw-semibold">{{ $summary['licence_name'] ?? 'Unknown Licence' }}</div>
                                                    <small class="text-muted d-block mb-1">{{ $summary['form_name'] ?? '-' }}</small>
                                                    <div class="d-flex flex-wrap align-items-center gap-3 mt-1">
                                                        @php
                                                            $completedTotal = (int) ($summary['completed_new_count'] ?? 0) + (int) ($summary['completed_renewal_count'] ?? 0);
                                                        @endphp
                                                        <a href="{{ $newHref }}"
                                                            class="badge outline-badge-info fw-semibold text-decoration-none">
                                                            Completed
                                                            <span class="ms-1 fw-bold text-danger">
                                                                {{ $completedTotal }}
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                
                @if(!empty($contractorCards))
                <div class="col-xl-4 col-lg-12 mb-4">
                    <div class="card h-100 shadow-none rounded-3 overflow-hidden president-dashboard-card">
                        <div class="card-header d-flex justify-content-between align-items-center border-0 border-bottom bg-info">
                            <h5 class="mb-0 text-white">Contractor Licences</h5>
                        </div>
                        <div class="card-body" style="padding: 7px 10px;">
                            @foreach(collect($contractorCards) as $summary)
                            <div class="d-flex align-items-center px-3 py-2 mb-1 rounded-3 bg-custom-card">
                                @php
                                    // For contractor Form A cards, clicking "New" should go to the
                                    // existing Form A applications list (/admin/view_form/A).
                                    $isFormAContractor = str_contains(mb_strtolower($summary['licence_name'] ?? ''), 'contractor')
                                        && strtoupper($summary['form_name'] ?? '') === 'FORM A';

                                    $newHref = $isFormAContractor
                                        ? route('admin.view_form', ['type' => 'A'])
                                        : route('admin.view_applications', ['form_id' => $summary['id'], 'form_type' => 'N']);
                                    $renewHref = $isFormAContractor
                                        ? route('admin.view_form', ['type' => 'A'])
                                        : route('admin.view_applications', ['form_id' => $summary['id'], 'form_type' => 'R']);
                                @endphp
                                @php
                                    $rawCode = strtoupper((string) ($summary['form_name'] ?? ''));
                                    $compactCode = preg_replace('/[^A-Z0-9]/', '', $rawCode);
                                    $formCode = $compactCode !== '' ? substr($compactCode, -1) : '?';
                                @endphp
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="rounded-3 d-flex align-items-center justify-content-center bg-primary" style="width: 44px; height: 44px;">
                                                <span class="fw-bold text-white">{{ $formCode }}</span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold">{{ $summary['licence_name'] ?? 'Unknown Licence' }}</div>
                                            <small class="text-muted d-block mb-1">{{ $summary['form_name'] ?? '-' }}</small>
                                            <div class="d-flex flex-wrap align-items-center gap-2 mt-1">
                                                @php
                                                    $completedTotal = (int) ($summary['completed_new_count'] ?? 0) + (int) ($summary['completed_renewal_count'] ?? 0);
                                                @endphp
                                                <a href="{{ $newHref }}"
                                                    class="badge outline-badge-info fw-semibold text-decoration-none">
                                                    Completed
                                                    <span class="ms-1 fw-bold text-danger">
                                                        {{ $completedTotal }}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if(!empty($amendmentCards))
                <div class="col-xl-4 col-lg-12 mb-4">
                    <div class="card h-100 shadow-none rounded-3 overflow-hidden president-dashboard-card">
                        <div class="card-header d-flex justify-content-between align-items-center border-0 border-bottom bg-info">
                            <h5 class="mb-0 text-white">Amendments</h5>
                        </div>
                        <div class="card-body" style="padding: 7px 10px;">
                            @foreach(collect($amendmentCards) as $summary)
                            <div class="d-flex align-items-center px-3 py-2 mb-1 rounded-3 bg-custom-card">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-semibold">{{ $summary['licence_name'] ?? 'Unknown Licence' }}</div>
                                            <small class="text-muted">{{ $summary['form_name'] ?? '-' }}</small>
                                        </div>
                                        <div class="text-end">
                                            <div class="d-flex align-items-center gap-2">
                                                @php
                                                    $newHref = route('admin.view_applications', ['form_id' => $summary['id'], 'form_type' => 'N']);
                                                    $renewHref = route('admin.view_applications', ['form_id' => $summary['id'], 'form_type' => 'R']);
                                                    $completedTotal = (int) ($summary['completed_new_count'] ?? 0) + (int) ($summary['completed_renewal_count'] ?? 0);
                                                @endphp
                                                <a href="{{ $newHref }}"
                                                    class="badge outline-badge-info fw-semibold text-decoration-none">
                                                    Completed
                                                    <span class="ms-1 fw-bold text-danger">
                                                        {{ $completedTotal }}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @php
                //var_dump($staff->name);die;
            @endphp
            @if(in_array($staff->name ?? '', ['Secretary', 'President'], true))
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info">
                            <h5 class="mb-0 text-white">Completed Applications</h5>
                        </div>
                        <div class="card-body" style="padding: 5px 15px;">
                            <div class="table-responsive">
                                <table id="secretary-inprogress-table" class="table dt-table-hover table-striped table-bordered zero-config" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Application Id</th>
                                            <th>Applicant's Name</th>
                                            <th>Applied On</th>
                                            <th>Status</th>
                                            <th>Licence No</th>
                                            <th>Issued At</th>
                                            <th>Expires At</th>
                                            <th>License</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @include('admin.include.footer')
</div>

