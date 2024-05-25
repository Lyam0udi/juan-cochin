// darkModeToggle.js

// Function to toggle dark/light mode
const toggleDarkMode = () => {
    // Toggle dark mode class on the root element
    document.documentElement.classList.toggle('dark');
  
    // Save user preference to local storage
    const isDarkMode = document.documentElement.classList.contains('dark');
    localStorage.setItem('darkMode', isDarkMode);
  };
  
  // Function to initialize dark mode
  const initializeDarkMode = () => {
    // Enable dark mode by default
    document.documentElement.classList.add('dark');
  };
  
  // Call initializeDarkMode function when the document is loaded
  document.addEventListener('DOMContentLoaded', initializeDarkMode);
  
  // Export the toggleDarkMode function to use it in other files
  export { toggleDarkMode };
  