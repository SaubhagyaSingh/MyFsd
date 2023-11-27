const express = require("express");
const bodyParser = require("body-parser");
const app = express();
const port = 3000;

app.use(bodyParser.json());

let data = [
  { id: 1, name: "Saubhagya" },
  { id: 2, name: "Sourab" },
];

// Read (GET all items)
app.get("/items", (req, res) => {
  res.json(data);
});

// Read (GET one item by ID)
app.get("/items/:id", (req, res) => {
  const itemId = parseInt(req.params.id);
  const item = data.find((item) => item.id === itemId);

  if (item) {
    res.json(item);
  } else {
    res.status(404).json({ message: "Item not found" });
  }
});

// Create (POST)
app.post("/items", (req, res) => {
  const newItem = req.body;
  data.push(newItem);
  res.status(201).json(newItem);
});

// Update (PUT)
app.put("/items/:id", (req, res) => {
  const itemId = parseInt(req.params.id);
  const updatedItem = req.body;

  data = data.map((item) => (item.id === itemId ? updatedItem : item));

  res.json(updatedItem);
});

// Patch (PATCH)
app.patch("/items/:id", (req, res) => {
  const itemId = parseInt(req.params.id);
  const updatedFields = req.body;

  // Find the item by ID
  const itemToUpdate = data.find((item) => item.id === itemId);

  // If the item is found, update the specified fields
  if (itemToUpdate) {
    for (const key in updatedFields) {
      if (Object.hasOwnProperty.call(updatedFields, key)) {
        itemToUpdate[key] = updatedFields[key];
      }
    }

    res.json(itemToUpdate);
  } else {
    res.status(404).json({ message: "Item not found" });
  }
});

// Delete (DELETE)
app.delete("/items/:id", (req, res) => {
  const itemId = parseInt(req.params.id);
  data = data.filter((item) => item.id !== itemId);
  res.json({ message: "Item deleted" });
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
