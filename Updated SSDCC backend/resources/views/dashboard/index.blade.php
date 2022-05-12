@extends('layouts.admin')

@section('content')
 <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-xl-4">
        
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title">Daily Sales</h4>
                                    <p class="text-muted">March 26 - April 01</p>
                                    <div class="mb-3 mt-4">
                                        <div class="float-right d-none d-xl-block">
                                            <img src="assets/images/cards/visa.png" alt="user-card" height="28" />
                                            <img src="assets/images/cards/master.png" alt="user-card" height="28" />
                                            <img src="assets/images/cards/american-express.png" alt="user-card" height="28" />
                                        </div>
                                        <h2 class="font-weight-light">$8,459.56</h2>
                                    </div>
                                    <div class="chartjs-chart dash-sales-chart">
                                        <canvas id="sales-chart"></canvas>
                                    </div>
                                </div><!-- end card-box-->
        
                                <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
                                    <div class="float-left" dir="ltr">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                data-fgColor="#ffffff" data-bgcolor="rgba(255,255,255,0.2)" value="49" data-skin="tron" data-angleOffset="180"
                                                data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-one-content text-right">
                                        <p class="text-white mb-0 mt-2">Statistics</p>
                                        <h3 class="text-white">$714</h3>
                                    </div>
                                </div> <!-- end card-box-->
        
                            </div> <!-- end col -->
        
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-3">Statistics</h4>
                                    <div class="row text-center">
                                        <div class="col-sm-4 mb-3">
                                            <h3 class="font-weight-light">4,335</h3>
                                            <p class="text-muted text-overflow">Total Sales</p>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h3 class="font-weight-light">874</h3>
                                            <p class="text-muted text-overflow">Open Compaign</p>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h3 class="font-weight-light">2,548</h3>
                                            <p class="text-muted text-overflow">Total Sales</p>
                                        </div>
                                    </div>
                                    <div class="chartjs-chart high-performing-product">
                                        <canvas id="high-performing-product"></canvas>    
                                    </div>            
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
        
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-3">Total Revenue</h4>
                                    <div class="row text-center">
                                        <div class="col-6 mb-3">
                                            <h3 class="font-weight-light">8,459</h3>
                                            <p class="text-muted text-overflow">Total Sales</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h3 class="font-weight-light">584</h3>
                                            <p class="text-muted text-overflow">Open Compaign</p>
                                        </div>
                                    </div>
                                    <div class="chartjs-chart conversion-chart">
                                        <canvas id="conversion-chart"></canvas>
                                    </div>
                                </div>  <!-- end card-box-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
        
        
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title">My Wallets</h4>
                                    <div class="my-4">
                                        <h2 class="font-weight-normal mb-2">$6,584.22 <i class="mdi mdi-arrow-up text-success"></i></h2>
                                        <p class="text-muted">March 26 - April 01</p>
                                    </div>
        
                                    <div class="mb-3 chartjs-chart dash-doughnut">
                                        <canvas id="doughnut"></canvas>
                                    </div>
    
                                    <div>
                                        <p><i class="mdi mdi-stop-circle-outline text-success"></i> Wallet Ballance <span class="float-right font-weight-normal">$825.25</span></p>
                                        <p><i class="mdi mdi-stop-circle-outline text-danger"></i> Travels <span class="float-right font-weight-normal">$1,254</span></p>
                                        <p class="mb-0"><i class="mdi mdi-stop-circle-outline"></i> Foods & Drinks <span class="float-right font-weight-normal">$89.66</span></p>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
        
                            <div class="col-xl-6">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-4">Service List</h4>
        
                                    
                                    <div class="table-responsive">
                                        <table class="table table-centered table-hover mb-0" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>SL.no</th>
                                                    <th>Service Name </th>                             
                                                                            
                                                    <th>User Type Type</th>
                                                    <th>Create Date </th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @php
                                                     $i = 1
                                                 @endphp
                                                 @if(!empty($data))
                                                @foreach($data as $service)
                                                <tr>
                                                    
                                                    
                                                    <td>{{ @$i++ }}</td>
                                                    <td>{{ $service->service_name }}</td> 
                                                    <!-- <td>{{ ucfirst($service->service_type) }}</td>  -->
                                                    <td>{{ Config::get('global.user_type')[$service->user_type] }}</td>
                                                    <td>{{ $service->created_at }}</td>
                                                    
                                                    <td>{{ ($service->is_active==1 ? 'Active' : 'In-Active') }}</td>
                                                    <td>

                                                        <button type="button" onclick="addService('{{$service->id}}')" class="btn btn-sm btn-primary">Edit Service</button>
                         
                                                         <a  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" href="{{ url('/service/service-delete/') }}/{{md5($service->id)}}">Delete</a>
                                                       
                                                   </td>
                                               </tr>
                                               @endforeach
                                               @endif
                                           </tbody>
                                        </table>
                                    </div>
        
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
        
                            <div class="col-xl-3">
                                <div class="card-box gradient-danger bx-shadow-lg pb-0">
                                    <h4 class="header-title text-white">Daily Sales</h4>
                                    <p class=" text-white">March 26 - April 01</p>
                                    <div class="mb-3 mt-4">
                                        <h2 class="font-weight-light  text-white">$3,558.48</h2>
                                    </div>
        
                                    <div class="pull-in">
                                        <canvas id="lineChart" height="115"></canvas>
                                    </div>
                                </div> <!-- end card-box-->
        
                                <div class="card-box">
                                    <div class="media">
                                        <img class="mr-3 rounded-circle bx-shadow-lg" src="assets/images/users/avatar-4.jpg" alt="Generic placeholder image" height="80">
                                        <div class="media-body">
                                            <h5 class="mt-0">Louis P. Wheeler</h5>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, at, tempus viverra turpis.
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-info btn-block mt-3">Follow</a>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
        
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-4">Visitor Traffics</h4>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div id="usa" class="dash-usa-map"></div>
                                        </div> <!-- end col -->
                                        <div class="col-md-4">
                                            <h5 class="mb-1 mt-0">1,12,540 <small class="text-muted ml-2">www.getbootstrap.com</small></h5>
                                            <div class="progress-w-percent">
                                                <span class="progress-value font-weight-bold">72% </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
        
                                            <h5 class="mb-1 mt-0">51,480 <small class="text-muted ml-2">www.youtube.com</small></h5>
                                            <div class="progress-w-percent">
                                                <span class="progress-value font-weight-bold">39% </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
        
                                            <h5 class="mb-1 mt-0">45,760 <small class="text-muted ml-2">www.dribbble.com</small></h5>
                                            <div class="progress-w-percent">
                                                <span class="progress-value font-weight-bold">61% </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
        
                                            <h5 class="mb-1 mt-0">98,512 <small class="text-muted ml-2">www.behance.net</small></h5>
                                            <div class="progress-w-percent">
                                                <span class="progress-value font-weight-bold">52% </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 52%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
        
                                            <h5 class="mb-1 mt-0">2,154 <small class="text-muted ml-2">www.vimeo.com</small></h5>
                                            <div class="progress-w-percent">
                                                <span class="progress-value font-weight-bold">28% </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 28%;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div>  <!-- end card-box-->
                            </div> <!-- end col -->
        
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-4">Data Uses</h4>
        
                                    <div class="row text-center">
                                        <div class="col-6 mb-3">
                                            <h3 class="font-weight-light"> <i class="mdi mdi-cloud-download text-info"></i> 79%</h3>
                                            <p class="text-muted text-overflow">Downloads</p>
                                        </div> <!-- end col -->
                                        <div class="col-6 mb-3">
                                            <h3 class="font-weight-light"> <i class="mdi mdi-cloud-upload text-danger"></i> 23%</h3>
                                            <p class="text-muted text-overflow">Uploads</p>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
        
                                    <div class="chartjs-chart datauses-area">
                                        <canvas id="datauses-area-1"></canvas>
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
        
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                @include('includes.footer')

            </div>
    <!-- Dashboard Init JS -->
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
        
@endsection
