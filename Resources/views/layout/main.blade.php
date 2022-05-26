@extends('basecore::layout.base')

@section('body')
    <body class="main">
        @livewireScripts

        <x-jet-banner />
        @yield('content')

        <div id="modals">
            @stack('modals')
        </div>



        <!-- BEGIN: JS Assets-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js" integrity="sha512-t4CFex/T+ioTF5y0QZnCY9r5fkE8bMf9uoNH2HNSwsiTaMQMO0C9KbKPMvwWNdVaEO51nDL3pAzg4ydjWXaqbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ mix('dist/js/theme.js') }}"></script>
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        <div id="push">
            @stack('scripts')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

        @if (session()->has('success'))
            <script>
                const notyf = new Notyf({dismissible: true, duration : 3000})
                notyf.success('{{ session('success') }}')
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                const notyf = new Notyf({dismissible: true, duration : 10000})
                notyf.error('{{ session('error') }}')
            </script>
        @endif

        <script>
            /* Simple Alpine Image Viewer */
            function imageViewer(src = '') {
                return {
                    imageUrl: src,

                    refreshUrl() {
                        this.imageUrl = this.$el.getAttribute("image-url")
                    },

                    fileChosen(event) {
                        this.fileToDataUrl(event, src => this.imageUrl = src)
                    },

                    fileToDataUrl(event, callback) {
                        if (! event.target.files.length) return

                        let file = event.target.files[0],
                            reader = new FileReader()

                        reader.readAsDataURL(file)
                        reader.onload = e => callback(e.target.result)
                    },
                }
            }

            var i = 0;
            document.addEventListener("turbo:load", function () {
                console.log(i++);
            });
        </script>

    @if((new Modules\BaseCore\Entities\Features())->available('turbolink'))
        <script>
        let loaderTimer = null;

        function loaderOn() {
            clearTimeout(loaderTimer)
            loaderTimer = setTimeout(function () {
                $('.gload').show()
            }, 400)
        }

        function loaderOff() {
            clearTimeout(loaderTimer)
            $('.gload').hide()
        }

        function interceptLink() {
            jQuery('a:not(.ignore-link)').off('click', ajaxificationLink)
            jQuery('a:not(.ignore-link)').on('click', ajaxificationLink)
        }


        function loadScript(script) {
            return new Promise((resolve, reject) => {
                let newScript = document.createElement("script");
                if (script.src) {
                    newScript.addEventListener('load', function () {
                        resolve();
                    })
                    newScript.src = script.src;
                } else {
                    newScript.innerHTML = script.innerHTML;

                    resolve();
                }
                document.getElementById('push').appendChild(newScript);
            })
        }

        function ajaxificationLink(e) {
            let node = e.target
            if (e.target.nodeName !== 'A') {
                node = $(this).closest('a')[0]
            }

            /** Gestion des liens du menu **/
            if ($(node).closest('#menu')) {
                $(node).closest('#menu').find('.active').removeClass('active');
                $(node).closest('.nav-item').addClass('active');
            }

            if (node.href != '' && (node.href.indexOf('javascript') === -1)) {
                window.Livewire.emit('root:before-render');
                renderLink(node.href)

                e.stopPropagation()
                e.preventDefault()
                return false
            }
        }


        function renderLink(location, back = false) {
            loaderOn()

            let url = location;
            fetch(location).then(function (response) {
                if (response.redirected) {
                    url = response.url
                }

                return  response.text();
            }).then(function (response) {
                var parser = new DOMParser();
                var doc = parser.parseFromString(response, "text/html");

                // document.getElementById('pushCss').innerHTML = ''
                // document.getElementById('pushCss').innerHTML = doc.getElementById('pushCss').innerHTML

                document.querySelector('.content').classList = doc.querySelector('.content').classList;

                document.getElementById('wrapperContent').innerHTML = ''
                document.getElementById('wrapperContent').innerHTML = doc.getElementById('wrapperContent').innerHTML

                document.getElementById('wrapperHeader').innerHTML = ''
                document.getElementById('wrapperHeader').innerHTML = doc.getElementById('wrapperHeader').innerHTML

                document.getElementById('main-menu-navigation').innerHTML = ''
                document.getElementById('main-menu-navigation').innerHTML = doc.getElementById('main-menu-navigation').innerHTML

                document.getElementById('mobile-menu').innerHTML = ''
                document.getElementById('mobile-menu').innerHTML = doc.getElementById('mobile-menu').innerHTML

                document.getElementById('modals').innerHTML = ''
                document.getElementById('modals').innerHTML = doc.getElementById('modals').innerHTML

                document.getElementById('push').innerHTML = ''

                let scripts = doc.getElementById('push').querySelectorAll('script');
                let p = Promise.resolve()
                for (let script of scripts) {
                    p = p.then(_ => loadScript(script));
                }

                document.body.className = doc.body.className;
                if (!back) {
                    history.pushState({}, '', url)
                    // Corrige duplication des images dans le components médiaUpload
                }

                //window.Livewire.rescan(); //<< bug image mais permet de garder les event livewire activé
                // (car le rescan ne supprime pas le components  livewire coté JS du coup conflict event en live)
                window.Livewire.restart();
                window.Livewire.emit('root:after-render');

                linkJS();
                interceptLink()
                loaderOff();

            }).catch(function (err) {

                console.log(err)

                loaderOff();
                const notyf = new Notyf({dismissible: true})
                notyf.error('Une erreur ' + err.status + ' a été déclenché');
                window.location = location
            });
        }

        function clickList() {
            $('[data-click]').each(function () {
                var $th = $(this);
                $th.on('click', function () {
                    window.open($th.attr('data-click'));
                });
            });
        }

        function linkJS() {
            $('[data-href]').on('click', function () {
                renderLink($(this).data('href'));
            })
            clickList();
        }


        function Ajaxification() {
            window.onpopstate = function (event) {
                renderLink(document.location, true)
            };
            interceptLink()
            linkJS()
        }


        Ajaxification();
    </script>
    @endif
    </body>
@endsection
