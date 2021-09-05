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


    <x-basecore::inputs.group class="w-full">
        <x-basecore::inputs.password
            name="password_smtp"
            label="Password STMP"
            maxlength="255"
            :required="!$editing"
        ></x-basecore::inputs.password>
    </x-basecore::inputs.group>

    <div class="px-4 my-4">
        <h4 class="font-bold text-lg text-gray-700">
            Assign @lang('crud.roles.name')
        </h4>

        <div class="py-2">
            @foreach ($roles as $role)
            <div>
                <x-basecore::inputs.checkbox
                    id="role{{ $role->id }}"
                    name="roles[]"
                    label="{{ ucfirst($role->name) }}"
                    value="{{ $role->id }}"
                    :checked="isset($user) ? $user->hasRole($role) : false"
                    :add-hidden-value="false"
                ></x-basecore::inputs.checkbox>
            </div>
            @endforeach
        </div>
    </div>
</div>
