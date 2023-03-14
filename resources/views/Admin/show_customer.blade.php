@extends('Admin/layout')
@section('page_title','Customer details')
@section('customer_select','active')
@section('container')

<div class="d-flex align-item-center justify-content-between">

    <h1 class="">Customer details</h1>

</div>

<div class="row m-t-30">
    <div class="col-md-7">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
             
                <tbody>
                    
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>{{$customer_list->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{$customer_list->email}}</td>
                    </tr>
                    <tr>
                        <td><strong>Mobile</strong></td>
                        <td>{{$customer_list->mobile}}</td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td>{{$customer_list->address}}</td>
                    </tr>
                    <tr>
                        <td><strong>City</strong></td>
                        <td>{{$customer_list->city}}</td>
                    </tr>
                    <tr>
                        <td><strong>State</strong></td>
                        <td>{{$customer_list->state}}</td>
                    </tr>
                    <tr>
                        <td><strong>Zip</strong></td>
                        <td>{{$customer_list->zip}}</td>
                    </tr>
                    <tr>
                        <td><strong>Company</strong></td>
                        <td>{{$customer_list->company}}</td>
                    </tr>
                    <tr>
                        <td><strong>Gstin</strong></td>
                        <td>{{$customer_list->gstin}}</td>
                    </tr>
                    <tr>
                        <td><strong>created at</strong></td>
                        <td>{{\Carbon\Carbon::parse($customer_list->created_at)->format('d-m-Y h:i')}}</td>
                    </tr>
                    <tr>
                        <td><strong>updated at</strong></td>
                        <td>{{\Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-Y h:i')}}</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>


@endsection