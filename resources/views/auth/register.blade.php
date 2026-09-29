<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black text-white uppercase italic tracking-tighter">
            Nueva <span class="text-red-600">Cuenta</span>
        </h2>
        <p class="text-slate-500 text-[10px] uppercase tracking-widest mt-2">Regístrate en la red Dealer Castilla</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label class="text-slate-400 text-[10px] font-bold uppercase mb-2 ml-1 block">Nombre Completo</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus class="guest-input rounded-xl w-full p-3" placeholder="Ej: Juan Valladolid">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label class="text-slate-400 text-[10px] font-bold uppercase mb-2 ml-1 block">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required class="guest-input rounded-xl w-full p-3" placeholder="juan@dealer.es">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-slate-400 text-[10px] font-bold uppercase mb-2 ml-1 block">Contraseña</label>
                <input id="password" type="password" name="password" required class="guest-input rounded-xl w-full p-3" placeholder="••••••••">
            </div>
            <div>
                <label class="text-slate-400 text-[10px] font-bold uppercase mb-2 ml-1 block">Confirmar</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="guest-input rounded-xl w-full p-3" placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="col-span-2 mt-1" />
        </div>

        <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white font-black uppercase text-sm tracking-widest rounded-xl transition-all shadow-lg shadow-red-900/20">
            Crear Cuenta
        </button>
    </form>
</x-guest-layout>