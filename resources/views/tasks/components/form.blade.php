<form class="w-full max-w-lg" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                {{ __('validation.attributes.title') }}
            </label>
            <input name="title" id="title" placeholder="Title" value="{{ old('title') ?? ($task?->title ?? '') }}"
                class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white 
                {{ $errors->has('title') ? 'border-red-500' : '' }}"
                type="text">
            @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="due_date">
                {{ __('validation.attributes.due_date') }}
            </label>
            <input name="due_date" id="due_date" placeholder="due_date"
                value="{{ old('due_date') ?? ($task?->due_date ?? '') }}"
                class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white 
                {{ $errors->has('due_date') ? 'border-red-500' : '' }}"
                type="date">
            @error('due_date')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full px-3 relative" data-te-input-wrapper-init id="basic">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                {{ __('validation.attributes.category_id') }}
            </label>
            <select name="category_id" id="category_id"
                class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white
                    {{ $errors->has('category_id') ? 'border-red-500' : '' }}
                ">
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') || (isset($task) && $task->category_id == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="user">
                {{ __('validation.attributes.user_id') }}
            </label>
            <select name="user_id" id="user_id"
                class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white
                    {{ $errors->has('user_id') ? 'border-red-500' : '' }}
                ">
                <option value=""></option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('user_id') || (isset($task) && $task->user_id == $user->id) ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
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
