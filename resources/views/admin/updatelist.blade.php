<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('admin.script')

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
                                <h5 class="card-title">Update List<span>| Edit</span></h5>

                                <form action="\updproj" method="post" role="form" class="form-group mt-4">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $disp['id'] }}">
                                    <input type="hidden" name="progress" value="{{ $disp['progress'] }}">
                                    <input type="hidden" name="status" value="{{ $disp['status'] }}">
                                    <div class="col-md-6 form-group my-3">
                                        <label for="title" class="form-label">Project Title</label>
                                        <input type="text" name="title" class="form-control" id="title"required
                                            value="{{ $disp['title'] }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group my-3">
                                            <label for="studname" class="form-label">Student Name</label>
                                            <input type="text" name="studname" class="form-control" id="studname"
                                                required value="{{ $disp['studname'] }}">
                                        </div>
                                        <div class="col-md-6 form-group my-3">
                                            <label for="studid" class="form-label">Student ID</label>
                                            <input type="text" name="studid" class="form-control" id="studid"
                                                required value="{{ $disp['studid'] }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="svid" class="form-label">Supervisor ID</label>
                                            <input type="text" class="form-control" name="svid" id="svid"
                                                required value="{{ $disp['svid'] }}">
                                        </div>
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="duration" class="form-label">Project Duration (month)</label>
                                            <input type="text" class="form-control" name="duration" id="duration"
                                                required value="{{ $disp['duration'] }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="sdate" class="form-label">Start Date</label>
                                            <input type="text" class="form-control" name="sdate" id="sdate"
                                                required value="{{ $disp['sdate'] }}">
                                        </div>
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="edate" class="form-label">End Date</label>
                                            <input type="text" class="form-control" name="edate" id="edate"
                                                required value="{{ $disp['edate'] }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="ex1" class="form-label">Examiner 1</label>
                                            <input type="text" class="form-control" name="ex1" id="ex1"
                                                required value="{{ $disp['ex1'] }}">
                                        </div>
                                        <div class="col-md-6 form-group my-3 mt-md-0">
                                            <label for="ex2" class="form-label">Examiner 2</label>
                                            <input type="text" class="form-control" name="ex2" id="ex2"
                                                required value="{{ $disp['ex2'] }}">
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary" type="submit">Update</button>
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
