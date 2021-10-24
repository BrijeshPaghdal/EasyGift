"use strict";
$(function () {
  //Textare auto growth
  autosize($("textarea.auto-growth"));

  //flatpicker date and time picker
  flatpickr("#myDatePicker", {
    dateFormat: "n/j/Y",
    allowInput: true,
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });
  flatpickr("#myDateTimePicker", {
    dateFormat: "n/j/Y H:i",
    enableTime: true,
    allowInput: true,
  });
  flatpickr("#myTimePicker", {
    dateFormat: "H:i",
    enableTime: true,
    allowInput: true,
    noCalendar: true,
  });
  flatpickr("#myDateRange", {
    mode: "range",
    minDate: "today",
    dateFormat: "Y-m-d",
    disable: [
      function (date) {
        // disable every multiple of 8
        return !(date.getDate() % 8);
      },
    ],
  });
  flatpickr("#myMultiSelectDate", {
    mode: "multiple",
    dateFormat: "Y-m-d",
    defaultDate: ["2019-10-20", "2019-11-04"],
  });
  flatpickr("#myDisableDate", {
    disable: ["2019-08-30", "2019-09-21", "2019-10-08", new Date(2025, 4, 9)],
    dateFormat: "Y-m-d",
  });

  //Datetimepicker plugin
  $(".datetimepicker").bootstrapMaterialDatePicker({
    format: "dddd DD MMMM YYYY - HH:mm",
    clearButton: true,
    weekStart: 1,
  });

  $(".datepicker").bootstrapMaterialDatePicker({
    format: "dddd DD MMMM YYYY",
    clearButton: true,
    weekStart: 1,
    time: false,
  });
  $(".datepicker2").bootstrapMaterialDatePicker({
    format: "DD MMMM YYYY",
    clearButton: true,
    weekStart: 1,
    time: false,
  });

  $(".timepicker").bootstrapMaterialDatePicker({
    format: "HH:mm",
    clearButton: true,
    date: false,
  });

  $("input#input_text, textarea#textarea2").characterCounter();
});
