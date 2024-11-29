<x-app-layout>
  <form action="{{ route('registrar.store-student') }}">
    @csrf
    {{-- Student Number Input Field --}}
    <div>
      <x-input-label for="student_number" :value="__('Student Number')" />
      <x-text-input id="student_number" class="block mt-1 w-full" type="text" name="student_number" :value="old('student_number')"
        required autofocus autocomplete="student_number" />
      <x-input-error :messages="$errors->get('student_number')" class="mt-2" />
    </div>

    {{-- Last Name Input Field --}}
    <div>
      <x-input-label for="last_name" :value="__('Last Name')" />
      <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required
        autofocus autocomplete="last_name" />
      <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    {{-- First Name Input Field --}}
    <div>
      <x-input-label for="first_name" :value="__('First Name')" />
      <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
        required autofocus autocomplete="first_name" />
      <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    {{-- Middle Name Input Field --}}
    <div>
      <x-input-label for="middle_name" :value="__('Middle Name')" />
      <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')"
        required autofocus autocomplete="middle_name" />
      <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
    </div>

    {{-- Contact Number Input Field --}}
    <div>
      <x-input-label for="contact_number" :value="__('Contact Number')" />
      <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number"
        :value="old('contact_number')" required autofocus autocomplete="contact_number" />
      <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
    </div>

    <!-- Program Dropdown -->
    <div class="mt-4">
      <x-input-label for="program" :value="__('Program')" />
      <select id="program" name="program"
        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        @foreach ($programs as $program)
          <option value="{{ $program->description }}" {{ old('program') == $program->description ? 'selected' : '' }}>
            {{ ucfirst($program->description) }}
          </option>
        @endforeach
      </select>
      <x-input-error :messages="$errors->get('program')" class="mt-2" />
    </div>

  </form>
</x-app-layout>
