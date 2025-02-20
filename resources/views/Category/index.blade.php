
@extends('layouts.front')

@section('constant')
   


<div class="bg-white shadow-md rounded-md p-6">
    <h2 class="text-xl font-semibold mb-4">Liste des catégories</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category) 
          
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">{{ $category->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center flex justify-center gap-2">
                    <!-- Edit Button (Trigger Modal) -->
                    <a href="{{ route('category.edit',$category->id)}}" class="edit-btn px-4 py-2 rounded-md hover:bg-yellow-600">
                        <i class="fas fa-edit text-yellow-500"></i>
                    </a>

                    <!-- Delete Form -->
                    <form action="{{ route('category.destroy',$category->id)}}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="category_id" value="silfa data">
                        <button type="submit"  type="submit" name="delete_category" 
                                class="delete-btn px-4 py-2 rounded-md hover:bg-red-600">
                            <i class="fas fa-trash text-red-500"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection