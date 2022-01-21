@php $editing = isset($role) @endphp

<div class="flex flex-wrap">
    <x-basecore::inputs.group class="w-full">
        <x-basecore::inputs.text
            name="name"
            label="Nom"
            value="{{ old('name', ($editing ? $role->name : '')) }}"
        ></x-basecore::inputs.text>
    </x-basecore::inputs.group>

    <div class="px-4 my-4">
        <h4 class="font-bold text-lg text-gray-700 mb-4">
            Attribuer les permissions
        </h4>

        <div class="grid grid-cols-3 lg:grid-cols-4 gap-4 w-full">
            @foreach ($permissions as $permission)
                <div class="border border-dashed py-2 px-4" x-data="{checked:'{{isset($role) ? $role->hasPermissionTo($permission) : false}}'}"
                     x-bind:class="{'bg-blue-100' : checked}">
                <x-basecore::inputs.checkbox
                    id="permission{{ $permission->id }}"
                    name="permissions[]"
                    label="{{ ucfirst($permission->name) }}"
                    value="{{ $permission->id }}"
                    :checked="isset($role) ? $role->hasPermissionTo($permission) : false"
                    :add-hidden-value="false"
                    x-on:change="checked=!checked"
                ></x-basecore::inputs.checkbox>
            </div>
            @endforeach
        </div>
    </div>
</div>
