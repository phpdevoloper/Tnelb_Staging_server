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
                                        <span class="d-block form-title-return">
                                        @if(isset($application_details->form_name) && $application_details->form_name === 'W')
                                            RETURN
                                        @else
                                            Return
                                        @endif
                                        </span>
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
                                                            <th>S.No</th>
                                                            <th>Education Level</th>
                                                            <th>Institution/School Name</th>
                                                            <th>Year of Passing</th>
                                                            <th>Certificate No</th>
                                                            <th class="text-center">Upload Document
                                                                <br><span class="file-limit"> File type: PDF ( Min 5 KB Max 200 KB)</span>
                                                            </th>
                                                            <th>
                                                                <button type="button"
                                                                    class="btn btn-primary add-more-education">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </th>
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
                                                                        <option value="PG" {{ $edu_details->educational_level == 'PG' ? 'selected' : '' }}>PG</option>
                                                                        <option value="UG" {{ $edu_details->educational_level == 'UG' ? 'selected' : '' }}>UG</option>
                                                                        <option value="B.E" {{ $edu_details->educational_level == 'B.E' ? 'selected' : '' }}>B.E</option>
                                                                        <option value="M.E" {{ $edu_details->educational_level == 'M.E' ? 'selected' : '' }}>M.E</option>
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
                                                                <div class="d-flex align-items-center file-section">
                                                                    @if (!empty($edu_details->upload_document))
                                                                    <div>
                                                                            <a class="text-primary" href="{{ asset($edu_details->upload_document) }}" target="_blank">
                                                                                <i class="fa fa-file-pdf-o" style="color: red"></i> View
                                                                            </a>
                                                                        </div>
                                                                        <button class="btn btn-sm btn-danger ml-3 remove-doc_edu">Remove</button>
                                                                    @else
                                                                    <div>
                                                                        <input type="file" class="form-control" name="education_document[]" accept=".pdf,application/pdf">
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
                                                                <input type="hidden" name="existing_document[]" value="{{ $edu_details->upload_document }}">
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
                                                                        <option value="PG">PG</option>
                                                                        <option value="UG">UG</option>
                                                                        <option value="B.E">B.E</option>
                                                                        <option value="M.E">M.E</option>
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
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="work-table">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Company Name / Contractor</th>
                                                                <th>Years of Experience (Years)</th>
                                                                <th>Designation</th>
                                                                @if(isset($application_details->form_name) && $application_details->form_name == 'S')
                                                                    <th class="text-center">
                                                                        Upload Document (Experience Certificate)
                                                                        <br><span class="file-limit"> File type: PDF ( Min 5 KB Max 200 KB)</span>
                                                                    </th>
                                                                @endif
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
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>
                                                                    <input autocomplete="off" class="form-control" name="work_level[]" type="text" value="{{ isset($exp_details->company_name) && !empty($exp_details->company_name) ? $exp_details->company_name : '' }}">
                                                                </td>
                                                                <td>
                                                                    <input autocomplete="off" class="form-control" name="experience[]" type="number" value="{{ isset($exp_details->experience) && !empty($exp_details->experience) ? $exp_details->experience : '' }}">
                                                                </td>
                                                                <td>
                                                                    <input autocomplete="off" class="form-control" name="designation[]" type="text" value="{{ isset($exp_details->designation) && !empty($exp_details->designation) ? $exp_details->designation : '' }}">
                                                                </td>
                                                                @if(isset($application_details->form_name) && $application_details->form_name == 'S')
                                                                <td>
                                                                    <div class="d-flex align-items-center file-section">
                                                                        @if (!empty($exp_details->upload_document))
                                                                            <div class="work-doc-container">
                                                                                <a class="text-primary"
                                                                                   href="{{ asset($exp_details->upload_document) }}"
                                                                                   target="_blank">
                                                                                    <i class="fa fa-file-pdf-o" style="color: red"></i> View
                                                                                </a>
                                                                                <button type="button" class="btn btn-sm btn-danger ml-3 remove-work-doc">Remove</button>
                                                                            </div>
                                                                            <div class="work-doc-input d-none">
                                                                                <input class="form-control mt-1" name="work_document[]" type="file" accept=".pdf,application/pdf">
                                                                            </div>
                                                                        @else
                                                                            <div class="work-doc-container d-none"></div>
                                                                            <div class="work-doc-input">
                                                                                <input class="form-control" name="work_document[]" type="file" accept=".pdf,application/pdf">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                @endif
                                                                <td>
                                                                    <button type="button" class="btn btn-danger remove-work remove_exp" data-exp_id = "{{ $exp_details->id }}" data-url= "{{ route('delete_experience') }}">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </td>
                                                                <input type="hidden" name="work_id[]" value="{{ $exp_details->id ?? '' }}">
                                                                <input type="hidden" name="existing_work_document[]" value="{{ $exp_details->upload_document ?? '' }}">
                                                                <input type="hidden" name="removed_document_work[]" value="0">
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr class="work-fields text-center">
                                                                <td>1</td>
                                                                <td>
                                                                    <input autocomplete="off" class="form-control" name="work_level[]" type="text">
                                                                </td>
                                                                <td>
                                                                    <input autocomplete="off" class="form-control" name="experience[]" type="number">
                                                                </td>
                                                                <td>
                                                                    <input autocomplete="off" class="form-control" name="designation[]" type="text">
                                                                </td>
                                                                @if(isset($application_details->form_name) && $application_details->form_name == 'S')
                                                                <td>
                                                                    <div class="d-flex align-items-center file-section">
                                                                        <div class="work-doc-container d-none"></div>
                                                                        <div class="work-doc-input">
                                                                            <input class="form-control" name="work_document[]" type="file" accept=".pdf,application/pdf">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @endif
                                                                <td>
                                                                    <button type="button" class="btn btn-danger remove-work">
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
                                                    <div class="row align-items-center" id="previously_details" style="display: {{ !empty($application_details->previously_number) ? 'flex' : 'none' }}; flex-wrap: wrap;">
    
                                                        <!-- License Number Label -->
                                                        <div class="col-12 col-md-2 text-md-right">
                                                            <label>License Number <span style="color: red;">*</span></label>
                                                        </div>
                                                    
                                                        <!-- License Number Input -->
                                                        <div class="col-12 col-md-3">
                                                            <input autocomplete="off" class="form-control text-box single-line verify-input"
                                                                   id="previously_number" name="previously_number" type="text"
                                                                   data-type="license" data-error="#licenseError" data-msg="#license_messagdfde"
                                                                   placeholder="License Number" {{ !empty($application_details->previously_number) ? 'readonly':'' }} value="{{ $application_details->previously_number }}">
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
                                                    
                                                        <!-- Date Label -->
                                                        <div class="col-12 col-md-1 text-md-right">
                                                            <label>Date <span style="color: red;">*</span></label>
                                                        </div>
                                                    
                                                        <!-- Date Input + Verify Button -->
                                                        <div class="col-12 col-md-6">
                                                            <div class="row g-2">
                                                                <div class="col-12 col-md-7">
                                                                    <input autocomplete="off" class="form-control text-box single-line verify-date"
                                                                           id="previously_date" name="previously_date" type="date"
                                                                           data-error="#dateError" {{ !empty($application_details->previously_number) ? 'readonly':'' }}  value="{{ $application_details->previously_date }}">
                                                                    <span id="dateError" class="text-danger"></span>
                                                                </div>
                                                                <div class="col-12 col-md-5">
                                                                    @if (!empty($application_details->previously_number))
                                                                        <button type="button" class="btn btn-danger remove_verify" data-type="superviser" style="margin-left: 10px;">Delete</button>
                                                                        <button type="button" class="btn btn-primary verify-btn btn-forms d-none" data-type="license" data-url="{{ route('verifylicense') }}" style="margin-left: 10px;">Verify</button>
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
                                                    <div class="row mt-3" id="wireman_details" style="display: {{ !empty($application_details->certificate_no) ? 'flex' : 'none' }}; flex-wrap: wrap;">
                                                        <div class="col-12 col-md-4 text-md-right">
                                                            <label>Certificate Number <span style="color: red;">*</span></label>
    
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            @php
                                                                if($application_details->form_name == 'S'){
                                                                    $cert_type = 'supervisor';
                                                                }else if($application_details->form_name == 'WH'){
                                                                    $cert_type = 'helper';
                                                                }else{
                                                                    $cert_type = 'certificate';
                                                                }

                                                            @endphp
                                                            <input class="form-control text-box single-line verify-input" id="certificate_no" name="competency_certificate_no" type="text" data-type="{{ $cert_type }}" data-error="#certError" data-msg="#license_message" placeholder="Certificate No" maxlength="12" value="{{ $application_details->certificate_no }}" 
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
                                                        <div class="col-12 col-md-1 text-md-right">
                                                            <label>Date <span style="color: red;">*</span></label>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input class="form-control text-box single-line verify-date" id="certificate_date" name="certificate_date" data-error="#certDateError" type="date" value="{{ $application_details->certificate_date }}" {{ !empty($application_details->certificate_no) ? 'readonly':'' }}>
                                                            <span id="certDateError" class="text-danger"></span>
                                                        </div>
                                                        <div>
                                                            @if (!empty($application_details->certificate_no))
                                                                <button type="button" class="btn btn-danger remove_verify" data-type="superviser_two" style="margin-left: 10px;">Delete</button>
                                                                <button type="button" class="btn btn-primary verify-btn d-none" data-type="certificate" data-url="{{ route('verifylicense') }}" style="margin-left: 10px;">Verify</button>
                                                            @else
                                                                <button type="button" class="btn btn-primary verify-btn" data-type="certificate" data-url="{{ route('verifylicense') }}" style="margin-left: 10px;">Verify</button>
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
                                                <div class="col-12 col-md-4 mb-3 p-3">
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
                                                <div class="col-12 col-md-4 mb-3 p-3">
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

                                                {{-- Signature column --}}
                                                <div class="col-12 col-md-4 mb-3 p-3">
                                                    <label for="upload_sign">(iv) Upload Signature</label>
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
                                                        <input type="checkbox" id="declarationCheckbox" required checked>

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
                                                    <span id="checkboxError" class="text-danger" style="display: none;">Please check the declaration box before proceeding.</span>
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
    $(document).on('click', '#submitCorrectionsBtn', function() {
        var btn = $(this);
        var url = btn.data('url');
        var form = document.getElementById('competency_form_ws');
        if (!form || !url) return;

        if (!$('#declarationCheckbox').prop('checked')) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({ icon: 'warning', title: 'Declaration', text: 'Please accept the declaration before submitting.' });
            } else {
                alert('Please accept the declaration before submitting.');
            }
            return;
        }

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
                var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Submission failed. Please try again.';
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
        const isWHForm = "{{ $application_details->form_name ?? '' }}" === 'WH';
            const isWOrWHForm = "{{ $application_details->form_name ?? '' }}" === 'W' || isWHForm;

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
                        ${isWOrWHForm ? '<option value="Up to 8th Standard">Up to 8th Standard</option><option value="Wireman Helper(H) Certificate">Wireman Helper(H) Certificate</option><option value="ITI Certificate">ITI Certificate</option>' : '<option value="PG">PG</option><option value="UG">UG</option><option value="B.E">B.E</option><option value="M.E">M.E</option><option value="Diploma">Diploma</option><option value="+2">+2</option><option value="10">10</option>' + (isWHForm ? '<option value="8">8</option>' : '')}
                    </select>
                </td>
                <td><input type="text" class="form-control" name="institute_name[]" required value="${isWHForm ? 'Dept of Employment & Training' : ''}"></td>
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

                // alert("You can add a maximum of 3 work experience entries.");
                return;
            }

            let serialNo = $('#work-container .work-fields').length + 1;
            const isSForm = "{{ $application_details->form_name ?? '' }}" === 'S';
            let newRow = `
                    <tr class="work-fields text-center">
                        <td>${serialNo}</td>
                        <td><input type="text" class="form-control" name="work_level[]"></td>
                        <td><input type="number" step="0.1" class="form-control" name="experience[]" min="0" max="50"></td>
                        <td><input type="text" class="form-control" name="designation[]"></td>
                        ${isSForm ? `
                        <td>
                            <div class="d-flex align-items-center file-section">
                                <div class="work-doc-container d-none"></div>
                                <div class="work-doc-input">
                                    <input class="form-control" name="work_document[]" type="file" accept=".pdf,application/pdf">
                                </div>
                            </div>
                        </td>` : ''}
                        <td class="text-center">
                            <button type="button" class="btn btn-danger remove-work">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                        <input type="hidden" name="work_id[]">
                        <input type="hidden" name="existing_work_document[]">
                        <input type="hidden" name="removed_document_work[]" value="0">
                    </tr>
                `;
            $('#work-container').append(newRow);
        }

            if (e.target.closest(".remove-work")) {
                // if (workRows.length <= 1) {

                //     $('#work-table').next('.work-error').remove();

                //     $('<div class="text-danger mt-2 work-error">You must have at least one work experience entry.</div>')
                //     .insertAfter('#work-table');

                //     setTimeout(() => {
                //         $('.work-error').fadeOut();
                //     }, 7000);

                    
                //     // alert("You must have at least one work experience entry.");
                //     return;
                // }
                e.target.closest("tr").remove();

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
