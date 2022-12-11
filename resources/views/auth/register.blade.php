<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('اسم المستخدم')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('الرقم السري')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('تأكيد الرقم السري')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <label class="block mt-4">
                <x-label for="role" :value="__('الصلاحيات')" />
                <select
                  name="role"
                  class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                >
                  <option value="admin">صلاحية كاملة</option>
                  <option value="entry">ادخال البيانات</option>
                  <option value="editor">تعديل البيانات</option>
                  <option value="editor_entry">تعديل وادخال البيانات</option>
                </select>
            </label>


            <div class="flex items-center justify-end mt-4">
            
                <x-button class="ml-4">
                    {{ __('انشاء مستخدم جديد') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
