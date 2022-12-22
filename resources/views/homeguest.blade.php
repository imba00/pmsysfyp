<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FYP Manager</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('script')
</head>

<body>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>


    <script>
        function removeduplicate() {
            var mycode = {};
            $("select[id='mylist'] > option").each(function() {
                if (mycode[this.text]) {
                    $(this).remove();
                } else {
                    mycode[this.text] = this.value;
                }
            });
        }
    </script>
    @include('header')



    <section id="hero">
        <div class="hero-container"
            style="display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;">

            <h1>Please Log In to Continue</h1>
        </div>

    </section>

    <main id="main">





    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</body>

</html>
