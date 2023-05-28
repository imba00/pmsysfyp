<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PARCEL MANAGEMENT SYSTEM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('script')
    @include('admin.script')
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

    @include('admin.header')

    @include('admin.adminsidebar')

    {{-- @include('header') --}}
    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Register Resident</h5>
                            <x-guest-layout>
                                <x-jet-authentication-card>


                                    {{-- <h3 class="pb-3">REGISTER RESIDENT</h3> --}}

                                    <x-jet-validation-errors class="mb-4" />

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- First column of the form -->
                                                <div class="form-group">
                                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                                    <x-jet-input id="name" class="block mt-1 w-full" type="text"
                                                        name="name" :value="old('name')" required autofocus
                                                        autocomplete="name" />
                                                </div>

                                                <div class="form-group">
                                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                                    <x-jet-input id="email" class="block mt-1 w-full" type="email"
                                                        name="email" :value="old('email')" required />
                                                </div>

                                                <div class="form-group">
                                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                                    <x-jet-input id="password" class="block mt-1 w-full"
                                                        type="password" name="password" required
                                                        autocomplete="new-password" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Second column of the form -->
                                                <div class="form-group">
                                                    <x-jet-label for="password_confirmation"
                                                        value="{{ __('Confirm Password') }}" />
                                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="password" name="password_confirmation" required
                                                        autocomplete="new-password" />
                                                </div>

                                                <div class="form-group">
                                                    <x-jet-label for="userid" value="{{ __('Resident ID') }}" />
                                                    <x-jet-input id="userid" class="block mt-1 w-full" type="text"
                                                        name="userid" required />
                                                </div>

                                                <div class="form-group">
                                                    <x-jet-label for="phoneno" value="{{ __('Phone Number') }}" />
                                                    <x-jet-input id="phoneno" class="block mt-1 w-full" type="text"
                                                        name="phoneno" required />
                                                </div>
                                            </div>
                                        </div>

                                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                            <div class="mt-4">
                                                <x-jet-label for="terms">
                                                    <div class="flex items-center">
                                                        <x-jet-checkbox name="terms" id="terms" required />

                                                        <div class="ml-2">
                                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                'terms_of_service' =>
                                                                    '<a target="_blank" href="' .
                                                                    route('terms.show') .
                                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                                    __('Terms of Service') .
                                                                    '</a>',
                                                                'privacy_policy' =>
                                                                    '<a target="_blank" href="' .
                                                                    route('policy.show') .
                                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                                    __('Privacy Policy') .
                                                                    '</a>',
                                                            ]) !!}
                                                        </div>
                                                    </div>
                                                </x-jet-label>
                                            </div>
                                        @endif

                                        <div class="flex items-center justify-end mt-4">


                                            <x-jet-button class="ml-4">
                                                {{ __('Register') }}
                                            </x-jet-button>
                                        </div>
                                    </form>
                                </x-jet-authentication-card>
                            </x-guest-layout>
                        </div>
                    </div>
                </div>
            </div>


        </section>

        <main id="main">





        </main><!-- End #main -->


</body>

</html>
