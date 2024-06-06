@can('read_frontend')
    <div class="col-lg-7 col-md-6">

        <x-dashboard.extra.line-chart name="{{ __('Total visitors last 7 days') }}" chartName="TotalVisitorsPast7Days"
            :data="$fetchTotalVisitorsAndPageViews" :yChartName="[__('Active Users'), __('screen Page Views')]" xAxis="date" :yAxis="['activeUsers', 'screenPageViews']" />

    </div>



    <div class="col-lg-5 col-md-6">
        <x-dashboard.extra.bar-chart name="{{ __('Most Visited pages for last 7 days') }}" chartName="TotalVisitorsPaays"
            :data="$fetchVisitorsAndPageViews" :yChartName="[__('Active Users'), __('screen Page Views')]" xAxis="pageTitle" :yAxis="['activeUsers', 'screenPageViews']" />
    </div>
    <div class="col-lg-5 col-md-6">

        <x-dashboard.extra.card name="{{ __('Total visitors last 7 days') }}" class="bg-warning"
            value="{{ $fetchTotalVisitorsAndPageViews->sum('activeUsers') }}" icon="fas fa-globe" />
        <x-dashboard.extra.card name="{{ __('Total New Users') }}" class="bg-success" value="{{ $fetchUserTypes['new'] }}"
            icon="fas fa-user-plus" />
        <x-dashboard.extra.card name="{{ __('Total Returning Users') }}" class="bg-info"
            value="{{ $fetchUserTypes['returning'] }}" icon="fas fa-user-tie" />

    </div>
    <div class="col-lg-7 col-md-6">
        <x-dashboard.extra.bar-chart name="{{ __('Top Countries Visit last 7 days') }}" chartName="TopCountries"
            :data="$fetchTopCountries" yChartName="{{ __('screen Page Views') }}" xAxis="country" yAxis="screenPageViews" />
    </div>
@else
@endcan
