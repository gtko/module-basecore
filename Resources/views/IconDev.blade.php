@extends('basecore::layout.main')
@section('head')
    <title>Icon Page</title>
@endsection

@section('content')
    <div class="bg-white h-screen flex flex-col justify-center items-center">
        <h2 class="mb-3 text-xl text-purple-700">Icons Library BaseCore</h2>
        <div class="grid grid-cols-8">
            @foreach($icons as $name => $svg)
                <div onclick="copy('{{$name}}', this)"
                     class="relative p-4 flex flex-col justify-center items-center hover:bg-gray-200 rounded-lg cursor-pointer"
                >
                    @icon($name, 34, 'text-black')
                    {{$name}}
                </div>
            @endforeach
        </div>

        @verbatim
            <script>
                function copy(name, elem) {
                    let code = "@icon('"+name+"', null, 'mr-2')"
                    copyToClipboard(code);

                    let textNode = document.createElement('div');
                    textNode.innerHTML = '<div class="copied absolute text-xs text-green-600  top-1.5 right-1.5">Copied !</div>'
                    elem.appendChild(textNode)
                    setTimeout(() => {
                        textNode.remove();
                    }, 2000);
                }

                function copyToClipboard(textToCopy) {
                    // navigator clipboard api needs a secure context (https)
                    if (navigator.clipboard && window.isSecureContext) {
                        // navigator clipboard api method'
                        return navigator.clipboard.writeText(textToCopy);
                    } else {
                        // text area method
                        let textArea = document.createElement("textarea");
                        textArea.value = textToCopy;
                        // make the textarea out of viewport
                        textArea.style.position = "fixed";
                        textArea.style.left = "-999999px";
                        textArea.style.top = "-999999px";
                        document.body.appendChild(textArea);
                        textArea.focus();
                        textArea.select();
                        return new Promise((res, rej) => {
                            // here the magic happens
                            document.execCommand('copy') ? res() : rej();
                            textArea.remove();
                        });
                    }
                }
            </script>
        @endverbatim
    </div>
@endsection
