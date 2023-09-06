$("#staticBackdrop").on("shown.bs.modal", function () {
  $(this).find("[autofocus]").focus();
});
