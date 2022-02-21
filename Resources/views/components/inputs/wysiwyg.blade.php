@props([
    'name',
    'label',
    'value',
    'height' => '150',
    'livewire' => true
])

@if($livewire)
    <div
        x-data="{'content' : $wire.entangle('{{ $name }}')}"
        x-init="() => {
            let updateUser = false;
            let id = '{{$name}}'.replace('.', '_');
            $('#'+id).trumbowyg('destroy');
            $('#'+id).trumbowyg({
                btns: [['undo', 'redo'], ['bold', 'italic', 'underline', 'strikethrough'], ['link'], ['unorderedList'],],
                autogrow: true,
                lang: 'fr',
            }).on('tbwchange', function () {
                updateUser = true
                @this.set('{{$name}}', $(this).trumbowyg('html'))
            });

            $watch('content', (value, oldValue) => {
                if(!updateUser) {
                    $('#'+id).trumbowyg('html', value);
                }

                updateUser = false;
            })

        }"
        wire:ignore
        {{ $attributes->whereDoesntStartWith('wire:model') }}
    >
        <x-basecore::inputs.textarea :name="$name" :label="$label">{!! $value ?? '' !!}</x-basecore::inputs.textarea>
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
    @if(!$livewire)
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
