<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

    
        
                    <div>
                        <x-label for="name" value="{{ __('Nome') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="phone" value="{{ __('Telefone') }}" />
                        <x-input id="phoneInput" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" placeholder="(xx) xxxxx-xxxx" required autocomplete="phone" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Senha') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirme a Senha') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <div class="mt-4">
                        <x-label for="cep" value="{{ __('CEP') }}" />
                        <x-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required autocomplete="cep" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="logradouro" value="{{ __('Logradouro') }}" />
                        <x-input id="logradouro" class="block mt-1 w-full" type="text" name="logradouro" :value="old('logradouro')" required autocomplete="logradouro" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="nmr-casa" value="{{ __('Número') }}" />
                        <x-input id="nmr-casa" class="block mt-1 w-full" type="text" name="nmr-casa" :value="old('nmr-casa')" required autocomplete="nmr-casa" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="bairro" value="{{ __('Bairro') }}" />
                        <x-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" required autocomplete="bairro" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="complemento" value="{{ __('Complemento') }}" />
                        <x-input id="complemento" class="block mt-1 w-full" type="text" name="complemento" :value="old('complemento')" autocomplete="complemento" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="referencia" value="{{ __('Referência') }}" />
                        <x-input id="referencia" class="block mt-1 w-full" type="text" name="referencia" :value="old('referencia')" autocomplete="referencia" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="apelido" value="{{ __('Apelido') }}" />
                        <x-input id="apelido" class="block mt-1 w-full" type="text" name="apelido" :value="old('apelido')" autocomplete="apelido" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="cidade" value="{{ __('Cidade') }}" />
                        <x-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')" required autocomplete="cidade" />
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="estado" value="{{ __('Estado') }}" />
                        <x-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required autocomplete="estado" />
                    </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Ja está cadastrado ?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('cep').addEventListener('blur', function() {
            var cep = this.value.replace(/\D/g, '');
            if (cep.length !== 8) return;

            fetch('https://viacep.com.br/ws/' + cep + '/json/')
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;
                        // Preencha outros campos conforme necessário
                    } else {
                        alert('CEP não encontrado.');
                    }
                })
                .catch(error => {
                    console.error('Erro ao obter dados do ViaCEP:', error);
                });
        });
    });
</script>
