<div class="flex flex-wrap">
    <div class="w-full">

        <div class="grid grid-cols-2">
            <x-basecore::disabled :disabled="$disabledFields" field-name="firstname">
                <x-basecore::inputs.group>
                    <x-basecore::inputs.text
                        name="firstname"
                        label="Prénom"
                        value="{{ old('firstname', ($editing ? $personne->firstName : '')) }}"
                        maxlength="255"
                        :required="in_array('firstname', $requiredFields)"
                    />
                </x-basecore::inputs.group>
            </x-basecore::disabled>
            <x-basecore::disabled :disabled="$disabledFields" field-name="lastname">
                <x-basecore::inputs.group>
                    <x-basecore::inputs.text
                        name="lastname"
                        label="Nom"
                        value="{{ old('lastname', ($editing ? $personne->lastName : '')) }}"
                        maxlength="255"
                        :required="in_array('lastname', $requiredFields)"
                    />
                </x-basecore::inputs.group>
            </x-basecore::disabled>
            <x-basecore::disabled :disabled="$disabledFields" field-name="date_birth">
                <x-basecore::inputs.group class="">
                    <x-basecore::inputs.date
                        name="date_birth"
                        label="Date de naissance"
                        value="{{ old('date_birth', ($editing ? optional($personne->dateBirth)->format('Y-m-d') : '')) }}"
                        max="255"
                        :required="in_array('date_birth', $requiredFields)"
                    />
                </x-basecore::inputs.group>
            </x-basecore::disabled>
            <x-basecore::disabled :disabled="$disabledFields" field-name="gender">
                <x-basecore::inputs.group class="">
                    <x-basecore::inputs.select name="gender" label="Genre"
                      :required="in_array('gender', $requiredFields)"
                    >
                        @php $selected = old('gender', ($editing ? $personne->gender : 'male')) @endphp
                        <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Homme</option>
                        <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Femme</option>
                        <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Autre</option>
                    </x-basecore::inputs.select>
                </x-basecore::inputs.group>
            </x-basecore::disabled>
            <x-basecore::disabled :disabled="$disabledFields" field-name="address">
                <x-basecore::inputs.group>
                    <x-basecore::inputs.text
                        name="address"
                        label="Adresse"
                        value="{{ old('address', ($editing ? $personne->address : ''))}}"
                        maxlength="255"
                        :required="in_array('address', $requiredFields)"
                    />
                </x-basecore::inputs.group>
            </x-basecore::disabled>
            <x-basecore::disabled :disabled="$disabledFields" field-name="city">
                <x-basecore::inputs.group>
                    <x-basecore::inputs.text
                        name="city"
                        label="Ville"
                        value="{{ old('city', ($editing ? $personne->city : '')) }}"
                        maxlength="255"
                        :required="in_array('city', $requiredFields)"
                    />
                </x-basecore::inputs.group>
            </x-basecore::disabled>
            <x-basecore::disabled :disabled="$disabledFields" field-name="code_zip">
                <x-basecore::inputs.group>
                    <x-basecore::inputs.text
                        name="code_zip"
                        label="Code postal"
                        value="{{ old('code_zip', ($editing ? $personne->codeZip : '')) }}"
                        maxlength="255"
                        :required="in_array('code_zip', $requiredFields)"
                    />
                </x-basecore::inputs.group>
            </x-basecore::disabled>
            <x-basecore::disabled :disabled="$disabledFields" field-name="country_id">
                <x-basecore::inputs.group>
                    <x-basecore::inputs.select name="country_id" label="Pays"
                     :required="in_array('country_id', $requiredFields)"
                    >
                        @php $selected = old('country_id', ($editing ? $personne->personne->address?->country_id : '150')) @endphp
                        <option disabled {{ empty($selected) ? 'selected' : '' }}>Choisissez votre pays</option>
                        @foreach($countries as $country)
                            <option
                                value="{{ $country->id }}" {{ $selected == $country->id ? 'selected' : '' }} >{{ $country->name }}</option>
                        @endforeach
                    </x-basecore::inputs.select>
                </x-basecore::inputs.group>
            </x-basecore::disabled>



            <x-basecore::disabled :disabled="$disabledFields" field-name="phone">
                <x-basecore::list-inputs name="phones"
                                         :btn="'Ajouter un téléphone'"
                                         :items="old('phone',($editing ? $personne->personne->phones->pluck('phone')->toArray() : []))">
                    <x-basecore::inputs.group class="w-full">
                        <x-basecore::inputs.text
                            name="phone[]"
                            label="Téléphone"
                            x-model="items[index]"
                            maxlength="255"
                            :required="in_array('phone', $requiredFields)"
                        />
                    </x-basecore::inputs.group>
                </x-basecore::list-inputs>
            </x-basecore::disabled>

            <x-basecore::disabled :disabled="$disabledFields" field-name="email">
                <x-basecore::list-inputs name="emails"
                                         :btn="'Ajouter un mail'"
                                         :items="old('email',($editing ? $personne->personne->emails->pluck('email')->toArray() : []))">
                    <x-basecore::inputs.group class="w-full">
                        <x-basecore::inputs.email
                            name="email[]"
                            label="Email"
                            x-model="items[index]"
                            maxlength="255"
                            :required="in_array('email', $requiredFields)"
                        />
                    </x-basecore::inputs.group>
                </x-basecore::list-inputs>
            </x-basecore::disabled>

        </div>
    </div>
</div>
