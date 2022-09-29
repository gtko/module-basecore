@php $editing = isset($user) @endphp


<x-basecore::inputs.group class="w-full">
    <x-basecore::inputs.checkbox
        name="enabled"
        label="Activé"
        :checked="old('enabled', ($editing ? ($user->enabled ?? true) : true))"
        maxlength="255"
        :required="!$editing"
    />
</x-basecore::inputs.group>


<x-basecore::personne.form :editing="$editing" :personne="$user ?? null"
    :required-fields="['first_name','phone', 'email']"
/>



<div class="flex flex-wrap">
    <div class="grid grid-cols-2 w-full">

        <x-basecore::inputs.group class="w-full">
            <x-basecore::inputs.text
                name="company"
                label="Société"
                value="{{ old('company', ($editing ? ($user->data['company'] ?? '') : ''))}}"
                maxlength="255"
            />
        </x-basecore::inputs.group>
        <x-basecore::inputs.group class="w-full">
            <x-basecore::inputs.text
                name="siret"
                label="Siret"
                value="{{ old('siret', ($editing ? ($user->data['siret'] ?? '') : ''))}}"
                maxlength="255"
            />
        </x-basecore::inputs.group>
    </div>



    <x-basecore::inputs.group class="w-full">
        <x-basecore::inputs.password
            name="password"
            label="Password"
            maxlength="255"
            :required="!$editing"
        />
    </x-basecore::inputs.group>

    <div class="px-4 my-4 w-full">
        <h4 class="font-bold text-lg text-gray-700 mb-4">
            Assigner un ou plusieur rôle.
        </h4>

        <div class="grid grid-cols-3 gap-4 w-full">
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
                    x-on:change="checked=!checked"
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
