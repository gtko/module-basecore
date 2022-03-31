<div {{$attributes->merge(['class' => "nav overflow-auto space-x-4 nav-tabs flex-row justify-start lg:justify-start -mt-4"])}} role="tablist">
    {{$slot ?? ''}}
</div>
