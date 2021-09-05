@php $editing = isset($phone) @endphp

<div class="flex flex-wrap">
    <x-basecore::inputs.group class="w-full">
        <x-basecore::inputs.text
            name="phone"
            label="Phone"
            value="{{ old('phone', ($editing ? $phone->phone : '')) }}"
            maxlength="255"
            required
        ></x-basecore::inputs.text>
    </x-basecore::inputs.group>
</div>
