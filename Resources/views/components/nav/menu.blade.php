<div {{$attributes->merge(['class' => "nav nav-tabs flex-col sm:flex-row justify-center lg:justify-start"])}} role="tablist">
    {{$slot ?? ''}}
</div>
