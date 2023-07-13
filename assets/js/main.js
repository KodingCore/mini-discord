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

function handleCategoriesDisplay() {
   const categories = document.querySelectorAll('#categories li');
   categories.forEach(li => {
      li.addEventListener('click', () => {
         const select = li.querySelector('select');
         // supposé cliquer sur select mais tjrs en reflexion
      })
   })
}

function main()
{
   handleDarkMode();
   handleRoomSelect();
   handleCategoriesDisplay();
}

window.addEventListener('DOMContentLoaded', () =>
{
   main();
})