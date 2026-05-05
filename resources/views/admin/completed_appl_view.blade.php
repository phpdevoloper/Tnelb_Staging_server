@include('admin.include.top')
@include('admin.include.header')
@include('admin.include.navbar')

<style>
    /* ── Page wrapper ─────────────────────────────────── */
    .cv-page { background: #f0f4f9; min-height: 100vh; padding: 0 0 32px; }

    /* ── Breadcrumb ───────────────────────────────────── */
    .cv-breadcrumb { background: #fff; border-bottom: 1px solid #e3e8f0; padding: 10px 24px; }
    .cv-breadcrumb .breadcrumb { background: none !important; padding: 0 !important; margin: 0 !important; font-size: .85rem; }
    .cv-breadcrumb .breadcrumb-item a { color: #035ab3; text-decoration: none; }
    .cv-breadcrumb .breadcrumb-item a:hover { text-decoration: underline; }
    .cv-breadcrumb .breadcrumb-item.active { color: #5a7299; }

    /* ── Hero / Applicant header ──────────────────────── */
    .cv-hero { margin-top: 24px; background: linear-gradient(135deg, #035ab3 0%, #0472d9 100%); border-radius: 14px; padding: 22px 26px; box-shadow: 0 4px 22px rgba(3,90,179,.18); color: #fff; position: relative; overflow: hidden; }
    .cv-hero::after { content: ''; position: absolute; right: -60px; top: -60px; width: 220px; height: 220px; background: rgba(255,255,255,.06); border-radius: 50%; }
    .cv-hero-grid { display: flex; align-items: center; gap: 22px; flex-wrap: wrap; position: relative; z-index: 1; }
    .cv-hero-photo { width: 100px; height: 120px; border-radius: 12px; border: 3px solid rgba(255,255,255,.5); background: #fff; overflow: hidden; flex-shrink: 0; box-shadow: 0 4px 14px rgba(0,0,0,.12); display: flex; align-items: center; justify-content: center; }
    .cv-hero-photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .cv-hero-photo .no-photo { font-size: .72rem; color: #aab; text-align: center; padding: 8px; }
    .cv-hero-info { flex: 1; min-width: 240px; }
    .cv-hero-info h2 { margin: 0 0 4px; font-size: 1.35rem; font-weight: 700; letter-spacing: .3px; color: #fff; }
    .cv-hero-info .cv-app-id { display: inline-block; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.35); border-radius: 20px; padding: 3px 14px; font-size: .78rem; font-weight: 600; letter-spacing: .5px; }
    .cv-hero-meta { display: flex; gap: 22px; flex-wrap: wrap; margin-top: 12px; font-size: .82rem; }
    .cv-hero-meta div { color: rgba(255,255,255,.85); }
    .cv-hero-meta strong { color: #fff; font-weight: 600; display: block; font-size: .72rem; text-transform: uppercase; letter-spacing: .6px; opacity: .8; margin-bottom: 2px; }

    /* ── Section card ─────────────────────────────────── */
    .cv-card { background: #fff; border-radius: 12px; box-shadow: 0 2px 14px rgba(3,90,179,.08); margin-top: 18px; overflow: hidden; }
    .cv-card-head { display: flex; align-items: center; gap: 10px; padding: 12px 22px; background: #f8fafd; border-bottom: 1px solid #e3e8f0; }
    .cv-card-head .icon { width: 30px; height: 30px; border-radius: 8px; background: linear-gradient(135deg, #035ab3, #0472d9); color: #fff; display: inline-flex; align-items: center; justify-content: center; font-size: .9rem; }
    .cv-card-head h4 { margin: 0; font-size: .95rem; font-weight: 700; color: #1a2a4a; letter-spacing: .3px; }
    .cv-card-body { padding: 18px 22px; }

    /* ── Field rows ───────────────────────────────────── */
    .cv-field-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px 22px; }
    .cv-field { display: flex; flex-direction: column; gap: 3px; }
    .cv-field .label { font-size: .7rem; font-weight: 600; color: #5a7299; text-transform: uppercase; letter-spacing: .5px; }
    .cv-field .value { font-size: .9rem; color: #1a2a4a; font-weight: 500; padding: 8px 12px; background: #f8fafd; border: 1px solid #e8edf6; border-radius: 6px; min-height: 36px; word-break: break-word; }
    .cv-field .value.empty { color: #aab; font-style: italic; }
    .cv-field .value.address { white-space: pre-line; min-height: 56px; }

    /* ── Modern tables ────────────────────────────────── */
    .cv-table-wrap { border-radius: 8px; overflow: hidden; border: 1px solid #e3e8f0; }
    .cv-table { width: 100%; margin: 0; font-size: .85rem; border-collapse: collapse; }
    .cv-table thead th { background: linear-gradient(135deg, #035ab3, #0472d9); color: #fff !important; font-weight: 600; font-size: .8rem; padding: 10px 12px; text-align: left; border: none; letter-spacing: .3px; }
    .cv-table thead th:first-child { padding-left: 16px; }
    .cv-table tbody td { padding: 11px 12px; border-bottom: 1px solid #eef2f7; color: #2c3e5e; vertical-align: middle; }
    .cv-table tbody td:first-child { padding-left: 16px; }
    .cv-table tbody tr:nth-child(even) td { background: #fafbfd; }
    .cv-table tbody tr:hover td { background: #eef3fb; }
    .cv-table tbody tr:last-child td { border-bottom: none; }
    .cv-table .doc-cell { text-align: center; }
    .cv-table .doc-cell a { display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; background: #fff5f5; border: 1px solid #fbd5d5; color: #d9363e; transition: all .2s; text-decoration: none; }
    .cv-table .doc-cell a:hover { background: #d9363e; color: #fff; border-color: #d9363e; transform: translateY(-1px); }
    .cv-table .doc-cell a i { font-size: 1.1rem; }
    .cv-table .no-doc { font-size: .75rem; color: #98a4b8; font-style: italic; }
    .cv-table .empty-row td { text-align: center; padding: 28px; color: #98a4b8; font-style: italic; background: #fafbfd !important; }

    /* ── Identity row ─────────────────────────────────── */
    .cv-identity-row { display: flex; align-items: center; gap: 16px; padding: 12px 16px; background: #f8fafd; border: 1px solid #e8edf6; border-radius: 8px; flex-wrap: wrap; }
    .cv-identity-row .label { font-size: .7rem; font-weight: 600; color: #5a7299; text-transform: uppercase; letter-spacing: .5px; }
    .cv-identity-row .value { font-size: .95rem; color: #1a2a4a; font-weight: 600; font-family: 'Courier New', monospace; letter-spacing: 1px; }

    /* ── Identity grid (Aadhaar + PAN) ────────────────── */
    .cv-identity-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; }
    .cv-identity-card { display: flex; align-items: center; gap: 14px; padding: 14px 16px; background: #f8fafd; border: 1px solid #e8edf6; border-radius: 10px; transition: all .2s; }
    .cv-identity-card:hover { background: #f0f5ff; border-color: #d0ddf5; transform: translateY(-1px); }
    .cv-identity-icon { width: 42px; height: 42px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; color: #fff; font-size: 1.05rem; flex-shrink: 0; }
    .cv-identity-icon.aadhaar { background: linear-gradient(135deg, #035ab3, #0472d9); }
    .cv-identity-icon.pan     { background: linear-gradient(135deg, #1a9e4f, #15883f); }
    .cv-identity-info { flex: 1; min-width: 0; display: flex; flex-direction: column; gap: 2px; }
    .cv-identity-info .label { font-size: .68rem; font-weight: 600; color: #5a7299; text-transform: uppercase; letter-spacing: .5px; }
    .cv-identity-info .value { font-size: .95rem; color: #1a2a4a; font-weight: 700; font-family: 'Courier New', monospace; letter-spacing: 1.2px; word-break: break-all; }
    .cv-identity-doc { display: inline-flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: 8px; background: #fff5f5; border: 1px solid #fbd5d5; color: #d9363e; transition: all .2s; flex-shrink: 0; text-decoration: none; }
    .cv-identity-doc:hover { background: #d9363e; color: #fff; border-color: #d9363e; transform: translateY(-1px); text-decoration: none; }
    .cv-identity-doc i { font-size: 1.1rem; }
    .cv-identity-no-doc { font-size: .7rem; color: #98a4b8; font-style: italic; flex-shrink: 0; }

    /* ── Timeline ─────────────────────────────────────── */
    .cv-timeline { padding: 8px 6px 8px 18px; }
    .cv-timeline-list { position: relative; list-style: none; padding: 0; margin: 0; }
    /* .cv-timeline-list::before { content: ''; position: absolute; left: 145px; top: 8px; bottom: 8px; width: 2px; background: linear-gradient(180deg, #d0ddf5 0%, #e3e8f0 100%); } */
    .cv-tl-item { position: relative; display: flex; align-items: flex-start; gap: 18px; padding: 10px 0; }
    .cv-tl-time { width: 130px; flex-shrink: 0; text-align: right; padding-right: 4px; }
    .cv-tl-time .date { display: block; font-size: .82rem; font-weight: 600; color: #1a2a4a; }
    .cv-tl-time .time { display: block; font-size: .72rem; color: #7a90b0; margin-top: 2px; }
    .cv-tl-dot { width: 14px; height: 14px; border-radius: 50%; background: #fff; border: 3px solid #0472d9; flex-shrink: 0; margin-top: 6px; box-shadow: 0 0 0 4px rgba(4,114,217,.12); position: relative; z-index: 1; }
    .cv-tl-dot.success { border-color: #1a9e4f; box-shadow: 0 0 0 4px rgba(26,158,79,.15); }
    .cv-tl-dot.danger  { border-color: #d9363e; box-shadow: 0 0 0 4px rgba(217,54,62,.15); }
    .cv-tl-dot.warning { border-color: #e0a800; box-shadow: 0 0 0 4px rgba(224,168,0,.15); }
    .cv-tl-dot.info    { border-color: #0472d9; box-shadow: 0 0 0 4px rgba(4,114,217,.12); }
    .cv-tl-body { flex: 1; padding: 4px 14px 14px; background: #f8fafd; border: 1px solid #e8edf6; border-left: 3px solid #0472d9; border-radius: 8px; margin-left: -2px; }
    .cv-tl-body.success { border-left-color: #1a9e4f; }
    .cv-tl-body.danger  { border-left-color: #d9363e; background: #fff5f5; border-color: #fbd5d5; }
    .cv-tl-body.warning { border-left-color: #e0a800; background: #fffbeb; border-color: #fae8b3; }
    .cv-tl-title { font-size: .9rem; font-weight: 600; color: #1a2a4a; margin: 8px 0 4px; }
    .cv-tl-title.success { color: #15803d; }
    .cv-tl-title.danger  { color: #b52a37; }
    .cv-tl-meta { font-size: .8rem; color: #5a7299; margin: 0; line-height: 1.5; }
    .cv-tl-query { background: #fff5f5; border: 1px solid #fbd5d5; color: #b52a37; padding: 6px 10px; margin-top: 8px; border-radius: 6px; font-size: .78rem; }

    /* ── Status badge ─────────────────────────────────── */
    .cv-badge { display: inline-block; padding: 2px 10px; border-radius: 12px; font-size: .72rem; font-weight: 600; letter-spacing: .3px; text-transform: uppercase; }
    .cv-badge.success { background: #d4edda; color: #155724; }
    .cv-badge.danger  { background: #f8d7da; color: #721c24; }
    .cv-badge.warning { background: #fff3cd; color: #856404; }
    .cv-badge.info    { background: #d1ecf1; color: #0c5460; }

    /* ── Action bar ───────────────────────────────────── */
    .cv-action-bar { display: flex; justify-content: flex-end; gap: 10px; margin-top: 22px; }
    .cv-btn-back { display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #035ab3, #0472d9); color: #fff; border: none; border-radius: 8px; padding: 10px 22px; font-size: .88rem; font-weight: 600; cursor: pointer; box-shadow: 0 3px 10px rgba(3,90,179,.25); transition: all .2s; text-decoration: none; }
    .cv-btn-back:hover { background: linear-gradient(135deg, #024a98, #035ab3); color: #fff; box-shadow: 0 4px 14px rgba(3,90,179,.35); transform: translateY(-1px); text-decoration: none; }

    /* ── Responsive ───────────────────────────────────── */
    @media (max-width: 768px) {
        .cv-timeline-list::before { left: 7px; }
        .cv-tl-time { width: auto; text-align: left; padding-left: 28px; padding-right: 0; }
        .cv-tl-item { flex-direction: column; gap: 4px; }
        .cv-tl-dot { position: absolute; left: 0; top: 14px; }
        .cv-tl-body { width: 100%; margin-left: 0; }
        .cv-hero { padding: 18px; }
        .cv-hero-info h2 { font-size: 1.1rem; }
    }
</style>

@php
    $formNameUpper      = strtoupper((string)($applicant->form_name ?? ''));
    $showWorkExperience = in_array($formNameUpper, ['FORM S', 'S', 'FORM W', 'W']);

    try {
        $decryptedaadhar = isset($applicant->aadhaar) ? Crypt::decryptString($applicant->aadhaar) : null;
    } catch (\Exception $e) {
        $decryptedaadhar = null;
    }
    $masked = $decryptedaadhar && strlen($decryptedaadhar) === 12
        ? str_repeat('X', 8) . substr($decryptedaadhar, -4)
        : ($decryptedaadhar ? 'Invalid Aadhaar' : 'N/A');

    $panEncrypted = $applicant->pancard ?? $applicant->pan_card ?? $applicant->pan_no ?? null;
    try {
        $panRaw = !empty($panEncrypted) ? Crypt::decryptString($panEncrypted) : null;
    } catch (\Exception $e) {
        $panRaw = $panEncrypted;
    }
    if (empty($panRaw)) {
        $panMasked = 'N/A';
    } elseif (strlen($panRaw) === 10) {
        $panMasked = strtoupper(substr($panRaw, 0, 2)) . str_repeat('X', 5) . strtoupper(substr($panRaw, -3));
    } else {
        $panMasked = strtoupper($panRaw);
    }

    $aadhaarDoc = $applicant->aadhaar_doc ?? null;
    $panDoc     = $applicant->pancard_doc ?? $applicant->pan_doc ?? null;
@endphp

<div id="content" class="main-content cv-page">
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">

            {{-- ── Breadcrumb ── --}}
            <div class="cv-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.completed_applications') }}"><i class="fa fa-check-circle"></i> Completed Applications</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Application</li>
                    </ol>
                </nav>
            </div>

            <div class="container-xxl px-3">

                {{-- ── Hero / Applicant Header ── --}}
                <div class="cv-hero">
                    <div class="cv-hero-grid">
                        <div class="cv-hero-photo">
                            @if(isset($uploadedPhoto) && !empty($uploadedPhoto->upload_path))
                                <img src="{{ url($uploadedPhoto->upload_path) }}" alt="Applicant Photo">
                            @else
                                <div class="no-photo"><i class="fa fa-user fa-2x"></i><br>No Photo</div>
                            @endif
                        </div>
                        <div class="cv-hero-info">
                            <h2>{{ $applicant->applicant_name ?? 'Applicant' }}</h2>
                            <span class="cv-app-id"><i class="fa fa-id-card-o"></i> {{ $applicant->application_id ?? '—' }}</span>
                            <div class="cv-hero-meta">
                                <div>
                                    <strong>Father's Name</strong>
                                    {{ $applicant->fathers_name ?? '—' }}
                                </div>
                                <div>
                                    <strong>Date of Birth</strong>
                                    {{ $applicant->d_o_b ?? '—' }}
                                    @if(!empty($applicant->age)) <span style="opacity:.8">({{ $applicant->age }} yrs)</span> @endif
                                </div>
                                @if(!empty($applicant->form_name))
                                    <div>
                                        <strong>Form Type</strong>
                                        Form {{ $applicant->form_name }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Applicant Details ── --}}
                <div class="cv-card">
                    <div class="cv-card-head">
                        <span class="icon"><i class="fa fa-user-circle-o"></i></span>
                        <h4>Applicant's Details</h4>
                    </div>
                    <div class="cv-card-body">
                        <div class="cv-field-grid">
                            <div class="cv-field">
                                <span class="label">Applicant ID</span>
                                <span class="value {{ empty($applicant->application_id) ? 'empty' : '' }}">{{ $applicant->application_id ?? '—' }}</span>
                            </div>
                            <div class="cv-field">
                                <span class="label">Applicant Name</span>
                                <span class="value {{ empty($applicant->applicant_name) ? 'empty' : '' }}">{{ $applicant->applicant_name ?? '—' }}</span>
                            </div>
                            <div class="cv-field">
                                <span class="label">Father's Name</span>
                                <span class="value {{ empty($applicant->fathers_name) ? 'empty' : '' }}">{{ $applicant->fathers_name ?? '—' }}</span>
                            </div>
                            <div class="cv-field">
                                <span class="label">D.O.B &amp; Age</span>
                                <span class="value {{ empty($applicant->d_o_b) ? 'empty' : '' }}">
                                    {{ $applicant->d_o_b ?? '—' }}
                                    @if(!empty($applicant->age)) ({{ $applicant->age }} years) @endif
                                </span>
                            </div>
                            <div class="cv-field" style="grid-column: 1 / -1;">
                                <span class="label">Address</span>
                                <span class="value address {{ empty($applicant->applicants_address) ? 'empty' : '' }}">{{ $applicant->applicants_address ?? '—' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Educational Qualifications ── --}}
                <div class="cv-card">
                    <div class="cv-card-head">
                        <span class="icon"><i class="fa fa-graduation-cap"></i></span>
                        <h4>Educational Qualifications</h4>
                    </div>
                    <div class="cv-card-body">
                        <div class="cv-table-wrap">
                            <div class="table-responsive">
                                <table class="cv-table">
                                    <thead>
                                        <tr>
                                            <th>Degree</th>
                                            <th>Institution</th>
                                            <th>Year of Passing</th>
                                            <th>Certificate No</th>
                                            <th class="text-center">Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($educationalQualifications ?? [] as $education)
                                            @php $certificateNo = data_get($education, 'certificate_no'); @endphp
                                            <tr>
                                                <td><strong>{{ $education->educational_level }}</strong></td>
                                                <td>{{ $education->institute_name }}</td>
                                                <td>{{ $education->year_of_passing }}</td>
                                                <td>{{ ($certificateNo !== null && $certificateNo !== '') ? $certificateNo : 'N/A' }}</td>
                                                <td class="doc-cell">
                                                    @if(!empty($education->upload_document))
                                                        <a href="{{ url($education->upload_document) }}" target="_blank" title="View document">
                                                            <i class="fa fa-file-pdf-o"></i>
                                                        </a>
                                                    @else
                                                        <span class="no-doc">No document</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="empty-row"><td colspan="5">No educational details available.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @if($showWorkExperience)
                    {{-- ── Work Experience ── --}}
                    <div class="cv-card">
                        <div class="cv-card-head">
                            <span class="icon"><i class="fa fa-briefcase"></i></span>
                            <h4>Work Experience</h4>
                        </div>
                        <div class="cv-card-body">
                            <div class="cv-table-wrap">
                                <div class="table-responsive">
                                    <table class="cv-table">
                                        <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Designation</th>
                                                <th>Years of Experience</th>
                                                <th class="text-center">Document</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($workExperience ?? [] as $experience)
                                                <tr>
                                                    <td><strong>{{ $experience->emp_cate ?? $experience->company_name ?? '' }}</strong></td>
                                                    <td>{{ $experience->designation }}</td>
                                                    <td>{{ $experience->total_exp ?? $experience->experience ?? 0 }} years</td>
                                                    <td class="doc-cell">
                                                        @if(!empty($experience->upload_document))
                                                            <a href="{{ url($experience->upload_document) }}" target="_blank" title="View document">
                                                                <i class="fa fa-file-pdf-o"></i>
                                                            </a>
                                                        @else
                                                            <span class="no-doc">No document</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="empty-row"><td colspan="4">No work experience available.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- ── Identity Details ── --}}
                <div class="cv-card">
                    <div class="cv-card-head">
                        <span class="icon"><i class="fa fa-id-card"></i></span>
                        <h4>Identity Details</h4>
                    </div>
                    <div class="cv-card-body">
                        <div class="cv-identity-grid">
                            {{-- Aadhaar --}}
                            <div class="cv-identity-card">
                                <div class="cv-identity-icon aadhaar"><i class="fa fa-shield"></i></div>
                                <div class="cv-identity-info">
                                    <span class="label">Aadhaar Number</span>
                                    <span class="value">{{ $masked }}</span>
                                </div>
                                @if(!empty($aadhaarDoc))
                                    <a href="{{ Route::has('document.show') ? route('document.show', ['type' => 'aadhaar', 'filename' => $aadhaarDoc]) : url($aadhaarDoc) }}" target="_blank" class="cv-identity-doc" title="View Aadhaar document">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                @else
                                    <span class="cv-identity-no-doc">No document</span>
                                @endif
                            </div>

                            {{-- PAN --}}
                            <div class="cv-identity-card">
                                <div class="cv-identity-icon pan"><i class="fa fa-credit-card"></i></div>
                                <div class="cv-identity-info">
                                    <span class="label">PAN Number</span>
                                    <span class="value">{{ $panMasked }}</span>
                                </div>
                                @if(!empty($panDoc))
                                    <a href="{{ Route::has('document.show') ? route('document.show', ['type' => 'pan', 'filename' => $panDoc]) : url($panDoc) }}" target="_blank" class="cv-identity-doc" title="View PAN document">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                @else
                                    <span class="cv-identity-no-doc">No document</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Workflow Timeline ── --}}
                <div class="cv-card" id="timelineMinimal">
                    <div class="cv-card-head">
                        <span class="icon"><i class="fa fa-clock-o"></i></span>
                        <h4>Workflow Timeline</h4>
                    </div>
                    <div class="cv-card-body">
                        <div class="cv-timeline">
                            <ul class="cv-timeline-list">
                                @foreach ($workflows as $row)
                                    @php
                                        $processedBy = $row->processed_by;
                                        $roleLabel = $processedBy === 'SE' ? 'Secretary' : $processedBy;
                                        $isApplicantResubmission = $row->appl_status == 'RE' && $processedBy === 'AP';
                                        $statusClass = $row->appl_status == 'RE' ? 'danger' : ($row->appl_status == 'A' ? 'success' : ($row->appl_status == 'RJ' ? 'danger' : 'info'));
                                        $tsRaw = $row->created_at;
                                        $dateText = format_date_other($tsRaw);
                                        $timeText = '';
                                        try { $timeText = \Carbon\Carbon::parse($tsRaw)->format('h:i A'); } catch (\Exception $e) {}
                                    @endphp
                                    <li class="cv-tl-item">
                                        <div class="cv-tl-time">
                                            <span class="date">{{ $dateText }}</span>
                                            @if(!empty($timeText))<span class="time">{{ $timeText }}</span>@endif
                                        </div>
                                        <div class="cv-tl-dot {{ $statusClass }}"></div>
                                        <div class="cv-tl-body {{ $statusClass }}">
                                            @if ($isApplicantResubmission)
                                                <p class="cv-tl-title"><i class="fa fa-undo"></i> Resubmitted by Applicant</p>
                                            @elseif ($row->appl_status == 'RE')
                                                <p class="cv-tl-title danger"><i class="fa fa-reply"></i> Returned by {{ $roleLabel }}</p>
                                            @elseif ($row->appl_status == 'A')
                                                <p class="cv-tl-title success"><i class="fa fa-check-circle"></i> Approved by {{ $roleLabel }}</p>
                                            @elseif (isset($row->appl_status) && $row->appl_status == 'RJ')
                                                <p class="cv-tl-title danger"><i class="fa fa-times-circle"></i> Rejected by {{ $roleLabel }}</p>
                                            @else
                                                <p class="cv-tl-title"><i class="fa fa-cog"></i> Processed by {{ $roleLabel }}</p>
                                            @endif

                                            @if (!$isApplicantResubmission)
                                                <p class="cv-tl-meta">
                                                    @if (isset($row->appl_status) && $row->appl_status == 'RJ' && !empty($row->reject_reason))
                                                        <strong>Reason:</strong> {{ $row->reject_reason }}
                                                    @else
                                                        @if (empty($row->name))
                                                            Approved by {{ $roleLabel }}
                                                        @else
                                                            <strong>Forwarded to:</strong> {{ $row->name }}
                                                            @if(!empty($row->remarks)) <br><strong>Remarks:</strong> {{ $row->remarks }} @endif
                                                        @endif
                                                    @endif
                                                </p>
                                            @endif

                                            @if(!empty($row->query_status) && $row->query_status == 'P' && !empty($row->queries) && !$isApplicantResubmission)
                                                <div class="cv-tl-query">
                                                    <i class="fa fa-question-circle"></i>
                                                    <strong>Query raised by {{ $roleLabel }}:</strong>
                                                    {{ is_string($row->queries) ? $row->queries : implode(', ', (array) json_decode($row->queries, true)) }}
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach

                                @if($user_entry)
                                    @php
                                        $tsRawU = $user_entry->created_at ?? $user_entry->dt_submit ?? $user_entry->updated_at ?? null;
                                        $dateTextU = format_date_other($tsRawU);
                                        $timeTextU = '';
                                        try { $timeTextU = \Carbon\Carbon::parse($tsRawU)->format('h:i A'); } catch (\Exception $e) {}
                                    @endphp
                                    <li class="cv-tl-item">
                                        <div class="cv-tl-time">
                                            <span class="date">{{ $dateTextU }}</span>
                                            @if(!empty($timeTextU))<span class="time">{{ $timeTextU }}</span>@endif
                                        </div>
                                        <div class="cv-tl-dot warning"></div>
                                        <div class="cv-tl-body warning">
                                            <p class="cv-tl-title"><i class="fa fa-inbox"></i> Received from Applicant</p>
                                            <p class="cv-tl-meta">
                                                <strong>Form:</strong> {{ $user_entry->form_name ?? 'N/A' }} &nbsp;·&nbsp;
                                                <strong>License:</strong> {{ $user_entry->license_name ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- ── Action Bar ── --}}
                <div class="cv-action-bar">
                    <a href="{{ route('admin.completed_applications') }}" class="cv-btn-back">
                        <i class="fa fa-arrow-left"></i> Back to Completed Applications
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@include('admin.include.footer')
