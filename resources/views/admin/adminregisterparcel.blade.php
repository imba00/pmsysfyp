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
                    <h5 class="card-title">Register Parcel</h5>
                    <form action="\regpar" method="post" role="form" class="form-group mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group my-3">
                                <label for="tracknum" class="form-label">Tracking Number</label>
                                <input type="text" name="tracknum" class="form-control" id="track" required>
                            </div>
                            <div class="col-md-4 form-group my-3">
                                <label for="phoneno-field" class="form-label">Phone Number</label>
                                <input type="text" name="phoneno" class="form-control" id="phoneno-field" required>
                            </div>
                            <div class="col-md-4 form-group my-3">
                                <label for="studid-field" class="form-label">Resident ID</label>
                                <input type="text" name="studid" class="form-control" id="studid-field" readonly>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary mt-3" type="submit">Register</button>
                    </form>
                </div>
            </div>
            <!-- End Content -->
        </section>
    </main>

    <script>
        document.getElementById('phoneno-field').addEventListener('input', function() {
            var phoneno = this.value;
            fetch('/get-studid/' + phoneno)
                .then(response => response.json())
                .then(data => {
                    if (data.studid) {
                        document.getElementById('studid-field').value = data.studid;
                    } else {
                        document.getElementById('studid-field').value = "";
                    }
                })
                .catch(error => console.log(error));
        });
    </script>

</body>

</html>
