@props([
    'name',
    'label',
    'value',
    'height' => '150',
    'livewire' => true
])

@if($livewire)
    <div
        x-data="{'content' : $wire.entangle('{{ $name }}').defer}"
        x-init="() => {
            let updateUser = false;
            let id = '{{$name}}'.replace('.', '_');
            $('#'+id).trumbowyg('destroy');
            $('#'+id).trumbowyg({
                btns: [['undo', 'redo'], ['bold', 'italic', 'underline', 'strikethrough'], ['link'], ['unorderedList'],],
                autogrow: true,
                lang: 'fr',
            })
            .on('tbwinit', function(){
                let mentionify = $(this).closest('.wrapper-mentionify').length > 0;
                if(mentionify){
                    let editor = $(this).closest('.trumbowyg-box').find('.trumbowyg-editor');
                    window.addMentionify((mention) => {
                        console.log('Add event', editor, mention);
                        editor[0].addEventListener('focus', (e) => {
                            e.target.value = e.target.innerText;
                            console.log('Focus', e);
                            mention.focus(e)
                        })

                        editor[0].addEventListener('input', (e) => {
                            e.target.selectionStart = window.getCaretpos(e.target)
                            console.log('Caret', e.target.selectionStart, window.getCaretpos(e.target));
                            e.target.value = e.target.innerText;
                            console.log('Change', e);
                            console.log('change editable')
                        })
                    });
                }
            })
            .on('tbwchange', function (e) {
                updateUser = true
                let value = $(this).trumbowyg('html')
                console.log('change', value)
                @this.set('{{$name}}',value , true)
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
