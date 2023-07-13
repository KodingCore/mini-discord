function main() {
   const roomSelectForm = document.getElementById('roomSelectForm');
   roomSelectForm.querySelector('select').addEventListener('change',function() {
      if (this.value !== "") {
         roomSelectForm.submit();
      }
   })
}

window.addEventListener('DOMContentLoaded', () => {
   main();
})