
<script>
    let {{$name}} = function(){
        return {
            count: 1,
            items : {!! json_encode($items) !!},
            init(){
               if(this.items.length === 0){
                   this.add();
               }
            },
            remove(index){
                console.log(index)
                this.items = this.items.filter((value, key) => {
                    return key !== index
                })
            },
            add(){
                this.items.push('');
            }

        }
    };
</script>

<div x-data="{{$name}}">
    <button type="button" x-on:click="add()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center mt-4 ml-2">

        @icon('addCircle', null)
        <span>{{ $btn ?? 'Ajouter'}}</span>
    </button>
    <template x-for="(item, index) in items">
        <div class="flex flex-row items-center">
            {{$slot}} <button type="button" class="hover:text-red-700 max-h-3" x-on:click="remove(index)"> @icon('delete', null, 'mr-2 mt-3')</button>
        </div>
    </template>

</div>
