@include('include.header')

<style>
    hr {
        margin-top: 2px;
        margin-bottom: 5px;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .form-group {
        margin-bottom: 0px;
    }

    #success {
        background: green;
    }

    #error {
        background: red;
    }

    #warning {
        background: coral;
    }

    #info {
        background: cornflowerblue;
    }

    #question {
        background: grey;
    }

    /* .swal2-popup.swal2-modal.swal2-show {
        width: 100%;
    } */

    .swal2-popup li {
        font-size: 15px;
        margin-bottom: 8px;
    }


    .swal2-popup li {
        font-size: 15px;
        margin-bottom: 8px;
    }

    /* Server-side validation highlighting */
    .form-control.is-invalid,
    select.is-invalid,
    textarea.is-invalid {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.25);
    }
    .server-field-error {
        font-size: 12px;
        line-height: 1.2;
    }
    .server-error-summary ul {
        font-size: 14px;
    }

    .swal2-popup li ul {
        margin-left: 15px;
    }

    /* Ensure Font Awesome icons show inside buttons (e.g. add/remove education/work) */
    .comp_certificate .btn .fa,
    .comp_certificate .btn i.fa {
        font-family: 'FontAwesome';
        display: inline-block;
    }

    /* Form title: vertically center hyphen with text */
    .form-title-hyphen {
        display: inline-block;
        vertical-align: middle;
        position: relative;
        top: -0.08em;
    }

    /* Space between form name line and RETURN/Return */
    .form-title-br + .form-title-return {
        margin-top: 1rem;
    }

    /* ===== Form S — Work experience table ===== */
    #work-table.work-exp-table { font-size: .8125rem; width: 100%; max-width: 100%; }
    #work-table.work-exp-table thead th { font-size: .78rem; font-weight: 600; padding: .35rem .4rem; vertical-align: middle; line-height: 1.25; text-align: center; }
    #work-table.work-exp-table tbody td { padding: .4rem .45rem; vertical-align: top; }
    #work-table.work-exp-table .work-exp-col-sno { width: 3rem; }
    #work-table.work-exp-table .work-exp-col-type { width: 12%; max-width: 10.5rem; }
    #work-table.work-exp-table .work-exp-col-employer { width: 16%; max-width: 12rem; }
    #work-table.work-exp-table .work-exp-col-years { width: 32%; min-width: 17rem; }
    #work-table.work-exp-table .work-exp-col-designation { width: 12%; }
    #work-table.work-exp-table .work-exp-col-upload { width: 22%; }
    #work-table.work-exp-table .work-exp-col-actions { width: 2.75rem; white-space: nowrap; vertical-align: middle; text-align: center; }
    #work-table.work-exp-table .work-exp-upload-head { font-size: .72rem; line-height: 1.2; }
    #work-table.work-exp-table .work-exp-upload-head .file-limit { font-size: .68rem; }
    #work-table.work-exp-table .work-exp-inline { display: flex; flex-wrap: nowrap; align-items: flex-end; gap: .25rem; }
    #work-table.work-exp-table .work-exp-date-group { flex: 1 1 auto; min-width: 7.5rem; max-width: 10rem; }
    #work-table.work-exp-table .work-exp-total-inline { flex: 0 0 4rem; min-width: 4rem; max-width: 4.5rem; }
    #work-table.work-exp-table .work-exp-label-fromto { font-size: .72rem; font-weight: 600; color: #212529; margin-bottom: .2rem; line-height: 1.2; }
    #work-table.work-exp-table thead th.work-exp-col-years { vertical-align: top; }
    #work-table.work-exp-table .work-exp-years-title { text-align: center; margin-bottom: .35rem; font-weight: 600; font-size: .78rem; }
    #work-table.work-exp-table .work-exp-inline--head { align-items: flex-end; border-top: 1px solid #dee2e6; padding-top: .25rem; }
    #work-table.work-exp-table .work-exp-inline--head .work-exp-label-fromto { margin-bottom: 0; }
    #work-table.work-exp-table .work-exp-inline--head .work-exp-date-group,
    #work-table.work-exp-table .work-exp-inline--head .work-exp-total-inline { position: relative; padding-left: .35rem; }
    #work-table.work-exp-table .work-exp-inline--head .work-exp-date-group + .work-exp-date-group,
    #work-table.work-exp-table .work-exp-inline--head .work-exp-total-inline { border-left: 1px solid #dee2e6; }
    #work-table.work-exp-table .work-date-from,
    #work-table.work-exp-table .work-date-to { font-size: .8125rem; color: #212529; min-width: 9.5rem; width: 100%; }
    #work-table.work-exp-table .work-year-total-display { max-width: 4.5rem; font-size: .7rem; padding: .22rem .3rem; line-height: 1.3; text-align: center; }
    #work-table.work-exp-table .work-employer-label { font-size: .7rem !important; margin-bottom: .15rem !important; }
    #work-table.work-exp-table .form-s-actions-stack { display: flex; flex-direction: column; align-items: center; justify-content: flex-start; gap: .35rem; }
    #work-table.work-exp-table .work-block--intimation { margin-top: .25rem; }
    #work-table.work-exp-table .work-block--intimation .work-intimation-date { font-size: .78rem; }
    /* Form W work-experience table */
    #work-table.work-table-w { font-size: .8125rem; width: 100%; max-width: 100%; }
    #work-table.work-table-w thead th { font-size: .78rem; font-weight: 600; padding: .35rem .4rem; vertical-align: middle; line-height: 1.25; }
    #work-table.work-table-w thead th.work-exp-col-years { vertical-align: top; }
    #work-table.work-table-w tbody td { padding: .4rem .45rem; vertical-align: top; }
    #work-table.work-table-w .work-exp-col-sno { width: 2.5rem; min-width: 2.5rem; white-space: nowrap; text-align: center; }
    #work-table.work-table-w .work-exp-col-company { width: 28%; }
    #work-table.work-table-w .work-exp-col-years { width: 38%; min-width: 17rem; }
    #work-table.work-table-w .work-exp-col-designation { width: 20%; }
    #work-table.work-table-w td.work-exp-col-actions { vertical-align: middle; width: 2.75rem; white-space: nowrap; text-align: center; }
    #work-table.work-table-w .work-exp-inline { display: flex; flex-wrap: nowrap; align-items: flex-end; gap: .25rem; }
    #work-table.work-table-w .work-exp-date-group { flex: 1 1 auto; min-width: 7.5rem; max-width: 10rem; }
    #work-table.work-table-w .work-exp-total-inline { flex: 0 0 4rem; min-width: 4rem; max-width: 4.5rem; }
    #work-table.work-table-w .work-exp-label-fromto { font-size: .72rem; font-weight: 600; color: #212529; margin-bottom: .2rem; line-height: 1.2; }
    #work-table.work-table-w .work-exp-years-title { text-align: center; margin-bottom: .35rem; font-weight: 600; font-size: .78rem; }
    #work-table.work-table-w .work-exp-inline--head { align-items: flex-end; border-top: 1px solid #dee2e6; padding-top: .25rem; }
    #work-table.work-table-w .work-exp-inline--head .work-exp-label-fromto { margin-bottom: 0; }
    #work-table.work-table-w .work-exp-inline--head .work-exp-date-group,
    #work-table.work-table-w .work-exp-inline--head .work-exp-total-inline { position: relative; padding-left: .35rem; }
    #work-table.work-table-w .work-exp-inline--head .work-exp-date-group + .work-exp-date-group,
    #work-table.work-table-w .work-exp-inline--head .work-exp-total-inline { border-left: 1px solid #dee2e6; }
    #work-table.work-table-w .work-date-from,
    #work-table.work-table-w .work-date-to { font-size: .8125rem; color: #212529; min-width: 9.5rem; width: 100%; }
    #work-table.work-table-w .work-year-total-display { max-width: 4.5rem; font-size: .7rem; padding: .22rem .3rem; line-height: 1.3; text-align: center; }
</style>


<section class="">
    <div class="container">
        <ul id="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><span class="fa fa-home"> </span> Dashboard</a></li>
            <li>
                <a href="#">
                    <span class=" fa fa-info-circle"> </span>
                    @if(isset($application_details->form_name) && $application_details->form_name === 'W')
                        RETURN – Form {{ $application_details->form_name }}
                    @else
                        Return – Form {{ $application_details->form_name }}
                    @endif
                </a>
            </li>

        </ul>
    </div>
</section>
<section class="apply-form">
    <div class="auto-container">
        <div class="wrapper-box">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="apply-card apply-card-info comp_certificate" data-select2-id="14">
               <div class="apply-card-header" style="background-color: rgb(3 90 179); padding: 15px;">
                            <!-- <div class="row">
                                <div class="col-6 col-lg-8">
                                    <h5 class="card-title_apply text-black text-left"> New Application Form of
                                        <span style="font-weight: 600;">[ Form '{{ $application_details->form_name }}' -
                                            License '{{ $application_details->license_name }}' ] </span>
                                    </h5>
                                </div>
                                <div class="col-6 col-lg-4 text-md-right">
                                    <span class="text-dark" target="_blank"><i class="fa fa-file-pdf-o" style="color: red;"></i>  Important Notes (7.1 KB)</span>
                                      English | <a href="{{url('assets/pdf/form_a_notes.pdf')}}" class="text-dark" target="_blank">தமிழ்</a>
                                </div>
                            </div> -->

                            <div class="col-lg-12 col-12">

                                <div class="text-center text-white text-uppercase font-weight-bold">
                                    {{-- <h5 class="card-title_apply text-black mb-1">GOVERNMENT OF TAMILNADU</h5>
                                        <h5 class="card-title_apply text-black mb-1">THE ELECTRICAL LICENSING BOARD</h5> --}}
                                    <h5 class="card-title_apply text-white text-uppercase font-weight-bold">
                                        Application for {{$licence_name->licence_name}}
                                    </h5>
                                    <!-- <h5 class="card-title_apply text-white text-uppercase mt-2" >
                                            மேற்பார்வையாளர் தகுதி சான்றிதழ் பெறுவதற்கான விண்ணப்பம்
                                        </h5> -->
                                    <h6 class="card-title_apply text-white mt-2 form-title">
                                        Form <span class="form-title-hyphen">-</span> {{ $application_details->form_name }} /
                                        Certificate <span class="form-title-hyphen">-</span> {{ $application_details->license_name }}
                                        <br class="form-title-br">
                                        {{-- <span class="d-block form-title-return">
                                        @if(isset($application_details->form_name) && $application_details->form_name === 'W')
                                            RETURN
                                        @else
                                            Return
                                        @endif
                                        </span> --}}
                                    </h6>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12 col-12 text-right">
                                    <span class="text-white font-weight-bold" target="_blank"> Instructions
                                    </span> <a href="{{url('assets/pdf/form_s_notes.pdf')}}" class="text-white" target="_blank">English <i class="fa fa-file-pdf-o" ></i> (8 KB)</a>
                                </div>

                            </div>

                        </div>

                              <div class="row">
                                <div class="col-lg-12 col-12 text-md-right text-head pl-5 mt-1" >
                                  <p class="pr-3 f-s-14"> <span class="text-red font-weight-bold">*</span> Fields are Mandatory </p>
                                </div>

                            </div>
                            @if(isset($queries) && $queries->isNotEmpty())
                                @php
                                    // Determine who raised the query (Secretary / President etc.)
                                    $raisedByCodes = collect($queries)->pluck('raised_by')->filter()->unique()->values();
                                    $raisedByLabels = $raisedByCodes->map(function ($code) {
                                        $code = (string) $code;
                                        return match ($code) {
                                            'SE' => 'Secretary',
                                            'PR' => 'President',
                                            default => $code, // Fallback: show raw code if unknown
                                        };
                                    })->implode(', ');
                                @endphp
                                <style>
                                    @keyframes query-blink {
                                        0%, 100% { opacity: 1; }
                                        50%      { opacity: 0.2; }
                                    }

                                    /* Blink only the Font Awesome warning icon */
                                    .query-item-blink {
                                        animation: query-blink 1.2s infinite;
                                    }
                                </style>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3" role="alert"
                                             style="background-color:#fff3e0;border-left:5px solid #ff9800;color:#4e342e;padding:12px 16px;border-radius:4px;">
                                            <h6 class="alert-heading font-weight-bold mb-2" style="margin:0 0 4px 0;">
                                                Query raised
                                                @if($raisedByLabels !== '')
                                                    by {{ $raisedByLabels }}
                                                @endif
                                            </h6>
                                            <p class="mb-1" style="margin-bottom:6px;">
                                                The following issue(s) were reported. Please correct and submit again:
                                            </p>
                                            <ul class="mb-0 pl-4 query-list" style="margin:0;padding-left:20px;">
                                                @foreach($queries as $q)
                                                    @php
                                                        $items = is_string($q->query_type) ? json_decode($q->query_type, true) : $q->query_type;
                                                        $items = is_array($items) ? $items : [$items];
                                                    @endphp
                                                    @foreach($items as $item)
                                                        <li class="text-danger"><i class="fa fa-exclamation-triangle text-danger query-item-blink" style="padding-right: 5px;"></i>  {{ is_string($item) ? $item : '' }}</li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                            @php
                                                $remarksText = isset($returnRemarks) ? trim((string) $returnRemarks) : '';
                                            @endphp
                                            @if($remarksText !== '')
                                                <div class="mt-2" style="background:#fff8e1;border:1px dashed #ffb74d;padding:10px 12px;border-radius:4px;">
                                                    <div style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                                        <span class="fw-semibold" style="font-weight:600;">REMARKS :</span>
                                                        <span>{{ $remarksText }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        <div class="apply-card-body">

                            <form id="competency_form_ws" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-md-6 ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-5 ">
                                                            <label for="Name">1. Applicant's Name <span
                                                                    style="color: red;">*</span></label>
                                                            <br>
                                                            <label for="tamil" class="tamil">விண்ணப்பதாரர்
                                                                பெயர்</label>
                                                        </div>

                                                        <div class="col-12 col-md-7">
                                                            <input type="hidden"
                                                                class="form-control text-box single-line"
                                                                id="login_id_store" name="login_id" type="text"
                                                                value="{{ Auth::user()->login_id }}">

                                                            {{-- <input type="text"
                                                                class="form-control text-box single-line"
                                                                id="old_id" name="old_id" type="text"
                                                                value="value= "{{ $applicationid }}"> --}}


                                                            <input type="hidden" id="application_id"
                                                                name="application_id"
                                                                value="{{ isset($application_details) ? $application_details->application_id : '' }}">
                                                            <input type="hidden" id="license_number"
                                                                name="license_number"
                                                                value="{{ isset($license_details) ? $license_details->license_number : '' }}">
                                                            <input autocomplete="off"
                                                                class="form-control text-box single-line"
                                                                id="Applicant_Name" name="applicant_name" type="text"
                                                                value="{{ isset($application_details) ? $application_details->applicant_name : Auth::user()->name }}" readonly> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-3">
                                                            <label for="Name">2. Father's Name <span
                                                                    style="color: red;">*</span></label>
                                                            <br>
                                                            <label for="tamil" class="tamil">தகப்பனார் பெயர்</label>
                                                        </div>

                                                        <div class="col-12 col-md-8 pd-left-40">
                                                            <input autocomplete="off"
                                                                class="form-control text-box single-line"
                                                                id="Fathers_Name" name="fathers_name" type="text"
                                                                value="{{ isset($application_details) ? $application_details->fathers_name : '' }}" maxlength="50">

                                                            <span class="error-message text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-12 col-md-6 ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-5 ">
                                                            <label for="Name">3. Applicant Address <span
                                                                    style="color: red;">*</span><br><span
                                                                    class="text-label">(To be clear)</span>
                                                            </label>
                                                            <br>
                                                            <label for="tamil" class="tamil">விண்ணப்பதாரர் முகவரி
                                                                <span class="text-label">(தெளிவாக இருக்க
                                                                    வேண்டும்)</span></label>
                                                        </div>
                                                        <div class="col-12 col-md-7">
                                                            <textarea rows="3" class="form-control " name="applicants_address" maxlength="250">{{ isset($application_details) ? $application_details->applicants_address : Auth::user()->address }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 ">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-7">
                                                            <div class="row align-items-center">
                                                                <div class="col-12 col-md-6">
                                                                    <label for="Name">4. (i) D.O.B <span
                                                                            style="color: red;">*</span></label><br>
                                                                    <label for="tamil" class="tamil">பிறந்த நாள்,
                                                                        மாதம், வருடம்</label>
                                                                </div>
                                                               
                                                                <div class="col-12 col-md-6">
                                                                    <input class="form-control text-box single-line"
                                                                        type="text" autocomplete="off"
                                                                        id="d_o_b" name="d_o_b"
                                                                        value="{{ ($application_details->d_o_b) ?? '' }}">
                                                                    <span id="dob-error" class="text-danger d-block mt-1" style="display: none;"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-5">
                                                            <div class="row align-items-center">
                                                                <div class="col-12 col-md-5">
                                                                    <label for="Name">4. (ii) Age <span
                                                                            style="color: red;">*</span></label><br>
                                                                    <label for="tamil" class="tamil">வயது</label>
                                                                </div>
                                                                <div class="col-12 col-md-7">
                                                                    <input autocomplete="off"
                                                                        class="form-control text-box single-line"
                                                                        id="age" name="age" type="number" value="{{ isset($application_details) ? $application_details->age : '' }}"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @php $formName = $application_details->form_name ?? ''; @endphp
                                            <div class="row align-items-center head_label">
                                                <div class="col-12 col-md-12 ">
                                                    <label>
                                                        5. Applicant's Educational/ Technical Qualification and pass
                                                        details <span class="text-label"><span style="color: red;">*</span> (Upload the Documents)
                                                        </span>
                                                    </label>
                                                    <br>
                                                    <label for="tamil" class="tamil">விண்ணப்பதாரரின் தொழில்நுட்ப
                                                        தேர்ச்சி மற்றும் தேர்ச்சி பற்றிய விவரங்கள்
                                                        <span class="text-label">(ஆவணங்களை பதிவேற்ற
                                                            வேண்டும்)</span></label>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped"
                                                    id="education-table">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2">S.No</th>
                                                            <th rowspan="2">Education Level</th>
                                                            <th rowspan="2">Institution/School Name</th>
                                                            <th colspan="2" class="text-center">Year of Passing</th>
                                                            <th rowspan="2">Certificate No</th>
                                                            <th class="text-center" rowspan="2">Upload Document
                                                                <br><span class="file-limit"> File type: PDF ( Min 5 KB Max 200 KB)</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <button type="button"
                                                                    class="btn btn-primary add-more-education">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">Month</th>
                                                            <th class="text-center">Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="education-container">
                                                        {{-- @php
                                                            var_dump($edu_details->isEmpty());die;
                                                        @endphp --}}
                                                        @if ($edu_details->isNotEmpty())
                                                        @foreach ($edu_details as $edu_details)
                                                        <tr class="education-fields text-center">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @php $formName = $application_details->form_name ?? ''; @endphp
                                                                <select class="form-control" name="educational_level[]">
                                                                    <option disabled {{ empty($edu_details->educational_level) ? 'selected' : '' }}>Select Education</option>
                                                                    @if ($formName === 'S')
                                                                        <option value="DEE" {{ $edu_details->educational_level == 'DEE' ? 'selected' : '' }}>Diploma(Electrical Engineering)</option>
                                                                        <option value="BEE" {{ $edu_details->educational_level == 'BEE' ? 'selected' : '' }}>B.E(Electrical Engineering)</option>
                                                                        <option value="MEE" {{ $edu_details->educational_level == 'MEE' ? 'selected' : '' }}>M.E(Electrical Engineering)</option>
                                                                        <option value="AMIE" {{ $edu_details->educational_level == 'AMIE' ? 'selected' : '' }}>A pass in AMIE</option>
                                                                    @elseif ($formName === 'W')
                                                                        <option value="NTC" {{ $edu_details->educational_level == 'NTC' ? 'selected' : '' }}>NTC</option>
                                                                        <option value="Provisional" {{ $edu_details->educational_level == 'Provisional' ? 'selected' : '' }}>Provisional</option>
                                                                        <option value="Ex-Serviceman" {{ $edu_details->educational_level == 'Ex-Serviceman' ? 'selected' : '' }}>Ex-Serviceman</option>
                                                                        <option value="H to B" {{ $edu_details->educational_level == 'H to B' ? 'selected' : '' }}>H to B</option>
                                                                        <option value="SCVT" {{ $edu_details->educational_level == 'SCVT' ? 'selected' : '' }}>SCVT</option>
                                                                    @elseif ($formName === 'WH')
                                                                        <option value="Up to 8th Standard" {{ $edu_details->educational_level == 'Up to 8th Standard' ? 'selected' : '' }}>Up to 8th Standard</option>
                                                                        <option value="Wireman Helper Examination" {{ $edu_details->educational_level == 'Wireman Helper Examination' ? 'selected' : '' }}>Wireman Helper Examination</option>
                                                                        <option value="ITI Certificate" {{ $edu_details->educational_level == 'ITI Certificate' ? 'selected' : '' }}>ITI Certificate</option>
                                                                    @elseif ($formName === 'P')
                                                                        <option value="BEM" {{ $edu_details->educational_level == 'BEM' ? 'selected' : '' }}>B.E(Mechanical)</option>
                                                                        <option value="BEE" {{ $edu_details->educational_level == 'BEE' ? 'selected' : '' }}>B.E(Electrical)</option>
                                                                        <option value="DiplomaM" {{ $edu_details->educational_level == 'DiplomaM' ? 'selected' : '' }}>Diploma(Mechanical)</option>
                                                                        <option value="DiplomaE" {{ $edu_details->educational_level == 'DiplomaE' ? 'selected' : '' }}>Diploma(Electrical)</option>
                                                                    @else
                                                                        <option value="PG" {{ $edu_details->educational_level == 'PG' ? 'selected' : '' }}>PG</option>
                                                                        <option value="UG" {{ $edu_details->educational_level == 'UG' ? 'selected' : '' }}>UG</option>
                                                                        <option value="B.E" {{ $edu_details->educational_level == 'B.E' ? 'selected' : '' }}>B.E</option>
                                                                        <option value="M.E" {{ $edu_details->educational_level == 'M.E' ? 'selected' : '' }}>M.E</option>
                                                                        <option value="Diploma" {{ $edu_details->educational_level == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                                                        <option value="+2" {{ $edu_details->educational_level == '+2' ? 'selected' : '' }}>+2</option>
                                                                        <option value="10" {{ $edu_details->educational_level == '10' ? 'selected' : '' }}>10</option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control" name="institute_name[]" value="{{ isset($edu_details->institute_name) ? $edu_details->institute_name : '' }}"></td>
                                                            <td>
                                                                @php
                                                                    $savedMonth = isset($edu_details->month_passing) ? str_pad((string) $edu_details->month_passing, 2, '0', STR_PAD_LEFT) : '';
                                                                    $months = [
                                                                        '01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr',
                                                                        '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug',
                                                                        '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec',
                                                                    ];
                                                                @endphp
                                                                <select name="month_of_passing[]" class="form-control">
                                                                    <option value="" {{ empty($savedMonth) ? 'selected' : '' }}>Select Month</option>
                                                                    @foreach ($months as $mVal => $mLabel)
                                                                        <option value="{{ $mVal }}" {{ $savedMonth === $mVal ? 'selected' : '' }}>{{ $mLabel }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="year_of_passing[]" class="form-control">
                                                                    <option value="0" disabled {{ empty($edu_details->year_of_passing) ? 'selected' : '' }}>Select Year</option>
                                                                    @php
                                                                        $currentYear = date('Y');
                                                                    @endphp
                                                                    @for ($year = $currentYear; $year >= 1980; $year--)
                                                                        <option value="{{ $year }}" {{ $edu_details->year_of_passing == $year ? 'selected' : '' }}>
                                                                            {{ $year }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    class="form-control certificate-input"
                                                                    name="certificate_no[]"
                                                                    maxlength="20"
                                                                    required
                                                                    value="{{ $edu_details->certificate_no ?? $edu_details->percentage ?? '' }}">
                                                                <span class="error text-danger certificate-error"></span>
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $eduDocPath = (string) ($edu_details->upload_document ?? '');
                                                                    $eduDocExists = $eduDocPath !== '' && is_file(public_path($eduDocPath));
                                                                @endphp
                                                                <div class="d-flex align-items-center file-section">
                                                                    @if ($eduDocExists)
                                                                        <div>
                                                                            <a class="text-primary" href="{{ asset($eduDocPath) }}" target="_blank">
                                                                                <i class="fa fa-file-pdf-o" style="color: red"></i> View
                                                                            </a>
                                                                        </div>
                                                                        <button class="btn btn-sm btn-danger ml-3 remove-doc_edu">Remove</button>
                                                                    @else
                                                                        <div class="w-100">
                                                                            <input type="file" class="form-control" name="education_document[]" accept=".pdf,application/pdf">
                                                                            @if ($eduDocPath !== '' && !$eduDocExists)
                                                                                <small class="text-danger d-block mt-1">Previously uploaded file is missing on the server. Please upload again.</small>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <button type="button" class="btn btn-danger remove-education remove_edu" data-edu_id = "{{ $edu_details->id }}" data-url= "{{ route('delete_education') }}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </td>

                                                                <!-- 🔹 Add hidden fields here -->
                                                                <input type="hidden" name="edu_id[]" value="{{ $edu_details->id }}">
                                                                <input type="hidden" name="existing_document[]" value="{{ $eduDocExists ? $eduDocPath : '' }}">
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr class="education-fields text-center">
                                                            <td>1</td>
                                                            <td>
                                                                @php $formName = $application_details->form_name ?? ''; @endphp
                                                                <select class="form-control" name="educational_level[]">
                                                                    <option selected disabled>Select Education</option>
                                                                    @if ($formName === 'S')
                                                                        <option value="DEE">Diploma(Electrical Engineering)</option>
                                                                        <option value="BEE">B.E(Electrical Engineering)</option>
                                                                        <option value="MEE">M.E(Electrical Engineering)</option>
                                                                        <option value="AMIE">A pass in AMIE</option>
                                                                    @elseif ($formName === 'W')
                                                                        <option value="NTC">NTC</option>
                                                                        <option value="Provisional">Provisional</option>
                                                                        <option value="Ex-Serviceman">Ex-Serviceman</option>
                                                                        <option value="H to B">H to B</option>
                                                                        <option value="SCVT">SCVT</option>
                                                                    @elseif ($formName === 'WH')
                                                                        <option value="Up to 8th Standard">Up to 8th Standard</option>
                                                                        <option value="Wireman Helper Examination">Wireman Helper Examination</option>
                                                                        <option value="ITI Certificate">ITI Certificate</option>
                                                                    @elseif ($formName === 'P')
                                                                        <option value="BEM">B.E(Mechanical)</option>
                                                                        <option value="BEE">B.E(Electrical)</option>
                                                                        <option value="DiplomaM">Diploma(Mechanical)</option>
                                                                        <option value="DiplomaE">Diploma(Electrical)</option>
                                                                    @else
                                                                        <option value="PG">PG</option>
                                                                        <option value="UG">UG</option>
                                                                        <option value="B.E">B.E</option>
                                                                        <option value="M.E">M.E</option>
                                                                        <option value="Diploma">Diploma</option>
                                                                        <option value="+2">+2</option>
                                                                        <option value="10">10</option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control" name="institute_name[]"></td>
                                                            <td>
                                                                <select name="month_of_passing[]" class="form-control">
                                                                    <option value="" selected>Select Month</option>
                                                                    <option value="01">Jan</option>
                                                                    <option value="02">Feb</option>
                                                                    <option value="03">Mar</option>
                                                                    <option value="04">Apr</option>
                                                                    <option value="05">May</option>
                                                                    <option value="06">Jun</option>
                                                                    <option value="07">Jul</option>
                                                                    <option value="08">Aug</option>
                                                                    <option value="09">Sep</option>
                                                                    <option value="10">Oct</option>
                                                                    <option value="11">Nov</option>
                                                                    <option value="12">Dec</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="year_of_passing[]" class="form-control">
                                                                    <option value="0">Select Year</option>
                                                                    @php
                                                                        $currentYear = date('Y');
                                                                    @endphp
                                                                    @for ($year = $currentYear; $year >= 1980; $year--)
                                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                                    @endfor
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                    class="form-control certificate-input"
                                                                    name="certificate_no[]"
                                                                    maxlength="20"
                                                                    required>
                                                                <span class="error text-danger certificate-error"></span>
                                                            </td>
                                                            <td><input type="file" class="form-control" name="education_document[]" accept=".pdf,application/pdf"></td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger remove-education">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </td>

                                                            <input type="hidden" name="edu_id[]" value="">
                                                            <input type="hidden" name="existing_document[]" value="">
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            @if (!isset($application_details->form_name) || $application_details->form_name !== 'WH')
                                                <hr>
                                                @php
                                                    // Question number for Work Experience:
                                                    // S: 6, W: 6, P: 6, WH: no work section
                                                    $workQuestionNo = 6;
                                                @endphp
                                                <div class="row align-items-center head_label">
                                                    <div class="col-12 col-md-12 ">
                                                        <label>
                                                            {{ $workQuestionNo }}. Details of Previous and Current Work experiences
                                                            @if(isset($application_details->form_name) && in_array($application_details->form_name, ['W','WH']))
                                                                <span class="text-label">(Optional)</span>
                                                            @else
                                                                <span class="text-label"><span style="color: red;">*</span></span>
                                                            @endif
                                                        </label>
                                                        <br>
                                                        <label for="tamil" class="tamil">பெற்றுள்ள
                                                            முந்தைய மற்றும் தற்போதைய அனுபவங்களின் விவரங்கள்
                                                            @if(isset($application_details->form_name) && in_array($application_details->form_name, ['W','WH']))
                                                                <span class="text-label">(விருப்பமெனில் நிரப்பலாம்)</span>
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                @php
                                                    $isFormS = isset($application_details->form_name) && $application_details->form_name === 'S';
                                                @endphp
                                                <div class="table-responsive">
                                                    @if ($isFormS)
                                                        {{-- ───────────────────────── Form S: rich work-experience table ───────────────────────── --}}
                                                        <table class="table table-bordered table-sm work-exp-table" id="work-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="work-exp-col-sno text-center">S.No</th>
                                                                    <th class="work-exp-col-type">Employment type</th>
                                                                    <th class="work-exp-col-employer">Employer / organization</th>
                                                                    <th class="work-exp-col-years work-exp-years-head" scope="col">
                                                                        <div class="work-exp-years-title">Year of Experience</div>
                                                                        <div class="work-exp-inline work-exp-inline--head">
                                                                            <div class="work-exp-date-group">
                                                                                <span class="work-exp-label-fromto d-block">From (date)</span>
                                                                            </div>
                                                                            <div class="work-exp-date-group">
                                                                                <span class="work-exp-label-fromto d-block">To (date)</span>
                                                                            </div>
                                                                            <div class="work-exp-total-inline">
                                                                                <span class="work-exp-label-fromto d-block">Total yrs</span>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th class="work-exp-col-designation">Designation</th>
                                                                    <th class="text-center work-exp-col-upload work-exp-upload-head">Upload Document
                                                                        <br><span class="file-limit">File type: PDF (Min 5 KB to Max 200 KB)</span>
                                                                    </th>
                                                                    <th class="work-exp-col-actions text-center p-1">
                                                                        <div class="form-s-actions-stack">
                                                                            <button type="button" class="btn btn-primary add-more-work py-1 px-2" title="Add row">
                                                                                <i class="fa fa-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="work-container">
                                                                @php $sExpRows = ($exp_details ?? collect()); @endphp
                                                                @if ($sExpRows->isNotEmpty())
                                                                    @foreach ($sExpRows as $exp_row)
                                                                        @php
                                                                            $empType   = (string) ($exp_row->emp_type ?? '');
                                                                            $employer  = (string) ($exp_row->emp_cate ?? $exp_row->company_name ?? '');
                                                                            $intDate   = (string) ($exp_row->intimation_date ?? '');
                                                                            $fromDate  = (string) ($exp_row->from_date ?? '');
                                                                            $toDate    = (string) ($exp_row->to_date ?? '');
                                                                            $totalExp  = (string) ($exp_row->total_exp ?? $exp_row->experience ?? '');
                                                                            $designation = (string) ($exp_row->designation ?? '');
                                                                            $isContractor = strtolower($empType) === 'contractor';
                                                                        @endphp
                                                                        <tr class="work-fields">
                                                                            <td class="work-serial text-center">{{ $loop->iteration }}</td>
                                                                            <td class="work-exp-col-type">
                                                                                <select class="form-control form-control-sm work-employment-type" name="work_employment_type[]">
                                                                                    <option value="" disabled {{ $empType === '' ? 'selected' : '' }}>Select type</option>
                                                                                    <option value="company" {{ $empType === 'company' ? 'selected' : '' }}>Company</option>
                                                                                    <option value="contractor" {{ $empType === 'contractor' ? 'selected' : '' }}>Contractor</option>
                                                                                    <option value="apprentice" {{ $empType === 'apprentice' ? 'selected' : '' }}>Apprentice</option>
                                                                                    <option value="electrical_inspector" {{ $empType === 'electrical_inspector' ? 'selected' : '' }}>Electrical Inspector / Assistant Electrical Inspector</option>
                                                                                    <option value="retired_employees" {{ $empType === 'retired_employees' ? 'selected' : '' }}>Retired Employees</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="work-employer-cell work-exp-col-employer">
                                                                                <label class="small text-muted work-employer-label d-block mb-1">—</label>
                                                                                <input type="text" class="form-control form-control-sm work-employer-input" name="work_employer_name[]" maxlength="120" autocomplete="off" value="{{ $employer }}">
                                                                                <div class="work-block work-block--intimation mt-1" style="display:{{ $isContractor ? 'block' : 'none' }};">
                                                                                    <label class="small d-block mb-0" style="font-size:.7rem;white-space:nowrap;">Intimation letter <span class="text-danger">*</span></label>
                                                                                    <input type="date" class="form-control form-control-sm work-intimation-date" name="work_intimation_date[]" value="{{ $intDate }}">
                                                                                </div>
                                                                            </td>
                                                                            <td class="work-exp-col-years">
                                                                                <div class="work-exp-inline">
                                                                                    <div class="work-exp-date-group">
                                                                                        <input type="date" class="form-control form-control-sm work-date-from" name="work_date_from[]" value="{{ $fromDate }}" title="From date" aria-label="Year of experience from date">
                                                                                    </div>
                                                                                    <div class="work-exp-date-group">
                                                                                        <input type="date" class="form-control form-control-sm work-date-to" name="work_date_to[]" value="{{ $toDate }}" title="To date" aria-label="Year of experience to date">
                                                                                    </div>
                                                                                    <div class="work-exp-total-inline">
                                                                                        <input type="text" class="form-control form-control-sm work-year-total-display" readonly placeholder="—" tabindex="-1" aria-label="Total years of experience" value="{{ $totalExp }}">
                                                                                        <input type="hidden" class="work-experience-total-hidden" name="work_experience_total[]" value="{{ $totalExp }}">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" name="work_level[]" class="work-level-sync" value="{{ $employer }}" tabindex="-1" aria-hidden="true">
                                                                                <input type="hidden" name="experience[]" class="experience-sync" value="{{ $totalExp }}" tabindex="-1" aria-hidden="true">
                                                                            </td>
                                                                            <td class="work-exp-col-designation">
                                                                                <input autocomplete="off" class="form-control form-control-sm" name="designation[]" type="text" maxlength="80" value="{{ $designation }}">
                                                                            </td>
                                                                            <td class="work-exp-col-upload">
                                                                                @php
                                                                                    $workDocPath = (string) ($exp_row->upload_document ?? '');
                                                                                    $workDocExists = $workDocPath !== '' && is_file(public_path($workDocPath));
                                                                                @endphp
                                                                                <div class="d-flex align-items-center file-section">
                                                                                    @if ($workDocExists)
                                                                                        <div class="work-doc-container">
                                                                                            <a class="text-primary" href="{{ asset($workDocPath) }}" target="_blank">
                                                                                                <i class="fa fa-file-pdf-o" style="color: red"></i> View
                                                                                            </a>
                                                                                            <button type="button" class="btn btn-sm btn-danger ml-3 remove-work-doc">Remove</button>
                                                                                        </div>
                                                                                        <div class="work-doc-input d-none">
                                                                                            <input class="form-control form-control-sm mt-1" name="work_document[]" type="file" accept=".pdf,application/pdf">
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="work-doc-container d-none"></div>
                                                                                        <div class="work-doc-input">
                                                                                            <input class="form-control form-control-sm" name="work_document[]" type="file" accept=".pdf,application/pdf">
                                                                                            @if ($workDocPath !== '' && !$workDocExists)
                                                                                                <small class="text-danger d-block mt-1">Previously uploaded file is missing on the server. Please upload again.</small>
                                                                                            @endif
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </td>
                                                                            <td class="work-exp-col-actions text-center p-1">
                                                                                <div class="form-s-actions-stack">
                                                                                    <button type="button" class="btn btn-danger remove-work remove_exp py-1 px-2" data-exp_id="{{ $exp_row->id }}" data-url="{{ route('delete_experience') }}" title="Remove row">
                                                                                        <i class="fa fa-trash-o"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                            <input type="hidden" name="work_id[]" value="{{ $exp_row->id ?? '' }}">
                                                                            <input type="hidden" name="existing_work_document[]" value="{{ $workDocExists ? $workDocPath : '' }}">
                                                                            <input type="hidden" name="removed_document_work[]" value="0">
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr class="work-fields">
                                                                        <td class="work-serial text-center">1</td>
                                                                        <td class="work-exp-col-type">
                                                                            <select class="form-control form-control-sm work-employment-type" name="work_employment_type[]">
                                                                                <option value="" selected disabled>Select type</option>
                                                                                <option value="company">Company</option>
                                                                                <option value="contractor">Contractor</option>
                                                                                <option value="apprentice">Apprentice</option>
                                                                                <option value="electrical_inspector">Electrical Inspector / Assistant Electrical Inspector</option>
                                                                                <option value="retired_employees">Retired Employees</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="work-employer-cell work-exp-col-employer">
                                                                            <label class="small text-muted work-employer-label d-block mb-1">—</label>
                                                                            <input type="text" class="form-control form-control-sm work-employer-input" name="work_employer_name[]" maxlength="120" autocomplete="off" disabled>
                                                                            <div class="work-block work-block--intimation mt-1" style="display:none;">
                                                                                <label class="small d-block mb-0" style="font-size:.7rem;white-space:nowrap;">Intimation letter <span class="text-danger">*</span></label>
                                                                                <input type="date" class="form-control form-control-sm work-intimation-date" name="work_intimation_date[]">
                                                                            </div>
                                                                        </td>
                                                                        <td class="work-exp-col-years">
                                                                            <div class="work-exp-inline">
                                                                                <div class="work-exp-date-group">
                                                                                    <input type="date" class="form-control form-control-sm work-date-from" name="work_date_from[]" disabled title="From date" aria-label="Year of experience from date">
                                                                                </div>
                                                                                <div class="work-exp-date-group">
                                                                                    <input type="date" class="form-control form-control-sm work-date-to" name="work_date_to[]" disabled title="To date" aria-label="Year of experience to date">
                                                                                </div>
                                                                                <div class="work-exp-total-inline">
                                                                                    <input type="text" class="form-control form-control-sm work-year-total-display" readonly placeholder="—" tabindex="-1" aria-label="Total years of experience">
                                                                                    <input type="hidden" class="work-experience-total-hidden" name="work_experience_total[]" value="">
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" name="work_level[]" class="work-level-sync" value="" tabindex="-1" aria-hidden="true">
                                                                            <input type="hidden" name="experience[]" class="experience-sync" value="" tabindex="-1" aria-hidden="true">
                                                                        </td>
                                                                        <td class="work-exp-col-designation">
                                                                            <input autocomplete="off" class="form-control form-control-sm" name="designation[]" type="text" maxlength="80">
                                                                        </td>
                                                                        <td class="work-exp-col-upload">
                                                                            <div class="d-flex align-items-center file-section">
                                                                                <div class="work-doc-container d-none"></div>
                                                                                <div class="work-doc-input">
                                                                                    <input class="form-control form-control-sm" name="work_document[]" type="file" accept=".pdf,application/pdf">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="work-exp-col-actions text-center p-1">
                                                                            <div class="form-s-actions-stack">
                                                                                <button type="button" class="btn btn-danger remove-work py-1 px-2" title="Remove row">
                                                                                    <i class="fa fa-trash-o"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                        <input type="hidden" name="work_id[]">
                                                                        <input type="hidden" name="existing_work_document[]">
                                                                        <input type="hidden" name="removed_document_work[]" value="0">
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    @elseif(isset($application_details->form_name) && $application_details->form_name === 'W')
                                                        {{-- ───────────────────────── Form W: grouped year-of-experience table ───────────────────────── --}}
                                                        <table class="table table-bordered table-sm work-table-w" id="work-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="work-exp-col-sno text-center">S.No</th>
                                                                    <th class="work-exp-col-company">Company Name / Contractor</th>
                                                                    <th class="work-exp-col-years" scope="col">
                                                                        <div class="work-exp-years-title">Year of Experience</div>
                                                                        <div class="work-exp-inline work-exp-inline--head">
                                                                            <div class="work-exp-date-group"><span class="work-exp-label-fromto d-block">From (date)</span></div>
                                                                            <div class="work-exp-date-group"><span class="work-exp-label-fromto d-block">To (date)</span></div>
                                                                            <div class="work-exp-total-inline"><span class="work-exp-label-fromto d-block">Total yrs</span></div>
                                                                        </div>
                                                                    </th>
                                                                    <th class="work-exp-col-designation">Designation</th>
                                                                    <th class="work-exp-col-actions text-center p-1">
                                                                        <button type="button" class="btn btn-primary btn-sm add-more-work py-1 px-2" title="Add row">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="work-container">
                                                                @if ($exp_details->isNotEmpty())
                                                                    @foreach ($exp_details as $exp_details)
                                                                        @php
                                                                            $wFromDate = $exp_details->from_date ? \Carbon\Carbon::parse($exp_details->from_date)->format('Y-m-d') : '';
                                                                            $wToDate   = $exp_details->to_date   ? \Carbon\Carbon::parse($exp_details->to_date)->format('Y-m-d')   : '';
                                                                            $wTotalExp = $exp_details->total_exp ?? $exp_details->experience ?? '';
                                                                        @endphp
                                                                        <tr class="work-fields">
                                                                            <td class="work-serial text-center">{{ $loop->iteration }}</td>
                                                                            <td class="work-exp-col-company">
                                                                                <input autocomplete="off" class="form-control form-control-sm" name="work_level[]" type="text" maxlength="80" value="{{ $exp_details->company_name ?? '' }}">
                                                                            </td>
                                                                            <td class="work-exp-col-years">
                                                                                <div class="work-exp-inline">
                                                                                    <div class="work-exp-date-group">
                                                                                        <input type="date" class="form-control form-control-sm work-date-from" name="work_date_from[]" value="{{ $wFromDate }}" title="From date">
                                                                                    </div>
                                                                                    <div class="work-exp-date-group">
                                                                                        <input type="date" class="form-control form-control-sm work-date-to" name="work_date_to[]" value="{{ $wToDate }}" title="To date">
                                                                                    </div>
                                                                                    <div class="work-exp-total-inline">
                                                                                        <input type="text" class="form-control form-control-sm work-year-total-display" readonly placeholder="—" tabindex="-1" value="{{ $wTotalExp }}">
                                                                                        <input type="hidden" class="work-experience-total-hidden" name="work_experience_total[]" value="{{ $wTotalExp }}">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" name="experience[]" class="experience-sync" value="{{ $wTotalExp }}" tabindex="-1" aria-hidden="true">
                                                                            </td>
                                                                            <td class="work-exp-col-designation">
                                                                                <input autocomplete="off" class="form-control form-control-sm" name="designation[]" type="text" maxlength="80" value="{{ $exp_details->designation ?? '' }}">
                                                                            </td>
                                                                            <td class="work-exp-col-actions text-center p-1">
                                                                                <button type="button" class="btn btn-danger btn-sm remove-work remove_exp py-1 px-2" data-exp_id="{{ $exp_details->id }}" data-url="{{ route('delete_experience') }}" title="Remove row">
                                                                                    <i class="fa fa-trash-o"></i>
                                                                                </button>
                                                                            </td>
                                                                            <input type="hidden" name="work_id[]" value="{{ $exp_details->id ?? '' }}">
                                                                            <input type="hidden" name="existing_work_document[]" value="">
                                                                            <input type="hidden" name="removed_document_work[]" value="0">
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr class="work-fields">
                                                                        <td class="work-serial text-center">1</td>
                                                                        <td class="work-exp-col-company">
                                                                            <input autocomplete="off" class="form-control form-control-sm" name="work_level[]" type="text" maxlength="80">
                                                                        </td>
                                                                        <td class="work-exp-col-years">
                                                                            <div class="work-exp-inline">
                                                                                <div class="work-exp-date-group">
                                                                                    <input type="date" class="form-control form-control-sm work-date-from" name="work_date_from[]" title="From date">
                                                                                </div>
                                                                                <div class="work-exp-date-group">
                                                                                    <input type="date" class="form-control form-control-sm work-date-to" name="work_date_to[]" title="To date">
                                                                                </div>
                                                                                <div class="work-exp-total-inline">
                                                                                    <input type="text" class="form-control form-control-sm work-year-total-display" readonly placeholder="—" tabindex="-1">
                                                                                    <input type="hidden" class="work-experience-total-hidden" name="work_experience_total[]" value="">
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" name="experience[]" class="experience-sync" value="" tabindex="-1" aria-hidden="true">
                                                                        </td>
                                                                        <td class="work-exp-col-designation">
                                                                            <input autocomplete="off" class="form-control form-control-sm" name="designation[]" type="text" maxlength="80">
                                                                        </td>
                                                                        <td class="work-exp-col-actions text-center p-1">
                                                                            <button type="button" class="btn btn-danger btn-sm remove-work py-1 px-2" title="Remove row">
                                                                                <i class="fa fa-trash-o"></i>
                                                                            </button>
                                                                        </td>
                                                                        <input type="hidden" name="work_id[]">
                                                                        <input type="hidden" name="existing_work_document[]">
                                                                        <input type="hidden" name="removed_document_work[]" value="0">
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        {{-- ───────────────────────── Other forms: simple table ───────────────────────── --}}
                                                        <table class="table table-bordered table-striped" id="work-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Company Name / Contractor</th>
                                                                    <th>Years of Experience (Years)</th>
                                                                    <th>Designation</th>
                                                                    <th class="text-center">
                                                                        <button type="button" class="btn btn-primary add-more-work">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="work-container">
                                                                @if ($exp_details->isNotEmpty())
                                                                    @foreach ($exp_details as $exp_details)
                                                                        <tr class="work-fields text-center">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td><input autocomplete="off" class="form-control" name="work_level[]" type="text" value="{{ $exp_details->company_name ?? '' }}"></td>
                                                                            <td><input autocomplete="off" class="form-control" name="experience[]" type="number" value="{{ $exp_details->experience ?? '' }}"></td>
                                                                            <td><input autocomplete="off" class="form-control" name="designation[]" type="text" value="{{ $exp_details->designation ?? '' }}"></td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-danger remove-work remove_exp" data-exp_id="{{ $exp_details->id }}" data-url="{{ route('delete_experience') }}">
                                                                                    <i class="fa fa-trash-o"></i>
                                                                                </button>
                                                                            </td>
                                                                            <input type="hidden" name="work_id[]" value="{{ $exp_details->id ?? '' }}">
                                                                            <input type="hidden" name="existing_work_document[]" value="">
                                                                            <input type="hidden" name="removed_document_work[]" value="0">
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr class="work-fields text-center">
                                                                        <td>1</td>
                                                                        <td><input autocomplete="off" class="form-control" name="work_level[]" type="text"></td>
                                                                        <td><input autocomplete="off" class="form-control" name="experience[]" type="number"></td>
                                                                        <td><input autocomplete="off" class="form-control" name="designation[]" type="text"></td>
                                                                        <td><button type="button" class="btn btn-danger remove-work"><i class="fa fa-trash-o"></i></button></td>
                                                                        <input type="hidden" name="work_id[]">
                                                                        <input type="hidden" name="existing_work_document[]">
                                                                        <input type="hidden" name="removed_document_work[]" value="0">
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                                <hr>
                                            @endif
                                            <div class="row align-items-center" style=" {{ isset($application_details->form_name) && $application_details->form_name == 'S' ? 'display: flex;' : 'display: none;' }}">
                                                <div class="col-12 col-md-12 ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-9 ">
                                                            <label for="Name">7. Have previously applied for Electrical Assistant Qualification Certificate and if yes then mention its number and date
                                                            </label>
                                                            <br>
                                                            <label for="tamil" class="tamil">இதற்கு முன்னாள் விண்ணப்பம் செய்துள்ளீர்களா ? ஆம் என்றால் அதன் குறிப்பு எண் மற்றும் தேதியை குறிப்பிடுக
                                                            </label>
                                                        </div>
    
                                                        <div class="col-md-3">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input toggle-details" type="radio" name="previous_license" id="previous_license_yes" data-target="#previously_details" value="yes" {{ !empty($application_details->previously_number) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="yesOption">Yes</label>
                                                            </div>
                                                              
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input toggle-details" type="radio" name="previous_license" id="previous_license_no" data-target="#previously_details" value="no" {{ empty($application_details->previously_number) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="noOption">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center g-2" id="previously_details" style="display: {{ !empty($application_details->previously_number) ? 'flex' : 'none' }}; flex-wrap: wrap;">

                                                        <!-- Certificate Number Label -->
                                                        <div class="col-12 col-md-2 text-md-right">
                                                            <label>Certificate Number <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Certificate Number Input -->
                                                        <div class="col-12 col-md-3">
                                                            <input autocomplete="off" class="form-control text-box single-line verify-input"
                                                                   id="previously_number" name="previously_number" type="text"
                                                                   data-type="license" data-error="#licenseError" data-msg="#license_messagdfde"
                                                                   placeholder="Certificate Number" {{ !empty($application_details->previously_number) ? 'readonly':'' }} value="{{ $application_details->previously_number }}">
                                                            <input type="hidden" id="l_verify" name="l_verify" value="{{ $application_details->license_verify }}">
                                                            <span id="licenseError" class="text-danger"></span>
                                                            <span id="verify_result"></span>
                                                            <span id="license_messagdfde" class="mt-1"></span>
                                                            <span class="mt-1 verify_status {{ $application_details->license_verify == 0 ? 'text-danger' : 'text-success' }}">
                                                                @if (!empty($application_details->previously_number))
                                                                    {!! $application_details->license_verify == 0 ? '&#128683; Invalid License.' : '&#10004; Valid License.' !!}
                                                                @endif
                                                            </span>
                                                        </div>

                                                        <!-- Date of Issue Label -->
                                                        <div class="col-12 col-md-1 text-md-right">
                                                            <label>Date of Issue <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Date of Issue Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input autocomplete="off" class="form-control text-box single-line verify-issue-date"
                                                                   id="previously_issue_date" name="previously_issue_date" type="date"
                                                                   data-error="#previouslyIssueDateError"
                                                                   {{ !empty($application_details->previously_number) ? 'readonly':'' }} value="{{ $application_details->previously_issue_date ?? '' }}">
                                                            <span id="previouslyIssueDateError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Date of Expiry Label -->
                                                        <div class="col-12 col-md-1 text-md-right">
                                                            <label>Date of Expiry <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Date of Expiry Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input autocomplete="off" class="form-control text-box single-line verify-date"
                                                                   id="previously_date" name="previously_date" type="date"
                                                                   data-error="#dateError" {{ !empty($application_details->previously_number) ? 'readonly':'' }} value="{{ $application_details->previously_date }}">
                                                            <span id="dateError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Verify / Delete -->
                                                        <div class="col-12 col-md-1">
                                                            @if (!empty($application_details->previously_number))
                                                                <button type="button" class="btn btn-danger remove_verify" data-type="superviser">Delete</button>
                                                                <button type="button" class="btn btn-primary verify-btn btn-forms d-none" data-type="license" data-url="{{ route('verifylicense') }}">Verify</button>
                                                            @else
                                                                <button type="button" class="btn btn-primary verify-btn"
                                                                        data-type="license" data-url="{{ route('verifylicense') }}">
                                                                    Verify
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                                @php
                                                    // Question number for "Do you possess ..." varies by form:
                                                    // S: 8, WH: 6, W: 8, P/others: 7
                                                    if ($formName === 'S') {
                                                        $questionNumber = 8;
                                                    } elseif ($formName === 'WH') {
                                                        $questionNumber = 6;
                                                    } elseif ($formName === 'W') {
                                                        $questionNumber = 8;
                                                    } elseif ($formName === 'P') {
                                                        $questionNumber = 7;
                                                    } else {
                                                        $questionNumber = 7;
                                                    }
                                                @endphp
                                                <div class="row align-items-center">
                                                <div class="col-12 col-md-12">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-9 ">
                                                            @if ($formName === 'S')
                                                                @php
                                                                    $cert_name = 'Wireman Competency Certificate / Supervisor Competency Certificate';
                                                                @endphp

                                                            @else
                                                                @if ($formName === 'WH')
                                                                    @php
                                                                    $cert_name = 'Wireman Helper Competency Certificate';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $cert_name = 'Wireman Competency Certificate / Wireman Helper Competency Certificate';
                                                                    @endphp
                                                                @endif
                                                                
                                                            @endif
                                                            @php
                                                                if (isset($application_details->form_name) && $application_details->form_name == 'S') {
                                                                    $questionNumber = 8;
                                                                } elseif (isset($application_details->form_name) && $application_details->form_name == 'WH') {
                                                                    $questionNumber = 6;
                                                                } else {
                                                                    $questionNumber = 7;
                                                                }
                                                            @endphp
                                                            <label for="Name">{{ $questionNumber }}. Do you possess {{ $cert_name }} issued by this Board? If so furnish the details and surrender the same.</label>
                                                            <br>
                                                            <label for="tamil" class="tamil">இந்த வாரியம் வழங்கிய கம்பி இணைப்பாளர் திறன் சான்றிதழ் / மேற்பார்வையாளர் திறன் சான்றிதழ் உங்களிடம் உள்ளதா? இருந்தால், அதன் விவரங்களை வழங்கி, அதனை ஒப்படைக்கவும்.</label>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input toggle-details" type="radio" name="previous_certificate" id="yesOption" data-target="#wireman_details" value="yes" {{ !empty($application_details->certificate_no) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="yesOption">Yes</label>
                                                            </div>
                                                                
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input toggle-details" type="radio" name="previous_certificate" id="noOption" data-target="#wireman_details" value="no" {{ empty($application_details->certificate_date) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="noOption">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php
                                                        if (($application_details->form_name ?? '') === 'S') {
                                                            $cert_type = 'supervisor';
                                                        } elseif (($application_details->form_name ?? '') === 'WH') {
                                                            $cert_type = 'helper';
                                                        } else {
                                                            $cert_type = 'certificate';
                                                        }
                                                    @endphp
                                                    <div class="row align-items-center mt-3 g-2" id="wireman_details" style="display: {{ !empty($application_details->certificate_no) ? 'flex' : 'none' }}; flex-wrap: wrap;">

                                                        <!-- Certificate Number Label -->
                                                        <div class="col-12 col-md-2 text-md-right">
                                                            <label>Certificate Number <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Certificate Number Input -->
                                                        <div class="col-12 col-md-3">
                                                            <input class="form-control text-box single-line verify-input"
                                                                   id="certificate_no" name="competency_certificate_no" type="text"
                                                                   data-type="{{ $cert_type }}" data-error="#certError" data-msg="#license_message"
                                                                   placeholder="Certificate No" maxlength="12"
                                                                   value="{{ $application_details->certificate_no }}"
                                                                   {{ !empty($application_details->certificate_no) ? 'readonly':'' }}>
                                                            <input type="hidden" id="cert_verify" name="cert_verify" value="{{ $application_details->cert_verify }}">
                                                            <span id="licenseError" class="text-danger"></span>
                                                            <span id="license_message" class="mt-1"></span>
                                                            <span id="verify_status" class="mt-1 {{ $application_details->cert_verify == 0 ? 'text-danger' : 'text-success' }}">
                                                                @if (!empty($application_details->certificate_no))
                                                                    {!! $application_details->cert_verify == 0 ? '&#128683; Invalid License.' : '&#10004; Valid License.' !!}
                                                                @endif
                                                            </span>
                                                            <span id="certError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Date of Issue Label -->
                                                        <div class="col-12 col-md-1 text-md-right">
                                                            <label>Date of Issue <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Date of Issue Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input class="form-control text-box single-line verify-issue-date"
                                                                   id="certificate_issue_date" name="certificate_issue_date"
                                                                   data-error="#certIssueDateError" type="date"
                                                                   value="{{ $application_details->certificate_issue_date ?? '' }}"
                                                                   {{ !empty($application_details->certificate_no) ? 'readonly':'' }}>
                                                            <span id="certIssueDateError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Date of Expiry Label -->
                                                        <div class="col-12 col-md-1 text-md-right">
                                                            <label>Date of Expiry <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Date of Expiry Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input class="form-control text-box single-line verify-date"
                                                                   id="certificate_date" name="certificate_date"
                                                                   data-error="#certDateError" type="date"
                                                                   value="{{ $application_details->certificate_date }}"
                                                                   {{ !empty($application_details->certificate_no) ? 'readonly':'' }}>
                                                            <span id="certDateError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Verify / Delete -->
                                                        <div class="col-12 col-md-1">
                                                            @if (!empty($application_details->certificate_no))
                                                                <button type="button" class="btn btn-danger remove_verify" data-type="superviser_two">Delete</button>
                                                                <button type="button" class="btn btn-primary verify-btn d-none" data-type="{{ $cert_type }}" data-url="{{ route('verifylicense') }}">Verify</button>
                                                            @else
                                                                <button type="button" class="btn btn-primary verify-btn" data-type="{{ $cert_type }}" data-url="{{ route('verifylicense') }}">Verify</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @php
                                                // Question number for Upload Documents:
                                                // S: 9, W: 8, WH: 7, P: 7 (matches individual form layouts)
                                                if ($formName === 'S') {
                                                    $uploadQuestionNo = 9;
                                                } elseif ($formName === 'W') {
                                                    $uploadQuestionNo = 8;
                                                } elseif ($formName === 'WH') {
                                                    $uploadQuestionNo = 7;
                                                } elseif ($formName === 'P') {
                                                    $uploadQuestionNo = 7;
                                                } else {
                                                    $uploadQuestionNo = 9;
                                                }
                                            @endphp
                                            <hr>
                                            <div class="row align-items-start">
                                                {{-- Photo column --}}
                                                <div class="col-12 col-md-3 mb-3 p-3">
                                                    <label for="upload_photo">
                                                        {{ $uploadQuestionNo }}. (i) Upload Passport Size Photo <span style="color: red;">*</span>
                                                    </label>
                                                    <br>
                                                    <label for="upload_photo" class="tamil">பாஸ்போர்ட் அளவு புகைப்படம் பதிவேற்ற</label>

                                                    <div class="mt-2 text-center">
                                                        @if (!empty($applicant_photo->upload_path))
                                                            <img src="{{ url($applicant_photo->upload_path) }}"
                                                                 id="preview_applicant"
                                                                 class="img-fluid border mb-2"
                                                                 style="max-width: 100px; border-radius:4px;"
                                                                 alt="Applicant Photo">
                                                            <button type="button"
                                                                    class="btn btn-primary btn-sm mb-2"
                                                                    onclick="togglePhotoInput()">Edit/Upload Photo</button>
                                                        @endif

                                                        <div id="photo-input-wrapper"
                                                             style="{{ !empty($applicant_photo->upload_path) ? 'display: none;' : 'display: block;' }}; width: 100%; max-width: 280px; margin: 0 auto;">
                                                            <span class="file-limit d-block text-start">File type: JPG, PNG (Max 50 KB)</span>
                                                            <input autocomplete="off"
                                                                   class="form-control text-box single-line mb-1"
                                                                   id="upload_photo"
                                                                   name="upload_photo"
                                                                   type="file"
                                                                   accept="image/*">
                                                            <span class="error-message text-danger d-block text-start"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Aadhaar column --}}
                                                <div class="col-12 col-md-3 mb-3 p-3">
                                                    @php
                                                        $decryptedaadhar = !empty($application_details->aadhaar)
                                                            ? safeDecrypt($application_details->aadhaar)
                                                            : null;
                                                    @endphp

                                                    <div class="mb-3">
                                                        <label for="aadhaar">(ii) Aadhaar Number <span style="color: red;">*</span></label>
                                                        <br>
                                                        <label for="aadhaar" class="tamil">ஆதார் எண்</label>
                                                        <input type="text"
                                                               class="form-control text-box mt-1"
                                                               name="aadhaar"
                                                               id="aadhaar"
                                                               maxlength="14"
                                                               value="{{ $decryptedaadhar }}">
                                                        <span id="aadhaar-error" class="text-danger"></span>
                                                    </div>

                                                    <div>
                                                        <label for="aadhaar_doc">(iii) Upload Aadhaar Document <span style="color: red;">*</span></label>
                                                        <br>
                                                        <label for="aadhaar_doc" class="tamil">ஆதார் ஆவணத்தை பதிவேற்றவும் <span style="color: red;">*</span></label>
                                                        @if (!empty($application_details->aadhaar_doc))
                                                            <div class="aadhaar-doc-container mt-1 d-flex align-items-center">
                                                                <a href="{{ route('document.show', ['type' => 'aadhaar', 'filename' => $application_details->aadhaar_doc]) }}"
                                                                   target="_blank"
                                                                   style="color: #007bff;">
                                                                    <i class="fa fa-file-pdf-o" style="color: red;"></i> View
                                                                </a>
                                                                <button type="button" class="btn btn-sm btn-danger ml-3 remove-docs">Remove</button>
                                                            </div>
                                                        @endif
                                                        <div class="aadhaar-doc-input {{ !empty($application_details->aadhaar_doc) ? 'd-none' : '' }} mt-1">
                                                            <input autocomplete="off"
                                                                   class="form-control text-box single-line"
                                                                   id="aadhaar_doc"
                                                                   name="aadhaar_doc"
                                                                   type="file"
                                                                   accept=".pdf,application/pdf">
                                                            <span class="file-limit d-block"> File type: PDF (Max 250 KB) </span>
                                                            <small class="text-danger file-error"></small>
                                                        </div>
                                                        <input type="hidden" name="aadhaar_doc_removed" id="aadhaar_doc_removed" value="0">
                                                    </div>
                                                </div>

                                                {{-- PAN column --}}
                                                <div class="col-12 col-md-3 mb-3 p-3">
                                                    @php
                                                        $existingPanDoc = $application_details->pan_doc ?? $application_details->pancard_doc ?? '';
                                                    @endphp
                                                    <div class="mb-3">
                                                        <label for="pancard">(iv) PAN Card Number</label>
                                                        <br>
                                                        <label for="pancard" class="tamil">நிரந்தர கணக்கு எண்</label>
                                                        <input type="text"
                                                               class="form-control text-box text-uppercase mt-1"
                                                               name="pancard"
                                                               id="pancard"
                                                               maxlength="10"
                                                               autocomplete="off"
                                                               placeholder="e.g. ABCDE1234F"
                                                               value="{{ old('pancard', $application_details->pancard ?? '') }}">
                                                        <span id="pancard-error" class="text-danger d-block"></span>
                                                    </div>

                                                    <div>
                                                        <label for="pancard_doc">(v) Upload PAN Card Document</label>
                                                        <br>
                                                        <label for="pancard_doc" class="tamil">பான் கார்டு ஆவணத்தைப் பதிவேற்றவும்</label>
                                                        @if (!empty($existingPanDoc))
                                                            <div class="pan-doc-container mt-1 d-flex align-items-center">
                                                                <a href="{{ route('document.show', ['type' => 'pan', 'filename' => $existingPanDoc]) }}"
                                                                   target="_blank"
                                                                   style="color: #007bff;">
                                                                    <i class="fa fa-file-pdf-o" style="color: red;"></i> View
                                                                </a>
                                                                <button type="button" class="btn btn-sm btn-danger ml-3 remove-pan-doc">Remove</button>
                                                            </div>
                                                        @endif
                                                        <div class="pan-doc-input {{ !empty($existingPanDoc) ? 'd-none' : '' }} mt-1">
                                                            <input autocomplete="off"
                                                                   class="form-control text-box single-line"
                                                                   id="pancard_doc"
                                                                   name="pancard_doc"
                                                                   type="file"
                                                                   accept=".pdf,application/pdf">
                                                            <span class="file-limit d-block"> File type: PDF (Max 250 KB) </span>
                                                            <small class="text-danger file-error"></small>
                                                        </div>
                                                        <input type="hidden" name="pancard_doc_removed" id="pancard_doc_removed" value="0">
                                                    </div>
                                                </div>

                                                {{-- Signature column --}}
                                                <div class="col-12 col-md-3 mb-3 p-3">
                                                    <label for="upload_sign">(vi) Upload Signature</label>
                                                    <br>
                                                    <label for="upload_sign" class="tamil">கையொப்பத்தைப் பதிவேற்றவும்</label>

                                                    <div class="mt-2 text-center">
                                                        @if(!empty($proof_doc?->uploaded_doc))
                                                            <img src="{{ asset($proof_doc->uploaded_doc) }}"
                                                                 id="preview_signature"
                                                                 class="img-fluid border mb-2"
                                                                 style="max-width: 120px; max-height: 60px; border:1px solid #ccc; border-radius:4px;"
                                                                 alt="Uploaded Signature">
                                                            <button type="button"
                                                                    class="btn btn-primary btn-sm mb-2"
                                                                    onclick="toggleSignInput()">Edit/Upload Signature</button>
                                                        @endif

                                                        <div id="sign-input-wrapper"
                                                             style="{{ !empty($proof_doc?->uploaded_doc) ? 'display: none;' : 'display: block;' }}; width: 100%; max-width: 280px; margin: 0 auto;">
                                                            <span class="file-limit d-block text-start"> File type: JPG, PNG (Max 50 KB) </span>
                                                            <input autocomplete="off"
                                                                   class="form-control text-box single-line mb-1"
                                                                   id="upload_sign"
                                                                   name="upload_sign"
                                                                   type="file"
                                                                   accept=".jpg,.jpeg,.png">
                                                            <span class="error-message text-danger d-block text-start"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <label class="container">
                                                    <div class="declaration-container">
                                                        <input type="checkbox" id="declarationCheckbox" required>

                                                        <span class="checkmark"></span>
                                                        <div>
                                                            @php $formName = $application_details->form_name ?? ''; @endphp
                                                            @if ($formName === 'S')
                                                                I hereby declare that the particulars stated above are correct and true to the best of my knowledge. <br>
                                                                I request that I may be granted a Supervisor Competency Certificate.<span style="color: red;">*</span><br>
                                                                <span class="tamil">
                                                                    என் அறிவுக்கு எட்டியவரை மேலே குறிப்பிட்டுள்ள விவரங்கள் யாவும் சரியானவை எனவும் உண்மையானவை எனவும் உறுதி கூறுகிறேன்.
                                                                    <br> எனக்கு மேற்பார்வையாளர் திறன் சான்றிதழ் வழங்குமாறு கேட்டுக்கொள்கிறேன்.
                                                                </span>
                                                            @elseif ($formName === 'W')
                                                                I hereby declare that all the details mentioned above are correct and true to the best of my knowledge.<br>
                                                                I request that I may be granted a Wireman Helper Competency Certificate.<br>
                                                                <span class="tamil">
                                                                    என் அறிவுக்கு எட்டியவரை மேலே குறிப்பிட்டுள்ள விவரங்கள் யாவும் சரியானவை எனவும் உண்மையானவை எனவும் உறுதி கூறுகிறேன்.
                                                                    <br>எனக்கு மின்கம்பியாளர் தகுதி சான்றிதழ் எனக்கு வழங்குமாறு வேண்டுகிறேன்.
                                                                </span>
                                                            @elseif ($formName === 'WH')
                                                                I hereby declare that all the details mentioned above are correct and true to the best of my knowledge.<br>
                                                                I request that I may be granted a Wireman Helper Competency Certificate.<br>
                                                                <span class="tamil">
                                                                    என் அறிவுக்கு எட்டியவரை மேலே குறிப்பிட்டுள்ள விவரங்கள் யாவும் சரியானவை எனவும் உண்மையானவை எனவும் உறுதி கூறுகிறேன்.
                                                                    <br>எனக்கு மின்கம்பி உதவியாளர் தகுதி சான்றிதழ் எனக்கு வழங்குமாறு வேண்டுகிறேன்.
                                                                </span>
                                                            @elseif ($formName === 'P')
                                                                I hereby declare that the particulars stated above are correct and true to the best of my knowledge.<span style="color: red;">*</span><br>
                                                                I request that I may be granted a Power Generating Station Operation and maintenance Competency Certificate.<br>
                                                                <span class="tamil">
                                                                    என் அறிவின் படி மேலே குறிப்பிட்டுள்ள விவரங்கள் அனைத்தும் சரியானதும் உண்மையானதுமாக இருப்பதாக நான் இங்கே அறிவிக்கிறேன்.
                                                                </span>
                                                                <br>
                                                                <span class="tamil">
                                                                    மின்சாரம் உற்பத்தி நிலையத்தின் செயல்பாடு மற்றும் பராமரிப்பு திறன் சான்றிதழை எனக்கு வழங்குமாறு நான் கேட்டுக்கொள்கிறேன்.
                                                                </span>
                                                            @else
                                                                I hereby declare that the particulars stated above are correct and true to the best of my knowledge. <br>
                                                                <span class="tamil">
                                                                    என் அறிவுக்கு எட்டியவரை மேலே குறிப்பிட்டுள்ள விவரங்கள் யாவும் சரியானவை எனவும் உண்மையானவை எனவும் உறுதி கூறுகிறேன்.
                                                                </span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <span id="checkboxError" class="form-text text-danger d-none mt-2" role="alert">Please check the declaration before submitting.</span>
                                                </label>
                                            </div>
                                            <input type="hidden" id="form_name" name="form_name"
                                                value="{{ isset($application_details) ? $application_details->form_name : '' }}">
                                            <input type="hidden" id="license_name" name="license_name"
                                                value="{{ isset($application_details) ? $application_details->license_name : '' }}">
                                            <input type="hidden" id="form_id" name="form_id"
                                                value="{{ isset($application_details) ? $application_details->form_id : '' }}">
                                            <input type="hidden" id="amount" name="amount" value="">
                                            <input type="hidden" id="appl_type" name="appl_type"
                                                value="{{ isset($application_details) ? ($application_details->appl_type ?? 'N') : 'N' }}">
                                            {{-- <input type="hidden" id="form_action" name="form_action" value="{{ isset($application_details) ? $application_details->payment_status : '' }}"> --}}

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 mt-5">
                                        <div class="form-group text-center">
                                            {{-- <button type="button" class="btn btn-primary" id="editBtn">Edit</button> --}}
                                            <span id="actionButtonsWrap">
                                                <a href={{ route('dashboard') }} class="btn btn-secondary" id="cancelBtn">Back to Dashboard</a>
                                                <button type="button" class="btn btn-primary" id="submitCorrectionsBtn"
                                                    data-url="{{ route('form.submit_returned_application', ['appl_id' => $applicationid]) }}">
                                                    Submit
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="main-footer">
    @include('include.footer')
</footer>
</div>
<script>
    window.returnApplicationQueryReasons = @json(isset($queryReasonsForValidation) ? $queryReasonsForValidation : []);
</script>
<script>
    document.getElementById('upload_photo').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('preview_applicant');
                preview.src = e.target.result;
                preview.style.display = 'block';
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
    (function() {
        var $form = $('#competency_form_ws');
        var $editBtn = $('#editBtn');
        var $wrap = $('#actionButtonsWrap');
        var $cancelBtn = $('#cancelBtn');
        var $submitBtn = $('#submitCorrectionsBtn');

        // function lockForm() {
        //     $form.find('input').not('[type="hidden"]').prop('readonly', true).prop('disabled', false);
        //     $form.find('input[type="file"]').prop('readonly', false).prop('disabled', true);
        //     $form.find('textarea').prop('readonly', true);
        //     $form.find('select').prop('disabled', true);
        //     $form.find('button').not('#editBtn, #cancelBtn, #submitCorrectionsBtn').prop('disabled', true);
        //     $('#declarationCheckbox').prop('checked', true).prop('disabled', true);
        // }

        // function unlockForm() {
        //     $form.find('input').not('[type="hidden"]').prop('readonly', false);
        //     $form.find('input[type="file"]').prop('disabled', false);
        //     $form.find('textarea').prop('readonly', false);
        //     $form.find('select').prop('disabled', false);
        //     $form.find('button').not('#editBtn, #cancelBtn, #submitCorrectionsBtn').prop('disabled', false);
        //     $('#declarationCheckbox').prop('checked', true).prop('disabled', false);
        // }

        // lockForm();

        // $editBtn.on('click', function() {
        //     unlockForm();
        //     $editBtn.hide();
        //     $wrap.show();
        // });

        // $cancelBtn.on('click', function() {
        //     lockForm();
        //     $wrap.hide();
        //     $editBtn.show();
        // });
    })();
</script>
<script>
    $(document).on('change', '#declarationCheckbox', function() {
        if ($(this).prop('checked')) {
            $('#checkboxError').addClass('d-none');
        }
    });

    // ===== Inline server-side validation rendering helpers =====
    // Friendly labels for each form field name (fallbacks to the key itself).
    window.__rfFieldLabels = {
        applicant_name: 'Applicant Name',
        fathers_name: "Father's Name",
        applicants_address: 'Applicant Address',
        d_o_b: 'Date of Birth',
        age: 'Age',
        aadhaar: 'Aadhaar Number',
        pancard: 'PAN Number',
        previously_number: 'Previous License Number',
        previously_date: 'Previous Date of Expiry',
        previously_issue_date: 'Previous Date of Issue',
        certificate_no: 'Certificate No',
        certificate_date: 'Certificate Date of Expiry',
        certificate_issue_date: 'Certificate Date of Issue',
        wireman_details: 'Wireman Details',
        upload_photo: 'Photo',
        upload_sign: 'Signature',
        aadhaar_doc: 'Aadhaar Document',
        pancard_doc: 'PAN Document',
        educational_level: 'Education Level',
        institute_name: 'Institute / School Name',
        month_of_passing: 'Month of Passing',
        year_of_passing: 'Year of Passing',
        education_document: 'Education Document',
        existing_document: 'Education Document',
        work_level: 'Employer / Company',
        experience: 'Years of Experience',
        designation: 'Designation',
        work_document: 'Experience Document',
        existing_work_document: 'Experience Document'
    };

    function __rfHumanLabel(name) {
        return window.__rfFieldLabels[name] || name.replace(/_/g, ' ');
    }

    // Locate the visible input/select/textarea for a given dotted error key.
    // Examples: "month_of_passing.2", "applicant_name", "education_document.0"
    function __rfLocateField($form, key) {
        var parts = key.split('.');
        var name = parts[0];
        var idx = (parts.length > 1 && /^\d+$/.test(parts[1])) ? parseInt(parts[1], 10) : null;

        var arrSel = 'input[name="' + name + '[]"], select[name="' + name + '[]"], textarea[name="' + name + '[]"]';
        var scalarSel = 'input[name="' + name + '"], select[name="' + name + '"], textarea[name="' + name + '"]';

        var $matches = $form.find(arrSel);
        if (!$matches.length) {
            $matches = $form.find(scalarSel);
        }
        if (!$matches.length) {
            // Some array fields are also exposed as hidden file-input names like education_document[2]
            $matches = $form.find('[name="' + name + '[' + (idx === null ? '' : idx) + ']"]');
        }
        if (!$matches.length) return null;

        var $field = (idx !== null && $matches.length > idx) ? $matches.eq(idx) : $matches.first();

        // If chosen field is hidden, prefer a visible sibling in the same table cell / row.
        if ($field.length && ($field.is('[type="hidden"]') || $field.is(':hidden'))) {
            var $row = $field.closest('tr, .row, .form-group, .col-12, .col-md-6, .col-md-12');
            var $visible = $row.find('input:visible, select:visible, textarea:visible').first();
            if ($visible.length) $field = $visible;
        }
        return $field;
    }

    function __rfClearServerErrors($form) {
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.find('.server-field-error').remove();
        $('.server-error-summary').remove();
    }

    function __rfRenderServerErrors($form, errors) {
        __rfClearServerErrors($form);
        if (!errors || typeof errors !== 'object') return 0;

        var firstField = null;
        var summaryItems = [];
        var rendered = 0;

        Object.keys(errors).forEach(function (key) {
            var msgs = errors[key];
            var msg = Array.isArray(msgs) ? msgs[0] : String(msgs || '');
            if (!msg) return;

            var $field = __rfLocateField($form, key);
            if (!$field || !$field.length) {
                // No matching field — collect into the summary banner only.
                summaryItems.push(msg);
                return;
            }

            // Mark invalid + place an inline error just below the field.
            $field.addClass('is-invalid');
            var $err = $('<div class="server-field-error text-danger small mt-1"></div>').text(msg);

            // Avoid placing the error inside <select>; insert after.
            var $cell = $field.closest('td');
            if ($cell.length) {
                $cell.append($err);
            } else {
                $field.after($err);
            }

            // Build a row-aware label like "Education row 3 — Month of Passing".
            var parts = key.split('.');
            var fieldName = parts[0];
            var idx = (parts.length > 1 && /^\d+$/.test(parts[1])) ? parseInt(parts[1], 10) : null;
            var rowKind = '';
            if ($field.closest('tr.education-fields').length) rowKind = 'Education row ' + (idx !== null ? idx + 1 : 1);
            else if ($field.closest('tr.work-fields').length) rowKind = 'Experience row ' + (idx !== null ? idx + 1 : 1);
            var label = (rowKind ? (rowKind + ' — ') : '') + __rfHumanLabel(fieldName);
            summaryItems.push(label + ': ' + msg);

            if (!firstField) firstField = $field;
            rendered++;
        });

        if (summaryItems.length) {
            var $summary = $(
                '<div class="alert alert-danger server-error-summary mt-3" role="alert">' +
                '<div class="fw-bold mb-1"><i class="fa fa-exclamation-triangle"></i> Please correct the highlighted fields below:</div>' +
                '<ul class="mb-0 ps-3"></ul>' +
                '</div>'
            );
            summaryItems.slice(0, 12).forEach(function (line) {
                $summary.find('ul').append($('<li></li>').text(line));
            });
            if (summaryItems.length > 12) {
                $summary.find('ul').append($('<li></li>').text('… and ' + (summaryItems.length - 12) + ' more issue(s).'));
            }
            $('#submitCorrectionsBtn').closest('.row, div').first().before($summary);
        }

        if (firstField) {
            try {
                firstField[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstField.trigger('focus');
            } catch (e) { /* ignore */ }
        }
        return rendered;
    }

    // Clear inline error on a field as soon as the user fixes it.
    $(document).on('change input', '.is-invalid', function () {
        var $f = $(this);
        if (($f.val() || '').toString().trim() !== '') {
            $f.removeClass('is-invalid');
            var $cell = $f.closest('td');
            ($cell.length ? $cell : $f.parent()).find('.server-field-error').remove();
        }
    });

    $(document).on('click', '#submitCorrectionsBtn', function() {
        var btn = $(this);
        var url = btn.data('url');
        var form = document.getElementById('competency_form_ws');
        if (!form || !url) return;
        var $form = $(form);

        // Wipe any previous server-side errors on every fresh submit attempt.
        __rfClearServerErrors($form);

        if (!$('#declarationCheckbox').prop('checked')) {
            $('#checkboxError').removeClass('d-none');
            var $cb = $('#declarationCheckbox');
            if ($cb.length) {
                $cb[0].focus();
                $cb[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return;
        }
        $('#checkboxError').addClass('d-none');

        var reasons = window.returnApplicationQueryReasons || [];
        var err = [];
        if (reasons.indexOf('Education document is missing') !== -1) {
            var hasEduDoc = false;
            $('#competency_form_ws').find('input[name="education_document[]"]').each(function() {
                if (this.files && this.files.length > 0) hasEduDoc = true;
            });
            $('#competency_form_ws').find('input[name="existing_document[]"]').each(function() {
                if ($(this).val()) hasEduDoc = true;
            });
            if (!hasEduDoc) err.push('Please upload Education document(s) for each qualification.');
        }
        if (reasons.indexOf('Photo is missing') !== -1) {
            var photoInput = document.getElementById('upload_photo');
            var photoWrapper = document.getElementById('photo-input-wrapper');
            var hasPhoto = (photoInput && photoInput.files && photoInput.files.length > 0) || (photoWrapper && photoWrapper.style.display === 'none');
            if (!hasPhoto) err.push('Please upload Passport size photo.');
        }
        if (reasons.indexOf('Signature is missing') !== -1) {
            var signInput = document.getElementById('upload_sign');
            var signWrapper = document.getElementById('sign-input-wrapper');
            var hasSign = (signInput && signInput.files && signInput.files.length > 0) || (signWrapper && signWrapper.style.display === 'none');
            if (!hasSign) err.push('Please upload Signature.');
        }
        if (reasons.indexOf('Aadhaar document is missing') !== -1) {
            var aadhaarInput = document.getElementById('aadhaar_doc');
            var aadhaarRemoved = $('#aadhaar_doc_removed').val();
            var aadhaarInputWrap = $('.aadhaar-doc-input');
            var hasAadhaar = (aadhaarInput && aadhaarInput.files && aadhaarInput.files.length > 0) || (aadhaarRemoved !== '1' && aadhaarInputWrap.hasClass('d-none'));
            if (!hasAadhaar) err.push('Please upload Aadhaar document.');
        }
        if (err.length > 0) {
            var msg = err.join(' ');
            if (typeof Swal !== 'undefined') {
                Swal.fire({ icon: 'warning', title: 'Missing documents', text: msg });
            } else {
                alert(msg);
            }
            return;
        }

        var formData = new FormData(form);
        btn.prop('disabled', true).html('Submitting...');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                if (res.redirect) {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({ icon: 'success', title: 'Success', text: 'Application Submitted' })
                            .then(function() { window.location.href = res.redirect; });
                    } else {
                        window.location.href = res.redirect;
                    }
                } else {
                    btn.prop('disabled', false).html('Submit');
                }
            },
            error: function(xhr) {
                btn.prop('disabled', false).html('Submit');
                var resp = xhr.responseJSON || {};
                // Laravel validation: status 422 with `errors` map -> show inline.
                if (xhr.status === 422 && resp.errors && typeof resp.errors === 'object') {
                    var rendered = __rfRenderServerErrors($form, resp.errors);
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Please fix the highlighted fields',
                            text: rendered === 1
                                ? 'There is 1 issue marked below.'
                                : 'There are ' + rendered + ' issues marked below. Scroll down to see all of them.',
                            confirmButtonText: 'OK'
                        });
                    }
                    return;
                }
                var msg = resp.message ? resp.message : 'Submission failed. Please try again.';
                if (typeof Swal !== 'undefined') {
                    Swal.fire({ icon: 'error', title: 'Error', text: msg });
                } else {
                    alert(msg);
                }
            }
        });
    });
</script>
<script>
    document.getElementById('upload_sign').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('preview_signature');
                if (preview) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
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
    // Force PAN to uppercase + light-touch validation
    $(document).on('input', '#pancard', function () {
        var v = ($(this).val() || '').toUpperCase().replace(/\s+/g, '');
        $(this).val(v);
        var $err = $('#pancard-error');
        if (v.length === 0) { $err.text(''); return; }
        var ok = /^[A-Z]{5}[0-9]{4}[A-Z]$/.test(v);
        $err.text(ok ? '' : 'Enter a valid 10-character PAN (e.g. ABCDE1234F).');
    });

    // PAN document removal (mirrors Aadhaar remove flow)
    $(document).on('click', '.remove-pan-doc', function (e) {
        e.preventDefault();
        var $button = $(this);
        var doRemove = function () {
            var $scope = $button.closest('.col-12, .col-md-3, td');
            var $docContainer = $scope.find('.pan-doc-container').first();
            var $docInput = $scope.find('.pan-doc-input').first();
            var $fileInput = $scope.find('#pancard_doc').first();

            $docContainer.removeClass('d-flex align-items-center justify-content-center').addClass('d-none').hide();
            $docInput.removeClass('d-none').show();
            $fileInput.val('');
            $('#pancard_doc_removed').val('1');
        };
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Do you want to remove the document?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) doRemove();
            });
        } else if (confirm('Do you want to remove the document?')) {
            doRemove();
        }
    });

    // Reset removed flag if user picks a new file
    $(document).on('change', '#pancard_doc', function () {
        if (this.files && this.files.length > 0) {
            $('#pancard_doc_removed').val('0');
        }
    });
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

    // Keep hidden #amount dynamic (no static fees in blade)
    // This uses the existing global `getPaymentsService` from the shared footer include.
    $(document).ready(async function () {
        try {
            if (typeof getPaymentsService !== 'function') return;

            const licence_code = ($('#license_name').val() || '').trim();
            const appl_type = ($('#appl_type').val() || '').trim();
            const issued_licence = ($('#license_number').val() || '').trim();

            if (!licence_code || !appl_type) return;

            const data = await getPaymentsService(licence_code, issued_licence, appl_type);
            if (data && data.basic_fees !== undefined && data.basic_fees !== null && data.basic_fees !== '') {
                $('#amount').val(data.basic_fees);
            }
        } catch (e) {
            // ignore; popup/payment flow will handle service errors
        }
    });

    // Add more education row
    $(document).on('click', function(e) {
        let container = document.getElementById("education-container");
        let educationRows = container.querySelectorAll(".education-fields");
        const formName = "{{ $application_details->form_name ?? '' }}";
        const isSForm  = formName === 'S';
        const isWForm  = formName === 'W';
        const isWHForm = formName === 'WH';
        const isPForm  = formName === 'P';

        // Build form-specific Educational Level options to mirror apply-form-{s,w,wh,p}
        let eduOptions = '';
        if (isSForm) {
            eduOptions = '<option value="DEE">Diploma(Electrical Engineering)</option>'
                       + '<option value="BEE">B.E(Electrical Engineering)</option>'
                       + '<option value="MEE">M.E(Electrical Engineering)</option>'
                       + '<option value="AMIE">A pass in AMIE</option>';
        } else if (isWForm) {
            eduOptions = '<option value="NTC">NTC</option>'
                       + '<option value="Provisional">Provisional</option>'
                       + '<option value="Ex-Serviceman">Ex-Serviceman</option>'
                       + '<option value="H to B">H to B</option>'
                       + '<option value="SCVT">SCVT</option>';
        } else if (isWHForm) {
            eduOptions = '<option value="Up to 8th Standard">Up to 8th Standard</option>'
                       + '<option value="Wireman Helper Examination">Wireman Helper Examination</option>'
                       + '<option value="ITI Certificate">ITI Certificate</option>';
        } else if (isPForm) {
            eduOptions = '<option value="BEM">B.E(Mechanical)</option>'
                       + '<option value="BEE">B.E(Electrical)</option>'
                       + '<option value="DiplomaM">Diploma(Mechanical)</option>'
                       + '<option value="DiplomaE">Diploma(Electrical)</option>';
        } else {
            eduOptions = '<option value="PG">PG</option>'
                       + '<option value="UG">UG</option>'
                       + '<option value="B.E">B.E</option>'
                       + '<option value="M.E">M.E</option>'
                       + '<option value="Diploma">Diploma</option>'
                       + '<option value="+2">+2</option>'
                       + '<option value="10">10</option>';
        }

        if (e.target.closest(".add-more-education")) {

            if (educationRows.length >= 5) {
                $('#education-table').next('.education-error').remove();

                $('<div class="text-danger mt-2 education-error">You can add a maximum of 5 education entries.</div>')
                .insertAfter('#education-table');

                setTimeout(() => {
                    $('.education-error').fadeOut();
                }, 7000);
                // alert("You can add a maximum of 5 education entries.");
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
                        ${eduOptions}
                    </select>
                </td>
                <td><input type="text" class="form-control" name="institute_name[]" required value="${isWHForm ? 'Dept of Employment & Training' : ''}"></td>
                <td>
                    <select name="month_of_passing[]" class="form-control" required>
                        <option value="" selected>Select Month</option>
                        <option value="01">Jan</option>
                        <option value="02">Feb</option>
                        <option value="03">Mar</option>
                        <option value="04">Apr</option>
                        <option value="05">May</option>
                        <option value="06">Jun</option>
                        <option value="07">Jul</option>
                        <option value="08">Aug</option>
                        <option value="09">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                </td>
                <td>
                    <select name="year_of_passing[]" class="form-control" required>
                        ${yearOptions}
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control certificate-input" name="certificate_no[]" maxlength="20" placeholder="Certificate No" required>
                    <span class="error text-danger certificate-error"></span>
                </td>
                <td>
                    <input type="file" class="form-control education-file" name="education_document[]" accept=".pdf,application/pdf" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-education">
                        <i class="fa fa-trash-o"></i>
                    </button>
                </td>
                <input type="hidden" name="edu_id[]" value="">
                <input type="hidden" name="existing_document[]" value="">
            </tr> `;
            $('#education-container').append(newRow);

        }

        if (e.target.closest(".remove-education")) {
            // if (educationRows.length <= 1) {

            //     $('#education-table').next('.education-error').remove();

            //     $('<div class="text-danger mt-2 education-error">You must have at least one education entry.</div>')
            //     .insertAfter('#education-table');

            //     setTimeout(() => {
            //         $('.education-error').fadeOut();
            //     }, 7000);

            //     // alert("You must have at least one education entry.");
            //     return;
            // }
            e.target.closest("tr").remove();
        }
    });


    // Remove education row
    // $(document).on('click', '.remove-education', function() {
    //     $(this).closest('tr').remove();
    // });

    // ───── Form S — work-experience row helpers (employment type, date math, serials) ─────
    (function () {
        const isSForm = @json(($application_details->form_name ?? '') === 'S');
        if (!isSForm) return;

        const EMP_LABELS = {
            '': '—',
            company: 'Company name <span class="text-danger">*</span>',
            contractor: 'Contractor / firm name <span class="text-danger">*</span>',
            apprentice: 'Establishment / training organization <span class="text-danger">*</span>',
            electrical_inspector: 'Office / department <span class="text-danger">*</span>',
            retired_employees: 'Name of PSU (State / Central / Corporation) <span class="text-danger">*</span>'
        };

        function $workRow(el) { return $(el).closest('tr.work-fields'); }

        function syncLegacyHidden($tr) {
            const emp = ($tr.find('.work-employer-input').val() || '').trim();
            const tot = ($tr.find('.work-experience-total-hidden').val() || '').trim();
            $tr.find('.work-level-sync').val(emp);
            $tr.find('.experience-sync').val(tot);
        }

        function updateTotalYears($tr) {
            const fromStr = ($tr.find('.work-date-from').val() || '').trim();
            const toStr = ($tr.find('.work-date-to').val() || '').trim();
            if (!fromStr || !toStr) {
                $tr.find('.work-year-total-display').val('');
                $tr.find('.work-experience-total-hidden').val('');
                syncLegacyHidden($tr);
                return;
            }
            const from = new Date(fromStr + 'T12:00:00');
            const to = new Date(toStr + 'T12:00:00');
            if (isNaN(from.getTime()) || isNaN(to.getTime())) {
                $tr.find('.work-year-total-display').val('');
                $tr.find('.work-experience-total-hidden').val('');
                syncLegacyHidden($tr);
                return;
            }
            let display, hidden;
            if (to < from) {
                display = 'Invalid range';
                hidden = '';
            } else {
                const years = (to - from) / 86400000 / 365.25;
                const rounded = Math.round(years * 10) / 10;
                hidden = rounded.toFixed(1);
                display = rounded.toFixed(1);
            }
            $tr.find('.work-year-total-display').val(display);
            $tr.find('.work-experience-total-hidden').val(hidden);
            syncLegacyHidden($tr);
        }

        function applyEmploymentType($tr) {
            const t = $tr.find('.work-employment-type').val() || '';
            $tr.find('.work-employer-label').html(EMP_LABELS[t] || EMP_LABELS['']);
            const $emp = $tr.find('.work-employer-input');
            const $yFrom = $tr.find('.work-date-from');
            const $yTo = $tr.find('.work-date-to');
            const $blockInt = $tr.find('.work-block--intimation');
            const $intDate = $tr.find('.work-intimation-date');
            if (!t) {
                $emp.prop('disabled', true).prop('required', false);
                $yFrom.prop('disabled', true).prop('required', false);
                $yTo.prop('disabled', true).prop('required', false);
                $blockInt.hide();
                $intDate.prop('disabled', false).prop('required', false).val('');
                syncLegacyHidden($tr);
                return;
            }
            $emp.prop('disabled', false).prop('required', true);
            $yFrom.prop('disabled', false).prop('required', true);
            $yTo.prop('disabled', false).prop('required', true);
            if (t === 'contractor') {
                $blockInt.show();
                $intDate.prop('disabled', false).prop('required', true);
            } else {
                $blockInt.hide();
                $intDate.prop('disabled', false).prop('required', false).val('');
            }
            updateTotalYears($tr);
            syncLegacyHidden($tr);
        }

        function refreshWorkSerials() {
            $('#work-container .work-fields .work-serial').each(function (idx) {
                $(this).text(String(idx + 1));
            });
        }

        // Expose helpers to outer add/remove handler.
        window.__formSWorkExp = {
            applyEmploymentType: applyEmploymentType,
            refreshWorkSerials: refreshWorkSerials
        };

        $(document).ready(function () {
            $('#work-container .work-fields').each(function () { applyEmploymentType($(this)); });
            refreshWorkSerials();
        });

        $(document).on('change', '.work-employment-type', function () { applyEmploymentType($workRow(this)); });
        $(document).on('change', '.work-date-from, .work-date-to', function () { updateTotalYears($workRow(this)); });
        $(document).on('input change', '.work-employer-input, .work-intimation-date', function () { syncLegacyHidden($workRow(this)); });
    })();

    // Add more work row
    $(document).on('click', function (e) {
        const container = document.getElementById("work-container");
        if (!container) return;
        const workRows = container.querySelectorAll(".work-fields");
        const isSForm = @json(($application_details->form_name ?? '') === 'S');
        const isWForm = @json(($application_details->form_name ?? '') === 'W');

        function refreshWorkSerialsW() {
            $('#work-container .work-fields .work-serial').each(function(idx) { $(this).text(idx + 1); });
        }

        function syncExpHiddenW($tr) {
            var tot = ($tr.find('.work-experience-total-hidden').val() || '').trim();
            $tr.find('.experience-sync').val(tot);
        }

        function updateTotalYearsW($tr) {
            var fromStr = ($tr.find('.work-date-from').val() || '').trim();
            var toStr   = ($tr.find('.work-date-to').val() || '').trim();
            if (!fromStr || !toStr) {
                $tr.find('.work-year-total-display').val('');
                $tr.find('.work-experience-total-hidden').val('');
                syncExpHiddenW($tr); return;
            }
            var from = new Date(fromStr + 'T12:00:00'), to = new Date(toStr + 'T12:00:00');
            if (isNaN(from.getTime()) || isNaN(to.getTime())) {
                $tr.find('.work-year-total-display').val('');
                $tr.find('.work-experience-total-hidden').val('');
                syncExpHiddenW($tr); return;
            }
            var display, hidden;
            if (to < from) { display = 'Invalid range'; hidden = ''; }
            else {
                var years = (to - from) / 86400000 / 365.25;
                var rounded = Math.round(years * 10) / 10;
                hidden = rounded.toFixed(1); display = rounded.toFixed(1);
            }
            $tr.find('.work-year-total-display').val(display);
            $tr.find('.work-experience-total-hidden').val(hidden);
            syncExpHiddenW($tr);
        }

        if (isWForm) {
            $(document).on('change', '.work-date-from, .work-date-to', function() {
                updateTotalYearsW($(this).closest('tr.work-fields'));
            });
        }

        if (e.target.closest(".add-more-work")) {
            if (workRows.length >= 3) {
                $('#work-table').next('.work-error').remove();
                $('<div class="text-danger mt-2 work-error">You can add a maximum of 3 work experience entries.</div>')
                    .insertAfter('#work-table');
                setTimeout(() => { $('.work-error').fadeOut(); }, 7000);
                return;
            }

            let newRow;

            if (isSForm) {
                const serialNo = $('#work-container .work-fields').length + 1;
                newRow = `
                <tr class="work-fields">
                    <td class="work-serial text-center">${serialNo}</td>
                    <td class="work-exp-col-type">
                        <select class="form-control form-control-sm work-employment-type" name="work_employment_type[]">
                            <option value="" selected disabled>Select type</option>
                            <option value="company">Company</option>
                            <option value="contractor">Contractor</option>
                            <option value="apprentice">Apprentice</option>
                            <option value="electrical_inspector">Electrical Inspector / Assistant Electrical Inspector</option>
                            <option value="retired_employees">Retired Employees</option>
                        </select>
                    </td>
                    <td class="work-employer-cell work-exp-col-employer">
                        <label class="small text-muted work-employer-label d-block mb-1">—</label>
                        <input type="text" class="form-control form-control-sm work-employer-input" name="work_employer_name[]" maxlength="120" autocomplete="off" disabled>
                        <div class="work-block work-block--intimation mt-1" style="display:none;">
                            <label class="small d-block mb-0" style="font-size:.7rem;white-space:nowrap;">Intimation letter <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm work-intimation-date" name="work_intimation_date[]">
                        </div>
                    </td>
                    <td class="work-exp-col-years">
                        <div class="work-exp-inline">
                            <div class="work-exp-date-group">
                                <input type="date" class="form-control form-control-sm work-date-from" name="work_date_from[]" disabled title="From date" aria-label="Year of experience from date">
                            </div>
                            <div class="work-exp-date-group">
                                <input type="date" class="form-control form-control-sm work-date-to" name="work_date_to[]" disabled title="To date" aria-label="Year of experience to date">
                            </div>
                            <div class="work-exp-total-inline">
                                <input type="text" class="form-control form-control-sm work-year-total-display" readonly placeholder="—" tabindex="-1" aria-label="Total years of experience">
                                <input type="hidden" class="work-experience-total-hidden" name="work_experience_total[]" value="">
                            </div>
                        </div>
                        <input type="hidden" name="work_level[]" class="work-level-sync" value="" tabindex="-1" aria-hidden="true">
                        <input type="hidden" name="experience[]" class="experience-sync" value="" tabindex="-1" aria-hidden="true">
                    </td>
                    <td class="work-exp-col-designation">
                        <input autocomplete="off" class="form-control form-control-sm" name="designation[]" type="text" maxlength="80">
                    </td>
                    <td class="work-exp-col-upload">
                        <div class="d-flex align-items-center file-section">
                            <div class="work-doc-container d-none"></div>
                            <div class="work-doc-input">
                                <input class="form-control form-control-sm" name="work_document[]" type="file" accept=".pdf,application/pdf">
                            </div>
                        </div>
                    </td>
                    <td class="work-exp-col-actions text-center p-1">
                        <div class="form-s-actions-stack">
                            <button type="button" class="btn btn-danger remove-work py-1 px-2" title="Remove row">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </div>
                    </td>
                    <input type="hidden" name="work_id[]">
                    <input type="hidden" name="existing_work_document[]">
                    <input type="hidden" name="removed_document_work[]" value="0">
                </tr>`;
                const $newRow = $(newRow);
                $('#work-container').append($newRow);
                if (window.__formSWorkExp) { window.__formSWorkExp.applyEmploymentType($newRow); window.__formSWorkExp.refreshWorkSerials(); }
            } else if (isWForm) {
                var first = container.querySelector('.work-fields');
                var cloned = first.cloneNode(true);
                cloned.querySelectorAll('.work-date-from, .work-date-to').forEach(function(inp) { inp.value = ''; });
                var wtd = cloned.querySelector('.work-year-total-display'); if (wtd) wtd.value = '';
                var hTot = cloned.querySelector('.work-experience-total-hidden'); if (hTot) hTot.value = '';
                var hEx = cloned.querySelector('.experience-sync'); if (hEx) hEx.value = '';
                var wIn = cloned.querySelector('input[name="work_level[]"]'); if (wIn) wIn.value = '';
                var dIn = cloned.querySelector('input[name="designation[]"]'); if (dIn) dIn.value = '';
                var idIn = cloned.querySelector('input[name="work_id[]"]'); if (idIn) idIn.value = '';
                container.appendChild(cloned);
                refreshWorkSerialsW();
            } else {
                const serialNo = $('#work-container .work-fields').length + 1;
                newRow = `
                <tr class="work-fields text-center">
                    <td>${serialNo}</td>
                    <td><input type="text" class="form-control" name="work_level[]"></td>
                    <td><input type="number" step="0.1" class="form-control" name="experience[]" min="0" max="50"></td>
                    <td><input type="text" class="form-control" name="designation[]"></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger remove-work">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                    <input type="hidden" name="work_id[]">
                    <input type="hidden" name="existing_work_document[]">
                    <input type="hidden" name="removed_document_work[]" value="0">
                </tr>`;
                $('#work-container').append(newRow);
            }
        }

        if (e.target.closest(".remove-work")) {
            e.target.closest("tr").remove();
            if (isSForm && window.__formSWorkExp) {
                window.__formSWorkExp.refreshWorkSerials();
            } else if (isWForm) {
                refreshWorkSerialsW();
            }
        }

        // Handle removing existing work documents (toggle like education)
        if ($(e.target).closest('.remove-work-doc').length) {
            e.preventDefault();
            const row = $(e.target).closest('tr');
            row.find('.work-doc-container').addClass('d-none');
            row.find('.work-doc-input').removeClass('d-none');
            row.find('input[name="removed_document_work[]"]').val('1');
        }
    });

    // Remove work row
    // $(document).on('click', '.remove-work', function() {
    //     $(this).closest('tr').remove();
    // });

    
</script>
</body>

</html>
