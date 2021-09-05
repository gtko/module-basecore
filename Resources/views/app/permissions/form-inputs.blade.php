@php $editing = isset($permission) @endphp

<div class="flex flex-wrap">
    <x-basecore::inputs.group class="w-full">
        <x-basecore::inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $permission->name : '')) }}"
        ></x-basecore::inputs.text>
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
                    :checked="isset($permission) ? $role->hasPermissionTo($permission) : false"
                    :add-hidden-value="false"
                ></x-basecore::inputs.checkbox>
            </div>
            @endforeach
        </div>
    </div>
</div>
