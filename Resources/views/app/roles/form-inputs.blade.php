@php $editing = isset($role) @endphp

<div class="flex flex-wrap">
    <x-basecore::inputs.group class="w-full">
        <x-basecore::inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $role->name : '')) }}"
        ></x-basecore::inputs.text>
    </x-basecore::inputs.group>

    <div class="w-full px-4 my-4">
        <h4 class="font-bold text-lg text-gray-700">
            Assign @lang('crud.permissions.name')
        </h4>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 w-full">
            @foreach ($permissions as $permission)
                <div class="w-full border border-dashed py-2 px-4 bg-blue-100">
                    <div class="mb-2 font-bold">{{ ucfirst($permission['name']) }}</div>
                    <div class="w-full grid grid-cols-3 md:grid-cols-2 gap-2 items-center">
                        @foreach($permission['perms'] as $perms)
                            <x-basecore::inputs.checkbox
                                id="permission{{ $perms['model']->id }}"
                                name="permissions[]"
                                label="{{ ucfirst($perms['name']) }}"
                                value="{{ $perms['model']->id }}"
                                :checked="isset($role) ? $role->hasPermissionTo($perms['model']) : false"
                                :add-hidden-value="false"
                            />
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
