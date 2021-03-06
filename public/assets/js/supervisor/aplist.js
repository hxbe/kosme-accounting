$(document).ready(function () {
    /********Invoice View ********/
    // ---------------------------
    // init date picker
    if ($(".pickadate").length) {
      $(".pickadate").pickadate({
        format: "mm/dd/yyyy"
      });
    }

    /********Invoice List ********/
    // ---------------------------

    // init data table
    if ($(".invoice-data-table").length) {
      var dataListView = $(".invoice-data-table").DataTable({
        columnDefs: [
          {
              "visible": false,
              "targets": 0
          },
        ],
        order: [0, 'asc'],
        displayLength: 10,
        dom:
          '<"top d-flex flex-wrap"<"action-filters flex-grow-1"f><"actions action-btns d-flex align-items-center">><"clear">rt<"bottom"p>',
        language: {
          search: "",
          searchPlaceholder: "Search"
        },
        select: {
          style: "multi",
          selector: "td:first-child",
          items: "row"
        },
        drawCallback: function(settings) {
          var api = this.api();
          var rows = api.rows({
              page: 'current'
          }).nodes();
          var last = null;

          api.column(0, {
              page: 'current'
          }).data().each(function(group, i) {
              if (last !== group) {
                  $(rows).eq(i).before(
                      '<tr class="group"><td colspan="6">' + group + '</td></tr>'
                  );

                  last = group;
              }
          });
      }
      //   responsive: {
      //     details: {
      //       type: "column",
      //       target: 0
      //     }
      //   }
      });
    }
    $('.row-grouping tbody').on('click', 'tr.group', function() {
      var currentOrder = dataListView.order()[0];
      if (currentOrder[0] === 0 && currentOrder[1] === 'asc') {
          dataListView.order([0, 'desc']).draw();
      }
      else {
          dataListView.order([0, 'asc']).draw();
      }
  });
    // To append actions dropdown inside action-btn div
    var invoiceFilterAction = $(".invoice-filter-action");
    var invoiceOptions = $(".invoice-options");
    $(".action-btns").append(invoiceFilterAction, invoiceOptions);

    // add class in row if checkbox checked
  //   $(".dt-checkboxes-cell")
  //     .find("input")
  //     .on("change", function () {
  //       var $this = $(this);
  //       if ($this.is(":checked")) {
  //         $this.closest("tr").addClass("selected-row-bg");
  //       } else {
  //         $this.closest("tr").removeClass("selected-row-bg");
  //       }
  //     });
    // Select all checkbox
  //   $(document).on("change", ".dt-checkboxes-select-all input", function () {
  //     if ($(this).is(":checked")) {
  //       $(".dt-checkboxes-cell")
  //         .find("input")
  //         .prop("checked", this.checked)
  //         .closest("tr")
  //         .addClass("selected-row-bg");
  //     } else {
  //       $(".dt-checkboxes-cell")
  //         .find("input")
  //         .prop("checked", "")
  //         .closest("tr")
  //         .removeClass("selected-row-bg");
  //     }
  //   });

    // ********Invoice Edit***********//
    // --------------------------------
    // form repeater jquery
    if ($(".invoice-item-repeater").length) {
      $(".invoice-item-repeater").repeater({
        show: function () {
          $(this).slideDown();
        },
        hide: function (deleteElement) {
          $(this).slideUp(deleteElement);
        }
      });
    }
    // dropdown form's prevent parent action
    $(document).on("click", ".invoice-tax", function (e) {
      e.stopPropagation();
    });
    $(document).on("click", ".invoice-apply-btn", function () {
      var $this = $(this);
      var discount = $this
        .closest(".dropdown-menu")
        .find("#discount")
        .val();
      var tax1 = $this
        .closest(".dropdown-menu")
        .find("#Tax1 option:selected")
        .text();
      var tax2 = $this
        .closest(".dropdown-menu")
        .find("#Tax2 option:selected")
        .text();
      $this
        .parents()
        .eq(4)
        .find(".discount-value")
        .html(discount + "%");
      $this
        .parents()
        .eq(4)
        .find(".tax1")
        .html(tax1);
      $this
        .parents()
        .eq(4)
        .find(".tax2")
        .html(tax2);
    });
    // // on product change also change product description
    $(document).on("change", ".invoice-item-select", function (e) {
      var selectOption = this.options[e.target.selectedIndex].text;
      // switch case for product select change also change product description
      switch (selectOption) {
        case "Frest Admin Template":
          $(e.target)
            .closest(".invoice-item-filed")
            .find(".invoice-item-desc")
            .val("The most developer friendly & highly customisable HTML5 Admin");
          break;
        case "Stack Admin Template":
          $(e.target)
            .closest(".invoice-item-filed")
            .find(".invoice-item-desc")
            .val("Ultimate Bootstrap 4 Admin Template for Next Generation Applications.");
          break;
        case "Robust Admin Template":
          $(e.target)
            .closest(".invoice-item-filed")
            .find(".invoice-item-desc")
            .val(
              "Robust admin is super flexible, powerful, clean & modern responsive bootstrap admin template with unlimited possibilities"
            );
          break;
        case "Apex Admin Template":
          $(e.target)
            .closest(".invoice-item-filed")
            .find(".invoice-item-desc")
            .val("Developer friendly and highly customizable Angular 7+ jQuery Free Bootstrap 4 gradient ui admin template. ");
          break;
        case "Modern Admin Template":
          $(e.target)
            .closest(".invoice-item-filed")
            .find(".invoice-item-desc")
            .val("The most complete & feature packed bootstrap 4 admin template of 2019!");
          break;
      }
    });
    // print button
    if ($(".invoice-print").length > 0) {
      $(".invoice-print").on("click", function () {
        window.print();
      })
    }
  });


  function apdelete(id) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "anda tidak dapat mengembalikan file yang terhapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Saya yakin!',
        confirmButtonClass: 'btn btn-warning',
        cancelButtonText: 'Tidak jadi',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: assetBaseUrl+"api/supervisor/codewithmamangreget/accountpayable",
                method: "delete",
                data: {id:id},
                success: function(res, message, code) {
                    if(message == 'success'){
                        Swal.fire({
                            type: "success",
                            title: 'Terhapus!',
                            text: 'Data berhasil dihapus.',
                            confirmButtonClass: 'btn btn-success',
                          }).then( function () {
                            var url = window.location.pathname;
                            url = url.substring(1);
                            window.location.replace(assetBaseUrl+url);
                          })
                    }else{
                        alert(message);
                    }
                }
            });
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Dibatalkan',
            text: 'Data tidak jadi dihapus',
            type: 'error',
            confirmButtonClass: 'btn btn-success',
          })
        }
      })
  }
