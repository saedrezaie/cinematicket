<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Test Tailwind</title>
</head>
<body>
    <div class="bg-purple-200" >
        <div>
            <nav>
                <div>
                    <h1 class=" font-Custom2 uppercase font-semibold p-4 border-b-2 border-yellow-700 text-yellow-500 sm:text-rose-500 md:text-primary text-2xl">
                        <a href="#">First Navbar</a>
                    </h1>
                </div>
                <ul>
                    <li>
                        <a href="#"><span>Home</span></a>
                    </li>
                    <li>
                        <a href="#"><span>About</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Contact</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <main class="px-16 py-6">
            <div class="flex justify-left md:justify-end">
                <a class="hover:bg-amber-600 hover:text-white font-semibold bg-amber-200 font-serif uppercase text-amber-900 rounded-full text-xl border-4 border-amber-600 py-2 px-2 mr-2" href="{{route("web.register")}}">Register</a>
                <a class="hover:bg-amber-600 hover:text-white font-semibold bg-amber-200 font-serif uppercase text-amber-900 rounded-full text-xl border-4 border-amber-600 py-2 px-2" href="{{route("web.login")}}">Login</a>
            </div>

            <header>
                <h2 class="pt-6 font-semibold uppercase text-blue-600 text-2xl">Recipes</h2>
                <h3 class="font-semibold uppercase text-blue-600 text-2xl">For Everyone</h3>
            </header>

            <div>
                <h4 class="mt-10 pb-2 border-b-2 border-yellow-700">Latest Recipes</h4>
                <div class="pt-6">
                    <!-- Cards -->
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBuRXe7gJVtj1OdQ_6J9vodJMU-SB9ZjFdUg&usqp=CAU" alt="avatar">
                        <div>
                            <span>Rice and Kebab</span>
                            <span>Recipes by Saeed</span>
                        </div>
                    </div>
                </div>

                <h4 class="mt-10 pb-2 border-b-2 border-yellow-700">Most Popular</h4>
                <div class="pt-6">
                    <!-- Cards -->
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBuRXe7gJVtj1OdQ_6J9vodJMU-SB9ZjFdUg&usqp=CAU" alt="avatar">
                        <div>
                            <span>Rice and Kebab</span>
                            <span>Recipe by Saeed</span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="hover:bg-amber-600 hover:text-white font-serif text-amber-900 bg-amber-200 rounded-full border-4 border-amber-600 uppercase font-bold py-1 px-3">Load More</div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
