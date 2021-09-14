<div {{ $attributes->merge(['class' => 'breadcrumb mr-auto hidden sm:flex']) }}>
    <a href="/">
        <x-basecore::icon-label icon="home" label="Home" size="16"/>
    </a>
    @if(isset($slot) && !empty($slot->toHtml()))
        {{ $slot }}
    @endif
</div>
