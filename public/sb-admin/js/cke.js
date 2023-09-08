ClassicEditor.create(document.querySelector("#content"), {
  toolbar: {
    items: [
      "bold",
      "italic",
      "bulletedList",
      "numberedList",
      "blockQuote",
      "|", // Ini adalah pemisah
      "undo",
      "redo",
      "|", // Ini adalah pemisah
      "indent",
      "outdent",
      "|", // Ini adalah pemisah
      "newLine",
    ],
  },
  // Set jumlah baris awal (rows) di sini
  editorConfig: {
    // Jumlah baris yang ingin Anda tampilkan
    height: "15em", // Anda bisa mencoba '15rem' atau '15px' juga
  },
}).catch((error) => {
  console.error(error);
});
ClassicEditor.create(document.querySelector("#preview"), {
  toolbar: {
    items: [
      "bold",
      "italic",
      "bulletedList",
      "numberedList",
      "blockQuote",
      "|", // Ini adalah pemisah
      "undo",
      "redo",
      "|", // Ini adalah pemisah
      "indent",
      "outdent",
      "|", // Ini adalah pemisah
      "newLine",
    ],
  },
  // Set jumlah baris awal (rows) di sini
  editorConfig: {
    // Jumlah baris yang ingin Anda tampilkan
    height: "15em", // Anda bisa mencoba '15rem' atau '15px' juga
  },
}).catch((error) => {
  console.error(error);
});
