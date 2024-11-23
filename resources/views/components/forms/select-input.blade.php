<div class="mb-5">
    <label for="{{ $nama }}"
        class="block mb-2 text-sm md:text-lg font-medium text-gray-800">{{ $judul }}</label>
    <select id="{{ $nama }}" name="{{ $nama }}"
        class="bg-gray-100 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-3">
        <option selected>{{ $judul }}</option>
        @foreach ($datas as $data)
            <option value="{{ $data }}">{{ $data }}</option>
        @endforeach
    </select>
</div>
