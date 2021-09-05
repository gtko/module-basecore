@props([
    'name',
    'label',
    'value',
    'height' => '150',
    'livewire' => true
])

@if($livewire)
<div wire:ignore>
    <x-basecore::inputs.textarea :name="$name" :label="$label" wire:model.lazy="{{$name}}">{!! $value ?? '' !!}</x-basecore::inputs.textarea>
</div>
@else
    <x-basecore::inputs.textarea :name="$name" :label="$label">{!! $value ?? '' !!}</x-basecore::inputs.textarea>
@endif

<style>
    .trumbowyg-editor, .trumbowyg-box{
        min-height:{{$height}}px;
    }
</style>


@push('scripts')
    @if($livewire)
        <script>
        (function () {
            var $timeout = 0;

            function restart() {
                clearTimeout($timeout)
                $timeout = setTimeout(function () {
                    $('#{{$name}}').trumbowyg('destroy');
                    $('#{{$name}}').trumbowyg({
                        btns: [['undo', 'redo'], ['bold', 'italic', 'underline', 'strikethrough'], ['link'], ['unorderedList'],],
                        autogrow: true,
                        lang: 'fr',
                    }).on('tbwchange', function () {
                            @this.
                            set('{{$name}}', $(this).trumbowyg('html'));
                    });
                }, 200)
            }
            restart()
        })()
    </script>
    @else
        <script>
            $('#{{$name}}').trumbowyg('destroy');
            $('#{{$name}}').trumbowyg({
                btns: [['undo', 'redo'], ['bold', 'italic', 'underline', 'strikethrough'], ['link'], ['unorderedList'],],
                autogrow: true,
                lang: 'fr',
            });
        </script>
    @endif

@endpush
