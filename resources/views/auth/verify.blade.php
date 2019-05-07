@extends('layouts.full')

@section('content')
<div class="container" style="margin-top: 50px;margin-bottom: 30px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3><b><div class="card-header">{{ __('Verify Your Email Address') }}</div></b></h3>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
