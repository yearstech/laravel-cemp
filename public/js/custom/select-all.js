function selectAllCheckboxes(selectAllSelector, checkboxSelector, buttonSelectors) {
    // Select the main "select-all" checkbox, individual checkboxes, and buttons
    const selectAllCheckbox = document.querySelector(selectAllSelector);
    const checkboxes = document.querySelectorAll(
        checkboxSelector.startsWith('.') || checkboxSelector.startsWith('#') ? checkboxSelector : `.${checkboxSelector}`
    );
    const buttons = buttonSelectors.map(sel => {
        if (sel.startsWith('.')) {
            return [...document.querySelectorAll(sel)];
        } else if (sel.startsWith('#')) {
            const element = document.getElementById(sel.slice(1));
            return element ? [element] : [];
        } else {
            return [...document.querySelectorAll(`.${sel}`)];
        }
    }).flat();

    // Store original button text to prevent chaining of selected count
    buttons.forEach(button => {
        if (!button.hasAttribute('data-original-text')) {
            button.setAttribute('data-original-text', button.innerText);
        }
    });

    // Function to check if any checkbox is selected, toggle button states, and update button text
    const toggleButtons = () => {
        const selectedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
        const anyChecked = selectedCount > 0;

        buttons.forEach(button => {
            button.disabled = !anyChecked;
            button.innerText = `${button.getAttribute('data-original-text')} (${selectedCount})`;
        });
    };

    // Toggle all checkboxes when the select-all checkbox is clicked
    selectAllCheckbox.addEventListener('change', () => {
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        toggleButtons(); // Update button states based on the new selection
    });

    // Add event listeners to individual checkboxes to update buttons when checked/unchecked
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            // Uncheck the select-all box if any checkbox is unchecked
            if (!checkbox.checked) {
                selectAllCheckbox.checked = false;
            }
            // Check if all checkboxes are selected to update the select-all box
            if (Array.from(checkboxes).every(checkbox => checkbox.checked)) {
                selectAllCheckbox.checked = true;
            }
            toggleButtons(); // Update button states based on the selection
        });
    });

    // Initial toggle for button states on page load
    toggleButtons();
}