document.addEventListener("DOMContentLoaded", function() {
  if (
    document.querySelector("[toast-list]") ||
    document.querySelector("[data-choices]") ||
    document.querySelector("[data-provider]")
  ) {
    const scripts = [
      "<?php echo base_url('assets/plugins/choices.js/choices.min.js'); ?>",
      "<?php echo base_url('assets/plugins/flatpickr/flatpickr.min.js'); ?>"
    ];

    scripts.forEach(src => {
      const script = document.createElement("script");
      script.type = "text/javascript";
      script.src = src;
      script.async = true;
      script.defer = true; // ensure execution after parsing
      document.head.appendChild(script);
    });
  }
});