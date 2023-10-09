// JavaScript to add and delete products dynamically
function addProduct() {
  // Clone the product selection div
  const productSelection = document.querySelector('.product-selection');
  const newProductSelection = productSelection.cloneNode(true);

  // Clear the selected product and quantity
  newProductSelection.querySelector('select').selectedIndex = 0;
  newProductSelection.querySelector('input[type="number"]').value = '';

  // Update the name attribute of the cloned select element
  const selectElement = newProductSelection.querySelector('select');
  const newName = 'product[]'; // Use the same name as in the original select
  selectElement.setAttribute('name', newName);


  // Append the cloned div to the form
  const addButton = document.querySelector('.add-product-button');
  addButton.parentNode.insertBefore(newProductSelection, addButton);
}
