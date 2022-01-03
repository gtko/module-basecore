@php $editing = isset($user) @endphp

<x-basecore::personne.form :editing="$editing" :personne="$user ?? null"/>

<div class="flex flex-wrap">
    <x-basecore::inputs.group class="w-full">
        <x-basecore::inputs.password
            name="password"
            label="Password"
            maxlength="255"
            :required="!$editing"
        ></x-basecore::inputs.password>
    </x-basecore::inputs.group>

    <div class="px-4 my-4">
        <h4 class="font-bold text-lg text-gray-700 mb-4">
            Assigner un ou plusieur rôle.
        </h4>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($roles as $role)
            <div class="border border-dashed py-2 px-4" x-data="{checked:'{{isset($user) ? $user->hasRole($role) : false}}'}"
                 x-bind:class="{'bg-blue-100' : checked}">
                <x-basecore::inputs.checkbox
                    id="role{{ $role->id }}"
                    name="roles[]"
                    label="{{ ucfirst($role->name) }}"
                    value="{{ $role->id }}"
                    :checked="isset($user) ? $user->hasRole($role) : false"
                    :add-hidden-value="false"
                    x-model="checked"
                />
            </div>
            @endforeach
        </div>
        <div class="mt-2">
        @error("roles")
            @include('basecore::components.inputs.partials.error')
        @enderror
        </div>
    </div>
</div>
