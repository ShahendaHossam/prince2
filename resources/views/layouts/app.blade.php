<x-layouts.base>


    @if(in_array(request()->route()->getName(), ['dashboard', 'profile', 'profile-example', 'users', 'bootstrap-tables', 'transactions',
    'buttons',
    'forms', 'modals', 'notifications', 'typography', 'upgrade-to-pro','business_case.index','business_case.create','business_case.edit'
    ,'bc_approval.create','bc_approval.edit','note.create','note.edit','costs_and_benefits.create','costs_and_benefits.edit',
    'plan.index','plan.create','plan.edit','approval.create','approval.edit','objective.create','objective.edit','product.create',
    'product.edit','monitor_prerequisities.create','monitor_prerequisities.edit','schedule.create','schedule.edit','business_case.show' ,'plan.show']))

    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        {{ $slot }}
        {{-- Footer --}}
        @include('layouts.footer')
    </main>

    @elseif(in_array(request()->route()->getName(), ['register', 'register-example', 'login', 'login-example',
    'forgot-password', 'forgot-password-example', 'reset-password','reset-password-example']))

    {{ $slot }}
    {{-- Footer --}}
    @include('layouts.footer2')


    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

    {{ $slot }}

    @endif

</x-layouts.base>