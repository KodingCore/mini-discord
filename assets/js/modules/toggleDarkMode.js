import { darkModeUpdateState } from "./darkModeUpdateState.js";
function toggleDarkMode()
{
    const darkModeEnabled = window.localStorage.getItem('darkMode') === 'on';
    if (darkModeEnabled) {
        window.localStorage.setItem('darkMode','off');
    } else {
        window.localStorage.setItem('darkMode','on');
    }
    darkModeUpdateState();
}

export { toggleDarkMode };