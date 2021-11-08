
<script>

    let {{$name}} = function(){

        return { count: 0 }
    };

</script>

<div x-data="{{$name}}">
    <span x-on:click="count--">Decrement</span>
    <code>count: </code><code x-text="count"></code>
    <span x-on:click="count++">Increment</span>
</div>
