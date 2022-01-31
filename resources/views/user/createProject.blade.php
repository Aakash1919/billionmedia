@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="add-project-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/images/about_img.png">
                    </div>
                    <div class="col-md-6">
                        <h2><span>Create a project</span> so you can track and improve your SEO traffic.</h2>
                        <ul>
                            <li>Track and improve your rankings</li>
                            <li>Get daily status updates on how you are doing</li>
                            <li>Get alerts about critical issues on your website</li>
                            <li>Monitor your SEO health</li>
                        </ul>
                        
                        @include('components.Button.default', array('attributes' => array(
                                'href' => 'javascript:void(0)',
                                'id' => 'cust_btn',
                                'class' => 'btn btn-info btn-lg',
                                'data-toggle' => 'modal',
                                'data-target' => '#threeStepForm',
                                'icon' => null,
                                'title'=> 'Add Your First Project'
                            )))
                        @include('components.Modals.default', array('attributes' => array(
                            'id' => 'threeStepForm',
                            'title' => null,
                            'view' => 'components.forms.threeStepForm',
                            'viewParameters' => []
                        )))
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('javascript')
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script>
        $(document).on("click", "#cust_btn", function () {

            $("#threeStepForm").modal("toggle");
        })
        $(document).ready(function () {
            $(".close").click(function () {
                $("#myModal").toggle();
                $('body.modal-open .fade.show').removeClass('show');
            });
        });
    </script>
    @endpush