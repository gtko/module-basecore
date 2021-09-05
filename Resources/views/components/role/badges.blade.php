<div>
    @forelse ($roles as $role)
        <div
            class="inline-block
                           p-1
                           text-center text-sm
                           rounded
                           bg-blue-400
                           text-white
                    "
        >
            {{ $role->name ?? '-'}}
        </div>
    @empty - @endforelse
</div>
