<!-- BEGIN: Dark Mode Switcher-->
<span x-data="{'url' : '{{route('dark-mode-switcher')}}'}"
      @click="window.location = url"
      class="dark-mode-switcher cursor-pointer w-full flex items-center justify-between"
>
    <div class="text-gray-700 dark:text-gray-300 mr-2">Dark mode</div>
    <div class="dark-mode-switcher__toggle {{ $dark_mode ? 'dark-mode-switcher__toggle--active' : '' }} border"></div>
</span>
<!-- END: Dark Mode Switcher-->
