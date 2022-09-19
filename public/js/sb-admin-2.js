(function ($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function () {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function (e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  $(document).ready(function () {
    var url = window.location;
    // Will only work if string in href matches with location
    $('.navbar-nav li a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
    $('.navbar-nav li a').filter(function () {
      return this.href == url;
    }).parent().addClass('active').parent().parent().addClass('active');

  });

  $(document).ready(function () {
    $("#flash-messages").click(function () { $(this).hide() });
  });

  /*pilih status*/
  $('input[name=status]').click(function () {
    if (this.id == "mahasiswa") {
      $("#mahasiswaunj").show('slow');
      document.getElementById("status_pendaftar").value = "mahasiswa";
      document.getElementById("nim").required = true;
      document.getElementById("jenjang").required = true;
      document.getElementById("prodi").required = true;
      document.getElementById("angkatan").required = true;
    }
    else {
      $("#mahasiswaunj").hide('slow');
      document.getElementById("status_pendaftar").value = "umum";
      document.getElementById("nim").required = false;
      document.getElementById("jenjang").required = false;
      document.getElementById("prodi").required = false;
      document.getElementById("angkatan").required = false;
    }
  });

  /*pilih site*/
  // $('input[name=site]').click(function () {
  //   if (this.id == "Online") {
  //     document.getElementById("status_pendaftar").value = "mahasiswa";
  //   }
  //   else {
  //     document.getElementById("status_pendaftar").value = "umum";
  //   }
  // });

  $(function () {
    $('#datetimepicker').datetimepicker({

    });
  });
  $(function () {
    $('#datetimepickeruser').datetimepicker({
      onGenerate: function (ct) {
        jQuery(this).find('.xdsoft_date')
          .toggleClass('xdsoft_disabled');
        jQuery(this).find('.xdsoft_date.xdsoft_weekend')
          .addClass('xdsoft_disabled');
      },
      maxDate: '0',
      allowTimes: [
        '09:00', '13:00',
      ],
    });
  });

  $(function () {
    $('#typeOnSite1').hide();
    $('#typeOnline1').hide();
    $('#type1').change(function () {
      if (this.value == "PBT") {
        $('#typeOnSite1').show('slow');
        $('#typeOnline1').hide('slow');
      } else {
        $('#typeOnSite1').hide('slow');
        $('#typeOnline1').show('slow');
      }
    });
  });
  $(function () {
    $('#typeOnSite2').hide();
    $('#typeOnline2').hide();
    $('#type2').change(function () {
      switch (this.value) {
        case "PBT":
          $('#typeOnSite2').show('slow');
          $('#typeOnline2').hide('slow');
          break;
        case "CBT":
          $('#typeOnSite2').hide('slow');
          $('#typeOnline2').show('slow');
          break;
        default:
          break;
      }
    });
  });

  $(function () {
    $('#paymentmethod1').change(function () {
      $('.1payments').not("." + this.value).hide();
      $('#1pm-' + $(this).val()).show('slow');
    });
  });
  $(function () {
    $('#paymentmethod2').change(function () {
      $('.2payments').not("." + this.value).hide();
      $('#2pm-' + $(this).val()).show('slow');
    });
  });

  $(document).ready(function () {
    $('#calendar').fullCalendar({
      editable: true,
      selectable: true,
      header: {
        left: 'prev,next,today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      disableResizing: true,
      events: base_url + "home/load",
      timeFormat: 'H:mm',
      contentHeight: "auto",
      handleWindowResize: true,
      eventClick: function (event) {
        var start = moment(event.start).format('DD/MM/YYYY hh:mm');
        alert(event.title + " " + start + "\r" + "Kuota tersisa: " + event.kuota);

      }
    });
  });
})(jQuery);

$(function () {
  $('.payment').hide();
  $('#paymentmethod').change(function () {
    $('.payment').hide();
    $('#' + $(this).val()).show();
  });
});

