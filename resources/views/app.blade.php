<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @routes
    @vite('resources/js/app.js')
    @inertiaHead

    <script>
        // Function to toggle dark/light mode
        const toggleDarkMode = () => {
            // Toggle dark mode class on the root element
            console.log("Toggling dark mode");
            document.documentElement.classList.toggle('dark');

            // Save user preference to local storage
            const isDarkMode = document.documentElement.classList.contains('dark');
            localStorage.setItem('darkMode', isDarkMode);
        };

        // Function to initialize dark mode
        const initializeDarkMode = () => {
            console.log("Initializing dark mode");
            
            // Check if dark mode preference is stored in local storage
            const storedDarkMode = localStorage.getItem('darkMode');
            console.log("Stored dark mode value:", storedDarkMode);
            
            // Check if storedDarkMode is null or 'true'
            const isDarkMode = storedDarkMode === 'true' || storedDarkMode === null;
            
            // Toggle dark mode class on the root element based on preference
            document.documentElement.classList.toggle('dark', isDarkMode);

            console.log("Dark mode class toggled:", isDarkMode);

            // If 'darkMode' is null, set it to default to dark mode
            if (storedDarkMode === null) {
                localStorage.setItem('darkMode', 'true');
                console.log("Default dark mode preference saved to local storage");
            }
        };

        // Call initializeDarkMode function when the document is loaded
        document.addEventListener('DOMContentLoaded', () => {
            console.log("DOMContentLoaded event fired");
            initializeDarkMode();
        });
    </script>
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
