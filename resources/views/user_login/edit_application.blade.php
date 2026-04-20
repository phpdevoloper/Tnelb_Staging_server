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
    .form-s-file-upload-wrap {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.35rem;
    }
    .form-s-file-upload-wrap .form-control {
        flex: 1 1 auto;
        min-width: 0;
    }
    #education-table .form-s-file-upload-wrap--combined,
    #work-table .form-s-file-upload-wrap--combined {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-items: stretch;
        gap: 0;
        width: 100%;
        min-width: 12rem;
        max-width: 20rem;
        border: 1px solid #ced4da;
        border-radius: 4px;
        overflow: hidden;
        background: #fff;
    }
    #work-table.work-exp-table {
        font-size: 0.8125rem;
        width: 100%;
        max-width: 100%;
    }
    #work-table.work-exp-table thead th {
        font-size: 0.78rem;
        font-weight: 600;
        padding: 0.35rem 0.4rem;
        vertical-align: middle;
        line-height: 1.25;
    }
    #work-table.work-exp-table tbody td {
        padding: 0.4rem 0.45rem;
        vertical-align: top;
    }
    #work-table .work-exp-col-type {
        width: 12%;
        max-width: 10.5rem;
    }
    #work-table .work-exp-col-employer {
        width: 16%;
        max-width: 12rem;
    }
    #work-table.work-exp-table .work-exp-col-years {
        width: 29%;
        min-width: 15.5rem;
    }
    #work-table.work-table-w thead th:nth-child(3),
    #work-table.work-table-w tbody td:nth-child(3) {
        width: 18%;
        max-width: 11rem;
    }
    #work-table.work-table-w thead th:nth-child(4),
    #work-table.work-table-w tbody td:nth-child(4) {
        width: 28%;
        min-width: 14rem;
    }
    #work-table .work-exp-col-designation {
        width: 12%;
    }
    #work-table .work-exp-col-upload {
        width: 22%;
    }
    #work-table .work-exp-col-actions {
        width: 2.75rem;
        white-space: nowrap;
    }
    #work-table .work-exp-upload-head {
        font-size: 0.72rem;
        line-height: 1.2;
    }
    #work-table .work-exp-upload-head .file-limit {
        font-size: 0.68rem;
    }
    #work-table .work-exp-inline {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        gap: 0.35rem 0.5rem;
    }
    #work-table .work-exp-date-group {
        flex: 1 1 8.25rem;
        min-width: 8.25rem;
        max-width: 9.5rem;
    }
    #work-table .work-exp-total-inline {
        flex: 0 0 auto;
        min-width: 4.25rem;
        max-width: 5rem;
    }
    #work-table .work-exp-label-fromto {
        font-size: 0.72rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: 0.2rem;
        line-height: 1.2;
    }
    #work-table thead th.work-exp-col-years {
        vertical-align: top;
    }
    #work-table .work-exp-years-title {
        text-align: center;
        margin-bottom: 0.35rem;
        font-weight: 600;
        font-size: 0.78rem;
    }
    #work-table .work-exp-inline--head {
        align-items: flex-end;
        border-top: 1px solid #dee2e6;
        padding-top: 0.25rem;
    }
    #work-table .work-exp-inline--head .work-exp-date-group,
    #work-table .work-exp-inline--head .work-exp-total-inline {
        position: relative;
        padding-left: 0.35rem;
    }
    #work-table .work-exp-inline--head .work-exp-date-group + .work-exp-date-group,
    #work-table .work-exp-inline--head .work-exp-total-inline {
        border-left: 1px solid #dee2e6;
    }
    #work-table .work-exp-inline--head .work-exp-label-fromto {
        margin-bottom: 0;
    }
    #work-table .work-date-from,
    #work-table .work-date-to {
        font-size: 0.8125rem;
        color: #212529;
        min-width: 8.25rem;
        width: 100%;
    }
    #work-table .work-year-total-display {
        max-width: 4.5rem;
        font-size: 0.7rem;
        padding: 0.22rem 0.3rem;
        line-height: 1.3;
        text-align: center;
    }
    #work-table .work-employer-label {
        font-size: 0.7rem !important;
        margin-bottom: 0.15rem !important;
    }
    #education-table .form-s-file-upload-wrap--combined .form-control,
    #work-table .form-s-file-upload-wrap--combined .form-control {
        flex: 1 1 auto;
        min-width: 0;
        width: auto;
        font-size: 0.8125rem;
        border: 0 !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        padding: 0.3rem 0.45rem;
        background: #fff;
    }
    .local-file-preview {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.35rem 0.5rem;
        margin-top: 0.35rem;
    }
    .local-file-preview .preview-link {
        color: #0056b3 !important;
        text-decoration: underline;
        font-size: 0.78rem;
        font-weight: 600;
    }
    .local-file-preview .img-preview {
        width: 44px;
        height: 44px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        object-fit: cover;
    }
</style>


<section class="">
    <div class="container">
        <ul id="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><span class="fa fa-home"> </span> Dashboard</a></li>
            <li><a href="#"><span class=" fa fa-info-circle"> </span> Form {{ $application_details->form_name }}</a></li>

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
                                    <h6 class="card-title_apply text-white mt-2 form-title"> Form '{{ $application_details->form_name }}' /
                                        Certificate '{{ $application_details->license_name }}' </h4>
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-warning mb-3" role="alert">
                                        <h6 class="alert-heading font-weight-bold mb-2">
                                            <i class="fa fa-exclamation-triangle"></i> Query raised – please correct and resubmit
                                        </h6>
                                        <p class="mb-1">The following issue(s) were reported. Please correct and submit again:</p>
                                        <ul class="mb-0 pl-4">
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
                                                                <span class="text-label">(தெளிவாக இருத்தல் வேண்டும்)</span></label>
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
                                                <table class="table table-bordered {{ (isset($application_details->form_name) && $application_details->form_name == 'S') ? '' : 'table-striped' }}"
                                                    id="education-table">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2">S.No</th>
                                                            <th rowspan="2">Education Level</th>
                                                            <th rowspan="2">Institution/School Name</th>
                                                            <th colspan="2" class="text-center">Year of Passing</th>
                                                            <th rowspan="2">Certificate No</th>
                                                            <th class="text-center" rowspan="2">Upload Document
                                                                <br><span class="file-limit text-success small">File type: PDF(Min 5 KB To Max 200 KB)</span>
                                                            </th>
                                                            <th class="text-center p-1" rowspan="2">
                                                                <div class="form-s-actions-stack">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm add-more add-more-education py-1 px-2" title="Add row">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
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
                                                        <tr class="education-fields text-center" data-edu-index="{{ $loop->index }}">
                                                            <td class="edu-serial text-center">{{ $loop->iteration }}</td>
                                                            <td>
                                                                @php $formName = $application_details->form_name ?? ''; @endphp
                                                                <select class="form-control" name="educational_level[]">
                                                                    <option disabled {{ empty($edu_details->educational_level) ? 'selected' : '' }}>Select Education</option>
                                                                    @if ($formName === 'S')
                                                                        <option value="DEE" {{ $edu_details->educational_level == 'DEE' ? 'selected' : '' }}>Diploma(Electrical Engineering)</option>
                                                                        <option value="BEE" {{ $edu_details->educational_level == 'BEE' ? 'selected' : '' }}>B.E(Electrical Engineering)</option>
                                                                        <option value="MEE" {{ $edu_details->educational_level == 'MEE' ? 'selected' : '' }}>M.E(Electrical Engineering)</option>
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
                                                
                                                                    @endif
                                                                </select>
                                                            </td>
                                                            @php
                                                                $isWH = (isset($application_details->form_name) && $application_details->form_name === 'WH');
                                                                $isDraft = isset($application_details->payment_status) && strtolower(trim((string) $application_details->payment_status)) === 'draft';
                                                                $instituteDisplayValue = !empty(trim((string) ($edu_details->institute_name ?? '')))
                                                                    ? $edu_details->institute_name
                                                                    : ($isDraft && $isWH ? 'Dept of Employment & Training' : '');
                                                            @endphp
                                                            <td><input type="text" class="form-control" name="institute_name[]" value="{!! e($instituteDisplayValue) !!}"></td>
                                                            <td>
                                                                <select name="month_of_passing[]" class="form-control">
                                                                    <option value="">Select Month</option>
                                                                    <option value="01" {{ ($edu_details->month_passing ?? '') == '01' ? 'selected' : '' }}>Jan</option>
                                                                    <option value="02" {{ ($edu_details->month_passing ?? '') == '02' ? 'selected' : '' }}>Feb</option>
                                                                    <option value="03" {{ ($edu_details->month_passing ?? '') == '03' ? 'selected' : '' }}>Mar</option>
                                                                    <option value="04" {{ ($edu_details->month_passing ?? '') == '04' ? 'selected' : '' }}>Apr</option>
                                                                    <option value="05" {{ ($edu_details->month_passing ?? '') == '05' ? 'selected' : '' }}>May</option>
                                                                    <option value="06" {{ ($edu_details->month_passing ?? '') == '06' ? 'selected' : '' }}>Jun</option>
                                                                    <option value="07" {{ ($edu_details->month_passing ?? '') == '07' ? 'selected' : '' }}>Jul</option>
                                                                    <option value="08" {{ ($edu_details->month_passing ?? '') == '08' ? 'selected' : '' }}>Aug</option>
                                                                    <option value="09" {{ ($edu_details->month_passing ?? '') == '09' ? 'selected' : '' }}>Sep</option>
                                                                    <option value="10" {{ ($edu_details->month_passing ?? '') == '10' ? 'selected' : '' }}>Oct</option>
                                                                    <option value="11" {{ ($edu_details->month_passing ?? '') == '11' ? 'selected' : '' }}>Nov</option>
                                                                    <option value="12" {{ ($edu_details->month_passing ?? '') == '12' ? 'selected' : '' }}>Dec</option>
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
                                                                <div class="file-section text-center">
                                                                    @if (!empty($edu_details->upload_document))
                                                                        <div class="edu-doc-container d-flex align-items-center justify-content-center">
                                                                            <a class="text-primary" href="{{ asset($edu_details->upload_document) }}" target="_blank">
                                                                                <i class="fa fa-file-pdf-o" style="color: red"></i> View
                                                                            </a>
                                                                            <button type="button" class="btn btn-sm btn-danger ml-2 remove-doc_edu_confirm">Remove</button>
                                                                        </div>
                                                                        <div class="edu-doc-input d-none">
                                                                            <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" data-upload-kind="education">
                                                                                <input type="file" class="form-control" name="education_document[{{ $loop->index }}]" accept="{{ (isset($application_details->form_name) && $application_details->form_name == 'S') ? '.pdf,application/pdf' : '.pdf,application/pdf,image/jpeg,image/png' }}">
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" data-upload-kind="education">
                                                                            <input type="file" class="form-control" name="education_document[{{ $loop->index }}]" accept="{{ (isset($application_details->form_name) && $application_details->form_name == 'S') ? '.pdf,application/pdf' : '.pdf,application/pdf,image/jpeg,image/png' }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </td>

                                                            <td class="form-s-actions-cell text-center p-1">
                                                                <div class="form-s-actions-stack">
                                                                    <button type="button" class="btn btn-danger btn-sm remove-education remove_edu py-1 px-2" data-edu_id = "{{ $edu_details->id }}" data-url= "{{ route('delete_education') }}" title="Remove row">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </div>
                                                                <!-- Keep IDs inside a cell to avoid invalid table markup causing dropped/misaligned inputs -->
                                                                <input type="hidden" name="edu_id[]" value="{{ $edu_details->id }}">
                                                                <input type="hidden" name="existing_document[]" value="{{ $edu_details->upload_document }}">
                                                                <input type="hidden" class="removed-document-edu" name="removed_document[]" value="0">
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr class="education-fields text-center" data-edu-index="0">
                                                            <td class="edu-serial text-center">1</td>
                                                            <td>
                                                                @php $formName = $application_details->form_name ?? ''; @endphp
                                                                <select class="form-control" name="educational_level[]">
                                                                    <option selected disabled>Select Education</option>
                                                                    @if ($formName === 'S')
                                                                        <option value="DEE">Diploma(Electrical Engineering)</option>
                                                                        <option value="BEE">B.E(Electrical Engineering)</option>
                                                                        <option value="MEE">M.E(Electrical Engineering)</option>
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
                                                            @php
                                                                $isWHEmptyRow = isset($application_details->form_name) && $application_details->form_name === 'WH';
                                                                $isDraftEmptyRow = isset($application_details->payment_status) && strtolower(trim((string) $application_details->payment_status)) === 'draft';
                                                                $defaultInstituteForEmptyRow = ($isDraftEmptyRow && $isWHEmptyRow) ? 'Dept of Employment & Training' : '';
                                                            @endphp
                                                            <td><input type="text" class="form-control" name="institute_name[]" value="{!! e($defaultInstituteForEmptyRow) !!}"></td>
                                                            <td>
                                                                <select name="month_of_passing[]" class="form-control">
                                                                    <option value="">Select Month</option>
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
                                                            <td>
                                                                <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" data-upload-kind="education">
                                                                    <input type="file" class="form-control" name="education_document[0]" accept="{{ (isset($application_details->form_name) && $application_details->form_name == 'S') ? '.pdf,application/pdf' : '.pdf,application/pdf,image/jpeg,image/png' }}">
                                                                </div>
                                                            </td>
                                                            <td class="form-s-actions-cell text-center p-1">
                                                                <div class="form-s-actions-stack">
                                                                    <button type="button" class="btn btn-danger btn-sm remove-education py-1 px-2" title="Remove row">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </div>
                                                                <input type="hidden" name="edu_id[]" value="">
                                                                <input type="hidden" name="existing_document[]" value="">
                                                                <input type="hidden" class="removed-document-edu" name="removed_document[]" value="0">
                                                            </td>
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
                                                    <table class="table table-bordered {{ (isset($application_details->form_name) && $application_details->form_name == 'S') ? 'table-sm work-exp-table' : 'table-striped' }} {{ (isset($application_details->form_name) && $application_details->form_name == 'W') ? 'work-table-w' : '' }}" id="work-table">
                                                        <thead>
                                                            <tr>
                                                                @if(isset($application_details->form_name) && $application_details->form_name == 'S')
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
                                                                @else
                                                                <th>S.No</th>
                                                                <th>Company Name / Contractor</th>
                                                                <th>Years of Experience (Years)</th>
                                                                @endif
                                                                <th class="work-exp-col-designation">Designation</th>
                                                                @if(isset($application_details->form_name) && $application_details->form_name == 'S')
                                                                    <th class="text-center work-exp-col-upload work-exp-upload-head">
                                                                        Upload Document
                                                                        <br><span class="file-limit text-success small">File type: PDF(Min 5 KB To Max 200 KB)</span>
                                                                    </th>
                                                                @endif
                                                                <th class="work-exp-col-actions text-center p-1">
                                                                    <div class="form-s-actions-stack">
                                                                        <button type="button" class="btn btn-primary btn-sm add-more-work py-1 px-2" title="Add row">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="work-container">
                                                            @if ($exp_details->isNotEmpty())
                                                            @foreach ($exp_details as $expRow)
                                                                @if(isset($application_details->form_name) && $application_details->form_name == 'S')
                                                                <tr class="work-fields">
                                                                    @php
                                                                        $workEmpType = $expRow->emp_type ?? 'company';
                                                                        $workEmployerName = $expRow->emp_cate ?? $expRow->company_name ?? '';
                                                                        $workTotalExp = $expRow->total_exp ?? $expRow->experience ?? '';
                                                                    @endphp
                                                                    <td class="work-serial text-center">{{ $loop->iteration }}</td>
                                                                    <td class="work-exp-col-type">
                                                                        <select class="form-control form-control-sm work-employment-type" name="work_employment_type[]" required>
                                                                            <option value="company" {{ $workEmpType === 'company' ? 'selected' : '' }}>Company</option>
                                                                            <option value="contractor" {{ $workEmpType === 'contractor' ? 'selected' : '' }}>Contractor</option>
                                                                            <option value="apprentice" {{ $workEmpType === 'apprentice' ? 'selected' : '' }}>Apprentice</option>
                                                                            <option value="electrical_inspector" {{ $workEmpType === 'electrical_inspector' ? 'selected' : '' }}>Electrical Inspector / Assistant Electrical Inspector</option>
                                                                            <option value="retired_employees" {{ $workEmpType === 'retired_employees' ? 'selected' : '' }}>Retired Employees</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="work-employer-cell work-exp-col-employer">
                                                                        <label class="small text-muted work-employer-label d-block mb-1">Company name <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control form-control-sm work-employer-input" name="work_employer_name[]" maxlength="120" autocomplete="off" value="{{ $workEmployerName }}">
                                                                        <div class="work-block work-block--intimation mt-1" style="display: none;">
                                                                            <label class="small d-block mb-0" style="font-size:0.7rem;">Intimation letter <span class="text-danger">*</span></label>
                                                                            <input type="date" class="form-control form-control-sm work-intimation-date" name="work_intimation_date[]" value="{{ $expRow->intimation_date ?? '' }}">
                                                                        </div>
                                                                    </td>
                                                                    <td class="work-exp-col-years">
                                                                        <div class="work-exp-inline">
                                                                            <div class="work-exp-date-group">
                                                                                <input type="date" class="form-control form-control-sm work-date-from" name="work_date_from[]" value="{{ $expRow->from_date ?? '' }}" title="From date" aria-label="Year of experience from date">
                                                                            </div>
                                                                            <div class="work-exp-date-group">
                                                                                <input type="date" class="form-control form-control-sm work-date-to" name="work_date_to[]" value="{{ $expRow->to_date ?? '' }}" title="To date" aria-label="Year of experience to date">
                                                                            </div>
                                                                            <div class="work-exp-total-inline">
                                                                                <input type="text" class="form-control form-control-sm work-year-total-display" readonly placeholder="—" tabindex="-1" aria-label="Total years of experience" value="{{ $workTotalExp }}">
                                                                                <input type="hidden" class="work-experience-total-hidden" name="work_experience_total[]" value="{{ $workTotalExp }}">
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="work_level[]" class="work-level-sync" value="{{ $workEmployerName }}" tabindex="-1" aria-hidden="true">
                                                                        <input type="hidden" name="experience[]" class="experience-sync" value="{{ $workTotalExp }}" tabindex="-1" aria-hidden="true">
                                                                    </td>
                                                                    <td class="work-exp-col-designation">
                                                                        <input autocomplete="off" class="form-control form-control-sm" name="designation[]" type="text" maxlength="80" value="{{ $expRow->designation ?? '' }}">
                                                                    </td>
                                                                    <td class="work-exp-col-upload">
                                                                        <div class="file-section text-center">
                                                                            @if (!empty($expRow->upload_document))
                                                                                <div class="work-doc-container d-flex align-items-center justify-content-center">
                                                                                    <a class="text-primary" href="{{ asset($expRow->upload_document) }}" target="_blank">
                                                                                        <i class="fa fa-file-pdf-o" style="color: red"></i> View
                                                                                    </a>
                                                                                    <button type="button" class="btn btn-sm btn-danger ml-2 remove-work-doc-confirm">Remove</button>
                                                                                </div>
                                                                                <div class="work-doc-input d-none">
                                                                                    <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined mt-1" data-upload-kind="work">
                                                                                        <input class="form-control form-control-sm p-1" name="work_document[]" type="file" accept=".pdf,application/pdf,.jpg,.jpeg,.png,image/jpeg,image/png">
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <div class="work-doc-container d-none"></div>
                                                                                <div class="work-doc-input">
                                                                                    <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" data-upload-kind="work">
                                                                                        <input class="form-control form-control-sm p-1" name="work_document[]" type="file" accept=".pdf,application/pdf,.jpg,.jpeg,.png,image/jpeg,image/png">
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td class="work-exp-col-actions text-center p-1">
                                                                        <div class="form-s-actions-stack">
                                                                            <button type="button" class="btn btn-danger btn-sm remove-work remove_exp py-1 px-2" data-exp_id="{{ $expRow->id }}" data-url="{{ route('delete_experience') }}" title="Remove row">
                                                                                <i class="fa fa-trash-o"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                    <input type="hidden" name="work_id[]" value="{{ $expRow->id ?? '' }}">
                                                                    <input type="hidden" name="existing_work_document[]" value="{{ $expRow->upload_document ?? '' }}">
                                                                    <input type="hidden" name="removed_document_work[]" value="0">
                                                                </tr>
                                                                @else
                                                                <tr class="work-fields text-center">
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td><input autocomplete="off" class="form-control" name="work_level[]" type="text" value="{{ $expRow->company_name ?? '' }}"></td>
                                                                    <td><input autocomplete="off" class="form-control" name="experience[]" type="number" value="{{ $expRow->experience ?? '' }}"></td>
                                                                    <td><input autocomplete="off" class="form-control" name="designation[]" type="text" value="{{ $expRow->designation ?? '' }}"></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-danger remove-work remove_exp" data-exp_id="{{ $expRow->id }}" data-url="{{ route('delete_experience') }}">
                                                                            <i class="fa fa-trash-o"></i>
                                                                        </button>
                                                                    </td>
                                                                    <input type="hidden" name="work_id[]" value="{{ $expRow->id ?? '' }}">
                                                                    <input type="hidden" name="existing_work_document[]" value="">
                                                                    <input type="hidden" name="removed_document_work[]" value="0">
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                            @else
                                                                @if(isset($application_details->form_name) && $application_details->form_name == 'S')
                                                                <tr class="work-fields">
                                                                    <td class="work-serial text-center">1</td>
                                                                    <td class="work-exp-col-type">
                                                                        <select class="form-control form-control-sm work-employment-type" name="work_employment_type[]" required>
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
                                                                        <div class="work-block work-block--intimation mt-1" style="display: none;">
                                                                            <label class="small d-block mb-0" style="font-size:0.7rem;">Intimation letter <span class="text-danger">*</span></label>
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
                                                                        <div class="file-section text-center">
                                                                            <div class="work-doc-container d-none"></div>
                                                                            <div class="work-doc-input">
                                                                                <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" data-upload-kind="work">
                                                                                    <input class="form-control form-control-sm p-1" name="work_document[]" type="file" accept=".pdf,application/pdf,.jpg,.jpeg,.png,image/jpeg,image/png">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="work-exp-col-actions text-center p-1">
                                                                        <div class="form-s-actions-stack">
                                                                            <button type="button" class="btn btn-danger btn-sm remove-work py-1 px-2" title="Remove row">
                                                                                <i class="fa fa-trash-o"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                    <input type="hidden" name="work_id[]">
                                                                    <input type="hidden" name="existing_work_document[]">
                                                                    <input type="hidden" name="removed_document_work[]" value="0">
                                                                </tr>
                                                                @else
                                                                <tr class="work-fields text-center">
                                                                    <td>1</td>
                                                                    <td><input autocomplete="off" class="form-control" name="work_level[]" type="text"></td>
                                                                    <td><input autocomplete="off" class="form-control" name="experience[]" type="number"></td>
                                                                    <td><input autocomplete="off" class="form-control" name="designation[]" type="text"></td>
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
                                                        <div class="col-12 col-md-2">
                                                            <input autocomplete="off" class="form-control text-box single-line verify-input"
                                                                   id="previously_number" name="previously_number" type="text"
                                                                   data-type="license" data-error="#licenseError" data-msg="#license_messagdfde"
                                                                   placeholder="License Number" {{ !empty($application_details->previously_number) ? 'readonly':'' }} value="{{ $application_details->previously_number }}" maxlength="80">
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
                                                        <div class="col-12 col-md-2 text-md-right">
                                                            <label>Date of Issue <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Date of Issue Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input autocomplete="off" class="form-control text-box single-line verify-issue-date"
                                                                   id="previously_issue_date" name="previously_issue_date" type="date"
                                                                   data-error="#previouslyIssueDateError"
                                                                   {{ !empty($application_details->previously_number) ? 'readonly':'' }}
                                                                   value="{{ $application_details->previously_issue_date }}">
                                                            <span id="previouslyIssueDateError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Validity Date Label -->
                                                        <div class="col-12 col-md-1 text-md-right">
                                                            <label>Validity Date <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Validity Date Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input autocomplete="off" class="form-control text-box single-line verify-date"
                                                                   id="previously_date" name="previously_date" type="date"
                                                                   data-error="#dateError"
                                                                   {{ !empty($application_details->previously_number) ? 'readonly':'' }}
                                                                   value="{{ $application_details->previously_date }}">
                                                            <span id="dateError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Verify / Delete Button -->
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
                                                    <div class="row mt-3" id="wireman_details" style="display: {{ !empty($application_details->certificate_no) ? 'flex' : 'none' }}; flex-wrap: wrap;">
                                                        @php
                                                            if($application_details->form_name == 'S'){
                                                                $cert_type = 'supervisor';
                                                            }else if($application_details->form_name == 'WH'){
                                                                $cert_type = 'helper';
                                                            }else{
                                                                $cert_type = 'certificate';
                                                            }
                                                        @endphp
                                                        <!-- Certificate Number Label -->
                                                        <div class="col-12 col-md-2 text-md-right">
                                                            <label>Certificate Number <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Certificate Number Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input class="form-control text-box single-line verify-input"
                                                                   id="certificate_no" name="competency_certificate_no" type="text"
                                                                   data-type="{{ $cert_type }}" data-error="#certError" data-msg="#license_message"
                                                                   placeholder="Certificate No" maxlength="80"
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
                                                        <div class="col-12 col-md-2 text-md-right">
                                                            <label>Date of Issue <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Date of Issue Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input class="form-control text-box single-line verify-issue-date"
                                                                   id="certificate_issue_date" name="certificate_issue_date"
                                                                   data-error="#certIssueDateError" type="date"
                                                                   value="{{ $application_details->certificate_issue_date }}"
                                                                   {{ !empty($application_details->certificate_no) ? 'readonly':'' }}>
                                                            <span id="certIssueDateError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Validity Date Label -->
                                                        <div class="col-12 col-md-1 text-md-right">
                                                            <label>Validity Date <span style="color: red;">*</span></label>
                                                        </div>

                                                        <!-- Validity Date Input -->
                                                        <div class="col-12 col-md-2">
                                                            <input class="form-control text-box single-line verify-date"
                                                                   id="certificate_date" name="certificate_date"
                                                                   data-error="#certDateError" type="date"
                                                                   value="{{ $application_details->certificate_date }}"
                                                                   {{ !empty($application_details->certificate_no) ? 'readonly':'' }}>
                                                            <span id="certDateError" class="text-danger"></span>
                                                        </div>

                                                        <!-- Verify / Delete Button -->
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
                                            @if(isset($application_details->form_name) && $application_details->form_name == 'S')
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <table class="table mb-0">
                                                        <tr>
                                                            <td style="width:5%; vertical-align: middle;">(i)</td>
                                                            <td style="width:25%; vertical-align: middle;">
                                                                <label for="upload_photo">Upload Photo <span style="color: red;">*</span></label>
                                                                <br>
                                                                <label for="upload_photo" class="tamil">புகைப்படத்தைப் பதிவேற்றவும்</label>
                                                            </td>
                                                            <td colspan="3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-grow-1" style="max-width:280px;">
                                                                        <div id="photo-input-wrapper" style="{{ !empty($applicant_photo->upload_path) ? 'display: none;' : 'display: block;' }}">
                                                                            <div class="form-s-file-upload-wrap">
                                                                                <input autocomplete="off" class="form-control text-box single-line" id="upload_photo" name="upload_photo" type="file" accept=".jpg,.jpeg,.png">
                                                                            </div>
                                                                            <span class="file-limit d-block mt-1">File type: JPG, PNG (Max 50 KB)</span>
                                                                            <span class="error-message text-danger d-block text-start"></span>
                                                                        </div>
                                                                        @if (!empty($applicant_photo->upload_path))
                                                                            <button type="button" class="btn btn-primary btn-sm mt-2" onclick="togglePhotoInput()">Edit/Upload Photo</button>
                                                                        @endif
                                                                    </div>
                                                                    <div class="ms-3">
                                                                        <img id="preview_applicant" src="{{ !empty($applicant_photo->upload_path) ? url($applicant_photo->upload_path) : '' }}" alt="Photo preview" style="{{ !empty($applicant_photo->upload_path) ? 'display:block;' : 'display:none;' }} width:100px; height:120px; object-fit:cover; border:1px solid #ccc; border-radius:4px;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">(ii)</td>
                                                            <td style="vertical-align: middle;">
                                                                <label for="aadhaar">Aadhaar Number <span style="color: red;">*</span></label>
                                                                <br>
                                                                <label for="aadhaar" class="tamil">ஆதார் எண்</label>
                                                            </td>
                                                            <td style="width:20%;">
                                                                <input type="text" class="form-control text-box" name="aadhaar" id="aadhaar" maxlength="14" style="max-width:260px;" value="{{ !empty($application_details->aadhaar) ? safeDecrypt($application_details->aadhaar) : '' }}">
                                                                <span id="aadhaar-error" class="text-danger"></span>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <label for="aadhaar_doc">(iii) Upload Aadhaar Document <span style="color: red;">*</span></label>
                                                                <br>
                                                                <label for="aadhaar_doc" class="tamil">ஆதார் ஆவணத்தை பதிவேற்றவும் <span style="color: red;">*</span></label>
                                                            </td>
                                                            <td style="width:25%;">
                                                                @if (!empty($application_details->aadhaar_doc))
                                                                    <div class="aadhaar-doc-container mb-2 d-flex align-items-center">
                                                                        <a href="{{ route('document.show', ['type' => 'aadhaar', 'filename' => $application_details->aadhaar_doc]) }}" target="_blank" style="color: #007bff;">
                                                                            <i class="fa fa-file-pdf-o" style="color: red;"></i> View
                                                                        </a>
                                                                        <button type="button" class="btn btn-sm btn-danger ml-3 remove-aadhaar-doc">Remove</button>
                                                                    </div>
                                                                @endif
                                                                <div class="aadhaar-doc-input {{ !empty($application_details->aadhaar_doc) ? 'd-none' : '' }}">
                                                                    <div class="form-s-file-upload-wrap" style="max-width:280px;">
                                                                        <input autocomplete="off" class="form-control text-box single-line" id="aadhaar_doc" name="aadhaar_doc" type="file" accept=".pdf,application/pdf">
                                                                    </div>
                                                                    <span class="file-limit d-block mt-1">File type: PDF (Max 250 KB)</span>
                                                                    <small class="text-danger file-error"></small>
                                                                </div>
                                                                <input type="hidden" name="aadhaar_doc_removed" id="aadhaar_doc_removed" value="0">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">(iii)</td>
                                                            <td style="vertical-align: middle;">
                                                                <label for="pancard">PAN Card Number</label>
                                                                <br>
                                                                <label for="pancard" class="tamil">நிரந்தர கணக்கு எண்</label>
                                                            </td>
                                                            <td style="width:20%;">
                                                                <input type="text" class="form-control text-box text-uppercase" name="pancard" id="pancard" maxlength="10" autocomplete="off" style="max-width:260px;" placeholder="e.g. ABCDE1234F" value="{{ old('pancard', $application_details->pancard ?? '') }}">
                                                                <span id="pancard-error" class="text-danger d-block"></span>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <label for="pancard_doc">(iv) Upload PAN Card Document</label>
                                                                <br>
                                                                <label for="pancard_doc" class="tamil">பான் கார்டு ஆவணத்தைப் பதிவேற்றவும்</label>
                                                            </td>
                                                            <td style="width:25%;">
                                                                @php $existingPanDoc = $application_details->pancard_doc ?? $application_details->pan_doc ?? ''; @endphp
                                                                @if (!empty($existingPanDoc))
                                                                    <div class="pan-doc-container mb-2 d-flex align-items-center">
                                                                        <a href="{{ route('document.show', ['type' => 'pan', 'filename' => $existingPanDoc]) }}" target="_blank" style="color: #007bff;">
                                                                            <i class="fa fa-file-pdf-o" style="color: red;"></i> View
                                                                        </a>
                                                                        <button type="button" class="btn btn-sm btn-danger ml-3 remove-pan-doc">Remove</button>
                                                                    </div>
                                                                @endif
                                                                <div class="pan-doc-input {{ !empty($existingPanDoc) ? 'd-none' : '' }}">
                                                                    <div class="form-s-file-upload-wrap" style="max-width:280px;">
                                                                        <input autocomplete="off" class="form-control text-box single-line" id="pancard_doc" name="pancard_doc" type="file" accept=".pdf,application/pdf">
                                                                    </div>
                                                                    <span class="file-limit d-block mt-1">File type: PDF (Max 250 KB)</span>
                                                                    <small class="text-danger file-error"></small>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">(v)</td>
                                                            <td style="vertical-align: middle;">
                                                                <label for="upload_sign">Upload Signature <span style="color: red;">*</span></label>
                                                                <br>
                                                                <label for="upload_sign" class="tamil">கையொப்பத்தைப் பதிவேற்றவும்</label>
                                                            </td>
                                                            <td colspan="3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-grow-1" style="max-width:280px;">
                                                                        <div id="sign-input-wrapper" style="{{ !empty($proof_doc?->uploaded_doc) ? 'display: none;' : 'display: block;' }}">
                                                                            <div class="form-s-file-upload-wrap">
                                                                                <input autocomplete="off" class="form-control text-box single-line" id="upload_sign" name="upload_sign" type="file" accept=".jpg,.jpeg,.png">
                                                                            </div>
                                                                            <span class="file-limit d-block mt-1">File type: JPG, PNG (Max 50 KB)</span>
                                                                            <span class="error-message text-danger d-block text-start"></span>
                                                                        </div>
                                                                        @if(!empty($proof_doc?->uploaded_doc))
                                                                            <button type="button" class="btn btn-primary btn-sm mt-2" onclick="toggleSignInput()">Edit/Upload Signature</button>
                                                                        @endif
                                                                    </div>
                                                                    <div class="ms-3">
                                                                        <img id="preview_signature" src="{{ !empty($proof_doc?->uploaded_doc) ? asset($proof_doc->uploaded_doc) : '' }}" alt="Signature preview" style="{{ !empty($proof_doc?->uploaded_doc) ? 'display:block;' : 'display:none;' }} width:120px; max-height:60px; object-fit:cover; border:1px solid #ccc; border-radius:4px;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            @else
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
                                                        @else
                                                            <img id="preview_applicant"
                                                                 class="img-fluid border mb-2"
                                                                 style="max-width: 100px; border-radius:4px; display: none;"
                                                                 alt="Applicant Photo">
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
                                                                <button type="button" class="btn btn-sm btn-danger ml-3 remove-aadhaar-doc">Remove</button>
                                                            </div>
                                                        @endif
                                                        <div class="aadhaar-doc-input {{ !empty($application_details->aadhaar_doc) ? 'd-none' : '' }} mt-1">
                                                            <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" style="max-width:280px;">
                                                                <input autocomplete="off"
                                                                       class="form-control text-box single-line"
                                                                       id="aadhaar_doc"
                                                                       name="aadhaar_doc"
                                                                       type="file"
                                                                       accept=".pdf,application/pdf">
                                                            </div>
                                                            <span class="file-limit d-block">File type: PDF (Max 250 KB)</span>
                                                            <small class="text-danger file-error"></small>
                                                        </div>
                                                        <input type="hidden" name="aadhaar_doc_removed" id="aadhaar_doc_removed" value="0">
                                                    </div>
                                                </div>

                                                @if(isset($application_details->form_name) && $application_details->form_name == 'S')
                                                {{-- PAN column --}}
                                                <div class="col-12 col-md-3 mb-3 p-3">
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
                                                        @php
                                                            $existingPanDoc = $application_details->pancard_doc ?? $application_details->pan_doc ?? '';
                                                        @endphp
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
                                                            <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" style="max-width:280px;">
                                                                <input autocomplete="off"
                                                                       class="form-control text-box single-line"
                                                                       id="pancard_doc"
                                                                       name="pancard_doc"
                                                                       type="file"
                                                                       accept=".pdf,application/pdf">
                                                            </div>
                                                            <span class="file-limit d-block">File type: PDF (Max 250 KB)</span>
                                                            <small class="text-danger file-error"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                {{-- Signature column --}}
                                                <div class="col-12 col-md-3 mb-3 p-3">
                                                    <label for="upload_sign">({{ (isset($application_details->form_name) && $application_details->form_name == 'S') ? 'vi' : 'iv' }}) Upload Signature</label>
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
                                                        @else
                                                            <img id="preview_signature"
                                                                 class="img-fluid border mb-2"
                                                                 style="max-width: 120px; max-height: 60px; border:1px solid #ccc; border-radius:4px; display: none;"
                                                                 alt="Uploaded Signature">
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
                                            @endif
                                            <hr>
                                            <div>
                                                <label class="container">
                                                    <div class="declaration-container">
                                                        <input type="checkbox" id="declarationCheckbox" required {{ isset($application) ? 'checked' : '' }}>

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
                                                                I request that I may be granted a Wireman Competency Certificate.<br>
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
                                            <button type="button" class="btn btn-success" id="saveDraftBtn" data-url="{{ route('form.draft_submit') }}">Save As Draft
                                                </button>
                                            <button type="button" class="btn btn-primary"
                                                id="submitPaymentBtn">Save and Proceed for Payment</button>
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
    (function() {
        var uploadPhoto = document.getElementById('upload_photo');
        var previewApplicant = document.getElementById('preview_applicant');
        var photoInputWrapper = document.getElementById('photo-input-wrapper');
        if (uploadPhoto && previewApplicant) {
            uploadPhoto.addEventListener('change', function(event) {
                var file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        previewApplicant.src = e.target.result;
                        previewApplicant.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        window.togglePhotoInput = function() {
            if (photoInputWrapper) {
                photoInputWrapper.style.display = photoInputWrapper.style.display === 'none' ? 'block' : 'none';
            }
        };
    })();
</script>
<script>
    (function() {
        var uploadSign = document.getElementById('upload_sign');
        var previewSignature = document.getElementById('preview_signature');
        var signInputWrapper = document.getElementById('sign-input-wrapper');
        if (uploadSign && previewSignature) {
            uploadSign.addEventListener('change', function(event) {
                var file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        previewSignature.src = e.target.result;
                        previewSignature.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        window.toggleSignInput = function() {
            if (signInputWrapper) {
                signInputWrapper.style.display = signInputWrapper.style.display === 'none' ? 'block' : 'none';
            }
        };
    })();
</script>
<script>
    function clearLocalPreview($fileInput) {
        var $wrap = $fileInput.closest('.form-s-file-upload-wrap');
        var $preview = $wrap.next('.local-file-preview');
        var oldUrl = $preview.data('blobUrl');
        if (oldUrl) URL.revokeObjectURL(oldUrl);
        $preview.remove();
        $fileInput.removeAttr('data-has-local-file');
    }

    $(document).on('change', 'input[type="file"][name^="education_document"], input[type="file"][name^="work_document"]', function() {
        var $input = $(this);
        clearLocalPreview($input);

        var file = this.files && this.files[0] ? this.files[0] : null;
        if (!file) return;

        var allowed = ['application/pdf', 'image/jpeg', 'image/png'];
        var maxSize = 200 * 1024;
        if (allowed.indexOf(file.type) === -1) {
            window.alert('Only PDF, JPG, PNG files are allowed.');
            this.value = '';
            $input.removeAttr('data-has-local-file');
            return;
        }
        if (file.size > maxSize) {
            window.alert('File size should not exceed 200 KB.');
            this.value = '';
            $input.removeAttr('data-has-local-file');
            return;
        }

        $input.attr('data-has-local-file', '1');
        var blobUrl = URL.createObjectURL(file);
        var isImage = file.type.indexOf('image/') === 0;
        var $preview = $('<div class="local-file-preview"></div>').data('blobUrl', blobUrl);
        if (isImage) {
            $preview.append($('<img>', { src: blobUrl, class: 'img-preview', alt: 'Selected image preview' }));
        }
        $preview.append($('<a>', {
            href: blobUrl,
            target: '_blank',
            rel: 'noopener noreferrer',
            class: 'preview-link'
        }).html(isImage ? '<i class="fa fa-image"></i> Preview image' : '<i class="fa fa-file-pdf-o" style="color:#d9534f;"></i> View Document'));
        $input.closest('.form-s-file-upload-wrap').after($preview);
    });

    $(document).on('change', '#aadhaar_doc, #pancard_doc', function() {
        var $input = $(this);
        clearLocalPreview($input);

        var file = this.files && this.files[0] ? this.files[0] : null;
        if (!file) return;

        var minSize = 10 * 1024;
        var maxSize = 250 * 1024;
        if (file.type !== 'application/pdf') {
            window.alert('Only PDF files are allowed.');
            this.value = '';
            return;
        }
        if (file.size < minSize) {
            window.alert('File size must be at least 10 KB.');
            this.value = '';
            return;
        }
        if (file.size > maxSize) {
            window.alert('File size should not exceed 250 KB.');
            this.value = '';
            return;
        }

        var blobUrl = URL.createObjectURL(file);
        var $preview = $('<div class="local-file-preview"></div>').data('blobUrl', blobUrl);
        $preview.append($('<a>', {
            href: blobUrl,
            target: '_blank',
            rel: 'noopener noreferrer',
            class: 'preview-link'
        }).html('<i class="fa fa-file-pdf-o" style="color:#d9534f;"></i> View Document'));
        $input.closest('.form-s-file-upload-wrap').after($preview);
    });

    $(document).on('click', '.remove-aadhaar-doc', function(e) {
        e.preventDefault();
        var $button = $(this);
        Swal.fire({
            title: 'Do you want to remove the document?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            reverseButtons: true
        }).then((result) => {
            if (!result.isConfirmed) return;

            var $scope = $button.closest('td, .col-12, .col-md-3');
            var $docContainer = $scope.find('.aadhaar-doc-container').first();
            var $docInput = $scope.find('.aadhaar-doc-input').first();
            var $fileInput = $scope.find('#aadhaar_doc').first();

            $docContainer.removeClass('d-flex align-items-center justify-content-center').addClass('d-none').hide();
            $docInput.removeClass('d-none').show();
            $scope.find('#aadhaar_doc_removed').val('1');
            clearLocalPreview($fileInput);
        });
    });

    $(document).on('click', '.remove-pan-doc', function(e) {
        e.preventDefault();
        var $button = $(this);
        Swal.fire({
            title: 'Do you want to remove the document?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            reverseButtons: true
        }).then((result) => {
            if (!result.isConfirmed) return;

            var $scope = $button.closest('td, .col-12, .col-md-3');
            var $docContainer = $scope.find('.pan-doc-container').first();
            var $docInput = $scope.find('.pan-doc-input').first();
            var $fileInput = $scope.find('#pancard_doc').first();

            $docContainer.removeClass('d-flex align-items-center justify-content-center').addClass('d-none').hide();
            $docInput.removeClass('d-none').show();
            $fileInput.val('');
            clearLocalPreview($fileInput);
        });
    });

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
        if (!e.target.closest(".add-more-education") && !e.target.closest(".remove-education")) return;
        const refreshEducationSerials = () => {
            $('#education-container .education-fields td:first-child').each(function(index) {
                $(this).text(index + 1);
            });
        };

        if (e.target.closest(".add-more-education")) {
            let container = document.getElementById("education-container");
            if (!container) return;
            let educationRows = container.querySelectorAll(".education-fields");
            const isSForm = "{{ $application_details->form_name ?? '' }}" === 'S';
            const isWHForm = "{{ $application_details->form_name ?? '' }}" === 'WH';
            const isWOrWHForm = "{{ $application_details->form_name ?? '' }}" === 'W' || isWHForm;

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

            // calculate next serial number + stable 0-based index for file upload mapping
            let serialNo = $('#education-container .education-fields').length + 1;
            let eduIdx = $('#education-container .education-fields').length;

            let newRow = `
            <tr class="education-fields text-center" data-edu-index="${eduIdx}">
                <td class="edu-serial text-center">${serialNo}</td>
                <td> 
                    <select class="form-control" name="educational_level[]" required>
                        <option value="">Select Education</option>
                        ${isSForm
                            ? '<option value="DEE">Diploma(Electrical Engineering)</option><option value="BEE">B.E(Electrical Engineering)</option><option value="MEE">M.E(Electrical Engineering)</option>'
                            : (isWOrWHForm
                                ? '<option value="Up to 8th Standard">Up to 8th Standard</option><option value="Wireman Helper(H) Certificate">Wireman Helper(H) Certificate</option><option value="ITI Certificate">ITI Certificate</option>'
                                : '<option value="PG">PG</option><option value="UG">UG</option><option value="B.E">B.E</option><option value="M.E">M.E</option>' + (isWHForm ? '<option value="8">8</option>' : ''))}
                    </select>
                </td>
                <td><input type="text" class="form-control" name="institute_name[]" required value="${isWHForm ? 'Dept of Employment & Training' : ''}"></td>
                <td>
                    <select name="month_of_passing[]" class="form-control" required>
                        <option value="">Select Month</option>
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
                    <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" data-upload-kind="education">
                        <input type="file" class="form-control education-file" name="education_document[${eduIdx}]" accept="${isSForm ? '.pdf,application/pdf' : '.pdf,application/pdf,image/jpeg,image/png'}" required>
                    </div>
                </td>
                <td class="form-s-actions-cell text-center p-1">
                    <div class="form-s-actions-stack">
                        <button type="button" class="btn btn-danger btn-sm remove-education py-1 px-2" title="Remove row">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </div>
                    <input type="hidden" name="edu_id[]" value="">
                    <input type="hidden" name="existing_document[]" value="">
                    <input type="hidden" class="removed-document-edu" name="removed_document[]" value="0">
                </td>
            </tr> `;
            $('#education-container').append(newRow);
            refreshEducationSerials();

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
            refreshEducationSerials();
        }
    });

    // Handle removing existing/newly uploaded education documents (toggle view <-> input)
    $(document).on('click', '.remove-doc_edu_confirm', function(e) {
        e.preventDefault();
        var $button = $(this);
        Swal.fire({
            title: 'Do you want to remove the document?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            reverseButtons: true
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            var $row = $button.closest('tr');
            var $docContainer = $row.find('.edu-doc-container');
            var $docInput = $row.find('.edu-doc-input');

            $docContainer.removeClass('d-flex align-items-center').addClass('d-none').hide();
            $docInput.removeClass('d-none').show();
            $row.find('input[name="existing_document[]"]').first().val('');
            $row.find('input[name="removed_document[]"]').first().val('1');
            clearLocalPreview($docInput.find('input[type="file"]').first());
        });
    });

    // Remove education row
    // $(document).on('click', '.remove-education', function() {
    //     $(this).closest('tr').remove();
    // });

    (function() {
        var isSForm = "{{ $application_details->form_name ?? '' }}" === 'S';
        function refreshWorkSerials() {
            $('#work-container .work-fields .work-serial').each(function(index) {
                $(this).text(index + 1);
            });
            $('#work-container .work-fields.text-center td:first-child').each(function(index) {
                if (!$(this).hasClass('work-serial')) {
                    $(this).text(index + 1);
                }
            });
        }

        if (!isSForm) {
            $(document).on('click', function(e) {
                if (!e.target.closest(".add-more-work") && !e.target.closest(".remove-work")) return;

                if (e.target.closest(".add-more-work")) {
                    let container = document.getElementById("work-container");
                    if (!container) return;
                    let workRows = container.querySelectorAll(".work-fields");
                    if (workRows.length >= 3) {
                        $('#work-table').next('.work-error').remove();
                        $('<div class="text-danger mt-2 work-error">You can add a maximum of 3 work experience entries.</div>').insertAfter('#work-table');
                        setTimeout(() => { $('.work-error').fadeOut(); }, 7000);
                        return;
                    }

                    let serialNo = $('#work-container .work-fields').length + 1;
                    let newRow = `
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
                        </tr>
                    `;
                    $('#work-container').append(newRow);
                    refreshWorkSerials();
                }

                if (e.target.closest(".remove-work")) {
                    e.target.closest("tr").remove();
                    refreshWorkSerials();
                }
            });
            $(document).ready(function() {
                refreshWorkSerials();
            });
            return;
        }

        var EMP_LABELS = {
            '': '—',
            company: 'Company name <span class="text-danger">*</span>',
            contractor: 'Contractor / firm name <span class="text-danger">*</span>',
            apprentice: 'Establishment / training organization <span class="text-danger">*</span>',
            electrical_inspector: 'Office / department <span class="text-danger">*</span>',
            retired_employees: 'Name of PSU (State / Central / Corporation) <span class="text-danger">*</span>'
        };

        function $workRow(el) {
            return $(el).closest('tr.work-fields');
        }

        function syncLegacyHidden($tr) {
            var emp = ($tr.find('.work-employer-input').val() || '').trim();
            var tot = ($tr.find('.work-experience-total-hidden').val() || '').trim();
            $tr.find('.work-level-sync').val(emp);
            $tr.find('.experience-sync').val(tot);
        }

        function updateTotalYears($tr) {
            var fromStr = ($tr.find('.work-date-from').val() || '').trim();
            var toStr = ($tr.find('.work-date-to').val() || '').trim();
            var display = '';
            var hidden = '';
            if (!fromStr || !toStr) {
                $tr.find('.work-year-total-display').val('');
                $tr.find('.work-experience-total-hidden').val('');
                syncLegacyHidden($tr);
                return;
            }
            var from = new Date(fromStr + 'T12:00:00');
            var to = new Date(toStr + 'T12:00:00');
            if (isNaN(from.getTime()) || isNaN(to.getTime())) {
                $tr.find('.work-year-total-display').val('');
                $tr.find('.work-experience-total-hidden').val('');
                syncLegacyHidden($tr);
                return;
            }
            if (to < from) {
                display = 'Invalid range';
                hidden = '';
            } else {
                var msPerDay = 86400000;
                var years = (to - from) / msPerDay / 365.25;
                var rounded = Math.round(years * 10) / 10;
                hidden = rounded.toFixed(1);
                display = rounded.toFixed(1);
            }
            $tr.find('.work-year-total-display').val(display);
            $tr.find('.work-experience-total-hidden').val(hidden);
            syncLegacyHidden($tr);
        }

        function applyEmploymentType($tr) {
            var t = $tr.find('.work-employment-type').val() || '';
            var $label = $tr.find('.work-employer-label');
            $label.html(EMP_LABELS[t] || EMP_LABELS['']);

            var $emp = $tr.find('.work-employer-input');
            var $yFrom = $tr.find('.work-date-from');
            var $yTo = $tr.find('.work-date-to');
            var $blockInt = $tr.find('.work-block--intimation');
            var $intDate = $tr.find('.work-intimation-date');

            if (!t) {
                $emp.prop('disabled', true).prop('required', false);
                $yFrom.prop('disabled', true).prop('required', false);
                $yTo.prop('disabled', true).prop('required', false);
                $blockInt.hide();
                // Keep the intimation input enabled (just hidden/cleared) so its POST array
                // index stays aligned with the other work_* arrays. Disabled inputs are not
                // submitted, which causes off-by-one row mismatches on save.
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

        function initWorkRow($tr) {
            if (($tr.find('.work-employment-type').val() || '') === '') {
                $tr.find('.work-employment-type').val('company');
            }
            applyEmploymentType($tr);
            syncLegacyHidden($tr);
        }

        $(document).ready(function() {
            $('#work-container .work-fields').each(function() {
                initWorkRow($(this));
            });
            refreshWorkSerials();
        });

        $(document).on('change', '.work-employment-type', function() {
            applyEmploymentType($workRow(this));
        });

        $(document).on('change', '.work-date-from, .work-date-to', function() {
            updateTotalYears($workRow(this));
        });

        $(document).on('input change', '.work-employer-input, .work-intimation-date', function() {
            syncLegacyHidden($workRow(this));
        });

        $(document).on('click', '.remove-work-doc-confirm', function(e) {
            e.preventDefault();
            var $button = $(this);
            Swal.fire({
                title: 'Do you want to remove the document?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                reverseButtons: true
            }).then((result) => {
                if (!result.isConfirmed) {
                    return;
                }

                var $row = $button.closest('tr');
                var $docContainer = $row.find('.work-doc-container');
                var $docInput = $row.find('.work-doc-input');

                $docContainer.removeClass('d-flex align-items-center justify-content-center').addClass('d-none').hide();
                $docInput.removeClass('d-none').show();
                $row.find('input[name="existing_work_document[]"]').val('');
                $row.find('input[name="removed_document_work[]"]').val('1');
                clearLocalPreview($docInput.find('input[type="file"]').first());
            });
        });

        document.addEventListener('click', function(e) {
            var container = document.getElementById('work-container');
            if (!container) return;
            var workRows = container.querySelectorAll('.work-fields');

            if (e.target.closest('.add-more-work')) {
                if (workRows.length >= 3) {
                    $('#work-table').next('.work-error').remove();
                    $('<div class="text-danger mt-2 work-error">You can add a maximum of 3 work experience entries.</div>').insertAfter('#work-table');
                    setTimeout(function() { $('.work-error').fadeOut(); }, 7000);
                    return;
                }

                var first = container.querySelector('.work-fields');
                var newRow = first.cloneNode(true);
                newRow.querySelectorAll('input[type="file"]').forEach(function(el) { el.value = ''; });
                newRow.querySelectorAll('.work-date-from, .work-date-to').forEach(function(inp) { inp.value = ''; });
                var typeSel = newRow.querySelector('.work-employment-type');
                if (typeSel) typeSel.value = '';
                var wtd = newRow.querySelector('.work-year-total-display');
                if (wtd) wtd.value = '';
                var hTot = newRow.querySelector('.work-experience-total-hidden');
                if (hTot) hTot.value = '';
                var hLevel = newRow.querySelector('.work-level-sync');
                if (hLevel) hLevel.value = '';
                var hEx = newRow.querySelector('.experience-sync');
                if (hEx) hEx.value = '';
                var empIn = newRow.querySelector('.work-employer-input');
                if (empIn) empIn.value = '';
                var intIn = newRow.querySelector('.work-intimation-date');
                if (intIn) intIn.value = '';
                var desIn = newRow.querySelector('input[name="designation[]"]');
                if (desIn) desIn.value = '';
                var workId = newRow.querySelector('input[name="work_id[]"]');
                if (workId) workId.value = '';
                var existingDoc = newRow.querySelector('input[name="existing_work_document[]"]');
                if (existingDoc) existingDoc.value = '';
                var removedDoc = newRow.querySelector('input[name="removed_document_work[]"]');
                if (removedDoc) removedDoc.value = '0';
                var docContainer = newRow.querySelector('.work-doc-container');
                if (docContainer) {
                    docContainer.classList.add('d-none');
                    docContainer.innerHTML = '';
                }
                var docInput = newRow.querySelector('.work-doc-input');
                if (docInput) docInput.classList.remove('d-none');

                container.appendChild(newRow);
                initWorkRow($(newRow));
                refreshWorkSerials();
                return;
            }

            if (e.target.closest('.remove-work')) {
                if (workRows.length <= 1) {
                    $('#work-table').next('.work-error').remove();
                    $('<div class="text-danger mt-2 work-error">You must have at least one work experience entry.</div>').insertAfter('#work-table');
                    setTimeout(function() { $('.work-error').fadeOut(); }, 7000);
                    return;
                }
                e.target.closest('tr').remove();
                refreshWorkSerials();
            }
        });
    })();

    // Remove work row
    // $(document).on('click', '.remove-work', function() {
    //     $(this).closest('tr').remove();
    // });

    
</script>
</body>

</html>
