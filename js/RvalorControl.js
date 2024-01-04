var btnGuardarOmision = document.getElementById('save_omision');

btnGuardarOmision.addEventListener("click", function(){
    localStorage.clear();
});

function cargarValorDesdeLocalStorage(inputId) {
    const input = document.getElementById(inputId);
    const storedValue = localStorage.getItem(inputId + 'Value');
    if (storedValue) {
        input.value = storedValue;
    }
    // Escuchar cambios en el input y almacenar el valor en localStorage
    input.addEventListener('input', function () {
        const inputValue = input.value;
        localStorage.setItem(inputId + 'Value', inputValue);
    });
}
function cargarValorDesdeLocalStorageSelect(selectId) {
    const select = document.getElementById(selectId);
    const storedValue = localStorage.getItem(selectId + 'Value');

    if (storedValue) {
        select.value = storedValue;
    }

    select.addEventListener('change', function () {
        const selectValue = select.value;
        localStorage.setItem(selectId + 'Value', selectValue);
    });
}
function cargarValorDesdeLocalStorageCheckbox(checkboxId) {
    const checkbox = document.getElementById(checkboxId);
    const storedValue = localStorage.getItem(checkboxId + 'Value');

    if (storedValue) {
        checkbox.checked = JSON.parse(storedValue);
    }

    checkbox.addEventListener('change', function () {
        const checkboxValue = checkbox.checked;
        localStorage.setItem(checkboxId + 'Value', JSON.stringify(checkboxValue));
    });
}
cargarValorDesdeLocalStorageSelect('empleado');
cargarValorDesdeLocalStorageSelect('ciudad');

cargarValorDesdeLocalStorageCheckbox('Ingreso');
cargarValorDesdeLocalStorageCheckbox('Salida');

cargarValorDesdeLocalStorageCheckbox('omision-modal');
