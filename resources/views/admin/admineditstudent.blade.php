<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Parcel Management System Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">



    @include('admin.script')
</head>

<body>

    @include('admin.header')

    @include('admin.adminsidebar')

    <main id="main" class="main">

        <section class="section">
            <!-- Content -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Resident</h5>

                    <form id="edit-student-form" action="\updstudent" method="post" role="form"
                        class="form-group mt-4">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user['id'] }}" id="id">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Tracking Number</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user['name'] }}">
                            </div>
                            <div class="col-md-6">
                                <label for="userid" class="form-label">Resident ID</label>
                                <input type="text" class="form-control" id="userid" name="userid"
                                    value="{{ $user['userid'] }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phoneno" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phoneno" name="phoneno"
                                    value="{{ $user['phoneno'] }}">
                            </div>
                            <div class="col-md-6">
                                <label for="apartment" class="form-label">Apartment</label>
                                <input type="text" class="form-control" id="apartment" name="apartment"
                                    value="{{ $user['apartment'] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex justify-content-end">
                                <a href="/studlist" class="btn btn-outline-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Content -->
            </div>
        </section>
    </main><!-- End #main -->


    <script></script>
</body>

</html>
