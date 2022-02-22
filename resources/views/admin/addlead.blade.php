@include('element.head')

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
                        <div class="col-6 mx-auto">
                            <div class="card mx-auto">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Add Manager</h4>
                                    <div class="row">

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                        @if (session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif


                                        <div class="p-2 mt-3">



                                            <form action="{{ route('admin.addLeadStore') }}" method="POST">
                                                @csrf
                                                <div class="auth-form-group-custom mb-4">
                                                    <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                    <label for="name">name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="Enter name">


                                                </div>


                                                <div class="auth-form-group-custom mb-4">
                                                    <i class="ri-mail-line auti-custom-input-icon"></i>
                                                    <label for="useremail">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="useremail" placeholder="Enter email">

                                                </div>


                                                <div class="auth-form-group-custom mb-4">
                                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                    <label for="userpassword">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="userpassword" placeholder="Enter password">


                                                </div>


                                                <div class="auth-form-group-custom mb-4">
                                                    <i class="ri-booklet-line auti-custom-input-icon"></i>
                                                    <label for="useremail">Notes</label>
                                                    <textarea name="notes" class="form-control" style="height:100%"
                                                        rows="10">

                                                    </textarea>


                                                </div>



                                                {{-- <select class="form-control">
                                                            <option value="1">
                                                                    Admin
                                                            </option>
                                                        <option value="2" selected="select">
                                                                Manager
                                                        </option>
                                                        </select> --}}

                                                @if ($errors->has('role'))
                                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                                @endif
                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Register</button>
                                        </div>


                                        </form>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                @include('element.footer')
            </div>
        </div>
    </div>
    </div>
    <div class="rightbar-overlay"></div>
    @include('element.script')
</body>

</html>
