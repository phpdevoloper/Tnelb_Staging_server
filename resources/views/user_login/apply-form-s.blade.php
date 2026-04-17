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

    /* Ensure Font Awesome icons show inside buttons (e.g. add/remove education/work, table upload) */
    .comp_certificate .btn .fa,
    .comp_certificate .btn i.fa,
    .comp_certificate .form-s-file-upload-btn .fa,
    .comp_certificate .form-s-file-upload-btn i.fa {
        font-family: 'FontAwesome';
        display: inline-block;
    }

    /* Form S — work experience: compact table, readable dates, small total field */
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
    #work-table .work-exp-col-years {
        width: 32%;
        min-width: 17rem;
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
    /* Tables (sections 5 & 6): file input + Upload combined as one control (input-group style) */
    #education-table .form-s-file-upload-wrap--combined,
    #work-table .form-s-file-upload-wrap--combined {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-items: stretch;
        align-self: flex-start;
        gap: 0;
        width: 100%;
        min-width: 12rem;
        max-width: 20rem;
        border: 1px solid #ced4da;
        border-radius: 4px;
        overflow: hidden;
        background: #fff;
    }
    #education-table .form-s-file-upload-wrap--combined .form-control,
    #work-table .form-s-file-upload-wrap--combined .form-control,
    #education-table .form-s-file-upload-wrap--combined input[type="file"],
    #work-table .form-s-file-upload-wrap--combined input[type="file"] {
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
    #education-table td.form-s-actions-cell,
    #work-table td.work-exp-col-actions {
        vertical-align: middle;
        width: 3rem;
    }
    #education-table .form-s-actions-stack,
    #work-table .form-s-actions-stack {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        gap: 0.35rem;
    }
    .local-file-preview {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        margin-top: 0.35rem;
    }
    .local-file-preview .preview-link {
        color: #0056b3 !important;
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
    #education-table thead th:last-child,
    #work-table thead th.work-exp-col-actions {
        vertical-align: middle;
        text-align: center;
    }
    #education-table thead th {
        font-size: 0.72rem;
        font-weight: 600;
        padding: 0.3rem 0.35rem;
        vertical-align: middle;
        line-height: 1.2;
        text-align: center;
    }
    #education-table thead tr:nth-child(2) th {
        font-size: 0.7rem;
        padding: 0.25rem 0.3rem;
    }
    #education-table thead th .file-limit {
        font-size: 0.66rem;
    }
    #education-table tbody td {
        text-align: center;
        vertical-align: middle;
    }
    #education-table tbody .form-control,
    #education-table tbody select,
    #education-table tbody input {
        font-size: 0.86rem;
        line-height: 1.25;
    }
    #education-table tbody select option {
        font-size: 0.86rem;
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
        flex: 1 1 9.5rem;
        min-width: 9.5rem;
        max-width: 11rem;
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
    #work-table .work-exp-inline--head .work-exp-label-fromto {
        margin-bottom: 0;
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
    #work-table .work-date-from,
    #work-table .work-date-to {
        font-size: 0.8125rem;
        color: #212529;
        min-width: 9.5rem;
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
</style>

<section class="">
    <div class="container">
        <ul id="breadcrumb">
            <li><a href="{{ route('dashboard')}}"><span class="fa fa-home"> </span> Dashboard</a></li>
            <li><a href="#"><span class=" fa fa-info-circle"> </span> Form S</a></li>

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
                            <div class="row">

                                <div class="col-lg-12 col-12">

                                    <div class="text-center text-white text-uppercase font-weight-bold">
                                        {{-- <h5 class="card-title_apply text-black mb-1">GOVERNMENT OF TAMILNADU</h5>
                                        <h5 class="card-title_apply text-black mb-1">THE ELECTRICAL LICENSING BOARD</h5> --}}
                                        <h5 class="card-title_apply text-white text-uppercase font-weight-bold" >
                                            Application for Supervisor Competency Certificate
                                        </h5>
                                        <h5 class="card-title_apply text-white text-uppercase mt-2" >
                                            மேற்பார்வையாளர் தகுதி சான்றிதழ் பெறுவதற்கான விண்ணப்பம்
                                        </h5>
                                        <h6 class="card-title_apply text-white mt-2 form-title">FORM - S / Certificate C</h4>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-12 text-md-right">
                                    <a href="{{url('assets/pdf/form_s_notes.pdf')}}" class="text-white" target="_blank"><span class="text-white" target="_blank"><i class="fa fa-file-pdf-o" style="color: red;"></i>  Instructions Download (8 KB)<br>
                                       </span> English</a>
                                </div> -->
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-12 text-right">
                                    <span class="text-white font-weight-bold" target="_blank"> Instructions 
                                       </span> <a href="{{url('assets/pdf/form_s_notes.pdf')}}" class="text-white" target="_blank">English <i class="fa fa-file-pdf-o" ></i>  (8 KB)</a>
                                </div>

                            </div>

                            

                        </div>

                             <div class="row">
                                <div class="col-lg-12 col-12 text-right text-head pl-5 mt-1" >
                                  <p class="pr-3 f-s-14"> <span class="text-red font-weight-bold">*</span> Fields are Mandatory </p>
                                </div>

                            </div>


                        <div class="apply-card-body">

                            <form id="competency_form_ws" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-md-6 ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-5">
                                                            <label for="Name">1. Applicant's Name <span style="color: red;">*</span></label>
                                                            <br>
                                                            <label for="tamil" class="tamil">விண்ணப்பதாரர் பெயர்</label>
                                                        </div>
                                                        <div class="col-12 col-md-7">
                                                            @php
                                                            // var_dump($user['salutation']);die;
                                                            @endphp
                                                            <input autocomplete="off" class="form-control text-box single-line" id="Applicant_Name" name="applicant_name" type="text" value="{{ $user['salutation'].' '.$user['applicant_name'] }}" readonly>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-4">
                                                            <label for="Name">2. Father's Name <span style="color: red;">*</span></label>
                                                            <br>
                                                            <label for="tamil" class="tamil">தகப்பனார் பெயர்</label>
                                                        </div>

                                                        <div class="col-12 col-md-8">
                                                            <input autocomplete="off" class="form-control text-box single-line" id="Fathers_Name" name="fathers_name"
                                                                type="text" value="{{ isset($application) ? $application->fathers_name : '' }}" maxlength="80">
                                                            {{-- <div id="Fathers_Name_count" class="text-muted mt-1" style="font-size: 0.9rem;color:red!important;">0/50</div> --}}

                                                            <span class="error-message text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-12 col-md-6 ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-5 ">
                                                            <label for="Name">3. Applicant Address <span style="color: red;">*</span><br><span class="text-label">(To be clear)</span>
                                                            </label>
                                                            <br>
                                                            <label for="tamil" class="tamil">விண்ணப்பதாரர் முகவரி
                                                                <span class="text-label">(தெளிவாக இருத்தல் வேண்டும்)</span></label>
                                                        </div>
                                                        <div class="col-12 col-md-7">
                                                            <!-- <input autocomplete="off" class="form-control text-box single-line" id="Applicant_Name" name="Applicant_Name" type="text" value=""> -->
                                                            <textarea rows="3" class="form-control " id="applicants_address" name="applicants_address" maxlength="255">{{Auth::user()->address}}</textarea>
                                                            <span id="applicants_address_error" class="text-danger error"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 ">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-7">
                                                            <div class="row align-items-center">
                                                                <div class="col-12 col-md-7">
                                                                    <label for="Name">4. (i) D.O.B <span style="color: red;">*</span></label><br>
                                                                    <label for="tamil" class="tamil">பிறந்த நாள், மாதம், வருடம்</label>
                                                                </div>
                                                                <div class="col-12 col-md-5">
                                                                    <input autocomplete="off" class="form-control text-box single-line" id="d_o_b" name="d_o_b" type="text" placeholder="DD/MM/YYYY" value="{{ isset($application) ? $application->d_o_b : '' }}">
                                                                    <!-- <span id="dobError" class="text-danger d-block mt-1" style="display: none;">Age must be 50 years or below.</span> -->
                                                                    <span id="dob-error" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-5">
                                                            <div class="row align-items-center">
                                                                <div class="col-12 col-md-5">
                                                                    <label for="Name">4. (ii) Age</label><br>
                                                                    <label for="tamil" class="tamil"> வயது</label>
                                                                </div>
                                                                <div class="col-12 col-md-7">
                                                                    <input autocomplete="off" class="form-control text-box single-line" id="age" name="age" type="number" value="{{ isset($application) ? $application->age : '' }}" placeholder="" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <hr>
                                            <div class="row align-items-center head_label">
                                                <div class="col-12 col-md-12 ">
                                                    <label> 5. Applicant's Educational / Technical Qualification and pass details <span style="color: red;">*</span> <span class="text-label"> (Upload the documents) </span></label>
                                                    <br>
                                                    <label for="tamil" class="tamil">விண்ணப்பதாரரின் தொழில்நுட்ப
                                                        தேர்ச்சி மற்றும் தேர்ச்சி பற்றிய விவரங்கள் <span class="text-label">(ஆவணங்களை பதிவேற்ற வேண்டும்)</span></label>
                                                </div>

                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="education-table">
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
                                                                    <button type="button" class="btn btn-primary btn-sm add-more py-1 px-2" title="Add row">
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
                                                        <tr class="education-fields">
                                                            <td class="edu-serial text-center">1</td>
                                                            <td> <select class="form-control" name="educational_level[]">
                                                                    <option selected disabled>Select Education</option>
                                                                    <option value="DEE">Diploma(Electrical Engineering)</option>
                                                                    <option value="BEE">B.E(Electrical Engineering)</option>
                                                                    <option value="MEE">M.E(Electrical Engineering)</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control" name="institute_name[]" maxlength="80"></td>
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
                                                            {{-- <td>
                                                                <input type="number" class="form-control percentage-input" name="percentage[]" maxlength="20" required>
                                                                <span class="error text-danger percentage-error"></span>
                                                            </td> --}}
                                                            <td>
                                                                <input type="text"
                                                                    class="form-control certificate-input"
                                                                    name="certificate_no[]"
                                                                    maxlength="20"
                                                                    required>
                                                                <span class="error text-danger certificate-error"></span>
                                                            </td>
                                                            <td>
                                                                <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined">
                                                                    <input type="file" class="form-control" name="education_document[]" accept=".pdf,application/pdf">
                                                                </div>
                                                            </td>
                                                            <td class="form-s-actions-cell text-center p-1">
                                                                <div class="form-s-actions-stack">
                                                                    <button type="button" class="btn btn-danger btn-sm remove-education py-1 px-2" title="Remove row">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row align-items-center head_label">
                                            <div class="col-12 col-md-12 ">
                                                <label>6. Details of Previous and Current Work experiences <span style="color: red;">*</span> <span class="text-label">(Upload the documents)</span></label>
                                                <br>
                                                <label for="tamil" class="tamil">பெற்றுள்ள
                                                    முந்தைய மற்றும் தற்போதைய அனுபவங்களின் விவரங்கள் <span style="color: red;">*</span>
                                                    <span class="text-label">(ஆவணங்களை பதிவேற்ற வேண்டும்)</span></label>
                                            </div>

                                        </div>

                                        <div class="table-responsive">
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
                                                            <br><span class="file-limit text-success small">File type: PDF(Min 5 KB To Max 200 KB)</span>
                                                        </th>
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
                                                                <input type="date" class="form-control form-control-sm work-intimation-date" name="work_intimation_date[]" disabled>
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
                                                            <div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" data-upload-kind="work">
                                                                <input class="form-control form-control-sm p-1" name="work_document[]" type="file" accept=".pdf,application/pdf,.jpg,.jpeg,.png,image/jpeg,image/png">
                                                            </div>
                                                        </td>
                                                        <td class="work-exp-col-actions text-center p-1">
                                                            <div class="form-s-actions-stack">
                                                                <button type="button" class="btn btn-danger btn-sm remove-work py-1 px-2" title="Remove row">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="row align-items-center">
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
                                                            <input class="form-check-input toggle-details" type="radio" name="previous_license" id="previous_license_yes" data-target="#previously_details" value="yes">
                                                            <label class="form-check-label" for="yesOption">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input toggle-details" type="radio" name="previous_license" id="previous_license_no" data-target="#previously_details" value="no" checked>
                                                            <label class="form-check-label" for="noOption">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="previously_details" style="display: none;">
                                                    <div class="col-12 col-md-2 text-md-right">
                                                        <label> Certificate No<span style="color: red;">*</span></label>

                                                    </div>
                                                    <div class="col-12 col-md-2">
                                                        <input autocomplete="off" class="form-control text-box single-line verify-input" id="previously_number" name="previously_number" type="text" data-type="license" data-error="#licenseError" data-msg="#license_messagdfde" placeholder="License Number" value="" maxlength="80">
                                                        <input type="hidden" id="l_verify" name="l_verify" value="0">
                                                        <span id="licenseError" class="text-danger"></span>
                                                        <span id="verify_result"></span>
                                                        <span id="license_messagdfde" class="mt-1"></span>
                                                    </div>
                                                    <div class="col-12 col-md-1 text-md-right">
                                                        <label> Date <span style="color: red;">*</span></label>

                                                    </div>
                                                    <div class="col-12 col-md-7 d-flex">
                                                        <div class="row">
                                                            <div class="col-12 col-md-7">
                                                                <input autocomplete="off" class="form-control text-box single-line verify-date" id="previously_date" name="previously_date" type="date" data-error="#dateError" value="">
                                                                <span id="dateError" class="text-danger"></span>
                                                            </div>
                                                            <div class="col-12 col-md-1 d-flex">
                                                                <button type="button" class="btn btn-primary verify-btn" data-type="license" data-url="{{ route('verifylicense') }}" style="margin-left: 10px;"> Verify
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-12 ">
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-md-9 ">
                                                        <label for="Name">8. Do you possess Wireman Competency Certificate issued by this Board? If so furnish the details and surrender the same.
                                                        </label>
                                                        <br>
                                                        <label for="tamil" class="tamil">இந்த வாரியம் வழங்கிய கம்பி இணைப்பாளர் திறன் சான்றிதழ் / மேற்பார்வையாளர் திறன் சான்றிதழ் உங்களிடம் உள்ளதா? இருந்தால், அதன் விவரங்களை வழங்கி, அதனை ஒப்படைக்கவும்.
                                                        </label>
                                                    </div>

                                                    <!-- <div class="col-md-1">
                                                        <input name="previous_exp" type="radio" value="1">
                                                        <label for="Yes">Yes</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input name="previous_exp" type="radio" value="0">
                                                        <label for="No">No</label>
                                                    </div> -->

                                                    @php
                                                        $oldCertNo = (string) request('old_cert_no', '');
                                                        $oldCertNo = trim($oldCertNo);
                                                        $oldExpiryRaw = (string) request('old_expiry_date', '');
                                                        $oldExpiryRaw = trim($oldExpiryRaw);
                                                        $oldExpiry = $oldExpiryRaw !== ''
                                                            ? \Carbon\Carbon::parse($oldExpiryRaw)->format('Y-m-d')
                                                            : '';
                                                        $hasOldPrefill = $oldCertNo !== '';
                                                    @endphp
                                                    <div class="col-md-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input toggle-details" type="radio" name="previous_certificate" id="yesOption" data-target="#wireman_details" value="yes" {{ $hasOldPrefill ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="yesOption">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input toggle-details" type="radio" name="previous_certificate" id="noOption" data-target="#wireman_details" value="no" {{ $hasOldPrefill ? '' : 'checked' }}>
                                                            <label class="form-check-label" for="noOption">No</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row mt-3" id="wireman_details" style="display: {{ $hasOldPrefill ? 'flex' : 'none' }};">
                                                    <div class="col-12 col-md-4 text-md-right">
                                                        <label>Certificate No <span style="color: red;">*</span></label>

                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <input class="form-control text-box single-line verify-input" id="certificate_no" name="competency_certificate_no" type="text" data-type="supervisor" data-error="#certError" data-msg="#license_message" placeholder="Certificate No" maxlength="80" value="{{ $oldCertNo }}">
                                                        <input type="hidden" id="cert_verify" name="cert_verify" value="0">
                                                        <span id="licenseError" class="text-danger"></span>
                                                        <span id="license_message" class="mt-1"></span>
                                                        <span id="certError" class="text-danger"></span>
                                                    </div>
                                                    <div class="col-12 col-md-1 text-md-right">
                                                        <label>Date <span style="color: red;">*</span></label>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <input class="form-control text-box single-line verify-date" id="certificate_date" name="certificate_date" data-error="#certDateError" type="date" value="{{ $oldExpiry }}">
                                                        <span id="certDateError" class="text-danger"></span>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-primary verify-btn" data-type="certificate" data-url="{{ route('verifylicense') }}" style="margin-left: 10px;">Verify</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row align-items-center head_label mt-2">
                                            <div class="col-12 col-md-12">
                                                <label>9. Upload Documents <span style="color: red;">*</span></label>
                                                <br>
                                                <label for="tamil" class="tamil">ஆவணங்களைப் பதிவேற்றவும்
                                                </label>
                                            </div>
                                        </div>

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
                                                                    <div class="form-s-file-upload-wrap">
                                                                        <input autocomplete="off" class="form-control text-box single-line" id="upload_photo" name="upload_photo" type="file" accept=".jpg,.jpeg,.png">
                                                                    </div>
                                                                    <span class="file-limit d-block mt-1">File type: JPG, PNG (Max 50 KB)</span>
                                                                </div>
                                                                <div class="ms-3">
                                                                    <img id="photo_preview" src="" alt="Photo preview" style="display:none; width:100px; height:120px; object-fit:cover; border:1px solid #ccc; border-radius:4px;">
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
                                                            <input type="text" class="form-control text-box" name="aadhaar" id="aadhaar" maxlength="14" style="max-width:260px;">
                                                            <span id="aadhaar-error" class="text-danger"></span>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <label for="aadhaar_doc">(iii) Upload Aadhaar Document <span style="color: red;">*</span></label>
                                                            <br>
                                                            <label for="aadhaar_doc" class="tamil">ஆதார் ஆவணத்தை பதிவேற்றவும் <span style="color: red;">*</span></label>
                                                        </td>
                                                        <td style="width:25%;">
                                                            <div class="form-s-file-upload-wrap" style="max-width:280px;">
                                                                <input autocomplete="off" class="form-control text-box single-line" id="aadhaar_doc" name="aadhaar_doc" type="file" accept=".pdf,application/pdf">
                                                            </div>
                                                            <span class="file-limit d-block mt-1">File type: PDF (Max 250 KB)</span>
                                                            <small class="text-danger file-error"></small>
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
                                                            <input type="text" class="form-control text-box text-uppercase" name="pancard" id="pancard" maxlength="10" autocomplete="off" style="max-width:260px;" placeholder="e.g. ABCDE1234F">
                                                            <span id="pancard-error" class="text-danger d-block"></span>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <label for="pancard_doc">(iv) Upload PAN Card Document</label>
                                                            <br>
                                                            <label for="pancard_doc" class="tamil">பான் கார்டு ஆவணத்தைப் பதிவேற்றவும்</label>
                                                        </td>
                                                        <td style="width:25%;">
                                                            <div class="form-s-file-upload-wrap" style="max-width:280px;">
                                                                <input autocomplete="off" class="form-control text-box single-line" id="pancard_doc" name="pancard_doc" type="file" accept=".pdf,application/pdf">
                                                            </div>
                                                            <span class="file-limit d-block mt-1">File type: PDF (Max 250 KB)</span>
                                                            <small class="text-danger file-error"></small>
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
                                                            <div class="form-s-file-upload-wrap" style="max-width:280px;">
                                                                <input autocomplete="off" class="form-control text-box single-line" id="upload_sign" name="upload_sign" type="file" accept=".jpg,.jpeg,.png" required>
                                                            </div>
                                                            <span class="file-limit d-block mt-1">File type: JPG, PNG (Max 50 KB)</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <label class="container">
                                                <div class="declaration-container">
                                                    <input type="checkbox" id="declarationCheckbox" required {{ isset($application) ? 'checked' : '' }}>

                                                    <span class="checkmark"></span>
                                                    <div>
                                                        I hereby declare that the particulars stated above are correct and true to the best of my knowledge. <br> I request that I may be granted a Supervisor Competency Certificate.<span style="color: red;">*</span><br>
                                                        <span class="tamil">என் அறிவுக்கு எட்டியவரை மேலே குறிப்பிட்டுள்ள விவரங்கள் யாவும் சரியானவை எனவும் உண்மையானவை எனவும் உறுதி கூறுகிறேன். <br> எனக்கு மேற்பார்வையாளர் திறன் சான்றிதழ் வழங்குமாறு கேட்டுக்கொள்கிறேன்.</span>
                                                    </div>

                                                </div>
                                                <span id="checkboxError" class="text-danger" style="display: none;">Please check the declaration box before proceeding.</span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control text-box single-line" id="login_id_store" name="login_id" type="text" value="{{ $user['user_id'] }}">
                                    <input type="hidden" id="application_id" name="application_id" value="{{ $application->id ?? '' }}">
                                    <input type="hidden" id="form_name" name="form_name" value="S">
                                    <input type="hidden" id="license_name" name="license_name" value="C">
                                    <input type="hidden" id="form_id" name="form_id" value="1">
                                    <input type="hidden" id="appl_type" name="appl_type" value="N">
                                    <input type="hidden" id="form_action" name="form_action" value="draft">
                                    @csrf

                                </div>

                                <div class="row mt-5">
                                    <div class="offset-md-5 col-12 col-md-6">
                                        <div class="form-group">
                                            @if(! isset($application))
                                            <button type="button" class="btn btn-primary btn-social" id="saveDraftBtn" data-url="{{ route('form.draft_submit') }}" data-id="{{ $application_details->application_id ?? '' }}">
                                                Save As Draft
                                            </button>
                                            @endif
                                            <button type="submit" class="btn btn-success btn-social" id="submitPaymentBtn">
                                                Save and Proceed for Payment
                                            </button>
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

<div id="draftModal" class="overlay-bg" style="display: none;">
    <div class="otp-modal">
        <h5>Your Application Details Saved Successfully</h5>
        <br>
        <button onclick="closeDraftModal()">OK</button>
    </div>
</div>

</div>

<footer class="main-footer">
    @include('include.footer')

    <!-- JavaScript -->
    <script>
        $(document).on('click', '.form-s-file-upload-btn:not(.form-s-file-upload-btn--table)', function(e) {
            e.preventDefault();
            var $file = $(this).closest('.form-s-file-upload-wrap').find('input[type="file"]').first();
            if ($file.length) {
                $file.trigger('click');
            }
        });

        function clearLocalPreview($fileInput) {
            var $wrap = $fileInput.closest('.form-s-file-upload-wrap');
            var $preview = $wrap.next('.local-file-preview');
            var oldUrl = $preview.data('blobUrl');
            if (oldUrl) URL.revokeObjectURL(oldUrl);
            $preview.remove();
            $fileInput.removeAttr('data-has-local-file');
        }

        $(document).on('change', 'input[type="file"][name="education_document[]"], input[type="file"][name="work_document[]"]', function() {
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
            // $preview.append($('<span class="small text-muted">Temporary preview (not uploaded yet)</span>'));
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

        document.addEventListener("click", function(e) {
            let container = document.getElementById("education-container");
            let educationRows = container.querySelectorAll(".education-fields");
            const refreshEducationSerials = () => {
                container.querySelectorAll('.education-fields .edu-serial').forEach((cell, idx) => {
                    cell.textContent = String(idx + 1);
                });
            };

            // ✅ Prevent adding more than 5 entries
            if (e.target.closest(".add-more")) {
                if (educationRows.length >= 5) {
                   $('#education-table').next('.education-error').remove();

                    $('<div class="text-danger mt-2 education-error">You can add a maximum of 5 education entries.</div>')
                    .insertAfter('#education-table');

                    setTimeout(() => {
                        $('.education-error').fadeOut();
                    }, 7000);
                    return;
                }

                let newRow = document.createElement("tr");
                newRow.classList.add("education-fields");
                newRow.innerHTML = `
<td class="edu-serial text-center">${educationRows.length + 1}</td>
<td><select class="form-control" name="educational_level[]" required>
                        <option selected disabled>Select Education</option>
                        <option value="DEE">Diploma(Electrical Engineering)</option>
                        <option value="BEE">B.E(Electrical Engineering)</option>
                        <option value="MEE">M.E(Electrical Engineering)</option>
                </select></td>
                <td><input type="text" class="form-control" name="institute_name[]" maxlength="80" required></td>
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
                        <option value="0">Select Year</option>
                        ${[...Array(new Date().getFullYear() - 1979).keys()]
                            .map(i => `<option value="${new Date().getFullYear() - i}">${new Date().getFullYear() - i}</option>`)
                            .join('')}
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control certificate-input" name="certificate_no[]" maxlength="20" required>
                    <span class="error text-danger certificate-error"></span>
                </td>
                <td><div class="form-s-file-upload-wrap form-s-file-upload-wrap--combined" data-upload-kind="education"><input type="file" class="form-control" name="education_document[]" accept=".pdf,application/pdf,.jpg,.jpeg,.png,image/jpeg,image/png"></div></td>
                <td class="form-s-actions-cell text-center p-1">
                    <div class="form-s-actions-stack">
                        <button type="button" class="btn btn-danger btn-sm remove-education py-1 px-2" title="Remove row">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </div>
                </td>
            `;

                container.appendChild(newRow);
                refreshEducationSerials();
            }

            /* Remove row functionality */
            if (e.target.closest(".remove-education")) {
                if (educationRows.length <= 1) {
                    $('#education-table').next('.education-error').remove();

                    $('<div class="text-danger mt-2 education-error">You must have at least one education entry.</div>')
                    .insertAfter('#education-table');

                    setTimeout(() => {
                        $('.education-error').fadeOut();
                    }, 7000);
                    return;
                }
                e.target.closest("tr").remove();
                refreshEducationSerials();
            }
        });
    </script>
    <script>
        (function() {
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
                    $intDate.prop('disabled', true).prop('required', false);
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
                    $intDate.prop('disabled', true).prop('required', false).val('');
                }

                updateTotalYears($tr);
                syncLegacyHidden($tr);
            }

            function initWorkRow($tr) {
                applyEmploymentType($tr);
            }
            function refreshWorkSerials() {
                $('#work-container .work-fields .work-serial').each(function(idx) {
                    $(this).text(String(idx + 1));
                });
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

            document.addEventListener('click', function(e) {
                var container = document.getElementById('work-container');
                if (!container) return;
                var workRows = container.querySelectorAll('.work-fields');

                if (e.target.closest('.add-more-work')) {
                    if (workRows.length >= 3) {
                        $('#work-table').next('.work-error').remove();
                        $('<div class="text-danger mt-2 work-error">You can add a maximum of 3 work experience entries.</div>')
                            .insertAfter('#work-table');
                        setTimeout(function() { $('.work-error').fadeOut(); }, 7000);
                        return;
                    }

                    var first = container.querySelector('.work-fields');
                    var newRow = first.cloneNode(true);
                    newRow.querySelectorAll('input[type="file"]').forEach(function(el) { el.value = ''; });
                    newRow.querySelectorAll('input[type="file"]').forEach(function(el) {
                        el.removeAttribute('data-has-local-file');
                    });
                    // Remove cloned local preview links from source row.
                    newRow.querySelectorAll('.local-file-preview').forEach(function(preview) {
                        var blobUrl = preview.dataset ? preview.dataset.blobUrl : '';
                        if (blobUrl) {
                            try { URL.revokeObjectURL(blobUrl); } catch (e) {}
                        }
                        preview.remove();
                    });
                    newRow.querySelectorAll('.work-date-from, .work-date-to').forEach(function(inp) {
                        inp.value = '';
                    });
                    var typeSel = newRow.querySelector('.work-employment-type');
                    if (typeSel) typeSel.selectedIndex = 0;
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
                    container.appendChild(newRow);
                    initWorkRow($(newRow));
                    refreshWorkSerials();
                    return;
                }

                if (e.target.closest('.remove-work')) {
                    if (workRows.length <= 1) {
                        $('#work-table').next('.work-error').remove();
                        $('<div class="text-danger mt-2 work-error">You must have at least one work experience entry.</div>')
                            .insertAfter('#work-table');
                        setTimeout(function() { $('.work-error').fadeOut(); }, 7000);
                        return;
                    }
                    e.target.closest('tr').remove();
                    refreshWorkSerials();
                }
            });
        })();

        $('#verify_form_s').on('click', function() {
            const licenseNumber = $('#certificate_no').val().trim().toUpperCase();
            const date = $('#certificate_date').val().trim();
            const regex = /^(B|C|LC|LB)\d+$/;


            licenseError.textContent = '';
            $('#dateError').text('');

            let isValid = true;

            if (licenseNumber === '' || !regex.test(licenseNumber)) {
                licenseError.textContent = 'Enter a valid License Number';
                isValid = false;
            }

            if (date === '') {
                $('#dateError').text('Date is required');
                isValid = false;
            } else {
                const regexDate = /^(\d{4})-(\d{2})-(\d{2})$/;
                const parts = date.match(regexDate);

                if (!parts) {
                    $('#dateError').text('Enter a valid date');
                    isValid = false;
                } else {
                    const year = parseInt(parts[1], 10);
                    const month = parseInt(parts[2], 10) - 1;
                    const day = parseInt(parts[3], 10);

                    const checkDate = new Date(year, month, day);

                    if (
                        checkDate.getFullYear() !== year ||
                        checkDate.getMonth() !== month ||
                        checkDate.getDate() !== day ||
                        year < 1800 // ✅ Optional: Prevents year < 1900
                    ) {
                        $('#dateError').text('Enter a valid date');
                        isValid = false;
                    }
                }
            }

            if (!isValid) return;

            $.ajax({
                url: "{{ route('verifylicense') }}",
                method: "POST",
                data: {
                    license_number: licenseNumber,
                    date: date,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(response) {
                    let $msgBox = $("#license_message");

                    if (response.exists) {
                        $msgBox
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html("&#10004; License verified.");
                    } else {
                        $msgBox
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html("&#10060; License not found.");
                    }
                },
                error: function(xhr, status, error) {
                    let $msgBox = $("#license_message");

                    $msgBox
                        .removeClass("text-success")
                        .addClass("text-danger")
                        .html("🚫 Error verifying license. Try again.");
                },
            });
        });

        $(document).ready(async function() {
            var modalEl = document.getElementById('competencyInstructionsModal');
            if (!modalEl || typeof bootstrap === 'undefined' || !bootstrap.Modal) {
                return;
            }

            var agreeCheckbox = modalEl.querySelector('#declaration-agree-renew');
            var errorText = modalEl.querySelector('#declaration-error-renew');
            var proceedBtn = modalEl.querySelector('#proceedPayment');
            if (!agreeCheckbox || !errorText || !proceedBtn) {
                return;
            }

            var acceptModal = new bootstrap.Modal(modalEl, {
                backdrop: 'static',
                keyboard: false
            });

            var modalBody = modalEl.querySelector('#instructionContent');
            if (modalBody) {
                modalBody.innerHTML = '<p class="mb-0 text-muted">Loading instructions...</p>';
            }

            try {
                var instructionResponse = await $.ajax({
                    url: "{{ route('licences.getFormInstruction') }}",
                    type: "POST",
                    data: {
                        appl_type: ($('#appl_type').val() || 'N'),
                        licence_code: ($('#license_name').val() || 'C'),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if (modalBody) {
                    if (instructionResponse && Number(instructionResponse.status) === 200 && instructionResponse.data) {
                        try {
                            var delta = JSON.parse(instructionResponse.data);
                            if (typeof QuillDeltaToHtmlConverter !== 'undefined' && delta && delta.ops) {
                                var converter = new QuillDeltaToHtmlConverter(delta.ops, {
                                    multiLineParagraph: false,
                                    listItemTag: "li",
                                    paragraphTag: "p"
                                });
                                modalBody.innerHTML = converter.convert();
                            } else {
                                modalBody.textContent = instructionResponse.data;
                            }
                        } catch (parseErr) {
                            modalBody.textContent = instructionResponse.data;
                        }
                    } else {
                        modalBody.innerHTML = '<p class="mb-0 text-danger">Instruction not available.</p>';
                    }
                }
            } catch (err) {
                if (modalBody) {
                    modalBody.innerHTML = '<p class="mb-0 text-danger">Unable to load instructions right now.</p>';
                }
            }

            // Force acknowledgement on page load.
            agreeCheckbox.checked = false;
            errorText.classList.add('d-none');
            acceptModal.show();

            if (!modalEl.dataset.acceptGateBound) {
                modalEl.dataset.acceptGateBound = '1';

                modalEl.addEventListener('hide.bs.modal', function(e) {
                    if (!agreeCheckbox.checked) {
                        e.preventDefault();
                        errorText.classList.remove('d-none');
                    }
                });

                proceedBtn.addEventListener('click', function(e) {
                    if (!agreeCheckbox.checked) {
                        e.preventDefault();
                        errorText.classList.remove('d-none');
                        return;
                    }
                    errorText.classList.add('d-none');
                    acceptModal.hide();
                });

                agreeCheckbox.addEventListener('change', function() {
                    if (agreeCheckbox.checked) {
                        errorText.classList.add('d-none');
                    }
                });
            }
        });
    </script>