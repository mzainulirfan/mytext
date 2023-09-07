$("#createUserAccount").on("shown.bs.modal", function () {
  $(this).find("[autofocus]").focus();
});
// custom.js
document
  .getElementById("perPageSelect")
  .addEventListener("change", function () {
    document.getElementById("perPageForm").submit();
  });
