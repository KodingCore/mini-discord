function darkModeUpdateState() {
   const state = window.localStorage.getItem('darkMode');
   if (state === 'on') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
   } else {
      document.documentElement.setAttribute('data-bs-theme', 'light');
   }
}
export { darkModeUpdateState };