<label for="{{ $nama }}" class="block mb-2 text-sm md:text-lg font-medium text-gray-800">{{ $judul }}</label>
<textarea id="{{ $nama }}" name="{{ $nama }}" rows="4"
    class="block px-3 py-2 w-full text-sm text-gray-800 bg-gray-100 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 resize-none"
    placeholder="{{ empty($value) ? $placeholder : '' }}" required>{{ $value ?? '' }}</textarea>
