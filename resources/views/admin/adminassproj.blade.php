<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    @include('admin.script')


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        $(function() {
            $("#sdate").datepicker();
        });

        $(function() {
            $("#edate").datepicker();
        });
    </script>
</head>

<body>

    <script></script>

    @include('admin.header')

    @include('admin.adminsidebar')

    <main id="main" class="main">



        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->

                <div class="row">
                    <!-- content -->
                    <div class="col-12">
                        <div class="card  ">
                            <div class="card-body">
                                <h5 class="card-title">Assign Project<span>| register</span></h5>

                                <form action="\regproj" method="post" role="form" class="form-group mt-4">
                                    @csrf
                                    <div class="col-md-6 form-group my-3">
                                        <label for="title" class="form-label">Project Title</label>
                                        <input type="text" name="title" class="form-control"
                                            id="title"required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group my-3">
                                            <label for="studname" class="form-label">Student Name</label>
                                            <input type="text" name="studname" class="form-control"
                                                id="studname"required>
                                        </div>
                                        <div class="col-md-6 form-group my-3">
                                            <label for="studid" class="form-label">Student ID</label>
                                            <input type="text" name="studid" class="form-control"
                                                id="studid"required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="svid" class="form-label">Supervisor</label>
                                            <select class="form-select select" id="svid"
                                                aria-label="Default select example" name="svid">
                                                @foreach ($lectlist as $item)
                                                    @if ($item['lectid'] == 'l1')
                                                    @else
                                                        <option value="{{ $item['lectid'] }}">
                                                            {{ $item['name'] }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="duration" class="form-label">Project Duration (month)</label>
                                            <input type="text" class="form-control" name="duration"
                                                id="duration"required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="sdate" class="form-label">Start Date</label>
                                            <input type="text" class="form-control" name="sdate"
                                                id="sdate"required>
                                        </div>
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="edate" class="form-label">End Date</label>
                                            <input type="text" class="form-control" name="edate"
                                                id="edate"required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="ex1" class="form-label">Examiner 1</label>
                                            <select class="form-select select" id="ex1"
                                                aria-label="Default select example" name="ex1">
                                                @foreach ($lectlist as $item)
                                                    @if ($item['lectid'] == 'l1')
                                                    @else
                                                        <option value="{{ $item['lectid'] }}">
                                                            {{ $item['name'] }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="ex2" class="form-label">Examiner 2</label>
                                            <select class="form-select select" id="ex2"
                                                aria-label="Default select example" name="ex2">
                                                @foreach ($lectlist as $item)
                                                    @if ($item['lectid'] == 'l1')
                                                    @else
                                                        <option value="{{ $item['lectid'] }}">
                                                            {{ $item['name'] }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary" type="submit">Register</button>
                                </form>

                            </div>
                        </div>
                    </div><!-- End Content -->



                </div>
            </div>
        </section>

    </main><!-- End #main -->

</body>

</html>
