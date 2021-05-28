@extends('layouts.body')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.theme.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.structure.min.css') }}">
@endsection

@section('scripts')
<script type="text/javascript">
    window.onload = function () {
    
    var growth_chart = new CanvasJS.Chart("growthContainer", {
        theme: "light1", 
        animationEnabled: false,		
        data: {!! $growth_data !!}
    });
    growth_chart.render();
    
    }
</script>
<script>
    $(function() {
        $("#select_application").on('change', function() {
            var app_id = $(this).val();
            var redirect_url;
            if (app_id != 0) {
                // Redirect to the Application view page for Categories
                redirect_url = "{{ route('dashboard') }}/application/" + app_id;
            } else {
                // Redirect to main Subscriber page
                redirect_url = "{{ route('dashboard') }}";
            }
            window.location.href = redirect_url;
        });
    });

</script>
@endsection

@section('content')

<!-- Header section -->
<div class="bgGrey">
    <div class="container">
        <div class="row">
            <div class="col-12">
              <h1 class="heading_grey h3 mt-0" tabindex="0">Analytics Dashboard</h1>
            </div>
            @if(session('success'))
            <div class="row col-lg-12 alert alert-success ml-0 mb30" role="alert"> 
                {{session('success')}}
            </div>
            @elseif(session('error'))
            <div class="row col-lg-12 alert alert-danger ml-0 mb30" role="alert">
                {{session('error')}}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Container -->
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 toggle_mobile">
            <div class="grey_boxes p-3 mb-4">

                <label for="select_application" class="ontario-label">Select Application</label>
                    <select class="ontario-input ontario-dropdown" name="select_application" id="select_application">
                        <option value="0" selected>System-wide</option>
                        @foreach($applications as $application)
                            @if (isset($app->id) && $application->id == $app->id)
                            <option value="{{ $application->id }}" selected>{{ $application->name_en }}</option>
                            @else
                            <option value="{{ $application->id }}">{{ $application->name_en }}</option>
                            @endif
                        @endforeach
                    </select>

                <!-- Filters section -->
                <filter-component
                    v-slot="{ filterData, emitData, clearData  }"
                >
                    <!-- Search -->
                    <label for="search" class="ontario-label">Search</label>
                    <input
                    id="search"
                    class="ontario-input"
                    v-model="filterData.search"
                    />
                    <button type="submit" class="ontario-button ontario-button--primary searchbtn"@click="emitData()">Search</button>
                    <button type="button" id="clear_filter_button" class="mb-0 ontario-button--tertiary ontario-button w-100 mt-0 mr-auto ml-auto" style="display: inline;" @click="clearData()">Clear Search</button>
                    <div class="text-center">
                    </div>
                </filter-component>

            </div>

        </div>
 
        <!-- Main Content -->
        <div class="col-lg-9 col-12 pl-lg-4">
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-3">
                        
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="h4 col-12 pl-0">Total Subscribers / (Unsubscribers)</h3>
                    <div style="font-size: 48px;">{{ $num_subscribers }} / ({{ $num_unsubscribers }})</div>
                    <h3 class="h4 col-12 pl-0">Subscribers Growth</h3>
                    <div id="growthContainer" style="height: 370px; width: 100%;"></div>
                    <!-- div class="table-responsive">
                        <results-component 
                        suppress-initial-fetch
                        endpoint="{{route('subscriber.filter', ['application' => isset($app->id) ? $app->id : 0])}}" v-slot="{items}">
                        
                        <p v-if="!items.length"><strong>No Results. Please use Search.</strong></p>

                        <b-table hover bordered :items="items" ref="table">

                        <template #cell(id)="item">
                            @{{item.item.id}}
                        </template>

                        <template #cell(email)="item">
                            <a :href="'/subscriber/' + item.item.id">@{{item.item.email}}</a>
                        </template>

                        <template #cell(subscribed_at)="item">
                            @{{item.item.subscribed_at}}
                        </template>

                        <template #cell(unsubscribed_at)="item">
                            @{{item.item.unsubscribed_at}}
                        </template>
                        
                        </b-table>
                    
                        </results-component>
                    </div -->
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

<!--
@section('scripts')
<script>
    $(function() {
        $("#select_application").on('change', function() {
            var app_id = $(this).val();
            var redirect_url;
            if (app_id != 0) {
                // Redirect to the Application view page for Categories
                redirect_url = "{{ route('dashboard') }}/application/" + app_id;
            } else {
                // Redirect to main Subscriber page
                redirect_url = "{{ route('dashboard') }}";
            }
            window.location.href = redirect_url;
        });
    });

</script>
@endsection
-->
