<meta name="csrf-token" content="{{ csrf_token() }}" />
@include('element.head')

@section('mytitle', 'Page Title')

<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/prettify.css') }}" rel="stylesheet">
<style>
    input[type="radio"] {
        margin-right: 8px;
    }

    label.form-label {
        display: block;
    }

    .imagecollection ul {
        list-style-type: none;
    }

    .imagecollection li {
        display: inline-block;
    }

    .imagecollection input[type="checkbox"][id^="presse"] {
        display: none;
    }

    .imagecollection label {
        border: 1px solid #fff;
        padding: 10px;
        border-radius: 50%;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
    }

    .imagecollection label:before {
        background-color: rgba(16, 65, 99, 0.32);
        text-align: center;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        /*   border: 1px solid grey; */
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 1;
        width: 100px;
        height: 100px;
        text-align: center;
        line-height: 100px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    .imagecollection label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.1s;
        transform-origin: 50% 50%;
        border-radius: 50%;
    }

    .imagecollection :checked+label {
        border-color: #eee;
    }

    .imagecollection :checked+label:before {
        content: "✓";
        transform: scale(1.1);
    }

    .imagecollection :checked+label img {
        transform: scale(1.2);
        box-shadow: 0 0 3px #333;
        z-index: -1;
    }

    .imagecollection1 ul {
        list-style-type: none;
    }

    .imagecollection1 li {
        display: inline-block;
    }

    .imagecollection1 input[type="checkbox"][id^="plate"] {
        display: none;
    }

    .imagecollection1 label {
        border: 1px solid #fff;
        padding: 10px;
        border-radius: 50%;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
    }

    .imagecollection1 label:before {
        background-color: rgba(16, 65, 99, 0.32);
        text-align: center;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        /*   border: 1px solid grey; */
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 1;
        width: 100px;
        height: 100px;
        text-align: center;
        line-height: 100px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    .imagecollection1 label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.1s;
        transform-origin: 50% 50%;
        border-radius: 50%;
    }

    .imagecollection1 :checked+label {
        border-color: #eee;
    }

    .imagecollection1 :checked+label:before {
        content: "✓";
        transform: scale(1.1);
    }

    .imagecollection1 :checked+label img {
        transform: scale(1.2);
        box-shadow: 0 0 3px #333;
        z-index: -1;
    }

</style>

<body data-sidebar="dark">

    <div id="layout-wrapper">
        @include('element.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 mx-auto">
                            @foreach ($datas as $key => $data)
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Create contact</h4>

                                    <div id="progrss-wizard" class="twitter-bs-wizard">
                                        <ul class="twitter-bs-wizard-nav nav-justified nav nav-pills">
                                            <li class="nav-item">
                                                <a href="#progress-seller-details" class="nav-link"
                                                    data-toggle="tab">
                                                    <span class="step-number">01</span>
                                                    <span class="step-title">Lead Detail</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#progress-basic-details" class="nav-link"
                                                    data-toggle="tab">
                                                    <span class="step-number">02</span>
                                                    <span class="step-title">Company Details</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#progress-design-own-filter" class="nav-link active"
                                                    data-toggle="tab">
                                                    <span class="step-number">03</span>
                                                    <span class="step-title">Design Your Own Filter press
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#filter-press-specifications" class="nav-link"
                                                    data-toggle="tab">
                                                    <span class="step-number">04</span>
                                                    <span class="step-title">Filter Press Specifications

                                                    </span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#understanding-your-maintenance" class="nav-link"
                                                    data-toggle="tab">
                                                    <span class="step-number">05</span>
                                                    <span class="step-title">Understanding Your Maintenance Needs


                                                    </span>
                                                </a>
                                            </li>


                                            <li class="nav-item">
                                                <a href="#progress-confirm-detail" class="nav-link"
                                                    data-toggle="tab">
                                                    <span class="step-number">06</span>
                                                    <span class="step-title">Confirm Detail</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div id="bar" class="progress mt-4">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                                style="width: 75%;"></div>
                                        </div>
                                        <form method="POST" action="{{ route('admin.moveleadsAdd') }}">
                                            @csrf
                                            <input type="hidden" name="user_id"
                                                value="{{ request()->route('id') }}" />
                                            <div class="tab-content twitter-bs-wizard-tab-content">

                                                <div class="tab-pane" id="progress-seller-details">

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-firstname-input">name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="progress-basicpill-name-input"
                                                                    value="{{ $data->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-lastname-input">Email</label>
                                                                <input type="text" name="   " class="form-control"
                                                                    id="progress-basicpill-email-input"
                                                                    value="{{ $data->email }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="progress-basicpill-phoneno-input">notes</label>
                                                            <input type="text" name="notes" class="form-control"
                                                                id="progress-basicpill-notes-input"
                                                                value="{{ $data->notes }}">
                                                        </div>


                                                    </div>


                                                </div>

                                                <div class="tab-pane" id="progress-basic-details">
                                                    <div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="company_name">Name of
                                                                        the Company</label>
                                                                    <input type="text" class="form-control"
                                                                        name="company_name" id="company_name">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="contact_person">Name of
                                                                        Contact Person</label>
                                                                    <input type="text" class="form-control"
                                                                        name="contact_person" id="contact_person">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="contact_number">Contact No.
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="contact_number" id="contact_number">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="contact_email">Email
                                                                        Id</label>
                                                                    <input type="text" class="form-control"
                                                                        name="contact_email" id="contact_email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="contact_pincode">Factory
                                                                        Address with Pin Code </label>
                                                                    <input type="text" class="form-control"
                                                                        name="contact_pincode" id="contact_pincode">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label d-block"
                                                                        for="progress-basicpill-declaration-input">Query</label>
                                                                    <input type="radio" name="contact_query"
                                                                        value="design_your_own_filter_press">Design Your
                                                                    Own Filter
                                                                    Press<br>
                                                                    <input type="radio" name="contact_query"
                                                                        value="free_maintenance_registration">Free
                                                                    Maintenance
                                                                    Registration<br>

                                                                    <input type="radio" name="contact_query" value=""
                                                                        id="contact_query_other">
                                                                    Other
                                                                    <input type="text" id="contact_query_text" />

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="progress-design-own-filter">
                                                    <div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="name_slurry">Name
                                                                        &
                                                                        Nature of your Slurry</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name_slurry" id="name_slurry">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label>Total Slurry to be filtered through Filter
                                                                        Press Per Day</label>
                                                                    <input type="text" class="form-control"
                                                                        name="total_slurry" id="total_slurry">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="desired_hours">Desired
                                                                        Number of working Hours of Filter Press
                                                                        Per
                                                                        Day</label>
                                                                    <input type="text" class="form-control"
                                                                        name="desired_hours" id="desired_hours">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="specific_gravity">The
                                                                        specific gravity of the slurry</label>
                                                                    <input type="text" class="form-control"
                                                                        name="specific_gravity" id="specific_gravity">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="suspended_slurry">%
                                                                        of
                                                                        dry suspended solids in the
                                                                        slurry</label>
                                                                    <input type="text" class="form-control"
                                                                        name="suspended_slurry" id="suspended_slurry">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="size_micron">Solid
                                                                        Particle size in Micron</label>
                                                                    <input type="text" class="form-control"
                                                                        name="size_micron" id="size_micron">
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="densitysolids">Density
                                                                        of
                                                                        Solids</label>
                                                                    <input type="text" class="form-control"
                                                                        name="densitysolids" id="densitysolids">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="ph_slurry">pH
                                                                        Value of the slurry</label>
                                                                    <input type="text" class="form-control"
                                                                        name="ph_slurry" id="ph_slurry">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="progress-basicpill-cardno-input">The
                                                                        filtrate is important or Cake is
                                                                        Important
                                                                    </label>
                                                                    <input type="radio" name="filtrate_important"
                                                                        value="filtrate">Filtrate<br>
                                                                    <input type="radio" name="filtrate_important"
                                                                        value="cake">Cake<br>
                                                                    <input type="radio" name="filtrate_important"
                                                                        value="both">Both<br>
                                                                    <input type="radio" name="filtrate_important"
                                                                        id="filtrate_important_value_other">Other
                                                                    <input type="text"
                                                                        id="filtrate_important_value_text" />
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="type_filter">Type
                                                                        of Filter press required
                                                                    </label>
                                                                    <input type="radio" name="type_filter"
                                                                        value="membrane">Membrane<br>
                                                                    <input type="radio" name="type_filter"
                                                                        value="conventional">Conventional<br>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="cake_washing">Whether
                                                                        Cake Washing provision is require ?

                                                                    </label>
                                                                    <input type="radio" name="cake_washing"
                                                                        value="yes">Yes<br>
                                                                    <input type="radio" name="cake_washing"
                                                                        value="no">No<br>
                                                                    <input type="radio" name="cake_washing"
                                                                        value="maybe">Maybe<br>


                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="filtrate_important">Whether
                                                                        Cake Airing provision is require ?


                                                                    </label>
                                                                    <input type="radio" name="cake_airing"
                                                                        value="yes">Yes<br>
                                                                    <input type="radio" name="cake_airing"
                                                                        value="no">No<br>
                                                                </div>
                                                            </div>


                                                        </div>





                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="zero_leakage">Whether
                                                                        Zero Leakage (Dripping less) Filter
                                                                        Plate option
                                                                        require ?


                                                                    </label>
                                                                    <input type="radio" name="zero_leakage"
                                                                        value="yes">Yes<br>
                                                                    <input type="radio" name="zero_leakage"
                                                                        value="no">No<br>
                                                                    <input type="radio" name="zero_leakage"
                                                                        value="maybe">Maybe<br>


                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="desire_solids">Desire
                                                                        % of Solids in the Pressed Cake

                                                                    </label>
                                                                    <input type="text" name="desire_solids"><br>

                                                                </div>
                                                            </div>


                                                        </div>





                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="desire_moisture">Desire
                                                                        %
                                                                        of moisture Pressed Cake

                                                                    </label>
                                                                    <input type="text" name="desire_moisture">


                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="density_sludge">The
                                                                        density of Sludge / Wet Cake </label>
                                                                    <input type="text" name="density_sludge"><br>

                                                                </div>
                                                            </div>


                                                        </div>



                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="nos_desired">Nos.
                                                                        of
                                                                        desired Filter Press Batches to be taken
                                                                        / Day
                                                                        (24 Hrs)
                                                                    </label>
                                                                    <input type="text" name="nos_desired">


                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="maxi">Maxi.
                                                                        Working Temperature of the
                                                                        Slurry</label>
                                                                    <input type="text" name="maxi"><br>

                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>




                                                <div class="tab-pane" id="filter-press-specifications">
                                                    <div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="size_filterpress">Size of
                                                                        Filter press</label>
                                                                    <input type="text" class="form-control"
                                                                        name="size_filterpress" id="size_filterpress">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="nos_chambers"
                                                                        for="nos_chambers">Nos. of Chambers require in a
                                                                        Filter
                                                                        Press</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nos_chambers" id="nos_chambers">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="prefered_thickness">Prefered
                                                                        Cake Thickness</label>
                                                                    <input type="text" class="form-control"
                                                                        name="prefered_thickness"
                                                                        id="prefered_thickness">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label>Type of Automation require : (If any)</label>
                                                                    <input type="text" class="form-control"
                                                                        name="types_automation" id="types_automation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="filtrate_delivery">Type of
                                                                        Filtrate Outlet Delivery</label>
                                                                    <input type="radio" name="filtrate_delivery"
                                                                        value="open">Open
                                                                    <br>
                                                                    <input type="radio" name="filtrate_delivery"
                                                                        value="close">Close<br>



                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="understanding-your-maintenance">
                                                    <div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="size_filterpress">The number of Filter
                                                                        presses used by you? *
                                                                    </label>
                                                                    <input type="radio" name="number_filter_presses"
                                                                        value="0-5">0-5<br>
                                                                    <input type="radio" name="number_filter_presses"
                                                                        value="5-10">Free
                                                                    5-10<br>

                                                                    <input type="radio" name="number_filter_presses"
                                                                        value="10-20
                                                                        ">10-20<br>
                                                                    <input type="radio" name="number_filter_presses"
                                                                        value="more_than_20
                                                                        ">More than 20<br>
                                                                    <input type="radio" name="number_filter_presses"
                                                                        value="none">None<br>

                                                                </div>


                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="size_filterpress">What Kinds of Filter
                                                                        Presses do you use? *
                                                                        <br>
                                                                        <p style="font-size: 9px"> Select None if you
                                                                            don't use any Filter Press
                                                                        </p>
                                                                    </label>

                                                                    <button type="button"
                                                                        class="btn btn-primary waves-effect waves-light"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target=".bs-example-modal-lg-presses">
                                                                        Choice
                                                                    </button>

                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="size_filterpress">What type of Filter
                                                                            Plates do you use? *

                                                                            <br>
                                                                            <p style="font-size: 9px"> Select None if
                                                                                you
                                                                                don't use any Filter Press
                                                                            </p>
                                                                        </label>
                                                                        <button type="button"
                                                                            class="btn btn-primary waves-effect waves-light"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target=".bs-example-modal-lg">
                                                                            Choice
                                                                        </button>



                                                                    </div>

                                                                </div>


                                                            </div>



                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="size_filterpress">Are all of them
                                                                        manufactured by Yo - Tana? *

                                                                    </label>
                                                                    <input type="radio" name="manufacture_yotana"
                                                                        value="Yes">Yes<br>
                                                                    <input type="radio" name="manufacture_yotana"
                                                                        value="No">No<br>
                                                                    <input type="radio" name="manufacture_yotana" value="Have not used Filter Press Yet
                                                                        ">Have not used Filter Press Yet<br>

                                                                </div>


                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="size_filterpress">SIZE OF FILTER PRESS YOU
                                                                        ARE USING WITH NOS. OF PLATES IN IT. *

                                                                        <br>
                                                                        <p style="font-size: 9px"> Select None if
                                                                            you
                                                                            don't use any Filter Press
                                                                        </p>
                                                                        <input type="checkbox"
                                                                            name="size_filterpress_nos[]"
                                                                            value="915 X 915 MM">
                                                                        <label>915 X 915 MM</label><br>

                                                                        <input type="checkbox"
                                                                            name="size_filterpress_nos[]"
                                                                            value="1200 X 1200 MM">
                                                                        <label>1200 X 1200 MM</label><br>

                                                                        <input type="checkbox"
                                                                            name="size_filterpress_nos[]"
                                                                            value="1500 X 1500 MM">
                                                                        <label>1500 X 1500 MM</label><br>

                                                                        <input type="checkbox"
                                                                            name="size_filterpress_nos[]" value="None">
                                                                        <label>None</label><br>

                                                                        <input type="checkbox"
                                                                            name="size_filterpress_nos[]" value="Other"
                                                                            id="size_filterpress_nos_other">
                                                                        <label>Other</label>
                                                                        <input type="text"
                                                                            id="size_filterpress_nos_text">
                                                                    </label>

                                                                </div>


                                                            </div>



                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-6">
                                                                    <label class="form-label"
                                                                        for="use_filterpress">Make of Filter Press do
                                                                        you use?
                                                                        <br>
                                                                        <p style="font-size: 9px">
                                                                            Skip Question If you do not use Filter Press
                                                                        </p>
                                                                        <input type="text" class="form-control"
                                                                            name="use_filterpress">
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-6">
                                                                    <label class="form-label"
                                                                        for="common_filterpress	">What are the common
                                                                        problems do you face while using Filter Press *
                                                                        <br>
                                                                        <p style="font-size: 9px"> Select None if you
                                                                            don't use any Filter Press
                                                                        </p>
                                                                        <input type="checkbox"
                                                                            name="common_filterpress[]"
                                                                            value="Plate Breaking/Bending" />
                                                                        <label>Plate Breaking/Bending</label><br>

                                                                        <input type="checkbox"
                                                                            name="common_filterpress[]"
                                                                            value="Hydraulic Problems" />
                                                                        <label>Hydraulic Problems</label><br>

                                                                        <input type="checkbox"
                                                                            name="common_filterpress[]"
                                                                            value="Leakage Problems" />
                                                                        <label>Leakage Problems</label><br>

                                                                        <input type="checkbox"
                                                                            name="common_filterpress[]"
                                                                            value="MS Side Bars Bending" />
                                                                        <label>MS Side Bars Bending</label><br>

                                                                        <input type="checkbox"
                                                                            name="common_filterpress[]" value="None" />
                                                                        <label>None</label><br>

                                                                        <input type="checkbox"
                                                                            name="common_filterpress[]" value="Other"
                                                                            id="common_filterpress_other" />
                                                                        <label>Other</label>
                                                                        <input type="text" name="size_filterpress"
                                                                            id="common_filterpress_text" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-6">
                                                                    <label class="form-label"
                                                                        for="specific_problem">If you face any other
                                                                        specific problem, Please write briefly here
                                                                        <br>
                                                                        <p style="font-size: 9px">
                                                                            Skip Question if you don't use Filter Press
                                                                        </p>
                                                                        <input type="text" class="form-control"
                                                                            name="specific_problem">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="progress-confirm-detail">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-6">
                                                            <div class="text-center">
                                                                <div class="mb-4">

                                                                </div>
                                                                <div>
                                                                    <h5>Confirm Detail</h5>
                                                                    <button type="submit"
                                                                        class="btn btn-success waves-effect waves-light">
                                                                        <i
                                                                            class="mdi mdi-check-circle-outline me-2"></i>
                                                                        Submit
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- model --}}

                                            <div class="modal fade bs-example-modal-lg-presses" tabindex="-1"
                                                aria-labelledby="myLargeModalLabel" style="display: none;"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Large
                                                                modal
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="imagecollection">
                                                                    <ul class="row">
                                                                        @foreach ($presses as $presse)
                                                                            <div class="col-md-6">
                                                                                <li><input value="{{ $presse->id }}"
                                                                                        type="checkbox"
                                                                                        id="presse{{ $presse->id }}"
                                                                                        name="filter_presses[]" />
                                                                                    <label
                                                                                        for="presse{{ $presse->id }}"><img
                                                                                            src="{{ URL::asset('assets/images/' . $presse->img) }}"
                                                                                            width="100px"
                                                                                            height="100px"></label>
                                                                                    <p>{{ $presse->name }}</p>
                                                                                </li>
                                                                            </div>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>

                                            {{-- end model --}}



                                            {{-- model --}}

                                            <div class="modal fade bs-example-modal-lg" tabindex="-1"
                                                aria-labelledby="myLargeModalLabel" style="display: none;"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Large
                                                                modal
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="imagecollection1">
                                                                    <ul class="row">
                                                                        @foreach ($plates as $plate)
                                                                            <div class="col-md-6">
                                                                                <li>
                                                                                    <input type="checkbox"
                                                                                        value="{{ $plate->id }}"
                                                                                        id="plate{{ $plate->id }}"
                                                                                        name="filter_plates[]" />
                                                                                    <label
                                                                                        for="plate{{ $plate->id }}"><img
                                                                                            src="{{ URL::asset('assets/images/' . $plate->img) }}"
                                                                                            width="100px"
                                                                                            height="100px"></label>
                                                                                    <p>{{ $plate->name }}</p>
                                                                                </li>
                                                                            </div>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                        </form>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="javascript: void(0);">Previous</a></li>
                                            <li class="next"><a href="javascript: void(0);">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @include('element.footer')
            </div>
        </div>
    </div>
    </div>
    </div>


    {{-- end model --}}

    <div class="rightbar-overlay"></div>
    @include('element.script')
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#basic-pills-wizard").bootstrapWizard({
                tabClass: "nav nav-pills nav-justified"
            }), $("#progrss-wizard").bootstrapWizard({
                onTabShow: function(a, r, i) {
                    var t = (i + 1) / r.find("li").length * 100;
                    $("#progrss-wizard").find(".progress-bar").css({
                        width: t + "%"
                    })
                }
            })
        });
        var triggerTabList = [].slice.call(document.querySelectorAll(".twitter-bs-wizard-nav .nav-link"));
        triggerTabList.forEach(function(a) {
            var r = new bootstrap.Tab(a);
            a.addEventListener("click", function(a) {
                a.preventDefault(), r.show()
            })
        });



        document.querySelector('#contact_query_text').addEventListener("keyup", function() {
            document.querySelector('#contact_query_other').checked = true;
            document.querySelector('#contact_query_other').value = document.querySelector('#contact_query_text')
                .value
        });


        document.querySelector('#filtrate_important_value_text').addEventListener("keyup", function() {
            document.querySelector('#filtrate_important_value_other').checked = true;
            document.querySelector('#filtrate_important_value_other').value = document.querySelector(
                '#filtrate_important_value_text').value
        });



        document.querySelector('#size_filterpress_nos_text').addEventListener("keyup", function() {
            document.querySelector('#size_filterpress_nos_other').checked = true;
            document.querySelector('#size_filterpress_nos_other').value = document.querySelector(
                '#size_filterpress_nos_text').value
        });


        document.querySelector('#common_filterpress_text').addEventListener("keyup", function() {
            document.querySelector('#common_filterpress_other').checked = true;
            document.querySelector('#common_filterpress_other').value = document.querySelector(
                '#common_filterpress_text').value
        });
    </script>



</body>

</html>
