<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        @if ($schedule)
        <livewire:vote.voting :schedule="$schedule"/>
        @else
        <p class="font-semibold text-center">Data Pemilihan Belum ada !</p>
        @endif
    </div>
    @push('custom-scripts')
    <script>
        var publicKey = {!! json_encode($publicKey) !!};

        var errors = {
        key_already_used: "{{ trans('webauthn::errors.key_already_used') }}",
        key_not_allowed: "{{ trans('webauthn::errors.key_not_allowed') }}",
        not_secured: "{{ trans('webauthn::errors.not_secured') }}",
        not_supported: "{{ trans('webauthn::errors.not_supported') }}",
        };

        function errorMessage(name, message) {
        switch (name) {
        case 'InvalidStateError':
            return errors.key_already_used;
        case 'NotAllowedError':
            return errors.key_not_allowed;
        default:
            return message;
        }
        }

        function error(message) {
            $('#error').text(message).removeClass('d-none');
        }

        var webauthn = new WebAuthn((name, message) => {
            error(errorMessage(name, message));
        });

        if (! webauthn.webAuthnSupport()) {
            switch (webauthn.notSupportedMessage()) {
                case 'not_secured':
                error(errors.not_secured);
                break;
                case 'not_supported':
                error(errors.not_supported);
                break;
            }
        }

        function startSign(id){
            webauthn.sign(
            publicKey,
            function (data) {
                axios.post("{{ route('webauthn.auth') }}", data)
                .then(function (response) {
                    if(response.data.result == true){
                        window.livewire.emit('webauthnSuccess', id);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            );
        }
    </script>
    @endpush
</x-app-layout>