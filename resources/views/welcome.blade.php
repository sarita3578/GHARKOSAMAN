<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to GharKoSaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CSS CDN for modern minimalist design -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-800">

    <!-- Header -->
    <header class="p-6 shadow-sm bg-white sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-600">GharKoSaman</h1>
            <nav class="space-x-4">
                <a href="/products" class="text-gray-700 hover:text-green-600">Products</a>
                <a href="/login" class="text-gray-700 hover:text-green-600">Login</a>
                <a href="/register" class="text-gray-700 hover:text-green-600">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="text-center py-20 bg-green-50">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">Fast Delivery in Pokhara</h2>
        <p class="text-lg text-gray-600 mb-8 max-w-xl mx-auto">
            Your daily essentials delivered instantly — no more waiting for 2-3 days like other platforms.
        </p>
        <a href="/products" class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition">Shop Now</a>
    </section>

    <!-- Features -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 text-center">
            <div>
                <div class="text-green-600 text-4xl mb-2">🚚</div>
                <h3 class="text-xl font-semibold">Instant Delivery</h3>
                <p class="text-gray-600 mt-2">Get your goods delivered within hours inside Pokhara.</p>
            </div>
            <div>
                <div class="text-green-600 text-4xl mb-2">🛒</div>
                <h3 class="text-xl font-semibold">Non-perishable Items</h3>
                <p class="text-gray-600 mt-2">All your dry groceries, personal care, and household items.</p>
            </div>
            <div>
                <div class="text-green-600 text-4xl mb-2">💳</div>
                <h3 class="text-xl font-semibold">Easy Payments</h3>
                <p class="text-gray-600 mt-2">Pay via Cash on Delivery or digital wallets.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-100 text-center p-6 text-sm text-gray-500">
        &copy; {{ date('Y') }} GharKoSaman. Made with ❤️ in Pokhara.
    </footer>

</body>
</html>
