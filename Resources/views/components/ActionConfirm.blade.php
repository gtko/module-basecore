
@props([
        'message' => 'Êtes-vous sur de vouloir effectuer cette action ?',
        'valider' => 'Valider',
        'annuler' => 'Annuler',
        'position' => 'right'
])
<?php $idunique = 'confirm_' . md5(uniqid('confirm', true));?>
<div>
    <div id='{{$idunique}}' class="action_container">
        <div class="action-confirm">
            {{$slot}}
            <div class="action_block"></div>
        </div>
        <div class="popup__confirm @if($position === 'left') popup__confirm--left @else popup__confirm--right @endif" style="display:none">
            <span class="btn__valider btn btn-danger">{{$valider}}</span>
            <span class="btn__annuler btn btn-primary">{{$annuler}}</span>
        </div>
    </div>
    <script type="application/javascript">
        (function(){
            let valider = null;

            function actionValider(){
                valider = true;
                let elements = document.querySelectorAll("#{{$idunique}} .action-confirm *");
                for(let element of elements) {
                    element.click()
                }
                document.querySelector('#{{$idunique}} .popup__confirm').style.display = 'none';
            }

            function actionAnnuler(){
                document.querySelector('#{{$idunique}} .popup__confirm').style.display = 'none';
                valider = false;
            }

            let elements = document.querySelectorAll("#{{$idunique}} .action-confirm *");
            for(let element of elements) {
                element.addEventListener('click', function (event) {
                    document.querySelector('#{{$idunique}} .btn__valider').removeEventListener('click', actionValider);
                    document.querySelector('#{{$idunique}} .btn__annuler').removeEventListener('click', actionAnnuler);

                    if (valider !== true) {
                        event.stopPropagation();
                        event.stopImmediatePropagation();
                    } else {
                        valider = false;
                    }
                    document.querySelector('#{{$idunique}} .popup__confirm').style.display = 'flex';

                    document.querySelector('#{{$idunique}} .btn__valider').addEventListener('click', actionValider);
                    document.querySelector('#{{$idunique}} .btn__annuler').addEventListener('click', actionAnnuler);
                });
            }
        })()
    </script>
</div>

