<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- username -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Username') }}" />
            <input type="text" class="form-input w-full mt-1 block" wire:model.defer='state.username' readonly>
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
            <x-jet-input id="tanggal_lahir" type="date" class="mt-1 block w-full" wire:model.defer="state.tanggal_lahir"/>
            <x-jet-input-error for="tanggal_lahir" class="mt-2" />
        </div>
        {{-- Alamat --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
            <x-jet-input id="alamat" type="text" class="mt-1 block w-full" wire:model.defer="state.alamat"/>
            <x-jet-input-error for="alamat" class="mt-2" />
        </div>
        {{-- Pendidikan --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="pendidikan" value="{{ __('Pendidikan') }}" />
            <select id="pendidikan" class="form-input w-full" wire:model.defer='state.pendidikan'>
                <option hidden>Pilih Pendidikan</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="Sarjana">Sarjana</option>
                <option value="Magister">Magister</option>
            </select>
            <x-jet-input-error for="pendidikan" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
