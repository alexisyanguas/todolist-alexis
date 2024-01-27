@extends('components.table')

@section('header')
    <div class="w-full md:w-1/2">
    </div>
    <div
        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
        <a href="{{ route('tasks.create') }}"
            class="flex items-center justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 :bg-primary-600 :hover:bg-primary-700 focus:outline-none :focus:ring-primary-800">
            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
            Créer une tâche
        </a>
    </div>
@endsection

@section('head')
    <tr>
        <th scope="col" class="px-4 py-4">Titre</th>
        <th scope="col" class="px-4 py-4">Date d'échéance</th>
        <th scope="col" class="px-4 py-4">Categorie</th>
        <th scope="col" class="px-4 py-4">Utilisateur</th>
        <th scope="col" class="px-4 py-4 flex justify-end">Actions</th>
    </tr>
@endsection

@section('body')
    @if ($tasks->isEmpty())
        <tr>
            <td colspan="5" class="px-4 py-4 text-center">Aucune tâche n'a été créée.</td>
        </tr>
    @else
        @foreach ($tasks as $task)
            <tr class="border-b :border-gray-700">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                    {{ $task?->title }}
                </th>
                <td class="px-4 py-3 text-gray-500 :text-gray-400">
                    {{ $task?->due_date_formatted }}
                </td>
                <td class="px-4 py-3 text-gray-500 :text-gray-400 flex items-center">
                    <i class="fas mr-2 {{ $task?->category?->icon }}" style="color: {{ $task?->category?->color }} "></i>
                    {{ $task?->category?->name }}
                </td>
                {{-- <td class="px-4 py-3 text-gray-500 :text-gray-400 flex items-center">
                    @foreach ($task->tags as $tag)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                            style="background-color: {{ $tag?->color }};
                                    color: {{ $tag?->text_color }}">
                            {{ $tag?->name }}
                        </span>
                    @endforeach
                </td> --}}
                <td class="px-4 py-3 text-gray-500 :text-gray-400">
                    <div class="flex items-center gap-2">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full"
                                src="{{ $task?->user?->avatar ?? 'https://ui-avatars.com/api/?name=' . $task?->user?->name }}"
                                alt="">
                        </div>
                        {{ $task?->user?->name }}
                    </div>
                </td>
                <td class="px-4 py-3 flex items-center justify-end">
                    <a href="{{ route('tasks.edit', $task) }}"
                        class="flex items-center py-2 px-4 hover:bg-gray-100 :hover:bg-gray-600 :hover:text-white text-gray-700 :text-gray-200">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path d=" M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                        </svg>
                        Modifier
                    </a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 :hover:bg-gray-600 text-red-500 :hover:text-red-400">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
@endsection

@section('count')
    @if (!$tasks->isEmpty())
        <span class="text-sm font-normal text-gray-500 :text-gray-400">
            <span class="hidden sm:inline-block sm:align-middle">
                {{ $tasks->firstItem() }} -
                {{ $tasks->lastItem() }}
                of
                {{ $tasks->total() }}
            </span>
            <span>
                {{ $tasks->links('pagination::tailwind') }}
            </span>
        </span>
    @endif
@endsection
