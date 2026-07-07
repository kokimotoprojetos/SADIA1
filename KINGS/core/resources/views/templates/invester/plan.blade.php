@extends($activeTemplate.'layouts.master')
@section('panel')
   
                    @include($activeTemplate.'partials.plan', ['plans' => $plans])
                
@endsection
