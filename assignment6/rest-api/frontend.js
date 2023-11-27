document.addEventListener("DOMContentLoaded", function () {
  const itemsList = document.getElementById("itemsList");
  const createForm = document.getElementById("createForm");

  // Function to fetch and display items
  function fetchItems() {
    fetch("http://localhost:3000/items")
      .then((response) => response.json())
      .then((items) => {
        itemsList.innerHTML = ""; // Clear the list
        items.forEach((item) => {
          const listItem = document.createElement("li");
          listItem.className = "item";
          listItem.textContent = `${item.name} (ID: ${item.id})`;
          itemsList.appendChild(listItem);
        });
      })
      .catch((error) => console.error("Error fetching items:", error));
  }

  // Function to handle form submission
  createForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const itemName = document.getElementById("itemName").value;

    fetch("http://localhost:3000/items", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ name: itemName }),
    })
      .then((response) => response.json())
      .then((newItem) => {
        console.log("Item created:", newItem);
        fetchItems(); // Refresh the items list
      })
      .catch((error) => console.error("Error creating item:", error));

    // Clear the form
    document.getElementById("itemName").value = "";
  });

  // Initial fetch of items
  fetchItems();
});
