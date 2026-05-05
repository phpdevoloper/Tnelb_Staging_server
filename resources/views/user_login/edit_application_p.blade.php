@include('include.header')

<style>
    /* ── Reset helpers ────────────────────────────────── */
    .fs-form hr { margin: 0; border: 0; border-top: 1px solid #e3e8f0; }
    .fs-form .form-group { margin-bottom: 0; }

    /* ── SweetAlert overrides ─────────────────────────── */
    .swal2-popup li            { font-size: 15px; margin-bottom: 8px; }
    .swal2-popup li ul         { margin-left: 15px; }

    /* ── Page wrapper ─────────────────────────────────── */
    .fs-page-wrap { background: #f0f4f9; min-height: 100vh; padding-bottom: 48px; }

    /* ── Breadcrumb ───────────────────────────────────── */
    .fs-breadcrumb-bar { background: #fff; border-bottom: 1px solid #e3e8f0; padding: 10px 0; }
    .fs-breadcrumb-bar #breadcrumb,
    .fs-breadcrumb-bar #breadcrumb li,
    .fs-breadcrumb-bar #breadcrumb li a { all: unset; }
    .fs-breadcrumb-bar #breadcrumb { display: flex !important; flex-wrap: wrap; align-items: center; gap: 6px; list-style: none !important; margin: 0 !important; padding: 0 !important; font-size: 0.85rem; background: none !important; }
    .fs-breadcrumb-bar #breadcrumb li { display: flex !important; align-items: center; background: none !important; clip-path: none !important; padding: 0 !important; margin: 0 !important; float: none !important; }
    .fs-breadcrumb-bar #breadcrumb li + li::before { content: '›'; color: #adb5bd; margin-right: 6px; font-size: 1rem; line-height: 1; }
    .fs-breadcrumb-bar #breadcrumb a { color: #035ab3 !important; text-decoration: none !important; font-size: 0.85rem !important; background: none !important; padding: 0 !important; cursor: pointer; }
    .fs-breadcrumb-bar #breadcrumb a:hover { text-decoration: underline !important; }

    /* ── Main card ────────────────────────────────────── */
    .fs-card { background: #fff; border-radius: 12px; box-shadow: 0 2px 16px rgba(3,90,179,.10); overflow: hidden; margin-top: 24px; }

    /* ── Card header ──────────────────────────────────── */
    .fs-card-header { background: linear-gradient(135deg, #035ab3 0%, #0472d9 100%); padding: 10px 24px 6px; position: relative; }
    .fs-card-header .header-titles { text-align: center; }
    .fs-card-header .header-titles h5 { margin: 0 0 2px; font-size: 1.05rem; font-weight: 700; letter-spacing: .5px; color: #fff; text-transform: uppercase; line-height: 1.4; }
    .fs-card-header .header-titles h5.tamil-title { font-size: .98rem; font-weight: 400; opacity: .9; }
    .fs-card-header .header-titles .form-badge { display: inline-block; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.35); color: #fff; border-radius: 20px; padding: 2px 14px; font-size: .82rem; font-weight: 600; margin-top: 4px; letter-spacing: .5px; }
    .fs-card-header .instructions-link { text-align: right; margin-top: 0; margin-bottom: 0; font-size: .82rem; line-height: 1; }
    .fs-card-header .instructions-link a { color: rgba(255,255,255,.9); text-decoration: none; border-bottom: 1px dashed rgba(255,255,255,.5); }
    .fs-card-header .instructions-link a:hover { color: #fff; border-bottom-color: #fff; }

    /* ── Mandatory notice ─────────────────────────────── */
    .fs-mandatory-bar { background: #f8f9ff; border-bottom: 1px solid #e3e8f0; padding: 7px 28px; font-size: .83rem; color: #555; text-align: right; }
    .fs-mandatory-bar .req-dot { color: #d9363e; font-weight: 700; margin-right: 2px; }

    /* ── Returned-application alert ───────────────────── */
    .fs-query-alert { background: #fff8e1; border: 1px solid #f3d896; border-left: 4px solid #e0a800; border-radius: 8px; padding: 14px 18px; margin: 18px 28px 0; }
    .fs-query-alert h6 { margin: 0 0 6px; font-size: .92rem; font-weight: 700; color: #8a6100; }
    .fs-query-alert p { margin: 0 0 6px; font-size: .82rem; color: #5c4400; }
    .fs-query-alert ul { margin: 0; padding-left: 20px; font-size: .82rem; color: #5c4400; }
    .fs-query-alert ul li { margin-bottom: 3px; }

    /* ── Form body ────────────────────────────────────── */
    .fs-form-body { padding: 28px 28px 32px; }

    /* ── Section blocks ───────────────────────────────── */
    .fs-section { background: #f8fafd; border: 1px solid #e3e8f0; border-radius: 8px; margin-bottom: 20px; }
    .fs-section-header { display: flex; align-items: center; gap: 10px; padding: 10px 18px; background: #eef3fb; border-bottom: 1px solid #dde5f3; }
    .fs-section-num { display: inline-flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: 50%; background: #035ab3; color: #fff; font-size: .75rem; font-weight: 700; flex-shrink: 0; }
    .fs-section-title { font-size: .9rem; font-weight: 600; color: #1a2a4a; line-height: 1.35; }
    .fs-section-title .section-req { color: #d9363e; }
    .fs-section-title .section-hint { font-size: .78rem; font-weight: 400; color: #5a7299; margin-left: 4px; }
    .fs-section-tamil { font-size: .8rem; color: #5a7299; line-height: 1.4; margin-top: 1px; }
    .fs-section-body { padding: 18px 18px 14px; }

    /* ── Field rows ───────────────────────────────────── */
    .fs-field-label { font-size: .83rem; font-weight: 600; color: #2c3e5e; margin-bottom: 3px; line-height: 1.3; }
    .fs-field-label .req { color: #d9363e; }
    .fs-field-tamil { font-size: .76rem; color: #7a90b0; margin-bottom: 4px; line-height: 1.3; }
    .fs-form .form-control { border: 1px solid #ccd5e3; border-radius: 6px; font-size: .875rem; height: auto; padding: 7px 11px; transition: border-color .2s, box-shadow .2s; background: #fff; }
    .fs-form .form-control:focus { border-color: #035ab3; box-shadow: 0 0 0 3px rgba(3,90,179,.12); outline: none; }
    .fs-form .form-control[readonly], .fs-form .form-control:disabled { background: #f4f6fb; color: #6b7a99; }
    .fs-form textarea.form-control { resize: vertical; }

    /* ── Radio toggle ─────────────────────────────────── */
    .fs-radio-group { display: flex; gap: 16px; align-items: center; flex-wrap: wrap; }
    .fs-radio-group .form-check { margin: 0; }
    .fs-radio-group .form-check-input { margin-top: 2px; accent-color: #035ab3; }
    .fs-radio-group .form-check-label { font-size: .875rem; font-weight: 500; color: #2c3e5e; cursor: pointer; }

    /* ── Toggle sub-panel ─────────────────────────────── */
    .fs-toggle-panel { background: #f0f5ff; border: 1px solid #d0ddf5; border-radius: 6px; padding: 16px; margin-top: 12px; }
    .fs-toggle-panel .fs-field-label { color: #1a3a72; }

    /* ── Verify button ────────────────────────────────── */
    .btn-verify { background: #035ab3; color: #fff; border: none; border-radius: 6px; padding: 7px 16px; font-size: .82rem; font-weight: 600; letter-spacing: .3px; cursor: pointer; transition: background .2s; white-space: nowrap; }
    .btn-verify:hover { background: #024a98; color: #fff; }
    .btn-verify-remove { background: #dc3545; color: #fff; border: none; border-radius: 6px; padding: 7px 16px; font-size: .82rem; font-weight: 600; cursor: pointer; transition: background .2s; white-space: nowrap; }
    .btn-verify-remove:hover { background: #b52a37; color: #fff; }
    .verify_status, #verify_status { font-size: .76rem; display: inline-block; margin-top: 2px; }

    /* ── Tables ───────────────────────────────────────── */
    .fs-table-wrap { overflow-x: auto; border-radius: 6px; border: 1px solid #dde5f3; }
    .fs-form table.table { margin-bottom: 0; font-size: .83rem; }
    .fs-form table.table thead th { background: #eef3fb; color: #1a2a4a; font-weight: 600; font-size: .78rem; padding: .45rem .5rem; vertical-align: middle; border-bottom: 2px solid #d0ddf5; border-color: #d0ddf5; line-height: 1.25; }
    .fs-form table.table tbody td { padding: .45rem .5rem; vertical-align: middle; border-color: #e8edf6; }
    .fs-form table.table tbody tr:nth-child(even) td { background: #f8fafd; }
    .fs-form table.table tbody tr:hover td { background: #eef3fb; }
    .fs-form table.table .form-control { font-size: .82rem; padding: 5px 8px; }
    .fs-form .file-limit { font-size: .72rem; color: #28a745; display: block; margin-top: 2px; line-height: 1.3; }

    /* ── Table action cells ───────────────────────────── */
    .form-s-actions-stack { display: flex; flex-direction: column; align-items: center; justify-content: flex-start; gap: .35rem; }

    /* ── Table add/remove buttons ─────────────────────── */
    .btn-tbl-add { background: #035ab3; color: #fff; border: none; border-radius: 5px; padding: 4px 9px; font-size: .8rem; cursor: pointer; transition: background .2s; }
    .btn-tbl-add:hover { background: #024a98; }
    .btn-tbl-remove { background: #dc3545; color: #fff; border: none; border-radius: 5px; padding: 4px 9px; font-size: .8rem; cursor: pointer; transition: background .2s; }
    .btn-tbl-remove:hover { background: #b52a37; }

    /* ── Education / institute / work table ──────────── */
    #education-table thead th, #institute-table thead th, #work-table thead th { font-size: .72rem; font-weight: 600; padding: .3rem .35rem; vertical-align: middle; line-height: 1.2; }
    #education-table tbody td, #institute-table tbody td, #work-table tbody td { vertical-align: middle; }

    /* ── Existing-document file cell (edit mode) ─────── */
    .fs-doc-existing { display: flex; align-items: center; flex-wrap: wrap; gap: 6px; justify-content: center; }
    .fs-doc-existing a { color: #035ab3; font-size: .8rem; font-weight: 600; text-decoration: none; }
    .fs-doc-existing a:hover { text-decoration: underline; }

    /* ── Documents upload table ───────────────────────── */
    .fs-docs-table { width: 100%; }
    .fs-docs-table td { vertical-align: middle; padding: 10px 12px; border-color: #e8edf6; }
    .fs-docs-table .doc-serial { width: 48px; min-width: 48px; font-weight: 700; color: #035ab3; font-size: .85rem; white-space: nowrap; text-align: center; }
    .fs-docs-table .doc-label-cell { min-width: 180px; }
    .fs-upload-card { border: 1px dashed #b8c8e2; background: #f8fbff; border-radius: 10px; padding: 12px; display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap; }
    .fs-upload-controls { display: flex; flex-direction: column; gap: 6px; min-width: 220px; flex: 1 1 220px; }
    .fs-upload-input { width: 100%; max-width: 300px; }
    .form-s-file-upload-wrap { display: flex; align-items: center; flex-wrap: wrap; gap: .35rem; }
    .form-s-file-upload-wrap .form-control { flex: 1 1 auto; min-width: 0; }
    .fs-upload-file-name { font-size: .75rem; color: #60779c; line-height: 1.3; min-height: 1.1rem; }
    .fs-upload-preview { border: 1px solid #ccd5e3; border-radius: 8px; background: #fff; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; }
    .fs-upload-preview img { width: 100%; height: 100%; object-fit: cover; display: none; }
    .fs-upload-preview--photo { width: 96px; height: 118px; }
    .fs-upload-preview--sign { width: 180px; height: 80px; }
    .fs-upload-preview--sign img { object-fit: contain; }
    .fs-upload-placeholder { font-size: .72rem; color: #89a0c4; text-align: center; padding: 0 10px; line-height: 1.35; }
    @media (max-width: 575.98px) { .fs-upload-preview--photo { width: 84px; height: 102px; } .fs-upload-preview--sign { width: 144px; height: 68px; } }

    /* ── Declaration ──────────────────────────────────── */
    .fs-declaration { background: #f0f5ff; border: 1px solid #c8d8f5; border-radius: 8px; padding: 16px 20px; margin-top: 4px; }
    .fs-declaration label.container { display: flex; align-items: flex-start; gap: 12px; cursor: pointer; padding: 0; margin: 0; width: 100%; }
    .fs-declaration input[type="checkbox"] { width: 18px; height: 18px; accent-color: #035ab3; flex-shrink: 0; margin-top: 3px; cursor: pointer; }
    .fs-declaration .decl-text { font-size: .875rem; color: #1a2a4a; line-height: 1.6; }
    .fs-declaration .decl-text .tamil { display: block; color: #5a7299; margin-top: 4px; font-size: .82rem; }
    .fs-declaration .checkmark { display: none; }

    /* ── Action buttons ───────────────────────────────── */
    .fs-action-bar { display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; padding: 24px 0 4px; }
    .btn-fs-draft { background: #fff; color: #035ab3; border: 2px solid #035ab3; border-radius: 8px; padding: 10px 28px; font-size: .9rem; font-weight: 600; cursor: pointer; transition: all .2s; }
    .btn-fs-draft:hover { background: #eef3fb; }
    .btn-fs-submit { background: linear-gradient(135deg, #1a9e4f, #15883f); color: #fff; border: none; border-radius: 8px; padding: 10px 28px; font-size: .9rem; font-weight: 600; cursor: pointer; box-shadow: 0 3px 10px rgba(26,158,79,.25); transition: all .2s; }
    .btn-fs-submit:hover { background: linear-gradient(135deg, #15883f, #116e32); box-shadow: 0 4px 14px rgba(26,158,79,.35); }
    .btn-fs-edit { background: #035ab3; color: #fff; border: none; border-radius: 8px; padding: 10px 28px; font-size: .9rem; font-weight: 600; cursor: pointer; transition: background .2s; }
    .btn-fs-edit:hover { background: #024a98; color: #fff; }
    .btn-fs-cancel { background: #fff; color: #dc3545; border: 2px solid #dc3545; border-radius: 8px; padding: 10px 28px; font-size: .9rem; font-weight: 600; cursor: pointer; transition: all .2s; }
    .btn-fs-cancel:hover { background: #fdeaea; }

    /* ── Validation messages ─────────────────────────── */
    .fs-form .text-danger, .fs-form .error-message, .fs-form .error,
    .fs-form span[id$="-error"], .fs-form span[class*="error"], .fs-form #checkboxError { font-size: .78rem !important; line-height: 1.3; display: block; margin-top: 2px; }

    /* ── PDF icon ────────────────────────────────────── */
    .fa-file-pdf-o { color: #d9363e !important; }

    /* ── FontAwesome fix ──────────────────────────────── */
    .comp_certificate .btn .fa, .comp_certificate .btn i.fa,
    .comp_certificate .btn-tbl-add .fa, .comp_certificate .btn-tbl-add i.fa,
    .comp_certificate .btn-tbl-remove .fa, .comp_certificate .btn-tbl-remove i.fa { font-family: 'FontAwesome'; display: inline-block; }
</style>

@php
    $formName       = $application_details->form_name ?? 'P';
    $isReturned     = isset($application_details->app_status) && $application_details->app_status === 'QU';
    $isFormS        = $formName === 'S';
    $isFormWHorW    = in_array($formName, ['WH', 'W']);
    $secWireman     = $isFormS ? '8' : '7';
    $secUploads     = $isFormWHorW ? '8' : '9';

    if ($isFormS) {
        $cert_name = 'Wireman Competency Certificate / Supervisor Competency Certificate';
        $cert_type = 'supervisor';
    } elseif ($formName === 'WH') {
        $cert_name = 'Wireman Helper Competency Certificate';
        $cert_type = 'helper';
    } else {
        $cert_name = 'Wireman Competency Certificate / Wireman Helper Competency Certificate';
        $cert_type = 'certificate';
    }

    $decryptedaadhar = !empty($application_details->aadhaar)
        ? Crypt::decryptString($application_details->aadhaar)
        : null;

    $signaturePath  = $applicant_sign?->uploaded_doc ?? null;
    $signatureSrc   = !empty($signaturePath) ? url($signaturePath) : '';
@endphp

{{-- ░░ BREADCRUMB ░░ --}}
<div class="fs-breadcrumb-bar">
    <div class="container">
        <ul id="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><span class="fa fa-home"></span> Dashboard</a></li>
            <li>
                <a href="#"><span class="fa fa-info-circle"></span>
                    @if($isReturned)
                        Correct and resubmit – Form {{ $formName }}
                    @else
                        Form {{ $formName }}
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>

{{-- ░░ PAGE BODY ░░ --}}
<div class="fs-page-wrap">
    <div class="container">
        <div class="fs-card comp_certificate" data-select2-id="14">

            {{-- ── Card header ── --}}
            <div class="fs-card-header">
                <div class="header-titles">
                    <h5>Application for Power Generating Station Operation &amp; Maintenance Competency Certificate</h5>
                    <h5 class="tamil-title">மின்சார உற்பத்தி நிலையத்தின் செயல்பாடு மற்றும் பராமரிப்பு திறன் சான்றிதழுக்கான விண்ணப்பம்</h5>
                    <span class="form-badge">FORM - {{ $formName }} / Certificate {{ $formName }} – {{ $isReturned ? 'Correct and resubmit' : 'Draft' }}</span>
                </div>
                <div class="instructions-link">
                    <span class="text-white font-weight-bold" style="font-size:.82rem;">Instructions &nbsp;</span>
                    <a href="{{ url('assets/pdf/form_p_notes.pdf') }}" target="_blank">English <i class="fa fa-file-pdf-o"></i> (8 KB)</a>
                </div>
            </div>

            {{-- ── Mandatory notice ── --}}
            <div class="fs-mandatory-bar">
                <span class="req-dot">*</span> Fields are Mandatory
            </div>

            {{-- ── Query alert (returned applications) ── --}}
            @if(isset($queries) && $queries->isNotEmpty())
                <div class="fs-query-alert" role="alert">
                    <h6><i class="fa fa-exclamation-triangle"></i> Query raised – please correct and resubmit</h6>
                    <p>The following issue(s) were reported. Please correct and submit again:</p>
                    <ul>
                        @foreach($queries as $q)
                            @php
                                $items = is_string($q->query_type) ? json_decode($q->query_type, true) : $q->query_type;
                                $items = is_array($items) ? $items : [$items];
                            @endphp
                            @foreach($items as $item)
                                <li>{{ is_string($item) ? $item : '' }}</li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ── Form body ── --}}
            <div class="fs-form-body fs-form apply-card">
                <form id="competency_form_p" enctype="multipart/form-data">

                    {{-- ═══ SECTION 1 & 2 — Name & Father's Name ═══ --}}
                    <div class="fs-section">
                        <div class="fs-section-body">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                    <div class="fs-field-label">1. Name of the applicant <span class="req">*</span></div>
                                    <div class="fs-field-tamil">விண்ணப்பதாரர் பெயர்</div>
                                    <input autocomplete="off" class="form-control" id="Applicant_Name" name="applicant_name" type="text" value="{{ isset($application_details) ? $application_details->applicant_name : Auth::user()->name }}" readonly>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="fs-field-label">2. Father's Name <span class="req">*</span></div>
                                    <div class="fs-field-tamil">தகப்பனார் பெயர்</div>
                                    <input autocomplete="off" class="form-control" id="Fathers_Name" name="fathers_name" type="text" value="{{ isset($application_details) ? $application_details->fathers_name : '' }}" maxlength="80">
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ═══ SECTION 3 & 4 — Address / DOB / Age ═══ --}}
                    <div class="fs-section">
                        <div class="fs-section-body">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                    <div class="fs-field-label">3. Address of the applicant <span class="req">*</span> <span style="font-weight:400;font-size:.78rem;">(To be clear)</span></div>
                                    <div class="fs-field-tamil">விண்ணப்பதாரர் முகவரி <span style="font-size:.72rem;">(தெளிவாக இருக்க வேண்டும்)</span></div>
                                    <textarea rows="3" class="form-control" id="applicants_address" name="applicants_address" maxlength="250">{{ isset($application_details) ? $application_details->applicants_address : Auth::user()->address }}</textarea>
                                    <span id="applicants_address_error" class="text-danger error"></span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12 col-sm-7 mb-3 mb-sm-0">
                                            <div class="fs-field-label">4. (i) Date of Birth <span class="req">*</span></div>
                                            <div class="fs-field-tamil">பிறந்த நாள், மாதம், வருடம்</div>
                                            <input autocomplete="off" class="form-control" id="d_o_b" name="d_o_b" type="text" placeholder="DD/MM/YYYY" value="{{ $application_details->d_o_b ?? '' }}">
                                            <span id="dob-error" class="text-danger d-block mt-1" style="display:none;"></span>
                                        </div>
                                        <div class="col-12 col-sm-5">
                                            <div class="fs-field-label">4. (ii) Age <span class="req">*</span></div>
                                            <div class="fs-field-tamil">வயது</div>
                                            <input autocomplete="off" class="form-control" id="age" name="age" type="number" value="{{ isset($application_details) ? $application_details->age : '' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ═══ SECTION 5 — Technical Qualifications ═══ --}}
                    <div class="fs-section">
                        <div class="fs-section-header">
                            <span class="fs-section-num">5</span>
                            <div>
                                <div class="fs-section-title">
                                    Details of Technical Qualification passed by the applicant
                                    <span class="section-req">*</span>
                                    <span class="section-hint">(Upload the documents)</span>
                                </div>
                                <div class="fs-section-tamil">விண்ணப்பதாரரின் தொழில்நுட்ப தேர்ச்சி மற்றும் தேர்ச்சி பற்றிய விவரங்கள் <span style="font-size:.72rem;">(ஆவணங்களை பதிவேற்ற வேண்டும்)</span></div>
                            </div>
                        </div>
                        <div class="fs-section-body">

                            {{-- (i) Education table --}}
                            <div class="fs-field-label mb-2">(i) Education Details <span class="req">*</span></div>
                            <div class="fs-table-wrap mb-4">
                                <table class="table table-bordered" id="education-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Education Level</th>
                                            <th>Institution/School Name</th>
                                            <th>Year of Passing</th>
                                            <th>Certificate No</th>
                                            <th class="text-center">Upload Document (Consolidated MarkSheet)<br><span class="file-limit">File type: PDF, PNG (Max 200 KB)</span></th>
                                            <th class="text-center p-1">
                                                <div class="form-s-actions-stack">
                                                    <button type="button" class="btn-tbl-add add-more-education py-1 px-2" title="Add row"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="education-container">
                                        @if ($edu_details->isNotEmpty())
                                            @foreach ($edu_details as $edu)
                                                <tr class="education-fields text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <select class="form-control" name="educational_level[]">
                                                            <option disabled {{ empty($edu->educational_level) ? 'selected' : '' }}>Select Education</option>
                                                            <option value="BEM" {{ $edu->educational_level == 'BEM' ? 'selected' : '' }}>B.E(Mechanical)</option>
                                                            <option value="BEE" {{ $edu->educational_level == 'BEE' ? 'selected' : '' }}>B.E(Electrical)</option>
                                                            <option value="DME" {{ $edu->educational_level == 'DME' ? 'selected' : '' }}>Diploma(Mechanical)</option>
                                                            <option value="DEE" {{ $edu->educational_level == 'DEE' ? 'selected' : '' }}>Diploma(Electrical)</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control" name="institute_name[]" value="{{ $edu->institute_name ?? '' }}"></td>
                                                    <td>
                                                        <select name="year_of_passing[]" class="form-control">
                                                            <option value="0" disabled {{ empty($edu->year_of_passing) ? 'selected' : '' }}>Select Year</option>
                                                            @php $currentYear = date('Y'); @endphp
                                                            @for ($year = $currentYear; $year >= 1980; $year--)
                                                                <option value="{{ $year }}" {{ $edu->year_of_passing == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control certificate-input" name="certificate_no[]" maxlength="20" value="{{ $edu->certificate_no ?? '' }}" placeholder="Certificate No">
                                                    </td>
                                                    <td>
                                                        @if (!empty($edu->upload_document))
                                                            <div class="fs-doc-existing">
                                                                <a href="{{ asset($edu->upload_document) }}" target="_blank">
                                                                    <i class="fa fa-file-pdf-o"></i> View
                                                                </a>
                                                                <button type="button" class="btn-tbl-remove remove-doc_edu py-1 px-2">Remove</button>
                                                            </div>
                                                        @else
                                                            <input type="file" class="form-control" name="education_document[]" accept=".pdf,application/pdf">
                                                        @endif
                                                    </td>
                                                    <td class="text-center p-1">
                                                        <div class="form-s-actions-stack">
                                                            <button type="button" class="btn-tbl-remove remove-education remove_edu py-1 px-2" data-edu_id="{{ $edu->id }}" data-url="{{ route('delete_education') }}" title="Remove row">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <input type="hidden" name="edu_id[]" value="{{ $edu->id }}">
                                                    <input type="hidden" name="existing_document[]" value="{{ $edu->upload_document }}">
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="education-fields text-center">
                                                <td>1</td>
                                                <td>
                                                    <select class="form-control" name="educational_level[]">
                                                        <option selected disabled>Select Education</option>
                                                        <option value="BEM">B.E(Mechanical)</option>
                                                        <option value="BEE">B.E(Electrical)</option>
                                                        <option value="DME">Diploma(Mechanical)</option>
                                                        <option value="DEE">Diploma(Electrical)</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" name="institute_name[]"></td>
                                                <td>
                                                    <select name="year_of_passing[]" class="form-control">
                                                        <option value="0">Select Year</option>
                                                        @php $currentYear = date('Y'); @endphp
                                                        @for ($year = $currentYear; $year >= 1980; $year--)
                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control certificate-input" name="certificate_no[]" maxlength="20" placeholder="Certificate No">
                                                </td>
                                                <td><input type="file" class="form-control" name="education_document[]" accept=".pdf,application/pdf"></td>
                                                <td class="text-center p-1">
                                                    <div class="form-s-actions-stack">
                                                        <button type="button" class="btn-tbl-remove remove-education py-1 px-2" title="Remove row"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                </td>
                                                <input type="hidden" name="edu_id[]" value="">
                                                <input type="hidden" name="existing_document[]" value="">
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            {{-- (ii) Institute table --}}
                            <div class="fs-field-label mb-2">(ii) Institute in which the applicant has undergone the training and the period <span class="req">*</span> <span style="font-weight:400;font-size:.78rem;">(Upload the documents)</span></div>
                            <div class="fs-field-tamil mb-2">விண்ணப்பதாரர் பயிற்சி பெற்ற நிறுவனம் மற்றும் பயிற்சி பெற்ற காலம் <span style="font-size:.72rem;">(ஆவணங்களை பதிவேற்ற வேண்டும்)</span></div>
                            <div class="fs-table-wrap mb-4">
                                <table class="table table-bordered" id="institute-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th style="width:22%">Institute Name &amp; Address</th>
                                            <th>Duration</th>
                                            <th>From date</th>
                                            <th>To date</th>
                                            <th class="text-center">Upload Document (Experience Certificate)<br><span class="file-limit">File type: PDF, PNG (Max 200 KB)</span></th>
                                            <th class="text-center p-1">
                                                <div class="form-s-actions-stack">
                                                    <button type="button" class="btn-tbl-add add-more-institute py-1 px-2" title="Add row"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="institute-container">
                                        @if ($institutes->isNotEmpty())
                                            @foreach ($institutes as $institute)
                                                <tr class="institute-fields text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <textarea autocomplete="off" class="form-control" name="institute_name_address[]" cols="5" rows="3" maxlength="255">{{ $institute->institute_name_address ?? '' }}</textarea>
                                                    </td>
                                                    <td>
                                                        <input autocomplete="off" class="form-control" name="duration[]" type="number" min="0" max="50" value="{{ $institute->duration ?? '' }}">
                                                    </td>
                                                    <td>
                                                        <input autocomplete="off" class="form-control" name="from_date[]" type="date" value="{{ $institute->from_date ?? '' }}">
                                                    </td>
                                                    <td>
                                                        <input autocomplete="off" class="form-control" name="to_date[]" type="date" value="{{ $institute->to_date ?? '' }}">
                                                    </td>
                                                    <td>
                                                        @if (!empty($institute->upload_doc))
                                                            <div class="fs-doc-existing">
                                                                <a href="{{ asset($institute->upload_doc) }}" target="_blank">
                                                                    <i class="fa fa-file-pdf-o"></i> View
                                                                </a>
                                                                <button type="button" class="btn-tbl-remove remove-inst py-1 px-2">Remove</button>
                                                            </div>
                                                        @else
                                                            <input class="form-control" name="institute_document[]" type="file" accept=".pdf,application/pdf">
                                                        @endif
                                                    </td>
                                                    <td class="text-center p-1">
                                                        <div class="form-s-actions-stack">
                                                            <button type="button" class="btn-tbl-remove remove-institute remove-inst-row py-1 px-2" data-inst_id="{{ $institute->id }}" data-url="{{ route('delete_institute') }}" title="Remove row">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <input type="hidden" name="institute_id[]" value="{{ $institute->id ?? '' }}">
                                                    <input type="hidden" name="exist_institute_document[]" value="{{ $institute->upload_doc ?? '' }}">
                                                    <input type="hidden" name="removed_document_inst[]" value="0" class="removed-document-inst">
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="institute-fields text-center">
                                                <td>1</td>
                                                <td><textarea autocomplete="off" class="form-control" name="institute_name_address[]" cols="5" rows="3" maxlength="255"></textarea></td>
                                                <td><input autocomplete="off" class="form-control" name="duration[]" type="number" min="1" max="10"></td>
                                                <td><input autocomplete="off" class="form-control" name="from_date[]" type="date"></td>
                                                <td><input autocomplete="off" class="form-control" name="to_date[]" type="date"></td>
                                                <td><input class="form-control" name="institute_document[]" type="file" accept=".pdf,application/pdf"></td>
                                                <td class="text-center p-1">
                                                    <div class="form-s-actions-stack">
                                                        <button type="button" class="btn-tbl-remove remove-empty_institute py-1 px-2" title="Remove row"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                </td>
                                                <input type="hidden" name="institute_id[]">
                                                <input type="hidden" name="institute_existdocument[]">
                                                <input type="hidden" name="removed_document_inst[]" value="0" class="removed-document-inst">
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            {{-- (iii) Power Station table --}}
                            <div class="fs-field-label mb-2">(iii) Power Station to which he is attached at present <span style="font-weight:400;font-size:.78rem;">(Upload the documents)</span></div>
                            <div class="fs-field-tamil mb-2">தற்போது பணியாற்றும் மின்சார நிலையம் மற்றும் பயிற்சி பெற்ற காலம் <span style="font-size:.72rem;">(ஆவணங்களை பதிவேற்ற வேண்டும்)</span></div>
                            <div class="fs-table-wrap mb-4">
                                <table class="table table-bordered" id="work-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Power Station</th>
                                            <th>Years of Experience (Years)</th>
                                            <th>Designation</th>
                                            <th class="text-center">Upload Document (Experience Certificate)<br><span class="file-limit">File type: PDF, PNG (Max 200 KB)</span></th>
                                            <th class="text-center p-1">
                                                <div class="form-s-actions-stack">
                                                    <button type="button" class="btn-tbl-add add-more-work py-1 px-2" title="Add row"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="work-container">
                                        @if ($exp_details->isNotEmpty())
                                            @foreach ($exp_details as $exp)
                                                <tr class="work-fields text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <input autocomplete="off" class="form-control" name="work_level[]" type="text" value="{{ $exp->company_name ?? '' }}">
                                                    </td>
                                                    <td>
                                                        <input autocomplete="off" class="form-control" name="experience[]" type="number" value="{{ $exp->experience ?? '' }}">
                                                    </td>
                                                    <td>
                                                        <input autocomplete="off" class="form-control" name="designation[]" type="text" value="{{ $exp->designation ?? '' }}">
                                                    </td>
                                                    <td>
                                                        @if (!empty($exp->upload_document))
                                                            <div class="fs-doc-existing">
                                                                <a href="{{ asset($exp->upload_document) }}" target="_blank">
                                                                    <i class="fa fa-file-pdf-o"></i> View
                                                                </a>
                                                                <button type="button" class="btn-tbl-remove remove-doc_work py-1 px-2">Remove</button>
                                                            </div>
                                                        @else
                                                            <input class="form-control" name="work_document[]" type="file" accept=".pdf,application/pdf">
                                                        @endif
                                                    </td>
                                                    <td class="text-center p-1">
                                                        <div class="form-s-actions-stack">
                                                            <button type="button" class="btn-tbl-remove remove-work remove_exp py-1 px-2" data-exp_id="{{ $exp->id }}" data-url="{{ route('delete_experience') }}" title="Remove row">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <input type="hidden" name="work_id[]" value="{{ $exp->id ?? '' }}">
                                                    <input type="hidden" name="existing_work_document[]" value="{{ $exp->upload_document ?? '' }}">
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="work-fields text-center">
                                                <td>1</td>
                                                <td><input autocomplete="off" class="form-control" name="work_level[]" type="text"></td>
                                                <td><input autocomplete="off" class="form-control" name="experience[]" type="number"></td>
                                                <td><input autocomplete="off" class="form-control" name="designation[]" type="text"></td>
                                                <td><input class="form-control" name="work_document[]" type="file" accept=".pdf,application/pdf"></td>
                                                <td class="text-center p-1">
                                                    <div class="form-s-actions-stack">
                                                        <button type="button" class="btn-tbl-remove remove-work py-1 px-2" title="Remove row"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                </td>
                                                <input type="hidden" name="work_id[]">
                                                <input type="hidden" name="existing_work_document[]">
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            {{-- (iv) Employer name --}}
                            <div class="row align-items-start">
                                <div class="col-12 col-md-3">
                                    <div class="fs-field-label">(iv) Name of the employer <span style="font-weight:400;font-size:.78rem;">(Upload the documents)</span></div>
                                    <div class="fs-field-tamil">தொழில் வழங்குநரின் பெயர்</div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" name="employer_name" id="employer_name" cols="5" rows="3" maxlength="255">{{ isset($exp) && !empty($exp->company_name) ? $exp->company_name : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- ═══ SECTION 7 (S only) — Previously applied for Electrical Assistant ═══ --}}
                    <div class="fs-section" id="prev-license-section" style="{{ $isFormS ? '' : 'display:none;' }}">
                        <div class="fs-section-header">
                            <span class="fs-section-num">7</span>
                            <div>
                                <div class="fs-section-title">Have previously applied for Electrical Assistant Qualification Certificate and if yes then mention its number and date</div>
                                <div class="fs-section-tamil">இதற்கு முன்னாள் விண்ணப்பம் செய்துள்ளீர்களா ? ஆம் என்றால் அதன் குறிப்பு எண் மற்றும் தேதியை குறிப்பிடுக</div>
                            </div>
                        </div>
                        <div class="fs-section-body">
                            <div class="fs-radio-group mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input toggle-details" type="radio" name="previous_license" id="previous_license_yes" data-target="#previously_details" value="yes" {{ !empty($application_details->previously_number) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="previous_license_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input toggle-details" type="radio" name="previous_license" id="previous_license_no" data-target="#previously_details" value="no" {{ empty($application_details->previously_number) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="previous_license_no">No</label>
                                </div>
                            </div>
                            <div id="previously_details" class="fs-toggle-panel" style="display: {{ !empty($application_details->previously_number) ? 'block' : 'none' }};">
                                <div class="row g-2 align-items-end">
                                    <div class="col-12 col-md-4">
                                        <div class="fs-field-label">License Number <span class="req">*</span></div>
                                        <input autocomplete="off" class="form-control verify-input"
                                               id="previously_number" name="previously_number" type="text"
                                               data-type="license" data-error="#licenseError" data-msg="#license_messagdfde"
                                               placeholder="License Number" {{ !empty($application_details->previously_number) ? 'readonly' : '' }} value="{{ $application_details->previously_number ?? '' }}">
                                        <input type="hidden" id="l_verify" name="l_verify" value="{{ $application_details->license_verify ?? '' }}">
                                        <span id="licenseError" class="text-danger"></span>
                                        <span id="verify_result"></span>
                                        <span id="license_messagdfde" class="mt-1"></span>
                                        <span class="mt-1 verify_status {{ ($application_details->license_verify ?? 0) == 0 ? 'text-danger' : 'text-success' }}">
                                            @if (!empty($application_details->previously_number))
                                                {!! ($application_details->license_verify ?? 0) == 0 ? '&#128683; Invalid License.' : '&#10004; Valid License.' !!}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="fs-field-label">Date <span class="req">*</span></div>
                                        <input autocomplete="off" class="form-control verify-date"
                                               id="previously_date" name="previously_date" type="date"
                                               data-error="#dateError" {{ !empty($application_details->previously_number) ? 'readonly' : '' }} value="{{ $application_details->previously_date ?? '' }}">
                                        <span id="dateError" class="text-danger"></span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        @if (!empty($application_details->previously_number))
                                            <button type="button" class="btn-verify-remove remove_verify" data-type="superviser">Delete</button>
                                            <button type="button" class="btn-verify verify-btn btn-forms d-none" data-type="license" data-url="{{ route('verifylicense') }}">Verify</button>
                                        @else
                                            <button type="button" class="btn-verify verify-btn" data-type="license" data-url="{{ route('verifylicense') }}">Verify</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ═══ SECTION {{ $secWireman }} — Wireman / Helper / Supervisor competency cert ═══ --}}
                    <div class="fs-section">
                        <div class="fs-section-header">
                            <span class="fs-section-num">{{ $secWireman }}</span>
                            <div>
                                <div class="fs-section-title">Do you possess {{ $cert_name }} issued by this Board? If so furnish the details and surrender the same.</div>
                                <div class="fs-section-tamil">இந்த வாரியம் வழங்கிய கம்பி இணைப்பாளர் திறன் சான்றிதழ் / மேற்பார்வையாளர் திறன் சான்றிதழ் உங்களிடம் உள்ளதா? இருந்தால், அதன் விவரங்களை வழங்கி, அதனை ஒப்படைக்கவும்.</div>
                            </div>
                        </div>
                        <div class="fs-section-body">
                            <div class="fs-radio-group mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input toggle-details" type="radio" name="previous_certificate" id="yesOption" data-target="#wireman_details" value="yes" {{ !empty($application_details->certificate_no) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="yesOption">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input toggle-details" type="radio" name="previous_certificate" id="noOption" data-target="#wireman_details" value="no" {{ empty($application_details->certificate_date) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="noOption">No</label>
                                </div>
                            </div>
                            <div id="wireman_details" class="fs-toggle-panel" style="display: {{ !empty($application_details->certificate_no) ? 'block' : 'none' }};">
                                <div class="row g-2 align-items-end">
                                    <div class="col-12 col-md-4">
                                        <div class="fs-field-label">Certificate Number <span class="req">*</span></div>
                                        <input class="form-control verify-input" id="certificate_no" name="competency_certificate_no" type="text" data-type="{{ $cert_type }}" data-error="#certError" data-msg="#license_message" placeholder="Certificate No" maxlength="12" value="{{ $application_details->certificate_no ?? '' }}" {{ !empty($application_details->certificate_no) ? 'readonly' : '' }}>
                                        <input type="hidden" id="cert_verify" name="cert_verify" value="{{ $application_details->cert_verify ?? '' }}">
                                        <span id="certError" class="text-danger"></span>
                                        <span id="license_message" class="mt-1"></span>
                                        <span id="verify_status" class="mt-1 {{ ($application_details->cert_verify ?? 0) == 0 ? 'text-danger' : 'text-success' }}">
                                            @if (!empty($application_details->certificate_no))
                                                {!! ($application_details->cert_verify ?? 0) == 0 ? '&#128683; Invalid License.' : '&#10004; Valid License.' !!}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="fs-field-label">Date <span class="req">*</span></div>
                                        <input class="form-control verify-date" id="certificate_date" name="certificate_date" data-error="#certDateError" type="date" value="{{ $application_details->certificate_date ?? '' }}" {{ !empty($application_details->certificate_no) ? 'readonly' : '' }}>
                                        <span id="certDateError" class="text-danger"></span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        @if (!empty($application_details->certificate_no))
                                            <button type="button" class="btn-verify-remove remove_verify" data-type="superviser_two">Delete</button>
                                            <button type="button" class="btn-verify verify-btn d-none" data-type="certificate" data-url="{{ route('verifylicense') }}">Verify</button>
                                        @else
                                            <button type="button" class="btn-verify verify-btn" data-type="certificate" data-url="{{ route('verifylicense') }}">Verify</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ═══ SECTION {{ $secUploads }} — Upload Documents ═══ --}}
                    <div class="fs-section">
                        <div class="fs-section-header">
                            <span class="fs-section-num">{{ $secUploads }}</span>
                            <div>
                                <div class="fs-section-title">Upload Documents <span class="section-req">*</span></div>
                                <div class="fs-section-tamil">ஆவணங்களைப் பதிவேற்றவும்</div>
                            </div>
                        </div>
                        <div class="fs-section-body p-0">
                            <table class="table fs-docs-table mb-0">
                                <tbody>
                                    {{-- (i) Photo --}}
                                    <tr>
                                        <td class="doc-serial">(i)</td>
                                        <td class="doc-label-cell">
                                            <div class="fs-field-label">Upload Passport Size Photo <span class="req">*</span></div>
                                            <div class="fs-field-tamil">பாஸ்போர்ட் அளவு புகைப்படம் பதிவேற்ற</div>
                                        </td>
                                        <td colspan="3">
                                            <div class="fs-upload-card">
                                                <div class="fs-upload-controls">
                                                    @if (!empty($applicant_photo->upload_path))
                                                        <button type="button" class="btn-tbl-add" style="align-self:flex-start;" onclick="togglePhotoInput()">Edit/Upload Photo</button>
                                                    @endif
                                                    <div id="photo-input-wrapper" style="{{ !empty($applicant_photo->upload_path) ? 'display:none;' : 'display:block;' }}">
                                                        <div class="form-s-file-upload-wrap fs-upload-input">
                                                            <input autocomplete="off" class="form-control" id="upload_photo" name="upload_photo" type="file" accept="image/*">
                                                        </div>
                                                        <span class="file-limit">File type: JPG, PNG (Max 50 KB)</span>
                                                        <span class="error-message text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="fs-upload-preview fs-upload-preview--photo">
                                                    @if (!empty($applicant_photo->upload_path))
                                                        <img src="{{ url($applicant_photo->upload_path) }}" id="preview_applicant" alt="Applicant Photo" style="display:block;">
                                                    @else
                                                        <span id="photo_placeholder" class="fs-upload-placeholder">Photo preview</span>
                                                        <img id="preview_applicant" src="" alt="Photo preview">
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- (ii) Aadhaar Number / (iii) Aadhaar Document --}}
                                    <tr>
                                        <td class="doc-serial">(ii)</td>
                                        <td class="doc-label-cell">
                                            <div class="fs-field-label">Aadhaar Number <span class="req">*</span></div>
                                            <div class="fs-field-tamil">ஆதார் எண்</div>
                                        </td>
                                        <td style="min-width:180px;">
                                            <input type="text" class="form-control" name="aadhaar" id="aadhaar" maxlength="14" value="{{ $decryptedaadhar }}" style="max-width:260px;">
                                            <span id="aadhaar-error" class="text-danger"></span>
                                        </td>
                                        <td class="doc-label-cell">
                                            <div class="fs-field-label">(iii) Upload Aadhaar Document</div>
                                            <div class="fs-field-tamil">ஆதார் ஆவணத்தை பதிவேற்றவும்</div>
                                        </td>
                                        <td style="min-width:200px;">
                                            @if (!empty($application_details->aadhaar_doc))
                                                <div class="aadhaar-doc-container fs-doc-existing" style="justify-content:flex-start;">
                                                    <a href="{{ route('document.show', ['type' => 'aadhaar', 'filename' => $application_details->aadhaar_doc]) }}" target="_blank">
                                                        <i class="fa fa-file-pdf-o"></i> View
                                                    </a>
                                                    <button type="button" class="btn-tbl-remove remove-docs py-1 px-2">Remove</button>
                                                </div>
                                            @else
                                                <div class="aadhaar-doc-input">
                                                    <div class="form-s-file-upload-wrap" style="max-width:280px;">
                                                        <input autocomplete="off" class="form-control" id="aadhaar_doc" name="aadhaar_doc" type="file" accept=".pdf,application/pdf">
                                                    </div>
                                                    <span class="file-limit">File type: PDF (Max 250 KB)</span>
                                                    <small class="text-danger file-error"></small>
                                                </div>
                                            @endif
                                            <input type="hidden" name="aadhaar_doc_removed" id="aadhaar_doc_removed" value="0">
                                        </td>
                                    </tr>
                                    {{-- (iv) Signature --}}
                                    <tr>
                                        <td class="doc-serial">(iv)</td>
                                        <td class="doc-label-cell">
                                            <div class="fs-field-label">Upload Signature <span class="req">*</span></div>
                                            <div class="fs-field-tamil">கையொப்பத்தைப் பதிவேற்றவும்</div>
                                        </td>
                                        <td colspan="3">
                                            <div class="fs-upload-card">
                                                <div class="fs-upload-controls">
                                                    @if (!empty($signaturePath))
                                                        <button type="button" class="btn-tbl-add" style="align-self:flex-start;" onclick="toggleSignInput()">Edit/Upload Signature</button>
                                                    @endif
                                                    <div id="sign-input-wrapper" style="{{ !empty($signaturePath) ? 'display:none;' : 'display:block;' }}">
                                                        <div class="form-s-file-upload-wrap fs-upload-input">
                                                            <input autocomplete="off" class="form-control" id="upload_sign" name="upload_sign" type="file" accept=".jpg,.jpeg,.png" @if(empty($signaturePath)) required @endif>
                                                        </div>
                                                        <span class="file-limit">File type: JPG, PNG (Max 50 KB)</span>
                                                        <span class="error-message text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="fs-upload-preview fs-upload-preview--sign">
                                                    @if (!empty($signaturePath))
                                                        <img src="{{ $signatureSrc }}" id="preview_signature" alt="Uploaded Signature" style="display:block;">
                                                    @else
                                                        <span id="sign_placeholder" class="fs-upload-placeholder">Signature preview</span>
                                                        <img id="preview_signature" src="" alt="Signature preview">
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- ═══ Declaration ═══ --}}
                    <div class="fs-declaration">
                        <label class="container">
                            <input type="checkbox" id="declarationCheckbox" required>
                            <span class="checkmark"></span>
                            <div class="decl-text">
                                I hereby declare that all the details mentioned above are correct and true to the best of my knowledge. I request you to issue me the qualification certificate. <span class="req">*</span>
                                <span class="tamil">என் அறிவுக்கு எட்டியவரை மேலே குறிப்பிட்டுள்ள விவரங்கள் யாவும் சரியானவை எனவும் உண்மையானவை எனவும் உறுதி கூறுகிறேன். தகுதி சான்றிதழ் எனக்கு வழங்குமாறு வேண்டுகிறேன்.</span>
                            </div>
                        </label>
                        <span id="checkboxError" class="text-danger mt-2 d-block" style="display:none!important;font-size:.82rem;">Please check the declaration box before proceeding.</span>
                    </div>

                    {{-- Hidden fields --}}
                    <input type="hidden" class="form-control text-box single-line" id="login_id_store" name="login_id" value="{{ Auth::user()->login_id }}">
                    <input type="hidden" id="application_id" name="application_id" value="{{ $application_details->application_id ?? '' }}">
                    <input type="hidden" id="license_number" name="license_number" value="{{ $license_details->license_number ?? '' }}">
                    <input type="hidden" id="form_name" name="form_name" value="{{ $application_details->form_name ?? '' }}">
                    <input type="hidden" id="license_name" name="license_name" value="{{ $application_details->license_name ?? '' }}">
                    <input type="hidden" id="form_id" name="form_id" value="{{ $application_details->form_id ?? '' }}">
                    <input type="hidden" id="appl_type" name="appl_type" value="N">

                    {{-- ── Action buttons ── --}}
                    <div class="fs-action-bar">
                        @if($isReturned)
                            <button type="button" class="btn-fs-edit" id="editBtn">Edit</button>
                            <span id="actionButtonsWrap" style="display:none; gap:12px;" class="d-inline-flex flex-wrap">
                                <button type="button" class="btn-fs-cancel" id="cancelBtn">Cancel</button>
                                <button type="button" class="btn-fs-submit" id="DraftBtn">Submit</button>
                            </span>
                        @else
                            <button type="button" class="btn-fs-draft" id="DraftBtn">
                                <i class="fa fa-floppy-o"></i> Save As Draft
                            </button>
                            <button type="button" class="btn-fs-submit" id="ProceedtoPayment">
                                <i class="fa fa-credit-card"></i> Save and Proceed for Payment
                            </button>
                        @endif
                    </div>

                </form>
            </div>{{-- /fs-form-body --}}
        </div>{{-- /fs-card --}}
    </div>{{-- /container --}}
</div>{{-- /fs-page-wrap --}}

<footer class="main-footer">
    @include('include.footer')
</footer>

<script>
    window.returnApplicationQueryReasons = @json(isset($queryReasonsForValidation) ? $queryReasonsForValidation : []);
    window.isReturnedFormP = @json($isReturned);
</script>
<script>
    document.getElementById('upload_photo').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('preview_applicant');
                const placeholder = document.getElementById('photo_placeholder');
                preview.src = e.target.result;
                preview.style.display = 'block';
                if (placeholder) placeholder.style.display = 'none';
            };

            reader.readAsDataURL(file);
        }
    });

    function togglePhotoInput() {
        const inputWrapper = document.getElementById('photo-input-wrapper');
        inputWrapper.style.display = inputWrapper.style.display === 'none' ? 'block' : 'none';
    }
</script>
<script>
    document.getElementById('upload_sign').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('preview_signature');
                const placeholder = document.getElementById('sign_placeholder');
                if (preview) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                if (placeholder) placeholder.style.display = 'none';
            };

            reader.readAsDataURL(file);
        }
    });

    function toggleSignInput() {
        const inputWrapper = document.getElementById('sign-input-wrapper');
        if (inputWrapper) {
            inputWrapper.style.display = inputWrapper.style.display === 'none' ? 'block' : 'none';
        }
    }
</script>
<script>
    // Age calculation on DOB change
    $('#d_o_b').on('change', function() {
        const dob = new Date($(this).val());
        const today = new Date();
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }

        $('#age').val(age);
    });

    // Add more education row
    $(document).on('click', function(e) {
        let container = document.getElementById("education-container");
        let educationRows = container.querySelectorAll(".education-fields");

        if (e.target.closest(".add-more-education")) {

            if (educationRows.length >= 5) {
                $('#education-table').next('.education-error').remove();

                $('<div class="text-danger mt-2 education-error">You can add a maximum of 5 education entries.</div>')
                .insertAfter('#education-table');

                setTimeout(() => {
                    $('.education-error').fadeOut();
                }, 7000);
                return;
            }

            let currentYear = new Date().getFullYear();
            let yearOptions = '<option value="">Select Year</option>';
            for (let year = currentYear; year >= 1980; year--) {
                yearOptions += `<option value="${year}">${year}</option>`;
            }

            // calculate next serial number
            let serialNo = $('#education-container .education-fields').length + 1;

            let newRow = `
            <tr class="education-fields text-center">
                <td>${serialNo}</td>
                <td>
                    <select class="form-control" name="educational_level[]" required>
                        <option value="">Select Education</option>
                        <option value="BEM">B.E(Mechanical)</option>
                        <option value="BEE">B.E(Electrical)</option>
                        <option value="DME">Diploma(Mechanical)</option>
                        <option value="DEE">Diploma(Electrical)</option>
                    </select>
                </td>
                <td><input type="text" class="form-control" name="institute_name[]" required></td>
                <td>
                    <select name="year_of_passing[]" class="form-control" required>
                        ${yearOptions}
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control certificate-input" name="certificate_no[]" maxlength="20" placeholder="Certificate No" required>
                </td>
                <td>
                    <input type="file" class="form-control education-file" accept=".pdf,.png,.jpg,.jpeg" required>
                </td>
                <td class="text-center p-1">
                    <div class="form-s-actions-stack">
                        <button type="button" class="btn-tbl-remove remove-education py-1 px-2" title="Remove row"><i class="fa fa-trash-o"></i></button>
                    </div>
                </td>
                <input type="hidden" name="edu_id[]" value="">
                <input type="hidden" name="existing_document[]" value="">
            </tr> `;
            $('#education-container').append(newRow);

            $("#education-container .education-fields").each(function (index) {
                $(this).find(".education-file").attr("name", `education_document[${index}]`);
            });

        }

        if (e.target.closest(".remove-education")) {
            e.target.closest("tr").remove();
        }
    });

    // Add more work row
    $(document).on('click', function(e) {

        let container = document.getElementById("work-container");
        let workRows = container.querySelectorAll(".work-fields");

        if (e.target.closest(".add-more-work")) {

            if (workRows.length >= 3) {

                $('#work-table').next('.work-error').remove();

                $('<div class="text-danger mt-2 work-error">You can add a maximum of 3 work experience entries.</div>')
                .insertAfter('#work-table');

                setTimeout(() => {
                    $('.work-error').fadeOut();
                }, 7000);

                return;
            }

            let serialNo = $('#work-container .work-fields').length + 1;
            let newRowIndex = serialNo - 1;
            let newRow = `
                    <tr class="work-fields text-center">
                        <td>${serialNo}</td>
                        <td><input type="text" class="form-control" name="work_level[]"></td>
                        <td><input type="number" step="0.1" class="form-control" name="experience[]" min="0" max="50"></td>
                        <td><input type="text" class="form-control" name="designation[]"></td>
                        <td class="text-center">
                            <input type="file" class="form-control" name="work_document[${newRowIndex}]" accept=".pdf,.png,.jpg,.jpeg">
                        </td>
                        <td class="text-center p-1">
                            <div class="form-s-actions-stack">
                                <button type="button" class="btn-tbl-remove remove-work py-1 px-2" title="Remove row"><i class="fa fa-trash-o"></i></button>
                            </div>
                        </td>
                        <input type="hidden" name="work_id[]">
                        <input type="hidden" name="existing_work_document[]">
                    </tr>
                `;
            $('#work-container').append(newRow);

            $('#work-container .work-fields').each(function (index) {
                $(this).find('.work-file').attr('name', `work_document[${index}]`);
            });
        }

        if (e.target.closest(".remove-work")) {
            e.target.closest("tr").remove();
        }
    });

    $(document).on('click', function(e) {

        let container = document.getElementById("institute-container");
        let workRows = container.querySelectorAll(".institute-fields");

        if (e.target.closest(".add-more-institute")) {

            if (workRows.length >= 2) {

                $('#institute-table').next('.institute-error').remove();

                $('<div class="text-danger mt-2 institute-error">You can add a maximum of 2 Institute entries.</div>')
                .insertAfter('#institute-table');

                setTimeout(() => {
                    $('.institute-error').fadeOut();
                }, 7000);

                return;
            }

            let serialNo = $('#institute-container .institute-fields').length + 1;
            let newRowIndex = serialNo - 1;
            let newRow = `
                    <tr class="institute-fields text-center">
                        <td>${serialNo}</td>
                        <td><textarea autocomplete="off" class="form-control" name="institute_name_address[]" cols="5" rows="3"></textarea></td>
                        <td><input type="number" step="0.1" class="form-control" name="duration[]" min="0" max="50"></td>
                        <td><input type="date" class="form-control" name="from_date[]"></td>
                        <td><input type="date" class="form-control" name="to_date[]"></td>
                        <td class="text-center">
                            <input type="file" class="form-control" name="institute_document[${newRowIndex}]" accept=".pdf,.png,.jpg,.jpeg">
                        </td>
                        <td class="text-center p-1">
                            <div class="form-s-actions-stack">
                                <button type="button" class="btn-tbl-remove remove-inst-row py-1 px-2" title="Remove row"><i class="fa fa-trash-o"></i></button>
                            </div>
                        </td>
                        <input type="hidden" name="institute_id[]">
                        <input type="hidden" name="institute_document[]">
                        <input type="hidden" name="removed_document_inst[]" value="0" class="removed-document-inst">
                    </tr>
                `;
            $('#institute-container').append(newRow);

            $('#institute-container .institute-fields').each(function (index) {
                $(this).find('.institute-file').attr('name', `institute_document[${index}]`);
            });
        }

        if (e.target.closest(".remove-inst-row")) {
            e.target.closest("tr").remove();
        }
    });
</script>
