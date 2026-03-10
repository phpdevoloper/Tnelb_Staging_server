@include('admin.include.top')
@include('admin.include.header')
@include('admin.include.navbar')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <div class="row layout-top-spacing">
                <div class="col-12 mb-4">
                    <h4>Completed Applications</h4>
                </div>

                <div class="col-12">
                    <div class="row g-3">
                        @if(!empty($competencyCards))
                            <div class="col-12 mb-4">
                                <div class="rounded border bg-white shadow-sm p-3 p-md-4">
                                    <div class="mb-3">
                                        <div class="bg-light shadow-sm py-2 px-3 mb-3">
                                            <p class="mb-0 fw-semibold fs-4">Competency Certificates</p>
                                        </div>
                                    </div>
                                    <div class="row g-2 g-md-3">
                                        @foreach(collect($competencyCards) as $summary)
                                            @php
                                                $badgeClass = $formColors[$summary['color_code'] ?? ''] ?? 'bg-secondary';
                                            @endphp
                                            <div class="col-12 col-sm-6 col-md-4 col-xl-3 min-w-0">
                                                <div class="p-3 rounded text-white {{ $badgeClass }} h-100 d-flex flex-column justify-content-between shadow-sm min-h-0">
                                                    <div class="mb-2 mb-md-3 overflow-hidden">
                                                        <h5 class="mb-1 fw-bold text-white text-break">{{ $summary['licence_name'] ?? 'Unknown Licence' }}</h5>
                                                        <span class="text-uppercase small fw-semibold d-block text-white">{{ $summary['form_name'] ?? '-' }}</span>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-1 gap-sm-2 justify-content-center">
                                                        <a href="{{ route('admin.view_completed_applications', ['form_id' => $summary['id'], 'form_type' => 'N']) }}"
                                                           class="badge rounded-pill bg-white text-dark px-2 px-sm-3 py-1 py-sm-2 d-inline-flex align-items-center gap-1 shadow-sm text-decoration-none">
                                                            <span class="small fw-semibold text-uppercase">New</span>
                                                            <span class="badge rounded-pill {{ (($summary['completed_new_count'] ?? 0) > 0) ? 'bg-success text-white' : 'bg-secondary text-white' }}">
                                                                {{ $summary['completed_new_count'] ?? 0 }}
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('admin.view_completed_applications', ['form_id' => $summary['id'], 'form_type' => 'R']) }}"
                                                           class="badge rounded-pill bg-white text-dark px-2 px-sm-3 py-1 py-sm-2 d-inline-flex align-items-center gap-1 shadow-sm text-decoration-none">
                                                            <span class="small fw-semibold text-uppercase">Renewal</span>
                                                            <span class="badge rounded-pill {{ (($summary['completed_renewal_count'] ?? 0) > 0) ? 'bg-success text-white' : 'bg-secondary text-white' }}">
                                                                {{ $summary['completed_renewal_count'] ?? 0 }}
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($contractorCards))
                            <div class="col-12 mb-4">
                                <div class="rounded border bg-white shadow-sm p-3 p-md-4">
                                    <div class="mb-3">
                                        <div class="bg-light shadow-sm py-2 px-3 mb-3">
                                            <p class="mb-0 fw-semibold fs-4">Contractor Licences</p>
                                        </div>
                                    </div>
                                    <div class="row g-2 g-md-3">
                                        @foreach(collect($contractorCards) as $summary)
                                            @php
                                                $badgeClass = $formColors[$summary['color_code'] ?? ''] ?? 'bg-secondary';
                                            @endphp
                                            <div class="col-12 col-sm-6 col-md-4 col-xl-3 min-w-0">
                                                <div class="p-3 rounded text-white {{ $badgeClass }} h-100 d-flex flex-column justify-content-between shadow-sm min-h-0">
                                                    <div class="mb-2 mb-md-3 overflow-hidden">
                                                        <h5 class="mb-1 fw-bold text-white text-break">{{ $summary['licence_name'] ?? 'Unknown Licence' }}</h5>
                                                        <span class="text-uppercase small fw-semibold d-block text-white">{{ $summary['form_name'] ?? '-' }}</span>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-1 gap-sm-2 justify-content-center">
                                                        <a href="{{ route('admin.view_completed_applications', ['form_id' => $summary['id'], 'form_type' => 'N']) }}"
                                                           class="badge rounded-pill bg-white text-dark px-2 px-sm-3 py-1 py-sm-2 d-inline-flex align-items-center gap-1 shadow-sm text-decoration-none">
                                                            <span class="small fw-semibold text-uppercase">New</span>
                                                            <span class="badge rounded-pill {{ (($summary['completed_new_count'] ?? 0) > 0) ? 'bg-success text-white' : 'bg-secondary text-white' }}">
                                                                {{ $summary['completed_new_count'] ?? 0 }}
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('admin.view_completed_applications', ['form_id' => $summary['id'], 'form_type' => 'R']) }}"
                                                           class="badge rounded-pill bg-white text-dark px-2 px-sm-3 py-1 py-sm-2 d-inline-flex align-items-center gap-1 shadow-sm text-decoration-none">
                                                            <span class="small fw-semibold text-uppercase">Renewal</span>
                                                            <span class="badge rounded-pill {{ (($summary['completed_renewal_count'] ?? 0) > 0) ? 'bg-success text-white' : 'bg-secondary text-white' }}">
                                                                {{ $summary['completed_renewal_count'] ?? 0 }}
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($amendmentCards))
                            <div class="col-12">
                                <div class="rounded border bg-white shadow-sm p-3 p-md-4">
                                    <div class="mb-3">
                                        <div class="bg-light shadow-sm py-2 px-3 mb-3">
                                            <p class="mb-0 fw-semibold fs-4">Amendments</p>
                                        </div>
                                    </div>
                                    <div class="row g-2 g-md-3">
                                        @foreach(collect($amendmentCards) as $summary)
                                            @php
                                                $badgeClass = $formColors[$summary['color_code'] ?? ''] ?? 'bg-secondary';
                                            @endphp
                                            <div class="col-12 col-sm-6 col-md-4 col-xl-3 min-w-0">
                                                <div class="p-3 rounded text-white {{ $badgeClass }} h-100 d-flex flex-column justify-content-between shadow-sm min-h-0">
                                                    <div class="mb-2 mb-md-3 overflow-hidden">
                                                        <h5 class="mb-1 fw-bold text-white text-break">{{ $summary['licence_name'] ?? 'Unknown Licence' }}</h5>
                                                        <span class="text-uppercase small fw-semibold d-block text-white">{{ $summary['form_name'] ?? '-' }}</span>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-1 gap-sm-2 justify-content-center">
                                                        <a href="{{ route('admin.view_completed_applications', ['form_id' => $summary['id'], 'form_type' => 'N']) }}"
                                                           class="badge rounded-pill bg-white text-dark px-2 px-sm-3 py-1 py-sm-2 d-inline-flex align-items-center gap-1 shadow-sm text-decoration-none">
                                                            <span class="small fw-semibold text-uppercase">New</span>
                                                            <span class="badge rounded-pill {{ (($summary['completed_new_count'] ?? 0) > 0) ? 'bg-success text-white' : 'bg-secondary text-white' }}">
                                                                {{ $summary['completed_new_count'] ?? 0 }}
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('admin.view_completed_applications', ['form_id' => $summary['id'], 'form_type' => 'R']) }}"
                                                           class="badge rounded-pill bg-white text-dark px-2 px-sm-3 py-1 py-sm-2 d-inline-flex align-items-center gap-1 shadow-sm text-decoration-none">
                                                            <span class="small fw-semibold text-uppercase">Renewal</span>
                                                            <span class="badge rounded-pill {{ (($summary['completed_renewal_count'] ?? 0) > 0) ? 'bg-success text-white' : 'bg-secondary text-white' }}">
                                                                {{ $summary['completed_renewal_count'] ?? 0 }}
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(empty($competencyCards) && empty($contractorCards) && empty($amendmentCards))
                            <div class="col-12">
                                <div class="alert alert-info mb-0">No completed applications to display.</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.include.footer')
</div>

