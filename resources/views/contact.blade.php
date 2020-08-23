@extends('layouts.front')
@section('content')
<div class="container">
<div id="map">

</div>
<section id="google-map" class="d-flex justify-content-center my-5">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.006351132078!2d85.3590260151376!3d27.686198582800724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1a23a21debcd%3A0x71e91990a05cfdda!2sBhaktapur+Road%2C+Kathmandu+44600!5e0!3m2!1sen!2snp!4v1554796898480!5m2!1sen!2snp" width="80%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
</div>
@endsection

@section('script')
<script src="{{asset('js/script.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX6wGs93elOaAINhgDADLLlE72pg1gPBA&"
  type="text/javascript"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX6wGs93elOaAINhgDADLLlE72pg1gPBA&libraries=places"></script>

@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection
