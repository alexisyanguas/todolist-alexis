<form class="w-full max-w-lg" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __('validation.attributes.name') }}
            </label>
            <input name="name" id="name" placeholder="Nom" value="{{ old('name') ?? ($category?->name ?? '') }}"
                class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white 
                {{ $errors->has('name') ? 'border-red-500' : '' }}"
                type="text">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="color">
                {{ __('validation.attributes.color') }}
            </label>
            <input name="color" id="color" placeholder="Couleur"
                value="{{ old('color') ?? ($category?->color ?? '') }}"
                class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 h-16 leading-tight focus:outline-none focus:bg-white 
                {{ $errors->has('color') ? 'border-red-500' : '' }}"
                type="color">
            @error('color')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full px-3 relative" data-te-input-wrapper-init id="basic">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                {{ __('validation.attributes.icon') }}
            </label>
            <select name="icon" id="icon"
                class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white
                    {{ $errors->has('icon') ? 'border-red-500' : '' }}
                ">
                <option value=""></option>
                @foreach ($icons as $icon)
                    <option value="{{ $icon }}"
                        {{ old('icon') || (isset($category) && $category->icon == $icon) ? 'selected' : '' }}>
                        {{ $icon }}
                    </option>
                @endforeach
            </select>
            @error('icon')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <button type="submit"
                class="
                border rounded py-2 px-4 bg-white hover:bg-gray-50 focus:outline-none focus:bg-gray-50
                ">
                {{ $title }}
            </button>
        </div>
    </div>
</form>
