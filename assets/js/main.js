import { toggleDarkMode } from "./modules/toggleDarkMode.js";
import { darkModeUpdateState } from "./modules/darkModeUpdateState.js";

function handleRoomSelect()
{
   const roomSelectForms = document.querySelectorAll('#categories form');
   roomSelectForms.forEach(form => {
      form.querySelector('select').addEventListener('change', function () {
         if (this.value !== "") {
            form.submit();
         }
      })
   });
}

function handleDarkMode()
{
   if (window.localStorage.getItem('darkMode') === null) {
      window.localStorage.setItem('darkMode', 'off');
   }
   darkModeUpdateState();
   const toggleSwitchDarkMode = document.getElementById('toggleSwitchDarkMode');
   if (window.localStorage.getItem('darkMode') === 'on') {
      toggleSwitchDarkMode.checked = true;
   }
   toggleSwitchDarkMode.addEventListener('change', toggleDarkMode);
}

function main()
{
   handleDarkMode();
   handleRoomSelect();
}

window.addEventListener('DOMContentLoaded', () =>
{
   main();
})