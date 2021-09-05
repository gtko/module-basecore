<div class="intro-y grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Sidebar -->
    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
        {{ $sidebar ?? ''}}
    </div>
    <!-- END: Sidebar -->
    <div class="intro-x col-span-12 lg:col-span-8 xxl:col-span-9">
        {{ $slot }}
    </div>
</div>
