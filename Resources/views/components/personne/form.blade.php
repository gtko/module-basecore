<div class="flex flex-wrap">
    <div class="w-full">
        <div class="grid grid-cols-2">
            <x-basecore::inputs.group>
                <x-basecore::inputs.text
                    name="firstname"
                    label="Prénom"
                    value="{{ old('firstname', ($editing ? $personne->firstName : '')) }}"
                    maxlength="255"
                    required
                ></x-basecore::inputs.text>
            </x-basecore::inputs.group>
            <x-basecore::inputs.group>
                <x-basecore::inputs.text
                    name="lastname"
                    label="Nom"
                    value="{{ old('lastname', ($editing ? $personne->lastName : '')) }}"
                    maxlength="255"
                ></x-basecore::inputs.text>
            </x-basecore::inputs.group>
            <x-basecore::inputs.group class="">
                <x-basecore::inputs.date
                    name="date_birth"
                    label="Date de naissance"
                    value="{{ old('date_birth', ($editing ? optional($personne->dateBirth)->format('Y-m-d') : '')) }}"
                    max="255"
                ></x-basecore::inputs.date>
            </x-basecore::inputs.group>
            <x-basecore::inputs.group class="">
                <x-basecore::inputs.select name="gender" label="Genre">
                    @php $selected = old('gender', ($editing ? $personne->gender : 'male')) @endphp
                    <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Homme</option>
                    <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Femme</option>
                    <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Autre</option>
                </x-basecore::inputs.select>
            </x-basecore::inputs.group>
        </div>
        <x-basecore::inputs.group>
            <x-basecore::inputs.text
                name="address"
                label="Adresse"
                value="{{ old('address', ($editing ? $personne->address : ''))}}"
                maxlength="255"
                required
            ></x-basecore::inputs.text>
        </x-basecore::inputs.group>
        <div class="grid grid-cols-3">
            <x-basecore::inputs.group>
                <x-basecore::inputs.text
                    name="city"
                    label="Ville"
                    value="{{ old('city', ($editing ? $personne->city : '')) }}"
                    maxlength="255"
                    required
                ></x-basecore::inputs.text>
            </x-basecore::inputs.group>
            <x-basecore::inputs.group>
                <x-basecore::inputs.text
                    name="code_zip"
                    label="Code postal"
                    value="{{ old('code_zip', ($editing ? $personne->codeZip : '')) }}"
                    maxlength="255"
                    required
                ></x-basecore::inputs.text>
            </x-basecore::inputs.group>
            <x-basecore::inputs.group>
                <x-basecore::inputs.select name="country_id" label="Pays" required>
                    @php $selected = old('country_id', ($editing ? $personne->personne->address->country_id : '150')) @endphp
                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Choisissez votre pays</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $selected == $country->id ? 'selected' : '' }} >{{ $country->name }}</option>
                    @endforeach
                </x-basecore::inputs.select>
            </x-basecore::inputs.group>
        </div>
        <div class="grid grid-cols-2">
            <x-basecore::inputs.group>
                <x-basecore::inputs.text
                    name="phone"
                    label="Téléphone"
                    value="{{ old('phone', ($editing ? $personne->phone : '')) }}"
                    maxlength="255"
                    required
                ></x-basecore::inputs.text>
            </x-basecore::inputs.group>

            <x-basecore::inputs.group>
                <x-basecore::inputs.email
                    name="email"
                    label="Email"
                    value="{{ old('email', ($editing ? $personne->email : '')) }}"
                    maxlength="255"
                    required
                ></x-basecore::inputs.email>
            </x-basecore::inputs.group>
        </div>
    </div>
</div>
