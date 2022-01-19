@include('element.head')

@foreach ($leads as $lead)



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


                                            @if (session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif

                                            <div class="p-2 mt-3">



                                                <form action="{{ route('admin.updatelead') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="id" class="form-control" id="name"
                                                        placeholder="Enter name" value=" {{ $lead->id }}">

                                                    <div class="auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="name">name</label>
                                                        <input type="text" name="name" class="form-control" id="name"
                                                            placeholder="Enter name" value=" {{ $lead->name }}">
                                                    </div>


                                                    <div class="auth-form-group-custom mb-4">
                                                        <i class="ri-mail-line auti-custom-input-icon"></i>
                                                        <label for="useremail">Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            id="useremail" placeholder="Enter email"
                                                            value=" {{ $lead->email }}">
                                                    </div>


                                                    <div class="auth-form-group-custom mb-4">
                                                        <i class="ri-booklet-line auti-custom-input-icon"></i>
                                                        <label for="useremail">Notes</label>
                                                        <textarea class="form-control" style="height:100%;" rows="10"
                                                            cols="80" name="notes">
                                                          {{ preg_replace('/\s+/', ' ', $lead->notes) }}
                                                        </textarea>
                                                    </div>
                                            </div>

                                            <div class="text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light"
                                                    type="submit">UPDATE</button>
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
        <script>
            $('textarea').val($('textarea').val().trim());
        </script>
    </body>
@endforeach

</html>
