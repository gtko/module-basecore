<div class="w-full h-full flex justify-center items-center mt-24">

    <div class="bg-white lg:w-2/4 md:w-2/3 w-full p-8">
        <h4 class="text-xl font-bold text-center mt-4 mb-8">complétez votre profil pour accéder au service</h4>
        <hr class="">
        <div class="flex flex-wrap">
            <form wire:submit.prevent="store" method="POST">
                <div class="w-full">
                    <div class="grid grid-cols-2">

                        <x-basecore::inputs.group>
                            <x-basecore::inputs.select name="type" label="Vous êtes ?" wire:model="type">
                                <option value="" selected>Choisisiez un type</option>
                                <option value="particulier">Un particulier</option>
                                <option value="entreprise">Une entreprise</option>
                            </x-basecore::inputs.select>
                        </x-basecore::inputs.group>

                        @if ($type == 'entreprise')
                            <x-basecore::inputs.group>
                                <x-basecore::inputs.text
                                    name="entreprise"
                                    label="Nom de l entreprise"
                                    maxlength="255"
                                    wire:model="company_name"
                                    required
                                ></x-basecore::inputs.text>
                            </x-basecore::inputs.group>
                        @endif
                    </div>
                    <div class="grid grid-cols-2">
                        <x-basecore::inputs.group>
                            <x-basecore::inputs.text
                                name="firstname"
                                label="Prénom"
                                wire:model="firstname"
                                maxlength="255"
                                required
                            ></x-basecore::inputs.text>
                        </x-basecore::inputs.group>

                        <x-basecore::inputs.group>
                            <x-basecore::inputs.text
                                name="lastname"
                                label="Nom"
                                maxlength="255"
                                wire:model="lastname"
                            ></x-basecore::inputs.text>
                        </x-basecore::inputs.group>
                        <x-basecore::inputs.group class="">
                            <x-basecore::inputs.date
                                name="date_birth"
                                label="Date de naissance"
                                wire:model="date_birth"
                                max="255"
                            ></x-basecore::inputs.date>
                        </x-basecore::inputs.group>
                        <x-basecore::inputs.group class="">
                            <x-basecore::inputs.select name="gender" label="Genre" wire:model="gender_type">
                                @php $selected = old('gender', ($personne->gender ?? 'male')) @endphp
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
                            maxlength="255"
                            wire:model="address"
                            required
                        ></x-basecore::inputs.text>
                    </x-basecore::inputs.group>
                    <div class="grid grid-cols-3">
                        <x-basecore::inputs.group>
                            <x-basecore::inputs.text
                                name="city"
                                wire:model="city"
                                label="Ville"
                                maxlength="255"
                                required
                            ></x-basecore::inputs.text>
                        </x-basecore::inputs.group>
                        <x-basecore::inputs.group>
                            <x-basecore::inputs.text
                                name="code_zip"
                                wire:model="code_zip"
                                label="Code postal"
                                maxlength="255"
                                required
                            ></x-basecore::inputs.text>
                        </x-basecore::inputs.group>
                        <x-basecore::inputs.group>
                            <x-basecore::inputs.select name="country_id" label="Pays" required wire:model.defer="country_id">
                                @php $selected = $personne->personne->address->country_id ?? '150' @endphp
                                <option disabled {{ empty($selected) ? 'selected' : '' }}>Choisissez votre pays
                                </option>
                                @foreach($countries as $country)
                                    <option
                                        value="{{ $country->id }}" {{ $selected == $country->id ? 'selected' : '' }} >{{ $country->name }}</option>
                                @endforeach
                            </x-basecore::inputs.select>
                        </x-basecore::inputs.group>
                    </div>
                    <div class="grid grid-cols-2">
                        <x-basecore::inputs.group>
                            <x-basecore::inputs.text
                                wire:model="phone"
                                name="phone"
                                label="Téléphone"
                                maxlength="255"
                                required
                            ></x-basecore::inputs.text>
                        </x-basecore::inputs.group>

                        <x-basecore::inputs.group>
                            <x-basecore::inputs.email
                                wire:model="email"
                                name="email"
                                label="Email"
                                maxlength="255"
                                value="{{ $personne->emails->first()->email ?? '' }}"
                                disabled
                                required
                            ></x-basecore::inputs.email>
                        </x-basecore::inputs.group>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4 ml-2">save</button>
        </div>
    </div>
</div>

