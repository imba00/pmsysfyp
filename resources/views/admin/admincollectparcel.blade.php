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
                    <h5 class="card-title">Collect Parcel</h5>
                    <form action="/parcelcollected" method="post" role="form" class="form-group mt-4">
                        @csrf
                        <input type="hidden" name="id" value="{{ $parcel['id'] }}">
                        <div class="row">
                            <div class="col-6 text-right font-bold mb-2 px-0">Resident ID:</div>
                            <div class="col-6 font-bold mb-2 text-left">{{ $parcel['studid'] }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-right font-bold mb-2 px-0">Resident Name:</div>
                            <div class="col-6 font-bold mb-2 text-left">{{ $resident['name'] }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-right font-bold mb-2 px-0">Track Number:</div>
                            <div class="col-6 font-bold mb-2 text-left">{{ $parcel['tracknum'] }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-right font-bold mb-2 px-0">Phone Number:</div>
                            <div class="col-6 font-bold mb-2 text-left">{{ $parcel['phoneno'] }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-right font-bold mb-2 px-0">Pick-up Location:</div>
                            <div class="col-6 font-bold mb-2 text-left">{{ $parcel['apartment'] }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-right font-bold mb-2 px-0">
                                Collect Pin:
                            </div>
                            <div class="col-6 font-bold mb-2 text-left">
                                <input type="text" id="collectpin" name="collectpin" class="form-control"
                                    style="width: 150px; height: 30px;" />

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 text-right mt-3">
                                <a href="/redirect" class="btn btn-outline-secondary me-2">Cancel</a>
                            </div>

                            <div class="col-6 text-left mt-3">
                                <button type="submit" class="btn btn-outline-primary">Collect</button>
                            </div>
                        </div>
                        @if ($errors->has('error'))
                            <div class="alert alert-danger">{{ $errors->first('error') }}</div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- End Content -->
        </section>
    </main><!-- End #main -->
</body>

</html>
