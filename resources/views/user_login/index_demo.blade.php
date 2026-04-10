@extends('layouts.app')

@section('title', 'Cloud Unit Code')

@push('styles')
<style>
    .demo-cloud-page {
        font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        font-size: 14px;
        background-color: #f0f2f5;
        min-height: 100vh;
    }

    .demo-topbar {
        background-color: #1a3a5c;
        color: #fff;
        padding: 0.65rem 1.25rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .demo-topbar-title {
        font-size: 1.05rem;
        font-weight: 700;
        margin: 0;
    }

    .demo-breadcrumb {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.92);
        margin: 0;
    }

    .demo-breadcrumb a {
        color: rgba(255, 255, 255, 0.92);
        text-decoration: none;
    }

    .demo-breadcrumb a:hover {
        text-decoration: underline;
    }

    .demo-sidebar {
        background: linear-gradient(180deg, #d6e8f5 0%, #e8f2fa 100%);
        border-right: 1px solid #c5d9e8;
        min-height: calc(100vh - 48px);
        padding: 0;
    }

    .demo-sidebar h6 {
        font-size: 15px;
        font-weight: 700;
        color: #1a3a5c;
        padding: 1rem 1rem 0.5rem;
        margin: 0;
    }

    .demo-sidebar .nav-link {
        color: #1a3a5c;
        font-size: 13px;
        padding: 0.45rem 1rem 0.45rem 1.25rem;
        border-left: 4px solid transparent;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .demo-sidebar .nav-link:hover {
        background: rgba(26, 58, 92, 0.08);
    }

    .demo-sidebar .nav-link.active {
        background: rgba(26, 58, 92, 0.15);
        border-left-color: #1a3a5c;
        font-weight: 600;
    }

    .demo-sidebar .sub-nav .nav-link {
        padding-left: 2rem;
        font-size: 12px;
    }

    .demo-sidebar .sub-nav .nav-link::before {
        content: '\f105';
        font-family: FontAwesome;
        margin-right: 0.35rem;
        font-size: 11px;
        color: #1a3a5c;
    }

    .demo-main {
        padding: 1.25rem 1.5rem;
        background-color: #f0f2f5;
    }

    .demo-info-card {
        background: #fff;
        border: 1px solid #7eb8d9;
        border-radius: 4px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.25rem;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
    }

    .demo-info-card .info-label {
        font-size: 15px;
        font-weight: 700;
        color: #333;
    }

    .demo-info-card .info-value {
        font-size: 15px;
        color: #333;
    }

    .demo-info-card a.account-link {
        color: #0d6efd;
        font-weight: 500;
    }

    .demo-info-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.55rem 1.25rem;
    }

    .demo-info-field {
        min-width: 0;
    }

    .demo-info-field .info-label {
        display: inline-block;
        margin-right: 0.35rem;
    }

    .demo-info-field--full {
        grid-column: 1 / -1;
    }

    @media (max-width: 1199.98px) {
        .demo-info-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767.98px) {
        .demo-info-grid {
            grid-template-columns: 1fr;
            gap: 0.45rem 0;
        }
    }

    .demo-btn-signup {
        border: 2px solid #1a6b6b;
        color: #1a6b6b;
        background: #fff;
        font-size: 13px;
        font-weight: 500;
        padding: 0.35rem 1rem;
        border-radius: 1.5rem;
    }

    .demo-btn-signup:hover {
        background: #1a6b6b;
        color: #fff;
        border-color: #1a6b6b;
    }

    .demo-table-toolbar {
        background-color: #1a3a5c;
        color: #fff;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 14px;
        font-weight: 500;
    }

    .demo-table-toolbar .toolbar-icons {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }

    .demo-table-toolbar .toolbar-icons button {
        background: transparent;
        border: none;
        color: #fff;
        padding: 0.25rem;
        opacity: 0.95;
    }

    .demo-table-toolbar .toolbar-icons button:hover {
        opacity: 1;
    }

    .demo-table-wrap {
        background: #fff;
        border: 1px solid #dee2e6;
        border-top: none;
    }

    .demo-table-wrap table {
        margin-bottom: 0;
        font-size: 13px;
    }

    .demo-table-wrap thead th {
        background-color: #1a3a5c;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        border-color: #1a3a5c;
        padding: 0.65rem 0.75rem;
        white-space: nowrap;
    }

    .demo-table-wrap tbody td {
        padding: 0.65rem 0.75rem;
        vertical-align: middle;
        font-size: 13px;
        color: #333;
    }

    .demo-table-wrap tbody tr {
        border-bottom: 1px solid #e9ecef;
    }

    .demo-code-link {
        color: #0d6efd;
        font-weight: 500;
        text-decoration: none;
    }

    .demo-code-link:hover {
        text-decoration: underline;
    }

    .badge-status-active {
        background-color: #28a745 !important;
        font-size: 11px;
        font-weight: 600;
        padding: 0.35em 0.65em;
    }

    .badge-status-closed {
        background-color: #dc3545 !important;
        font-size: 11px;
        font-weight: 600;
        padding: 0.35em 0.65em;
    }

    .closed-subdate {
        display: block;
        font-size: 11px;
        color: #6c757d;
        font-weight: 400;
        margin-top: 2px;
    }

    .demo-table-footer {
        background: #fff;
        border: 1px solid #dee2e6;
        border-top: none;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 13px;
        color: #333;
    }

    .demo-table-footer select {
        width: auto;
        font-size: 13px;
        padding: 0.2rem 1.75rem 0.2rem 0.5rem;
    }

    .demo-action-btn {
        background: none;
        border: none;
        color: #495057;
        font-size: 18px;
        line-height: 1;
        padding: 0.15rem 0.35rem;
    }

    .demo-action-btn:hover {
        color: #1a3a5c;
    }
</style>
@endpush

@section('content')
<div class="demo-cloud-page">
    <header class="demo-topbar">
        <h1 class="demo-topbar-title">{{ $pageTitle ?? 'Cloud Unit Code' }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="demo-breadcrumb list-inline mb-0">
                <li class="list-inline-item"><a href="#">{{ $breadcrumbHome ?? 'Home' }}</a></li>
                <li class="list-inline-item">&gt;&gt;</li>
                <li class="list-inline-item"><a href="#">{{ $breadcrumbDashboard ?? 'My Dashboard' }}</a></li>
                <li class="list-inline-item">&gt;&gt;</li>
                <li class="list-inline-item">{{ $breadcrumbCurrent ?? 'Cloud Unit Code' }}</li>
            </ol>
        </nav>
    </header>

    <div class="container-fluid g-0">
        <div class="row g-0">
            <aside class="col-lg-3 col-xl-2 demo-sidebar">
                <h6>{{ $sidebarHeading ?? 'Services' }}</h6>
                <nav class="nav flex-column pb-3">
                    <a class="nav-link" href="#"><i class="fa fa-home"></i> {{ $navDashboard ?? 'My Dashboard' }}</a>

                    <a class="nav-link" href="#">
                        <i class="fa fa-file-text-o"></i> {{ $navServiceCatalogue ?? 'Service Catalogue' }}
                        <span class="ms-auto"><i class="fa fa-chevron-right small"></i></span>
                    </a>

                    <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> {{ $navMyCart ?? 'My Cart' }}</a>

                    <a class="nav-link active" href="#"><i class="fa fa-cloud"></i> {{ $navCloudUnitCode ?? 'Cloud Unit Code' }}</a>

                    <a class="nav-link" data-bs-toggle="collapse" href="#demoOrdersSubmenu" role="button" aria-expanded="true" aria-controls="demoOrdersSubmenu">
                        <i class="fa fa-cube"></i> {{ $navMyOrders ?? 'My Orders' }}
                        <span class="ms-auto"><i class="fa fa-chevron-down small"></i></span>
                    </a>
                    <div class="collapse show sub-nav" id="demoOrdersSubmenu">
                        @foreach($orderSubmenuItems ?? [
                            'Computing', 'Container', 'External EndPoint', 'Backup', 'Load Balancer',
                            'Public IP (IPv4)', 'Public IP (IPv6)', 'APM', 'RM', 'WAF', 'Data Analytics',
                            'Agile', 'Load Testing', 'AI - Satyapikaanan', 'AI - VANI', 'AI - Panini',
                            'AI - Shruti', 'AI - Saransh',
                        ] as $item)
                            <a class="nav-link" href="#">{{ $item }}</a>
                        @endforeach
                    </div>
                </nav>
            </aside>

            <main class="col-lg-9 col-xl-10 demo-main">
                <div class="demo-info-card">
                    <div class="row align-items-start">
                        <div class="col">
                            <div class="demo-info-grid">
                                <div class="demo-info-field">
                                    <span class="info-label">{{ $labelCloudReg ?? 'Cloud Reg. A/C No.:' }}</span>
                                    <a href="#" class="account-link info-value">{{ $cloudRegAccountNo ?? 'NCS01-20141224-00000973' }}</a>
                                </div>
                                <div class="demo-info-field">
                                    <span class="info-label">{{ $labelProject ?? 'Project:' }}</span>
                                    <span class="info-value">{{ $projectName ?? 'District Portal of India' }}</span>
                                </div>
                                <div class="demo-info-field">
                                    <span class="info-label">{{ $labelProjectDesc ?? 'Project Description:' }}</span>
                                    <span class="info-value">{{ $projectDescription ?? 'GOI Search Project - NIC' }}</span>
                                </div>
                                <div class="demo-info-field demo-info-field--full">
                                    <span class="info-label">{{ $labelOrg ?? 'Project Organisation:' }}</span>
                                    <span class="info-value">{{ $projectOrganisation ?? 'Central, National Informatics Centre (NIC), (Address: NIC, E-Wing, Rajaji Bhavan, Chennai-90, Tamil Nadu)' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto pt-1">
                            <button type="button" class="btn demo-btn-signup">{{ $btnSignupDetails ?? 'View Signup Details' }}</button>
                        </div>
                    </div>
                </div>

                <div class="demo-table-toolbar">
                    <span>{{ $filteredStatusLabel ?? 'Filtered Status: All' }}</span>
                    <div class="toolbar-icons">
                        <button type="button" title="Filter" aria-label="Filter"><i class="fa fa-filter"></i></button>
                        <button type="button" title="Menu" aria-label="Menu"><i class="fa fa-ellipsis-v"></i></button>
                    </div>
                </div>
                <div class="demo-table-wrap table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ $colCloudUnitCode ?? 'Cloud Unit Code' }}</th>
                                <th scope="col">{{ $colCloudLocation ?? 'Cloud Location' }}</th>
                                <th scope="col">{{ $colCreatedDate ?? 'Created Date' }}</th>
                                <th scope="col">{{ $colUnitStatus ?? 'Unit Status' }}</th>
                                <th scope="col" class="text-center">{{ $colAction ?? 'Action' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cloudUnits as $unit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ $unit['code_url'] ?? '#' }}" class="demo-code-link">{{ $unit['code'] }}</a>
                                    </td>
                                    <td>{{ $unit['location'] }}</td>
                                    <td>{{ $unit['created_at'] }}</td>
                                    <td>
                                        @if(($unit['status'] ?? '') === 'closed')
                                            <span class="badge rounded-pill badge-status-closed">{{ $unit['status_label'] ?? 'Closed' }}</span>
                                            @if(!empty($unit['closed_note']))
                                                <span class="closed-subdate">({{ $unit['closed_note'] }})</span>
                                            @endif
                                        @else
                                            <span class="badge rounded-pill badge-status-active">{{ $unit['status_label'] ?? 'Active' }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="demo-action-btn" type="button" id="cloudUnitActions{{ $loop->index }}" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" aria-label="Actions">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="cloudUnitActions{{ $loop->index }}">
                                                @foreach($cloudUnitActions ?? [
                                                    'View Cloud Unit Details',
                                                    'View Resource Details',
                                                    'Close CUC',
                                                    'View vLAN IPs Details',
                                                ] as $actionLabel)
                                                    <li><a class="dropdown-item" href="#">{{ $actionLabel }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="demo-table-footer">
                    <select class="form-select form-select-sm" aria-label="Records per page">
                        @foreach($perPageOptions ?? [10, 20, 50, 100] as $opt)
                            <option value="{{ $opt }}" @if(($defaultPerPage ?? 20) == $opt) selected @endif>{{ $opt }}</option>
                        @endforeach
                    </select>
                    <span>
                        {{ $paginationPrefix ?? 'Showing' }}
                        {{ $showingFrom ?? 1 }}
                        {{ $paginationTo ?? 'to' }}
                        {{ $showingTo ?? $cloudUnits->count() }}
                        {{ $paginationOf ?? 'of' }}
                        {{ $totalRecords ?? $cloudUnits->count() }}
                        {{ $paginationSuffix ?? 'records' }}
                    </span>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
