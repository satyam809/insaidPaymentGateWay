<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="./js/jquery.blockUI.js"></script>
<script type="text/javascript">
  var e = window,
    He = e.document,
    kn = 853,
    zn = 759;

  function Rn(e) {
    return He.getElementById(e);
  }

  function Dn() {
    return (
      kn < (0 < window.innerWidth ? window.innerWidth : window.screen.width)
    );
  }

  function On() {
    Dn() && (He.body.scrollTop = 0);
  }

  function Bn() {
    return (
      zn < (0 < window.innerWidth ? window.innerWidth : window.screen.width)
    );
  }

  function Sn(e, n) {
    return !!e.className.match(new RegExp("(\\s|^)" + n + "(\\s|$)"));
  }

  function En(e, n) {
    if (Sn(e, n)) {
      var t = new RegExp("(\\s|^)" + n + "(\\s|$)");
      e.className = e.className.replace(t, " ");
    }
  }

  function Fn() {
    var e = window.location.hash,
      n = 0;
    if (e) {
      n = e.split("-")[1];
      var t = He.querySelector("[data-view-id='" + n + "']");
      if (!t) throw new Error("Invalid view id");
      !(function (e, n) {
        Sn(e, n) || (e.className += " " + n);
      })(t, "slideup");
    }
    for (var i = He.querySelectorAll(".slideup"), r = 0; r < i.length; r++) {
      var a = i[r];
      n < a.dataset.viewId && En(a, "slideup");
    }
  }

  function qn() {
    if (
      (window.addEventListener("load", function () {
        On();
      }),
      Bn())
    )
      (Rn("mobile-container").innerHTML = ""),
        (Rn("desktop-container").style.display = "block");
    else {
      (Rn("desktop-container").innerHTML = ""),
        (Rn("mobile-container").style.display = "block");
      var e = He.documentElement.clientHeight;
      Rn("mobile-container").style["min-height"] = e + "px";
      //He.querySelector("#mobile-container .content").style.height = e + "px";
      for (
        var n = He.querySelectorAll("#mobile-container .slider-view"), t = 0;
        t < n.length;
        t++
      )
        n.item(t).style.height = e + "px";
      !(function () {
        var n;
        window.location.hash && ((window.location.hash = ""), (n = !0)),
          (window.onhashchange = function (e) {
            n ? (n = !1) : Fn();
          });
      })();
    }
  }

  function Yn() {
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent)
      ? "mobile"
      : "desktop";
    He.body.classList.add("theme-" + isMobile, "light");

    !function (e) {
      var n = He.head || He.getElementsByTagName("head")[0],
        t = He.getElementById("preset_style");
      t ||
        ((t = He.createElement("style")).setAttribute("id", "preset_style"),
        (t.type = "text/css")),
        t.appendChild(He.createTextNode(e)),
        n.appendChild(t);
    };
  }

  function loader() {
    jQuery.blockUI({
      message:
        '  <div class="loader"><svg class="circular" viewBox="25 25 50 50"> <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>',
      overlayCSS: {
        backgroundColor: "#000",
        opacity: 0.7,
        cursor: "wait",
      },
      css: {
        color: "#333",
        border: 0,
        padding: 0,
        backgroundColor: "transparent",
      },
    });
  }

  function pad_with_zeroes(number, length) {
    var my_string = "" + number;
    while (my_string.length < length) {
      my_string = "0" + my_string;
    }

    return my_string;
  }

  var program_id, program, amount, emi, offered_fee;

  $(document).ready(function () {
    qn();
    Yn();

    var a = 0;
    $(window).scroll(function () {
      var oTop = $("#info").offset().top - window.innerHeight;
      if (a == 0 && $(window).scrollTop() > oTop) {
        $(".count").each(function () {
          var ele = $(this);
          $({ Counter: 0 }).animate(
            { Counter: ele.text() },
            {
              duration: 1000,
              easing: "swing",
              step: function () {
                ele.text(Math.ceil(this.Counter));
              },
            }
          );
        });
        a = 1;
      }
    });

    $("button[name='enrollbutton']").on("click", function () {
      var id = $(this).attr("id");

      switch (id) {
        case "gcd_enroll":
          program_id = 2;
          program_code = "GCD";
          program = "Global Certificate in Data Science";
          amount = 300000;
          break;
        case "gcdai_enroll":
          program_id = 3;
          program_code = "GCDAI";
          program = "Global Certificate in Data Science & AI";
          amount = 300000;
          break;
        case "pgp_enroll":
          program_id = 4;
          program_code = "PGPDSAI";
          program = "PGP in Data Science & AI";
          amount = 300000;
          break;
      }

      var str =
        "<tr style='color: FF6B00;'><td>Registration Fee</td><td>INR " +
        (amount / 100).toLocaleString() +
        "</td></tr>";

      var details = "<tr><td>Program</td><td>" + program + "</td><tr>" + str;
      $("#details").html(details);
      $("#myModal").modal("show");
    });

    $("#pay").on("submit", function (e) {
      e.preventDefault();
      var username = $("#fname").val() + " " + $("#lname").val();
      var email = $("#email").val();
      var contact = $("#phone").val();
      var amt = 3000;
      alert($("#pay").serialize());
      $.ajax({
        type: "post",
        dataType: "JSON",
        url: "payment_process.php",
        data:
          "username=" + username + "&email=" + email + "&contact=" + contact,
        success: function (result) {
            console.log(result);
            if(result.status === true) {
                $('#pay').trigger('reset');
                console.log(result.message);
            }
          //console.log(result);
          var options = {
            key: "rzp_test_aurqfLb0HAeudn",
            amount: amt * 100,
            currency: "INR",
            name: "Acme Corp",
            description: "Test Transaction",
            image: "https://www.insaid.co/wp-content/uploads/2018/07/logo.png",
            handler: function (response) {
                console.log(response);
              jQuery.ajax({
                type: "post",
                url: "payment_complete.php",
                dataType: "JSON",
                data:
                  "payment_id=" +
                  response.razorpay_payment_id +
                  "&amount=" + amt +
                  "&payment_status=" +
                  'complete' + 
                  "&payment_description=" + 
                  'Test Transaction',
                success: function (result) {
                    console.log(result);
                    if(result.status === true) {
                        window.location.href = "https://enrol.insaid.co/thankyou.php";
                    }
                 
                },
              });
            },
          };
          var rzp1 = new Razorpay(options);
          rzp1.open();
        },
      });
    });
  });
</script>
