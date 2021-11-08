
<script>
    let {{$name}} = function(){
        console.log( {!! json_encode($items) !!})
        return {
            count: 0,
            items : {!! json_encode($items) !!},
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
    <button type="button" x-on:click="add()">Ajouter</button>
    <template x-for="(item, index) in items">
        <div>
            {{$slot}} <button type="button" x-on:click="remove(index)">Delete</button>
        </div>
    </template>

</div>
