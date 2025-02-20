<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Événements</title>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="/public/assets/js/script.js"></script>
    
</head>
<body class="bg-white text-gray-900">
    <!-- Sidebar -->
    @yield('constant')   
    <div class="bg-white shadow-md rounded-md p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Ajouter une nouvelle catégorie</h2>
        <form action="{{ route('category.store') }}" method="POST" class="flex items-center gap-4">
            @csrf
            <input type="text" name="category_name" placeholder="Entrez le nom de la catégorie"  

                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                   @error('category_name') <div style="color: red;">{{ $message }}</div> @enderror

            <button type="submit"  name="add_category" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Ajouter
            </button>
        </form>
    </div>
</body>
</html>