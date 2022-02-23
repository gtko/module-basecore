@props([
    'name',
    'label',
    'value',
    'height' => '150',
    'livewire' => true,
    'variableData' => []
])

@php
    $id = str_replace('.', '_', $name);
@endphp

@if($livewire)

    @php
        $jsonData = [];
        foreach($variableData as $id => $variable ){
                $jsonData[] = [
                    'id' => $id,
                    'name' =>  $variable['value'],
                    'title' => '{' . $variable['value'] . '}',
                    'description' => $variable['description'],
                ];
        }
    @endphp

    <div
        x-data="{'content' : $wire.entangle('{{ $name }}').defer}"
        x-init="() => {
            console.log('CONTENT', content);

            const PLACEHOLDERS = {{ Illuminate\Support\Js::from($jsonData) }};
            CKEDITOR.addCss('span > .cke_placeholder { background-color: #ffeec2; }');

            const editor = CKEDITOR.replace('{{ $name }}', {
              plugins: 'autocomplete,textmatch,toolbar,wysiwygarea,basicstyles,link,undo,placeholder',
              toolbar: [
                {
                  name: 'document',
                  items: ['Undo', 'Redo']
                },
                {
                  name: 'basicstyles',
                  items: ['Bold', 'Italic']
                },
                {
                  name: 'links',
                  items: ['Link', 'Unlink']
                }
              ],
              on: {
                change :  function(evt) {
                    @this.set('{{$name}}', evt.editor.getData(), true);
                },
                instanceReady: (evt) => {
                   var itemTemplate = `<li data-id='{id}'>
                    <div><strong class='item-title'>{title}</strong></div>
                    <div><i>{description}</i></div>
                    </li>`,
                   @verbatim
                        outputTemplate = '{title}<span>&nbsp;</span>';
                    @endverbatim
                   var autocomplete = new CKEDITOR.plugins.autocomplete(evt.editor, {
                        textTestCallback: textTestCallback,
                        dataCallback: dataCallback,
                        itemTemplate: itemTemplate,
                        outputTemplate: outputTemplate
                    });
                   // Override default getHtmlToInsert to enable rich content output.
                   autocomplete.getHtmlToInsert = function(item) {
                      return this.outputTemplate.output(item);
                   }
               }
            },
            removeButtons: 'PasteFromWord'
    });

    Livewire.on('changeWysiwyg', () => {
        editor.setData(content);
    })

    function textTestCallback(range) {
        if (!range.collapsed) {
        return null;
        }

        return CKEDITOR.plugins.textMatch.match(range, matchCallback);
    }

    function matchCallback(text, offset) {
        var pattern = /[{]([A-z]|[}])*$/;
        match = text.slice(0, offset)
        .match(pattern);

        if (!match) {
            return null;
        }

        return {
            start: match.index,
            end: offset
        };
    }

    function dataCallback(matchInfo, callback) {
        var data = PLACEHOLDERS.filter(function(item) {
            var itemName = '{' + item.name + '}';
            return itemName.indexOf(matchInfo.query.toLowerCase()) == 0;
        });

        callback(data);
    }

    }"
        wire:ignore
        {{ $attributes->whereDoesntStartWith('wire:model') }}
    >
        <x-basecore::inputs.textarea :name="$name" {{ $attributes->only(['wire:model']) }} :label="$label">{!! $value ?? '' !!}</x-basecore::inputs.textarea>
    </div>
@else
    <x-basecore::inputs.textarea :name="$name" {{ $attributes->only(['wire:model']) }}  :label="$label">{!! $value ?? '' !!}</x-basecore::inputs.textarea>
@endif

<style>
    .trumbowyg-editor, .trumbowyg-box{
        min-height:{{$height}}px;
    }
</style>

@push('scripts')
    @if(!$livewire)
            <script>
                $('#{{$id}}').trumbowyg('destroy');
                $('#{{$id}}').trumbowyg({
                    btns: [['undo', 'redo'], ['bold', 'italic', 'underline', 'strikethrough'], ['link'], ['unorderedList'],],
                    autogrow: true,
                    lang: 'fr',
                });
            </script>
    @endif
@endpush
