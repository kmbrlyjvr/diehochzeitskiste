@extends('layouts.master') @section('container')
<main>
    <section class="main">
        <div class="main-form">
            <h2>Registrierung</h2>
            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <label for="name">{{ __("Name") }}</label>

                    <div>
                        <input id="name" type="text" @error('name') is-invalid
                        @enderror" name="name" value="{{ old("name") }}"
                        required autocomplete="name" autofocus> @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email">{{ __("E-Mail Address") }}</label>

                    <div>
                        <input
                            id="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                        />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password">{{ __("Password") }}</label>

                    <div>
                        <input
                            id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            required
                            autocomplete="new-password"
                        />

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password-confirm">{{
                        __("Confirm Password")
                    }}</label>

                    <div>
                        <input
                            id="password-confirm"
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                    </div>
                </div>

                <div>
                    <div>
                        <button type="submit">
                            {{ __("Registrieren") }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
