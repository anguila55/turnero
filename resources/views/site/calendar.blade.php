@include('site.header')
@include('site.sideBar')
{!! Form::open((['route' => 'customer::schedule', 'method' => 'POST'])) !!}
@csrf
<input type="hidden" name='customer_id' value={{ $customer_id }}>
<input type="hidden" name='date' id="date">
<div class="content mb-4">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-7 px-0 py-2">
            <div class="header-title text-left mb-2">Seleccione un día</div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col px-0">
            <div class="myCalendar"></div>
        </div>
    </div>
    <!-- Next Button-->
    <div class="row justify-content-center mt-4">
        <div class="col-lg-7 d-flex justify-content-end px-0" role="group" aria-label="Basic example">
            <a type="button" href={{ asset('/') }} class="btn btn-primary mr-3 button-icon-left next-button">
            <i class="fa fa-arrow-circle-left mr-2 f-30"></i>ANTERIOR
            </a>
            <button type="submit" class="btn btn-primary button-icon next-button">SIGUIENTE
                <i class="fa fa-arrow-circle-right ml-2 f-30"></i>
            </button>
        </div>
    </div>
</div>
{!! Form::close() !!}
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh"
        crossorigin="anonymous"></script>
<script src={{ asset("/site/calendar/jquery-pseudo-ripple.js") }}></script>
<script src={{ asset("/site/calendar/jquery-nao-calendar.js") }}></script>
<script>
    $(document).ready(function () {
        $('.ic-arrow-circle-angle-down , .ic-target').hide(); //muestro mediante clase
    });
    $('.myCalendar').calendar({
        date: new Date(),
        noAvailable: @json($disable_days),
        autoSelect: false, // false by default
        select: function (date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;
            var newDate = [year, month, day].join('-');
            document.getElementById("date").value = newDate;
        },
        toggle: function (y, m) {
        },
        check: function (noAvailable) {
        },
    })

</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>
</html>

