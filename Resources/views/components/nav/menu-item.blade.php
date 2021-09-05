<a x-on:click="tab='{{$name}}'" href="javascript:;" class="py-4 sm:mr-8 flex items-center"
   x-bind:class="{'active' : tab === '{{$name}}'}"
   role="tab" aria-controls="dossier" aria-selected="true">
   {{$slot}}
</a>
