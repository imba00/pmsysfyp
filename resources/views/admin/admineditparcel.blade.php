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

        <section class="section dashboard">
            <!-- Content -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Parcel</h5>

                    <form action="\updlist" method="post" role="form" class="form-group mt-4">
                        @csrf
                        <input type="hidden" name="id" value="{{ $parcel['id'] }}">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tracknum" class="form-label">Tracking Number</label>
                                <input type="text" class="form-control" id="tracknum" name="tracknum"
                                    value="{{ $parcel['tracknum'] }}">
                            </div>
                            <div class="col-md-6">
                                <label for="studid" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="studid" name="studid"
                                    value="{{ $parcel['studid'] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phoneno" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phoneno" name="phoneno"
                                    value="{{ $parcel['phoneno'] }}">
                            </div>
                            <div class="col-md-6">
                                <label for="apartment" class="form-label">Apartment</label>
                                <input type="text" class="form-control" id="apartment" name="apartment"
                                    value="{{ $parcel['apartment'] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="arrivedate" class="form-label">Arrive Date</label>
                                <input type="text" class="form-control" id="arrivedate" name="arrivedate"
                                    value="{{ $parcel['arrivedate'] }}">
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                @if ($parcel['status'] == 1)
                                    <select class="form-select" name="status" id="status">
                                        <option value="1" selected>Ready to Pickup</option>
                                        <option value="2">Collected</option>
                                    </select>
                                @elseif ($parcel['status'] == 2)
                                    <select class="form-select" name="status" id="status">
                                        <option selected value="2">Collected</option>
                                        <option value="1">Ready to Pickup</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex justify-content-end">
                                <a href="/redirect" class="btn btn-outline-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Content -->
        </section>
    </main><!-- End #main -->
</body>

</html>
