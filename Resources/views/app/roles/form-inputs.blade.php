@php $editing = isset($role) @endphp

<div class="flex flex-wrap">
    <x-basecore::inputs.group class="w-full">
        <x-basecore::inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $role->name : '')) }}"
        ></x-basecore::inputs.text>
    </x-basecore::inputs.group>

    <div class="px-4 my-4">
        <h4 class="font-bold text-lg text-gray-700">
            Assign @lang('crud.permissions.name')
        </h4>

        <div class="py-2">
            @foreach ($permissions as $permission)
            <div>
                <x-basecore::inputs.checkbox
                    id="permission{{ $permission->id }}"
                    name="permissions[]"
                    label="{{ ucfirst($permission->name) }}"
                    value="{{ $permission->id }}"
                    :checked="isset($role) ? $role->hasPermissionTo($permission) : false"
                    :add-hidden-value="false"
                ></x-basecore::inputs.checkbox>
            </div>
            @endforeach
        </div>
    </div>
</div>
